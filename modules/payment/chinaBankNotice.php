<?php
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH.'modules/account/account.class.php');
require_once (ROOT_PATH.'modules/payment/payment.class.php');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-20
 * Time: ����2:43
 */
//****************************************	//MD5��ԿҪ�������ύҳ��ͬ����Send.asp��� key = "test" ,�޸�""���� test Ϊ������Կ
//�������û������MD5��Կ���½����Ϊ���ṩ�̻���̨����ַ��https://merchant3.chinabank.com.cn/
$key='ruibenjinrong123qwert';							//��½��������ĵ�����������ҵ���B2C�����ڶ������������С�MD5��Կ���á�
//����������һ��16λ���ϵ���Կ����ߣ���Կ���64λ��������16λ�Ѿ��㹻��
//****************************************
$v_oid     =trim($_POST['v_oid']);
$v_pmode   =trim($_POST['v_pmode']);
$v_pstatus =trim($_POST['v_pstatus']);
$v_pstring =trim($_POST['v_pstring']);
$v_amount  =trim($_POST['v_amount']);
$v_moneytype  =trim($_POST['v_moneytype']);
$remark1   =trim($_POST['remark1' ]);
$remark2   =trim($_POST['remark2' ]);
$v_md5str  =trim($_POST['v_md5str' ]);
/**
 * ���¼���md5��ֵ
 */
$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key)); //ƴ�ռ��ܴ�
if ($v_md5str==$md5string)
{

    if($v_pstatus=="20")
    {
        accountClass::OnlineReturn(array("trade_no" => $v_oid));
    }
    echo "ok";

}else{
    echo "error";
}
?>