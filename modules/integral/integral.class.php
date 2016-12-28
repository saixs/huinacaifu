<?php
/**
 * �ۿ�
 *
 * @author TissotCai
 */
class integralClass {


    const NOT_EXISTS_USER   = '�û�������';
    const NOT_EXISTS_MODULE = 'ģ�鲻����';
	const NOT_ENOUGH_CREDIT = '���ֲ���';
	const NOT_ENOUGH_GOODS  = '��Ʒ����';
	const NOT_ALLOW_CITY = '�һ���������';
    
	 /**
     * ��ȡ�ۿ��б�
	 * @param $where ���� array('goods'=>'Ь��'...)
     * @param $page ҳ��
     * @param $page_size ÿҳ��¼��
     */
    public static function GetList ($data = array()) {
        global $mysql;

		
		$name = empty($data['name'])?"":$data['name'];
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if ($name!=""){
			$_sql .= " and p1.`name` like '%$name%'";
		}
		
		if(!empty($data['price'])){
			$price_arr = explode(',',$data['price']);
			$_sql .= " and p1.need>={$price_arr[0]} and p1.need<{$price_arr[1]}";
		}
		
    	if(!empty($data['type'])){
			$_sql .= " and p1.type={$data['type']}";
		}
		
    	if(!empty($data['k'])){
			$_sql .= " and p1.name like '%".$data['k']."%'";
		}
		
		//����
		$_order = 'order by p1.`order` desc,p1.`id` desc';
    	if(!empty($data['order'])){
    		$_order_arr = explode(',',$data['order']);
    		if($_order_arr[0]=='default'){
    			if($_order_arr[1]=='0'){
    				$_order = 'order by p1.`order` asc,p1.`id` asc';
    			}
    		}else{
    			switch($_order_arr[0]){
    				case 'time':
    					$_order_type = 'p1.addtime';
    					break;
    				case 'inte':
    					$_order_type = 'p1.need';
    					break;
    			}
    			if($_order_arr['1']==1){
    				$_order = 'order by '.$_order_type.' desc';
	    		}else{
	    			$_order = 'order by '.$_order_type.' asc';
	    		}
    		}
		}

		$sql = "select SELECT from {integral} as p1 left join {area} as p2 on p1.city=p2.id  {$_sql}   ORDER LIMIT";
		
		//�Ƿ���ʾȫ������Ϣ
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.name as city_name',$_order, $_limit), $sql));
		}
		
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$sql = str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.name as city_name',$_order, $limit), $sql);
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

    /**
	 * ��ȡ������¼
	 * @param Array $data 
	 * @return Boolen
	 */
	public static function GetOne ($data = array()) {
		global $mysql;
		$id = $data['id'];
		$sql = "select SELECT
					from {integral} as p1 
				    where p1.id=$id ORDER ";
		return $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER'), array('p1.*', 'order by p1.id desc'), $sql));
	}
	
	
	/**
	 * ���
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Add($data = array()){
		global $mysql;
       
		$sql = "insert into `{integral}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        return $mysql->db_query($sql);
	}
	
	
	/**
	 * �޸�
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Update($data = array()){
		global $mysql;
		$id = $data['id'];
        if ($data['id'] == "") {
            return self::ERROR;
        }
		
		$_sql = "";
		$sql = "update `{integral}` set ";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
        return $mysql->db_query($sql);
	}
	
	
	
	/**
	 * ɾ��
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
		$sql = "delete from {integral}  where id in (".join(",",$id).")";
		return $mysql->db_query($sql);
	}
	
	 /**
     * ��ȡ�ۿ۶һ��б�
	 * @param $data 
     */
    public static function GetConvertList ($data = array()) {
        global $mysql;

		
		$name = empty($data['name'])?"":$data['name'];
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if ($name!=""){
			$_sql .= " and p2.`name` like '%$name%'";
		}
		
		if(!empty($data['user_id'])){
			$_sql .= " and p1.user_id={$data['user_id']}";
		}
		
    	if(!empty($data['status'])){
			$_sql .= " and p1.status={$data['status']}";
		}elseif(isset($data['status'])){
			$_sql .= " and p1.status=0";
		}
		
    	if(!empty($data['id'])){
			$_sql .= " and p2.id={$data['id']}";
		}
		
    	if(!empty($data['goods_name'])){
			$_sql .= " and p2.name like '%{$data['goods_name']}%'";
		}
		
    	if (isset($data['dotime1']) && $data['dotime1']!=""){
			 $_sql .= " and p1.addtime >= '" . strtotime($data['dotime1']) . "'";
		}
		if (isset($data['dotime2']) && $data['dotime2']!=""){
			$time2=strtotime($data['dotime2'])+3600*24;
            $_sql .= " and p1.addtime <= '" . $time2. "'";
		}
		
		$sql = "select SELECT from {integral_convert} as p1 
			left join {integral} as p2 on p1.integral_id=p2.id 
			left join {user} as p3 on p3.user_id=p1.user_id  
			{$_sql}   ORDER LIMIT";
		//�Ƿ���ʾȫ������Ϣ
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = " where limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.name as goods_name,p2.litpic as goods_litpic,p3.username,p3.realname', 'order by p1.`id` desc', $_limit), $sql));
		}
		
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$sql = str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.name as goods_name,p2.litpic as goods_litpic,p3.username,p3.realname', 'order by p1.`id` desc', $_limit), $sql);
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

