<?php

/**
 * 网银在线支付接口
 */
class chinabankPayment {

    public $name = "网银在线";

    public function __construct() {
        
    }

    public static function ToSubmit($payment) {
        $v_mid = $payment['member_id'];
        $key = $payment['PrivateKey'];
        $v_url = $payment['returnPurl'];//返回地址
        // $v_oid = date('Ymd', time()) . "-" . $v_mid . "-" . date('His', time()); //订单号，建议构成格式 年月日-商户号-小时分钟秒
        $v_oid=$payment['trade_no']; 
		$v_amount = trim($_POST['money']); //支付金额                 
        $v_moneytype = "CNY";
        $text = $v_amount . $v_moneytype . $v_oid . $v_mid . $v_url . $key; //md5加密拼凑串,注意顺序不能变
        $v_md5info = strtoupper(md5($text)); //md5函数加密并转化成大写字母
        $url = $payment['gatePurl'];//网关提交地址
        $data = array(
            'v_mid' => $v_mid,
            'v_oid' => $v_oid,
            'v_amount' => $v_amount,
            'v_moneytype' => $v_moneytype,
            'v_url' => $v_url,
            'v_md5info' => $v_md5info,
            'pmode_id' => intval($_POST['chinaBank'])
        );
        $url.=http_build_query($data);
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
