<?

if (!defined('ROOT_PATH'))
    die('���ܷ���'); //��ֱֹ�ӷ���
check_rank("borrow_" . $_A['query_type']); //���Ȩ��

include_once("borrow.class.php");

$_A['list_purview'] = array("borrow" => array("������" => array("borrow_list" => "����б�",
            "borrow_new" => "��ӽ��",
            "borrow_edit" => "�༭���",
            "borrow_amount" => "�����",
            "borrow_amount_view" => "��ȹ���",
            "borrow_del" => "ɾ�����",
            "borrow_view" => "��˽��",
            "borrow_full" => "�����б�",
            "borrow_repayment" => "�ѻ���",
            "noborrow_repayment" => "δ����",
            "borrow_liubiao" => "����",
            "borrow_late" => "����",
            "borrow_full_view" => "����鿴")));
//Ȩ��
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>���н��</a> - <a href='{$_A['query_url']}&status=0{$_A['site_url']}'>�������</a> -  <a href='{$_A['query_url']}&status=1{$_A['site_url']}'>�����б��</a> -  <a href='{$_A['query_url']}/full&status=1{$_A['site_url']}'>���������</a> -  <a href='{$_A['query_url']}/full&status=3{$_A['site_url']}'>�������ͨ��</a> - <a href='{$_A['query_url']}/full&status=4{$_A['site_url']}'>$�������δͨ��</a>- <a href='{$_A['query_url']}/repayment{$_A['site_url']}&status=0'>����ƻ�</a>  - <a href='{$_A['query_url']}/repayment{$_A['site_url']}&status=1'>�ѻ���</a>  -  <a href='{$_A['query_url']}/liubiao{$_A['site_url']}'>����</a>  - <a href='{$_A['query_url']}/late{$_A['site_url']}'>����</a>  - <a href='{$_A['query_url']}/amount{$_A['site_url']}'>�����</a> - <a href='{$_A['query_url']}/tongji{$_A['site_url']}'>ͳ��</a>  ";


/**
 * �������Ϊ�յĻ�����ʾ���е��ļ��б�
 * */
if ($_A['query_type'] == "list") {
    $_A['list_title'] = "��Ϣ�б�";
    if (isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
        $data['id'] = array($_REQUEST['id']);
        $data['flag'] = array($_REQUEST['flag']);
        $data['view'] = array($_REQUEST['view']);
        $result = borrowClass::Action($data);
        if ($result == true) {
            $msg = array("�޸ĳɹ�", "", $_A['query_url'] . $_A['site_url']);
        } else {
            $msg = array("�޸�ʧ�ܣ��������Ա��ϵ");
        }
    } else {
        if (isset($_REQUEST['user_id'])) {
            $data['user_id'] = $_REQUEST['user_id'];
        }
        if (isset($_REQUEST['status']) && $_REQUEST['status'] != "") {
            $data['status'] = $_REQUEST['status'];
        }

        if (isset($_REQUEST['username'])) {
            //$data['username'] = $_REQUEST['username'];
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = iconv("UTF-8","GB2312",$data['username']);
        }

        if (isset($_REQUEST['is_vouch'])) {
            $data['is_vouch'] = $_REQUEST['is_vouch'];
        }

        $data['page'] = $_A['page'];
        $data['epage'] = $_A['epage'];
        $result = borrowClass::GetList($data);

        if (is_array($result)) {
            $pages->set_data($result);
            $_A['borrow_list'] = $result['list'];
            $_A['showpage'] = $pages->show(3);
        } else {
            $msg = array($result);
        }
    }
}

/**
 * ��ȹ���
 * */ elseif ($_A['query_type'] == "amount") {
    check_rank("borrow_amount"); //���Ȩ��
    $_A['list_title'] = "��ȹ���";

    if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != "") {
        $data['user_id'] = $_REQUEST['user_id'];
    }

    if (isset($_REQUEST['username']) && $_REQUEST['username'] != "") {
        //$data['username'] = $_REQUEST['username'];
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = iconv("UTF-8","GB2312",$data['username']);
    }

    if (isset($_REQUEST['type']) && $_REQUEST['type'] != "") {
        $data['type'] = $_REQUEST['type'];
    }

    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $result = borrowClass::GetAmountApplyList($data);

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['borrow_amount_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
}

