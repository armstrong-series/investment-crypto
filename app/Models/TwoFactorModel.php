<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoFactorModel extends Model
{
    use HasFactory;

    protected $table = 'two_factor_authentication';
    protected $fillable = [
        'user_id'
    ];

    public function user(){

         return $this->belongsTo('App\User');
    }
    
}
