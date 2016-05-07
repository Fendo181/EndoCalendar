<?php


//名前空間を使用
namespace Myapp;

//カレンダークラス=カレンダーの設計図
class Calender{
    
    /* プロパティ */
    public $prev; //前月
    public $next; //次月
    public $yearMonth; //今年
    
    //今月
    private $_thisMonth;
    
    //初期設定
    public function __construct(){
        
        //入ってきたかを確認する。
        try{
            //url_monthがセットされていない。もしくはpreg_mathで'2015-06'の様になっていない。
            if(!isset($_GET['t']) || preg_match('/\Ad{4}-\d{2}\z/',$_GET['t'])){
            //例外処理を発生させる。
            throw new \exception();
        }
            //URLからGETでパラメータを取得してdatetimeのobjを作成する。
            $this->_thisMonth= new \datetime($_GET['t']);
        }catch(\exception $e){
            //url_monthが来なかったら当月分を入れる。
            $this->_thisMonth = new \datetime('first day of this month');
            
        
        }
    
        $this->prev=$this->_createPrevLink();
        $this->next=$this->_createNextLink();
        $this->yearMonth=$this->_thisMonth->format('F Y'); //F:月のフルスペル Y:年の四桁
    }

    private function _createPrevLink(){
        $dt=clone $this->_thisMonth;
        return $prev=$dt->modify('-1 month')->format('Y-m');
    }

    private function _createNextLink(){
        $dt=clone $this->_thisMonth;
        return $prev=$dt->modify('+1 month')->format('Y-m');
    }
    
    public function show(){
        $tail=$this->_getTail();
        $body=$this->_getBody();
        $head=$this->_getHead();
        
        //カレンダー本体
        $html_day='<tr>'.$tail.$body.$head.'</tr>';
        echo $html_day;
   }
    
    //当月の部分
    private function _getBody(){
        $body='';
        $period = new \dateperiod(
            //第一引数に月始め
            new \datetime('first day of'.$this->yearMonth),
            //第二引数に表示する間隔
            new \dateinterval('P1D'),
            //第三引数に翌月の1日目=当月の末日まで
            new \datetime('first day of'.$this->yearMonth.'+1 month')
        );
        //今日の日程
        $today=new \datetime('today');
        
        foreach ($period as $day){
            //曜日を[w]formatで数値変換を行い0(日曜日)の時に行を折り返す
            if($day->format('w') === '0'){ $body .='</tr><tr>'; }
            //当日の値を太字にする
            $todayClass=($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today' :'';
            $body .= sprintf('<td class="youbi_%d %s"><a href="">%d</a></td>',
            $day->format('w'),//youbi_%d
            $todayClass,//%s
            $day->format('d')); //%d
        }
        return $body;
    }
    
    //前月
    private function _getTail(){
        $tail='';
        //前月の末日のdatetimeオブジェクトを生成
        $lastDayOfPrevMonth = new \datetime('last day of '.$this->yearMonth.'-1 Month');
        //前月の末尾のdateobjのw値(0~6)が6(土曜日より)小さい限り繰り返す。
        while($lastDayOfPrevMonth->format('w')<6){
        $tail = sprintf('<td class="gray">%d</td>',$lastDayOfPrevMonth->format('d')).$tail;
        
        $lastDayOfPrevMonth->sub(new \dateinterval('P1D'));
    
        }
        return $tail;
    }

    //翌月
    private function _getHead(){
        $head='';
        $firstDayOfNextMonth=new \datetime('first day of '.$this->yearMonth.'+1 month');
        //翌月の1日の曜日から日曜日まで
        while($firstDayOfNextMonth->format('w')>0){
            $head .=sprintf('<td class="gray">%d</td>',$firstDayOfNextMonth->format('d'));
            //datetime::add (dateinterval)をもつ。
            $firstDayOfNextMonth->add(new \dateinterval('P1D'));
        }
        
        return $head;
    }
    
    
}

?>