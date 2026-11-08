<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('top');
});

Route::middleware('guest')->group(function () {

    Route::get('/signup', [SignupController::class, 'show']);
    Route::post('/signup', [SignupController::class, 'store']);
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

});



Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'destroy']);
    Route::get('/mypage', function () {
        return view('mypage');
    });

    Route::get('/tranSale', function () {
        return view('tranSale');
    });
    Route::get('/profEdit', function () {
        return view('profEdit');
    });
    Route::get('/withdraw', function () {
        return view('withdraw');
    });
    Route::get('/passEdit', function () {
        return view('passEdit');
    });

});
