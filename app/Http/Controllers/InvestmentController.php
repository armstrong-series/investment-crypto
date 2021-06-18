<?php

namespace App\Http\Controllers;
use App\Models\Investment;
use App\Models\PaymentTransactionLog;
use Illuminate\Http\Request;
use App\Helpers\Configuration;

use Carbon\Carbon;
use Exception, Log, Auth, Storage;
use \GuzzleHttp\Client;



class InvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard(Request $request)
    {
        try {
            $investment = Investment::where(['user_id' => Auth::id()])->get();
            $rate = "https://api.alternative.me/v2/ticker/?convert=USD";
            $price = file_get_contents($rate);
            $result = json_decode($price, true);
            $currencies = $result['data'];
            $account_balance = PaymentTransactionLog::where([
                'user_id' => Auth::id(),
                'status' => 'completed'
                ])->sum('amount');
            $data = [
                'page' => 'wallet',
                'subs' => '',
                'investment' => $investment,
                'currencies' => $currencies,
                'account_balance' => $account_balance
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



    public function transactionHistory() {
        try {
           
            $withdrawal = Investment::where(['user_id' => Auth::id()])->get();
            $data = [
                'withdrawal' => $withdrawal,
                'page' => 'withdrawal',
                'subs' => '',
            ];
             return view('App.trnx-history', $data);

        } catch (Exception $error) {
            Log::info("InvestmentController@transactionHistory error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }


    public function withdrawal(Request $request){
        try {
            if($request->amount === ""){
                return response()->json([
                 "message" => "Please Enter an Amount"
                ], 400);
            }
            $withdrawal = PaymentTransactionLog::where([
                'user_id' => Auth::id(),
                'txn_id'=> $request->txn_id])->first()->decrement('increment', $request->amount);
            if(($request->amount) < ($withdrawal->amount)){
                $message = "Sorry, you have insufficient fund!";
                return response()->json(["message" => $message], 400);
            }
            $withdrawal->amount = $request->amount;
            $withdrawal->description = $request->description;
            $withdrawal->email= Auth::user()->email;
            $withdrawal->trans_type = "debit";
            $withdrawal->txn_date = Carbon::now();
            $withdrawal->save();
            $message = "Transaction completed!";
            return response()->json(["message" => $message], 200);
        } catch (Exception $error) {
            Log::info("InvestmentController@withdrawal error message:" . $error->getMessage());
            return response()->json([
                "message" => "A strange error with your request",
                "error" => true
            ], 500);
         
        }
    }

}
