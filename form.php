<?php
id(isset($_GET[]))



?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>スケジュール管理画面</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<center>
<h1>スケージュール帳</h1>
</center>

<form method="POST">
   <table>
   <tr>
   <td><?php echo '2016 5 08'.'のスケジュール予約' ?></td>
   </tr>
    <tr>
    <td>
        <textarea rows="10" cols="50" name="memo" value="更新する"></textarea>
    </td>
    </tr>
    <tfoo>
    <tr>
    <td>
        <input type="button" name="back" onclick="histry.back()" value="戻る">
    </td>
    </tr>
   </tfoo>
    </table>
</form>

</body>
</html>


