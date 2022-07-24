<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\TypeController;


Route::middleware('auth:api')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login')->withoutMiddleware('auth:api');
        Route::post('register', 'register')->withoutMiddleware('auth:api');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::get('role', 'role');
    });

Route::apiResources([
    'brands' => BrandController::class,
    'parts' => PartController::class,
    'categories' => CategoryController::class,
    'types' => TypeController::class
]);
