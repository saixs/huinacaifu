<?
if (!defined('ROOT_PATH'))
    die('不能访问'); //防止直接访问
check_rank("account_" . $_A['query_type']); //检查权限

include_once("account.class.php");

$_A['list_purview'] = array("account" => array("账号资金管理" => array("account_list" => "信息列表", "account_bank" => "银行帐户", "account_cash" => "提现记录", "account_recharge" => "充值记录", "account_log" => "资金记录"))); //权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>帐户信息列表</a> - <a href='{$_A['query_url']}/cash&status=0{$_A['site_url']}'>申请提现</a> - <a href='{$_A['query_url']}/cash&status=1{$_A['site_url']}'>提现成功</a> -  - <a href='{$_A['query_url']}/cash&status=2{$_A['site_url']}'>提现失败</a> - <a href='{$_A['query_url']}/recharge{$_A['site_url']}'>充值记录</a>  -<a href='{$_A['query_url']}/recharge&status=1{$_A['site_url']}'>充值成功</a>  -  <a href='{$_A['query_url']}/recharge_ver{$_A['site_url']}'>充值核查</a>  - <a href='{$_A['query_url']}/log{$_A['site_url']}'>资金记录</a> - <a href='{$_A['query_url']}/recharge_new{$_A['site_url']}'>添加充值</a> - <a href='{$_A['query_url']}/deduct{$_A['site_url']}'>扣除费用</a>- <a href='{$_A['query_url']}/everyday{$_A['site_url']}'>每日对账</a>- <a href='{$_A['query_url']}/fundy{$_A['site_url']}'>资金平衡</a>-<a href='{$_A['query_url']}/sumlog{$_A['site_url']}'>资金流汇总</a>";


/**
 * 如果类型为空的话则显示所有的文件列表
 * */
