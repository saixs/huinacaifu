<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/css/css.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />



<!--������ ��ʼ-->
<div class="wrap950 list_1" style="margin-top: 20px;">
	<div class="title" style="padding-left: 50px;line-height: 13px;"> ����vip��Ϣ��</div>
	<div class="content">
		<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_result']['vip_status']==0): ?>
		    <div style="position: relative;font-size: 14px; left: 100px;font-weight: bold">
                <? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status']='';if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['real_status']==0 ||  $this->magic_vars['_G']['user_result']['phone_status']==0): ?>����: ����VIP֮ǰ��������Ҫ���������֤:<? endif; ?>
                <? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status']=''; ;if (  $this->magic_vars['_G']['user_result']['real_status']==0): ?><a href="/index.php?user&q=code/user/realname"><strong style="font-size: 14px;color: blue">ʵ����֤</strong></a><? endif; ?>
                <? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']==0): ?><a href="/index.php?user&q=code/user/phone_status"><strong style="font-size: 14px;color: blue">�ֻ���֤</strong></a><? endif; ?>
		    </div>
			<form action="/index.php?user&q=code/user/applyvip" method="post">
			<ul class="ul_li_1">
				<li>����״̬�ǣ�<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_result']['vip_status']==0): ?>��ͨ��Ա<? else: ?><font color="#FF0000">VIP��Ա,��Чʱ�䣺</font><? endif; ?></li>
				<li>�û�����<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?></li>
				<li>�� �� ��<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = ''; echo $this->magic_vars['_G']['user_result']['realname']; ?></li>
				<li>�� �� ��<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?></li>

				<li>�� ע ��<textarea rows="5" cols="50" name="vip_remark"></textarea></li>
				<li>��֤�룺<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" /></li>
				<li><input type="submit" value="��Ҫ����" <? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status']='';if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['real_status']==0 ||  $this->magic_vars['_G']['user_result']['phone_status']==0): ?>disabled<? endif; ?> /></li>
			</ul>
			</form>
		<? else: ?>
		<ul class="ul_li_1">
			<li>����״̬�ǣ�<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_result']['vip_status']==0): ?>��ͨ��Ա<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;elseif (  $this->magic_vars['_G']['user_result']['vip_status']==2): ?>VIP������<? if (!isset($this->magic_vars['_G']['user_result']['isvip'])) $this->magic_vars['_G']['user_result']['isvip']=''; ;elseif (  $this->magic_vars['_G']['user_result']['isvip']=="-1"): ?>VIP������,�����ĵȴ�<? else: ?><font color="#FF0000">VIP��Ա</font><? endif; ?></li>
			<? if (!isset($this->magic_vars['_G']['user_result']['isvip'])) $this->magic_vars['_G']['user_result']['isvip']=''; ;if (  $this->magic_vars['_G']['user_result']['isvip']==1): ?><li>��Чʱ�䣺<? if (!isset($this->magic_vars['_G']['user_result']['vip_time'])) $this->magic_vars['_G']['user_result']['vip_time'] = '';$_tmp = $this->magic_vars['_G']['user_result']['vip_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?> �� <? if (!isset($this->magic_vars['_G']['user_result']['vip_time'])) $this->magic_vars['_G']['user_result']['vip_time'] = '';$_tmp = $this->magic_vars['_G']['user_result']['vip_time']+60*60*24*365;$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></li><? endif; ?>
			<li>�û�����<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?></li>
			<li>�� �� ��<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = ''; echo $this->magic_vars['_G']['user_result']['realname']; ?></li>
			<li>�� �� ��<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?></li>
			<li>�� ע ��<? if (!isset($this->magic_vars['_G']['user_result']['vip_remark'])) $this->magic_vars['_G']['user_result']['vip_remark'] = ''; echo $this->magic_vars['_G']['user_result']['vip_remark']; ?></li>
			
		</ul>
		<? endif; ?>
	</div>
	<div class="foot"></div>
	<div>
	
	</div>
</div>
<!--������ ����-->

<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>