@extends('layouts.app')

@section('content')

 {{-- FontAwesomeのアイコン読み込み --}}
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />

{{-- コンテナの左右の余白削除（padding） --}}
<div class="container px-0">
    {{-- コンテナの余白を消したので、rowも設定。.row のネガティブ margin削除 --}}
    <div class="row g-0">
    <div class="col-12 col-lg-3 d-none d-lg-block bg-green">
        <div class="sidebar p-4">
            <table class="table table-borderless">
                <i class="menu-trigger" href="">
                    <span class="fas fa-arrow-left"></span>
                </i>

                <thead>
                <tr>
                    <th>社員一覧</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>総務課</td>
                </tr>
                <tr>
                    <td class="icon"rowspan="2"></td>
                    <td class="h6">A-1:&nbsp;着席</td>
                    </tr>
                    <tr>
                    <td class="h4">寺野&nbsp;太郎</td>
                </tr>
                </tbody>
                </table>
        </div>
    </div>


    <div class="col-12 col-lg-9 bg-blue">

        <div class="content">
            <h1>ドロワーメニュー</h1>
            <p>コンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツコンテンツ</p>
        </div>
    </div>
</div>

<style type="text/css">

.content {
  height: 100%;
  min-height: 100vh;
  padding: 0px;
  background-color: #eee;
  transition: all .5s;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.content.open {
  transform: translateX(-250px);
}
.content h1 {
  text-align: center;
  font-weight: 500;
}
.content p {
  text-align: center;
}
.menu-trigger {
  display: inline-block;
  width: 36px;
  height: 28px;
  /* vertical-align: middle; */
  cursor: pointer;
  /* position: fixed; */
  top: 0px;
  left: 250px;
  z-index: 100;
  transform: translateX(0);
  transition: transform .5s;
}
.menu-trigger.active {
  transform: translateX(-250px);
}
/* menuボタン */
.menu-trigger span {
  display: inline-block;
  box-sizing: border-box;
  position: absolute;
  font-size: 23px;
  text-align:center;
  color:rgba(25, 25, 26, 0.817);
  background-position: center;
  background-repeat:no-repeat;
  width: 23px;
  height: 25px;
  background-color: rgba(49, 49, 52, 0.701);
  transition: all .5s;

}
.menu-trigger.active span {
  background-color: #ffffff85;
}

.sidebar {
  width: 100%;
  height: 100%;
  background-color: rgb(0, 183, 255);
  min-height: 100vh;
  z-index: 10;
  transform: translateX(0px);
  transition: all .5s;
}
.sidebar.open {
  transform: translateX(-250px);
}

/*
*  【メニュー】
*/
.icon {
    width: 50px;
    height: 50px;
    background-image: url("{{ asset('img/dummy.png') }}");
    background-position: center;
    background-size: contain;
    background-repeat:no-repeat;
    }


tr {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  border-bottom: 1px solid black;
  /* width:400px; */
}


/* side */
/* .container {
  background-color:red;
} */
.bg-green {
  background-color:green;
}
.bg-blue {
  background-color:blue;
}

.canvas {
  background-color:purple;
  min-height:100vh;
}

.side {
  background-color:yellow;
  min-height:100vh;
}

</style>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<script>
    $('.menu-trigger').on('click',function(){
  if($(this).hasClass('active')){
    $(this).removeClass('active');
    $('.content').removeClass('open');
    $('.sidebar').removeClass('open');
    $('.overlay').removeClass('open');
  } else {
    $(this).addClass('active');
    $('.content').addClass('open');
    $('.sidebar').addClass('open');
    $('.overlay').addClass('open');
  }
    });
    $('.overlay').on('click',function(){
    if($(this).hasClass('open')){
        $(this).removeClass('open');
        $('.menu-trigger').removeClass('active');
        $('.content').removeClass('open');
        $('.sidebar').removeClass('open');
    }
    });


</script>


@endsection
