<?
die('�Ƿ�����');
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH.'modules/account/account.class.php');
require_once (ROOT_PATH.'modules/payment/payment.class.php');

$gateway = "http://interface.reapal.com/verify/notify?";
$merchant_ID = "100000000001924";
$key="2e7e7gf8929e63cea6ee7ba4g8g472bf5ge224gf4edf373246g2dggf7596526b";
$veryfy_url = $gateway. "merchant_ID=".$merchant_ID."&notify_id=".$_POST["notify_id"];
$post          = para_filter($_POST);	    //������GET��������������ȥ��
$sort_post     = arg_sort($post);		    //������GET������������������
$sort_post = create_linkstring($sort_post);
$mysign  = sign($sort_post.$key,"MD5");    //����ǩ�����

$veryfy_result = file_get_contents($veryfy_url);
//		$k=fopen("D:/rtxt/yc.txt","w+");
//        fwrite($k,$_REQUEST['order_no']);
//        fclose($k);
if (preg_match("/true$/i",$veryfy_result) && $mysign == $_POST["sign"]) {
	$trade_status = $_REQUEST['trade_status'];		//����״̬
    $order_no = $_REQUEST['order_no'];
	//�������������ҵ���߼�����д�������´�������ο�������
		
	if($trade_status=="TRADE_FINISHED")
	{
		//�жϸñʶ����Ƿ����̻���վ���Ѿ����������ɲο������ɽ̡̳��С�3.4�������ݴ�����
		//���û�������������ݶ����ţ�order_no���Ͷ������($total_fee)���̻���վ�Ķ���ϵͳ�в鵽�ñʶ�������ϸ����ִ���̻���ҵ�����
		//���������������ִ���̻���ҵ�����
			
			   
				accountClass::OnlineReturn(array("trade_no"=>$order_no));
			    $msg = '���׳ɹ�-----'.$order_no;
	}
	else 
	{		
		    //֧��ʧ�ܵĴ���
			 $msg = '����ʧ��';	
			
	}
}else{
	 $msg = '��ǩʧ�ܻ�-�÷��ز��������ڱ�!';	
	 
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