<?php

/**
 * @Intro   配置文件,数据库配置,项目路径配置
 * @Author  wuu!
 * @Email   easy_borrow@163.com
 */

if (!function_exists('checkAccess')) {
	die('非法访问');
}

// 数据库相关配置
const HOST    = 'localhost';
const PORT    = 3306;
const DB_NAME = 'bljr';
const DB_USER = 'root';
const DB_PWD  = 'dr979w0v6';
const DB_CHAR = 'gbk';
const DB_PREFIX  = 'dw_';
define('DSN', 'mysql:HOST=' . HOST . ';dbname=' . DB_NAME);

// 基本的路径配置
define('SERVER_ROOT'   , dirname(__FILE__) . '/');                  // 基于服务器文件系统的网站根目录绝对路径
define('PLUGINS_DIR'   , SERVER_ROOT  . '/plugins/');                // 扩展目录