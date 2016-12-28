<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/config.inc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/account/account.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/payment/payment.class.php');

error_reporting(0);
$sql = "SELECT `user_id` FROM `dw_user` where `user_id`<3638 AND `real_status`=1 AND `is_experi`!=1";
$res = $mysql->db_fetch_arrays($sql);

foreach ($res as $value) {
	$account_log = array();
	$account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
	$account_log['user_id'] = $value['user_id'];
	$account_log['type'] = "reward";
	$account_log['money'] = 18;
	$account_log['total'] = $account_result['total'] + $account_log['money'];
	$account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
	$account_log['no_use_money'] = $account_result['no_use_money'];
	$account_log['collection'] = $account_result['collection'];
	$account_log['to_user'] = "0";
	$account_log['remark'] = "原宝利老用户活动奖励";
	$r = accountClass::AddLog($account_log);
	var_dump($r);
	$sql = "UPDATE `dw_user` SET `is_experi`=1 WHERE `user_id`={$value['user_id']}";
	$c = $mysql->db_query($sql);
	var_dump($c);
	echo '<hr />';
}

?>