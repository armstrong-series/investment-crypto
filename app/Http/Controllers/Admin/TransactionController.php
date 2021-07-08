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

    public function approveTransaction($tnx_id)
    {
        try {
            $approve_transaction = PaymentTransactionLog::where([
                'txn_id' => $tnx_id,
                'id' => Auth::id()])->update([
                "status" => "complete",
            ]);
            // if (!$approve_transaction) {
            //     return response()->json(["message" => "Transaction not found!"], 404);
            // }
            $approve_transaction->save();
            return response()->json(["message" => "Transaction approved!"], 200);

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@approveTransaction error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }

    public function disapproveTransaction(Request $txn_id)
    {
        try {
            $disapprove_transaction = PaymentTransactionLog::where([
                'txn_id' => $txn_id, 
                'id' => Auth::id()])->update([
                "status" => "pending",
            ]);

            $disapprove_transaction->save();
            return response()->json(["message" => "Transaction disapproved! "], 200);

        } catch (Exception $error) {
            Log::info("Admin\TransactionController@disapproveTransaction error message:" . $error->getMessage());
            $message = 'Unable to get information. Please try checking your network';
            return $error;
        }
    }

    public function deleteTransaction(Request $request)
    {
        try {
            $transaction = PaymentTransactionLog::where('id', $request->id)->first();
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
