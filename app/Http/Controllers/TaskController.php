<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      /**
       * タスクの詳細閲覧
       */
       public function detail($task_id)
       {
        //
        return $this->singleTaskRender($task_id, 'task.detail');
       }
       /**
        * タスクの編集画面表示
        */
        public function edit($task_id)
        {
         // task_idのレコードを取得する
         // テンプレートに「取得したレコード」の情報を渡す
         return $this->singleTaskRender($task_id, 'task.edit');
        }
        /**
         * 「単一タスク」Modelの取得
         */
        protected function getTaskModel($task_id)
        {
          // task_idのレコードを取得する
          $task = TaskModel::find($task_id);
          if ($task === null) {
           return null;
          return redirect('/task/list');
        }
          // 本人以外のタスクならNGとする
          if ($task->user_id !== Auth::id()) {
           return null;
        }
        return $task;
        }
        /**
         * 「単一のタスク」の表示
         */
         protected function singleTaskRender($task_id, $template_name)
         {
          // task_idのレコードを取得する
          $task = $this->getTaskModel($task_id);
          if ($task === null) {
           return redirect('/task/list');
          }
        // テンプレートに「取得したレコード」の情報を渡す
        return view($template_name, ['task' => $task]);
         }
         /**
          * タスクの編集処理
          */
          public function editSave(TaskRegisterPostRequest $request, $task_id)
          {
           // formからの情報を取得する
           $datum = $request->validated();
           // task_idのレコードを取得する
           $task = $this->getTaskModel($task_id);
           if ($task === null) {
            return redirect('/task/list');
           }
           // 本人以外のタスクならNGとする
           if ($task->user_id !== Auth::id()) {
            return redirect('/task/list');
           }
           // レコードの内容をUPDATEをする
           $task->name = $datum['name'];
           $task->period = $datum['period'];
           $task->detail = $datum['detail'];
           $task->priority = $datum['priority'];
           /*可変変数を使った書き方（参考）
          foreach($datum as $k => $v) {
           $task->$k = $v;
          }
          */
          //レコードを更新
          $task->save();
          //タスク編集成功
          $request->session()->flash('front.task_edit_success', true);
           
           // 詳細閲覧画面にリダイレクトする
           return redirect(rouote('detail', ['task_id' => $task->id]));
          }
          /**
           * 削除処理
           */
           public function delete(Request $request, $task_id)
           {
            // task_idのレコードを取得する
            $task = $this->getTaskModel($task_id);
            //タスクを削除る
            if ($task !== null) {
             $task->delete();
              $request->session()->flash('front.task_delete_success', true);
            }
            //一覧に遷移する
            return redirect('/task/list');
           }
           /**
            * タスクの完了
            */
            public function complete($task_id)
            /*タスクを完了テーブルに移動させる*/
            try {
             // トランザクションの開始
             DB::beginTransaction();
             //task_idのレコードを取得する
             $task = $this->getTaskModel($task_id);
             if ($task === null) {
              // task_idが不正なのでトランザクション終了
              throw new \Exception('');
             }
             var_dump($task->toArray()); exit;
             //tasks側を削除する
             //completed_tasks側にinsertする
             
             //トランザクション終了
             DB::commit();
            } catch(\Throwable $e){
             //トランザクション異常終了
             DB::rollBack();
            }
            
           
            
            //一覧に遷移する
         
}