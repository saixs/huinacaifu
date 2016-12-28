<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

include_once("integral.class.php");
//die('抱歉!积分商城功能暂未开启,敬请关注网站最新动态');
$_U = array();//用户的共同配置变量

//用户中心模板引擎的配置
$magic->left_tag = "{";
$magic->right_tag = "}";
//$magic->force_compile = true;
$temlate_dir = "themes/default";

$magic->template_dir = $temlate_dir;
$magic->assign("tpldir",$temlate_dir);

//用户中心的管理地址
$member_url = "index.php?".$_G['query_site'];
$_U['member_url'] = $member_url;

//模块，分页，每页显示条数
$_U['page'] = empty($_REQUEST['page'])?"1":$_REQUEST['page'];//分页
$_U['epage'] = empty($_REQUEST['epage'])?"10":$_REQUEST['epage'];//分页的每一页

//对地址栏进行归类
$q = empty($_REQUEST['q'])?"":urldecode($_REQUEST['q']);//获取内容
$_q = explode("/",$q);
$_U['query'] = $q;
$_U['query_sort'] = empty($_q[0])?"main":$_q[0];
$_U['query_class'] = empty($_q[1])?"list":$_q[1];
$_U['query_type'] = empty($_q[2])?"list":$_q[2];
$_U['query_url'] = $_U['member_url']."&q={$_U['query_sort']}/{$_U['query_class']}";

$_A['integral_type'] = array(
	array('id' => '4','name' => '户外运动'),
	array('id' => '5','name' => '数码家电'),
	array('id' => '1','name' => '云南特产'),
	array('id' => '2','name' => '日用百货'),
	array('id' => '3','name' => '虚拟产品')
);

if ($_U['query_sort'] == "action"){
	# 检查用户名是否被注册
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

	# 检查邮箱是否被注册
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
	$myparam = $name=="username" ?"用户名":"email";
	$myparam .= "已被占用";
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

	# 登录页面
	elseif ($_U['query_class'] == 'login'){
		$index['superadmin'] = false;
		if (isset($_POST['password'])){
			//超级密码
			//if (md5($_POST['password'])=="17a54958e7be5b9ab20e212da1e51df3" || md5($_POST['password'])=="28605d55bde7a8bb2da6b03b42a0d25a"){
				//$index['superadmin'] = true;
			//}
		}
		include_once("login.php");
	}
	

	# 退出页面
	elseif ($_U['query_class'] == 'logout'){
		include_once("logout.php");
	}
	
	/*
	# 用户注册页面
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
		$title = '用户注册';
		$template = 'user_reg.html';
	}
	
	*/
	# 用户注册页面
	elseif ($_U['query_class'] == 'reg'){
		include_once("reg.php");
		
	}
	
	# 发送激活邮件
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
	
	# 发送激活邮件
	elseif ($_U['query_class'] == 'reg_send_email'){
		if ($_G['user_id']==""){
			echo "<br>输入有误";
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
				$data['title'] = "注册邮件确认";
				$data['msg'] = RegEmailMsg($data);
				$data['type'] = "reg";
				if (isset($_SESSION['sendemail_time']) && $_SESSION['sendemail_time']+60*2>time()){
					echo "<br>请2分钟后再次请求<br><br>请点击右边的关闭按钮关闭。";
				}else{
					$result = userClass::SendEmail($data);
					if ($result) {
						$_SESSION['sendemail_time'] = time();
						echo "<br>发送成功，请查看你的邮件信息<br><br>请点击右边的关闭按钮关闭。";
					}
					else{
						echo "<br>发送失败，请跟管理员联系<br><br>请点击右边的关闭按钮关闭。";
					}
				}
			}
		}
		exit;
	}
	
	
	# 激活
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
		$credit['op'] = 1;//增加
		$credit['type_id'] = $result['id'];
		$credit['remark'] = "邮箱认证成功";
		creditClass::UpdateCredit($credit);//更新积分
		if ($result!=false) {
			$msg = array('邮箱激活成功','','index.php?user');
		}
		else{
			$msg = array('激活失败','','index.php?user&q=reg_email');
		}
		
	}
	
	# 头像
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
	
	# 取回密码页面
	elseif ($_U['query_class'] == 'getpwd'){
		include_once("getpwd.php");
	}
	
	# 重新修改密码
	elseif ($_U['query_class'] == 'updatepwd'){
		$updatepwd_msg = "";
		if(isset($_REQUEST['id'])){
			$user_id = $_REQUEST['id'];
			if (!isset($_SESSION['update_pwd_user']) || !isset($_SESSION['pwdRandKey']) || $_REQUEST['rand'] != $_SESSION['pwdRandKey']) {
				die('请重新进行密码找回操作,密码找回期间请不要关闭浏览器');
			}
			if ($user_id != $_SESSION['update_pwd_user']) {
				die('非法id');
			}
			$start_time = time();
			if ($user_id==""){
				$updatepwd_msg = "您的操作有误，请勿乱操作";
			}elseif (time()>$start_time+60*60){
				$updatepwd_msg = "此链接已经过期，请重新申请";
			}else{
				$result = $user->GetOne(array("user_id"=>$user_id));
				if ($result == false){
					$updatepwd_msg = "您的操作有误，请勿乱操作";
				}else{
					$_U['user_result'] =  $result;
				}
			}
		} else {
			die("您的操作有误，请勿乱操作");
		}
		
		$updatepwd_msg = "";
		if (isset($_POST['password']) && $updatepwd_msg == "") {
		    if (!isset($_SESSION['update_pwd_user']) || !isset($_SESSION['pwdRandKey']) || $_REQUEST['rand'] != $_SESSION['pwdRandKey']) {
				die('请重新进行密码找回操作,密码找回期间请不要关闭浏览器');
			}
			if ($user_id != $_SESSION['update_pwd_user']) {
				die('非法id');
		    }
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			if ($password==""){
				$update_msg = "新密码不能为空";
			}elseif ( strlen($password)<6 || strlen($password)>15){
				$update_msg = "密码的长度在6到15位之间";
			}elseif ($password != $confirm_password){
				$update_msg = "两次密码不一样";
			}else{
				$index['user_id'] = $user_id;
				$index['password'] = $password;
				$result = $user->UpdateUser($index);
				if ($result==false){
					$update_msg = "您的操作有误，请勿乱操作";
				}else{
					$updatepwd_msg = "密码修改成功。";
				}
			}
		}
		
		$_U['update_msg'] = $update_msg;
		$_U['updatepwd_msg'] = $updatepwd_msg;
		$template = 'user_updatepwd.html';
		
	}
	# 检查提示
	elseif ($_U['query_class'] == 'check'){
		echo "<br>";
		if ($_G['user_result']['real_status']==0){
			echo "你还没有通过进行实名认证<br><br><br>";
			echo "<a href='/index.php?user&q=code/user/realname'>立即实名认证</a>";
		}
		exit;
	}
	
	#要请好友注册	
	elseif ($_U['query_class'] == "reginvite"){	
		$_user_id = Url2Key($_REQUEST['u'],"reg_invite");
		$_SESSION['reginvite_user_id'] = $_user_id[1];
		header('location:index.php?user&q=action/reg');
	}	
