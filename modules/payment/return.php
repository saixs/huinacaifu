<?
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH.'modules/account/account.class.php');
require_once (ROOT_PATH.'modules/payment/payment.class.php');
function get_referer(){
    $url = $_SERVER["HTTP_REFERER"]; //获取完整的来路URL
    $str = str_replace("http://","",$url); //去掉http://
    $strdomain = explode("/",$str); // 以“/”分开成数组
    $domain = $strdomain[0]; //取第一个“/”以前的字符
    return $domain;
}
//print_r($_REQUEST);
if (isset($_REQUEST['trade_status']) && $_REQUEST['trade_status']=="TRADE_SUCCESS"&&1==2){
    $trade_no = $_REQUEST['out_trade_no'];
    accountClass::OnlineReturn(array("trade_no"=>$_REQUEST['out_trade_no']));
    echo "<script>location.href='/index.php?user&q=code/account/recharge';</script>";
}
elseif (isset($_POST['v_pstatus'])) { //网银在线
    // @file_put_contents('c:\tmp\chinabank.txt', serialize($_POST),FILE_APPEND);
    $v_oid = trim($_POST['v_oid']);       // 商户发送的v_oid定单编号   
//    $v_pmode = trim($_POST['v_pmode']);    // 支付方式（字符串）   
    $v_pstatus = trim($_POST['v_pstatus']);   //  支付状态 ：20（支付成功）；30（支付失败）
    $v_pstring = trim($_POST['v_pstring']);   // 支付结果信息 ： 支付完成（当v_pstatus=20时）；失败原因（当v_pstatus=30时,字符串）； 
    $v_amount = trim($_POST['v_amount']);     // 订单实际支付金额
    $v_moneytype = trim($_POST['v_moneytype']); //订单实际支付币种    
    $v_md5str = trim($_POST['v_md5str']);   //拼凑后的MD5校验值  
    $key = 'ruibenjinrong123qwert';
    $md5string = strtoupper(md5($v_oid . $v_pstatus . $v_amount . $v_moneytype . $key));
    if ($v_md5str == $md5string) {
        if ($v_pstatus == "20") {
            accountClass::OnlineReturn(array("trade_no" => $v_oid));
            $msg = "恭喜！支付成功，点击确定返回汇纳财富！";
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        } else {
            $msg = "抱歉！支付失败：".$v_pstring;
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        }
    }else{
        $msg = "网银在线验签失败".$v_pstring;
        echo "<script>alert('{$msg}');</script>";
    }
} elseif (isset($_REQUEST['sp_billno']) && $_REQUEST['sp_billno']!=""){
    die('非法请求');
    require_once (ROOT_PATH."modules/payment/classes/tenpay/PayResponseHandler.class.php");
    $result = paymentClass::GetOne(array("nid"=>"tenpay"));
    $key = $result['fields']['PrivateKey']['value'];
    $resHandler = new PayResponseHandler();
    $resHandler->setKey($key);

    if($resHandler->isTenpaySign()) {
        //交易单号
        $transaction_id = $resHandler->getParameter("transaction_id");
        $sp_billno = $_REQUEST['sp_billno'];
        //金额,以分为单位
        $total_fee = $resHandler->getParameter("total_fee")/100;

        //支付结果
        $pay_result = $resHandler->getParameter("pay_result");

        if( 0 == $pay_result ) {
            //accountClass::OnlineReturn(array("trade_no"=>$sp_billno));
            $msg = "支付成功";
        } else {
            $msg = "支付失败";
        }

    } else {
        $msg =  "认证签名失败" ;
    }
    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}
