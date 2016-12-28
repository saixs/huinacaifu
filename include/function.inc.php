<?php
/**
 * @Author  Wuu!
 * @cTime   13-3-26 下午1:39
 * @Email   easy_borrow@163.com
 * Created  by JetBrains PhpStorm.
 */

// 检查用户访问文件的入口,只允许来自**一个**入口文件
function checkAccess ($allowModule = '') {
	if (!defined('HOME_ACCESS') && !defined('ADMIN_ACCESS')) {
		die('入口检测异常,非法访问!');
	}

	if (defined('HOME_ACCESS') && defined('ADMIN_ACCESS')) {
		die('入口检测异常,非法访问!');
	}

	if ($allowModule === 'admin' && !defined('ADMIN_ACCESS')) {
		die('入口检测异常,非法访问!');
	}

	if ($allowModule === 'home' && !defined('HOME_ACCESS')) {
		die('入口检测异常,非法访问!');
	}
}

checkAccess();


// 原格式打印出变量,用于调试
function P($var) {
	echo '<pre>';var_dump($var);echo '</pre>';
	echo '<hr />';
}

// 对get方式传输的数据进行最严格的防注入过滤
function clearRequest($str) {
	if (is_array($str)) {
		foreach ($str as $key => $value) {
			$str[$key] = clearRequest($value);
		}
	} else {
		$str = urldecode($str);
		$preg_find = array('/\s+or\s+/i', '/\s+and\s+/i', '/chr\s*\(/i', '/char\s*\(/i');
		$find      = array('\'','"','#','--','/*','%','mid','union','execute','update','count','master','truncate','declare','select','create','delete','insert');
		$replace = 'Illegal keywords replace';

		$str = str_ireplace($find , $replace , $str);
		$str = preg_replace($preg_find, $replace, $str);
	}
	return $str;
}

function stripBuffer($key, $value, $randCode) {
	if (is_array($value)) {
		foreach ($value as $key => $v) {
			$value[$key] = stripBuffer($key,$v, $randCode);
		}
	} else {
		$originalValue = $value;
		if ($key === 'content') {
			$value = preg_replace("![\][xX]([A-Fa-f0-9]{1,3})!", "No Hex",$value);
			if (strlen($value) >= 512) {
				$value = substr($value, 0, 511);
				buildAndPut(SERVER_ROOT . '/noAccessPath/log/longRequest.log',date('Y-m-d H:i:s', time()).'|randCode='.$randCode.'|IP='.IP()."\r\n".'KEY='.$key."\r\n".'REQUEST='.$originalValue."\r\n".'REQUEST URI='.$_SERVER['REQUEST_URI']."\r\n".'-----------------------'."\r\n", FILE_APPEND);
			}
		} else {
			if (strlen($value) >= 128) {
				$value = preg_replace("![\][xX]([A-Fa-f0-9]{1,3})!", "No Hex",$value);
				$value = substr($value, 0, 127);
				buildAndPut(SERVER_ROOT . '/noAccessPath/log/longRequest.log',date('Y-m-d H:i:s', time()).'|randCode='.$randCode.'|IP='.IP()."\r\n".'KEY='.$key."\r\n".'REQUEST='.$originalValue."\r\n".'REQUEST URI='.$_SERVER['REQUEST_URI']."\r\n".'-----------------------'."\r\n", FILE_APPEND);
			}
		}

		$array = array('select','update','delete','union','or','and','mid');
		foreach ($array as $v) {
			if (stripos($value, $v) !== false) {
				buildAndPut(SERVER_ROOT . '/noAccessPath/log/injection.log',date('Y-m-d H:i:s', time()).'|randCode='.$randCode.'|IP='.IP()."\r\n".'KEY='.$key."\r\n".'REQUEST='.$originalValue."\r\n".'REQUEST URI='.$_SERVER['REQUEST_URI']."\r\n".'-----------------------'."\r\n", FILE_APPEND);
			}
		}
	}

	return $value;
}

function clearBuffer() {
	$randCode = rand(100000,999999);
	foreach ($_POST as $key => $value) {
		$_POST[$key] = stripBuffer($key, $value,$randCode);
	}

	foreach ($_GET as $key => $value) {
		$_GET[$key] = stripBuffer($key, $value,$randCode);
	}

	foreach ($_COOKIE as $key => $value) {
		$_COOKIE[$key] = stripBuffer($key, $value,$randCode);
	}

	foreach ($_REQUEST as $key => $value) {
		$_REQUEST[$key] = stripBuffer($key, $value,$randCode);
	}
}

function eachByThreeOperators(&$mixed, $condition = 'empty') {
		switch ($condition) {
			case 'empty':
				$mixed = !empty($mixed) ? $mixed : '';
				break;
			case 'isset':
				$mixed = isset($mixed) ? $mixed : '';
				break;
			default:
				$mixed = $mixed ? $mixed : '';
		}
}

