{{-- 部署絞り込み --}}
<form method="get" action={{ route('seets.index') }} >
    <div class="row g-1 align-items-center">
        <div class="col-auto">
            <select name="dept_id_keyword"  class="form-select">
                <option selected>部署を選択してください</option>
                @foreach($depts as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->first_dept }}{{ $dept->second_dept }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <input type="submit" value="表示する" class="btn btn-primary float-start">
        </div>
    </div>
</form>
