<?php

/**
 * ��������֧���ӿ�
 */
class chinabankPayment {

    public $name = "��������";

    public function __construct() {
        
    }

    public static function ToSubmit($payment) {
        $v_mid = $payment['member_id'];
        $key = $payment['PrivateKey'];
        $v_url = $payment['returnPurl'];//���ص�ַ
        // $v_oid = date('Ymd', time()) . "-" . $v_mid . "-" . date('His', time()); //�����ţ����鹹�ɸ�ʽ ������-�̻���-Сʱ������
        $v_oid=$payment['trade_no']; 
		$v_amount = trim($_POST['money']); //֧�����                 
        $v_moneytype = "CNY";
        $text = $v_amount . $v_moneytype . $v_oid . $v_mid . $v_url . $key; //md5����ƴ�մ�,ע��˳���ܱ�
        $v_md5info = strtoupper(md5($text)); //md5�������ܲ�ת���ɴ�д��ĸ
        $url = $payment['gatePurl'];//�����ύ��ַ
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
