<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>

<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" type="text/css" rel="stylesheet" />
<link href="themes/admin/css/tipswindown.css" rel="stylesheet" type="text/css" />
<script src="themes/admin/js/jquery.js" type="text/javascript"></script>
<script src="themes/admin/js/tipswindown.js" type="text/javascript"></script>

<!--用户登录注册的头部 结束-->
<div id="about_content" style="width:993px;margin: 0px auto;padding: 0px 0px 20px;">
<!--用户注册 开始-->
<div class="user_action_main topborder">

	<!--用户注册左边 开始-->
	<div class="user_action_reg_left">
		<!--用户注册 开始-->
		<div class="user_action_reg_top"></div>
		<div class="user_action_reg_submit">
			<div class="user_action_reg_a1"></div>
			<div class="user_action_reg_form" style="width:86%">
			<strong><? if (!isset($this->magic_vars['_U']['sendemail'])) $this->magic_vars['_U']['sendemail'] = ''; echo $this->magic_vars['_U']['sendemail']; ?></strong> 将收到一封认证邮件，请查收。
成功认证后，你就可以畅快使用站内所有功能。<br /><br />

<a href="<? if (!isset($this->magic_vars['_U']['emailurl'])) $this->magic_vars['_U']['emailurl'] = ''; echo $this->magic_vars['_U']['emailurl']; ?>" target="_blank"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/renzheng.png" align="absmiddle" /></a><br /><br />

如果没有收到邮箱，请点击此 <a href="javascript:void(0);" onclick='tipsWindown("邮件激活","url:get?index.php?user&q=action/reg_send_email",300,100,"true","","true","text")'><font color="#FF0000">重新激活</font></a>你的邮箱。<br />
<a href="/index.php?user&q=action/reg_email&jump=true">如果不想认证，请点击这里跳过去</a>
			</div>
		</div>
		<div class="user_action_reg_foot"></div>
	</div>
	
</div>
<!--用户注册 结束-->

</div>
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>
