{{-- 社員一覧_サイドメニュー--}}
{{-- サイドメニュー --}}
<div class="col-12 col-lg-2 d-none d-lg-block bg-green ">
    <div class="bg-white">
        <div class="sidebar_fixed  p-3">
            <div class="employee-sidemenu">

                <ul>
                    @foreach ($dept_group as $first_dept => $depts)
                        <details>
                        <summary class="py-1"><a  href="{{ route('employees.index', ['dept_keyword' => $first_dept]) }}">{{ $first_dept }}</a></summary>
                        @foreach ($depts as $dept)
                        <li class="py-1" style="margin-left:30px"><a href="{{ route('employees.index', ['dept_keyword' => $dept->second_dept]) }}">{{ $dept->second_dept }}</a></li>
                        @endforeach
                        </details>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>

<link
rel="stylesheet"
href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
crossorigin="anonymous"
/>

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


</style>