/**
 * ��ȹ���
 * */ elseif ($_A['query_type'] == "amount_view") {
    check_rank("borrow_amount_view"); //���Ȩ��
    $data['id'] = $_REQUEST['id'];
    $result = borrowClass::GetAmountApplyOne($data);
    if (isset($_POST['status'])) {
        $data['user_id'] = $result['user_id'];
        $data['status'] = $_POST['status'];
        $data['type'] = $_POST['type'];
        $data['account'] = $_POST['account'];
        $data['verify_remark'] = $_POST['verify_remark'];
        $result = borrowClass::CheckAmountApply($data);

        if ($result != 1) {
            $msg = array($result);
        } else {
            $msg = array("�����ɹ�", "", $_A['query_url'] . "/amount");
        }
        $user->add_log($_log, $result); //��¼����
    } else {
        if (is_array($result)) {
            $_A['borrow_amount_result'] = $result;
        } else {
            $msg = array($result);
        }
    }
}


/**
 * ���
 * */ elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit") {
    check_rank("borrow_new"); //���Ȩ��
    $_A['list_title'] = "������Ϣ";

    //��ȡ�û�id����Ϣ
    if (isset($_REQUEST['user_id']) && isset($_POST['username'])) {
        if (isset($_POST['user_id']) && $_POST['user_id'] != "") {
            $data['user_id'] = $_POST['user_id'];
            $result = userClass::GetOne($data);
        } elseif (isset($_POST['username']) && $_POST['username'] != "") {
            $data['username'] = $_POST['username'];
            $result = userClass::GetOne($data);
        }
        if ($result == false) {
            $msg = array("�Ҳ������û�");
        } else {
            echo "<script>location.href='" . $_A['query_url'] . "/new&user_id={$result['user_id']}'</script>";
        }
    } elseif (isset($_POST['name'])) {
        $var = array("user_id", "name", "use", "time_limit", "style", "account", "apr", "lowest_account", "most_account", "valid_time", "award", "part_account", "funds", "is_false", "open_account", "open_borrow", "open_tender", "open_credit", "content");
        $data = post_var($var);
        if ($_POST['status'] != 0 || $_POST['status'] != -1) {
            $msg = array("�˱��Ѿ����б�����Ѿ���ɣ������޸�", "", $_A['query_url'] . $_A['site_url']);
        } else {
            if ($_A['query_type'] == "new") {
                $result = borrowClass::Add($data);
            } else {
                $data['id'] = $_POST['id'];
                $result = borrowClass::Update($data);
            }

            if ($result !== true) {
                $msg = array($result);
            } else {
                $msg = array("�����ɹ�", "", $_A['query_url'] . $_A['site_url']);
            }
        }
        $user->add_log($_log, $result); //��¼����
    } elseif ($_A['query_type'] == "edit") {
        $data['user_id'] = $_REQUEST['user_id'];
        $data['id'] = $_REQUEST['id'];
        $result = borrowClass::GetOne($data);
        if (is_array($result)) {
            $_A['borrow_result'] = $result;
        } else {
            $msg = array($result);
        }
    } elseif (isset($_REQUEST['user_id']) && !isset($_POST['username'])) {
        $data['user_id'] = $_REQUEST['user_id'];
        $result = userClass::GetOne($data);
        if ($result == false) {
            $msg = array("������������", "", $_A['query_url']);
        } else {
            $_A['user_result'] = $result;
            //$result = borrowClass::GetOne($data);
            //$_A['borrow_result'] = $result;
        }
    }
}

