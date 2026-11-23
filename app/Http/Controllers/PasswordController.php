<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('passEdit', ['user' => Auth::user()]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            // 1つ目: ルール(何をチェックするか)
            //変数　　　　　　　　　　//ララベルへ渡すメソッド名の文字列
            'current_password' => 'required|current_password',
            'password' => 'bail|required|different:current_password|confirmed|min:6|max:255|regex:/^[a-zA-Z0-9]+$/'

        ],
        [
            // 2つ目: メッセージ(引っかかったら何と表示するか)
            //. は名前に使われない記号なので、区切りとして迷わずに使えます。
            'password.different' => '現在と異なるパスワードを入力してください'
        ]);


        //dd($validated);


        Auth::user()->updatePassword($validated['password']);

        return redirect('/mypage')
            ->with([
                'status_success' => 'パスワード変更は成功しました！'
            ]);
    }
}
