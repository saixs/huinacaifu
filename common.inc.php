<?php
/******************************
 * $File: common.inc.php
 * $Description: 通用的数据库文件
 * $Author: dongdong 
 * $Time:2009-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/

if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

$db_config['host']     = 'localhost';      //数据库主机	
$db_config['user']     = 'root';      //数据库用户名	dskjhdifu
$db_config['pwd']      = '';  //数据库用户密码	878jhdsjf989oiuwe
$db_config['name']     = 'bljr';      //数据库名
//$db_config['name']     = 'gsdai';      //数据库名	
//$db_config['name']     = 'ok3lan7';      //数据库名	
$db_config['port']     = '3306';      //端口		
$db_config['prefix']   = 'dw_'; //CMS表名前缀	
$db_config['language'] = 'gbk'; //数据库字符集 gbk,latin1,utf8,utf8..

?>
