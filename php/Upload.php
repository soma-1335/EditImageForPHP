<?php
    include 'DataBaseConstants.php';
    require './Dao.php';
    session_start();
    $statusMsg = '';
    $hideen = '';
    $dao = new Dao();
    $user_name = $dao -> getUserName($_SESSION['user_name']);


    $dirName = "../uploads/";
    $filename = basename($_FILES["file"]["name"]); //ファイル名を指定
    $uploadFile = $dirName.$filename;
    $fileType = pathinfo($uploadFile,PATHINFO_EXTENSION);//拡張子を取得
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Upload</title>
</head>
<body>
    <div class="wrapper">
<?php
if(!empty($_FILES["file"]["name"])){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType,$allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$uploadFile)){
            $sql = "INSERT INTO image_table (user_name,fileName,date) VALUES ('".$user_name."','".$uploadFile."',NOW())";
            $stmt = $pdo->prepare($sql);
            if($stmt -> execute()){
                $statusMsg = '<div class = log><p>'.$filename.'が正常にアップロードされました</p>';
                $hidden = $filename;
                echo $statusMsg;
                echo '<a href="./Editer.php?hidden='.$hidden.'">編集ページへ</a></div>';
                exit;
            }
            else{
                $statusMsg = '<div class = log><p>ファイルのアップロードに失敗しました</p>';
                $hideen = 1;
            }
        }
        else{
            $statusMsg = '<div class = log><p>申し訳ありませんファイルのアップロードに失敗しました</p>';
            $hidden = 1;
        }
    }
    else{
        $statusMsg = '<div class = log><p>アップロード可能なファイル形式ではありません</p>';
        $hidden = 1;
    }
}
else{
    $statusMsg = '<div class = log><p>アップロードするファイルを選択してください</p>';
    $hidden = 1;
}

echo $statusMsg;
echo '<a href="./TopPage.php?">TOPページへ</a></div>';
?>
    </div>
</body>
</html>

