<?
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH.'modules/account/account.class.php');
require_once (ROOT_PATH.'modules/payment/payment.class.php');
function get_referer(){
    $url = $_SERVER["HTTP_REFERER"]; //��ȡ��������·URL
    $str = str_replace("http://","",$url); //ȥ��http://
    $strdomain = explode("/",$str); // �ԡ�/���ֿ�������
    $domain = $strdomain[0]; //ȡ��һ����/����ǰ���ַ�
    return $domain;
}
//print_r($_REQUEST);
if (isset($_REQUEST['trade_status']) && $_REQUEST['trade_status']=="TRADE_SUCCESS"&&1==2){
    $trade_no = $_REQUEST['out_trade_no'];
    accountClass::OnlineReturn(array("trade_no"=>$_REQUEST['out_trade_no']));
    echo "<script>location.href='/index.php?user&q=code/account/recharge';</script>";
}
elseif (isset($_POST['v_pstatus'])) { //��������
    // @file_put_contents('c:\tmp\chinabank.txt', serialize($_POST),FILE_APPEND);
    $v_oid = trim($_POST['v_oid']);       // �̻����͵�v_oid�������   
//    $v_pmode = trim($_POST['v_pmode']);    // ֧����ʽ���ַ�����   
    $v_pstatus = trim($_POST['v_pstatus']);   //  ֧��״̬ ��20��֧���ɹ�����30��֧��ʧ�ܣ�
    $v_pstring = trim($_POST['v_pstring']);   // ֧�������Ϣ �� ֧����ɣ���v_pstatus=20ʱ����ʧ��ԭ�򣨵�v_pstatus=30ʱ,�ַ������� 
    $v_amount = trim($_POST['v_amount']);     // ����ʵ��֧�����
    $v_moneytype = trim($_POST['v_moneytype']); //����ʵ��֧������    
    $v_md5str = trim($_POST['v_md5str']);   //ƴ�պ��MD5У��ֵ  
    $key = 'ruibenjinrong123qwert';
    $md5string = strtoupper(md5($v_oid . $v_pstatus . $v_amount . $v_moneytype . $key));
    if ($v_md5str == $md5string) {
        if ($v_pstatus == "20") {
            accountClass::OnlineReturn(array("trade_no" => $v_oid));
            $msg = "��ϲ��֧���ɹ������ȷ�����ػ��ɲƸ���";
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        } else {
            $msg = "��Ǹ��֧��ʧ�ܣ�".$v_pstring;
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        }
    }else{
        $msg = "����������ǩʧ��".$v_pstring;
        echo "<script>alert('{$msg}');</script>";
    }
} elseif (isset($_REQUEST['sp_billno']) && $_REQUEST['sp_billno']!=""){
    die('�Ƿ�����');
    require_once (ROOT_PATH."modules/payment/classes/tenpay/PayResponseHandler.class.php");
    $result = paymentClass::GetOne(array("nid"=>"tenpay"));
    $key = $result['fields']['PrivateKey']['value'];
    $resHandler = new PayResponseHandler();
    $resHandler->setKey($key);

    if($resHandler->isTenpaySign()) {
        //���׵���
        $transaction_id = $resHandler->getParameter("transaction_id");
        $sp_billno = $_REQUEST['sp_billno'];
        //���,�Է�Ϊ��λ
        $total_fee = $resHandler->getParameter("total_fee")/100;

        //֧�����
        $pay_result = $resHandler->getParameter("pay_result");

        if( 0 == $pay_result ) {
            //accountClass::OnlineReturn(array("trade_no"=>$sp_billno));
            $msg = "֧���ɹ�";
        } else {
            $msg = "֧��ʧ��";
        }

    } else {
        $msg =  "��֤ǩ��ʧ��" ;
    }
    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}
