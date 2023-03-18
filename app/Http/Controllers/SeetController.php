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
use App\Services\MapBoxService;
use Exception;

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

        $sishaName_keyword = $request->sishaName_keyword;
        $bushoName_keyword = $request->bushoName_keyword;

        $employees = Employee::all();

        $tree = [];
        foreach($employees as $employee){
            $sishaName = $employee->所属支社;
            $bushoName = $employee->所属部署;

            if($sishaName_keyword && strpos($sishaName, $sishaName_keyword) === false){
                continue;
            }

            if($bushoName_keyword && strpos($bushoName, $bushoName_keyword) === false){
                continue;
            }

            // 変数をifで条件付けしてそれぞれ作成
            if(!isset($tree[$sishaName]))$tree[$sishaName] = [];
            if(!isset($tree[$sishaName][$bushoName]))$tree[$sishaName][$bushoName] = [];
            $tree[$sishaName][$bushoName][] = $employee;
        }

        $shishaNames = collect($tree)->pluck('shishaName');
        // dd($tree[$sishaName]);


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
        $box_list = [];
        $seats = Seet::with('sitdown')->get();

        foreach($seats as $seat){
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

        return view('seets.index',compact('seats', 'sitdowns', 'user_results', 'employees', 'tree', 'box_list', /*'branches'*/));
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

