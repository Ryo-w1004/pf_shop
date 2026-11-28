# つまずきログ

pf-shop を作る中でつまずいたことと、原因・解決・学んだことの記録。
新しいものを上に追加していく。

| 項目 | 書くこと |
|---|---|
| 症状 | 何が起きたか(エラーメッセージや画面の様子) |
| 原因 | なぜ起きたか |
| 解決 | どう直したか |
| 学び | 次から何に気をつけるか |

---

### APP_TIMEZONE を入れたのに時刻が9時間ずれる
- **症状**: Seeder で入れたデータの created_at が UTC(日本時間の9時間前)になっていた
- **原因**: .env に APP_TIMEZONE=Asia/Tokyo を書いていたが、config/app.php の timezone が 'UTC' で固定されていて、.env を読んでいなかった
- **解決**: config/app.php の timezone を env('APP_TIMEZONE', 'UTC') の形にした
- **学び**: .env は config/ のファイルが env() で読んで初めて効く。.env を変えて効かないときは、config/ 側を見る


## パスワード変更

### 入力欄の name を取り違えた
- **症状**: 新しいパスワードの欄に `name="current_password"` を付けていた
- **原因**: `current` が「今の(=古い)パスワード」という意味だと意識していなかった
- **解決**: 古い欄 = `current_password`、新しい欄 = `password`、再入力 = `password_confirmation` に直した
- **学び**: name・バリデーションのキー・`@error()` の3か所はそろえる。名前の意味を英語で確かめる

### `</body>` を footer の前に書いていた
- **症状**: `</body>` が2回出る/フッターが body の外に出る状態だった
- **原因**: `layouts/footer.blade.php` の中にすでに `</body></html>` があった
- **解決**: ページ側の `</body>` を消した
- **学び**: 共通パーツに何が含まれているかを把握してから書く

## プロフィール編集(Lesson 14)

### `@error()` に input の type を書いていた
- **症状**: TEL などでエラーになっても欄が赤くならない
- **原因**: `@error('text')` と、name ではなく type を書いていた
- **解決**: `@error('tel')` のように name に合わせた
- **学び**: `@error()` の中は name 属性の値

### `@error` の中の `'err'` に引用符を付けていた
- **症状**: エラー時に CSS の `.err` が当たらない
- **原因**: `@error`〜`@enderror` の間の文字はそのまま出力されるので `class="'err'"` になっていた
- **解決**: 引用符を外して `err` にした
- **学び**: Blade のディレクティブの間は「そのまま出る文字」

### `<textarea>` に value を書いていた
- **症状**: 保存した自己紹介が編集画面に出ない
- **原因**: `<textarea>` には value 属性がない
- **解決**: 値を開始タグと終了タグの間に書いた
- **学び**: input と textarea で値の書き方が違う

### 縦長の画像でボタンが隠れた
- **症状**: 画像をドロップすると「変更する」ボタンが消える
- **原因**: プレビュー画像が `position: absolute` で、枠(370px)からはみ出してボタンに重なった
- **解決**: `pf-shop.css` で `.area-drop` に `overflow`、`.prev-img` に高さと `object-fit` を指定
- **学び**: absolute の要素はほかの要素を押しのけず、重なる

### 古い画像を消す順番
- **症状**: (設計時に気づいた)古い画像を先に消すと、DB 更新に失敗したとき画像が壊れる
- **原因**: 「消す → 更新」の順だった
- **解決**: DB を更新してから古い画像を消すように並べ替えた
- **学び**: 新しいものを確実に保存してから、古いものを捨てる

### 画像を選ばずに保存すると pic が消える
- **症状**: (設計時に気づいた)`$validated['pic']` に null が入る
- **原因**: ファイルなしで送信すると pic が null として残る
- **解決**: `hasFile()` が false のとき `unset($validated['pic'])`
- **学び**: `$request` は読むだけ、整えるのは `$validated`

### `else` の中で `$request->file('pic')` を使おうとした
- **症状**: 書き方が分からなくなった
- **原因**: else に来るのは「ファイルがないとき」なので、`file('pic')` は空
- **解決**: else では `$validated` のほうを操作した
- **学び**: 空のものに `->` で頼むことはできない

