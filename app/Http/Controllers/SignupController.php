<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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










//                        //例外処理
//                        try {
//                            // DBへ接続
//                            $dbh = dbConnect();
//                            // SQL文作成
//                            $sql = 'INSERT INTO users (email,password,login_time,create_date) VALUES(:email,:pass,:login_time,:create_date)';
//                            $data = array(':email' => $email, ':pass' => password_hash($pass, PASSWORD_DEFAULT),
//                                ':login_time' => date('Y-m-d H:i:s'),
//                                ':create_date' => date('Y-m-d H:i:s'));
//                            // クエリ実行
//                            $stmt = queryPost($dbh, $sql, $data);
//
//                            // クエリ成功の場合
//                            if($stmt){
//                                //ログイン有効期限（デフォルトを１時間とする）
//                                $sesLimit = 60*60;
//                                // 最終ログイン日時を現在日時に
//                                $_SESSION['login_date'] = time();
//                                $_SESSION['login_limit'] = $sesLimit;
//                                // ユーザーIDを格納
//                                $_SESSION['user_id'] = $dbh->lastInsertId();
//
//                                Log::debug('セッション変数の中身：'.print_r($_SESSION,true));
//
//                                header("Location:mypage.php"); //マイページへ
//                            }
//
//                        } catch (Exception $e) {
//                            error_log('エラー発生:' . $e->getMessage());
//                        }
//
//                    }
//


        return view('signup');
    }
}
