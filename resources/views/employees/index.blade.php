{{-- employees --}}

@extends('layouts.app')

@section('content')
    {{-- headに移動させる --}}
    <script src="{{ asset('/js/employee-grid.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">

    <div class="container px-0">
        <div class="row g-0">

            {{-- サイドメニュー --}}
            @include('layouts.sidebar', ['dept_group' => $depts])

            {{-- コンテンツ --}}
            <div class="col-12 col-lg-10 bg-blue p-3">
                <div class="content">
                    {{ Breadcrumbs::render('employees.index') }}
                    @if (session('message'))
                        <script>
                            toastr.success('{{ session('message') }}');
                        </script>
                    @endif

                    {{-- grid.jsにて再出力 --}}
                    <div id="sample-table-wrapper"></div>

                    {{-- 社員一覧表（grid.js使用） --}}
                    <table id="sample-table" style="display:none;">
                        <thead>
                            <tr>
                                <th>氏名</th>
                                <th>着席状況</th>
                                <th>所属部署</th>
                                <th>固定電話 / 携帯電話</th>
                                <th>メールアドレス</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee_list as $employee)
                                <tr>
                                    <td>
                                        <a class="employees-show-link" href="{{ route('employees.show', $employee->id) }}">
                                            <img src="{{ asset($employee->profile_picture) }}">
                                            &thinsp;
                                            {{ $employee->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="seats-show-link"
                                            href="{{ route('seets.index', ['dept_id_keyword' => $employee->dept_id]) }}">
                                            座席:&ensp;{{ $employee->seatnumber }}
                                            <br>
                                            {{-- Todo:マジックナンバーを文字へ変換 --}}
                                            ステータス:&ensp;{{ $employee->status }}
                                        </a>
                                    </td>
                                    <td>{{ $employee->first_dept }}<br>{{ $employee->second_dept }}</td>
                                    <td>
                                        <i class="fas fa-phone-office"></i>&ensp;{{ $employee->phone_number }}
                                        <br>
                                        <i class="fas fa-mobile"></i>&ensp;{{ $employee->mobile_phone_number }}
                                    </td>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('employees.seat-modal')
    @include('employees.employee-modal')
@endsection
