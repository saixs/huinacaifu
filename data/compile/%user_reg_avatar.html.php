<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" type="text/css" rel="stylesheet" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" type="text/css" rel="stylesheet" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/tipswindown.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/base.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/user.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/tipswindown.js"></script>


<body>

<!--用户登录注册的头部 开始-->

<!--用户登录注册的头部 结束-->

<!--用户注册 开始-->
<div class="user_action_main topborder">

	<!--用户注册左边 开始-->
	<div class="user_action_reg_left" >
		<!--用户注册 开始-->
		<div class="user_action_reg_top"></div>
		<div class="user_action_reg_submit">
			<div class="user_action_reg_a3"></div>
			<table border="0" align="center" cellpadding="0" cellspacing="0">   <tr>     <td height="45" align="center" valign="middle">
				<br />
				 <? 
 require_once(ROOT_PATH.'plugins/avatar/configs.php');
require_once(ROOT_PATH.'plugins/avatar/avatar.class.php');
$objAvatar = new Avatar();
echo $objAvatar->uc_avatar($this->magic_vars['_G']['user_id'], 'virtual');
?>
					</td>   </tr> </table> 
					<a href="/index.php?user&q=action/reg_avatar&jump=true">如果不想上传头，请点击这里进入用户中心</a>
		
		</div>
		<div class="user_action_reg_foot"></div>
	</div>
	<!--用户注册右边 开始-->
	
	<!--用户注册右边 结束-->
</div>
<!--用户注册 结束-->


<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>