/**
 * �鿴
 * */ elseif ($_A['query_type'] == "view") {
    check_rank("borrow_view"); //���Ȩ��
    $_A['list_title'] = "�鿴��֤";
    if (isset($_POST['id'])) {
        $var = array("id", "status", "verify_remark");
        $data = post_var($var);
        $data['verify_user'] = $_G['user_id'];
        $data['verify_time'] = time();
        $sql = "UPDATE `{borrow}` SET `in_auto`=1 WHERE `id`={$data['id']}";
        $upd_res = $mysql->db_query($sql);

        $result = borrowClass::Verify($data);

        if ($result == false) {
            $msg = array($result);
        } else {
            //����û��Ķ�̬
            if ($data['status'] == 1) {
                //�Զ�Ͷ��
                $brsql = "select * from `{borrow}` where id ='" . $_POST['id'] . "'";
                $br_row = $mysql->db_fetch_array($brsql);
                if ($br_row['is_mb'] != 1 and $br_row['is_dxb'] != 1 and $br_row['is_vouch'] != 1 and $br_row['is_liuzhuan'] != 1) {
                    $auto['id'] = $data['id'];
                    $auto['user_id'] = $br_row['user_id'];
                    //borrowClass::auto_borrow($auto);
                    //�Զ�Ͷ��
                }
                $_data['user_id'] = $_POST['user_id'];
                $_data['content'] = "�ɹ�������\"<a href=\'/invest/a{$data['id']}.html\' target=\'_blank\'>{$_POST['name']}</a>\"����";
                $result = userClass::AddUserTrend($_data);
            }
            $msg = array("��˲����ɹ�", "", $_A['query_url'] . $_A['site_url']);
        }
        $user->add_log($_log, $result); //��¼����
        $sql = "UPDATE `{borrow}` SET `in_auto`=0 WHERE `id`={$data['id']}";
        $upd_res = $mysql->db_query($sql);
    } else {
        $data['id'] = $_REQUEST['id'];
        $data['user_id'] = $_REQUEST['user_id'];
        $_A['borrow_result'] = borrowClass::GetOne($data);
    }
}


/**
 * ɾ��
 * */ elseif ($_A['query_type'] == "del") {
    check_rank("borrow_del"); //���Ȩ��
    $data['id'] = $_REQUEST['id'];
    $result = borrowClass::Delete($data);
    if ($result !== true) {
        $msg = array($result);
    } else {
        $msg = array("ɾ���ɹ�", "", $_A['query_url'] . $_A['site_url']);
    }
    $user->add_log($_log, $result); //��¼����
}


/**
 * �����б�
 * */ elseif ($_A['query_type'] == "full") {
    check_rank("borrow_full"); //���Ȩ��
    $_A['list_title'] = "��Ϣ�б�";

    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    $data['type'] = 'review';
    if (isset($_REQUEST['status']) && $_REQUEST['status'] != "") {
        $data['status'] = $_REQUEST['status'];
    } else {
        $data['status'] = 1;
    }
    if (isset($_REQUEST['username']) && $_REQUEST['username'] != "")
        $data['username'] = $_REQUEST['username'];
    $data['username'] = iconv("UTF-8", "GB2312", $data['username']);

    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("Id", "�û�����", "���û���", "����ʱ��", "������", "�����", "������", "Ͷ�����", '�������');
        $data['limit'] = "all";
        if (isset($_REQUEST['start_ts'])) {
            $data['start_ts'] = strtotime($_REQUEST['start_ts'] . " 00:00:00");
        }
        if (isset($_REQUEST['end_ts'])) {
            $data['end_ts'] = strtotime($_REQUEST['end_ts'] . " 23:59:59");
        }
        $result = borrowClass::GetList($data);
        foreach ($result as $key => $value) {
            if ($value['isday'] == 1) {
                $qixian = $value['time_limit_day'] . '��';
            } else {
                $qixian = $value['time_limit'] . '����';
            }

            $_data[$key] = array($key + 1, $value['username'], $value['credit_jifen'], $value['addtime'], $value['name'], $value['account'], $value['apr'], $value['tender_times'], $qixian);
        }
        exportData("�����б�", $title, $_data);
        exit;
    }
    // echo $data['username'];
    $result = borrowClass::GetList($data);

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['borrow_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
}


/**
 * �����б�
 * */ elseif ($_A['query_type'] == "cancel") {
    check_rank("borrow_cancel"); //���Ȩ��
    $_A['list_title'] = "����";

    $data['id'] = $_REQUEST['id'];
    $data['opertype'] = 'guanli';
    $result = borrowClass::GetOne($data);
    if ($result['status'] == 0 || $result['status'] == 1) {
        borrowClass::Cancel($data);
        $msg = array("���سɹ�", "", $_A['query_url'] . $_A['site_url']);
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        $receive_user_id = sendMessage::getTenderUserId(intval($data['id']));
        $sendObj = new sendMessage(1,$receive_user_id,'borrow_cancel_remind');
        $sendObj->getReceiveTeam();
        $content = '������ı�ı��:'.intval($data['id']).'�Ѿ�������,����ע��˶��ʽ���ϸ,�����κ���������������ϵ';
        $sendObj->send($content);
    } else {

        $msg = array("�˱겻������Ͷ�꣬���ܳ���");
    }
}

