<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransactionLog;
use App\Helpers\Configuration;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Log;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUserstransactions(Request $request)
    {

        try {

            if (Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'support') {
                $transactions = PaymentTransactionLog::all();
                $admin = User::where(['user_type' => 'admin'])->get();
                $support = User::where(['user_type' => 'support'])->get();
                $data = [
                    'page' => 'alltransactions',
                    'subs' => '',
                    'support' => $support,
                    'admin' => $admin,
                    'transactions' => $transactions,

                ];
                // return view('App.admin.admin-transaction', $data);
                return view('App.admin.transaction', $data);

            } else {
                return redirect()->back();
            }

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@getUserstransactions error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }



    public function transactions(Request $request){
        try {
            $alltransactions = PaymentTransactionLog::where(['id' => Auth::id()])->get();
            return response([
                "message" => "Success",
                 "alltransactions" => $alltransactions
                ], 200);
        } catch (Exception $error) {
            Log::info("Admin\TransactionController@transactions error message:" . $error->getMessage());
            return $error;
        }
    }




    public function confirmTransaction(Request $request)
    {
        try {
        //    dd($txn_id);
            $approve = PaymentTransactionLog::where(['txn_id' => $request->txn_id])->first();
            if (!$approve) {
                return response()->json(["message" => "Transaction not found!"], 404);
            }
            $approve->status = Configuration::STATUS_COMPLETE;
            $approve->save();
            return response()->json(["message" => "Transaction approved!"], 200);

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@approveTransaction error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }
    public function cancelTransaction(Request $request)
    {
        try {
            $disapprove = PaymentTransactionLog::where([
                'txn_id' => $request->txn_id, 
                'id' => Auth::id()])->first();
            if(!$disapprove){
                return response()->json(["message" => "Transaction not found!"], 404);
            }
            $disapprove->status = Configuration::STATUS_PENDING;
            $disapprove->save();
            return response()->json(["message" => "Transaction disapproved!"], 200);

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@disapproveTransaction error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }

    public function transactionDetails(Request $request, $tnx_id){
        try {
            $transaction = PaymentTransactionLog::where([
                'txn_id' => $tnx_id])->first();
                if(!$transaction){
                    return response()->json(["message" => "Invalid transaction!"], 404);
                }
                $data = [
                    'transaction' => $transaction,
                    'page' => 'alltransactions',
                    'subs' => ''
                ];

                // return view('App.transaction_details', $data);
                return view('App.admin.transaction_details', $data);
        } catch (Exception $error) {
            Log::info("Admin\TransactionController@transactionDetails error message:" . $error->getMessage());
            return $error;
        }
    }

    public function deleteTransaction(Request $request, $id)
    {
        try {
            $transaction = PaymentTransactionLog::where([    
                 'id' => $id])->first();
            if(!$transaction){
                return response()->json(["message" => "Transaction not found!"], 404);
            }
            $transaction->delete();
            return response()->json(["message" => "Transaction deleted!"], 200);
        } catch (Exception $error) {
            Log::info("Admin\TransactionController@deleteTransaction error message:" . $error->getMessage());
            return $error;
        }
    }
}
