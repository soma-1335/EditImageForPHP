<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <h1>ユーザー登録画面</h1>
        <form action="./EntryLogic.php" method="post" class="logent_form">
            <input type="text" name="id" placeholder="IDを入力"><br>
            <input type="password" name="password" placeholder="パスワードを入力"><br>
            <input type="password" name="password2" placeholder="パスワードの再入力"><br>
            <input type="submit" value="登録"><br>

            <a class="logent_a" href="../html/index.html">ログインページはこちら</a>
        </form>
        <?php if(isset($_GET['error']) && $_GET['error'] == 1):?>
            <p style="color:red;"> パスワードが一致しません</p>
        <?php elseif(isset($_GET['error']) && $_GET['error'] == 2):?>
            <p style="color:red;"> このユーザー名はすでに使用済みです</p>
        <?php elseif(isset($_GET['error']) && $_GET['error'] == 3):?>
            <p style="color:red;"> 入力値に誤りがあります</p>
        <?php endif;?>
    </div>
    
</body>
</html>