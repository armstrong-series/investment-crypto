<?php

namespace App\Http\Controllers\Settings;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log, Auth, Exception, Dotenv\Validator;

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


    public function security()
    {
        try {

            $user = User::where(['id' => Auth::id()])->get();
            $data = [
                'user' => $user,
                'page' => 'settings-dashboard',
                'subs' => '',
            ];
            return view('Settings.security', $data);

        } catch (Exception $error) {
            Log::info("Settings\SettingsController@security error message:" . $error->getMessage());
            $response = [
                'status' =>false,
                "message" => "Encountered an error"
            ];
            return $response;
        }
    }
}
