<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->group(function () {
    Route::post('/update', [App\Http\Controllers\Ajax\UserController::class, 'update'])->name('ajax.user.update');
    Route::post('/unique-name', [App\Http\Controllers\Ajax\UserController::class, 'validateUniqueName'])->name('ajax.user.validate.unique.name');
    Route::post('/unique-email', [App\Http\Controllers\Ajax\UserController::class, 'validateUniqueEmail'])->name('ajax.user.validate.unique.email');
    Route::post('/unique-phone-number', [App\Http\Controllers\Ajax\UserController::class, 'validateUniquePhoneNumber'])->name('ajax.user.validate.unique.phone.number');
});
