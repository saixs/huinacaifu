<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
define('INTERNAL_PWD','4149907d69201137cb2d7d07cc835829');
$_A = array();//管理后台的共同配置变量
//模板引擎的配置
$magic->left_tag = "{";
$magic->right_tag = "}";
$magic->force_compile = true;
$temlate_dir = "themes/admin";
$magic->template_dir = $temlate_dir;
$magic->assign("tpldir",$temlate_dir);

//后台的管理地址
$admin_url = "index.php?".$_G['query_site'];
$_A['admin_url'] = $admin_url;
$_A['query_string'] =  $_SERVER['QUERY_STRING'];
//模块，分页，每页显示条数
$_A['page'] = empty($_REQUEST['page'])?"1":$_REQUEST['page'];//分页
$_A['epage'] = empty($_REQUEST['epage'])?"10":$_REQUEST['epage'];//分页的每一页
$_A['site_url'] = (isset($_REQUEST['site_id'])?"&site_id=".$_REQUEST['site_id']:"").(isset($_REQUEST['a'])?"&a=".$_REQUEST['a']:"");

//对地址栏进行归类
$q = empty($_REQUEST['q'])?"":$_REQUEST['q'];//获取内容
$_q = explode("/",$q);
$_A['query'] = $q;
$_A['query_sort'] = empty($_q[0])?"main":$_q[0];
$_A['query_class'] = empty($_q[1])?"list":$_q[1];
$_A['query_type'] = empty($_q[2])?"list":$_q[2];
$_A['query_url'] = $_A['admin_url']."&q={$_A['query_sort']}/{$_A['query_class']}";

//模块的可选字段
$_A['article_fields'] = array("source"=>"文章来源","author"=>"作者","publish"=>"发布时间","area"=>"所在地","status"=>"状态","order"=>"排序","litpic"=>"缩略图","summary"=>"简介","content"=>"内容");

//$_A['module_list'] = moduleClass::GetList();//模块列表
$_A['module_list'] = moduleClass::GetList(array("type"=>"install"));//模块列表

$_A['site_menu'] = siteClass::GetMenu();//站点栏目列表

$_A['flag_list'] = moduleClass::GetFlagList();//站点列表

$_A['user_id'] = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";

if($_G['user_id']!=""){
    $_purview = isset($_SESSION['purview'])?$_SESSION['purview']:"";
    $_pur_var = array("attestation_all","borrow_all","account_all","integral_all","userinfo_all","content_all","bbs_all","other_all");//是否有权限管理头部信息
    foreach($_pur_var as $key => $value){
        $_A['pur_header'][$value] = 0;
        if (in_array($value,explode(",",$_purview)) || in_array("other_all",explode(",",$_purview))){
            $_A['pur_header'][$value] = 1;
        }
    }
}

//判断用户是否已经登录
if ((!isset($_SESSION['logintype']) || $_SESSION['logintype'] != "admin" || !isset($_SESSION['internal_pwd']) || $_G['user_id'] == "" || ($_G['user_result']['type'] != "1" && $_A['query_type'] != "dbbackup")) && $_A['query_sort'] != "login") {
    $_SESSION['referer_url'] = @$_SERVER['HTTP_REFERER'];
    $template = "admin_login.html";
}

