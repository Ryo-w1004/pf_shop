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
                @csrf
                <div class="area-msg">
                    @error('common')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('name') err @enderror">
                    名前
                    <input type="text" name="name" value="{{ old('name',$user->name) }}">
                </label>
                <div class="area-msg">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('tel') err @enderror">
                    TEL<span style="font-size:12px;margin-left:5px;">※ハイフン無しでご入力ください</span>
                    <input type="text" name="tel" value="{{ old('tel',$user->tel) }}">
                </label>
                <div class="area-msg">
                    @error('tel')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('zip') err @enderror">
                    郵便番号<span style="font-size:12px;margin-left:5px;">※ハイフン無しでご入力ください</span>
                    <input type="text" name="zip" value="{{ old('zip',$user->zip) }}">
                </label>
                <div class="area-msg">
                    @error('zip')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('addr') err @enderror">
                    住所
                    <input type="text" name="addr" value="{{ old('addr',$user->addr) }}">
                </label>
                <div class="area-msg">
                    @error('addr')
                    {{ $message }}
                    @enderror
                </div>
                <label style="text-align:left;" class="@error('age') err @enderror">
                    年齢
                    <input type="number" name="age" value="{{ old('age',$user->age) }}">
                </label>
                <div class="area-msg">
                    @error('age')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('email') err @enderror">
                    Email
                    <input type="text" name="email" value="{{ old('email',$user->email) }}">
                </label>
                <div class="area-msg">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <label class="@error('introduction') err @enderror ">
                    自己紹介
                    <textarea name="introduction">{{ old('introduction',$user->introduction) }}</textarea>
                </label>
                <div class="area-msg">
                    @error('introduction')
                    {{ $message }}
                    @enderror
                </div>

                プロフィール画像
                <label class="area-drop @error('pic') err @enderror" style="height:370px;line-height:370px;">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728" >
                    <input type="file" name="pic" class="input-file" style="height:370px;">
                    <img src="@if(!empty($user->pic)) {{ asset('storage/'.$user->pic) }}@endif " alt="" class="prev-img" style="@if(empty($user->pic))display:none @endif">
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

