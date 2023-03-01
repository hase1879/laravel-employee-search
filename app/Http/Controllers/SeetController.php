<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sitdown;
use App\Models\Seet;
use App\Models\User;
use App\Models\Employee;
use App\Services\SearchEmployeeService;
use App\Services\TreeDataEmployeeService;
use Illuminate\Support\Facades\DB;
use App\Services\SeatService;

class SeetController extends Controller
{
    public function index(Request $request){

        $seats = Seet::all();

        // 検索機能
        $service = new SearchEmployeeService();
        $user_results = $service->search($request->keyword);


        // // // データのツリー化
        // $employees = Employee::with('user')->get();
        // $service = new TreeDataEmployeeService();
        // $tree = $service->treedata($employees);


        $keyword = $request->keyword;

        $employees = Employee::all();

        $tree = [];
        foreach($employees as $employee){
            $sishaName = $employee->所属支社;
            $bushoName = $employee->所属部署;

            if($keyword && strpos($employee->user->name, $keyword) === false){
                continue;
            }

            if(!isset($tree[$sishaName]))$tree[$sishaName] = [];
            if(!isset($tree[$sishaName][$bushoName]))$tree[$sishaName][$bushoName] = [];
            $tree[$sishaName][$bushoName][] = $employee;
        }

        $branches = [];
        foreach($employees as $employee){
            $sishaName = $employee->所属支社;

            if(!isset($branches[$sishaName])){
                $branches[$sishaName] = new Tree_Branch($sishaName);
            }

            $branches[$sishaName]->addEmployee($employee);
        }

        // 座席表一覧
        $seatservice = new SeatService();
        $sitdowns = Sitdown::with("user")->get()->groupBy("seet_id");

        return view('seets.index',compact('seats', 'sitdowns', 'user_results', 'employees', 'tree', 'keyword' /*'branches'*/));
    }

    public function edit($id)
    {
        return view('seets.edit', compact('id'));
    }

    public function update_status(Request $request, $id)
    {

        $service = new SeatService();
        $seat = Seet::find($id);
        $user = Auth::user();

        $status_number = $request->input('status_number');

        if ($status_number == 1){
            $service->着席($user, $seat);
        }elseif ($status_number == 2){
            $service->会議中に変更($user, $seat);
        }elseif ($status_number == 3){
            $service->一時的に離席した($user, $seat);
        }else{
            $service->離席($user, $seat);
        }

        return redirect()->route('seets.index');
    }
}

class Tree_Branch {

    public $name;
    public $groups = [];

    function __construct($name){
        $this->name = $name;
    }

    function getGroup($bushoName){
        if(!isset($this->groups[$bushoName])){
            $group = new Tree_Group();
            $group->name = $bushoName;
            $this->groups[$bushoName] = $group;
        }
        return $this->groups[$bushoName];
    }

    function addEmployee($employee){
        $bushoName = $employee->所属部署;
        $group = $this->getGroup($bushoName);
        $group->addEmployee($employee);
    }
}


class Tree_Group {

    public $name;
    public $employees;

    function addEmployee($employee){
        $this->employees[] = $employee;
    }

}
