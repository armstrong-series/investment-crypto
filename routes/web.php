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
Route::get('/logout', [Controller\Auth\LoginController::class, 'logout'])->name('auth.logout');
Route::get('/account-create', [Controller\UserController::class, 'accountView'])->name('auth.register');
Route::post('/create-account', [Controller\UserController::class, 'createAccount'])->name('auth.register.account');
Route::get('/select-user-type', [Controller\UserController::class, 'selectUserType'])->name('user-type');
Route::post('/password-forgot', [Controller\Auth\ForgotPasswordController::class, 'recoverPassword'])->name('auth.password-recover');
Route::get('/', [Controller\DashboardController::class, 'Dashboard'])->name('user.dashboard');
Route::get('/password-forgot', [Controller\UserController::class, 'forgotPassword'])->name('auth.password-forgot');
Route::get('/wallet-tansfer', [Controller\WalletController::class, 'fwalletDashboard'])->name('wallet.transfer');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
