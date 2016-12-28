<?
/******************************
 * $File: system.php
 * $Description: 系统管理
 * $Author: dongdong 
 * $Time:2009-03-09
 * $Update:None 
******************************/
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问


include_once(ROOT_PATH."core/system.class.php");


$_A['list_name'] = "系统管理";
if ($_A['query_class']=="list"){
	$_A['query_class'] = "user";
}
/**
 * 用户信息和密码修改
**/
if ($_A['query_class'] == "user"){
	$_A['list_title'] = "修改个人信息";
	include_once(ROOT_PATH."core/user.class.php");
	if (!isset($_POST['user_id'])){
		$_A['user_result'] = $user->GetOne(array("user_id"=>$_G['user_id']));
	}else{
		$var = array("email","realname","sex","qq","wangwang","tel","phone","address");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		if (isset($_POST['password']) && $_POST['password'] != ""){
			$data['password'] = $_POST['password'];
			$result = $user->CheckUsernamePassword($data);
			if ($result  == false){
				$msg = array("原密码不正确");
			}else{
				$data['password'] = $_POST['password1'] ;
			}
		}
		if ($msg==""){
			$result = $user->UpdateUser($data);
			
			if ($result!==true){
				$msg = array($result);
			}else{
				$msg = array("信息修改成功");
			}
		}
	}
}

/**
 * 系统基本信息设置
**/
elseif ( $_A['query_class']== "info"){
	check_rank("system_info");//检查权限
	$_A['list_title'] = "系统参数";
	$_A['list_menu'] = "<a href='{$_A['query_url']}'>参数管理</a> | <a href='{$_A['query_url']}/new'>添加参数</a>";
	
	if ($_A['query_type'] == "list"){
		if (isset($_POST['value'])){
			$data['value'] = $_POST['value'];
			$data['class'] = "action";
			$data['style'] = "1";
			$result = systemClass::ActionSystem($data);
			if ($result==true){
				$msg = array("操作成功");
			}else{
				$msg = array($result);
			}
		}else{
			$data['class'] = "list";
			$data['style'] = "1";
			$_A['system_list'] = systemClass::ActionSystem($data);
		}
		
	}elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit"){
		if (isset($_POST['name'])){
			$var = array("name","nid","status","type","style");
			$data = post_var($var);
			$data['class'] = "add";
			if ($_A['query_type'] == "edit"){
				$data['id'] = $_REQUEST['id'];
				$data['class'] = "update";
			}
			if ($data['type']==0 || $data['type']==3){
				$data['value'] = $_POST['value1'];
			}else{
				$data['value'] = $_POST['value2'];
			}
			$result = systemClass::ActionSystem($data);
			if ($result===true){
				$msg = array("操作成功");
			}else{
				$msg = array($result);
			}
			$user->add_log($_log,$result);//记录操作
		}elseif($_A['query_type'] == "edit"){
			$data['id'] = $_REQUEST['id'];
			$data['class'] = "view";
			$data['style'] = "1";
			$result = systemClass::ActionSystem($data);
			if ($result['status']==0){
				$msg = array("此参数不能修改");
			}else{
				$_A['system_result'] = $result;
			}
		}
	}
	elseif ($_A['query_type'] == "action"){
		$data['value'] = $_POST['value'];
		$data['class'] = "action";
		$data['style'] = "1";
		$result = systemClass::ActionSystem($data);
		if ($result['status']==0){
			$msg = array("此参数不能修改");
		}else{
			$_A['system_result'] = $result;
		}
	
	}
	elseif ($_A['query_type'] == "del"){
		$result = $mysql->db_delete("system","id=".$_REQUEST['id']." and status=1");
		if ($result == false){
			$msg = array("输入有误，请跟管理员联系");
		}else{
			$msg = array("删除成功");
		}
		$user->add_log($_log,$result);//记录操作
	}
}