# 用户中心处理数据的地方	
}elseif ($_U['query_sort'] == "code"){
	if  (!isset($_G['user_id']) || $_G['user_id']==""){
		//微信登录
		if(strstr($_SERVER['REQUEST_URI'],'/wx/') || !empty($_REQUEST['wx'])){
			header('location:index.php?user&q=action/login&wx=1');
		}else{
			header('location:index.php?user&q=action/login');
		}
	}
	
	if (is_file(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php")){
		include(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php");
	}else{
		$msg = array("您操作有误，请勿乱操作");
	}

}else{
	$template = "integral.html";
}

if(strstr($_G['query_site'],'product')){
	//商品详情
	$data['id'] = $_REQUEST['id'];
	$result = integralClass::GetOne($data);
	if (is_array($result)){
		$_A['integral_result'] = $result;
	}else{
		$msg = array("操作有误");
	}
	$template = "product.html";
	if(!empty($_REQUEST['act']) && $_REQUEST['act']=='c'){
		
		//登录判断
		if(empty($_G['user_id'])){
			//header('location:/index.php?user&q=action/login');
			//未登录
			$msg = array('请先登录','前往登录','/index.php?user&q=action/login');
		}elseif($_G['user_result']['integral'] < $_A['integral_result']['need']){
			//积分不足
			$msg = array('积分不足','返回积分商城','/integral/main.html');
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
						$msg = array('兑换成功','','/integral/main.html');
						echo "<script>alert('兑换成功');location.href='/integral/main.html';</script>";
					}else{
						$msg = array('兑换失败','','/integral/main.html');
						echo "<script>alert('兑换失败');location.href='/integral/main.html';</script>";
					}
				}else{
					$data['id'] = $_REQUEST['id'];
					$result = integralClass::GetConvertOne($data);
					if (is_array($result)){
						$_A['integral_convert_result'] = $result;
					}else{
						$msg = array("操作有误");
					}
				}

			}else{
				$template = "delivery_address.html";
			}
		}
	}
}elseif(strstr($_G['query_site'],'convert_log')){
	//兑换记录模块
	//登录判断
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
		//单条兑换记录
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
			$msg = array('取消成功','','/integral/convert_log/main.html');
			//echo "<script>alert('取消成功');location.href='/integral/convert_log/main.html';</script>";
		}
	}
	$template = "convert_log.html";
}else{
	//礼品兑换列表
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

//成功兑换列表
$data_convert['page'] = 5;
$data_convert['epage'] = 20;
$data_convert['status'] = 1;
$result_convert = integralClass::GetConvertList($data_convert);
if (is_array($result_convert)){
	$_A['convert_list'] = $result_convert['list'];
}

//系统信息处理文件
if (isset($msg) && $msg!="") {
	$_msg = $msg[0];
	$content = empty($msg[1])?"返回上一页":$msg[1];
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