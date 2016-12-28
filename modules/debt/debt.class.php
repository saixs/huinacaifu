<?php

/* ծȨת��
 * @Author: Waitfox@qq.com
 * @Date: 2013-11-13 11:34:52
 * @Desc: debt
 */

class debtClass {

    /**
     * ����ת�õ�ծȨ
     * @global type $mysql
     * @param type $data
     * @return type
     */
    public static function getDebtingList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";
        if (!empty($user_id)) {
            $_sql .= " and p1.user_id = $user_id";
        }
        if (!empty($username)) {
            $_sql .= " and p2.username = '$username'";
        }
        if (isset($data['borrow_id']) && $data['borrow_id'] != "") {
            $_sql .= " and p1.borrow_id = '{$data['borrow_id']}'";
        }

        if (isset($data['dotime2'])) {
            $dotime2 = ($data['dotime2'] == "request") ? $_REQUEST['dotime2'] : $data['dotime2'];
            if ($dotime2 != "") {
                $_sql .= " and p1.addtime < " . get_mktime($dotime2);
            }
        }
        if (isset($data['dotime1'])) {
            $dotime1 = ($data['dotime1'] == "request") ? $_REQUEST['dotime1'] : $data['dotime1'];
            if ($dotime2 != "") {
                $_sql .= " and p1.addtime > " . get_mktime($dotime1);
            }
        }
        if (isset($data['status']) && $data['status'] != "") {
            $_sql .= " and p1.status in ({$data['status']})";
        }
//        if (isset($data['borrow_status']) && $data['borrow_status'] != "") {
            $_sql .= " and p3.status in (1,3)";
//        }
        if (isset($data['debt'])) {
            $_sql .= " and p1.debt={$data['debt']}";
        }

        if (isset($data['keywords']) && $data['keywords'] != "") {
            $_sql .= " and p1.name like '%" . str_replace('<', urldecode($data['keywords'])) . "%'";
        }
        $_select = "p1.*,p1.id as tid,CONVERT(p1.money,SIGNED) as money,CONVERT(p1.account,SIGNED) as tender_account,CONVERT(p1.money,SIGNED) as tender_money,p2.user_id as borrow_userid,p2.username as op_username,p3.apr,p3.time_limit,p3.is_liuzhuan,p3.name as borrow_name,p3.id as borrow_id,p3.account ,p3.account_yes ";
        $sql = "select SELECT from `{borrow_tender}` as p1
                left join `{borrow}` as p3 on p1.borrow_id=p3.id 
                left join `{user}` as p2 on p3.user_id = p2.user_id				
		 {$_sql}  order by p1.id asc LIMIT";

        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $_limit), $sql));

            foreach ($result as $key => $value) {
                $list[$key]['account'] = round($value['account'], 2);
                $list[$key]['repayment_account'] = round($value['repayment_account'], 2);
                $list[$key]['repayment_yesaccount'] = round($value['repayment_yesaccount'], 2);
                $list[$key]['wait_account'] = round($value['wait_account'], 2);
                $list[$key]['repayment_yesinterest'] = round($value['repayment_yesinterest'], 2);
                $list[$key]['wait_interest'] = round($value['wait_interest'], 2);
                //��ȡ����
                //��ȡ����
                $result[$key]['other'] = $value['account'] - $value['account_yes'];
                $result[$key]['scale'] = round(100 * $value['account_yes'] / $value['account'], 1);
                $result[$key]['scale_width'] = round((20 * $value['account_yes'] / $value['account'])) * 7;
                $result[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);
                $_data['year_apr'] = $value['apr'];
                $_data['account'] = $value['tender_account'];
                $_data['month_times'] = $value['time_limit'];
                $_data['borrow_style'] = $value['style'];
                $_data['type'] = "all";
                $_data['isday'] = $value['isday'];
                $_data['time_limit_day'] = $value['time_limit_day'];
                $result[$key]['equal'] = borrowClass::EqualInterest($_data);
            }
            return $result;
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
//        echo str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql);
        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
