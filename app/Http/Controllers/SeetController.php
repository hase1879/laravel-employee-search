<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sitdown;
use App\Models\Seet;
use App\Models\User;
use App\Models\Employee;
use App\Services\SearchEmployeeService;
use Illuminate\Support\Facades\DB;

class SeetController extends Controller
{
    public function index(Request $request){

        $seets = Seet::all();

        $users = User::all();

        // 検索機能
        $service = new SearchEmployeeService();
        $user_results = $service->search($request->keyword);

        // カテゴリ機能
        // $major_category_names = Category::pluck('major_category_name')->unique();
        $所属支社s = Employee::pluck('所属支社')->unique();
        $所属部署s = DB::table('employees')->distinct()->select('所属支社','所属部署')->get();
        $employees = Employee::with('user')->get();



        $tree = $employees->groupBy("所属支社")->map(function($collection){
            return $collection->groupBy("所属部署");
        });


        /*
        $tree = [];
        foreach($employees as $employee){
            $sishaName = $employee->所属支社;
            $bushoName = $employee->所属部署;

            if(!isset($tree[$sishaName]))$tree[$sishaName] = [];
            if(!isset($tree[$sishaName][$bushoName]))$tree[$sishaName][$bushoName] = [];
            $tree[$sishaName][$bushoName][] = $employee;
        }
        */

        // $所属支社_部署s = Category::all()->unique(function ($item) {
        //  return $item['所属支社'].$item['所属部署'];
        //  });


        return view('seets.index',compact('seets','users', 'user_results', '所属支社s', '所属部署s', 'employees', 'tree'));
    }

    // 更新ページ
    public function edit($id)
    {
        return view('seets.edit', compact('seet'));
    }

    public function update(Request $request, $id)
    {
        // 座席者の変更
        // $seet->user_id = $user->id;
        $seet->save();

        return redirect()->route('seets.index');
    }
}
