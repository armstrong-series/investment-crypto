<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Exception, Log, Auth, Storage;

class WalletController extends Controller
{
    public  function walletDashboard()
    {
        try {

            // $data = [
            //     'page' => 'wallet',
            //     'subs' => ''
            // ];

            return view('App.e-wallet', $data);
            
        } catch (Exception $error) {
            Log::info("WalletController@walletDashboard error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }
}
