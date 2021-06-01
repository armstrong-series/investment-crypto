<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function selectUserType(){
        return view('Auth.select-user');
    }


    public function forgotPassword(){
        return view('Auth.forgot-password');
    }
}
