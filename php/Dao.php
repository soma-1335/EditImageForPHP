<?php 
include './DataBaseConstants.php';

/**　データベースに対する処理を担当するクラス */
class Dao{  

    /** 画像までのパスを獲得する */
    public function getImageurl($path){ 
        global $pdo;
        $fileName = "../uploads/".$path;
        $sql = 'SELECT * FROM image_table WHERE fileName=:fileName';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fileName',$fileName, PDO::PARAM_STR);
        $stmt->execute();

        $results = $stmt->fetch();

        $file = $results['fileName'];
        
        return $file;
    }

    /**　ユーザーネームを獲得する */
    public function getUserName($id){
        global $pdo;
        $sql = 'SELECT * FROM user_info WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id, PDO::PARAM_STR);
        $result = $stmt->execute();

        $results = $stmt -> fetch();

        return $results['user_name'];
    }

    /** ユーザー登録を行う */
    public function entry($info){
        global $pdo;
        $sql = 'SELECT * FROM user_info WHERE user_name=:user_name';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_name',$info['id'], PDO::PARAM_STR);
        $result = $stmt->execute();

        $count = $stmt->rowCount();
        if($count != 0){
            return 1;
        }

        $sql = 'INSERT INTO user_info (user_name,password) VALUES (:user_name,:password)';
        $stmt = $pdo->prepare($sql);
        $stmt -> bindParam(':user_name',$info['id'],PDO::PARAM_STR);
        $stmt ->bindParam(':password',$info['password'],PDO::PARAM_STR);
        $stmt ->execute();

        return 2;
    }

    /** ログイン処理を行う */
    public function login($array){
        global $pdo;
        $sql = 'SELECT * FROM user_info WHERE user_name=:user_name';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_name',$array['id'], PDO::PARAM_STR);
        $result = $stmt->execute();

        if($result==false){
            return 0;
        }

        $results = $stmt->fetch();

        if($array['password'] == $results['password']){
            return $results['id'];
        }
        else{
            return 0;
        }
    }

    /**  保存した画像の一覧を取得する */
    public function saveImages($user_name){
        global $pdo;
        $sql = "SELECT * FROM image_table WHERE user_name=:user_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_name',$user_name, PDO::PARAM_STR);
        $stmt->execute();

        $results = $stmt->fetchAll();

        return $results;
    }
        
}
?>