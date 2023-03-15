<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Services\EmployeeInfoService;
use App\Services\EmployeeListService;

class TestPagenationController extends Controller
{
    function testPagenation(){

        // 社員一覧表用データの取得
        $employees = Employee::with('user')->get();
        $service = new EmployeeListService();
        $employee_list = $service->employeeList($employees);

        return view('test-pagenation', compact('employee_list'));
    }
}
