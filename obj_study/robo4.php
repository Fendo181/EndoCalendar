<?php

//closure

$closure=function($option){
    return "YEs! {$option}";
};

var_dump($closure);
echo $closure('i am ');