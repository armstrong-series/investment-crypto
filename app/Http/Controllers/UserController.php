<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception, Log, Hash, Auth, Validator;
use App\Models\User;

class UserController extends Controller
{
    public function selectUserType(){
        return view('Auth.select-user');
    }


    public function forgotPassword(){
        return view('Auth.forgot-password');
    }


    public function accountView()
    {
        try {

            return view('Auth.register');
        } catch (Exception $error) {
            Log::info("UserController::class, 'accountView'" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $this->getErrorMessage($message);
        }
    }

    public function createAccount(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|unique:users',
                'nationality' => 'required',
                'password' => 'required|between:6,255',
                'password_confirmation' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                $message = $validator->errors()->all();
                foreach ($message as $messages) {
                    return response()->json(['message' => $messages], 400);
                }
            }

            $user = new User;
            $user->uuid = (string) \Str::uuid();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->user_type = 'regular';
            $user->nationality = $request->nationality;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'message' => $user->name . ', your account has successfully been created!',
                'url' => route('auth.login.account'),
            ], 200);

        } catch (Exception $error) {
            Log::info("UserController::class, 'createAccount'" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }


}
