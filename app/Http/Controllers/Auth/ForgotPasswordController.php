<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Auth, Log, Exception, Str;
use Dotenv\Validator;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;





    public function recoverPassword(Request $request){
        try{
            $validator =  $this->validator($request->all());

            if($validator->fails()){
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }

            $tokenSent = $this->tokenSentToUserMail($request);

            if($tokenSent){
                $message = 'we have sent a password reset link to your mail';
                \Session::put('successfulMessage', $message);
                return redirect()->back();
            }else{
                $message = 'Please try again';
                \Session::put('errorMessage', $message);
                return redirect()->back();
            }
        }catch(\Exception $error){
            Log::info('error message: ' . $error->getMessage());
            $message = 'Encountered an error please try again';
            \Session::put('message', $message);
            return redirect()->back();
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|exists:users,email',
        ]);
    }

    private function tokenSentToUserMail($request){
        try{
            $user = User::where('email', $request->input('email'))->first();
            if($user){
                $user['token'] = Str::random(50);
                $user->save();

                // Mail::to($request->input('email'))
                //     ->send(new PasswordRecoveryMail($user));
            }

            return true;
        }catch(\Exception $error){
            Log::info('error message: ' . $error->getMessage());

            return false;
        }

    }

}
