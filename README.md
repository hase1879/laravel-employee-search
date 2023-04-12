
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

１．トップページ

２．ホームページ

３．社員一覧

- ３－１－１．社員一覧を**表形式**で表示（Grid.js）

- ３－１－２．各種詳細が**モーダルウィンドウ**表示（Bootstrap＋jQuery(＋Grid.js)）

- ３－１－３．サイドメニューで**部署の絞り込み**

- ３－１－４．絞り込んだ部署に社員がいない時に、エラー表示（**例外処理**）

４．座席表

５．マイページ

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


# **ER 図**

![136C4944-1A3B-4FB7-9D05-DDDB0CE3D67F.png](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/f0f5f024-d4eb-445c-86d4-efd6ba7ac73b/136C4944-1A3B-4FB7-9D05-DDDB0CE3D67F.png)

# **インフラ構成図**

![C25C6DED-257E-42B5-90AC-04588E90B0E2.png](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/0839f72b-9184-41c4-bf39-a9d579973c19/C25C6DED-257E-42B5-90AC-04588E90B0E2.png)


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

(1) Grid.jsを使用し、社員一覧表を表示。
(2) クリックするとモーダル表示

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

### ３－１－２．各種詳細が**モーダルウィンドウ**表示（Bootstrap＋jQuery(＋Grid.js)）

※【気をつけたこと】動的に取得したデータの為（Grid.jsでレンダリング）、イベントをルート要素を対象にした。

```php

【コード概要】
(1) onclickイベントでURLを取得。
(2) JavaScriptでHTMLからモーダルウィンドウ（bootstrap）取得し、表示。
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

●resources/views/employees/modal.blade.php
{{--　座席表をモーダル表示　--}}
<div class="modal fade" id="modalSeat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSampleLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content" style="width:1000px; margin-left: -70px;">
        <div class="modal-header">
        <h5 class="modal-title" id="modalSampleLabel">座席表</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
        ...
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('seets.index', [ 'dept_id_keyword' => $employee->dept_id]) }}'">詳細</button>
        </div>
    </div>
    </div>
</div>

●modal.js
// 動的に取得したデータの為（Grid.jsでレンダリング）、イベントをルート要素を対象にする。
$(document).on('click', '.seats-show-link', function(){
    // クリック時に、URL取得
    const url = $(this).attr("href");

    // 関数実行
    openModalSeat(url);

    // ページ遷移防止
    return false;
});

function openModalSeat(url){
    // HTMLデータ取得
    $.get(url, function(res){
        $("#modalSeat .modal-body").html($(res).find(".modal-view").html());
    });

    // モーダルを作成から表示（Bootstrap5:Via JavaScript）
    const myModal = new bootstrap.Modal(document.getElementById('modalSeat'), {
    });
    myModal.show();
}


```


### ３－１－３．サイドメニューで**部署の絞り込み**

(1) 部署カテゴリーをクリック。

(2) 社員一覧表のデータ絞り込まれて表示される。

```php


【コードの概要】
①DTOの考えに基づき、必要なデータを取得し、データをひとまとめにし、ビュー側へ渡す。

①EmployeeInfoServiceクラスで変数宣言。
②EmployeeListServiceクラスにて、Formから送信されたキーワードを元に絞り込みをかけ、必要データを取得。
③まとめたデータをemployeeコントローラへ渡す。
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

●app/Http/Controllers/EmployeeController.php

public function index(Request $request)
    {
        // 社員一覧表用データの取得
        $employees = Employee::with('user')->get();

        $dept_keyword = $request->dept_keyword;

        $service = new EmployeeListService();
			     
			//　@throws Exception ホームページへリダイレクトかつエラー表示
			try{
            $employee_list = $service->employeeList($employees,$dept_keyword);
        }catch(Exception $e){
            return redirect()->route('home')->with('message', $e->getMessage());
        }

●app/Services/EmployeeListService.php

// 社員一覧表用のデータリストを作成
class EmployeeListService {

function employeeList($employees,$dept_keyword){

    foreach($employees as $employee){
        $first_dept = $employee->dept->first_dept;
        $second_dept = $employee->dept->second_dept;
        $array = [$first_dept, $second_dept];


        // 「$dept_keywordに値がある」かつ「キーワード一致」すればスキップ
        if($dept_keyword && (array_search($dept_keyword, $array)) === false){
            continue;
        }

        $employee_list[] = new EmployeeInfoService (
            $employee->user->id,
            $employee->user->name,
            $employee->user->furigana,
            $employee->dept->first_dept,

〜〜省略〜〜

    );
    }
〜〜省略〜〜

    return $employee_list;
    }


●/app/Services/EmployeeInfoService.php

namespace App\Services;

// 変数を宣言
class EmployeeInfoService {

    function __construct(
        public $id,
        public $name,
        public $furigana,
        public $first_dept,

〜〜省略〜〜
        
    ){

    }
}

```



