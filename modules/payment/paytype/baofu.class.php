<?php

class baofuPayment {

	var $name = '宝付';//宝付
	var $logo = 'baofu';
	var $version = 20070615;
	var $description = "宝付";
	var $type = 1;//1->只能启动，2->可以添加
    var $charset = 'gbk';
	
	
    public static function ToSubmit($data){

	    $MARK = '|';
	    $Md5key = 'pasz28829gnelfls';
	    $agentfield['postmethod'] = 'post';
	    $agentfield['submitUrl'] = 'http://gw.baofoo.com/payindex';
	    $agentfield['MemberID'] = 436239;
	    $agentfield['TerminalID'] = "23859";
	    $agentfield['InterfaceVersion'] = "4.0";
	    $agentfield['KeyType'] = "1";
	    $agentfield['PayID'] = '';
	    $agentfield['TradeDate'] = date('Ymdhis');
	    $agentfield['TransID'] = $data["trade_no"];
	    $agentfield['OrderMoney'] = trim($data["money"]) * 100;
	    $agentfield['ProductName'] = 'huinacaifu.com';
	    $agentfield['Amount'] = 1;
	    $agentfield['Username'] = '';
	    $agentfield['AdditionalInfo'] = '';
	    $agentfield['PageUrl'] = "http://www.huinacaifu.com/modules/payment/baopay_recharge_page.php";
	    $agentfield['ReturnUrl'] = "http://www.huinacaifu.com/modules/payment/baopay_recharge_return.php";
	    $agentfield['NoticeType'] = 1;
	    $agentfield['Signature'] = md5($agentfield['MemberID'].$MARK.$agentfield['PayID'].$MARK.$agentfield['TradeDate'].$MARK.$agentfield['TransID'].$MARK.$agentfield['OrderMoney'].$MARK.$agentfield['PageUrl'].$MARK.$agentfield['ReturnUrl'].$MARK.$agentfield['NoticeType'].$MARK.$Md5key);
	    //$s = serialize($_SESSION);
	    //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/lo.log', $s."\r\n", FILE_APPEND);
	    $formdata = self::applyForm($agentfield);
		die($formdata);
    }

	function applyForm($agentfield){
		$tmp_form="";
		$tmp_form.="<form name='applyForm' method='".$agentfield['postmethod']."' action='".$agentfield['submitUrl']."'>";
		unset($agentfield['submitUrl']);
		unset($agentfield['postmethod']);
		foreach($agentfield as $key => $val){
			$tmp_form.="<input type='hidden' name='".$key."' value='".$val."'>";
		}
		$tmp_form.="</form>";
		$tmp_form.="<script>document.forms['applyForm'].submit();</script>";
		return $tmp_form;
	}

}
?>
