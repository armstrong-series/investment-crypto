<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransactionLog;
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
                return view('App.admin.admin-transaction', $data);

            } else {
                return redirect()->back();
            }

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@getUserstransactions error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }

    public function approveTransaction(Request $request)
    {
        try {
            dd($request->all());
            $approve = PaymentTransactionLog::where([
                'txn_id' => $request->txn_id,
                'user_id' => Auth::id()])->first();
            if (!$approve) {
                return response()->json(["message" => "Transaction not found!"], 404);
            }

            $approve->status = "complete";
            $approve->save();
            return response()->json(["message" => "Transaction approved!"], 200);

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@approveTransaction error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }
    public function disapproveTransaction(Request $request)
    {
        try {
            $disapprove = PaymentTransactionLog::where([
                'txn_id' => $request->txn_id, 
                'id' => Auth::id()])->first();
            if(!$disapprove){
                return response()->json(["message" => "Transaction not found!"], 404);
            }
            $disapprove->status = "pending";
            $disapprove->save();
            return response()->json(["message" => "Transaction disapproved! "], 200);

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@disapproveTransaction error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }

    public function transactionDetails($tnx_id){
        try {
            $transaction = PaymentTransactionLog::where([
                // 'user_id' => Auth::id(),
                'txn_id' => $tnx_id
                ])->first();

                if(!$transaction){
                    return response()->json(["message" => "Invalid transaction !"], 404);
                }
                $data = [
                    'transaction' => $transaction,
                    'page' => 'alltransactions',
                    'subs' => ''
                ];

                return view('App.transaction_details', $data);
        } catch (Exception $error) {
            Log::info("Admin\TransactionController@transactionDetails error message:" . $error->getMessage());
            return $error;
        }
    }

    public function deleteTransaction($tnx_id)
    {
        try {
            $transaction = PaymentTransactionLog::where('txn_id', $tnx_id)->first();
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
