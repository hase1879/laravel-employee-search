@extends('layouts.app')

@section('content')
<script src="{{ asset('/js/employee-grid.js') }}"></script>

<h1>Test Pagenation</h1>

<div id="test-grid"></div>
<div id="sample-table-wrapper"></div>

{{-- 社員一覧表の出力（grid.jsを使用） --}}
<table id="sample-table" style="display:none;">
  <thead>
    <tr><th>氏名</th><th>ふりがな</th><th>所属支社</th><th>所属部署</th><th>メールアドレス</th><th>電話番号</th><th>携帯番号</th><th>着席位置</th><th>着席状況</th></tr>
  </thead>
  <tbody>
    @foreach($employee_list as $employee)
    <tr><td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</td><td>{{ $employee->furigana }}</td><td>{{ $employee->shisha_name }}</td><td>{{ $employee->busho_name }}</td><td>{{ $employee->email }}</td><td>{{ $employee->phone_number }}</td><td>{{ $employee->mobile_phone_number }}</td><td>{{ $employee->seatnumber }}</td><td>{{ $employee->status }}</td></tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection
