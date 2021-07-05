<?php

namespace App\Http\Controllers\Integrations;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception, Log, Str, Validator;
use App\Helpers\Configuration;
use App\Models\PaymentTransactionLog;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use \GuzzleHttp\Client;


class RaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function initialize(Request $request)
    {
        try {

            $validator = $this->checkTransaction($request->all());
            if ($validator->fails()) {
                $message = $validator->errors()->all();
                foreach ($message as $messages) {
                    return response()->json(['message' => $messages], 400);
                }
            }
           
          
             $reference = Flutterwave::generateReference();

                $data = [
                    'payment_options' => 'card',
                    'amount' => $request->amount,
                    'email' => Auth::user()->email,
                    'tx_ref' => $reference,
                    'currency' => "USD",
                    'redirect_url' => route('users.payment.callback'),
                    'customer' => [
                        'email' => Auth::user()->email,
                        "phone_number" => Auth::user()->mobile,
                        "name" => Auth::user()->name
                    ],

                    "customizations" => [
                        "description" => $request->description 
                    ]
                ];

                $transaction = new PaymentTransactionLog();
                $transaction->user_id = Auth::id();
                $transaction->ref = $data['tx_ref'];
                $transaction->amount = $data['amount'];
                $transaction->currency = $data['currency'];
                $transaction->email = $data['email'];
                $transaction->increment = $request->increment;
                $transaction->description = $data["customizations"]["description"];
                $transaction->name = Configuration::INVESTMENT_TYPE;
                $transaction->trans_type = "credit";
                $transaction->txn_id = \Str::uuid();
                $transaction->save();

                $payment = Flutterwave::initializePayment($data);
                    if ($payment['status'] !== 'success') {
                            $message = "Transaction failed!";
                            return response()->json(['message' => $message], 400);
                       
                    }

                return redirect($payment['data']['link']);
        
        } catch (Exception $error) {
            Log::info("Integrations\RaveController@initialize error message:" . $error->getMessage());
            
            return  response()->json([
                "message" => "Unable to process request",
                "error" => true
            ], 500);
        }
    }


    public function callback(Request $request)
    {
        try {

            $status = $request->status;
            if ($status ==  'successful') {
            
                $transactionID = Flutterwave::getTransactionIDFromCallback();
                $data = Flutterwave::verifyTransaction($transactionID);
        
                dd($data);
            }
            elseif ($status ==  'cancelled'){
               return response()->json([
                    $message = "Transaction can't be completed!",
                    "message" => $message
               ], 400);
            }
            else{
                return response()->json([
                    $message = "Transaction failed!",
                    "message" => $message
                ], 422);
            }
            
        } catch (Exception $error) {
            Log::info("Integrations\RaveController@callback error message:" . $error->getMessage());
             $message = "Unable to complete Request";
            return response()->json([
                "message" => $message,
                "error" =>true
            ], 500);
        }
    }


    protected function checkTransaction(array $data)
    {
        return Validator::make($data, [
            'amount' => ['required'],
           
              
        ]);
    }
}
