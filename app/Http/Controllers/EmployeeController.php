<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\TreeGroupService;
use App\Services\TreeBranchService;
use App\Services\EmployeeInfoService;
use App\Services\EmployeeListService;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {

        // 社員名_検索キーワード
        $sishaName_keyword = $request->sishaName_keyword;
        $bushoName_keyword = $request->bushoName_keyword;

        // 社員一覧表用データの取得
        $employees = Employee::with('user')->get();
        $service = new EmployeeListService();
        $employee_list = $service->employeeList($employees);

        // カテゴリー用にデータ成形
        $major_category = collect($employees)->unique('所属支社')->pluck('所属支社');
        $category = collect($employees)->unique('所属部署')->pluck('所属部署');


        // 支社-部署-社員データを木構造に整える
        // usersテーブルはuser_idにより取得。(本来は、withでN+1問題を解決する)
        // $employees = Employee::all();
        // $branches = [];
        // foreach($employees as $employee){
        //     $sishaName = $employee->所属支社;

        //     // 検索キーワード対象外はスキップ
        //     if($keyword && strpos($employee->user->name, $keyword) === false){
        //         continue;
        //     }

        //     if($sishaName_keyword && strpos($sishaName, $sishaName_keyword) === false){
        //         continue;
        //     }

        //     if($bushoName_keyword && strpos($bushoName, $bushoName_keyword) === false){
        //         continue;
        //     }

        //     // クラスの宣言
        //     if(!isset($branches[$sishaName])){
        //         $branches[$sishaName] = new TreeBranchService($sishaName);
        //     }

        //     $branches[$sishaName]->addEmployee($employee);
        // }

        return view('employees.index', compact('employee_list', 'major_category', 'category'));
    }

    public function show($id){

        $employee = Employee::find($id);

        return view('employees.show', compact('employee'));
    }
}



