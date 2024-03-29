@extends('layouts.app')

@section('content')

<div class="container-fluid">
    {{ Breadcrumbs::render('employees.show', $employee->id) }}

    {{-- モーダル表示エリア --}}
    <div class="modal-view">


        <div class="row">
            <div class="col-2">
                <div class=profile-img></div>
            </div>
            <div class="col-10">
                <ul class="employee-name">
                    <li>社員番号&ensp;:&emsp;{{ $employee->user->user_number }}</li>
                    <br>
                    <li>{{ $employee->user->furigana }}</li>
                    <li  class="fw-bold fs-3">{{ $employee->user->name }}</li>
                    <li>生年月日&ensp;:&emsp;{{ $employee->user->date_of_Birth }}</li>
                    <li>性別&ensp;:&emsp;{{ $employee->user->gender }}</li>
                </ul>
            </div>
        </div>

        <div class="card mt-2">
            <h5 class="card-header">社員情報</h5>
            <div class="card-body">
                <table>
                <tr>
                    <td  width="85" class="card-text">所属</td>
                    <td  width="300" class="card-text">{{ $employee->dept->first_dept }}&ensp;{{ $employee->dept->second_dept }}</td>
                </tr>
                <tr>
                    <td  width="85" class="card-text">役職</td>
                    <td  width="300" class="card-text">課長</td>
                </tr>
                <tr>
                    <td  width="85" class="card-text">入社年月日</td>
                    <td  width="300" class="card-text">{{ $employee->user->join_date }}</td>
                </tr>
                <tr>
                    <td  width="85" class="card-text">Mail</td>
                    <td  width="300" class="card-text">{{ $employee->user->email }}m</td>
                </tr>
                <tr>
                    <td  width="85" class="card-text">電話番号</td>
                    <td  width="300" class="card-text">{{ $employee->user->phone_number }}</td>
                </tr>
                <tr>
                    <td  width="85" class="card-text">携帯番号</td>
                    <td  width="300" class="card-text">{{ $employee->user->mobile_phone_number }}</td>
                </tr>
                </table>
            </div>
        </div>
        <div class="card mt-2">
            <h5 class="card-header">住所</h5>
            <div class="card-body">
                <table>
                <tr>
                    <td  width="85" class="card-text">住所</td>
                    <td  width="300" class="card-text">
                        {{ $employee->user->zip_code }}<br>
                        {{ $employee->user->present_address }}
                    </td>
                </table>
            </div>
        </div>

        <style  type="text/css">

            /* 社員プロフィール_写真 */
            .profile-img {
            background-color: whitesmoke;
            width: 150px;
            height: 200px;
            background-image: url("{{ asset($employee->user->profile_picture) }}");
            background-position: center;
            background-size: contain;
            position: relative;
            background-repeat:no-repeat
            }

            .employee-name {
                list-style:none;
                margin: 10px 5px 5px 10px;
            }

            .container-fluid {
            margin-right: auto;
            margin-left: auto;
            max-width: 900px;
            }

        </style>

    </div>
</div>





@endsection
