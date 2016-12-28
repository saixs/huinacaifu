<?php
/*
*�㸶����֧���ӿ�
*Author wuxinbin
*/
class hnapayPayment {
	var $name = "����֧��";
	var $logo = "hnapay";
    var $version = 2.6;
    var $description = "����֧��";
    var $type = 1;//1->ֻ��������2->�������
    var $charset = 'gbk';
	
    public static function ToSubmit($data){
		//$submitUrl = ' https://www.hnapay.com/website/pay.htm?';//��ʽ��ַ
		$submitUrl = 'http://qaapp.hnapay.com/website/pay.htm?';
        $submitTime = self::setTime(1);
		$failureTime =self::setTime(0);
		//orderDetails=�����ţ����µ��̻�����(��ѡ)����Ʒ������Ʒ���������ڽ��Ӧ�õ���totalAmount��
		$orderDetails = $data['trade_no'].','.$data['money'] * 100 .','.'laibang'.$data['user_id'].'@163.com,'.'lanbang'.time().',1';
		$arrCla = array(
				'version' => "2.6",
				'serialID' => $data['trade_no'],
				'submitTime' => $submitTime,				
				'failureTime' =>$failureTime ,
				'customerIP' =>'localhost[127.0.0.1]',
				'orderDetails' =>$orderDetails ,				
				'totalAmount' => $data['money'] * 100,
				'type' =>'1000',
				'buyerMarked'=>'',
				'payType'=>'ALL',	
				'orgCode'=>'',
				'currencyCode'=>'1',
				'directFlag'=>'0',
				'borrowingMarked'=>'1',				
				'couponFlag'=>'0',
				'platformID'=>'',
				'returnUrl'=>$data['return_url'],				
				'noticeUrl' => $data['notify_url'],
				'partnerID'=>'10000000029',
				'remark'=>md5('xq_lanbang_hnapay'),
				'charset'=>'1',
				'signType'=>'2'
  							
		);   /*if��鴫������$data���Ƿ���$data['xq_zdy_de'],�������Ҫ�ض���$arrCla��������Ϣ��*/
		    if(array_key_exists("xq_zdy_de",$data)){
		        $arrCla = self::setParam($arrCla,$data);
			}
			
			$signType = $arrCla['signType'];
			$signMsg = self::setSignMsg($arrCla);
			if(2 == $signType)
			{
				//������Կ
				$pkey = "30819f300d06092a864886f70d010101050003818d0030818902818100af48db8f2aa0f029aa3fadfcf749267566544d2ce25738df295d94bb918542421f2b649e533db53553a3e9a4bd860068b759af4681d96f4732e47b4653b93339e68b7ef00e2cef3ab8ec5e9c65d4c7992f626c1f4b9a95a626d005fce59919ae1b619748194256ec4627a932d75b8f9fb51c3a78bfbc53bcc0bbb4924d59c6310203010001";

				$signMsg = $signMsg."&pkey=".$pkey;
				$signMsg =  md5($signMsg);
		
			}
			$url =self::setSignMsg($arrCla)."&signMsg=".$signMsg;
		return $submitUrl.$url;
		//return "dssdfsdfsdf";
		

		
	}
		function setTime($t){
			$cdate = date("Y,mdHis",time());
			$cdate=explode(",",$cdate);
			if($t){
				return $cdate[0].$cdate[1];
			}else{
				return (integer)$cdate[0] + 1 .$cdate[1];
			}
			
		}
	 function setSignMsg($arrCla){
		 $str="";
         foreach($arrCla as $k=>$v){
			 $str .="&".$k."=".$v;
		 }
		$str=substr($str,1,strlen($str));
		return $str;
	 }	
	 
	 function setParam($arrCla,$arrTran){
		 
		if(is_array($arrTran)){
			//�����Զ������ 
	        $zdyArr=array(
					'customerIP' =>'',
					'type'=>'',
					'buyerMarked'=>'',
					'payType'=>'ALL',
					'orgCode'=>'',
				    'currencyCode'=>'1',
				    'directFlag'=>'0',
				    'borrowingMarked'=>'1',				
				    'couponFlag'=>'0',
				    'platformID'=>'',
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