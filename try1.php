<?php
die;
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/config.inc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/account/account.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/payment/payment.class.php');

error_reporting(0);

$sql = "SELECT * FROM `dw_user` WHERE addtime>1436198400 and addtime<1438358400 AND invite_userid>0";
$res = $mysql->db_fetch_arrays($sql);


foreach ($res as $value) {
	// 查用户是否投资
	$sql = "SELECT count(*) as c FROM `dw_borrow_tender` WHERE user_id={$value['user_id']}";
	$r_r = $mysql->db_fetch_array($sql);
	if ($r_r['c'] >= 1) {
		$account_log = array();
		$account_result = accountClass::GetOne(array("user_id" => $value['invite_userid']));
		$account_log['user_id'] = $value['invite_userid'];
		$account_log['type'] = "reward";
		$account_log['money'] = 20;
		$account_log['total'] = $account_result['total'] + $account_log['money'];
		$account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
		$account_log['no_use_money'] = $account_result['no_use_money'];
		$account_log['collection'] = $account_result['collection'];
		$account_log['to_user'] = "0";
		$account_log['remark'] = "邀请投资20元红包奖励";
		$r = accountClass::AddLog($account_log);
		var_dump($r);
		$sql = "UPDATE `dw_user` SET `is_award`=1 WHERE `user_id`={$value['user_id']}";
		$c = $mysql->db_query($sql);
		var_dump($c);
		echo '<hr />';
	}
}

?>