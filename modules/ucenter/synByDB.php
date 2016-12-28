<?php
/**
 * UCenter 应用程序开发 Example
 *
 * UCenter 简易应用程序，应用程序有自己的用户表
 * 使用到的接口函数：
 * uc_authcode()	可选，借用用户中心的函数加解密 Cookie
 * uc_pm_checknew()	可选，用于全局判断是否有新短消息，返回 $newpm 变量
 */
include $_SERVER['DOCUMENT_ROOT'].'/modules/ucenter/config.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'/modules/ucenter/include/db_mysql.class.php';

include $_SERVER['DOCUMENT_ROOT'].'/modules/ucenter/uc_client/client.php';
/**
 * 获取当前用户的 UID 和 用户名
 * Cookie 解密直接用 uc_authcode 函数，用户使用自己的函数
 */
if(!empty($_COOKIE['Example_auth'])) {
	list($Example_uid, $Example_username) = explode("\t", uc_authcode($_COOKIE['Example_auth'], 'DECODE'));
} else {
	$Example_uid = $Example_username = '';
}

/**
 * 根据同步类型加载同步功能代码
 */
switch(SYN_TYPE) {
	case 'login':
		//UCenter 用户登录的 Example 代码
		include 'code/login_db.php';
	break;
	case 'logout':
		//UCenter 用户退出的 Example 代码
		include 'code/logout.php';
	break;
	case 'register':
		//UCenter 用户注册的 Example 代码
		include 'code/register_db.php';
	break;
}

?>