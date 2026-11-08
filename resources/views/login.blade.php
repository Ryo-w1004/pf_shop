<?php $siteTitle = 'ログイン'; ?>

@include('layouts.head')

<body class="page-login page-1colum">

@include('layouts.header')


<p id="js-show-msg" style="display:none;" class="msg-slide">
{{--    <?php echo getSessionFlash('msg_success'); ?>--}}
</p>

<!-- メインコンテンツ -->
<div id="contents" class="site-width">

    <!-- Main -->
    <section id="main" >

        <div class="form-container">

            <form action="/login" method="post" class="form">
                @csrf
                <h2 class="title">ログイン</h2>

                <div class="area-msg">
                    @error('common')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('email') err @enderror">
                    メールアドレス
                    <input type="text" name="email" value="{{ old('email') }}">
                </label>
                <div class="area-msg">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('password') err @enderror">
                    パスワード
                    <input type="password" name="password">
                </label>
                <div class="area-msg">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <label>
                    <input type="checkbox" name="pass_save">次回ログインを省略する
                </label>
                <div class="btn-container">
                    <input type="submit" class="btn btn-mid" value="ログイン">
                </div>
                パスワードを忘れた方は<a href="">コチラ</a>
            </form>
        </div>

    </section>

</div>

@include('layouts.footer')
