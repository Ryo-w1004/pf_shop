<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class SignupController extends Controller
{
    //画面を表示する関数(GET のとき)
    public function show()
    {
        return view('signup');
    }
    //送信された値を処理する関数(POST のとき)
    public function store(Request $request)
    {

        Log::debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
        Log::debug('「　ユーザー登録ページ　');
        Log::debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
        Log::debug('ユーザー登録ページ');
        var_dump($request->all());

        //post送信されていた場合
        $request->validate([
            //未入力、//emailの形式、最大文字数チェック、重複//パスワードの半角英数字、最小最大文字数チェック
            'email' => 'bail|required|max:255|email|unique:users,email',
            'password' => 'bail|required|min:6|max:255|regex:/^[a-zA-Z0-9]+$/',
            'password_confirmation' => 'bail|required|same:password'

        ]);

        $user = User::createUser($request->email, $request->password);
        auth()->login($user);
        $request->session()->regenerate();
        return redirect('mypage');
    }
}
