<?php

namespace App\Http\Controllers;
use App\Models\Investment;
use App\Models\PaymentTransactionLog;
use Illuminate\Http\Request;
use App\Helpers\Configuration;
use App\Helpers\MailConfig;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use Exception, Log, Auth, Storage;



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
            $rate = "https://api.alternative.me/v2/ticker/?limit=4&convert=USD";
            $price = file_get_contents($rate);
            
            $result = json_decode($price, true);
            $currencies = $result['data'];
           
        
            $account_balance = PaymentTransactionLog::where([
                'user_id' => Auth::id(),
                'status' => 'complete'
                ])->sum('amount');

            $data = [
                'page' => 'wallet',
                'subs' => '',
                'investment' => $investment,
                'currencies' => $currencies,
                'account_balance' => $account_balance,
               
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
           
            $transaction = PaymentTransactionLog::where(['user_id' => Auth::id()])->get();
            $data = [
                'transaction' => $transaction,
                'page' => 'transaction',
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

    public function invest(Request $request)
    {
        try {
            $validator = $this->check($request->all());
            if ($validator->fails()) {
                $message = $validator->errors()->all();
                foreach ($message as $messages) {
                    return response()->json(['message' => $messages], 400);
                }
            }
            // if(strlen($request->crypto_address)){
            //     wordwrap($request->crypto_address,  25, "<br />");
            // }

            $user = User::firstOrNew(['email' => 'admin@investment.io']);
            $investment = new PaymentTransactionLog();
            $investment->user_id = Auth::id();
            $investment->coin = $request->coin;
            $investment->currency = Configuration::CURRENCY;
            $investment->name = Configuration::INVESTMENT_TYPE;
            $investment->trans_type = "credit";
            $investment->email = Auth::user()->email;
            $investment->mobile = Auth::user()->mobile;
            $investment->txn_id = \Str::uuid();
            $investment->txn_date = Carbon::now();
            $investment->increment = $request->increment;
            $investment->description = $request->description;
            $investment->crypto_address =  $request->crypto_address;
            $investment->amount = $request->amount;
            $investment->save();
            MailConfig::notifier($request, $user);
            return response()->json(["message" => "Investment successful!" ],200);
        } catch (Exception $error) {
            Log::info("InvestmentController@invest error message:" . $error->getMessage());
            return $error;
        }
    }



    public function checkout(Request $request){
        try {
            $user = PaymentTransactionLog::where(['user_id' => Auth::id()])->get();
            $data= [
                'page' => 'transaction',
                'sub' => '',
                'user' => $user
            ];
            return view('App.checkout', $data);
        } catch (Exception $error) {
            Log::info("InvestmentController@checkout error message:" . $error->getMessage());
            return  response()->json([
                "message" => "Unable to process request",
                "error" => true
            ], 500);
        }
    }
    public function withdrawal(Request $request){
        try {

            $oneMonth = Carbon::now()->addMonth();

            $user = User::firstOrNew(['email' => 'admin@investment.io', 'user_type' => 'admin']);
            $validator = $this->check($request->all());
            if ($validator->fails()) {
                $message = $validator->errors()->all();
                foreach ($message as $messages) {
                    return response()->json(['message' => $messages], 400);
                }
            }
            $withdrawal = PaymentTransactionLog::where([
                'user_id' => Auth::id(),
                'txn_id'=> $request->txn_id])->decrement('increment', $request->amount);

            if($withdrawal->txn_date !== $oneMonth){
                $message = "Sorry, your investment is not up to a month!";
                return response()->json(["message" => $message], 400);
            }
            if(!$withdrawal){
                $message = "Invalid transaction!";
                return response()->json(["message" => $message], 404);
            }
            if(($request->amount) < ($withdrawal->amount)){
                $message = "Insufficient Coin!";
                return response()->json(["message" => $message], 400);
            }
            $withdrawal->amount = $request->amount;
            $withdrawal->description = $request->description;
            $withdrawal->email= Auth::user()->email;
            $withdrawal->trans_type = "debit";
            $withdrawal->crypto_address = $request->crypto_address;
            $withdrawal->txn_date = Carbon::now();
            $withdrawal->save();
            MailConfig::notifier($request, $user);
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


    // public function getTransactions(Request $request)
    // {
    //     try {
    //         $transactions =  PaymentTransactionLog::where(['user_id' => Auth::id])->get();

    //         return response()->json([
    //             "message" => "Success",
    //             'transactions' => $transactions
    //         ], 200);
    //     } catch (Exception $error) {
    //         Log::info("InvestmentController@getTransaction error message:" . $error->getMessage());
    //         return response()->json([
    //             "message" => "A strange error with your request",
    //             "error" => true
    //         ], 500);
    //     }
    // }

    protected function check(array $data)
    {
        return \Validator::make($data, [
            'amount' => ['required', 'integer'],
            'crypto_address' => ['required', 'string'],
            
            
        ]);
    }

}
