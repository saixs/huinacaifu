<?php

define('_ROOTQ', dirname(__FILE__) . DIRECTORY_SEPARATOR); // 网站根目录
date_default_timezone_set('PRC');

class phone2 {

    public function login() {
        return 1;
    }

    public function sendSMS($arr) {
        $msg = rand(10000,99999);
        $username = 'hncf20150310';		//用户账号
        $password = '123456';		//密码
        $mobile	  = implode(',',$arr['mobile']);	//号码
        $content  = $this->gbk2utf8($arr['msg']);	//内容
        $dstime   = '';		//为空代表立即发送  如果加了时间代表定时发送  精确到秒
        $productid = 676767;		//内容
        $xh = '';		//留空
        $url='http://111.206.219.21/smsGBK.aspx?action=send&userid=&account='.$username.'&password='.$password.'&mobile='.$mobile.'&content='.$content.'&sendTime=&extno=';
        return $this->Get($url);
    }

    public function Get($url)
    {
        if(function_exists('file_get_contents'))
        {
            $file_contents = file_get_contents($url);
        }
        else
        {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            curl_close($ch);
        }
        $status = json_decode(json_encode((array) simplexml_load_string($file_contents)), true);
		print_r($status);exit;
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/mobile.log',$file_contents,FILE_APPEND);
        if($status[0]== 1){
            $status = 1;
        }else{
            $status = 0;
        }
        return $status;
    }

    public function gbk2utf8($str){
        return iconv("GBK", "UTF-8", $str);
    }

}

?>
