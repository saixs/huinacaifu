<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><? if (!isset($this->magic_vars['_A']['list_name'])) $this->magic_vars['_A']['list_name'] = '';$_tmp = $this->magic_vars['_A']['list_name'];$_tmp = $this->magic_modifier("default",$_tmp,"管理中心");echo $_tmp;unset($_tmp); ?>_<? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>管理后台</title>
<link href="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/admin.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/css/tipswindown.css" rel="stylesheet" type="text/css" />
<script src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/js/jquery.js" type="text/javascript"></script>
<script src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/js/tipswindown.js" type="text/javascript"></script>
<script src="plugins/timepicker/WdatePicker.js" type="text/javascript"></script>
<script src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/js/base.js" type="text/javascript"></script>
<script charset="utf-8" src="/plugins/editor/kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/plugins/editor/kindeditor/lang/zh_CN.js"></script>
		
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});
				K('input[name=getHtml]').click(function(e) {
					alert(editor.html());
				});
				K('input[name=isEmpty]').click(function(e) {
					alert(editor.isEmpty());
				});
				K('input[name=getText]').click(function(e) {
					alert(editor.text());
				});
				K('input[name=selectedHtml]').click(function(e) {
					alert(editor.selectedHtml());
				});
				K('input[name=setHtml]').click(function(e) {
					editor.html('<h3>Hello KindEditor</h3>');
				});
				K('input[name=setText]').click(function(e) {
					editor.text('<h3>Hello KindEditor</h3>');
				});
				K('input[name=insertHtml]').click(function(e) {
					editor.insertHtml('<strong>插入HTML</strong>');
				});
				K('input[name=appendHtml]').click(function(e) {
					editor.appendHtml('<strong>添加HTML</strong>');
				});
				K('input[name=clear]').click(function(e) {
					editor.html('');
				});
			});
		</script>
		
</head>

