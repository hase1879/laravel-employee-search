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
            </div>

            <div class="pd-10">

                {{-- form --}}
                @include("seets.dept-form")

                {{-- 社員一覧ページでのmodal表示箇所 --}}
                <div class="modal-view">

                    <div id="js-map"  class="map"></div>

                    <link rel="stylesheet" href="{{ asset('css/seat.css') }}">
                    <script>
                        const box_list = @json($box_list);
                        const map_image = @json($map_image);
                    </script>
                    <script src="{{ asset("/js/seat.js") }}"></script>
                </div>

            </div>
        </div>
    </div>
</div>






@endsection
