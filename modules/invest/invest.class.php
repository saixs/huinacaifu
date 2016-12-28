<?
/******************************
 * $File: invest.class.php
 * $Description: 数据库处理文件
 * $Author: dongdong 
 * $Time:2009-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/
class investClass{
	
	const ERROR = '操作有误，请不要乱操作';

	/**
	 * 列表
	 *
	 * @return Array
	 */
	function GetList($data = array()){
		global $mysql;
		$user_id = empty($data['user_id'])?"":$data['user_id'];
		$username = empty($data['username'])?"":$data['username'];
	
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1 ";		 
		if (!empty($user_id)){
			$_sql .= " and p2.user_id = $user_id";
		}
		if (!empty($username)){
			$_sql .= " and p2.username = '$username'";
		}
		
		$sql = "select SELECT from {invest} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				$_sql ORDER LIMIT";
				 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.username ', 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		
		
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
	public static function GetOne($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		$user_id = $data['user_id'];
		if (!empty($user_id)){
			$_sql .= " and p1.user_id=$user_id"; 
		}
		
		$id = $data['id'];
		if (!empty($id)){
			$_sql .= " and p1.id=$id"; 
		}
		
		$sql = "select p1.* ,p2.* from {invest} as p1 
				  left join {user} as p2 on p1.user_id=p2.user_id $_sql	";
		return $mysql->db_fetch_array($sql);
	}
	
	/**
	 * 添加
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Add($data = array()){
		global $mysql;
       
		$sql = "insert into `{invest}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        return $mysql->db_query($sql);
	}
	
	
	/**
	 * 修改
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Update($data = array()){
		global $mysql;
		$user_id = $data['user_id'];
        if ($data['user_id'] == "") {
            return self::ERROR;
        }
		
		$_sql = "";
		$sql = "update `{invest}` set ";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where user_id = '$user_id'";
        return $mysql->db_query($sql);
	}
	
	
	
	/**
	 * 删除
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function Delete($data = array()){
		global $mysql;
		$id = $data['id'];
		if (!is_array($id)){
			$id = array($id);
		}
		$sql = "delete from {invest}  where id in (".join(",",$id).")";
		return $mysql->db_query($sql);
	}

        
            //首页统计
    public static function GetArrrayTj($term = '', $termname = '', $termname2 = '', $id = '') {
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

    public static function getAllTender() {
        global $mysql;
        $sql = "SELECT sum(account_yes) as total FROM {borrow} WHERE `status`=1 OR `status`=3";
        $result = $mysql->db_fetch_arrays($sql);
        return $result;
    }
	 /**
     * 投资排行
     * @global type $mysql
     * @param type $array
     * @return type
     */
   function InvestmentRankings($array){
        global $mysql;
			if($array[id]=="d"){
				$start_time=strtotime(date("Y-m-d"));
				$end_time=strtotime(date("Y-m-d",strtotime("1 day")));
				$sql="SELECT e.username,sum(o.account*a.time_limit) as account FROM dw_borrow_tender AS o,dw_user AS e ,dw_borrow As a WHERE o.addtime >= $start_time and o.addtime <= $end_time and e.user_id=o.user_id  and o.borrow_id=a.id and a.isday !=1 and a.is_mb!=1 group by e.username ORDER BY account DESC LIMIT 8";	
			}else if($array[id]=="w"){
				$start_time=strtotime(date("Y-m-d",strtotime("-3 day")));
				$end_time=strtotime(date("Y-m-d",strtotime("3 day")));
				$sql="SELECT e.username,sum(o.account*a.time_limit) as account FROM dw_borrow_tender AS o,dw_user AS e ,dw_borrow As a WHERE o.addtime >= $start_time and o.addtime <= $end_time and e.user_id=o.user_id  and o.borrow_id=a.id and a.isday !=1 and a.is_mb!=1 group by e.username ORDER BY account DESC LIMIT 8";
			}else if($array[id]=="m"){
				$date=date("Y/m/d");
				$start_time = strtotime(date("Y-m-01",strtotime($date)));
				$firstday = date("Y-m-01",strtotime($date));
				$end_time = strtotime(date("Y-m-d",strtotime("$firstday +1 month -1 day")));
				$sql="SELECT e.username,sum(o.account*a.time_limit) as account FROM dw_borrow_tender AS o,dw_user AS e ,dw_borrow As a WHERE o.addtime >= $start_time and o.addtime <= $end_time and e.user_id=o.user_id  and o.borrow_id=a.id and a.isday !=1 and a.is_mb!=1 group by e.username ORDER BY account DESC LIMIT 8";
			}else{
				$sql="SELECT e.username,sum(o.account*a.time_limit) as account FROM dw_borrow_tender AS o,dw_user AS e ,dw_borrow As a WHERE  e.user_id=o.user_id  and o.borrow_id=a.id and a.isday !=1 and a.is_mb!=1 group by e.username ORDER BY account DESC LIMIT 8";
				
			}
			 $list=$mysql->db_fetch_arrays($sql);
               return array(
           'list'=>$list 
       );  
    }
	
}
?>