{{-- 座席者変更モーダル --}}
{{-- foreachで回す際に、idで識別できるように、組み込んでおく。 --}}
<div class="modal fade" id="editSeetModal{{ $seet->id }}" tabindex="-1" aria-labelledby="editSeetModalLabel{{ $seet->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSeetModalLabel{{ $seet->id }}">座席者登録の編集</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            {{-- route()ヘルパーで、更新するレコードデータ送信。storeアクション内で、
                requestから更新するデータを取得し、入れ替えてテーブルへ保存。 --}}
            <form action="{{ route('seets.update', $seet) }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <input type="text" class="form-control" name="title" value="{{ $seet->user->id }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>
