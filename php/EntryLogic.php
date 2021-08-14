<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
require './Dao.php';

/** ユーザー登録処理の結果に合わせてEntry.phpにメッセージを出させる */
$dao = new Dao();
if(empty($_POST['id']) || empty($_POST['password']) || empty($_POST['password2'])){
    header('Location: ./Entry.php?error=3');
}

if($_POST['password'] != $_POST['password2']){
    header('Location: ./Entry.php?error=1');
}

$result = $dao -> entry($_POST);
if($result == 1){
    header('Location: ./Entry.php?error=2');
}
else{
    echo 'ユーザー登録に成功しました<br>';
    echo '<a href="../html/index.html">ログインページへ<a>';
}




?>
</body>
</html>
