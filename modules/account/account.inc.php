<?php
if (!defined('ROOT_PATH'))  die('���ܷ���');//��ֱֹ�ӷ���
include_once("account.class.php");
include_once(ROOT_PATH.'modules/credit/credit.inc.php');
//��ȡ����

if (isset($_POST['valicode']) && strtolower($_POST['valicode'])!=$_SESSION['valicode']){
//if (1!=1){
		$msg = array("��֤�����","",$_U['query_url']."/".$_U['query_type']);
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
        die('�Ƿ�����');
	
    //��ȡ���ʽ�䶯�б�
	$_U["fundlist"]=accountClass::GetfundList(array("user_id"=>$_G["user_id"]));
		
		
	if($_REQUEST["fund"]){
		if ( $_POST['valicode'] ==""&& $_POST['valicode'] !==$_SESSION["valicode"]){
		
			$msg = array("��֤�����","",$_U['query_url']."/".$_U['query_type']);
		}else{
		$data["user_id"]=$_G["user_id"];
		$data["fund"]=$_REQUEST["fund"];
		$account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));
		if($data["fund"]> $account_result['use_money']){
			$msg = array("�ʺſ�������","",$_U['query_url']."/".$_U['query_type']);
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
			$log['remark'] = "������";
			accountClass::AddLog($log);
			 
			$msg = array("����ֵ�ɹ�","",$_U['query_url']."/".$_U['query_type']);
		}
	
	}
								 
	}
	}
	elseif ($_U['query_type'] == "backfund"){
        die('�Ƿ�����');
		if($_REQUEST["backfund"]){
			if ( $_POST['valicode'] ==""&& $_POST['valicode'] !==$_SESSION["valicode"]){
					
				$msg = array("��֤�����","",$_U['query_url']."/".$_U['query_type']);
			}else{
			$data["user_id"]=$_G["user_id"];
			$data["fund"]=$_REQUEST["backfund"];
			$account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));
			if($data["fund"]> $account_result['fund']){
				$msg = array("����ؽ���","",$_U['query_url']."/".$_U['query_type']);
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
				$log['remark'] = "�����";
				accountClass::AddLog($log);
				$msg = array("���ʽ���سɹ�","",$_U['query_url']."/".$_U['query_type']);
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
					$data['remark'] = $_POST['payname'.$_POST['payment1']]."���߳�ֵ";
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
					$data['subject'] = "�˺ų�ֵ";
					//$data['subject'] = $_G['system']['con_webname']."�˺ų�ֵ";
					$data['body'] = "�˺ų�ֵ";
					$url = paymentClass::ToSubmit($data);
				}
				
				if ($result!==true){
					$msg = array($result,"",$_U['query_url']."/".$_U['query_type']);
				}else{
					if ($url!=""){
						header("Location: {$url}");
						exit;
					$msg = array("��վ����ת��֧����վ<br>���û��Ӧ�����������֧����վ�ӿ�","֧����վ",$url);
					}else{
					$msg = array("���Ѿ��ɹ��ύ�˳�ֵ����ȴ�����Ա����ˡ�","",$_U['query_url']."/".$_U['query_type']);
					}
				}
			}else{
				$msg = array("�����д����","",$_U['query_url']."/".$_U['query_type']);
			
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
        if (isset($_POST['account'])){ // ��������˻�
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
                        $msg = array("��ϲ,�����ɹ�,����ϵ�ͷ�Ϊ�����");
                    }
                } else {
                    $msg = array("��Ǹ,���ֻ����������������˻�");
                }
            }
        } else {
            // ��ʾ�����˻���Ϣҳ��
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
                // ����������Ϣ
                $var = array("account","bank","branch");
                $data = post_var($var);
                $data['status']  = 0;
                $data['is_update'] = 1;

                $result = accountClass::updateBank($data,$_G['user_id'],intval($_GET['id']));
                if ($result) {
                    $msg = array('��ϲ,�޸ĳɹ�,����ϵ�ͷ�Ϊ�����',"","/index.php?user&q=code/account/bank");
                } else {
                    $msg = array('��Ǹ,�޸�ʧ��,����ϵ�ͷ�Ϊ�����',"","/index.php?user&q=code/account/bank");
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
                // ɾ��������Ϣ
                $result = accountClass::deleteBank($_G['user_id'],intval($_GET['id']));
                if ($result) {
                    $msg = array('��ϲ,ɾ���ɹ�',"","/index.php?user&q=code/account/bank");
                } else {
                    $msg = array('��Ǹ,ɾ��ʧ��',"","/index.php?user&q=code/account/bank");
                }
            }
        } else {
            // �������Ϣ
            $result = accountClass::getOneBankInfo($_SESSION['user_id'],intval($_GET['id']));
            if (isset($result['bank'])) {
                $res = accountClass::checkAllowChange($_SESSION['user_id'], intval($_GET['id']));
                if ($res === true) {
                    $magic->assign('bank_info', $result);
                } else {
                    $msg = array('��Ǹ,���뱣��һ���Ѿ���Ч�������ʺ���Ϣ');
                }
            } else {
                $msg = array('��Ǹ,û���ҵ���ص�������Ϣ');
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
				$msg = array("�����ɹ�");
			}
		}else{
			$data['user_id'] = $_G["user_id"];
			$result = accountClass::GetBankOne($data);
			$_U['account_bank_result'] = $result;
		}
	}*/
	
	
	elseif ($_U['query_type'] == "cash_new"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        // ���û��Ƿ���������֤
        $verify_status = sendMessage::checkVerifyTypeStatus('withdraw_verify', $_G['user_id']);
        $magic->assign('verify_status',$verify_status);
        $data['user_id'] = $_G["user_id"];
		$result = accountClass::getUserBankInfo($_G['user_id']);
		$_U['account_bank_result'] = $result;
        // ����

        $week_time = time() - 60*60*24*15;

        //�û��ʽ�
        $total = 0;
        $can_use_money = 0;
        $sql = 'select `total`,`use_money` from `dw_account` where `user_id` = '.$_G['user_id'];
        $array = $mysql->db_fetch_array($sql);
        $total = $array['total'];
        $can_use_money = $array['use_money'];

        // 7�������г�ֵ��¼
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
                // ������ֵ���ڵ�Ͷ��
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
        // ����
		if (count($_U['account_bank_result']) < 1){
			$msg = array("����û���Ѿ���Ч�������ʺţ�������д","","{$_U['query_url']}/bank");
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
                                $msg = array('��Ǹ!û���ҵ�ƥ��������˻���Ϣ',"","/index.php?user&q=code/account/cash_new");
                            } else {
                                if ($sub_bank_result['status'] != 1) {
                                    $msg = array('��Ǹ!��ѡ���˻���Ϣ��δ��Ч',"","/index.php?user&q=code/account/cash_new");
                                } else {
                                    $flag = true;
                                }
                            }

                            if ($flag === true) {
                                $data['account'] = $sub_bank_result['account'];
                                $data['bank']    = $sub_bank_result['bank'];
                                $data['branch']  = $sub_bank_result['branch'];

                                if($data['total'] < 100 || $data['total'] > 50000){
                                    $msg = array('���ã������ʽ��ܵ���100Ԫ����50000Ԫ');
                                    die('���ã������ʽ��ܵ���100Ԫ����50000Ԫ');
                                }
                                if($data['total'] <= $free_cash){
                                    if($data['total'] >= 100 && $data['total'] <= 30000){
                                        $data['fee'] = 0;
                                        $data['free_cash'] = $free_cash;
                                        $data['exceed'] = 0;
                                        //ɾ
                                        //$data['fee'] = 0;
                                        //$data['free_cash']=0;
                                    }else if($data['total'] > 30000 && $data['total'] <= 50000){
                                        $data['fee'] = 0;
                                        $data['free_cash'] = $free_cash;
                                        $data['exceed'] = 0;
                                        //ɾ
                                        //$data['fee'] = 0;
                                        //$data['free_cash']=0;
                                    }
                                }else{
                                    $exceed = $data['total'] - $free_cash; // �������ֵ����ֶ�
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
                                    //ɾ
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
                                        $log['remark'] = "�û���������";
                                        if($account_result['xutou']>$log['money']){
                                            $log['xutou'] = $account_result['xutou']-$log['money'];
                                        }
                                        else{
                                            $log['xutou'] = 0;
                                        }
                                        accountClass::AddLog($log);
                                        $msg = array("���������Ѿ��ύ�����ǽ���������������Ϊ�����",'','/index.php?user&q=code/account/cash_new');
                                    }
                                }else{
                                    $msg = array("�������ֽ����������еĿ������",'','/index.php?user&q=code/account/cash_new');
                                }
                            }
                        }else{
                            $msg = array("�����д����",'','/index.php?user&q=code/account/cash_new');

                        }
                    }
				}else{
					$msg = array("����������д����",'','/index.php?user&q=code/account/cash_new');
				}
			}
		}
	}
	
	//ȡ����������
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
				$log['remark'] = "ȡ�����ֽⶳ";
				accountClass::AddLog($log);
				$msg = array("�ɹ�ȡ������");
			}
		}else{
			$msg = array("�벻Ҫ�Ҳ���");
		}
	
	}
}
	
$template = "user_account.html";
?>
