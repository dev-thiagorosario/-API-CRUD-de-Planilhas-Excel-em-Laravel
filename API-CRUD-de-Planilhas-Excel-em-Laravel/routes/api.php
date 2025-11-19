<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserExportController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::prefix('auth')->group(function (){
    Route::post('register', CreateUserController::class);
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
});


Route::get('export/users', UserExportController::class);
