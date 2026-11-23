<?php
$siteTitle = 'パスワード変更';
?>

@include('layouts.head')



<body class="page-passEdit page-2colum page-logined">

@include('layouts.header')

<div id="contents" class="site-width">
    <h1 class="page-title">パスワード変更</h1>

    <section id="main">
        <div class="form-container">
        <form action="" method="post" class="form">
            @csrf
            <div class="area-msg">
                @error('common')
                {{ $message }}
                @enderror
            </div>
            <label class="@error('current_password') err @enderror">
            古いパスワード
            <input type="password" name="current_password">
            </label>
            <div class="area-msg">
                @error('current_password')
                {{ $message }}
                @enderror
            </div>
            <label class="@error('password') err @enderror">
                新しいパスワード
                <input type="password" name="password">
            </label>
            <div class="area-msg">
            @error('password')
            {{ $message }}
            @enderror
            </div>
            <label class="@error('password_confirmation') err @enderror">
                新しいパスワード（再入力）
                <input type="password" name="password_confirmation">
            </label>
            <div>
                <input type="submit" class="btn btn-mid" value="変更する">
            </div>
        </form>
    </div>
    </section>

    @include('layouts.sidebar_mypage')

</div>

@include('layouts.footer')