<body>
<div class="main top">
	<div class="logo "><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/admin_top.jpg" /></a></div>
	<div class="banner">
		<div class="banner_top">
			<span>
			 <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>">后台首页</a> | 您好，<font color="#FF0000"><? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?></font> [<? if (!isset($this->magic_vars['_G']['user_result']['typename'])) $this->magic_vars['_G']['user_result']['typename'] = ''; echo $this->magic_vars['_G']['user_result']['typename']; ?>] &nbsp; &nbsp;
			<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=logout">退出</a>
		 </span>  <a href="/" target="_blank">查看网站首页</a>
		 <span style="line-height:30px;position:relative; right:60px; width:300px; height:50px; "><br>系统当前时间：<font color="#ffffff"><?php echo date("Y-m-d H:i:s");?></font></br></span>
		 </div> 

	</div>
	<div class="banner_position">
 
		<ul class="aNavContent">
			<? if (!isset($this->magic_vars['_A']['pur_header']['borrow_all'])) $this->magic_vars['_A']['pur_header']['borrow_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['borrow_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow&site_id=8&a=borrow">贷款管理</a></li><? endif; ?>
			<? if (!isset($this->magic_vars['_A']['pur_header']['attestation_all'])) $this->magic_vars['_A']['pur_header']['attestation_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['attestation_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/attestation/all&site_id=26&a=attestation">认证管理</a></li><? endif; ?>
		    <? if (!isset($this->magic_vars['_A']['pur_header']['account_all'])) $this->magic_vars['_A']['pur_header']['account_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['account_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/account/list&a=cash"> 资金管理</a></li><? endif; ?>
            <? if (!isset($this->magic_vars['_A']['pur_header']['integral_all'])) $this->magic_vars['_A']['pur_header']['integral_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['integral_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/list&a=integral"> 积分管理</a></li><? endif; ?>
			<? if (!isset($this->magic_vars['_A']['pur_header']['userinfo_all'])) $this->magic_vars['_A']['pur_header']['userinfo_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['userinfo_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/userinfo&site_id=46&a=userinfo">客户管理</a></li><? endif; ?>
            <? if (!isset($this->magic_vars['_A']['pur_header']['content_all'])) $this->magic_vars['_A']['pur_header']['content_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['content_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=content">内容管理</a></li><? endif; ?>
			<? if (!isset($this->magic_vars['_A']['pur_header']['other_all'])) $this->magic_vars['_A']['pur_header']['other_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['other_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/loop&a=loop">栏目管理</a></li><? endif; ?>
			<? if (!isset($this->magic_vars['_A']['pur_header']['other_all'])) $this->magic_vars['_A']['pur_header']['other_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['other_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module">模块管理</a></li><? endif; ?>
			<? if (!isset($this->magic_vars['_A']['pur_header']['other_all'])) $this->magic_vars['_A']['pur_header']['other_all']=''; ;if (  $this->magic_vars['_A']['pur_header']['other_all']==1): ?><li class=""><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=system">系统设置</a></li><? endif; ?>

		</ul>
	</div>
</div><br />

<div class="main">
	<div class="main_left">
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;if (  $_REQUEST['a']=="control"): ?>
			<? $this->magic_include(array('file' => "admin_control_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a']=="loop"): ?>
			<? $this->magic_include(array('file' => "admin_loop_menu.html", 'vars' => array()));?>
        <? if (!isset($_REQUEST['a'])) $_REQUEST['a']='';if (!isset($this->magic_vars['_A']['query_sort'])) $this->magic_vars['_A']['query_sort']=''; ;elseif (  $_REQUEST['a']=="bbs" ||  $this->magic_vars['_A']['query_sort'] == "bbs"): ?>
			<? $this->magic_include(array('file' => "dwbbs_menu.tpl", 'vars' => array('template_dir' => 'modules/dwbbs')));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a'] == "site"): ?>
			<? $this->magic_include(array('file' => "admin_site_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a'] == "borrow"): ?>
			<? $this->magic_include(array('file' => "admin_borrow_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a'] == "cash"): ?>
			<? $this->magic_include(array('file' => "admin_cash_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a'] == "integral"): ?>
			<? $this->magic_include(array('file' => "admin_integral_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a'] == "userinfo"): ?>
			<? $this->magic_include(array('file' => "admin_userinfo_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a'] == "attestation"): ?>
			<? $this->magic_include(array('file' => "admin_attestation_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']=''; ;elseif (  $_REQUEST['a'] == "content"): ?>
			<? $this->magic_include(array('file' => "admin_content_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']='';if (!isset($this->magic_vars['_A']['query_sort'])) $this->magic_vars['_A']['query_sort']=''; ;elseif (  $_REQUEST['a']=="system" ||  $this->magic_vars['_A']['query_sort'] == "system"): ?>
			<? $this->magic_include(array('file' => "admin_system_menu.html", 'vars' => array()));?>
		<? if (!isset($_REQUEST['a'])) $_REQUEST['a']='';if (!isset($this->magic_vars['_A']['query_sort'])) $this->magic_vars['_A']['query_sort']=''; ;elseif (  $_REQUEST['a'] == "module" ||  $this->magic_vars['_A']['query_sort'] == "module"): ?>
			<? $this->magic_include(array('file' => "admin_module_menu.html", 'vars' => array()));?>
		<? else: ?>
			<? $this->magic_include(array('file' => "admin_site_menu.html", 'vars' => array()));?>

		<? endif; ?>
	</div>
	<div class="main_right">
 
		<div class="main_site">
			<ul>
				
				<li class="site_sub"><? if (!isset($this->magic_vars['_A']['list_menu'])) $this->magic_vars['_A']['list_menu'] = ''; echo $this->magic_vars['_A']['list_menu']; ?></li>
				<li class="title"><? if (!isset($this->magic_vars['_A']['list_name'])) $this->magic_vars['_A']['list_name'] = ''; echo $this->magic_vars['_A']['list_name']; ?> <span>/ <? if (!isset($this->magic_vars['_A']['site_result']['name'])) $this->magic_vars['_A']['site_result']['name']=''; ;if (  $this->magic_vars['_A']['site_result']['name']!=""): ?><? if (!isset($this->magic_vars['_A']['site_result']['name'])) $this->magic_vars['_A']['site_result']['name'] = ''; echo $this->magic_vars['_A']['site_result']['name']; ?><? else: ?><? if (!isset($this->magic_vars['_A']['list_title'])) $this->magic_vars['_A']['list_title'] = ''; echo $this->magic_vars['_A']['list_title']; ?> <? endif; ?></span></li>
				
			</ul>
		</div>
		<div class="main_content">
			
		 