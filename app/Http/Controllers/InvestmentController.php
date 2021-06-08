<?php

namespace App\Http\Controllers;
use App\Models\Investment;
use App\Models\PaymentTransactionLog;
use Illuminate\Http\Request;
use App\Helpers\Configuration;
use Exception, Log, Auth, Storage;
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
            $data = [
                'page' => 'wallet',
                'subs' => '',
                'investment' => $investment
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

    public function makeTransaction(Request $request)
    {
        try {
            $investment = Investment::where(['user_id' => Auth::id()])->get();
           $data  = [
            'investment' => $investment
           ];
            return view('App.payment', $data);
        } catch (Exception $error) {
            Log::info("InvestmentController@makeTransaction error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }


    public function invest(Request $request)
    {
        try {
            if(!$request->amount || !$request->name){
                $message = "All field is required!";
                return response()->json(['message' => $message], 400);
            }
            $investment = new Investment();

            $transaction =  new PaymentTransactionLog();
            $transaction->user_id = Auth::id();
            $transaction->txn_id = (string) \Str::uuid();
            $transaction->amount = $request->amount;
            $transaction->name = $request->name;
            $transaction->currency = Configuration::INVESTMENT_CURRENCY;
            $transaction->type = Configuration::INVESTMENT_TYPE;
            $transaction->save();
            if($transaction->save()){
                $investment->user_id = $transaction->user_id;
                $investment->name =  $transaction->name;
                $investment->save();

                return response()->json([
                    'message' => "Investment Done Successfully",
                ], 200);

            }
           
            

        } catch (Exception $error) {
            Log::info("InvestmentController@invest error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }

}
