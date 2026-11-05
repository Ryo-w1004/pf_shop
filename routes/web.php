<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;



route::get('/signup', [SignupController::class, 'show']);
route::post('/signup', [SignupController::class, 'store']);


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