if ($_A['query_type'] == "list") {
    $_A['list_title'] = "帐户信息列表";

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
            $title = array("序号", "ID", "用户名", "真实姓名", "总余额", "可用余额", "冻结金额", "待收金额");
            $data['limit'] = "all";
            $result = accountClass::GetList($data);

            foreach ($result as $key => $value) {


                $_data[$key] = array($key + 1, $value['user_id'], $value['username'], $value['realname'], $value['total'], $value['use_money'], $value['no_use_money'], $value['collection']);
            }
            exportData("帐户信息列表", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}
elseif ($_A['query_type'] == "borrower_account") {
    $_A['list_title'] = "借款人账户信息";

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
            $title = array("序号", "ID", "用户名", "真实姓名", "总余额", "可用余额", "冻结金额", "待收金额");
            $data['limit'] = "all";
            $result = accountClass::GetBorrowerList($data);

            foreach ($result as $key => $value) {


                $_data[$key] = array($key + 1, $value['user_id'], $value['username'], $value['realname'], $value['total'], $value['use_money'], $value['no_use_money'], $value['collection']);
            }
            exportData("帐户信息列表", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}


/**
 * 提现记录
 * */ elseif ($_A['query_type'] == "cash") {
    $_A['list_title'] = "提现记录";

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
        $title = array("Id", "用户名称", "真实姓名", "提现账号", "提现银行", "支行", "提现总额", "到账金额", "手续费", "提现时间", "状态");
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
                $state = "审核通过";
            } elseif ($value["status"] == 0) {
                $state = "申请中";
            } elseif ($value["status"] == 2) {
                $state = "申请拒绝";
            }

            $_data[$key] = array($key + 1, $value['username'], $value['realname'], $value['account'], $value['bank_name'], $value['branch'], $value['total'], $value['credited'], $value['fee'], date("Y-m-d H:i", $value['addtime']), $state);
        }
        exportData("提现列表", $title, $_data);
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
 * 提现记录
 * */ elseif ($_A['query_type'] == "everyday") {
    $_A['list_title'] = "每日对账";


    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("Id", "日期", "充值额度", "提现额度", "利息管理费", "vip费", "借款手续费", "实名认证费");
        $data['limit'] = "all";
        $result = accountClass::GetEveryDay($data);
        foreach ($result as $key => $value) {


            $_data[$key] = array($value['id'], $value['everydate'], $value['chongzhi'], $value['tixian'], $value['lxmanage'], $value['vipfee'], $value['borrowfee'], $value['realfee']);
        }
        exportData("每日对账", $title, $_data);
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
 * 资金记录汇总
 * */ elseif ($_A['query_type'] == "sumlog") {
    $_A['list_title'] = "资金记录汇总";


    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("编号", "类型", "总额", "标示");
        $data['limit'] = "all";
        $result = accountClass::GetSumLog($data);
        foreach ($result as $key => $value) {


            $_data[$key] = array($key, $value['name'], $value['summoney'], $value['type']);
        }
        exportData("资金记录汇总", $title, $_data);
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
 * 资金平衡
 * */ elseif ($_A['query_type'] == "fundy") {
    $_A['list_title'] = "资金平衡";


    if (isset($_REQUEST['type']) && $_REQUEST['type'] == "excel") {
        $title = array("Id", "可用总金额", "+冻结总金额", "+vip费", "+借款手续费", "+利息提成", "+实名认证费", "-系统代还", "+逾期利息扣除", "+垫付后用户还款", "+逾期扣款", "-逾期系统收入", "==充值", "-提现");
        $data['limit'] = "all";
        $result = accountClass::getFundy();
        foreach ($result as $key => $value) {


            $_data[$key] = array(1, $value['k_money'], $value['n_money'], $value['vip'], $value['borrow_fee'], $value['tender_mange'], $value['real_fee'], $value['system_repayment'], $value['late_rate'], $value['df_repayment'], $value['late_repayment'], $value['late_collection'], $value['recharge'], $value['recharge_success']);
        }
        exportData("资金平衡", $title, $_data);
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
 * 提现审核查看
 * */ elseif ($_A['query_type'] == "cash_view") {
    $_A['list_title'] = "提现审核查看";
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
            $log['remark'] = "提现成功";
            $result = accountClass::AddLog($log);
            //提现手续费添加资金记录
            $log1['user_id'] = $log['user_id'];
            $log1['type'] = "recharge_fee";
            $log1['money'] = $_POST['fee'];
            $log1['total'] = $log['total'] - $log1['money'];
            $log1['use_money'] = $log['use_money'];
            $log1['no_use_money'] = $log['no_use_money'] - $log1['money'];
            $log1['collection'] = $log['collection'];
            $log1['to_user'] = "0";
            $log1['remark'] = "提现手续费";
            $result = accountClass::AddLog($log1);

            //提醒设置
            $remind['nid'] = "cash_yes";
            $remind['sent_user'] = "0";
            $remind['receive_user'] = $_POST['user_id'];
            $remind['title'] = "提现{$log['total']}元已成功";
            $remind['content'] = "您已经于" . date("Y-m-d", time()) . "成功提现了{$log['total']}元";
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
            $log['remark'] = "提现失败";
            $result = accountClass::AddLog($log);


            //提醒设置
            $remind['nid'] = "cash_no";
            $remind['sent_user'] = "0";
            $remind['receive_user'] = $_POST['user_id'];
            $remind['title'] = "提现{$log['total']}元失败";
            $remind['content'] = date("Y-m-d", time()) . "提现{$log['total']}元失败";
            $remind['type'] = "cash";
            remindClass::sendRemind($remind);
        }
        $data['verify_userid'] = $_G['user_id'];
        $data['verify_time'] = time();
        $data['user_id'] = $_POST['user_id'];
        $result = accountClass::UpdateCash($data);

        // 发送提醒
        if ($data['status'] == 1 && $remind_check_status != $data['status']) {
            $sendObj = new sendMessage(0,$_POST['user_id'],'withdraw_success_remind');
            $sendObj->getReceiveTeam();
            $content = '您有一笔于'.date('Y-m-d H:i', $remind_time).'分提交的总额为:'.$log['money'].'元的提现申请已经通过审核,收取提现手续费'.$log1['money'].'元,预期将在一小时内打入您的银行账户,请注意查收,如有任何疑问请与我们联系';
            $sendObj->send($content);
        } elseif ($data['status'] == 2) {
            $sendObj = new sendMessage(0,$_POST['user_id'],'withdraw_failed_remind');
            $sendObj->getReceiveTeam();
            $content = '您有一笔于'.date('Y-m-d H:i', $remind_time).'分提交的总额为:'.$log['money'].'元的提现申请已经被拒绝,如有任何疑问请与我们联系';
            $sendObj->send($content);
        }

        if ($result !== true) {
            $msg = array($result);
        } else {
            $msg = array("操作成功", "", $_A['query_url'] . "/cash" . $_A['site_url']);
        }

        $user->add_log($_log, $result); //记录操作
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['account_cash_result'] = accountClass::GetCashOne($data);
    }
}

/**
 * 账号充值
 * */ elseif ($_A['query_type'] == "recharge_view") {
    $_A['list_title'] = "充值查看";
    if (isset($_POST['id'])) {
        $var = array("id", "status", "verify_remark");
        $data = post_var($var);
        $result = accountClass::GetRechargeOne(array("id" => $_POST['id']));
        if ($result['status'] != 0) {
            $msg = array("此充值已经审核，请不要重复审核。");
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
                    $log['remark'] = "账号充值后台审核";
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
                        $log['remark'] = "线下充值奖励";
                        accountClass::AddLog($log);
                    }

                    //判断vip会员费是否扣除
                    accountClass::AccountVip(array("user_id" => $result['user_id']));


                    //提醒设置
                    $remind['nid'] = "recharge";
                    $remind['sent_user'] = "0";
                    $remind['receive_user'] = $result['user_id'];
                    $remind['title'] = "充值{$result['money']}元已成功";
                    $remind['content'] = "您已经于" . date("Y-m-d", time()) . "成功充值{$result['money']}元";
                    $remind['type'] = "recharge";
                    remindClass::sendRemind($remind);

                    $sendObj = new sendMessage(0,$result['user_id'],'offline_recharge_success_remind');
                    $sendObj->getReceiveTeam();
                    $content = '您有一笔于'.date('Y-m-d H:i', $result['addtime']).'分提交的:'.$result['money'].'元的充值已经通过审核,如有任何疑问请与我们联系';
                    $sendObj->send($content);
                }
            } elseif ($data['status'] == 2) {
                $data['verify_userid'] = $_G['user_id'];
                $data['verify_time'] = time();
                $resultr = accountClass::UpdateRecharge($data);
                if ($resultr == 1) {
                    //提醒设置
                    $remind['nid'] = "recharge";
                    $remind['sent_user'] = "0";
                    $remind['receive_user'] = $result['user_id'];
                    $remind['title'] = "充值{$result['money']}元失败";
                    $remind['content'] = date("Y-m-d", time()) . "充值{$result['money']}元审核失败";
                    $remind['type'] = "recharge";
                    remindClass::sendRemind($remind);

                    $sendObj = new sendMessage(0,$result['user_id'],'offline_recharge_failed_remind');
                    $sendObj->getReceiveTeam();
                    $content = '您有一笔于'.date('Y-m-d H:i', $result['addtime']).'分提交的:'.$result['money'].'元的充值已经被拒绝,如有任何疑问请与我们联系';
                    $sendObj->send($content);
                }
            }



            if ($resultr == 1) {
                $msg = array("操作成功", "", $_A['query_url'] . "/recharge" . $_A['site_url']);
                //$msg = array($resultr);
            } else {
                $msg = array("操作成功", "", $_A['query_url'] . "/recharge" . $_A['site_url']);
            }
        }
        $user->add_log($_log, $result); //记录操作
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['account_recharge_result'] = accountClass::GetRechargeOne($data);
    }
}

