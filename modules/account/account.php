<?
if (!defined('ROOT_PATH'))
    die('���ܷ���'); //��ֱֹ�ӷ���
check_rank("account_" . $_A['query_type']); //���Ȩ��

include_once("account.class.php");

$_A['list_purview'] = array("account" => array("�˺��ʽ����" => array("account_list" => "��Ϣ�б�", "account_bank" => "�����ʻ�", "account_cash" => "���ּ�¼", "account_recharge" => "��ֵ��¼", "account_log" => "�ʽ��¼"))); //Ȩ��
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>�ʻ���Ϣ�б�</a> - <a href='{$_A['query_url']}/cash&status=0{$_A['site_url']}'>��������</a> - <a href='{$_A['query_url']}/cash&status=1{$_A['site_url']}'>���ֳɹ�</a> -  - <a href='{$_A['query_url']}/cash&status=2{$_A['site_url']}'>����ʧ��</a> - <a href='{$_A['query_url']}/recharge{$_A['site_url']}'>��ֵ��¼</a>  -<a href='{$_A['query_url']}/recharge&status=1{$_A['site_url']}'>��ֵ�ɹ�</a>  -  <a href='{$_A['query_url']}/recharge_ver{$_A['site_url']}'>��ֵ�˲�</a>  - <a href='{$_A['query_url']}/log{$_A['site_url']}'>�ʽ��¼</a> - <a href='{$_A['query_url']}/recharge_new{$_A['site_url']}'>��ӳ�ֵ</a> - <a href='{$_A['query_url']}/deduct{$_A['site_url']}'>�۳�����</a>- <a href='{$_A['query_url']}/everyday{$_A['site_url']}'>ÿ�ն���</a>- <a href='{$_A['query_url']}/fundy{$_A['site_url']}'>�ʽ�ƽ��</a>-<a href='{$_A['query_url']}/sumlog{$_A['site_url']}'>�ʽ�������</a>";


/**
 * �������Ϊ�յĻ�����ʾ���е��ļ��б�
 * */
if ($_A['query_type'] == "list") {
    $_A['list_title'] = "�ʻ���Ϣ�б�";

    if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != "") {
        $data['user_id'] = $_REQUEST['user_id'];
    }

    if (isset($_REQUEST['username']) && $_REQUEST['username'] != "") {
        if (isset($_REQUEST['username'])) {
            //$data['username'] = $_REQUEST['username'];
            $data['username'] = urldecode($_REQUEST['username']);
            $data['username'] = iconv("UTF-8", "GB2312", $data['username']);
        }
    }
    if (isset($_REQUEST['type']) && $_REQUEST['type'] != "") {
        $data['type'] = $_REQUEST['type'];
        $data['amount'] = $_REQUEST['amountm'];
    }
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetList($data);

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
        if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
            $title = array("���", "ID", "�û���", "��ʵ����", "�����", "�������", "������", "���ս��");
            $data['limit'] = "all";
            $result = accountClass::GetList($data);

            foreach ($result as $key => $value) {


                $_data[$key] = array($key + 1, $value['user_id'], $value['username'], $value['realname'], $value['total'], $value['use_money'], $value['no_use_money'], $value['collection']);
            }
            exportData("�ʻ���Ϣ�б�", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}
elseif ($_A['query_type'] == "borrower_account") {
    $_A['list_title'] = "������˻���Ϣ";

    if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != "") {
        $data['user_id'] = $_REQUEST['user_id'];
    }

    if (isset($_REQUEST['username']) && $_REQUEST['username'] != "") {
        if (isset($_REQUEST['username'])) {
            //$data['username'] = $_REQUEST['username'];
            $data['username'] = urldecode($_REQUEST['username']);
            $data['username'] = iconv("UTF-8", "GB2312", $data['username']);
        }
    }
    if (isset($_REQUEST['type']) && $_REQUEST['type'] != "") {
        $data['type'] = $_REQUEST['type'];
        $data['amount'] = $_REQUEST['amountm'];
    }
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetBorrowerList($data);

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
        if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
            $title = array("���", "ID", "�û���", "��ʵ����", "�����", "�������", "������", "���ս��");
            $data['limit'] = "all";
            $result = accountClass::GetBorrowerList($data);

            foreach ($result as $key => $value) {


                $_data[$key] = array($key + 1, $value['user_id'], $value['username'], $value['realname'], $value['total'], $value['use_money'], $value['no_use_money'], $value['collection']);
            }
            exportData("�ʻ���Ϣ�б�", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}


