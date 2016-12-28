<?

/******************************
 * $File: return.php
 * $Description: 资金类文件
 * $Author: ahui 
 * $Time:2010-06-06
 * $Update:Ahui
 * $UpdateDate:2012-06-10  
 * Copyright(c) 2010 - 2012 by deayou.com. All rights reserved
******************************/
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH . 'modules/account/account.class.php');
require_once (ROOT_PATH . 'modules/payment/payment.class.php');

error_reporting(0);


if(isset($_REQUEST['Md5Sign']) && !empty($_REQUEST['Md5Sign'])){
    $MemberID=$_REQUEST['MemberID'];//商户号
	$TerminalID =$_REQUEST['TerminalID'];//商户终端号
	$TransID =$_REQUEST['TransID'];//流水号
	$Result=$_REQUEST['Result'];//支付结果
	$ResultDesc=$_REQUEST['ResultDesc'];//支付结果描述
	$FactMoney=$_REQUEST['FactMoney'];//实际成功金额
	$AdditionalInfo=$_REQUEST['AdditionalInfo'];//订单附加消息
	$SuccTime=$_REQUEST['SuccTime'];//支付完成时间
	$Md5Sign=$_REQUEST['Md5Sign'];//md5签名
	$Md5key = "pasz28829gnelfls";
	$MARK = "~|~";
	//MD5签名格式
	$WaitSign=md5('MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key);
	if ($Md5Sign == $WaitSign) {
		accountClass::OnlineReturn(array("trade_no" => $TransID));
		echo 'ok';
	} else {
		echo 'fail';
	}
}else{
    die("错误操作");
}
?>