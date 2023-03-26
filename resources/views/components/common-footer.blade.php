{{-- <div class="container">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    {{ $date }}


    @foreach ($tree as $sishaName => $collection)
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
    @endforeach --}}
{{-- </div> --}}
