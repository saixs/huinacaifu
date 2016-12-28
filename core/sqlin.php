<?php
//方法一
//过滤',",sql语名
addslashes(); 
//方法二，去除所有html标签

strip_tags();

//方法三过滤可能产生代码

function php_sava($str)
{
    $farr = array(
        "/s /",                                                                                         
        "/<(/?)(script|i?frame|style|html|body|title|link|meta|?|%)([^>]*?)>/isU",  
        "/(<[^>]*)on[a-zA-Z] s*=([^>]*>)/isU",                                     
     
   );
   $tarr = array(
        " ",
        "＜\1\2\3＞",           //如果要直接清除不安全的标签，这里可以留空
        "\1\2",
   );

$str = preg_replace( $farr,$tarr,$str);
   return $str;
}

//php sql防注入代码

class sqlin
{

function dowith_sql($str) {
		if (is_array($str)) {
			foreach ($str as $key => $value) {
				$this->dowith_sql($str[$key]);
			}
		} else {
			$str = preg_replace('/\s+or\s+/i','no inject',$str);
			$str = preg_replace('/\s+and\s+/i','no inject',$str);
			$str = preg_replace('/chr\s*\(/i','no inject',$str);
			$str = preg_replace('/char\s*\(/i','no inject',$str);
			$str = str_ireplace("union", "no inject", $str);
			$str = str_ireplace("execute", "no inject", $str);
			$str = str_ireplace("update", "no inject", $str);
			$str = str_ireplace("count", "no inject", $str);
			$str = str_ireplace("master", "no inject", $str);
			$str = str_ireplace("truncate", "no inject", $str);
			$str = str_ireplace("declare", "no inject", $str);
			$str = str_ireplace("select", "no inject", $str);
			$str = str_ireplace("create", "no inject", $str);
			$str = str_ireplace("delete", "no inject", $str);
			$str = str_ireplace("insert", "no inject", $str);
			$str = str_ireplace("\'", "no inject", $str);
		}
		return $str;
	}

	function doEscape($str) {
		if (is_array($str)) {
			foreach ($str as $key => $value) {
				$this->doEscape($str[$key]);
			}
		} else {
			$str = urldecode($str);
			$str = str_ireplace('\'', 'no inject', $str);
			$str = str_ireplace('\\', 'no inject', $str);
			$str = str_ireplace('"', "no inject", $str);
			$str = str_ireplace('#', "no inject", $str);
			$str = str_ireplace('--', "no inject", $str);
			$str = str_ireplace('/*', "no inject", $str);
			$str = str_ireplace('%', "no inject", $str);
		}
		return $str;
	}
	
	function clearHex($str) {
		if (is_array($str)) {
			foreach ($str as $key => $value) {
				$this->clearHex($str[$key]);
			}
		} else {
			if (preg_match("![\][xX]([A-Fa-f0-9]{1,3})!",$str)) {
				if (strlen($str) > 128) {
					$str = preg_replace("![\][xX]([A-Fa-f0-9]{1,3})!", "No Hex",$str);
				}
			}
		}
		return $str;
	}

	//防SQL注入函数
	function sqlin() {
		foreach ($_GET as $key => $value) {
			$_GET[$key] = $this->doEscape($_GET[$key]);
			$_GET[$key] = $this->dowith_sql($_GET[$key]);
			$_GET[$key] = $this->clearHex($_GET[$key]);
		}
		foreach ($_POST as $key => $value) {
			if ($key != 'content'){
				$_POST[$key] = $this->dowith_sql($value);
			}
			$_POST[$key] = $this->clearHex($value);
		}
		foreach ($_COOKIE as $key => $value) {
			$_COOKIE[$key] = $this->dowith_sql($value);
			$_COOKIE[$key] = $this->clearHex($value);
		}
		foreach ($_REQUEST as $key => $value) {
			$_REQUEST[$key] = $this->doEscape($_REQUEST[$key]);
			$_REQUEST[$key] = $this->dowith_sql($_REQUEST[$key]);
			$_REQUEST[$key] = $this->clearHex($_REQUEST[$key]);
		}
	}
}


?>
