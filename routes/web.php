<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResendLinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return redirect('/home'); });

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('{path}/resend-link/{email}', [ResendLinkController::class, 'index'])
        ->name('resend.link');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

    Route::get('/home', function () { dd(auth()->user()); });
});