/**
 * �����б�
 * */ elseif ($_A['query_type'] == "repayment") {
    check_rank("borrow_repayment"); //���Ȩ��
    $_A['list_title'] = "������Ϣ";

    $data['page'] = $_A['page'];
    $data['epage'] = 25;
    $data['order'] = "repayment_time";
    $data['borrow_status'] = 3;
    if (isset($_REQUEST['status']) && $_REQUEST['status'] != "") {
        $data['status'] = $_REQUEST['status'];
    }
    if (isset($_REQUEST['username']) && $_REQUEST['username'] != "") {
        //$data['username'] = $_REQUEST['username'];
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = iconv("UTF-8","GB2312",$data['username']);
    }
    if (isset($_REQUEST['keywords']) && $_REQUEST['keywords'] != "") {
       // $data['keywords'] = $_REQUEST['keywords'];
		$data['keywords'] = urldecode($_REQUEST['keywords']);
		$data['keywords'] = iconv("UTF-8","GB2312",$data['keywords']);
    }

    $result = borrowClass::GetRepaymentList($data);
    if (is_array($result)) {
        $pages->set_data($result);
        $_A['borrow_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
        if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
			$title = array("���","ID","�����","������","����","����ʱ��","������","������Ϣ","��Ϣ","����ʱ��","״̬");
			$data['limit'] = "all";
			$result = borrowClass::GetRepaymentList($data);
			
			foreach ($result as $key => $value){
                                if($value['is_liuzhuan']==1){
                                    $value['borrow_name'] = "����ת�꣩".$value['borrow_name'];
                                }
                                $value['order'] = $value['order']+1;
                                $value['qishu'] = $value['order']."--".$value['time_limit'];
                                if($value['status']==1){
                                    $value['status']="�ѻ�";
                                }elseif($value['status']==2){
                                    $value['status']="�Ѵ���";
                                }else{
                                    $value['status']="δ��";
                                }
                                if($value['repayment_yestime']==""){
                                    $value['repayment_yestime']="";
                                }else{
                                    $value['repayment_yestime'] = date("Y-m-d",$value['repayment_yestime']);
                                }
				$_data[$key] = array($key+1,$value['id'],$value['username'],$value['borrow_name'],$value['qishu'],date("Y-m-d",$value['repayment_time']),$value['repayment_account'],$value['interest'],$value['late_interest'],$value['repayment_yestime'],$value['status']);
			}
			exportData("����ƻ�",$title,$_data);
			exit;
	}
        
    } else {
        $msg = array($result);
    }
}


