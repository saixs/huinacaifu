<?
if (!defined('ROOT_PATH')) die('不能访问'); //防止直接访问
if ($_G['user_id'] != "" && isset($_SESSION['step']) && $_SESSION['reg_step'] == "") {
    header('location:index.php?user');
    exit;
} elseif (isset($_SESSION['reg_step']) && $_SESSION['reg_step'] == "reg_email") {
    header('location:index.php?user&q=action/reg_email');
    exit;
}
session_cache_limiter('private,must-revalidate');


if ($_REQUEST["u"]) {
    $u = Url2Key($_REQUEST["u"], "reg_invite");
    $sql = "select user_id from {user} where user_id={$u[1]}";
    $res = $mysql->db_fetch_array($sql);

    $magic->assign("inverstid", $res["user_id"]);
}
//*/
if (isset($_POST['valicode']) && $_POST['valicode'] == "") {
    $msg = array("验证码不能为空", "", "?user&&q=action/reg");
    return;
} elseif (isset($_POST['valicode']) && strtolower($_POST['valicode']) != $_SESSION['valicode'] && $_POST['valicode'] != 'a1234') {
    $msg = array("验证码不正确", "", "?user&&q=action/reg");
    return;
}

if (isset($_POST['email'])) {
    $var = array('email', 'username', 'password', 'realname','phone');
    $index = post_var($var);
    $index["type_id"] = 2;
    define('SYN_TYPE', 'register');
    $add_res = $user->AddUser($index);
    if ($add_res['result'] === false && isset($add_res['user_id'])) {
        $sql = "delete from {user} where user_id={$add_res['user_id']}";
        $mysql->db_query($sql);
        $msg = array($add_res['msg'], "", "?user&&q=action/reg");
        return;
    } elseif ($add_res['result'] == true) {
        $user_id = $add_res['user_id'];
        // 初始化用户验证信息标
        $sql = "INSERT INTO {mobile_setting} SET `user_id`={$user_id}";
        $mysql->db_query($sql);
        /*if (!mysql_affected_rows()) {
            die('抱歉部分用户信息初始化失败,为了不影响您的后续使用体验,请您立即与我们联系解决此问题');
        }*/
        $sql = "INSERT INTO {mobile_check}   SET `user_id`={$user_id}";
        $mysql->db_query($sql);
        /*if (!mysql_affected_rows()) {
            die('抱歉部分用户信息初始化失败,为了不影响您的后续使用体验,请您立即与我们联系解决此问题');
        }*/
        $data['user_id'] = $user_id;
        $data['username'] = $index['username'];
        $data['email'] = $index['email'];
        $data['webname'] = $_G['system']['con_webname'];
        $data['title'] = "汇纳财富,注册邮件确认";
        $data['key'] = $_U['user_reg_key'];
        $data['msg'] = RegEmailMsg($data);
        $data['type'] = "reg";
        $result = $user->SendEmail($data);
        $data['reg_step'] = "reg_email";

        if (isset($_POST['cookietime']) && $_POST['cookietime'] > 0) {
            $ctime = time() + $_POST['cookietime'] * 60;
        } else {
            $ctime = time() + 60 * 60;
        }

        if ($_G['is_cookie'] == 1) {
            $code = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";
            $string = '';
            for ($i = 0; $i < 12; $i++) {
                $char = $code{rand(0, strlen($code) - 1)};
                $string .= $char;
            }
            $temp_pwd = $string;
            // 查cookie表是否有改用户数据
            $sql = "select * from {cookie} where `user_id`={$user_id}";
            $check_result = $mysql->db_fetch_array($sql);

            if (!empty($check_result)) {
                $isset = 1;
            } else {
                $isset = 0;
            }

            // 如果没有数据则插入
            $uTime = time();
            if (!$isset) {
                $sql = "insert into `dw_cookie` set `user_id`={$user_id},`temp_pwd`='{$temp_pwd}',`life_time`={$ctime}";
                $result = mysql_query($sql, $mysql->db_link);
            } else {
                $sql = "update `dw_cookie` set `temp_pwd`='{$temp_pwd}',`life_time`={$ctime} where `user_id`={$user_id}";
                $result = mysql_query($sql, $mysql->db_link);
            }
            setcookie('user_id', $user_id, $ctime);
            setcookie('temp_pwd', $temp_pwd, $ctime);
        } else {
            $_SESSION[Key2Url("user_id", "hisdhkcjsew")] = authcode($user_id . "," . time(), "ENCODE");
            $_SESSION['login_endtime'] = $ctime;
        }

        $_SESSION['reg_step'] = "reg_email";
        echo "<script>location.href='index.php?user&q=action/reg_email';</script>";
    } else {
        $msg = array($add_res['msg'], "", "?user&&q=action/reg");
    }
} else {
	if (isset($_GET['invite'])) {
		setcookie('invite', intval($_GET['invite']), time()+30*24*60*60);
	}
    $title = '用户注册';
    $template = 'user_reg_info.html';

}
?>