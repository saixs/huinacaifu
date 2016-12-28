<?

if (!defined('ROOT_PATH'))
    die('不能访问'); //防止直接访问
check_rank("borrow_" . $_A['query_type']); //检查权限

include_once("borrow.class.php");

$_A['list_purview'] = array("borrow" => array("借款管理" => array("borrow_list" => "借款列表",
            "borrow_new" => "添加借款",
            "borrow_edit" => "编辑借款",
            "borrow_amount" => "借款额度",
            "borrow_amount_view" => "额度管理",
            "borrow_del" => "删除借款",
            "borrow_view" => "审核借款",
            "borrow_full" => "满标列表",
            "borrow_repayment" => "已还款",
            "noborrow_repayment" => "未还款",
            "borrow_liubiao" => "流标",
            "borrow_late" => "逾期",
            "borrow_full_view" => "满标查看")));
//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>所有借款</a> - <a href='{$_A['query_url']}&status=0{$_A['site_url']}'>发标待审</a> -  <a href='{$_A['query_url']}&status=1{$_A['site_url']}'>正在招标款</a> -  <a href='{$_A['query_url']}/full&status=1{$_A['site_url']}'>己满标待审</a> -  <a href='{$_A['query_url']}/full&status=3{$_A['site_url']}'>满标审核通过</a> - <a href='{$_A['query_url']}/full&status=4{$_A['site_url']}'>$满标审核未通过</a>- <a href='{$_A['query_url']}/repayment{$_A['site_url']}&status=0'>还款计划</a>  - <a href='{$_A['query_url']}/repayment{$_A['site_url']}&status=1'>已还款</a>  -  <a href='{$_A['query_url']}/liubiao{$_A['site_url']}'>流标</a>  - <a href='{$_A['query_url']}/late{$_A['site_url']}'>逾期</a>  - <a href='{$_A['query_url']}/amount{$_A['site_url']}'>借款额度</a> - <a href='{$_A['query_url']}/tongji{$_A['site_url']}'>统计</a>  ";


/**
 * 如果类型为空的话则显示所有的文件列表
 * */
if ($_A['query_type'] == "list") {
    $_A['list_title'] = "信息列表";
    if (isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
        $data['id'] = array($_REQUEST['id']);
        $data['flag'] = array($_REQUEST['flag']);
        $data['view'] = array($_REQUEST['view']);
        $result = borrowClass::Action($data);
        if ($result == true) {
            $msg = array("修改成功", "", $_A['query_url'] . $_A['site_url']);
        } else {
            $msg = array("修改失败，请跟管理员联系");
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
 * 额度管理
 * */ elseif ($_A['query_type'] == "amount") {
    check_rank("borrow_amount"); //检查权限
    $_A['list_title'] = "额度管理";

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
 * 额度管理
 * */ elseif ($_A['query_type'] == "amount_view") {
    check_rank("borrow_amount_view"); //检查权限
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
            $msg = array("操作成功", "", $_A['query_url'] . "/amount");
        }
        $user->add_log($_log, $result); //记录操作
    } else {
        if (is_array($result)) {
            $_A['borrow_amount_result'] = $result;
        } else {
            $msg = array($result);
        }
    }
}


/**
 * 添加
 * */ elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit") {
    check_rank("borrow_new"); //检查权限
    $_A['list_title'] = "管理信息";

    //读取用户id的信息
    if (isset($_REQUEST['user_id']) && isset($_POST['username'])) {
        if (isset($_POST['user_id']) && $_POST['user_id'] != "") {
            $data['user_id'] = $_POST['user_id'];
            $result = userClass::GetOne($data);
        } elseif (isset($_POST['username']) && $_POST['username'] != "") {
            $data['username'] = $_POST['username'];
            $result = userClass::GetOne($data);
        }
        if ($result == false) {
            $msg = array("找不到此用户");
        } else {
            echo "<script>location.href='" . $_A['query_url'] . "/new&user_id={$result['user_id']}'</script>";
        }
    } elseif (isset($_POST['name'])) {
        $var = array("user_id", "name", "use", "time_limit", "style", "account", "apr", "lowest_account", "most_account", "valid_time", "award", "part_account", "funds", "is_false", "open_account", "open_borrow", "open_tender", "open_credit", "content");
        $data = post_var($var);
        if ($_POST['status'] != 0 || $_POST['status'] != -1) {
            $msg = array("此标已经在招标或者已经完成，不能修改", "", $_A['query_url'] . $_A['site_url']);
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
                $msg = array("操作成功", "", $_A['query_url'] . $_A['site_url']);
            }
        }
        $user->add_log($_log, $result); //记录操作
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
            $msg = array("您的输入有误", "", $_A['query_url']);
        } else {
            $_A['user_result'] = $result;
            //$result = borrowClass::GetOne($data);
            //$_A['borrow_result'] = $result;
        }
    }
}

