<?php

if (!defined('ROOT_PATH'))
    die('不能访问'); //防止直接访问
include_once("debt.class.php");
include_once(ROOT_PATH . "modules/account/account.class.php");
//可以转让的债权
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
//出让债权
} elseif ($_U['query_type'] == "debtalter") {
    global $_G;
    $tid = isset($_POST['tender_id']) ? intval($_POST['tender_id']) : 0;
    $dicount = round($_POST['discount'], 2);
    if ($dicount >= 100 || $dicount <= 0) {
        $msg = array("数据非法：转让折扣不能大于100%或小于0", "", "/index.php?user&q=code/debt/debting");
    } else if (0 == $tid) {
        $msg = array("债权数据非法", "", "/index.php?user&q=code/debt/debting");
    } else {
        $tender = borrowClass::GetTenderOne(array('id' => $tid));
        //处理非法输入
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
                $msg = array("你的债权转让成功，等待他人购买中", "", "/index.php?user&q=code/debt/debt_move");
            } else {
                $msg = array("转让出错，可能是因为已经转让过了", "", "/index.php?user&q=code/debt/debting");
            }
        } else {
            $msg = array("数据非法：债权不存在或非你本人所有", "", "/index.php?user&q=code/debt/debting");
        }
    }

//正在转让的债权
} elseif ($_U['query_type'] == "debt_move") {
//购买债权    
} elseif ($_U['query_type'] == "debt_buy") {
    global $_G;
    $did = (int) $_GET['did'];
    $touser = $_G['user_id'];
    $debt = debtClass::getDebtOne($did);
    $borrow = borrowClass::GetOne(array('id' => $debt['borrow_id']));
    if ($debt['user_id'] == $touser) {
        $msg = array("不能购买你自己转让的债权哦", "", "/index.php?user&q=code/debt/debt_move");
    } else if ($borrow['user_id'] == $touser) {
        $msg = array("你是原始借款人，不能受让债权", "", "/index.php?user&q=code/debt/debt_move");
    } else {
        $data = array('user_id' => $touser);
        $ret = debtClass::getOneAccount($data);
        if ($ret['use_money'] < $debt['tomoney']) {
            $msg = array("你当前余额不够买入债权", "", "/index.php?user&q=code/debt/debt_move");
        } else {
            $debt['touser'] = $touser;
            $debt['status'] = 2;
            debtClass::debtBuy($debt);
            debtClass::updateDebt($debt);
            $msg = array("债权购买成功", "", "/index.php?user&q=code/debt/buy_success");
        }
    }
} else {
    
}
$template = "user_debt.html";
?>
