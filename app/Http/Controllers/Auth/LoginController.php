<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   

    public function loginView()
    {
        return view('Auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->user_type == "admin" || $user->user_type == "support")
        {
            return response()->redirectToRoute('admin.dashboard');
        }elseif($user->user_type == "agent"){
            return response()->redirectToRoute('agent.dashboard');
        }
        return response()->redirectToRoute('user.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return view('Auth.login');
    }
}
