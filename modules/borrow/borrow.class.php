<?

/* * ****************************
 * $File: borrow.class.php
 * $Description: ���ݿ⴦���ļ�
 * $Author: dongdong 
 * $Time:2009-03-09
 * $Update:None 
 * $UpdateDate:None 
 * **************************** */
include_once(ROOT_PATH . "modules/account/account.class.php");
include_once("amount.class.php");
include_once(ROOT_PATH . "modules/credit/credit.class.php");
require_once("modules/remind/remind.class.php");

class borrowClass extends amountClass {

    const ERROR = '���������벻Ҫ�Ҳ���';
    const BORROW_NAME_NO_EMPTY = '���ı��ⲻ��Ϊ��';
    const BORROW_ACCOUNT_NO_EMPTY = '������Ϊ��';
    const BORROW_APR_NO_EMPTY = '������ʲ���Ϊ��';
    const BORROW_ACCOUNT_NO_MAX = '���ܸ�����߶��';
    const BORROW_ACCOUNT_NO_MIN = '���ܵ�������޶�';
    const BORROW_APR_NO_MIN = '�������С���������';
    const BORROW_APR_NO_MAX = '������ʲ��ܸ�������޶�';
    const BORROW_REPAYMENT_NOT_ENOUGH = '�ʻ������������Ҫ����Ľ��';
    const BORROW_ACCOUNT_MAZ_ACC = '����Ȳ��ܴ��������';
    const NO_LOGIN = '��û�е�¼';

    /**
     * �б�
     *
     * @return Array
     */
    function GetList($data = array()) {
        global $mysql;
	    //var_dump($data);
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = {$data['user_id']}";
        }
        if (isset($data['username']) && $data['username'] != "") {
            $_sql .= " and p2.username like '%{$data['username']}%'";
        }

	    if (isset($data['project_type'])) {
		    $type = $data['project_type'];
		    if ($type == "all") {
			    $_sql .= " ";
		    } elseif ($type == "personal") {
			    $_sql .= " and p1.use in (244,245) ";
		    } elseif ($type == "enterprise") {
			    $_sql .= " and p1.use=246 ";
		    } elseif ($type == "gov") {
			    $_sql .= " and p1.use=247";
		    } else {
			    $_sql .= " ";
		    }
	    }

        if (isset($data['type'])) {
            $type = $data['type'];
            if ($type == "") {
                $_sql .= "  and (p1.status=1 or p1.status=3 ) ";
            } elseif ($type == "all") {
                $_sql .= " and (p1.status=1 or p1.status=3 ) ";
            } elseif ($type == "review") {
                $_sql .= " and p1.account=p1.account_yes ";
            } elseif ($type == "reviews") {
                $_sql .= " and p1.account=p1.account_yes ";
                $_sql .= " and p1.status=1";
            } elseif ($type == "success") {
                $_sql .= " and p1.status=3 and p1.repayment_yesaccount>=p1.repayment_account";
            } elseif ($type == "vouch") {
                $_sql .= " and p1.is_vouch=1 and p1.status=1";
            } elseif ($type == "now") {//���ڻ�
                $_sql .= " and p1.repayment_account!=p1.repayment_yesaccount ";
            } elseif ($type == "yes") {//�ѻ�
                $_sql .= " and p1.repayment_account=p1.repayment_yesaccount ";
            } elseif ($type == "late") {//����
                $_sql .= " and p1.verify_time+p1.valid_time*24*60*60<" . time();
            } elseif ($type == 'is_failed') {
                $_sql .= " and p1.is_failed=1 ";
            } elseif ($type == 'wait') {
                $_sql .= " and (p1.status=1 or (p1.status=3 and p1.repayment_yesaccount<p1.repayment_account)) and is_liuzhuan!=1 ";
            } elseif ($type == 'index') {
                $_sql .= " and (p1.status=1 or (p1.status=0 and p1.is_crond=1) or (p1.status=3 and p1.repayment_yesaccount<p1.repayment_account)) and is_liuzhuan!=1 ";
            }
        }
	    if (isset($data['is_day']) && $data['is_day'] != "") {
		    $_sql .= " and p1.`isday`=1 ";
	    }
        if (isset($data['dotime2']) && $data['dotime2'] != "") {
            $dotime2 = ($data['dotime2'] == "request") ? $_REQUEST['dotime2'] : $data['dotime2'];
            if ($dotime2 != "") {
                $_sql .= " and p1.addtime < " . get_mktime($dotime2);
            }
        }
        if (isset($data['dotime1']) && $data['dotime1'] != "") {
            $dotime1 = ($data['dotime1'] == "request") ? $_REQUEST['dotime1'] : $data['dotime1'];
            if ($dotime2 != "") {
                $_sql .= " and p1.addtime > " . get_mktime($dotime1);
            }
        }

        if (isset($data['status']) && $data['status'] != "" && $data['status'] != "undefined") {
            if ($data['status'] == 6) {
                $_sql .= "and (p1.status =3 or (p1.status=1 and p1.is_liuzhuan=1))";
            } else {
                $_sql .= " and p1.status in ({$data['status']})";
            }
        }
        if (isset($data['is_vouch']) && $data['is_vouch'] != "") {
            $_sql .= " and p1.is_vouch in ({$data['is_vouch']})";
        }
        if (isset($data['is_liuzhuan']) && $data['is_liuzhuan'] != "") {
            $_sql .= " and p1.is_liuzhuan in ({$data['is_liuzhuan']})";
        }

	    if (isset($data['limittime1']) && $data['limittime1'] != "") {
		    $_sql .= " and p1.time_limit >= {$data['limittime1']} ";
	    } else {
		    if (isset($data['limittime']) && $data['limittime'] != "") {
			    $_sql .= " and p1.time_limit = {$data['limittime']}";
		    }
	    }

	    if (isset($data['limittime2']) && $data['limittime2'] != "") {
		    $_sql .= " and p1.time_limit <= {$data['limittime2']} and p1.isday != 1";
	    }

        if (isset($data['use']) && $data['use'] != "") {
            $_sql .= " and p1.use in ({$data['use']})";
        }
        if (isset($data['award']) && $data['award'] != "") {
            if ($data['award'] == 1) {
                $_sql .= " and p1.award >0";
            } else {
                $_sql .= " and p1.award = 0";
            }
        }
        if (isset($data['style']) && $data['style'] != "") {
            $_sql .= " and p1.style in ({$data['style']})";
        }

        if (isset($data['keywords']) && $data['keywords'] != "") {
            //$_sql .= " and (p1.name like '%".urldecode($data['keywords'])."%' or u.username like '%".urldecode($data['keywords'])."%')";
            $_sql .= " and (p1.name like '%" . str_replace('\'', '', urldecode($data['keywords'])) . "%' or u.username like '%" . str_replace('\'', '', urldecode($data['keywords'])) . "%')";
        }

        if (isset($data['province']) && $data['province'] != "") {
            $_sql .= " and p2.province ={$data['province']}";
        }

        if (isset($data['city']) && $data['city'] != "") {
            $_sql .= " and p2.city ={$data['city']}";
        }

        if (isset($data['use']) && $data['use'] != "") {
            $_sql .= " and p1.use in ({$data['use']})";
        }

        if (isset($data['account1']) && $data['account1'] != "") {
            $_sql .= " and p1.account >= {$data['account1']}";
        }

        if (isset($data['account2']) && $data['account2'] != "") {
            $_sql .= " and p1.account <= {$data['account2']}";
        }
        if (isset($data['apr1']) && $data['apr1'] != "") {
            $_sql .= " and p1.apr >= {$data['apr1']}";
        }

        if (isset($data['apr2']) && $data['apr2'] != "") {
            $_sql .= " and p1.apr <= {$data['apr2']}";
        }
        $_order = " order by p1.`status`  ASC ,p1.id desc ";

        if (isset($data['order']) && $data['order'] != "") {
            $order = $data['order'];
            if ($order == "account_up") {
                $_order = " order by (p1.`account`+0) desc ";
            } else if ($order == "account_down") {
                $_order = " order by (p1.`account`+0) asc";
            }
            if ($order == "credit_up") {
                $_order = " order by p3.`value` desc,p1.id desc ";
            } else if ($order == "credit_down") {
                $_order = " order by p3.`value` asc,p1.id desc ";
            }

            if ($order == "apr_up") {
                $_order = " order by p1.`apr` desc,p1.id desc ";
            } else if ($order == "apr_down") {
                $_order = " order by p1.`apr` asc,p1.id desc ";
            }

            if ($order == "jindu_up") {
                $_order = " order by `scales` desc,p1.id desc ";
            } else if ($order == "jindu_down") {
                $_order = " order by `scales` asc,p1.id desc ";
            }
            if ($order == "flag") {
                $_order = " order by p1.is_vouch desc,p1.`flag` desc,p1.id desc ";
            }
            if ($order == "index") {
                $_order = " order by p1.`flag` desc,p1.id desc ";
            }
            if ($order == "index_custom") {
                $_order = " order by p1.`status` asc,p1.id desc ";
            }
        }

        $_select = " p1.*,p6.isqiye,p6.id as fastid,p2.username,p2.area as user_area ,u.username as kefu_username,p2.qq,p3.value as credit_jifen,p4.pic as credit_pic,p5.area as add_area,p1.account_yes/p1.account as scales";
        $sql = "select SELECT from `{borrow}` as p1 
				 left join `{user}` as p2 on p1.user_id=p2.user_id
				 left join `{user_cache}` as uca on uca.user_id=p1.user_id
				 left join `{user}` as u on u.user_id=uca.kefu_userid
				 left join `{credit}` as p3 on p1.user_id=p3.user_id 
				left join `{credit_rank}` as p4 on p3.value<=p4.point2  and p3.value>=p4.point1
				 left join `{userinfo}` as p5 on p1.user_id=p5.user_id 
				 left join `{daizi}` as p6 on p1.id=p6.borrow_id 
				$_sql ORDER LIMIT";
        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));

            foreach ($list as $key => $value) {
                //��ȡ����
                $list[$key]['other'] = $value['account'] - $value['account_yes'];
                $list[$key]['scale'] = round(100 * $value['account_yes'] / $value['account'], 1);
                $list[$key]['scale_width'] = round((20 * $value['account_yes'] / $value['account'])) * 7;
                $list[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);

                //��ȡ��������
                $list[$key]['vouch_scale'] = round(100 * $value['vouch_account'] / $value['account'], 1);
                $list[$key]['vouch_other'] = $value['account'] - $value['vouch_account'];
                $list[$key]['vouchscale_width'] = round((20 * $value['vouch_account'] / $value['account'])) * 7;
                $list[$key]['addtime'] = date("Y-m-d", $value['addtime']);
            }


            return $list;
        }
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";


        $_list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql));
        $_list = $_list ? $_list : array();
        $result = array();
        $list = array();

        foreach ($_list as $key => $value) {
            //��ȡ����
            $list[$key]['scale'] = round(100 * $value['account_yes'] / $value['account'], 1);
            $list[$key]['other'] = $value['account'] - $value['account_yes'];
            $list[$key]['scale_width'] = round((20 * $value['account_yes'] / $value['account'])) * 7;
            $list[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);
            //��ȡ��������

            $list[$key]['lave_time'] = $value['verify_time'] + $value['valid_time'] * 24 * 60 * 60 - time();
            //if($list[$key]['is_liuzhuan']==1){
            $list[$key]['r_months1'] = round(($value['verify_time'] + $value['time_limit'] * 30 * 24 * 60 * 60 - time()) / (30 * 24 * 60 * 60));
            // }
            $list[$key]['vouch_scale'] = round(100 * $value['vouch_account'] / $value['account'], 1);
            $list[$key]['vouch_other'] = $value['account'] - $value['vouch_account'];
            $list[$key]['vouchscale_width'] = round((20 * $value['vouch_account'] / $value['account'])) * 7;
            foreach ($value as $_key => $_value) {
                $list[$key][$_key] = $_value;
            }
        }

        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

//һ����ǰ���ı꼰Ͷ�� by xiaogu
    function GetListnear($data = array()) {

        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];
        $forwardtime2 = time()+60;
        $forwardtime1 = time()-60;
        $_sql = "where 1=1";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = {$data['user_id']}";
        }
        if (isset($data['bor']) && $data['bor'] != "") {
            $_sql .= " and p1.addtime>" . $forwardtime1 . " and p1.addtime<" . $forwardtime2;
        }
        if (isset($data['ten']) && $data['ten'] != "") {
            $_sql .= " and td.addtime>" . $forwardtime1 . " and td.addtime<" . $forwardtime2;
        }

        if (isset($data['dotime2']) && $data['dotime2'] != "") {
            $dotime2 = ($data['dotime2'] == "request") ? $_REQUEST['dotime2'] : $data['dotime2'];
            if ($dotime2 != "") {
                $_sql .= " and p1.addtime < " . get_mktime($dotime2);
            }
        }
        if (isset($data['dotime1']) && $data['dotime1'] != "") {
            $dotime1 = ($data['dotime1'] == "request") ? $_REQUEST['dotime1'] : $data['dotime1'];
            if ($dotime2 != "") {
                $_sql .= " and p1.addtime > " . get_mktime($dotime1);
            }
        }

        if (isset($data['status']) && $data['status'] != "" && $data['status'] != "undefined") {
            if ($data['status'] == 6) {
                $_sql .= "and (p1.status =3 or (p1.status=1 and p1.is_liuzhuan=1))";
            } else {
                $_sql .= " and p1.status in ({$data['status']})";
            }
        }

        $_order = " order by p1.`status`  ASC ,p1.id desc ";
        $_select = " p1.*,p1.user_id as buser_id,td.user_id as tuser_id,p2.username,p2.area as user_area ,u.username as kefu_username,p2.qq,p1.account_yes/p1.account as scales,tu.username as tname,td.account as fee";
        $sql = "select SELECT from `{borrow}` as p1 
                                 left join `{borrow_tender}` as td on p1.id=td.borrow_id
				 left join `{user}` as p2 on p1.user_id=p2.user_id
                                 left join `{user}` as tu on td.user_id=tu.user_id
				 left join `{user_cache}` as uca on uca.user_id=p1.user_id
				 left join `{user}` as u on u.user_id=uca.kefu_userid
				$_sql ORDER LIMIT";

        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql);
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));

            foreach ($list as $key => $value) {
                //��ȡ����
                $list[$key]['other'] = $value['account'] - $value['account_yes'];
                $list[$key]['scale'] = round(100 * $value['account_yes'] / $value['account'], 1);
                $list[$key]['scale_width'] = round((20 * $value['account_yes'] / $value['account'])) * 7;
                $list[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);

                //��ȡ��������
                $list[$key]['vouch_scale'] = round(100 * $value['vouch_account'] / $value['account'], 1);
                $list[$key]['vouch_other'] = $value['account'] - $value['vouch_account'];
                $list[$key]['vouchscale_width'] = round((20 * $value['vouch_account'] / $value['account'])) * 7;
                $list[$key]['addtime'] = date("Y-m-d", $value['addtime']);
            }


            return $list;
        }
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";


        $_list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql));
        $_list = $_list ? $_list : array();
        $result = array();
        $list = array();

        foreach ($_list as $key => $value) {
            //��ȡ����
            $list[$key]['scale'] = round(100 * $value['account_yes'] / $value['account'], 1);
            $list[$key]['other'] = $value['account'] - $value['account_yes'];
            $list[$key]['scale_width'] = round((20 * $value['account_yes'] / $value['account'])) * 7;
            $list[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);
            //��ȡ��������

            $list[$key]['lave_time'] = $value['verify_time'] + $value['valid_time'] * 24 * 60 * 60 - time();
            //if($list[$key]['is_liuzhuan']==1){
            $list[$key]['r_months1'] = round(($value['verify_time'] + $value['time_limit'] * 30 * 24 * 60 * 60 - time()) / (30 * 24 * 60 * 60));
            // }
            $list[$key]['vouch_scale'] = round(100 * $value['vouch_account'] / $value['account'], 1);
            $list[$key]['vouch_other'] = $value['account'] - $value['vouch_account'];
            $list[$key]['vouchscale_width'] = round((20 * $value['vouch_account'] / $value['account'])) * 7;
            foreach ($value as $_key => $_value) {
                $list[$key][$_key] = $_value;
            }
        }

        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

