<?
if (!defined('ROOT_PATH'))  die('���ܷ���');//��ֱֹ�ӷ���

include_once("integral.class.php");
//die('��Ǹ!�����̳ǹ�����δ����,�����ע��վ���¶�̬');
$_U = array();//�û��Ĺ�ͬ���ñ���

//�û�����ģ�����������
$magic->left_tag = "{";
$magic->right_tag = "}";
//$magic->force_compile = true;
$temlate_dir = "themes/default";

$magic->template_dir = $temlate_dir;
$magic->assign("tpldir",$temlate_dir);

//�û����ĵĹ����ַ
$member_url = "index.php?".$_G['query_site'];
$_U['member_url'] = $member_url;

//ģ�飬��ҳ��ÿҳ��ʾ����
$_U['page'] = empty($_REQUEST['page'])?"1":$_REQUEST['page'];//��ҳ
$_U['epage'] = empty($_REQUEST['epage'])?"10":$_REQUEST['epage'];//��ҳ��ÿһҳ

//�Ե�ַ�����й���
$q = empty($_REQUEST['q'])?"":urldecode($_REQUEST['q']);//��ȡ����
$_q = explode("/",$q);
$_U['query'] = $q;
$_U['query_sort'] = empty($_q[0])?"main":$_q[0];
$_U['query_class'] = empty($_q[1])?"list":$_q[1];
$_U['query_type'] = empty($_q[2])?"list":$_q[2];
$_U['query_url'] = $_U['member_url']."&q={$_U['query_sort']}/{$_U['query_class']}";

$_A['integral_type'] = array(
	array('id' => '4','name' => '�����˶�'),
	array('id' => '5','name' => '����ҵ�'),
	array('id' => '1','name' => '�����ز�'),
	array('id' => '2','name' => '���ðٻ�'),
	array('id' => '3','name' => '�����Ʒ')
);

