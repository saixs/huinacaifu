<?php
/*
*�㸶����֧���ӿ�
*Author wuxinbin
*/
class rongpayPayment {
	var $name = "�ڱ�֧��";
	var $logo = "rongpay";
    var $version = 1.1;
    var $description = "�ڱ�֧��";
    var $type = 1;//1->ֻ��������2->�������
    var $charset = 'gbk';
	
    public static function ToSubmit($data){
		//$submitUrl = ' https://www.hnapay.com/website/pay.htm?';//��ʽ��ַ
		$submitUrl = 'http://epay.reapal.com/portal?';
        $submitTime = self::setTime(1);
		$failureTime =self::setTime(0);
		$daurl_return = pathinfo($data['return_url']);
		$daurl_return = $daurl_return["dirname"]."/rongpay_return.php";
		$daurl_notify = pathinfo($data['notify_url']);
		$daurl_notify = $daurl_notify["dirname"]."/rongpay_notify.php";
		$parameter = array(
			"service"			=> "online_pay",	//�ӿ����ƣ�����Ҫ�޸�
			"payment_type"		=> "1",               			//�������ͣ�����Ҫ�޸�
	
			//��ȡ�����ļ�(rongpay_config.php)�е�ֵ
			"merchant_ID"			=> "100000000001924",
			"seller_email"		=> "kudaitlj@126.com",
			"return_url"		=> $daurl_return,
			"notify_url"		=>$daurl_notify,
			"charset"	=> "gbk",
		  
	
			//�Ӷ��������ж�̬��ȡ���ı������
			"order_no"		=> $data['trade_no'],
			"title"			=> "kdwnag".$data['trade_no'],
			"body"				=> "kdwnag".$data['trade_no']."cz",
			"total_fee"			=> $data["money"],
	
			//��չ���ܲ�����������ֱ��
			"paymethod"			=> "bankPay",
			"defaultbank"		=> "",
			//�̻�Ԥ���ֶ�
			"ext1"=>"xq_rjt_rongpay"
        );
		$key="2e7e7gf8929e63cea6ee7ba4g8g472bf5ge224gf4edf373246g2dggf7596526b";
		$sign_type = "MD5";
		$sort_array   =self::para_filter($parameter);
		//return $sort_array;
		$sort_array   = self::arg_sort($sort_array);    //�õ�����ĸa��z������ǩ����������
		$url = self::create_linkstring($sort_array);
		$mysign = self::sign($url.$key,$sign_type);
		$url .="&sign=".$mysign;
		$url .="&sign_type=".$sign_type;
//		$k=fopen("D:/rtxt/bd.txt","w+");
//        fwrite($k,$parameter['order_no']);
//        fclose($k);
		
		return $submitUrl.$url;
		

		
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
//------------------------------------------------------------------------------------------
function build_mysign($sort_array,$key,$sign_type = "MD5") 
{
    $prestr = $this->create_linkstring($sort_array);     	//����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ���
    $prestr = $prestr.$key;							//��ƴ�Ӻ���ַ������밲ȫУ����ֱ����������
    $mysgin = $this->sign($prestr,$sign_type);			    //�����յ��ַ���ǩ�������ǩ�����
    return $mysgin;
}

function create_linkstring($array) 
{
    $arg  = "";
    while (list ($key, $val) = each ($array)) 
	{
        $arg.=$key."=".$val."&";
    }
    $arg = substr($arg,0,count($arg)-2);		     //ȥ�����һ��&�ַ�
    return $arg;
}

function sign($prestr,$sign_type) 
{
    $sign='';
    if($sign_type == 'MD5') 
	{
        $sign = md5($prestr);
    }
	else 
	{
        die("�ڱ�֧���ݲ�֧��".$sign_type."���͵�ǩ����ʽ");
    }
    return $sign;
}

function arg_sort($array) 
{
    ksort($array);
    reset($array);
    return $array;
}

function para_filter($parameter) 
{
    $para = array();
    while (list ($key, $val) = each ($parameter)) 
	{
        if($key == "sign" || $key == "sign_type" || $val == "")
		{
			continue;
		}
        else
		{
			$para[$key] = $parameter[$key];
		}
    }
    return $para;
}
//------------------------------------------------------------------------------------------

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