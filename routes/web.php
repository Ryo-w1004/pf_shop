<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;



Route::get('/signup', [SignupController::class, 'show']);
Route::post('/signup', [SignupController::class, 'store']);
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);


Route::get('/', function () {
    return view('index');
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