/**
 * ���ּ�¼
 * */ elseif ($_A['query_type'] == "cash") {
    $_A['list_title'] = "���ּ�¼";

    if (isset($_REQUEST['user_id'])) {
        $data['user_id'] = $_REQUEST['user_id'];
    }

    if (isset($_REQUEST['username'])) {
        if (isset($_REQUEST['username'])) {
            //$data['username'] = $_REQUEST['username'];
            $data['username'] = urldecode($_REQUEST['username']);
            $data['username'] = iconv("UTF-8", "GB2312", $data['username']);
        }
    }
    if (isset($_REQUEST['status']) && $_REQUEST['status'] != "") {
        $data['status'] = $_REQUEST['status'];
    }
    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("Id", "�û�����", "��ʵ����", "�����˺�", "��������", "֧��", "�����ܶ�", "���˽��", "������", "����ʱ��", "״̬");
        $data['limit'] = "all";
        if (isset($_REQUEST['start_ts'])) {
            $data['start_ts'] = strtotime($_REQUEST['start_ts'] . " 00:00:00");
        }
        if (isset($_REQUEST['end_ts'])) {
            $data['end_ts'] = strtotime($_REQUEST['end_ts'] . " 23:59:59");
        }
        $result = accountClass::GetCashList($data);
        foreach ($result as $key => $value) {
            if ($value["status"] == 1) {
                $state = "���ͨ��";
            } elseif ($value["status"] == 0) {
                $state = "������";
            } elseif ($value["status"] == 2) {
                $state = "����ܾ�";
            }

            $_data[$key] = array($key + 1, $value['username'], $value['realname'], $value['account'], $value['bank_name'], $value['branch'], $value['total'], $value['credited'], $value['fee'], date("Y-m-d H:i", $value['addtime']), $state);
        }
        exportData("�����б�", $title, $_data);
        exit;
    }
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetCashList($data);

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_cash_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
}

/**
 * ���ּ�¼
 * */ elseif ($_A['query_type'] == "everyday") {
    $_A['list_title'] = "ÿ�ն���";


    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("Id", "����", "��ֵ���", "���ֶ��", "��Ϣ�����", "vip��", "���������", "ʵ����֤��");
        $data['limit'] = "all";
        $result = accountClass::GetEveryDay($data);
        foreach ($result as $key => $value) {


            $_data[$key] = array($value['id'], $value['everydate'], $value['chongzhi'], $value['tixian'], $value['lxmanage'], $value['vipfee'], $value['borrowfee'], $value['realfee']);
        }
        exportData("ÿ�ն���", $title, $_data);
        exit;
    }
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetEveryDay($data);
    $_A['account_day'] = $result;
    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_day'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
}
/**
 * �ʽ��¼����
 * */ elseif ($_A['query_type'] == "sumlog") {
    $_A['list_title'] = "�ʽ��¼����";


    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("���", "����", "�ܶ�", "��ʾ");
        $data['limit'] = "all";
        $result = accountClass::GetSumLog($data);
        foreach ($result as $key => $value) {


            $_data[$key] = array($key, $value['name'], $value['summoney'], $value['type']);
        }
        exportData("�ʽ��¼����", $title, $_data);
        exit;
    }
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetSumLog($data);
    $_A['account_day'] = $result;
    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_day'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
}
/**
 * �ʽ�ƽ��
 * */ elseif ($_A['query_type'] == "fundy") {
    $_A['list_title'] = "�ʽ�ƽ��";


    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("Id", "�����ܽ��", "+�����ܽ��", "+vip��", "+���������", "+��Ϣ���", "+ʵ����֤��", "-ϵͳ����", "+������Ϣ�۳�", "+�渶���û�����", "+���ڿۿ�", "-����ϵͳ����", "==��ֵ", "-����");
        $data['limit'] = "all";
        $result = accountClass::getFundy();
        foreach ($result as $key => $value) {


            $_data[$key] = array(1, $value['k_money'], $value['n_money'], $value['vip'], $value['borrow_fee'], $value['tender_mange'], $value['real_fee'], $value['system_repayment'], $value['late_rate'], $value['df_repayment'], $value['late_repayment'], $value['late_collection'], $value['recharge'], $value['recharge_success']);
        }
        exportData("�ʽ�ƽ��", $title, $_data);
        exit;
    }
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::getFundy();
    $_A['account_fundy'] = $result;
    if (is_array($result)) {
        
    } else {
        $msg = array($result);
    }
}

