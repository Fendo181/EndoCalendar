<?php

//DB設定
define('DSN','mysql:host=localhost;dbname=todo_app');
define('DB_USERNAME','endo181');
define('DB_PASSWORD','kimkim');

function convert_enc($str){
    $from_enc = 'EUC_JP';
    $to_enc = 'SJIS';

    return mb_convert_encoding($str, $to_enc, $from_enc);
}

//formから値を受け取る
$date_post=$_POST['daydo_post'];
$memo_post=$_POST['memo'];




try {
    $pdo = new PDO(
        DSN,
        DB_USERNAME,
        DB_PASSWORD
    );
    
    /* [ddebug] 
    printf('DBに接続成功! <br>');
    
    
    
    
    /*最初にdat_dateを検索してなかったら挿入する*/
    
    /*検索してあったら表示するif文を記述する。*/
    
    
    //Insert分を変数に格納する。
    $sql="insert into  todos3(day_date,memo) values(:day_date,:memo)";
    $stmt=$pdo->prepare($sql);
    $params=array(':day_date'=>$date_post,':memo'=>$memo_post);
    $stmt->execute($params);
    
    /* [debug] todosDBの中身を見る 
    $sql_all="select*from todos2";

    foreach ($pdo->query($sql_all) as $row) {
        print(convert_enc($row['id']).':'.'<br>');
        print(convert_enc($row['dat_date']).':'.'<br>');
        print(convert_enc($row['memo']).'<br>');
    }
    exit;
    */
    
    //$date_postに合わせたカラムをSelect文で持ってくる
    $sql_date="select*from todos3 where day_date='$date_post'";
    
    //array形式でdatabeseの値を取得
    foreach ($pdo->query($sql_date) as $row) {
        /*
        print(convert_enc($row['id']).':'.'<br>');
        print(convert_enc($row['dat_date']).':'.'<br>');
        print(convert_enc($row['memo']).'<br>');
        
        */
      
    }
    
    


    
}catch (PDOException $e) {
    $error = $e->getMessage();
}


$pdo=null;
?>

<html lang="ja">
<head>
<title>スケジュール管理画面</title>
<link rel="stylesheet" href="styles_calender.css">
</head>
<body>



<h1>遠藤スケジュール登録確認</h1>

<table border="0">
     <tr>
          <th name=><?php echo "「".$date_post."のスケジュール"."」"  ?></th>
     </tr>

     <tr>
         <td>
             <?php print $row['memo']; ?>
         </td>
     <tr>
</table>
<h2>
    <a href="http://homestead.app/Dot_Calender/">カレンダーに戻る</a>
</h2>

</body>
</html>

