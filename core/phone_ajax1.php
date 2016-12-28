<?php
include ('phone4.php');
include ("phone.class.php");
 $mobile = $_POST['nub'];
 $msg = rand(10000,99999);
 $smsg="你的手机验证码为：".$msg;
// $ver = new phone();
// $ret = $ver->sendMsg($mobile,$smsg);
 
$mobile2=array();
$mobile2[]=$mobile;
$phone4=new phone4();
$phone4->login();
$ret2=$phone4->sendSMS($mobile2, $smsg);
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