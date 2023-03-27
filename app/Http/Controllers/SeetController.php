<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sitdown;
use App\Models\Seet;
use App\Models\User;
use App\Models\Employee;
use App\Models\Dept;
use App\Services\SearchEmployeeService;
use App\Services\TreeDataEmployeeService;
use Illuminate\Support\Facades\DB;
use App\Services\SeatService;
use App\Services\MapBoxService;
use Exception;

class SeetController extends Controller
{
    public function index(Request $request){

        $seats = Seet::all();

        $depts = Dept::all();
        $first_depts = Dept::all()->pluck('first_dept')->unique();

        // 検索機能
        $service = new SearchEmployeeService();
        $user_results = $service->search($request->keyword);

        // dd($request->dept_id_keyword);

        // 座席表の初期値は"dept_id=1"
        $dept_id_keyword = isset($request->dept_id_keyword) ? $request->dept_id_keyword : 1;

        $employees = Employee::all();

        $tree = [];
        foreach($employees as $employee){
            $first_dept = $employee->dept->first_dept;
            $second_dept = $employee->dept->second_dept;

            if (strpos($dept_id_keyword, $employee->dept->id) === false) {
                continue;
            }

            // 変数をifで条件付けしてそれぞれ作成
            if(!isset($tree[$first_dept]))$tree[$first_dept] = [];
            if(!isset($tree[$first_dept][$second_dept]))$tree[$first_dept][$second_dept] = [];
            $tree[$first_dept][$second_dept][] = $employee;
        }

        // // // データのツリー化
        // $employees = Employee::with('user')->get();
        // $service = new TreeDataEmployeeService();
        // $tree = $service->treedata($employees);

        // DTO版
        $branches = [];
        foreach($employees as $employee){
            $sishaName = $employee->所属支社;

            // クラスの宣言
            if(!isset($branches[$sishaName])){
                $branches[$sishaName] = new Tree_Branch($sishaName);
            }

            $branches[$sishaName]->addEmployee($employee);
        }

        // 座席表一覧
        $seatservice = new SeatService();
        $sitdowns = Sitdown::with("user")->get()->groupBy("seet_id");


        // 座席アイコンを作成
        // $box_list = [];
        $seats = Seet::with('sitdown')->get();

        // $test_keyword = 2;

        foreach($depts as $dept){
            if (strpos($dept_id_keyword, $dept->id) === false) {
                continue;
            }

            $map_image = $dept->map_image;

            // 各部署にフロアマップは1つのみ
            if(!isset($box_list) && isset($dept->seet)){
            foreach($dept->seet as $seat){
                $box_list[] = new MapBoxService(
                    $seat->seetnumber,
                    $user_name = isset($seat->sitdown->user->name) ? $seat->sitdown->user->name : '空席',
                    $seat->width,
                    $seat->height,
                    $seat->top,
                    $seat->left,
                    $seat_status = isset($seat->sitdown->status) ? $seat->sitdown->status : 'null',
                    $seat->id
                );
            }
            }

            if(!isset($box_list)){
                $box_list = "";
            }

        }

        return view('seets.index',compact('seats', 'sitdowns', 'user_results', 'employees', 'tree', 'box_list','depts' ,'first_depts', 'map_image'/*'branches'*/));
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
            try{
            $service->着席($user, $seat);
            }catch(Exception $e){
                redirect()->route('seets.index')->with(['message' => $e->getMessage(), 'delete_seat_id' => $seat->id]);
            }
        }elseif ($status_number == 2){
            $service->会議中に変更($user, $seat);
        }elseif ($status_number == 3){
            $service->一時的に離席した($user, $seat);
        }else{
            $service->離席($user, $seat);
        }

        // try-catchでエラーを全てステータス更新ページに遷移
        return redirect()->route('seets.index');
    }

    public function update_chakuseki($id) {
        $seat = Seet::find($id);
        $seat->sitdown->delete();
        $user = Auth::user();

        $service = new SeatService();
        $service->着席($user, $seat);

        return redirect()->route('seets.index')->with('sitdown_delete_message', '着席情報を更新しました。');
    }
}

// 支社名
class Tree_Branch {

    public $name;
    public $groups = [];

    function __construct($name){
        $this->name = $name;
    }

    function getGroup($bushoName){
        // groups[$bushoName]がなければ初期化
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

// 部署名　foreach内のemployeeを使用
class Tree_Group {

    public $name;
    public $employees;

    function addEmployee($employee){
        $this->employees[] = $employee;
    }

}

