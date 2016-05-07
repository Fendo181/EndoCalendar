<?php


//名前空間を使用
namespace Myapp;

//カレンダークラス=カレンダーの設計図
class Calender{
    
    /* プロパティ */
    public $prev; //前月のリンク
    public $next; //次月のリンク
    public $yearMonth; //当月のリンク
    
    //このクラスのみ扱える変数
    private $_thisMonth;
    
    //初期設定
    public function __construcrt(){
        
        //入ってきたかを確認する。
        try{
            //url_monthがセットされていない。もしくはpreg_mathで'2015-06'の様になっていない。
            if(!isset($_GET['url_month']) || preg_match('\Ad{4}-d{2}\z',$_GET['ure_month']))
            //例外処理を発生させる。
            throw noew exception(;)
        }
            //URLからGETでパラメータを取得してdatetimeのobjを作成する。
            $thisMonth = new datetime($_GET['url_month'])
        }catch(exception $e){
            //url_monthが来なかったら当月分を入れる。
            $thisMonth = new datetime('first of day this month')
        }
    }
    
    
}

?>