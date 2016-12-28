<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/config.inc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/account/account.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/payment/payment.class.php');

error_reporting(0);

$sql = "SELECT ten.user_id FROM `dw_borrow_tender` AS ten
		LEFT JOIN `dw_user` AS usr
		ON usr.user_id=ten.user_id
		LEFT JOIN `dw_borrow` AS bor
		ON bor.id=ten.borrow_id
		WHERE ten.addtime<=1433088000 AND ten.`account`>=1000 AND bor.`status`=3 AND usr.`is_award`=0 GROUP BY ten.`user_id`";
$res = $mysql->db_fetch_arrays($sql);

foreach ($res as $value) {
	
	$account_log = array();
	$account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
	$account_log['user_id'] = $value['user_id'];
	$account_log['type'] = "reward";
	$account_log['money'] = 50;
	$account_log['total'] = $account_result['total'] + $account_log['money'];
	$account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
	$account_log['no_use_money'] = $account_result['no_use_money'];
	$account_log['collection'] = $account_result['collection'];
	$account_log['to_user'] = "0";
	$account_log['remark'] = "50元见面红包";
	$r = accountClass::AddLog($account_log);
	var_dump($r);
	$sql = "UPDATE `dw_user` SET `is_award`=1 WHERE `user_id`={$value['user_id']}";
	$c = $mysql->db_query($sql);
	var_dump($c);
	
	echo '<hr />';
}
?>