/**
 * ������˲鿴
 * */ elseif ($_A['query_type'] == "cash_view") {
    $_A['list_title'] = "������˲鿴";
    if (isset($_POST['id'])) {
        $var = array("id", "status", "credited", "fee", "verify_remark");
        $data = post_var($var);
        $result = accountClass::GetCashOne(array("id" => $data['id'], "user_id" => $_POST['user_id']));
        $remind_time = $result['addtime'];
        $remind_check_status = $result['status'];
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        if ($data['status'] == 1 && $result['status'] != $data['status']) {
            $account_result = accountClass::GetOne(array("user_id" => $_POST['user_id']));
            $log['user_id'] = $_POST['user_id'];
            $log['type'] = "recharge_success";
            $log['money'] = $_POST['credited'];
            $log['total'] = $account_result['total'] - $log['money'];
            $log['use_money'] = $account_result['use_money'];
            $log['no_use_money'] = $account_result['no_use_money'] - $log['money'];
            $log['collection'] = $account_result['collection'];
            $log['to_user'] = "0";
            $log['remark'] = "���ֳɹ�";
            $result = accountClass::AddLog($log);
            //��������������ʽ��¼
            $log1['user_id'] = $log['user_id'];
            $log1['type'] = "recharge_fee";
            $log1['money'] = $_POST['fee'];
            $log1['total'] = $log['total'] - $log1['money'];
            $log1['use_money'] = $log['use_money'];
            $log1['no_use_money'] = $log['no_use_money'] - $log1['money'];
            $log1['collection'] = $log['collection'];
            $log1['to_user'] = "0";
            $log1['remark'] = "����������";
            $result = accountClass::AddLog($log1);

            //��������
            $remind['nid'] = "cash_yes";
            $remind['sent_user'] = "0";
            $remind['receive_user'] = $_POST['user_id'];
            $remind['title'] = "����{$log['total']}Ԫ�ѳɹ�";
            $remind['content'] = "���Ѿ���" . date("Y-m-d", time()) . "�ɹ�������{$log['total']}Ԫ";
            $remind['type'] = "cash";
            remindClass::sendRemind($remind);
        } elseif ($data['status'] == 2) {
            $account_result = accountClass::GetOne(array("user_id" => $_POST['user_id']));
            $log['user_id'] = $_POST['user_id'];
            $log['type'] = "recharge_false";
            $log['money'] = $result['total'];
            $log['total'] = $account_result['total'];
            $log['use_money'] = $account_result['use_money'] + $log['money'];
            $log['no_use_money'] = $account_result['no_use_money'] - $log['money'];
            $log['collection'] = $account_result['collection'];
            $log['to_user'] = "0";
            $log['remark'] = "����ʧ��";
            $result = accountClass::AddLog($log);


            //��������
            $remind['nid'] = "cash_no";
            $remind['sent_user'] = "0";
            $remind['receive_user'] = $_POST['user_id'];
            $remind['title'] = "����{$log['total']}Ԫʧ��";
            $remind['content'] = date("Y-m-d", time()) . "����{$log['total']}Ԫʧ��";
            $remind['type'] = "cash";
            remindClass::sendRemind($remind);
        }
        $data['verify_userid'] = $_G['user_id'];
        $data['verify_time'] = time();
        $data['user_id'] = $_POST['user_id'];
        $result = accountClass::UpdateCash($data);

        // ��������
        if ($data['status'] == 1 && $remind_check_status != $data['status']) {
            $sendObj = new sendMessage(0,$_POST['user_id'],'withdraw_success_remind');
            $sendObj->getReceiveTeam();
            $content = '����һ����'.date('Y-m-d H:i', $remind_time).'���ύ���ܶ�Ϊ:'.$log['money'].'Ԫ�����������Ѿ�ͨ�����,��ȡ����������'.$log1['money'].'Ԫ,Ԥ�ڽ���һСʱ�ڴ������������˻�,��ע�����,�����κ���������������ϵ';
            $sendObj->send($content);
        } elseif ($data['status'] == 2) {
            $sendObj = new sendMessage(0,$_POST['user_id'],'withdraw_failed_remind');
            $sendObj->getReceiveTeam();
            $content = '����һ����'.date('Y-m-d H:i', $remind_time).'���ύ���ܶ�Ϊ:'.$log['money'].'Ԫ�����������Ѿ����ܾ�,�����κ���������������ϵ';
            $sendObj->send($content);
        }

        if ($result !== true) {
            $msg = array($result);
        } else {
            $msg = array("�����ɹ�", "", $_A['query_url'] . "/cash" . $_A['site_url']);
        }

        $user->add_log($_log, $result); //��¼����
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['account_cash_result'] = accountClass::GetCashOne($data);
    }
}

