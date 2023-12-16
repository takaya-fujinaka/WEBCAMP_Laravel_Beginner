<!DOCTYPE html>
<html lang= "ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン機能付きタスク管理サービス　管理画面</title>
    </head>
    <body>
        <h1>管理画面　ログイン</h1>
        <form action="/admin/login" method="post">
            ログインID:<input name="login_id"><br>
            パスワード:<input name="password" type="password"><br>
            <button>ログイン</button>
        </form>
    </body>
</html>