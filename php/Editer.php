<!DOCTYPE html>
<html lang="ja">
<?php 
    require 'Dao.php';
    require 'EditerLogic.php';

    class Editor{

    }

    $dao = new Dao();
    /** このページに初回訪問時の処理 */
    $array = isset($_POST['sepia']) ? $_POST : array('sepia'=>'0','brightness'=>'100','saturate'=>'100','contrast'=>'100','blur'=>'0');
    
    /** $hiddenには画像のパスが入る */
    $hidden;
    if(empty($_POST['hidden'])){
        $hidden = $_GET['hidden'];
    }
    else{
        $hidden = $_POST['hidden'];
    }
    
    /** EditerLogicのインスタンスの作成 */
    $editerLogic = new EditerLogic($array);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Editer</title>

    <style type="text/css">
    
        .uploadImage{
            max-width: 500px;
            max-height: 300px;
            <?php 
                $editerLogic -> getFilters();
            ?>
        }
    </style>
</head>
<body>

<div class="wrapper2">
    <form action="Editer.php" method="post">
        <dl>
            <dt>セピア調(0~100)</dt>
            <dd><input type="number" name="sepia" value = "<?php echo $array['sepia'] ?>"></dd>
            <dt>明度(0~200)</dt>
            <dd><input type="number" name="brightness" value = "<?php echo $array['brightness'] ?>"></dd>
            <dt>彩度</dt>
            <dd><input type="number" name="saturate" value = "<?php echo $array['saturate'] ?>"></dd>
            <dt>コントラスト</dt>
            <dd><input type="number" name="contrast" value= "<?php echo $array['contrast'] ?>"></dd>
            <dt>ぼかし</dt>
            <dd><input type="number" name="blur" value="<?php echo $array['blur'] ?>"></dd>
        </dl>
            <input type="hidden" name="hidden" value="<?php echo $hidden ?>">
            <input type="submit" value = "変更">
    </form>
    
    <img class="uploadImage" id="editImage" src="<?php echo $dao -> getImageUrl($hidden);?>" alt="画像"><br>
    <a href="./TopPage.php">画像を選び直す</a>
</div>

</body>
</html>