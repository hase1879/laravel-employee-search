{{-- employees --}}

@extends('layouts.app')

@section('content')

{{-- headに移動させる --}}
<script src="{{ asset('/js/employee-grid.js') }}"></script>
<script src="{{ asset("js/modal.js") }}"></script>
<link rel="stylesheet" href="{{asset("css/employee.css")}}">

<div class="container px-0">
    <div class="row g-0">

        {{-- サイドメニュー --}}
        @include('layouts.sidebar', ['dept_group' => $depts])

        {{-- コンテンツ --}}
        <div class="col-12 col-lg-10 bg-blue p-3">
            <div class="content">
                {{ Breadcrumbs::render('employees.index') }}

                <h1 class="title fw-bold">社員一覧</h1>

                {{-- grid.jsにて再出力 --}}
                <div id="sample-table-wrapper"></div>

                {{-- 社員一覧表（grid.js使用） --}}
                <table id="sample-table" style="display:none;">
                    <thead>
                        <tr>
                            <th>氏名</th>
                            <th>ふりがな</th>
                            <th>所属支社</th>
                            <th>所属部署</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>携帯番号</th>
                            <th>着席位置</th>
                            <th>着席状況</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employee_list as $employee)
                        {{-- @dd($employee->dept_id) --}}
                        <tr>
                            <td><a class="employees-show-link" href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a></td>
                            <td>{{ $employee->furigana }}</td>
                            <td>{{ $employee->first_dept }}</td>
                            <td>{{ $employee->second_dept }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone_number }}</td>
                            <td>{{ $employee->mobile_phone_number }}</td>
                            <td><a class="seats-show-link" href="{{ route('seets.index',[ "dept_id_keyword" => $employee->dept_id]) }}">{{ $employee->seatnumber }}</a></td>
                            <td>{{ $employee->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@include("employees.modal")


@endsection

                {{-- 支社-部署-社員の一覧表示 --}}
                {{-- <table class="products-table">
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
                    @if (isset($branches))
                        @foreach ($branches as $branch)
                            @foreach ($branch->groups as $group)
                                @foreach ($group->employees as $employee)
                                    <tr>
                                        <td><a class="employees-show-link" href="{{ route('employees.show', $employee->id) }}">{{ $employee->user->name }}
                                        </td>
                                        <td>{{ $employee->user->furigana }}</td>
                                        <td>{{ $employee->所属支社 }}</td>
                                        <td>{{ $employee->所属部署 }}</td>
                                        <td>{{ $employee->user->email }}</td>
                                        <td>{{ $employee->user->phone_number }}</td>
                                        <td>{{ $employee->user->mobile_phone_number }}</td>
                                        <td>
                                            {{ $seatnumber = isset($employee->user->sitdown->seet->seetnumber) ? $employee->user->sitdown->seet->seetnumber : null }}
                                        </td>
                                        <td>
                                            {{ $seatnumber = isset($employee->user->sitdown->status) ? $employee->user->sitdown->status : null }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endif
                </table> --}}
