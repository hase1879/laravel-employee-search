{{-- サイドメニュー --}}
<div class="col-12 col-lg-2 d-none d-lg-block bg-green ">
    <div class="bg-white">
        <div class="sidebar_fixed  p-3">
            <div>
                {{-- form --}}
                @include("seets.dept-form")
                <div class="pt-2">
                    <table class="sidemenu table table-borderless "  cellpadding="0">

                        {{-- 絞り込み後の該当社員一覧リスト --}}
                        <thead>
                        <tr>
                            <th colspan="2">該当社員一覧</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tree as $first_dept=>$second_depts)
                                <tr>
                                    <td colspan="2">{{ $first_dept }}</td>
                                </tr>
                                @foreach($second_depts as $second_dept=>$employees)
                                    <tr>
                                        <td colspan="2">&thinsp;{{ $second_dept }}</td>
                                    </tr>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td class="icon" rowspan="2" style="text-align: center;"><img src="{{ asset($employee->user->profile_picture) }}"></td>
                                            <td class="seat-info"  cellpadding="1">
                                                    {{$seatnumber = isset( $employee->user->sitdown->seet->seetnumber ) ? $employee->user->sitdown->seet->seetnumber : "－"}}
                                                :&nbsp;

                                                @if(isset( $employee->user->sitdown->status  ))
                                                    @switch ($employee->user->sitdown->status)
                                                        @case(1)
                                                            着席
                                                            @break
                                                        @case(2)
                                                            会議中
                                                            @break
                                                        @case(3)
                                                            会議中
                                                            @break
                                                        @default
                                                            離席
                                                            @break;
                                                    @endswitch
                                                @endif
                                            </td>
                                            </tr>
                                        <tr>
                                            <td class="employee-name"><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->user->name }}</a></td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">

.sidemenu,.sidemenu td,.sidemenu th{
    border: none !important;
    padding: 1px;
}

.sidemenu td {
    margin: 15px 0px;
}
.icon {
    vertical-align: middle;
}

img {
    width: auto;
    height: 40px;
    background-position: center;
    }

/* 氏名 */
.employee-name a{
    font-size: 14px;
    text-decoration: none;
    color: black;
    font-weight:bold;
}

.employee-name a:hover {
    color: #333;
}

.seat-info{
    font-size: 13px;
}
</style>
