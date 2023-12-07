<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;

class TaskController extends Controller
{
 /**
     * タスク一覧ページを表示する
     * 
     * ＠return \Illuminate\View\View
     */
     public function list()
     {
         return view('task.list');
     }
     /**
      * タスクの新規登録
      */
      public function register(TaskRegisterPostRequest $request)
      {
          // validate済みのデータの取得
          $datum = $request->validated();
          //
          //$user = Auth::user();
          //$id = Auth::id();
          //var_dump($datum, $user, $id); exit;
          //　user_idの追加
          $datum['user_id'] = Auth::id();
          // テーブルへのINSERT
          try {
            $r = TaskModel::create($datum);
            var_dump($r); exit;
            } catch (\Throwable $e) {
             //xxx 本当はログに書く等の処理をする。今回はいったん「出力する」だけ
             echo $e->getMessage();
             exit;
            }
            return redirect('/task/list');
            //タスク登録成功
            $request->session()->flash('front.task_register_success', true);
      }
}