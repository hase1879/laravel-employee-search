{{-- 社員一覧_サイドメニュー--}}
{{-- サイドメニュー --}}
<div class="col-12 col-lg-2 d-none d-lg-block bg-green ">
    <div class="bg-white">
        <div class="sidebar_fixed  p-3">
            <div class="employee-sidemenu">

                <ul>
                    @foreach ($dept_group as $first_dept => $depts)
                        <details>
                        <summary class="py-1"><i class="fas fa-folder-open fa-lg"></i><a  class="ps-1" href="{{ route('employees.index', ['dept_keyword' => $first_dept]) }}">{{ $first_dept }}</a></summary>
                        @foreach ($depts as $dept)
                        <li class="py-1" style="margin-left:30px"><i class="fas fa-file fa-lg"></i><a   class="ps-1" href="{{ route('employees.index', ['dept_keyword' => $dept->second_dept]) }}">{{ $dept->second_dept }}</a></li>
                        @endforeach
                        </details>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>



<style type="text/css">

.sidebar_fixed{
position: sticky;
top: 0;
left: 0;
width:100%;
/* ヘッダー分を下げる */
height:100vh;
display: block;
overflow-x: hidden;
overflow-y: auto;
}

.employee-sidemenu{
    font-size:15px;
}

.employee-sidemenu a{
    text-decoration: none;
    color: black;
    /* font-weight:bold; */
}

.employee-sidemenu a:hover {
    color: #00aeff;
}


.employee-sidemenu ul{
    padding: 0;
}

/* summary {
  display: block;
  list-style: none;
} */

li{
    list-style:none;
}

i{
    height: 20px;
}


</style>





