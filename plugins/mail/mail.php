<?php
/**
 * @author Tissot.Cai
 * @copyright ������������Ϣ�Ƽ����޹�˾
 * @version 1.0
 */
include("phpmailer/class.phpmailer.php");
class Mail {

    public static $msg = '';

    /**
     * �����ʼ�
     * @param $subject ����
     * @param $body �ʼ�����
     * @param $from ��������
     * @param $from_name �����ǳ�
     * @param $to �ʼ������� array(
     *      array(mail_address, mail_name)
     * )
     * @return bool
     */
    public static function Send($subject, $body, $to) {
        global $mysql;

        $mail = new PHPMailer();
        $body = eregi_replace("[\]",'',$body);
        
        $mail->CharSet = 'gbk';
        $mail->IsSMTP();
        # ���SMTP�������Ƿ���Ҫ��֤��trueΪ��Ҫ��falseΪ����Ҫ
        $mail->SMTPAuth   = true;
        # �������SMTP������
        $mail->Host       = 'smtp.qiye.163.com';
        # �����ͨSMTP��������䣻����һ��163�������
        $mail->Username   = 'system@huinacaifu.com';
        # ��� ���������Ӧ������
        $mail->Password   = '7f3febaf';
        # ���������Email
        $mail->From       = 'system@huinacaifu.com';
        # ����������ǳƻ�����
        $mail->FromName   = '���ɲƸ�';
        # ����ʼ����⣨���⣩
        $mail->Subject    = $subject;
        # ��ѡ�����ı��������û�����������
        $mail->AltBody    = "";
        # �Զ����е�����
        $mail->WordWrap   = 50;

        $mail->MsgHTML($body);

        # �ظ������ַ
        $mail->AddReplyTo($mail->From, $mail->FromName);

        # ��Ӹ���,ע��·��
        # $mail->AddAttachment("/path/to/file.zip");
        # $mail->AddAttachment("/path/to/image.jpg", "new.jpg");

        # �ռ��˵�ַ������һ�������˵������ַ������Ӷ�������������ռ��˳ƺ�
        //P($to);
        //if (count($to) > 1) {
           // foreach ($to as $list) {
              //  $mail->AddAddress($list);
                //echo $list[0];
            //}
        //}

		//P($to);
		$mail->AddAddress(join(",",$to));
		//echo '*';P($mail->to);echo '*';
        # �Ƿ���HTML��ʽ���ͣ�������ǣ���ɾ������
        $mail->IsHTML(true);

        if(!$mail->Send()) {
          self::$msg = $mail->ErrorInfo;
          return false;
        }

        return true;
    }

    /**
     * @param $to ������������ �����ʼ�
     * @param $title
     * @param $content
     * @return bool
     */
    function sendBcc($subject, $body, $to) {
        //$serverInfo = $this->SMTPInfo();
        if (is_array($to)) {

            /*$mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->Host      = $serverInfo['host'];
            $mail->SMTPAuth  = $serverInfo['auth'] == 1 ? TRUE : FALSE;
            $mail->Port      = $serverInfo['port'];
            $mail->Username = $serverInfo['user_name'];
            $mail->Password = $serverInfo['pwd'];
            $mail->CharSet = 'UTF-8';
            $mail->AddAddress($serverInfo['default_address'], '');
            $mail->SetFrom($serverInfo['user_name'], $serverInfo['from_name']);
            $mail->Subject = $title;
            $mail->MsgHTML($content);*/
            $mail = new PHPMailer();
            $body = eregi_replace("[\]",'',$body);
            //$mail->IsHTML(true);
            $mail->CharSet = 'gbk';
            $mail->IsSMTP();
            # ���SMTP�������Ƿ���Ҫ��֤��trueΪ��Ҫ��falseΪ����Ҫ
            $mail->SMTPAuth   = true;
            # �������SMTP������
            $mail->Host       = 'smtp.qiye.163.com';
            # �����ͨSMTP��������䣻����һ��163�������
            $mail->Username   = 'system@bljinrong.com';
            # ��� ���������Ӧ������
            $mail->Password   = '7f3febaf';
            # ���������Email
            $mail->From       = 'system@bljinrong.com';
            # ����������ǳƻ�����
            $mail->FromName   = '���ɲƸ�';
            # ����ʼ����⣨���⣩
            $mail->Subject    = $subject;
            # ��ѡ�����ı��������û�����������
            $mail->AltBody    = "";
            # �Զ����е�����
            $mail->WordWrap   = 50;

            $mail->MsgHTML($body);

            # �ظ������ַ
            $mail->AddReplyTo($mail->From, $mail->FromName);

            $count = count($to);
            $group = 20;
            $eachTimes = ceil($count / $group); // ÿ20���û�Ϊһ��������ͷ���
            if ($eachTimes > 1) {
                $flag = 1;
                for($i=0; $i<=$eachTimes; $i++) {
                    for($ii = $i * $group; $ii <= ($i + 1) * $group - 1 && $ii <= $count; $ii++) {
                        if (isset($to[$ii])) {
                            $mail->AddBCC($to[$ii],'');
                        }
                    }
                    $sendResult = $mail->Send();
                    $mail->ClearBCCs();
                    if (!$sendResult) {
                        $flag = 0;
                    }
                }
                return $flag;
            } else {
                $flag = 1;
                foreach($to as $value) {
                    $mail->AddBCC($value,'');
                }
                $sendResult = $mail->Send();
                $mail->ClearBCCs();
                if (!$sendResult) {
                    $flag = 0;
                }
                return $flag;
            }
        } else {
            return -6;
        }
    }
}
?>