//        echo str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql);
        $list = $list ? $list : array();
        foreach ($list as $key => $value) {
            //��ȡ����
            if (empty($value['account']))
                $value['account'] = 1;
            $_data['year_apr'] = $value['apr'];
            $_data['account'] = $value['account'];
            $_data['month_times'] = $value['time_limit'];
            $_data['borrow_style'] = $value['style'];
            $_data['isday'] = $value['isday'];
            $_data['time_limit_day'] = $value['time_limit_day'];
            $list[$key]['equal'] = borrowClass::EqualInterest($_data);
            $list[$key]['other'] = $value['account'] - $value['account_yes'];
            $list[$key]['scale'] = round(100 * $value['account_yes'] / $value['account'], 1);
            $list[$key]['scale_width'] = round((20 * $value['account_yes'] / $value['account'])) * 7;
            $list[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);
            $list[$key]['wait_interest'] = $value['wait_interest'] < 0 ? 0 : $value['wait_interest'];
        }

        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    public static function debtAlter(array $data) {
        global $mysql;
        $sql = "UPDATE {borrow_tender} SET debt={$data['status']} WHERE id={$data['tender_id']} AND user_id={$data['user_id']} ";
        $mysql->db_query($sql);
        if (mysql_affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * ���ծȨת��
     * @global type $mysql
     * @param type $data
     * @return boolean
     */
    public static function AddDebt($data = array()) {
        global $mysql;
        if (empty($data)) return false;
        //����Ѿ����ڣ��򷵻�
        $sqlExist="SELECT * FROM {borrow_debt} WHERE tender_id={$data['tender_id']}";
        $ret=$mysql->db_fetch_array($sqlExist);
        if(!empty($ret)) return false;
        $sql = "insert into `{borrow_debt}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }
        return $mysql->db_query($sql);
    }

    /**
     * ��ȡת���е�ծȨ����Ϣ
     * @global type $mysql
     * @param type $data
     * @return type
     */
    public static function getDebtList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];
        $_sql = "where 1=1";
        if (!empty($user_id)) {
            $_sql .= " and p1.user_id = $user_id";
        }
        if (isset($data['status']) && $data['status'] != "") {
            $_sql .= " and p1.status ={$data['status']}";
        }
        if (isset($data['touser']) && $data['touser'] != "") {
            $_sql .= " and p1.touser ={$data['touser']}";
        }
        $_select = "p1.*,p2.username,p3.name borrow_name,p3.is_liuzhuan ";
        $sql = "select SELECT from `{borrow_debt}` as p1
                left join `{user}` as p2 on p2.user_id = p1.user_id 
                left join `{borrow}` as p3 on p3.id=p1.borrow_id 
		 {$_sql}  order by p1.id asc LIMIT";
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $_limit), $sql));
            return $result;
        }
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
        $list2 = $list ? $list : array();
        return array(
            'list' => $list2,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    /**
     * ����ծȯ��Ͷ�꽱���ݲ�����
     * @modify 0.1 �����ý���ȼӺ�������ٳ������
     * @param type $data
     */
    public static function debtBuy($data = array()) {
        global $mysql;
        $uid = $data['user_id']; //ת����
        $touid = $data['touser']; //������
        //����ת���ߵĿ��ý��
        $acc2 = self::getOneAccount(array("user_id" => $uid));
        $money2 = $data['tomoney'];//ԭ��*�ۿ�
        $log2['user_id'] = $uid;
        $log2['type'] = 'debt';
        $log2['money'] = $money2;
        $log2['total'] = $acc2['total'] + $log2['money'];
        $log2['use_money'] = $acc2['use_money'] + $log2['money'];
        $log2['no_use_money'] = $acc2['no_use_money'];
        $log2['collection'] = $acc2['collection'];
        $log2['to_user']=$touid;
        $log2['remark'] = "{$data['borrow_id']}-{$data['tender_id']}��ծȨת����������";
        accountClass::AddLog($log2);
        
        //��ȥת���ߵĴ���
        $acc = self::getOneAccount(array("user_id" => $uid));
        $money = $data['money'] + $data['interest'];//ԭ��+��Ϣ
        $log['user_id'] = $uid;
        $log['type'] = 'debt';
        $log['money'] = $money;
        $log['total'] = $acc['total'] - $log['money'];
        $log['use_money'] = $acc['use_money'];
        $log['no_use_money'] = $acc['no_use_money'];
        $log['collection'] = $acc['collection'] - $log['money'];
        $log['to_user']=$touid;
        $log['remark'] = "{$data['borrow_id']}-{$data['tender_id']}��ծȨת�ÿ۳�ԭ����";
        accountClass::AddLog($log);
        
        //���������ߴ���
        $acc4 = self::getOneAccount(array("user_id" => $touid));
        $money4 = $data['money'] + $data['interest'];////ԭ��+��Ϣ
        $log4['user_id'] = $touid;
        $log4['type'] = 'debt';
        $log4['money'] = $money4;
        $log4['total'] = $acc4['total']+ $log4['money'];
        $log4['use_money'] = $acc4['use_money'];
        $log4['no_use_money'] = $acc4['no_use_money'];
        $log4['collection'] = $acc4['collection']+$log4['money'];
        $log4['to_user']=$uid;
        $log4['remark'] = "{$data['borrow_id']}-{$data['tender_id']}��ծȨ�������Ӵ���";
        accountClass::AddLog($log4);
        
        //�������������
        $acc3 = self::getOneAccount(array("user_id" => $touid));
        $money3 = $data['tomoney'];//ԭ��*�ۿ�
        $log3['user_id'] = $touid;
        $log3['type'] = 'debt';
        $log3['money'] = $money3;
        $log3['total'] = $acc3['total'] - $log3['money'];
        $log3['use_money'] = $acc3['use_money'] - $log3['money'];
        $log3['no_use_money'] = $acc3['no_use_money'];
        $log3['collection'] = $acc3['collection'];
        $log3['to_user']=$uid;
        $log3['remark'] = "{$data['borrow_id']}-{$data['tender_id']}��ծȨ����֧���ۿ�";
        accountClass::AddLog($log3);
        
        //����Ͷ�����Ϣ
        $sql="UPDATE {borrow_tender} SET user_id={$touid} WHERE id={$data['tender_id']}";
        $mysql->db_query($sql);
        if( mysql_affected_rows()>0){
            return TRUE;
        }
        
    }

    /**
     * ��ȡ��ֻת��ծȨ����Ϣ
     * @param type $bid
     */
    public static function getDebtOne($bid) {
        global $mysql;
        $bid = (int) $bid;
        $sqldebt = "SELECT * FROM {borrow_debt} WHERE id={$bid}";
        $ret = $mysql->db_fetch_array($sqldebt);
        return $ret;
    }

    /**
     * ����ծȯ
     * @param array $data
     */
    public static function updateDebt(array $data) {
        global $mysql;
        $sql = "update `{borrow_debt}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }
        $sql .= " where id={$data['id']}";
        return $mysql->db_query($sql);
    }
    
    /**
     * ��ȡ�ʽ���Ϣ��ԭ�е�Ч��̫��
     * @global type $mysql
     * @param type $data
     * @return type
     */
    public static function getOneAccount($data = array()) {
        global $mysql;
        $sql = "SELECT * FROM  {account} WHERE user_id={$data['user_id']}";
        $result = $mysql->db_fetch_array($sql);
        if ($result == false) {
            $sql = "insert into `{account}` set user_id = '{$data['user_id']}'";
            $mysql->db_query($sql);
            $result = self:: getOneAccount($data);
        }
        return $result;
    }

}

?>
