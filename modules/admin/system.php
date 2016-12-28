<?
/******************************
 * $File: system.php
 * $Description: ϵͳ����
 * $Author: dongdong 
 * $Time:2009-03-09
 * $Update:None 
******************************/
if (!defined('ROOT_PATH'))  die('���ܷ���');//��ֱֹ�ӷ���


include_once(ROOT_PATH."core/system.class.php");


$_A['list_name'] = "ϵͳ����";
if ($_A['query_class']=="list"){
	$_A['query_class'] = "user";
}
/**
 * �û���Ϣ�������޸�
**/
if ($_A['query_class'] == "user"){
	$_A['list_title'] = "�޸ĸ�����Ϣ";
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
				$msg = array("ԭ���벻��ȷ");
			}else{
				$data['password'] = $_POST['password1'] ;
			}
		}
		if ($msg==""){
			$result = $user->UpdateUser($data);
			
			if ($result!==true){
				$msg = array($result);
			}else{
				$msg = array("��Ϣ�޸ĳɹ�");
			}
		}
	}
}

/**
 * ϵͳ������Ϣ����
**/
elseif ( $_A['query_class']== "info"){
	check_rank("system_info");//���Ȩ��
	$_A['list_title'] = "ϵͳ����";
	$_A['list_menu'] = "<a href='{$_A['query_url']}'>��������</a> | <a href='{$_A['query_url']}/new'>��Ӳ���</a>";
	
	if ($_A['query_type'] == "list"){
		if (isset($_POST['value'])){
			$data['value'] = $_POST['value'];
			$data['class'] = "action";
			$data['style'] = "1";
			$result = systemClass::ActionSystem($data);
			if ($result==true){
				$msg = array("�����ɹ�");
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
				$msg = array("�����ɹ�");
			}else{
				$msg = array($result);
			}
			$user->add_log($_log,$result);//��¼����
		}elseif($_A['query_type'] == "edit"){
			$data['id'] = $_REQUEST['id'];
			$data['class'] = "view";
			$data['style'] = "1";
			$result = systemClass::ActionSystem($data);
			if ($result['status']==0){
				$msg = array("�˲��������޸�");
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
			$msg = array("�˲��������޸�");
		}else{
			$_A['system_result'] = $result;
		}
	
	}
	elseif ($_A['query_type'] == "del"){
		$result = $mysql->db_delete("system","id=".$_REQUEST['id']." and status=1");
		if ($result == false){
			$msg = array("���������������Ա��ϵ");
		}else{
			$msg = array("ɾ���ɹ�");
		}
		$user->add_log($_log,$result);//��¼����
	}
}

/**
 * ͼƬˮӡ����
**/
elseif ($_A['query_class']== "watermark"){
	check_rank("system_watermark");//���Ȩ��
	$list_name = "ͼƬˮӡ����";
	$result = $mysql->db_selects("system","style=2");
	if ($result == false){
		$sql = "INSERT INTO `{system}` (`name` ,`nid` ,`value` ,`type` ,`style` ,`status`)VALUES ('�ϴ���ͼƬ�Ƿ�ʹ��ͼƬˮӡ����', 'con_watermark_pic', '0', '0', '2', '1'),
		( '�ɼ���ͼƬ�Ƿ�ʹ��ͼƬˮӡ����', 'con_watermark_caijipic', '0', '0', '2', '1'),
		( 'ѡ��ˮӡ���ļ�����', 'con_watermark_type', '0', '0', '2', '1'),
		( 'ˮӡ������', 'con_watermark_font', '', '0', '2', '1'),
		( 'ˮӡͼƬ�ļ���', 'con_watermark_file', '0', '0', '2', '1'),
		( 'ˮӡͼƬ���������С', 'con_watermark_size', '20', '0', '2', '1'),
		( 'ˮӡͼƬ������ɫ', 'con_watermark_color', '#FF0000', '0', '2', '1'),
		( 'ˮӡ����', 'con_watermark_word', '', '0', '2', '1'),
		( 'ˮӡλ��', 'con_watermark_position', '4', '0', '2', '1'),
		( '���ͼƬˮӡ����������', 'con_watermark_imgpct', '0', '0', '2', '1'),
		( '�������ˮӡ����������', 'con_watermark_txtpct', '0', '0', '2', '1');";
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
		$msg = array("��Ϣ�޸ĳɹ�");
	}
}


/**
 * ��������
**/
elseif ($_A['query_class']== "fujian"){
	check_rank("system_fujian");//���Ȩ��
	$list_name = "��������";
	$result = $mysql->db_selects("system","style=3");
	
	if ($result == false){
		$sql = "INSERT INTO `{system}` (`name` ,`nid` ,`value` ,`type` ,`style` ,`status`)VALUES ( '����ͼ�Ƿ����', 'con_fujian_imgstatus', '', '0', '3', '1'),
		('����ͼĬ�Ͽ��', 'con_fujian_imgwidth', '', '0', '3', '1'),
		( '����ͼĬ�ϸ߶�', 'con_fujian_imgheight', '', '0', '3', '1'),
		( '�ϴ�ͼƬ��ȡ���', 'con_fujian_picwidth', '', '0', '3', '1'),
		( '�ϴ�ͼƬ��ȡ�߶�', 'con_fujian_picheight', '', '0', '3', '1'),
		( '�����ϴ���ͼƬ����', 'con_fujian_imgtype', '', '0', '3', '1'),
		( '�����ϴ����������', 'con_fujian_annextype', '', '0', '3', '1'),
		( '����Ķ�ý���ļ�����', 'con_fujian_mediatype', '', '0', '3', '1')
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
		$msg = array("��Ϣ�޸ĳɹ�");
	}
}


/**
 * ���ݿⱸ�ݺͻ�ԭ
**/


/**
 * �Զ����ĵ�
**/
elseif ($_A['query_class']== "flag"){
	check_rank("system_flag");//���Ȩ��
	$list_name = "�Զ������� ";
	if ($_A['query_type']=="order"){
		$result = $mysql->db_order("flag",$_REQUEST['order'],"id",$_REQUEST['id']);
		$msg = array("�޸�����ɹ�");
	}elseif ($_A['query_type']=="add"){
		$var = array("name","nid","order");
		$index = post_var($var);
		$result = $mysql->db_add("flag",$index,true);
		$msg = array("��ӳɹ�");
	}elseif ($_A['query_type']=="del"){
		if (isset($_REQUEST['id']) && $_REQUEST['id']>3){
			$result = $mysql->db_delete("flag","id=".$_REQUEST['id']);
			$msg = array("ɾ���ɹ�");
		}else{
			$msg = array("ɾ��ʧ��");
		}
	}else{
		$result = $mysql->db_selects("flag","","`order` desc");
		$magic->assign("result",$result);
	}
	$template_tpl = "admin_flag.html";
}

/**
 * �����¼
**/
elseif ($_A['query_class']== "userlog"){
	check_rank("system_userlog");//���Ȩ��
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
 * ͼƬ����
**/
elseif ($_A['query_class']== "upfiles"){
	check_rank("system_userlog");//���Ȩ��
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
 * �û�������Ϣ����
**/
elseif ($_A['query_class']== "cache"){
	check_rank("system_userlog");//���Ȩ��
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
 * ������վ
**/
elseif ($_A['query_class']== "makehtml"){
	check_rank("system_makehtml");//���Ȩ��
	$list_name = "������վ";
	include_once("makehtml.php");

}

/**
 * ��ջ���
**/
elseif ($_A['query_class']== "clearcache"){
	check_rank("system_clearcache");//���Ȩ��
	if ($_A['query_type']=="do"){
		del_file("data/compile");
		$msg = array("���������");
	}
}

/**
 * ��������
**/
elseif ($_A['query_class'] == 'email') {
	check_rank("system_email");//���Ȩ��
	
	$list_name = "�ʼ�����";
	$style = 4;
	$result = $mysql->db_selects("system","style={$style}");
	if (!$result) {
		$sql = "INSERT INTO `{system}` (`name` ,`nid` ,`value` ,`type` ,`style` ,`status`)VALUES
					('SMTP������', 'con_email_host', '', '0', '{$style}', '0'),
					('SMTP�������Ƿ���Ҫ��֤', 'con_email_auth', '1', '1', '{$style}', '0'),
					('�����ַ', 'con_email_email', '', '0', '{$style}', '0'),
					('��������', 'con_email_pwd', '', '0', '{$style}', '0'),
					('������Email', 'con_email_from', '', '0', '{$style}', '0'),
					('�������ǳƻ�����', 'con_email_from_name', '', '0', '{$style}', '0')";
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
        $msg = array('�����ɹ�');
		
    }
    else{
        $result = $mysql->db_fetch_arrays("select * from {system} where style={$style}");
        $magic->assign('result', $result);
    }
}/**
 * ��������
 */
elseif ($_A['query_class']== "others_operate"){
	check_rank("system_clearcache");//���Ȩ��
	if(!empty($_POST['operate'])){
		if($_POST['operate']=='���ָ���'){
			$sql = "select user_id from `{borrow_tender}` group by user_id";
			$result = $mysql -> db_fetch_arrays($sql);
			foreach($result as $val){
				//�û�����ͳ�Ƹ���
				if(!empty($_G['user_id'])){
					//$start_invest_time = strtotime('2013-11-01 00:00:00');
					$start_invest_time = 0;
					//Ͷ�����û���
					$sql = "select sum(value) as sum_accounts from {integral_log} where user_id={$val['user_id']} and addtime>$start_invest_time and type_id=1";
					$user_invest_info  =  $mysql->db_fetch_array($sql);
					$invest_integral   = $user_invest_info['sum_accounts'];
					//Ͷ�꼰��������ǩ�������ַ��ŵȣ��ܹ����û���
					$sql = "select sum(value) as sum_integral from {integral_log} where user_id={$val['user_id']} and addtime>$start_invest_time and type_id<>4";
					$user_integral_info  =  $mysql->db_fetch_array($sql);
					$get_all_integral   = $user_integral_info['sum_integral'];
					//�۳�����
					$sql = "select sum(value) as sum_integral from {integral_log} where user_id={$val['user_id']} and addtime>$start_invest_time and type_id=4";
					$user_integral_info  =  $mysql->db_fetch_array($sql);
					$deduct_integral   = $user_integral_info['sum_integral'];
					//�۳��һ�����
					$sql = "select sum(need) as convert_integral from `{integral_convert}` where user_id={$val['user_id']} and status<>2";
					$convert_info  =  $mysql->db_fetch_array($sql);
					//��ǰ����
					$integral = $get_all_integral- $deduct_integral - $convert_info['convert_integral'];
					$sql = "update {user} set invest_integral='$invest_integral',integral='$integral' where user_id={$val['user_id']}";
					$mysql->db_query($sql);
				}
			}
			//ǩ������
			
			$msg = array('�����ɹ�');
			$template = "admin_system.html";
		}else{
			//echo '111';
			$sql = "select id,borrow_id,user_id,account,addtime,addip from `{borrow_tender}`";
			$result = $mysql -> db_fetch_arrays($sql);
			foreach($result as $val){
				$invest_integral   = floor($val['account']/100);
				//$sql = "insert into `{integral_log}` (`user_id`,`type_id`,`value`,`remark`,`op_user`,`addtime`,`addip`) values ($val['user_id'],1,$invest_integral,'Ͷ�����ӻ���'.$invest_integral,'1',$val['addtime'],$val['addip']);";
				$sql = "insert into `{integral_log}` (`user_id`,`type_id`,`borrow_id`,`value`,`remark`,`op_user`,`addtime`,`addip`) values ({$val['user_id']},1,{$val['borrow_id']},$invest_integral,'Ͷ�����ӻ���$invest_integral',1,'{$val['addtime']}','{$val['addip']}')";
				$mysql->db_query($sql);
			}
			$msg = array('�����ɹ�');
			$template = "admin_system.html";
		}
	}
}
/**
 * ���������ģ�����ȡ����ģ��������ļ�
**/
else{
	$msg = array("����������");
}


$magic->assign("html_template","admin_".(empty($_A['query_class'])?'user':$_A['query_class']).".html");
$template = "admin_system.html";
?>