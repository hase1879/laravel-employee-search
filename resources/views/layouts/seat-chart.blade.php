
<script src="{{asset('js/seatchart.js')}}"></script>


    <div class="row justify-content-center">
        <h1>東京支社 総務部 総務課</h1>
        <div class="zaseki">
            <div class="box" style="width: 89px; height: 94px; top: 207px; left: 184px;">
                <a href="{{ route( 'seets.edit', $seats[0])}}">{{ $seats[0]->seetnumber }}</a>
            </div>
        </div>

        <div id="js-zaseki" class="zaseki">

    </div>

    <style type="text/css">
    .zaseki {
        background-color: red;
        width:1092px;
        height: 562px;
        background-image: url("{{ asset('img/zaseki.png') }}");
        background-size: cover;
        position: relative;
    }

    .zaseki .box {
        background-color: rgba(255,0,0,0.5);
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
    }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    {{-- <script> --}}
    {{-- // const box_list = @json($box_list);

    // for(let box of box_list){
    //     const $div = $("<div></div>").addClass("box")
    //     $div.css("wigth", box.width + "px");
    //     $div.css("wigth", box.height + "px");
    //     $div.css("wigth", box.top + "px");
    //     $div.css("wigth", box.left + "px");
    //     $div.css("wigth", box.label + "px");
    //     $div.on("click", () => {
    //         if(confirm('座席「'+ box.label +'」に座りますか？')){

    //         }
    //     })
    //     $("#js-zaseki").append($div);
    // }
    // console.log(box_list); --}}

    {{-- </script> --}}

