@extends('layouts.app')

@section('content')
    {{-- FontAwesomeのアイコン読み込み --}}
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />




<div class="container">
    <div class="row justify-content-start">


        <div class="col-2">
            {{-- <div class="sidebar_fixed">
                <form method="get" action={{ route('seets.index') }} >
                <p>
                    <select name="sishaName_keyword"  class="form-select" aria-label="Default select example">
                        <option value="東京支社" selected>(デモ用)東京支社</option>
                        @foreach($tree as $sishaNames => $value)
                        <option value="{{ $sishaNames }}">{{ $sishaNames }}</option>
                        @endforeach
                    </select>
                </p>
                <p class="w-80">
                    <select name="bushoName_keyword" class="form-select" aria-label="Default select example">
                        <option value="総務部" selected>(デモ用)総務部</option>
                        @foreach($tree as $sishaNames)
                            @foreach($sishaNames as $bushoNames => $value)
                            <option value="{{ $bushoNames }}">{{ $bushoNames }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </p>
                </p>
                    <input type="submit" value="表示する" class="btn btn-outline-primary float-end">
                </p>
                </form>

                <table class="table table-striped">
                    <tr>
                        <th>氏名</th>
                        <th>座席番号</th>
                        <th>着席状況</th>
                    </tr>
                        @foreach ($tree as $shishaNames)
                            @foreach($shishaNames as $bushoNames)
                                @foreach($bushoNames as $employee)
                                <tr>
                                    <td>{{ $employee->user->name }}</td>
                                    <td>
                                        @if(isset( $employee->user->sitdown->seet->seetnumber ))
                                            <a href="{{ route('seets.edit', $employee->user->sitdown->seet->id) }}">{{ $employee->user->sitdown->seet->seetnumber }}</a>
                                        @else
                                            離席中
                                        @endif
                                    </td>
                                    <td>
                                        {{$seatnumber = isset( $employee->user->sitdown->status ) ? $employee->user->sitdown->status : "―"}}
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                </table>
            </div> --}}

            <div id="sidebar-test">
                    {{-- ハンバーガーメニュー --}}
                <input type="checkbox" id="check" />
                {{-- forでinputのidと紐づけ。さらにlavelをクリックしてもinputがアクティブ化する --}}
                <label for="check">
                    {{-- ハンバーガーメニューのアイコン --}}
                    <i class="fas fa-bars" id="btn"></i>
                    <i class="fas fa-times" id="cancel"></i>
                </label>
                <!-- sidebar section -->
                {{-- @foreach ($tree as $shishaNames)
                @foreach($shishaNames as $bushoNames)
                    @foreach($bushoNames as $employee)
                    <tr>
                        <td>{{ $employee->user->name }}</td>
                        <td>
                            @if(isset( $employee->user->sitdown->seet->seetnumber ))
                                <a href="{{ route('seets.edit', $employee->user->sitdown->seet->id) }}">{{ $employee->user->sitdown->seet->seetnumber }}</a>
                            @else
                                離席中
                            @endif
                        </td>
                        <td>
                            {{$seatnumber = isset( $employee->user->sitdown->status ) ? $employee->user->sitdown->status : "―"}}
                        </td>
                    </tr>
                    @endforeach
                @endforeach
                @endforeach --}}
                <div class="sidebar">
                    <header>社員リスト</header>
                    <tr>
                        <td>
                    </tr>
                    <ul>
                    <li>
                        {{-- i class="fas 表示したいアイコン" --}}
                        <a href="#"><i class="fas fa-user"></i>A-1:&nbsp;着席<br>寺野&nbsp;太郎</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-link"></i>コミュニティ</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-coffee"></i>コーヒ一</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-calendar-week"></i>イベント</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-sliders-h"></i>サービス</a>
                    </li>
                    <li>
                        <a href="#"><i class="far fa-question-circle"></i>詳細情報</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-envelope"></i>お問い合わせ</a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-10">
            {{-- @dd($delete_seat_id) --}}

            {{-- 例外処理 --}}
            @if (session('message'))
            <script>
            if(confirm('{{ session('message') }}')) {
                window.location.href =  "{{ route('seets.update_chakuseki', session('delete_seat_id')) }}"
            }
            </script>
            @endif
                {{-- エラーメッセージ --}}
            @if (session('sitdown_delete_message'))
            <div class="message">
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="警告:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                    {{ session('sitdown_delete_message') }}
                    </div>
                </div>
            </div>
            @endif

            <h1>座席表</h1>


            <div id="js-map" class="map"></div>

        </div>
    </div>
</div>



<style type="text/css">
/* フロア全体の画像 */
.map {
background-color: rgb(0, 0, 0);
width: 922px;
height: 706px;
background-image: url("{{ asset('img/zaseki_map.png') }}");
background-position: center;
background-size: cover;
/* z-index: 10; */
position: relative;
}


.map .box {
/* background-color:rgba(255,0,0,0.5); */
text-align: center;
display: flex;
align-items: center;
justify-content: center;
position: absolute;
}

.sidebar_fixed{
position: sticky;
top: 0;
left: 0;
width:100%;
height:708px;
display: block;
overflow-x: hidden;
overflow-y: auto;
}

</style>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
const box_list = @json($box_list);

for(let box of box_list){
    const $div = $("<div></div>").addClass("box").addClass("box2");
    $div.css("width", box.width + "px");
    $div.css("height", box.height + "px");
    $div.css("top", box.top + "px");
    $div.css("left", box.left + "px");
    if(box.status == "1") {
        $div.css('background-color','rgba(9, 255, 0, 0.461)');
    } else if(box.status == "2") {
        $div.css('background-color','rgba(225, 255, 0, 0.461)');
    } else if(box.status == "3") {
        $div.css('background-color','rgba(174, 0, 255, 0.461)');
    } else {
        $div.css('background-color','rgba(255, 13, 0, 0.461)');
    }

    $div.html(box.label+"<br>"+box.seat_user);
    $div.on("click", () => {
        if(confirm('「' + box.label + '」の着席状況を更新しますか？')) {

            window.location.href =  "{{ route('seets.index') }}" + "/" + box.seet_id +"/edit"
        }
    });
    $("#js-map").append($div);
}
console.log(box_list);

// const onClickBox = (label) => {
// if(confirm('座席「' + label + '」に座りますか？')) {

// }
// }






</script>



@endsection
