@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <h1>座席表</h1>
        <div class="col-9">

            <div id="js-map" class="map"></div>

        </div>

        <div class="col-3">
            <div class="sidebar_fixed">
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
            </div>
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
