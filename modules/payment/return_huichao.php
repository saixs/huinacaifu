<?php

/*
 * @Author: Waitfox@qq.com
 * @Date: 2013-10-28 11:02:10
 * @Desc: return_huichao
 */
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH . 'modules/account/account.class.php');
require_once (ROOT_PATH . 'modules/payment/payment.class.php');
function get_referer() {
    $url = $_SERVER["HTTP_REFERER"]; //获取完整的来路URL 
    $str = str_replace("http://", "", $url); //去掉http:// 
    $strdomain = explode("/", $str); // 以“/”分开成数组 
    $domain = $strdomain[0]; //取第一个“/”以前的字符
    return $domain;
}

 if(isset($_POST["Amount"])&&isset($_POST["MD5info"])){
     $MD5key = "yqLG!cKE";//MD5私钥，自行修改！！！
	//订单号
	$BillNo = $_POST["BillNo"];
	//金额
	$Amount = $_POST["Amount"];
	//支付状态
	$Succeed = $_POST["Succeed"];
	//支付结果
	$Result = $_POST["Result"];
	//取得的MD5校验信息
	$MD5info = $_POST["MD5info"]; 
	//备注
	$Remark = $_POST["Remark"];
	//校验源字符串
         $md5src = $BillNo.$Amount.$Succeed.$MD5key;
        //MD5检验结果
	$md5sign = strtoupper(md5($md5src));
        if ($MD5info==$md5sign){//MD5验证成功
//            $Succeed="88";
            if ($Succeed=="88"){
             accountClass::OnlineReturn(array("trade_no" => $BillNo));
            $msg = "汇潮支付成功";
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>"; 
            }else{
               $msg = "汇潮支付验签失败，原因为：".$Result;
                echo "<script>alert('{$msg}');</script>";  
            }
        }else{
           $msg = "汇潮支付验签失败".$Result;
            echo "<script>alert('{$msg}');</script>"; 
        }
 }
?>
