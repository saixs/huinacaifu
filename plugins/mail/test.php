<?php
/**
 * @author Tissot.Cai
 * @copyright ������������Ϣ�Ƽ����޹�˾
 * @version 1.0
 */
include_once 'mail.php';

if (Mail::send($subject, $body, $from, $from_name, $to)) {
    echo '���ͳɹ���';
}
else{
    echo Mail::$msg;
}
?>
