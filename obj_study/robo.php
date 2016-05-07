<?php

class Robot {
    //プロパティ
    private $name='';
    private $say='hello world!';
    
    //seter=プロパティにクラス外から値を入れる
    public function setName($name){
        // 1 $ths=インスタンスで生成されたオブジェクト名の仮値?
        // 2 インスタンス自身を指す特別な値らしい
        $this->name=(string)filter_var($name);
    }
    
    //geter=指定されたプロパティの値を呼び出す
    public function getName(){
        return $this->name;
    }
    
    public function sayHi(){
        echo "Hi! $this->name!";
    }
    
 
}

//インスタンス生成
$a= new Robot();
//seter
$a->setName('hunma');
//gettr
echo $a->getName();
//hello
$a->sayHi()



?>