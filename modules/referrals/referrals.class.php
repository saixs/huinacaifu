<?php
/**
 * @author Tissot.Cai(Email:Tissot.Cai@gmail.com)
 * @copyright Tissot.Cai
 * @version 1.0
 */

/**
 * Description of credit
 *
 * @author TissotCai
 */
class referralsClass {

	const ERROR = '操作有误，请不要乱操作';
	const UPDATE_TYPE_CODE_ERROR = '积分类型代码错误';
	const CREDIT_TYPE_ID_NO_EMPTY = '类型ID不能为空';
	
	
	/**
	 * 列表
	 *
	 * @return Array
	*/
	public static function GetFriendsInvite($data = array()){
		global $mysql;
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		$_sql = " where 1=1 ";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .=" and invite_userid = '{$data['user_id']}'";
		}
		if (isset($data['status']) && $data['status']!=""){
			$_sql .=" and status = '{$data['status']}'";
		}
		$_sql .="and A.invite_userid in (select user_id from `{user}`)";
		$_order = "";
		$_select = " A.username,A.realname,A.invite_money,A.addtime,A.invite_userid,B.username AS username2";
		$sql = "select SELECT from `{user}` A LEFT JOIN `{user}` B on A.invite_userid=B.user_id {$_sql}";
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			//return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
		}			 
			//$sql1=str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql);
			//echo $sql1;	 
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		//$sql1=str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql);
			//echo $sql1;
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql));		
		$list = $list?$list:array();
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		//$result = $mysql -> db_fetch_arrays($sql);
		//return $result;
	}
	
}
?>
