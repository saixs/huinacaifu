 		<div class="fenlan">
			<div class="fenlan_title"><span><a href="javascript:void(0);" onclick="change_menu('site_menu_1',this)">+</a></span><strong><a href="#" >积分管理</a></strong></div>
			<div class="fenlan_content">
				<ul id="site_menu_1">
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/convert&a=integral" id="">用户兑换信息</a></li>
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/convert&status=1&a=integral" id="">兑换成功</a></li>
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/convert&status=2&a=integral" id="">兑换失败</a></li>
				
				</ul>
			</div>
		</div>
		<div class="fenlan">
			<div class="fenlan_title"><span><a href="javascript:void(0);" onclick="change_menu('site_menu_2',this)">+</a></span><strong><a href="#" >用户积分管理</a></strong></div>
			<div class="fenlan_content">
				<ul id="site_menu_2">
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/user_list&a=integral" id="">查看所有帐户</a></li>
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/deduct&a=integral" id="">会员积分扣除</a></li>
 					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/recharge_integral&a=integral" id="">添加积分充值</a></li>
				</ul>
			</div>
		</div>
 		<div class="fenlan">
			<div class="fenlan_title"><span><a href="javascript:void(0);" onclick="change_menu('site_menu_3',this)">+</a></span><strong><a href="#" >积分记录</a></strong></div>
			<div class="fenlan_content">
				<ul id="site_menu_3">
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/recharge&a=integral">充值记录</a></li>
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/cash&status=1&a=integral" id="">充值成功记录</a></li>
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/cash&status=2&a=integral" id="">充值失败记录</a></li>
					<li><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/integral/log&a=integral" id="">积分记录</a></li>
				</ul>
			</div>
		</div>
 