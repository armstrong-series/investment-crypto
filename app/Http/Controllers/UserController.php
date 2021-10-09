<?php

namespace App\Http\Controllers;

use App\Helpers\Paths;
use App\Models\User;
use Auth;
use Exception;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Log;
use Validator;

class UserController extends Controller
{
    public function selectUserType()
    {
        return view('Auth.select-user');
    }

    public function forgotPassword()
    {
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
            $validator = $this->validator($request->all());
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
                'message' => 'Account successfully been created!',
                'url' => route('auth.login.account'),
            ], 200);

        } catch (Exception $error) {
            Log::info("UserController::class, 'createAccount'" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }

    public function profile(Request $request)
    {
        try {
            $profile = User::where(['id' => Auth::id()])->get();
            $data = [
                'page' => 'profile',
                'subs' => '',
                'profile' => $profile,
            ];
            return view('Settings.profile', $data);
        } catch (Exception $error) {
            Log::info("UserController@profile error message:" . $error->getMessage());
            $response = [
                'status' => false,
                "message" => "Encountered an error",
            ];
            return $response;
        }
    }

    public function updateProfile(Request $request)
    {
        try {

            $validator = $this->validateMobile($request->all());
            if ($validator->fails()) {
                $message = $validator->errors()->all();
                foreach ($message as $messages) {
                    return response()->json(['message' => $messages], 400);
                }
            }

            $user = User::where('id', $request->id)->first();
            if (!$user) {
                $message = 'User not found!';
                return response()->json(['message' => $message], 404);
            }
            $user->name = $request->name ? $request->name : $user->name;
            $user->mobile = $request->mobile ? $request->mobile : $user->mobile;
            $user->nationality = $request->nationality ? $request->nationality : $user->nationality;
            $user->password = Hash::make($request->password) ? Hash::make($request->password) : $user->password;
            $user->save();
            return response()->json([
                'message' => "Profile updated successfully!"], 200);

        } catch (Exception $error) {
            Log::info("UserController@updateProfile error message:" . $error->getMessage());
            $response = [
                'status' => false,
                "message" => "Unable to complete request",
            ];
            return $response;
        }
    }

    protected function validateMobile(array $data)
    {
        return Validator::make($data, [
            'mobile' => ['number', 'max:13', 'min:11', 'unique:users'],
        ]);
    }

    public function changeProfile(Request $request)
    {
        try {

            $user = User::where('id', $request->id)->first();
            if (!$user) {
                $message = "User not found!";
                return response()->json(['message' => $message], 404);
            }

            if (!$request->hasFile('profile_pics')) {
                $message = "An Image is required to complete request!";
                return response()->json(['message' => $message], 400);
            }

            $profile_pics = Paths::PROFILE_PICS . $request->file . $user->profile_pics;
            if (Storage::has($profile_pics)) {
                Storage::delete($profile_pics);
            }

            $imagePath = storage_path('app/' . Paths::PROFILE_PICS);
            $extension = $request->file('profile_pics')->getClientOriginalExtension();
            if (!in_array(strtolower($extension), ["jpg", "png", "jpeg"])) {
                $message = "Invalid file format!";
                return response()->json(['message' => $message], 400);
            }

            $fileName = time() . '.' . $extension;
            $request->file('profile_pics')->move($imagePath, $fileName);
            $user->profile_pics = $fileName;
            $user->save();
            return response()->json([
                "message" => "Profile updated successfully!",
            ], 200);

        } catch (Exception $error) {
            Log::info('UserController@changeProfile error message: ' . $error->getMessage());
            $message = 'Sorry, unable to create template. Please try again';
            return response()->json([
                'error' => true,
                "message" => $message,
            ], 500);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'nationality' => ['required', 'string'],

        ]);
    }

}
