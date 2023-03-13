{{-- employees --}}

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        {{-- サイドバー --}}
        <div class="col-3">
            @include('layouts.sidebar', ['branches' => $branches])
        </div>

        <div class="col-9">
            <h3>社員一覧</h3>
            {{-- 支社-部署-社員の一覧表示 --}}
            <table class="products-table">
                <tr>
                    <th>氏名</th>
                    <th>ふりがな</th>
                    <th>所属支社</th>
                    <th>所属部署</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                    <th>携帯番号</th>
                    <th>着席位置(seetnumber)</th>
                    <th>着席状況(status)</th>
                </tr>
                @if(isset($branches))
                @foreach ($branches as $branch)
                    @foreach($branch->groups as $group)
                        @foreach($group->employees as $employee)
                        <tr>
                            <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->user->name }}</td>
                            <td>{{ $employee->user->furigana }}</td>
                            <td>{{ $employee->所属支社 }}</td>
                            <td>{{ $employee->所属部署 }}</td>
                            <td>{{ $employee->user->email }}</td>
                            <td>{{ $employee->user->phone_number }}</td>
                            <td>{{ $employee->user->mobile_phone_number }}</td>
                            <td>
                                {{$seatnumber = isset( $employee->user->sitdown->seet->seetnumber ) ? $employee->user->sitdown->seet->seetnumber : null}}
                            </td>
                            <td>
                                {{$seatnumber = isset( $employee->user->sitdown->status ) ? $employee->user->sitdown->status : null}}
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                @endforeach
                @endif
            </table>
        </div>
    <div>
@endsection