### `store()` の戻り値を受け取っていなかった
- **症状**: 画像ファイルは保存されるのに DB の pic が変わらない
- **原因**: `store()` が返すパスを捨てていた
- **解決**: `$validated['pic'] = ...->store('profile', 'public')`
- **学び**: メソッドの戻り値を使うかどうかを意識する

### バリデーションのルールの引用符がずれた
- **症状**: `'...png'|'max:3072'` と書いていた
- **原因**: 文字列の外の `|` は PHP のビット演算になる
- **解決**: ルール全体を1本の文字列にした
- **学び**: ルールは `'a|b|c'` の1本の文字列、または配列

### 画像の URL が 403 になった
- **症状**: `/storage/profile/med.jpg` が 403 Forbidden
- **原因**: 画像を `storage/profile/` に置いていた。`storage:link` の先は `storage/app/public/`
- **解決**: `storage/app/public/profile/` に移した
- **学び**: 公開する画像は `storage/app/public/` に置く

### `digits` に桁数を書き忘れた
- **症状**: `Validation rule digits requires at least 1 parameters.`(500 エラー)
- **原因**: `'nullable|digits'` と桁数がなかった
- **解決**: `digits:7` にした。`max500` も `max:500` に直した
- **学び**: `nullable` が見逃すのは「空の入力値」。ルールの書き間違いは見逃さない

### バリデーションを Model に入れてしまった
- **症状**: `User::updateProfile($request)` の中で validate していた
- **原因**: 「User にメソッドを作る」を、入力チェックごと移すことだと考えた
- **解決**: validate はコントローラーに戻し、Model には `$validated` を渡すだけにした
- **学び**: 入力チェックはコントローラー、業務のルールは Model。Model は画面の都合(`$request`)を知らなくていい

### `User::updateProfile()` と static で呼んだ
- **症状**: 更新できない
- **原因**: `$this` を使うメソッドを、クラスに対して呼んだ
- **解決**: `Auth::user()->updateProfile($validated)` にした
- **学び**: 「呼ぶ時点で対象のユーザーが手元にいるか」。いれば `$user->`、いなければ `User::`

### コントローラーで `$this->update()` を呼んだ
- **症状**: (書いた時点で気づいた)自分自身を呼び続けて終わらない
- **原因**: コントローラーの中の `$this` はコントローラー
- **解決**: `Auth::user()->...` に直した
- **学び**: `$this` は「今書いているクラス自身」

### `#[Fillable]` に zip がなく、deleted_at が入っていた
- **症状**: 郵便番号を入力しても保存されない
- **原因**: Fillable にない項目は黙って捨てられる。deleted_at を入れるのは危険
- **解決**: zip と pic を足し、deleted_at を消した
- **学び**: Fillable は書き込みの許可リスト。入れてはいけないものもある

### `update` で view を返していた
- **症状**: POST 後に `Undefined variable $user`
- **原因**: POST の処理の最後で、$user を渡さずに view を返していた
- **解決**: `redirect('/mypage')` にした(PRG パターン)
- **学び**: POST の処理の最後はリダイレクト

### ルートの書き方
- **症状**: `Target class [edit] does not exist` → `WithdrawController::edit()` がない → `Target class [ProfileController] does not exist`
- **原因**: `'edit'` だけを渡した/退会の行をコピーしてコントローラー名が残った/`use` がなかった
- **解決**: `[ProfileController::class, 'edit']` にして、web.php の先頭に `use` を足した
- **学び**: エラー文の `○○::△△()` は「○○ クラスに △△ がない」。`[○○] does not exist` で名前空間が付いていなければ `use` を疑う

### マイグレーションの down() の書き間違い
- **症状**: down() が up() と同じ/`Schema::dropIfExists('introduction')` と書いた
- **原因**: カラムを消すメソッドと、テーブルを消すメソッドを混同した
- **解決**: `$table->dropColumn('introduction')` にした
- **学び**: `Schema::` はテーブル単位、`$table->` はカラム単位

## レイアウト

### サイドバーがずれる(マイページ)
- **症状**: サイドバーの位置が崩れる
- **原因**: `<div id="contents">` が二重になっていて、閉じタグも足りなかった
- **解決**: 1つにした
- **学び**: id は1ページに1つ。閉じタグの深さをインデントでそろえる

