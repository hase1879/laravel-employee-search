<?php

namespace App\Http\Controllers;

use App\Http\Logic\SeetIndexLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seet;
use App\Services\SeatService;
use Exception;

class SeetController extends Controller
{
    public function index(Request $request, SeetIndexLogic $logic)
    {

        //準備: パラメーターの取得  座席表の初期値は"dept_id=1"
        $dept_id_keyword = isset($request->dept_id_keyword) ? $request->dept_id_keyword : 1;

        return view('seets.index', $logic->search($dept_id_keyword));
    }

    public function edit($id)
    {
        return view('seets.edit', compact('id'));
    }

    public function update_status(Request $request, $id)
    {

        $seat = Seet::find($id);
        $status_number = $request->input('status_number');

        try {
            $service = new SeatService(Auth::user());
            $service->updateStatus($seat, $status_number);
        } catch (Exception $e) {
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

    public function update_chakuseki($id)
    {
        $seat = Seet::find($id);

        // 選択した着席情報を削除
        $seat->sitdown->delete();

        // ログインユーザーの着席情報をsitdownテーブルに保存
        $user = Auth::user();
        $service = new SeatService($user);
        $service->着席($user, $seat);

        return redirect()->route('seets.index')->with('sitdown_delete_message', '着席情報を更新しました。');
    }
}
