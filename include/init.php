<?php

/**
 * @Intro	��ʼ��
 * @Author	wuu!
 * @Email   easy_borrow@163.com
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/include/function.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/include/config.php'; // ���������ļ�
include_once $_SERVER['DOCUMENT_ROOT'].'/include/dbCore.php';

// ��get request��ʽ��������ݽ������ϸ�ķ�ע�����
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

// ǿ��ת��session���û�idΪ����
if (isset($_SESSION['user_id'])) {
	$_SESSION['user_id'] = intval($_SESSION['user_id']);
}
