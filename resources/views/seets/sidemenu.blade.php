{{-- サイドメニュー --}}
<div class="col-12 col-lg-2 d-none d-lg-block bg-green ">
    <div class="bg-white">
        <div class="sidebar_fixed  p-3">
            <div>
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th colspan="2">社員一覧</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tree as $first_dept=>$second_depts)
                            <tr>
                                <td colspan="2">{{ $first_dept }}</td>
                            </tr>
                            @foreach($second_depts as $second_dept=>$employees)
                                <tr>
                                    <td colspan="2">{{ $second_dept }}</td>
                                </tr>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td class="icon"rowspan="2"><img src="{{ asset('img/dummy.png') }}"></td>
                                        <td class="h6">
                                            {{$seatnumber = isset( $employee->user->sitdown->status ) ? $employee->user->sitdown->status : "―"}}

                                            :&nbsp;

                                            @if(isset( $employee->user->sitdown->seet->seetnumber ))
                                            <a href="{{ route('seets.edit', $employee->user->sitdown->seet->id) }}">{{ $employee->user->sitdown->seet->seetnumber }}</a>
                                            @else
                                                離席中
                                            @endif
                                        </td>
                                        </tr>
                                        <tr>
                                        <td class="h5">{{ $employee->user->name }}</td>
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

<link
rel="stylesheet"
href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
crossorigin="anonymous"
/>

<style type="text/css">
img {
    width: auto;
    height: 55px;
    background-position: center;
    }


tr {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  border-bottom: 1px solid black;
  /* width:400px; */
}
</style>
