{{--　座席表をモーダル表示　--}}
<div class="modal fade" id="modalSeat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSampleLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- modal_size --}}
    <div class="modal-content" style="width:1000px; margin-left: -70px;">
        <div class="modal-header">
        <h5 class="modal-title" id="modalSampleLabel">座席表</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
        ...
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('seets.index', [ 'dept_id_keyword' => $employee->dept_id]) }}'">詳細</button>
        </div>
    </div>
    </div>
</div>

