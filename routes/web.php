<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaController;

Route::get('/{any}', [SpaController::class, 'spa'])->where('any', '.*')->name('main');
