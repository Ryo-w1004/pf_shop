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
{{--                    <?php--}}
{{--                    if(!empty($err_msg['common'])) echo $err_msg['common'];--}}
{{--                    ?>--}}
                </div>
                <label class="<?php if(!empty($err_msg['name'])) echo 'err'; ?>">
                    名前
                    <input type="text" name="name" value="<?php //echo getFormData('name'); ?>">
                </label>
                <div class="area-msg">
                    <?php
                    if(!empty($err_msg['name'])) echo $err_msg['name'];
                    ?>
                </div>
                <label class="<?php if(!empty($err_msg['tel'])) echo 'err'; ?>">
                    TEL<span style="font-size:12px;margin-left:5px;">※ハイフン無しでご入力ください</span>
                    <input type="text" name="tel" value="<?php //echo getFormData('tel'); ?>">
                </label>
                <div class="area-msg">
                    <?php
                    if(!empty($err_msg['tel'])) echo $err_msg['tel'];
                    ?>
                </div>
                <label class="<?php if(!empty($err_msg['zip'])) echo 'err'; ?>">
                    郵便番号<span style="font-size:12px;margin-left:5px;">※ハイフン無しでご入力ください</span>
                    <input type="text" name="zip" value="<?php //if( !empty(getFormData('zip')) ){ echo getFormData('zip'); } ?>">
                </label>
                <div class="area-msg">
                    <?php
                    if(!empty($err_msg['zip'])) echo $err_msg['zip'];
                    ?>
                </div>
                <label class="<?php if(!empty($err_msg['addr'])) echo 'err'; ?>">
                    住所
                    <input type="text" name="addr" value="<?php //echo getFormData('addr'); ?>">
                </label>
                <div class="area-msg">
                    <?php
                    if(!empty($err_msg['addr'])) echo $err_msg['addr'];
                    ?>
                </div>
                <label style="text-align:left;" class="<?php if(!empty($err_msg['age'])) echo 'err'; ?>">
                    年齢
                    <input type="number" name="age" value="<?php //echo getFormData('age'); ?>">
                </label>
                <div class="area-msg">
                    <?php
                    if(!empty($err_msg['age'])) echo $err_msg['age'];
                    ?>
                </div>
                <label class="<?php if(!empty($err_msg['email'])) echo 'err'; ?>">
                    Email
                    <input type="text" name="email" value="<?php //echo getFormData('email'); ?>">
                </label>
                <div class="area-msg">
                    <?php
                    if(!empty($err_msg['email'])) echo $err_msg['email'];
                    ?>
                </div>
                プロフィール画像
                <label class="area-drop <?php if(!empty($err_msg['pic'])) echo 'err'; ?>" style="height:370px;line-height:370px;">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                    <input type="file" name="pic" class="input-file" style="height:370px;">
                    <img src="<?php //echo getFormData('pic'); ?>" alt="" class="prev-img" style="<?php //if(empty(getFormData('pic'))) echo 'display:none;' ?>">
                    ドラッグ＆ドロップ
                </label>
                <div class="area-msg">
                    <?php
                    if(!empty($err_msg['pic'])) echo $err_msg['pic'];
                    ?>
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

