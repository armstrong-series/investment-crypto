<?php

namespace App\Http\Controllers;
use App\Models\Investment;
use App\Models\PaymentTransactionLog;
use Illuminate\Http\Request;
use App\Helpers\Configuration;
use App\Models\User;
use Carbon\Carbon;
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
            $user = User::firstOrNew(['email' => 'admin@investment.io', 'user_type' => 'admin']);
            $investment = new PaymentTransactionLog();
            $investment->user_id = Auth::id();
            $investment->name = Configuration::INVESTMENT_TYPE;
            $investment->trans_type = "credit";
            $investment->email = Auth::user();
            $investment->txn_id = \Str::uuid();
            $investment->txn_date = Carbon::now();
            $investment->description = $request->description;
            $investment->address =  $request->address;
            $investment->amount = $request->amount;
            $investment->save();
            transactionNotifier($user);
            return redirect()->route('users.checkout');
        } catch (Exception $error) {
            Log::info("InvestmentController@invest error message:" . $error->getMessage());
            return  response()->json([
                "message" => "Unable to process request",
                "error" => true
            ], 500);
        }
    }



    public function checkout(Request $request){
        try {
            $user = PaymentTransactionLog::where(['user_id' => Auth::id()])->get();

            $data= [
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
            $withdrawal->txn_date = Carbon::now();
            $withdrawal->save();
            transactionNotifier($user);
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


    public function getTransactions(Request $request)
    {
        try {
            $transaction =  PaymentTransactionLog::where(['user_id' => Auth::id])->get();

            return response()->json([
                "message" => "Successful",
                'transaction' => $transaction
            ], 200);
        } catch (Exception $error) {
            Log::info("InvestmentController@getTransaction error message:" . $error->getMessage());
            return response()->json([
                "message" => "A strange error with your request",
                "error" => true
            ], 500);
        }
    }

    protected function check(array $data)
    {
        return Validator::make($data, [
            'amount' => ['required', 'string', ],
            'address' => ['required', 'string'],
            
            
        ]);
    }

}
