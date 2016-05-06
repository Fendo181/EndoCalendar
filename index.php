<?php

require 'Calender.php';


function h($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}


/* カレンダーを指定した値を受け取る
    if(isset($_GET['t'])){
    $month=$_GET['t'];
    var_dump($month);
     
    }
*/

    
     


$cal = new \Myapp\Calender();

?>
    <!doctype html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>Welcome Endo calneder</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
       <center>
        <h1>遠藤カレンダー</h1>
        </center>
       
        <table>
            <!--前月翌月へのリンク -->
            <thead>
                <tr>
                    <th><a href="/Dot_calender/?t=<?php echo h($cal->prev); ?>">&laquo;</a></th>
                    <th colspan="5"><?php echo h($cal->yearMonth); ?></th>
                    <th><a href="/Dot_calender/?t=<?php echo h($cal->next); ?>">&raquo;</a></th>
                </tr>
            </thead>
            <tbody>
                <!-- 曜日  -->
                <tr>
                    <td>Sun</td>
                    <td>Mon</td>
                    <td>Tue</td>
                    <td>Wed</td>
                    <td>Thu</td>
                    <td>Sun</td>
                    <td>Sat</td>
                </tr>
                <!-- カレンダ  -->
                <?php echo $cal->show(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="today" colspan="7"><a href="/Dot_calender/index.php">Today</a></th>
                </tr>
                <tr>
                    <th colspan="7">見たいカレンダーの年月を選択してください。</th>
                </tr>
                <tr>
                  <th colspan="7">
                   <form action="index.php" method="get">
                    <input type="month" name='t' >
                    <input type="submit" value="送信">
                   </form>
                    </th>
                </tr>
            </tfoot>
        </table>

    </body>
    </html>