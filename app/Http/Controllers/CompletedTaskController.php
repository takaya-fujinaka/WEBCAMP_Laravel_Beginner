<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedTask;
use Illuminate\Support\Facades\Auth;

class CompletedTaskController extends Controller
{
    //メソッド
    public function list()
    {
        // 1ページあたりの表示アイテム数を設定
        $per_page = 2;
        
        //完了した一覧の取得
        $completed_list = CompletedTask::where('user_id', Auth::id())
                                       ->orderBy('priority', 'DESC')
                                       ->orderBy('period')
                                       ->orderBy('created_at')
                                       ->paginate($per_page);
                                       //->get();
        return view('task.completed_list', ['completed_list' => $completed_list]);
        
    
    }
}
