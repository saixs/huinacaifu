<?php

define('UC_CONNECT', 'mysql');				// ���� UCenter �ķ�ʽ: mysql/NULL, Ĭ��Ϊ��ʱΪ fscoketopen()
							// mysql ��ֱ�����ӵ����ݿ�, Ϊ��Ч��, ������� mysql

//���ݿ���� (mysql ����ʱ, ����û������ UC_DBLINK ʱ, ��Ҫ�������±���)
define('UC_DBHOST', 'localhost');			// UCenter ���ݿ�����
define('UC_DBUSER', 'kvnkdouir');				// UCenter ���ݿ��û���
define('UC_DBPW', 'dkivihvjdshufue');					// UCenter ���ݿ�����
define('UC_DBNAME', 'hsDiscuz');				// UCenter ���ݿ�����
define('UC_DBCHARSET', 'gbk');				// UCenter ���ݿ��ַ���
define('UC_DBTABLEPRE', '`hsDiscuz`.pre_ucenter_');			// UCenter ���ݿ��ǰ׺
define('UC_PCONNECT', 0);

//ͨ�����
define('UC_KEY', '3cQ4c008Z7q5E3Qf16F0H7EeF7l5u1caq3G6U5m6U0TfEeK9c1mfwcO31dt4ldo9');				// �� UCenter ��ͨ����Կ, Ҫ�� UCenter ����һ��
define('UC_API', 'http://www.bljinrong.com/bbs/uc_server');	// UCenter �� URL ��ַ, �ڵ���ͷ��ʱ�����˳���
define('UC_CHARSET', 'gbk');				// UCenter ���ַ���
define('UC_IP', '');					// UCenter �� IP, �� UC_CONNECT Ϊ�� mysql ��ʽʱ, ���ҵ�ǰӦ�÷�������������������ʱ, �����ô�ֵ
define('UC_APPID', 1);					// ��ǰӦ�õ� ID

//ͬ����¼ Cookie ����
$cookiedomain = ''; 			// cookie ������
$cookiepath = '/';			// cookie ����·��