/**
 * 图片水印设置
**/
elseif ($_A['query_class']== "watermark"){
	check_rank("system_watermark");//检查权限
	$list_name = "图片水印设置";
	$result = $mysql->db_selects("system","style=2");
	if ($result == false){
		$sql = "INSERT INTO `{system}` (`name` ,`nid` ,`value` ,`type` ,`style` ,`status`)VALUES ('上传的图片是否使用图片水印功能', 'con_watermark_pic', '0', '0', '2', '1'),
		( '采集的图片是否使用图片水印功能', 'con_watermark_caijipic', '0', '0', '2', '1'),
		( '选择水印的文件类型', 'con_watermark_type', '0', '0', '2', '1'),
		( '水印的字体', 'con_watermark_font', '', '0', '2', '1'),
		( '水印图片文件名', 'con_watermark_file', '0', '0', '2', '1'),
		( '水印图片文字字体大小', 'con_watermark_size', '20', '0', '2', '1'),
		( '水印图片文字颜色', 'con_watermark_color', '#FF0000', '0', '2', '1'),
		( '水印文字', 'con_watermark_word', '', '0', '2', '1'),
		( '水印位置', 'con_watermark_position', '4', '0', '2', '1'),
		( '添加图片水印后质量参数', 'con_watermark_imgpct', '0', '0', '2', '1'),
		( '添加文字水印后质量参数', 'con_watermark_txtpct', '0', '0', '2', '1');";
		$mysql->db_query($sql);
	}else{
		foreach ($result as $key => $value){
			$_result[$value['nid']] = $value['value'];
		}
		$magic->assign("result",$_result);
	}
	if (isset($_POST['con_watermark_pic'])){
		$var = array("con_watermark_pic","con_watermark_caijipic","con_watermark_type","con_watermark_font","con_watermark_color","con_watermark_txtpct","con_watermark_imgpct","con_watermark_word","con_watermark_size","con_watermark_position");
		$index = post_var($var);
		$pic_name = upload('con_watermark_file');
		if (is_array($pic_name)){
			$index['con_watermark_file'] = $pic_name[0];
		}
		foreach ($index as $key => $value){
			$sql = "update {system} set `value` = '".$value."' where nid='".$key."'";
			$mysql->db_query($sql);
		}
		$msg = array("信息修改成功");
	}
}


/**
 * 附件设置
**/
elseif ($_A['query_class']== "fujian"){
	check_rank("system_fujian");//检查权限
	$list_name = "附件设置";
	$result = $mysql->db_selects("system","style=3");
	
	if ($result == false){
		$sql = "INSERT INTO `{system}` (`name` ,`nid` ,`value` ,`type` ,`style` ,`status`)VALUES ( '缩略图是否裁切', 'con_fujian_imgstatus', '', '0', '3', '1'),
		('缩略图默认宽度', 'con_fujian_imgwidth', '', '0', '3', '1'),
		( '缩略图默认高度', 'con_fujian_imgheight', '', '0', '3', '1'),
		( '上传图片截取宽度', 'con_fujian_picwidth', '', '0', '3', '1'),
		( '上传图片截取高度', 'con_fujian_picheight', '', '0', '3', '1'),
		( '允许上传的图片类型', 'con_fujian_imgtype', '', '0', '3', '1'),
		( '允许上传的软件类型', 'con_fujian_annextype', '', '0', '3', '1'),
		( '允许的多媒体文件类型', 'con_fujian_mediatype', '', '0', '3', '1')
		;";
		$mysql->db_query($sql);
	}else{
		foreach ($result as $key => $value){
			$_result[$value['nid']] = $value['value'];
		}
		$magic->assign("result",$_result);
	}
	if (isset($_POST['con_fujian_imgwidth'])){
		$var = array("con_fujian_imgwidth","con_fujian_imgstatus","con_fujian_imgheight","con_fujian_picwidth","con_fujian_picheight","con_fujian_imgtype","con_fujian_annextype","con_fujian_mediatype");
		$index = post_var($var);
		foreach ($index as $key => $value){
			$sql = "update {system} set `value` = '".$value."' where nid='".$key."'";
			$mysql->db_query($sql);
		}
		$msg = array("信息修改成功");
	}
}


