<?php

//require_once ('connection.php');
include ('Prefix.php');

//$prefix = Prefix::getDestination("0110000500");
//$prefix = Prefix::changeDestination('0110000560');
//echo $prefix;

//$animal = array('type' => 'dog', 'name' => 'Max');
//$b = (object) $animal;
//$ggg = "";


$str = "fdff,12,rrf,25,trdf,25,rfrr,tr";
$words = explode(',',$str);
$arrWords = [];
$arrDigits = [];
foreach($words as $objWordOrDigit)
{
    $isDigit =   $isDigit = preg_match('/[0-9]/', $objWordOrDigit);
    if($isDigit)
    {
        array_push($arrDigits,$objWordOrDigit);
    }
    else{
        array_push($arrWords,$objWordOrDigit);
    }

}
$words =implode('|', array_filter($arrWords));
$digits = implode('|',array_filter($arrDigits));
$line = $words.$digits;
$ggg = 0;
//public static function isDigit($digitOrString) {
//    $isDigit = preg_match('/[0-9]/', $digitOrString);
//    var_dump($isDigit);
//}