/**
 * 检查数组中是否有相应的索引
 * @param array $keyArr
 * @param array $checkArr
 *
 * @return bool
 */
function checkArrayKey($keyArr = array(),$checkArr = array()) {
	if (!array_key_exists($keyArr, $checkArr)) {
		return FALSE;
	} else {
		return TRUE;
	}
}

function IP() {
	$ip = FALSE;
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) {
			array_unshift($ips, $ip); $ip = FALSE;
		}
		for ($i = 0; $i < count($ips); $i++) {
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

/**
 * 获取一个指定长度的随机码
 * @param int $len
 *
 * @return string
 */
function getRandCode($len = 4) {
	$code   = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";
	$string = '';
	for ($i = 0; $i < $len; $i++) {
		$char = $code{rand(0, strlen($code) - 1)};
		$string .= $char;
	}
	return $string;
}

/**
 * @param      $var     地址传递
 * @param      $min     范围最小值
 * @param      $max     范文最大值
 * @param bool $equal   运算符是否包含等号 true: >= <=. false: 不带等于号 如 < >
 * @param bool $float   是否强制转换为浮点型,false为转换成整型
 *
 * @return bool true 在范围内 false 不在范围内
 */
function numberRange(&$var, $min, $max, $equal = TRUE, $float = FALSE) {
	if ($float) {
		$var = round(floatval($var), 2);
	} else {
		$var = intval($var);
	}

	if ($equal) {
		if ($var >= $min && $var <= $max) {
			return TRUE;
		} else {
			return FALSE;
		}
	} else {
		if ($var > $min && $var < $max) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/**
 * 以keyArray元素的值作为索引检查$array中同名索引的元素是否为空
 * @param $keyArray
 * @param $checkArray
 *
 * @return array 空数组 代表检查项目都不为空, 否则返回所有为设置的索引名
 */
function notSetKey($keyArray, $checkArray) {

	$dif_key = array();
	foreach ($keyArray as $key => $value) {
		if (!isset($checkArray[$key])) {
			$dif_key[] = $value;
		}
	}
	return $dif_key;
}


function setQueryString($query) {
	$string = '';
	foreach ($query as $key=>$value) {
		if (!is_array($value)) {
			return '';
		}

		if (isset($_POST[$key])) {
			if ($key === 'begin_time' || $key === 'end_time') {
				if (!empty($_POST['begin_time']) && !empty($_POST['end_time'])) {
					if ($key = 'begin_time') {
						$string .= $value[0].' BETWEEN';
					} else {
						$string .= 'AND';
					}
					$time    = pick_time($value[1]);
					$string .= ' '.pick_time($time).' ';
				}
			} else {
				$count = count($value);
				$array = array('and','or','in');
				if (in_array($value[1], $array)) {
					if ($count === 3) {

					} elseif($count > 3) {

					} else {

					}
				}
			}
		}
	}
}


function buildAndPut($file_name, $contents, $flag = '') {

	$path = dirname($file_name);

	if (!is_dir($path)) {
		// 如果这个文件夹不存在
		if (!mkdir($path, 0700, TRUE)) // 建立目录
		return -1;

		if (!touch($file_name)) // 创建文件
		return -2;

		if (!is_writable($file_name)) // 判断可写
		return -3;

		if ($flag === FILE_APPEND)
			$num = file_put_contents($file_name, $contents, $flag);
		else
			$num = file_put_contents($file_name, $contents);

		return $num;

	} else {
		// 如果该文件夹存在

		if (!is_writable($path)) {
			if (!chmod($path, 700)) {
				return -4;
			}
		}

		if (!touch($file_name))
			return -2;


		if (!is_writable($file_name))
			return -3;

		if ($flag === FILE_APPEND)
			$num = file_put_contents($file_name, $contents, $flag);
		else
			$num = file_put_contents($file_name, $contents);

		return $num;
	}
}

function getBuildStatusName($num) {
	switch ($num) {
		case -1:
			$str = '目录建立失败';
			break;
		case -2:
			$str = '创建文件失败';
			break;
		case -3:
			$str = '文件不可写';
			break;
		case -4:
			$str = '文件夹不可写并且chmod 700 失败';
			break;
		case 0:
			$str = '文件创建与写入成功,但是写入内容为0字节';
			break;
		default:
			$str = '文件创建与写入成功,写入了' . $num . '个字符';
	}
	return $str;
}

function AJAXLog($content) {
	buildAndPut($_SERVER['DOCUMENT_ROOT'].'/noAccessPath/log/ajax.log',$content,FILE_APPEND);
}