# ４．座席表ページ

- 各課の座席表ページが表示される。
- サイドメニューから表示したい部署で絞り込みかけると、
    
    「該当部署の社員・座席表」が表示される。
    
- 着席状況はアイコンの色を分け、視覚的に把握しやすくしました。
- 座席をクリックすると、着席の状況を変更できます。（参照：４－１．着席ステータス更新）

```php

【コード概要】

保守性の良いコードとなるように努めた。下記コードでは、ドメイン駆動開発（DDD）の考え方を意識し、
Controllerから、ビジネスロジックを担当するクラスを、切り離した。
また、クラス内に、複数の役割を持たないようにした。
さらに、DTOの考えから、データは成形し、ひとまとめにした後、view側に渡した。

具体的には、
SeetIndexLogicに、
①メインロジック(1) Treeの構築
　→サイドメニューに、部署1-部署2-社員情報を表示する為に、データを取得
②メインロジック(2) 座席情報の構築
　→座席表を構築するデータを取得
更に、座席BOXを作成する座標データを、CSSに読み込めるように、成形するロジックを、
MapBoxServiceに切り分けている。
=======================================================================================


●resources\views\seets\index.blade.php
{{-- 座席Map画像を表示 --}}
<div id="js-map"  class="map"></div>

{{-- 座席画像、座席の座標データを取得 --}}
<script>
    $(function(){
        const box_list = @json($box_list);
        const map_image = @json($map_image);
        const edit_url = "{{ route('seets.index') }}";
        setup_seat(box_list, map_image, edit_url);
    });
</script>

●app\Http\Controllers\SeetController.php
public function index(Request $request, SeetIndexLogic $logic){

    //準備: パラメーターの取得  座席表の初期値は"dept_id=1"
    $dept_id_keyword = isset($request->dept_id_keyword) ? $request->dept_id_keyword : 1;

    return view('seets.index',$logic->search($dept_id_keyword));

}

●app\Http\Logic\SeetIndexLogic.php
class SeetIndexLogic {

    function search($dept_id){

        //メインロジック(1) Treeの構築
        $tree = $this->getEmployeeTree($dept_id);
        $dept = $this->getDept($dept_id);

        //メインロジック(2) 座席情報の構築
        $map_image = $dept->map_image;
        $box_list = $this->getBoxList($dept);

        //Viewを構築するための変数の準備
        $depts = Dept::all();

        return [
            'tree' => $tree,
            'box_list' => $box_list,
            'depts' => $depts,
            'map_image' => $map_image
        ];
    }

    function getEmployeeTree($dept_id_keyword){

        $tree = [];

        $employees = Employee::all();


        foreach($employees as $employee){
            $first_dept = $employee->dept->first_dept;
            $second_dept = $employee->dept->second_dept;

            if (strpos($dept_id_keyword, $employee->dept->id) === false) {
                continue;
            }

            // 変数をifで条件付けしてそれぞれ作成
            if(!isset($tree[$first_dept]))$tree[$first_dept] = [];
            if(!isset($tree[$first_dept][$second_dept]))$tree[$first_dept][$second_dept] = [];
            $tree[$first_dept][$second_dept][] = $employee;
        }

        return $tree;

    }

    function getDept($dept_id){
        //return Dept::where("id","=",$dept_id)->first();
        return Dept::find($dept_id);
    }

    function getBoxList($dept){

        $box_list = [];

        if(isset($dept->seet)){
            foreach($dept->seet as $seat){
                $box_list[] = new MapBoxService(
                    $seat->seetnumber,
                    $user_name = isset($seat->sitdown->user->name) ? $seat->sitdown->user->name : '空席',
                    $seat->width,
                    $seat->height,
                    $seat->top,
                    $seat->left,
                    $seat_status = isset($seat->sitdown->status) ? $seat->sitdown->status : 'null',
                    $seat->id
                );
            }
        }

        return $box_list;
    }
}

```

