<?php
/**
 * @author Tissot.Cai
 * @copyright 宁波贷齐乐信息科技有限公司
 * @version 1.0
 */
include("phpmailer/class.phpmailer.php");
class Mail {

    public static $msg = '';

    /**
     * 发送邮件
     * @param $subject 主题
     * @param $body 邮件内容
     * @param $from 发送邮箱
     * @param $from_name 发送昵称
     * @param $to 邮件接收者 array(
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
        # 必填，SMTP服务器是否需要验证，true为需要，false为不需要
        $mail->SMTPAuth   = true;
        # 必填，设置SMTP服务器
        $mail->Host       = 'smtp.qiye.163.com';
        # 必填，开通SMTP服务的邮箱；任意一个163邮箱均可
        $mail->Username   = 'system@huinacaifu.com';
        # 必填， 以上邮箱对应的密码
        $mail->Password   = '7f3febaf';
        # 必填，发件人Email
        $mail->From       = 'system@huinacaifu.com';
        # 必填，发件人昵称或姓名
        $mail->FromName   = '汇纳财富';
        # 必填，邮件标题（主题）
        $mail->Subject    = $subject;
        # 可选，纯文本形势下用户看到的内容
        $mail->AltBody    = "";
        # 自动换行的字数
        $mail->WordWrap   = 50;

        $mail->MsgHTML($body);

        # 回复邮箱地址
        $mail->AddReplyTo($mail->From, $mail->FromName);

        # 添加附件,注意路径
        # $mail->AddAttachment("/path/to/file.zip");
        # $mail->AddAttachment("/path/to/image.jpg", "new.jpg");

        # 收件人地址。参数一：收信人的邮箱地址，可添加多个。参数二：收件人称呼
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
        # 是否以HTML形式发送，如果不是，请删除此行
        $mail->IsHTML(true);

        if(!$mail->Send()) {
          self::$msg = $mail->ErrorInfo;
          return false;
        }

        return true;
    }

    /**
     * @param $to 传入索引数组 密送邮件
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
            # 必填，SMTP服务器是否需要验证，true为需要，false为不需要
            $mail->SMTPAuth   = true;
            # 必填，设置SMTP服务器
            $mail->Host       = 'smtp.qiye.163.com';
            # 必填，开通SMTP服务的邮箱；任意一个163邮箱均可
            $mail->Username   = 'system@bljinrong.com';
            # 必填， 以上邮箱对应的密码
            $mail->Password   = '7f3febaf';
            # 必填，发件人Email
            $mail->From       = 'system@bljinrong.com';
            # 必填，发件人昵称或姓名
            $mail->FromName   = '汇纳财富';
            # 必填，邮件标题（主题）
            $mail->Subject    = $subject;
            # 可选，纯文本形势下用户看到的内容
            $mail->AltBody    = "";
            # 自动换行的字数
            $mail->WordWrap   = 50;

            $mail->MsgHTML($body);

            # 回复邮箱地址
            $mail->AddReplyTo($mail->From, $mail->FromName);

            $count = count($to);
            $group = 20;
            $eachTimes = ceil($count / $group); // 每20个用户为一组进行密送发件
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
