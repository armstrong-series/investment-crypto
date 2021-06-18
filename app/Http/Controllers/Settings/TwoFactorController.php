<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\TwoFactorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Exception;
use Illuminate\Support\Facades\Log;
use \PragmaRX\Google2FAQRCode\Google2FA;



class TwoFactorController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }




    public function Authentication(Request $request){
        try {
            $user = Auth::user();
            $google2fa_url = "";
            $secret_key = "";

            if($user->twoFactorAuthentication()->exists()){
                $google2fa = (new Google2FA());
                $google2fa_url = $google2fa->getQRCodeInline(
                    'Authenticate Users',
                    $user->email,
                    $user->twoFactorAuthentication->google2fa_secret
                );
                $secret_key = $user->twoFactorAuthentication->google2fa_secret;
                $data = [
                    "page" => "2fa",
                    'user' => $user,
                    'secret' => $secret_key,
                    'google2fa_url' => $google2fa_url
                ];

                return view('Settings.2fa', $data);
            }
        } catch (Exception $error) {
            Log::info("Settings\TwoFactorController@Authentication error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }




    public function generate2faSecret(Request $request){
        try {
            $user = Auth::user();
            $google2fa = (new Google2FA());
            $secret = TwoFactorModel::firstOrNew(array('user_id' => $user->id));
            $secret->user_id = $user->id;
            $secret->google2fa_enable = 0;
            $secret->google2fa_secret = $google2fa->generateSecretKey();
            $secret->save();
            return redirect('/2fa')->with('success',"Secret key is generated.");
        } catch (Exception $error) {
            Log::info("Settings\TwoFactorController@generate2faSecret error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "An error occured generating secret"
            ];
            return $response;
        }
    }

    /**
     * Enable 2FA
     */
    public function enable2fa(Request $request){
        $user = Auth::user();
        $google2fa = (new Google2FA());

        $secret = $request->input('secret');
        $valid = $google2fa->verifyKey($user->twoFactorAuthentication->google2fa_secret, $secret);

        if($valid){
            $user->twoFactorAuthentication->google2fa_enable = 1;
            $user->twoFactorAuthentication->save();
            return redirect('2fa')->with('success',"2FA is enabled successfully.");
        }else{
            return redirect('2fa')->with('error',"Invalid verification Code, Please try again.");
        }
    }

 
    public function disable2fa(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your password does not matches with your account password. Please try again.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
        ]);
        $user = Auth::user();
        $user->twoFactorAuthentication->google2fa_enable = 0;
        $user->twoFactorAuthentication->save();
        return redirect('/2fa')->with('success',"2FA is now disabled.");
    }
}


