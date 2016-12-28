<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>[验证码/提醒]接收方式变更紧急处理页面</title>
    <link href="/images/valid_style.css" rel="stylesheet" type="text/css" />
    <link href="/images/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--头部-->
<div id="login_headbox">
    <div id="login_head">
        <div id="login_logo"><a href="/"><img src="/images/mlogo.jpg" /></a></div>
        <div class="logintext"><span class="l_fc1">财富热线：</span><strong class="l_fc2">400-110-119</strong>( 工作时间周一至周五9:00-18:00 )</div>
    </div>
</div>
<!--头部 end-->
<div style="margin: 30px auto; width: 960px;">
<table style="border: 1px #ccc solid">
    <tr>
    <td>
        <strong>[验证码/提醒]变更需知:</strong>
            当用户账户的接收方式被申请变更后,该次变更请求需要等待30分钟才能生效,
            因此如果发生接收方式被篡改的情况请不必惊慌,只需要在30分钟内完成紧急处理操作即可<br />
        <strong>紧急处理操作的功能包括哪些?</strong><br />
        1: 可以修改用户的[验证码/提醒]接收方式为被篡改之前的状态<br />
        2: 终止向用户发送任何[验证码/提醒]的行为,直到用户与客服核对清楚信息后,联系网站技术人员为您解除异常状态为止.<br />
    </td>

<td style="border: 1px #ccc solid; width: 400px; padding: 50px;">
<form action="" method="post" enctype="application/x-www-form-urlencoded">
    用户名:<input type="text" name="username" /> <br /><br />
    校检码:<input type="text" name="code" /> <br /><br />
    验证码:<input style="width: 80px;" name="valicode" type="text" class="index_input2" />
    <a href="#" class="p_ico">
        <img id='valimg' src="/plugins/index.php?q=imgcode" alt="点击刷新"
             onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();"
             align="absmiddle"
             style="cursor:pointer;height:26px;width:66px;"/>
    </a><br /><br />
    <input type="submit" name="sub" value="确认提交" />
</form>
    <div style="font-weight: bold; color: red; font-size: 18px;">
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-26
 * Time: 下午3:12
 */
session_start();
if (isset($_POST['sub'])) {
    include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
    if (!isset($_SESSION['valicode']) || empty($_POST['valicode'])) {
        $_SESSION['valicode'] = getRandCode();
        die('请输入正确的图像验证码');
    }
    if ($_SESSION['valicode'] !== $_POST['valicode']) {
        $_SESSION['valicode'] = getRandCode();
        die('图像验证码错误!');
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
        die('不存在该用户');
    }


    $sql = "SELECT * FROM `previous_mobile_setting` WHERE `user_id`={$user_id}";
    $res = $db->fetchOneByNormal($sql);

    // 验证时间
    if ( (time() - $res['change_send_type_verify_update_time']) > (60 * 30)) {
        $_SESSION['valicode'] = getRandCode();
        die('抱歉!距离上次申请变更时间大于30分钟,无法处理');
    }

    if ($res['code'] == 0) {
        $_SESSION['valicode'] = getRandCode();
        die('非法操作');
    }




    if (intval($res['code']) !== $code) {
        $_SESSION['valicode'] = getRandCode();
        die('抱歉!您输入的校检码不正确');
    } else {
        // 修改setting表信息
        if ($res['send_type'] == 1) {
            $send_type = 0;
        } else {
            $send_type = 1;
        }
        $sql = "UPDATE `previous_mobile_setting` SET `change_send_type_status`=1,`change_send_type_in_process`=0,`send_type`={$send_type} WHERE `user_id`={$user_id}";
        $res = $db->executeDMLByNormal($sql);
        if ($res) {
            echo '恭喜!操作成功,提醒您注意账户安全,修改网站登录密码,邮箱登录密码,等等信息,确认操作完成后,联系管理员为您解除帐号异常状态';
        } else {
            echo '抱歉!发生未知错误,本次操作失败,请与系统管理员联系解决此问题';
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
<!--底部 end-->
</body>
</html>