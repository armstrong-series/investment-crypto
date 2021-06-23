<?php

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Exception;
use Log;



    function transactionNotifier($user){
     try{
         Mail::to($user->email)->send(new UserNotification($user));
     }catch(Exception $error){
         Log::info($error->getMessage());
     }
    }




