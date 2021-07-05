<?php

namespace App\Http\Controllers\Settings;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Exception, Dotenv\Validator;
use App\Models\PasswordSecurity;
use Illuminate\Support\Facades\Log;
use \PragmaRX\Google2FAQRCode\Google2FA;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function settingsDashboard()
    {
        try {

            $user = User::where(['id' => Auth::id()])->get();
            $data = [
                'user' => $user,
                'page' => 'settings-dashboard',
                'subs' => '',
            ];
            return view('Settings.settings', $data);

        } catch (Exception $error) {
            Log::info("Settings\SettingsController@settingsDashboard error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }


    public function security(Request $request)
    {
        try {

            if(Auth::guest()){
                return;
            }
            $user  = Auth::user();
            $google2faUrl = "";
            dd($user->passwordSecurity);
            if(count($user->passwordSecurity)){
                $google2fa = new Google2FA();
                $google2faUrl = $google2fa->getQRCodeGoogleUrl(
                    'allresources',
                    $user->email,
                    $user->google2fa_secret
                );
            }
    
            $data = array(
                'user' => $user,
                'google2faUrl' => $google2faUrl,
                'page' => 'settings-dashboard',
                'subs' => ''
            );
            return view('Settings.security', $data);

        } catch (Exception $error) {
            Log::info("Settings\SettingsController@security error message:" . $error->getMessage());
            return $error;
        }
    }




    public function generate2faSecretCode(Request $request){
        try {
            $user = Auth::user();
            $google2fa = new Google2FA();
            
            PasswordSecurity::create([
                'user_id' => $user->id,
                'google2fa_enable' => 0,
                'google2fa_secret' =>$google2fa->generateSecretKey()
            ]);
          
            return redirect('/2fa')->with('success',"Secret key is generated.");
        } catch (Exception $error) {
            Log::info("Settings\TwoFactorController@generate2faSecretCode error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "An error occured generating secret"
            ];
            return $response;
        }
    }

  
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
