<?php
/*
*汇付天下支付接口
*Author wuxinbin
*/
class chinaPnRPayment {
	var $name = "汇付天下";
	var $logo = "chinaPnR";
    var $version = 2.6;
    var $description = "新生支付";
    var $type = 1;//1->只能启动，2->可以添加
    var $charset = 'gbk';
	
    public static function ToSubmit($data){
		$submitUrl = 'http://mas.chinapnr.com/gar/RecvMerchant.do?';
		/*
		*version->接口版本号 OrdId->订单号(保证唯一性)  BgRetUrl->订单支付时商户后台应答地址
		*CmdId->请求类型 OrdAmt->订单金额 RetUrl->交易完成后，把交易结果通过页面方式发送到该地址上
		*MerId->商户号由钱管家系统分配的6位数字代码 ChkValue->签名 以上为必须选项
		*CurCode 币种  DivDetails 是否需要分账明细 Pid 商品编号 GateId 银行ID OrderType订单类型
		*UsrMp购买者手机 PayUsrId付费用户号 IsBalance是否结算，"Y"　结算 MerPriv商户私有域
		*PnrNum/pnr号
		*/
		$ordAmt = explode(".",$data['money']);
		if($ordAmt[1] && strlen($ordAmt[1])>2){
			
				$ordAmt[1] = $ordAmt[1]."0";
			
		}else{
			$ordAmt[1] = $ordAmt[1]."00";
		}
		$ordAmt = $ordAmt[0].".".$ordAmt[1];
		$arrCla = array(
				'Version' => 10,
				'CmdId' => 'Buy',
				'MerId' => '870731',
				
				'OrdId' => $data['trade_no'],
				'OrdAmt' =>$ordAmt,
				'CurCode' => 'RMB',
				
				'Pid' => '',
				'RetUrl' =>$data['return_url'],
				'MerPriv'=>'xq_cao_chinapnr',
				
				'GateId'=>'',
				'UsrMp'=>'',	
				'DivDetails'=>'',
				
				'OrderType'=>'',
				'PayUsrId'=>'',
				'PnrNum'=>'',
				
				'BgRetUrl' => $data['notify_url'],
				'IsBalance'=>''
	      							
		);
		 /*if检查传过来的$data中是否有$data['xq_zdy_de'],有则表显要重定义$arrCla‘部分信息’*/
		if(array_key_exists("xq_zdy_de",$data)){
			$arrCla = self::setParam($arrCla,$data);
		}		
		//加签
		
		$fp = fsockopen("127.0.0.1", 12345, $errno, $errstr, 10);
	if (!$fp) {
		echo "$errstr ($errno)<br />\n";
	} else {
		
		$MsgData = $Version.$CmdId.$MerId.$OrdId.$OrdAmt.$CurCode.$Pid.$RetUrl.$MerPriv.$GateId.$UsrMp.$DivDetails.$PayUsrId.$BgRetUrl;
		$MsgData_len =strlen($MsgData);
		if($MsgData_len < 100 ){
			$MsgData_len = '00'.$MsgData_len;
		}
		elseif($MsgData_len < 1000 ){
			$MsgData_len = '0'.$MsgData_len;
		}

		$out = 'S'.$MerId.$MsgData_len.$MsgData;
		
		$out_len = strlen($out);
		if($out_len < 100 ){
			$out_len = '00'.$out_len;
		}
		elseif($out_len < 1000 ){
			$out_len = '0'.$out_len;
		}
		$out =$out_len.$out;

		//echo $MsgData_len;exit;
		//$out = '0021S87052400101234567890';
		fputs($fp, $out);

		$ChkValue ='';
		while (!feof($fp)) {
			$ChkValue .= fgets($fp, 128);
		}
		$ChkValue = substr($ChkValue, -256);
		fclose($fp);
		//echo $ChkValue;
	}
		
		$url = self::setSignMsg($arrCla);
		$url .= "&ChkValue=".$ChkValue;
		$url = $submitUrl.$url;
		return $url;
		

		
	}
	 function setParam($arrCla,$arrTran){
		if(is_array($arrTran)){
			//允许自定义参数 
	        $zdyArr=array(
					'CurCode' =>'',
					'Pid'=>'',
					'MerPriv'=>'',
					'UsrMp'=>'',
					'GateId'=>'',
					'DivDetails'=>'',
			    	'PayUsrId'=>'',
				    'PnrNum'=>'',
				    'IsBalance'=>''				
			 );
			foreach($arrTran as $key=>$v){
				//echo $key."---->".$v."<br>";
				if(array_key_exists($key,$zdyArr) && $v){
					$arrCla[$key] = $v;
				}
			}
		}
		return $arrCla;
		
	}
	
	function ChkValue($arr){
		$var = "";
		foreach($arr as $k=>$v){
			if($v){
			    $var .=$v;
		    }
		}
		$var = trim($var);
		return $var;
	}	
	 function setSignMsg($arrCla){
		 $str="";
         foreach($arrCla as $k=>$v){
			 if($v){
			     $str .="&".$k."=".$v;
			 }
		 }
		$str=substr($str,1,strlen($str));
		return $str;
	 }
	function GetFields(){
         return array(
                'member_id'=>array(
                        'label'=>'客户号',
                        'type'=>'string'
                    ),
                'PrivateKey'=>array(
                        'label'=>'私钥',
                        'type'=>'string'
                ),
				'alipay_type'=>array(
                        'label'=>'选择接口类型',
                        'type'=>'select',
                        'options'=>array('0'=>'使用标准双接口','2'=>'使用担保交易接口','1'=>'使用即时到帐交易接口')
                )
            );
    }
}
?>