<?php
/******************************
 * $File: safe.php
 * $Description: 数据处理安全检查
 * $Author: dongdong 
 * $Time:2009-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/

/* 检查和转义字符 */
function safe_str($str){
	if(!get_magic_quotes_gpc())	{
		if( is_array($str) ) {
			foreach($str as $key => $value) {
				$str[$key] = safe_str($value);
			}
		}else{
			$str = addslashes($str);
		}
	}
	return $str;
}

function dhtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val);
		}
	} else {
		$string = str_replace(array('&', '"', '<', '>','(',')'), array('&amp;', '&quot;', '&lt;', '&gt;','（','）'), $string);
		if(strpos($string, '&amp;#') !== false) {
			$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);
		}
	}
	return $string;
}

$request_uri = explode("?", $_SERVER['REQUEST_URI']);
if (isset($request_uri[1])) {
	$rewrite_url = explode("&", $request_uri[1]);
	foreach ($rewrite_url as $key => $value) {
		$_value = explode("=", $value);
		if (isset($_value[1])) {
			$_REQUEST[$_value[0]] = addslashes($_value[1]);
			$_REQUEST[$_value[0]] = dhtmlspecialchars($_value[1]);
		}
	}
}
if (!defined('FROM_INDEX')) {
    foreach ($_GET as $key => $value) {
        $_GET[$key] = safe_str($value);
        $_GET[$key] = dhtmlspecialchars($_GET[$key]);
    }

    foreach ($_POST as $key => $value) {
	    if (isset($_SESSION['internal_pwd']) && $key==='content') {

	    } else {
		    $_POST[$key] = safe_str($value);
	    }

        if ($key != 'content') {
            $_POST[$key] = dhtmlspecialchars($_POST[$key]);
        }
    }

    foreach ($_COOKIE as $key => $value) {
        $_COOKIE[$key] = safe_str($value);
        $_COOKIE[$key] = dhtmlspecialchars($_COOKIE[$key]);
    }
    foreach ($_REQUEST as $key => $value) {
        $_REQUEST[$key] = safe_str($value);
        $_REQUEST[$key] = dhtmlspecialchars($_REQUEST[$key]);
    }
    foreach ($add_request_arr as $value) {
        $_REQUEST[$value] = doEscape($_REQUEST[$value]);
    }
}
/* 上传文件的检查 */
function safe_file(){
	$not_allow_file = "php|asp|jsp|aspx|cgi|php3|shtm|html|htm|shtml";
	foreach ($_FILES as $key=>$value){
		$_name = $_FILES[$key]['name'];
		if (is_array($_name)){
			foreach($_name as $key){
				if ( !empty($key) && (eregi("\.(".$not_allow_file.")$",$key) || !ereg("\.",$key)) ){
					//die("不允许上传的类型");		
				}
			}
		}else{
			if ( !empty($_name) && (eregi("\.(".$not_allow_file.")$",$_name) || !ereg("\.",$_name)) ){
				//die("不允许上传的类型");		
			}
		}
	}
}
safe_file();

?>