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

Route::prefix('/brands')
    ->controller(BrandController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/store', 'store')->middleware('auth:api');
    });

Route::prefix('/categories')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/store', 'store')->middleware('auth:api');
    });

Route::prefix('/types')
    ->controller(TypeController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/store', 'store')->middleware('auth:api');
    });
Route::apiResources([
    'types' => TypeController::class
]);
