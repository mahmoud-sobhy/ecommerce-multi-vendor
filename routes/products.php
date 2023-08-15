<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::group(['prefix' => 'products'], function () {
            Route::get('index', [ProductController::class, 'index']);
            Route::get('create', [ProductController::class, 'create']);
            Route::post('store', [ProductController::class, 'store']);
            Route::get('edit/{id}', [ProductController::class, 'edit']);
        });

        Route::get('/youtube', [OfferController::class, 'getviewvideo'])->middleware('auth');
    }
);