/**
 * �˺ų�ֵ
 * */ elseif ($_A['query_type'] == "recharge_view") {
    $_A['list_title'] = "��ֵ�鿴";
    if (isset($_POST['id'])) {
        $var = array("id", "status", "verify_remark");
        $data = post_var($var);
        $result = accountClass::GetRechargeOne(array("id" => $_POST['id']));
        if ($result['status'] != 0) {
            $msg = array("�˳�ֵ�Ѿ���ˣ��벻Ҫ�ظ���ˡ�");
        } else {
            include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
            if ($data['status'] == 1) {

                $data['verify_userid'] = $_G['user_id'];
                $data['verify_time'] = time();
                $resultr = accountClass::UpdateRecharge($data);
                if ($resultr == 1) {
                    $account_result = accountClass::GetOne(array("user_id" => $result['user_id']));
                    $log['user_id'] = $result['user_id'];
                    $log['type'] = "recharge";
                    $log['money'] = $result['money'];
                    $log['total'] = $account_result['total'] + $result['money'];
                    $log['use_money'] = $account_result['use_money'] + $result['money'];
                    $log['no_use_money'] = $account_result['no_use_money'];
                    $log['collection'] = $account_result['collection'];
                    $log['to_user'] = "0";
                    $log['remark'] = "�˺ų�ֵ��̨���";
                    accountClass::AddLog($log);

                    //if($result['fee']!=0){
                    if (isset($_G['system']['con_recharge_fee']) && $result['money'] >= 5000 && $result['payment'] != 48 && $result['payment'] != 42 && $_G['user_result']['scene_status'] != 1 && 1 != 1) {
                        $account_result = accountClass::GetOne(array("user_id" => $result['user_id']));
                        $log['user_id'] = $result['user_id'];
                        $log['type'] = "fee";
                        $log['money'] = $result['money'] * $_G['system']['con_recharge_fee'];
                        $log['total'] = $account_result['total'] + $log['money'];
                        $log['use_money'] = $account_result['use_money'] + $log['money'];
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = "0";
                        $log['remark'] = "���³�ֵ����";
                        accountClass::AddLog($log);
                    }

                    //�ж�vip��Ա���Ƿ�۳�
                    accountClass::AccountVip(array("user_id" => $result['user_id']));


                    //��������
                    $remind['nid'] = "recharge";
                    $remind['sent_user'] = "0";
                    $remind['receive_user'] = $result['user_id'];
                    $remind['title'] = "��ֵ{$result['money']}Ԫ�ѳɹ�";
                    $remind['content'] = "���Ѿ���" . date("Y-m-d", time()) . "�ɹ���ֵ{$result['money']}Ԫ";
                    $remind['type'] = "recharge";
                    remindClass::sendRemind($remind);

                    $sendObj = new sendMessage(0,$result['user_id'],'offline_recharge_success_remind');
                    $sendObj->getReceiveTeam();
                    $content = '����һ����'.date('Y-m-d H:i', $result['addtime']).'���ύ��:'.$result['money'].'Ԫ�ĳ�ֵ�Ѿ�ͨ�����,�����κ���������������ϵ';
                    $sendObj->send($content);
                }
            } elseif ($data['status'] == 2) {
                $data['verify_userid'] = $_G['user_id'];
                $data['verify_time'] = time();
                $resultr = accountClass::UpdateRecharge($data);
                if ($resultr == 1) {
                    //��������
                    $remind['nid'] = "recharge";
                    $remind['sent_user'] = "0";
                    $remind['receive_user'] = $result['user_id'];
                    $remind['title'] = "��ֵ{$result['money']}Ԫʧ��";
                    $remind['content'] = date("Y-m-d", time()) . "��ֵ{$result['money']}Ԫ���ʧ��";
                    $remind['type'] = "recharge";
                    remindClass::sendRemind($remind);

                    $sendObj = new sendMessage(0,$result['user_id'],'offline_recharge_failed_remind');
                    $sendObj->getReceiveTeam();
                    $content = '����һ����'.date('Y-m-d H:i', $result['addtime']).'���ύ��:'.$result['money'].'Ԫ�ĳ�ֵ�Ѿ����ܾ�,�����κ���������������ϵ';
                    $sendObj->send($content);
                }
            }



            if ($resultr == 1) {
                $msg = array("�����ɹ�", "", $_A['query_url'] . "/recharge" . $_A['site_url']);
                //$msg = array($resultr);
            } else {
                $msg = array("�����ɹ�", "", $_A['query_url'] . "/recharge" . $_A['site_url']);
            }
        }
        $user->add_log($_log, $result); //��¼����
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['account_recharge_result'] = accountClass::GetRechargeOne($data);
    }
}

