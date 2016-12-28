<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-20
 * Time: 上午10:12
 */
function magic_modifier_hideMiddleShow2($string) {
    if (strlen($string) > 9) {
        $begin = substr($string, 0, 2);
        $end   = substr($string, -1 * 2, 2);
        $str   = $begin.'******'.$end;
    }else{
        $str = $string.'长度过短,请确认是否正确输入?';
    }
    return $str;
}