### サイドバーがずれる(トップ)
- **症状**: トップページのサイドバーが崩れる
- **原因**: 検索用サイドバーに加えて、マイページ用サイドバーも include していた
- **解決**: トップから `sidebar_mypage` の include を消した
- **学び**: 2カラムのレイアウトにサイドバーは1つ

## 退会(Lesson 13)

### 退会しても deleted_at が入らない
- **症状**: `update(['deleted_at' => now()])` が効かない
- **原因**: Fillable にない項目は黙って捨てられる
- **解決**: SoftDeletes を使い `$this->delete()` にした
- **学び**: 論理削除は `delete()` に任せる

### `User::withdraw()` を static で呼んだ
- **症状**: 退会処理が動かない
- **原因**: 特定のユーザーに対する処理なのに、クラスに頼んでいた
- **解決**: `Auth::user()->withdraw()`
- **学び**: (プロフィール編集でも同じことをした。要注意)

## ログイン・会員登録(Lesson 09〜12)

### Route [login] not defined / リダイレクトのループ
- **症状**: ログインしていないときにエラー、またはページがループする
- **原因**: `->name('login')` を GET /login 以外にも付けていた
- **解決**: GET /login だけに付けた
- **学び**: ルート名・URL・メソッド名・ビュー名は別物

### `session_regenerate_id()` が効かない
- **症状**: セッション ID が変わらない
- **原因**: Laravel は PHP 標準のセッションを使っていない
- **解決**: `$request->session()->regenerate()`
- **学び**: Laravel のやり方があるものは、そちらを使う

### 時刻が 9時間ずれる
- **症状**: login_time などが日本時間とずれる
- **原因**: タイムゾーンが UTC のままだった
- **解決**: `.env` に `APP_TIMEZONE=Asia/Tokyo`
- **学び**: 設定は `.env` で環境ごとに変えられる

## 環境・Git

### Composer がエラーになる
- **症状**: PHP のバージョンが合わないエラー
- **原因**: ターミナルのタブが PHP 7.4 のままだった
- **解決**: `use84` で 8.4 に切り替えた
- **学び**: タブごとに `php -v` で確認する

### git push が拒否された
- **症状**: `rejected` で push できない
- **原因**: GitHub 上で README を編集していて、Mac と GitHub のブランチが枝分かれしていた
- **解決**: `git pull --no-rebase` でマージしてから push
- **学び**: GitHub 上で直接編集すると枝分かれが起きる




*2026_11_23------
### validate() にメッセージの文を書いてしまった
- **症状**: `Method Validator::validateパスワードを変更してください does not exist`
- **原因**: validate() の1つ目の配列(ルール)に、表示したいメッセージを書いていた。1つ目の配列の値は、すべてルール名として読まれる
- **解決**: ルールは1つ目の配列、メッセージは2つ目の配列に `'欄の名前.ルール名' => '文'` の形で書いた
- **学び**: `=>` の左は欄の名前(キー)、右はルール名の文字列。Laravel はルール名を見て validate○○ メソッドを呼ぶ

### dd($request->$validated) でエラー
- **症状**: `Array to string conversion`
- **原因**: `->` のあとに変数を書くと、その中身を名前として使う意味になる。$validated は配列なので名前にできない
- **解決**: `dd($validated)` にした
- **学び**: $validated は $request の中身ではなく、validate() が返した独立した変数

### 同じパスワードで変更できてしまった
- **症状**: 新旧同じパスワードでも変更が成功した
- **原因**: validate() に password の形式チェックしか書いておらず、current_password・different・confirmed のルールがなかった
- **解決**: current_password に `required|current_password`、password に `different:current_password|confirmed` を足した
- **学び**: 決めたルールが全部コードに入っているか、表と見比べて確認する。古いパスワードのチェックがないと、他人がパスワードを変えられてしまう

### README の Merge conflict
- **症状**: PR #4 に「Merge conflicts」と出た
- **原因**: README を GitHub 上で main に直接書いたあと、Mac の feature/password でも同じ場所を書いて push した
- **解決**: GitHub の Resolve conflicts で「Accept current change」(feature/password の版)を選び、Mark as resolved → Commit merge。その後 Mac で git pull
- **学び**: ファイルの編集は Mac の作業ブランチでだけやる。GitHub 上で main を直接編集しない
