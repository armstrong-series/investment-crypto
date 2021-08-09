<?php

namespace App\Helpers;
use Carbon\Carbon;
class  Configuration {
    
    const CURRENCY = 'USD';
    const INVESTMENT_TYPE = 'GOLD PLATE';
    const STATUS_COMPLETE = 'complete';
    const STATUS_PROCESS = 'processing';
    const STATUS_PENDING = 'pending';
    const WITHDRAWAL = "debit";
    const DEPOSIT = "credit";
    // const oneMonth = Carbon::now()->addMonth();
    
}