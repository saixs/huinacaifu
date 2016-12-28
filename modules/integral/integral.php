 <?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("integral_".$_A['query_type']);//检查权限

include_once("integral.class.php");

$_A['list_purview'] = array(""=>array("礼品兑换"=>array("integral_list"=>"礼品兑换列表","integral_new"=>"添加礼品兑换","integral_del"=>"删除礼品兑换","integral_convert"=>"用户兑换信息")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>兑换物品列表</a> - <a href='{$_A['query_url']}/new{$_A['site_url']}'>添加兑换物品</a>  - <a href='{$_A['query_url']}/convert{$_A['site_url']}'>用户兑换信息</a>  ";

$_A['integral_type'] = array(
	array('id' => '4','name' => '户外运动'),
	array('id' => '5','name' => '数码家电'),
	array('id' => '1','name' => '云南特产'),
	array('id' => '2','name' => '日用百货'),
	array('id' => '3','name' => '虚拟产品')
);
/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "礼品兑换列表";
	
	$data['page'] = $_A['page'];
	$data['epage'] = 20;
	$data['name'] = isset($_REQUEST['name'])?$_REQUEST['name']:"";
	$result = integralClass::GetList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
	
}



/**
 * 添加
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit"){
	if($_A['query_type'] == "edit"){
		$_A['list_title'] = "积分物品添加";
	}else{
		$_A['list_title'] = "积分物品修改";
	}
	//读取用户id的信息
	if (isset($_POST['name'])){
		if(empty($_POST['province']) || empty($_POST['city']) || empty($_POST['area'])){
			$var = array('name','need','number','order','flag','content','status','type');
		}else{
			$var = array('name','need','number','province','city','area','order','flag','content','status','type');
		}
		
		$data = post_var($var);
		
        if ($_POST['clearlitpic'] == 1) {
            $data['litpic'] = "";
        } else {
            $_G['upimg']['file'] = "litpic";
            $_G['upimg']['mask_status'] = 0;
            $pic_result = $upload->upfile($_G['upimg']);
            if ($pic_result != "") {
                $data['litpic'] = $pic_result['filename'];
            }
        }
		if($_A['query_type'] == "new"){
			$result = integralClass::Add($data);
		}else{
			$data['id'] = $_REQUEST['id'];
			$result = integralClass::update($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}
	
	elseif($_A['query_type'] == "edit"){
		$data['id'] = $_REQUEST['id'];
		$result = integralClass::GetOne($data);
		if (is_array($result)){
			$_A['integral_result'] = $result;
		}else{
			$msg = array("操作有误");
		}
	}
}
	
/**
 * 查看
**/	
elseif ($_A['query_type'] == "view"){
	$data['id'] = $_REQUEST['id'];
	$result = integralClass::GetOne($data);
	if (is_array($result)){
		if($result['type']==0){
			$result['type'] = '未选择类型';
		}else{
			$result['type'] = $_A['integral_type'][$result['type']-1]['name'];
		}
		$_A['integral_result'] = $result;
	}else{
		$msg = array("操作有误");
	}
}


/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$result = integralClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}


/**
 * 显示兑换信息列表
**/
elseif ($_A['query_type'] == "convert"){
	$_A['list_title'] = "礼品兑换详细信息";
	
	$data['page'] = $_A['page'];
	$data['epage'] = 20;
	$data['username'] = isset($_REQUEST['username'])?urldecode($_REQUEST['username']):"";
	$data['name'] = isset($_REQUEST['name'])?urldecode($_REQUEST['name']):"";
	$data['id'] = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	$data['dotime1'] = isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:"";
	$data['dotime2'] = isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:"";
	if(!empty($_REQUEST['status'])){
		$data['status'] = $_REQUEST['status'];
	}elseif(isset($_REQUEST['status'])){
		$data['status'] = 0;
	}

	$result = integralClass::GetConvertList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_convert_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
		if (isset($_REQUEST['type1']) && $_REQUEST['type1']=="excel"){
			$title = array("ID","礼品名称","兑换人","数量","分值","总兑换积分","兑换时间","状态");
			$data['limit'] = "all";
			$result = integralClass::GetConvertList($data);
			
			foreach ($result as $key => $value){
					
				//特殊用户（如：借款人为红色）导出加颜色
				if($value['type_id']==17){
					$value['username'] = '<red>'.$value['username'].'</red>';
				}elseif($value['type_id']==18){
					$value['username'] = '<blue>'.$value['username'].'</blue>';
				}
				
				if($value['status']==1){
					$value['status'] = '已兑换';
				}elseif($value['status']==2){
					$value['status'] = '已关闭';
				}else{
					$value['status'] = '未兑换';
				}
				
				$_data[$key] = array($value['id'],$value['goods_name'],$value['username'],$value['number'],$value['need'],$value['integral'],date("Y-m-d H:i",$value['addtime']),$value['status']);
			}
			exportData("礼品兑换详细信息",$title,$_data);
			exit;
		}
	}else{
		$msg = array($result);
	}
	
}

	
/**
 * 查看
**/	
elseif ($_A['query_type'] == "convert_view"){
	if (isset($_POST['status'])){
		$data['status'] = $_POST['status'];
		$data['verify_remark'] = $_POST['remark'];
		$data['id'] = $_POST['id'];
		$data['send_time'] = time();
		$data['send_num'] = $_POST['send_num'];
		$result = integralClass::ActionConvert($data);
		$msg = array("兑换成功");
	}else{
		$data['id'] = $_REQUEST['id'];
		$result = integralClass::GetConvertOne($data);
		if (is_array($result)){
			$_A['integral_convert_result'] = $result;
		}else{
			$msg = array("操作有误");
		}
	}
}

