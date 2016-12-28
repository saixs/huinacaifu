<?php
/*
*汇付天下支付接口
*Author wuxinbin
*/
class rongpayPayment {
	var $name = "融宝支付";
	var $logo = "rongpay";
    var $version = 1.1;
    var $description = "融宝支付";
    var $type = 1;//1->只能启动，2->可以添加
    var $charset = 'gbk';
	
    public static function ToSubmit($data){
		//$submitUrl = ' https://www.hnapay.com/website/pay.htm?';//正式地址
		$submitUrl = 'http://epay.reapal.com/portal?';
        $submitTime = self::setTime(1);
		$failureTime =self::setTime(0);
		$daurl_return = pathinfo($data['return_url']);
		$daurl_return = $daurl_return["dirname"]."/rongpay_return.php";
		$daurl_notify = pathinfo($data['notify_url']);
		$daurl_notify = $daurl_notify["dirname"]."/rongpay_notify.php";
		$parameter = array(
			"service"			=> "online_pay",	//接口名称，不需要修改
			"payment_type"		=> "1",               			//交易类型，不需要修改
	
			//获取配置文件(rongpay_config.php)中的值
			"merchant_ID"			=> "100000000001924",
			"seller_email"		=> "kudaitlj@126.com",
			"return_url"		=> $daurl_return,
			"notify_url"		=>$daurl_notify,
			"charset"	=> "gbk",
		  
	
			//从订单数据中动态获取到的必填参数
			"order_no"		=> $data['trade_no'],
			"title"			=> "kdwnag".$data['trade_no'],
			"body"				=> "kdwnag".$data['trade_no']."cz",
			"total_fee"			=> $data["money"],
	
			//扩展功能参数——银行直连
			"paymethod"			=> "bankPay",
			"defaultbank"		=> "",
			//商户预留字段
			"ext1"=>"xq_rjt_rongpay"
        );
		$key="2e7e7gf8929e63cea6ee7ba4g8g472bf5ge224gf4edf373246g2dggf7596526b";
		$sign_type = "MD5";
		$sort_array   =self::para_filter($parameter);
		//return $sort_array;
		$sort_array   = self::arg_sort($sort_array);    //得到从字母a到z排序后的签名参数数组
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
    $prestr = $this->create_linkstring($sort_array);     	//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
    $prestr = $prestr.$key;							//把拼接后的字符串再与安全校验码直接连接起来
    $mysgin = $this->sign($prestr,$sign_type);			    //把最终的字符串签名，获得签名结果
    return $mysgin;
}

function create_linkstring($array) 
{
    $arg  = "";
    while (list ($key, $val) = each ($array)) 
	{
        $arg.=$key."=".$val."&";
    }
    $arg = substr($arg,0,count($arg)-2);		     //去掉最后一个&字符
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
        die("融宝支付暂不支持".$sign_type."类型的签名方式");
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