elseif (isset($_REQUEST['respCode']) && $_REQUEST['respCode']!=""){
    die('�Ƿ�����');

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
            // if($respCode=='0000'&&$msgExt!="������-����У��ʧ��"){
            //if ($succ == '0000'){
            $aaa=get_referer();
            /*if($aaa=="www.gopay.com.cn")
            {*/
            accountClass::OnlineReturn(array("trade_no"=>$billno));

            $msg = '���׳ɹ�';
            /*}
            else
            {
                $msg = '����ʧ�ܣ�';
            }*/
        }else{
            $msg = '����ʧ�ܣ�';
        }
    }
    else
    {
        $msg = '����ʧ�ܣ�';
    }
    //echo $msg;
    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}elseif(isset($_REQUEST['v_md5str'])&&isset($_REQUEST['v_pstatus'])){
    $v_oid     =trim($_REQUEST['v_oid']);       // �̻����͵�v_oid�������
    $v_pstatus     =trim($_REQUEST['v_pstatus']);       // �̻����͵�v_oid�������

    if($v_pstatus=="20"){
        $billno = $v_oid;
        //	accountClass::OnlineReturn(array("trade_no"=>$billno));
        $msg = '���׳ɹ�';
    }else{
        $msg = '����ʧ��';
    }

    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
//����֧��
}else if(isset($_REQUEST["remark"])&& $_REQUEST['remark'] ==md5('xq_lanbang_hnapay')){
    die('�Ƿ�����');
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

    if(2 == $signType) //md5��ǩ
    {
        $pkey = "30819f300d06092a864886f70d010101050003818d0030818902818100af48db8f2aa0f029aa3fadfcf749267566544d2ce25738df295d94bb918542421f2b649e533db53553a3e9a4bd860068b759af4681d96f4732e47b4653b93339e68b7ef00e2cef3ab8ec5e9c65d4c7992f626c1f4b9a95a626d005fce59919ae1b619748194256ec4627a932d75b8f9fb51c3a78bfbc53bcc0bbb4924d59c6310203010001";
        $src = $src."&pkey=".$pkey;
        $ret2 = ($signMsg == md5($src));
    }
    if($ret2){
        $msg="��ǩ�ɹ�";
        if($stateCode == 2){
            $msg .= '���׳ɹ�';
            accountClass::OnlineReturn(array("trade_no"=>$orderID));
        }else{
            $msg .= '����ʧ��';
        }
    }else{
        $msg = '��ǩʧ��';
    }
    echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}else if(isset($_REQUEST['RespCode']) && $_REQUEST['RespCode']!="" && $_POST['MerPriv'] =='xq_cao_chinapnr'){
    die('�Ƿ�����');
    $CmdId = $_POST['CmdId'];			//��Ϣ����
    $MerId = $_POST['MerId']; 	 		//�̻���
    $RespCode = $_POST['RespCode']; 	//Ӧ�𷵻���
    $TrxId = $_POST['TrxId'];  			//Ǯ�ܼҽ���Ψһ��ʶ
    $OrdAmt = $_POST['OrdAmt']; 		//���
    $CurCode = $_POST['CurCode']; 		//����
    $Pid = $_POST['Pid'];  				//��Ʒ���
    $OrdId = $_POST['OrdId'];  			//������
    $MerPriv = $_POST['MerPriv'];  		//�̻�˽����
    $RetType = $_POST['RetType'];  		//��������
    $DivDetails = $_POST['DivDetails']; //������ϸ
    $GateId = $_POST['GateId'];  		//����ID
    $ChkValue = $_POST['ChkValue']; 	//ǩ����Ϣ

    //��֤ǩ��
    $SignObject = new COM("CHINAPNR.NetpayClient");
    $MsgData = $CmdId.$MerId.$RespCode.$TrxId.$OrdAmt.$CurCode.$Pid.$OrdId.$MerPriv.$RetType.$DivDetails.$GateId;  	//����˳���ܴ�
    $MerFile = $_SERVER["DOCUMENT_ROOT"]."/PgPubk.key";			//�̻���ǩ��Կ�ļ�
    $SignData = $SignObject->VeriSignMsg0($MerFile,$MsgData,strlen($MsgData),$ChkValue);

    if($SignData == "0"){
        if($RespCode == "000000"){
            //���׳ɹ�
            //���ݶ����� ������Ӧҵ�����
            //��Щ�������
            accountClass::OnlineReturn(array("trade_no"=>$OrdId));
            $msg = "֧���ɹ�";
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        }else{
            //����ʧ��
            //���ݶ����� ������Ӧҵ�����
            //��Щ�������
            $msg= "֧��ʧ��";
            echo "<script>alert('{$msg}');</script>";

        }
    }else{
        //��ǩʧ��
        $msg= "��ǩʧ��[".$SignData."]";
        echo "<script>alert('{$msg}');</script>";
    }

}else if(isset($_REQUEST['TransID'])&&isset($_REQUEST['MerchantID'])){	//����֧��
    $_MerchantID=$_REQUEST['MerchantID'];//�̻���
    $_TransID =$_REQUEST['TransID'];//��ˮ��
    $_Result=$_REQUEST['Result'];//֧�����(1:�ɹ�,0:ʧ��)
    $_resultDesc=$_REQUEST['resultDesc'];//֧���������
    $_factMoney=$_REQUEST['factMoney'];//ʵ�ʳɽ����
    $_additionalInfo=$_REQUEST['additionalInfo'];//����������Ϣ
    $_SuccTime=$_REQUEST['SuccTime'];//���׳ɹ�ʱ��
    $_Md5Sign=$_REQUEST['Md5Sign'];//md5ǩ��
    $_Md5Key="kp3mukxdzyrx53x8";

    $_WaitSign=md5($_MerchantID.$_TransID.$_Result.$_resultDesc.$_factMoney.$_additionalInfo.$_SuccTime.$_Md5Key);
    if ($_Md5Sign == $_WaitSign) {

        accountClass::OnlineReturn(array("trade_no"=>$_TransID));
        $msg = "֧���ɹ�";
        echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        //�����봦������飬��֤ͨ���������ύ�Ĳ����ж�֧�����
    }
    else {
        $msg= "֧��ʧ��";
        echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
        //�����봦�������
    }
}
?>