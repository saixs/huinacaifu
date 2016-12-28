<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>

<!--主体-->
<div class="user_center">
	<div class="user_c_main clearfix">
        <!--左栏-->
        <div id="zh_leftside">
            <? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
        </div>
        <!--左栏 end-->
		<div class="user_c_m_r">
			<div class="account_1f clearfix">
				<div class="account_1f_l">
					<dl>
						<dt><a href="/index.php?user&q=code/user/avatar"><img src="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = '';$_tmp = $this->magic_vars['_G']['user_id'];$_tmp = $this->magic_modifier("avatar",$_tmp,"");echo $_tmp;unset($_tmp); ?>"  /></a></dt>
						<dd>
							<h1>账户概况</h1>
							<p>
								<span><? if (!isset($this->magic_vars['_G']['user_result']['type_id'])) $this->magic_vars['_G']['user_result']['type_id'] = '';$_tmp = $this->magic_vars['_G']['user_result']['type_id'];$_tmp = $this->magic_modifier("user_type",$_tmp,"");echo $_tmp;unset($_tmp); ?><? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?></span>
								欢迎您
							</p>
							<p>
								<div class="account_1f_l_b_r">
									<a href="/index.php?user&q=code/account/recharge_new">充值</a>
									<a href="/index.php?user&q=code/account/cash_new" class="tixian">提现</a>
								</div>
							</p>
						</dd>
					</dl>
					<div class="account_1f_l_b">
						<? $data = array('user_id'=>'0','var'=>'acc','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>
						<div class="account_1f_l_b_l" style="position: relative; left: 50px;">
							<p>可用余额</p>
							<p>
								<span>
									<span class="fc">￥<? if (!isset($this->magic_vars['acc']['use_money'])) $this->magic_vars['acc']['use_money'] = '';$_tmp = $this->magic_vars['acc']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></span>元
								</span>
							</p>
						</div>
						<div class="account_1f_l_b_l" style="position: relative; left: 100px;">
							<p>冻结金额</p>
							<p>
								<span>
									<span class="fc">￥<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></span>元
								</span>
							</p>
						</div>
						<? unset($_magic_vars);unset($data); ?>
					</div>
				</div>
				<div class="account_1f_r">
					<h1>上次登录IP：<? if (!isset($this->magic_vars['_G']['user_result']['upip'])) $this->magic_vars['_G']['user_result']['upip'] = ''; echo $this->magic_vars['_G']['user_result']['upip']; ?>   上次登录时间：<? if (!isset($this->magic_vars['_G']['user_result']['uptime'])) $this->magic_vars['_G']['user_result']['uptime'] = '';$_tmp = $this->magic_vars['_G']['user_result']['uptime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></h1>
					<ul class="clearfix">
						<li>
							<a href="/index.php?user&q=code/user/realname">
								<img src="/public/images/user_center_realname<? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status']=''; ;if (  $this->magic_vars['_G']['user_result']['real_status'] == 1): ?>1<? else: ?>2<? endif; ?>.png" alt="" />
								<p>实名认证</p>
							</a>
						</li>
						<li>
							<a href="/index.php?user&q=code/user/phone_status">
								<img src="/public/images/user_center_phone<? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']==1): ?>1<? else: ?>2<? endif; ?>.png" alt="" />
								<p>手机认证</p>
							</a>
						</li>
						<li>
							<a href="/index.php?user&q=code/user/email_status">
								<img src="/public/images/user_center_email<? if (!isset($this->magic_vars['_G']['user_result']['email_status'])) $this->magic_vars['_G']['user_result']['email_status'] = '';$_tmp = $this->magic_vars['_G']['user_result']['email_status'];$_tmp = $this->magic_modifier("default",$_tmp,"2");echo $_tmp;unset($_tmp); ?>.png" alt="" />
								<p>邮箱认证</p>
							</a>
						</li>
						<li>
							<a href="/index.php?user&q=code/user/paypwd">
								<img src="/public/images/user_center_pwd<? if (!isset($this->magic_vars['_G']['user_result']['paypassword'])) $this->magic_vars['_G']['user_result']['paypassword']=''; ;if (  $this->magic_vars['_G']['user_result']['paypassword']!=''): ?>1<? else: ?>2<? endif; ?>.png" alt="" />
								<p>交易密码</p>
							</a>
						</li>
					</ul>
					<h2>
						<div class="account_1f_l_b_l" style="position: relative; top: -20px; left: 30px;">
							<p>账户总资产</p>
							<p>
								<span>

										<span class="fc">￥<? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></span>元

								</span>
							</p>
						</div>
						<div class="account_1f_l_b_l" style="position: relative; top: -20px;left: 80px;">
							<p>待收总额</p>
							<p>
								<span>
										<span class="fc">￥<? if (!isset($this->magic_vars['acc']['collection'])) $this->magic_vars['acc']['collection'] = '';$_tmp = $this->magic_vars['acc']['collection'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></span>元
								</span>
							</p>
						</div>
					</h2>
				</div>
			</div>
			<div class="account_2f">
				<ul class="account_2f_t">
					<li onclick="callPanel(1)" class="active">赚取收益</li>
					<li onclick="callPanel(2)">充值提现</li>
				</ul>
				<script>
					
					$('.account_2f_t li:first').css('border','none');
					$('.account_2f_t li').click(function(){
						$('.account_2f_t li').removeClass('active');
						$(this).addClass('active');
					});
					function callPanel(type) {
						if (type == 1){
							$('#b').css('display','none');
							$('#a').css('display','block');
						} else {
							$('#a').css('display','none');
							$('#b').css('display','block');
						}
					}
					
				</script>
				<? $data = array('user_id'=>'0','var'=>'acc','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>
				<ul class="account_2f_m clearfix" id="a">
					<li>
						<p>累计收益</p>
						<p><span>￥<? if (!isset($this->magic_vars['acc']['collection_interest1'])) $this->magic_vars['acc']['collection_interest1'] = ''; if (!isset($this->magic_vars['acc']['award_add'])) $this->magic_vars['acc']['award_add'] = '';$_tmp = $this->magic_vars['acc']['collection_interest1']+$this->magic_vars['acc']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元</span></p>
					</li>
					<li>
						<p>累计利息</p>
						<p><span>￥<? if (!isset($this->magic_vars['acc']['collection_interest1'])) $this->magic_vars['acc']['collection_interest1'] = '';$_tmp = $this->magic_vars['acc']['collection_interest1'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元</span></p>
					</li>
					<li>
						<p>累计奖励</p>
						<p><span>￥<? if (!isset($this->magic_vars['acc']['award_add'])) $this->magic_vars['acc']['award_add'] = '';$_tmp = $this->magic_vars['acc']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元</span></p>
					</li>
				</ul>
				<ul class="account_2f_m clearfix" id="b" style="display: none;">
					<li>
						<p>累计充值</p>
						<p><span>￥<? if (!isset($this->magic_vars['_U']['account_log']['recharge_success'])) $this->magic_vars['_U']['account_log']['recharge_success'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元</span></p>
					</li>
					<li>
						<p>累计提现</p>
						<p><span>￥<? if (!isset($this->magic_vars['_U']['account_log']['recharge_success'])) $this->magic_vars['_U']['account_log']['recharge_success'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元</span></p>
					</li>
					<li>
						<p>累计投标</p>
						<p><span>￥<? if (!isset($this->magic_vars['acc']['success_account'])) $this->magic_vars['acc']['success_account'] = '';$_tmp = $this->magic_vars['acc']['success_account'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元</span></p>
					</li>
				</ul>
				<? unset($_magic_vars);unset($data); ?>
			</div>
		</div>
	</div>
</div>

<!--主体 end-->

<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>