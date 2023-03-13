
{{-- @dd($result); --}}

@foreach ($employees as $employee)
    @foreach($employee as $shishaName => $bushoName)
    {{ $shishaName}}<br>
    {{ $bushoName }}<br>
    @endforeach
@endforeach
