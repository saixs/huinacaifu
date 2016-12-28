<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
//include_once("remind.class.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
$url = $_U['query_url']."/{$_U['query_type']}";
if ($_U['query_type'] == "list"){
    if (isset($_POST['sub'])) {
        $sendObj = new sendMessage(0,$_SESSION['user_id'],'item_switch_verify');
        $sendObj->getReceiveTeam();
        if ($sendObj->errorInfo === '') {
            $status = $sendObj->verifyCodeCheck($_POST['verifyCode'], $_SESSION['user_id']);
            if ($status === 1) {
                $result = $sendObj->updateSetting($_SESSION['user_id']);
                if ($result) {
                    $msg=array("恭喜![验证码/提醒]接收项变更成功!","","/index.php?user&q=code/remind");
                } else {
                    $msg=array("抱歉![验证码/提醒]接收项变更失败,或者新设置较之前旧设置没有任何更改","","/index.php?user&q=code/remind");
                }
            } else {
                $msg=array("抱歉![验证码/提醒]接收项变更失败:".$sendObj->verifyResultName($status),"","/index.php?user&q=code/remind");
            }
        } else {
            $msg=array("抱歉![验证码/提醒]接收项变更失败:".$sendObj->errorInfo,"","/index.php?user&q=code/remind");
        }
    } else {
        $result = sendMessage::getSetting($_G['user_id']);
        $magic->assign('list', $result);
    }
}elseif ($_U['query_type'] == 'send_type'){
    if (isset($_POST['sub'])) {
        $sendObj = new sendMessage(0,$_SESSION['user_id'],'change_send_type_verify');
        $sendObj->getReceiveTeam();
        if ($sendObj->errorInfo === '') {
            $status = $sendObj->verifyCodeCheck($_POST['verifyCode'], $_SESSION['user_id']);
            if ($status === 1) {
                $result = $sendObj->changeSendType($_SESSION['user_id'], intval($_POST['send_type']));
                if ($result === '') {
                    $msg=array("恭喜![验证码/提醒]接收方式修改成功!","","/index.php?user&q=code/remind/send_type");
                } else {
                    $msg=array($result,"","/index.php?user&q=code/remind/send_type");
                }
            } else {
                $msg=array("抱歉![验证码/提醒]接收方式修改失败:".$sendObj->verifyResultName($status),"","/index.php?user&q=code/remind/send_type");
            }
        } else {
            $msg=array("抱歉![验证码/提醒]接收方式修改失败:".$sendObj->errorInfo,"","/index.php?user&q=code/remind/send_type");
        }
    } else {
        $result = sendMessage::getSetting($_G['user_id']);
        $magic->assign('list', $result);
    }
} else {
    $msg = array("您的操作有误","",$url);
}

$template = "user_remind.html";
?>
