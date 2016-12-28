<?php

/*
 * @Author: Waitfox@qq.com
 * @Date: 2013-6-19 15:27:15
 * @Desc: 汇潮支付接口
 */

class huichaoPayment {
    public $name="汇潮支付";
    
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
	    $url .= "MerNo={$MerNo}&";//用户号
	    //$url .= "MD5key={$MD5key}&";//私钥
	    $url .= "BillNo={$BillNo}&";//交易订单号
	    $url .= "Amount={$Amount}&";//交易金额
	    $url .= "ReturnURL={$ReturnURL}&";//返回地址
	    $url .= "Remark={$Remark}&";//备注
	    $url .= "MD5info={$MD5info}&";//加密串
	    $url .= "AdviceURL={$AdviceURL}&";//通知地址
	    //$url .= "orderTime={$orderTime}&";//时间
	    $url .= "defaultBankNumber={$defaultBankNumber}&";//银行代码
	    $url .= "products={$products}";//商品描述
	    return $url;
    }
    
    function GetFields(){
         return array(
                'member_id'=>array(
                        'label'=>'客户号',
                        'type'=>'string'
                    ),
                'PrivateKey'=>array(
                        'label'=>'私钥',
                        'type'=>'string'
                ),
             'returnPurl'=>array(
                        'label'=>'回调地址',
                        'type'=>'string'
                ),
             'gatePurl'=>array(
                        'label'=>'网关地址',
                        'type'=>'string'
                )
            );
    }
}

?>
