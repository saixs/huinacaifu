<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>[��֤��/����]���շ�ʽ�����������ҳ��</title>
    <link href="/images/valid_style.css" rel="stylesheet" type="text/css" />
    <link href="/images/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--ͷ��-->
<div id="login_headbox">
    <div id="login_head">
        <div id="login_logo"><a href="/"><img src="/images/mlogo.jpg" /></a></div>
        <div class="logintext"><span class="l_fc1">�Ƹ����ߣ�</span><strong class="l_fc2">400-110-119</strong>( ����ʱ����һ������9:00-18:00 )</div>
    </div>
</div>
<!--ͷ�� end-->
<div style="margin: 30px auto; width: 960px;">
<table style="border: 1px #ccc solid">
    <tr>
    <td>
        <strong>[��֤��/����]�����֪:</strong>
            ���û��˻��Ľ��շ�ʽ����������,�ôα��������Ҫ�ȴ�30���Ӳ�����Ч,
            �������������շ�ʽ���۸ĵ�����벻�ؾ���,ֻ��Ҫ��30��������ɽ��������������<br />
        <strong>������������Ĺ��ܰ�����Щ?</strong><br />
        1: �����޸��û���[��֤��/����]���շ�ʽΪ���۸�֮ǰ��״̬<br />
        2: ��ֹ���û������κ�[��֤��/����]����Ϊ,ֱ���û���ͷ��˶������Ϣ��,��ϵ��վ������ԱΪ������쳣״̬Ϊֹ.<br />
    </td>

<td style="border: 1px #ccc solid; width: 400px; padding: 50px;">
<form action="" method="post" enctype="application/x-www-form-urlencoded">
    �û���:<input type="text" name="username" /> <br /><br />
    У����:<input type="text" name="code" /> <br /><br />
    ��֤��:<input style="width: 80px;" name="valicode" type="text" class="index_input2" />
    <a href="#" class="p_ico">
        <img id='valimg' src="/plugins/index.php?q=imgcode" alt="���ˢ��"
             onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();"
             align="absmiddle"
             style="cursor:pointer;height:26px;width:66px;"/>
    </a><br /><br />
    <input type="submit" name="sub" value="ȷ���ύ" />
</form>
    <div style="font-weight: bold; color: red; font-size: 18px;">
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-26
 * Time: ����3:12
 */
session_start();
if (isset($_POST['sub'])) {
    include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
    if (!isset($_SESSION['valicode']) || empty($_POST['valicode'])) {
        $_SESSION['valicode'] = getRandCode();
        die('��������ȷ��ͼ����֤��');
    }
    if ($_SESSION['valicode'] !== $_POST['valicode']) {
        $_SESSION['valicode'] = getRandCode();
        die('ͼ����֤�����!');
    }

    $code   = intval($_POST['code']);

    $where  = array(
        'username' => trim($_POST['username'],' ')
    );

    $result = $db->find('user')->fields('*')->where('`username`=:username', $where)->go();
    if ($result) {
        $user_id = $result['user_id'];
    } else {
        $_SESSION['valicode'] = getRandCode();
        die('�����ڸ��û�');
    }


    $sql = "SELECT * FROM `previous_mobile_setting` WHERE `user_id`={$user_id}";
    $res = $db->fetchOneByNormal($sql);

    // ��֤ʱ��
    if ( (time() - $res['change_send_type_verify_update_time']) > (60 * 30)) {
        $_SESSION['valicode'] = getRandCode();
        die('��Ǹ!�����ϴ�������ʱ�����30����,�޷�����');
    }

    if ($res['code'] == 0) {
        $_SESSION['valicode'] = getRandCode();
        die('�Ƿ�����');
    }




    if (intval($res['code']) !== $code) {
        $_SESSION['valicode'] = getRandCode();
        die('��Ǹ!�������У���벻��ȷ');
    } else {
        // �޸�setting����Ϣ
        if ($res['send_type'] == 1) {
            $send_type = 0;
        } else {
            $send_type = 1;
        }
        $sql = "UPDATE `previous_mobile_setting` SET `change_send_type_status`=1,`change_send_type_in_process`=0,`send_type`={$send_type} WHERE `user_id`={$user_id}";
        $res = $db->executeDMLByNormal($sql);
        if ($res) {
            echo '��ϲ!�����ɹ�,������ע���˻���ȫ,�޸���վ��¼����,�����¼����,�ȵ���Ϣ,ȷ�ϲ�����ɺ�,��ϵ����ԱΪ������ʺ��쳣״̬';
        } else {
            echo '��Ǹ!����δ֪����,���β���ʧ��,����ϵͳ����Ա��ϵ���������';
        }
    }
    $_SESSION['valicode'] = getRandCode();
}
?>
        </div>
    </div>
</td>
</tr>
</table>
<!--�ײ� end-->
</body>
</html>