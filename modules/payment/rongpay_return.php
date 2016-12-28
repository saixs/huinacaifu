<?
die('非法访问');
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH.'modules/account/account.class.php');
require_once (ROOT_PATH.'modules/payment/payment.class.php');

$gateway = "http://interface.reapal.com/verify/notify?";
$merchant_ID = "100000000001924";
$key="2e7e7gf8929e63cea6ee7ba4g8g472bf5ge224gf4edf373246g2dggf7596526b";
$veryfy_url = $gateway. "merchant_ID=".$merchant_ID."&notify_id=".$_POST["notify_id"];
$post          = para_filter($_POST);	    //对所有GET反馈回来的数据去空
$sort_post     = arg_sort($post);		    //对所有GET反馈回来的数据排序
$sort_post = create_linkstring($sort_post);
$mysign  = sign($sort_post.$key,"MD5");    //生成签名结果

$veryfy_result = file_get_contents($veryfy_url);
//		$k=fopen("D:/rtxt/yc.txt","w+");
//        fwrite($k,$_REQUEST['order_no']);
//        fclose($k);
if (preg_match("/true$/i",$veryfy_result) && $mysign == $_POST["sign"]) {
	$trade_status = $_REQUEST['trade_status'];		//交易状态
    $order_no = $_REQUEST['order_no'];
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
		
	if($trade_status=="TRADE_FINISHED")
	{
		//判断该笔订单是否在商户网站中已经做过处理（可参考“集成教程”中“3.4返回数据处理”）
		//如果没有做过处理，根据订单号（order_no）和订单金额($total_fee)在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
		//如果有做过处理，不执行商户的业务程序
			
			   
				accountClass::OnlineReturn(array("trade_no"=>$order_no));
			    $msg = '交易成功-----'.$order_no;
	}
	else 
	{		
		    //支付失败的处理
			 $msg = '交易失败';	
			
	}
}else{
	 $msg = '验签失败或-该返回不是来自融宝!';	
	 
}

echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";


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
/*
    function get_verify($url,$time_out = "60") 
	{
        $urlarr     = parse_url($url);
        $errno      = "";
        $errstr     = "";
        $transports = "";
        if($urlarr["scheme"] == "https") 
		{
            $transports = "ssl://";
            $urlarr["port"] = "443";
        } 
		else 
		{   
            $transports = "tcp://";
            $urlarr["port"] = "18183";
        }
        $fp=@fsockopen($transports . $urlarr['host'],$urlarr['port'],$errno,$errstr,$time_out);
        if(!$fp) 
		{
            die("ERROR: $errno - $errstr<br />\n");
        } 
		else 
		{
            fputs($fp, "POST ".$urlarr["path"]." HTTP/1.1\r\n");
            fputs($fp, "Host: ".$urlarr["host"]."\r\n");
            fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
            fputs($fp, "Content-length: ".strlen($urlarr["query"])."\r\n");
            fputs($fp, "Connection: close\r\n\r\n");
            fputs($fp, $urlarr["query"] . "\r\n\r\n");
            while(!feof($fp)) 
			{
                $info[]=@fgets($fp, 1024);
            }
            fclose($fp);
            $info = implode(",",$info);
            return $info;
        }
      }*/

 

?>