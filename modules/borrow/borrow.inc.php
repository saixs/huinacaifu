<?php
if (!defined('ROOT_PATH')) die('���ܷ���'); //��ֱֹ�ӷ���
include_once("borrow.class.php");
if ($_U['query_type'] == "add" || $_U['query_type'] == "update" || $_U['query_type'] == "addliuzhuan") {
    $var = array("name", "use", "time_limit", "style", "account", "apr", "istyhk", "lowest_account", "most_account", "valid_time", "award", "part_account", "funds", "fundsadd", "is_false", "open_account", "open_borrow", "open_tender", "open_credit", "content", "is_dsm", "is_vouch", "vouch_award", "vouch_user", "time_limit_day", "maindetail");
    $data = post_var($var);
    $data['account'] = round($data['account']);
    if (!isset($_POST['name'])) {
        $msg = array("�벻Ҫ�Ҳ���", "", "/publish/main.html");
    } elseif ($_POST['valicode'] !=strtolower($_POST['valicode'])) {
        $msg = array("��֤�벻��ȷ");
    } elseif (isset($_POST['ismb']) && $data['account'] > 2000000) {
        $msg = array("������ܳ���2000000Ԫ");
    } elseif (isset($_POST['ismb']) && $data['account'] < 500) {
        $msg = array("���������500Ԫ");
    } elseif (isset($_POST['ismb']) && $_POST['islz'] != 1 && (!isset($data['apr']) || trim($data['apr']) == "")) {
        $msg = array("���ʲ���Ϊ��");
    } elseif (isset($_POST['ismb']) && $_POST['islz'] != 1 && $data['apr'] < 1) {
        $msg = array("���ʲ���С��1");
    } elseif (isset($_POST['ismb']) && $_POST['islz'] != 1 && $data['apr'] < 1) {
        $msg = array("���ʲ���С��1");
    } elseif (trim($_POST['name']) == "") {
        $msg = array("���ⲻ��Ϊ��");
    } elseif ($_POST['style'] == 1 && $_POST['time_limit'] % 3 != 0) {
        $msg = array("��ѡ����ǰ�����������������д3�ı���");
    } elseif (($data['account'] % 100) != 0) {
        $msg = array('��������Ϊ100��������');
    } elseif (trim($_G['user_id']) == "") {
        $msg = array("�û�ID����Ϊ�գ�����session��������µ�½");
    } else {

        // ��ʱ�����괦��
        if (isset($_POST['is_crond'])) {
            $crond_time = pick_time($_POST['crond_time']);
            if ($crond_time > 0 && $crond_time > time()) { // ����ʱ�������ڵ�ǰʱ���������
                $data['is_crond']   = 1;
                $data['crond_time'] = $crond_time;
            } else {
                $msg = array("��ʱ����ʱ�䲻���Ϲ淶",'', "index.php?user&q=code/borrow/publish");
                return 0;
            }
        } else {
            $data['is_crond']   = 0;
            $data['crond_time'] = 0;
        }

        if (isset($_POST['ismb'])) {
            $data['time_limit'] = 1;
            $data['is_mb'] = intval($_POST['ismb']);
            $data['is_crond']   = 0;
            $data['crond_time'] = 0;
        }



        /*if(isset($_POST['isday'])&&intval($_POST['isday'])==1)
        {
            $data['time_limit'] = 1;
            $data['isday']=intval($_POST['isday']);
            $data['time_limit_day']=$_POST['time_limit_day'];
        }*/
        if (isset($_POST['islz'])) {
            $data['is_liuzhuan'] = $_POST['islz'];
            $data['old_loanee'] = $_POST['old_loanee'];
            $data['old_date'] = $_POST['old_date'];
            $data['old_time'] = $_POST['old_time'];
            $data['old_apr'] = $_POST['old_apr'];
            $data['apr'] = $data['old_apr'];
            $data['apr_add'] = $_POST['apr_add'];
            $data['lowest_months'] = $_POST['lowest_months'];
            $data['add_months'] = $_POST['add_months'];
            $data['per_account'] = $_POST['per_account'];
            $data['max_nums'] = $_POST['max_nums'];
            $data['r_nums'] = $data['account'] / $_POST['per_account'];
            // $data['time_limit'] =$_POST['old_time'];

            if ($data['isday'] == 1) {
                $data['time_limit'] = $data['time_limit_day'];
                $data['valid_time'] = $data['time_limit_day'];
            } else {
                $data['valid_time'] = $data['time_limit'] * 30;
            }
            $data['most_account'] = $_POST['max_nums'] * $_POST['per_account'];
            $data['lowest_account'] = $_POST['per_account'];

        }
        if (isset($_POST['isfast'])) {
            $data['is_fast'] = intval($_POST['isfast']);
            $data['fastid'] = intval($_POST['fastid']);
        }
        if (isset($_POST['isjin'])) {
            $data['is_jin'] = intval($_POST['isjin']);
        }
        if (isset($_POST['isDXB'])) {
            $data['is_dxb'] = intval($_POST['isDXB']);
            $data['pwd'] = $_POST['pwd'];
        }
        if (isset($_POST['is_cz']) && $_POST['is_cz'] == "yes") {
            $data['is_cz'] = 1;
            $data['czid'] = $_POST['cz_id'];
        }

        if ($_POST['time_limit'] == 100) {
            $data['time_limit'] = 1;
            $data['isday'] = 1;
            $data['time_limit_day'] = 15;
            $data['style'] = 0;
        }
        $data['open_account'] = 1;
        $data['open_borrow'] = 1;
        $data['open_credit'] = 1;
        if ($_POST['submit'] == "����ݸ�") {
            $data['status'] = -1;
        } else {
            $data['status'] = 0;
        }
        $data['user_id'] = $_G['user_id'];
        $user_id = $_G['user_id'];
        if ($_U['query_type'] == "add" || $_U['query_type'] == "addliuzhuan") {
            if ($_U['query_type'] == "addliuzhuan") {
                $sql = "select * from {borrow} where status<2 and is_liuzhuan=3 and user_id='{$user_id}'";
            } else {
                $sql = "select * from {borrow} where status<2 and is_liuzhuan=0 and  user_id='{$user_id}'";
            }
            $result1 = $mysql->db_fetch_array($sql);
            if ($result1 != false && 1 == 2) {
                $msg = array("�㻹�б�û����", "index.php?user&q=code/borrow/publish");
                return 0;

            }
            //Ͷ�����
            $sdf = borrowClass::GetUserLog(array("user_id" => $_G['user_id']));

            $account_result = accountClass::GetOne(array("user_id" => $_G['user_id'])); //��ȡ��ǰ�û������
            $account_money = ($data['apr'] * $data['account'] / (100 * 12));
            if ($data['is_mb'] && $account_result['use_money'] < $account_money) {
                $result = "��������һ���µ���Ϣ";

            } /*elseif($data['is_fast']){

			}elseif(($account_result['use_money'] + $sdf['credit'])<$account_money){
				$result = "�ʻ�����";
			}*/ else {
                $result = $data['is_mb'];
                $result = $data['is_mb'] && $account_result['use_money'] < $account_money;
                $log['user_id'] = $_G['user_id'];
                $log['type'] = "mb_frost";
                $log['money'] = $account_money;
                $log['total'] = $account_result['total'];
                $log['use_money'] = $account_result['use_money'] - $log['money'];
                $log['no_use_money'] = $account_result['no_use_money'] + $log['money'];
                $log['collection'] = $account_result['collection'];
                $log['remark'] = "������궳���ʽ�";

                if ($log['use_money'] < 0 && $data['is_cz']) {
                    $result = "��������";

                } else {
                    if ($data['is_mb'] == 1) {
                        $sql1 = "select * from `{account_log}` where user_id=" . $_G['user_id'] . " and remark='������궳���ʽ�' order by id desc limit 1";
                        $result1 = $mysql->db_fetch_array($sql1);

                        if (time() - $result1['addtime'] <= 10) {
                            $aa = time() - $result1['addtime'];
                            //  $msg = array("�����̫���˰ɣ����Ժ�30�������.","","/index.php?user&q=code/borrow/bid");
                            // return 0;
                        } else {
                            $apr = isset($_G['system']['con_borrow_apr']) ? $_G['system']['con_borrow_apr'] : "22.18";
                            if ($data['apr'] <= $apr) {
                                accountClass::AddLog($log); //��Ӽ�¼
                            }

                        }
                        unset($log);
                    }
                    $log = array();
                    if ($data['is_cz'] == 1) {
                        $log['user_id'] = $_G['user_id'];
                        $log['type'] = "czdj";
                        $log['money'] = $data['account'] * $_G['system']['con_cz_dj'];
                        $log['total'] = $account_result['total'];
                        $log['use_money'] = $account_result['use_money'] - $log['money'];
                        $log['no_use_money'] = $account_result['no_use_money'] + $log['money'];
                        $log['collection'] = $account_result['collection'];
                        $log['remark'] = "���鶳���ʽ�";
                        accountClass::AddLog($log); //��Ӽ�¼
                    }
                    $result = borrowClass::Add($data);
                }
            }
            //�������˶�ȵ�
        } else {
            $data['id'] = $_POST['id'];
            $data['user_id'] = $_G['user_id'];
            $result = borrowClass::Update($data);
        }
        if ($result === true) {
//			global $mysql;
//			$auto['id']=$mysql->db_insert_id();
//			$auto['user_id']=$_G['user_id'];
//			$auto['total_jie']=$data['account'];
//			$auto['zuishao_jie']=$data['lowest_account'];
//			borrowClass::auto_borrow($auto);
            $msg = array("�������ɹ�,��ȴ���ˡ�", "", "/index.php?user&q=code/borrow/publish");
        } else {
            $msg = array($result);
        }

    }

} elseif ($_U['query_type'] == 'securityMoneyLog') {
    define('HOME_ACCESS',TRUE);
    //error_reporting(E_ALL);
    include_once $_SERVER['DOCUMENT_ROOT'].'/include/init.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/plugins/page.php';
    $url = 'index.php?user&q=code/borrow/securityMoneyLog';
    $sql = "SELECT * FROM `previous_security_money_log`";
    $page = new myPage($sql,$url, 20);
    $magic->assign('list', $page->pageList);
    $magic->assign('navigate', $page->pageNavigate);
} elseif ($_U['query_type'] == "cancel") {
    $data['id'] = $_REQUEST['id'];
    $data['user_id'] = $_G['user_id'];
    $result = borrowClass::Cancel($data);
    if ($result == true) {
        $msg = array("�����ɹ�", "", "index.php?user&q=code/borrow/publish");
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        $receive_user_id = sendMessage::getTenderUserId(intval($data['id']));
        $sendObj = new sendMessage(1,$receive_user_id,'borrow_cancel_remind');
        $sendObj->getReceiveTeam();
        $content = '������ı�ı��:'.intval($data['id']).'�Ѿ�������,����ע��˶��ʽ���ϸ,�����κ���������������ϵ';
        $sendObj->send($content);
    } else {
        $msg = array("����ʧ�ܣ�����״̬�Ѿ��Ѿ����ڡ���ˢ�º����", "", "index.php?user&q=code/borrow/publish");
        //$msg = $result;
    }
} //ɾ��
elseif ($_U['query_type'] == "del") {
    $msg = array('������ɾ���Ѿ������Ľ��','','/index.php?user&q=code/borrow/publish');
    /*$data['id'] = $_REQUEST['id'];
    $data['user_id'] = $_G['user_id'];
    $data['status'] = -1;
    $result = borrowClass::Delete($data);
    if ($result == false) {
        $msg = array($result,'','/index.php?user&q=code/borrow/publish');
    } else {
        $msg = array("�б�ɾ���ɹ�!",'','/index.php?user&q=code/borrow/publish');
    }*/
} //�û�Ͷ��
elseif ($_U['query_type'] == "tender") {
    if ($_SESSION['valicode'] != strtolower($_POST['valicode'])) {
        $msg = array("��֤�����");
    } else {
        if (!isset($_SESSION['user_id']) || $_G['user_id'] <= 0) {
            $msg = array("���ȵ�¼�ʺ�",'','/user/login.html');
        }else{
            include_once(ROOT_PATH . "modules/account/account.class.php");
            $borrow_result = borrowClass::GetOne(array("id" => $_POST['id'], "tender_userid" => $_G['user_id'])); //��ȡ����ĵ�����Ϣ
            $account_money = $_POST['money'];
            if ($_G['user_id'] == $borrow_result['user_id']) {
                $msg = array("�벻ҪͶ���Լ������Ľ��");
            } elseif ($_G['user_result']['islock'] == 1) {
                $msg = array("���˺��Ѿ������������ܽ���Ͷ�꣬�������Ա��ϵ");
            } elseif (!is_array($borrow_result)) {
                $msg = array($borrow_result);
            } elseif ($borrow_result['account_yes'] >= $borrow_result['account']) {
                $msg = array("�˱�������������Ͷ");
            } elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] < 1) {
                $msg = array("�˱���δͨ�����");
            } elseif ($_POST['dxbPWD'] != $borrow_result['pwd'] && $borrow_result['is_dxb'] == 1) {
                $msg = array("�˱�Ϊ����꣬����������벻�ԣ�����ϵ������");
            } elseif ($borrow_result['verify_time'] + $borrow_result['valid_time'] > time()) {
                $msg = array("�˱��ѹ���");
            } elseif (!is_numeric($account_money)) {
                $msg = array("��������ȷ�Ľ��");
            } elseif ($account_money - intval($account_money) > 0) {
                $msg = array("������Ľ�����С���㣬����������");
            } elseif ($account_money <= 0) {
                $msg = array("��������ȷ�Ľ��");
            } elseif ($account_money < $borrow_result['lowest_account']) {
                $msg = array("������Ľ��С���������");
            } elseif ($borrow_result['most_account'] > 0 && ($borrow_result['tender_yes'] > $borrow_result['most_account'] || $borrow_result['tender_yes'] + $account_money > $borrow_result['most_account'])) {
                $msg = array("�����Ͷ����" . ($borrow_result['tender_yes'] + $account_money) . "�Ѿ�������߽��{$borrow_result['most_account']}");
            } elseif (md5($_POST['paypassword']) != $_G['user_result']['paypassword']) {
                $msg = array("֧���������벻��ȷ");
            } else {
                $account_result = accountClass::GetOne(array("user_id" => $_G['user_id'])); //��ȡ��ǰ�û������

                if (($borrow_result['account'] - $borrow_result['account_yes']) < $account_money) {
                    $account_money = $borrow_result['account'] - $borrow_result['account_yes'];
                }
                $borrow_id = $_POST['id'];
                $sqllock = "select get_lock('m_" . $borrow_id . "', 30) as status";
                $sqlunlock = "select release_lock('m_" . $borrow_id . "') as status";
                $mysql->db_query($sqllock);
                $sql = "select is_dsm,p.* from `{borrow}` p  where  id = " . $_POST['id'];


                $resultb = $mysql->db_fetch_array($sql);

                if ($resultb['is_mb'] == 1 && $resultb['is_dsm'] == 1) {

                    if (((int)$account_money) > ((int)$account_result['collection'])) {
                        $msg = array("���ն�Ȳ�����Ͷ��");
                        return 0;
                    }
                }

                if ($account_result['use_money'] < $account_money or $account_result['use_money'] < 0 or $account_money < 0) {
                    $msg = array("��������");
                } elseif ($resultb['status'] == 1) {
                    $sql1 = "select * from `{borrow_tender}` where user_id=" . $_G['user_id'] . " order by id desc limit 1";
                    $result1 = $mysql->db_fetch_array($sql1);
                    $aa = time() - $result1['addtime'];
                    if (time() - $result1['addtime'] <= 10) {
                        $aa = time() - $result1['addtime'];
                        $msg = array("�����̫���˰ɣ����Ժ�10�������.", "", "/index.php?user&q=code/borrow/bid");
                        return 0;
                    }
                    if ($_POST['money'] < 0) {
                        // $aa=time()-$result1['addtime'];
                        $msg = array("�����̫���˰ɣ����Ժ�10�������.", "", "/index.php?user&q=code/borrow/bid");
                        return 0;
                    }
                    $data['borrow_id'] = $_POST['id'];
                    $data['money'] = $_POST['money'];
                    $data['per_account'] = 0;
                    $data['account'] = $account_money;
                    $data['user_id'] = $_G['user_id'];
                    $data['status'] = 1;
                    $data['month_nums'] = $_POST['month_nums'];
                    if (($resultb['account_yes']) < $resultb['account']) {
                        $result = borrowClass::AddTender($data); //��ӽ���
                    } else {
                        $msg = array("�˱��Ѿ�Ͷ��.�´ΰɣ�лл", "", "/index.php?user&q=code/borrow/bid");
                        return 0;

                    }
                    $mysql->db_query($sqlunlock);

                    //Ͷ�����

                    $log['user_id'] = $_G['user_id'];
                    $log['type'] = "tender";
                    $log['money'] = $account_money;
                    $log['total'] = $account_result['total'];
                    $log['use_money'] = $account_result['use_money'] - $log['money'];
                    $log['no_use_money'] = $account_result['no_use_money'] + $log['money'];
                    $log['collection'] = $account_result['collection'];
                    $log['to_user'] = $borrow_result['user_id'];
                    $log['remark'] = "Ͷ�궳���ʽ�";
                    accountClass::AddLog($log); //��Ӽ�¼

                    if ($result == false) {
                        $msg = array($result);
                    } else {

                        $borrow_result = borrowClass::GetOne(array("id" => $_POST['id'], "tender_userid" => $_G['user_id'])); //��ȡ����ĵ�����Ϣ
                        if ($borrow_result['is_mb'] == 1 && ($borrow_result['account_yes']) == $borrow_result['account']) {
                            $data_e['id'] = $_POST['id'];
                            $data_e['status'] = '3';
                            $data_e['repayment_remark'] = '�Զ�����';
                            borrowClass::AddRepayment($data_e);


                            //$dhr = borrowClass::GetRepaymentList(array('id'=>$_POST['id'],'user_id'=>$borrow_result['user_id']));

                            $ssf = "select p1.id from {borrow_repayment} as p1  where borrow_id = " . $_POST['id'];
                            $dhr = $mysql->db_fetch_arrays($ssf);

                            foreach ($dhr as $vve) {
                                $datae['id'] = $vve['id'];
                                $datae['user_id'] = $borrow_result['user_id'];
                                if ($datae['id']) $result = borrowClass::Repay($datae); //��ȡ��ǰ�û������
                            }
                        }


                        $msg = array("Ͷ��ɹ�", "", "/index.php?user&q=code/borrow/bid");
                    }
                }
            }
        }
    }
} //��ת�û�Ͷ��
elseif ($_U['query_type'] == "liuzhuantender") {
    if ($_SESSION['valicode'] != strtolower($_POST['valicode'])) {
        $msg = array("��֤�����");
    } else {
        include_once(ROOT_PATH . "modules/account/account.class.php");
        $borrow_result = borrowClass::GetOne(array("id" => $_POST['id'], "tender_userid" => $_G['user_id'])); //��ȡ����ĵ�����Ϣ
        $account_money = $_POST['money'];
        $borrow_result['r_months'] = round(($borrow_result['verify_time'] + $borrow_result['time_limit'] * 30 * 24 * 60 * 60 - time()) / (30 * 24 * 60 * 60));
        if ($borrow_result['isday'] == 1) {
            $borrow_result['r_months'] = round(($borrow_result['verify_time'] + $borrow_result['time_limit'] * 24 * 60 * 60 - time()) / (24 * 60 * 60));
        }

        $account_money = $_POST['account_nums'] * $borrow_result['per_account'];
        if ($_G['user_result']['islock'] == 1) {
            $msg = array("���˺��Ѿ������������ܽ���Ͷ�꣬�������Ա��ϵ");
        } elseif (!is_array($borrow_result)) {
            $msg = array($borrow_result);
        } elseif ($borrow_result['account_yes'] >= $borrow_result['account']) {
            $msg = array("�˱�������������Ͷ");
        } elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] < 1) {
            $msg = array("�˱���δͨ�����");
        } elseif ($_POST['dxbPWD'] != $borrow_result['pwd'] && $borrow_result['is_dxb'] == 1) {
            $msg = array("�˱�Ϊ����꣬����������벻�ԣ�����ϵ������");
            //}elseif ($borrow_result['verify_time'] + $borrow_result['valid_time']>time()){
            //	$msg = array("�˱��ѹ���");
        } elseif (!is_numeric($account_money)) {
            $msg = array("��������ȷ�Ľ��");
        } elseif ($account_money - intval($account_money) > 0) {
            $msg = array("������Ľ�����С���㣬����������");
        } elseif ($account_money <= 0) {
            $msg = array("��������ȷ�Ľ��");
        } elseif ($account_money < $borrow_result['lowest_account']) {
            $msg = array("������Ľ��С���������");
        } elseif ($borrow_result['most_account'] > 0 && $account_money > $borrow_result['most_account']) {
            $msg = array("�����Ͷ����" . ($borrow_result['tender_yes'] + $account_money) . "�Ѿ�������߽��{$borrow_result['most_account']}");
        } elseif (md5($_POST['paypassword']) != $_G['user_result']['paypassword']) {
            $msg = array("֧���������벻��ȷ");
        } elseif ($_POST['month_nums'] > $borrow_result['r_months']) {
            $msg = array("�Ϲ�����������");
        } elseif ($_POST['month_nums'] < 1 or $_POST['month_nums'] < $borrow_result['lowest_months']) {
            $msg = array("�Ϲ�������д����");
        } else {
            $account_result = accountClass::GetOne(array("user_id" => $_G['user_id'])); //��ȡ��ǰ�û������

            if (($borrow_result['account'] - $borrow_result['account_yes']) < $account_money) {
                $account_money = $borrow_result['account'] - $borrow_result['account_yes'];
            }
            $sql = "select * from `{borrow}`  where  id = " . $_POST['id'];

            $resultb = $mysql->db_fetch_array($sql);
            if ($account_result['use_money'] < $account_money or $account_result['use_money'] < 0 or $account_money < 0) {
                $msg = array("��������");
            } elseif ($resultb['status'] == 1) {
                $sql1 = "select * from `{borrow_tender}` where user_id=" . $_G['user_id'] . " order by id desc limit 1";
                $result1 = $mysql->db_fetch_array($sql1);
                $aa = time() - $result1['addtime'];
                if (time() - $result1['addtime'] <= 10) {
                    $aa = time() - $result1['addtime'];
                    $msg = array("�����̫���˰ɣ����Ժ�10�������.", "", "/index.php?user&q=code/borrow/bid");
                    return 0;
                }
                if ($_POST['money'] < 0) {
                    // $aa=time()-$result1['addtime'];
                    $msg = array("�����̫���˰ɣ����Ժ�10�������.", "", "/index.php?user&q=code/borrow/bid");
                    return 0;
                }
                $data['borrow_id'] = $_POST['id'];
                $data['money'] = $_POST['account_nums'] * $borrow_result['per_account'];
                $data['per_account'] = $account_money / $borrow_result['per_account'];
                $data['auto_liuzhuan'] = (int)$_POST['auto_liuzhuan'];
                $data['account'] = $account_money;

                $data['month_nums'] = $_POST['month_nums'];
                if ($borrow_result['istyhk'] == 1) {
                    $data['month_nums'] = $borrow_result['r_months'];
                }
                if ($data['month_nums'] <= 0) {
                    $msg = array("�˱��Ѿ����ڣ��������Ϲ�", "", "/index.php?user&q=code/borrow/bid");
                    return 0;
                }
                // $data['tender_type']=$_POST['tender_type'];
                $data['tender_type'] = $borrow_result['style'];
                $month_nums = $data['month_nums'];
                $data['user_id'] = $_G['user_id'];
                $data['status'] = 1;
                if (($resultb['account_yes']) < $resultb['account']) {
                    $result = borrowClass::AddTender($data); //��ӽ���
                    $tender_id = $result;
                } else {
                    $msg = array("�˱��Ѿ�Ͷ��.�´ΰɣ�лл", "", "/index.php?user&q=code/borrow/bid");
                    return 0;

                }


                //Ͷ�����

                $log['user_id'] = $_G['user_id'];
                $log['type'] = "tender";
                $log['money'] = $account_money;
                $log['total'] = $account_result['total'];
                $log['use_money'] = $account_result['use_money'] - $log['money'];
                $log['no_use_money'] = $account_result['no_use_money'] + $log['money'];
                $log['collection'] = $account_result['collection'];
                $log['to_user'] = $borrow_result['user_id'];
                $log['remark'] = "Ͷ�궳���ʽ�";
                accountClass::AddLog($log); //��Ӽ�¼

                if ($result == false) {
                    $msg = array($result);
                } else {

                    $borrow_result = borrowClass::GetOne(array("id" => $_POST['id'], "tender_userid" => $_G['user_id'])); //��ȡ����ĵ�����Ϣ
                    if ($borrow_result['is_mb'] == 1 && ($borrow_result['account_yes']) == $borrow_result['account']) {
                        $data_e['id'] = $_POST['id'];
                        $data_e['status'] = '3';
                        $data_e['repayment_remark'] = '�Զ�����';
                        borrowClass::AddRepayment($data_e);


                        //$dhr = borrowClass::GetRepaymentList(array('id'=>$_POST['id'],'user_id'=>$borrow_result['user_id']));

                        $ssf = "select p1.id from {borrow_repayment} as p1  where borrow_id = " . $_POST['id'];
                        $dhr = $mysql->db_fetch_arrays($ssf);

                        foreach ($dhr as $vve) {
                            $datae['id'] = $vve['id'];
                            $datae['user_id'] = $borrow_result['user_id'];
                            if ($datae['id']) $result = borrowClass::Repay($datae); //��ȡ��ǰ�û������
                        }
                    }
                    if ($tender_id > 0) {
                        borrowClass::AddRepaymentLZ(array("id" => $_POST['id'], "month_nums" => $month_nums, "money" => $account_money, "tender_id" => $tender_id));
                    }

                    $msg = array("Ͷ��ɹ�", "", "/index.php?user&q=code/borrow/bid");
                }
            }
        }
    }
} //������Ͷ��
elseif ($_U['query_type'] == "vouch") {
    $msg = "";
    if ($_SESSION['valicode'] != strtolower($_POST['valicode'])) {
        $msg = array("��֤�����");
    } else {
        include_once(ROOT_PATH . "modules/account/account.class.php");
        $borrow_result = borrowClass::GetOne(array("id" => $_POST['id'], "tender_userid" => $_G['user_id'])); //��ȡ����ĵ�����Ϣ

        $vouch_account = $_POST['money'];
        if (($borrow_result['account'] - $borrow_result['vouch_account']) < $vouch_account) {
            $account_money = $borrow_result['account'] - $borrow_result['vouch_account'];
        } else {
            $account_money = $vouch_account;
        }

        $uacc = borrowClass::GetUserLog(array('user_id' => $_G['user_id']));

        if ($_G['user_result']['islock'] == 1) {
            $msg = array("���˺��Ѿ������������ܽ��е������������Ա��ϵ");
        } elseif (!is_array($borrow_result)) {
            $msg = array($borrow_result);
        } elseif ($uacc['total'] < $account_money) {
            $msg = array("�����ʻ��ܶ�С�����뵣�����ܽ����ܵ���");
        } elseif ($borrow_result['vouch_account'] >= $borrow_result['account']) {
            $msg = array("�˵����굣����������������ٵ���");
        } elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] != 1) {
            $msg = array("�˱���δͨ�����");
        } elseif ($borrow_result['verify_time'] + $borrow_result['valid_time'] > time()) {
            $msg = array("�˱��ѹ���");
        } elseif (md5($_POST['paypassword']) != $_G['user_result']['paypassword']) {
            $msg = array("֧���������벻��ȷ");
        } else {
            //��ȡͶ�ʵĵ������borrowClass::GetUserLog
            $vouch_amount = borrowClass::GetAmountOne($_G['user_id'], "tender_vouch");

            if ($vouch_amount['account_use'] < $account_money) {
                $msg = array("���ĵ�������");
            } else {
                $data['borrow_id'] = $_POST['id'];
                $data['vouch_account'] = $vouch_account;
                $data['account'] = $account_money;
                $data['user_id'] = $_G['user_id'];
                $data['content'] = $_POST['content'];
                $data['status'] = 0;

                //�ж��Ƿ��ǵ�����
                if ($borrow_result['vouch_user'] != "") {
                    $_vouch_user = explode("|", $borrow_result['vouch_user']);
                    if (!in_array($_G['user_result']['username'], $_vouch_user)) {
                        $msg = array("�˵������Ѿ�ָ���˵����ˣ��㲻�Ǵ˵����ˣ����ܽ��е���");
                    }
                }
                if ($msg == "") {
                    $result = borrowClass::AddVouch($data); //��ӵ�����
                    if ($result == false) {
                        $msg = array($result);
                    } else {
                        $msg = array("�����ɹ�", "", "/index.php?user&q=code/borrow/bid");
                        $_SESSION['valicode'] = "";

                    }
                }
            }
        }
    }
} //�鿴Ͷ��
elseif ($_U['query_type'] == "repayment_view") {
    $data['id'] = $_REQUEST['id'];
    if ($data['id'] == "") {
        $msg = array("������������");
    }
    $data['user_id'] = $_G['user_id'];
    $result = borrowClass::GetOne($data); //��ȡ��ǰ�û������
    if ($result == false) {
        $msg = array("���Ĳ�������");
    } else {
        $_U['borrow_result'] = $result;
    }
} //�ύ����
elseif ($_U['query_type'] == "repayment_cz") {
    exit;
    global $mysql;

    $data['id'] = $_REQUEST['id'];
    if ($data['id'] == "") {
        $msg = array("������������");
    }
    $data['user_id'] = $_G['user_id'];
    $result = borrowClass::getlate_cz($data['id']); //��ȡ��Ƿ�ܶ�
    $result_user = borrowClass::GetUserLog($data['user_id']); //��Ա�ʻ����
    $can_borrow = sprintf("%d", $result + ($result * $_G['system']['con_late_rate']) * 30);

    $us = $mysql->db_fetch_array("select chongzu_id from dw_user where user_id={$data['user_id']}");
    if ($us['chongzu_id'] > 0) {
        $msg = array("����һ������ծ������Ľ�û�����꣬���ܽ����µ�ծ������");
    } elseif ($result == false) {
        $msg = array("���Ĳ�������");
    } elseif ($result_user['use_money'] < $can_borrow * $_G['system']['con_cz_dj']) {
        $s = $can_borrow * $_G['system']['con_cz_dj'];
        $sx = ($_G['system']['con_cz_dj'] * 100) . "%";
        $msg = array("���Ŀ�������˽�������ܶ��{$sx}��$sԪ����������˽������飬���ȳ�ֵ");
    } else {
        $_SESSION['cz_id'] = $data['id'];
        $_SESSION['cz_can_total'] = $can_borrow;
        $_SESSION['cz_yes'] = true;
        header("Location:/publish/index.html?type=month&x=cz");
        exit;
    }
} //����
elseif ($_U['query_type'] == "repay") {
    $data['id'] = $_REQUEST['id'];
    if ($data['id'] == "") {
        $msg = array("������������");
    }
    $data['user_id'] = $_G['user_id'];
    $result = borrowClass::Repay($data); //��ȡ��ǰ�û������
    if ($result !== true) {
        $msg = array($result);
        include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
        $receive_user_id = sendMessage::getTenderUserId(intval($data['id']));
        $sendObj = new sendMessage(1,$receive_user_id,'repay_remind');
        $sendObj->getReceiveTeam();
        $content = '������ı�ı��:'.intval($data['id']).'�Ѿ�����,����ע��˶��ʽ���ϸ,�����κ���������������ϵ';
        $sendObj->send($content);
    } else {
        $msg = array("����ɹ�", "", "/index.php?user&q=code/borrow/repayment");
    }
} //����
elseif ($_U['query_type'] == "limitapp") {
    if (isset($_POST['account']) && $_POST['account'] > 0) {
        $var = array("account", "content", "type", "remark");
        $data = post_var($var);
        $data['user_id'] = $_G['user_id'];
        $result = borrowClass::GetAmountApplyOne(array("user_id" => $data['user_id'], "type" => $data['type']));
        if ($result != false && $result['verify_time'] + 60 * 60 * 24 * 30 > time()) {
            $msg = array("��һ���º�������");
        } elseif ($result != false && $result['addtime'] + 60 * 60 * 24 * 30 > time() && $result['status'] == 2) {
            $msg = array("���Ѿ��ύ�����룬��ȴ����");
        } else {
            $data['status'] = 2;
            $result = borrowClass::AddAmountApply($data); //��ȡ��ǰ�û������
            if ($result !== true) {
                $msg = array($result);
            } else {
                $msg = array("�������ɹ�����ȴ�����Ա���", "", "/index.php?user&q=code/borrow/limitapp");
            }
        }
    }
} //�����Զ�Ͷ��
elseif ($_U['query_type'] == "auto_add") {
    $_POST['user_id'] = $_G['user_id'];
    $_POST['addtime'] = time();
    $re = borrowClass::add_auto($_POST);
    $msg = array($re, "", "/index.php?user&q=code/borrow/auto");
} //�޸��Զ�Ͷ��
elseif ($_U['query_type'] == "auto_new" && is_numeric($_GET['id'])) {
    $result = borrowClass::GetAutoId($_GET['id']);
    $_U['auto_result'] = $result;
} //ɾ���Զ�Ͷ��
elseif ($_U['query_type'] == "auto_del" && is_numeric($_GET['id'])) {
    $result = borrowClass::del_auto($_GET['id']);
    if ($result) $msg = array("�Զ�Ͷ��ɾ���ɹ�", "", "/index.php?user&q=code/borrow/auto");
} else {
    $data['user_id'] = $_G['user_id'];
    $sql = "SELECT * FROM {account} WHERE `user_id`={$data['user_id']}";
    $account_result = $mysql->db_fetch_array($sql);
    $num = count($auto_setting);
    $allow_num = floor($account_result['total'] / 500000) + 1;
    $magic->assign('allow_num', $allow_num);
}

$template = "user_borrow.html";
if ($_U['query_type'] == "auto" || $_U['query_type'] == "auto_new") $template = "auto_user_borrow.html";
?>
