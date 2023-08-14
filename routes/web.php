<?php

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAge;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('getdatabytrait', [UserController::class, 'index']);


//***routs of offers***/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){ 

        Route::group(['prefix'=>'offers'], function(){
            // Route::get('store', [OfferController::class, 'store']);
            Route::get('/index', [OfferController::class, 'index'])->name('offers.index');
            Route::get('/create', [OfferController::class, 'create']);
            Route::post('/store', [OfferController::class, 'store']);
            Route::get('/edit/{id}', [OfferController::class, 'edit']);
            Route::post('/update/{id}', [OfferController::class, 'update']);
            Route::get('/destroy/{id}', [OfferController::class, 'destroy']);
        });

    });


//***routs of products***/
// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth' ]
//     ], function(){ 

//         Route::group(['prefix'=>'products'], function(){
//             // Route::get('store', [OfferController::class, 'store']);
//             Route::get('create', [ProductController::class, 'create']);
//             Route::post('store', [ProductController::class, 'store']);
//         });

//         Route::get('/youtube', [OfferController::class, 'getviewvideo']);
//     });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




##################### begin authentication && guards #################

Route::group(['middleware' => 'CheckAge']  , function(){

    Route::get('adults', [CustomAuthController::class, 'adult'])->name('adult');

});

Route::get('/notadult', function () {
    return 'you are not adult';
})->name('notadult');
##################### end authentication && guards #################
