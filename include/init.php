<?php

/**
 * @Intro	初始化
 * @Author	wuu!
 * @Email   easy_borrow@163.com
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/include/function.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/include/config.php'; // 载入配置文件
include_once $_SERVER['DOCUMENT_ROOT'].'/include/dbCore.php';

// 对get request方式传输的数据进行最严格的防注入过滤
foreach ($_GET as $key=>$value) {
	$_GET[$key] = clearRequest($value);
}

foreach ($_REQUEST as $key=>$value) {
	$_GET[$key] = clearRequest($value);
}

//clearBuffer();

global $db;
$db = new dbCore();

@session_start();

// 强制转换session中用户id为整形
if (isset($_SESSION['user_id'])) {
	$_SESSION['user_id'] = intval($_SESSION['user_id']);
}
