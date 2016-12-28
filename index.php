<?php
///判断程序是否安装
session_cache_limiter('private,must-revalidate');
#CONST FROM_INDEX = TRUE;
//error_reporting('E_ALL');
$_G = array();
//基本配置文件
include ("core/config.inc.php");
include ("modules/account/account.class.php");
include ("modules/invest/invest.class.php");

/*$ip = ip_address();
$begin = substr($ip, 0, 5);
if ($begin !== '10.15') {
	$time = date('h', time());
	$filed_name = 'time'.$time;
	$sql = "SELECT * FROM `black_list` WHERE `ip`='{$ip}'";
	$result = $mysql->fetchOneByAssoc($sql);
	if (!$result) {
		// 如果不存在该IP地址 将之入库
		$sql = "insert into `black_list` SET `ip`='{$ip}'";
		$result = $mysql->executeDml($sql);
	}

	// 如果用户在黑名单内
	if (isset($result['is_black']) && $result['is_black'] == 1) {
		echo '尊敬的用户您好,由于本站近日受到流量型攻击,开启了IP地址过滤程序,您的IP地址访问过于频繁,已经被加入黑名单.如果您这是正常访问所引起的,请与管理员联系将您的IP地址加入白名单!';
		echo '<br />您的IP地址为:'.$ip.'(请将IP地址复制给客服,为您加入白名单)<br /> 客服QQ：';
		die;
	} elseif (isset($result['is_black']) && $result['is_black'] == 0) {
		if ($result[$filed_name] >= 150) {
			// 设置该IP为黑名单
			$sql = "update `black_list` set `is_black`=1 where `ip`='{$ip}'";
			$mysql->executeDml($sql);
		} else {
			if ($time == 23) {
				$next_filed_name = 0;
			} else {
				$next_time = $time + 1;
				$next_filed_name = 'time'.$next_time;
			}
			$sql = "update `black_list` set `{$filed_name}`=`{$filed_name}`+1, `{$next_filed_name}`=0 where `ip`='{$ip}'";
			$mysql->executeDml($sql);
		}
	} else {
	}
}
*/




/*
$sql = "SELECT * FROM `ip_list` where `ip`='{$ip}'";
$result = $mysql->fetchOneByAssoc($sql);
if (!$result) {
	echo '<div style="font-weight: bold; color: red;">由于网站受到流量型攻击,请您将您的IP地址复制发送给客服,将您的IP地址添加到白名单.这是暂行的解决办法,我们将会尽快妥善的处理此问题,如果给你带来不便,请谅解!</div>';
	echo '您的IP地址是:<div style="font-weight: bold; color: red; font-size: 18px">'.$ip.'</div>';
	die;
}*/
//系统基本信息
$system = array();
$system_name = array();
$_system = $mysql->db_selects("system");
foreach ($_system as $key => $value){
	$system[$value['nid']] = $value['value'];
	$system_name[$value['nid']] = $value['name'];
}
$_G['system'] = $system;
$_G['system_name'] = $system_name;


$_G['nowtime'] = time();//现在的时间

$_G['weburl'] = "http://".$_SERVER['SERVER_NAME'];//当前的域名
$_G['wxysite_url']  = explode('?',$_SERVER["REQUEST_URI"]);
$_G['wxysite_url'] = $_G['wxysite_url'][1];

//总页数据统计
//------
//----
//投资总额
$_G['arraytj'] = investClass::GetArrrayTj();
$total_tender  = investClass::getAllTender();
$_G['arraytj'] = $_G['arraytj']['list'];
$collected = 0;
$arrays = 0;
foreach($_G['arraytj'] as $id=>$arrtj){
	if ($arrtj['repay_yesaccount'] > $arrtj['capital']) {
        $collected += $arrtj['repay_yesaccount'] - $arrtj['capital'];
    }
}
$_G['rental'] = $total_tender[0]['total'];
$_G['collected'] = $collected;


