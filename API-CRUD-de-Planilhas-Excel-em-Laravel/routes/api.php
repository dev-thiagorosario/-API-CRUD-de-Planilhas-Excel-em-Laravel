<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserExportController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\LogoutController;

Route::prefix('auth')->group(function (){
    Route::post('register', CreateUserController::class);
    Route::post('login', LoginUserController::class);
    Route::post('logout', LogoutController::class);
});


Route::get('/users/export', UserExportController::class);
