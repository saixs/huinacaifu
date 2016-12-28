<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-28
 * Time: ÏÂÎç2:52
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
$sql = "select * from previous_user";
$result = $db->fetchAllByNormal($sql);
foreach ($result as $value) {
    $sql = "select * from previous_mobile_setting where user_id={$value['user_id']}";
    $res = $db->fetchOneByNormal($sql);
    if (!is_array($res)) {
        $sql = "insert into previous_mobile_setting set user_id={$value['user_id']}";
        $res = $db->executeDMLByNormal($sql);
        var_dump($res);
    }
    $sql = "select * from previous_mobile_check where user_id={$value['user_id']}";
    $res = $db->fetchOneByNormal($sql);
    if (!is_array($res)) {
        $sql = "insert into previous_mobile_check set user_id={$value['user_id']}";
        $res = $db->executeDMLByNormal($sql);
        var_dump($res);
    }
}
