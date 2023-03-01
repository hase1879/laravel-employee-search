

@foreach ($seats as $seat)

    <div>
        {{ $seat->id }}
        {{ $seat->seetnumber }}
        :
        @if(isset($sitdowns[$seat->id]))
            @foreach($sitdowns[$seat->id] as $sitdown)
                {{ $sitdown->user->name }}
                {{ $sitdown->status }}
            @endforeach
        @endif
    </div>
@endforeach
