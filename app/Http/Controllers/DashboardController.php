<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\PaymentTransactionLog;
use Illuminate\Http\Request;
use Auth, Log, Exception;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Dashboard(Request $request)
    {
        try {
            $users = User::where(['id' => Auth::id()])->get();
            $total_investment = PaymentTransactionLog::where([
                'user_id' => Auth::id(),
                // 'status' => 'completed'
                ])->sum('amount');
            
            
            $total_roi = PaymentTransactionLog::where([
                'user_id' => Auth::id(),
                'status' => 'completed'
                ])->sum('increment');

            $data = [
                'page' => 'dashboard',
                'subs' => '',
                'total_investment' => $total_investment,
                'users' => $users,
                'total_roi' => $total_roi

            ];
            return view('App.dashboard', $data);
        } catch (Exception $error) {
            Log::info("DashboardController@Dashboard error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }
}
