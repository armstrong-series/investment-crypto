<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\PaymentTransactionLog;
use Illuminate\Http\Request;
use Auth, Log, Exception, Validator;
use Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function Users(Request $request)
    {
        try {
            $users = User::all();
            return response()->json([
                'error' => false,
                "message" => "Successful",
                'users' => $users
            ], 200);
        } catch (Exception $error) {
            Log::info("Admin\AdminController@Users error message:" . $error->getMessage());
        }
    }
    public function Dashboard()
    {
        try {
            if (Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'support') {
            $users = User::all();
            $admin = User::where(['user_type' => 'admin'])->get();
            $support = User::where(['user_type' => 'support'])->get();
            $regulars = User::where(['user_type' => 'regular'])->get();    
            $count_regulars = count($regulars);
            $data = [
                'page' => 'admin-dashboard',
                'subs' => '',
                'support' => $support,
                'admin' => $admin,
                'users' => $users,
                'count_regulars' =>  $count_regulars 

            ];
         }else {
            return redirect()->back();
        }
            return view('App.admin.admin', $data);   
            // return view('App.admin-dashboard', $data);   

        } catch (Exception $error) {
            Log::info("Admin\AdminController@Dashboard error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }



    public function userManagement(Request $request){
        try {
        
            if (Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'support') {
                $users = User::all();
                $admin = User::where(['user_type' => 'admin'])->get();
               
                $support = User::where(['user_type' => 'support'])->get();
                $data = [
                    'page' => 'user-management',
                    'subs' => '',
                    'support' => $support,
                    'admin' => $admin,
                    'users' => $users,
                ];
            
            }else {
                return redirect()->back();
            }
                return view('App.user-management', $data);

        } catch (Exception $error){
            Log::info("UserController::class, 'deleteUser'" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }


    


    public function createUser(Request $request)
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
            $user->nationality = $request->nationality;
            $user->mobile = $request->mobile;
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
           
            $user = User::where(['id' => $request->id])->first();
            if (!$user) {
                $message = 'User not found!';
                return response()->json(['message' => $message], 404);
            }

            $user->name = $request->name ? $request->name : $user->name;
            $user->email = $request->email ? $request->email : $user->email;
            $user->mobile = $request->mobile ? $request->mobile : $user->mobile;
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

    public function deleteUser($id)
    {
        try {
            $user = User::where('id', $id)->first();
            if (!$user) {
                $message = "User was not found";
                return response()->json(['message' => $message], 404);
            }

            $user->delete();
            $message = "User deleted successfully!";
            return response()->json([
                'message' =>$message,
            ], 200);
        } catch (Exception $error) {
            Log::info("UserController::class, 'deleteUser'" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nationality' => ['required', 'string'],
            'user_type' => ['required', 'string'],
            
        ]);
    }

    
}