    /**
	 * ��ȡ������¼
	 * @param Array $data 
	 * @return Boolen
	 */
	public static function GetConvertOne ($data = array()) {
		global $mysql;
		$id = $data['id'];
		$_sql = 'where 1=1';
		$sql = "select SELECT from {integral_convert} as p1 
			left join {integral} as p2 on p1.integral_id=p2.id  
			left join {user} as p3 on p3.user_id=p1.user_id 
			{$_sql} and p1.id=$id ORDER ";
		return $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER'), array('p1.*,p2.name as goods_name,p3.username,p3.realname', 'order by p1.id desc'), $sql));
	}
	
	
	/**
	 * �޸�
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function ActionConvert($data = array()){
		global $mysql;
		$id = $data['id'];
		
        if ($data['id'] == "" || $data['status'] == "") {
            return self::ERROR;
        }
		
		$sql = "select integral,user_id from {integral_convert} as p1 where id = '$id'";
		$result = $mysql->db_fetch_array($sql);
		$integral = $result['integral'];
		$user_id = $result['user_id'];
		
		$_sql = "";
		$sql = "update `{integral_convert}` set ";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";

		//�رմ˻��ֶһ�
		if ($data['status']==2){
			$sql = "update {user} set integral = integral + $integral where user_id = '$user_id'";
			$mysql->db_query($sql);
			$sql = "update `{integral_convert}` set status=2 where id='$id'";
		}
        return $mysql->db_query($sql);
	}
	
	
	/**
	 * �޸�
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function UpdateConvert($data = array()){
		global $mysql;
		$id = $data['id'];
        if ($data['id'] == "") {
            return self::ERROR;
        }
		
		$_sql = "";
		$sql = "update `{integral_convert}` set ";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
        return $mysql->db_query($sql);
	}
	
	
	
	/**
	 * ɾ��
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function DeleteConvert($data = array()){
		global $mysql;
		$id = $data['id'];
		if (!is_array($id)){
			$id = array($id);
		}
		$sql = "delete from {integral_convert}  where id in (".join(",",$id).")";
		return $mysql->db_query($sql);
	}
	
	
   
	/**
	 * ���ֶһ�
	 * @param $user_id ��ԱID
	 * @param $goods_id ��ƷID
	 * @param $number �һ�����
	 * @return
	 *		Integral::NOT_ENOUGH_GOODS ��Ʒ����
	 *		Integral::NOT_ALLOW_CITY �һ���������
	 *		true �ɹ�
	 */
	public static function AddConvert ($data = array()) {
		global $mysql;
		$user_id = $data['user_id'];
		$goods_id = $data['goods_id'];
		$number = $data['number'];
		
				
		//��ȡ�ջ���Ϣ
		if(empty($data['address'])){
			echo "<script>alert('����д�ջ���ַ');history.back();</script>";
			exit();
		}
		if(empty($data['receiver'])){
			echo "<script>alert('����д��ϵ��');history.back();</script>";
			exit();
		}
		if(empty($data['phone'])){
			echo "<script>alert('����д��ϵ�绰');history.back();</script>";
			exit();
		}

		# ��ȡ��Ա��Ϣ
		$user = $mysql->db_fetch_array("select * from {user} where user_id={$user_id}");
		if (!$user) {
			return self::ERROR;
		}
		
		# ��ȡ��Ա����
		$integral_num = $user['integral'];//return $credit;
		
		# ��ȡ��Ʒ��Ϣ
		$integral = $mysql->db_fetch_array("select * from {integral} where id=$goods_id");
		
		# ��Ʒ��Ϣ������
		if (!$integral) {
			return self::ERROR;
		}
		
		# ���ֲ���
		if ($integral_num < $integral['need'] * $number) {
			return self::NOT_ENOUGH_CREDIT;
		}
		
		# ��������
		if ($integral['ex_number'] + $number > $integral['number']) {
			return self::NOT_ENOUGH_GOODS;
		}
		
		# ״̬����ȷ
		if ($integral['status'] !=1 ) {
			return self::ERROR;
		}
		
		/*
		# ���в���ȷ����ȷ
		if (
			($integral['city'] > 0 && $user['city'] != $integral['city']) ||
			($integral['province'] > 0 && $user['province'] != $integral['province'])
		) {
			return self::NOT_ALLOW_CITY;
		}
		*/
		
		$data = array(
			'user_id' => $user_id,//�û�ID
			'integral_id' => $goods_id,//����id
			'number' => $number,
			'need' => $integral['need'],
			'integral' => $integral['need']*$number,
			'remark' => $data['remark'],
			'address' => $data['address'],
			'receiver' => $data['receiver'],
			'phone'	=> $data['phone'],
		);
		$sql = "insert into `{integral_convert}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}

		$result = $mysql->db_querys($sql);

		if ($result) {
			$ex_num = $integral['ex_number'] + $number ;//�ɹ������ʣ�������
			$ex_integral = $user['integral'] -  $integral['need']* $number ;//�ɹ������ʣ��Ļ���
			
			//�����Ѷһ�������
			$sql = "update {integral} set ex_number='$ex_num' where id={$goods_id};";
			$mysql->db_query($sql);
			
			//����ʣ����Ʒ������
			$sql = "update {integral} set number=number-$number where id={$goods_id};";
			$mysql->db_query($sql);
			
			//�����û��� ������
			$sql = "update {user} set integral='$ex_integral' where user_id={$user_id};";
			$mysql->db_query($sql);
		}
		return$result;
	}
	