//���ҽ��ڵ���ʱ�� by xiaogu
    function JSGetTime($data) {
        global $mysql;
        $forwardtime2 = strtotime(date("Y-m-d 23:59:59", time())) + 7 * 24 * 60 * 60;
        $forwardtime1 = strtotime(date("Y-m-d", time())) + 7 * 24 * 60 * 60; //by xiaogu
        $_sql = "where 1=1 and p1.end_time>" . $forwardtime1 . " and p1.end_time<" . $forwardtime2;
        $sql = "SELECT end_time from {borrow} as p1 " . $_sql;
        $list = $mysql->db_fetch_array($sql);
        $list["futuretime"] = date("Y-m-d", $forwardtime1);
        return $list;

    }

    function Getkf() {
        global $_G, $mysql;
        $sql = "select * from `{user}` as u left join `{user_cache}` as uca on uca.kefu_userid=u.user_id where uca.user_id=" . $_G['user_id'];
        $row = $mysql->db_fetch_array($sql);
        return $row;
    }

    //��ҳͳ��
    function GetArrrayTj($term = '', $termname = '', $termname2 = '', $id = '') {
        global $mysql;
        if ($term == '') {
            $sql = "select * from {borrow_collection}";
        } else {
            if ($id == 1) {
                $term = $term . " >= " . $termname . " and " . $term . " <= " . $termname2;
            } else if ($id == 2) {
                $term = $term . " < " . $termname;
            }
            $sql = "select * from {borrow_collection} WHERE $term";
        }
        $list = $mysql->db_fetch_arrays($sql);
        return array(
            'list' => $list
        );
    }

    /**
     * �鿴
     *
     * @param Array $data
     * @return Array
     */
    public static function GetOne($data = array()) {
        global $mysql;
        $_sql = "where 1=1 ";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and  p1.user_id = '{$data['user_id']}' ";
        }
        if (isset($data['id']) && $data['id'] != "") {
            $_sql .= " and  p1.id = '{$data['id']}' ";
        }
  	if (isset($data['borrow_id']) && $data['borrow_id'] != "") {
            $_sql .= " and  p1.id = '{$data['borrow_id']}' ";
        }
        $sql = "select p1.* ,p2.username,p2.realname,p2.card_id,p3.username as verify_username from `{borrow}` as p1
				  left join `{user}` as p2 on p1.user_id=p2.user_id 
				  left join `{user}` as p3 on p1.verify_user = p3.user_id 
				  $_sql
				";
        $result = $mysql->db_fetch_array($sql);

        if (isset($data['tender_userid']) && $data['tender_userid'] != "") {
            $sql = "select sum(account) as num from `{borrow_tender}` where user_id='{$data['tender_userid']}' and borrow_id={$data['id']}";
            $_result = $mysql->db_fetch_array($sql);
            $result['tender_yes'] = !empty($_result['num']) ? $_result['num'] : 0;
        }
        return $result;
    }

    public static function GetUserLog($data = array()) {
        global $mysql, $_G;
        include_once(ROOT_PATH . "modules/account/account.inc.php");
        $_result = accountClass::GetUserLog($data);
        if ($data['user_id'] !== 0) {
            $user_id = $data['user_id'];
        } else {
            $user_id = $_G["user_id"];
        }


        $_result['borrow_account'] = 0;
        $sql = "select sum(account) as num from `{borrow}` where user_id = '{$user_id}' and (status=3)  ";
        $result = $mysql->db_fetch_array($sql);
        if ($result != false) {
            $_result['borrow_account'] = $result['num']; //����ܶ�
        }

        $_result['payment_times'] = 0;
        $sql = "select count(account) as num from `{borrow}` where user_id = '{$user_id}' and status=3  ";
        $result = $mysql->db_fetch_array($sql);
        if ($result != false) {
            $_result['payment_times'] = $result['num']; //����ܶ�
        }

        $sql = "select count(*) as num from `{borrow}` where user_id = '{$user_id}' ";
        $result = $mysql->db_fetch_array($sql);
        $_result['borrow_times'] = $result['num'];
        $_result['max_account'] = $_result['amount'] - $_result['borrow_account']; //�����
        //Ͷ������
        $sql = "select status,sum(account) as total_account  from `{borrow_tender}`  where user_id = '{$user_id}' group by status ";
        $result = $mysql->db_fetch_arrays($sql);
        foreach ($result as $key => $value) {
            $_result['invest_account'] += $value['total_account']; //Ͷ���ܶ�
            if ($value['status'] == 1) {
                $_result['success_account'] = $value['total_account'];
            }
        }

        //��Ϣ
        $sql = "select p1.status ,sum(p1.repay_account) as total_repay_account ,sum(p1.interest) as total_interest_account,sum(p1.capital) as total_capital_account  from `{borrow_collection}` as p1 left join `{borrow_tender}` as p2  on p1.tender_id = p2.id  where p2.status=1  and  p2.user_id = '{$user_id}' group by p1.status ";
        $result = $mysql->db_fetch_arrays($sql);
        foreach ($result as $key => $value) {
            $_result['success_account'] += $value['total_capital_account']; //Ͷ���ܶ�
            if ($value['status'] == 1) {
                $_result['collection_account1'] += $value['total_repay_account'];
                $_result['collection_interest1'] += $value['total_interest_account'];
                $_result['collection_capital1'] += $value['total_capital_account'];
            }
            if ($value['status'] == 0) {
                $_result['collection_account0'] += $value['total_repay_account'];
                $_result['collection_interest0'] += $value['total_interest_account'];
                $_result['collection_capital0'] += $value['total_capital_account'];
            }
            if ($value['status'] == 2) {
                $_result['collection_account2'] += $value['total_repay_account'];
                $_result['collection_interest2'] += $value['total_interest_account'];
                $_result['collection_capital2'] += $value['total_capital_account'];
            }
        }
        $_result['collection_wait'] = $_result['collection_capital0'] + $_result['collection_interest0']; //������
        $_result['collection_yes'] = $_result['collection_capital1'] + $_result['collection_interest1'] + $_result['collection_capital2'] + $_result['collection_interest2']; //�ѻ���
        $_result['collection_capital1'] = $_result['collection_capital1'] + $_result['collection_capital2'];
        $_result['success_account'] = $_result['collection_capital0'] + $_result['collection_capital1'] + $_result['collection_capital2'];//����ܶ�
        //����տ�����
        $sql = "select p1.repay_time  from `{borrow_collection}` as p1 left join `{borrow_tender}` as p2  on p1.tender_id = p2.id  where p2.status=1 and p1.status=0  and  p2.user_id = '{$user_id}' and p1.repay_time>" . time() . " order by p1.repay_time asc";
        $result = $mysql->db_fetch_array($sql);
        $_result['collection_repaytime'] = $result['repay_time'];

        //�����ܶ�
        $_result_wait = self::GetWaitPayment(array("user_id" => $user_id));
        $_result = array_merge($_result, $_result_wait);


        //��ȹ���
        $_result_amount = amountClass::GetAmountOne($user_id);
        $_result = array_merge($_result, $_result_amount);

        //���õ������Ӧ���ǽ�Ҫ����ĵ�������Ѿ��ɹ�����ĵ�����
        //$sql = "select * from `{borrow_amountlog}` where user_id='{$user_id}' and type ='vouch' order by id desc";
        //$result = $mysql->db_fetch_array($sql);
        /*
          $result = self::GetAmountLogOne(array("user_id"=>$user_id,"amount_type"=>"credit"));
          if ($result!=""){
          $_result['credit_amount_total'] = $result['account_total'];//���ö��
          $_result['credit_amount_use'] = $result['account_use'];//���ö��
          }

          $result = self::GetAmountLogOne(array("user_id"=>$user_id,"amount_type"=>"vouch"));
          if ($result!=""){
          $_result['vouch_amount_total'] = $result['account_total'];//����Ͷ�ʵ������
          $_result['vouch_amount_use'] = $result['account_use'];//����Ͷ�ʵ������
          }

          $result = self::GetAmountLogOne(array("user_id"=>$user_id,"amount_type"=>"borrowvouch"));
          if ($result!=""){
          $_result['borrowvouch_amount_total'] = $result['account_total'];//���ý������
          $_result['borrowvouch_amount_use'] = $result['account_use'];//���ý������
          }


         */

        //�������ʱ����ܶ�
        $sql = "select repayment_time,repayment_account from `{borrow_repayment}` where status !=1 and borrow_id in (select id from `{borrow}` where user_id = {$user_id} and status=3) order by repayment_time limit 0,1 ";
        $result = $mysql->db_fetch_array($sql);
        $_result['new_repay_time'] = $result['repayment_time'];
        $_result['new_repay_account'] = $result['repayment_account'];

        //����տ�ʱ���ʱ��
        $sql = "select repay_time,repay_account  from `{borrow_collection}` where tender_id in ( select p2.id from `{borrow_tender}`  as p2 left join `{borrow}` as p3 on p2.borrow_id=p3.id where p3.status=3 and p2.user_id = '{$user_id}' and p2.status=1) and repay_time > " . time() . " and status=0 order by repay_time asc";
        $result = $mysql->db_fetch_array($sql);
        $_result['new_collection_time'] = $result['repay_time'];
        $_result['new_collection_account'] = $result['repay_account'];

        //��վ�渶�ܶ�
        //����տ�ʱ���ʱ��
        $sql = "select sum(repay_account) as num_late_repay_account ,sum(interest) as num_late_interes from `{borrow_collection}` where tender_id in ( select id from `{borrow_tender}` where user_id = '{$user_id}' and status=1)  and status=2 order by repay_time asc";
        $result = $mysql->db_fetch_array($sql);
        $_result['num_late_repay_account'] = $result['num_late_repay_account'];
        $_result['num_late_interes'] = $result['num_late_interes'];
        if (!isset($_result['no_use_money']) || $_result['no_use_money'] < 0 || empty($_result['no_use_money'])) {
            $_result['no_use_money'] = 0;
        }
        // $_result['no_use_money']=0;

        return $_result;
    }

    /**
     * �鿴
     *
     * @param Array $data
     * @return Array
     */
    public static function GetOnes($data = array()) {
        global $mysql, $_G;
        $user_id = $data['user_id'];
        $id = $data['id'];
        if ($id == "") {
            $sql = "select * from {credit} where user_id='{$user_id}'";
            $result = $mysql->db_fetch_array($sql);

            if ($result == false || $result['value'] < 30) {
                /* 				echo "<script>alert('�������û��ֻ�δ��30�֣������ϴ�������֤');location.href='/index.php?user&q=code/user/realname';</script>";
                  exit;
                 */
            } else {
                $sql = "select * from {borrow} where status<2 and user_id='{$user_id}'";
                $result = $mysql->db_fetch_array($sql);
                if ($result != false && 1 == 2) {
                    echo "<script>alert('���Ѿ���һ�����꣬�봦��ý����ٽ��н��');location.href='/index.php?user&q=code/borrow/publish';</script>";
                    exit;
                }
            }
        } else {
            $sql = "select p1.* ,p2.username,p2.realname from {borrow} as p1 
					  left join {user} as p2 on p1.user_id=p2.user_id 
					  where p1.user_id=$user_id and p1.id=$id and (p1.status=0 or p1.status=-1)
					";
            $result = $mysql->db_fetch_array($sql);
            if ($result == false) {
                echo "<script>alert('�����������벻Ҫ�Ҳ���');location.href='/index.php?user&q=code/borrow/publish';</script>";
                exit;
            } else {
                return $result;
            }
        }
    }

    /**
     * �鿴
     *
     * @param Array $data
     * @return Array
     */
    public static function GetInvest($data = array()) {
        global $mysql, $_G;


        $id = $data['id'];
        //��ȡ�������Ӧ��Ϣ
        $sql = "select * from `{borrow}`  where is_liuzhuan=0 and  id = $id";

        $result['borrow'] = $mysql->db_fetch_array($sql);
        $sql = "select id as fastid,isqiye from `{daizi}` where borrow_id=$id";
        $result['borrow1'] = $mysql->db_fetch_array($sql);
        if ($result['borrow'] == false) {
            die('�����ڸñʽ��');
        }
        $user_id = $result['borrow']['user_id'];

        //��ȡ�û���Ϣ�Լ��û��Ļ���
        $sql = "select p1.*,p2.value as credit_jifen,p3.pic as credit_pic from `{user}` as p1 
				left join {credit} as p2 on p1.user_id=p2.user_id 
				left join {credit_rank} as p3 on p2.value<=p3.point2  and p2.value>=p3.point1
								 where  p1.user_id=$user_id";
        $result['user'] = $mysql->db_fetch_array($sql);
        if ($result['user']['credit_pic'] == "" or !isset($result['user']['credit_pic'])) {
            $result['user']['credit_pic'] = 'credit_s11.gif';
            $result['user']['credit_jifen'] = 0;
        }
        //��ȡ�û��Ļ�������
        $sql = "select * from `{userinfo}`  where  user_id=$user_id";
        $result['userinfo'] = $mysql->db_fetch_array($sql);

        //��ȡ����
        $result['borrow']['other'] = $result['borrow']['account'] - $result['borrow']['account_yes'];
        $result['borrow']['scale'] = round(100 * $result['borrow']['account_yes'] / $result['borrow']['account'], 1);
        $result['borrow']['scale_width'] = round((20 * $result['borrow']['account_yes'] / $result['borrow']['account'])) * 7;
        $result['borrow']['lave_time'] = $result['borrow']['verify_time'] + $result['borrow']['valid_time'] * 24 * 60 * 60 - time();
        if ($result['borrow']['isday'] == 1) {
            $result['borrow']['rep_time'] = $result['borrow']['verify_time'] +$result['borrow']['time_limit_day']*24*60*60- time();
        } else {
            $result['borrow']['rep_time'] = $result['borrow']['end_time'] - time();
        }
        $result['borrow']['isday'] = $result['borrow']['isday'];
        $result['borrow']['time_limit_day'] = $result['borrow']['time_limit_day'];
        $_interest = self::EqualInterest(array("account" => 100, "time_limit_day" => $result['borrow']['time_limit_day'], "isday" => $result['borrow']['isday'], "year_apr" => $result['borrow']['apr'], "month_times" => $result['borrow']['time_limit'], "type" => "all", "borrow_style" => $result['borrow']['style']));
        $result['borrow']['interest'] = $_interest['repayment_account'] - 100;

        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select * from `{account}`  where  user_id={$user_id}";
        $result['account'] = $mysql->db_fetch_array($sql);

        if ($data['invest_user_id'] <= 0) {

        } else {
            //��ȡ�û����ʽ��˺���Ϣ
            $sql = "select * from `{account}`  where  user_id={$_G['user_id']}";
            $result['user_account'] = $mysql->db_fetch_array($sql);
        }


        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select p1.*,p2.username as kefu_username,p2.wangwang as kefu_wangwang,p2.qq as kefu_qq from `{user_cache}` as  p1 left join `{user}` as p2 on p2.user_id=p1.kefu_userid  where  p1.user_id={$user_id}";
        $result['user_cache'] = $mysql->db_fetch_array($sql);

        $result['borrow_all'] = self::GetBorrowAll(array("user_id" => $user_id));

        //��ȡͶ�ʵĵ������
        //$result['amount'] = self::GetAmountOne($_G['user_id']);

        //��ȡ��������
        $result['borrow']['vouch_other'] = $result['borrow']['account'] - $result['borrow']['vouch_account'];
        $result['borrow']['vouch_scale'] = round(100 * $result['borrow']['vouch_account'] / $result['borrow']['account'], 1);
        $result['borrow']['vouchscale_width'] = round((20 * $result['borrow']['vouch_account'] / $result['borrow']['account'])) * 7;

        return $result;
    }

    public static function GetLiuzhuanInvest($data = array()) {
        global $mysql, $_G;


        $id = $data['id'];

        //��ȡ�������Ӧ��Ϣ
        $sql = "select * from `{borrow}`  where is_liuzhuan=1 and  id = $id";

        $result['liuzhuan'] = $mysql->db_fetch_array($sql);
        /* $sql = "select id as fastid,isqiye from `{daizi}` where borrow_id=$id";
          $result['liuzhuan'] = $mysql->db_fetch_array($sql);
          if ($result['liuzhuan']==false){
          return self::ERROR;
          } */
        $user_id = $result['liuzhuan']['user_id'];

        //��ȡ�û���Ϣ�Լ��û��Ļ���
        $sql = "select p1.*,p2.value as credit_jifen,p3.pic as credit_pic from `{user}` as p1 
				left join {credit} as p2 on p1.user_id=p2.user_id 
				left join {credit_rank} as p3 on p2.value<=p3.point2  and p2.value>=p3.point1
								 where  p1.user_id=$user_id";
        $result['user'] = $mysql->db_fetch_array($sql);
        if ($result['user']['credit_pic'] == "" or !isset($result['user']['credit_pic'])) {
            $result['user']['credit_pic'] = 'credit_s11.gif';
            $result['user']['credit_jifen'] = 0;
        }

        //��ȡ�û��Ļ�������
        $sql = "select * from `{userinfo}`  where  user_id=$user_id";
        $result['userinfo'] = $mysql->db_fetch_array($sql);

        //��ȡ����
        $result['liuzhuan']['other'] = $result['liuzhuan']['account'] - $result['liuzhuan']['account_yes'];
        $result['liuzhuan']['scale'] = round(100 * $result['liuzhuan']['account_yes'] / $result['liuzhuan']['account'], 1);
        $result['liuzhuan']['scale_width'] = round((20 * $result['liuzhuan']['account_yes'] / $result['liuzhuan']['account'])) * 7;
        $result['liuzhuan']['lave_time'] = $result['liuzhuan']['verify_time'] + $result['liuzhuan']['valid_time'] * 24 * 60 * 60 - time();
        if ($result['liuzhuan']['isday'] == 1) {
            $result['liuzhuan']['rep_time'] = $result['liuzhuan']['end_time'] - time() - 60 * 60 * 24;
        } else {
            $result['liuzhuan']['rep_time'] = $result['liuzhuan']['end_time'] - time();


            $result['liuzhuan']['r_months'] = round(($result['liuzhuan']['verify_time'] + $result['liuzhuan']['time_limit'] * 30 * 24 * 60 * 60 - time()) / (30 * 24 * 60 * 60));
        }
        $result['liuzhuan']['isday'] = $result['liuzhuan']['isday'];
        $result['liuzhuan']['time_limit_day'] = $result['liuzhuan']['time_limit_day'];
        $_interest = self::EqualInterest(array("account" => 100, "time_limit_day" => $result['liuzhuan']['time_limit_day'], "isday" => $result['liuzhuan']['isday'], "year_apr" => $result['liuzhuan']['apr'], "month_times" => $result['liuzhuan']['time_limit'], "type" => "all", "borrow_style" => $result['liuzhuan']['style']));
        $result['liuzhuan']['interest'] = $_interest['repayment_account'] - 100;

        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select * from `{account}`  where  user_id={$user_id}";
        $result['account'] = $mysql->db_fetch_array($sql);

        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select * from `{account}`  where  user_id={$_G['user_id']}";
        $result['user_account'] = $mysql->db_fetch_array($sql);

        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select p1.*,p2.username as kefu_username,p2.wangwang as kefu_wangwang,p2.qq as kefu_qq from `{user_cache}` as  p1 left join `{user}` as p2 on p2.user_id=p1.kefu_userid  where  p1.user_id={$user_id}";
        $result['user_cache'] = $mysql->db_fetch_array($sql);

        $result['borrow_all'] = self::GetBorrowAll(array("user_id" => $user_id));

        //��ȡͶ�ʵĵ������
        $result['amount'] = self::GetAmountOne($_G['user_id']);

        //��ȡ��������
        $result['liuzhuan']['vouch_other'] = $result['liuzhuan']['account'] - $result['liuzhuan']['vouch_account'];
        $result['liuzhuan']['vouch_scale'] = round(100 * $result['liuzhuan']['vouch_account'] / $result['liuzhuan']['account'], 1);
        $result['liuzhuan']['vouchscale_width'] = round((20 * $result['liuzhuan']['vouch_account'] / $result['liuzhuan']['account'])) * 7;

        return $result;
    }

    /**
     * �鿴
     *
     * @param Array $data
     * @return Array
     */
    public static function GetU($data = array()) {
        global $mysql, $_G;
        $user_id = $_G['U_uid'];

        //��ȡ�û���Ϣ�Լ��û��Ļ���
        $sql = "select p1.*,p2.value as credit_jifen,p3.pic as credit_pic from `{user}` as p1 
				left join {credit} as p2 on p1.user_id=p2.user_id 
				left join {credit_rank} as p3 on p2.value<=p3.point2  and p2.value>=p3.point1
								 where  p1.user_id=$user_id";
        $result['user'] = $mysql->db_fetch_array($sql);

        //��ȡ�û��Ļ�������
        $sql = "select * from `{userinfo}`  where  user_id=$user_id";
        $result['userinfo'] = $mysql->db_fetch_array($sql);


        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select * from `{account}`  where  user_id={$user_id}";
        $result['account'] = $mysql->db_fetch_array($sql);

        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select * from `{account}`  where  user_id={$_G['U_uid']}";
        $result['user_account'] = $mysql->db_fetch_array($sql);

        //��ȡ�û����ʽ��˺���Ϣ
        $sql = "select p1.*,p2.username as kefu_username,p2.wangwang as kefu_wangwang,p2.qq as kefu_qq from `{user_cache}` as  p1 left join `{user}` as p2 on p2.user_id=p1.kefu_userid  where  p1.user_id={$user_id}";
        $result['user_cache'] = $mysql->db_fetch_array($sql);

        $result['borrow_all'] = self::GetBorrowAll(array("user_id" => $user_id));

        //��ȡͶ�ʵĵ������
        $result['amount'] = self::GetAmountOne($_G['U_uid']);
        //userifn
        $sql = "select * from `{user}` where user_id = '{$user_id}'  ";
        $result_se = $mysql->db_fetch_array($sql);

        $result['phone_status'] = $result_se['phone_status'];
        $result['video_status'] = $result_se['video_status'];
        $result['scene_status'] = $result_se['scene_status'];

        return $result;
    }

    /**
     * ���
     *
     * @param Array $data
     * @return Boolen
     */
    function Add($data = array()) {
        global $mysql;
        global $_G;
        $max = isset($_G['system']['con_borrow_maxaccount']) ? $_G['system']['con_borrow_maxaccount'] : "50000";
        $min = isset($_G['system']['con_borrow_minaccount']) ? $_G['system']['con_borrow_minaccount'] : "500";
        $apr = isset($_G['system']['con_borrow_apr']) ? $_G['system']['con_borrow_apr'] : "22.18";
        if (!isset($data['user_id']) && trim($data['user_id']) == "") {
            return self::NO_LOGIN;
        }
        if (!isset($data['name']) && trim($data['name']) == "") {
            return self::BORROW_NAME_NO_EMPTY;
        }
        if (!isset($data['account']) || trim($data['account']) == "") {
            return self::BORROW_ACCOUNT_NO_EMPTY;
        }
        if ($data['is_vouch'] != 1) {
            $result = self::GetAmountOne($data['user_id'], "credit");
        } else {
            $result = self::GetAmountOne($data['user_id'], "borrow_vouch");
        }
        //if($data['is_mb']&&1==2){
        if ($data['is_mb']) {
            $data['status'] = 0;
            $data['verify_user'] = 1;
            $data['verify_remark'] = '�Զ����';
            $data['verify_time'] = time();
        }

        if (!$data['is_mb'] && isset($data['account']) && $data['account'] > $result['account_use']) {
            //return self::BORROW_ACCOUNT_MAZ_ACC;
        }
        if ($data['account'] > $max) {
            return self::BORROW_ACCOUNT_NO_MAX;
        }
        if ($data['account'] < $min) {
            return self::BORROW_ACCOUNT_NO_MIN;
        }

        if (!isset($data['apr']) || trim($data['apr']) == "") {
            return self::BORROW_APR_NO_EMPTY;
        }
        if ($data['apr'] > $apr) {
            return self::BORROW_APR_NO_MAX;
        }
        if ($data['apr'] < 1) {
            return self::BORROW_APR_NO_MIN;
        }
        $eq['account'] = $data['account'];
        $eq['year_apr'] = $data['apr'];
        $eq['month_times'] = $data['time_limit'];
        $eq['type'] = "all";
        $eq['borrow_style'] = $data['style'];
        $eq['isday'] = $data['isday'];
        $eq['time_limit_day'] = $data['time_limit_day'];
        $result = self::EqualInterest($eq);
        $data['repayment_account'] = $result['repayment_account'];
        $data['monthly_repayment'] = $result['monthly_repayment'];
        $fid = $data['fastid'];
        unset($data['fastid']);
        $oid = $data['czid'];
        $data['cz_old_id'] = $oid;
        unset($data['czid'], $data['is_cz']);
        $sql = "insert into `{borrow}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }
        $res = $mysql->db_query($sql);
        $newid = $mysql->db_insert_id();
        if ($res && $fid) {
            $mysql->db_query("update `{daizi}` set borrow_id={$newid} where id = {$fid}");
        } elseif ($res && $oid) {
            $mysql->db_query("update `{borrow}` set is_cz=1 where id = {$oid}");
            $mysql->db_query("update `{user}` set chongzu_id={$oid},chongzu_new_id={$newid} where user_id = {$data['user_id']}");
        }
        return $res;
    }

    /**
     * �޸�
     *
     * @param Array $data
     * @return Boolen
     */
    function Update($data = array()) {
        global $mysql;
        $user_id = $data['user_id'];
        if ($data['user_id'] == "") {
            return self::ERROR;
        }

        $_sql = "";
        $sql = "update `{borrow}` set ";
        foreach ($data as $key => $value) {
            if ($key != fastid) {
                $_sql[] .= "`$key` = '$value'";
            }
        }
        $sql .= join(",", $_sql) . " where user_id = '$user_id' and id='{$data['id']}' and (status=0 or status=-1)";

        return $mysql->db_query($sql);
    }

    /**
     * �޸�
     *
     * @param Array $data
     * @return Boolen
     */
    function Action($data = array()) {
        global $mysql;
        $id = $data['id'];
        if ($data['id'] == "") {
            return self::ERROR;
        }

        foreach ($data['id'] as $key => $value) {
            $sql = "update `{borrow}` set ";
            $sql .= "`flag` = '{$data['flag'][$key]}',`view_type` = '{$data['view'][$key]}' where id = '{$value}'";

            $mysql->db_query($sql);
        }
        return true;
    }

    /**
     * �޸�
     *
     * @param Array $data
     * @return Boolen
     */
    function Verify($data = array()) {
        global $mysql;
        $sql1 = "select * from `{borrow}` where id=" . $data['id'];
        $result1 = $mysql->db_fetch_array($sql1);
        if ($result1['status'] != $data['status']) {
            if ($result1['is_mb'] != 1 or $data['status'] == 1) {
                $sql = "update `{borrow}` set verify_time='" . time() . "',verify_user='{$data['verify_user']}',verify_remark='{$data['verify_remark']}',status='{$data['status']}' where  id='{$data['id']}' ";
                $result = $mysql->db_query($sql);

                return $result;
            } else {
                borrowClass::Cancel($data);
                return "�����ɹ�";
            }
        } else {
            return "��״̬�Ѿ��޸Ĺ�������ˣ�ˢ�º����ԡ�";
        }
    }

    /**
     * ɾ��
     *
     * @param Array $data
     * @return Boolen
     */
    public static function Delete($data = array()) {
        global $mysql;
        $id = $data['id'];
        if (!is_array($id)) {
            $id = array($id);
        }
        if (isset($data['status']) && $data['status'] != "") {
            $_sql .= " and status ='" . $data['status'] . "'";
        }
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql = " and user_id={$data['user_id']} ";
        }
        $sql = "delete from {borrow}  where id in (" . join(",", $id) . ") $_sql";
        return $mysql->db_query($sql);
    }

    /**
     * ɾ��
     *
     * @param Array $data
     * @return Boolen
     */
    public static function Cancel($data = array(),$is_failed = false) {
        global $mysql;
        global $_G;
        $_sql = " where 1=1 ";
        if (isset($data['id']) && $data['id'] != "") {
            $_sql .= " and id={$data['id']} ";
        } else {
            return self::ERROR;
        }
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and user_id={$data['user_id']} ";
        } else {
            if ($data['opertype'] != 'guanli') {
                return self::ERROR;
            }
        }
        $ssql1 = "select * from {borrow}  where is_liuzhuan=0 and   id=" . $data['id'] . " ";
        $borrow_repayment_result1 = $mysql->db_fetch_array($ssql1);
        $status1 = $borrow_repayment_result1['status'];
        if ($status1 <= 1) {
            if ($is_failed) {
                $sql = "update  {borrow}  set status=5,is_failed=1  $_sql";
            } else {
                $sql = "update  {borrow}  set status=5  $_sql";
            }
            $mysql->db_query($sql);
            //�ⶳ
            $ssql = "select * from {borrow}  where id=" . $data['id'] . " ";
            $borrow_repayment_result = $mysql->db_fetch_array($ssql);
            $data['user_id'] = $borrow_repayment_result['user_id'];

            //$account_result =  accountClass::GetOne(array("user_id"=>$data['user_id']));
            $account_result = accountClass::GetOne(array("user_id" => $borrow_repayment_result['user_id']));
            $account_log['user_id'] = $data['user_id'];
            $account_log['type'] = "borrow_frost";
            //$account_log['money'] = ($borrow_repayment_result['account'] * $borrow_repayment_result['apr'] /(100*12) + $borrow_repayment_result['account'] * $_G['system']['con_borrow_fee']);
            $account_log['money'] = ($borrow_repayment_result['account'] * $borrow_repayment_result['apr'] / (100 * 12));

            $account_log['total'] = $account_result['total'];
            $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
            $account_log['no_use_money'] = $account_result['no_use_money'] - $account_log['money'];
            $account_log['collection'] = $account_result['collection'];
            $account_log['to_user'] = "0";
            $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['name']}</a>]���Ľⶳ";
            if ($borrow_repayment_result['is_mb'] == 1 && $borrow_repayment_result['jiaoyan'] == 0) {
                $sql = "update  {borrow}  set jiaoyan=1  $_sql";
                $mysql->db_query($sql);
                accountClass::AddLog($account_log);
                //ֻ�����ʱ�Ż�ⶳ
            }

            //�ⶳ����
            if ($borrow_repayment_result['cz_old_id'] > 0) {
                unset($account_log);
                $account_log = array();
                $account_result = accountClass::GetOne(array("user_id" => $data['user_id']));
                $account_log['user_id'] = $data['user_id'];
                $account_log['type'] = "jdczdj";
                $account_log['money'] = ($borrow_repayment_result['account'] * $_G['system']['con_cz_dj']);
                $account_log['total'] = $account_result['total'];
                $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
                $account_log['no_use_money'] = $account_result['no_use_money'] - $account_log['money'];
                $account_log['collection'] = $account_result['collection'];
                $account_log['to_user'] = "0";
                $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['name']}</a>]����Ľⶳ";
                accountClass::AddLog($account_log);
                $mysql->db_query("update dw_user set chongzu_id=0,chongzu_new_id=0 where user_id={$data['user_id']}");
                $mysql->db_query("update dw_borrow set cz_old_id=0 where id={$data['id']}");
                $mysql->db_query("update dw_borrow set is_cz=0 where id={$borrow_repayment_result['cz_old_id']}");
            }

            //��������Ͷ���ߵĽ�Ǯ��
            $sql = "select p1.*,p2.status as borrow_status,p2.name as borrow_name from {borrow_tender} as p1 left join `{borrow}` as p2 on p1.borrow_id=p2.id where p1.borrow_id={$data['id']}";
            $result = $mysql->db_fetch_arrays($sql);
            foreach ($result as $key => $value) {
                if ($value['borrow_status'] != 5)
                    return false;
                if ($value['status'] != 2) {
                    $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                    $log['user_id'] = $value['user_id'];
                    $log['type'] = "invest_false";
                    $log['money'] = $value['account'];
                    $log['total'] = $account_result['total'];
                    $log['use_money'] = $account_result['use_money'] + $log['money'];
                    $log['no_use_money'] = $account_result['no_use_money'] - $log['money'];
                    $log['collection'] = $account_result['collection'];
                    $log['to_user'] = $data['user_id'];
                    $log['remark'] = "�б�[<a href=\'/invest/a{$data['id']}.html\' target=_blank>{$value['borrow_name']}</a>]ʧ�ܷ��ص�Ͷ���";
                    $sql2 = "select * from {borrow_tender} where id=" . $value['id'];
                    $result2 = $mysql->db_fetch_arrays($sql2);
                    if ($result2['jiaoyan'] != 1) {
                        accountClass::AddLog($log);
                        $sql = "update  {borrow_tender}  set jiaoyan=1  where borrow_id={$data['id']} and id=" . $value['id'];
                        $mysql->db_query($sql);
                    }

                    //��������
                    $remind['nid'] = "loan_no_account";
                    $remind['sent_user'] = "0";
                    $remind['receive_user'] = $value['user_id'];
                    $remind['title'] = "Ͷ�ʵı�[<font color=red>{$value['borrow_name']}</font>]ʧ��";
                    $remind['content'] = "����Ͷ�ʵı�[<a href=\'/invest/a{$data['id']}.html\' target=_blank><font color=red>{$value['borrow_name']}</font></a>]��" . date("Y-m-d", time()) . "���ʧ��";
                    $remind['type'] = "system";
                    remindClass::sendRemind($remind);



                    $sql = "update `{borrow_tender}` set status=2 where id = '{$value['id']}'";
                    $mysql->db_query($sql);
                }
            }

            $sql = "select is_vouch from `{borrow}` where id = {$data['id']}";
            $result = $mysql->db_fetch_array($sql);
            if ($result['is_vouch'] == 1) {
                //Ͷ����Ͷ�ʵ�����ȵ�����
                $result = self::GetVouchList(array("limit" => "all", "borrow_id" => $data['id']));
                if ($result != "") {
                    foreach ($result as $key => $value) {
                        //��Ӷ�ȼ�¼
                        $amountlog_result = self::GetAmountOne($value['user_id'], "tender_vouch");
                        $amountlog["user_id"] = $value['user_id'];
                        $amountlog["type"] = "tender_vouch_false";
                        $amountlog["amount_type"] = "tender_vouch";
                        $amountlog["account"] = $value['vouch_account'];
                        $amountlog["account_all"] = $amountlog_result['account_all'];
                        $amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
                        $amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account'];
                        $amountlog["remark"] = "������ʧ�ܣ�Ͷ�ʵ�����ȷ���";
                        self::AddAmountLog($amountlog);

                        $sql = "update `{borrow_vouch}` set status=2 where id = {$value['id']}";
                        $mysql->db_query($sql);
                    }
                }
            }



            return true;
        } else {

            return false;
        }
    }

    function GetLiuzhuanTenderList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1";
        if (!empty($user_id)) {
            $_sql .= " and p1.user_id = $user_id";
        }
        if (!empty($username)) {
            $_sql .= " and p2.username = '$username'";
        }
        $data['borrow_id'] = $data['liuzhuan_id'];
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
        if (isset($data['borrow_status']) && $data['borrow_status'] != "") {
            $_sql .= " and p3.status in ({$data['borrow_status']})";
        }

        if (isset($data['keywords']) && $data['keywords'] != "") {
            $_sql .= " and p1.name like '%" . str_replace('<', urldecode($data['keywords'])) . "%'";
        }

        /*
          $_select = " p1.*,p1.account as tender_account,p1.repayment_account - p1.repayment_yesaccount - p1.repayment_yesinterest as wait,
          p1.repayment_account - p1.account as wait_in,p2.username,p3.account ,p3.account_yes,p3.apr,p3.time_limit,p3.name as borrow_name,p4.username as op_username,p5.value as credit_jifen,p6.pic as credit_pic";
          $sql = "select SELECT from {borrow_tender} as p1
          left join {borrow} as p3 on p3.id=p1.borrow_id
          left join {user} as p2 on p1.user_id=p2.user_id
          left join {user} as p4 on p3.user_id=p4.user_id
          left join {credit} as p5 on p3.user_id=p5.user_id
          left join {credit_rank} as p6 on p5.value<=p6.point2  and p5.value>=p6.point1
          $_sql ORDER LIMIT";
         */
        $_select = "p1.*,p1.id as tid,CONVERT(p1.money,SIGNED) as money,CONVERT(p1.account,SIGNED) as tender_account,CONVERT(p1.money,SIGNED) as tender_money,p2.user_id as borrow_userid,p2.username as op_username,p4.username as username,p3.apr,p3.time_limit,p3.name as borrow_name,p3.id as borrow_id,p3.account ,p3.account_yes,p5.value as credit_jifen,p6.pic as credit_pic";
        $sql = "select SELECT from `{borrow_tender}` as p1
				left join `{borrow}` as p3 on p1.borrow_id=p3.id 
				left join `{user}` as p2 on p3.user_id = p2.user_id
				left join `{user}` as p4 on p4.user_id = p1.user_id
				 left join {credit} as p5 on p1.user_id=p5.user_id 
				left join {credit_rank} as p6 on p5.value<=p6.point2  and p5.value>=p6.point1
		 {$_sql}  order by p1.addtime asc LIMIT";

        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $_limit), $sql));

            foreach ($result as $key => $value) {
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
                $result[$key]['equal'] = self::EqualInterest($_data);
            }
            return $result;
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";
        $sql = str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql);
        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
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
            $list[$key]['equal'] = self::EqualInterest($_data);
            $list[$key]['other'] = $value['account'] - $value['account_yes'];
            $list[$key]['scale'] = round(100 * $value['account_yes'] / $value['account'], 1);
            $list[$key]['scale_width'] = round((20 * $value['account_yes'] / $value['account'])) * 7;
            $list[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);
        }

        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    /**
     * �б�
     *
     * @return Array
     */
    function GetTenderList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1";
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
        if (isset($data['borrow_status']) && $data['borrow_status'] != "") {
            $_sql .= " and p3.status in ({$data['borrow_status']})";
        }

        if (isset($data['keywords']) && $data['keywords'] != "") {
            $_sql .= " and p1.name like '%" . str_replace('<', urldecode($data['keywords'])) . "%'";
        }

        /*
          $_select = " p1.*,p1.account as tender_account,p1.repayment_account - p1.repayment_yesaccount - p1.repayment_yesinterest as wait,
          p1.repayment_account - p1.account as wait_in,p2.username,p3.account ,p3.account_yes,p3.apr,p3.time_limit,p3.name as borrow_name,p4.username as op_username,p5.value as credit_jifen,p6.pic as credit_pic";
          $sql = "select SELECT from {borrow_tender} as p1
          left join {borrow} as p3 on p3.id=p1.borrow_id
          left join {user} as p2 on p1.user_id=p2.user_id
          left join {user} as p4 on p3.user_id=p4.user_id
          left join {credit} as p5 on p3.user_id=p5.user_id
          left join {credit_rank} as p6 on p5.value<=p6.point2  and p5.value>=p6.point1
          $_sql ORDER LIMIT";
         */
        $_select = "p1.*,p1.id as tid,CONVERT(p1.money,SIGNED) as money,CONVERT(p1.account,SIGNED) as tender_account,CONVERT(p1.money,SIGNED) as tender_money,p2.user_id as borrow_userid,p2.username as op_username,p4.username as username,p3.status as borrow_status,p3.apr,p3.time_limit,p3.is_liuzhuan,p3.name as borrow_name,p3.id as borrow_id,p3.account ,p3.account_yes,p5.value as credit_jifen,p6.pic as credit_pic";
        $sql = "select SELECT from `{borrow_tender}` as p1
				left join `{borrow}` as p3 on p1.borrow_id=p3.id 
				left join `{user}` as p2 on p3.user_id = p2.user_id
				left join `{user}` as p4 on p4.user_id = p1.user_id
				 left join {credit} as p5 on p1.user_id=p5.user_id 
				left join {credit_rank} as p6 on p5.value<=p6.point2  and p5.value>=p6.point1
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
                $result[$key]['equal'] = self::EqualInterest($_data);
            }
            return $result;
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
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
            $list[$key]['equal'] = self::EqualInterest($_data);
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

    function GetTender_List($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1";
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
        if (isset($data['borrow_status']) && $data['borrow_status'] != "") {
            $_sql .= " and p3.status in ({$data['borrow_status']})";
        }

        if (isset($data['keywords']) && $data['keywords'] != "") {
            $_sql .= " and p1.name like '%" . str_replace('<', urldecode($data['keywords'])) . "%'";
        }
        $_select = "p1.*,p1.id as tid,p1.money as money,p1.account as tender_account,p1.money as tender_money,p2.user_id as borrow_userid,p2.username as op_username,p4.username as username,p3.status as borrow_status,p3.apr,p3.time_limit,p3.is_liuzhuan,p3.name as borrow_name,p3.id as borrow_id,p3.account ,p3.account_yes,p5.value as credit_jifen,p6.pic as credit_pic";
        $sql = "select SELECT from `{borrow_tender}` as p1
				left join `{borrow}` as p3 on p1.borrow_id=p3.id
				left join `{user}` as p2 on p3.user_id = p2.user_id
				left join `{user}` as p4 on p4.user_id = p1.user_id
				 left join {credit} as p5 on p1.user_id=p5.user_id
				left join {credit_rank} as p6 on p5.value<=p6.point2  and p5.value>=p6.point1
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
                $result[$key]['equal'] = self::EqualInterest($_data);
            }
            return $result;
        }
    }

	//���ּ�¼��Ͷ�ꡢ�һ���
	function GetIntegralLog($data){
		global $mysql;
		$user_id = empty($data['user_id'])?"":$data['user_id'];
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1";		 
		if (!empty($user_id)){
			$_sql .= " and p1.user_id = '$user_id'";
		}
	
		$_select = "p1.*,p1.id as tid,p3.name as borrow_name,p4.name as integral_name";
		if(empty($data['id_order'])){
			$sql = "select SELECT from `{integral_log}` as p1
				left join `{borrow}` as p3 on p1.borrow_id=p3.id
				left join `{integral_type}` as p4 on p1.type_id=p4.id
		 {$_sql}  order by p1.id asc LIMIT";
		}else{
			$sql = "select SELECT from `{integral_log}` as p1
				left join `{borrow}` as p3 on p1.borrow_id=p3.id
				left join `{integral_type}` as p4 on p1.type_id=p4.id
		 {$_sql}  order by p1.id desc LIMIT";
		}
		
		//�Ƿ���ʾȫ������Ϣ
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$result= $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  'order by p1.id desc', $_limit), $sql));

			foreach($result as $key => $value){
				$list[$key]['account'] =  round($value['account'],2);
			}
			return $result;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		foreach($list as $key => $value){
			$list[$key]['invest_integral'] = $value['value'];
		}

		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
	}
