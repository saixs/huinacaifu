<?php

define('_ROOTQ', dirname(__FILE__) . DIRECTORY_SEPARATOR); // ��վ��Ŀ¼
date_default_timezone_set('PRC');

class phone2 {

    public function login() {
        return 1;
    }

    public function sendSMS($arr) {
        $msg = rand(10000,99999);
        $username = 'xinge11';		//�û��˺�
        $password = 'QIBJuDd7';		//����
        $mobile	  = implode(',',$arr['mobile']);	//����
        $content  = $this->gbk2utf8($arr['msg']);	//����
        $dstime   = '';		//Ϊ�մ�����������  �������ʱ�����ʱ����  ��ȷ����
        $productid = 676767;		//����
        $xh = '';		//����
        $url='http://www.ztsms.cn:8800/sendSms.do?username=xinge11&password=QIBJuDd7&mobile='.$mobile.'&content='.$content.'&dstime=&productid=676767&xh=';
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
        $status = explode(",",$file_contents);
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
