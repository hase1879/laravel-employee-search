<?php

namespace App\Http\Controllers;

use App\Http\Logic\SeetIndexLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Sitdown;
use App\Models\Seet;
// use App\Models\User;
// use App\Models\Employee;
// use App\Models\Dept;
// use App\Services\SearchEmployeeService;
// use App\Services\TreeDataEmployeeService;
// use Illuminate\Support\Facades\DB;
use App\Services\SeatService;
// use App\Services\MapBoxService;
use Exception;

class SeetController extends Controller
{
    public function index(Request $request, SeetIndexLogic $logic){

        //準備: パラメーターの取得  座席表の初期値は"dept_id=1"
        $dept_id_keyword = isset($request->dept_id_keyword) ? $request->dept_id_keyword : 1;

        return view('seets.index',$logic->search($dept_id_keyword));


    }

    public function edit($id)
    {
        return view('seets.edit', compact('id'));
    }

    public function update_status(Request $request, $id)
    {

        $seat = Seet::find($id);
        $status_number = $request->input('status_number');

        try{
            $service = new SeatService(Auth::user());
            $service->updateStatus($seat, $status_number);
        }catch(Exception $e){
            return redirect()
                ->route('seets.index')
                ->with([
                    'message' => $e->getMessage(),
                    'delete_seat_id' => $seat->id
                ]);
        }


        // try-catchでエラーを全てステータス更新ページに遷移
        return redirect()->route('seets.index');
    }

    public function update_chakuseki($id) {
        $seat = Seet::find($id);
        $seat->sitdown->delete();
        $user = Auth::user();

        $service = new SeatService($user);
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

