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

Route::get('/home', function () {
    return view('index');
})->name('home');

Route::group(['middleware' => ['guest']], function () {
   Route::get('', [\App\Http\Controllers\AuthController::class, 'viewLogin'])->name('show.login');
   Route::get('register', [\App\Http\Controllers\AuthController::class, 'viewRegister'])->name('show.register');
   Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
   Route::get('active-account/{user}/{token}', [\App\Http\Controllers\SendMailController::class, 'activeAccount'])
       ->name('active.account');
   Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
});

Route::get('email', [\App\Http\Controllers\SendMailController::class, 'showEmail'])->name('show.email');
Route::post('send-email', [\App\Http\Controllers\SendMailController::class, 'sendMail'])->name('send.email');
Route::get('identify/{user}/{token}', [\App\Http\Controllers\AuthController::class, 'createPassword'])
    ->name('create.password');
Route::put('update-password/{user}', [\App\Http\Controllers\AuthController::class, 'updatePassword'])
    ->name('update.password');
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
