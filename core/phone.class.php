<?php
class phone{
	private $argvs=array();
	function __construct(){		
		$this->argvs = array(
		     'sn'=>'SDK-DLS-010-00309', //提供的账号
		     'pwd'=>strtoupper(md5('SDK-DLS-010-00309'.'060690')), //此处密码需要加密 加密方式为 md5(sn+password) 32位大写
		     'mobile'=>'',//手机号 多个用英文的逗号隔开 post理论没有长度限制.推荐群发一次小于等于10000个手机号
			 'content'=>'',//短信内容//base64_encode();
			 'ext'=>'',
			 'rrid'=>'',//默认空 如果空返回系统生成的标识串 如果传值保证值唯一 成功则返回传入的值
			 'stime'=>date("Y-m-d H:i:s")//定时时间 格式为2011-6-29 11:09:21					
		);
		
	}
	
	//sendMsg发送短信
	function sendMsg($mobile,$msg="test"){
		if(!$mobile){
			return false;
		}
		$mobile = is_array($mobile) ? implode(",",$mobile) : $mobile;
		$this->argvs['mobile'] = $mobile;
		$this->argvs['content'] = $msg;
        $params = $this->getData($this->argvs);
        $ret =  $this->doPost($params);
	    return $ret;
	}
	 
	  //doPost发送post请求
      private function doPost($postdata,$host="sdk2.entinfo.cn",$url="/z_mdsmssend.aspx"){ 
				  $da = fsockopen($host, 80, $errno, $errstr); 
				  if (!$da) { 
					  return	""; 
				  } 
				  else { 
					  $salida ="POST $url  HTTP/1.1\r\n"; 
					  $salida.="Host: $host\r\n"; 
					  $salida.="User-Agent: PHP Script\r\n"; 
					  $salida.="Content-Type: application/x-www-form-urlencoded\r\n"; 
					  $salida.="Content-Length: ".strlen($postdata)."\r\n"; 
					  $salida.="Connection: close\r\n\r\n"; 
					  $salida.=$postdata; 
					  fwrite($da, $salida);
					  $response = "";
					  
					  $_count	= 0;
					  while (!feof($da))
					  {
						  $response.=fgets($da, 128); 
						  if($_count++ > 1024)
						  {
							  break;
						  }
					  }
					  $response=split("\r\n\r\n",$response); 
					  $header=$response[0]; 
					  $responsecontent=$response[1]; 
					  if(!(strpos($header,"Transfer-Encoding: chunked")===false)){ 
						  $aux=split("\r\n",$responsecontent); 
						  for($i=0;$i<count($aux);$i++) 
							  if($i==0 || ($i%2==0)) 
								  $aux[$i]=""; 
						  $responsecontent=implode("",$aux); 
					  }//if 
					  return chop($responsecontent); 
				  }//else 
    }
	
	//getData生成发送的post数据
	private function getData($arr){
		        $flag=0;
               foreach ($arr as $key=>$value) { 
                    if ($flag!=0) { 
                         $params .= "&"; 
                         $flag = 1; 
                    } 
                   $params.= $key."="; $params.= urlencode($value); 
                   $flag = 1; 
                  } 
				  return $params;
	       }
}
?>