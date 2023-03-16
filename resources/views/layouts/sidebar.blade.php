

{{-- 検索バー --}}
{{-- <form action="{{ route('employees.index') }}" method="get" class="serch-form">
    <input type="text" placeholder="氏名を検索" name="keyword">
    <input type="submit" value="検索">
</form> --}}

@foreach ($major_category as $shisha)
<details>
    <summary>{{ $shisha }}</summary>
    <ul>
    @foreach ($category as $busho)
        <li style="margin-left:15px">{{ $busho }}</li>
    @endforeach
    </ul>
</details>
@endforeach

{{-- @foreach ($tree as $shishaNames)
    @foreach($shishaNames as $bushoNames)
        @foreach($bushoNames as $employee)
        <tr>
            <td>{{ $employee->user->name }}</td>
            <td>
                @if(isset( $employee->user->sitdown->seet->seetnumber ))
                    <a href="{{ route('seets.edit', $employee->user->sitdown->seet->id) }}">{{ $employee->user->sitdown->seet->seetnumber }}</a>
                @else
                    離席中
                @endif
            </td>
            <td>
                {{$seatnumber = isset( $employee->user->sitdown->status ) ? $employee->user->sitdown->status : "―"}}
            </td>
        </tr>
        @endforeach
    @endforeach
@endforeach --}}

{{-- 支社-部署-社員の一覧表示 --}}
{{-- @if(isset($branches))
@foreach ($branches as $branch)
    <details>
        <summary>{{ $branch->name }}</summary>
        @foreach($branch->groups as $group)
            <details style="margin-left:15px">
                <summary>{{ $group->name }}</summary>
                <ul>
                    @foreach($group->employees as $employee)
                        <li style="margin-left:15px">{{ $employee->user->name }}</li>
                    @endforeach
                </ul>
            </details>
        @endforeach
    </details>
@endforeach
@endif --}}
