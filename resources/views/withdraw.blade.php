
<?php
$siteTitle = '退会';
?>
@include('layouts.head')

<body class="page-withdraw page-1colum">

@include('layouts.header')


<!-- メニュー -->

    <!-- メインコンテンツ -->
<div id="contents" class="site-width">
    <!-- Main -->
    <section id="main" >
        <div class="form-container">
            <form action="/withdraw" method="post" class="form">
                @csrf
                <h2 class="title">退会</h2>
                <div class="area-msg">
                   @error('common')
                    {{ $message }}
                    @enderror
                </div>
                <div class="btn-container">
                    <input type="submit" class="btn btn-mid" value="退会する">
                </div>
            </form>
        </div>
        <a href="/mypage">&lt; マイページに戻る</a>
    </section>
</div>

@include('layouts.footer')
