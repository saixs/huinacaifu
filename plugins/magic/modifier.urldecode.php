<?php

function magic_modifier_urldecode($string, $title = ''){
if ($string =="") return "";
    $string=urldecode($string);
   $string= iconv("UTF-8","GB2312",  $string);
   return $string;

}
?>
