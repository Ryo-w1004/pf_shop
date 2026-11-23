<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;


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


    // マイページまわり(今は画面を出すだけ)
    Route::view('/mypage', 'mypage');
    Route::view('/tranSale', 'tranSale');
    Route::view('/profEdit', 'profEdit');
    Route::view('/passEdit', 'passEdit');

    //プロフ編集
    Route::get('/profEdit',[ProfileController::class, 'edit']);
    Route::post('/profEdit',[ProfileController::class, 'update']);

    // 退会
    Route::get('/withdraw', [WithdrawController::class, 'show']);
    Route::post('/withdraw', [WithdrawController::class, 'destroy']);

    // ログアウト(状態を変えるので POST)
    Route::post('/logout', [LoginController::class, 'destroy']);

    //パスワード変更
    Route::get('/passEdit',[PasswordController::class, 'edit']);
    Route::post('/passEdit',[PasswordController::class, 'update']);

});
