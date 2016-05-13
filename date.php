<?php

$date =new datetime('first day of this month');
$count=0;


for($i=0; $i<=20; $i++){
    
echo sprintf('%s',$date->modify($count.'day')->format('Y-m-d'));
//echo $date->modify($count.'day')->format('Y-m-d'));
echo nl2br("\n");
$count=1;

}



/*

echo date('20y年m月d日タイムゾーンはeで日付はc');

*/

?>