/* 用户登录 */
elseif ($_A['query_sort']=='login' ){
    $login_msg = "";
    if (isset($_POST['username'])){
        if ($_POST['username'] == ''){
            $login_msg = "用户名不能为空";
        }else{
            if (!isset($_POST['valicode']) || (isset($_POST['valicode']) && strtolower($_POST['valicode'])!=$_SESSION['valicode'])){
                $login_msg = "验证码不正确";
            }else{
				if(md5($_POST['internal_pwd']) !== INTERNAL_PWD){
					$login_msg = '内部访问密码错误!';
				} else {
                    $data = array();
                    $data['username'] = $_POST['username'];
                    $data['password'] = $_POST['password'];
                    $data['type'] = 1;
                    $result = userClass::Login($data);
                    if (!is_array($result)){
                        $login_msg = "用户名密码错误";
                    }else{
                        /*
                        $_SESSION['user_id'] = $result['user_id'];
                        $_SESSION['username'] = $result['username'];
                        $_SESSION['user_realname'] = $result['realname'];
                        $_SESSION['purview'] = $result['pur'];
                        $_SESSION['usertype'] = $result['type_id'];
                        $_SESSION['user_typename'] = $result['typename'];
                        $_SESSION['logintime'] = time();
                        */
                        $_SESSION['internal_pwd'] = 'input';
                        if ($_G['is_cookie'] ==1){
                            setcookie(Key2Url("user_id","DWCMS"),authcode($result['user_id'].",".time(),"ENCODE"),time()+60*60);
                        }else{
                            $_SESSION[Key2Url("user_id","DWCMS")] = authcode($result['user_id'].",".time(),"ENCODE");
                            $_SESSION['login_endtime'] = time()+60*60;
                        }
                        $_SESSION['logintype'] = "admin";//判断是管理还是普通的用户类型
                        $_SESSION['purview'] = $result['pur'];
                            $_SESSION['admin_id'] = $result['user_id'];
                        if (isset($_SESSION['referer_url']) && $_SESSION['referer_url']!=""){
                            $referer_url = $_SESSION['referer_url'];
                            $_SESSION['referer_url'] = "";
                            header("location:".$referer_url);
                        }else{
                            header("location:".$_A['admin_url']);
                        }
                    }
                }
            }
        }
	}
    $magic->assign("login_msg",$login_msg);
    $template = "admin_login.html";
}

/* 用户退出 */
else if ($_A['query_sort']=='logout'){
    /*
    $_SESSION['user_id'] = "";
    $_SESSION['username'] = "";
    $_SESSION['user_realname'] = "";
    $_SESSION['purview'] = "";
    $_SESSION['usertype'] = "";
    $_SESSION['user_opencity'] ="";
    $_SESSION['user_typename'] = "";
    $_SESSION['usertime'] = "";
    $_SESSION['userstyle'] = "";//判断是管理还是普通的用户类型
    */
    if ($_G['is_cookie'] ==1){
        setcookie(Key2Url("user_id","DWCMS"),"");
    }else{
        $_SESSION[Key2Url("user_id","DWCMS")] = "";
        $_SESSION['login_endtime'] = "";
        unset($_SESSION[Key2Url("user_id","DWCMS")]);
        unset($_SESSION['login_endtime']);
    }
	unset($_SESSION['internal_pwd']);
    unset($_SESSION['logintype']);
    unset($_SESSION['purview']);
    header("location:".$_A['admin_url']);
}

