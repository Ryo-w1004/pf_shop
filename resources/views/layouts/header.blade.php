
<header>
  <div class="site-width">
    <h1><a href="/">FREEMARKET</a></h1>
    <nav id="top-nav">
      <ul>
          @guest
            <li><a href="/signup" class="btn btn-primary">ユーザー登録</a></li>
            <li><a href="/login">ログイン</a></li>
          @endguest
              @auth
                  <li><a>{{ Auth::user()->email }} でログイン中</a></li>
                  <li><a href="/mypage">マイページ</a></li>
                  <li>
                      <form action="/logout" method="post">
                          @csrf
                          <input type="submit" value="ログアウト">
                      </form>
                  </li>
              @endauth


</ul>
</nav>
</div>
</header>
