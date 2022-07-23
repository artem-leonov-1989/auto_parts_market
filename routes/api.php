<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth:api')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login')->withoutMiddleware('auth:api');
        Route::post('register', 'register')->withoutMiddleware('auth:api');
        Route::get('logout', 'logout');
        Route::post('refresh', 'refresh');
    });
