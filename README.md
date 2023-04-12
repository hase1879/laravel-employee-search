
# 制作背景

”社員名簿”と”座席管理”を組み合わせ、どの席に社員が座っているか探す、シンプルなサービスとなります。

背景として、座席のフリーアドレス化、コロナによる在宅と、自由な働き方が求められる一方で、自由に働く社員がどこにいるのかわからないケースがあります。

例えば、予算書類について、総務部の田口さんに話を聞きたいことがあるとします。そこで、総務部に着いても、「田口さんはどこにいますか…?」と探す手間が発生します。

そこで、本アプリにて、社員を検索すれば、いち早く、座席位置を割り出すサービスを作成しました。

# **使用技術**

### バックエンド

PHP 8.1.10 / Laravel 9.52.0

### フロントエンド

HTML / CSS / javascript / Bootstrap5

### インフラ

mysql  / AWS(EC2, S3, RDS, Route 53, ELB, ACM)

### その他の使用技術

git(gitHub) / Visual Studio Code / Drawio(ER図・AWS構成図)
phpMyadmin(SQLクライアントツール)

# 機能一覧

1. アカウント登録機能
2. アカウント削除機能(未)(LaravelAdmin)
3. ログイン機能
4. ゲストユーザーログイン機能
5. ログアウト機能
6. 社員名簿検索機能(Grid.js)
7. 社員追加機能(LaravelAdmin)
8. 社員名簿ソート機能(CRUD)
9. 社員名簿一覧(CRUD)
10. 社員詳細モーダル表示機能(Bootstrap,jQuery)
11. 座席詳細モーダル表示機能(Bootstrap,jQuery)
12. 座席表検索機能(CRUD)
13. 座席表表示機能(CRUD)
14. 座席者表示機能(CRUD)
15. マイページ編集機能(CRUD)

# **何ができるのか**

