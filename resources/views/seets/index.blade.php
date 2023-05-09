@extends('layouts.app')


@section('head')
    <style type="text/css">
        @import url("{{ asset('css/seat.css') }}");
    </style>

    <script src="{{ asset('/js/seat.js') }}"></script>
@endsection

@section('content')
    <div class="container px-0">
        <div class="row g-0">

            @include('seets.sidemenu')

            <div class="col-12 col-lg-10 bg-blue p-3">

                {{ Breadcrumbs::render('seets.index') }}

                <div class="canvas mt-10">

                    {{-- 例外処理 --}}
                    @if (session('message'))
                        <script>
                            if (confirm('{{ session('message') }}')) {
                                window.location.href = "{{ route('seets.update_chakuseki', session('delete_seat_id')) }}"
                            }
                        </script>
                    @endif
                    {{-- エラーメッセージ --}}
                    @if (session('sitdown_delete_message'))
                        <div class="message">
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor"
                                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                    role="img" aria-label="警告:">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <div>
                                    {{ session('sitdown_delete_message') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="pd-10">

                    {{-- 社員一覧ページでのmodal表示箇所 --}}
                    <div class="modal-view">
                        <style type="text/css">
                            @import url("{{ asset('css/seat.css') }}");
                        </style>
                        <script src="{{ asset('/js/seat.js') }}"></script>

                        {{-- タイトル --}}
                        @foreach ($tree as $first_dept => $second_depts)
                            @foreach ($second_depts as $second_dept => $employees)
                                <h3 class="pt-4">{{ $first_dept }}&thinsp;{{ $second_dept }}</h3>
                            @endforeach
                        @endforeach

                        {{-- 検索ボックス --}}
                        <label class="ps-3">・座席表内の社員を検索:</label>
                        <input type="text" id="keyUser" placeholder="名前を入力">
                        <button id="submit">検索</button>


                        {{-- 凡例 --}}
                        <div class="example">
                            <div class="RISEKI">空席</div>
                            <div class="CHAKUSEKI">着席中</div>
                            <div class="KAIGI">会議中</div>
                            <div class="ICHIJIRISEKI">一時離席中</div>
                            <div class="back"></div>
                        </div>

                        {{-- 座席Map画像を表示 --}}
                        <div id="js-map" class="map"></div>

                        {{-- 座席画像、座席の座標データを取得 --}}
                        <script>
                            $(function() {
                                const box_list = @json($box_list);
                                const map_image = @json($map_image);
                                const edit_url = "{{ route('seets.index') }}";

                                setup_seat(box_list, map_image, edit_url);
                            });
                        </script>

                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- 現在のURLにパラメータ追加する機能 --}}
    <script>
        $(function() {
            $('#submit').click(function() {
                var text = $('#keyUser').val();
                if (text !== '') {
                    var url = new URL(window.location.href);
                    //urlにパラメータを追加
                    url.searchParams.set('name', text);
                    window.location.href = url.toString();
                }
            });
        });
    </script>

    {{-- パラメータと一致するseat_userを装飾 --}}
    @php
        $target = isset($_GET['name']) ? $_GET['name'] : null;
    @endphp

    <script>
        $(function() {
            // パラメータ
            var target = "{{ $target }}";
            // テキストの要素を取得
            const texts = document.getElementsByClassName('text');
            // テキスト内の一致する文字列を赤字にする
            for (let i = 0; i < texts.length; i++) {
                const text = texts[i].innerHTML;
                // 置換したデータをビュー側へ反映
                const newText = text.replace(new RegExp(target, 'g'),
                    `<span style="background-color: red;color:white;font-weight:bold;">${target}</span>`);
                texts[i].innerHTML = newText;
            }
        });
    </script>
@endsection
