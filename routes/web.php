<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['guest']], function () {
   Route::get('login', [\App\Http\Controllers\AuthController::class, 'viewLogin'])->name('show.login');
   Route::get('register', [\App\Http\Controllers\AuthController::class, 'viewRegister'])->name('show.register');
   Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
   Route::get('active-account/{user}/{token}', [\App\Http\Controllers\SendMailController::class, 'activeAccount'])
       ->name('active.account');
});

