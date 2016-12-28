<?php
header("Content-Type: text/html; charset=GBK");
class registExResponse{
    public $return;
}
class registEx{
public $arg0;
public $arg1;
public $arg2;
public function __construct($arg0,$arg1,$arg2) {
    $this->arg0=$arg0;
    $this->arg1=$arg1;
    $this->arg2=$arg2;
}
}
class sendSMS{
    public $arg0;
    public $arg1;
    public $arg2;
    public $arg3;
    public $arg4;
    public $arg5;
    public $arg6;
    public $arg7;
    public $arg8;
    
    public function __construct($arg0,$arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7) {
        $this->arg0=$arg0;
        $this->arg1=$arg1;
        $this->arg2=$arg2;
        $this->arg3=$arg3;
        $this->arg4=$arg4;
        $this->arg5=$arg5;
        $this->arg6=$arg6;
        $this->arg7=$arg7;
        $this->arg8='';
    }
}
class sendSMSResponse{
    public $return;
}
class phone4 {
    public $client;
    public $serialNumber;
    public $password;
    public $sessionKey;
    
    public function __construct() {
        $this->serialNumber = '3SDK-EMY-0130-PBWUP';
	$this->password = '009334';
	$this->sessionKey = '123456';
        $this->client=new SoapClient("http://sdkhttp.eucp.b2m.cn/sdk/SDKService?wsdl",
        array('classmap' =>array('registEx'=>'registEx','registExResponse'=>'registExResponse',
            'sendSMS'=>'sendSMS','sendSMSResponse'=>'sendSMSResponse'),'encoding'=>'GBK',
            'location' =>"http://sdkhttp.eucp.b2m.cn/sdk/SDKService?wsdl",'uri'=>"http://sdkhttp.eucp.b2m.cn/","trace" => 1,"exception"=>true ));
    }
    
    public function login(){
        $registEx=new registEx($this->serialNumber,$this->sessionKey,$this->password);
        $ret1=$this->client->registEx($registEx);
//        var_dump($ret1);
        return $ret1;
    }
    
    public function sendSMS($mobile,$content){
        $sendSMS=new sendSMS($this->serialNumber,$this->sessionKey,'',$mobile,$content,'','GBK','1');
        $ret2=$this->client->sendSMS($sendSMS);
//        var_dump($ret2);
        return $ret2;
    }
}
