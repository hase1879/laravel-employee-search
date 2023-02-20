<div class="container">


        {{-- GETメソッドはURL末尾にパラメータを追加して送信。 --}}
    <form action="{{ route('seets.index') }}" method="get" class="serch-form">
        <input type="text" placeholder="氏名を検索" name="keyword">
        <input type="submit" value="検索">
    </form>



    <table>
        <tr>
            <th>氏名</th>
            <th>所属支社</th>
            <th>所属部署</th>

        </tr>
        @if(!(is_null($user_results)))
            @foreach ($user_results as $user_result)
            <tr>
                <td>{{$user_result->name}}</td>
                <td>
                    @if(is_null($user_result->employee))
                    employeeがnullのデータ
                    @else
                    {{$user_result->employee->所属支社}}
                    @endif
                </td>
                <td>
                    @if(is_null($user_result->employee))
                    employeeがnullのデータ
                    @else
                    {{$user_result->employee->所属部署}}
                    @endif
                </td>
            </tr>
            @endforeach
        @endif
    </table>



    @foreach ($所属支社s as $所属支社)
        <details>
            <summary>{{ $所属支社 }}</summary>
            @foreach($所属部署s as $所属部署)
                @if($所属部署->所属支社 === $所属支社)
                    <details>
                        <summary>{{ $所属部署->所属部署 }}</summary>
                        @foreach($employees as $employee)
                            @if ($所属部署->所属支社 === $employee->所属支社 && $所属部署->所属部署 === $employee->所属部署 )
                                <li>{{ $employee->user->name }}</li>
                            @endif
                        @endforeach
                    </details>
                @endif
            @endforeach
        </details>
    @endforeach

    @foreach ($employees_tree as $sishaName => $collection)
        <details>
            <summary>{{ $sishaName }}</summary>
            @foreach($collection as $bushaName => $busho_employees)
                <details>
                    <summary>{{ $bushaName }}</summary>
                    @foreach($busho_employees as $employee)
                        <li>{{ $employee->user->name }}</li>
                    @endforeach
                </details>
            @endforeach
        </details>
    @endforeach



</div>
