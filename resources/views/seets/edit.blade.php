@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mt-3 mb-3">座席状況の編集</h1>

    {{-- <div>
     <a href="{{ route('seets.update', $id) }}" class="btn btn-outline-primary d-block me-1">座席の登録(※ステータスは着席)</a>
    </div> --}}

    <div>
        <form action="{{ route('seets.update_status', $id)}}" method="post">
            @csrf
            @method('patch')
            <select class="form-select" aria-label="Default select example" name=status_number>
                <option selected>着席ステータスを選択。</option>
                <option value="1">着席</option>
                <option value="2">会議中に変更</option>
                <option value="3">一時的に離席した</option>
                <option value="4">離席</option>
            </select><br>
            <button type="submit" class="btn btn-outline-primary btn-sm">着席ステータスを登録。</button>
        </form>
    </div>
</div>

@endsection
