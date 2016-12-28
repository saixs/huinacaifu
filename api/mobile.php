<?php
/**
 * Created by JetBrains PhpStorm.
 * @Author      Wuu!
 * @Date        13-7-17上午11:06
 * @Intro       
 * @Email       easy_borrow@163.com
 */
include_once PLUGINS_DIR.'mobile/mobileInit.php';
class mobile extends tempVerifyModel{

	/*
	 * 生成session验证码 并发送短信
	 * return int 0 为发送成功 其他调用 getStatusName 获取错误信息
	 */
	function sendVerify($userId, $phone = array(), $isApprove = 0) {
		$_time = time();
		// 检查上次发送验证码时间
		if (!$this->flashTimeCheck($userId)) {
			return -1;
		}

		$user_info = $this->approveInfo($userId);
		if ($isApprove) {
			// 如果当前请求验证码为手机认证
			if ($user_info) // 但是手机已经认证
				return -2;
		} else {
			// 如果当前请求验证码不是手机认证
			if (!$user_info) // 但是手机没有通过认证
				return -3;
		}

		// 准备本次验证码发送信息
		$time        = date('Y-m-d H:i:s', $_time);
		$commonModel = new commonModel();
		$mobileInfo  = $commonModel->copeNameValue('mobile');
		$verifyCode  = mt_rand(1000000,9999999);
		$content = $mobileInfo['suffix'].'您于'.$time.'申请的'.$this->typeName.'为:'.$verifyCode.',退订回复TD'.$mobileInfo['prefix'];

		$updateResult = $this->updateTempVerify($verifyCode, $_SESSION['user_id'], $_time);

		if (empty($phone))
			$_phone = array($user_info['phone_number']);
		else
			$_phone = $phone;
		if ($updateResult)
			return $this->send($_phone,$content);
		else
			return -4;
	}

	/**
	 * 检查用户是否开启了指定项目的短信定制
	 * @param        $user_id
	 * @param string $item_name
	 *
	 * @return mixed
	 */
	function checkMobileVerifyStatus($user_id,$item_name = '') {
		global $db;
		if ($item_name) {
			$select_item = "p1.`$item_name`,";
			$where_item = "and p1.`$item_name`=1";
		} else {
			$select_item = '';
			$where_item = '';
		}
		$sql = "SELECT $select_item p1.`is_on`,p2.`phone_number` FROM `previous_mobile_setting` AS p1
				LEFT JOIN `previous_users` AS p2
				ON p1.`user_id`=p2.`id`
				WHERE p1.`user_id`=$user_id AND p1.`is_on`=1 $where_item";
		$res = $db->fetchOneByNormal($sql);
		return $res;
	}

	/*
	 * 向mobile表插入一行用户数据
	 * @return null 零行, false 语句错误
	 */
	function mobileInsert($user_id) {
		global $db;
		$sql = "insert into `previous_mobile_setting` set `user_id`=$user_id";
		$res = $db->executeDMLByNormal($sql);
		return $res;
	}

	/**
	 * 获取用户mobile_setting信息 如果没有自动初始化
	 * @param $user_id
	 *
	 * @return mixed 结果集, false 自动初始化失败
	 */
	function getSetting($user_id) {
		global $db;
		$user_id = intval($user_id);
		$sql = "SELECT * FROM `previous_mobile_setting` WHERE `user_id`={$user_id}";
		$result = $db->fetchOneByNormal($sql);
		if (!$result) {
			$res = $this->mobileInsert($user_id);
			if (!$res) {
				return false;
			}
			$sql = "SELECT * FROM `previous_mobile_setting` WHERE `user_id`={$user_id}";
			$result = $db->fetchOneByNormal($sql);
		}
		return $result;
	}

	/*
	 * 检查mobile表中是否有用户数据
	 * @return null false 表示没有该用户数据
	 */
	function checkMobileTable($user_id) {
		global $db;
		$sql = "select * from `previous_mobile_setting` where `user_id`=$user_id";
		$res = $db->fetchOneByNormal($sql);
		return $res;
	}

	public function updateSetting($user_id) {
		global $db;
		$_sql = $this->getMobileCustomFiled();
		$sql  = "UPDATE `previous_mobile_setting` SET {$_sql} WHERE `user_id`={$user_id}";
		$result = $db->executeDMLByNormal($sql);
		return $result;
	}

	/*
	 * 对比mobile表字段与post数据索引相同的交集 剔除id 与 user_id后 生成需要更新的sql语句
	 * return string 例: `is_on`=1,`cash=0`...
	 */
	function getMobileCustomFiled() {
		global $db;
		$sql = "SHOW COLUMNS FROM `previous_mobile_setting`";
		$result = $db->fetchAllByNormal($sql);
		$_result = array();
		foreach ($result as $value) {
			$_result[] = $value['Field'];
		}

		$_sql = '';
		foreach ($_result as $value) {
			if (isset($_POST[$value]) && $_POST[$value] == 1) {
				if ($value != 'id' && $value != 'user_id') {
					$_sql .= "`$value`=1,";
				}
			} else {
				if ($value != 'id' && $value != 'user_id') {
					$_sql .= "`$value`=0,";
				}
			}
		}
		return rtrim($_sql,',');
	}

	/**
	 * 短信发送 用例
	 */
	function send($phone = array(),$content) {
		global $client;
		/**
		 * 下面的代码将发送内容为 test 给 159xxxxxxxx 和 159xxxxxxxx
		 * $client->sendSMS还有更多可用参数，请参考 Client.php
		 */
		$statusCode = $client->sendSMS($phone,$content);
		return $statusCode;
	}

	/*
	 * 短信发送失败后 用以接受错误返回码 并返回实际错误信息
	 */
	function sendStatusName($status) {
		switch($status) {
			case 0     : $str = '短信发送成功,请注意接收!';break;
			case -1    : $str = '距离上次发件请求间隔少于'.$this->allowFlashTime.'分钟,请稍后尝试!';break;
			case -2    : $str = '您的电话已经通过认证,请不要重复申请发送验证码!';break;
			case -3    : $str = '您的手机尚未通过认证,请先认证手机号码!';break;
			case -4    : $str = '抱歉短信发送失败!临时验证信息写入数据库失败,请联系系统管理员,告之此错误!';break;
			case '17'  : $str = '发送信息失败';break;
			case '18'  : $str = '发送定时信息失败';break;
			case '303' : $str = '客户端网络故障';break;
			case '305' : $str = '服务器端返回错误，错误的返回值';break;
			case '307' : $str = '目标电话号码不符合规则，电话号码必须是以0、1开头';break;
			case '997' : $str = '平台返回找不到超时的短信，该信息是否成功无法确定';break;
			case '998' : $str = '由于客户端网络问题导致信息发送超时，该信息是否成功下发无法确定';break;
			default    : $str = '短信发送产生未知错误!错误信息:'.$status.',请与系统管理员联系!';
		}
		return $str;
	}
}