<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [Controller\Auth\LoginController::class, 'loginView'])->name('login');
Route::post('/login', [Controller\Auth\LoginController::class, 'login'])->name('auth.login.account');
// Route::post('/login', [Controller\Auth\LoginController::class, 'login'])->name('auth.login.account');
Route::get('/logout', [Controller\Auth\LoginController::class, 'logout'])->name('auth.logout');
Route::get('/account-create', [Controller\UserController::class, 'accountView'])->name('auth.register');



Route::post('/payment', [Controller\Integrations\RaveController::class, 'initialize'])->name('make-payment');
Route::get('/payment-callback', [Controller\Integrations\RaveController::class, 'callback'])->name('users.payment.callback');
Route::get('/transaction-history', [Controller\InvestmentController::class, 'transactionHistory'])->name('users.withdrawal');
Route::post('withdrawal', [Controller\InvestmentController::class, 'withdrawal'])->name('users.withdrawal');
Route::post('/create-users', [Controller\Admin\AdminController::class, 'createUser'])->name('admin.user.create');
Route::get('user-management', [Controller\Admin\AdminController::class, 'userManagement'])->name('admin.user.management');
Route::get('all-users', [Controller\Admin\AdminController::class, 'Users'])->name('user.admin.management');


Route::get('/profile-pics', [Controller\UserController::class, 'profilePics'])->name('user.profile.pics');
Route::get('/profile', [Controller\UserController::class, 'profile'])->name('user.profile');
Route::post('/users/profile-update', [Controller\UserController::class, 'updateProfile'])->name('user.profile.update');
Route::post('/create-account', [Controller\UserController::class, 'createAccount'])->name('auth.register.account');
Route::get('/select-user-type', [Controller\UserController::class, 'selectUserType'])->name('user-type');
Route::post('/password-forgot', [Controller\Auth\ForgotPasswordController::class, 'recoverPassword'])->name('auth.password-recover');
Route::get('/', [Controller\DashboardController::class, 'Dashboard'])->name('user.dashboard');
Route::get('/password-forgot', [Controller\UserController::class, 'forgotPassword'])->name('auth.password-forgot');
Route::get('/profile-settings', [Controller\UserController::class, 'profile'])->name('users.profile');
Route::get('/wallet', [Controller\InvestmentController::class, 'dashboard'])->name('users.wallet');
Route::get('/conversion-rate', [Controller\InvestmentController::class, 'coinUSDConversion'])->name('btc.conversion.rate');
Route::post('/create-invest', [Controller\InvestmentController::class, 'invest'])->name('users.invest');
Route::get('/admin', [Controller\Admin\AdminController::class, 'Dashboard'])->name('admin.dashboard');
Route::get('/settings', [Controller\Settings\SettingsController::class, 'settingsDashboard'])->name('users.settings');
Route::get('/settings/security', [Controller\Settings\SettingsController::class, 'security'])->name('users.settings.security');




Route::group(['prefix'=>'2fa'], function(){
    Route::get('/two-factor-auth', [Controller\Settings\TwoFactorController::class, 'Authentication'])->name('auth.two-factor');
    Route::post('/generateSecret', [Controller\Settings\TwoFactorController::class, 'generate2faSecret'])->name('generate2faSecret');
    Route::post('/enable2fa', [Controller\Settings\TwoFactorController::class, 'enable2fa'])->name('enable2fa');
    Route::post('/disable2fa',[Controller\Settings\TwoFactorController::class, 'disable2fa'])->name('disable2fa');

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
