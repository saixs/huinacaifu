<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/api/ymphone.php';
 $mobile = '13588265100';
 $msg = rand(10000,99999);
 $smsg="你的手机验证码为2：".$msg."【汇纳财富】";
// $ver = new phone();
// $ret = $ver->sendMsg($mobile,$smsg);
$aa = array('mobile'=>array($mobile),'msg'=>$smsg);
$phone4=new phone2();
$phone4->login();
$ret2=$phone4->sendSMS($aa);
print_r($ret2);exit;
$ret=(int)$ret2->return;
 if($ret == 0){
	 $status = 1;
	 session_register("phone_valicode");
	 $_SESSION["phone_valicode"] = $msg;
 }else{
	$status = 0;
 }
 
 $arr = array('mobile'=>$mobile,'status'=>$status);
 echo json_encode($arr);