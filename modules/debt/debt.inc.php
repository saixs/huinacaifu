<?php

if (!defined('ROOT_PATH'))
    die('���ܷ���'); //��ֱֹ�ӷ���
include_once("debt.class.php");
include_once(ROOT_PATH . "modules/account/account.class.php");
//����ת�õ�ծȨ
if ($_U['query_type'] == "debting") {
    $data['page'] = $_U['page'];
    $data['epage'] = 20;
    global $_G;
    $data['user_id'] = $_G['user_id'];
    $data['debt'] = 0;
    $ret = debtClass::getDebtingList($data);
    if (is_array($ret)) {
        $pages->set_data($ret);
        $_U['dlist'] = $ret['list'];
        $_U['showpage'] = $pages->show(3);
    }
//����ծȨ
} elseif ($_U['query_type'] == "debtalter") {
    global $_G;
    $tid = isset($_POST['tender_id']) ? intval($_POST['tender_id']) : 0;
    $dicount = round($_POST['discount'], 2);
    if ($dicount >= 100 || $dicount <= 0) {
        $msg = array("���ݷǷ���ת���ۿ۲��ܴ���100%��С��0", "", "/index.php?user&q=code/debt/debting");
    } else if (0 == $tid) {
        $msg = array("ծȨ���ݷǷ�", "", "/index.php?user&q=code/debt/debting");
    } else {
        $tender = borrowClass::GetTenderOne(array('id' => $tid));
        //����Ƿ�����
        if (!empty($tender) && $tender['user_id'] == intval($_G['user_id'])) {
            $data['status'] = 1;
            $data['tender_id'] = $tid;
            $data['user_id'] = $_G['user_id'];
            debtClass::debtAlter($data);

            $dataX['status'] = 1;
            $dataX['tender_id'] = (int) $tid;
            $dataX['user_id'] = $_G['user_id'];
            $dataX['touser'] = 0;
            $dataX['money'] = $tender['account'];
            $dataX['borrow_id'] = $tender['borrow_id'];
            $dataX['interest'] = $tender['interest'];
            $dataX['discount'] = $dicount;
            $dataX['tomoney'] = round($tender['account'] * $dataX['discount'] / 100, 2);
            $ret = debtClass::AddDebt($dataX);
            if ($ret) {
                $msg = array("���ծȨת�óɹ����ȴ����˹�����", "", "/index.php?user&q=code/debt/debt_move");
            } else {
                $msg = array("ת�ó�����������Ϊ�Ѿ�ת�ù���", "", "/index.php?user&q=code/debt/debting");
            }
        } else {
            $msg = array("���ݷǷ���ծȨ�����ڻ���㱾������", "", "/index.php?user&q=code/debt/debting");
        }
    }

//����ת�õ�ծȨ
} elseif ($_U['query_type'] == "debt_move") {
//����ծȨ    
} elseif ($_U['query_type'] == "debt_buy") {
    global $_G;
    $did = (int) $_GET['did'];
    $touser = $_G['user_id'];
    $debt = debtClass::getDebtOne($did);
    $borrow = borrowClass::GetOne(array('id' => $debt['borrow_id']));
    if ($debt['user_id'] == $touser) {
        $msg = array("���ܹ������Լ�ת�õ�ծȨŶ", "", "/index.php?user&q=code/debt/debt_move");
    } else if ($borrow['user_id'] == $touser) {
        $msg = array("����ԭʼ����ˣ���������ծȨ", "", "/index.php?user&q=code/debt/debt_move");
    } else {
        $data = array('user_id' => $touser);
        $ret = debtClass::getOneAccount($data);
        if ($ret['use_money'] < $debt['tomoney']) {
            $msg = array("�㵱ǰ��������ծȨ", "", "/index.php?user&q=code/debt/debt_move");
        } else {
            $debt['touser'] = $touser;
            $debt['status'] = 2;
            debtClass::debtBuy($debt);
            debtClass::updateDebt($debt);
            $msg = array("ծȨ����ɹ�", "", "/index.php?user&q=code/debt/buy_success");
        }
    }
} else {
    
}
$template = "user_debt.html";
?>
