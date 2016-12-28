<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

if (isset($_POST['password'])){
	$login_msg = "";
	
	if (isset($_POST['valicode']) && $_POST['valicode'] ==""){
		$msg = array("验证码不能为空","","?user&&q=action/login");
	}elseif ((strtolower($_POST['valicode'])!=$_SESSION['valicode'])){
		$msg = array("验证码不正确","","?user&&q=action/login");
	}elseif ($_POST['keywords']==""){
		$msg = array("账号不能为空","","?user&&q=action/login");
	}elseif ($_POST['password']==""){
		$msg = array("密码不能为空","","?user&&q=action/login");
	}else{
		if(!isset($index['user_id']) || $index['user_id']==""){
			$index['user_id'] = $_POST['keywords'];
		}
		$index['email'] =$_POST['keywords'];
		$index['username'] = $_POST['keywords'];
		$index['password'] = $_POST['password'];
		$result = $user->Login($index);
		if (is_array($result)) {
			if($result['islock']==1)
			{
				$msg = array("用户账户已经注销或者锁定,如有疑问，请联系客服",$_url);
			}
			else
			{
                $data['username'] = $result['username'];
                $data['user_id'] = $result['user_id'];
                $data['user_typeid'] = $result['type_id'];
                $data['reg_step'] = "";
		        $data['login_user_id'] = $result['user_id'];
                set_session($data);//注册session
                $_SESSION['user_id'] = $result['login_user_id'];
                $_url = '/index.php?user';

			    $ctime = time() + 12 * 60 * 60;
			
                if ($_G['is_cookie'] ==1){
					$code   = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";
					$string = '';
					for ($i = 0; $i < 12; $i++) {
						$char = $code{rand(0, strlen($code) - 1)};
						$string .= $char;
					}
					$temp_pwd = $string;
					// 查cookie表是否有改用户数据
					$sql = "select * from `dw_cookie` where `user_id`={$data['user_id']}";

					$check_result = mysql_query($sql);

					if ($check_result !== false){
						$row = mysql_fetch_assoc($check_result);
						if ($row !== false) {
							$isset = 1;
						} else {
							$isset = 0;
						}
					} else {
						die('查询语句错误!请与系统管理员联系!');
					}


					// 如果没有数据则插入
					$uTime = time();
					if (!$isset) {
						$sql = "insert into `dw_cookie` set `user_id`={$data['user_id']},`temp_pwd`='{$temp_pwd}',`life_time`={$ctime}";
						$result = mysql_query($sql);
					} else {
						$sql = "update `dw_cookie` set `temp_pwd`='{$temp_pwd}',`life_time`={$ctime} where `user_id`={$data['user_id']}";
						$result = mysql_query($sql);
					}
					setcookie('user_id', $data['user_id'], $ctime);
					setcookie('temp_pwd', $temp_pwd, $ctime);
					$_SESSION['login_user_id'] = $data['user_id'];
				} else {
                    $_SESSION[Key2Url("user_id","hisdhkcjsew")] = authcode($data['user_id'].",".time(),"ENCODE");
                    $_SESSION['login_endtime'] = $ctime;
                }
                // 注册步骤完成后 同步Ucenter登录
                /*define('SYN_TYPE', 'login');
                require_once ROOT_PATH . '/modules/ucenter/synByDB.php';
                $synLoginInfo = array(
                    'username'=>$index['username'],
                    'password'=>$index['password']
                );
                synLogin($synLoginInfo);*/

			    $msg = array("登录成功,系统将3秒后跳转","进入用户中心",$_url);
			}
			//setcookie("useradsf",1,time()+60*60);
			//var_dump(Key2Url("user_id","hisdhkcjsew"));var_dump($_SESSION);exit;
			/*
			if ($result['email_status']!=1){
				$_SESSION['reg_step'] = "reg_email";
				header('location:index.php?user&q=action/reg_email');
				exit;
			}elseif ($result['avatar_status']!=1){
				$_SESSION['reg_step'] = "reg_avatar";
				header('location:index.php?user&q=action/reg_avatar');
			}else{
				$_url = 'index.php?user';
				$msg = array("登录成功,系统将3秒后跳转","进入用户中心"，$_url);
			}
			*/
		}else{
			$msg = array($result);
		}
	}
$_U['login_msg'] = $login_msg;
}
$title = '用户登录';
$template = 'user_login.html';
?>