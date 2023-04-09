<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Dept;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\TreeGroupService;
use App\Services\TreeBranchService;
use App\Services\EmployeeInfoService;
use App\Services\EmployeeListService;
use Exception;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        // 社員一覧表用データの取得
        $employees = Employee::with('user')->get();
        $dept_keyword = $request->dept_keyword;

        // 取得データを"$employee_list"に代入
        $service = new EmployeeListService();
        try{
            $employee_list = $service->employeeList($employees,$dept_keyword);
        }catch(Exception $e){
            return redirect()->route('home')->with('message', $e->getMessage());
        }

        // カテゴリー用にデータ取得
        $depts = Dept::all()->groupBy('first_dept');

        return view('employees.index', compact('employee_list', 'depts'));
    }

    public function show($id){

        $employee = Employee::find($id);

        return view('employees.show', compact('employee'));
    }
}



