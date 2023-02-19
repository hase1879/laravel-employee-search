@extends('layouts.app')

@section('content')

<div>

    <table>
        <tr>
            <th>seetnumber</th>
            <th>name</th>
            <th>status</th>
        </tr>

        @foreach ($seets as $seet)
            <tr>

                <td>{{ $seet->seetnumber }}</td>

                {{-- 座席者変更モーダル --}}
                @include('modals.edit_seet')

                {{-- 着席状況モーダル --}}
                {{-- @include('modals.delete_goal') --}}


                <td>
                    <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#edit_seet{{ $seet->id }}">{{ $seet->user->name }}</a>
                </td>

                {{-- <div class="col">
                    <div class="card bg-light">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h4 class="card-title ms-1 mb-0">{{ $goal->title }}</h4>
                            <div class="d-flex align-items-center">
                                <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addTodoModal{{ $goal->id }}">＋</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </tr>
        @endforeach

    </table>
</div>

@endsection