/**
 * ��ֵ��¼
 * */ elseif ($_A['query_type'] == "recharge") {
    $_A['list_title'] = "��ֵ��¼";

    if (isset($_REQUEST['user_id'])) {
        $data['user_id'] = $_REQUEST['user_id'];
    }

    if (isset($_REQUEST['username'])) {
        $data['username'] = urldecode($_REQUEST['username']);
        $data['username'] = iconv("UTF-8", "GB2312", $data['username']);
    }

    if (isset($_REQUEST['ordernum'])) {
        $data['trade_no'] = $_REQUEST['ordernum'];
    }
    //---
    if(isset($_REQUEST['start_ts'])&&!empty($_REQUEST['start_ts'])){
         $data['start_ts']=  strtotime(urldecode($_REQUEST['start_ts']));
    }
    if(isset($_REQUEST['end_ts'])&&!empty($_REQUEST['end_ts'])){
         $data['end_ts']= strtotime(urldecode($_REQUEST['end_ts']));
    }
    if(isset($_REQUEST['bank'])&&!empty($_REQUEST['bank'])){
         $data['bank']=urldecode($_REQUEST['bank']);
         $data['bank'] = iconv("UTF-8", "GB2312", $data['bank']);
    }
    if(isset($_REQUEST['money'])&&!empty($_REQUEST['money'])){
         $data['money']=$_REQUEST['money'];
    }
    //----
    if (isset($_REQUEST['status']) && $_REQUEST['status'] != "") {
        $data['status'] = $_REQUEST['status'];
    }

    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetRechargeList($data);

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_recharge_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
        if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
            $title = array("���", "�������", "�û�����", "����", "��������", "��ֵ���", "����", "���˽��", "���ʱ��", "״̬");
            $data['limit'] = "all";
            $result = accountClass::GetRechargeList($data);
            foreach ($result as $key => $value) {
                if ($value['type'] == 1) {
                    $type = "���ϳ�ֵ";
                } else {
                    $type = "���³�ֵ";
                }
                if ($value['payment'] == 0) {
                    $payment = "�ֶ���ֵ";
                    $value['payment_name'] = "�ֶ���ֵ";
                } else {
                    $payment_name = "���³�ֵ";
                }
                if ($value['status'] == 0) {
                    $status = "���";
                } elseif ($value['status'] == 1) {
                    $status = "�ɹ�";
                } else {
                    $status = "ʧ��";
                }

                $_data[$key] = array($key + 1, $value['trade_no'], $value['username'], $type, $value['payment_name'], $value['money'], $value['fee'], $value['total'], date("Y-m-d H:i", $value['verify_time']), $status);
            }
            exportData("��ֵ�б�", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}
/**
 * ��ֵ�˲�
 * */ elseif ($_A['query_type'] == "recharge_ver") {
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetVerificationList($data);
    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_verification_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
}

/**
 * ��ֵ�˲�_�鿴��ϸ
 * */ elseif ($_A['query_type'] == "verification_view") {
    $user_id = $_REQUEST['user_id'];
    $addtime = $_REQUEST['addtime'];
    $sql = "select * from dw_account_log where user_id={$user_id} and addtime = {$addtime}";
    $result = $mysql->db_fetch_arrays($sql);
    if ($result) {
        $_A['account_verification_view'] = $result;
    } else {
        $_A['account_verification_view'] = array();
    }
}

/**
 * ��ֵ��¼
 * */ elseif ($_A['query_type'] == "recharge_new") {
    if (isset($_POST['username']) && $_POST['username'] != "") {
        $_data['username'] = $_POST['username'];
        $result = userClass::GetOnes($_data);
        if ($result == false) {
            $msg = array("�û���������");
        } else {
            $data['user_id'] = $result['user_id'];
            $data['status'] = 0;
            $data['money'] = $_POST['money'];
            $data['type'] == 2;
            $data['payment'] = 0;
            $data['fee'] = 0;
            $data['trade_no'] = time() . $result['user_id'] . rand(1, 9);
            $result = accountClass::AddRecharge($data);
            if ($result !== true) {
                $msg = array($result);
            } else {
                $msg = array("�����ɹ�");
            }
        }
    }
}
/**
 * ���ֳ�ֵ
**/
elseif ($_A['query_type'] == "recharge_integral"){
	include_once(ROOT_PATH."/modules/integral/integral.class.php");
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = userClass::GetOnes($_data);
		if ($result==false){
			$msg = array("�û���������");
		}else{
			$data['user_id'] = $result['user_id'];
			$data['value']   = $_POST['integral'];
			$data['type_id'] = 3;
			$data['remark'] = $_POST['remark'];
			
			$result = integralClass::AddRechargeIntegral($data);
			if (empty($result)){
				$msg = array($result);
			}else{
				//��������
				$remind['nid'] = "recharge_integral";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $result['user_id'];
				$remind['title'] = "{$result['remark']}��û���{$result['value']}��";
				$remind['content'] = "���Ѿ���".date("Y-m-d",time())."��û���{$result['value']}��";
				$remind['type'] = "recharge_integral";
				remindClass::sendRemind($remind);
				$msg = array("�����ɹ�");
			}
		}
	}
}
/**
 * �۳�����
 * */ elseif ($_A['query_type'] == "deduct") {
    if (isset($_POST['username']) && $_POST['username'] != "") {
        $_data['username'] = $_POST['username'];
        $result = userClass::GetOnes($_data);
        if ($result == false) {
            $msg = array("�û���������");
        } elseif (strtolower($_POST['valicode']) != $_SESSION['valicode']) {
            $msg = array("��֤�벻��ȷ");
        } else {
            $result1 = userClass::GetOne($_data);
            if ($result1['use_money'] >= $_POST['money']) {
                $data['user_id'] = $result['user_id'];
                $data['money'] = $_POST['money'];
                $data['type'] = $_POST['type'];
                $data['remark'] = $_POST['remark'];
                $result = accountClass::Deduct($data);

                if ($result !== true) {
                    $msg = array($result);
                } else {
                    $msg = array("�����ѳɹ��۳�", "", $_A['query_url'] . "/deduct");
                    $_SESSION['valicode'] = "";
                }
            } else {
                $msg = array("�˻���Ȳ����ȡ");
            }
        }
    }
}


