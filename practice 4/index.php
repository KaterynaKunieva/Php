<?php
function regularFunc($string){
    $arr=explode(" ", $string);
    $pattern_name='/^[0-9]\+[0-9]$/';
    for($i=0; $i<count($arr); $i++){
    if(preg_match($pattern_name, $arr[$i])){
    echo $arr[$i]. "<br>";
    }else {
        echo 'Ви не пройшли перевірку!' . "<br>";
      };
    }
}

regularFunc('2+3 223 2223');
?>