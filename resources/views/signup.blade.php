<?php $siteTitle = 'ユーザー登録'; ?>
@include('layouts.head')

<body class="page-signup page-1colum">

<!-- ヘッダー -->

@include('layouts.header')


    <!-- メインコンテンツ -->
<div id="contents" class="site-width">

    <!-- Main -->
    <section id="main" >

        <div class="form-container">

            <form action="/signup" method="post" class="form">
                @csrf
                <h2 class="title">ユーザー登録</h2>

                <div class="area-msg">
                    @error('common')
                    {{ $message }}
                    @enderror
                </div>

                <label class="@error('email') err @enderror">
                    Email
                    <input type="text" name="email" value="{{ old('email')}}">
                </label>
                <div class="area-msg">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>

                <label class="@error('password') err @enderror" >
                    パスワード <span style="font-size:12px">※英数字６文字以上</span>
                    <input type="password" name="password">
                </label>
                <div class="area-msg">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('password_confirmation') err @enderror">

                    パスワード（再入力）
                    <input type="password" name="password_confirmation">
                </label>
                <div class="area-msg">
                    @error('password_confirmation')
                    {{ $message }}
                    @enderror

                </div>
                <div class="btn-container">
                    <input type="submit" class="btn btn-mid" value="登録する">
                </div>
            </form>
        </div>

    </section>

</div>

<!-- footer -->
@include('layouts.footer')

