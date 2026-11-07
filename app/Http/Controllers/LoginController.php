<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;


class LoginController extends Controller
{

    public function show()
    {
        return view('login');
    }
    public function store(Request $request){

        $request->validate([
            //未入力、//emailの形式、最大文字数チェック、重複//パスワードの半角英数字、最小最大文字数チェック
            'email' => 'bail|required|max:255|email',
            'password' => 'bail|required|min:6|max:255|regex:/^[a-zA-Z0-9]+$/'
        ]);

        if (Auth::attempt(
            $request->only('email','password'),
            $request->boolean('pass_save'))){

            //ログインタイム更新
            Auth::user()->recordLogin();
            $request->session()->regenerate();
            return redirect('/');

        }else{
            return redirect()->back()->withErrors(['common'=>'メールアドレスまたはパスワードが違います。']);
        }
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}






