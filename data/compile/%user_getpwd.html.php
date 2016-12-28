<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" type="text/css" rel="stylesheet" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" type="text/css" rel="stylesheet" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/tipswindown.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/user.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/tipswindown.js"></script>
<!--用户登录注册的头部 结束-->

<!--用户注册 开始-->
<div class="user_action_main">

	<!--用户注册左边 开始-->
	<div class="user_action_reg_left">
		<!--用户注册 开始-->
		<div class="user_action_getpwd_top"></div>
		<div class="user_action_reg_submit">
			<form action="" method="post" name="formUser" >
			<div class="user_action_reg_form">
				<p><? if (!isset($this->magic_vars['_U']['getpwd_msg'])) $this->magic_vars['_U']['getpwd_msg']=''; ;if (  $this->magic_vars['_U']['getpwd_msg']==""): ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:16px;">请填写你的邮箱和密码进行密码的重置</font><? else: ?><font color="#FF0000"><? if (!isset($this->magic_vars['_U']['getpwd_msg'])) $this->magic_vars['_U']['getpwd_msg'] = ''; echo $this->magic_vars['_U']['getpwd_msg']; ?></font><? endif; ?></p>
				<p>
				  <label for="email">电子邮箱：</label>
				  <input  maxLength=32  class="user_aciton_input1" name=email id=email>
				</p>
				<p>
				  <label for="email">用户名：</label>
				  <input maxLength=15  class="user_aciton_input1" name=username id=username h >
				</p>
				<p>
				  <label for="email">验证码：</label>
				  <span><input maxLength=4  class="user_aciton_input" name=valicode id=valicode align="top"></span>
				   <span >
				   <img src="/plugins/index.php?q=imgcode&height=23" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&height=23&t=' + Math.random();"  />
				   </span>
				</p>
				<p  align="left">
				<span> <input type="submit" value="" class="sb"  /></span>
				</p>	
			</div>
		
		</div>
		<div class="user_action_reg_foot"></div>
	</div>
	<!--用户注册右边 开始-->
	<!--用户注册右边 结束-->
</div>
<!--用户注册 结束-->


<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>