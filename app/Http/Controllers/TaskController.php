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
         // 1Page当たりの表示アイテム数を設定
         $per_page = 15;
         //一覧の取得
         $list = TaskModel::where('user_id', Auth::id())
         ->orderBy('priority', 'DESC')
         ->orderBy('period')
         ->orderBy('created_at')
         ->paginate($per_page);
         //->get();
 /*
 $sql = TaskModel::where('user_id', Auth::id())
 ->orderBy('priority', 'DESC')
 ->orderBy('period')
 ->orderBy('created_at')
 ->toSql();
 //echo "<pre>\n"; var_dump($sql, $list); exit;
 var_dump($sql);
 */
         //
         return view('task.list', ['list' => $list]);
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
            //
            return redirect('/task/list');
      }
}