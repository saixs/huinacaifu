<?php

/*
 * @Author: Waitfox@qq.com
 * @Date: 2013-6-19 15:27:15
 * @Desc: �㳱֧���ӿ�
 */

class huichaoPayment {
    public $name="�㳱֧��";
    
    public function __construct() {        
    }
    
    public static function ToSubmit($data) {
	    $submitUrl = 'https://pay.ecpss.com/sslpayment?';

	    $MD5key = 'yqLG!cKE';
	    $MerNo = '27026';

	    $BillNo =trim($data['trade_no']);
	    $Amount =trim($data['money']);
	    $Amount =sprintf("%.2f", $Amount);
	    $Remark = "huinacaifu.com";

	    $ReturnURL = "http://www.huinacaifu.com/modules/payment/return_huichao.php";
	    $AdviceURL = "http://www.huinacaifu.com/modules/payment/return_huichao.php";


	    $md5src = $MerNo.$BillNo.$Amount.$ReturnURL.$MD5key;
	    $MD5info = trim(strtoupper(md5($md5src)));

	    $orderTime =date('Ymdhis');
	    $defaultBankNumber =trim($data['bankCode']);
	    $products="huinacaifu.com";

	    $url = $submitUrl;
	    $url .= "MerNo={$MerNo}&";//�û���
	    //$url .= "MD5key={$MD5key}&";//˽Կ
	    $url .= "BillNo={$BillNo}&";//���׶�����
	    $url .= "Amount={$Amount}&";//���׽��
	    $url .= "ReturnURL={$ReturnURL}&";//���ص�ַ
	    $url .= "Remark={$Remark}&";//��ע
	    $url .= "MD5info={$MD5info}&";//���ܴ�
	    $url .= "AdviceURL={$AdviceURL}&";//֪ͨ��ַ
	    //$url .= "orderTime={$orderTime}&";//ʱ��
	    $url .= "defaultBankNumber={$defaultBankNumber}&";//���д���
	    $url .= "products={$products}";//��Ʒ����
	    return $url;
    }
    
    function GetFields(){
         return array(
                'member_id'=>array(
                        'label'=>'�ͻ���',
                        'type'=>'string'
                    ),
                'PrivateKey'=>array(
                        'label'=>'˽Կ',
                        'type'=>'string'
                ),
             'returnPurl'=>array(
                        'label'=>'�ص���ַ',
                        'type'=>'string'
                ),
             'gatePurl'=>array(
                        'label'=>'���ص�ַ',
                        'type'=>'string'
                )
            );
    }
}

?>
