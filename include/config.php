<?php

/**
 * @Intro   �����ļ�,���ݿ�����,��Ŀ·������
 * @Author  wuu!
 * @Email   easy_borrow@163.com
 */

if (!function_exists('checkAccess')) {
	die('�Ƿ�����');
}

// ���ݿ��������
const HOST    = 'localhost';
const PORT    = 3306;
const DB_NAME = 'bljr';
const DB_USER = 'root';
const DB_PWD  = 'dr979w0v6';
const DB_CHAR = 'gbk';
const DB_PREFIX  = 'dw_';
define('DSN', 'mysql:HOST=' . HOST . ';dbname=' . DB_NAME);

// ������·������
define('SERVER_ROOT'   , dirname(__FILE__) . '/');                  // ���ڷ������ļ�ϵͳ����վ��Ŀ¼����·��
define('PLUGINS_DIR'   , SERVER_ROOT  . '/plugins/');                // ��չĿ¼