elseif (isset($_REQUEST['respCode']) && $_REQUEST['respCode']!=""){
    die('非法请求');

    $version = $_POST["version"];
    $charset = $_POST["charset"];
    $language = $_POST["language"];
    $signType = $_POST["signType"];
    $tranCode = $_POST["tranCode"];
    $merchantID = $_POST["merchantID"];
    $merOrderNum = $_POST["merOrderNum"];
    $tranAmt = $_POST["tranAmt"];
    $feeAmt = $_POST["feeAmt"];
    $frontMerUrl = $_POST["frontMerUrl"];
    $backgroundMerUrl = $_POST["backgroundMerUrl"];
    $tranDateTime = $_POST["tranDateTime"];
    $tranIP = $_POST["tranIP"];
    $respCode = $_POST["respCode"];
    $msgExt = $_POST["msgExt"];
    $orderId = $_POST["orderId"];
    $gopayOutOrderId = $_POST["gopayOutOrderId"];
    $bankCode = $_POST["bankCode"];
    $tranFinishTime = $_POST["tranFinishTime"];
    $merRemark1 = $_POST["merRemark1"];
    $merRemark2 = $_POST["merRemark2"];
    $signValue = $_POST["signValue"];




    $signValue = $_POST["signValue"];


    $signValue2='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=['.$orderId.']gopayOutOrderId=['.$gopayOutOrderId.']tranIP=['.$tranIP.']respCode=['.$respCode.']VerficationCode=[5056662791981]';



    $signValue2 = md5($signValue2);

    $billno = $_REQUEST['merOrderNum'];
    $amount = $_REQUEST['tranAmt'];
    $mydate = $_REQUEST['tranFinishTime'];
    $succ = $_REQUEST['respCode'];
    $content = $billno . $amount . $mydate;
    $result = paymentClass::GetOne(array("nid"=>"guofubao"));
    $cert = $result['fields']['PrivateKey']['value'];
    $signature_1ocal = md5($content . $cert);
    if($signValue==$signValue2){
        if($respCode=='0000'&&$merchantID='0000058047'){
            // if($respCode=='0000'&&$msgExt!="反钓鱼-域名校验失败"){
            //if ($succ == '0000'){
            $aaa=get_referer();
            /*if($aaa=="www.gopay.com.cn")
            {*/
            accountClass::OnlineReturn(array("trade_no"=>$billno));

            $msg = '交易成功';
            /*}
            else
            {
                $msg = '交易失败！';
            }*/
        }else{
            $msg = '交易失败！';
        }
    }
    else
    {
        $msg = '交易失败！';
    }
    //echo $msg;
    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}elseif(isset($_REQUEST['v_md5str'])&&isset($_REQUEST['v_pstatus'])){
    $v_oid     =trim($_REQUEST['v_oid']);       // 商户发送的v_oid定单编号
    $v_pstatus     =trim($_REQUEST['v_pstatus']);       // 商户发送的v_oid定单编号

    if($v_pstatus=="20"){
        $billno = $v_oid;
        //	accountClass::OnlineReturn(array("trade_no"=>$billno));
        $msg = '交易成功';
    }else{
        $msg = '交易失败';
    }

    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
//新生支付
}else if(isset($_REQUEST["remark"])&& $_REQUEST['remark'] ==md5('xq_lanbang_hnapay')){
    die('非法请求');
    $orderID = $_REQUEST["orderID"];
    $resultCode = $_REQUEST["resultCode"];
    $stateCode = $_REQUEST["stateCode"];
    $orderAmount = $_REQUEST["orderAmount"];
    $payAmount = $_REQUEST["payAmount"];
    $acquiringTime = $_REQUEST["acquiringTime"];
    $completeTime = $_REQUEST["completeTime"];
    $orderNo = $_REQUEST["orderNo"];
    $partnerID = $_REQUEST["partnerID"];
    $remark = $_REQUEST["remark"];
    $charset = $_REQUEST["charset"];
    $signType = $_REQUEST["signType"];
    $signMsg = $_REQUEST["signMsg"];

    $src = "orderID=".$orderID
        ."&resultCode=".$resultCode
        ."&stateCode=".$stateCode
        ."&orderAmount=".$orderAmount
        ."&payAmount=".$payAmount
        ."&acquiringTime=".$acquiringTime
        ."&completeTime=".$completeTime
        ."&orderNo=".$orderNo
        ."&partnerID=".$partnerID
        ."&remark=".$remark
        ."&charset=".$charset
        ."&signType=".$signType;

    if($_REQUEST["charset"] == 1)
        $charset = "UTF8";

    if(2 == $signType) //md5验签
    {
        $pkey = "30819f300d06092a864886f70d010101050003818d0030818902818100af48db8f2aa0f029aa3fadfcf749267566544d2ce25738df295d94bb918542421f2b649e533db53553a3e9a4bd860068b759af4681d96f4732e47b4653b93339e68b7ef00e2cef3ab8ec5e9c65d4c7992f626c1f4b9a95a626d005fce59919ae1b619748194256ec4627a932d75b8f9fb51c3a78bfbc53bcc0bbb4924d59c6310203010001";
        $src = $src."&pkey=".$pkey;
        $ret2 = ($signMsg == md5($src));
    }
    if($ret2){
        $msg="验签成功";
        if($stateCode == 2){
            $msg .= '交易成功';
            accountClass::OnlineReturn(array("trade_no"=>$orderID));
        }else{
            $msg .= '交易失败';
        }
    }else{
        $msg = '验签失败';
    }
    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}else if(isset($_REQUEST['RespCode']) && $_REQUEST['RespCode']!="" && $_POST['MerPriv'] =='xq_cao_chinapnr'){
    die('非法请求');
    $CmdId = $_POST['CmdId'];			//消息类型
    $MerId = $_POST['MerId']; 	 		//商户号
    $RespCode = $_POST['RespCode']; 	//应答返回码
    $TrxId = $_POST['TrxId'];  			//钱管家交易唯一标识
    $OrdAmt = $_POST['OrdAmt']; 		//金额
    $CurCode = $_POST['CurCode']; 		//币种
    $Pid = $_POST['Pid'];  				//商品编号
    $OrdId = $_POST['OrdId'];  			//订单号
    $MerPriv = $_POST['MerPriv'];  		//商户私有域
    $RetType = $_POST['RetType'];  		//返回类型
    $DivDetails = $_POST['DivDetails']; //分账明细
    $GateId = $_POST['GateId'];  		//银行ID
    $ChkValue = $_POST['ChkValue']; 	//签名信息

    //验证签名
    $SignObject = new COM("CHINAPNR.NetpayClient");
    $MsgData = $CmdId.$MerId.$RespCode.$TrxId.$OrdAmt.$CurCode.$Pid.$OrdId.$MerPriv.$RetType.$DivDetails.$GateId;  	//参数顺序不能错
    $MerFile = $_SERVER["DOCUMENT_ROOT"]."/PgPubk.key";			//商户验签公钥文件
    $SignData = $SignObject->VeriSignMsg0($MerFile,$MsgData,strlen($MsgData),$ChkValue);

    if($SignData == "0"){
        if($RespCode == "000000"){
            //交易成功
            //根据订单号 进行相应业务操作
            //在些插入代码
            accountClass::OnlineReturn(array("trade_no"=>$OrdId));
            $msg = "支付成功";
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        }else{
            //交易失败
            //根据订单号 进行相应业务操作
            //在些插入代码
            $msg= "支付失败";
            echo "<script>alert('{$msg}');</script>";

        }
    }else{
        //验签失败
        $msg= "验签失败[".$SignData."]";
        echo "<script>alert('{$msg}');</script>";
    }

}else if(isset($_REQUEST['TransID'])&&isset($_REQUEST['MerchantID'])){	//宝付支付
    $_MerchantID=$_REQUEST['MerchantID'];//商户号
    $_TransID =$_REQUEST['TransID'];//流水号
    $_Result=$_REQUEST['Result'];//支付结果(1:成功,0:失败)
    $_resultDesc=$_REQUEST['resultDesc'];//支付结果描述
    $_factMoney=$_REQUEST['factMoney'];//实际成交金额
    $_additionalInfo=$_REQUEST['additionalInfo'];//订单附加消息
    $_SuccTime=$_REQUEST['SuccTime'];//交易成功时间
    $_Md5Sign=$_REQUEST['Md5Sign'];//md5签名
    $_Md5Key="kp3mukxdzyrx53x8";

    $_WaitSign=md5($_MerchantID.$_TransID.$_Result.$_resultDesc.$_factMoney.$_additionalInfo.$_SuccTime.$_Md5Key);
    if ($_Md5Sign == $_WaitSign) {

        accountClass::OnlineReturn(array("trade_no"=>$_TransID));
        $msg = "支付成功";
        echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        //处理想处理的事情，验证通过，根据提交的参数判断支付结果
    }
    else {
        $msg= "支付失败";
        echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        //处理想处理的事情
    }
}
?>