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
        //完了した一覧の取得
        $list = CompletedTask::where('user_id', Auth::id())->get();
        $sql = CompletedTask::where('user_id', Auth::id())->toSql();
        return view('completed_list', 'completed_list');
        
    
    }
}
