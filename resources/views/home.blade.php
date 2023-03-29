@extends('layouts.app')

@section('content')
<div class="container">
    {{ Breadcrumbs::render('home') }}

    {{-- エラーメッセージ --}}
    @if (session('message'))
    <div class="message">
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="警告:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
              {{ session('message') }}
            </div>
        </div>
    </div>
    @endif

    <script>
        (function() {
            'use strict';
            // フラッシュメッセージのfadeout
            $(function(){
                $('.message').fadeOut(7000);
            });
        })();
    </script>

    <div class="row justify-content-center mt-5">
        {{-- <div class="col-md-8"> --}}
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}


        {{-- </div> --}}

            <div class="col-3">
                <a href="{{ route('employees.index') }}" class="btn-home"><i class="fas fa-chair-office"></i><h3>座席表</h3></a>
            </div>

            <div class="col-3">
                <a href="{{ route('seets.index') }}" class="btn-home"><i class="fas fa-users"></i><h3>社員一覧</h3></a>
            </div>

            <div class="col-3">
                <a href="{{ route('mypage') }}" class="btn-home"><i class="fas fa-user"></i><h3>マイページ</h3></a>
            </div>

    </div>
</div>

<style>

a.btn-home {
	display: block;
	text-align: center;
	vertical-align: middle;
	text-decoration: none;
	position: relative;
	width: 280px;
    height: 216px;
	margin: auto;
	padding: 1rem 4rem;
	font-weight: bold;
	border-radius: 0.3rem;
	border-bottom: 7px solid #b0b9ff;
	background: white;
	color: #000000;
    border-radius: 40px;
    padding: 25px;
}

a.btn-home:hover {
	margin-top: 6px;
	border-bottom: 1px solid #b0b9ff;
	color: #000000;
    border-radius: 40px;
}

a.btn-home i{
font-size: 100px;
color: #919eff;
padding:16px;
}

</style>


@endsection
