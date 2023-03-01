

<form action="{{ route('seets.index') }}" method="get" class="serch-form">
    <input type="text" placeholder="氏名を検索" name="keyword">
    <input type="submit" value="検索">
</form>

@foreach ($employees_tree as $sishaName => $collection)
    <details>
        <summary>{{ $sishaName }}</summary>
        @foreach($collection as $bushaName => $busho_employees)
            <details style="margin-left:15px">
                <summary>{{ $bushaName }}</summary>
                @foreach($busho_employees as $employee)
                    <li style="margin-left:15px">{{ $employee->user->name }}</li>
                @endforeach
            </details>
        @endforeach
    </details>
@endforeach

@if(isset($branches))
@foreach ($branches as $branch)
    <details>
        <summary>{{ $branch->name }}</summary>
        @foreach($branch->groups as $group)
            <details style="margin-left:15px">
                <summary>{{ $group->name }}</summary>
                @foreach($group->employees as $employee)
                    <li style="margin-left:15px">{{ $employee->user->name }}</li>
                @endforeach
            </details>
        @endforeach
    </details>
@endforeach
@endif
