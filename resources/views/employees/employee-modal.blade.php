{{--　社員詳細をモーダル表示　--}}
<div class="modal fade" id="modalEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- modal_size --}}
    <div class="modal-content" style="width:750px; margin-left: -70px;">
        <div class="modal-header">
        <h5 class="modal-title" id="modalEmployeeLabel">社員詳細</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
        ...
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('employees.show', $employee->id) }}'">詳細</button>
        </div>
    </div>
    </div>
</div>


