@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <h1>Map</h1>


            <div class="map">

                {{-- <div class="box" style="width: 200px; height: 121px;top: 226px; left: 391px;"></div>
                <div class="box" style="width: 118px; height: 69px; top: 215px; left: 694px;"></div> --}}

                @foreach($box_list as $box)
                <div class="box" style="{{ $box->toStyle() }}" onclick="onClickBox('{{ $box->label }}');">{{ $box->label }}</div>
                @endforeach
            </div>

            <h1>Map2</h1>

            <div id="js-map" class="map"></div>

        </div>
    </div>

<style type="text/css">
.map {
    background-color: red;
    width: 1320px;
    height: 500px;
    background-image: url("{{ asset('img/test_zaseki.png') }}");
    background-position: 50% 50%;
    background-size: cover;
    position: relative;
}

.map .box {
    background-color:rgba(255,0,0,0.5);
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
}
.box2 {
    /* background-color: white !important; */
    border:solid 2px red;
}
</style>

<script>
const box_list = @json($box_list);

for(let box of box_list){
    const $div = $("<div></div>").addClass("box").addClass("box2");
    $div.css("width", box.width + "px");
    $div.css("height", box.height + "px");
    $div.css("top", box.top + "px");
    $div.css("left", box.left + "px");
    $div.html(box.label);
    $div.on("click", () => {
        if(confirm('座席「' + box.label + '」に座りますか？')) {

        }
    });
    $("#js-map").append($div);
}
console.log(box_list);

const onClickBox = (label) => {
    if(confirm('座席「' + label + '」に座りますか？')) {

    }
}
</script>
@endsection
