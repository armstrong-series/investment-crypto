<?php
namespace App\Helpers;

use App\Mail\transactionNotifier;
use App\Mail\DebitMailer;
use App\Models\PaymentTransactionLog;
use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Log;

class MailConfig
{

    public static function notifier(Request $request, $user)
    {
        try {
           
            $transaction = PaymentTransactionLog::where(['user_id' => Auth::id(), 'id' =>$request->id ])->first();
            if($transaction->trans_type === "credit"){
                Mail::to($user->email)->send(new transactionNotifier($user));
            }elseif($transaction->trans_type === "debit"){
                Mail::to($user->email)->send(new DebitMailer($user));
            }
            return $transaction;
        } catch (Exception $error) {
            Log::info($error->getMessage());
        }
    }

}
