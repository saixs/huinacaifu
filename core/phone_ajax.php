<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/include/tableStructure/structure.php';
//$_POST['item_name'] = 'phone_approve_verify';
$verify_type_name = array(
    'withdraw_verify',
    'phone_approve_verify',
    'change_send_type_verify',
    'item_switch_verify',
    'add_bank_account_verify',
    'reset_bank_account_verify',
    'reset_login_password_verify',
    'reset_pay_password_verify'
);
if ( !in_array($_POST['item_name'], $verify_type_name) ) {
    die('非法请求类型');
}
$sendObj = new sendMessage(0,$_SESSION['user_id'],$_POST['item_name']);
$sendObj->getReceiveTeam();
if ($sendObj->errorInfo != '') {
    die($sendObj->errorInfo);
}
if ($_POST['item_name'] === 'phone_approve_verify') {
    $sendObj->mailTeam   = array();
    $sendObj->mobileTeam = array($_POST['phone']);
    // 将用户的手机号码写入user表
    $data = array(
        'phone'        => $_POST['phone'],
        'phone_status' => 2
    );
    $where = array('user_id'=>$_SESSION['user_id']);

    $res = $db->update('user')->set($data)->where('`user_id`=:user_id', $where)->go();

    $result = $sendObj->send();
} else {
    $result = $sendObj->send();
}

die($result);
?>