<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedTask;

class CompletedTaskController extends Controller
{
    //メソッド
    public function list()
    {
        //完了した一覧の取得
        $list = CompletedTaskModel::where('user_id', Auth::id())->get();
        $sql = CompletedTaskModel::where('user_id', Auth::id())->toSql();
        //echo "<pre>\n"; var_dump($sql, $list); exit;
        return view('completed_list', 'completed_task/list');
        
    
    }
}
