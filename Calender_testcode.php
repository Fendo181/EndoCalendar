<?php

namespace Myapp;


class Calender{
    
    public $prev;
    public $next;
    public $yearMonth;
    
    private $_thisMonth;
    
    public function __construct(){
        try{
            if(!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/',$_GET['t'])){
            throw new \exception();
        }
            $this->_thisMonth=new \datetime($_GET['t']);
        }catch(\Exception $e){
            $this->_thisMonth=new \datetime('first day of this month');
        }
        
        $this->prev =$this->_createPrevLink();
        $this->next =$this->_createNextLink();
        $this->yearMonth =$this->_thisMonth->format('F Y');
    }
    
    private function _createPrevLink(){
        $dt =clone $this->_thisMonth;
        return $prev = $dt->modify('-1 month')->format('Y-m');
            
    }
    
    private function _createNextLink(){
        $dt =clone $this->_thisMonth;
        return $next = $dt->modify('+1 month')->format('Y-m');
    }

    public function show(){
        $tail=$this->_getTail();
        $body=$this->_getBody();
        $head=$this->_getHead();
        $html_day='<tr>'. $tail .$body.$head. '</tr>';
        
        echo $html_day;
    }
    
    private function _getTail(){
        $tail='';
        $lastDayOfPrevMonth = new \datetime('last day of' .$this->yearMonth.'-1 month');
        
        /*
        var_dump($lastDayOfPrevMonth);
        var_dump($lastDayOfPrevMonth->format('w'));
        exit;
        
        */
        
        
        while($lastDayOfPrevMonth->format('w')<6){
            
        $tail =sprintf('<td class="gray">%d</td>',$lastDayOfPrevMonth->format('d')).$tail;
        $lastDayOfPrevMonth->sub(new \dateinterval('P1D'));
    
        }
      return $tail;
    }
    
     private function _getBody(){
        $body='';
        $period = new \dateperiod(
        //月初め
        new \datetime('first day of '.$this->yearMonth),
        //一日ごとにする。
        new \dateinterval('P1D'),
        //末日までに考える。
        new \datetime('first day of'.$this->yearMonth.'+1 month' )
        );



        $today=new \datetime('today');

        foreach($period as $day){
            //曜日を[w]formatで数値変換を行い7で割り切れたら行を下に回す
            if($day->format('w') === '0'){$body .= '</tr><tr>'; }
            //今日の日付と比較してあっていたら値を入れる。
            $todayClass=($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today' :'';
            $body .=sprintf('<td class="youbi_%d %s">%d</td>',
            $day->format('w'),
            $todayClass,
            $day->format('d'));
        }
     return $body;
    }
    
     private function _getHead(){
         $head='';
        $firstDayOdNextMonth = new \datetime('first day of '.$this->yearMonth.'+1 month');
        while($firstDayOdNextMonth->format('w')>0){
            $head .= sprintf('<td class="gray">%d</td>',$firstDayOdNextMonth->format('d'));
            $firstDayOdNextMonth->add(new \dateinterval('P1D'));
        }
    return $head;
    }

}

/*

/*URLのgetパレメータから取得する。
try{
    if(!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/',$_GET['t'])){
    throw new exception();
    }
    $thisMonth=new datetime($_GET['t']);
    /*何も飛んでこなかったら今月の日付を取得する。=todayにあたる
}catch(Exception $e){
    $thisMonth=new datetime('first day of this month');
}
例外をcatch
var_dump($thisMonth);
exit;



特定の月の表示
$t='2016-03';
$thisMonth=new datetime($t); //渡された日付のobjができる。


$yearMonth=$thisMonth->format('F Y');

$dt =clone $thisMonth;
$prev = $dt->modify('-1 month')->format('Y-m');
$dt =clone $thisMonth;
$next = $dt->modify('+1 month')->format('Y-m');

$body='';
$period = new dateperiod(
    //月初め
    new datetime('first day of '.$yearMonth),
    //一日ごとにする。
    new dateinterval('P1D'),
    //末日までに考える。
    new datetime('first day of'.$yearMonth.'+1 month' )
);



$today=new datetime('today');

foreach($period as $day){
    //曜日を[w]formatで数値変換を行い7で割り切れたら行を下に回す
    if($day->format('w')%7===0){$body .= '</tr><tr>'; }
    //今日の日付と比較してあっていたら値を入れる。
    $todayClass=($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today' :'';
    $body .=sprintf('<td class="youbi_%d %s">%d</td>',
    $day->format('w'),
    $todayClass,
    $day->format('d'));
}
  
/*翌月のdateを取得する。
$head='';
$firstDayOdNextMonth = new datetime('first day of '.$yearMonth.'+1 month');
while($firstDayOdNextMonth->format('w')>0){
    $head .= sprintf('<td class="gray">%d</td>',$firstDayOdNextMonth->format('d'));
    $firstDayOdNextMonth->add(new dateinterval('P1D'));
}

/*前月のdateを取得する。
$tail='';
$lastDayOfPrevMonth = new datetime('last day of' .$yearMonth.'-1 month');
while($lastDayOfPrevMonth->format('w')<6){
    $tail = sprintf('<td class="gray">%d</td>',$lastDayOfPrevMonth->format('d')).$tail;
    $lastDayOfPrevMonth->sub(new dateinterval('P1D'));
    
}

$html_day='<tr>'. $tail .$body.$head. '</tr>';

*/

    
?>