<!DOCTYPE html>
<html lang= "ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン機能付きタスク管理サービス　管理画面</title>
    </head>
    <body>
        @extends('admin.layout')
        {{-- メインコンテンツ --}}
        @section('contets')
        <h1>管理画面　ログイン</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="/admin/login" method="post">
            @csrf
            ログインID:<input name="login_id" value="{{ old('login_id') }}"><br
            パスワード:<input name="password" type="password"><br>
            <button>ログイン</button>
        </form>
    </body>
</html>