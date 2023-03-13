<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\TreeGroupService;
use App\Services\TreeBranchService;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {

        // usersテーブルはuser_idにより取得。(本来は、withでN+1問題を解決する)
        $employees = Employee::all();

        // 社員名_検索キーワード
        $keyword = $request->keyword;

        // 支社-部署-社員データを木構造に整える
        $branches = [];
        foreach($employees as $employee){
            $sishaName = $employee->所属支社;

            // 検索キーワード対象外はスキップ
            if($keyword && strpos($employee->user->name, $keyword) === false){
                continue;
            }

            // クラスの宣言
            if(!isset($branches[$sishaName])){
                $branches[$sishaName] = new TreeBranchService($sishaName);
            }

            $branches[$sishaName]->addEmployee($employee);
        }

        return view('employees.index', compact('branches'));
    }

    public function show($id){

        $employee = Employee::find($id);

        return view('employees.show', compact('employee'));
    }
}



