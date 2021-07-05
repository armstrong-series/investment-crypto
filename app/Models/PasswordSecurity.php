<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PasswordSecurity extends Model
{
    use HasFactory;
    protected $table = "password_securities";
    protected $fillable = ['user_id', 'google2fa_enable', 'google2fa_secret'];

    public function user()
    {
        // return $this->belongsTo('App\Models\User');
        return $this->belongsTo(User::class);
          
         
    }
}
