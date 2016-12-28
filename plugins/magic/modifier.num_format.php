<?php

function magic_modifier_num_format($str, $format){
    $i = strlen($str) % $format;
    if($i) $str = str_repeat('-', $format - $i).$str;
    return ltrim(implode(',', str_split($str,$format)),'-');
}

?>