	/**
 	 * 
	 * ���ֲ���������¼��
	 */
	public static function AddRechargeIntegral ($data = array(),$is_deduct = '') {
		global $mysql,$_G;
		
		if(empty($data['user_id']) || empty($data['value']) || empty($data['type_id'])){
			return '��������';
		}

		$data['op_user'] = empty($_G['user_id']) ? 0 : $_G['user_id'];
		
		//���ֲ���
		if(empty($is_deduct)){
			$sql = "update {user} set integral=integral+{$data['value']} where user_id={$data['user_id']}";
		}else{
			$sql = "update {user} set integral=integral-{$data['value']} where user_id={$data['user_id']}";
		}
		$mysql->db_query($sql);
		//��ӻ��ּ�¼
		$sql = "insert into `{integral_log}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$result = $mysql->db_querys($sql);
		$insert_id = mysql_insert_id();
		$sql = "select * from `{integral_log}` where id=$insert_id";
		$return_res = $mysql->db_fetch_array($sql);
		return $return_res;
	}
	
	/**
	 * ���ּ�¼��Ͷ�ꡢ�һ���
	 */
	function GetIntegralLog($data){
		global $mysql;
		$user_id = empty($data['user_id'])?"":$data['user_id'];
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1";		 
		if (!empty($user_id)){
			$_sql .= " and p1.user_id = '$user_id'";
		}
		if (!empty($data['username'])){
			$_sql .= " and p5.username like '%".$data['username']."%'";
		}
		if (!empty($data['type'])){
			$_sql .= " and p4.nid = '{$data['type']}'";
		}
		if (isset($data['dotime1']) && $data['dotime1']!=""){
			 $_sql .= " and p1.addtime >= '" . strtotime($data['dotime1']) . "'";
		}
		if (isset($data['dotime2']) && $data['dotime2']!=""){
			$time2=strtotime($data['dotime2'])+3600*24;
            $_sql .= " and p1.addtime <= '" . $time2. "'";
		}
	
		$_select = "p1.*,p1.id as tid,p3.name as borrow_name,p4.name as integral_name,p5.username as username,p6.username as op_username";
		if(!empty($data['id_order'])){
			$sql = "select SELECT from `{integral_log}` as p1
				left join `{borrow}` as p3 on p1.borrow_id=p3.id
				left join `{integral_type}` as p4 on p1.type_id=p4.id
				left join `{user}` as p5 on p1.user_id=p5.user_id
				left join `{user}` as p6 on p6.user_id=p1.op_user
		 {$_sql}  order by p1.id asc LIMIT";
		}else{
			$sql = "select SELECT from `{integral_log}` as p1
				left join `{borrow}` as p3 on p1.borrow_id=p3.id
				left join `{integral_type}` as p4 on p1.type_id=p4.id
				left join `{user}` as p5 on p1.user_id=p5.user_id
				left join `{user}` as p6 on p6.user_id=p1.op_user
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
	
	//���ֿ۳�
	function Deduct($data){
		global $mysql,$_G;
		if($data['integral'] < 0){
			return "�������ֲ���Ϊ����";
		}
		$log['user_id']  = $data['user_id'];
		$log['type_id']  = $data['type_id'];
		$log['value'] 	 = $data['value'];
		$log['remark']   = $data['remark'];

		$result = integralClass::AddRechargeIntegral($log,'1');
		
		require_once("modules/message/message.class.php");
		$message['sent_user'] = "0";
		$message['receive_user'] = $data['user_id'];
		$message['name'] = '�۳�����'.$data['remark'];
		$message['content'] = "���Ѿ���".date("Y-m-d",time())."�۳�����{$log['value']}�֣���ע��{$data['remark']}";
		$message['type'] = "system";
		$message['status'] = 0;
		messageClass::Add($message);//���Ͷ���Ϣ
		return true;
	}
	
	/**
	 * �û������б�
	 *
	 * @return Array
	 */
	function GetUserList($data = array()){
		global $mysql;
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1 ";	
			 
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and p2.user_id = '{$data['user_id']}'";
		}
		
		if (isset($data['username']) && $data['username']!=""){
			$_sql .= " and p2.username like '%{$data['username']}%'";
		}
		
		if(isset($data['type'])&& $data['type']!="")
		{
			if($data['type']=='total')
				$_sql.=" and p2.integral>{$data['amount']}";
			if($data['type']=='total1')
				$_sql.=" and p2.integral<{$data['amount']}";
			if($data['type']=='canuse')
				$_sql.=" and p2.invest_integral>{$data['amount']}";
			if($data['type']=='canuse1')
				$_sql.=" and p2.invest_integral<{$data['amount']}";
		}

		$sql = "select SELECT from {account} as p1 
				 left join {user} as p2 on p1.user_id=p2.user_id
				$_sql ORDER LIMIT";
		$_select = "p1.*,p2.username,p2.type_id,p2.realname,p2.integral,p2.invest_integral";
		//�Ƿ���ʾȫ������Ϣ
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list =  $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $_limit), $sql));
			
			return $list;
		}
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		
		
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		
	}
}
?>
