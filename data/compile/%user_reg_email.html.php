<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>

<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" type="text/css" rel="stylesheet" />
<link href="themes/admin/css/tipswindown.css" rel="stylesheet" type="text/css" />
<script src="themes/admin/js/jquery.js" type="text/javascript"></script>
<script src="themes/admin/js/tipswindown.js" type="text/javascript"></script>

<!--�û���¼ע���ͷ�� ����-->
<div id="about_content" style="width:993px;margin: 0px auto;padding: 0px 0px 20px;">
<!--�û�ע�� ��ʼ-->
<div class="user_action_main topborder">

	<!--�û�ע����� ��ʼ-->
	<div class="user_action_reg_left">
		<!--�û�ע�� ��ʼ-->
		<div class="user_action_reg_top"></div>
		<div class="user_action_reg_submit">
			<div class="user_action_reg_a1"></div>
			<div class="user_action_reg_form" style="width:86%">
			<strong><? if (!isset($this->magic_vars['_U']['sendemail'])) $this->magic_vars['_U']['sendemail'] = ''; echo $this->magic_vars['_U']['sendemail']; ?></strong> ���յ�һ����֤�ʼ�������ա�
�ɹ���֤����Ϳ��Գ���ʹ��վ�����й��ܡ�<br /><br />

<a href="<? if (!isset($this->magic_vars['_U']['emailurl'])) $this->magic_vars['_U']['emailurl'] = ''; echo $this->magic_vars['_U']['emailurl']; ?>" target="_blank"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/renzheng.png" align="absmiddle" /></a><br /><br />

���û���յ����䣬������ <a href="javascript:void(0);" onclick='tipsWindown("�ʼ�����","url:get?index.php?user&q=action/reg_send_email",300,100,"true","","true","text")'><font color="#FF0000">���¼���</font></a>������䡣<br />
<a href="/index.php?user&q=action/reg_email&jump=true">���������֤��������������ȥ</a>
			</div>
		</div>
		<div class="user_action_reg_foot"></div>
	</div>
	
</div>
<!--�û�ע�� ����-->

</div>
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>