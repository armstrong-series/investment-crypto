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

Route::get('/reset-password/{token}', [Controller\Auth\ResetPasswordController::class, 'resetPassword'])->name('auth.reset-password');
Route::post('/reset-password', [Controller\Auth\ResetPasswordController::class,'updatePassword'])->name('auth.update-password');

// Route::post('/payment', [Controller\Integrations\RaveController::class, 'initialize'])->name('make-payment');
// Route::get('/payment-callback', [Controller\Integrations\RaveController::class, 'callback'])->name('users.payment.callback');


Route::get('/transaction-history', [Controller\InvestmentController::class, 'transactionHistory'])->name('users.transaction-history');

Route::post('/withdrawal', [Controller\InvestmentController::class, 'withdrawal'])->name('users.withdrawal');
Route::post('/create-users', [Controller\Admin\AdminController::class, 'createUser'])->name('admin.user.create');
Route::post('/users-update', [Controller\Admin\AdminController::class, 'updateUser'])->name('admin.user.update');
Route::delete('/delete-user/{id}', [Controller\Admin\AdminController::class, 'deleteUser'])->name('admin.user.delete');
Route::get('/user-management', [Controller\Admin\AdminController::class, 'userManagement'])->name('admin.user.management');
Route::get('/all-users', [Controller\Admin\AdminController::class, 'Users'])->name('user.admin.management');

Route::post('/create-post', [Controller\Admin\AssetsController::class, 'createAssets'])->name('admin.create.assets');
Route::post('/update-post', [Controller\Admin\AssetsController::class, 'updateAssets'])->name('admin.update.assets');

Route::get('/admin/transactions', [Controller\Admin\TransactionController::class, 'getUserstransactions'])->name('admin.transactions');
Route::get('/transactions', [Controller\Admin\TransactionController::class, 'transactions'])->name('all-transactions');
Route::post('/transaction/confirmed/', [Controller\Admin\TransactionController::class, 'confirmTransaction'])->name('admin.approve.transaction');
Route::get('/transaction-details/{txn_id}', [Controller\Admin\TransactionController::class, 'transactionDetails'])->name('transaction-details');
Route::delete('/delete-transaction/{txn_id}',  [Controller\Admin\TransactionController::class, 'deleteTransaction'])->name('admin.transaction.delete');

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
Route::get('/asset',  [Controller\Admin\AssetsController::class, 'assetsPreview'])->name('admin.assets');
Route::get('/assets-image/{file}', [Controller\Admin\AssetsController::class, 'assetsFile'])->name('assets-file');
Route::delete('/delete-thumbnail/{id}', [Controller\Admin\AssetsController::class, 'deleteThumbnail'])->name('assets-thumbnail-delete');



    // Route::get('/settings/auth/2fa', [Controller\Settings\TwoFactorController::class, 'authentication'])->name('auth.two-factor');
    // Route::post('/generateSecret', [Controller\Settings\TwoFactorController::class, 'generate2faSecret'])->name('generate2faSecret');
    Route::post('/generateSecret', ['uses' =>  [Controller\Settings\SettingsController::class, 'generate2faSecretCode'],
        'as' => 'generateSecretCode'
    ]);

    Route::post('/enable2fa', ['uses' =>  [Controller\Settings\SettingsController::class, 'enable2fa'],
    'as' => 'enable2fa'
    ]);

    Route::post('/disable2fa', ['uses' =>  [Controller\Settings\SettingsController::class, 'disable2fa'],
        'as' => 'disable2fa'
    ]);