### ４－１．着席ステータス更新

①座席をクリックすると、ログインユーザーの着席ステータスを変更する。

```php

【コード概要】
①viewから、get通信で着席ステータス（着席・会議中・一時離席・離席）をSeetControllerで受け取る。
Sitdownテーブルにある、着席ステータス情報を、SeatServiceで処理し、
更新していく。

※enum型を使用し、着席ステータスを列挙して記載し、if文での分岐時には、
マジックナンバー化しないように、注意した。
=========================================================

●app\Services\SeatService.php
// enum型(php8.1以上対応)
enum SeatStatusEnum: int
{
    case 着席 = 1;
    case 会議中 = 2;
    case 一時離席 = 3;
    case 離席 = -1;
}

class SeatService {

    // 引数→user列データ取得（※状態依存になる為、auth::userとは記載しない。）
    function __construct(private User $user)
    {

    }

    function updateStatus(Seet $seat, $status_number){

        $status = SeatStatusEnum::from($status_number);

        if ($status == SeatStatusEnum::着席){
            $this->着席($this->user, $seat);
        }elseif ($status == SeatStatusEnum::会議中){
            $this->会議中に変更($this->user, $seat);
        }elseif ($status == SeatStatusEnum::一時離席){
            $this->一時的に離席した($this->user, $seat);
        }else{
            $this->離席($this->user, $seat);
        }

    }

    function is着席中(User $user) : Bool {

        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        if(is_null($着席情報)){
            return false;
        }

        return true;
    }

    function 着席(User $user, Seet $seat){

        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        if(is_null($着席情報)){
            $着席情報 = new Sitdown();
        }

        // 例外処理
        $seat_user = Sitdown::where("seet_id","=",$seat->id)->first();
        if(isset($seat_user)){
            throw new Exception("既に座っている人がいますが、着席しますか？");
        }

        $着席情報->user_id = $user->id;
        $着席情報->seet_id = $seat->id;
        $着席情報->status = Sitdown::STATUS_CHAKUSEKI;
        $着席情報->save();

        //$着席情報 = Sitdown::where("user_id","=",$user->id)->firstOrNew();
    }

    function 会議中に変更(User $user){

        if(!$this->is着席中($user)){
            // throw new Exception("着席していません");
            session()->flash('flash_message_notchakuseki', '着席していません');
        }else{
        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        $着席情報->status = Sitdown::STATUS_KAIGI;
        $着席情報->save();
        }
    }

    function 一時的に離席した(User $user){

        if(!$this->is着席中($user)){
            // throw new Exception("着席していません");
            session()->flash('flash_message_notchakuseki', '着席していません');
        }else{
        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        $着席情報->status = Sitdown::STATUS_RISEKI;
        $着席情報->save();
        }
    }

    function 離席(User $user){

        if(!$this->is着席中($user)){
            // throw new Exception("着席していません");
            // Todo:controllerに記載
            session()->flash('flash_message_notchakuseki', '着席していません');
        } else {
        $着席情報 = Sitdown::where("user_id","=",$user->id)->first();
        $着席情報->delete();
        }
    }

}

●seets/sidemenu
<td class="seat-info"  cellpadding="1">
    {{$seatnumber = isset( $employee->user->sitdown->seet->seetnumber ) ? $employee->user->sitdown->seet->seetnumber : "－"}}
:&nbsp;

@if(isset( $employee->user->sitdown->status  ))
    @switch ($employee->user->sitdown->status)
        @case(1)
            着席
            @break
        @case(2)
            会議中
            @break
        @case(3)
            会議中
            @break
        @default
            離席
            @break;
    @endswitch
@endif
</td>


```

###  ５．管理画面












































