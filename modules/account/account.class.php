<?

/* * ****************************
 * $File: account.class.php
 * $Description: 数据库处理文件
 * $Author: dongdong 
 * $Time:2009-03-09
 * $Update:None 
 * $UpdateDate:None 
 * **************************** */
require_once("modules/remind/remind.class.php");

class accountClass {

    const ERROR = '操作有误，请不要乱操作';

    /**
     * 列表
     *
     * @return Array
     */
    function GetList($data = array()) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";

        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = '{$data['user_id']}'";
        }

        if (isset($data['username']) && $data['username'] != "") {
            $_sql .= " and p2.username like '%{$data['username']}%'";
        }

        if (isset($data['type']) && $data['type'] != "") {
            if ($data['type'] == 'total')
                $_sql.=" and p1.total>'{$data['amount']}'";
            if ($data['type'] == 'total1')
                $_sql.=" and p1.total<'{$data['amount']}'";
            if ($data['type'] == 'canuse')
                $_sql.=" and p1.use_money>'{$data['amount']}'";
            if ($data['type'] == 'canuse1')
                $_sql.=" and p1.use_money<'{$data['amount']}'";
            if ($data['type'] == 'nouse')
                $_sql.=" and p1.no_use_money>'{$data['amount']}'";
            if ($data['type'] == 'nouse1')
                $_sql.=" and p1.no_use_money<'{$data['amount']}'";
        }
        /* $sql = "select *,(select (sum(repayment_account)-sum(repayment_yesaccount)) as waitpayment  from dw_borrow_repayment as r where r.borrow_id in (select id from `dw_borrow` as b where b.user_id = p1.user_id )) as wait from {account} as p1 
          left join {user} as p2 on p1.user_id=p2.user_id
          $_sql ORDER LIMIT"; */

        $sql = "select SELECT from {account} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				$_sql ORDER LIMIT";
        $_select = "p1.*,p2.username,p2.realname";
        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $_limit), $sql));

            return $list;
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

    function GetBorrowerList($data = array()) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";

        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = '{$data['user_id']}'";
        }

        if (isset($data['username']) && $data['username'] != "") {
            $_sql .= " and p2.username like '%{$data['username']}%'";
        }

        if (isset($data['type']) && $data['type'] != "") {
            if ($data['type'] == 'total')
                $_sql.=" and p1.total>'{$data['amount']}'";
            if ($data['type'] == 'total1')
                $_sql.=" and p1.total<'{$data['amount']}'";
            if ($data['type'] == 'canuse')
                $_sql.=" and p1.use_money>'{$data['amount']}'";
            if ($data['type'] == 'canuse1')
                $_sql.=" and p1.use_money<'{$data['amount']}'";
            if ($data['type'] == 'nouse')
                $_sql.=" and p1.no_use_money>'{$data['amount']}'";
            if ($data['type'] == 'nouse1')
                $_sql.=" and p1.no_use_money<'{$data['amount']}'";
        }
        /* $sql = "select *,(select (sum(repayment_account)-sum(repayment_yesaccount)) as waitpayment  from dw_borrow_repayment as r where r.borrow_id in (select id from `dw_borrow` as b where b.user_id = p1.user_id )) as wait from {account} as p1
          left join {user} as p2 on p1.user_id=p2.user_id
          $_sql ORDER LIMIT"; */

        $sql = "select SELECT from {borrow} as p3
				 left join {user} as p2
				 on p3.user_id=p2.user_id
				 left join {account} as p1
				 on p1.`user_id`=p3.`user_id`
				$_sql ORDER LIMIT";
        $_select = "p1.*,p2.username,p2.realname";
        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $_limit), $sql));

            return $list;
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
     * 查看
     *
     * @param Array $data
     * @return Array
     */
    function GetVerificationList() {
        global $mysql;
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];
        $sql = "select * from dw_account_log where type='recharge' group by user_id,money,addtime  having count(*) > 1  ";

        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $sql .= $_limit;
            $result = $mysql->db_fetch_arrays($sql);
            return $result;
        }
        $sql2 = "select count(1) as num from dw_account_log where type='recharge' group by user_id,money,addtime  having count(*) > 1  ";
        $ret = $mysql->db_query($sql);
        $arr = array();
        while ($row = mysql_fetch_array($ret)) {
            $arr[] = $row['num'];
        }
        $total = count($arr);
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";
        $sql .= $limit;
        $list = $mysql->db_fetch_arrays($sql);
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    public static function GetOne($data = array()) {
        global $mysql;
        $user_id = $data['user_id'];
        $sql = "select * from `{user}` where user_id=$user_id";
        $result1 = $mysql->db_fetch_array($sql);
        if ($result1 == false)
            return self::ERROR;
        $sql = "select p2.username,p4.vip_status,p3.*,p1.* from `{account}` as p1 
				  left join {user} as p2 on p1.user_id=p2.user_id
				  left join {account_bank} as p3 on p1.user_id=p3.user_id
                                  left join {user_cache} as p4 on p1.user_id=p4.user_id
				  where p1.user_id=$user_id
				";
        $result = $mysql->db_fetch_array($sql);
        if ($result == false) {
            $sql = "insert into `{account}` set user_id = '{$user_id}'";
            $mysql->db_query($sql);
            $result = self:: GetOne($data);
        }
        return $result;
    }

 
    public static function GetUserLog($data = array()) {
        global $mysql;
        $user_id = $data['user_id'];
        $sql = "select type,sum(money) as num from `{account_log}` where user_id = '{$user_id}' group by type ";
        $result = $mysql->db_fetch_arrays($sql);
        $_result = "";
        foreach ($result as $key => $value) {
            $_result[$value['type']] = $value['num'];
        }
        $_result["jinzhi"] = $_result['collection'] * 0.9;
        $sql = "select * from `{account}` where user_id = '{$user_id}'  ";
        $result = $mysql->db_fetch_array($sql);
        if ($result != false) {
            foreach ($result as $key => $value) {
                $_result[$key] = $value;
            }
        }

        //借款额度
        $sql = "select borrow_amount from `{user_cache}` where user_id = {$user_id} ";
        $result = $mysql->db_fetch_array($sql);
        $_result['amount'] = $result['borrow_amount']; //借款总额
        //充值的统计
        $sql = "select type,sum(money) as num from `{account_recharge}` where user_id = '{$user_id}' and status=1 group by type ";
        $result = $mysql->db_fetch_arrays($sql);
        foreach ($result as $key => $value) {
            if ($value['type'] == 0) {
                $key = "recharge_shoudong";
            } elseif ($value['type'] == 1) {
                $key = "recharge_online";
            } else {
                $key = "recharge_downline";
            }
            $_result[$key] = $value['num'];
        }
        $sql = "select sum(money) as num from `{account_recharge}` where user_id = '{$user_id}' and status=1  ";
        $result = $mysql->db_fetch_array($sql);
        $_result['recharge_success'] = $result['num'];
        $_result['recharge'] = $result['num'];
        $sql = "select sum(money) as num from `{account_recharge}` where user_id = '{$user_id}' and status=0  ";
        $result = $mysql->db_fetch_array($sql);
        $_result['recharge_false'] = $result['num'];

        //提现的统计
        $sql = "select status,sum(total) as num,sum(credited) as cnum,sum(fee) as fnum from `{account_cash}` where user_id = '{$user_id}'  group by status ";
        $result = $mysql->db_fetch_arrays($sql);
        foreach ($result as $key => $value) {
            if ($value['status'] == 2) {
                $key = "cash_false";
            } elseif ($value['status'] == 1) {
                $key = "cash_success";
            } elseif ($value['status'] == 3) {
                $key = "cash_cancel";
            } else {
                $key = "cash_wait";
            }
            $_result[$key] = array("money" => $value['num'], "credited" => $value['cnum'], "fee" => $value['fnum']);
        }

        return $_result;
    }

    function ActionAccount($data = array()) {
        global $mysql;

        if (isset($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql = "select * from `{user}` where user_id=$user_id";
            $result1 = $mysql->db_fetch_array($sql);
            if ($result1 == false)
                return self::ERROR;
            unset($data['user_id']);
            $sql = "select * from {account} where user_id=$user_id";
            $result = $mysql->db_fetch_array($sql);
            if ($result == false) {
                $sql = "insert into `{account}` set `user_id` = '$user_id'";
                foreach ($data as $key => $value) {
                    $sql .= ",`$key` = '$value'";
                }
            } else {
                $sql = "update `{account}` set `user_id` = '$user_id'";
                foreach ($data as $key => $value) {
                    $sql .= ",`$key` = '$value'";
                }
                $sql .= " where user_id=$user_id";
            }
            return $mysql->db_query($sql);
        } else {
            return self::ERROR;
        }
    }

    /**
     * 查看银行信息
     *
     * @param Array $data
     * @return Array
     */
    public static function GetBankOne($data = array()) {
        global $mysql;
        $user_id = $data['user_id'];
        $sql = "select p1.username,p1.email,p1.realname,p1.paypassword,p2.*,p3.* from {user} as p1 
				  left join {account_bank} as p2 on p1.user_id=p2.user_id 
				  left join {account} as p3 on p3.user_id=p1.user_id
				  where p1.user_id=$user_id
				";
        return $mysql->db_fetch_array($sql);
    }

    public static function getBankInfo($user_id) {
        global $mysql;
        $sql = "SELECT * FROM {account_bank} WHERE `user_id`={$user_id}";
        $res = $mysql->db_fetch_arrays($sql);
        return $res;
    }

    public static function getUserBankInfo($user_id) {
        global $mysql;
        $sql = "SELECT bnk.*,usr.`paypassword`,acc.`use_money`
                FROM {account_bank} AS bnk
                LEFT JOIN {user} AS usr
                ON bnk.`user_id`=usr.`user_id`
                LEFT JOIN {account} as acc
                ON bnk.`user_id`=acc.`user_id`
                WHERE bnk.`user_id`={$user_id} AND bnk.`status`=1";
        $res = $mysql->db_fetch_arrays($sql);
        return $res;
    }

    public static function getOneBankInfo($user_id, $bank_id) {
        global $mysql;
        $sql = "SELECT * FROM {account_bank} WHERE `id`={$bank_id} AND `user_id`={$user_id}";
        $res = $mysql->db_fetch_array($sql);
        return $res;
    }

    /**
     * 确认该账户信息是否允许修改
     */
    public static function checkAllowChange($user_id,$bank_id) {
        global $mysql;
        $sql = "SELECT * FROM {account_bank} WHERE `user_id`={$user_id} AND `status`=1";
        $res = $mysql->db_fetch_arrays($sql);
        $num = count($res);
        if ($num < 2 && $res[0]['id'] == $bank_id) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 获取免费提现额度
     */
    public static function GetFreeCash($data = array()) {
        global $mysql;
        if (!$data['user_id'] || !$data['type']) {
            return false;
        }
        $user_id = $data['user_id'];
        $type = $data['type'];
        $sql = "SELECT SUM(money) as freeMoney from dw_account_log where type='" . $type . "'";
        $sql .=" and user_id='" . $user_id . "' and UNIX_TIMESTAMP()-addtime<60*60*24*15";
        $freeMoney = $mysql->db_fetch_array($sql);
        $freeMoney = !$freeMoney ? 0 : $freeMoney['freeMoney'];
        return $freeMoney;
    }

    /**
     * 添加或修改银行账号
     *
     * @param Array $data
     * @return Boolen
     */
    function ActionBank($data = array()) {
        global $mysql;
        $user_id = isset($data['user_id']) ? $data['user_id'] : "";
        if (empty($user_id))
            return self::ERROR;

        $sql = "select * from {account_bank} where user_id = $user_id";
        $result = $mysql->db_fetch_array($sql);
        if ($result == false) {
            $sql = "insert into `{account_bank}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
            foreach ($data as $key => $value) {
                $sql .= ",`$key` = '$value'";
            }
        } else {
            $sql = "update `{account_bank}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
            foreach ($data as $key => $value) {
                $sql .= ",`$key` = '$value'";
            }
            $sql .= " where user_id=$user_id";
        }
        return $mysql->db_query($sql);
    }

    public static function addBank($data = array()) {
        global $mysql;
        $user_id = isset($data['user_id']) ? $data['user_id'] : "";
        if (empty($user_id))
            return self::ERROR;

        $sql = "insert into `{account_bank}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }

        return $mysql->db_query($sql);
    }

    public static function updateBank($data = array(),$user_id,$id) {
        global $mysql;

        $sql = "update `{account_bank}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }
        $sql .= " where user_id=$user_id and id=$id";
        return $mysql->db_query($sql);
    }

    public static function deleteBank($user_id,$id) {
        global $mysql;
        $sql = "DELETE FROM {account_bank} WHERE `id`={$id} AND `user_id`={$user_id}";
        $result = $mysql->db_query($sql);
        return $result;
    }


    /**
     * 添加提现记录
     *
     * @param Array $data
     * @return Boolen
     */
    function AddCash($data = array()) {
        global $mysql;
        $user_id = isset($data['user_id']) ? $data['user_id'] : "";
        if (empty($user_id))
            return self::ERROR;

        $sql = "insert into `{account_cash}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }

        return $mysql->db_query($sql);
    }

    /**
     * 添加资金使用记录
     *
     * @param Array $data
     * @return Boolen
     */
    function AddLog($data = array()) {
        global $mysql;
        $user_id = isset($data['user_id']) ? $data['user_id'] : "";
        if (empty($user_id))
            return self::ERROR;
        $sql = "select * from `{user}` where user_id=$user_id";
        $result1 = $mysql->db_fetch_array($sql);
        if ($result1['user_id'] == "")
            return self::ERROR;
        $total = $data['total'];
        $type = $data['type'];
        $money = $data['money'];
        $sql = "insert into `{account_log}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }
        $result = $mysql->db_query($sql);
        $datenow = date("Y-m-d", time());
        $sql2 = "";
        if ($type == 'fund_add') {
            $sql2 = "fund=$money";
            $sql3 = "fund=fund+$money";
        }
        if ($type == 'recharge') {
        	$sql2 = "chongzhi=$money";
        	$sql3 = "chongzhi=chongzhi+$money";
        }
        if ($type == 'recharge_success') {
            $sql2 = "tixian=$money";
            $sql3 = "tixian=tixian+$money";
        }
        if ($type == 'tender_mange') {
            $sql2 = "lxmanage=$money";
            $sql3 = "lxmanage=lxmanage+$money";
        }
        if ($type == 'borrow_fee') {
            $sql2 = "borrowfee=$money";
            $sql3 = "borrowfee=borrowfee+$money";
        }
        if ($type == 'vip') {
            $sql2 = "vipfee=$money";
            $sql3 = "vipfee=vipfee+$money";
        }
        if ($type == 'realname') {
            $sql2 = "realname=$money";
            $sql3 = "realname=realname+$money";
        }


        if ($sql2 != "") {
            $sql = "select * from {everyday} where everydate='$datenow'";
            $result = $mysql->db_fetch_array($sql);
            if ($result == false) {
                $sql = "insert into `{everyday}` set `everydate` = '$datenow',$sql2";
            } else {
                $sql = "update `{everyday}` set $sql3";

                $sql .= " where everydate='$datenow'";
            }
            $mysql->db_query($sql);
        }

        $account['user_id'] = $user_id;
        $account['total'] = $total;
        if (isset($data['use_money'])) {
            $account['use_money'] = $data['use_money'];
            if ($data['use_money'] < -200) {
                return 0;
            }
        }
        if (isset($data['no_use_money'])) {
            $account['no_use_money'] = $data['no_use_money'];
            if ($data['no_use_money'] < -10) {
                return 0;
            }
        }
        if (isset($data['collection'])) {
            $account['collection'] = $data['collection'];
            if ($data['collection'] < -10) {
                return 0;
            }
        }
        if(isset($data['xutou'])){
			$account['xutou'] = $data['xutou'];
                            if(  $data['xutou']<0)
                        {
                            return 0;
                        }
		}
		if(isset($data['fund'])){
			
			self::Addfundlog($data);
			$account['fund'] = $data['fund'];
			if(  $data['fund']<0)
			{
				return 0;
			}
		}
        $result = self::ActionAccount($account);
        return;
    }

    //添加余额宝操作记录
    function Addfundlog($param) {
    	global $mysql;
    	
    	$sql="insert into {fund_log} set `addtime`=".time().",`addip`='".ip_address()."',fund={$param["fund"]},user_id={$param["user_id"]}";
   
    	return $mysql->db_query($sql);
    }
    
    function GetfundList($param){
    	global $mysql;
    	$sql="select * from {fund_income} where user_id={$param["user_id"]} order by id desc limit 10";
    	return $mysql->db_fetch_arrays($sql);
    }
    
   //合并收益
    function consolidatedincome($param) {
    	global $mysql;
    	$sql="SELECT fund,addtime FROM {fund_log} where user_id={$param['user_id']} and addtime in (select max(addtime) from {fund_log} where user_id={$param['user_id']})";
    	$res=$mysql->db_fetch_array($sql);
    	if($res){
    		$cday=ROUND(((time()-$res["addtime"])/3600/24),0);
    		
    		//计算时间相差是否达到1天
    		if($cday>=1){
    			$account_result =  self::GetOne(array("user_id"=>$param['user_id']));
    			$log['user_id'] = $param['user_id'];
    			$log['type'] = "fund_consolidatedincome";
    			//计算出的收益
    			$log['money'] = $res["fund"]*$param["con_Interest"]*$cday;
    		
    			$log['total'] = $account_result['total'];
    			$log['use_money'] =  $account_result['use_money'];
    			$log['no_use_money'] =  $account_result['no_use_money'];
    			$log['collection'] =  $account_result['collection'];
    			$log['fund'] =  $account_result['fund']+$log['money'];
    			$log['to_user'] = "0";
    			$log['remark'] = "余额宝收益";
    			//
    			$sql1="insert into {fund_income} set income={$log['money']},user_id={$param['user_id']},fromtime={$res["addtime"]},addtime=".time();
    			$mysql->db_query($sql1);
    			return self::AddLog($log);
    		}
    	}
    	
    }//*/
    /**
     * 修改
     *
     * @param Array $data
     * @return Boolen
     */
    function Update($data = array()) {
  
        global $mysql;
        $user_id = $data['user_id'];
        if ($data['user_id'] == "")
            return self::ERROR;

        $_sql = "";
        $sql = "update `{account}` set ";
        foreach ($data as $key => $value) {
            $_sql[] .= "`$key` = '$value'";
        }
        $sql .= join(",", $_sql) . " where user_id = '$user_id'";
        
   
        return $mysql->db_query($sql);
    }
	  /*
   * 实时财务 by Yuejun.Chen 2013.10.25
   */
  function finance($data = array()) {
        global $mysql;
        $sql = "SELECT sum(A.money) as summoney,A.type,B.`name` from {account_log} A LEFT JOIN {linkage} B on A.type=B.`value` GROUP BY type ";
        $list = $mysql->db_fetch_arrays($sql);
        foreach ($list as $item) {
            $_result[$item['type']] = $item['summoney'];
        }
        $nowtime = strtotime(date('Y-m-d 0:0:0',time()));
        $sqladd = "SELECT sum(A.money) as summoney,A.type,A.addtime from {account_log} A LEFT JOIN {linkage} B on A.type=B.`value` where A.addtime>$nowtime GROUP BY type ";
        $listadd = $mysql->db_fetch_arrays($sqladd);
        foreach ($listadd as $itemadd) {
            $_resultadd[$itemadd['type']] = $itemadd['summoney'];
        }
		$sqltenderm = "SELECT sum(A.repay_yesaccount) as sumtendermoney from {borrow_collection} A ";
        $listtenderm = $mysql->db_fetch_arrays($sqltenderm);
        $_result['dianfu'] = isset($_G['system']['con_dianfu']) ? $_G['system']['con_dianfu'] : 0;
        $_result['system_repayment'] = isset($_result['system_repayment']) ? $_result['system_repayment'] : 0;         //未收回垫付金额
        $_result['dianfu'] = round($_result['dianfu'] - $_result['system_repayment']);                                  //系统准备垫付金额
        $_result['daishouint'] = round($_result['collection'] - $_result['repayment']);//待收整数
        $_result['daishou'] = $_result['collection'] - $_result['repayment'];//待收
        $_result['cishan'] = $_result['tender_mange'] * 0.5;                                                           //慈善基金
        //$_result['borrow_success'] 成功放款金额，foreach中存入
		$_result['borrow_successint']=round($_result['borrow_success']);
        $_result['borrow_successnow'] = $_resultadd['borrow_success'];
		$_result['borrow_successnowint'] = round($_result['borrow_successnow']);
		$_result['sumrepayyes'] = $listtenderm['sumtendermoney'];

        $result['list'] = $_result;
        return $result;
    }
    
    function GetSumLog($data = array()) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];



        $sql = "SELECT sum(A.money) as summoney,A.type,B.`name` from {account_log} A LEFT JOIN {linkage} B on 

A.type=B.`value` GROUP BY type ";

        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays($sql);

            return $list;
        }
        $row = $mysql->db_fetch_array($sql);

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays($sql);
        $list = $list ? $list : array();


        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    	function GetSumLog_cw($data = array())
  {
	  global $mysql;
	$data['limit']='all';
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
	
		
		$sql = "SELECT sum(A.money) as summoney,A.type,B.`name` from {account_log} A LEFT JOIN {linkage} B on 

A.type=B.`value` GROUP BY type ";
		 
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list =  $mysql->db_fetch_arrays($sql);
			
			return $list;
		}
		$row = $mysql->db_fetch_array($sql);
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays($sql);		
		$list = $list?$list:array();
		
		
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		
	  
  }
  
    function GetEveryDay($data = array()) {
        global $mysql;

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];



        $sql = "select * from {everyday}";

        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays($sql);

            return $list;
        }
        $row = $mysql->db_fetch_array($sql);

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays($sql);
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
     * 资金平衡
     */
    function getFundy() {
        global $mysql;
        $sql = "select sum(use_money) as k_money,sum(no_use_money) as n_money from {account}";
        $sql2 = "select user_id,type,money from {account_log} where type in('recharge','recharge_success','vip','borrow_fee','tender_mange','realname','df_repayment','late_repayment','system_repayment','late_rate','late_collection')";
        $model_acc = $mysql->db_fetch_array($sql);
        $model_log = $mysql->db_fetch_arrays($sql2);
        $recharge = 0;
        $cash_frost = 0;
        $vip = 0;
        $borrow_fee = 0;
        $tender_mange = 0;
        $real_fee = 0;
        $df_repayment = 0;
        $late_repayment = 0;
        $system_repayment = 0;
        $late_rate = 0;
        $late_collection = 0;
        foreach ($model_log as $v) {
            if ($v['type'] == "recharge") {
                $recharge = $recharge + $v['money'];
            } elseif ($v['type'] == "recharge_success") {
                $cash_frost = $cash_frost + $v['money'];
            } elseif ($v['type'] == "vip") {
                $vip = $vip + $v['money'];
            } elseif ($v['type'] == "borrow_fee") {
                $borrow_fee = $borrow_fee + $v['money'];
            } elseif ($v['type'] == "realname") {
                $real_fee = $real_fee + $v['money'];
            } elseif ($v['type'] == "df_repayment") {
                $df_repayment = $df_repayment + $v['money'];
            } elseif ($v['type'] == "late_repayment") {
                $late_repayment = $late_repayment + $v['money'];
            } elseif ($v['type'] == "system_repayment") {
                $system_repayment = $system_repayment + $v['money'];
            } elseif ($v['type'] == "late_rate") {
                $late_rate = $late_rate + $v['money'];
            } elseif ($v['type'] == "late_collection") {
                $late_collection = $late_collection + $v['money'];
            } else {
                $tender_mange = $tender_mange + $v['money'];
            }
        }
        $ret = array(array(
                'k_money' => $model_acc['k_money'],
                'n_money' => $model_acc['n_money'],
                'recharge' => $recharge,
                'recharge_success' => $cash_frost,
                'vip' => $vip,
                'borrow_fee' => $borrow_fee,
                'tender_mange' => $tender_mange,
                'real_fee' => $real_fee,
                'df_repayment' => $df_repayment,
                'late_repayment' => $late_repayment,
                'system_repayment' => $system_repayment,
                'late_rate' => $late_rate,
                'late_collection' => $late_collection
        ));
        return $ret;
    }

    /**
     * 提现记录
     *
     * @return Array
     */
    function GetCashList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $start_ts = !isset($data['start_ts']) ? "" : $data['start_ts'];
        $end_ts = !isset($data['end_ts']) ? "" : $data['end_ts'];

        $_sql = "where 1=1 ";
        if (!empty($user_id)) {
            $_sql .= " and p2.user_id = $user_id";
        }
        if (!empty($username)) {
            $_sql .= " and p2.username = '$username'";
        }

        if (isset($data['status']) && $data['status'] != "") {
            $_sql .= " and p1.status = '{$data['status']}' ";
        }
        if ($start_ts != '') {
            $_sql .= " and p1.addtime >= '$start_ts'";
        }
        if ($end_ts != '') {
            $_sql .= " and p1.addtime <= '$end_ts'";
        }

        $sql = "select SELECT from {account_cash} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				 left join {linkage} as p3 on p1.bank=p3.id
				$_sql ORDER LIMIT";
        $_select = "p1.*,p2.username,p2.realname,p3.name as bank_name";
        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $_limit), $sql));

            return $list;
        }
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.username,p2.realname,p3.name as bank_name', 'order by p1.id desc', $limit), $sql));
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
     * 查看
     *
     * @param Array $data
     * @return Array
     */
    public static function GetCashOne($data = array()) {
        global $mysql;
        $id = $data['id'];
        $user_id = $data['user_id'];
        if (empty($id) && empty($user_id))
            return self::ERROR;

        $_sql = "where 1=1 ";
        if (!empty($id)) {
            $_sql .= " and p1.id = '$id'";
        }
        if (!empty($user_id)) {
            $_sql .= " and p1.user_id = '$user_id'";
        }

        $sql = "select p1.* ,p2.username,p2.email,p3.name as bank_name,p4.username as verify_username from {account_cash} as p1 
				  left join {user} as p2 on p1.user_id=p2.user_id
				  left join {linkage} as p3 on p1.bank=p3.id
				  left join {user} as p4 on p1.verify_userid=p4.user_id
				  {$_sql}
				";
        return $mysql->db_fetch_array($sql);
    }

    /**
     * 审核提现记录
     *
     * @param Array $data
     * @return Boolen
     */
    function UpdateCash($data = array()) {
        global $mysql;
        $id = $data['id'];
        if (empty($id))
            return self::ERROR;
        $sql = "select * from {account_cash} where id='$id'";
        $result = $mysql->db_fetch_array($sql);
        $user_id = $data['user_id'];
        $_sql = "";
        $sql = "update `{account_cash}` set ";
        foreach ($data as $key => $value) {
            $_sql[] .= "`$key` = '$value'";
        }
        $sql .= join(",", $_sql) . " where id = '$id' and user_id='$user_id'";
        if ($result['status'] != $data['status']) {
            return $mysql->db_query($sql);
        } else {
            return "状态有误，请核实后在操作。";
        }
    }

    /**
     * 充值记录
     *
     * @return Array
     */
    function GetRechargeList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];
        $status = !isset($data['status']) ? "" : $data['status'];
        $ordernum = !isset($data['trade_no']) ? "" : $data['trade_no'];
        $start_ts = !isset($data['start_ts']) ? "" : $data['start_ts'];
        $end_ts = !isset($data['end_ts']) ? "" : $data['end_ts'];
        $money=!isset($data['money']) ? "" : $data['money'];
        $bank=!isset($data['bank']) ? "" : $data['bank'];
        
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";
        if (!empty($user_id)) {
            $_sql .= " and p2.user_id = $user_id";
        }
        if (!empty($username)) {
            $_sql .= " and p2.username = '$username'";
        }
        if ($status != '') {
            $_sql .= " and p1.status = '$status'";
        }
        if ($ordernum != '') {
            $_sql .= " and p1.trade_no = '$ordernum'";
        }
        if ($start_ts != '') {
            $_sql .= " and p1.verify_time >= '$start_ts'";
        }
        if ($end_ts != '') {
            $_sql .= " and p1.verify_time <= '$end_ts'";
        }
        if($money!=''){
            $_sql.=" and p1.money={$money} ";
        }
        if($bank!=''){
             $_sql.=" and p3.name='{$bank}' ";
        }

        $sql = "select SELECT from {account_recharge} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				 left join {payment} as p3 on p1.payment=p3.id
				$_sql ORDER LIMIT";
        $_select = "p1.*,p1.money,p1.money-p1.fee as total,p2.username,p3.name as payment_name";

        //是否显示全部的信息
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


        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    public static function getOffrecharge($data, $only_tender = false) {
        global $mysql;
//        var_dump($data);die;
        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];
         $start_ts = !isset($data['start_ts']) ? "" : $data['start_ts'];
        $end_ts = !isset($data['end_ts']) ? "" : $data['end_ts'];
        if ($only_tender == false) {
            $_sql = "where 1 AND p1.`type`=2 AND p1.`status`=1 ";
        } else {
            $_sql = "where 1 AND p1.`type`=2 AND p1.`status`=1 AND p2.scene_status=1";
        }
        if ($start_ts != '') {
            $_sql .= " and p1.addtime >= '$start_ts'";
        }
        if ($end_ts != '') {
            $_sql .= " and p1.addtime <= '$end_ts'";
        }
         $sql = "select SELECT from {account_recharge} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				$_sql ORDER LIMIT";
        $_select = " p2.`username`,p2.`realname`,p1.`addtime`,p1.`money`,p1.`type`,0 AS fee,p1.verify_time ";
        //是否显示全部的信息
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
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
        
    }

    function GetvipTC($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];
        //$status = !isset($data['status'])?"":$data['status'];
        $ordernum = !isset($data['trade_no']) ? "" : $data['trade_no'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 and p2.invite_userid>0 ";
        if (!empty($user_id)) {
            $_sql .= " and p2.user_id = $user_id";
        }
        if (!empty($username)) {
            $_sql .= " and p2.username = '$username'";
        }
        if ($status != '') {
            $_sql .= " and p1.status = '$status'";
        }
        if ($ordernum != '') {
            $_sql .= " and p1.trade_no = '$ordernum'";
        }

        $sql = "select SELECT from  {user} as p2  
				$_sql ORDER LIMIT";
        $_select = "p2.*";


        $sql2 = "select p2.*  ,(select username from {user}   where user_id=p2.invite_userid)  as inviteusername,(select vip_status  from {user_cache}   where user_id=p2.invite_userid)  as vip_status   from {user}   as p2 where  p2.invite_userid>0";

        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $result = $mysql->db_fetch_arrays($sql2);
            return $result;
        }

        $row = $mysql->db_fetch_array("select count(*) as num  from {user}  where  invite_userid>0");

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays($sql2);
        $list = $list ? $list : array();


        return array(
            'vipTC_list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
    }

    /**
     * 查看
     *
     * @param Array $data
     * @return Array
     */
    public static function GetRechargeOne($data = array()) {
        global $mysql;
        $_sql = "where 1=1 ";
        if (isset($data['id']) && $data['id'] != "") {
            $_sql .= " and p1.id = {$data['id']}";
        }
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p2.user_id = {$data['user_id']}";
        }
        if (isset($data['trade_no']) && $data['trade_no'] != "") {
            $_sql .= " and p1.trade_no = {$data['trade_no']}";
        }

        $sql = "select p1.*,p1.money-p1.fee as total,p2.username,p2.email,p3.name as payment_name,p4.username as verify_username,p5.total as user_total,p5.use_money as user_use_money,p5.no_use_money as  user_no_user_money from {account_recharge} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				 left join {payment} as p3 on p1.payment=p3.nid
				 left join {user} as p4 on p1.verify_userid=p4.user_id
				 left join {account} as p5 on p1.user_id=p5.user_id
				$_sql";
        return $mysql->db_fetch_array($sql);
    }

    /**
     * 添加充值记录
     *
     * @param Array $data
     * @return Boolen
     */
    function AddRecharge($data = array()) {
        global $mysql;
        $user_id = isset($data['user_id']) ? $data['user_id'] : "";
        if (empty($user_id))
            return self::ERROR;

        $sql = "insert into `{account_recharge}` set `addtime` = '" . time() . "',`addip` = '" . ip_address() . "'";
        foreach ($data as $key => $value) {
            $sql .= ",`$key` = '$value'";
        }
        $result = $mysql->db_query($sql);


        return $result;
    }

    /**
     * 充值审核
     *
     * @param Array $data
     * @return Boolen
     */
    function UpdateRecharge($data = array()) {
        global $mysql;
        $id = $data['id'];
        if (empty($id))
            return self::ERROR;
        $lock = "LOCK TABLES `{account_recharge}` WRITE";
        $mysql->db_query($lock);
        $sql = "select * from `{account_recharge}` where id = '$id'";
        $result = $mysql->db_fetch_array($sql);
        if ($result['status'] == 0) {
            $_sql = "";
            $sql = "update `{account_recharge}` set ";
            foreach ($data as $key => $value) {
                $_sql[] .= "`$key` = '$value'";
            }

            $sql .= join(",", $_sql) . " where status=0 and id = '$id'";
            $mysql->db_query($sql);

            $row =  mysql_affected_rows();
        } else {
            $row = 0;
        }
        $lock = "UNLOCK TABLES";
        $mysql->db_query($lock);
        return $row;
    }

    /**
     * 资金使用记录
     *
     * @return Array
     */
    function GetLogList($data = array()) {
        global $mysql;
        $user_id = empty($data['user_id']) ? "" : $data['user_id'];
        $username = empty($data['username']) ? "" : $data['username'];

        $start_ts = !isset($data['start_ts']) ? "" : $data['start_ts'];
        $end_ts = !isset($data['end_ts']) ? "" : $data['end_ts'];

        $page = empty($data['page']) ? 1 : $data['page'];
        $epage = empty($data['epage']) ? 10 : $data['epage'];

        $_sql = "where 1=1 ";
        if (!empty($user_id)) {
            $_sql .= " and p2.user_id = $user_id";
        }
        if (!empty($username)) {
            $_sql .= " and p2.username = '$username'";
        }

        if (isset($data['dotime1']) && $data['dotime1'] != "") {
            $_sql .= " and p1.addtime >= '" . strtotime($data['dotime1']) . "'";
        }
        if (isset($data['dotime2']) && $data['dotime2'] != "") {
            $time2 = strtotime($data['dotime2']) + 3600 * 24;
            $_sql .= " and p1.addtime <= '" . $time2 . "'";
        }
        if (isset($data['type']) && $data['type'] != "") {
            if ($data['type'] == 'excel') {
                //$_sql .= " and p1.type = '".$data['type']."'";
            } else {
                $_sql .= " and p1.type = '" . $data['type'] . "'";
            }
        }

        if ($start_ts != '') {
            $_sql .= " and p1.addtime >= '$start_ts'";
        }
        if ($end_ts != '') {
            $_sql .= " and p1.addtime <= '$end_ts'";
        }

        $_select = "p1.*,p2.username,p3.username as to_username";
        $sql = "select SELECT from {account_log} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				 left join {user} as p3 on p3.user_id=p1.to_user 
				$_sql ORDER LIMIT";

        //是否显示全部的信息
        if (isset($data['limit'])) {
            $_limit = "";
            if ($data['limit'] != "all") {
                $_limit = "  limit " . $data['limit'];
            }
            $result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.addtime desc', $_limit), $sql));
            return $result;
        }
        // $result= $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  'order by p1.addtime desc', $_limit), $sql));
        //return $result;
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

        $total = $row['num'];
        $total_page = ceil($total / $epage);
        $index = $epage * ($page - 1);
        $limit = " limit {$index}, {$epage}";

        $list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.addtime desc,id desc', $limit), $sql));
        $list = $list ? $list : array();
        $row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('sum(money) as num', '', ''), $sql));
        return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'account' => $row['num'],
            'total_page' => $total_page
        );
    }

    /**
     * 资金统计
     *
     * @return Array
     */
    function GetLogCount($data = array()) {
        global $mysql;
        $_sql = "where 1=1 ";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p1.user_id={$data['user_id']}";
        }

        $_select = "p1.*";
        $sql = "select SELECT from {account_log} as p1 $_sql ORDER LIMIT";
        $first_time = (isset($data['dotime2']) && $data['dotime2'] != "") ? $data['dotime2'] : date("Y-m-d", time());
        $_first_time = strtotime($first_time);
        if (isset($data['dotime1']) && $data['dotime1'] != "") {
            $end_time = strtotime($data['dotime1']);
        } else {
            $end_time = $_first_time - 7 * 60 * 60 * 24;
        }
        $result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, '', ''), $sql));

        $_result = "";
        $i = round(($_first_time - $end_time) / (60 * 60 * 24));
        if ($i > 60)
            $i = 60;
        for ($j = 0; $j <= $i; $j++) {
            $day_ftime = $_first_time - 60 * 60 * 24 * $j;
            $date = date("Y-m-d", $day_ftime);
            $_result[$date]['i'] = $j;
            foreach ($result as $key => $value) {
                if ($value['addtime'] >= $day_ftime && $value['addtime'] <= $day_ftime + 60 * 60 * 24) {
                    $_result[$date][$value['type']] += $value['money'];
                }
            }
        }
        return $_result;
    }

    /**
     * 获取用户资金的全部记录,
     *
     * @return Array
     */
    function GetAccountAll($data = array()) {
        global $mysql;
        $user_id = $data['user_id'];

        //资金账号情况
        $sql = "select * from `{account}` where user_id = {$user_id} ";
        $result = $mysql->db_fetch_array($sql);
        //资金账号情况
        $sql = "select borrow_amount from `{user_cache}` where user_id = {$user_id} ";
        $_result = $mysql->db_fetch_array($sql);
        $result['amount'] = $_result['borrow_amount']; //借款总额
        //待还总额
        $sql = "select sum(repayment_account) as borrow_num ,sum(repayment_yesaccount) as borrow_yesnum from {borrow_repayment} where borrow_id in (select id from `{borrow}` where user_id = {$user_id}) ";
        $_result = $mysql->db_fetch_array($sql);
        $result['wait_payment'] = round($_result['borrow_num'] - $_result['borrow_yesnum']); //待还总额
        $result['borrow_num'] = round($_result['borrow_num']); //借款总额
        $result['borrow_yesnum'] = round($_result['borrow_yesnum']); //已还总额
        $result['use_amount'] = round($result['amount'] - $result['wait_payment']);

        //待收总金额,待收利息
        $sql = "select sum(account) as account_num,sum(interest) as interest_num,sum(repayment_account) as repayment_account_num,sum(repayment_yesaccount) as repayment_yesaccount_num,sum(wait_account) as wait_account_num,sum(wait_interest) as wait_interest_num,sum(repayment_yesinterest) as repayment_yesinterest_num from {borrow_tender} where  borrow_id in (select id from `{borrow}` where status=3 or (status=1 and is_liuzhuan=1) ) and user_id=$user_id";
        //echo $sql;
        $_result = $mysql->db_fetch_array($sql);
        $result['tender_num'] = round($_result['account_num']); //投资总额
        $result['tender_numall'] = round($_result['repayment_account_num']); //投资总额+利息
        $result['tender_yesnum'] = round($_result['repayment_yesaccount_num']); //已收总额
        $result['tender_wait'] = round($_result['wait_account_num']); //待收总额
        $result['tender_wait_interest'] = round($_result['wait_interest_num']); //待收利息
        $result['tender_interest'] = round($_result['repayment_account_num'] - $_result['account_num']); //净赚利息


        return $result;
    }

    //获取资金记录的列表，按类型和时间分类
    function GetLogGroup($data = array()) {
        global $mysql;
        $_sql = "";
        if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and p1.user_id={$data['user_id']}";
        }
        $sql = "select sum(p1.money) as num,p1.type,p2.name from `{account_log}` as p1 left join `{linkage}` as p2 on p2.value=p1.type where p2.type_id=30 {$_sql} and p1.type in ('borrow_success','borrow_fee','margin','award_lower','fee') group by type order by p1.type desc";
        $result = $mysql->db_fetch_arrays($sql);
        return $result;
    }

    //在线充值返回数据处理
    function OnlineReturn($data = array()) {
        global $mysql;
        $trade_no = $data['trade_no'];

        $rechage_result = self::GetRechargeOne(array("trade_no" => $trade_no));
        if ($rechage_result['status'] == 0) {

            $user_id = str_replace($rechage_result['addtime'], "", $trade_no);
            $user_id = substr($user_id, 0, strlen($user_id) - 1);



            $rec['id'] = $rechage_result['id'];
            $rec['return'] = serialize($_REQUEST);
            $rec['status'] = 1;
            $rec['verify_userid'] = 0;
            $rec['verify_time'] = time();
            $rec['verify_remark'] = "成功充值";

            $affectid = self::UpdateRecharge($rec);
            if ($affectid > 0) {



                $account_result = self::GetOne(array("user_id" => $user_id));
                $log['user_id'] = $user_id;
                $log['type'] = "recharge";
                $log['money'] = $rechage_result['money'];

                $log['total'] = $account_result['total'] + $rechage_result['money'];
                $log['use_money'] = $account_result['use_money'] + $rechage_result['money'];
                $log['no_use_money'] = $account_result['no_use_money'];
                $log['collection'] = $account_result['collection'];
                $log['to_user'] = 0;
                $log['remark'] = "在线充值";
                accountClass::AddLog($log);


                $account_result = self::GetOne(array("user_id" => $user_id));
                $log['user_id'] = $user_id;
                $log['type'] = "fee";

                $log['money'] = 0;
                $log['total'] = $account_result['total'] - $log['money'];
                $log['use_money'] = $account_result['use_money'] - $log['money'];
                $log['no_use_money'] = $account_result['no_use_money'];
                $log['collection'] = $account_result['collection'];
                $log['to_user'] = 0;
                $log['remark'] = "在线充值手续费";
                accountClass::AddLog($log);

                accountClass::AccountVip(array("user_id" => $user_id));
            }
        }
        return true;
    }

    //VIP费用的扣除
    function AccountVip($data = array()) {
        global $mysql, $_G;
        $user_id = $data['user_id'];
        $sql = "select p1.vip_money,p1.vip_status,p2.* from `{user_cache}` as p1 left join `{account}` as p2 on p1.user_id=p2.user_id where p1.user_id = {$user_id}";
        $result = $mysql->db_fetch_array($sql);
        $vip_money = (!isset($_G['system']['con_vip_money']) || $_G['system']['con_vip_money'] == "") ? 150 : $_G['system']['con_vip_money'];
        //判断vip的钱为0并且有钱了再扣
        if ($result['vip_money'] == "" && $result['use_money'] >= $vip_money && $result['vip_status'] == 1) {
            //扣除vip的会员费。
            $account_result = self::GetOne(array("user_id" => $user_id));
            $vip_log['user_id'] = $user_id;
            $vip_log['type'] = "vip";
            $vip_log['money'] = 0;
            $vip_log['total'] = $account_result['total'] - $vip_log['money'];
            $vip_log['use_money'] = $account_result['use_money'] - $vip_log['money'];
            $vip_log['no_use_money'] = $account_result['no_use_money'];
            $vip_log['collection'] = $account_result['collection'];
            $vip_log['to_user'] = "0";
            $vip_log['remark'] = "扣除VIP会员费";
            self::AddLog($vip_log);
            $sql = "update `{user_cache}` set vip_money=$vip_money where user_id='{$user_id}'";
            $mysql->db_query($sql);

            $sql = "select p1.invite_userid,p1.invite_money,p2.username  from `{user}` as p1 left join `{user}` as p2 on p1.invite_userid = p2.user_id where p1.user_id = '{$user_id}' ";
            $result = $mysql->db_fetch_array($sql);
            if ($result['invite_userid'] != "" && $result['invite_money'] != "" && $result['invite_money'] <= 0) {
                //给介绍人提成
                $vip_ticheng = (!isset($_G['system']['con_vip_ticheng']) || $_G['system']['con_vip_ticheng'] == "") ? 0 : $_G['system']['con_vip_ticheng'];
                $account_result = accountClass::GetOne(array("user_id" => $result['invite_userid']));
                $ticheng_log['user_id'] = $result['invite_userid'];
                $ticheng_log['type'] = "ticheng";
                $ticheng_log['money'] = 0;
                $ticheng_log['total'] = $account_result['total'] + $ticheng_log['money'];
                $ticheng_log['use_money'] = $account_result['use_money'] + $ticheng_log['money'];
                $ticheng_log['no_use_money'] = $account_result['no_use_money'];
                $ticheng_log['collection'] = $account_result['collection'];
                $ticheng_log['to_user'] = "0";
                $ticheng_log['remark'] = "邀请用户注册(<a href=\'/u/{$result['invite_userid']}\' target=_blank>{$result['username']}</a>)成为VIP的提成";
                accountClass::AddLog($ticheng_log);
                $sql = "update `{user}` set invite_money=$vip_ticheng where user_id='{$user_id}'";
                $mysql->db_query($sql);
            }
        }
    }

    //资金扣除，比如现场认证费用 type,money,remark
    function Deduct($data) {
        global $mysql, $_G;
        $account_result = self::GetOne(array("user_id" => $data['user_id']));
        //if($account_result['use_money'] < $data['money']){
        //return "此客户可用余额不足，可用余额为{$account_result['use_money']}";
        //}
        if ($data['money'] < 0) {
            return "操作金额不能为负数";
        }
        $log['user_id'] = $data['user_id'];
        $log['type'] = $data['type'];
        $log['money'] = $data['money'];
        $log['total'] = $account_result['total'] - $data['money'];
        $log['use_money'] = $account_result['use_money'] - $data['money'];
        $log['no_use_money'] = $account_result['no_use_money'];
        $log['collection'] = $account_result['collection'];
        $log['to_user'] = 0;
        $log['remark'] = $data['remark'];
        accountClass::AddLog($log);

        require_once("modules/message/message.class.php");
        $message['sent_user'] = "0";
        $message['receive_user'] = $data['user_id'];
        $message['name'] = $data['remark'];
        $message['content'] = $data['remark'];
        $message['type'] = "system";
        $message['status'] = 0;
        messageClass::Add($message); //发送短消息
        return true;
    }

    function AccountTongji($data = array()) {
        global $mysql, $_G;
        $sql = "select sum(total) as atotal,sum(use_money) as ause_money,sum(no_use_money) as ano_use_money from {account}";
        $result = $mysql->db_fetch_array($sql);
        return $result;
    }

    function Tongji($data = array()) {
        global $mysql, $_G;
        $_first_month = strtotime("2010-08-01");
        $_now_year = date("Y", time());
        $_now_month = date("n", time());
        $month = ($_now_year - 2011) * 12 + 5 + $_now_month; //现在的月数
        //成功借款
        for ($i = 1; $i <= $month; $i++) {
            $up_month = strtotime("$i month", $_first_month);
            $now_month = strtotime("-1 month", $up_month);
            $nowlast_day = strtotime("-1 day", $up_month);
            $sql = "select sum(p1.money) as num,p1.type,p2.name as type_name from `{account_log}` as p1 left join `{linkage}` as p2 on p1.type=p2.value where p2.type_id=30 and p1.addtime >= {$now_month} and p1.addtime < {$nowlast_day} group by  p1.type ";
            $result = $mysql->db_fetch_arrays($sql);

            if (count($result) > 0) {
                $_result[date("Y-n", $now_month)] = $result;
            }
        }
        return $_result;
    }

    function TongjiAll($data = array()) {
        global $mysql, $_G;
        $_first_month = strtotime("2010-08-01");
        $_now_year = date("Y", time());
        $_now_month = date("n", time());
        $month = ($_now_year - 2011) * 12 + 5 + $_now_month; //现在的月数
        //成功借款
        for ($i = 1; $i <= $month; $i++) {
            $up_month = strtotime("$i month", $_first_month);
            $now_month = strtotime("-1 month", $up_month);
            $nowlast_day = strtotime("-1 day", $up_month);
            $sql = "select sum(p1.money) as num,p1.type,p2.name as type_name from `{account_log}` as p1 left join `{linkage}` as p2 on p1.type=p2.value where p2.type_id=30 and p1.addtime >= {$now_month} and p1.addtime < {$nowlast_day} group by  p1.type ";
            $result = $mysql->db_fetch_arrays($sql);

            if (count($result) > 0) {
                $ins = array("vip会员费", "视频认证费用", "现场认证费用", "利息管理费用", "实名认证费用", "充值手续费", "借款手续费", "提现手续费");
                foreach ($result as $key => $v) {
                    if (in_array($v['type_name'], $ins))
                        $_result[$v['type_name']] = $v['num'] + $_result[$v['type_name']];
                }
            }
        }
        return $_result;
    }

}

?>