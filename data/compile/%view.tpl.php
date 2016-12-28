
<div class="module_add">
	<div class="module_border">
		<div class="s">用户名:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = ''; echo $this->magic_vars['_A']['user_result']['username']; ?> </div>
		 <div class="s">真实姓名:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['realname'])) $this->magic_vars['_A']['user_result']['realname'] = ''; echo $this->magic_vars['_A']['user_result']['realname']; ?> </div>
	</div>
	
	<div class="module_border">
		<div class="s">邮箱:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['email'])) $this->magic_vars['_A']['user_result']['email'] = ''; echo $this->magic_vars['_A']['user_result']['email']; ?> </div>
		 <div class="s">性别:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']=''; ;if (  $this->magic_vars['_A']['user_result']['sex']==1): ?>男<? else: ?>女<? endif; ?>  </div>
	</div>
	
	<div class="module_border">
		<div class="s">民族:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['nation'])) $this->magic_vars['_A']['user_result']['nation'] = '';$_tmp = $this->magic_vars['_A']['user_result']['nation'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?> </div>
		 <div class="s">生日:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['birthday'])) $this->magic_vars['_A']['user_result']['birthday'] = '';$_tmp = $this->magic_vars['_A']['user_result']['birthday'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d ");echo $_tmp;unset($_tmp); ?> </div>
	</div>
	
	<div class="module_border">
		<div class="s">籍贯:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['area'])) $this->magic_vars['_A']['user_result']['area'] = '';$_tmp = $this->magic_vars['_A']['user_result']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?> </div>
		 <div class="s">证件:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['card_id'])) $this->magic_vars['_A']['user_result']['card_id'] = ''; echo $this->magic_vars['_A']['user_result']['card_id']; ?> </div>
	</div>
	
	<div class="module_border">
		<div class="s">电话:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['phone'])) $this->magic_vars['_A']['user_result']['phone'] = ''; echo $this->magic_vars['_A']['user_result']['phone']; ?> </div>
		 <div class="s">QQ:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['qq'])) $this->magic_vars['_A']['user_result']['qq'] = ''; echo $this->magic_vars['_A']['user_result']['qq']; ?> </div>
	</div>
	
	<div class="module_border">
		<div class="s">余额 :</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['money'])) $this->magic_vars['_A']['user_result']['money'] = ''; echo $this->magic_vars['_A']['user_result']['money']; ?> </div>
		 <div class="s">信用积分:</div>
		<div class="h">
		 <? if (!isset($this->magic_vars['_A']['user_result']['integral'])) $this->magic_vars['_A']['user_result']['integral'] = ''; echo $this->magic_vars['_A']['user_result']['integral']; ?> </div>
	</div>
	
	
</div>