@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- サイドバー --}}
        <div class="col-2">
            @include('layouts.sidebar', ['user_results' => $user_results, 'employees' => $employees, 'employees_tree' => $tree])
        </div>

        {{-- 座席表 --}}
        <div class="col-10">
        @include('layouts.seat-chart', ['seats' => $seats])
        </div>
    </div>

    <div class="row">

        <div class="col-10">
            <h1>座席表</h1>

            @if (session('flash_message_notchakuseki'))
                <p>{{ session('flash_message_notchakuseki') }}</p>
            @else
                <p>{{ session('flash_message') }}</p>
            @endif

            <table class="products-table">
                <tr>
                    <th>座席番号</th>
                    <th>氏名</th>
                    <th>着席状況</th>
                </tr>
                @foreach ($seats as $seat)
                    <tr>
                        <td><a href="{{ route( 'seets.edit', $seat)}}">{{ $seat->seetnumber }}</a></td>
                        @if(isset($sitdowns[$seat->id]))
                            @foreach($sitdowns[$seat->id] as $sitdown)
                            <td>
                                {{ $sitdown->user->name }}
                            </td>
                            <td>{{ $sitdown->status }}</td>
                            @endforeach
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- <footer>
        <p class="copyright">&copy; employee-search All rights reserved.</p>
    </footer> --}}

</div>



@endsection