/**
 * 充值记录
 * */ elseif ($_A['query_type'] == "recharge") {
    $_A['list_title'] = "充值记录";

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
            $title = array("序号", "订单编号", "用户名称", "类型", "所属银行", "充值金额", "费用", "到账金额", "审核时间", "状态");
            $data['limit'] = "all";
            $result = accountClass::GetRechargeList($data);
            foreach ($result as $key => $value) {
                if ($value['type'] == 1) {
                    $type = "网上充值";
                } else {
                    $type = "线下充值";
                }
                if ($value['payment'] == 0) {
                    $payment = "手动充值";
                    $value['payment_name'] = "手动充值";
                } else {
                    $payment_name = "线下充值";
                }
                if ($value['status'] == 0) {
                    $status = "审核";
                } elseif ($value['status'] == 1) {
                    $status = "成功";
                } else {
                    $status = "失败";
                }

                $_data[$key] = array($key + 1, $value['trade_no'], $value['username'], $type, $value['payment_name'], $value['money'], $value['fee'], $value['total'], date("Y-m-d H:i", $value['verify_time']), $status);
            }
            exportData("充值列表", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}
/**
 * 充值核查
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
 * 充值核查_查看详细
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
 * 充值记录
 * */ elseif ($_A['query_type'] == "recharge_new") {
    if (isset($_POST['username']) && $_POST['username'] != "") {
        $_data['username'] = $_POST['username'];
        $result = userClass::GetOnes($_data);
        if ($result == false) {
            $msg = array("用户名不存在");
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
                $msg = array("操作成功");
            }
        }
    }
}
/**
 * 积分充值
**/
elseif ($_A['query_type'] == "recharge_integral"){
	include_once(ROOT_PATH."/modules/integral/integral.class.php");
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = userClass::GetOnes($_data);
		if ($result==false){
			$msg = array("用户名不存在");
		}else{
			$data['user_id'] = $result['user_id'];
			$data['value']   = $_POST['integral'];
			$data['type_id'] = 3;
			$data['remark'] = $_POST['remark'];
			
			$result = integralClass::AddRechargeIntegral($data);
			if (empty($result)){
				$msg = array($result);
			}else{
				//提醒设置
				$remind['nid'] = "recharge_integral";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $result['user_id'];
				$remind['title'] = "{$result['remark']}获得积分{$result['value']}分";
				$remind['content'] = "您已经于".date("Y-m-d",time())."获得积分{$result['value']}分";
				$remind['type'] = "recharge_integral";
				remindClass::sendRemind($remind);
				$msg = array("操作成功");
			}
		}
	}
}
/**
 * 扣除费用
 * */ elseif ($_A['query_type'] == "deduct") {
    if (isset($_POST['username']) && $_POST['username'] != "") {
        $_data['username'] = $_POST['username'];
        $result = userClass::GetOnes($_data);
        if ($result == false) {
            $msg = array("用户名不存在");
        } elseif (strtolower($_POST['valicode']) != $_SESSION['valicode']) {
            $msg = array("验证码不正确");
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
                    $msg = array("费用已成功扣除", "", $_A['query_url'] . "/deduct");
                    $_SESSION['valicode'] = "";
                }
            } else {
                $msg = array("账户额度不足扣取");
            }
        }
    }
}


