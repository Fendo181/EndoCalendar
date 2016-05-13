<?php

//取得するURLから値を
if(isset($_GET['daydo'])){
$daydo=$_GET['daydo'];
}

?>

<html lang="ja">
<head>
<title>スケジュール管理画面</title>
<link rel="stylesheet" href="styles_calender.css">
</head>
<body>



<h1>遠藤スケジュール登録画面</h1>

<form method="POST" action="schedule_record.php">
<table border="0">
     <tr>
          <th name="dat_date"><?php echo "「".$daydo."のスケジュール"."」"  ?></th>
     </tr>
   
     <tr>
         <th>今日の予定を入力して下さい</th>
     </tr>
     <tr>
         <td><textarea name="memo" row="50" cols="40" maxlength="255"></textarea></td>
        
     <tr>
     <tr align="center">
          <td rowspan="2">
               <input type="submit" value="登録" />
               <input type="reset" value="クリア" />
          </td>
     </tr>
</table>
<input type="hidden" name="daydo_post" value="<?php echo $daydo;  ?>" />
</form>
<h2>
    <a href="http://homestead.app/Dot_Calender/">カレンダーに戻る</a>
</h2>

</body>
</html>