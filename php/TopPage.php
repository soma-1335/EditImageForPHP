<!DOCTYPE html>
<html lang="ja">
<?php require './Dao.php';?>
<?php 
// ファイル名の取得をファイルのidで行うようにし、別ファイルにパラメータとしてその数値を送信する。
    $dao = new Dao;
    session_start();
    $user_name = $dao->getUserName($_SESSION['user_name']);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Top</title>

</head>
<body>
    <div class="wrapper">
        <h3> ようこそ <?php echo $user_name; ?>さん</h3>
        <h1>　画像をアップロードしてください </h1>
        <form action="Upload.php" method="post" enctype="multipart/form-data" id="imageForm">
            <div class="formEria">
                <p>Drag and Drop or Click</p>
                <input type="file" name="file" id ="uploadImage">

            </div>
                
                <input type="submit" value="アップロード" id="uploadButton">
        </form>
    

        <br>

        <a href="./LogOut.php" class="logOut">ログアウト</a>

        <br>
        <br>
        <h1>いままでアップロードした画像</h1>
        <br>
        <hr>
        <br>

        <div class="saveImages">
            <?php
                $results = $dao -> saveImages($user_name); 
                foreach($results as $rows){?>
                <?php 
                    $file = explode("/",$rows['fileName'])[1];
                ?>
                <div class="item">
                    <a href="./Editer.php?hidden=<?php echo $file; ?>"><img src="<?php echo $rows['fileName']?>"></a>
                </div>
            <?php }?>
        </div>
    </div>
</body>
</html>