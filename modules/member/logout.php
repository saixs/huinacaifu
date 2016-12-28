<?
# ÅÐ¶ÏÊÇ·ñUcenter
		if ($user->is_uc) {
			UcenterClient::LogOut();
		}
		if ($_G['is_cookie'] ==1){
	setcookie('user_id', 0, time()-999999);
	setcookie('temp_pwd', 0, time()-999999);
		}else{
			$_SESSION[Key2Url("user_id","hisdhkcjsew")] = "";
			$_SESSION['login_endtime'] = "";
			$_SESSION[Key2Url("user_id","hisdhkcjsew")] = "";
			if (isset($_SESSION[Key2Url("user_id","hisdhkcjsew")])) unset($_SESSION[Key2Url("user_id","hisdhkcjsew")]);
		}
		if (isset($_SESSION['username'])) unset($_SESSION['username']);
		if (isset($_SESSION['user_realname'])) unset($_SESSION['user_realname']);
		if (isset($_SESSION['user_typename'])) unset($_SESSION['user_typename']);
		if (isset($_SESSION['user_id'])) unset($_SESSION['user_id']);
		if (isset($_SESSION['userid'])) unset($_SESSION['userid']);
		if (isset($_SESSION['usertype'])) unset($_SESSION['usertype']);
		if (isset($_SESSION['usertime'])) unset($_SESSION['usertime']);
		if (isset($_SESSION['reg_step'])) unset($_SESSION['reg_step']);
		
		
		echo '<script language="javascript">window.location.href="/user/login.html";</script>';
		exit();
?>