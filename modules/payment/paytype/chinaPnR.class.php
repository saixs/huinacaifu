<?php
/*
*�㸶����֧���ӿ�
*Author wuxinbin
*/
class chinaPnRPayment {
	var $name = "�㸶����";
	var $logo = "chinaPnR";
    var $version = 2.6;
    var $description = "����֧��";
    var $type = 1;//1->ֻ��������2->�������
    var $charset = 'gbk';
	
    public static function ToSubmit($data){
		$submitUrl = 'http://mas.chinapnr.com/gar/RecvMerchant.do?';
		/*
		*version->�ӿڰ汾�� OrdId->������(��֤Ψһ��)  BgRetUrl->����֧��ʱ�̻���̨Ӧ���ַ
		*CmdId->�������� OrdAmt->������� RetUrl->������ɺ󣬰ѽ��׽��ͨ��ҳ�淽ʽ���͵��õ�ַ��
		*MerId->�̻�����Ǯ�ܼ�ϵͳ�����6λ���ִ��� ChkValue->ǩ�� ����Ϊ����ѡ��
		*CurCode ����  DivDetails �Ƿ���Ҫ������ϸ Pid ��Ʒ��� GateId ����ID OrderType��������
		*UsrMp�������ֻ� PayUsrId�����û��� IsBalance�Ƿ���㣬"Y"������ MerPriv�̻�˽����
		*PnrNum/pnr��
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
		 /*if��鴫������$data���Ƿ���$data['xq_zdy_de'],�������Ҫ�ض���$arrCla��������Ϣ��*/
		if(array_key_exists("xq_zdy_de",$data)){
			$arrCla = self::setParam($arrCla,$data);
		}		
		//��ǩ
		
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
			//�����Զ������ 
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
                        'label'=>'�ͻ���',
                        'type'=>'string'
                    ),
                'PrivateKey'=>array(
                        'label'=>'˽Կ',
                        'type'=>'string'
                ),
				'alipay_type'=>array(
                        'label'=>'ѡ��ӿ�����',
                        'type'=>'select',
                        'options'=>array('0'=>'ʹ�ñ�׼˫�ӿ�','2'=>'ʹ�õ������׽ӿ�','1'=>'ʹ�ü�ʱ���ʽ��׽ӿ�')
                )
            );
    }
}
?>