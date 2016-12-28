<?php

class guofubaoPayment {

	var $name = '������';//������
	var $logo = 'guofubao';
	var $version = 20070615;
	var $description = "������";
	var $type = 1;//1->ֻ��������2->��������
    var $charset = 'gbk';
	
	
    public static function ToSubmit($payment){
   		$submitUrl = 'https://www.gopay.com.cn/PGServer/Trans/WebClientAction.do?';
		$Date = date("YmdHis",time());
		$Currency_Type = "RMB";
		$Mer_key = $payment['PrivateKey'];
		$Amount = number_format($payment['money'], 2, '.', '');
		$SignMD5 = md5($payment['trade_no']. $Amount . $Date . $Currency_Type . $Mer_key);

		$ipAddr = $_SERVER['REMOTE_ADDR'];

		$version = "2.0";          
		$charset = 1;          
		$language = 1;         
		$signType = 1;         
		$tranCode = 8888;         
		$merchantID = "0000058047";       
		$merOrderNum = $payment['trade_no'];     
		$tranAmt = $Amount;          
		$feeAmt = "";  
		$bankCode = $payment['bankCode'];         
		
		$currencyType = 156;     
		$frontMerUrl = $payment['return_url'];      
		//$backgroundMerUrl= $payment['notify_url'];
               
		//$frontMerUrl = ""; 
		$backgroundMerUrl = "http://www.p2phzw.com/modules/payment/return.php"; 

		$tranDateTime = $Date;     
		$virCardNoIn = '0000000002000124751';      
		$tranIP = $ipAddr;           

		$isRepeatSubmit = 1;   
		$goodsName = "p2phzw";        
		$goodsDetail = "";      
		$buyerName = $payment['member_id'];
		$buyerContact = "";     

		$signValue='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=[]gopayOutOrderId=[]tranIP=['.$tranIP.']respCode=[]VerficationCode=[5056662791981]';
        //echo $signValue;
		$signValue = md5($signValue);
		//$signValue = $signValue;
  
		$url = $submitUrl;
		$url .= "version={$version}&";//���ذ汾��
		$url .= "charset={$charset}&";//�ַ��� 1 GBK 2 UTF-8
		$url .= "language={$language}&";//1 ���� 2 Ӣ��
		$url .= "signType={$signType}&";//���ļ��ܷ�ʽ 1 MD5 2 SHA
		$url .= "tranCode={$tranCode}&";//���״��� ����ָ���˽��׵����ͣ�֧�����ؽӿڱ���Ϊ8888
		$url .= "merchantID={$merchantID}&";//�̻�����
		$url .= "merOrderNum={$merOrderNum}&";//������
		$url .= "tranAmt={$tranAmt}&";//���׽��
		$url .= "feeAmt={$feeAmt}&";//

		$url .= "currencyType={$currencyType}&";//156�����������
		$url .= "frontMerUrl={$frontMerUrl}&";//�̻�ǰ̨֪ͨ��ַ
		$url .= "backgroundMerUrl={$backgroundMerUrl}&";//

		$url .= "tranDateTime={$tranDateTime}&";//����Ϊ��������Ľ���ʱ��
		$url .= "virCardNoIn={$virCardNoIn}&";//����ָ�����ڹ�����ƽ̨����Ĺ������˻���
		$url .= "tranIP={$tranIP}&";//�����׵Ŀͻ�IP��ַ
		$url .= "isRepeatSubmit={$isRepeatSubmit}&";//	0�������ظ� 1 �����ظ� 

		$url .= "goodsName={$goodsName}&";//
		$url .= "buyerName={$buyerName}&";//
		$url .= "signValue={$signValue}&";//
		$url .= "bankCode={$bankCode}&";//
		$url .= "userType=1&";//
		$url .= "gopayServerTime=";//����Ϊ��������Ľ���ʱ��


        return $url;
		
    }

    function callback($in,&$paymentId,&$money,&$message,&$tradeno){
        $merId = $this->getConf($in['out_trade_no'],'member_id'); //�ʺ�
        $pKey = $this->getConf($in['out_trade_no'],'PrivateKey');
        $key = $pKey==''?'pc121316':$pKey;//˽Կֵ
        ksort($in);
        //�������Ϸ���
        $temp = array();
        foreach($in as $k=>$v){
            if($k!='sign'&&$k!='sign_type'){
                $temp[] = $k.'='.$v;
            }
        }
        $testStr = implode('&',$temp).$key;
        if($in['sign']==md5($testStr)){
            $paymentId = $in['out_trade_no'];    //֧������
            $money = $in['total_fee'];
            $message = $in['body'];
            $tradeno = $in['trade_no'];
            switch($in['trade_status']){
                case 'TRADE_FINISHED':
                    if($in['is_success']=='T'){                        
                        return PAY_SUCCESS;
                    }else{                        
                        return PAY_FAILED;
                    }
                    break;
                case 'TRADE_SUCCESS':
                    if($in['is_success']=='T'){                        
                        return PAY_SUCCESS;
                    }else{                        
                        return PAY_FAILED;
                    }
                    break;
                case 'WAIT_SELLER_SEND_GOODS':
                    if($in['is_success']=='T'){                        
                        return PAY_PROGRESS;
                    }else{                        
                        return PAY_FAILED;
                    }
                    break;
                case 'TRADE_SUCCES':    //�߼��û�
                    if($in['is_success']=='T'){
                        return PAY_SUCCESS;
                    }else{
                        return PAY_FAILED;
                    }
                    break;
            }

        }else{
            $message = 'Invalid Sign';            
            return PAY_ERROR;
        }
    }

    function serverCallback($in,&$paymentId,&$money,&$message){
        exit('reserved');
    }

    function applyForm($agentfield){
      $tmp_form='<a href="javascript:void(0)" onclick="document.applyForm.submit();">��������֧����</a>';
      $tmp_form.="<form name='applyForm' method='".$agentfield['postmethod']."' action='http://top.shopex.cn/recordpayagent.php' target='_blank'>";
      foreach($agentfield as $key => $val){
            $tmp_form.="<input type='hidden' name='".$key."' value='".$val."'>";
      }
      $tmp_form.="</form>";
      return $tmp_form;
    }

 	function pay_IPS_relay($status){
        switch ($status){
            case PAY_FAILED:
                $aTemp = 'failed';
                break;
            case PAY_TIMEOUT:
                $aTemp = 'timeout';
                break;
            case PAY_SUCCESS:
                $aTemp = 'succ';
                break;
            case PAY_CANCEL:
                $aTemp = 'cancel';
                break;
            case PAY_ERROR:
                $aTemp = 'status';
                break;
            case PAY_PROGRESS:
                $aTemp = 'progress';
                break;
        }
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
                )
            );
    }
}
?>