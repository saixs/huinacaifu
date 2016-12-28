<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-1
 * Time: ÏÂÎç12:15
 */
const HOME_ACCESS = TRUE;
include_once $_SERVER['DOCUMENT_ROOT'].'/include/init.php';

$sql = array();
$sql[] = "dw_user";
$sql[] = "dw_remind_user";
$sql[] = "dw_user_amount";
$sql[] = "dw_user_amountapply";
$sql[] = "dw_user_amountlog";
$sql[] = "dw_user_backup";
$sql[] = "dw_user_cache";
$sql[] = "dw_user_log";
$sql[] = "dw_user_sendemail_log";
$sql[] = "dw_user_trend";
$sql[] = "dw_user_typechange";
$sql[] = "dw_user_visit";
$sql[] = "dw_userinfo";
$sql[] = "dw_vip_user";
$sql[] = "dw_account";
$sql[] = "dw_account_bank";
$sql[] = "dw_account_cash";
$sql[] = "dw_account_log";
$sql[] = "dw_account_payment";
$sql[] = "dw_account_recharge";
$sql[] = "dw_borrow";
$sql[] = "dw_borrow_amount";
$sql[] = "dw_borrow_amountlog";
$sql[] = "dw_borrow_amountlog1";
$sql[] = "dw_borrow_auto";
$sql[] = "dw_borrow_collection";
$sql[] = "dw_borrow_debt";
$sql[] = "dw_borrow_line";
$sql[] = "dw_borrow_repayment";
$sql[] = "dw_borrow_tender";
$sql[] = "dw_borrow_union";
$sql[] = "dw_borrow_vouch";
$sql[] = "dw_borrow_vouch_collection";
$sql[] = "dw_borrow_vouch_repayment";
$sql[] = "dw_cache";
$sql[] = "dw_cookie";
$sql[] = "dw_credit";
$sql[] = "dw_credit_log";
$sql[] = "dw_daizi";
$sql[] = "dw_everyday";
$sql[] = "dw_friends";
$sql[] = "dw_fund_income";
$sql[] = "dw_fund_log";
$sql[] = "dw_integral_log";
$sql[] = "dw_lock";
$sql[] = "dw_message";
$sql[] = "dw_mobile_check";
$sql[] = "dw_mobile_setting";
$sql[] = "dw_online";
$sql[] = "dw_attestation";
$sql[] = "dw_bbs_posts";
$sql[] = "dw_bbs_topics";
$sql[] = "dw_ad";
foreach ($sql as $value) {
    $sql = "TRUNCATE $value;";
    echo $sql.'<br />';
}




