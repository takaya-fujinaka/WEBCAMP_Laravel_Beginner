<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * トップページを表示する
     * 
     * ＠return \Illuminate\View\View
     */
     public function index()
     {
         return view('test.index');
     }
     /**
      * 入力を受け取る
      * 
      * @return \Illuminate\View\View
      */
      public function input(Request $request)
      {
          //
          $email = $request->input('email');
          $pass = $request->input('password');
          var_dump($email,$pass); exit;
          
          //return view('test.input');
      }
}