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
    $url = $_SERVER["HTTP_REFERER"]; //��ȡ��������·URL 
    $str = str_replace("http://", "", $url); //ȥ��http:// 
    $strdomain = explode("/", $str); // �ԡ�/���ֿ������� 
    $domain = $strdomain[0]; //ȡ��һ����/����ǰ���ַ�
    return $domain;
}

 if(isset($_POST["Amount"])&&isset($_POST["MD5info"])){
     $MD5key = "yqLG!cKE";//MD5˽Կ�������޸ģ�����
	//������
	$BillNo = $_POST["BillNo"];
	//���
	$Amount = $_POST["Amount"];
	//֧��״̬
	$Succeed = $_POST["Succeed"];
	//֧�����
	$Result = $_POST["Result"];
	//ȡ�õ�MD5У����Ϣ
	$MD5info = $_POST["MD5info"]; 
	//��ע
	$Remark = $_POST["Remark"];
	//У��Դ�ַ���
         $md5src = $BillNo.$Amount.$Succeed.$MD5key;
        //MD5������
	$md5sign = strtoupper(md5($md5src));
        if ($MD5info==$md5sign){//MD5��֤�ɹ�
//            $Succeed="88";
            if ($Succeed=="88"){
             accountClass::OnlineReturn(array("trade_no" => $BillNo));
            $msg = "�㳱֧���ɹ�";
            echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>"; 
            }else{
               $msg = "�㳱֧����ǩʧ�ܣ�ԭ��Ϊ��".$Result;
                echo "<script>alert('{$msg}');</script>";  
            }
        }else{
           $msg = "�㳱֧����ǩʧ��".$Result;
            echo "<script>alert('{$msg}');</script>"; 
        }
 }
?>