/**
 * 查看
 * */ elseif ($_A['query_type'] == "view") {
    check_rank("borrow_view"); //检查权限
    $_A['list_title'] = "查看认证";
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
            //添加用户的动态
            if ($data['status'] == 1) {
                //自动投标
                $brsql = "select * from `{borrow}` where id ='" . $_POST['id'] . "'";
                $br_row = $mysql->db_fetch_array($brsql);
                if ($br_row['is_mb'] != 1 and $br_row['is_dxb'] != 1 and $br_row['is_vouch'] != 1 and $br_row['is_liuzhuan'] != 1) {
                    $auto['id'] = $data['id'];
                    $auto['user_id'] = $br_row['user_id'];
                    //borrowClass::auto_borrow($auto);
                    //自动投标
                }
                $_data['user_id'] = $_POST['user_id'];
                $_data['content'] = "成功发布了\"<a href=\'/invest/a{$data['id']}.html\' target=\'_blank\'>{$_POST['name']}</a>\"借款标";
                $result = userClass::AddUserTrend($_data);
            }
            $msg = array("审核操作成功", "", $_A['query_url'] . $_A['site_url']);
        }
        $user->add_log($_log, $result); //记录操作
        $sql = "UPDATE `{borrow}` SET `in_auto`=0 WHERE `id`={$data['id']}";
        $upd_res = $mysql->db_query($sql);
    } else {
        $data['id'] = $_REQUEST['id'];
        $data['user_id'] = $_REQUEST['user_id'];
        $_A['borrow_result'] = borrowClass::GetOne($data);
    }
}


/**
 * 删除
 * */ elseif ($_A['query_type'] == "del") {
    check_rank("borrow_del"); //检查权限
    $data['id'] = $_REQUEST['id'];
    $result = borrowClass::Delete($data);
    if ($result !== true) {
        $msg = array($result);
    } else {
        $msg = array("删除成功", "", $_A['query_url'] . $_A['site_url']);
    }
    $user->add_log($_log, $result); //记录操作
}


/**
 * 满标列表
 * */ elseif ($_A['query_type'] == "full") {
    check_rank("borrow_full"); //检查权限
    $_A['list_title'] = "信息列表";

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
        $title = array("Id", "用户名称", "信用积分", "发标时间", "借款标题", "借款金额", "年利率", "投标次数", '借款期限');
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
                $qixian = $value['time_limit_day'] . '天';
            } else {
                $qixian = $value['time_limit'] . '个月';
            }

            $_data[$key] = array($key + 1, $value['username'], $value['credit_jifen'], $value['addtime'], $value['name'], $value['account'], $value['apr'], $value['tender_times'], $qixian);
        }
        exportData("借款标列表", $title, $_data);
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
 * 满标列表
 * */ elseif ($_A['query_type'] == "cancel") {
    check_rank("borrow_cancel"); //检查权限
    $_A['list_title'] = "撤回";

    $data['id'] = $_REQUEST['id'];
    $data['opertype'] = 'guanli';
    $result = borrowClass::GetOne($data);
    if ($result['status'] == 0 || $result['status'] == 1) {
        borrowClass::Cancel($data);
        $msg = array("撤回成功", "", $_A['query_url'] . $_A['site_url']);
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        $receive_user_id = sendMessage::getTenderUserId(intval($data['id']));
        $sendObj = new sendMessage(1,$receive_user_id,'borrow_cancel_remind');
        $sendObj->getReceiveTeam();
        $content = '您参与的标的编号:'.intval($data['id']).'已经被撤销,请您注意核对资金明细,如有任何疑问请与我们联系';
        $sendObj->send($content);
    } else {

        $msg = array("此标不是正在投标，不能撤回");
    }
}

/**
 * 满标列表
 * */ elseif ($_A['query_type'] == "repayment") {
    check_rank("borrow_repayment"); //检查权限
    $_A['list_title'] = "还款信息";

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
			$title = array("序号","ID","借款人","借款标题","期数","到期时间","还款金额","还款利息","罚息","还款时间","状态");
			$data['limit'] = "all";
			$result = borrowClass::GetRepaymentList($data);
			
			foreach ($result as $key => $value){
                                if($value['is_liuzhuan']==1){
                                    $value['borrow_name'] = "（流转标）".$value['borrow_name'];
                                }
                                $value['order'] = $value['order']+1;
                                $value['qishu'] = $value['order']."--".$value['time_limit'];
                                if($value['status']==1){
                                    $value['status']="已还";
                                }elseif($value['status']==2){
                                    $value['status']="已代还";
                                }else{
                                    $value['status']="未还";
                                }
                                if($value['repayment_yestime']==""){
                                    $value['repayment_yestime']="";
                                }else{
                                    $value['repayment_yestime'] = date("Y-m-d",$value['repayment_yestime']);
                                }
				$_data[$key] = array($key+1,$value['id'],$value['username'],$value['borrow_name'],$value['qishu'],date("Y-m-d",$value['repayment_time']),$value['repayment_account'],$value['interest'],$value['late_interest'],$value['repayment_yestime'],$value['status']);
			}
			exportData("还款计划",$title,$_data);
			exit;
	}
        
    } else {
        $msg = array($result);
    }
}


