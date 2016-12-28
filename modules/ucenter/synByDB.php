<?php
/**
 * UCenter Ӧ�ó��򿪷� Example
 *
 * UCenter ����Ӧ�ó���Ӧ�ó������Լ����û���
 * ʹ�õ��Ľӿں�����
 * uc_authcode()	��ѡ�������û����ĵĺ����ӽ��� Cookie
 * uc_pm_checknew()	��ѡ������ȫ���ж��Ƿ����¶���Ϣ������ $newpm ����
 */
include $_SERVER['DOCUMENT_ROOT'].'/modules/ucenter/config.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'/modules/ucenter/include/db_mysql.class.php';

include $_SERVER['DOCUMENT_ROOT'].'/modules/ucenter/uc_client/client.php';
/**
 * ��ȡ��ǰ�û��� UID �� �û���
 * Cookie ����ֱ���� uc_authcode �������û�ʹ���Լ��ĺ���
 */
if(!empty($_COOKIE['Example_auth'])) {
	list($Example_uid, $Example_username) = explode("\t", uc_authcode($_COOKIE['Example_auth'], 'DECODE'));
} else {
	$Example_uid = $Example_username = '';
}

/**
 * ����ͬ�����ͼ���ͬ�����ܴ���
 */
switch(SYN_TYPE) {
	case 'login':
		//UCenter �û���¼�� Example ����
		include 'code/login_db.php';
	break;
	case 'logout':
		//UCenter �û��˳��� Example ����
		include 'code/logout.php';
	break;
	case 'register':
		//UCenter �û�ע��� Example ����
		include 'code/register_db.php';
	break;
}

?>