$a= $_SERVER['QUERY_STRING'];
$b= '<';
$c=explode($b,$a);
if(count($c)> 1){
     echo "<script>location.href='/error.html';</script>";
}
$a= $_SERVER['QUERY_STRING'];
$b= '>';
$c=explode($b,$a);
if(count($c)> 1){
     echo "<script>location.href='/error.html';</script>";
}
$a= $_SERVER['QUERY_STRING'];
$b= 'script';
$c=explode($b,$a);
if(count($c)> 1){
     echo "<script>location.href='/error.html';</script>";
}
$a= $_SERVER['QUERY_STRING'];
$b= '\'';
$c=explode($b,$a);
if(count($c)> 1){
     echo "<script>location.href='/error.html';</script>";
}

$query_string = explode("&",str_replace('alert','-',$_SERVER['QUERY_STRING']));

$query_string=str_replace('<','-',$query_string);
$query_string=preg_replace('/<br\\s*?\/??>/i', '', $query_string);
//foreach($query_string as $k=>$v)
//{
 //query_string[$k] = htmlspecialchars(preg_replace("/<li>([\s\S]*)bug([\s\S]*)<\/li>/","",$v));

//}
$_G['query_string'] = $query_string;

if (isset($_REQUEST['query_site']) && $_REQUEST['query_site']!=""){
	$_G['query_site'] = $_REQUEST['query_site'];
}elseif (isset($query_string[0])){
	$_G['query_site'] = $query_string[0];
}

//管理地址
$sql = "select * from `dw_system` where `nid`='con_houtai' limit 1";
$check_result = mysql_query($sql);

if ($check_result !== false) {
    $row = mysql_fetch_assoc($check_result);
    mysql_free_result($check_result);
    if ($row !== false) {
        $arr = $row;
    } else {
        $arr = array();
    }
} else {
    $arr = array();
}
$con_houtai_config = $arr['value'];

foreach ($_GET as $key => $value) {
    $_GET[$key] = safe_str($value);
    $_GET[$key] = dhtmlspecialchars($_GET[$key]);
}

foreach ($_POST as $key => $value) {
    $_POST[$key] = safe_str($value);
    if ($key != 'content' && $_G['query_site'] != $con_houtai_config) {
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
//判断采用何种方式登录
$_user_id = array("");
$_G['is_cookie'] = isset($_G['system']['con_cookie'])?(int)$_G['system']['con_cookie']:0;
if ($_G['is_cookie'] == 1) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['temp_pwd'])) {
        // 查cookie表是否有该用户数据
        $id = intval($_COOKIE['user_id']);
        $sql = "select * from `dw_cookie` where `user_id`={$id}";
        $check_result = mysql_query($sql);

        if ($check_result !== false) {
            $row = mysql_fetch_assoc($check_result);
            mysql_free_result($check_result);
            if ($row !== false) {
                $arr = $row;
            } else {
                $arr = array();
            }
        }

        if (!empty($arr)) {
            if ($arr['life_time'] >= time()) {
                if ($arr['temp_pwd'] == $_COOKIE['temp_pwd']) {
                    $_user_id[0] = $id;
                } elseif (isset($_SESSION['user_id'])) {
                    $_user_id[0] = $_SESSION['user_id'];
                }
            }
        }
    }

    if ($_G['query_site'] == $con_houtai_config) {
        if (isset($_SESSION['admin_id'])) {
            $_user_id[0] = $_SESSION['admin_id'];
        }
    }

} else {
    if (isset($_SESSION['login_endtime']) && $_SESSION['login_endtime'] > time()) {
        $_user_id = explode(",", authcode(isset($_SESSION[Key2Url("user_id", "hisdhkcjsew")]) ? $_SESSION[Key2Url("user_id", "hisdhkcjsew")] : "", "DECODE"));
    }
}
$_G['user_id'] = $_user_id[0]; // 取登陆用户id
/*echo '<pre>';
var_dump($_COOKIE);
var_dump($_SESSION);
echo '</pre>';*/
// 如果用户已登陆
$time = time();
$magic->assign('timeStamp', $time);
if ($_G['user_id']!=""){
    $_SESSION['user_id'] = $_G['user_id'];
    $_G['user_result'] = $user->GetOne(array("user_id"=>$_G['user_id']));
    $_G['user_cache'] = $user->GetUserCache(array("user_id"=>$_G['user_id']));
    $_G['bank_number'] = $user->validBankNum($_G['user_id']);
    include_once(ROOT_PATH."/modules/message/message.class.php");
    $_message = messageClass::GetCount(array("user_id"=>$_G['user_id'],"status"=>0,"deltype"=>0));
    $_G['user_cache']['message'] =$_message['num'];
    //收益计算
    accountClass::consolidatedincome(array("user_id"=>$_G['user_id'],con_Interest=>$_G['system']['con_Interest']));
    //用户所得总积分(投标+签到+其他)
    $get_all_sql = "select sum(value) as sum_value from {integral_log} where user_id={$_G['user_id']} and type_id<>4";
    $get_all_integral  =  $mysql->db_fetch_array($get_all_sql);
    //扣除积分
    $deduct_sql = "select sum(value) as sum_value from {integral_log} where user_id={$_G['user_id']} and type_id=4";
    $deduct_integral  =  $mysql->db_fetch_array($deduct_sql);
    $_G['user_result']['get_all_integral'] = $get_all_integral['sum_value']-$deduct_integral['sum_value'];

}