/**
 * 满标列表
 * */ elseif ($_A['query_type'] == "liubiao") {
    check_rank("borrow_liubiao"); //检查权限
    $_A['list_title'] = "流标";

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
 * 满标列表
 * */ elseif ($_A['query_type'] == "liubiao_edit") {
    check_rank("borrow_liubiao"); //检查权限
    $_A['list_title'] = "流标管理";
    if (isset($_POST['status']) && $_POST['status'] != "") {
        $data['days'] = $_POST['days'];
        $data['id'] = $_REQUEST['id'];
        $data['status'] = $_POST['status'];
        $result = borrowClass::ActionLiubiao($data);
        $msg = array("操作成功");
    } else {
        $data['id'] = $_REQUEST['id'];
        $result = borrowClass::GetOne($data);
        $_A['borrow_result'] = $result;
    }
}
/**
 * 满标处理
 * */ elseif ($_A['query_type'] == "full_view") {
    global $mysql;
    check_rank("borrow_full_view"); //检查权限
    $_A['list_title'] = "满标处理";
    if (isset($_POST['id'])) {
        if ($_SESSION['valicode'] != strtolower($_POST['valicode'])) {
            $msg = array("验证码不正确");
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
                $data_z['user_id'] = $u['user_id']; //借款人
                foreach ($au_row as $v) {
                    $data_z['id'] = $v['id'];
                    $result = borrowClass::Repay($data_z); //自动还款
                }
                $msg = array("操作成功", "", $_A['query_url'] . "/full" . $_A['site_url']);
            }
        }
        $user->add_log($_log, $result); //记录操作
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['borrow_result'] = borrowClass::GetOne($data);
        if ($_A['borrow_result']['status'] != 1 || $_A['borrow_result']['account'] != $_A['borrow_result']['account_yes']) {
            $msg = array("您的操作有误。CODE:BORROW_FULL_VIEW");
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
 * 满标处理
 * */ elseif ($_A['query_type'] == "late") {
    check_rank("borrow_late"); //检查权限
    $_A['list_title'] = "逾期还款";
    if (isset($_POST['id'])) {
        if ($_SESSION['valicode'] != strtolower($_POST['valicode'])) {
            $msg = array("验证码不正确");
        } else {
            $var = array("id", "status", "repayment_remark");
            $data = post_var($var);
            $data['repayment_user'] = $_G['user_id'];
            $result = borrowClass::AddRepayment($data);
            if ($result == false) {
                $msg = array($result);
            } else {
                $msg = array("操作成功", "", $_A['query_url'] . "/full" . $_A['site_url']);
            }
            $_SESSION['valicode'] = "";
        }
        $user->add_log($_log, $result); //记录操作
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
 * 逾期还款网站代还
 * */ elseif ($_A['query_type'] == "late_repay") {
    check_rank("borrow_late"); //检查权限
    $id = $_REQUEST['id'];
    $sql = "select * from `{borrow_repayment}` where id = {$id}";
    $result = $mysql->db_fetch_array($sql);
    if ($result == false) {
        $msg = array("您的操作有误");
    } else {
        if ($result['status'] == 1) {
            $msg = array("已经还款，请不要乱操作");
        } elseif ($result['status'] == 2) {
            $msg = array("网站已经代还，请不要乱操作");
        } else {
            $n = borrowClass::LateRepay(array("id" => $id));
            if ($n) {
                $msg = array("还款成功");
                include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
                $receive_user_id = sendMessage::getTenderUserId(intval($id));
                $sendObj = new sendMessage(1,$receive_user_id,'advance_remind');
                $sendObj->getReceiveTeam();
                $content = '您参与的标的编号:'.intval($id).'已经被垫付,请您注意核对资金明细,如有任何疑问请与我们联系';
                $sendObj->send($content);
            } else {
                $msg = array("此标尚未逾期30天");
            }
        }
    }
}
/**
 * 统计
 * */
elseif ($_A['query_type'] == "tongji") {
    $_A['borrow_tongji'] = borrowClass::Tongji();
    $_A['allaccount_tongji'] = accountClass::AccountTongji();
    $_A['account_tongji'] = accountClass::Tongji();
} elseif ($_A['query_type'] == "invest") {
    $_A['list_title'] = "客户投资情况";
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
        $title = array("序号", "投标人/关系", "当前年利率", "投标金额", "有效金额", "投标时间", "状态","投标奖励");
        foreach ($result['list'] as $key => $value) {
            $stau = $value['tender_account'] == $value['money'] ? '全部通过' : '部分通过';
            $_data[$key] = array($key + 1, $value['username'], $value['apr'], $value['money'], $value['tender_account'], date('Y-m-d His', $value['addtime']), $stau,$value['jl']);
        }
        exportData("投标记录", $title, $_data);
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
    $_A['list_title'] = "投标奖励";
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
//防止乱操作
else {
    $msg = array("输入有误，请不要乱操作", "", $url);
}
?>