<?php

namespace App\Http\Controllers;
use App\Models\Investment;
use App\Models\PaymentTransactionLog;
use Illuminate\Http\Request;
use App\Helpers\Configuration;
use Exception, Log, Auth, Storage;
use \GuzzleHttp\Client;



class InvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
        try {
            $investment = Investment::where(['user_id' => Auth::id()])->get();
            $rate = "https://api.alternative.me/v2/ticker/?convert=USD";
            $price = file_get_contents($rate);
            $result = json_decode($price, true);
            $currencies =$result['data'];
            
            $data = [
                'page' => 'wallet',
                'subs' => '',
                'investment' => $investment,
                'currencies' => $currencies
            ];
            return view('App.crypto-wallet', $data);

        } catch (Exception $error) {
            Log::info("InvestmentController@dashboard error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }


    // public function totalBalance(Request $request){
    //     try {
    //         $balance = PaymentTransactionLog::where(['user_id' => Auth::id, 'amount' =>$request->amount])->get();
    //         $data = [
    //             'balance' => 
    //         ]
    //     } catch (Exception $error) {
    //         //throw $th;
    //     }
    // }

    public function withdrawal(Request $request) {
        try {
           
            $withdrawal = Investment::where(['user_id' => Auth::id()])->get();
            $data = [
                'withdrawal' => $withdrawal,
                'page' => 'withdrawal',
                'subs' => '',
            ];
             return view('App.withdrawal', $data);

        } catch (Exception $error) {
            Log::info("InvestmentController@withdrawal error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }


    public function coinUSDConversion()
    {
        $rate = "https://api.alternative.me/v2/ticker/?convert=USD";
        $price = file_get_contents($rate);
        $result = json_decode($price, true);
        dd($result);
        // $currencies =$result['data'];
    }

}
