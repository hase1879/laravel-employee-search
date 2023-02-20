{{-- 座席者変更モーダル --}}
<div class="modal fade" id="edit_seet{{ $seet->id }}" tabindex="-1" aria-labelledby="editSeetModalLabel{{ $seet->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSeetModalLabel{{ $seet->id }}">座席者登録の編集</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            {{-- @dd($seet); --}}
            {{-- seet,user,sitdownの全データが来ている --}}
{{--
            <form method="post" action="{{ route('users.seets.update', [$seet, $user]) }}">
                @csrf
                @method('patch')

                @foreach($users as $user)
                <p>
                <input type="radio" name="q1" value="{{ $user->id }}">{{ $user->name }}
                </p>
                @endforeach

                <p><input type="submit" value="送信する"></p>

            </form> --}}
        </div>
    </div>
</div>
