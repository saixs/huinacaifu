<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<!--�û���¼ע���ͷ�� ����-->
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" type="text/css" rel="stylesheet" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" type="text/css" rel="stylesheet" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/tipswindown.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/user.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/tipswindown.js"></script>
<!--�û�ע�� ��ʼ-->
<div class="user_action_main">

	<!--�û�ע����� ��ʼ-->
	<div class="user_action_reg_left">
		<!--�û�ע�� ��ʼ-->
		<div class="user_action_getpwd_top"></div>
		<div class="user_action_reg_submit" style="padding-top:0">
			<form action="" method="post" name="formUser" >
			<div class="user_action_reg_form">
				<? if (!isset($this->magic_vars['_U']['updatepwd_msg'])) $this->magic_vars['_U']['updatepwd_msg']=''; ;if (  $this->magic_vars['_U']['updatepwd_msg']!=""): ?>
					<br /><font color="#FF0000"><? if (!isset($this->magic_vars['_U']['updatepwd_msg'])) $this->magic_vars['_U']['updatepwd_msg'] = ''; echo $this->magic_vars['_U']['updatepwd_msg']; ?></font><br /><br /><br />
					<a href="index.php?user&q=action/login">���ص�¼</a>
				<? else: ?>
				<p><? if (!isset($this->magic_vars['_U']['update_msg'])) $this->magic_vars['_U']['update_msg']=''; ;if (  $this->magic_vars['_U']['update_msg']==""): ?>������������ĵ�¼����<? else: ?><font color="#FF0000"><? if (!isset($this->magic_vars['_U']['update_msg'])) $this->magic_vars['_U']['update_msg'] = ''; echo $this->magic_vars['_U']['update_msg']; ?></font><? endif; ?></p>
				<p>
				  <label for="email">�û�����</label>
				  <strong style="font-size:16px;"><? if (!isset($this->magic_vars['_U']['user_result']['username'])) $this->magic_vars['_U']['user_result']['username'] = ''; echo $this->magic_vars['_U']['user_result']['username']; ?></strong>
				</p>
				<p>
				  <label for="email">���룺</label>
				  <input type="password" maxLength=15  class="user_aciton_input1" name=password id=password >
				</p>
				<p>
				  <label for="email">ȷ�����룺</label>
				  <input type="password"  maxLength=15  class="user_aciton_input1" name=confirm_password id=confirm_password  >
				</p>
				<p  align="left">
				<span> <input type="submit" value="" class="sb"  /> <input type="hidden" name="id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" /></span>
				</p>	
				<? endif; ?>
			</div>
			</form>
		</div>
		<div class="user_action_reg_foot"></div>
	</div>
	<!--�û�ע���ұ� ��ʼ-->
	<? $this->magic_include(array('file' => "user_reg_right.html", 'vars' => array()));?>
	<!--�û�ע���ұ� ����-->
</div>
<!--�û�ע�� ����-->


<? $this->magic_include(array('file' => "user_footer.html", 'vars' => array()));?>