## １．トップページ
![230409_Topページ](https://user-images.githubusercontent.com/117082016/231430862-3a061d1a-3ff8-45a4-b7ed-58ec9d13f274.gif)
# ReadMe

### 参考

[https://github.com/oga0927/Book_Library_Vue.js](https://github.com/oga0927/Book_Library_Vue.js)

# 以下、本文↓

### EmployeeSearch（Topページ）：[http://127.0.0.1:8000/](http://127.0.0.1:8000/)

※ゲストログインボタンで簡単にログインできます。

![Untitled](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/6a3690c0-f369-4d86-8e59-84318013fb71/Untitled.png)

# 制作背景

”社員名簿”と”座席管理”を組み合わせ、どの席に社員が座っているか探す、シンプルなサービスとなります。

背景として、座席のフリーアドレス化、コロナによる在宅と、自由な働き方が求められる一方で、自由に働く社員がどこにいるのかわからないケースがあります。

例えば、予算書類について、総務部の田口さんに話を聞きたいことがあるとします。そこで、総務部に着いても、「田口さんはどこにいますか…?」と探す手間が発生します。

そこで、本アプリにて、社員を検索すれば、いち早く、座席位置を割り出すサービスを作成しました。

# **ER 図**

![136C4944-1A3B-4FB7-9D05-DDDB0CE3D67F.png](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/f0f5f024-d4eb-445c-86d4-efd6ba7ac73b/136C4944-1A3B-4FB7-9D05-DDDB0CE3D67F.png)

# **インフラ構成図**

![C25C6DED-257E-42B5-90AC-04588E90B0E2.png](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/0839f72b-9184-41c4-bf39-a9d579973c19/C25C6DED-257E-42B5-90AC-04588E90B0E2.png)

# **使用技術**

### バックエンド

PHP 8.1.10 / Laravel 9.52.0

### フロントエンド

HTML / CSS / javascript / Bootstrap5

### インフラ

mysql  / AWS(EC2, S3, RDS, Route 53, ELB, ACM)

### その他の使用技術

git(gitHub) / Visual Studio Code / Drawio(ER図・AWS構成図)
phpMyadmin(SQLクライアントツール)

# 機能一覧

1. アカウント登録機能
2. アカウント削除機能(未)(LaravelAdmin)
3. ログイン機能
4. ゲストユーザーログイン機能
5. ログアウト機能
6. 社員名簿検索機能(Grid.js)
7. 社員追加機能(LaravelAdmin)
8. 社員名簿ソート機能(CRUD)
9. 社員名簿一覧(CRUD)
10. 社員詳細モーダル表示機能(Bootstrap,jQuery)
11. 座席詳細モーダル表示機能(Bootstrap,jQuery)
12. 座席表検索機能(CRUD)
13. 座席表表示機能(CRUD)
14. 座席者表示機能(CRUD)
15. マイページ編集機能(CRUD)

# **何ができるのか**

## １．トップページ

![230409_Topページ.gif](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/3b87de27-fdf9-42c1-877a-aca5203969ef/230409_Top%E3%83%9A%E3%83%BC%E3%82%B8.gif)

- 最初にアクセスするとアプリの紹介画面が表示されます。（非ログイン）
- ヘッダーロゴを押すと、トップページへリダイレクト。

## ２．ユーザー認証

- LaravelUIにて実装しています。
- 登録時、メールアドレスと連携して登録されます。
- ユーザー登録の有無を判別し、ログインページへリダイレクトかけます。

## ３．社員の着席位置を検索

1. 社員一覧ページにて、「部署のカテゴリによる絞り込み / キーワード検索」から該当の社員を　　検索。（参考：３－１．社員一覧ページ）
2. 該当の座席表ページがモーダルウィンドウで表示され、着席位置を確認できる。（参考：３－２．座席表ページ）

## ３－１．社員一覧ページ

３－１－１．社員一覧を**表形式**で表示（Grid.js）

３－１－２．各種詳細が**モーダルウィンドウ**表示（Bootstrap＋jQuery(＋Grid.js)）

３－１－３．サイドメニューで**部署の絞り込み**

３－１－４．絞り込んだ部署に社員がいない時に、エラー表示（**例外処理**）
<img width="513" alt="社員一覧ページ" src="https://user-images.githubusercontent.com/117082016/231432041-432c7dbe-9f8e-4278-8225-0cf9cfb3e7f6.png">

### ３－１－１．社員一覧を**表形式**で表示（Grid.js）

①Grid.jsを使用し、社員一覧表を表示。
②クリックするとモーダル表示

```php


*【コード概要】*
DOMのリロード後、
	①HTMLのtable要素からデータ取得（jQuery）
	②Grid.jsにてデータ成形。
	③HTMLにデータを戻し、表示。
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

●resources\view\seets

{{-- grid.jsにて再出力 --}}
<div id="sample-table-wrapper"></div>

{{-- 
・テーブルデータ
・Grid.jsでレンダリングするので"display:none;"とする
--}}
<table id="sample-table" style="display:none;">
    <thead>
        <tr>
            <th>氏名</th>
						～省略～                     
    </thead>
    <tbody>
        @foreach($employee_list as $employee)
        <tr>
            <td><a class="employees-show-link" href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a></td>
            ～省略～
        </tr>
        @endforeach
    </tbody>
</table>

●public\js\employee-grid.js

// DOM読み込み後、ルート要素（document）からtableタグを取得
document.addEventListener('DOMContentLoaded', function () {
		//Grid.jsを用いた表データの作成
		const grid = new gridjs.Grid({
					// table要素を取得
          from: document.getElementById("sample-table"),
					// データ成形
          pagination: {
              limit: 10
          },
          search: true,
          sort: true,
          fixedHeader: true,
          height: '700px',
          style: {
              td: {
                  border: '1px solid #ccc',
              },
              th: {
                  color: "rgb(0, 0, 0)",
                  border: '1px solid #ccc',
                  'background-color': 'rgba(93, 193, 255, 0.267)',
              },
              table: {
                  'font-size': '15px',
                  'white-space': 'nowrap'
              }
          }
		// HTMLの"sample-table-wrapper"へ出力
    }).render(document.getElementById("sample-table-wrapper"));
});


```

