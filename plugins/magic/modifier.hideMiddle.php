<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-20
 * Time: ����10:12
 */
function magic_modifier_hideMiddle($string) {
    if (strlen($string) > 9) {
        $begin = substr($string, 0, 4);
        $end   = substr($string, -1 * 4, 4);
        $str   = $begin.'***'.$end;
    }else{
        $str = $string.'���ȹ���,��ȷ���Ƿ���ȷ����?';
    }
    return $str;
}