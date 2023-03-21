@extends('layouts.app')

@section('content')

<div class="container px-0">
    <div class="row g-0">

        {{-- サイドメニュー --}}
        <div class="col-12 col-lg-3 d-none d-lg-block bg-green">
            <div class="bg-white">
                <div class="sidebar_fixed">
                    <form method="get" action={{ route('seets.index') }} >
                        @csrf
                    <p>
                        <select name="dept_keyword"  class="form-select" aria-label="Default select example">
                            <option value="人事課" selected>(デモ用)管理本部人事課</option>
                            @foreach($first_depts as $first_dept)
                                <option value="{{ $first_dept }}">{{ $first_dept }}</option>
                            @endforeach
                            @foreach($depts as $dept)
                            <option value="{{ $dept->second_dept }}">{{ $dept->first_dept }}{{ $dept->second_dept }}</option>
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
                            @foreach ($tree as $first_depts)
                                @foreach($first_depts as $second_depts)
                                    @foreach($second_depts as $employee)
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
                </div>
            </div>
        </div>

        {{-- コンテンツ --}}
        <div class="col-12 col-lg-9 bg-blue p-3">
            <div class="canvas"\
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

            <div class="canvass">
                <img src="{{ asset('img/seat_map.png') }}" alt="">
            </div>

            {{-- <form method="get" action={{ route('seets.index') }} >
                @csrf
            <p>
                <select name="dept_keyword"  class="form-select" aria-label="Default select example">
                    <option value="人事課" selected>(デモ用)管理本部人事課</option>
                    @foreach($first_depts as $first_dept)
                        <option value="{{ $first_dept }}">{{ $first_dept }}</option>
                    @endforeach
                    @foreach($depts as $dept)
                        <option value="{{ $dept->second_dept }}">{{ $dept->first_dept }}{{ $dept->second_dept }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <input type="submit" value="表示する" class="btn btn-outline-primary float-end">
            </p>
            </form> --}}



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

/* サイドメニュー */
.bg-white{
    background-color: white;
}

.sidebar_fixed{
position: sticky;
top: 0;
left: 0;
width:100%;
/* ヘッダー分を下げる */
height:100vh;
display: block;
overflow-x: hidden;
overflow-y: auto;
}

.canvass{
    width: 990px;
    background-color: red;
    border: 25px solid #ffffff;
    border-radius: 40px;
    /* padding: 50px; */
}

.canvass img{
    width: 100%;
    height: auto;
    background-color: rgb(8, 0, 255);
    background-position: center;
    z-index: 50;
    display: block;
    margin: 0;
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
