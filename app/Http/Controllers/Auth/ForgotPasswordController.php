<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordRecoveryMail;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;
use Mail;
use Exception;
use Session;
use Validator;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgotPassword()
    {
        return view('Auth.forgot-password');
    }

    public function recoverPassword(Request $request)
    {
        try {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $tokenSent = $this->tokenSentToUserMail($request);

            if ($tokenSent) {
                $message = 'we have sent a password reset link to your mail';
                \Session::put('successfulMessage', $message);
                return redirect()->back();
            } else {
                $message = 'Please try again';
                \Session::put('errorMessage', $message);
                return redirect()->back();
            }
        } catch (\Exception $error) {
            Log::info('error message: ' . $error->getMessage());
            $message = 'Encountered an error please try again';
            \Session::put('message', $message);
            return redirect()->back();
        }
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|exists:users,email',
        ]);
    }

    private function tokenSentToUserMail($request)
    {
        try {
            $user = User::where('email', $request->input('email'))->first();
            if ($user) {
                $user['token'] = Str::random(50);
                $user->save();

                Mail::to($request->input('email'))
                    ->send(new PasswordRecoveryMail($user));
            }

            return true;
        } catch (Exception $error) {
            Log::info('error message: ' . $error->getMessage());

            return false;
        }
    }
}