/**
 * 数据库备份和还原
**/


/**
 * 自定义文档
**/
elseif ($_A['query_class']== "flag"){
	check_rank("system_flag");//检查权限
	$list_name = "自定义属性 ";
	if ($_A['query_type']=="order"){
		$result = $mysql->db_order("flag",$_REQUEST['order'],"id",$_REQUEST['id']);
		$msg = array("修改排序成功");
	}elseif ($_A['query_type']=="add"){
		$var = array("name","nid","order");
		$index = post_var($var);
		$result = $mysql->db_add("flag",$index,true);
		$msg = array("添加成功");
	}elseif ($_A['query_type']=="del"){
		if (isset($_REQUEST['id']) && $_REQUEST['id']>3){
			$result = $mysql->db_delete("flag","id=".$_REQUEST['id']);
			$msg = array("删除成功");
		}else{
			$msg = array("删除失败");
		}
	}else{
		$result = $mysql->db_selects("flag","","`order` desc");
		$magic->assign("result",$result);
	}
	$template_tpl = "admin_flag.html";
}

/**
 * 管理记录
**/
elseif ($_A['query_class']== "userlog"){
	check_rank("system_userlog");//检查权限
	$data['page'] = $_A['page'];
	$data['epage'] = 25;
	$data['username']  = isset($_REQUEST['username'])?$_REQUEST['username']:"";
	$data['quer']  = isset($_REQUEST['quer'])?$_REQUEST['quer']:"";
	$result = systemClass::GetUserLog($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['userlog_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
	$template_tpl = "admin_userlog.html";
}

/**
 * 图片管理
**/
elseif ($_A['query_class']== "upfiles"){
	check_rank("system_userlog");//检查权限
	$data['page'] = $_A['page'];
	$data['epage'] = 40;
	$data['username']  = isset($_REQUEST['username'])?$_REQUEST['username']:"";
	$data['quer']  = isset($_REQUEST['quer'])?$_REQUEST['quer']:"";
	$result = systemClass::GetUpfiles($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['upfiles_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
	$template_tpl = "admin_upfiles.html";
}

/**
 * 用户缓存信息管理
**/
elseif ($_A['query_class']== "cache"){
	check_rank("system_userlog");//检查权限
	$data['page'] = $_A['page'];
	$data['epage'] = 40;
	$data['username']  = isset($_REQUEST['username'])?$_REQUEST['username']:"";
	$data['quer']  = isset($_REQUEST['quer'])?$_REQUEST['quer']:"";
	$result = systemClass::GetUpfiles($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['upfiles_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
	$template_tpl = "admin_upfiles.html";
}

/**
 * 生成网站
**/
elseif ($_A['query_class']== "makehtml"){
	check_rank("system_makehtml");//检查权限
	$list_name = "生成网站";
	include_once("makehtml.php");

}

/**
 * 清空缓存
**/
elseif ($_A['query_class']== "clearcache"){
	check_rank("system_clearcache");//检查权限
	if ($_A['query_type']=="do"){
		del_file("data/compile");
		$msg = array("缓存已清空");
	}
}

/**
 * 邮箱设置
**/
elseif ($_A['query_class'] == 'email') {
	check_rank("system_email");//检查权限
	
	$list_name = "邮件设置";
	$style = 4;
	$result = $mysql->db_selects("system","style={$style}");
	if (!$result) {
		$sql = "INSERT INTO `{system}` (`name` ,`nid` ,`value` ,`type` ,`style` ,`status`)VALUES
					('SMTP服务器', 'con_email_host', '', '0', '{$style}', '0'),
					('SMTP服务器是否需要验证', 'con_email_auth', '1', '1', '{$style}', '0'),
					('邮箱地址', 'con_email_email', '', '0', '{$style}', '0'),
					('邮箱密码', 'con_email_pwd', '', '0', '{$style}', '0'),
					('发件人Email', 'con_email_from', '', '0', '{$style}', '0'),
					('发件人昵称或姓名', 'con_email_from_name', '', '0', '{$style}', '0')";
		$mysql->db_query($sql);
	}
    if (isset($_POST['value'])) {
        $value = isset($_POST['value'])?$_POST['value']:array();
        $sql = array();
        foreach ($value as $key => $var) {
            array_push($sql, "set value='{$var}' where style='{$style}' and nid='{$key}'");
        }
        $sql = 'update {system} ' . implode(';update {system} ', $sql) . ';';
        $mysql->db_querys($sql);
        $msg = array('操作成功');
		
    }
    else{
        $result = $mysql->db_fetch_arrays("select * from {system} where style={$style}");
        $magic->assign('result', $result);
    }
}/**
 * 其他操作
 */
elseif ($_A['query_class']== "others_operate"){
	check_rank("system_clearcache");//检查权限
	if(!empty($_POST['operate'])){
		if($_POST['operate']=='积分更新'){
			$sql = "select user_id from `{borrow_tender}` group by user_id";
			$result = $mysql -> db_fetch_arrays($sql);
			foreach($result as $val){
				//用户积分统计更新
				if(!empty($_G['user_id'])){
					//$start_invest_time = strtotime('2013-11-01 00:00:00');
					$start_invest_time = 0;
					//投标所得积分
					$sql = "select sum(value) as sum_accounts from {integral_log} where user_id={$val['user_id']} and addtime>$start_invest_time and type_id=1";
					$user_invest_info  =  $mysql->db_fetch_array($sql);
					$invest_integral   = $user_invest_info['sum_accounts'];
					//投标及其他（如签到、积分发放等）总共所得积分
					$sql = "select sum(value) as sum_integral from {integral_log} where user_id={$val['user_id']} and addtime>$start_invest_time and type_id<>4";
					$user_integral_info  =  $mysql->db_fetch_array($sql);
					$get_all_integral   = $user_integral_info['sum_integral'];
					//扣除积分
					$sql = "select sum(value) as sum_integral from {integral_log} where user_id={$val['user_id']} and addtime>$start_invest_time and type_id=4";
					$user_integral_info  =  $mysql->db_fetch_array($sql);
					$deduct_integral   = $user_integral_info['sum_integral'];
					//扣除兑换积分
					$sql = "select sum(need) as convert_integral from `{integral_convert}` where user_id={$val['user_id']} and status<>2";
					$convert_info  =  $mysql->db_fetch_array($sql);
					//当前积分
					$integral = $get_all_integral- $deduct_integral - $convert_info['convert_integral'];
					$sql = "update {user} set invest_integral='$invest_integral',integral='$integral' where user_id={$val['user_id']}";
					$mysql->db_query($sql);
				}
			}
			//签到积分
			
			$msg = array('操作成功');
			$template = "admin_system.html";
		}else{
			//echo '111';
			$sql = "select id,borrow_id,user_id,account,addtime,addip from `{borrow_tender}`";
			$result = $mysql -> db_fetch_arrays($sql);
			foreach($result as $val){
				$invest_integral   = floor($val['account']/100);
				//$sql = "insert into `{integral_log}` (`user_id`,`type_id`,`value`,`remark`,`op_user`,`addtime`,`addip`) values ($val['user_id'],1,$invest_integral,'投标增加积分'.$invest_integral,'1',$val['addtime'],$val['addip']);";
				$sql = "insert into `{integral_log}` (`user_id`,`type_id`,`borrow_id`,`value`,`remark`,`op_user`,`addtime`,`addip`) values ({$val['user_id']},1,{$val['borrow_id']},$invest_integral,'投标增加积分$invest_integral',1,'{$val['addtime']}','{$val['addip']}')";
				$mysql->db_query($sql);
			}
			$msg = array('操作成功');
			$template = "admin_system.html";
		}
	}
}
/**
 * 如果是其他模块则读取其他模块的配置文件
**/
else{
	$msg = array("您输入有误");
}


$magic->assign("html_template","admin_".(empty($_A['query_class'])?'user':$_A['query_class']).".html");
$template = "admin_system.html";
?>