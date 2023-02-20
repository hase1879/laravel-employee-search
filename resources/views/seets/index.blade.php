@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">

    {{-- サイドバー --}}
    <div class="col-5">
        @include('layouts.sidebar', ['user_results' => $user_results, '所属支社s' => $所属支社s, '所属部署s' => $所属部署s, 'employees' => $employees, 'employees_tree' => $tree])
    </div>
    {{-- 中央 --}}
    <div class="col-7">
        <table>
            <tr>
                <th>seetnumber</th>
                <th>name</th>
                <th>status</th>
            </tr>

            @foreach ($seets as $seet)
                <tr>

                    <td>{{ $seet->seetnumber }}</td>

                    {{-- <td><a href="{{ route('seets.edit') }}"> --}}

                    {{-- {{-- 座席者変更モーダル --}}
                    @include('modals.edit_seet')

                    {{-- 着席状況モーダル --}}
                    {{-- @include('modals.delete_goal') --}}

                    <td>
                        @if($seet->user)
                        <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#edit_seet{{ $seet->id }}">{{ $seet->user->name }}</a>
                        @endif
                    </td>

                </tr>
            @endforeach

        </table>
    </div>
</div>
</div>
@endsection
