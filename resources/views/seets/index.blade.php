@extends('layouts.app')

@section('content')

<div class="container px-0">
    <div class="row g-0">

        @include("seets.sidemenu")

        {{-- コンテンツ --}}
        <div class="col-12 col-lg-10 bg-blue p-3">
            {{ Breadcrumbs::render('employees.index') }}
            <div class="canvas mt-10">
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
                {{-- <h1>座席表</h1> --}}
                {{-- <div id="js-map" class="map"></div> --}}
            </div>

            <div class="pd-10">

                {{-- ドロップダウン --}}
                <form method="get" action={{ route('seets.index') }} >
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <select name="dept_keyword"  class="form-select form-select-lg ">
                                @foreach($first_depts as $first_dept)
                                    <option value="{{ $first_dept }}">{{ $first_dept }}</option>
                                @endforeach

                                @foreach($depts as $dept)
                                    <option value="{{ $dept->second_dept }}">{{ $dept->first_dept }}{{ $dept->second_dept }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <input type="submit" value="表示する" class="btn btn-primary float-start">
                        </div>
                    </div>
                </form>

                <div id="js-map"  class="map"></div>
            </div>
        </div>
    </div>
</div>



<style type="text/css">
.inline {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    flex-wrap: wrap;
}

/* フロア全体の画像 */
.map {
background-color: rgb(0, 0, 0);
width: 958px;
height: 522px;
border: 25px solid #ffffff;
border-radius: 40px;
background-color: white;
background-image: url("{{ asset('img/seat_map.png') }}");
background-position: center;
background-size: contain;
background-repeat: no-repeat;
position: relative;
top: 20px
}

.map .box {
font-size: 14px;
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
</style>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
const box_list = @json($box_list);

for(let box of box_list){
    const $div = $("<div></div>").addClass("box");
    $div.css("width", box.width + "px");
    $div.css("height", box.height + "px");
    $div.css("top", box.top + "px");
    $div.css("left", box.left + "px");
    $div.css("position","absolute")
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

</script>



@endsection
