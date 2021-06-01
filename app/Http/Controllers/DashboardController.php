<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth, Log, Exception;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Dashboard()
    {
        try {
            $users = User::where(['id' => Auth::id()])->get();
            // $data = [
            //     'page' => 'dashboard',
            //     'subs' => '',
            //     'users' => $users,

            // ];
            return view('App.dashboard');
        } catch (Exception $error) {
            Log::info('DashboardController::class "dashboard"');
            return $error;
        }
    }
}
