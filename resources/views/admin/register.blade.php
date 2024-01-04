<!DOCTYPE html>
<html lang= "ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン機能付きタスク管理サービス　会員登録</title>
    </head>
    <body>
        <h1>ユーザ登録</h1>
        <form action="/user/register" method="post">
            @csrf
            名前:<input><br>
            email:<input><br>
            パスワード<input><br>
            <button>登録する</button><br>
        </form>
    </body>
</html>