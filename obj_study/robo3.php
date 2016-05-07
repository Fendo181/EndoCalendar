<?php


/*
stdclass → classを書かなくてもそのまま使える
endclass →classを書かないとインスタンスを作れない。
*/

//$a= new stdClass;
//
//$a->name='ロボ太郎';
//echo $a->name;

/*
staticがつくと
プログラム実行がこのスコープの外で行われるようになってもその値を失わないません。
*/

class Html{
    
    public static function h($str){
        return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
    }
    
    public static function decode($str){
        return html_entity_decode($str,ENT_QUOTES,'UTF-8');
    }
    
    /*インスタンスを作成できないように 
    private なコンストラクタ を定義しておくべきでしょう。*/
    private function __construct(){}
}

class Robot{
    private $name='';
    private $color;
    
    public function __construct($name, $color){
        $this->setName($name);
        $this->color = $color === 'blue' ? 'blue':'red';
    }
    
    public function setName($name){
        $this->name =(string)filter_var($name);
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getColor(){
        return $this->color;
    }
}


$html='<strong>Test</strong>';
$html=Html::h($html);

echo $html;

$html=Html::decode($html);

echo $html;

//改行
echo nl2br("\n");

$a=new Robot('ロボ次郎');
$b=new Robot('ロボ次郎','blue');

echo $a->getColor();
echo nl2br("\n");
echo $b->getColor();




    