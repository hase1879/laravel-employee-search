

{{-- 検索バー --}}
<form action="{{ route('employees.index') }}" method="get" class="serch-form">
    <input type="text" placeholder="氏名を検索" name="keyword">
    <input type="submit" value="検索">
</form>

{{-- 支社-部署-社員の一覧表示 --}}
@if(isset($branches))
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
@endif
