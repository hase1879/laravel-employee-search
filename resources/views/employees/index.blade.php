{{-- employees --}}

@extends('layouts.app')

@section('content')
<script src="{{ asset('/js/employee-grid.js') }}"></script>

    <div class="container">
        {{ Breadcrumbs::render('employees.index') }}

        <div class="row">
            {{-- サイドバー --}}
            <div class="col-3">
                @include('layouts.sidebar', ['major_category' => $major_category,'category' => $category])
            </div>


            <div class="col-9">
                <h3>社員一覧</h3>


                <div id="test-grid"></div>
                <div id="sample-table-wrapper"></div>

                {{-- 社員一覧表の出力（grid.jsを使用） --}}
                <table id="sample-table" style="display:none;">
                <thead>
                    <tr><th>氏名</th><th>ふりがな</th><th>所属支社</th><th>所属部署</th><th>メールアドレス</th><th>電話番号</th><th>携帯番号</th><th>着席位置</th><th>着席状況</th></tr>
                </thead>
                <tbody>
                    @foreach($employee_list as $employee)
                    <tr><td><a class="employees-show-link" href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</td><td>{{ $employee->furigana }}</td><td>{{ $employee->shisha_name }}</td><td>{{ $employee->busho_name }}</td><td>{{ $employee->email }}</td><td>{{ $employee->phone_number }}</td><td>{{ $employee->mobile_phone_number }}</td><td>{{ $employee->seatnumber }}</td><td>{{ $employee->status }}</td></tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalSample" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSampleLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content" style="width:740px; margin-left: -70px;">
            <div class="modal-header">
            <h5 class="modal-title" id="modalSampleLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('employees.show', $employee->id) }}'">詳細</button>
            </div>
        </div>
        </div>
    </div>

  <script>
    $(function(){
        $(".employees-show-link").on("click",function(){
            // console.log(this.getAttribute("href"));
            // クリック時に、URL取得
            const url = $(this).attr("href");

            // 関数実行
            openModalSample(url);

            // ページ遷移防止
            return false;
        });
    });
    function openModalSample(url){
        // HTMLデータ取得
        $.get(url, function(res){
            $("#modalSample .modal-body").html($(res).find("main").html());
        });

        // Via JavaScript: JavaScript 1行でモーダルを作成します。
        const myModal = new bootstrap.Modal(document.getElementById('modalSample'), {

        });
        myModal.show();
    }
    </script>
@endsection

                {{-- 支社-部署-社員の一覧表示 --}}
                {{-- <table class="products-table">
                    <tr>
                        <th>氏名</th>
                        <th>ふりがな</th>
                        <th>所属支社</th>
                        <th>所属部署</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>携帯番号</th>
                        <th>着席位置(seetnumber)</th>
                        <th>着席状況(status)</th>
                    </tr>
                    @if (isset($branches))
                        @foreach ($branches as $branch)
                            @foreach ($branch->groups as $group)
                                @foreach ($group->employees as $employee)
                                    <tr>
                                        <td><a class="employees-show-link" href="{{ route('employees.show', $employee->id) }}">{{ $employee->user->name }}
                                        </td>
                                        <td>{{ $employee->user->furigana }}</td>
                                        <td>{{ $employee->所属支社 }}</td>
                                        <td>{{ $employee->所属部署 }}</td>
                                        <td>{{ $employee->user->email }}</td>
                                        <td>{{ $employee->user->phone_number }}</td>
                                        <td>{{ $employee->user->mobile_phone_number }}</td>
                                        <td>
                                            {{ $seatnumber = isset($employee->user->sitdown->seet->seetnumber) ? $employee->user->sitdown->seet->seetnumber : null }}
                                        </td>
                                        <td>
                                            {{ $seatnumber = isset($employee->user->sitdown->status) ? $employee->user->sitdown->status : null }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endif
                </table> --}}
