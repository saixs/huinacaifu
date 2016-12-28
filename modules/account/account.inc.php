<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
include_once("account.class.php");
include_once(ROOT_PATH.'modules/credit/credit.inc.php');
//获取收益

if (isset($_POST['valicode']) && strtolower($_POST['valicode'])!=$_SESSION['valicode']){
//if (1!=1){
		$msg = array("验证码错误","",$_U['query_url']."/".$_U['query_type']);
}else{
	$_SESSION['valicode'] = "";
	if ($_U['query_type'] == "list"){	
		
	}
	
	elseif ($_U['query_type'] == "log"){
		$data['user_id'] = $_G['user_id'];
		$data['page'] = $_U['page'];
		$data['epage'] = 20;
		$data['dotime1'] = isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:"";
		$data['dotime2'] = isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:"";
		$data['type'] = isset($_REQUEST['type'])?$_REQUEST['type']:"";
		$result = accountClass::GetLogList($data);
		if (is_array($result)){
			$pages->set_data($result);
			$_U['account_log_list'] = $result['list'];
			$_U['show_page'] = $pages->show(3);
			$_U['account_num'] = $result['account'];
		}else{
			$msg = array($result);
		}
	}
	elseif ($_U['query_type'] == "fund"){
        die('非法访问');
	
    //获取余额宝资金变动列表
	$_U["fundlist"]=accountClass::GetfundList(array("user_id"=>$_G["user_id"]));
		
		
	if($_REQUEST["fund"]){
		if ( $_POST['valicode'] ==""&& $_POST['valicode'] !==$_SESSION["valicode"]){
		
			$msg = array("验证码错误","",$_U['query_url']."/".$_U['query_type']);
		}else{
		$data["user_id"]=$_G["user_id"];
		$data["fund"]=$_REQUEST["fund"];
		$account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));
		if($data["fund"]> $account_result['use_money']){
			$msg = array("帐号可用余额不足","",$_U['query_url']."/".$_U['query_type']);
		}else{
			$log['user_id'] = $_G['user_id'];
			$log['type'] = "fund_add";
			$log['money'] = $data['fund'];
			$log['total'] = $account_result['total'];
			$log['use_money'] =  $account_result['use_money']- $data['fund'];
			$log['no_use_money'] =  $account_result['no_use_money'];
			$log['collection'] =  $account_result['collection'];
			$log['fund'] =  $account_result['fund']+$data['fund'];
			$log['to_user'] = "0";
			$log['remark'] = "余额宝存入";
			accountClass::AddLog($log);
			 
			$msg = array("余额宝充值成功","",$_U['query_url']."/".$_U['query_type']);
		}
	
	}
								 
	}
	}
	elseif ($_U['query_type'] == "backfund"){
        die('非法访问');
		if($_REQUEST["backfund"]){
			if ( $_POST['valicode'] ==""&& $_POST['valicode'] !==$_SESSION["valicode"]){
					
				$msg = array("验证码错误","",$_U['query_url']."/".$_U['query_type']);
			}else{
			$data["user_id"]=$_G["user_id"];
			$data["fund"]=$_REQUEST["backfund"];
			$account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));
			if($data["fund"]> $account_result['fund']){
				$msg = array("可赎回金额不足","",$_U['query_url']."/".$_U['query_type']);
			}else{
				$log['user_id'] = $_G['user_id'];
				$log['type'] = "fund_back";
				$log['money'] = $data['fund'];
				$log['total'] = $account_result['total'];
				$log['use_money'] =  $account_result['use_money']+ $data['fund'];
				$log['no_use_money'] =  $account_result['no_use_money'];
				$log['collection'] =  $account_result['collection'];
				$log['fund'] =  $account_result['fund']-$data['fund'];
				$log['to_user'] = "0";
				$log['remark'] = "余额宝赎回";
				accountClass::AddLog($log);
				$msg = array("余额宝资金赎回成功","",$_U['query_url']."/".$_U['query_type']);
			}
			
		}
	}
	}
	elseif ($_U['query_type'] == "cash"){	
		$data['user_id'] = $_G['user_id'];
		$result = accountClass::GetUserLog($data);
		$_U['cash_log'] = $result;
		$data['page'] = $_U['page'];
		$data['epage'] = $_U['epage'];
		$result = accountClass::GetCashList($data);
		if (is_array($result)){
			$pages->set_data($result);
			$_U['account_cash_list'] = $result['list'];
			$_U['show_page'] = $pages->show(3);;
		}else{
			$msg = array($result);
		}
	}
	
	elseif ($_U['query_type'] == "recharge"){	
		$result = accountClass::GetUserLog(array("user_id"=>$_G['user_id']));
		$_U['account_log'] = $result;
	}
	
	elseif ($_U['query_type'] == "recharge_new"){
		include_once(ROOT_PATH."modules/payment/payment.class.php");
		if (isset($_POST['money'])){
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 0;
			$data['money'] = $_POST['money'];
			if(!is_numeric($_POST['payment1'])){
				$bco = $_POST['payment1'];
				$_POST['payment1']=32;
			}
			if (is_numeric($data['money'])){
				$data['remark'] = $_POST['remark'];
				$data['type'] = $_POST['type'];
				$url = "";
				if ($data['type']==1){
					$data['payment'] = $_POST['payment1'];
					$data['remark'] = $_POST['payname'.$_POST['payment1']]."在线充值";
					if ($data['money'] >= 5000){
						$data['fee'] = 50;
						$data['fee'] =0;
					}else{
						$data['fee'] = $data['money']*0.002;
						$data['fee']=0;
					}
				}else{
					$data['payment'] = $_POST['payment2'];
					$data['fee'] = 0;
				}
				
				
				$data['trade_no'] = time().$_G['user_id'].rand(1,9);
				$result = accountClass::AddRecharge($data);
				
				if ($data['type']==1){
					if(isset($bco)) $data['bankCode'] = $bco;
					$data['subject'] = "账号充值";
					//$data['subject'] = $_G['system']['con_webname']."账号充值";
					$data['body'] = "账号充值";
					$url = paymentClass::ToSubmit($data);
				}
				
				if ($result!==true){
					$msg = array($result,"",$_U['query_url']."/".$_U['query_type']);
				}else{
					if ($url!=""){
						header("Location: {$url}");
						exit;
					$msg = array("网站正在转向支付网站<br>如果没反应，请点击下面的支付网站接口","支付网站",$url);
					}else{
					$msg = array("你已经成功提交了充值，请等待管理员的审核。","",$_U['query_url']."/".$_U['query_type']);
					}
				}
			}else{
				$msg = array("金额填写有误","",$_U['query_url']."/".$_U['query_type']);
			
			}
		}else{
			$_U['account_payment_list'] = paymentClass::GetList(array("status"=>1));
			
		}
	}
	elseif ($_U['query_type'] == "bank"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        $verify_status = sendMessage::checkVerifyTypeStatus('add_bank_account_verify', $_G['user_id']);
        $magic->assign('verify_status',$verify_status);

        $data['user_id'] = $_G["user_id"];
		$result = accountClass::getBankInfo($data['user_id']);
        $num    = count($result);
        if (isset($_POST['account'])){ // 添加银行账户
            if ($verify_status === true) {
                $sendObj = new sendMessage(0,$_G["user_id"],'add_bank_account_verify');
                //$sendObj->getReceiveTeam();
                if ($sendObj->errorInfo === '') {
                    $status = $sendObj->verifyCodeCheck($_POST['verifyCode'], $_SESSION['user_id']);
                    if ($status === 1) {
                        $doJob = true;
                    } else {
                        $msg=array($sendObj->verifyResultName($status),"","/index.php?user&q=code/account/bank");
                    }
                } else {
                    $msg=array($sendObj->errorInfo,"","/index.php?user&q=code/account/bank");
                }
            } else {
                $doJob = true;
            }

            if (isset($doJob) && $doJob === true) {
                if ($num < 3) {
                    $var = array("account","bank","branch");
                    $data = post_var($var);
                    $data['user_id'] = $_G['user_id'];
                    if ($num == 0) {
                        $data['status'] = 1;
                    }
                    $result = accountClass::addBank($data);
                    if ($result!==true){
                        $msg = array($result);
                    }else{
                        $msg = array("恭喜,操作成功,请联系客服为您审核");
                    }
                } else {
                    $msg = array("抱歉,最多只允许添加三个银行账户");
                }
            }
        } else {
            // 显示银行账户信息页面
            $time = time();
            $magic->assign('num', $num);
            $_U['account_bank_result'] = $result;
        }
	}

    elseif ($_U['query_type'] == 'changeBank') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        $verify_status = sendMessage::checkVerifyTypeStatus('reset_bank_account_verify', $_G['user_id']);
        $magic->assign('verify_status',$verify_status);
        if (isset($_POST['update'])) {
            if ($verify_status === true) {
                $sendObj = new sendMessage(0,$_G["user_id"],'reset_bank_account_verify');
                //$sendObj->getReceiveTeam();
                $status = $sendObj->verifyCodeCheck($_POST['verifyCode'], $_SESSION['user_id']);
                if ($status === 1) {
                    $doJob = true;
                } else {
                    $msg=array($sendObj->verifyResultName($status),"","/index.php?user&q=code/account/bank");
                }
            } else {
                $doJob = true;
            }

            if (isset($doJob) && $doJob === true) {
                // 更新银行信息
                $var = array("account","bank","branch");
                $data = post_var($var);
                $data['status']  = 0;
                $data['is_update'] = 1;

                $result = accountClass::updateBank($data,$_G['user_id'],intval($_GET['id']));
                if ($result) {
                    $msg = array('恭喜,修改成功,请联系客服为您审核',"","/index.php?user&q=code/account/bank");
                } else {
                    $msg = array('抱歉,修改失败,请联系客服为您审核',"","/index.php?user&q=code/account/bank");
                }
            }
        } elseif (isset($_POST['delete'])) {
            if ($verify_status === true) {
                $sendObj = new sendMessage(0,$_G["user_id"],'reset_bank_account_verify');
                //$sendObj->getReceiveTeam();
                $status = $sendObj->verifyCodeCheck($_POST['verifyCode'], $_SESSION['user_id']);
                if ($status === 1) {
                    $doJob = true;
                } else {
                    $msg=array($sendObj->verifyResultName($status),"","/index.php?user&q=code/account/bank");
                }
            } else {
                $doJob = true;
            }

            if (isset($doJob) && $doJob === true) {
                // 删除银行信息
                $result = accountClass::deleteBank($_G['user_id'],intval($_GET['id']));
                if ($result) {
                    $msg = array('恭喜,删除成功',"","/index.php?user&q=code/account/bank");
                } else {
                    $msg = array('抱歉,删除失败',"","/index.php?user&q=code/account/bank");
                }
            }
        } else {
            // 查该行信息
            $result = accountClass::getOneBankInfo($_SESSION['user_id'],intval($_GET['id']));
            if (isset($result['bank'])) {
                $res = accountClass::checkAllowChange($_SESSION['user_id'], intval($_GET['id']));
                if ($res === true) {
                    $magic->assign('bank_info', $result);
                } else {
                    $msg = array('抱歉,必须保留一个已经生效的银行帐号信息');
                }
            } else {
                $msg = array('抱歉,没有找到相关的银行信息');
            }
        }
    }
	
	/*elseif ($_U['query_type'] == "bank"){
		if (isset($_POST['account'])){
			$var = array("user_id","account","bank","branch");
			$data = post_var($var);
			$result = accountClass::ActionBank($data);
			if ($result!==true){
				$msg = array($result);
			}else{
				$msg = array("操作成功");
			}
		}else{
			$data['user_id'] = $_G["user_id"];
			$result = accountClass::GetBankOne($data);
			$_U['account_bank_result'] = $result;
		}
	}*/
	
	
	elseif ($_U['query_type'] == "cash_new"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        // 查用户是否开启提现验证
        $verify_status = sendMessage::checkVerifyTypeStatus('withdraw_verify', $_G['user_id']);
        $magic->assign('verify_status',$verify_status);
        $data['user_id'] = $_G["user_id"];
		$result = accountClass::getUserBankInfo($_G['user_id']);
		$_U['account_bank_result'] = $result;
        // 提现

        $week_time = time() - 60*60*24*15;

        //用户资金
        $total = 0;
        $can_use_money = 0;
        $sql = 'select `total`,`use_money` from `dw_account` where `user_id` = '.$_G['user_id'];
        $array = $mysql->db_fetch_array($sql);
        $total = $array['total'];
        $can_use_money = $array['use_money'];

        // 7天内所有充值记录
        $sql = "select * from dw_account_recharge where user_id={$_G['user_id']} and status=1 and verify_time>={$week_time} order by `verify_time` asc";


        $week_recharge_log = mysql_query($sql);

        if ($week_recharge_log !== false) {
            if (mysql_num_rows($week_recharge_log) == 0) {
                $log_arr = array();
            } else {
                $log_arr = array();
                while ($row = mysql_fetch_assoc($week_recharge_log)) {
                    $log_arr[] = $row;
                }
                mysql_free_result($week_recharge_log);
            }
        } else {
            $log_arr = array();
        }

        $count = count($log_arr);
        if ($count > 0) {
            foreach ($log_arr as $key=>$value) {
                if (isset($log_arr[$key+1])) {
                    $t[] = array($log_arr[$key],$log_arr[$key+1]);
                } else {
                    $t[] = array($log_arr[$key],array('verify_time'=>time()));
                }
            }
            $week_recharge = 0;
            foreach ($t as $value) {
                // 两个充值段内的投标
                $sql = "select sum(ten.`account`) as total from dw_borrow_tender as ten
			            left join dw_borrow as bor
			            on bor.id = ten.borrow_id
			            where ten.user_id={$_G['user_id']} and bor.status!=5 and bor.status!=4 and ten.addtime>={$value[0]['verify_time']} and ten.addtime<={$value[1]['verify_time']}";
                $res = mysql_query($sql);
                if ($res !== false){
                    if (!$res){
                        $tend = 0;
                    }else{
                        $arr = mysql_fetch_row($res);
                        $tend = $arr[0];
                    }
                }else{
                    $tend = 0;
                }

                $week_recharge += $value[0]['money'];

                $d = $tend - $week_recharge;

                if ($d >= 0) {
                    $week_recharge -= $week_recharge;
                } else {
                    $week_recharge = $week_recharge - $tend;
                }
            }
        } else {
            $week_recharge = 0;
        }

        $free_cash = $can_use_money - $week_recharge;

        if ($free_cash > $can_use_money) {
            $free_cash = $can_use_money;
        }

        if($free_cash < 0){
            $free_cash = 0;
        }

        $proposal = $free_cash;

        if($proposal > $can_use_money){
            $proposal = $can_use_money;
        }

        if($proposal < 0){
            $proposal = 0;
        }

        $magic->assign('free_cash',$free_cash);
        $magic->assign('total',$total);
        $magic->assign('can_use_money',$can_use_money);
        $magic->assign('proposal',$proposal);
        // 提现
		if (count($_U['account_bank_result']) < 1){
			$msg = array("您还没有已经生效的银行帐号，请先填写","","{$_U['query_url']}/bank");
		}else{
			if(isset($_POST['money'])){
				if ($_U['account_bank_result'][0]['paypassword']==md5($_POST['paypassword'])){
                    if ($verify_status === true) {
                        $sendObj = new sendMessage(0,$_G["user_id"],'withdraw_verify');
                        //$sendObj->getReceiveTeam();
                        if ($sendObj->errorInfo === '') {
                            $status = $sendObj->verifyCodeCheck($_POST['verifyCode'], $_SESSION['user_id']);
                            if ($status === 1) {
                                $doJob = true;
                            } else {
                                $msg=array($sendObj->verifyResultName($status),"","/index.php?user&q=code/account/cash_new");
                            }
                        } else {
                            $msg=array($sendObj->errorInfo,"","/index.php?user&q=code/account/cash_new");
                        }
                    } else {
                        $doJob = true;
                    }

                    if (isset($doJob) && $doJob === true) {
                        $data['status'] = 0;
                        $data['total'] = $_POST['money'];
                        if (is_numeric($data['total'])){
                            $sub_bank_result = accountClass::getOneBankInfo($_G['user_id'], intval($_POST['bank']));
                            $flag = false;
                            if (!isset($sub_bank_result['bank'])) {
                                $msg = array('抱歉!没有找到匹配的银行账户信息',"","/index.php?user&q=code/account/cash_new");
                            } else {
                                if ($sub_bank_result['status'] != 1) {
                                    $msg = array('抱歉!你选择账户信息还未生效',"","/index.php?user&q=code/account/cash_new");
                                } else {
                                    $flag = true;
                                }
                            }

                            if ($flag === true) {
                                $data['account'] = $sub_bank_result['account'];
                                $data['bank']    = $sub_bank_result['bank'];
                                $data['branch']  = $sub_bank_result['branch'];

                                if($data['total'] < 100 || $data['total'] > 50000){
                                    $msg = array('您好，提现资金不能低于100元高于50000元');
                                    die('您好，提现资金不能低于100元高于50000元');
                                }
                                if($data['total'] <= $free_cash){
                                    if($data['total'] >= 100 && $data['total'] <= 30000){
                                        $data['fee'] = 0;
                                        $data['free_cash'] = $free_cash;
                                        $data['exceed'] = 0;
                                        //删
                                        //$data['fee'] = 0;
                                        //$data['free_cash']=0;
                                    }else if($data['total'] > 30000 && $data['total'] <= 50000){
                                        $data['fee'] = 0;
                                        $data['free_cash'] = $free_cash;
                                        $data['exceed'] = 0;
                                        //删
                                        //$data['fee'] = 0;
                                        //$data['free_cash']=0;
                                    }
                                }else{
                                    $exceed = $data['total'] - $free_cash; // 超出部分的提现额
                                    $exceed_fee = $exceed * 0.003;
                                    if($free_cash >= 0 && $free_cash < 1000){
                                        $free_cash_fee = 0;
                                        //$free_cash_fee = $free_cash * 0.003;
                                    }elseif($free_cash >= 1000 && $free_cash <= 30000){
                                        $free_cash_fee = 0;
                                        //$free_cash_fee = 3;
                                    }else{
                                        $free_cash_fee = 0;
                                        //$free_cash_fee = 5;
                                    }
                                    if($exceed == $data['total']){
                                        $free_cash_fee = 0;
                                    }
                                    $data['fee'] = floor(($exceed_fee + $free_cash_fee)*100)/100;
                                    $data['free_cash'] = $free_cash;
                                    $data['exceed'] = $exceed;
                                    //删
                                    //$data['fee'] = 0;
                                    //$data['exceed'] = 0;
                                    //$data['free_cash']=0;
                                }


                                $data['credited']=$data['total']-$data['fee'];
                                if ($data['total'] <= $result[0]['use_money']&&$data['total']>0){
                                    $_result = accountClass::AddCash($data);
                                    if ($_result!==true){
                                        $msg = array($_result);
                                    }else{
                                        $account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));
                                        $log['user_id'] = $_G['user_id'];
                                        $log['type'] = "cash_frost";
                                        $log['money'] = $data['total'];
                                        $log['total'] = $account_result['total'];
                                        $log['use_money'] =  $account_result['use_money']-$log['money'];
                                        $log['no_use_money'] =  $account_result['no_use_money']+$log['money'];
                                        $log['collection'] =  $account_result['collection'];
                                        $log['to_user'] = "0";
                                        $log['remark'] = "用户提现申请";
                                        if($account_result['xutou']>$log['money']){
                                            $log['xutou'] = $account_result['xutou']-$log['money'];
                                        }
                                        else{
                                            $log['xutou'] = 0;
                                        }
                                        accountClass::AddLog($log);
                                        $msg = array("您的提现已经提交，我们将在两个工作日内为你审核",'','/index.php?user&q=code/account/cash_new');
                                    }
                                }else{
                                    $msg = array("您的提现金额大于你所有的可用余额",'','/index.php?user&q=code/account/cash_new');
                                }
                            }
                        }else{
                            $msg = array("金额填写有误",'','/index.php?user&q=code/account/cash_new');

                        }
                    }
				}else{
					$msg = array("交易密码填写有误",'','/index.php?user&q=code/account/cash_new');
				}
			}
		}
	}
	
	//取消提现申请
	elseif ($_U['query_type'] == "cash_cancel"){
		$data['user_id'] =  $_G['user_id'];
		$data['id'] =  $_REQUEST['id'];
		$cash_result = accountClass::GetCashOne($data);
		
		if($cash_result!=false && $cash_result['status']==0){
			$data['status'] = 3;
			$_result = accountClass::UpdateCash($data);
			if ($_result!==true){
				$msg = array($_result);
			}else{
				$account_result = accountClass::GetOne($data);
				$log['user_id'] = $data['user_id'];
				$log['type'] = "cash_cancel";
				$log['money'] = $cash_result['total'];
				$log['total'] = $account_result['total'];
				$log['use_money'] = $account_result['use_money']+$cash_result['total'];
				$log['no_use_money'] = $account_result['no_use_money']-$cash_result['total'];
				$log['collection'] =  $account_result['collection'];
				$log['to_user'] = "0";
				$log['remark'] = "取消提现解冻";
				accountClass::AddLog($log);
				$msg = array("成功取消提现");
			}
		}else{
			$msg = array("请不要乱操作");
		}
	
	}
}
	
$template = "user_account.html";
?>
