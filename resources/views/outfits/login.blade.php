<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ログイン画面</h1>
        <form action="/login" method="POST">
            @csrf
            <div class="email">
                <h2>メールアドレスの入力</h2>
                <input type="text" name="email" placeholder="example@xxx.com"/>
            </div>
            <div class="password">
                <h2>パスワードの入力</h2>
                <input type="password" name="password" placeholder="password"/>
            </div>
            <input type="submit" value="login"/>
        </form>
    </body>
</html>