//�궫��תЭ����ծȨ���Ľ�
    function HDGetTender($data) {
        global $mysql, $_G;
        $user_id = empty($_G['user_id']) ? "" : $_G['user_id'];
        $_sql = "where 1=1";
        if (!empty($user_id)) {
            $_sql .= " and p1.user_id = $user_id";
        }
        if (isset($_REQUEST["borrow_id"]) && $_REQUEST["borrow_id"] != '') {
            $borrow_id = $_REQUEST["borrow_id"];
            $_sql .= " and p1.borrow_id = $borrow_id";
        }
        if (isset($_REQUEST["id"]) && $_REQUEST["id"] != '') {
            $id = $_REQUEST["id"];
            $_sql .= " and p1.id = $id";
        }
        $sql = "SELECT account as tender_account from {borrow_tender} as p1 " . $_sql;
        $list = $mysql->db_fetch_arrays($sql);
        return $list;
    }

    public static function getTouzi($data) {
        global $mysql;
//        var_dump($data);
        $_sql = '';
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];
        $username = empty($data['username']) ? "" : $data['username'];
        $realname = empty($data['realname']) ? "" : $data['realname'];
        if (!empty($username)) {
            $_sql .= " and p3.username = '$username'";
        }
        if (!empty($realname)) {
            $_sql .= " and p3.realname = '$realname'";
        }
        $_select = 'p1.id,p2.`name`,p3.`username`,p3.`realname`,p2.account,p2.success_time,p1.money,p1.addtime,p1.borrow_id';
        $sql = "select SELECT  FROM {borrow_tender} p1
                LEFT JOIN {borrow} p2 ON (p1.`borrow_id`=p2.id)
                LEFT JOIN {user} p3 ON (p1.`user_id`=p3.`user_id`) WHERE 1 $_sql LIMIT";
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'LIMIT'), array($_select, $_limit), $sql));
            return $result;
        }
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'LIMIT'), array('count(1) as num', ''), $sql));
        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";
        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