/**
 * �ʽ�ʹ�ü�¼
 * */ elseif ($_A['query_type'] == "log") {
    $_A['list_title'] = "�ʽ�ʹ�ü�¼";

    if (isset($_REQUEST['user_id'])) {
        $data['user_id'] = $_REQUEST['user_id'];
    }

    if (isset($_REQUEST['username'])) {
        //$data['username'] = $_REQUEST['username'];
        $data['username'] = urldecode($_REQUEST['username']);
        $data['username'] = iconv("UTF-8", "GB2312", $data['username']);
    }

    if (isset($_REQUEST['type'])) {
        $data['type'] = $_REQUEST['type'];
    }

    if (isset($_REQUEST['dotime1'])) {
        $data['dotime1'] = $_REQUEST['dotime1'];
    }

    if (isset($_REQUEST['dotime2'])) {
        $data['dotime2'] = $_REQUEST['dotime2'];
    }
    if(isset($_REQUEST['start_ts'])&&!empty($_REQUEST['start_ts'])){
         $data['start_ts']=  strtotime(urldecode($_REQUEST['start_ts']));
    }
    if(isset($_REQUEST['end_ts'])&&!empty($_REQUEST['end_ts'])){
         $data['end_ts']= strtotime(urldecode($_REQUEST['end_ts']));
    }

    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetLogList($data);
    foreach ($result as $lb) {
        $data_lbl['id'] = $lb['id'];
    }

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['account_log_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
        if (isset($_REQUEST['type1']) && $_REQUEST['type1'] == "excel") {
            $title = array("���ݿ����", "�˵���ˮ��", "�û���", "�ܽ��", "�������", "���ý��", "������", "���ս��", "���׷�", "����ʱ��", "��ע");
            $data['limit'] = "all";
            if (isset($_REQUEST['start_ts'])) {
                $data['start_ts'] = strtotime(urldecode($_REQUEST['start_ts']));
            }
            if (isset($_REQUEST['end_ts'])) {
                $data['end_ts'] = strtotime(urldecode($_REQUEST['end_ts']));
            }
            $result = accountClass::GetLogList($data);
            foreach ($result as $key => $value) {
                // 2012-10-17 �޸���$value['remark'] ԭ�����иô�Ϊ $value['type'] ���µ����ļ�¼���ʽ�ʹ����ĿΪӢ��,remark�ֶ�Ϊ����
                $remark = $result[$key]['remark'];
                $http_host = $_SERVER['HTTP_HOST'];
                $pattern = "/^(.*)\[<a.*(\/invest\/a[0-9]{1,}.html)' target=_blank>(.*)<\/a>(.*)$/i";
                $res = preg_match_all($pattern, $remark, $match_array);
                if ($res) {
                    //$remark = $match_array['1']['0'].'[<a href="http://'.$http_host.$match_array['2']['0'].'" target=_blank>'.$match_array['3']['0'].'</a>'.$match_array['4']['0'];
                }
                $_data[$key] = array($key + 1, $value['id'], $value['username'], $value['total'], $value['money'], $value['use_money'], $value['no_use_money'], $value['collection'], $value['to_username'], date("Y-m-d H:i", $value['addtime']), $remark);
                // 2012-10-17�޸�
                //$_data[$key] = array($key+1,$value['trade_no'],$value['username'],$type,$payment,$value['money'],$value['fee'],$value['total'],date("Y-m-d H:i",$value['addtime']),$status);
            }
            exportData("�ʽ�ʹ�ü�¼", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}


/**
 * �鿴
 * */ elseif ($_A['query_type'] == "view") {
    $_A['list_title'] = "�鿴��֤";
    if (isset($_POST['id'])) {
        $var = array("id", "status", "verify_remark", "jifen");
        $data = post_var($var);
        $data['verify_user'] = $_SESSION['user_id'];
        $result = accountClass::Update($data);

        if ($result !== true) {
            $msg = array($result);
        } else {
            $msg = array("�����ɹ�");
        }
        $user->add_log($_log, $result); //��¼����
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['account_result'] = accountClass::GetOne($data);
    }
} elseif ($_A['query_type'] == "vipTC") {

    $_A['list_title'] = "��ֵ��¼";

    if (isset($_REQUEST['user_id'])) {
        $data['user_id'] = $_REQUEST['user_id'];
    }

    if (isset($_REQUEST['username'])) {
        //$data['username'] = $_REQUEST['username'];
        $data['username'] = urldecode($_REQUEST['username']);
        $data['username'] = iconv("UTF-8", "GB2312", $data['username']);
    }

    if (isset($_REQUEST['ordernum'])) {
        $data['trade_no'] = $_REQUEST['ordernum'];
    }

    if (isset($_REQUEST['status']) && $_REQUEST['status'] != "") {
        $data['status'] = $_REQUEST['status'];
    }

    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::GetvipTC($data);
    $_A['vipTC_list'] = $result;
}elseif($_A['query_type']=="offrecharge"){
    global $_G;
//    $str= urldecode($_REQUEST['start_ts']);
//    var_dump($str);var_dump($_REQUEST);die;
    $_A['list_title'] = "���³�ֵ������ѯ";
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = accountClass::getOffrecharge($data, true);
    if (is_array($result)) {
        $pages->set_data($result);
        foreach($result['list'] as &$value){
            $value['fee']=$value['money']*$_G['system']['con_recharge_fee'];
        }
        $_A['account_orlist'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
        if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
            $title = array("���", "�û�����", "��ʵ����", "���ʱ��", "��ֵ���", "����");
            $data['limit'] = "all";
            if (isset($_REQUEST['start_ts'])) {
                $data['start_ts'] = strtotime(urldecode($_REQUEST['start_ts']));
            }
            if (isset($_REQUEST['end_ts'])) {
                $data['end_ts'] = strtotime(urldecode($_REQUEST['end_ts']));
            }
            $result = accountClass::getOffrecharge($data, true);
            foreach ($result as $key => $value) {
				if ($value['money'] >= 5000) {
					$value['fee']=$value['money']*$_G['system']['con_recharge_fee'];
                	$_data[$key] = array($key + 1, $value['username'], $value['realname'], date('Y-m-d His',$value['verify_time']), $value['money'], $value['fee']);
				}
            }
            exportData("���³�ֵ����", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}



//��ֹ�Ҳ���
else {
    $msg = array("���������벻Ҫ�Ҳ���");
}
?>