/**
 * 积分记录
**/	
elseif ($_A['query_type'] == "log"){
	$_A['list_title'] = "积分记录";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username'])){
		//$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = iconv("UTF-8","GB2312",$data['username']);
	}
	
	if (isset($_REQUEST['type'])){
		$data['type'] = $_REQUEST['type'];
	}
	
	if (isset($_REQUEST['dotime1'])){
		$data['dotime1'] = $_REQUEST['dotime1'];
	}
	
	if (isset($_REQUEST['dotime2'])){
		$data['dotime2'] = $_REQUEST['dotime2'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = integralClass::GetIntegralLog($data);

	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_log_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
		if (isset($_REQUEST['type1']) && $_REQUEST['type1']=="excel"){
			$title = array("数据库序号","用户名","类型","积分变化","记录时间","备注","操作人");
			$data['limit'] = "all";
			$result = integralClass::GetIntegralLog($data);
			foreach ($result as $key => $value){
				// 2012-10-17 修改了$value['remark'] 原程序中该处为 $value['type'] 导致导出的记录中资金使用名目为英文,remark字段为中文
				$remark = $result[$key]['remark'];
				$http_host = $_SERVER['HTTP_HOST'];
				$pattern = "/^(.*)\[<a.*(\/invest\/a[0-9]{1,}.html)' target=_blank>(.*)<\/a>(.*)$/i";
				$res = preg_match_all($pattern, $remark,$match_array);
				if ($res)
				{
					//$remark = $match_array['1']['0'].'[<a href="http://'.$http_host.$match_array['2']['0'].'" target=_blank>'.$match_array['3']['0'].'</a>'.$match_array['4']['0'];
				}
				
				//特殊用户（如：借款人为红色）导出加颜色
				if($value['type_id']==17){
					$value['username'] = '<red>'.$value['username'].'</red>';
				}elseif($value['type_id']==18){
					$value['username'] = '<blue>'.$value['username'].'</blue>';
				}
				//积分类型
				if($value['type_id']==1){
					if(empty($value['borrow_name'])){
						$value['type'] = '该标已删除（或为测试，请删除此条记录以及其他相关记录）';
					}else{
						$value['type'] = '【'.$value['borrow_name'].'】'.$value['integral_name'];
					}
				}else{
					$value['type'] = $value['integral_name'];
					if($value['type_id']==2){
						$value['type'] .= '（连续签到'.$value['day'].'天）';
					}
				}
				//操作人
				if(empty($value['op_user'])){
					$value['op_user'] = '系统操作';
				}else{
					$value['op_user'] = $value['op_username'];
				}
				
				$_data[$key] = array($value['tid'],$value['username'],$value['type'],$value['value'],date("Y-m-d H:i",$value['addtime']),$remark,$value['op_user']);
				// 2012-10-17修改
				//$_data[$key] = array($key+1,$value['trade_no'],$value['username'],$type,$payment,$value['money'],$value['fee'],$value['total'],date("Y-m-d H:i",$value['addtime']),$status);
			}
			exportData("积分记录汇总",$title,$_data);
			exit;
		}
	}else{
		$msg = array($result);
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
 * 会员积分扣除
**/
elseif ($_A['query_type'] == "deduct"){
	include_once(ROOT_PATH."/modules/integral/integral.class.php");
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = userClass::GetOnes($_data);
		if ($result==false){
			$msg = array("用户名不存在");
		}elseif (strtolower($_POST['valicode'])!=$_SESSION['valicode']){
			$msg = array("验证码不正确");
		}else{
			$result1 = userClass::GetOne($_data);
			if($result1['integral']>=$_POST['integral'])
			{
				$data['user_id'] = $result['user_id'];
				$data['value'] = $_POST['integral'];
				$data['type_id'] = $_POST['type'];
				$data['remark'] = $_POST['remark'];
				$result = integralClass::Deduct($data);
                      
				if (empty($result)){
					$msg = array($result);
				}else{
					$msg = array("积分已成功扣除","",$_A['query_url']."/deduct");
					$_SESSION['valicode'] = "";
				}
           	}else{
				$msg = array("会员积分不足扣除"); 
			}
		}
	}
}
/**
 * 会员积分列表
**/
elseif ($_A['query_type'] == "user_list"){
	$_A['list_title'] = "帐户积分信息列表";
	
	if (isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=""){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username']) && $_REQUEST['username']!=""){
			if (isset($_REQUEST['username'])){
		//$data['username'] = $_REQUEST['username'];
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username']= iconv("UTF-8","GB2312",$data['username']); 
	}

	}
	if(isset($_REQUEST['type'])&&$_REQUEST['type']!="")
	{
		$data['type'] = $_REQUEST['type'];
		$data['amount'] = $_REQUEST['amountm'];
	}

	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = integralClass::GetUserList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
		if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
			$title = array("ID","用户名","真实姓名","当前积分","投标所得积分");
			$data['limit'] = "all";
			$result = accountClass::GetList($data);
			
			foreach ($result as $key => $value){
					
				//特殊用户（如：借款人为红色）导出加颜色
				if($value['type_id']==17){
					$value['username'] = '<red>'.$value['username'].'</red>';
				}elseif($value['type_id']==18){
					$value['username'] = '<blue>'.$value['username'].'</blue>';
				}
				//用户当前积分
				if(empty($value['integral'])){
					$value['integral'] = 0;
				}
				//用户投标积分
				if(empty($value['invest_integral'])){
					$value['invest_integral'] = 0;
				}
				
				$_data[$key] = array($value['user_id'],$value['username'],$value['realname'],$value['integral'],$value['invest_integral']);
			}
			exportData("帐户积分信息列表",$title,$_data);
			exit;
		}
	
	}else{
		$msg = array($result);
	}
}
?>