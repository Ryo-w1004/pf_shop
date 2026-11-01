
<?php
$siteTitle = 'HOME';
?>
@include('layouts.head')

  <body class="page-home page-2colum">

    <!-- ヘッダー -->
    @include('layouts.header')
    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">

      <!-- サイドバー -->
      <section id="sidebar">
        <form name="" method="get">
          <h1 class="title">カテゴリー</h1>
          <div class="selectbox">
            <span class="icn_select"></span>
            <select name="c_id" id="">
{{--              <option value="0" <?php if(getFormData('c_id',true) == 0 ){ echo 'selected'; } ?> >選択してください</option>--}}
              <?php
//                foreach($dbCategoryData as $key => $val){
              ?>
{{--                <option value="<?php echo $val['id'] ?>" <?php if(getFormData('c_id',true) == $val['id'] ){ echo 'selected'; } ?> >--}}
{{--                  <?php echo $val['name']; ?>--}}
{{--                </option>--}}
              <?php
//                }
                ?>
            </select>
          </div>
          <h1 class="title">表示順</h1>
          <div class="selectbox">
            <span class="icn_select"></span>
            <select name="sort">
{{--              <option value="0" <?php if(getFormData('sort',true) == 0 ){ echo 'selected'; } ?> >選択してください</option>--}}
{{--              <option value="1" <?php if(getFormData('sort',true) == 1 ){ echo 'selected'; } ?> >金額が安い順</option>--}}
{{--              <option value="2" <?php if(getFormData('sort',true) == 2 ){ echo 'selected'; } ?> >金額が高い順</option>--}}
            </select>
          </div>
          <input type="submit" value="検索">
        </form>

      </section>

      <!-- Main -->
      <section id="main" >
        <div class="search-title">
          <div class="search-left">
{{--            <span class="total-num"><?php echo sanitize($dbProductData['total']); ?></span>件の商品が見つかりました--}}
          </div>
          <div class="search-right">
{{--            <span class="num"><?php echo (!empty($dbProductData['data'])) ? $currentMinNum+1 : 0; ?></span> - <span class="num"><?php echo $currentMinNum+count($dbProductData['data']); ?></span>件 / <span class="num"><?php echo sanitize($dbProductData['total']); ?></span>件中--}}
          </div>
        </div>
        <div class="panel-list">
         <?php
//            foreach($dbProductData['data'] as $key => $val):
          ?>
{{--            <a href="productDetail.php<?php echo (!empty(appendGetParam())) ? appendGetParam().'&p_id='.$val['id'] : '?p_id='.$val['id']; ?>" class="panel">--}}
              <div class="panel-head">
{{--                <img src="<?php echo sanitize($val['pic1']); ?>" alt="<?php echo sanitize($val['name']); ?>">--}}
              </div>
              <div class="panel-body">
{{--                <p class="panel-title"><?php echo sanitize($val['name']); ?> <span class="price">¥<?php echo sanitize(number_format($val['price'])); ?></span></p>--}}
              </div>
{{--            </a>--}}
          <?php
//            endforeach;
//          ?>
        </div>

        <!----><?php //pagination($currentPageNum, $dbProductData['total_page']); ?><!---->

      </section>

    </div>

    <!-- footer -->

      @include('layouts.footer')