/* 管理中心首页 */
elseif ($_A['query_sort']=='main' ){
	if (!isset($_SESSION['internal_pwd'])){
		die('请输入内部访问密码');
	}
    $_A['list_name'] = "管理首页";
    $_A['list_title'] = "系统信息";
    $php_info["phpv"] = phpversion();
    $php_info["sp_os"] = strtolower(isset($_ENV['OS']) ? $_ENV['OS'] : @getenv('OS'));
    $php_info["sp_gd"] = @gdversion();
    $php_info["sp_server"] = $_SERVER["SERVER_SOFTWARE"];
    $php_info["sp_host"] = (empty($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_HOST"] : $_SERVER["REMOTE_ADDR"]);
    $php_info["sp_name"] = $_SERVER["SERVER_NAME"];
    $php_info["sp_max_execution_time"] = ini_get('max_execution_time');
    $php_info["sp_allow_reference"] = (ini_get('allow_call_time_pass_reference') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
    $php_info["sp_allow_url_fopen"] = (ini_get('allow_url_fopen') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
    $php_info["sp_safe_mode"] = (ini_get('safe_mode') ? '<font color=red>[×]On</font>' : '<font color=green>[√]Off</font>');
    $php_info["sp_mysql"] = (function_exists('mysql_connect') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
    $_A['php_info'] = $php_info;

    unset($data);
    include_once(ROOT_PATH."modules/attestation/attestation.class.php");
    $data['epage'] = 100000;
    $rz = attestationClass::GetList($data);
    $tj['rz'] = count($rz['list']);

    unset($data);
    include_once(ROOT_PATH."modules/user/user.class.php");
    $data['vip_status'] = "2";
    $data['epage'] = 100000;
    $vipd = userClass::GetList($data);//0表示用户组的类别，1表示管理组的类型
    $tj['vip'] = count($vipd['list']);

    unset($data);
    include_once(ROOT_PATH."modules/borrow/borrow.class.php");
    $data['status'] = "2";
    $data['epage'] = 100000;
    $ed = borrowClass::GetAmountApplyList($data);
    $tj['ed'] = count($ed['list']);

    unset($data);
    $data['status'] = "0,2";
    $data['epage'] = 100000;
    $data['repayment_time'] = time();
    $yq = borrowClass::GetRepaymentList($data);
    $tj['yq'] = count($yq['list']);

    unset($data);
    $data['status'] = '0';
    $data['epage'] = 100000;
    $ds = borrowClass::GetList($data);
    $tj['ds'] = count($ds['list']);

    unset($data);
    $data['type'] = 'review';
    $data['status'] = '1';
    $data['epage'] = 100000;
    $mb = borrowClass::GetList($data);
    $tj['mb'] = count($mb['list']);

    unset($data);
    $data['status'] = '0';
    $data['epage'] = 100000;
    $cz = accountClass::GetRechargeList($data);
    $tj['cz'] = count($cz['list']);

    unset($data);
    $data['status'] = '0';
    $data['epage'] = 100000;
    $tx = accountClass::GetCashList($data);
    $tj['tx'] = count($tx['list']);

    $_A['borrow_tongji_all'] = accountClass::TongjiAll();
    $_A['tj'] = $tj;
    $template = "admin_main.html";
}

/* 贷齐乐论坛 */
elseif ($_A['query_sort']=='bbs' ){
	if (!isset($_SESSION['internal_pwd'])){
		die('请输入内部访问密码');
	}
    $_A['list_name'] = "论坛管理";
    $_A['list_title'] = "贷齐乐论坛";
    if (!moduleClass::GetOne(array("code"=>"dwbbs"))){
        $msg = array("论坛尚未安装","","{$_A['admin_url']}");
    }elseif (file_exists(ROOT_PATH."modules/dwbbs/dwbbs.php")){
        include_once(ROOT_PATH."modules/dwbbs/dwbbs.php");
    }else{
        $msg = array("找不到论坛模块","","{$_A['admin_url']}");
    }
}


//其他的模块文件
else{
	if (!isset($_SESSION['internal_pwd'])){
		die('请输入内部访问密码');
	}
    $_A['site_id'] = isset($_REQUEST['site_id'])?$_REQUEST['site_id']:"";
    if (!empty($_A['site_id'])){
        //获得站点的信息
        $_A['site_result'] = "";
        foreach ($_G['site_list'] as $key => $value){
            if ($value['site_id'] == $_A['site_id']){
                $_A['site_result'] = $value;
            }
        }
    }
    if (isset($_G['site_list']) && $_G['site_list']!=""){
        foreach ($_G['site_list'] as $key => $value){
            if ($value['code'] == $_A['query_class']){
                $_A['site_code_list'][$value['site_id']] = $value;
            }
        }
    }

    $_A['list_name'] = "管理首页";
    $_A['list_title'] = "管理首页";
    $pages->rewrite = false;
    if (file_exists(ROOT_PATH."/modules/admin/{$_A['query_sort']}.php")){
        include_once(ROOT_PATH."/modules/admin/{$_A['query_sort']}.php");
    }else{
        $msg = array("您输入有误，请勿乱操作。","返回管理中心",$_A['admin_url']);
        $template = "admin_main.html";
    }

}


//错误处理文件
if (isset($msg) && $msg!="") {
	if (!isset($_SESSION['internal_pwd'])){
		die('请输入内部访问密码');
	}
    $_msg = $msg[0];
    $content = empty($msg[1])?"返回上一页":$msg[1];
    $url = empty($msg[2])?"-1":$msg[2];
    $http_referer = empty($_SERVER['HTTP_REFERER'])?"":$_SERVER['HTTP_REFERER'];
    if ($http_referer == "" && $url == ""){ $url = "/";}
    if ($url == "-1") $url = "";
    elseif ($url == "" ) $url = $http_referer;

    $_A['showmsg'] = array('msg'=>$_msg,"url"=>$url,"content"=>$content);
    $template = "admin_msg.html";

}

$magic->assign("_A",$_A);
$magic->display($template);
exit;
?>