/**
 * �����б�
 * */ elseif ($_A['query_type'] == "liubiao") {
    check_rank("borrow_liubiao"); //���Ȩ��
    $_A['list_title'] = "����";

    $data['page'] = $_A['page'];
    $data['epage'] = 25;
    if (isset($_REQUEST['status']) && $_REQUEST['status'] != "") {
        $data['status'] = $_REQUEST['status'];
    }
    $data['type'] = "is_failed";
    $result = borrowClass::GetList($data);

    if (is_array($result)) {
        $pages->set_data($result);
        $_A['borrow_list'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
}
/**
 * �����б�
 * */ elseif ($_A['query_type'] == "liubiao_edit") {
    check_rank("borrow_liubiao"); //���Ȩ��
    $_A['list_title'] = "�������";
    if (isset($_POST['status']) && $_POST['status'] != "") {
        $data['days'] = $_POST['days'];
        $data['id'] = $_REQUEST['id'];
        $data['status'] = $_POST['status'];
        $result = borrowClass::ActionLiubiao($data);
        $msg = array("�����ɹ�");
    } else {
        $data['id'] = $_REQUEST['id'];
        $result = borrowClass::GetOne($data);
        $_A['borrow_result'] = $result;
    }
}
/**
 * ���괦��
 * */ elseif ($_A['query_type'] == "full_view") {
    global $mysql;
    check_rank("borrow_full_view"); //���Ȩ��
    $_A['list_title'] = "���괦��";
    if (isset($_POST['id'])) {
        if ($_SESSION['valicode'] != strtolower($_POST['valicode'])) {
            $msg = array("��֤�벻��ȷ");
        } else {
            $var = array("id", "status", "repayment_remark");
            $data = post_var($var);
            $data['repayment_user'] = $_G['user_id'];
            $result = borrowClass::AddRepayment($data);
            if ($result == false) {
                $msg = array($result);
            } else {
                $sqlsf = "select user_id from `{borrow}` where id = " . $_POST['id'];
                $u = $mysql->db_fetch_arrays($sqlsf);
                $au_row = borrowClass::get_back_list(array("id" => $_POST['id']));
                $data_z['user_id'] = $u['user_id']; //�����
                foreach ($au_row as $v) {
                    $data_z['id'] = $v['id'];
                    $result = borrowClass::Repay($data_z); //�Զ�����
                }
                $msg = array("�����ɹ�", "", $_A['query_url'] . "/full" . $_A['site_url']);
            }
        }
        $user->add_log($_log, $result); //��¼����
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['borrow_result'] = borrowClass::GetOne($data);
        if ($_A['borrow_result']['status'] != 1 || $_A['borrow_result']['account'] != $_A['borrow_result']['account_yes']) {
            $msg = array("���Ĳ�������CODE:BORROW_FULL_VIEW");
        }
        $data['borrow_id'] = $data['id'];
        $data['page'] = $_A['page'];
        $data['epage'] = $_A['epage'];
        $result = borrowClass::GetTenderList($data);
        $_A['borrow_repayment'] = borrowClass::GetRepayment(array("id" => $data['id']));
        if (is_array($result)) {
            $pages->set_data($result);
            $_A['borrow_tender_list'] = $result['list'];
            $_A['showpage'] = $pages->show(3);
        } else {
            $msg = array($result);
        }
    }
}

/**
 * ���괦��
 * */ elseif ($_A['query_type'] == "late") {
    check_rank("borrow_late"); //���Ȩ��
    $_A['list_title'] = "���ڻ���";
    if (isset($_POST['id'])) {
        if ($_SESSION['valicode'] != strtolower($_POST['valicode'])) {
            $msg = array("��֤�벻��ȷ");
        } else {
            $var = array("id", "status", "repayment_remark");
            $data = post_var($var);
            $data['repayment_user'] = $_G['user_id'];
            $result = borrowClass::AddRepayment($data);
            if ($result == false) {
                $msg = array($result);
            } else {
                $msg = array("�����ɹ�", "", $_A['query_url'] . "/full" . $_A['site_url']);
            }
            $_SESSION['valicode'] = "";
        }
        $user->add_log($_log, $result); //��¼����
    } else {
        $data['page'] = $_A['page'];
        $data['epage'] = $_A['epage'];
        $data['status'] = "0,2";
        $data['late_repayment_list'] = time();
        $result = borrowClass::GetRepaymentList($data);

        if (is_array($result)) {
            $pages->set_data($result);
            $_A['borrow_repayment_list'] = $result['list'];
            $_A['showpage'] = $pages->show(3);
        } else {
            $msg = array($result);
        }
    }
}
/**
 * ���ڻ�����վ����
 * */ elseif ($_A['query_type'] == "late_repay") {
    check_rank("borrow_late"); //���Ȩ��
    $id = $_REQUEST['id'];
    $sql = "select * from `{borrow_repayment}` where id = {$id}";
    $result = $mysql->db_fetch_array($sql);
    if ($result == false) {
        $msg = array("���Ĳ�������");
    } else {
        if ($result['status'] == 1) {
            $msg = array("�Ѿ�����벻Ҫ�Ҳ���");
        } elseif ($result['status'] == 2) {
            $msg = array("��վ�Ѿ��������벻Ҫ�Ҳ���");
        } else {
            $n = borrowClass::LateRepay(array("id" => $id));
            if ($n) {
                $msg = array("����ɹ�");
                include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
                $receive_user_id = sendMessage::getTenderUserId(intval($id));
                $sendObj = new sendMessage(1,$receive_user_id,'advance_remind');
                $sendObj->getReceiveTeam();
                $content = '������ı�ı��:'.intval($id).'�Ѿ����渶,����ע��˶��ʽ���ϸ,�����κ���������������ϵ';
                $sendObj->send($content);
            } else {
                $msg = array("�˱���δ����30��");
            }
        }
    }
}
/**
 * ͳ��
 * */
elseif ($_A['query_type'] == "tongji") {
    $_A['borrow_tongji'] = borrowClass::Tongji();
    $_A['allaccount_tongji'] = accountClass::AccountTongji();
    $_A['account_tongji'] = accountClass::Tongji();
} elseif ($_A['query_type'] == "invest") {
    $_A['list_title'] = "�ͻ�Ͷ�����";
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    if (isset($_REQUEST['username']) && $_REQUEST['username'] != "") {
        //$data['username'] = $_REQUEST['username'];
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = iconv("UTF-8","GB2312",$data['username']);
    }
    if (isset($_REQUEST['realname']) && $_REQUEST['realname'] != "") {
        $data['realname'] = urldecode($_REQUEST['realname']);
        $data['realname'] = iconv('UTF-8', 'GBK', $data['realname']);
    }
    $result = borrowClass::getTouzi($data);
    if (is_array($result)) {
        $pages->set_data($result);
        $_A['borrow_invest'] = $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
} elseif ($_A['query_type'] == "investlist") {
   $data['borrow_id'] = $_REQUEST['borrow_id'];
           $data['page'] = $_A['page'];
        $data['epage'] = $_A['epage'];
    $result = borrowClass::GetTenderList($data);
    $borrow = borrowClass::GetOne($data);
    $status = $borrow['status'];
    $award = $borrow['award'];
    $part_account = $borrow['part_account'];
    $funds = $borrow['funds'];
    $borrow_account = $borrow['account'];
        $data['page'] = $_A['page'];
        $data['epage'] = $_A['epage'];
    foreach ($result['list'] as &$v) {
        $v['jl'] = 0;
        $v['apr'] = $borrow['apr'];
        if ($award == 1 || $award == 2 || (isset($_G['system']["con_invest_award"]) && $_G['system']["con_invest_award"] > 0)) {
            if ($status == 3) {
                if ($award == 1) {
                    $money2 = round(($v['money'] / $borrow_account) * $part_account, 2);
                } elseif ($award == 2) {
                    $money2 = round((($funds / 100) * $v['money']), 2);
                }
            }
        }
        $v['jl'] = $money2;
    }
   
    $_A['borrow_id'] = $_REQUEST['borrow_id'];
    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("���", "Ͷ����/��ϵ", "��ǰ������", "Ͷ����", "��Ч���", "Ͷ��ʱ��", "״̬","Ͷ�꽱��");
        foreach ($result['list'] as $key => $value) {
            $stau = $value['tender_account'] == $value['money'] ? 'ȫ��ͨ��' : '����ͨ��';
            $_data[$key] = array($key + 1, $value['username'], $value['apr'], $value['money'], $value['tender_account'], date('Y-m-d His', $value['addtime']), $stau,$value['jl']);
        }
        exportData("Ͷ���¼", $title, $_data);
        exit;
    }
     if (is_array($result)) {
            $pages->set_data($result);
          $_A['borrow_investlist'] = $result['list'];
            $_A['showpage'] = $pages->show(3);
        } else {
            $msg = array($result);
        }
}elseif ($_A['query_type'] == "tbjl") {
    $_A['list_title'] = "Ͷ�꽱��";
    $data['page'] = $_A['page'];
    $data['epage'] = $_A['epage'];
    if (isset($_REQUEST['username']) && $_REQUEST['username'] != "") {
        //$data['username'] = $_REQUEST['username'];
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = iconv("UTF-8","GB2312",$data['username']);
    }
    if (isset($_REQUEST['realname']) && $_REQUEST['realname'] != "") {
        $data['realname'] = urldecode($_REQUEST['realname']);
        $data['realname'] = iconv('UTF-8', 'GBK', $data['realname']);
    }
    $result = borrowClass::getTouzi($data);
    foreach($result['list'] as &$v){
        $data['borrow_id']=$v['borrow_id'];
        $borrow = borrowClass::GetOne($data);
        $status=$borrow['status'];
        $award = $borrow['award'];
        $part_account = $borrow['part_account'];
        $funds = $borrow['funds'];
        $borrow_account = $borrow['account'];
        if ($award == 1 || $award == 2 || (isset($_G['system']["con_invest_award"]) && $_G['system']["con_invest_award"] > 0)) {
            if ($status == 3) {
                 if ($award == 1) {
                            $money2 = round(($v['money'] / $borrow_account) * $part_account, 2);
                        } elseif ($award == 2) {
                            $money2 = round((($funds / 100) * $v['money']), 2);
                        }
            }
        }
        $v['jl']=$money2;
    }
    if (is_array($result)) {
        $pages->set_data($result);
        $_A['borrow_tbjl'] =  $result['list'];
        $_A['showpage'] = $pages->show(3);
    } else {
        $msg = array($result);
    }
    
}
//��ֹ�Ҳ���
else {
    $msg = array("���������벻Ҫ�Ҳ���", "", $url);
}
?>