<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Log, Exception, Dotenv\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Dashboard()
    {
        try {
            if (Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'support') {
            $users = User::all();
            $admin = User::where(['user_type' => 'admin'])->get();
            $support = User::where(['user_type' => 'support'])->get();
            $data = [
                'page' => 'admin-dashboard',
                'subs' => '',
                'support' => $support,
                'admin' => $admin,
                'users' => $users,

            ];
         }else {
            return redirect()->back();
        }
            return view('App.admin-dashboard', $data);   

        } catch (Exception $error) {
            Log::info("Admin\AdminController@Dashboard error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }


    public function createUser(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|between:6,255',
                'password_confirmation' => 'required|same:password',
                // 'user_type' => 'required',

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
            $user->password = Hash::make($request->password);
            $user->user_type = $request->user_type;
            $user->save();
            if ($user->save()) {
                return response()->json([
                    'message' => 'your account has successfully been created!',
                    'user' => $user,
                ], 200);
            }

        } catch (Exception $error) {
           Log::info("Admin\AdminController@createUser error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }

    public function updateUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|between:6,255',
                'phone_number' => 'required',
                'password_confirmation' => 'required|same:password',

            ]);
            if ($validator->fails()) {
                $message = $validator->errors()->all();
                foreach ($message as $messages) {
                    return response()->json(['message' => $messages], 400);
                }
            }
            $user = User::where(['id' => $request->id])->first();
            if (!$user) {
                $message = 'User not found';
                return response()->json([
                    'message' => $message,
                ], 404);
            }

            $user->name = $request->name ? $request->name : $user->name;
            $user->email = $request->email ? $request->email : $user->email;
            $user->phone_number = $request->phone_number ? $request->phone_number : $user->phone_number;
            $user->password = Hash::make($request->password) ? Hash::make($request->password) : $user->password;
            $user->user_type = $request->user_type ? $request->user_type : $user->user_type;
            $user->save();
            return response()->json([
                'message' => $user->name . "'s" . " record updated succesfully",
            ], 200);

        } catch (Exception $error) {
            Log::info("Admin\AdminController@updateUser error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }

    public function deleteUser(Request $request, $id)
    {
        try {
            $user = User::where(['id' => $id])->first();
            if (!$user) {
                $message = "User was not found";
                return response()->json(['message' => $message], 404);
            }

            $user->delete();
            $message = "User deleted successfully";

        } catch (Exception $error) {
            Log::info("UserController::class, 'deleteUser'" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }
    
}
