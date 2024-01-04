<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * トップページを表示する
     * 
     * ＠return \Illuminate\View\View
     */
     public function index()
     {
         return view('admin/register');
     }
     public function register(UserRegisterPost $request)
     {
         $datum = $request->validate();
         var_dump($datum); exit;
     }
     
}