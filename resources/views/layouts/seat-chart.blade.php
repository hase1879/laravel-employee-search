
<script src="{{asset('js/seatchart.js')}}"></script>


    <div class="row justify-content-center">
        <h1>東京支社 総務部</h1>
        <div class="zaseki">
            <div class="square" style="width: 89px;
            height: 94px;
            top: 143px;
            left: 312px;
        }">
                <a href="{{ route( 'seets.edit', $seats[0])}}">{{ $seats[0]->seetnumber }}</a>
            </div>
        </div>

        <h2>東京支社営業部</h2>
        <div id="js-zaseki" class="zaseki">

    </div>

    <style type="text/css">
    .zaseki {
        background-color: red;
        width:1092px;
        height: 562px;
        background-image: url("{{ asset('img/test_zaseki.png') }}");
        background-size: cover;
        position: relative;
    }

    .zaseki .square {
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

    <script>
        const square_list = @json($square_list);



        for(let square of square_list){
            const $div = $("<div></div>").addClass("square")
            $div.css("wigth", square.width + "px");
            $div.css("height", square.height + "px");
            $div.css("top", square.top + "px");
            $div.css("left", square.left + "px");
            $div.html(square.label);
            $div.on("click", () => {
            if(confirm('座席「'+ square.label +'」に座りますか？')){

                }
            })
            $("#js-zaseki").append($div);
        }
        console.log(square_list);

     </script>

