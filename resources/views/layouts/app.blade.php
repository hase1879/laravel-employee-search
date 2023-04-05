<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    {{-- jQuery読み込み --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    {{-- Grid.js --}}
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

    {{--　icon（Fontawesome） --}}
    <link
    rel="stylesheet"
    href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
    crossorigin="anonymous"
    />

    {{-- ログイン画面_CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">

    {{-- Fontawesome_CSS --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> --}}

    {{-- CSSファイル読み込み --}}
    {{-- <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" > --}}
    <style>

        main {

            background-color: #F2F2F2;
            min-width: 100vw;
            min-height: 100vh;
        }

        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital@1&display=swap');

        .title{
            font-family: 'Kanit', sans-serif;
        }

    </style>

    @yield('head')

</head>
<body>
    <div id="app">
        @include('layouts.header')

<main>
            @yield('content')
</main>

        {{-- <x-common-footer /> --}}

        {{-- @include('layouts.footer') --}}
    </div>


</body>
</html>
