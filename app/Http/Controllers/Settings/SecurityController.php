<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Exception;
use App\Models\User;
use App\Models\PasswordSecurity;
use Illuminate\Support\Facades\Log;
use \PragmaRX\Google2FAQRCode\Google2FA;

class SecurityController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }



    public function twoFactorAuth(Request $request){

        try {

            $data = [
                'page' => 'two-factor'
            ];
            return view('Settings.two-factor', $data);
        } catch (Exception $error) {
            Log::info("Settings\SecurityController@twoFactorAuth error message:" . $error->getMessage());
            return $error;
        }
    }
}
