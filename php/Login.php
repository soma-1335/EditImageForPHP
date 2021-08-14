<?php
require './Dao.php';

$dao = new Dao();
session_start();

/** ログイン処理 */
if(isset($_POST['id']) && isset($_POST['password'])){
    $result = $dao -> login($_POST);
    if($result == 0){
        echo 'ユーザー名又はパスワードが違います<br>';
        echo '<a href="../html/index.html">ログインページへ<a>';
    }
    else{
        session_regenerate_id(true);
        $_SESSION['user_name'] = $result;
        header('Location: ./TopPage.php');
    }
}


?>