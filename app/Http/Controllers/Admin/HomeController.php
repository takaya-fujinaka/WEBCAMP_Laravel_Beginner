<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * トップページを表示する
     * 
     * ＠return \Illuminate\View\View
     */
     public function top()
     {
         return view('admin.top');
     }
     
}