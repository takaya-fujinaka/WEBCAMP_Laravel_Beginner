<!DOCTYPE html>
<html lang= "ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン機能付きタスク管理サービス　会員登録</title>
    </head>
    <body>
        @extends('admin.layout')
        {{-- メインコンテンツ --}}
        @section('contets')
        <h1>ユーザ登録</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="/user/register" method="post">
            @csrf
            名前:<input><br>
            email:<input><br>
            パスワード<input><br>
        </form>
    </body>
</html>