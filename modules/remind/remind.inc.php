<?php
if (!defined('ROOT_PATH'))  die('���ܷ���');//��ֱֹ�ӷ���
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
                    $msg=array("��ϲ![��֤��/����]���������ɹ�!","","/index.php?user&q=code/remind");
                } else {
                    $msg=array("��Ǹ![��֤��/����]��������ʧ��,���������ý�֮ǰ������û���κθ���","","/index.php?user&q=code/remind");
                }
            } else {
                $msg=array("��Ǹ![��֤��/����]��������ʧ��:".$sendObj->verifyResultName($status),"","/index.php?user&q=code/remind");
            }
        } else {
            $msg=array("��Ǹ![��֤��/����]��������ʧ��:".$sendObj->errorInfo,"","/index.php?user&q=code/remind");
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
                    $msg=array("��ϲ![��֤��/����]���շ�ʽ�޸ĳɹ�!","","/index.php?user&q=code/remind/send_type");
                } else {
                    $msg=array($result,"","/index.php?user&q=code/remind/send_type");
                }
            } else {
                $msg=array("��Ǹ![��֤��/����]���շ�ʽ�޸�ʧ��:".$sendObj->verifyResultName($status),"","/index.php?user&q=code/remind/send_type");
            }
        } else {
            $msg=array("��Ǹ![��֤��/����]���շ�ʽ�޸�ʧ��:".$sendObj->errorInfo,"","/index.php?user&q=code/remind/send_type");
        }
    } else {
        $result = sendMessage::getSetting($_G['user_id']);
        $magic->assign('list', $result);
    }
} else {
    $msg = array("���Ĳ�������","",$url);
}

$template = "user_remind.html";
?>
