<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * トップページを表示する
     * 
     * ＠return \Illuminate\View\View
     */
     public function list()
     {
        //データの取得
        $group_by_column = ['users.id', 'users.name'];
        $list = UserModel::select($group_by_column)
                          ->selectRaw('count(tasks.id) AS task_num')
                          ->leftJOIN('tasks', 'users.id', '=', 'tasks.user_id')
                          ->groupBY($group_by_column)
                          ->orderBy('users.id')
                          ->get();
    echo "<pre>\n";
    var_dump($list->toArray()); exit;
        return view('admin.user.list', ['users' => $list]);
     }
     
}