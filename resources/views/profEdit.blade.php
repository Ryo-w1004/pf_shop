<?php
$siteTitle = 'ProfEdit';
?>

@include('layouts.head')

<body class="page-profEdit page-2colum page-logined">

<!-- メニュー -->
@include('layouts.header')

<!-- メインコンテンツ -->
<div id="contents" class="site-width">
    <h1 class="page-title">プロフィール編集</h1>
    <!-- Main -->
    <section id="main" >
        <div class="form-container">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="area-msg">
                    @error('common')
                    {{ $message }}
                    @enderror
                </div>
                <label class="<?php if(!empty($err_msg['name'])) echo 'err'; ?>">
                    名前
                    <input type="text" name="name" value="{{ old('name',$user->name) }}">
                </label>
                <div class="area-msg">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
                <label class="<?php if(!empty($err_msg['tel'])) echo 'err'; ?>">
                    TEL<span style="font-size:12px;margin-left:5px;">※ハイフン無しでご入力ください</span>
                    <input type="text" name="tel" value="{{ old('tel',$user->tel) }}">
                </label>
                <div class="area-msg">
                    @error('tel')
                    {{ $message }}
                    @enderror
                </div>
                <label class="<?php if(!empty($err_msg['zip'])) echo 'err'; ?>">
                    郵便番号<span style="font-size:12px;margin-left:5px;">※ハイフン無しでご入力ください</span>
                    <input type="text" name="zip" value="{{ old('zip',$user->zip) }}">
                </label>
                <div class="area-msg">
                    @error('zip')
                    {{ $message }}
                    @enderror
                </div>
                <label class="<?php if(!empty($err_msg['addr'])) echo 'err'; ?>">
                    住所
                    <input type="text" name="addr" value="{{ old('addr',$user->addr) }}">
                </label>
                <div class="area-msg">
                    @error('addr')
                    {{ $message }}
                    @enderror
                </div>
                <label style="text-align:left;" class="<?php if(!empty($err_msg['age'])) echo 'err'; ?>">
                    年齢
                    <input type="number" name="age" value="{{ old('age',$user->age) }}">
                </label>
                <div class="area-msg">
                    @error('age')
                    {{ $message }}
                    @enderror
                </div>
                <label class="<?php if(!empty($err_msg['email'])) echo 'err'; ?>">
                    Email
                    <input type="text" name="email" value="{{ old('email',$user->email) }}">
                </label>
                <div class="area-msg">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('introduction') 'err' @enderror ">
                    自己紹介
                    <input type="text" name="introduction" value="{{ old('email',$user->introduction) }}">
                </label>
                <div class="area-msg">
                    @error('introduction')
                    {{ $message }}
                    @enderror
                </div>

                プロフィール画像
                <label class="area-drop <?php if(!empty($err_msg['pic'])) echo 'err'; ?>" style="height:370px;line-height:370px;">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728" >
                    <input type="file" name="pic" class="input-file" style="height:370px;">
                    <img src=" @if(!empty($user->pic)) {{ asset('storage/'.$user->pic) }}@endif " alt="" class="prev-img" style="@if(empty($user->pic))display:none @endif">
                    ドラッグ＆ドロップ
                </label>
                <div class="area-msg">
                    @error('pic')
                    {{ $message }}
                    @enderror
                </div>
                <div class="btn-container">
                    <input type="submit" class="btn btn-mid" value="変更する">
                </div>
            </form>
        </div>
    </section>

    <!-- サイドバー -->
    @include('layouts.sidebar_mypage')

</div>

<!-- footer -->

@include('layouts.footer')

