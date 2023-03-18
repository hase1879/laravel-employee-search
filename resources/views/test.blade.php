

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- FontAwesomeのアイコン読み込み --}}
    <link
    rel="stylesheet"
    href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
    crossorigin="anonymous"
    />

    <style type="text/css">

    .box {
    display: flex; /* 子要素をフレックスボックスで横並びにする */
    /* justify-content: space-around; 等間隔で左右に並べる */
    }
    .box .icon {
    background: #ddd;       /* 背景色をグレーに指定 */
    border: 1px solid #000; /* borderを引く */
    text-align: center;
    margin: auto 0;
    list-style: none;

    background-color: rgb(192, 17, 17);
    width: 56px;
    height: 56px;
    background-image: url("{{ asset('img/dummy.png') }}");
    background-position: center;
    background-size: contain;
    background-repeat:no-repeat
    }

    .box .info {
    width: 150px;           /* 幅を適度な大きさに指定 */
    background: #ddd;       /* 背景色をグレーに指定 */
    border: 1px solid #000; /* borderを引く */
    text-align: start;
    margin: auto 0 auto 9px;
    list-style: none;
    width: 200px;
    }

    .box .info_zaseki {
        font-size: 14px;
    }

    .box .info_name {
        font-size: 20px;
    }


    </style>
</head>
<body>

    {{-- <ul class="box">
        <li>1行の文。</li>
        <li>ここには2行くらいの文章。</li>
    </ul>
    <ul class="box">
    <li>1行の文。</li>
    <li>ここには2行くらいの文章。</li>
    </ul> --}}
    <ul class="box">
    <li class="icon"></li>
    <li class="info"><span class="info_zaseki">A-1:&nbsp;着席</span><br><a class="info_name" href="#">寺野&nbsp;太郎</a></li>
    </ul>
    <ul class="box">
    <li class="icon"></li>
    <li class="info"><span class="info_zaseki">A-1:&nbsp;着席</span><br><a class="info_name" href="#">寺野&nbsp;太郎</a></li>
    </ul>
    <ul class="box">
    <li class="icon"></li>
    <li class="info"><span class="info_zaseki">A-1:&nbsp;着席</span><br><a class="info_name" href="#">寺野&nbsp;太郎</a></li>
    </ul>
    <ul class="box">
    <li class="icon"></li>
    <li class="info"><span class="info_zaseki">A-1:&nbsp;着席</span><br><a class="info_name" href="#">寺野&nbsp;太郎</a></li>
    </ul>
    <ul class="box">
    <li class="icon"></li>
    <li class="info"><span class="info_zaseki">A-1:&nbsp;着席</span><br><a class="info_name" href="#">寺野&nbsp;太郎</a></li>
    </ul>



</body>
</html>