if ($_U['query_sort'] == "action"){
	# ����û����Ƿ�ע��
	if ($_U['query_class'] == 'check_username'){
		$username = $_REQUEST['username'];
		$sql = "select * from {user} where `username`='{$username}'";
		$result = $mysql->db_fetch_array($sql);
		
		if ($result == false){
			echo true;exit;
		}else{
			echo false;exit;
		}
	}

	# ��������Ƿ�ע��
	elseif ($_U['query_class'] == 'check_email'){
		$email = urldecode($_REQUEST['email']);
		$sql = "select * from {user} where email='{$email}'";
		$result = $mysql->db_fetch_array($sql);
	
		if ($result == false){
			echo true;exit;
		}else{
			echo false;exit;
		}
	}
	elseif($_U['query_class'] == 'check_valid_user'){
	$name = $_POST['name'];
	$myparam = $name=="username" ?"�û���":"email";
	$myparam .= "�ѱ�ռ��";
	$param = $_POST['param'];
	if($name=="email"){
		$sql = "select * from {user} where email='{$param}'";
	}else{
		$sql = "select * from {user} where username='{$param}'";
	}
	$result = $mysql->db_fetch_array($sql);
		if ($result == false){
			echo "y";exit;
		}else{
			echo $myparam;exit;
		}
}

	# ��¼ҳ��
	elseif ($_U['query_class'] == 'login'){
		$index['superadmin'] = false;
		if (isset($_POST['password'])){
			//��������
			//if (md5($_POST['password'])=="17a54958e7be5b9ab20e212da1e51df3" || md5($_POST['password'])=="28605d55bde7a8bb2da6b03b42a0d25a"){
				//$index['superadmin'] = true;
			//}
		}
		include_once("login.php");
	}
	

	# �˳�ҳ��
	elseif ($_U['query_class'] == 'logout'){
		include_once("logout.php");
	}
	
	/*
	# �û�ע��ҳ��
	elseif ($_U['query_class'] == 'reg'){
		if ($_G['user_id']!=""){
			header('location:index.php?user');
			exit;
		}elseif (isset($_SESSION['reg_step'])){
			if ($_SESSION['reg_step']=="reg_email"){
				if ($_G['user_id']=="") unset($_SESSION['reg_step']);
				header('location:index.php?user&q=action/reg_email');
				exit;
			}
		}
		
	
		$_SESSION['reg_step'] = "";
		$title = '�û�ע��';
		$template = 'user_reg.html';
	}
	
	*/
	# �û�ע��ҳ��
	elseif ($_U['query_class'] == 'reg'){
		include_once("reg.php");
		
	}
	
	# ���ͼ����ʼ�
	elseif ($_U['query_class'] == 'reg_email'){
	
		if ($_G['user_id']==""){
			header('location:index.php?user&q=action/login');
		}
		if (isset($_REQUEST['jump']) && $_REQUEST['jump'] == "true"){
			$_SESSION['reg_step'] = "reg_avatar";
		}
		if ($_SESSION['reg_step']=="reg_info"){
			header('location:index.php?user&q=action/reg_info');
		}elseif ($_SESSION['reg_step']=="reg_avatar"){
			header('location:index.php?user&q=action/reg_avatar');
		}elseif ($_SESSION['reg_step']=="") {
			header('location:index.php?user');
		}else{
			$result = $user->GetOne(array("user_id"=>$_G['user_id']));
			if ($result['email_status']==1){
				if ($result['avatar_status']==1){
					$_SESSION['reg_step']="";
					header('location:index.php?user');
					exit;
				}else{
					$_SESSION['reg_step']="reg_avatar";
					header('location:index.php?user&q=action/reg_avatar');
					exit;
				}
			}else{
				$_U['sendemail'] = $result['email'];
				$emailurl = "http://mail.".str_replace("@","",strstr($result['email'],"@"));
				$_U['emailurl'] = $emailurl;
				$template = 'user_reg_email.html';
			}
		}
	}
	
	# ���ͼ����ʼ�
	elseif ($_U['query_class'] == 'reg_send_email'){
		if ($_G['user_id']==""){
			echo "<br>��������";
		}elseif ($_SESSION['reg_step']=="reg_avatar"){
			header('location:index.php?user&q=action/reg_avatar');
		}elseif ($_SESSION['reg_step']=="" && !isset($_REQUEST['active'])) {
			header('location:index.php?user');
		}else{
			$data['user_id'] = $_G['user_id'];
			$result = $user->GetOne($data);
			if ($result['email_status']==1 && !isset($_REQUEST['active'])){
				if ($result['avatar_status']==1){
					$_SESSION['reg_step']=="";
					header('location:index.php?user');
				}else{
					header('location:index.php?user&q=action/reg_avatar');
				}
			}else{
				$data['email'] = $result['email'];
				$data['username'] = $result['username'];
				$data['webname'] = $_G['system']['con_webname'];
				$data['title'] = "ע���ʼ�ȷ��";
				$data['msg'] = RegEmailMsg($data);
				$data['type'] = "reg";
				if (isset($_SESSION['sendemail_time']) && $_SESSION['sendemail_time']+60*2>time()){
					echo "<br>��2���Ӻ��ٴ�����<br><br>�����ұߵĹرհ�ť�رա�";
				}else{
					$result = userClass::SendEmail($data);
					if ($result) {
						$_SESSION['sendemail_time'] = time();
						echo "<br>���ͳɹ�����鿴����ʼ���Ϣ<br><br>�����ұߵĹرհ�ť�رա�";
					}
					else{
						echo "<br>����ʧ�ܣ��������Ա��ϵ<br><br>�����ұߵĹرհ�ť�رա�";
					}
				}
			}
		}
		exit;
	}
	
	
	# ����
	elseif ($_U['query_class'] == 'active') {
		require_once("modules/credit/credit.class.php");
		$id = urldecode($_REQUEST['id']);
		$_id = explode(",",authcode(trim($id),"DECODE"));
		$data['user_id'] = $_id[0];
		$result = $user->ActiveEmail($data);
		
		$result = creditClass::GetTypeOne(array("nid"=>"email"));
		$_A['arrestation_value'] = $result['value'];
		$_A['credit_type_id'] = $result['id'];
		$_A['credit_type_name'] = $result['name'];
		$credit['nid'] = "email";
		$credit['user_id'] = $data['user_id'];
		$credit['value'] = $result['value'];
		$credit['op_user'] = 0;
		$credit['op'] = 1;//����
		$credit['type_id'] = $result['id'];
		$credit['remark'] = "������֤�ɹ�";
		creditClass::UpdateCredit($credit);//���»���
		if ($result!=false) {
			$msg = array('���伤��ɹ�','','index.php?user');
		}
		else{
			$msg = array('����ʧ��','','index.php?user&q=reg_email');
		}
		
	}
	
	# ͷ��
	elseif ($_U['query_class'] == 'reg_avatar') {
		if($_G['user_id']==""){
			header('location:index.php?user&q=action/login');
			exit;
		}
		if (isset($_REQUEST['jump']) && $_REQUEST['jump'] == "true"){
			$_SESSION['reg_step'] = "";
		}
		
		if (isset($_SESSION['reg_step']) && $_SESSION['reg_step']=="reg_email"){
			header('location:index.php?user&q=action/reg_email');
			exit;
		}elseif ($_SESSION['reg_step']=="" ) {
			header('location:index.php?user');
			exit;
		}else{
			error_reporting(0);
			$data['user_id'] = $_G['user_id'];
			$data['istrue'] = true;
			if (get_avatar($data)){
				$user->ActiveAvatar($data);
				$_SESSION['reg_step'] = "";
				header('location:index.php?user');
				exit;
			}else{
				$template = 'user_reg_avatar.html';
			}
		}
	}
	
	# ȡ������ҳ��
	elseif ($_U['query_class'] == 'getpwd'){
		include_once("getpwd.php");
	}
	
	# �����޸�����
	elseif ($_U['query_class'] == 'updatepwd'){
		$updatepwd_msg = "";
		if(isset($_REQUEST['id'])){
			$user_id = $_REQUEST['id'];
			if (!isset($_SESSION['update_pwd_user']) || !isset($_SESSION['pwdRandKey']) || $_REQUEST['rand'] != $_SESSION['pwdRandKey']) {
				die('�����½��������һز���,�����һ��ڼ��벻Ҫ�ر������');
			}
			if ($user_id != $_SESSION['update_pwd_user']) {
				die('�Ƿ�id');
			}
			$start_time = time();
			if ($user_id==""){
				$updatepwd_msg = "���Ĳ������������Ҳ���";
			}elseif (time()>$start_time+60*60){
				$updatepwd_msg = "�������Ѿ����ڣ�����������";
			}else{
				$result = $user->GetOne(array("user_id"=>$user_id));
				if ($result == false){
					$updatepwd_msg = "���Ĳ������������Ҳ���";
				}else{
					$_U['user_result'] =  $result;
				}
			}
		} else {
			die("���Ĳ������������Ҳ���");
		}
		
		$updatepwd_msg = "";
		if (isset($_POST['password']) && $updatepwd_msg == "") {
		    if (!isset($_SESSION['update_pwd_user']) || !isset($_SESSION['pwdRandKey']) || $_REQUEST['rand'] != $_SESSION['pwdRandKey']) {
				die('�����½��������һز���,�����һ��ڼ��벻Ҫ�ر������');
			}
			if ($user_id != $_SESSION['update_pwd_user']) {
				die('�Ƿ�id');
		    }
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			if ($password==""){
				$update_msg = "�����벻��Ϊ��";
			}elseif ( strlen($password)<6 || strlen($password)>15){
				$update_msg = "����ĳ�����6��15λ֮��";
			}elseif ($password != $confirm_password){
				$update_msg = "�������벻һ��";
			}else{
				$index['user_id'] = $user_id;
				$index['password'] = $password;
				$result = $user->UpdateUser($index);
				if ($result==false){
					$update_msg = "���Ĳ������������Ҳ���";
				}else{
					$updatepwd_msg = "�����޸ĳɹ���";
				}
			}
		}
		
		$_U['update_msg'] = $update_msg;
		$_U['updatepwd_msg'] = $updatepwd_msg;
		$template = 'user_updatepwd.html';
		
	}
	# �����ʾ
	elseif ($_U['query_class'] == 'check'){
		echo "<br>";
		if ($_G['user_result']['real_status']==0){
			echo "�㻹û��ͨ������ʵ����֤<br><br><br>";
			echo "<a href='/index.php?user&q=code/user/realname'>����ʵ����֤</a>";
		}
		exit;
	}
	
	#Ҫ�����ע��	
	elseif ($_U['query_class'] == "reginvite"){	
		$_user_id = Url2Key($_REQUEST['u'],"reg_invite");
		$_SESSION['reginvite_user_id'] = $_user_id[1];
		header('location:index.php?user&q=action/reg');
	}	
# �û����Ĵ������ݵĵط�	
}elseif ($_U['query_sort'] == "code"){
	if  (!isset($_G['user_id']) || $_G['user_id']==""){
		//΢�ŵ�¼
		if(strstr($_SERVER['REQUEST_URI'],'/wx/') || !empty($_REQUEST['wx'])){
			header('location:index.php?user&q=action/login&wx=1');
		}else{
			header('location:index.php?user&q=action/login');
		}
	}
	
	if (is_file(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php")){
		include(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php");
	}else{
		$msg = array("���������������Ҳ���");
	}

}else{
	$template = "integral.html";
}

if(strstr($_G['query_site'],'product')){
	//��Ʒ����
	$data['id'] = $_REQUEST['id'];
	$result = integralClass::GetOne($data);
	if (is_array($result)){
		$_A['integral_result'] = $result;
	}else{
		$msg = array("��������");
	}
	$template = "product.html";
	if(!empty($_REQUEST['act']) && $_REQUEST['act']=='c'){
		
		//��¼�ж�
		if(empty($_G['user_id'])){
			//header('location:/index.php?user&q=action/login');
			//δ��¼
			$msg = array('���ȵ�¼','ǰ����¼','/index.php?user&q=action/login');
		}elseif($_G['user_result']['integral'] < $_A['integral_result']['need']){
			//���ֲ���
			$msg = array('���ֲ���','���ػ����̳�','/integral/main.html');
		}else{
			if(!empty($_POST['submit'])){
				
				if (empty($_REQUEST['view'])){
					$data1=array();
					$data1['user_id'] = $_G['user_id'];
					$data1['goods_id'] = $_REQUEST['id'];
					$data1['number'] = 1;
					$data1['status'] = 1;
					$data1['remark'] = $_POST['remark'];
					$data1['address'] = $_POST['address'];
					$data1['receiver'] = $_POST['receiver'];
					$data1['phone'] = $_POST['phone'];
					$data1['remark'] = empty($_POST['remark'])?'':$_POST['remark'];
					$result = integralClass::AddConvert($data1);
					if(!empty($result)){
						$msg = array('�һ��ɹ�','','/integral/main.html');
						echo "<script>alert('�һ��ɹ�');location.href='/integral/main.html';</script>";
					}else{
						$msg = array('�һ�ʧ��','','/integral/main.html');
						echo "<script>alert('�һ�ʧ��');location.href='/integral/main.html';</script>";
					}
				}else{
					$data['id'] = $_REQUEST['id'];
					$result = integralClass::GetConvertOne($data);
					if (is_array($result)){
						$_A['integral_convert_result'] = $result;
					}else{
						$msg = array("��������");
					}
				}

			}else{
				$template = "delivery_address.html";
			}
		}
	}
}elseif(strstr($_G['query_site'],'convert_log')){
	//�һ���¼ģ��
	//��¼�ж�
	if(empty($_G['user_id'])){
		header('location:/index.php?user&q=action/login');
	}
	
	if(empty($_REQUEST['log_id'])){
		$data_log['page'] = $_REQUEST['page'];
		$data_log['epage'] = 20;
		$data_log['user_id'] = $_G['user_id'];
		if (isset($_REQUEST['goods_name']) && $_REQUEST['goods_name']!=""){
		$data_log['goods_name'] = $_REQUEST['goods_name'];
		}
		if (isset($_REQUEST['sendStatus']) && $_REQUEST['sendStatus']!=""){
		$data_log['status'] = $_REQUEST['sendStatus'];
		}
		$convert_log = integralClass::GetConvertList($data_log);
		if (is_array($convert_log)){
			$pages->set_data($convert_log);
			$_A['convert_log'] = $convert_log['list'];
			$_A['showpage'] = $pages->show(3);
		}
		$_A['convert_log_type'] = 'list';
	}else{
		//�����һ���¼
		$data_detail['id'] = $_REQUEST['log_id'];
		$_A['convert_detail'] = integralClass::GetConvertOne($data_detail);
		$_A['convert_log_type'] = 'detail';
		if($_A['convert_detail']['user_id']!=$_G['user_id']){
			header('location:/integral/convert_log/main.html');
		}
		if(!empty($_REQUEST['act']) && $_REQUEST['act']=='cancel'){
			$integral = $_A['convert_detail']['need'];
			$sql = "update {user} set integral = integral + $integral where user_id = '{$_G['user_id']}'";
			$mysql->db_query($sql);
			$id = $_A['convert_detail']['id'];
			$sql = "update `{integral_convert}` set status=2 where id='$id'";
			$mysql->db_query($sql);
			$msg = array('ȡ���ɹ�','','/integral/convert_log/main.html');
			//echo "<script>alert('ȡ���ɹ�');location.href='/integral/convert_log/main.html';</script>";
		}
	}
	$template = "convert_log.html";
}else{
	//��Ʒ�һ��б�
	$data_list['page'] = $_REQUEST['page'];
	$data_list['epage'] = 20;
	$data_list['name'] = isset($_REQUEST['name'])?$_REQUEST['name']:"";
	$data_list['price'] = empty($_REQUEST['price'])?'':$_REQUEST['price'];
	$data_list['type'] = empty($_REQUEST['type'])?'':$_REQUEST['type'];
	$data_list['order'] = empty($_REQUEST['order'])?'':$_REQUEST['order'];
	$data_list['k'] = empty($_REQUEST['k'])?'':urldecode($_REQUEST['k']);
	$_A['product_k'] = $data_list['k'];
	if(empty($data_list['order'])){
		$_A['default_order'] = 1;
		$_A['inte_order'] = 1;
		$_A['time_order'] = 1;
		$_A['order_type'] = 'default';
	}else{
		$_order_arr = explode(',',$data_list['order']);
		switch($_order_arr[0]){
			case 'default':
				if($_order_arr[1]==1){
					$_A['default_order'] = 0;
				}else{
					$_A['default_order'] = 1;
				}
				$_A['inte_order'] = 0;
				$_A['time_order'] = 0;
				$_A['order_type'] = 'default';
    			break;
    		case 'time':
				if($_order_arr[1]==1){
					$_A['time_order'] = 0;
				}else{
					$_A['time_order'] = 1;
				}
				$_A['default_order'] = 0;
				$_A['inte_order'] = 0;
				$_A['order_type'] = 'time';
    			break;
    		case 'inte':
				if($_order_arr[1]==1){
					$_A['inte_order'] = 0;
				}else{
					$_A['inte_order'] = 1;
				}
				$_A['default_order'] = 0;
				$_A['time_order'] = 0;
				$_A['order_type'] = 'inte';
    			break;
    	}
		$_A['product_order'] = $data_list['order'];
	}
	if(!empty($_REQUEST['price'])){
		$_A['product_price'] = $_REQUEST['price'];
	}
	if(!empty($_REQUEST['type'])){
		$_A['product_type'] = $_REQUEST['type'];
	}
	$result = integralClass::GetList($data_list);
	if (is_array($result)){
		$result['url'] = '/integral/main.html?keyword='.$_A['product_k'];
		$pages->set_data($result);
		$_A['integral_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
}

//�ɹ��һ��б�
$data_convert['page'] = 5;
$data_convert['epage'] = 20;
$data_convert['status'] = 1;
$result_convert = integralClass::GetConvertList($data_convert);
if (is_array($result_convert)){
	$_A['convert_list'] = $result_convert['list'];
}

//ϵͳ��Ϣ�����ļ�
if (isset($msg) && $msg!="") {
	$_msg = $msg[0];
	$content = empty($msg[1])?"������һҳ":$msg[1];
	$url = empty($msg[2])?"-1":$msg[2];
	$http_referer = empty($_SERVER['HTTP_REFERER'])?"":$_SERVER['HTTP_REFERER'];
	if ($http_referer == "" && $url == ""){ $url = "/";}
	if ($url == "-1") $url = "";
	elseif ($url == "" ) $url = $http_referer;
	$_U['showmsg'] = array('msg'=>$_msg,"url"=>$url,"content"=>$content);
	$template = "user_msg.html";
}

function set_session($data = array()){
	$_SESSION['username'] = isset($data['username'])?$data['username']:"";
	$_SESSION['uc_user_id'] = isset($data['uc_user_id'])?$data['uc_user_id']:"";
	$_SESSION['user_typeid'] = isset($data['user_typeid'])?$data['user_typeid']:"";
	$_SESSION['usertime'] = time();
	$_SESSION['usertype'] = 0;
}
$magic->assign("_A",$_A);
$magic->assign("_U",$_U);
$magic->display($template);
exit;	
?>