/**
 * 资金使用记录
 * */ elseif ($_A['query_type'] == "log") {
    $_A['list_title'] = "资金使用记录";

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
            $title = array("数据库序号", "账单流水号", "用户名", "总金额", "操作金额", "可用金额", "冻结金额", "待收金额", "交易方", "发生时间", "备注");
            $data['limit'] = "all";
            if (isset($_REQUEST['start_ts'])) {
                $data['start_ts'] = strtotime(urldecode($_REQUEST['start_ts']));
            }
            if (isset($_REQUEST['end_ts'])) {
                $data['end_ts'] = strtotime(urldecode($_REQUEST['end_ts']));
            }
            $result = accountClass::GetLogList($data);
            foreach ($result as $key => $value) {
                // 2012-10-17 修改了$value['remark'] 原程序中该处为 $value['type'] 导致导出的记录中资金使用名目为英文,remark字段为中文
                $remark = $result[$key]['remark'];
                $http_host = $_SERVER['HTTP_HOST'];
                $pattern = "/^(.*)\[<a.*(\/invest\/a[0-9]{1,}.html)' target=_blank>(.*)<\/a>(.*)$/i";
                $res = preg_match_all($pattern, $remark, $match_array);
                if ($res) {
                    //$remark = $match_array['1']['0'].'[<a href="http://'.$http_host.$match_array['2']['0'].'" target=_blank>'.$match_array['3']['0'].'</a>'.$match_array['4']['0'];
                }
                $_data[$key] = array($key + 1, $value['id'], $value['username'], $value['total'], $value['money'], $value['use_money'], $value['no_use_money'], $value['collection'], $value['to_username'], date("Y-m-d H:i", $value['addtime']), $remark);
                // 2012-10-17修改
                //$_data[$key] = array($key+1,$value['trade_no'],$value['username'],$type,$payment,$value['money'],$value['fee'],$value['total'],date("Y-m-d H:i",$value['addtime']),$status);
            }
            exportData("资金使用记录", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}


/**
 * 查看
 * */ elseif ($_A['query_type'] == "view") {
    $_A['list_title'] = "查看认证";
    if (isset($_POST['id'])) {
        $var = array("id", "status", "verify_remark", "jifen");
        $data = post_var($var);
        $data['verify_user'] = $_SESSION['user_id'];
        $result = accountClass::Update($data);

        if ($result !== true) {
            $msg = array($result);
        } else {
            $msg = array("操作成功");
        }
        $user->add_log($_log, $result); //记录操作
    } else {
        $data['id'] = $_REQUEST['id'];
        $_A['account_result'] = accountClass::GetOne($data);
    }
} elseif ($_A['query_type'] == "vipTC") {

    $_A['list_title'] = "充值记录";

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
    $_A['list_title'] = "线下充值奖励查询";
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
            $title = array("序号", "用户名称", "真实姓名", "审核时间", "充值金额", "奖励");
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
            exportData("线下充值奖励", $title, $_data);
            exit;
        }
    } else {
        $msg = array($result);
    }
}



//防止乱操作
else {
    $msg = array("输入有误，请不要乱操作");
}
?>