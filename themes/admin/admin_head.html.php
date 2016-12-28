<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>{$_A.list_name|default:"管理中心"}_{$_G.system.con_webname}管理后台</title>
<link href="{$tpldir}/admin.css" rel="stylesheet" type="text/css" />
<link href="{$tpldir}/css/tipswindown.css" rel="stylesheet" type="text/css" />
<script src="{$tpldir}/js/jquery.js" type="text/javascript"></script>
<script src="{$tpldir}/js/tipswindown.js" type="text/javascript"></script>
<script src="plugins/timepicker/WdatePicker.js" type="text/javascript"></script>
<script src="{$tpldir}/js/base.js" type="text/javascript"></script>
<script charset="utf-8" src="/plugins/editor/kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/plugins/editor/kindeditor/lang/zh_CN.js"></script>
		{literal}
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
		{/literal}
</head>

<body>
<div class="main top">
	<div class="logo "><a href="{$_A.admin_url}"><img src="{$tpldir}/images/admin_top.jpg" /></a></div>
	<div class="banner">
		<div class="banner_top">
			<span>
			 <a href="{$_A.admin_url}">后台首页</a> | 您好，<font color="#FF0000">{$_G.user_result.username}</font> [{$_G.user_result.typename}] &nbsp; &nbsp;
			<a href="{$_A.admin_url}&q=logout">退出</a>
		 </span>  <a href="/" target="_blank">查看网站首页</a>
		 <span style="line-height:30px;position:relative; right:60px; width:300px; height:50px; "><br>系统当前时间：<font color="#ffffff"><?php echo date("Y-m-d H:i:s");?></font></br></span>
		 </div> 

	</div>
	<div class="banner_position">
 
		<ul class="aNavContent">
			{if $_A.pur_header.borrow_all==1}<li class=""><a href="{$_A.admin_url}&q=module/borrow&site_id=8&a=borrow">贷款管理</a></li>{/if}
			{if $_A.pur_header.attestation_all==1}<li class=""><a href="{$_A.admin_url}&q=module/attestation/all&site_id=26&a=attestation">认证管理</a></li>{/if}
		    {if $_A.pur_header.account_all==1}<li class=""><a href="{$_A.admin_url}&q=module/account/list&a=cash"> 资金管理</a></li>{/if}
            {if $_A.pur_header.integral_all==1}<li class=""><a href="{$_A.admin_url}&q=module/integral/list&a=integral"> 积分管理</a></li>{/if}
			{if $_A.pur_header.userinfo_all==1}<li class=""><a href="{$_A.admin_url}&q=module/userinfo&site_id=46&a=userinfo">客户管理</a></li>{/if}
            {if $_A.pur_header.content_all==1}<li class=""><a href="{$_A.admin_url}&q=content">内容管理</a></li>{/if}
			{if $_A.pur_header.other_all==1}<li class=""><a href="{$_A.admin_url}&q=site/loop&a=loop">栏目管理</a></li>{/if}
			{if $_A.pur_header.other_all==1}<li class=""><a href="{$_A.admin_url}&q=module">模块管理</a></li>{/if}
			{if $_A.pur_header.other_all==1}<li class=""><a href="{$_A.admin_url}&q=system">系统设置</a></li>{/if}

		</ul>
	</div>
</div><br />

<div class="main">
	<div class="main_left">
		{if $magic.request.a=="control"}
			{include file="admin_control_menu.html"}
		{elseif $magic.request.a=="loop"}
			{include file="admin_loop_menu.html"}
        {elseif $magic.request.a=="bbs" || $_A.query_sort == "bbs"}
			{include file="dwbbs_menu.tpl" template_dir="modules/dwbbs"}
		{elseif $magic.request.a == "site" }
			{include file="admin_site_menu.html"}
		{elseif $magic.request.a == "borrow" }
			{include file="admin_borrow_menu.html"}
		{elseif $magic.request.a == "cash" }
			{include file="admin_cash_menu.html"}
		{elseif $magic.request.a == "integral"}
			{include file="admin_integral_menu.html"}
		{elseif $magic.request.a == "userinfo" }
			{include file="admin_userinfo_menu.html"}
		{elseif $magic.request.a == "attestation" }
			{include file="admin_attestation_menu.html"}
		{elseif $magic.request.a == "content" }
			{include file="admin_content_menu.html"}
		{elseif $magic.request.a=="system" || $_A.query_sort == "system"}
			{include file="admin_system_menu.html"}
		{elseif $magic.request.a == "module" || $_A.query_sort == "module"}
			{include file="admin_module_menu.html"}
		{else}
			{include file="admin_site_menu.html"}

		{/if}
	</div>
	<div class="main_right">
 
		<div class="main_site">
			<ul>
				
				<li class="site_sub">{$_A.list_menu}</li>
				<li class="title">{$_A.list_name} <span>/ {if $_A.site_result.name!=""}{$_A.site_result.name}{else}{$_A.list_title} {/if}</span></li>
				
			</ul>
		</div>
		<div class="main_content">
			
		 