//        echo str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql);
        $list = $list ? $list : array();

        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    //�����ϸ��
    function GetTenderCollection($data) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";
        if (!empty($data['user_id'])) {
            $_sql .= " and p2.user_id = {$data['user_id']}";
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
        $_select = "p1.*,p3.username";
        $sql = "select SELECT from {borrow_tender} as p1 
					left join {borrow} as p2 on p2.id=p1.borrow_id
					left join {user} as p3 on p1.user_id=p3.user_id
					$_sql
					";
    }

    /**
     * �����б�
     *
     * @return Array
     */
    function GetVouchList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1";
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
        if (isset($data['borrow_status']) && $data['borrow_status'] != "") {
            $_sql .= " and p3.status in ({$data['borrow_status']})";
        }


        $_select = "p1.*,p2.username,p3.name as borrow_name,p3.time_limit as borrow_period,p3.account as borrow_account,p4.username as borrow_username";
        $sql = "select SELECT from `{borrow_vouch}` as p1
				left join `{user}` as p2 on p2.user_id = p1.user_id
				left join `{borrow}` as p3 on p1.borrow_id = p3.id
				left join `{user}` as p4 on p4.user_id = p3.user_id
		 {$_sql}  order by p1.addtime desc LIMIT";

        //�Ƿ���ʾȫ������Ϣ
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
        $list = $list ? $list : array();
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    /**
     * ֻ��Ͷ����б�
     *
     * @return Array
     */
    function GetTenderUserList($data = array()) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";
        if (!empty($data['user_id'])) {
            $_sql .= " and p2.user_id = {$data['user_id']}";
        }
        if (isset($data['username'])) {
            if ($data['username'] == "request") {
                $_sql .= " and p3.username like '%{$_REQUEST['username']}%'";
            }
        }
        if (isset($data['borrow_id']) && $data['borrow_id'] != "") {
            $_sql .= " and p1.borrow_id = '{$data['borrow_id']}'";
        }
        if (isset($data['borrow_status']) && $data['borrow_status'] != "") {
            $_sql .= " and p2.status = '{$data['borrow_status']}'";
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
        $_select = "p1.*,p2.name as borrow_name,p3.username";
        $sql = "select SELECT from {borrow_tender} as p1 
					left join {borrow} as p2 on p2.id=p1.borrow_id
					left join {user} as p3 on p1.user_id=p3.user_id
					$_sql order by p1.id desc
					";
        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.addtime desc', $_limit), $sql));
            return $result;
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";


        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
        $list = $list ? $list : array();
        foreach ($list as $key => $value) {
            $list[$key]['repayment_noaccount'] = round($value['repayment_account'] - $value['repayment_yesaccount'], 2);
            $list[$key]['repayment_nointerest'] = $value['repayment_account'] - $value['repayment_yesaccount'] - $value['account'];
            $list[$key]['wait_interest'] = round($list[$key]['wait_interest'], 2);
        }

        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    /**
     * �鿴Ͷ�����Ϣ
     *
     * @param Array $data
     * @return Array
     */
    public static function GetTenderOne($data = array()) {
        global $mysql;
        $id = $data['id'];
        $sql = "select * from {borrow_tender}  where id=$id";
        $result = $mysql->db_fetch_array($sql);
        //��ȡ�û��Ļ�������
        $sql = "select sum(money) as total from {borrow_tender}  where  borrow_id=$id";
        $_result = $mysql->db_fetch_array($sql);
        $result['other'] = $result['borrow']['account'] - $_result['total'];
        $result['scale'] = round(100 * $_result['total'] / $result['borrow']['account'], 1);
        $result['scale_width'] = round((20 * $_result['total'] / $result['borrow']['account'])) * 7;
        return $result;
    }

    /**
     * ���Ͷ��
     *
     * @param Array $data
     * @return Boolen
     */
    public static function AddTender($data = array(), $is_auto = false) {
        global $mysql, $_G;
        if (!isset($data['borrow_id']) || $data['borrow_id'] == "") {
            return self::ERROR;
        }
        $borrow_id = $data['borrow_id'];
        // ������Ϣ
        $sql = "SELECT * FROM `{borrow}` WHERE `id`={$borrow_id}";
        $b_res = $mysql->db_fetch_array($sql);
        // �Զ���������Ͷ��
        if ($is_auto != true) {
            if($b_res['in_auto'] == 1){
                return '������ڳ�����,���Ժ���!';
            }
        }
        if ($_G['user_result']['islock'] == 1) {
            return "���˺��Ѿ������������ܽ���Ͷ�꣬�������Ա��ϵ";
        }
        $sqllock = "LOCK TABLES `{borrow}` WRITE";
        $mysql->db_query($sqllock);
        /*
          if(!isset($data['per_account']))
          $data['per_account']=1;
         */
        if ($data['per_account'] <= 0)
            $data['per_account'] = 1;
        $sql = "update  {borrow}  set account_yes=account_yes+{$data['account']},tender_times=tender_times+{$data['per_account']},r_nums=r_nums-{$data['per_account']}  where id='{$data['borrow_id']}' and  CONVERT (account ,UNSIGNED) >CONVERT (account_yes, UNSIGNED)";
        //$mysql->db_query($sql);//�����Ѿ�Ͷ���Ǯ
        $sql = $mysql->db_sql_pre($sql);
        mysql_query($sql);
        $rc = mysql_affected_rows();
        $sqllock = "UNLOCK TABLES";
        $mysql->db_query($sqllock);
        //$ars =$mysql->db_affected_rows($sql);
        if ($rc > 0) {
            $sql = "insert into `{borrow_tender}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
            foreach ($data as $key => $value) {
                $sql .= ",`$key` = '$value'";
            }
            $mysql->db_query($sql);
            $tender_id = $mysql->db_insert_id();

            if ($tender_id > 0) {
                //����ɹ����򽫻�����Ϣ���������ȥ
                $result = self::GetOne(array("id" => $data['borrow_id']));
                $eq['account'] = $data['account'];
                if ($result['is_liuzhuan'] == 1) {

                    $result['time_limit'] = $data['month_nums'];
                    $result['style'] = $data['tender_type'];
                }
                $eq['year_apr'] = $result['apr'];
                $eq['month_times'] = $result['time_limit'];
                $eq['borrow_time'] = $result['repayment_time'];
                $eq['borrow_style'] = $result['style'];
                $eq['isday'] = $result['isday'];
                $eq['time_limit_day'] = $result['time_limit_day'];
                if ($eq['isday'] == 1 && $result['is_liuzhuan'] == 1) {
                    $eq['month_times'] = 1;
                    $eq['time_limit_day'] = $data['month_nums'];
                }

                $result = self::EqualInterest($eq);
                $repayment_account = 0;
                foreach ($result as $key => $value) {
                    $repayment_account += $value['repayment_account'];
                    //���黹��Ϣд��ȥ
                    $sql = "insert into {borrow_collection} set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "',`tender_id`='{$tender_id}',`order`='{$key}',`repay_time`='{$value['repayment_time']}',
						`repay_account`='{$value['repayment_account']}',`interest`='{$value['interest']}',`capital`='{$value['capital']}'
						";
                    $mysql->db_query($sql);
                }
                $_interest = $repayment_account - $data['account'];
                $sql = " update {borrow_tender} set repayment_account='{$repayment_account}',wait_account ='{$repayment_account}',interest = '{$_interest}',wait_interest = '{$_interest}' where id={$tender_id}";
                $mysql->db_query($sql);
				//����Ͷ�����
				$add_integral = floor($data['account']/100);
				$sql_borrow_info = "select `isday`,`time_limit_day`,`time_limit` from {borrow} where id={$borrow_id}";
				$borrow_info = $mysql->db_fetch_array($sql_borrow_info);
				if($borrow_info['isday']==1){
					$integral_multiple = $borrow_info['time_limit_day']/30;
					$add_integral = round($add_integral * $integral_multiple);
				}else{
					$integral_multiple = $borrow_info['time_limit'];
					$add_integral = $add_integral * $integral_multiple;
				}
				$sql = "update {user} set invest_integral=invest_integral+$add_integral,integral=integral+$add_integral where user_id={$data['user_id']}";
				$mysql->db_query($sql);
				//����Ͷ����ּ�¼
				$sql = "insert into `{integral_log}` (`user_id`,`type_id`,`borrow_id`,`value`,`remark`,`op_user`,`addtime`,`addip`) values ({$data['user_id']},1,{$data['borrow_id']},$add_integral,'Ͷ�����ӻ���$add_integral',0,'".time()."','".ip_address()."')";
				$mysql->db_query($sql);
                //Ͷ����ּ�¼����
                $sql1 = "select * from `{borrow}` where id=" . $borrow_id;
                $result1 = $mysql->db_fetch_array($sql1);
                if ($result1['is_liuzhuan'] == 1) {
                    return $tender_id;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * ��ӵ���
     *
     * @param Array $data
     * @return Boolen
     */
    public static function AddVouch($data = array()) {
        global $mysql, $_G;
        if (!isset($data['borrow_id']) || $data['borrow_id'] == "") {
            return self::ERROR;
        }

        if ($_G['user_result']['islock'] == 1) {
            return "���˺��Ѿ������������ܽ���Ͷ�꣬�������Ա��ϵ";
        }


        $sql = "insert into `{borrow_vouch}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }
        $mysql->db_query($sql);
        $vouch_id = $mysql->db_insert_id();

        if ($vouch_id > 0) {
            $sql = "update  {borrow}  set vouch_account=vouch_account+{$data['account']},vouch_times=vouch_times+1  where id='{$data['borrow_id']}'";
            $mysql->db_query($sql); //�����Ѿ�������Ǯ
            //��Ӷ�ȼ�¼
            $amountlog_result = self::GetAmountOne($data['user_id'], "tender_vouch");
            $amountlog["user_id"] = $data['user_id'];
            $amountlog["type"] = "tender_vouch_sucess";
            $amountlog["amount_type"] = "tender_vouch";
            $amountlog["account"] = $data['account'];
            $amountlog["account_all"] = $amountlog_result['account_all'];
            $amountlog["account_use"] = $amountlog_result['account_use'] - $amountlog['account'];
            $amountlog["account_nouse"] = $amountlog_result['account_nouse'] + $amountlog['account'];
            $amountlog["remark"] = "�����ɹ�";
            self::AddAmountLog($amountlog);
            return true;
        } else {
            return false;
        }
    }

    public static function RepayLZ($data = array()) {
        global $mysql, $_G;
        $id = $data['id'];
        $tender_id = $data['tender_id'];
        if ($id == "request") {
            $id = $_REQUEST['id'];
        }
        $_sql = "";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = '{$data['user_id']}'";
        } else {
            return self::ERROR;
        }
        $sql2 = "select max(`order`) as mxorder from {borrow_repayment} where tender_id=$tender_id";
        $borrow_repayment_result2 = $mysql->db_fetch_array($sql2);
        $mxorder = $borrow_repayment_result2['mxorder'];
        $sql = "select p1.*,p2.name as borrow_name,p2.apr as apr,p2.is_mb as is_mb,p2.repayment_account as all_repayment_account,p2.repayment_yesaccount as all_repayment_yesaccount,p2.user_id as borrow_userid,p2.repayment_yesinterest ,p2.time_limit,p2.forst_account,p2.account as borrow_account,p2.is_vouch,p2.success_time from {borrow_repayment} as p1,{borrow} as p2   where (p1.status=0 or p1.status=2) and p1.id=$id and p1.borrow_id=p2.id $_sql";
        $borrow_repayment_result = $mysql->db_fetch_array($sql);
        $borrow_id = $borrow_repayment_result["borrow_id"];
        $success_time = $borrow_repayment_result["success_time"];
        $borrow_userid = $borrow_repayment_result["borrow_userid"];

        if ($borrow_repayment_result == false) {
            return self::ERROR;
        }
        if ($borrow_repayment_result['status'] == 1) {
            return "�����Ѿ�����벻Ҫ�Ҳ���";
        }
        //�ж���һ���Ƿ��ѻ�  
        if ($borrow_repayment_result['order'] != 0) {
            $_order = $borrow_repayment_result['order'] - 1;
            $sql = "select status from `{borrow_repayment}` where `order`=$_order and tender_id=$tender_id and borrow_id={$borrow_repayment_result['borrow_id']}";
            $result = $mysql->db_fetch_array($sql);
            if ($result != false && $result['status'] != 1) {
                return "�����ڵĽ�û�������Ȼ����ڵ�";
            }
        }

        //�жϿ�������Ƿ񹻻���
        $sql = "select * from {account} where user_id = '{$data['user_id']}'";
        $account_result = $mysql->db_fetch_array($sql);
        if ($account_result['use_money'] < $borrow_repayment_result['repayment_account'] + $late_result['late_interest']) {
            return self::BORROW_REPAYMENT_NOT_ENOUGH;
        }

        //�ж��Ƿ�����󻹿�
        if ($borrow_repayment_result['order'] == $mxorder) {
            $_order = $borrow_repayment_result['order'];
            $sql = "select max(`order`) as `order`,round(sum(capital)) as tcapital from `{borrow_repayment}` where  tender_id=$tender_id and borrow_id={$borrow_repayment_result['borrow_id']}";
            $result = $mysql->db_fetch_array($sql);
            if ($result != false && $result['order'] == $_order) {
                $sql = "update {borrow} set account_yes= account_yes - {$result['tcapital']},buy_times=buy_times+{$result['tcapital']}/per_account,r_nums=r_nums+{$result['tcapital']}/per_account where id={$borrow_repayment_result['borrow_id']}";
                $result = $mysql->db_query($sql);
            }
        }
        $late_result = self::LateInterest(array("account" => $borrow_repayment_result['capital'], "repayment_time" => $borrow_repayment_result['repayment_time']));





        $sql = "update {borrow_repayment} set status=1,repayment_yesaccount='{$borrow_repayment_result['repayment_account']}',repayment_yestime='" . time() . "' where status=0 and id=$id";
        $result = $mysql->db_query($sql);
        $rc2 = mysql_affected_rows(); //Ӱ������
        if ($rc2 > 0) { //�������⴦��
            //�뻻����л���
            //�۳����������
            $account_result = accountClass::GetOne(array("user_id" => $data['user_id']));
            $account_log['user_id'] = $data['user_id'];
            $account_log['type'] = "repayment";
            $account_log['money'] = $borrow_repayment_result['repayment_account'];
            $account_log['total'] = $account_result['total'] - $account_log['money'];
            $account_log['use_money'] = $account_result['use_money'] - $account_log['money'];
            $account_log['no_use_money'] = $account_result['no_use_money'];
            $account_log['collection'] = $account_result['collection'];
            $account_log['to_user'] = "0";
            $account_log['remark'] = "��[<a href=\'/liuzhuan/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]����";
            accountClass::AddLog($account_log);






            $_repay_time = $borrow_repayment_result['repayment_time'];
            $re_time = (strtotime(date("Y-m-d", $_repay_time)) - strtotime(date("Y-m-d", time()))) / (60 * 60 * 24);
            if ($re_time > 4) {
                $credit['nid'] = "advance_3day";
            } elseif ($re_time > 2 && $re_time <= 4) {
                $credit['nid'] = "advance_1day";
            } else {
                $credit['nid'] = "advance_day";
            }
            $result = creditClass::GetTypeOne(array("nid" => $credit['nid']));
            $credit['user_id'] = $data['user_id'];
            $credit['value'] = $result['value'];
            $credit['op_user'] = $_G['user_id'];
            $credit['op'] = 1; //����
            $credit['type_id'] = $result['id'];
            $credit['remark'] = "����ɹ���{$credit['value']}��";
            creditClass::UpdateCredit($credit); //���»���
            ////���ö�ȵ�����
            if ($borrow_repayment_result['is_vouch'] != 1) {
                //��Ӷ�ȼ�¼
                $amountlog_result = self::GetAmountOne($borrow_userid, "credit");
                $amountlog["user_id"] = $borrow_userid;
                $amountlog["type"] = "borrrow_repay";
                $amountlog["amount_type"] = "credit";
                $amountlog["account"] = $borrow_repayment_result['repayment_account'];
                $amountlog["account_all"] = $amountlog_result['account_all'];
                $amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
                $amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account'];
                $amountlog["remark"] = "�ɹ�����������";
                self::AddAmountLog($amountlog);
            }
            $_order = $borrow_repayment_result['order'];

            //�����վ�Ѿ��������Ͳ��û�
            if ($borrow_repayment_result['status'] != 2) {
                $sql = "select p1.*,p2.user_id from `{borrow_collection}` as p1 left join  `{borrow_tender}` as p2 on p1.tender_id = p2.id where p1.`order` = '{$_order}' and p1.tender_id='{$tender_id}' and p2.borrow_id='{$borrow_repayment_result['borrow_id']}'";
//			echo $sql;
                $result = $mysql->db_fetch_arrays($sql);
                foreach ($result as $key => $value) {
                    //����Ͷ���˵ķ�����Ϣ
                    $sql = "update  `{borrow_collection}` set repay_yestime='" . time() . "',repay_yesaccount = repay_account ,status=1   where repay_yesaccount=0 and  id = '{$value['id']}'";
                    $mysql->db_query($sql);
                    //����Ͷ�ʵ���Ϣ
                    $sql = "update  `{borrow_tender}` set repayment_yesaccount= repayment_yesaccount + {$value['repay_account']},wait_account = wait_account  - {$value['repay_account']} ,wait_interest = wait_interest - {$value['interest']},repayment_yesinterest  = repayment_yesinterest  + {$value['interest']}  where  wait_account>0 and id = '{$value['tender_id']}'";
                    $mysql->db_query($sql);

                    $rc1 = mysql_affected_rows(); //Ӱ������
                    if ($rc1 > 0) {
                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $account_log['user_id'] = $value['user_id'];
                        $account_log['type'] = "invest_repayment";
                        $account_log['money'] = $value['repay_account'];
                        $account_log['total'] = $account_result['total'];
                        $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
                        $account_log['no_use_money'] = $account_result['no_use_money'];
                        $account_log['collection'] = $account_result['collection'] - $account_log['money'];
                        $account_log['to_user'] = $borrow_userid;
                        $account_log['xutou'] = $account_result['xutou'] + $account_log['money'];
                        $account_log['remark'] = "�ͻ���[<a href=\'/liuzhuan/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ļ���";
                        accountClass::AddLog($account_log);



                        //�۳�Ͷ�ʵĹ����
                        if (isset($_G['system']['con_fee_time']) && $_G['system']['con_fee_time'] != "") {
                            $yes_ti = strtotime($_G['system']['con_fee_time']);
                            if ($success_time > $yes_ti) {
                                $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                                $log['user_id'] = $value['user_id'];
                                $log['type'] = "tender_mange"; //
                                if ($account_result['vip_status'] == 1) {
                                    $_fee = (isset($_G['system']['con_vip_integral_fee']) && $_G['system']['con_vip_integral_fee'] != "") ? $_G['system']['con_vip_integral_fee'] : 0.05;
                                } else {
                                    $_fee = (isset($_G['system']['con_integral_fee']) && $_G['system']['con_integral_fee'] != "") ? $_G['system']['con_integral_fee'] : 0.1;
                                }
                                $log['money'] = $value['interest'] * $_fee;
                                $log['total'] = $account_result['total'] - $log['money'];
                                $log['use_money'] = $account_result['use_money'] - $log['money'];
                                $log['no_use_money'] = $account_result['no_use_money'];
                                $log['collection'] = $account_result['collection'];
                                $log['to_user'] = 0;
                                $log['xutou'] = $account_result['xutou'] - $log['money'];
                                $log['remark'] = "�û��ɹ�����۳���Ϣ�Ĺ����";
                                accountClass::AddLog($log);
                            }
                        } else {
                            $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                            $log['user_id'] = $value['user_id'];
                            $log['type'] = "tender_mange"; //
                            if ($account_result['vip_status'] == 1) {
                                $_fee = (isset($_G['system']['con_vip_integral_fee']) && $_G['system']['con_vip_integral_fee'] != "") ? $_G['system']['con_vip_integral_fee'] : 0.05;
                            } else {
                                $_fee = (isset($_G['system']['con_integral_fee']) && $_G['system']['con_integral_fee'] != "") ? $_G['system']['con_integral_fee'] : 0.1;
                            }
                            $log['money'] = $value['interest'] * $_fee;
                            $log['total'] = $account_result['total'] - $log['money'];
                            $log['use_money'] = $account_result['use_money'] - $log['money'];
                            $log['no_use_money'] = $account_result['no_use_money'];
                            $log['collection'] = $account_result['collection'];
                            $log['xutou'] = $account_result['xutou'] - $log['money'];
                            $log['to_user'] = 0;
                            $log['remark'] = "�û��ɹ�����۳���Ϣ�Ĺ����";
                            accountClass::AddLog($log);
                        }


                        //��������
                        $remind['nid'] = "loan_pay";
                        $remind['sent_user'] = "0";
                        $remind['receive_user'] = $value['user_id'];
                        $remind['title'] = "�ͻ���[<a href=\'/liuzhuan/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ļ���";
                        $remind['content'] = "�ͻ���" . date("Y-m-d H:i:s") . "��[<a href=\'/liuzhuan/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ļ���,������Ϊ{$value['repay_account']}";
                        $remind['type'] = "system";
                        remindClass::sendRemind($remind);
                    } //Ӱ������				
                }
            }

            //���ڻ���
            if ($late_result['late_days'] > 0) {

                $account_result = accountClass::GetOne(array("user_id" => $data['user_id']));
                $account_log['user_id'] = $data['user_id'];
                $account_log['type'] = "late_repayment";
                $account_log['money'] = $late_result['late_interest'];
                $account_log['total'] = $account_result['total'] - $account_log['money'];
                $account_log['use_money'] = $account_result['use_money'] - $account_log['money'];
                $account_log['no_use_money'] = $account_result['no_use_money'];
                $account_log['collection'] = $account_result['collection'];
                $account_log['to_user'] = "0";
                $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]�������ڽ��Ŀ۳�";
                //	accountClass::AddLog($account_log);
                //�������ڵ���Ϣ
                $sql = "update`{borrow_repayment}` set late_days = '{$late_result['late_days']}',late_interest = '{$late_result['late_interest']}' where id = {$id}";
                $mysql->db_query($sql);
            }
        }//�������⴦�����
        //������Ļ�����
        $sql = "update {borrow} set repayment_yesaccount= repayment_yesaccount + {$borrow_repayment_result['repayment_account']} where id={$borrow_repayment_result['borrow_id']}";
        $result = $mysql->db_query($sql);

        //���»�����״̬
        //$sql = "update {borrow_repayment} set status=1,repayment_yesaccount='{$borrow_repayment_result['repayment_account']}',repayment_yestime='".time()."' where id=$id";
        //$result = $mysql -> db_query($sql);
        //���������Ļ�����
        $sql = "update {borrow_tender} set interest=interest+{$borrow_repayment_result['interest']},repayment_yesaccount=repayment_yesaccount+{$borrow_repayment_result['capital']} where id={$borrow_repayment_result['borrow_id']}";
        $result = $mysql->db_query($sql);
        self::AutoLZ();
        return $result;
    }

    /**
      /**
     * �鿴Ͷ�����Ϣ
     *
     * @param Array $data
     * @return Array
     */
    public static function Repay($data = array()) {
        global $mysql, $_G;
        $id = $data['id'];
        if ($id == "request") {
            $id = $_REQUEST['id'];
        }
        $_sql = "";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = '{$data['user_id']}'";
        } else {
            return self::ERROR;
        }
        $sql = "select p1.*,p2.name as borrow_name,p2.apr as apr,p2.is_mb as is_mb,p2.repayment_account as all_repayment_account,p2.repayment_yesaccount as all_repayment_yesaccount,p2.user_id as borrow_userid,p2.repayment_yesinterest ,p2.time_limit,p2.forst_account,p2.account as borrow_account,p2.is_vouch,p2.success_time from {borrow_repayment} as p1,{borrow} as p2   where (p1.status=0 or p1.status=2) and p1.id=$id and p1.borrow_id=p2.id $_sql";
        $borrow_repayment_result = $mysql->db_fetch_array($sql);
        $borrow_id = $borrow_repayment_result["borrow_id"];
        $success_time = $borrow_repayment_result["success_time"];
        $borrow_userid = $borrow_repayment_result["borrow_userid"];

        if ($borrow_repayment_result == false) {
            return self::ERROR;
        }
        if ($borrow_repayment_result['status'] == 1) {
            return "�����Ѿ�����벻Ҫ�Ҳ���";
        }
        //�ж���һ���Ƿ��ѻ�
        if ($borrow_repayment_result['order'] != 0) {
            $_order = $borrow_repayment_result['order'] - 1;
            $sql = "select status from `{borrow_repayment}` where `order`=$_order and borrow_id={$borrow_repayment_result['borrow_id']}";
            $result = $mysql->db_fetch_array($sql);
            if ($result != false && $result['status'] != 1) {
                return "�����ڵĽ�û�������Ȼ����ڵ�";
            }
        }
        $late_result = self::LateInterest(array("account" => $borrow_repayment_result['capital'], "repayment_time" => $borrow_repayment_result['repayment_time']));
        //�жϿ�������Ƿ񹻻���
        $sql = "select * from {account} where user_id = '{$data['user_id']}'";
        $account_result = $mysql->db_fetch_array($sql);
        if ($account_result['use_money'] < $borrow_repayment_result['repayment_account'] + $late_result['late_interest']) {
            return self::BORROW_REPAYMENT_NOT_ENOUGH;
        }

        //���»�����״̬
        $sql = "update {borrow_repayment} set status=1,repayment_yesaccount='{$borrow_repayment_result['repayment_account']}',repayment_yestime='" . time() . "' where repayment_account>repayment_yesaccount and id=$id";
        $mysql->db_query($sql);
        $rc = mysql_affected_rows();
        if ($rc > 0) {
            if ($borrow_repayment_result["is_mb"] == 1) {
                $account_result = accountClass::GetOne(array("user_id" => $data['user_id']));
                $account_log['user_id'] = $data['user_id'];
                $account_log['type'] = "borrow_frost";
                $account_log['money'] = $borrow_repayment_result['apr'] * $borrow_repayment_result['borrow_account'] / (100 * 12);
                ;
                $account_log['total'] = $account_result['total'];
                $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
                $account_log['no_use_money'] = $account_result['no_use_money'] - $account_log['money'];
                $account_log['collection'] = $account_result['collection'];
                $account_log['to_user'] = "0";
                $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ľⶳ";
                accountClass::AddLog($account_log);
            }
            //�뻻����л���

            //�۳����������
            $account_result = accountClass::GetOne(array("user_id" => $data['user_id']));
            $account_log['user_id'] = $data['user_id'];
            $account_log['type'] = "repayment";
            $account_log['money'] = $borrow_repayment_result['repayment_account'];
            $account_log['total'] = $account_result['total'] - $account_log['money'];
            $account_log['use_money'] = $account_result['use_money'] - $account_log['money'];
            $account_log['no_use_money'] = $account_result['no_use_money'];
            $account_log['collection'] = $account_result['collection'];
            $account_log['to_user'] = "0";
            $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]����";
            if ($late_result['late_days'] > 30 && $borrow_repayment_result['status'] == 2) {
                $account_log['type'] = "df_repayment";
                $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]ϵͳ�渶���û��Ļ���";
            }
            accountClass::AddLog($account_log);






            $_repay_time = $borrow_repayment_result['repayment_time'];
            $re_time = (strtotime(date("Y-m-d", $_repay_time)) - strtotime(date("Y-m-d", time()))) / (60 * 60 * 24);
            if ($re_time > 4) {
                $credit['nid'] = "advance_3day";
            } elseif ($re_time > 2 && $re_time <= 4) {
                $credit['nid'] = "advance_1day";
            } else {
                $credit['nid'] = "advance_day";
            }
            $result = creditClass::GetTypeOne(array("nid" => $credit['nid']));
            $credit['user_id'] = $data['user_id'];
            $credit['value'] = $result['value'];
            $credit['op_user'] = $_G['user_id'];
            $credit['op'] = 1; //����
            $credit['type_id'] = $result['id'];
            $credit['remark'] = "����ɹ���{$credit['value']}��";
            creditClass::UpdateCredit($credit); //���»���
            //�ж��Ƿ������Ļ������ⶳ������
            if ($borrow_repayment_result['order'] + 1 == $borrow_repayment_result['time_limit']) {

                $account_result = accountClass::GetOne(array("user_id" => $data['user_id']));
                $account_log['user_id'] = $data['user_id'];
                $account_log['type'] = "borrow_frost";
                $account_log['money'] = $borrow_repayment_result['forst_account'];
                $account_log['total'] = $account_result['total'];
                $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
                $account_log['no_use_money'] = $account_result['no_use_money'] - $account_log['money'];
                $account_log['collection'] = $account_result['collection'];
                $account_log['to_user'] = "0";
                $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ľⶳ";
                if ($borrow_repayment_result["is_mb"] != 1) {

                    if ($account_log['money'] != 0) {
                        accountClass::AddLog($account_log);
                    }
                }

                $credit['nid'] = "borrow_success";
                $result = creditClass::GetTypeOne(array("nid" => $credit['nid']));
                $credit['user_id'] = $data['user_id'];
                $credit['value'] = round($borrow_repayment_result['borrow_account'] / 100);
                $credit['op_user'] = $_G['user_id'];
                $credit['op'] = 1; //����
                $credit['type_id'] = $result['id'];
                $credit['remark'] = "���ɹ���{$credit['value']}��";
                creditClass::UpdateCredit($credit); //���»���
            }


            //�ж��Ƿ��ǵ�����
            if ($borrow_repayment_result['is_vouch'] == 1) {
                //Ͷ����Ͷ�ʵ�����ȵ�����
                $sql = "select * from `{borrow_vouch_collection}` where borrow_id=$borrow_id and `order`={$borrow_repayment_result['order']}";
                $result = $mysql->db_fetch_arrays($sql);
                if ($result != "") {
                    foreach ($result as $key => $value) {
                        //��Ӷ�ȼ�¼
                        $amountlog_result = self::GetAmountOne($value['user_id'], "tender_vouch");
                        $amountlog["user_id"] = $value['user_id'];
                        $amountlog["type"] = "tender_vouch_repay";
                        $amountlog["amount_type"] = "tender_vouch";
                        $amountlog["account"] = $value['repay_account'];
                        $amountlog["account_all"] = $amountlog_result['account_all'];
                        $amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
                        $amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account'];
                        $amountlog["remark"] = "�����껹��ɹ���Ͷ�ʵ�����ȷ���";
                        self::AddAmountLog($amountlog);

                        $sql = "update `{borrow_vouch_collection}` set repay_yestime = " . time() . ",repay_yesaccount = {$amountlog['account']},status=1 where id = {$value['id']}";
                        $mysql->db_fetch_array($sql);
                    }
                }


                //����˵�����ȵ�����
                //��Ӷ�ȼ�¼
                $sql = "select * from `{borrow_vouch_repayment}` where borrow_id=$borrow_id and `order`={$borrow_repayment_result['order']}";
                $result = $mysql->db_fetch_array($sql);
                $amountlog_result = self::GetAmountOne($data['user_id'], "borrow_vouch");
                $amountlog["user_id"] = $data['user_id'];
                $amountlog["type"] = "borrow_vouch_repay";
                $amountlog["amount_type"] = "borrow_vouch";
                $amountlog["account"] = $result['repay_account'];
                $amountlog["account_all"] = $amountlog_result['account_all'];
                $amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
                $amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account'];
                $amountlog["remark"] = "����������ɣ�������ȷ���";
                self::AddAmountLog($amountlog);

                $sql = "update `{borrow_vouch_repayment}` set repay_yestime = " . time() . ",repay_yesaccount = {$amountlog['account']},status=1 where id = {$result['id']}";
                $mysql->db_fetch_array($sql);
            }

            ////���ö�ȵ�����
            if ($borrow_repayment_result['is_vouch'] != 1) {
                //��Ӷ�ȼ�¼
                $amountlog_result = self::GetAmountOne($borrow_userid, "credit");
                $amountlog["user_id"] = $borrow_userid;
                $amountlog["type"] = "borrrow_repay";
                $amountlog["amount_type"] = "credit";
                $amountlog["account"] = $borrow_repayment_result['repayment_account'];
                $amountlog["account_all"] = $amountlog_result['account_all'];
                $amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
                $amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account'];
                $amountlog["remark"] = "�ɹ�����������";
                self::AddAmountLog($amountlog);
            }
            $_order = $borrow_repayment_result['order'];

            //�����վ�Ѿ��������Ͳ��û�
            if ($borrow_repayment_result['status'] != 2) {
                $sql = "select p1.*,p2.user_id from `{borrow_collection}` as p1 left join  `{borrow_tender}` as p2 on p1.tender_id = p2.id where p1.`order` = '{$_order}' and p2.borrow_id='{$borrow_repayment_result['borrow_id']}'";
//			echo $sql;
                $result = $mysql->db_fetch_arrays($sql);
                foreach ($result as $key => $value) {
                    //����Ͷ���˵ķ�����Ϣ
                    $sql = "update  `{borrow_collection}` set repay_yestime='" . time() . "',repay_yesaccount = repay_account ,status=1   where id = '{$value['id']}'";
                    $mysql->db_query($sql);
                    //����Ͷ�ʵ���Ϣ
                    $sql = "update  `{borrow_tender}` set repayment_yesaccount= repayment_yesaccount + {$value['repay_account']},wait_account = wait_account  - {$value['repay_account']} ,wait_interest = wait_interest - {$value['interest']},repayment_yesinterest  = repayment_yesinterest  + {$value['interest']}  where id = '{$value['tender_id']}'";
                    $mysql->db_query($sql);
                    $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                    $account_log['user_id'] = $value['user_id'];
                    $account_log['type'] = "invest_repayment";
                    $account_log['money'] = $value['repay_account'];
                    $account_log['total'] = $account_result['total'];
                    $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
                    $account_log['no_use_money'] = $account_result['no_use_money'];
                    $account_log['collection'] = $account_result['collection'] - $account_log['money'];
                    $account_log['to_user'] = $borrow_userid;
                    $account_log['xutou'] = $account_result['xutou'] + $account_log['money'];
                    $account_log['remark'] = "�ͻ���[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ļ���";
                    accountClass::AddLog($account_log);



                    //�۳�Ͷ�ʵĹ����
                    if (isset($_G['system']['con_fee_time']) && $_G['system']['con_fee_time'] != "") {
                        $yes_ti = strtotime($_G['system']['con_fee_time']);
                        if ($success_time > $yes_ti) {
                            $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                            $log['user_id'] = $value['user_id'];
                            $log['type'] = "tender_mange"; //
                            if ($account_result['vip_status'] == 1) {
                                $_fee = (isset($_G['system']['con_vip_integral_fee']) && $_G['system']['con_vip_integral_fee'] != "") ? $_G['system']['con_vip_integral_fee'] : 0.05;
                            } else {
                                $_fee = (isset($_G['system']['con_integral_fee']) && $_G['system']['con_integral_fee'] != "") ? $_G['system']['con_integral_fee'] : 0.1;
                            }
                            $log['money'] = $value['interest'] * $_fee;
                            $log['total'] = $account_result['total'] - $log['money'];
                            $log['use_money'] = $account_result['use_money'] - $log['money'];
                            $log['no_use_money'] = $account_result['no_use_money'];
                            $log['collection'] = $account_result['collection'];
                            $log['to_user'] = 0;
                            $log['xutou'] = $account_result['xutou'] - $log['money'];
                            $log['remark'] = "�û��ɹ�����۳���Ϣ�Ĺ����";
                            accountClass::AddLog($log);
                        }
                    } else {
                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $log['user_id'] = $value['user_id'];
                        $log['type'] = "tender_mange"; //
                        if ($account_result['vip_status'] == 1) {
                            $_fee = (isset($_G['system']['con_vip_integral_fee']) && $_G['system']['con_vip_integral_fee'] != "") ? $_G['system']['con_vip_integral_fee'] : 0.05;
                        } else {
                            $_fee = (isset($_G['system']['con_integral_fee']) && $_G['system']['con_integral_fee'] != "") ? $_G['system']['con_integral_fee'] : 0.1;
                        }
                        $log['money'] = $value['interest'] * $_fee;
                        $log['total'] = $account_result['total'] - $log['money'];
                        $log['use_money'] = $account_result['use_money'] - $log['money'];
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['xutou'] = $account_result['xutou'] - $log['money'];
                        $log['to_user'] = 0;
                        $log['remark'] = "�û��ɹ�����۳���Ϣ�Ĺ����";
                        accountClass::AddLog($log);
                    }


                    //��������
                    $remind['nid'] = "loan_pay";
                    $remind['sent_user'] = "0";
                    $remind['receive_user'] = $value['user_id'];
                    $remind['title'] = "�ͻ���[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ļ���";
                    $remind['content'] = "�ͻ���" . date("Y-m-d H:i:s") . "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]���Ļ���,������Ϊ{$value['repay_account']}";
                    $remind['type'] = "system";
                    remindClass::sendRemind($remind);
                }
            }

            //���ڻ���
            if ($late_result['late_days'] > 0) {

                $account_result = accountClass::GetOne(array("user_id" => $data['user_id']));
                $account_log['user_id'] = $data['user_id'];
                $account_log['type'] = "late_repayment";
                $account_log['money'] = $late_result['late_interest'];
                $account_log['total'] = $account_result['total'] - $account_log['money'];
                $account_log['use_money'] = $account_result['use_money'] - $account_log['money'];
                $account_log['no_use_money'] = $account_result['no_use_money'];
                $account_log['collection'] = $account_result['collection'];
                $account_log['to_user'] = "0";
                $account_log['remark'] = "��[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]�������ڽ��Ŀ۳�";
                accountClass::AddLog($account_log);

                //�������ڵ���Ϣ
                $sql = "update`{borrow_repayment}` set late_days = '{$late_result['late_days']}',late_interest = '{$late_result['late_interest']}' where id = {$id}";
                $mysql->db_query($sql);



                if ($late_result['late_days'] <= 30) {
                    $sql = "select p1.*,p2.user_id from `{borrow_collection}` as p1 left join  `{borrow_tender}` as p2 on p1.tender_id = p2.id where p1.`order` = '{$_order}' and p2.borrow_id='{$borrow_repayment_result['borrow_id']}'";
                    $result = $mysql->db_fetch_arrays($sql);
                    $late_rate = isset($_G['system']['con_late_rate']) ? $_G['system']['con_late_rate'] : 0.008;
                    foreach ($result as $key => $value) {
                        //����Ͷ�ʵ���Ϣ
                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $account_log['user_id'] = $value['user_id'];
                        $account_log['type'] = "late_collection";
                        $account_log['money'] = round((($value['capital'] * $late_rate * $late_result['late_days']) / 2), 2);
                        $account_log['total'] = $account_result['total'] + $account_log['money'];
                        $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
                        $account_log['no_use_money'] = $account_result['no_use_money'];
                        $account_log['collection'] = $account_result['collection'];
                        $account_log['to_user'] = $data['user_id'];
                        $account_log['remark'] = "[<a href=\'/invest/a{$borrow_repayment_result['borrow_id']}.html\' target=_blank>{$borrow_repayment_result['borrow_name']}</a>]�������ڲ�����30���������Ϣ����";
                        accountClass::AddLog($account_log);

                        //�������ڵ���Ϣ
                        $sql = "update`{borrow_collection}` set late_days = '{$late_result['late_days']}',late_interest = '{$account_log['money']}' where id = {$value['id']}";
                        $mysql->db_query($sql);
                    }
                }
            }


            //������Ļ�����
            $sql = "update {borrow} set repayment_yesaccount= repayment_yesaccount + {$borrow_repayment_result['repayment_account']} where repayment_account>repayment_yesaccount and id={$borrow_repayment_result['borrow_id']}";
            $result = $mysql->db_query($sql);



            //���������Ļ�����
            $sql = "update {borrow_tender} set interest=interest+{$borrow_repayment_result['interest']},repayment_yesaccount=repayment_yesaccount+{$borrow_repayment_result['capital']} where id={$borrow_repayment_result['borrow_id']}";
            $result = $mysql->db_query($sql);
        }
        return $result;
    }

    /**
     * �鿴Ͷ�����Ϣ
     *
     * @param Array $data
     * @return Array
     */
    function GetRepaymentList($data = array()) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = " where p1.borrow_id=p2.id and p2.user_id=p3.user_id and p2.status=3 ";
        if (isset($data['id']) && $data['id'] != "") {
            if ($data['id'] == "request") {
                $_sql .= " and p1.borrow_id= '{$_REQUEST['id']}'";
            } else {
                $_sql .= " and p1.borrow_id= '{$data['id']}'";
            }
        }
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = '{$data['user_id']}'";
        }
        if (isset($data['username']) && $data['username'] != "") {
            $_sql .= " and p3.username like '%{$data['username']}%'";
        }
        if (isset($data['repayment_time']) && $data['repayment_time'] != "") {
            if ($data['repayment_time'] == 0) {
                $data['repayment_time'] = time();
            }
            $_repayment_time = get_mktime(date("Y-m-d", $data['repayment_time']));
            $_sql .= " and p1.repayment_time < '{$_repayment_time}'";
        }

        if (isset($data['late_repayment_list'])) {
            $_repayment_time = get_mktime(date("Y-m-d", $data['late_repayment_list']));
            $_sql .= " and p1.repayment_time <= '{$_repayment_time}'";
        }

        if (isset($data['dotime2'])) {
            $dotime2 = ($data['dotime2'] == "request") ? $_REQUEST['dotime2'] : $data['dotime2'];
            if ($dotime2 != "") {
                $_sql .= " and p2.addtime < " . get_mktime($dotime2);
            }
        }
        if (isset($data['dotime1'])) {
            $dotime1 = ($data['dotime1'] == "request") ? $_REQUEST['dotime1'] : $data['dotime1'];
            if ($dotime2 != "") {
                $_sql .= " and p2.addtime > " . get_mktime($dotime1);
            }
        }
        //-------------------------------------------ʵʱ����
        $now = time();
        if (isset($data['type']) && $data['type'] == 1) {
            $_sql .="and p1.repayment_time>{$now} and (p1.repayment_time -{$now})<24*60*60*7";
        }
        if (isset($data['type']) && $data['type'] == 2) {
            $_sql .="and p1.repayment_time<{$now} and ({$now}-p1.repayment_time)<24*60*60*30";
        }
        if (isset($data['type']) && $data['type'] == 3) {
            $_sql .="and ({$now}-p1.repayment_time)>24*60*60*30";
        }
        if (isset($data['type']) && $data['type'] == 4) {
            $data['status'] = 1;
            $_sql .="and p1.repayment_yestime > p1.repayment_time";
        }
        //-------------------------------------------ʵʱ����
        if (isset($data['status'])) {
            $_sql .= " and p1.status in ({$data['status']})";
        }
        if (isset($data['kefu_userid']) && $data['kefu_userid'] != "") {
            $sql = "select 1 from `{user_cache}` where kefu_userid={$data['kefu_userid']} and user_id='{$data['user_id']}'";
            $result = $mysql->db_fetch_array($sql);
            if ($result == "" || $result == false) {
                return "���Ĳ�������";
            }
        }
        $keywords = empty($data['keywords']) ? "" : $data['keywords'];
        if ((!empty($keywords))) {
            if ($keywords == "request") {
                if (isset($_REQUEST['keywords']) && $_REQUEST['keywords'] != "") {
                    $_sql .= " and p2.name like '%" . urldecode($_REQUEST['keywords']) . "%'";
                }
            } else {
                $_sql .= " and p2.name like '%" . $keywords . "%'";
            }
        }

        $_order = " order by p1.id desc";
        if (isset($data['order']) && $data['order'] != "") {
            if ($data['order'] == "repayment_time") {
                $_order = " order by p1.repayment_time asc ";
            } elseif ($data['order'] == "order") {
                $_order = " order by p1.order asc ,p1.id desc";
            }
        }

        $_select = " p1.*,p2.is_cz,p2.name as borrow_name,p2.is_fast,p2.time_limit,p3.username,p3.user_id,p3.phone,p3.area";
        $sql = "select SELECT from `{borrow_repayment}` as p1,`{borrow}` as p2 ,`{user}` as p3  {$_sql} ORDER LIMIT";

        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
            $sql2 = str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql);
            foreach ($list as $key => $value) {
                $late = self::LateInterest(array("repayment_time" => $value['repayment_time'], "account" => $value['capital']));
                if ($value['status'] != 1) {
                    $list[$key]['late_days'] = $late['late_days'];
                    $list[$key]['late_interest'] = $late['late_interest'];
                }
            }
            return $list;
        }

        //echo str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  $_order, $_limit), $sql);
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";
        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql));
        $sql3 = str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql);
        $list = $list ? $list : array();
        foreach ($list as $key => $value) {
            if ($list[$key]['is_fast'] == 1) {
                $sf = "select isqiye,id from `{daizi}` where borrow_id = {$list[$key]['borrow_id']}";
                $list_fast = $mysql->db_fetch_array($sf);
                if ($list_fast) {
                    $list[$key]['fastid'] = $list_fast['id'];
                    $list[$key]['isqiye'] = $list_fast['isqiye'];
                }
            }
            $late = self::LateInterest(array("repayment_time" => $value['repayment_time'], "account" => $value['capital']));
            if ($value['status'] != 1) {
                $list[$key]['late_days'] = $late['late_days'];
                $list[$key]['late_interest'] = $late['late_interest'];
            }
        }

        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    function GetVouchRepayList($data = array()) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = " where p1.borrow_id=p2.id and p2.user_id=p3.user_id ";
        if (isset($data['id']) && $data['id'] != "") {
            if ($data['id'] == "request") {
                $_sql .= " and p1.borrow_id= '{$_REQUEST['id']}'";
            } else {
                $_sql .= " and p1.borrow_id= '{$data['id']}'";
            }
        }
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = '{$data['user_id']}'";
        }
        if (isset($data['vouch_userid']) && $data['vouch_userid'] != "") {
            $_sql .= " and p2.id in (select borrow_id from `{borrow_vouch}` where user_id={$data['vouch_userid']})";
        }
        if (isset($data['username']) && $data['username'] != "") {
            $_sql .= " and p3.username like '%{$data['username']}%'";
        }
        if (isset($data['repayment_time']) && $data['repayment_time'] != "") {
            if ($date['repayment_time'] == 0)
                $data['repayment_time'] = time();
            $_repayment_time = get_mktime(date("Y-m-d", $data['repayment_time']));
            $_sql .= " and p1.repayment_time < '{$_repayment_time}'";
        }

        if (isset($data['dotime2'])) {
            $dotime2 = ($data['dotime2'] == "request") ? $_REQUEST['dotime2'] : $data['dotime2'];
            if ($dotime2 != "") {
                $_sql .= " and p2.addtime < " . get_mktime($dotime2);
            }
        }
        if (isset($data['dotime1'])) {
            $dotime1 = ($data['dotime1'] == "request") ? $_REQUEST['dotime1'] : $data['dotime1'];
            if ($dotime2 != "") {
                $_sql .= " and p2.addtime > " . get_mktime($dotime1);
            }
        }
        if (isset($data['status'])) {
            $_sql .= " and p1.status in ({$data['status']})";
        }
        $keywords = empty($data['keywords']) ? "" : $data['keywords'];
        if ((!empty($keywords))) {
            if ($keywords == "request") {
                if (isset($_REQUEST['keywords']) && $_REQUEST['keywords'] != "") {
                    $_sql .= " and p2.name like '%" . urldecode($_REQUEST['keywords']) . "%'";
                }
            } else {
                $_sql .= " and p2.name like '%" . $keywords . "%'";
            }
        }

        $_order = " order by p1.id desc";
        if (isset($data['order']) && $data['order'] != "") {
            if ($data['order'] == "repayment_time") {
                $_order = " order by p1.repayment_time asc ";
            } elseif ($data['order'] == "order") {
                $_order = " order by p1.order asc ,p1.id desc";
            }
        }

        $_select = " p1.*,p2.name as borrow_name,p2.time_limit,p2.is_liuzhuan,p3.username as borrow_username";
        $sql = "select SELECT from `{borrow_repayment}` as p1 left join `{borrow}` as p2 on p1.borrow_id = p2.id left join `{user}` as p3 on p3.user_id=p2.user_id {$_sql} ORDER LIMIT";

        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
            foreach ($list as $key => $value) {
                $late = self::LateInterest(array("repayment_time" => $value['repayment_time'], "account" => $value['capital']));
                if ($value['status'] != 1) {
                    $list[$key]['late_days'] = $late['late_days'];
                    $list[$key]['late_interest'] = $late['late_interest'];
                }
            }
            return $list;
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";
        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql));
        $list = $list ? $list : array();
        foreach ($list as $key => $value) {
            $late = self::LateInterest(array("repayment_time" => $value['repayment_time'], "account" => $value['capital']));
            if ($value['status'] != 1) {
                $list[$key]['late_days'] = $late['late_days'];
                $list[$key]['late_interest'] = $late['late_interest'];
            }
        }
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    //������Ϣ����
    //account ��� repayment_time ����ʱ��
    function LateInterest($data) {
        global $mysql, $_G;
        $late_rate = isset($_G['system']['con_late_rate']) ? $_G['system']['con_late_rate'] : 0.008;
        $now_time = get_mktime(date("Y-m-d", time()));
        $repayment_time = get_mktime(date("Y-m-d", $data['repayment_time']));
        $late_days = ($now_time - $repayment_time) / (60 * 60 * 24);
        $_late_days = explode(".", $late_days);
        $late_days = ($_late_days[0] < 0) ? 0 : $_late_days[0];
        $late_interest = round($data['account'] * $late_rate * $late_days, 2);
        if ($late_days == 0)
            $late_interest = 0;
        return array("late_days" => $late_days, "late_interest" => $late_interest);
    }

    function LateRepay($data) {
        global $mysql, $_G;
        $sql = "select p1.*,p2.name as borrow_name from `{borrow_repayment}` as p1 left join `{borrow}` as p2 on p1.borrow_id = p2.id where p1.id = {$data['id']}";
        $result = $mysql->db_fetch_array($sql);
        if ($result['status'] == 1) {
            return;
        } elseif ($result['status'] == 2) {
            
        } elseif ($result['status'] == 0) {
            $late_result = self::LateInterest(array("account" => $result['capital'], "repayment_time" => $result['repayment_time']));
            /*if ($late_result['late_days'] < 30) {
                $msg = array("�˱���δ����30��");
                return false;
            } else {*/
                //���»����״̬Ϊ2����ʾ��վ�Ѿ�����

                $sql = "update `{borrow_repayment}` set status=2,webstatus=1 where id = {$data['id']}";
                $mysql->db_query($sql);

                $order = $result['order'];
                $borrow_id = $result['borrow_id'];
                $borrow_name = $result['borrow_name'];


                $sql = "select p1.*,p2.user_id
                        from `{borrow_collection}` as p1
                        left join  `{borrow_tender}` as p2
                        on p1.tender_id = p2.id
                        where p1.`order` = '{$order}' and p2.borrow_id='{$borrow_id}'";
                $result = $mysql->db_fetch_arrays($sql);
                foreach ($result as $key => $value) {
                    //����Ͷ���˵ķ�����Ϣ
                    $sql = "update  `{borrow_collection}` set repay_yestime='" . time() . "',repay_yesaccount = repay_account ,status=2   where id = '{$value['id']}'";
                    $mysql->db_query($sql);
                    //����Ͷ�ʵ���Ϣ
                    $sql = "update  `{borrow_tender}` set repayment_yesaccount= repayment_yesaccount + {$value['repay_account']},wait_account = wait_account  - {$value['repay_account']} ,wait_interest = wait_interest - {$value['interest']},repayment_yesinterest  = repayment_yesinterest  + {$value['interest']}  where id = '{$value['tender_id']}'";
                    $mysql->db_query($sql);
                    $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                    $account_log['user_id'] = $value['user_id'];
                    $account_log['type'] = "system_repayment";
                    $account_log['money'] = $value['repay_account'];
                    $account_log['total'] = $account_result['total'];
                    $account_log['use_money'] = $account_result['use_money'] + $account_log['money'];
                    $account_log['no_use_money'] = $account_result['no_use_money'];
                    $account_log['collection'] = $account_result['collection'] - $account_log['money'];
                    $account_log['to_user'] = "0";
                    $account_log['xutou'] = $account_result['xutou'] + $account_log['money'];
                    $account_log['remark'] = "�ͻ����ڳ���30�죬ϵͳ�Զ���[<a href=\'/invest/a{$borrow_id}.html\' target=_blank>{$borrow_name}</a>]���Ļ���";
                    accountClass::AddLog($account_log);
					
					//�۳�Ͷ�ʵĹ����
                        if (isset($_G['system']['con_fee_time']) && $_G['system']['con_fee_time'] != "") {
                            $yes_ti = strtotime($_G['system']['con_fee_time']);
                            if ($success_time > $yes_ti) {
                                $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                                $log['user_id'] = $value['user_id'];
                                $log['type'] = "tender_mange"; //
                                if ($account_result['vip_status'] == 1) {
                                    $_fee = (isset($_G['system']['con_vip_integral_fee']) && $_G['system']['con_vip_integral_fee'] != "") ? $_G['system']['con_vip_integral_fee'] : 0.05;
                                } else {
                                    $_fee = (isset($_G['system']['con_integral_fee']) && $_G['system']['con_integral_fee'] != "") ? $_G['system']['con_integral_fee'] : 0.1;
                                }
                                $log['money'] = $value['interest'] * $_fee;
                                $log['total'] = $account_result['total'] - $log['money'];
                                $log['use_money'] = $account_result['use_money'] - $log['money'];
                                $log['no_use_money'] = $account_result['no_use_money'];
                                $log['collection'] = $account_result['collection'];
                                $log['to_user'] = 0;
                                $log['xutou'] = $account_result['xutou'] - $log['money'];
                                $log['remark'] = "�û��ɹ�����۳���Ϣ�Ĺ����";
                                accountClass::AddLog($log);
                            }
                        } else {
                            $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                            $log['user_id'] = $value['user_id'];
                            $log['type'] = "tender_mange"; //
                            if ($account_result['vip_status'] == 1) {
                                $_fee = (isset($_G['system']['con_vip_integral_fee']) && $_G['system']['con_vip_integral_fee'] != "") ? $_G['system']['con_vip_integral_fee'] : 0.05;
                            } else {
                                $_fee = (isset($_G['system']['con_integral_fee']) && $_G['system']['con_integral_fee'] != "") ? $_G['system']['con_integral_fee'] : 0.1;
                            }
                            $log['money'] = $value['interest'] * $_fee;
                            $log['total'] = $account_result['total'] - $log['money'];
                            $log['use_money'] = $account_result['use_money'] - $log['money'];
                            $log['no_use_money'] = $account_result['no_use_money'];
                            $log['collection'] = $account_result['collection'];
                            $log['xutou'] = $account_result['xutou'] - $log['money'];
                            $log['to_user'] = 0;
                            $log['remark'] = "�û��ɹ�����۳���Ϣ�Ĺ����";
                            accountClass::AddLog($log);
                        }

                    /*$account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                    if ($account_result['vip_status'] != 1) {
                        $account_log['user_id'] = $value['user_id'];
                        $account_log['type'] = "late_rate";
                        $account_log['money'] = $value['interest'];
                        $account_log['total'] = $account_result['total'] - $account_log['money'];
                        $account_log['use_money'] = $account_result['use_money'] - $account_log['money'];
                        $account_log['no_use_money'] = $account_result['no_use_money'];
                        $account_log['collection'] = $account_result['collection'];
                        $account_log['to_user'] = "0";
                        $account_log['xutou'] = $account_result['xutou'] - $account_log['money'];
                        $account_log['remark'] = "�ͻ����ڳ���30���[<a href=\'/invest/a{$borrow_id}.html\' target=_blank>{$borrow_name}</a>]�������Ϣ�۳�";
                        accountClass::AddLog($account_log);
                    }*/
                }
                return true;
            //}
        }
    }

    /**
     * �鿴Ͷ�����Ϣ
     *
     * @param Array $data
     * @return Array
     */
    public static function GetRepayment($data = array()) {
        global $mysql;
        $id = $data['id'];
        $sql = "select * from {borrow}  where id=$id";
        $result = $mysql->db_fetch_array($sql);
        $data['account'] = $result['account'];
        $data['year_apr'] = $result['apr'];
        $data['month_times'] = $result['time_limit'];
        $data['borrow_time'] = $result['success_time'];
        $data['borrow_style'] = $result['style'];
        $data['isday'] = $result['isday'];
        $data['time_limit_day'] = $result['time_limit_day'];

        return self::EqualInterest($data);
    }

    /**
     * �鿴Ͷ�����Ϣ
     *
     * @param Array $data(user_id,id,status,remark)
     * @return Array
     */
    public static function AddRepayment($data = array()) {
        global $mysql, $_G;
        $id = $data['id'];
        if ($id == "")
            return self::ERROR;
        $status = $data['status'];
        /* 	$sql1="select * from `{lock}` where userid=".$user_id." order by id desc limit 1";
          $result1=$mysql->db_fetch_array($sql1);
          $sqllock="LOCK TABLES `{lock}` WRITE";
          $mysql->db_query($sqllock); */
        $sqllock = "select get_lock('m_" . $user_id . "', 30) as status";
        $sqlunlock = "select release_lock('m_" . $user_id . "') as status";
        $mysql->db_query($sqllock);
        $sql = "select * from {borrow}  where id=$id";
        $result = $mysql->db_fetch_array($sql);
        $status1 = $result['status'];
        if ($result['status'] != 1) {
            return "�˱��Ѿ���˹������������";
        }
        $remind_send_borrow_id = $id;
        $is_fast = $result['is_fast'];
        $is_mb = $result['is_mb'];
        $user_id = $result['user_id'];
        $borrow_name = $result['name'];
        $borrow_account = $result['account'];
        $style = $result['style'];
        $award = $result['award'];
        $funds = $result['funds'];
        $is_vouch = $result['is_vouch']; //�Ƿ��ǵ�����
        $vouch_award = $result['vouch_award']; //�����Ľ���
        $part_account = $result['part_account'];
        $tender_times = $result['tender_times'];
        $month_times = $result['time_limit'];
        $repayment_account = $result['repayment_account'];
        $_data['account'] = $borrow_account;
        $_data['year_apr'] = $result['apr'];
        $_data['month_times'] = $month_times;
        $_data['borrow_time'] = $result['success_time'];
        $_data['borrow_style'] = $result['style'];
        $_data['isday'] = $result['isday'];
        $_data['is_jin'] = $result['is_jin'];
        $is_jin = $result['is_jin'];
        $_data['time_limit_day'] = $result['time_limit_day'];
        $_data['time_limit'] = $result['time_limit'];
        $result = self::EqualInterest($_data);
        $total_account = 0;
        $borrow_url = "<a href=\'/invest/a{$id}.html\' target=_blank>{$borrow_name}</a>";

        $remind_send_type_name = '';

        $is_cancel = true;
        if ($status == 3 && $status != $status1) {
            $is_cancel = false;
            $remind_send_type_name = 'borrow_review_success_remind';
            //����ɹ����򽫻�����Ϣ���������ȥ

            $sqlmylock = " update {borrow} set status={$data['status']} where status!=3 and id={$id}";
            $mysql->db_query($sqlmylock);
            if (mysql_affected_rows() > 0) {

                foreach ($result as $key => $value) {
                    if ($_data['isday'] == 1) {
                        $value['repayment_time'] = time() + ($_data['time_limit_day']) * 60 * 60 * 24;
                    }
                    $total_account = $total_account + $value['repayment_account']; //�ܻ����
                    $sql = "insert into {borrow_repayment} set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "',`borrow_id`='{$id}',`order`='{$key}',`repayment_time`='{$value['repayment_time']}',
						`repayment_account`='{$value['repayment_account']}',`interest`='{$value['interest']}',`capital`='{$value['capital']}'
						";
                    $mysql->db_query($sql);
                    $repayment_account = $value['repayment_account'];
                }

                //�۳�����Ͷ���ߵĽ�Ǯ��
                $sql = "select * from `{borrow_tender}`  where borrow_id=$id";
                $result = $mysql->db_fetch_arrays($sql);
                foreach ($result as $key => $value) {
                    $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                    $log['user_id'] = $value['user_id'];
                    $log['type'] = "invest";
                    $log['money'] = $value['account'];
                    $log['total'] = $account_result['total'] - $log['money'];
                    $log['use_money'] = $account_result['use_money'];
                    $log['no_use_money'] = $account_result['no_use_money'] - $log['money'];
                    $log['collection'] = $account_result['collection'];
                    $log['to_user'] = $user_id;
                    $log['remark'] = "Ͷ��ɹ����ÿ۳�";
                    accountClass::AddLog($log);

                    //��Ӵ��յĽ��
                    $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                    $log['user_id'] = $value['user_id'];
                    $log['type'] = "collection";
                    $log['money'] = $value['repayment_account'];
                    $log['total'] = $account_result['total'] + $log['money'];
                    $log['use_money'] = $account_result['use_money'];
                    $log['no_use_money'] = $account_result['no_use_money'];
                    $log['collection'] = $account_result['collection'] + $log['money'];
                    $log['to_user'] = $user_id;
                    $log['remark'] = "���ս��";
                    accountClass::AddLog($log);

                    if ($is_mb == 0 && 0) {
                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $log['user_id'] = $value['user_id'];
                        $log['type'] = "award_add";
                        $xutou_money = $account_result['xutou'];
                        if ($xutou_money > 0) {
                            $money = 0;
                            if ($xutou_money < $value['account']) {
                                $money = $xutou_money * 0.3 / 100.0;
                                $log['xutou'] = 0;
                            } else {
                                $money = $value['account'] * 0.3 / 100.0;
                                $log['xutou'] = $xutou_money - $value['account'];
                            }
                            $log['money'] = $money;
                            $log['total'] = $account_result['total'] + $money;
                            $log['use_money'] = $account_result['use_money'] + $money;
                            $log['no_use_money'] = $account_result['no_use_money'];
                            $log['collection'] = $account_result['collection'];
                            $log['to_user'] = $user_id;
                            $log['remark'] = "��Ͷ����";
                            accountClass::AddLog($log);
                        }
                    }


                    //��������
                    $remind['nid'] = "loan_yes_account";
                    $remind['sent_user'] = "0";
                    $remind['receive_user'] = $value['user_id'];
                    $remind['title'] = "Ͷ�ʵı�[<font color=red>{$borrow_name}</font>]������˳ɹ�";
                    $remind['content'] = "����Ͷ�ʵı�[<a href=\'/invest/a{$data['id']}.html\' target=_blank><font color=red>{$borrow_name}</font></a>]��" . date("Y-m-d", time()) . "�Ѿ����ͨ��";
                    $remind['type'] = "system";
                    remindClass::sendRemind($remind);



                    $credit['nid'] = "invest_success";
                    $result = creditClass::GetTypeOne(array("nid" => $credit['nid']));
                    $credit['user_id'] = $value['user_id'];
                    $credit['value'] = round($value['account'] / 100);
                    $credit['op_user'] = $_G['user_id'];
                    ;
                    $credit['op'] = 1; //����
                    $credit['type_id'] = $result['id'];
                    $credit['remark'] = "Ͷ�ʳɹ���{$credit['value']}��";
                    creditClass::UpdateCredit($credit); //���»���
                    //����Ͷ���˵�Ͷ���Ļ�������
                    $co_time = get_times($gdata=array("time"=>time(),"num"=>1))-get_times($gdata=array("time"=>$value['addtime'],"num"=>1));
                    if ($_data['isday'] == 1) {
                        $co_time = time() + ($_data['time_limit_day']) * 60 * 60 * 24;
                        $sql = " update `{borrow_collection}` set repay_time={$co_time} where tender_id='{$value['id']}'";
                        $mysql->db_query($sql);
                    } else {
			            $sql = " update `{borrow_collection}` set repay_time=repay_time+{$co_time} where tender_id='{$value['id']}'";
                        $mysql->db_query($sql);
                        $sql = " select * from dw_borrow_collection where tender_id='{$value['id']}' limit 1";
                        $wresult=$mysql->db_fetch_arrays($sql);
                        $wid=$wresult[0]['id'];
                        //$wtime=$wresult[0]['repay_time'];
                        $wtime = time();
                        for ($i=1;$i<=$_data['time_limit'];$i++){
                            $wco_time = get_times($gdata=array("time"=>$wtime,"type"=>"month","num"=>$i));
                            $order = $i - 1;
                            $sql = " update `{borrow_collection}` set repay_time={$wco_time} where tender_id='{$value['id']}' and `order`=$order";
                            $mysql->db_query($sql);
                            $wid++;
                        }
                    }
                    
                }
                /*   $sqllock="UNLOCK TABLES";
                  $mysql->db_query($sqllock); */
                $mysql->db_query($sqlunlock);
                //������ܽ�����ӡ�
                $account_result = accountClass::GetOne(array("user_id" => $user_id));
                $borrow_log['user_id'] = $user_id;
                $borrow_log['type'] = "borrow_success";
                $borrow_log['money'] = $borrow_account;
                $borrow_log['total'] = $account_result['total'] + $borrow_log['money'];
                $borrow_log['use_money'] = $account_result['use_money'] + $borrow_log['money'];
                $borrow_log['no_use_money'] = $account_result['no_use_money'];
                $borrow_log['collection'] = $account_result['collection'];
                $borrow_log['to_user'] = "0";
                $borrow_log['remark'] = "ͨ��[{$borrow_url}]�赽�Ŀ�";
                accountClass::AddLog($borrow_log);


                //�������ı�֤��10%��
                $account_result = accountClass::GetOne(array("user_id" => $user_id));
                $margin_log['user_id'] = $user_id;
                $margin_log['type'] = "margin";
                if ($is_vouch == 1) {
                    $margin_log['money'] = $borrow_account * 0.05;
                } else {
                    $margin_log['money'] = $borrow_account * 0.1;
                }
                if ($is_mb == 1) {
                    $margin_log['money'] = 0;
                }
                if ($is_fast == 1) {
                    // $margin_log['money'] =0;
                }
                if ($is_jin == 1) {
                    $margin_log['money'] = 0;
                }
                $margin_log['money'] = 0;

                $margin_log['total'] = $account_result['total'];
                $margin_log['use_money'] = $account_result['use_money'] - $margin_log['money'];
                $margin_log['no_use_money'] = $account_result['no_use_money'] + $margin_log['money'];
                $margin_log['collection'] = $account_result['collection'];
                $margin_log['to_user'] = "0";
                $margin_log['remark'] = "��������[{$borrow_url}]�ı�֤��";
                //�����֤�����0���ǲ���д��¼��

                if ($margin_log['money'] <> 0) {
                    accountClass::AddLog($margin_log);
                    //���±�֤��
                    $sql = "update `{borrow}` set forst_account='{$margin_log['money']}' where id='{$id}'";
                    $mysql->db_query($sql);
                }

                //�۳�2%��������
                $money = 0;
                /*if (isset($_G['system']["con_borrow_fee"]) && $_G['system']["con_borrow_fee"] > 0) {
                    $borrow_fee = $_G['system']["con_borrow_fee"];
                } else {
                    $borrow_fee = 0.02;
                }
                if ($is_mb == 1) {
                    $borrow_fee = 0;
                }
                if ($month_times > 2) {
                    $money = round($borrow_account * $borrow_fee + ($month_times - 2) * 0.004 * $borrow_account, 2);
                } else {
                    $money = round($borrow_account * $borrow_fee, 2);
                }
                if ($_data['isday'] == 1) {
                    if ($_data['is_jin'] == 1) {
                        $money = round(0.001 * $borrow_account * $_data['time_limit_day'] / 30, 2);
                    } else {
                        $money = round(0.02 * $borrow_account * $_data['time_limit_day'] / 30, 2);
                    }
                } else {

                    if ($_data['is_jin'] == 1) {
                        $money = round(0.002 * $borrow_account, 2);
                    }
                }*/


                $account_result = accountClass::GetOne(array("user_id" => $user_id));
                $fee_log['user_id'] = $user_id;
                $fee_log['type'] = "borrow_fee";
                $fee_log['money'] = $money;
                $fee_log['total'] = $account_result['total'] - $fee_log['money'];
                $fee_log['use_money'] = $account_result['use_money'] - $fee_log['money'];
                $fee_log['no_use_money'] = $account_result['no_use_money'];
                $fee_log['collection'] = $account_result['collection'];
                $fee_log['to_user'] = "0";
                $fee_log['remark'] = "���[{$borrow_url}]��������";
                if ($fee_log['money'] != 0) {
                    accountClass::AddLog($fee_log);
                }
                //���ɹ���1��


                /*

                  $credit['nid'] = "borrow_success";
                  $result = creditClass::GetTypeOne(array("nid"=>$credit['nid']));
                  $credit['user_id'] = $user_id;
                  $credit['value'] = 1;
                  $credit['op_user'] = $_G['user_id'];
                  $credit['op'] = 1;//����
                  $credit['type_id'] = $result['id'];
                  $credit['remark'] = "���ɹ���1��";
                  creditClass::UpdateCredit($credit);//���»���
                 */


                //�ж�vip��Ա���Ƿ�۳�
                accountClass::AccountVip(array("user_id" => $user_id));

                //ֻ�е�һ�ν���ʱ��ſ۳�
                /* $sql = "select p1.invite_userid,p1.invite_money,p2.username  from `{user}` as p1 left join `{user}` as p2 on p1.invite_userid = p2.user_id where p1.user_id = '{$user_id}' ";
                  $result = $mysql ->db_fetch_array($sql);
                  if ($result['invite_userid']!="" && $result['invite_money']!="" && $result['invite_money']<=0){
                  //�����������
                  $vip_ticheng = (!isset($_G['system']['con_vip_ticheng']) || $_G['system']['con_vip_ticheng']=="")?20:$_G['system']['con_vip_ticheng'];
                  $account_result =  accountClass::GetOne(array("user_id"=>$result['invite_userid']));
                  $ticheng_log['user_id'] = $result['invite_userid'];
                  $ticheng_log['type'] = "ticheng";
                  $ticheng_log['money'] = $vip_ticheng;
                  $ticheng_log['total'] = $account_result['total']+$ticheng_log['money'];
                  $ticheng_log['use_money'] = $account_result['use_money']+$ticheng_log['money'];
                  $ticheng_log['no_use_money'] = $account_result['no_use_money'];
                  $ticheng_log['collection'] = $account_result['collection'];
                  $ticheng_log['to_user'] = "0";
                  $ticheng_log['remark'] = "�����û�ע��(<a href=\'/u/{$result['invite_userid']}\' target=_blank>{$result['username']}</a>)��ΪVIP�����";
                  accountClass::AddLog($ticheng_log);
                  $sql = "update `{user}` set invite_money=$vip_ticheng where user_id='{$user_id}'";
                  $mysql -> db_query($sql);
                  } */

                //��������ʱ�Ĳ�����
                $nowtime = time();
                $endtime = get_times(array("num" => $month_times, "time" => $nowtime));
                if ($style == 1) {
                    $_each_time = "ÿ�����º�" . date("d", $nowtime) . "��";
                } else {
                    $_each_time = "ÿ��" . date("d", $nowtime) . "��";
                }
                if ($_data['isday'] == 1) {
                    $endtime = $endtime - (30 - $_data['time_limit_day']) * 60 * 60 * 24;
                }
                $sql = " update {borrow} set success_time='{$nowtime}',end_time='{$endtime}',each_time='{$_each_time}',payment_account='{$repayment_account}' where id='{$id}'";
                $mysql->db_query($sql);



                //�ж��Ƿ��ǵ�����
                if ($is_vouch == 1) {

                    $result = self::GetVouchList(array("limit" => "all", "borrow_id" => $id));
                    if ($result != "") {
                        foreach ($result as $key => $value) {
                            $vouch_account = $value['account'];
                            $vouch_userid = $value['user_id'];
                            $vouch_id = $value['id'];
                            $vouch_awa = round(($vouch_award * $value['account']) / 100, 2);
                            $sql = "update `{borrow_vouch}` set status=1,award_fund='{$vouch_award}',award_account={$vouch_awa} where id = {$value['id']}";
                            $mysql->db_query($sql);

                            //���ɹ��Ľ���5%��
                            $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                            $vouch_log['user_id'] = $value['user_id'];
                            $vouch_log['type'] = "vouch_award";
                            $vouch_log['money'] = $vouch_awa;
                            $vouch_log['total'] = $account_result['total'] + $vouch_log['money'];
                            $vouch_log['use_money'] = $account_result['use_money'] + $vouch_log['money'];
                            $vouch_log['no_use_money'] = $account_result['no_use_money'];
                            $vouch_log['collection'] = $account_result['collection'];
                            $vouch_log['to_user'] = "0";
                            $vouch_log['remark'] = "���������[{$borrow_url}]���ɹ��Ľ���";
                            accountClass::AddLog($vouch_log);

                            //���ɹ��Ľ���֧����
                            $account_result = accountClass::GetOne(array("user_id" => $user_id));
                            $vouch_log['user_id'] = $user_id;
                            $vouch_log['type'] = "vouch_awardpay";
                            $vouch_log['money'] = $vouch_awa;
                            $vouch_log['total'] = $account_result['total'] - $vouch_log['money'];
                            $vouch_log['use_money'] = $account_result['use_money'] - $vouch_log['money'];
                            $vouch_log['no_use_money'] = $account_result['no_use_money'];
                            $vouch_log['collection'] = $account_result['collection'];
                            $vouch_log['to_user'] = $value['user_id'];
                            $vouch_log['remark'] = "���������[{$borrow_url}]���ɹ��Ľ���֧��";
                            accountClass::AddLog($vouch_log);

                            //�۳�Ͷ�ʵ����˵ĵ������
                            //��Ӷ�ȼ�¼
                            $amountlog_result = self::GetAmountOne($value["vouch_user"], "tender_vouch");
                            $amountlog["user_id"] = $value["vouch_user"];
                            $amountlog["type"] = "tender_vouch_add";
                            $amountlog["amount_type"] = "tender_vouch";
                            $amountlog["account"] = $value['vouch_account'];
                            $amountlog["account_all"] = $amountlog_result['account_all'];
                            $amountlog["account_use"] = $amountlog_result['account_use'] - $amountlog['account'];
                            $amountlog["account_nouse"] = $amountlog_result['account_nouse'] + $amountlog['account'];
                            $amountlog["remark"] = "����������ͨ��";
                            self::AddAmountLog($amountlog);


                            //������������ӵ�vouch_collection������ȥ
                            $_data['account'] = $vouch_account;
                            $_data['year_apr'] = $month_times;
                            $_vouch_account = round($vouch_account / $month_times, 2);

                            for ($i = 0; $i < $month_times; $i++) {
                                if ($i == $month_times - 1) {
                                    $_vouch_account = $vouch_account - $_vouch_account * $i;
                                }
                                $repay_time = get_times(array("time" => time(), "num" => $i + 1));
                                $sql = "insert into `{borrow_vouch_collection}` set borrow_id={$value['borrow_id']},`addtime` = '" . time() . "',`addip` = '" . ip_address() . "',user_id=$vouch_userid ,`order` = {$i},vouch_id={$vouch_id},status=0,repay_account = '{$_vouch_account}',repay_time='{$repay_time}'";
                                $mysql->db_query($sql);
                            }
                        }

                        $_borrow_account = round($borrow_account / $month_times, 2);
                        for ($i = 0; $i < $month_times; $i++) {
                            if ($i == $month_times - 1) {
                                $_borrow_account = $borrow_account - $_borrow_account * $i;
                            }
                            $repay_time = get_times(array("time" => time(), "num" => $i + 1));
                            $sql = "insert into `{borrow_vouch_repayment}` set borrow_id={$id},`addtime` = '" . time() . "',`addip` = '" . ip_address() . "',user_id=$user_id ,`order` = {$i},status=0,repay_account = '{$_borrow_account}',repay_time='{$repay_time}'";
                            $mysql->db_query($sql);
                        }
                    }
                    //�۳��������
                    //��Ӷ�ȼ�¼
                    $amountlog_result = self::GetAmountOne($user_id, "borrow_vouch");
                    $amountlog["user_id"] = $user_id;
                    $amountlog["type"] = "borrow_vouch_success";
                    $amountlog["amount_type"] = "borrow_vouch";
                    $amountlog["account"] = $borrow_account;
                    $amountlog["account_all"] = $amountlog_result['account_all'];
                    $amountlog["account_use"] = $amountlog_result['account_use'] - $amountlog['account'];
                    $amountlog["account_nouse"] = $amountlog_result['account_nouse'] + $amountlog['account'];
                    $amountlog["remark"] = "����������ͨ����ȥ�������";
                    self::AddAmountLog($amountlog);
                } else {
                    //�۳�������ö��
                    //��Ӷ�ȼ�¼
                    if ($is_fast == 0 && $is_jin == 0) {
                        $amountlog_result = self::GetAmountOne($user_id, "credit");
                        $amountlog["user_id"] = $user_id;
                        $amountlog["type"] = "borrow_success";
                        $amountlog["amount_type"] = "credit";
                        $amountlog["account"] = $borrow_account;
                        $amountlog["account_all"] = $amountlog_result['account_all'];
                        $amountlog["account_use"] = $amountlog_result['account_use'] - $amountlog['account'];
                        $amountlog["account_nouse"] = $amountlog_result['account_nouse'] + $amountlog['account'];
                        $amountlog["remark"] = "�����������ͨ����������ö�ȼ���";
                        self::AddAmountLog($amountlog);
                    }
                }

                //��������
                $remind['nid'] = "borrow_review_yes";
                $remind['sent_user'] = "0";
                $remind['receive_user'] = $user_id;
                $remind['title'] = "�б�[{$borrow_name}]������˳ɹ�";
                $remind['content'] = "��Ľ���[{$borrow_url}]��" . date("Y-m-d", time()) . "�Ѿ����ͨ��";
                $remind['type'] = "system";
                remindClass::sendRemind($remind);
            }
        }

        //�������ʧ��
        elseif ($status == 4 && $status != $status1) {
            //��������Ͷ���ߵĽ�Ǯ��
            $remind_send_type_name = 'borrow_review_failed_remind';

            $sql = "select * from {borrow_tender}  where borrow_id=$id";
            $result = $mysql->db_fetch_arrays($sql);
            foreach ($result as $key => $value) {
                $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                $log['user_id'] = $value['user_id'];
                $log['type'] = "invest_false";
                $log['money'] = $value['account'];
                $log['total'] = $account_result['total'];
                $log['use_money'] = $account_result['use_money'] + $log['money'];
                $log['no_use_money'] = $account_result['no_use_money'] - $log['money'];
                $log['collection'] = $account_result['collection'];
                $log['to_user'] = $user_id;
                $log['remark'] = "�б�[{$borrow_url}]ʧ�ܷ��ص�Ͷ���";
                //accountClass::AddLog($log);
                $sql2 = "select * from {borrow_tender} where id=" . $value['id'];
                $result2 = $mysql->db_fetch_arrays($sql2);
                if ($result2['jiaoyan'] != 1) {
                    accountClass::AddLog($log);
                    $sql = "update  {borrow_tender}  set jiaoyan=1  where borrow_id={$id} and id=" . $value['id'];
                    $mysql->db_query($sql);
                }

                //��������
                $remind['nid'] = "loan_no_account";
                $remind['sent_user'] = "0";
                $remind['receive_user'] = $value['user_id'];
                $remind['title'] = "Ͷ�ʵı�[<font color=red>{$borrow_name}</font>]�������ʧ��";
                $remind['content'] = "����Ͷ�ʵı�[<a href=\'/invest/a{$data['id']}.html\' target=_blank><font color=red>{$borrow_name}</font></a>]��" . date("Y-m-d", time()) . "���ʧ��,ʧ��ԭ��{$data['repayment_remark']}";
                $remind['type'] = "system";
                remindClass::sendRemind($remind);
            }

            //��������
            $remind['nid'] = "borrow_review_no";
            $remind['sent_user'] = "0";
            $remind['receive_user'] = $user_id;
            $remind['title'] = "��������ı�[<font color=red>{$borrow_name}</font>]�������ʧ��";
            $remind['content'] = "��������ı�[<a href=\'/invest/a{$data['id']}.html\' target=_blank><font color=red>{$borrow_name}</font></a>]��" . date("Y-m-d", time()) . "���ʧ��,ʧ��ԭ��{$data['repayment_remark']}";
            $remind['type'] = "system";
            remindClass::sendRemind($remind);
        }

        //��������ý��������б�ɹ�������ʧ��Ҳ����
        if ($award == 1 || $award == 2 || (isset($_G['system']["con_invest_award"]) && $_G['system']["con_invest_award"] > 0)) {
            if ($status == 3 || $is_false == 1) {
                $sql = "select * from {borrow_tender}  where borrow_id=$id";
                $result = $mysql->db_fetch_arrays($sql);
                foreach ($result as $key => $value) {
                    //Ͷ�꽱���۳������ӡ�

                    if ($award == 1 || $award == 2) {
                        if ($award == 1) {
                            $money = round(($value['account'] / $borrow_account) * $part_account, 2);
                        } elseif ($award == 2) {
                            $money = round((($funds / 100) * $value['account']), 2);
                        }

                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $log['user_id'] = $value['user_id'];
                        $log['type'] = "award_add";
                        $log['money'] = $money;
                        $log['total'] = $account_result['total'] + $money;
                        $log['use_money'] = $account_result['use_money'] + $money;
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = $user_id;
                        $log['xutou'] = $account_result['xutou'] + $money; //������Ͷ���
                        $log['remark'] = "���[{$borrow_url}]�Ľ���";
                        accountClass::AddLog($log);
                    }
                    if (isset($_G['system']["con_invest_award"]) && $_G['system']["con_invest_award"] > 0) {
                        $arr_t = array('user_id' => $value['user_id'], 'type' => 'recharge_success');
                        $arr_r = array('user_id' => $value['user_id'], 'type' => 'recharge');
                        $arr_i = array('user_id' => $value['user_id'], 'type' => 'invest');
                        $tixian = accountClass::GetFreeCash($arr_t);
                        $chongzhi = accountClass::GetFreeCash($arr_r);
                        $investnum = accountClass::GetFreeCash($arr_i);
                        if ($investnum == NULL) {
                            $investnum = 0;
                        }
                        if ($tixian == NULL) {
                            $tixian = 0;
                        }
                        //����������������+15�����ڵ����ֶ��+15��Ͷ��Ķ�ȣ�15�ڵĳ�ֵ
                        $freeCash = $account_result['use_money'] + $tixian + $investnum - $chongzhi;

                        /*if ($data['total'] <= 10000){
                          $data['fee'] = 6;
                          }elseif ($data['total'] > 10000 && $data['total']<=20000){
                          $data['fee'] = 8;
                          }else{
                          $data['fee'] = 10;
                          } */
                        if ($value['account'] <= $freeCash) {
                            if ($value['account'] <= 30000) {
                                $data['fee'] = $value['account'] * $_G['system']["con_invest_award"];
                            } else {
                                $data['fee'] = $value['account'] * $_G['system']["con_invest_award"];
                            }
                        } else {
                            if ($freeCash <= 0) {
                                $data['fee'] = 0;
                            } else {
                                $data['fee'] = $freeCash * $_G['system']["con_invest_award"];
                            }
                        }
                        $money2 = $data['fee'];
                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $log['user_id'] = $value['user_id'];
                        $log['type'] = "invest_award";
                        $log['money'] = $money2;
                        $log['total'] = $account_result['total'] + $money2;
                        $log['use_money'] = $account_result['use_money'] + $money2;
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = $user_id;
                        $log['remark'] = "�Խ��[{$borrow_url}]����Ͷ�Ľ���";
                        accountClass::AddLog($log);
                    }

                    if ($award == 1 || $award == 2) {
                        $account_result = accountClass::GetOne(array("user_id" => $user_id));
                        $log['user_id'] = $user_id;
                        $log['type'] = "award_lower";
                        $log['money'] = $money;
                        $log['total'] = $account_result['total'] - $money;
                        $log['use_money'] = $account_result['use_money'] - $money;
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = $value['user_id'];
                        $log['remark'] = "�۳����[{$borrow_url}]�Ľ���";
                        accountClass::AddLog($log);
                    }
                }
            }
        }

        // ���ͽ��Э��
        if ($is_cancel == false) {
            $content = self::GetOne(array('id'=>$id));

            if ($content['style'] == 3) {
                $repayment_type = '���Ϣ';
            } else {
                $repayment_type = '�»��Ϣ';
            }
            $_content = '
            <style type="text/css">
                .pro_title {font-size:16px; font-weight: bold}
                .indent_four{text-indent:40px;}
                .indent_eight{text-indent: 80px;}
            </style>
            <div class="pro_title">���Э����(���ɲƸ���)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Э��ţ�'.$content['addtime'].$content['number_id'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ǩ�����ڣ�'.date('Y-m-d',$content['verify_time']).'</div><br />
        <strong>�׷�(������):</strong> <br /><br />
            <div>
                <table class="gvList" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvLoans" style="width:60%;border-collapse:collapse;position: relative; left: 40px;">
                    <tr height="30">
                        <th align="center" scope="col">������</th>
                        <th align="center" scope="col">������</th>
                        <th align="center" scope="col">��������</th>
                        <th align="center" scope="col">'.$repayment_type.'</th>
                    </tr>';
            $bor_res = self::GetTenderList(array('borrow_id'=>$id,'limit'=>'all'));

            $table = '';
            foreach ($bor_res as $value) {
                $table .= '<tr height="30">';
                $table .= '<td style="text-align: center">'.$value['username'].'</td>';
                $table .= '<td style="text-align: center">'.$value['tender_account'].'Ԫ</td>';
                if ($content['isday'] == 1) {
                    $table .= '<td style="text-align: center">'.$content['time_limit_day'].'��</td>';
                } else {
                    $table .= '<td style="text-align: center">'.$content['time_limit'].'����</td>';
                }
                if ($content['style'] == 3) {
                    $table .= '<td style="text-align: center">'.$value['repayment_account'].'Ԫ</td>';
                } else {
                    $table .= '<td style="text-align: center">'.$value['equal']['monthly_repayment'].'Ԫ</td>';
                }
                $table .= '</tr>';
            }
            $_content .= $table;
            $content['realname'] = magic_truncate($content['realname']);
            $content['card_id']  = magic_hideMiddleShow2($content['card_id']);
            $_content .= "</table>
            </div><br />
            <strong>�ҷ�(�����):</strong> {$content['realname']} <br />
            <strong>���֤��:</strong> {$content['card_id']}<br />
            <strong>���ɲƸ����û���:</strong> {$content['username']}".' <br /><br />
            <strong>����(�Ӽ���):</strong>�������ɾ�����Ϣ�������޹�˾ <br />
            <strong>ע���:</strong>530103100135670 <br /><br />
            <strong>���ڣ�</strong><br />
            1.�׷�ӵ�и����ʽ��⹩�����Ի�ȡ��Ϣ���棬�������շḻ�Ľ������Դ��Ϣ��ӵ��רҵ���������ۺ͹������ƽ̨��<br />
            2.�׷�Ը����ܱ����ṩ��Ͷ����ѯ���������ɱ�����ϼ׷����ҷ���ɽ�����ף����ɱ����ṩ����Э���������
            �ص��������񣬱���Ը����׷��ṩ�õȷ���<br /><br />
            <strong>�ҷ�ͨ�����ɲƸ���www.huinacaifu.com��վ ( �����ݻ��ɲƸ���Ϣ�������޹�˾ www.huinacaifu.com,���¼�ơ�������) �ľӼ�,���й�
            ���������׷��������˴������Э�飺</strong><br /><br />
            <div class="pro_title">��һ��������������±���ʾ:</div><br />
            <div>
            <table class="gvList" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvLoans" style="width:60%;border-collapse:collapse;position: relative; left: 40px;">';
            $_table = '';
            foreach ($bor_res as $value) {
                $_table .= '<tr height="30"><td align="center">������</td><td align="center">'.$value['username'].'</td></tr>';
                $_table .= '<tr height="30"><td align="center">������</td><td align="center">'.$value['tender_account'].'</td></tr>';
                if ($content['isday'] == 1) {
                    $_table .= '<tr height="30"><td align="center">�������</td><td style="text-align: center">'.$content['time_limit_day'].'��</td></tr>';
                } else {
                    $_table .= '<tr height="30"><td align="center">�������</td><td style="text-align: center">'.$content['time_limit'].'����</td></tr>';
                }
                $_table .= '<tr height="30"><td align="center">������</td><td align="center">'.$content['apr'].'%</td></tr>';
                $_table .= '<tr height="30"><td align="center">��ʼ��</td><td align="center">'.date('Y-m-d',$content['success_time']).'</td></tr>';
                $_table .= '<tr height="30"><td align="center">������</td><td align="center">'.date('Y-m-d',$content['end_time']).'</td></tr>';
                $_table .= '<tr height="30"><td align="center">������</td><td align="center">'.$content['each_time'].'</td></tr>';
                if ($content['style'] == 3) {
                    $_table .= '<tr height="30"><td style="text-align: center">���Ϣ</td><td align="center">'.$value['repayment_account'].'Ԫ</td></tr>';
                } else {
                    $_table .= '<tr height="30"><td style="text-align: center">�»��Ϣ</td><td style="text-align: center">'.$value['equal']['monthly_repayment'].'Ԫ</td></tr>';
                }
            }

            $_content .= $_table;
            $_content .= '</table>
            </div>
            <div class="content">
                <div class="pro_title">�ڶ���������</div>
                <p class="indent_four">1���ҷ���ŵ���ձ�Э���һ��Լ����ʱ��ͽ��������׷����</p>
                <p class="indent_four">2���ҷ������һ�ڻ���������ȫ��ʣ�౾����Ϣ���������ݱ�Э�������ȫ�����á�</p>
                <p class="indent_four">3���ҷ���ÿһ�ڻ���Ļ�������㹫ʽΪ��ÿ���軹���ܽ��=ÿ���軹��Ϣ+ÿ���軹����</p>
                <div class="pro_title">�����������ڻ���</div>
                <p class="indent_four">1�����ҷ�������δ����,�ҷ����������֧��������Ϣ����,��Ӧÿ�������֧�����ڷ�Ϣ(���Ϊδ������Ϣ��ǧ��֮��)��
                    �׷����ҷ���ͬ�Ⲣ�Ͽɣ�������ͨ�����š��绰�����Ŵ��յȷ�ʽ���ҷ�����δ�����ı�Ϣ���д���,�ұ�����Ȩ����ǰ��
                    ��׼���ҷ���ȡ���շ�����ã��ݲ�����������˽���ϡ� ���Ŵ��շ�Ϊÿ��2000Ԫ��</p>
                <p class="indent_four">2���ҷ�ͬ�⣬�����ڻ�����ɼ׷����֧���ķ���(��������������ʦ��)���ҷ��е���</p>
                <p class="indent_four">3���ҷ�ͬ�⣬���ҷ�����δ�����κ�һ�ڻ��������Ȩ��ȡ���´�ʩ֮һ����</p>
                <p class="indent_eight">��1�����ҷ����й�������ϼ�����������Ϣͨ�����������ں�����������Ŀ���⹫����</p>
                <p class="indent_eight">��2�����ҷ����й�������ϼ�����������Ϣ��ʽ�����ڡ��������ü�¼��,����ȫ����������������ϵ�ĺ�����(������
                    ���ü�¼�����ݽ�Ϊ���С����š�������˾���˲����ĵ��йػ����ṩ���˲���������Ϣ)��</p>
                <p class="indent_eight">��3�����ҷ���ȡ���ɴ�ʩ,�ɴ������������з��ɺ�������ҷ����е����׷�ͬ����Ȩ��֧�ֱ�����ȡ���ϴ�ʩ��</p>
                <p class="indent_four">4�����ڵ�Ѻ���꣬�׷����ҷ���ͬ�⣬��׷�ΪVIP�û����ҷ������յ���22:00��δ�峥����(��׷�Ϊ��VIP�û���
                    �ҷ�����1����δ�峥��Ϣ),��׷�����Э�����µ�ծȨת�ø�����˾�򱾹�˾������˾�����ھ�ֵ���꣬�׷����ҷ�
                    ��ͬ�⣬��׷�ΪVIP�û����ҷ�����10����δ�峥��Ϣ(��׷�Ϊ��VIP�û����ҷ�����30����δ�峥��Ϣ),��׷�
                    ����Э�����µ�ծȨת�ø�����˾�򱾹�˾������˾��ת�ü۸�Ϊ�������ҷ�������δ�����Ľ�Ϣ���������Ӽ׷���
                    �����Ļ�Ա����ͬ��������ͬ��������˾�򱾹�˾������˾��׷�֧���ҷ�������δ�����ı��𼴿�ȡ�ü׷��ڱ�Э����
                    �µ�ծȨ������˾�򱾹�˾������˾���������ге����շ��ã����ҷ�׷�ս�����Ϣ�����ڷ�Ϣ�ȣ����˷����ɱ���
                    ˾�򱾹�˾������˾�е���</p>
                <p class="indent_four">5��������������δ������ҷ���ȡ���ڷ�Ϣ��Ϊ���շ��á���ȡ���ַ�ʽ���д��ա����ҷ��������Ϣ���⹫�������롰��
                    �����ü�¼�����ȡ���ɴ�ʩ�ȸ�����Ϊ���Ǳ������ݱ�Э��Ϊ�׷��ṩ��һ�ַ��񣬸õȷ���ķ��ɺ�������ҷ��ͼ׷�
                    ���ге���</p>
                <div class="pro_title">������������֧���ͻ��ʽ</div>
                <p class="indent_four">1���׷���ͬ�����ҷ�������Ӧ����ʱ,��ί�б����ڱ����Э����Чʱ���ñʽ��ֱ�ӻ������ҷ��ʻ���</p>
                <p class="indent_four">2���ҷ���ί�б���������ֱ�ӻ������׷��ʻ���</p>
                <p class="indent_four">3���ҷ��ͼ׷���ͬ�⣬���������ҷ���׷�ί������ȡ�Ļ���������Ϊ���������ķ��ɺ��������Ӧί�з��ҷ���׷�����
                    �е���</p>
                <p class="indent_four">4�����ҷ����κ�һ�ڻ�����Գ���Ӧ��������Ϣ��ΥԼ��,��׷�֮��ͬ�ⰴ�ո��Գ������ڳ������ܶ��еı���
                    ��ȡ���</p>
                <p class="indent_four">5����Э������е�Ϊ������ס����(������)��</p>
                <div class="pro_title">����������ǰ���ں���ǰ����</div>
                <p class="indent_four">1��˫��ͬ��,���ҷ����������κ�һ�����,��Э�����µ�ȫ������Զ���ǰ����,�ҷ����յ����������Ľ����ǰ����ͨ
                    ֪��Ӧ�����峥ȫ��������Ϣ��������Ϣ�����ݱ�Э�����������ȫ�����ã�</p>
                <p class="indent_eight">��1���ҷ����κ�ԭ������֧���κ�һ�ڻ����10��ģ�</p>
                <p class="indent_eight">��2���ҷ��Ĺ�����λ��ְ���ס�������δ��30����֪ͨ������</p>
                <p class="indent_eight">��3���ҷ�����Ӱ�����峥��Э�����½������������仯��δ��30����֪ͨ������</p>
                <p class="indent_four">2��˫��ͬ��,�ҷ���Ȩ��ǰ�峥ȫ�����߲��ֽ���ǰ������֧��������Ϣ��</p>
                <p class="indent_four">3�������Э���е�ÿһ�׷����ҷ�֮��Ľ������໥������,һ���ҷ�����δ�黹��Ϣ,�κ�һ�׷���Ȩ�����Ըü׷�
                    δ�ջصĽ�Ϣ���ҷ�׷�������������ϡ�</p>
                <div class="pro_title">���������������ú͹�Ͻ</div>
                <p class="indent_four">��Э���ǩ�������С���ֹ�����;������л����񹲺͹�����,����Э�����еغ���������Ժ��Ͻ��</p>
                <div class="pro_title">����������վ���շ�</div>
                <p class="indent_four">������www.huinacaifu.com��Ϊ�׷����ҷ��ṩ�Ӽ���񣬲���ȡ��ط��á���Ѻ��
                    ��˷�Ϊ�����0-6%����Ѻ����˻������Ϊ�����0.5%ÿ�¡���˷Ѽ��˻�������ڽ��긴��ͨ��ʱһ���Կ۳������˻��������շ�����վ�����¹���Ϊ׼��</p>
                <div class="pro_title">�ڰ������ر�����</div>
                <p class="indent_four">1���ҷ���֤���ҷ��Ľ�����ںϷ���;������������������κ�Υ���(�����������ڶĲ���������������������潵�)��
                    һ�и߷���Ͷ��(��֤ȯ�ڻ�����Ʊ��)�����ҷ�Υ��ǰ����֤����Υ��ǰ����֤�����ɣ���׷���Ȩ��ȡ���д�ʩ��</p>
                <p class="indent_eight">��1��������ǰ�ջ�ȫ����</p>
                <p class="indent_eight">��2���׷��򹫰����й��������ؾٱ���׷�ش˿׷���ҷ����������Σ��׷����ҷ���ͬ�Ⲣ��Ȩ������ȡǰ����ʩ��</p>
                <p class="indent_four">2����������ΪС���ʽ���ƽ̨,�ҷ��ͼ׷����������ñ���ƽ̨�������ÿ����ֺ�����ϴǮ�Ȳ�����������Ϊ,����׷���
                    �ҷ��ͱ�����Ȩ�򹫰����й��������ؾٱ�,׷������ط������Ρ�</p>
                <p class="indent_four">3���û�һ��ע����������ɲƸ�����������Ϊͬ�Ⲣ�Ͽɱ�����Э�飬��ȫȨί�к��ݺ��ݻ��ɲƸ���Ϣ�������޹�˾��Ϊѡ���ʵ�
                    �Ĵ�����Ϊ�û��������Ŀ��������ˡ��������������������������κ�Ȩ�棬������������ծȨ����Ȩ����Ϣ����
                    ����������ȣ�������Լ���⣬����������׷����С����ҷ�ԭ���´������޷����û���������ʱ��������Լ���⣬�׷�
                    ����������ֱ�Ӵ�λ��ʹ�����˶��ҷ���һ��Ȩ����</p>
                <div class="pro_title">�ھ���������</div>
                <p class="indent_four">1����Э����õ����ı���ʽ�Ƴɡ�</p>
                <p class="indent_four">2����Э�����ҷ��ڱ��������Ľ������˳ɹ�֮�ռ���Э����ͷ������ǩ��������Ч,�ҷ����׷���������ִһ��,����ͬ
                    �ȷ���Ч����</p>
                <p class="indent_four">3���ҷ����׷������б�Э������У�Ӧ���ر����ĸ���涨��</p>
                <p class="indent_four">4���׷����ҷ�ͬ�⡢��Ȩ���Ͽɣ�������Ϊ��������м�ƽ̨���ݱ�Э��Ĺ涨�ͱ����������涨��ʹ����Ȩ����������
                    ��֪ͨ���ȡ�����ʩ��һ�з��ɺ���ͷ��վ����ҷ���׷��е���</p>
                <p class="indent_four">5�����������ɲƸ���www.huinacaifu.com��ӵ�жԱ�Э������ս���Ȩ��</p>
                <div style="position: relative; left: 800px; top:-150px;"><img src="http://www.huinacaifu.com/images/mark.gif" /></div>
            </div>';
            $mailTeam = array();
            $sql = "SELECT usr.`email` FROM `{borrow_tender}` as ten
                    LEFT JOIN `{user}` as usr
                    ON ten.`user_id`=usr.`user_id`
                    WHERE ten.`borrow_id`={$id} AND usr.`email_status`=1";
            $res = $mysql->db_fetch_arrays($sql);
            if (count($res) >= 1) {
                foreach ($res as $value) {
                    $mailTeam[] = $value['email'];
                }
                include_once $_SERVER['DOCUMENT_ROOT'].'/plugins/mail/mail.php';
                $mailObj = new Mail();
                $mailObj->sendBcc('���ɲƸ�,��ı��:'.$id.'�Ľ��Э��',$_content,$mailTeam);
            }
        }


        //��������ʱ�Ĳ�����
        $sql = " update {borrow} set repayment_user='{$data['repayment_user']}',repayment_account='{$total_account}',repayment_remark='{$data['repayment_remark']}',repayment_time='" . time() . "',status='{$data['status']}' where id='{$id}'";
        $return =  $mysql->db_query($sql);
        if ($remind_send_type_name !== '') {
            include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
            $receive_user_id = sendMessage::getTenderUserId(intval($remind_send_borrow_id));
            $sendObj = new sendMessage(1,$receive_user_id,$remind_send_type_name);
            $sendObj->getReceiveTeam();
            if ($remind_send_type_name == 'borrow_review_success_remind') {
                $content = '������ı�ı��:'.intval($remind_send_borrow_id).'�Ѿ�ͨ������,����ע��˶��ʽ���ϸ,�����κ���������������ϵ';
            } else {
                $content = '������ı�ı��:'.intval($remind_send_borrow_id).'����δͨ��,����ע��˶��ʽ���ϸ,�����κ���������������ϵ';
            }
            $sendObj->send($content);
        }

        return $return;
    }

    public static function AutoLZ() {
        global $mysql, $_G;
        $sql = "SELECT * from {borrow_tender} bt WHERE bt.`auto_liuzhuan`=1 AND bt.ADDTIME+ bt.month_nums*3600*24+30<=" . time(); //�ҳ���Ҫ��Ͷ����ת��
//        echo $sql;
//        die('<br>'.__FILE__.__LINE__.'<br>');
        $ret = $mysql->db_fetch_arrays($sql);
//        var_dump($ret);
//        die('<br>'.__FILE__.__LINE__.'<br>');
        foreach ($ret as $k => $v) {
            $tid = $v['id'];
            $bid = $v['borrow_id']; //�����
            $uid = $v['user_id']; //Ͷ����ID
            $account = $v['account']; //Ͷ���ܽ��
            $perPrice = $account / $v['per_account']; //ÿһ�ݵļ۸�per_account������Ϊ����
//            echo $perPrice;
//            die;
            //�鿴�˱��Ƿ���Ͷ��������Ͷ����
            $sqlborrow = "SELECT id,per_account,r_nums FROM  {borrow} WHERE id=" . $bid;
//            echo $sqlborrow;die;
            $ret2 = $mysql->db_fetch_array($sqlborrow); //��ʣ����ٱ�
//            var_dump($ret2);
//            die;
            $sqlaccount = 'SELECT * FROM {account} WHERE USER_ID=' . $uid; //��Ͷ�������
            $ret3 = $mysql->db_fetch_array($sqlaccount);
//            var_dump($ret3);die;
            $amount = (int) $ret3['use_money'] / $ret2['per_account']; //�����ʽ���򼸷ݣ�per_account������Ϊ����
            //Ҳ���Լ�Ϊ��Ͷֻ��Ͷһ�ݣ����ﻹ��Ҫ�ж��Ƿ񳬳���������ƣ��˴���δ�ж�
            if ($amount < 1) {
                $amount = 0;
            } else {
                $amount = min(array($amount, $ret2['r_nums'])); //��Ͷ������ʣ���Ͷ������ȡ��Сֵ
                $amount = min(array($amount, $v['per_account']));
            }
            if ($amount <= 0)
                return;
//            var_dump($amount);die;
            //��װ����
            $data['borrow_id'] = $bid;
            $data['money'] = $amount * $ret2['per_account'];
            $data['per_account'] = $amount;
            $data['auto_liuzhuan'] = 2; //ֻ������תһ��
            $data['account'] = $amount * $ret2['per_account']; //money��account�ֶ�ֵһ��

            $data['month_nums'] = $v['month_nums'];
            $data['tender_type'] = $v['tender_type'];
            $data['user_id'] = $uid;
            $data['status'] = 1;
            //��ʼͶ��
            $accountT = $data['money'];
            $sql = "update  {borrow}  set account_yes=account_yes+{$accountT},tender_times=tender_times+{$amount},r_nums=r_nums-{$amount}  where id='{$bid}' and  CONVERT (account ,UNSIGNED) >CONVERT (account_yes, UNSIGNED)";
//            var_dump($sql);die;
            $sql = $mysql->db_sql_pre($sql);
            mysql_query($sql);
            $rc = mysql_affected_rows();
//            var_dump($rc);die;
            if ($rc > 0) {
                $sqlt = "update {borrow_tender} set auto_liuzhuan=2 where id=" . $tid;
                $mysql->db_query($sqlt);
                $sqlbt = "insert into `{borrow_tender}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
                foreach ($data as $key => $value) {
                    $sqlbt .= ",`$key` = '$value'";
                }
//                echo $sqlbt;
//                die;
                $mysql->db_query($sqlbt);
                $tender_id = $mysql->db_insert_id();
//                var_dump($tender_id);die;
                if ($tender_id > 0) {
                    $result = self::GetOne(array("id" => $bid));
//                    var_dump($result);
                    $eq['account'] = $data['account'];
                    $result['time_limit'] = $data['month_nums'];
                    $result['style'] = $data['tender_type'];
                    $eq['year_apr'] = $result['apr'];
                    $eq['month_times'] = $result['time_limit'];
                    $eq['borrow_time'] = time();
                    $eq['borrow_style'] = $result['style'];
                    $eq['isday'] = $result['isday'];
                    if ($eq['isday'] == 1 && $result['is_liuzhuan'] == 1) {
                        $eq['month_times'] = 1;
                    }
                    $eq['time_limit_day'] = $result['time_limit_day'];
//                     var_dump($result);
                    $result = self::EqualInterest($eq);
//                     var_dump($result);
                    $repayment_account = 0;
                    foreach ($result as $key => $value) {
                        $repayment_account += $value['repayment_account'];
                        //���黹��Ϣд��ȥ
                        $sql = "insert into {borrow_collection} set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "',`tender_id`='{$tender_id}',`order`='{$key}',`repay_time`='{$value['repayment_time']}',
						`repay_account`='{$value['repayment_account']}',`interest`='{$value['interest']}',`capital`='{$value['capital']}'
						";
//                        echo $sql;
                        $mysql->db_query($sql);
                    }
                    $_interest = $repayment_account - $data['account'];
                    $sql = " update {borrow_tender} set repayment_account='{$repayment_account}',wait_account ='{$repayment_account}',interest = '{$_interest}',wait_interest = '{$_interest}' where id={$tender_id}";
//                    echo $sql;
                    $mysql->db_query($sql);

                    //Ͷ�����
                    $account_result = accountClass::GetOne(array("user_id" => $uid));
                    $log['user_id'] = $uid;
                    $log['type'] = "tender";
                    $log['money'] = $data['money'];
                    $log['total'] = $account_result['total'];
                    $log['use_money'] = $account_result['use_money'] - $log['money'];
                    $log['no_use_money'] = $account_result['no_use_money'] + $log['money'];
                    $log['collection'] = $account_result['collection'];
                    $log['to_user'] = $ret2['user_id'];
                    $log['remark'] = "Ͷ�궳���ʽ�";
//                    var_dump($log);
                    accountClass::AddLog($log); //��Ӽ�¼
                    borrowClass::AddRepaymentLZ(array("id" => $bid, "month_nums" => $data['month_nums'], "money" => $account, "tender_id" => $tender_id));
                }
            }
        }
    }

    //��ת�괦��
    public static function AddRepaymentLZ($data = array()) {
        global $mysql, $_G;
        $id = $data['id'];
        if ($id == "")
            return self::ERROR;
        $status = $data['status'];
        $tender_id = $data['tender_id'];
        $sql = "select * from {borrow}  where id=$id";
        $result = $mysql->db_fetch_array($sql);
        $status1 = $result['status'];
        $is_liuzhuan1 = $result['is_liuzhuan'];
        $apr_add = $result['apr_add'];
        $is_fast = $result['is_fast'];
        $is_mb = $result['is_mb'];
        $user_id = $result['user_id'];
        $borrow_name = $result['name'];
        //$borrow_account = $result['account'];
        $borrow_account = $data['money'];
        $style = $result['style'];
        $award = $result['award'];
        $funds = $result['funds'];
        $fundsadd = $result['fundsadd'];
        $is_vouch = $result['is_vouch']; //�Ƿ��ǵ�����
        $vouch_award = $result['vouch_award']; //�����Ľ���
        $part_account = $result['part_account'];
        $tender_times = $result['tender_times'];
        $result['time_limit'] = $data['month_nums'];
        $month_times = $result['time_limit'];
        $repayment_account = $result['repayment_account'];
        $_data['account'] = $borrow_account;
        $_data['year_apr'] = $result['apr'];
        $_data['month_times'] = $month_times;
        $_data['borrow_time'] = time(); // $result['success_time'];
        $_data['borrow_style'] = $result['style'];
        $_data['isday'] = $result['isday'];
        $_data['is_jin'] = $result['is_jin'];
        $is_jin = $result['is_jin'];
        $_data['time_limit_day'] = $result['time_limit_day'];
        if ($_data['isday'] == 1 && $is_liuzhuan1 == 1) {
            $_data['month_times'] = 1;
            $_data['time_limit_day'] = $data['month_nums'];
        }

        $result = self::EqualInterest($_data);
        $total_account = 0;
        $borrow_url = "<a href=\'/liuzhuan/a{$id}.html\' target=_blank>{$borrow_name}</a>";
        if ($status1 == 1 && $is_liuzhuan1 == 1) {
            //����ɹ����򽫻�����Ϣ���������ȥ
            foreach ($result as $key => $value) {
                if ($_data['isday'] == 1 && $is_liuzhuan1 == 1) {

                    $value['repayment_time'] = time() + $_data['time_limit_day'] * 24 * 60 * 60;
                }
                $total_account = $total_account + $value['repayment_account']; //�ܻ����
                $sql = "insert into {borrow_repayment} set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "',`borrow_id`='{$id}',`order`='{$key}',`repayment_time`='{$value['repayment_time']}',
						`repayment_account`='{$value['repayment_account']}',`interest`='{$value['interest']}',`capital`='{$value['capital']}',`tender_id`='{$tender_id}'
						";
                $mysql->db_query($sql);
                $repayment_account = $value['repayment_account'];
            }

            //�۳�����Ͷ���ߵĽ�Ǯ��
            $sql = "select * from `{borrow_tender}`  where lzpay=0 and borrow_id=$id";
            $result = $mysql->db_fetch_arrays($sql);
            foreach ($result as $key => $value) {
                $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                $log['user_id'] = $value['user_id'];
                $log['type'] = "invest";
                $log['money'] = $value['account'];
                $log['total'] = $account_result['total'] - $log['money'];
                $log['use_money'] = $account_result['use_money'];
                $log['no_use_money'] = $account_result['no_use_money'] - $log['money'];
                $log['collection'] = $account_result['collection'];
                $log['to_user'] = $user_id;
                $log['remark'] = "Ͷ��ɹ����ÿ۳�";
                accountClass::AddLog($log);

                //��Ӵ��յĽ��
                $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                $log['user_id'] = $value['user_id'];
                $log['type'] = "collection";
                $log['money'] = $value['repayment_account'];
                $log['total'] = $account_result['total'] + $log['money'];
                $log['use_money'] = $account_result['use_money'];
                $log['no_use_money'] = $account_result['no_use_money'];
                $log['collection'] = $account_result['collection'] + $log['money'];
                $log['to_user'] = $user_id;
                $log['remark'] = "���ս��";
                accountClass::AddLog($log);

                //������Ͷ
                if ($is_mb == 0 && 0) {
                    $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                    $log['user_id'] = $value['user_id'];
                    $log['type'] = "award_add";
                    $xutou_money = $account_result['xutou'];
                    if ($xutou_money > 0) {
                        $money = 0;
                        if ($xutou_money < $value['account']) {
                            $money = $xutou_money * 0.3 / 100.0;
                            $log['xutou'] = 0;
                        } else {
                            $money = $value['account'] * 0.3 / 100.0;
                            $log['xutou'] = $xutou_money - $value['account'];
                        }
                        $log['money'] = $money;
                        $log['total'] = $account_result['total'] + $money;
                        $log['use_money'] = $account_result['use_money'] + $money;
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = $user_id;
                        $log['remark'] = "��Ͷ����";
                        accountClass::AddLog($log);
                    }
                }


                //��������
                $remind['nid'] = "loan_yes_account";
                $remind['sent_user'] = "0";
                $remind['receive_user'] = $value['user_id'];
                $remind['title'] = "Ͷ�ʵı�[<font color=red>{$borrow_name}</font>]������˳ɹ�";
                $remind['content'] = "����Ͷ�ʵı�[<a href=\'/invest/a{$data['id']}.html\' target=_blank><font color=red>{$borrow_name}</font></a>]��" . date("Y-m-d", time()) . "�Ѿ����ͨ��";
                $remind['type'] = "system";
                remindClass::sendRemind($remind);



                $credit['nid'] = "invest_success";
                $result = creditClass::GetTypeOne(array("nid" => $credit['nid']));
                $credit['user_id'] = $value['user_id'];
                $credit['value'] = round($value['account'] / 100);
                $credit['op_user'] = $_G['user_id'];
                ;
                $credit['op'] = 1; //����
                $credit['type_id'] = $result['id'];
                $credit['remark'] = "Ͷ�ʳɹ���{$credit['value']}��";
                creditClass::UpdateCredit($credit); //���»���
                //����Ͷ���˵�Ͷ���Ļ�������
                $co_time = time() - $value['addtime'];
                if ($_data['isday'] == 1) {
                    $co_time = time() + ($_data['time_limit_day']) * 60 * 60 * 24;
                    $sql = " update `{borrow_collection}` set repay_time={$co_time} where tender_id='{$value['id']}'";
                } else {
                    $sql = " update `{borrow_collection}` set repay_time=repay_time+{$co_time} where tender_id='{$value['id']}'";
                }
                $mysql->db_query($sql);
                $sqllz = "update `{borrow_tender}` set lzpay=1 where id='{$value['id']}'";
                $mysql->db_query($sqllz);

                //������ܽ�����ӡ�
                $account_result = accountClass::GetOne(array("user_id" => $user_id));
                $borrow_log['user_id'] = $user_id;
                $borrow_log['type'] = "borrow_success";
                $borrow_log['money'] = $value['account'];
                $borrow_log['total'] = $account_result['total'] + $value['account'];
                $borrow_log['use_money'] = $account_result['use_money'] + $value['account'];
                $borrow_log['no_use_money'] = $account_result['no_use_money'];
                $borrow_log['collection'] = $account_result['collection'];
                $borrow_log['to_user'] = "0";
                $borrow_log['remark'] = "ͨ��[{$borrow_url}]�赽�Ŀ�";
                accountClass::AddLog($borrow_log);
            }




            //�������ı�֤��10%��
            $account_result = accountClass::GetOne(array("user_id" => $user_id));
            $margin_log['user_id'] = $user_id;
            $margin_log['type'] = "margin";
            if ($is_vouch == 1) {
                $margin_log['money'] = $borrow_account * 0.05;
            } else {
                $margin_log['money'] = $borrow_account * 0.1;
            }
            if ($is_mb == 1) {
                $margin_log['money'] = 0;
            }
            if ($is_fast == 1) {
                // $margin_log['money'] =0;
            }
            if ($is_jin == 1) {
                $margin_log['money'] = 0;
            }

            $margin_log['money'] = 0;

            $margin_log['total'] = $account_result['total'];
            $margin_log['use_money'] = $account_result['use_money'] - $margin_log['money'];
            $margin_log['no_use_money'] = $account_result['no_use_money'] + $margin_log['money'];
            $margin_log['collection'] = $account_result['collection'];
            $margin_log['to_user'] = "0";
            $margin_log['remark'] = "��������[{$borrow_url}]�ı�֤��";
            //�����֤�����0���ǲ���д��¼��

            if ($margin_log['money'] <> 0) {
                accountClass::AddLog($margin_log);
                //���±�֤��
                $sql = "update `{borrow}` set forst_account='{$margin_log['money']}' where id='{$id}'";
                $mysql->db_query($sql);
            }

            //�۳�2%��������
            if (isset($_G['system']["con_borrow_fee"]) && $_G['system']["con_borrow_fee"] != "") {
                $borrow_fee = $_G['system']["con_borrow_fee"];
            } else {
                $borrow_fee = 0.01;
            }

            if ($is_mb == 1) {
                $borrow_fee = 0;
            }
            if ($month_times > 1) {
                $money = round($borrow_account * $borrow_fee + ($month_times - 1) * 0.005 * $borrow_account, 2);
            } else {
                $money = round($borrow_account * $borrow_fee, 2);
            }
            if ($_data['isday'] == 1) {
                if ($_data['is_jin'] == 1) {
                    $money = round(0.001 * $borrow_account * $_data['time_limit_day'] / 30, 2);
                } else {
                    $money = round(0.02 * $borrow_account * $_data['time_limit_day'] / 30, 2);
                }
            }

            if ($is_liuzhuan1 == 1) {
                $money = 0;
            }
            $account_result = accountClass::GetOne(array("user_id" => $user_id));
            $fee_log['user_id'] = $user_id;
            $fee_log['type'] = "borrow_fee";
            $fee_log['money'] = $money;
            $fee_log['total'] = $account_result['total'] - $fee_log['money'];
            $fee_log['use_money'] = $account_result['use_money'] - $fee_log['money'];
            $fee_log['no_use_money'] = $account_result['no_use_money'];
            $fee_log['collection'] = $account_result['collection'];
            $fee_log['to_user'] = "0";
            $fee_log['remark'] = "���[{$borrow_url}]��������";
            if ($fee_log['money'] != 0) {
                accountClass::AddLog($fee_log);
            }
            //���ɹ���1��


            /*

              $credit['nid'] = "borrow_success";
              $result = creditClass::GetTypeOne(array("nid"=>$credit['nid']));
              $credit['user_id'] = $user_id;
              $credit['value'] = 1;
              $credit['op_user'] = $_G['user_id'];
              $credit['op'] = 1;//����
              $credit['type_id'] = $result['id'];
              $credit['remark'] = "���ɹ���1��";
              creditClass::UpdateCredit($credit);//���»���
             */


            //�ж�vip��Ա���Ƿ�۳�
            accountClass::AccountVip(array("user_id" => $user_id));

            //ֻ�е�һ�ν���ʱ��ſ۳�
            /* $sql = "select p1.invite_userid,p1.invite_money,p2.username  from `{user}` as p1 left join `{user}` as p2 on p1.invite_userid = p2.user_id where p1.user_id = '{$user_id}' ";
              $result = $mysql ->db_fetch_array($sql);
              if ($result['invite_userid']!="" && $result['invite_money']!="" && $result['invite_money']<=0){
              //�����������
              $vip_ticheng = (!isset($_G['system']['con_vip_ticheng']) || $_G['system']['con_vip_ticheng']=="")?20:$_G['system']['con_vip_ticheng'];
              $account_result =  accountClass::GetOne(array("user_id"=>$result['invite_userid']));
              $ticheng_log['user_id'] = $result['invite_userid'];
              $ticheng_log['type'] = "ticheng";
              $ticheng_log['money'] = $vip_ticheng;
              $ticheng_log['total'] = $account_result['total']+$ticheng_log['money'];
              $ticheng_log['use_money'] = $account_result['use_money']+$ticheng_log['money'];
              $ticheng_log['no_use_money'] = $account_result['no_use_money'];
              $ticheng_log['collection'] = $account_result['collection'];
              $ticheng_log['to_user'] = "0";
              $ticheng_log['remark'] = "�����û�ע��(<a href=\'/u/{$result['invite_userid']}\' target=_blank>{$result['username']}</a>)��ΪVIP�����";
              accountClass::AddLog($ticheng_log);
              $sql = "update `{user}` set invite_money=$vip_ticheng where user_id='{$user_id}'";
              $mysql -> db_query($sql);
              } */

            //��������ʱ�Ĳ�����
            $nowtime = time();
            $endtime = get_times(array("num" => $month_times, "time" => $nowtime));
            if ($style == 1) {
                $_each_time = "ÿ�����º�" . date("d", $nowtime) . "��";
            } else {
                $_each_time = "ÿ��" . date("d", $nowtime) . "��";
            }
            if ($_data['isday'] == 1) {
                $endtime = $endtime - (30 - $_data['time_limit_day']) * 60 * 60 * 24;
            }
            $sql = " update {borrow} set success_time='{$nowtime}',end_time='{$endtime}',each_time='{$_each_time}',payment_account='{$repayment_account}' where id='{$id}'";
            $mysql->db_query($sql);



            //�ж��Ƿ��ǵ�����
        }



        //��������ý��������б�ɹ�������ʧ��Ҳ����
        if ($award == 1 || $award == 2 || (isset($_G['system']["con_invest_award"]) && $_G['system']["con_invest_award"] > 0)) {
            if ($status == 3 || $is_false == 1 || $is_liuzhuan1 == 1) {
                $sql = "select * from {borrow_tender}  where awardflag=0 and borrow_id=$id";
                $result = $mysql->db_fetch_arrays($sql);
                foreach ($result as $key => $value) {
                    //Ͷ�꽱���۳������ӡ�
                    $sql1 = "update  {borrow_tender}  set awardflag=1  where borrow_id=$id";
                    $mysql->db_query($sql1);
                    if ($award == 1 || $award == 2) {
                        if ($award == 1) {
                            $money = round(($value['account'] / $borrow_account) * $part_account, 2);
                        } elseif ($award == 2) {

                            $money = round((($funds / 100) * $value['account']), 2) + ($month_times - 1) * $value['account'] * $apr_add / 100;
                        }

                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $log['user_id'] = $value['user_id'];
                        $log['type'] = "award_add";
                        $log['money'] = $money;
                        $log['total'] = $account_result['total'] + $money;
                        $log['use_money'] = $account_result['use_money'] + $money;
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = $user_id;
                        $log['xutou'] = $account_result['xutou'] + $money;
                        $log['remark'] = "���[{$borrow_url}]�Ľ���";
                        accountClass::AddLog($log);
                    }
                    if (isset($_G['system']["con_invest_award"]) && $_G['system']["con_invest_award"] > 0) {
                        $arr_t = array('user_id' => $value['user_id'], 'type' => 'recharge_success');
                        $arr_r = array('user_id' => $value['user_id'], 'type' => 'recharge');
                        $arr_i = array('user_id' => $value['user_id'], 'type' => 'invest');
                        $tixian = accountClass::GetFreeCash($arr_t);
                        $chongzhi = accountClass::GetFreeCash($arr_r);
                        $investnum = accountClass::GetFreeCash($arr_i);
                        if ($tixian == NULL) {
                            $tixian = 0;
                        }
                        if ($investnum == NULL) {
                            $investnum = 0;
                        }
                        //����������������+15�����ڵ����ֶ��+15��Ͷ��Ķ�ȣ�15�ڵĳ�ֵ
                        $freeCash = $account_result['use_money'] + $tixian + $investnum - $chongzhi;

                        /* 							if ($data['total'] <= 10000){ 
                          $data['fee'] = 6;
                          }elseif ($data['total'] > 10000 && $data['total']<=20000){
                          $data['fee'] = 8;
                          }else{
                          $data['fee'] = 10;
                          } */
                        if ($value['account'] <= $freeCash) {
                            if ($value['account'] <= 30000) {
                                $data['fee'] = $value['account'] * 0.004;
                            } else {
                                $data['fee'] = $value['account'] * 0.003;
                            }
                        } else {
                            if ($freeCash <= 0) {
                                $data['fee'] = 0;
                            } else {
                                $data['fee'] = $freeCash * 0.004;
                            }
                        }
                        $money2 = $data['fee'];
                        $account_result = accountClass::GetOne(array("user_id" => $value['user_id']));
                        $log['user_id'] = $value['user_id'];
                        $log['type'] = "invest_award";
                        $log['money'] = $money2;
                        $log['total'] = $account_result['total'] + $money2;
                        $log['use_money'] = $account_result['use_money'] + $money2;
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = $user_id;
                        $log['remark'] = "�Խ��[{$borrow_url}]����Ͷ�Ľ���";
                        accountClass::AddLog($log);
                    }


                    if ($award == 1 || $award == 2) {
                        $account_result = accountClass::GetOne(array("user_id" => $user_id));
                        $log['user_id'] = $user_id;
                        $log['type'] = "award_lower";
                        $log['money'] = $money;
                        $log['total'] = $account_result['total'] - $money;
                        $log['use_money'] = $account_result['use_money'] - $money;
                        $log['no_use_money'] = $account_result['no_use_money'];
                        $log['collection'] = $account_result['collection'];
                        $log['to_user'] = $value['user_id'];
                        $log['remark'] = "�۳����[{$borrow_url}]�Ľ���";
                        accountClass::AddLog($log);
                    }
                }
            }
        }
        //��������ʱ�Ĳ�����
        $sql = " update {borrow} set repayment_user='{$data['repayment_user']}',repayment_account='{$total_account}',repayment_remark='{$data['repayment_remark']}',repayment_time='" . time() . "'  where id='{$id}'";
        return $mysql->db_query($sql);
    }

    public static function EqualInterest($data = array()) {
        if (isset($data['borrow_style']) && $data['borrow_style'] != "") {
            $borrow_style = $data['borrow_style'];
        } else {
            $borrow_style = 0;
        }
        if ($data['isday'] == 1) {
            $borrow_style = 0;
        }
        if ($borrow_style == 0) {
            return self::EqualMonth($data);
        } elseif ($borrow_style == 1) {
            return self::EqualSeason($data);
        } elseif ($borrow_style == 2) {
            return self::EqualEnd($data);
        } elseif ($borrow_style == 3) {
            return self::EqualEndMonth($data);
        }
    }

    //�ȶϢ��
    //�����������ʡ���1+�����ʣ���������/[��1+�����ʣ���������-1] 
    //a*[i*(1+i)^n]/[(1+I)^n-1] 
    //��a��i��b������1��i��
    public static function EqualMonth($data = array()) {
        if ($data['isday'] == 1) {
            if($data['type'] == "all"){
                $_result = array();
                $_result['capital'] = $data['account']; //����
                $interest = round($data['account'] * $data['year_apr'] / 36000 * $data['time_limit_day'], 2); //��Ϣ
                $_result['repayment_account'] = $data['account'] + $interest; //�������
                $_result['interest'] = $interest;
                $_result['repayment_time'] = time() + ($data['time_limit_day'] * 3600 * 24); //����ʱ��
                return $_result;
                
            }else{
                //���������㣬���ֻ��EqualMonth��һ�ֻ��ʽ����˲���Ҫ�����������ʽ
                //֧�����������Ļ��� modified by 20140108
                $_result = array();
                $_result[0]['capital'] = $data['account']; //����
                $interest = round($data['account'] * $data['year_apr'] / 36000 * $data['time_limit_day'], 2); //��Ϣ
                $_result[0]['repayment_account'] = $data['account'] + $interest; //�������
                $_result[0]['interest'] = $interest;
                $_result[0]['repayment_time'] = time() + ($data['time_limit_day'] * 3600 * 24); //����ʱ��
                return $_result;
            }
        }
        if (isset($data['account']) && $data['account'] > 0) {
            $account = $data['account'];
        } else {
            return "";
        }

        if (isset($data['year_apr']) && $data['year_apr'] > 0) {
            $year_apr = $data['year_apr'];
        } else {
            return "";
        }

        if (isset($data['month_times']) && $data['month_times'] > 0) {
            $month_times = $data['month_times'];
        }
        if (isset($data['borrow_time']) && $data['borrow_time'] > 0) {
            $borrow_time = $data['borrow_time'];
        } else {
            $borrow_time = time();
        }
        $month_apr = $year_apr / (12 * 100);
        if ($data['isday'] == 1) {
            $month_times = $month_times * $data['time_limit_day'] / 30;
        }
        if ($data['isday'] == 1) {
            $_li = pow((1 + $month_apr), 1);
        } else {
            $_li = pow((1 + $month_apr), $month_times);
        }
        $repayment = round($account * ($month_apr * $_li) / ($_li - 1), 2);
        $_result = array();
        if (isset($data['type']) && $data['type'] == "all") {

            if ($data['isday'] == 1) {
                $lixi = ($repayment - $data['account']) * $month_times;
                $_result['repayment_account'] = round($data['account'] + $lixi, 2);
                $_result['monthly_repayment'] = round($data['account'] + $lixi, 2);
            } else {
                $_result['repayment_account'] = round($repayment * $month_times, 2);
                $_result['monthly_repayment'] = round($repayment, 2);
            }
            $_result['month_apr'] = round($month_apr * 100, 2);
        } else {
            $n = $month_times;
            if ($data['isday'] == 1 && $n > 1)
                $n = 1;
            //$re_month = date("n",$borrow_time);
            for ($i = 0; $i < $n; $i++) {
                if ($i == 0) {
                    $interest = round($account * $month_apr, 2);
                } else {
                    $_lu = pow((1 + $month_apr), $i);
                    $interest = round(($account * $month_apr - $repayment) * $_lu + $repayment, 2);
                }
                if ($data['isday'] == 1) {
                    if ($data['type'] != "all") {
                        $_result[$i]['repayment_account'] = round($data['account'] + ($repayment - $data['account']) * $month_times, 2);
                    } else {
                        $_result[$i]['repayment_account'] = round($repayment, 2);
                    }

                    $_result[$i]['interest'] = $interest * $month_times;
                    $interest = round($interest * $month_times, 2);
                } else {
                    $_result[$i]['repayment_account'] = round($repayment, 2);
                    $_result[$i]['interest'] = round($interest, 2);
                }
                $_result[$i]['repayment_time'] = get_times(array("time" => $borrow_time, "num" => $i + 1));
                $_result[$i]['interest'] = round($interest, 2);
                if ($data['isday'] == 1) {
                    $_result[$i]['capital'] = $data['account'];
                } else {
                    $_result[$i]['capital'] = $repayment - $interest;
                }
            }
        }
        return $_result;
    }

    //�����ȶϢ��
    function EqualSeason($data = array()) {

        //��������
        if (isset($data['month_times']) && $data['month_times'] > 0) {
            $month_times = $data['month_times'];
        }

        //������������Ǽ��ı���
        if ($month_times % 3 != 0) {
            return false;
        }

        //�����ܽ��
        if (isset($data['account']) && $data['account'] > 0) {
            $account = $data['account'];
        } else {
            return "";
        }

        //����������
        if (isset($data['year_apr']) && $data['year_apr'] > 0) {
            $year_apr = $data['year_apr'];
        } else {
            return "";
        }


        //����ʱ��
        if (isset($data['borrow_time']) && $data['borrow_time'] > 0) {
            $borrow_time = $data['borrow_time'];
        } else {
            $borrow_time = time();
        }

        //������
        $month_apr = $year_apr / (12 * 100);

        //�õ��ܼ���
        $_season = $month_times / 3;

        //ÿ��Ӧ���ı���
        $_season_money = round($account / $_season, 2);

        //$re_month = date("n",$borrow_time);
        $_yes_account = 0;
        $repayment_account = 0; //�ܻ����
        for ($i = 0; $i < $month_times; $i++) {
            $repay = $account - $_yes_account; //Ӧ���Ľ��

            $interest = round($repay * $month_apr, 2); //��Ϣ����Ӧ������������
            $repayment_account = $repayment_account + $interest; //�ܻ����+��Ϣ
            $capital = 0;
            if ($i % 3 == 2) {
                $capital = $_season_money; //����ֻ�ڵ������»���������ڽ���������
                $_yes_account = $_yes_account + $capital;
                $repay = $account - $_yes_account;
                $repayment_account = $repayment_account + $capital; //�ܻ����+����
            }

            $_result[$i]['repayment_account'] = $interest + $capital;
            $_result[$i]['repayment_time'] = get_times(array("time" => $borrow_time, "num" => $i + 1));
            $_result[$i]['interest'] = $interest;
            $_result[$i]['capital'] = $capital;
        }
        if (isset($data['type']) && $data['type'] == "all") {
            $_resul['repayment_account'] = $repayment_account;
            $_resul['monthly_repayment'] = round($repayment_account / $_season, 2);
            $_resul['month_apr'] = round($month_apr * 100, 2);
            return $_resul;
        } else {
            return $_result;
        }
    }

    //���ڸ���
    function EqualEnd($data = array()) {

        //��������
        if (isset($data['month_times']) && $data['month_times'] > 0) {
            $month_times = $data['month_times'];
        }


        //�����ܽ��
        if (isset($data['account']) && $data['account'] > 0) {
            $account = $data['account'];
        } else {
            return "";
        }

        //����������
        if (isset($data['year_apr']) && $data['year_apr'] > 0) {
            $year_apr = $data['year_apr'];
        } else {
            return "";
        }


        //����ʱ��
        if (isset($data['borrow_time']) && $data['borrow_time'] > 0) {
            $borrow_time = $data['borrow_time'];
        } else {
            $borrow_time = time();
        }

        //������
        $month_apr = $year_apr / (12 * 100);

        $interest = $month_apr * $month_times * $account;
        if (isset($data['type']) && $data['type'] == "all") {
            $_resul['repayment_account'] = $account + $interest;
            $_resul['monthly_repayment'] = $account + $interest;
            $_resul['month_apr'] = $month_apr;
            return $_resul;
        } else {
            $_result[0]['repayment_account'] = $account + $interest;
            $_result[0]['repayment_time'] = get_times(array("time" => $borrow_time, "num" => $month_times));
            $_result[0]['interest'] = $interest;
            $_result[0]['capital'] = $account;
            return $_result;
        }
    }

    //���ڻ��������¸�Ϣ
    function EqualEndMonth($data = array()) {

        //��������
        if (isset($data['month_times']) && $data['month_times'] > 0) {
            $month_times = $data['month_times'];
        }

        //�����ܽ��
        if (isset($data['account']) && $data['account'] > 0) {
            $account = $data['account'];
        } else {
            return "";
        }

        //����������
        if (isset($data['year_apr']) && $data['year_apr'] > 0) {
            $year_apr = $data['year_apr'];
        } else {
            return "";
        }


        //����ʱ��
        if (isset($data['borrow_time']) && $data['borrow_time'] > 0) {
            $borrow_time = $data['borrow_time'];
        } else {
            $borrow_time = time();
        }

        //������
        $month_apr = $year_apr / (12 * 100);



        //$re_month = date("n",$borrow_time);
        $_yes_account = 0;
        $repayment_account = 0; //�ܻ����

        $interest = round($account * $month_apr, 2); //��Ϣ����Ӧ������������
        for ($i = 0; $i < $month_times; $i++) {
            $capital = 0;
            if ($i + 1 == $month_times) {
                $capital = $account; //����ֻ�ڵ������»���������ڽ���������
            }

            $_result[$i]['repayment_account'] = $interest + $capital;
            $_result[$i]['repayment_time'] = get_times(array("time" => $borrow_time, "num" => $i + 1));
            $_result[$i]['interest'] = $interest;
            $_result[$i]['capital'] = $capital;
        }
        if (isset($data['type']) && $data['type'] == "all") {
            $_resul['repayment_account'] = $account + $interest * $month_times;
            $_resul['monthly_repayment'] = $interest;
            $_resul['month_apr'] = round($month_apr * 100, 2);
            return $_resul;
        } else {
            return $_result;
        }
    }

    //��ȡ�����ܶ�
    //�û�id
    function GetWaitPayment($data) {
        global $mysql;
        //�����ܶ�
        $user_id = $data['user_id'];
        $sql = "select status,count(1) as repay_num,sum(repayment_account) as borrow_num ,sum(capital) as capital_num ,sum(repayment_yesaccount) as borrow_yesnum from `{borrow_repayment}` where borrow_id in (select id from `{borrow}` where user_id = {$user_id} and status=3) group by status ";
        $result = $mysql->db_fetch_arrays($sql);
        $_result['wait_payment'] = $_result['borrow_yesnum'];
        foreach ($result as $key => $value) {
            if ($value['status'] == 0) {
                $_result['borrow_num0'] = $value['borrow_num'];
                $_result['borrow_capital_num0'] +=$value['capital_num']; //���Ľ��
                $_result['borrow_repay0'] = $value['repay_num'];
            } elseif ($value['status'] == 2) {//��վ����
                $_result['borrow_yesnum'] = $value['borrow_yesnum'];
                $_result['borrow_num2'] = $value['borrow_num'];
            } elseif ($value['status'] == 1) {
                $_result['borrow_yesnum'] = round($value['borrow_yesnum']);
                $_result['borrow_num1'] = round($value['borrow_num']);
            }
            $_result['borrow_capital_num'] +=$value['capital_num']; //���Ľ��
        }
        $_result['wait_payment'] = round($_result['borrow_num0'] + $_result['borrow_num2']); //�������
        $_result['borrow_num'] = round($_result['borrow_num0'] + $_result['borrow_num1'] + $_result['borrow_num2']); //����ܶ�
        $_result['use_amount'] = round($_result['amount'] - $_result['wait_payment']); //���ö��
        return $_result;
    }

    //�ѳɹ��Ľ��
    function GetBorrowSucces($data) {
        global $mysql, $_G;
        $user_id = $data['user_id'];
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];
        $_sql = "";
        if (isset($data['type']) && $data['type'] != "") {
            if ($data['type'] == "wait") {
                $_sql = " and bt.repayment_yesaccount!=bt.repayment_account";
            } elseif ($data['type'] == "yes") {
                $_sql = " and bt.repayment_yesaccount=bt.repayment_account ";
            }
        }
        $_select = "bt.repayment_yesaccount,bt.repayment_account,bt.addtime as tender_time,bt.account as anum,bt.repayment_account  - bt.account as inter,bo.name as borrow_name,bo.account,bo.time_limit,bo.isday,bo.time_limit_day,bo.apr,u.username,cr.value as credit,bo.id ";
        $sql = "select SELECT from `{borrow_tender}` as bt,`{borrow}` as bo,`{user}` as u,`{credit}` as cr where bt.user_id={$user_id} and bo.user_id=u.user_id  and cr.user_id=bo.user_id and bt.borrow_id=bo.id and bo.status=3 {$_sql} ";
        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.`order` desc,p1.id desc', $_limit), $sql));
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array("count(*) as  num", "", ""), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";
        $sql2 = str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql);
        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
        $list = $list ? $list : array();
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    //�տ���ϸ
    function GetCollectionList($data) {
        global $mysql, $_G;
        $_sql = " ";
        $__sql = " ";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $__sql .= " where user_id={$data['user_id']}";
        }
        if (isset($data['status']) && $data['status'] != "") {
            $_sql .= " and p1.status={$data['status']}";
        }
        if (isset($data['borrow_status']) && $data['borrow_status'] != "") {
            $_sql .= " and ((p3.status={$data['borrow_status']} and  p3.is_liuzhuan=0) or p3.is_liuzhuan=1)";
        }
        if (isset($data['username']) && $data['username'] != "") {
            $_sql .= " and p4.username like '%{$data['username']}%' ";
        }
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];
        /*
          $_select = 'p1.*,p3.name as borrow_name,p3.id as borrow_id,p3.time_limit,p4.username ';
          $sql = "select SELECT from `{borrow_collection}` as p1
          left join `{borrow_tender}` as p2 on  p1.tender_id = p2.id
          left join `{borrow}` as p3 on  p3.id = p2.borrow_id
          left join `{user}` as p4 on  p4.user_id = p3.user_id
          where p3.status=3  and p3.id in (select borrow_id from `{borrow_tender}` {$__sql})
          $_sql ORDER LIMIT";
         */
        $_select = 'p1.*,p3.name as borrow_name,p3.id as borrow_id,p3.time_limit,p3.is_liuzhuan,p4.username ';
        $_order = " order by p1.id ";
        if (isset($data['order']) && $data['order'] != "") {
            if ($data['order'] == "repay_time") {
                $_order = " order by p1.repay_time asc ";
            } elseif ($data['order'] == "order") {
                $_order = " order by p1.`order` desc,p1.id desc ";
            }
        }
        $sql = "select SELECT from `{borrow_collection}` as p1 
				left join `{borrow_tender}` as p2 on  p1.tender_id = p2.id
				left join `{borrow}` as p3 on  p3.id = p2.borrow_id
				left join `{user}` as p4 on  p4.user_id = p3.user_id
				where p1.tender_id in (select id from `{borrow_tender}`{$__sql})
			   {$_sql} ORDER LIMIT";

        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
            foreach ($list as $key => $value) {
                $late = self::LateInterest(array("repayment_time" => $value['repay_time'], "account" => $value['capital']));
                if ($value['status'] != 1) {
                    $list[$key]['late_days'] = $late['late_days'];
                    if ($late['late_days'] > 30) {
                        $list[$key]['late_interest'] = 0;
                    } else {
                        $list[$key]['late_interest'] = round($late['late_interest'] / 2, 2);
                    }
                } else {
                    $list[$key]['late_interest'] = 0;
                    $list[$key]['late_days'] = 0;
                }
            }
            return $list;
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(" count(*) as num ", "", ""), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql));
        $list = $list ? $list : array();
        foreach ($list as $key => $value) {
            $late = self::LateInterest(array("repayment_time" => $value['repay_time'], "account" => $value['capital']));
            if ($value['status'] != 1) {
                $list[$key]['late_days'] = $late['late_days'];
                if ($late['late_days'] > 30) {
                    $list[$key]['late_interest'] = 0;
                } else {
                    $list[$key]['late_interest'] = round($late['late_interest'] / 2, 2);
                }
            } else {
                $list[$key]['late_interest'] = 0;
                $list[$key]['late_days'] = 0;
            }
        }
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    function GetBorrowAll($data = array()) {
        global $mysql;
        $user_id = $data['user_id'];
        $sql = "select * from `{borrow}` where user_id = {$user_id}";
        $result = $mysql->db_fetch_arrays($sql);
        $_result['success'] = $_result['false'] = $_result['wait'] = $_result['pay_success'] = $_result['pay_advance'] = $_result['pay_expired'] = 0;
        foreach ($result as $key => $value) {
            if ($value['status'] == 3) {
                $_result['success']++;
            }
            if ($value['status'] == 3 && $value['repayment_account'] != $value['repayment_yesaccount']) {
                $_result['wait']++;
            }
            if ($value['status'] == 0 || $value['status'] == 4) {
                $_result['false']++;
            }
        }
        $sql = "select * from `{borrow_repayment}` where borrow_id in (select id from `{borrow}` where user_id = {$user_id} and status=3)";
        $result = $mysql->db_fetch_arrays($sql);
        foreach ($result as $key => $value) {
            //�ѻ���δ����
            if ($value['status'] == 1 && $value['repayment_time'] < $value['repayment_yestime']) {
                $_result['pay_success']++;
            }
            //�ѻ������
            if ($value['status'] == 1 && $value['repayment_time'] > $value['repayment_yestime']) {
                $_result['pay_expired']++;
            }
            //����δ��
            if (($value['status'] == 0 || $value['status'] == 2 ) && date("Ymd", $value['repayment_time']) < date("Ymd", time())) {
                $_result['pay_expiredno']++;
            }
            //�����ѻ�
            if ($value['status'] == 1 && date("Ymd", $value['repayment_time']) < date("Ymd", $value['repayment_yestime'])) {
                $_result['pay_expiredyes']++;
            }
            //��ǰ����
            if ($value['status'] == 1 && $value['repayment_time'] - $value['repayment_yestime'] > 60 * 60 * 24 * 15) {
                $_result['pay_advance']++;
            }
            //30��֮�ڵ����ڻ���
            if ($value['status'] == 1 && $value['repayment_yestime'] - $value['repayment_time'] > 60 * 60 * 24 * 30) {
                $_result['pay_expired30']++;
            }
            //30��֮�ڵ����ڻ��� 
            if ($value['status'] == 1 && $value['repayment_yestime'] - $value['repayment_time'] > 60 * 60 * 24 * 15 && $value['repayment_yestime'] - $value['repayment_time'] < 60 * 60 * 24 * 30) {
                $_result['pay_expired30in']++;
            }
        }
        return $_result;
    }

    function GetAll($data = array()) {
        global $mysql;
        $sql = "select sum(account) as sum from `{borrow}`";
        $result = $mysql->db_fetch_array($sql);
        $_result['borrow_all'] = $result['sum'];

        $sql = "select sum(account) as sum from `{borrow}` where status=3";
        $result = $mysql->db_fetch_array($sql);
        $_result['borrow_yesall'] = $result['sum'];


        $sql = "select count(account) as num from `{borrow}`";
        $result = $mysql->db_fetch_array($sql);
        $_result['borrow_times'] = $result['num'];

        $sql = "select count(account) as num from `{borrow}` where status=3";
        $result = $mysql->db_fetch_array($sql);
        $_result['borrow_yestimes'] = $result['num'];

        return $_result;
    }

    function ActionLiubiao($data) {

        global $mysql;
        $status = $data['status'];
        if ($status == 1) {
            if ($data['is_liuzhuan'] == 0) {
                $result = self::Cancel($data, true);
                include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
                $receive_user_id = sendMessage::getTenderUserId(intval($data['id']));
                $sendObj = new sendMessage(1,$receive_user_id,'borrow_failed_remind');
                $sendObj->getReceiveTeam();
                $content = '������ı�ı��:'.intval($data['id']).'�Ѿ�����,����ע��˶��ʽ���ϸ,�����κ���������������ϵ';
                $sendObj->send($content);
            } else {
                $sql = "update `{borrow}` set status=2 where id={$data['id']}";
                $mysql->db_query($sql);
            }
        } elseif ($status == 2) {
            $valid_time = $data['days'];
            $sql = "update `{borrow}` set valid_time=valid_time +{$valid_time} where id={$data['id']}";
            $mysql->db_query($sql);
        }
        return true;
    }

    //���ڻ����б�
    function GetLateList($data = array()) {
        global $mysql, $_G;
        // TODO::��ʱ�ر����ں�����
        return array();
        $page = (!isset($data['page']) || $data['page'] == "") ? 1 : $data['page'];
        $epage = (!isset($data['epage']) || $data['epage'] == "") ? 10 : $data['epage'];

        $_select = 'p1.*,p3.*';
        $_order = " order by p1.id ";
        if (isset($data['late_day']) && $data['late_day'] != "") {
            $_repayment_time = time() - 60 * 60 * 24 * $data['late_day'];
        } else {
            $_repayment_time = time();
        }

        $_sql = " where p1.repayment_time < '{$_repayment_time}' and p1.status!=1 and p1.borrow_id>0";
        $sql = "select SELECT from `{borrow_repayment}` as p1 
				left join `{borrow}` as p2 on p1.borrow_id=p2.id
				left join `{user}` as p3 on p2.user_id=p3.user_id
			   {$_sql} ORDER LIMIT";

        $_list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, ""), $sql));

        foreach ($_list as $key => $value) {
            $late = self::LateInterest(array("repayment_time" => $value['repayment_time'], "account" => $value['capital']));
            $list[$value['user_id']]['realname'] = $value['realname'];
            $list[$value['user_id']]['phone'] = $value['phone'];
            $list[$value['user_id']]['user_id'] = $value['user_id'];
            $list[$value['user_id']]['email'] = $value['email'];
            $list[$value['user_id']]['qq'] = $value['qq'];
            $list[$value['user_id']]['sex'] = $value['sex'];
            $list[$value['user_id']]['card_id'] = $value['card_id'];
            $list[$value['user_id']]['area'] = $value['area'];
            $list[$value['user_id']]['late_days'] += $late['late_days']; //����������
            if ($list[$value['user_id']]['late_numdays'] < $late['late_days']) {
                $list[$value['user_id']]['late_numdays'] = $late['late_days'];
            }
            $list[$value['user_id']]['late_interest'] += round($late['late_interest'] / 2, 2);
            $list[$value['user_id']]['late_account'] += $value['repayment_account']; //�����ܽ��
            $list[$value['user_id']]['late_num']++; //���ڱ���
            if ($value['webstatus'] == 1) {
                $list[$value['user_id']]['late_webnum'] +=1; //���ڱ���
            }
        }
        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit'])) {
            if (count($list) > 0) {
                return array_slice($list, 0, $data['limit']);
            } else {
                return array();
            }
        }

        $total = count($list);
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        if (is_array($list)) {
            $list = array_slice($list, $index, $epage);
        }
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    //�ҵĿͻ��б�
    function GetMyuserList($data = array()) {
        global $mysql, $_G;

        $page = (!isset($data['page']) || $data['page'] == "") ? 1 : $data['page'];
        $epage = (!isset($data['epage']) || $data['epage'] == "") ? 10 : $data['epage'];

        $_select = 'p1.*,p2.realname,p2.username';
        $_order = " order by p1.id ";
        $_sql = "";
        if (isset($data['suser_id']) && $data['suser_id'] != "") {
            $_sql .= " and p1.user_id='{$data['suser_id']}'";
        }
        $sql = "select SELECT from `{borrow}` as p1 left join `{user}` as p2 on p1.user_id=p2.user_id where p1.user_id in (select user_id from `{user_cache}` where kefu_userid = '{$data['user_id']}')   {$_sql} ORDER LIMIT";

        //�Ƿ���ʾȫ������Ϣ
        if (isset($data['limit']) && $data['limit'] != "") {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.`order` desc,p1.id desc', $_limit), $sql));
        }

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array("count(*) as  num", "", ""), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));
        $list = $list ? $list : array();
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    //ͳ��
    function GetMyuserAcount($data = array()) {
        global $mysql, $_G;
        $user_id = $data['user_id'];

        //��һ�����ȶ�ȡ���ͷ�������û�
        $sql = "select user_id from `{user_cache}` where kefu_userid = {$user_id}";
        $result = $mysql->db_fetch_arrays($sql);
        if ($result != "") {
            foreach ($result as $key => $value) {
                $_result[] = $value["user_id"];
            }
            $_fuserid = join(",", $_result);
        }
        $_first_month = strtotime("2010-08-01");
        $_now_year = date("Y", time());
        $_now_month = date("n", time());
        $month = ($_now_year - 2011) * 12 + 5 + $_now_month; //���ڵ�����
        //�ɹ����
        for ($i = 1; $i <= $month; $i++) {
            $up_month = strtotime("$i month", $_first_month);
            $now_month = strtotime("-1 month", $up_month);
            $nowlast_day = strtotime("-1 day", $up_month);

            $sql = "select sum(money) as num_money from `{account_log}` where user_id in ($_fuserid) and type='borrow_success' and addtime >= {$now_month} and addtime < {$nowlast_day}";
            $result = $mysql->db_fetch_array($sql);
            if ($result["num_money"] != "") {
                $_resul[date("Y-n", $now_month)]["borrow"] = $result["num_money"];
            }

            $sql = "select sum(money) as num_money from `{account_log}` where user_id in ($_fuserid) and type='invest' and addtime >= {$now_month} and addtime < {$nowlast_day}";
            $result = $mysql->db_fetch_array($sql);
            if ($result["num_money"] != "") {
                $_resul[date("Y-n", $now_month)]["tender"] = $result["num_money"];
            }

            $sql = "select count(1) as num_vip from `{account_log}` where user_id in ($_fuserid) and type='vip' and addtime >= {$now_month} and addtime < {$nowlast_day}";
            $result = $mysql->db_fetch_array($sql);
            if ($result["num_vip"] > 0) {
                $_resul[date("Y-n", $now_month)]["vip"] = $result["num_vip"];
            }
        }

        arsort($_resul);

        return $_resul;
    }

    //ͳ��
    function Tongji($data = array()) {
        global $mysql;

        //�ɹ����
        $sql = " select sum(account) as num from `{borrow}` where status=3 ";
        $result = $mysql->db_fetch_array($sql);
        $_result['success_num'] = $result['num'];

        //����δ����
        $_repayment_time = time();
        ;
        $sql = " select p1.capital,p1.repayment_yestime,p1.repayment_time,p1.status  from  `{borrow_repayment}` as p1 left join `{borrow}` as p2 on p1.borrow_id=p2.id where p2.status=3 ";
        $result = $mysql->db_fetch_arrays($sql);
        foreach ($result as $key => $value) {
            $_result['success_sum'] += $value['capital']; //����ܶ�
            if ($value['status'] == 1) {
                $_result['success_num1'] += $value['capital']; //�ɹ������ܶ�
                if (date("Ymd", $value['repayment_time']) < date("Ymd", $value['repayment_yestime'])) {
                    $_result['success_laterepay'] += $value['capital'];
                }
            }
            if ($value['status'] == 0) {
                $_result['success_num0'] += $value['capital']; //δ�����ܶ�
                if (date("Ymd", $value['repayment_time']) < date("Ymd", time())) {
                    $_result['false_laterepay'] += $value['capital'];
                }
            }
        }
        $_result['laterepay'] = $_result['success_laterepay'] + $_result['false_laterepay'];

        return $_result;
    }

    /**
     * ���
     *
     * @param Array $data
     * @return Boolen
     */
    function add_auto($data = array()) {
        global $mysql, $_G;
        if ($_G['user_cache']['vip_status'] != 1) {
            return '���������ΪVIP';
        }
        $sql = "SELECT * FROM {account} WHERE `user_id`={$data['user_id']}";
        $account_result = $mysql->db_fetch_array($sql);

        // ���û��Զ�Ͷ���������, ɾ����������Ĺ���
        $sql = "SELECT * FROM {borrow_auto} WHERE `user_id`={$data['user_id']} ORDER BY `last_tender_time` DESC, `sort` DESC";
        $auto_setting = $mysql->db_fetch_arrays($sql);
        $num = count($auto_setting);

        $allow_num = floor($account_result['total'] / 500000) + 1;

        if ($num > $allow_num) {
            $del_num = $num - $allow_num;
            $i = 0;
            foreach ($auto_setting as $value) {
                $i++;
                if ($i > $del_num) {
                    break;
                }
                $delete_id .= ','.$value['id'];
            }
            $delete_id = ltrim($delete_id,',');
            $sql = "DELETE FROM {borrow_auto} WHERE `id` IN ($delete_id)";
            $mysql->db_query($sql);
        }
        if ($num >= $allow_num) {
            if (isset($data['auto_id']) && is_numeric($data['auto_id'])) {

            } else {
                return '��Ǹ!�����ʺŵ�ǰ�����������'.$allow_num.'������';
            }
        }

        if (isset($data['auto_id']) && is_numeric($data['auto_id'])) {
            // ��ѯ���Զ�Ͷ������
            $sql = "SELECT * FROM {borrow_auto} WHERE `id`={$data['auto_id']}";
            $res = $mysql->db_fetch_array($sql);
            if (is_array($res)) {
                if ($res['user_id'] == $_G['user_id'] && $_G['user_id'] > 0) {

                } else {
                    return '�Ƿ�����';
                }
            } else {
                return '�Ƿ�����';
            }
        }

        $_sql = array();
        $_table_field = $mysql->db_show_fields("borrow_auto");
        $_field = array();
        $data['last_tender_time'] = time();
        $data['tender_times'] = 0;
        foreach ($_table_field as $field) {
            if (isset($data[$field])) {
                $_sql[] = "`$field` = '" . $data[$field] . "'";
                $_field[$field] = $data[$field];
            } elseif ($field == 'id') {
                "";
            } else {
                $_sql[] = "`$field` = '0'";
                $_field[$field] = 0;
            }
        }

        if ($_field['max_tender'] < $_G['system']['con_min_auto_tender_money'] && !empty($_field['max_tender'])) {
            return '���Ͷ����������'.$_G['system']['con_min_auto_tender_money'].',�����������������0';
        }

        if ($_field['min_tender'] < $_G['system']['con_min_auto_tender_money'] && !empty($_field['min_tender'])) {
            return '��СͶ����������'.$_G['system']['con_min_auto_tender_money'].',�����������������0';
        }

        if ($_field['max_tender'] < $_field['min_tender'] && $_field['max_tender'] > 0) {
            return '���Ͷ������������СͶ����';
        }

        if (
                ( ($_field['max_tender'] % 100) != 0 )
                ||
                ( ($_field['min_tender'] % 100) != 0 )
        )
        {
            return '��СͶ��������Ͷ������Ϊ100��������';
        }

        if (isset($data['auto_id']) && is_numeric($data['auto_id'])) {
            $sql = "update `{borrow_auto}` set ";
        } else {
            $sql = "insert into `{borrow_auto}` set ";
        }

        $sql.=join(",", $_sql);

        if (isset($data['auto_id']) && is_numeric($data['auto_id'])) {
            $sql .= " where  id = {$data['auto_id']} ";
        }
        $mysql->db_query($sql);
        return '�����ɹ�';
    }

    /**
     * ���
     *
     * @param Array $data
     * @return Boolen
     */
    function add_auto_back($data = array()) {
        global $mysql;
        global $_G;

        $csql = "select id from`{auto_back}` where user_id={$data['user_id']} ";
        $cn = $mysql->db_fetch_array($csql);

        $_sql = array();
        $_table_field = $mysql->db_show_fields("auto_back"); //��ȡ��ǰ�û������
        foreach ($_table_field as $field_v) {
            if (isset($data[$field_v]))
                $_sql[] = "`$field_v` = '" . $data[$field_v] . "'";
            elseif ($field_v == 'id')
                "";
            else
                $_sql[] = "`$field_v` = '0'";
        }


        if (isset($data['auto_back_id']) && is_numeric($data['auto_back_id'])) {
            $sql = "update `{auto_back}` set ";
        } else {
            $sql = "insert into `{auto_back}` set ";
        }

        $sql.=join(",", $_sql);

        if (isset($data['auto_back_id']) && is_numeric($data['auto_back_id'])) {
            $sql .= " where  id = {$data['auto_back_id']} ";
        }


        return $mysql->db_query($sql);
    }

    public static function getUserAutoTenderListSort($data = array()) {
        global $_G;
        $user_id = isset($data['user_id']) ? intval($data['user_id']) : 0;
        define('HOME_ACCESS',TRUE);
        include_once $_SERVER['DOCUMENT_ROOT'].'/include/init.php';
        $sql = "SELECT auto.*,acc.`use_money` FROM `previous_borrow_auto` AS auto
                LEFT JOIN `previous_account` AS acc
                ON auto.`user_id`=acc.`user_id`
                WHERE auto.`status`=1 OR auto.`user_id`={$user_id}
                ORDER BY auto.`last_tender_time` ASC, auto.`sort` ASC";
        $result = $db->fetchAllByNormal($sql);
        if ( count($result) <= 0 ) {
            return $result;
        }
        $return_list = array();
        $sort = 0; $real_sort = 0;
        $min_auto_tender_money = intval($_G['system']['con_min_auto_tender_money']);
        foreach ($result as $value) {
            $sort++;
            if ($value['use_money'] >= $min_auto_tender_money) {
                $real_sort++;
            }

            if ($value['user_id'] == $user_id) {
                $return_list[$sort] = $value;
                $return_list[$sort]['sort'] = $sort;
                $return_list[$sort]['real_sort'] = $real_sort;
            }
        }
        return $return_list;
    }

    public static function getAutoTenderSort($data = array()) {
        global $_G;
        define('HOME_ACCESS',TRUE);
        include_once $_SERVER['DOCUMENT_ROOT'].'/include/init.php';
        $sql = "SELECT usr.username,auto.*,acc.`use_money` FROM `previous_borrow_auto` AS auto
                LEFT JOIN `previous_account` AS acc
                ON auto.`user_id`=acc.`user_id`
                LEFT JOIN `previous_user` as usr
                ON usr.`user_id`=auto.`user_id`
                WHERE auto.`status`=1
                ORDER BY auto.`last_tender_time` ASC, auto.`sort` ASC";
        $result = $db->fetchAllByNormal($sql);
        if ( count($result) <= 0 ) {
            return $result;
        }
        $return_list = array();
        $sort = 0; $real_sort = 0;
        $min_auto_tender_money = intval($_G['system']['con_min_auto_tender_money']);
        foreach ($result as $value) {
            $sort++;
            if ($value['use_money'] >= $min_auto_tender_money) {
                $real_sort++;
            }

            $return_list[$sort] = $value;
            $return_list[$sort]['sort'] = $sort;
            $return_list[$sort]['real_sort'] = $real_sort;
        }
        return $return_list;
    }

    function GetAutoList($data = array()) {
        define('HOME_ACCESS',TRUE);
        include_once $_SERVER['DOCUMENT_ROOT'].'/include/init.php';
        $user_id = isset($data['user_id']) ? intval($data['user_id']) : 0;
        $sql = "SELECT * FROM `previous_borrow_auto` WHERE `user_id`={$user_id}";
        $result = $db->fetchAllByNormal($sql);
        return $result;
    }

    function GetAutoId($id) {
        global $mysql;
        global $_G;
        $user_id = $_G['user_id'];

        $_select = " p1.* ";
        $_where = "where 1=1 ";

        if (isset($user_id) && $user_id != "") {
            $_where .= " and p1.user_id = {$user_id}";
        }

        if (isset($id) && $id != "") {
            $_where .= " and p1.id = {$id}";
        }

        $_order = " order by p1.`id` desc ";

        $_limit = "  limit 0,1";

        $sql = "select SELECT from `{borrow_auto}` as p1 $_where ORDER LIMIT";
        //�Ƿ���ʾȫ������Ϣ

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));

        return $row;
    }

    function GetAutoBackId() {
        global $mysql;
        global $_G;
        $user_id = $_G['user_id'];

        $_select = " p1.* ";
        $_where = "where 1=1 ";

        if (isset($user_id) && $user_id != "") {
            $_where .= " and p1.user_id = {$user_id}";
        }

        $_order = " order by p1.`id` desc ";

        $_limit = "  limit 0,1";

        $sql = "select SELECT from `{auto_back}` as p1 $_where ORDER LIMIT";
        //�Ƿ���ʾȫ������Ϣ

        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));

        return $row;
    }

    /**
     * ��ȡ�����б�
     *
     * @param Array $data
     * @return Boolen
     */
    function get_back_list($data = array()) {
        global $mysql;
        global $_G;

        $ausql = "select * from `{borrow_repayment}` where borrow_id = " . $data['id'] . "";
        $au_row = $mysql->db_fetch_arrays($ausql); //�Զ�Ͷ����û�

        return $au_row;
    }

    /**
     * ���
     *
     * @param Array $data
     * @return Boolen
     */
    function add_fast_biao($data = array()) {
        global $mysql;
        global $_G;

        $_sql = array();
        $_table_field = $mysql->db_show_fields("daizi"); //��ȡ��ǰ�û������
        foreach ($_table_field as $field_v) {
            if (is_array($data[$field_v])) {
                $data[$field_v] = implode(",", $data[$field_v]);
            }
            if (isset($data[$field_v]))
                $_sql[] = "`$field_v` = '" . $data[$field_v] . "'";
            elseif ($field_v == 'id')
                "";
            else
                $_sql[] = "`$field_v` = '0'";
        }

        $sql = "insert into `{daizi}` set ";

        $sql.=join(",", $_sql);
        $mysql->db_query($sql);
        $newid = $mysql->db_insert_id();
        return $newid;
    }

    /**
     * ���
     *
     * @param Array $data
     * @return Boolen
     */
    function del_auto($id) {
        global $mysql;

        $where = " id ='{$id}' ";

        return $mysql->db_delete("borrow_auto", $where);
    }

    /**
     * Ӧ���������Ϣ
     *
     * @param Array $data
     * @return Boolen
     */
    function getlate_cz($id) {
        global $mysql;
        $sql = "select sum(repayment_account) as total 
				from dw_borrow_repayment 
				where borrow_id=$id and repayment_yestime is null order by `order` asc";
        $data = $mysql->db_fetch_array($sql);

        return $data['total'];
    }

   
    //function

    public function updateLastTenderTime($id,$sort,$tender_times = false) {
        global $mysql;
        $time = time();
        if ($tender_times === true) {
            $sql = "UPDATE {borrow_auto} SET `last_tender_time`={$time},`sort`={$sort},`tender_times`=`tender_times`+1 WHERE `id`={$id}";
        } else {
            $sql = "UPDATE {borrow_auto} SET `last_tender_time`={$time},`sort`={$sort} WHERE `id`={$id}";
        }

        $mysql->db_query($sql);
    }

    public function protocolViewAllow($data = array()) {
        global $mysql;
        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
            $return = array(0);
            return $return;
        }
        $sql = "SELECT * FROM {borrow_tender} WHERE `user_id`={$_SESSION['user_id']} AND `borrow_id`={$data['id']}";
        $res = $mysql->db_fetch_arrays($sql);
        if (count($res) > 0) {
            $return = array(1);
        } else {
            $return = array(2);
        }

        return $return;
    }

    function auto_borrow_liuzhuan($data_s = array()) {
        global $mysql;
        global $_G;
        include_once(ROOT_PATH . "modules/account/account.class.php");
        $borrow_id = $data_s['id'];
        $borrow_result = self::GetOne(array("id" => $borrow_id)); //��ȡ����ĵ�����Ϣ

        $usql = "select user_id from `{borrow_auto}` where user_id<>'" . $data_s['user_id'] . "' AND status=1 group by user_id order by borrowcount asc,id desc limit 50";
        $u_row = $mysql->db_fetch_arrays($usql);

        if ($u_row == false) {
            
        } else {
            $in_uid = -1;
            foreach ($u_row as $v1) {
                if ($v1['user_id'] > 0) {
                    $in_uid = $in_uid . "," . $v1['user_id'];
                }
            }
            //$in_uid = "(".join(",",$u_row).")";
            $in_uid = "(" . $in_uid . ")";
            $ausql = "select * from `{borrow_auto}` where user_id in " . $in_uid . " AND status=1 order by id desc";
            $au_row = $mysql->db_fetch_arrays($ausql); //�Զ�Ͷ����û�
            $sqlborrow = "update `{borrow_auto}` set borrowcount=borrowcount+1 where user_id in " . $in_uid;
            $mysql->db_query($sqlborrow);
            $have_auto_do = array();
            foreach ($au_row as $v) {
                $borrow_result = self::GetOne(array("id" => $borrow_id)); //��ȡ����ĵ�����Ϣ
                if (in_array($v['user_id'], $have_auto_do)) {
                    continue;
                } else {
                    $uss = "select * from `{user}` where user_id = '" . $v['user_id'] . "'";
                    $u_row_detail = $mysql->db_fetch_arrays($uss); //��ǰ�Զ�ͶƱ���û���Ϣ
                }

                if ($v['tender_type'] == 1) {
                    $account_money = $v['tender_account'];
                    $account_money_s = $v['tender_account'];
                } elseif ($v['tender_type'] == 2) {
                    $account_money = ($v['tender_scale'] * $data_s['total_jie'] / 100);
                    $account_money_s = ($v['tender_scale'] * $data_s['total_jie'] / 100);
                }
                if ($account_money < $data_s['zuishao_jie']) {
                    continue; //���������Ͷ�ʽ��
                }
                //�������Ϣ
                $jksql = "select * from `{user}` where user_id='" . $borrow_result['user_id'] . "'";
                $jkr_row = $mysql->db_fetch_array($jksql); //��ǰ�Զ�ͶƱ���û���Ϣ
                if ($v['video_status'] && $jkr_row['video_status'] == 1) {
                    
                } elseif (empty($v['video_status'])) {
                    
                } else {
                    continue;
                }

                if ($v['scene_status'] && $jkr_row['scene_status'] == 1) {
                    
                } elseif (empty($v['scene_status'])) {
                    
                } else {
                    continue;
                }

                //�����Ϣ
                if ($v['award_status']) {
                    if ($v['award_first'] <= $borrow_result['funds'] && $v['award_last'] >= $borrow_result['funds']) {
                        
                    } else {
                        continue;
                    }
                } else {
                    
                }//����

                if ($v['apr_status']) {
                    if ($v['apr_first'] <= $borrow_result['apr'] && $v['apr_last'] >= $borrow_result['apr']) {
                        
                    } else {
                        continue;
                    }
                } else {
                    
                }//����

                if ($v['vouch_status']) {
                    if ($borrow_result['flag'] == 2) {
                        
                    } else {
                        continue;
                    }
                } else {
                    
                }//����
                if ($v['tuijian_status']) {
                    if ($borrow_result['flag'] == 1) {
                        
                    } else {
                        continue;
                    }
                } else {
                    
                }//�Ƽ�

                if ($v['timelimit_status']) {
                    if ($v['timelimit_month_first'] <= $borrow_result['time_limit'] && $v['timelimit_month_last'] >= $borrow_result['time_limit']) {
                        
                    } else {
                        continue;
                    }
                } else {
                    
                }//�������

                if ($u_row_detail['islock'] == 1 && !is_array($borrow_result) && ($borrow_result['account_yes'] >= $borrow_result['account']) && ($borrow_result['verify_time'] == "" || $borrow_result['status'] != 1) && !is_numeric($account_money) && ($borrow_result['most_account'] > 0 && ($borrow_result['tender_yes'] > $borrow_result['most_account'] || $borrow_result['tender_yes'] + $account_money > $borrow_result['most_account']))) {
                    continue; //$msg = array("���˺��Ѿ������������ܽ���Ͷ�꣬�������Ա��ϵ");
                } elseif (!is_array($borrow_result)) {
                    continue; //$msg = array($borrow_result);
                } elseif ($borrow_result['account_yes'] >= $borrow_result['account']) {
                    continue; //$msg = array("�˱�������������Ͷ");
                } elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] != 1) {
                    continue; //$msg = array("�˱���δͨ�����");
                } elseif (!is_numeric($account_money)) {
                    continue; //$msg = array("��������ȷ�Ľ��");
                } elseif ($borrow_result['most_account'] > 0 && ($borrow_result['tender_yes'] > $borrow_result['most_account'] || $borrow_result['tender_yes'] + $account_money > $borrow_result['most_account'])) {
                    continue; //$msg = array("�����Ͷ����".($borrow_result['tender_yes']+$account_money)."�Ѿ�������߽��{$borrow_result['most_account']}");
                } else {
                    $account_result = accountClass::GetOne(array("user_id" => $v['user_id'])); //��ȡ��ǰ�û������

                    if (($borrow_result['account'] - $borrow_result['account_yes']) < $account_money) {
                        $account_money = $borrow_result['account'] - $borrow_result['account_yes'];
                    }
                    if ($account_result['use_money'] < $account_money) {
                        continue; //$msg = array("��������");
                    } else {
                        $data['borrow_id'] = $borrow_id;
                        $data['money'] = $account_money_s;

                        $data['account'] = $account_money;
                        $data['user_id'] = $v['user_id'];
                        $data['status'] = 1;
                        //   $data['per_account']=0;

                        $result = self::AddTender($data); //��ӽ���

                        $have_auto_do[] = $v['user_id']; //�����жϴ��û�
                        //Ͷ�����

                        $log['user_id'] = $v['user_id'];
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
                            //echo "�Զ�Ͷ��ʧ��";
                            //$msg = array($result);
                        } else {
                            //echo "�Զ�Ͷ��ɹ�";
                            //$msg = array("Ͷ��ɹ�","","/index.php?user&q=code/borrow/bid");
                        }
                    }
                }
            }//foreach
        }//if false
    }

//function 
}

?>
