<?

/******************************
 * $File: return.php
 * $Description: �ʽ����ļ�
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
    $MemberID=$_REQUEST['MemberID'];//�̻���
	$TerminalID =$_REQUEST['TerminalID'];//�̻��ն˺�
	$TransID =$_REQUEST['TransID'];//��ˮ��
	$Result=$_REQUEST['Result'];//֧�����
	$ResultDesc=$_REQUEST['ResultDesc'];//֧���������
	$FactMoney=$_REQUEST['FactMoney'];//ʵ�ʳɹ����
	$AdditionalInfo=$_REQUEST['AdditionalInfo'];//����������Ϣ
	$SuccTime=$_REQUEST['SuccTime'];//֧�����ʱ��
	$Md5Sign=$_REQUEST['Md5Sign'];//md5ǩ��
	$Md5key = "pasz28829gnelfls";
	$MARK = "~|~";
	//MD5ǩ����ʽ
	$WaitSign=md5('MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key);
	if ($Md5Sign == $WaitSign) {
		accountClass::OnlineReturn(array("trade_no" => $TransID));
		echo 'ok';
	} else {
		echo 'fail';
	}
}else{
    die("�������");
}
?>