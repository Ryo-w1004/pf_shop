<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password','login_time'])]
#[Hidden(['password', 'remember_token'])]

//Model(Laravel の本体。create()、find()、save() などが書いてある)
//  ↑ 受け継ぐ
//Authenticatable(ログインに必要な機能を足したもの)
//  ↑ 受け継ぐ
//User(あなたのプロジェクトのファイル)
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public static function createUser(string $email,string $password)
    {
        return static::create([
            'email'      => $email,
            'password'   => $password,
            'login_time' => now(),
        ]);
    }
}