//模块，分页，每页显示条数
$_G['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:1;//分页
$_G['epage'] = isset($_REQUEST['epage'])?$_REQUEST['epage']:10;//分页的每一页

$_G['nowurl'] = "http//".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
//获得网站的缓存
$_G['cache'] = systemClass::GetCacheOne();

//获得在线的用户
$_G['online'] = systemClass::Online(array("user_id"=>$_G['user_id']));

$xq_request = $_SERVER['REQUEST_URI'];
$xq_arr=explode("?",$xq_request);
foreach($xq_arr as $v){
	$xq_str = explode("=",$v);
	if($xq_str[0] == "type"){
		$_G['xq_type']=$xq_str[1];
	}
}
//模板选择
$con_template = "themes/";
$con_template .= empty($system['con_template'])?"default":$system['con_template'];
$template_error = false;
if (!file_exists($con_template)){
	$template_error = true;
	$con_template = "themes/default";
	$magic->template_error = $template_error;
}
$magic->template_dir = $con_template;
$magic->force_compile = true;
$_G['tpldir'] = "/".$con_template;
$magic->assign("tpldir",$_G['tpldir']);
$magic->assign("tempdir",$_G['tpldir']);//图片地址


include_once(ROOT_PATH."modules/borrow/borrow.class.php");


//开心流转贷还款
if($_G['system']['con_auto_pay']==1)
{
$ssf="select p1.id,p2.user_id,p1.tender_id from {borrow_repayment} as p1 LEFT JOIN {borrow} as p2 on p2.id=p1.borrow_id  where (p2.status=1 or  p2.status=2) and ISNULL( p1.repayment_yestime) and p2.is_liuzhuan=1 and p1.repayment_time-UNIX_TIMESTAMP(NOW())<2*60*60";
						$dhr = $mysql->db_fetch_arrays($ssf);

						foreach($dhr as $vve){
							$datae['id'] = $vve['id'];
							$datae['user_id'] = $vve['user_id'];
                                                        $datae['tender_id']= $vve['tender_id'];
							if($datae['id']) $result =  borrowClass::RepayLZ($datae);//获取当前用户的余额
						}
}


//流标处理
$data_lb['type'] = "late";
$data_lb['status'] = "1";
$data_lb['epage'] = 20;
$result_lb = borrowClass::GetList($data_lb);
foreach($result_lb['list'] as $lb){
	$data_lbl['id'] = $lb['id'];
	$data_lbl['status'] = 1;
	$data_lbl['opertype']='guanli';
	$data_lbl['is_liuzhuan'] = $lb['is_liuzhuan'];
	$result_lbl = borrowClass::ActionLiubiao($data_lbl);
}

//联动模块
include_once ("modules/linkage/linkage.class.php");
if (linkageClass::IsInstall()){
	$result = linkageClass::GetList(array("limit"=>"all"));
	foreach ($result as $key => $value){
		$_G['linkage'][$value['type_nid']][$value['value']] = $value['name'];
		$_G['linkage'][$value['id']] = $value['name'];
		if ($value['type_nid']!=""){
			$_G['_linkage'][$value['type_nid']][$value['id']] = array("name"=>$value['name'],"id"=>$value['id'],"value"=>$value['value']);
		}
	}
}
//地区列表
if (file_exists(ROOT_PATH."modules/area/area.class.php")){
	include_once (ROOT_PATH."modules/area/area.class.php");
	//如果已经安装地区模块，则读取地区的信息
	if (areaClass::IsInstall()){
		$result = areaClass::GetList(array("limit"=>"all"));
		$_G['arealist'] = $result;
	}
	//如果网站是采用二级地区分区的，则进行相关的配置
	if (isset($_G['system']['con_area_part']) && $_G['system']['con_area_part']==1){
		$city_area = explode(".",$_SERVER['SERVER_NAME']);
		$area_city_nid = $city_area[0] ;

		//获得网站的域名
		if (count($city_area)==2){
			$domain = $_SERVER['SERVER_NAME'];
		}else{
			$domain = $city_area[1].".".$city_area[2];
		}
		$_G['domain'] = $domain;//网站的域名
		$_G['webname'] = "http://".$area_city_nid.".".$domain;//当前的域名

		//显示城市的列表
		if ($area_city_nid =="city"){
			$magic->assign("_G",$_G);
			$tpl = "city.html";
			$magic->display($tpl);
			exit;
		}

		//基本的地区跳转
		elseif ($area_city_nid =="www" || count($city_area)==2){
			if (isset($_REQUEST['set_city_nid'])){
				setcookie("set_city",$_REQUEST['set_city_nid'],time()+3600*24*30);
				exit;
			}
			if (isset($_COOKIE['set_city'])){
				$url = "http://".$_COOKIE['set_city'].".".$_G['domain'];//有cookie地址
				echo "<script>location.href='$url';</script>";
				exit;
			}
			echo "<script>location.href='http://city.{$_G['domain']}';</script>";
			exit;
		}

		else{

			//循环寻找相关的城市信息
			foreach ($_G['arealist'] as $key => $value){
				if ($value['nid']==$area_city_nid){
					//城市的基本信息
					$_G['city_result'] = $_G['arealist'][$key];
				}
			}
			//循环寻找相关的地区信息
			foreach ($_G['arealist'] as $key => $value){
				//省份的基本信息
				if ($value['id']==$_G['city_result']['pid']){
					$_G['province_result'] = $_G['arealist'][$key];
				}
				//所在城市地区列表
				if ($value['pid']==$_G['city_result']['id']){
					$_G['area_list'][] = $value;
				}
				//地区的基本信息
				if (isset($_REQUEST['area']) && $_REQUEST['area'] == $value['nid']){
					$_G['area_result'] = $value;
				}
			}

			//判断是不是城市的信息，如果不是，则返回城市页继续选择
			if ($_G['province_result']['pid']!=0 || !isset($_G['city_result'])){
				unset($_COOKIE['set_city']);
				echo "<script>location.href='http://city.{$domain}';</script>";
				exit;
			}


		}

	}
}

//站点列表
if (file_exists(ROOT_PATH."core/site.class.php")){
	include_once (ROOT_PATH."core/site.class.php");
	$_G['site_list'] = siteClass::GetList(array("limit"=>"all"));
	if ($_G['site_list']!=false){
		foreach ($_G['site_list'] as $key => $value){
			if ($value['rank']!=""){
				$_pur = explode(",",$value['rank']);
				if (isset($_G['user_result']['type_id']) && in_array($_G['user_result']['type_id'],$_pur)){
					$_G['site_list_pur'][$key] = $value;
				}
			}
		}
	}
}


//上传图片的配置
$_G['upimg']['cut_status'] = 0;
$_G['upimg']['user_id'] = empty($_G['user_id'])?0:$_G['user_id'];
$_G['upimg']['cut_type'] = 2;
$_G['upimg']['cut_width'] = isset($_G['system']['con_fujian_imgwidth'])?$_G['system']['con_fujian_imgwidth']:"";
$_G['upimg']['cut_height'] = isset($_G['system']['con_fujian_imgheight'])?$_G['system']['con_fujian_imgheight']:"";
//$_G['upimg']['file_dir'] = "data/aa/";
$_G['upimg']['file_size'] = 1000;
$_G['upimg']['mask_status'] = isset($_G['system']['con_watermark_pic'])?$_G['system']['con_watermark_pic']:"";
$_G['upimg']['mask_position'] = isset($_G['system']['con_watermark_position'])?$_G['system']['con_watermark_position']:"";
if (isset($_G['system']['con_watermark_type']) && $_G['system']['con_watermark_type']==1){
	$_G['upimg']['mask_word'] =isset($_G['system']['con_watermark_word'])?$_G['system']['con_watermark_word']:"";
	$_G['upimg']['mask_font'] = "3";
	//$_G['upimg']['mask_size'] = $_G['system']['con_watermark_font'];
	$_G['upimg']['mask_color'] = isset($_G['system']['con_watermark_color'])?$_G['system']['con_watermark_color']:"";
}else{
	$_G['upimg']['mask_img'] = isset($_G['system']['con_watermark_file'])?$_G['system']['con_watermark_file']:"";
}

if ($_G['query_site'] == "user" ){
	$_G['site_result']['nid'] = "user";
}

$magic->assign("_G",$_G);

//管理地址
if (isset($_G['system']['con_houtai']) && $_G['system']['con_houtai']!=""){
	$admin_name = $_G['system']['con_houtai'];
}else{
	$admin_name = "admin";
}

if ($_G['query_site'] == $admin_name ){
	include_once ("modules/admin/index.php");exit;
}

//用户中心
elseif ($_G['query_site'] == "user" ){
	include_once ("modules/member/index_{$_G['system']['con_template']}.php");exit;
}

//用户中心
elseif ($_G['query_site'] == "home" ){
	$user_id = $_REQUEST['user_id'];
	$user->AddVisit(array("user_id"=>$user_id,"visit_userid"=>$_G['user_id']));
	$magic->display("home.html");
	exit;
}
//积分商城
elseif ($_G['query_site'] == "integral" || strstr($_G['query_site'],'integral')){
	include_once ("modules/integral/integral_mall.php");
	//$magic->display("integral.html");
	exit;
}
//单页
elseif ($_G['query_site'] == "cxbz" ){
	$magic->display("cxbz/bjbz/cxbz1.html");
	exit;
}

//用户资料新
elseif ($_G['query_site'] == "u" ){
	include_once(ROOT_PATH."modules/borrow/borrow.class.php");
	$Bclass = new borrowClass();
	$_G['U_uid'] = $user_id = $_G['query_string'][1];
	if(isset($_G['query_string'][2])){
		$_G['query_string'][2]=str_replace("/",'',$_G['query_string'][2]);
		if($_G['query_string'][2]=='borrowlist'||$_G['query_string'][2]=='borrowinvest') $U_gid=$_G['query_string'][2];
		else $U_gid='';
	}

	$magic->assign("U_gid",$U_gid);
	$magic->assign("GU_uid",$_G['U_uid']);
	$magic->display("u.html");
	exit;
}
//评论
elseif ($_G['query_site'] == "comment" ){
	include_once ("modules/comment/comment.inc.php");
	exit;
}
//评论
elseif ($_G['query_site'] == "plugins" ){
	$q = !isset($_REQUEST['q'])?"":$_REQUEST['q'];
	$_ac = !isset($_REQUEST['ac'])?"html":$_REQUEST['ac'];
	$q_allow = array('apply', 'area', 'areas', 'count', 'imgcode', 'imgurl', 'liandong', 'linkage', 'procity', 'proschool', 'prosite', 'protime', 'school', 'upload', 'uploadannex', 'uploadimg', 'user');
	$ac_allow = array('avatar', 'clearbox', 'dtree', 'editor', 'galleryview', 'html', 'jcupload', 'magic', 'mail', 'swfupload', 'timepicker', 'upfiles');
	if (in_array($q,$q_allow) && in_array($_ac, $ac_allow)){
		if ($_ac=="html"){
			$file = ROOT_PATH."plugins/html/".$q.".inc.php";
		}else{
			$file = ROOT_PATH."plugins/{$_ac}/{$_ac}.php";
		}
		if (file_exists($file)){
			include_once ($file);
			exit;
		}
	} else {
	    die('no access!');
	}
}
/**处理表单*/
/*
elseif ($_G['query_site'] == "actions" ){
	if (isset($_POST['valicode'])){
		if ($_POST['valicode']!=$_SESSION['valicode']){
			echo "<script>alert('验证码不正确');history.go(-1);</script>";
		}else{
			$data=  array();
			foreach ($_POST as  $key => $value){
				$data[$key] = $_POST[$key];
			}
			unset($data['valicode']);
			$_re = explode("/",$_REQUEST['q']);
			$_classname = $_re[1]."Class";
			include_once("modules/{$_re[1]}/{$_re[1]}.class.php");
			$_cn = new $_classname();
			$result = $_cn->$_re[2]($data);
			if ($result!=true){
				echo "<script>alert('操作错误');history.go(-1);</script>";
			}else{
				echo "<script>alert('操作成功');history.go(-1);</script>";
			}
		}
	}
}


/**处理表单*/
/*
elseif ($_G['query_site'] == "action" ){
	if (!isset($_REQUEST['s'])) die("请不要乱操作");
	$site_res =  $mysql->db_select("site","site_id=".$_REQUEST['s']);
	if (count($_POST)==0){die("请不要乱操作");}
	$result = $mysql->db_show_fields($site_res['code']);
	foreach ($_POST as  $key => $value){
		if (in_array($key,$result)){
			$_result[$key] = $_POST[$key];
		}
	}
	$pic_name = upload('logoimg');
	if (is_array($pic_name)){
		$_result['logoimg'] = $pic_name[0];
	}
	$mysql->db_add($site_res['code'],$_result);
	echo "<script>alert('添加成功');history.go(-1);</script>";
}*/
/**
 * 查看快捷标信息
**/
elseif ($_REQUEST['q'] == "viewfast"){
	$id = $_REQUEST['id'];
	if(empty($id)) exit("参数有误");
	$sql = "select * from `{daizi}` where id = {$id}";
	$result = $mysql->db_fetch_array($sql);
	$magic->assign("viewfast",$result);
	$magic->display("fast_view.html");
}


else{

		/**
		* 关闭网站
		**/
		if ($_G['system']['con_webopen']==1){
			die($_G['system']['con_closemsg']);
		}

		//获得站点和文章的信息
		$quer = explode("/",$query_string[0]);
		if (isset($_REQUEST['query_site']) && $_REQUEST['query_site']!=""){
			$site_nid =$_REQUEST['query_site'];
		}else{
			$site_nid = isset($quer[0])?$quer[0]:"";
		}
		$article_id = isset($quer[1])?$quer[1]:"";
		$content_page = isset($quer[2])?$quer[2]:"";//内容的分页


		$_G['article_id'] = $article_id;
		//获得站点的信息
		$_G['site_result'] = "";
		if (isset($_G['site_list']) && $_G['site_list']!=""){
			foreach ($_G['site_list'] as $key => $value){
				if ($value['nid'] == $site_nid){
					$_G['site_result'] = $value;
				}
			}
		}

		//模块信息
		$_G['module_result'] = "";
		if (file_exists(ROOT_PATH."core/module.class.php")){
			include_once (ROOT_PATH."core/module.class.php");
			if (isset($_G['site_result']['code'])){
				$_G['module_result']  = moduleClass::GetOne(array("code"=>$_G['site_result']['code']));
			}
		}

		//论坛
		if ($site_nid == "bbs" ){
			$_G['site_result']['nid'] = "bbs";
			include_once ("modules/dwbbs/dwbbs.inc.php");
		}

		//判断站点是否存在
		elseif (!empty($_G['site_result'])){

			//获得子站点的信息
			foreach ($_G['site_list'] as $key => $value){
				if ($value['pid'] == $_G['site_result']['site_id']){
					if ($value['status']==1){
						$_G['site_sub_list'][] = $value;//子站点列表
					}
				}
				if ($value['site_id'] == $_G['site_result']['pid']){
					$_G['site_presult'] = $value;//父站点
				}
				if ($value['pid'] == $_G['site_result']['pid']){
					if ($value['status']==1){
						$_G['site_brother_list'][] = $value;//同级站点列表
					}
				}
			}

			if (isset($_G['site_presult']) && $_G['site_presult']['pid']!=0){
				foreach ($_G['site_list'] as $key => $value){
					if ($value['site_id'] == $_G['site_presult']['pid']){
						$_G['site_mresult'] = $value;//父站点
					}
				}
			}

			//单条文章
			if ($article_id!="" && is_numeric($article_id)){
				$code = $_G['site_result']['code'];
				$codeclass = $code."Class";
				if (file_exists(ROOT_PATH."modules/{$code}/{$code}.class.php")){

					include_once(ROOT_PATH."modules/{$code}/{$code}.class.php");
					$class = new $codeclass();
					$result = $class->GetOne(array("id"=>$article_id,"click"=>true));
					$_G['article'] = $result;
				}

				if (count($_G['article']) <= 0){
					$template = "error.html";
				}else{
					$template = $_G['site_result']['content_tpl'];
				}
			}
			//文章列表
			else{
				if ($_G['site_result']['pid']==0){
					$template = $_G['site_result']['index_tpl'];
				}else{
					$template = $_G['site_result']['list_tpl'];
				}
			}
		}else{

			if ($site_nid == 'invest_list') {
				$template = 'invest_list.html';
			} elseif ($site_nid==""||$site_nid=="XDEBUG_SESSION_START=ECLIPSE_DBGP"){
			// 默认首页的模板文件
				$template = !isset($_G['system']['con_index_tpl'])?"index.html":$_G['system']['con_index_tpl'];
			}else{
				$msg = array("您的输入有误,找不到相应的页面","<a href='/'>返回首页</a>");
			}
		}

		if (isset($msg) && $msg!=""){
			$_G['msg'] = $msg;
			$template = "error.html";
		}
		if($_REQUEST['type']==24) $miaobiao = true ;
		if($_REQUEST['type']=='fast'){
			if($_G['user_result']['scene_status'] == 1){

            }else{
                echo '<script>alert("对不起，您的账户暂时不具备发布抵押标资格，请与客服联系申请发布资格");</script>';
                echo '<script>window.location.href="/index.php";</script>';
                exit;
            }
			$kuanbiao = true;
		}

		if($kuanbiao){
			//if($_POST){
				include_once(ROOT_PATH."modules/{$_G['site_result']['code']}/{$_G['site_result']['code']}.class.php");
				$datase=$_POST;
				$datase['user_id'] = $_G['user_id'];
				$inid = borrowClass::add_fast_biao($datase);
				header("location:/publish/main.html?type=fast_{$inid}");
			//}
			$magic->display("fast.html");
			exit;
		}
		$se = true;
		if(isset($_REQUEST['type'])){
			$sff = explode("_",$_REQUEST['type']);
			if(isset($sff[1]) && !empty($sff[1])>0 && !is_array($mysql->db_fetch_array("select * from `{daizi}` where user_id='{$_G['user_id']}' and id='$sff[1]' and borrow_id=0"))) $se=false;
		}

		if(!$se){
			echo '<script>alert("输入有误");</script>';
			echo '<script>window.location.href="/publish/main.html?type=fast";</script>';
			exit;
		}elseif($_REQUEST['type'] == "jin"){
			if($_G['user_result']['scene_status'] == 1){

            }else{
                echo '<script>alert("对不起，您的账户暂时不具备发布净值标资格，请与客服联系申请发布资格");</script>';
                echo '<script>window.location.href="/index.php";</script>';
                exit;
            }
			$magic->assign("jinbiao",true);
	    }elseif($_REQUEST['type'] == "liuzhuan"){
			if($_G['user_result']['scene_status'] == 1){

            }else{
                echo '<script>alert("对不起，您的账户暂时不具备发布流转标资格，请与客服联系申请发布资格");</script>';
                echo '<script>window.location.href="/index.php";</script>';
                exit;
            }
			$magic->assign("liuzhuan",true);
		}elseif($_REQUEST['type'] != "vouch" && !$miaobiao && $_REQUEST['type'] != "month"){
			$magic->assign("fastbiao",true);
			$magic->assign("fastid",$sff[1]);
		}

		if($_REQUEST['x'] == "cz"){
			if($_G['user_result']['scene_status'] == 1){

            }else{
                echo '<script>alert("对不起，您的账户暂时不具备发布重组标资格，请与客服联系申请发布资格");</script>';
                echo '<script>window.location.href="/index.php";</script>';
                exit;
            }
			$magic->assign("cb",$_SESSION['cz_can_total']);
			$magic->assign("cz_id",$_SESSION['cz_id']);
		}


		$magic->assign("_G",$_G);
		$magic->assign("miaobiao",$miaobiao);
		if (isset($_G['site_result']['code']) && $_G['site_result']['code']!=""){
			$magic->display(format_tpl($template,array("code"=>$_G['site_result']['code'])));
		}else{
			$magic->display($template);
		}
		exit;
}

?>
