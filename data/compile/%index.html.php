<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?><div class="page_video"><span style="position:absolute; top:-16px; right:0; cursor:pointer;">关闭</span><object width="100%" height="100%">  <param name="movie" value="/flv/flvplayer.swf">  <param name="quality" value="high">  <param name="allowFullScreen" value="true">  <param name="FlashVars" value="vcastr_file=Untitled.mp4">  <embed src="/flv/flvplayer.swf" allowfullscreen="true" flashvars="vcastr_file=Untitled.mp4" quality="high" type="application/x-shockwave-flash"></embed></object></div><script>$('.page_video span').click(function(){	$('.page_video').remove();});</script><div class="home_login_content" style="text-align:center;">	<ul class="bg_round" style="z-index: 1">		<? $this->magic_vars['query_type']='GetList';$data = array('type_id'=>'1','limit'=>'6','key'=>'key');$default = '';  include_once(ROOT_PATH.'modules/scrollpic/scrollpic.class.php');$this->magic_vars['magic_result'] = scrollpicClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>		<li value="<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>">			<a href="<? if (!isset($this->magic_vars['var']['url'])) $this->magic_vars['var']['url'] = ''; echo $this->magic_vars['var']['url']; ?>" target="_blank" style="display:block; width:100%; height:100%; background:url(<? if (!isset($this->magic_vars['var']['pic'])) $this->magic_vars['var']['pic'] = ''; echo $this->magic_vars['var']['pic']; ?>) no-repeat center 0;"></a>		</li>		<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>	</ul>	<ul class="bg_round_btn" style="z-index:2; position:relative; top:340px; width:auto; display:inline-block;">		<? $this->magic_vars['query_type']='GetList';$data = array('type_id'=>'1','limit'=>'6','key'=>'key');$default = '';  include_once(ROOT_PATH.'modules/scrollpic/scrollpic.class.php');$this->magic_vars['magic_result'] = scrollpicClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>		<li value="<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>"><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']+1; ?></li>		<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>	</ul>	<script>				$('.bg_round li:first').show();		$('.bg_round_btn li:first').addClass('active');		$('.bg_round_btn li').click(function(){			if($(this).is('.active')) return;			$('.bg_round_btn li').removeClass('active');			var thisval = $(this).addClass('active').attr('value');			$('.bg_round li').fadeOut();			$('.bg_round li[value='+thisval+']').fadeIn();		});		var timer = setInterval(function(){			var $c = $('.bg_round_btn li.active').next();			if($c.length == 0) {				$('.bg_round_btn li:first').click();			}else {				$c.click();			}		},5000);			</script>	<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_id'] == ''): ?>	<div class="h_login_main">		<div class="login_tab" style="position:relative; z-index:3;">			<h1>账号登陆</h1>			<form action="/index.php?user&q=action/login" method="post" enctype="application/x-www-form-urlencoded">				<table>					<tr>						<td><input style="background-image:url('/public/images/new/img_03.png');background-repeat:no-repeat;background-position: 12px 12px;padding-left: 30px;" class="text" type="text" name="keywords" placeholder="用户名：" /></td>					</tr>					<tr>						<td><input style="background-image:url('/public/images/new/img_06.png');background-repeat:no-repeat;background-position: 12px 12px;padding-left: 30px;" class="text" type="password" name="password" placeholder="密　码：" /></td>					</tr>					<tr>						<td class="rem_pass">							<label><input type="checkbox" name="cookie" />　<span>记住我？</span></label>							<a href="/user/getpwd.html">忘记密码？</a>						</td>					</tr>					<tr>						<td>							<input class="text code" type="text" name="valicode" placeholder="验证码：" />							<img id="checkimg" class="checkimg" src="/plugins/index.php?q=imgcode&time=<? if (!isset($this->magic_vars['_G']['nowtime'])) $this->magic_vars['_G']['nowtime'] = ''; echo $this->magic_vars['_G']['nowtime']; ?>" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer;height:25px;" /></a>							<a href="#" class="checkimg_noti" onClick="document.getElementById('checkimg').src='/plugins/index.php?q=imgcode&t=' + Math.random();">换一张图片！</a>						</td>					</tr>										<script type="text/javascript">						function fleshVerify(){							var timenow = new Date().getTime();							document.getElementById('checkimg').src= '/plugins/index.php?q=imgcode&t='+timenow;						}						function changeVerifyCode(){							window.clearInterval(intv);							fleshVerify();						}						var intv = window.setInterval("changeVerifyCode()",1000);					</script>										<tr>						<td class="submit">							<input type="submit" value="登陆" />							<a href="/index.php?user&q=action/reg">注册</a>						</td>					</tr>				</table>			</form>		</div>	</div>	<? endif; ?></div><div class="home_main_top">	<div class="count">			已为投资人创造利润：<span class="red_font">￥<? if (!isset($this->magic_vars['_G']['collected'])) $this->magic_vars['_G']['collected']=''; ;if (  $this->magic_vars['_G']['collected']): ?><? if (!isset($this->magic_vars['_G']['collected'])) $this->magic_vars['_G']['collected'] = ''; echo $this->magic_vars['_G']['collected']; ?><? else: ?>0<? endif; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;			投资总金额已达到：<span class="red_font">￥<? if (!isset($this->magic_vars['_G']['rental'])) $this->magic_vars['_G']['rental']=''; ;if (  $this->magic_vars['_G']['rental']): ?><? if (!isset($this->magic_vars['_G']['rental'])) $this->magic_vars['_G']['rental'] = ''; echo $this->magic_vars['_G']['rental']; ?><? else: ?>0<? endif; ?></span>	</div></div><ul class="home_main_1f_top" style="border-bottom:2px solid #ccc;margin-top: 50px;">	<li onclick="tog(1)" class="active">我要投资</li>	<li onclick="tog(0)">业务简介</li></ul><script>		$('.home_main_1f_top li').click(function(){		$('.home_main_1f_top li').removeClass('active');		$(this).addClass('active');	});	function tog(type) {		if (type == 1) {			$('#nav_page').hide();			$('#mainContent').show();		} else {			$('#mainContent').hide();			$('#nav_page').show();		}	}	</script><div id="mainContent"><div class="home_main">	<div class="home_main_1f">		<div class="home_main_2f_bott2" >			<div class="home_main_2f_bott2_t">				<ul>					<li>						<img style="position: relative; left: 65px;" src="/public/images/new/img_10.png" alt="" />						<p style="position: relative; right: 25px;"><span style="font-weight: bold">收益稳门槛低</span><br />投资门槛100元<br />年化收益12%--20.4%</p>					</li>					<li>						<img style="position:relative; left: 130px;" src="/public/images/new/img_12.png" alt="" />						<p style="position: relative; left: 40px;"><span style="font-weight: bold">本息安全保障</span><br />多重风控审核流程<br />三大担保公司鼎力协作</p>					</li>					<li>						<img style="position: relative; left: 195px;" src="/public/images/new/img_15.png" alt="" />						<p style="position: relative; left: 106px;"><span style="font-weight: bold">灵活便捷高效</span><br />期限灵活<br />多种投资期限供您选择</p>					</li>				</ul>			</div>		</div>		<script>						$('.home_main_1f .home_main_1f_top li').click(function(){				$('.home_main_1f .home_main_1f_top li').removeClass('active');				$(this).addClass('active');			});			$('.home_main_2f_bott2_t li:first').css('margin-left', '0');					</script>	</div>	<div class="home_main_2f2">		<ul class="home_main_2f_top" style="border-bottom:2px solid #ff6e5d;">			<li id="all" onclick="callAJAX(this.id)">全部项目</li>			<li id="personal" onclick="callAJAX(this.id)">个人项目</li>			<li id="enterprise" onclick="callAJAX(this.id)">企业项目</li>			<li id="gov" onclick="callAJAX(this.id)">政府项目</li>		</ul>		<ul class="home_main_2f2_m clearfix" id="borrow_list">			<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','type'=>'index','use'=>isset($_REQUEST['use'])?$_REQUEST['use']:'','account1'=>isset($_REQUEST['account1'])?$_REQUEST['account1']:'','account2'=>isset($_REQUEST['account2'])?$_REQUEST['account2']:'','limittime'=>isset($_REQUEST['limittime'])?$_REQUEST['limittime']:'','award'=>isset($_REQUEST['award'])?$_REQUEST['award']:'','province'=>isset($_REQUEST['province'])?$_REQUEST['province']:'','city'=>isset($_REQUEST['city'])?$_REQUEST['city']:'','epage'=>'9','order'=>isset($_REQUEST['order'])?$_REQUEST['order']:'','gostatus'=>isset($_REQUEST['gostatus'])?$_REQUEST['gostatus']:'','style'=>isset($_REQUEST['style'])?$_REQUEST['style']:'','site_id'=>$this->magic_vars['_G']['site_result']['site_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>			<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>			<li>				<h1><a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = '';$_tmp = $this->magic_vars['var']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"22");echo $_tmp;unset($_tmp); ?></a></h1>				<h2>					<p>						募集金额：<span>￥<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?></span>						<span style="float:right;color: #000000"><? if (!isset($this->magic_vars['var']['use'])) $this->magic_vars['var']['use'] = '';$_tmp = $this->magic_vars['var']['use'];$_tmp = $this->magic_modifier("borrowUse",$_tmp,"");echo $_tmp;unset($_tmp); ?></span>					</p>					<p>截止时间：<? if (!isset($this->magic_vars['var']['verify_time'])) $this->magic_vars['var']['verify_time'] = ''; if (!isset($this->magic_vars['var']['valid_time'])) $this->magic_vars['var']['valid_time'] = '';$_tmp = $this->magic_vars['var']['verify_time']+$this->magic_vars['var']['valid_time']*24*60*60;$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></p>				</h2>				<dl class="clearfix">					<dt>					<p><strong><? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>%</strong></p>					<p>年化利率</p>					</dt>					<dd>						<p>							<? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>							<strong><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?></strong>天							<? else: ?>							<strong><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = ''; echo $this->magic_vars['var']['time_limit']; ?></strong>个月							<? endif; ?>						</p>						<p>项目期限</p>					</dd>				</dl>				<h3>					<p>						<? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>						到期全额还款						<? else: ?>						<? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style'] == 0): ?>						按月分期/等额本息						<? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;elseif (  $this->magic_vars['var']['style']==2): ?>						到期还本付息						<? else: ?>						到期还本按月付息						<? endif; ?>						<? endif; ?>					</p>					<div>						<i percent="<? if (!isset($this->magic_vars['var']['scale'])) $this->magic_vars['var']['scale'] = ''; echo $this->magic_vars['var']['scale']; ?>%"></i>					</div>					<p><span><? if (!isset($this->magic_vars['var']['account_yes'])) $this->magic_vars['var']['account_yes'] = ''; echo $this->magic_vars['var']['account_yes']; ?> /</span> <? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?></p>				</h3>				<h4>					<a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html?detail=true">						<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']='';if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] == 0 ||  $this->magic_vars['var']['status'] == 1): ?>							查看						<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==3): ?>							<? if (!isset($this->magic_vars['var']['repayment_account'])) $this->magic_vars['var']['repayment_account']='';if (!isset($this->magic_vars['var']['repayment_yesaccount'])) $this->magic_vars['var']['repayment_yesaccount']=''; ;if (  $this->magic_vars['var']['repayment_account'] ==  $this->magic_vars['var']['repayment_yesaccount']): ?>								已还完							<? else: ?>								还款中							<? endif; ?>						<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==5): ?>							已撤销						<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account']='';if (!isset($this->magic_vars['var']['account_yes'])) $this->magic_vars['var']['account_yes']=''; ;elseif (  $this->magic_vars['var']['account']> $this->magic_vars['var']['account_yes']): ?>							<? if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $this->magic_vars['var']['is_vouch']==1): ?><!--如果是担保标-->								<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;if (  $this->magic_vars['var']['vouch_scale'] >=100): ?>									立即投标								<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;elseif (  $this->magic_vars['var']['vouch_scale'] < 100): ?>									立即担保								<? else: ?>								<!--<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/tender.gif" />-->								<? endif; ?>							<? else: ?>							立即投标							<? endif; ?>						<? else: ?>							等待复审						<? endif; ?>					</a>				</h4>			</li>		<? endforeach; endif; unset($_from); ?>		<? unset($_magic_vars); ?>			<script type="text/javascript">									function callAJAX(id) {						inputId = 'borrow_list';						ajaxObj = new AJAXClass();						path = '/invest/main.html?type=index&home=true&ajax=true&project_type='+id;						ajaxObj.path = path;						ajaxObj.AJAXRequest();					}							</script>		</ul>	</div><script>		$('.home_main_2f2 .home_main_2f_top li').click(function(){		$('.home_main_2f2 .home_main_2f_top li').removeClass('active');		$(this).addClass('active');	});	$('.home_main_2f2_m li:nth-child(3n+1)').css('margin-left', '0');	$.each($('.home_main_2f2_m li h3 div i') ,function(){		$(this).animate({width:$(this).attr('percent')});	});	</script>		<style type="text/css">		.d1{filter: progid:DXImageTransform.Microsoft.Alpha(opacity=70);opacity:0.7; background-color: #646464;  width: 222px;height: 30px; line-height: 30px;}	</style>		<div class="home_main_2f_bott2" >		<div class="home_main_2f_bott2_b">		<h1 style="background-image:url('/public/images/new/img_21.png');background-repeat:no-repeat;"></h1>		<div class="home_roll_win">			<ul class="clearfix">				<? $this->magic_vars['varlgnore'] = array();$this->magic_vars['varsite_id'] = array(144); if(!isset($this->magic_vars['_G']['site_list'])) $this->magic_vars['_G']['site_list']= array(); $_from = $this->magic_vars['_G']['site_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from,'array'); } if (count($_from)):
 $i=0;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
 if ($this->magic_vars['var']['pid']!=''  && in_array($this->magic_vars['var']['site_id'],$this->magic_vars['varsite_id']) ): $this->magic_vars['key'] =$i?>				<? $this->magic_vars['query_type']='GetList';$data = array('key'=>'key','limit'=>'6','site_var'=>'var','var'=>'item','status'=>'1','site_id'=>$this->magic_vars['var']['site_id']);$default = '';  include_once(ROOT_PATH.'modules/article/article.class.php');$this->magic_vars['magic_result'] = articleClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['item']):
?>				<li>					<a href="<? if (!isset($this->magic_vars['item']['site_nid'])) $this->magic_vars['item']['site_nid'] = ''; echo $this->magic_vars['item']['site_nid']; ?>/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank" class="green"><img src="/public/images/test<? if (!isset($this->magic_vars['i'])) $this->magic_vars['i'] = ''; echo $this->magic_vars['i']++; ?>.jpg" alt="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"40");echo $_tmp;unset($_tmp); ?>" /></a>					<div class="d1" style="position: relative; top: -33px;left: 4px;"><span style="color: #ffffff;font-size: 14px; text-align: center"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"18");echo $_tmp;unset($_tmp); ?></span></div>				</li>				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>				<? $i++;endif;endforeach; endif;  unset($_from);unset($_magic_vars);unset($this->magic_vars['lgnore']); ?>			</ul>		</div>		</div>	</div><div class="home_main_3f2 clearfix">	<div class="home_main_3f2_l">		<h1>			<span>汇纳公告</span>			<a href="/gonggao/main.html">更多&gt;&gt;</a>		</h1>		<ul>			<? $this->magic_vars['varlgnore'] = array();$this->magic_vars['varsite_id'] = array(83); if(!isset($this->magic_vars['_G']['site_list'])) $this->magic_vars['_G']['site_list']= array(); $_from = $this->magic_vars['_G']['site_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from,'array'); } if (count($_from)):
 $i=0;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
 if ($this->magic_vars['var']['pid']!=''  && in_array($this->magic_vars['var']['site_id'],$this->magic_vars['varsite_id']) ): $this->magic_vars['key'] =$i?>			<? $this->magic_vars['query_type']='GetList';$data = array('key'=>'key','limit'=>'10','site_var'=>'var','var'=>'item','status'=>'1','site_id'=>$this->magic_vars['var']['site_id']);$default = '';  include_once(ROOT_PATH.'modules/article/article.class.php');$this->magic_vars['magic_result'] = articleClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['item']):
?>			<li><a title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"40");echo $_tmp;unset($_tmp); ?>" href="<? if (!isset($this->magic_vars['item']['site_nid'])) $this->magic_vars['item']['site_nid'] = ''; echo $this->magic_vars['item']['site_nid']; ?>/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank" class="green"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"16");echo $_tmp;unset($_tmp); ?>...</a></li>			<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>			<? $i++;endif;endforeach; endif;  unset($_from);unset($_magic_vars);unset($this->magic_vars['lgnore']); ?>		</ul>	</div>	<div class="home_main_3f2_r">		<div class="home_main_3f2_r_t">			<h1>				<span>行业资讯</span>				<a href="/projecttell/main.html">更多&gt;&gt;</a>			</h1>			<dl class="clearfix">				<dt><img src="/public/images/new/img_35.png" alt="" /></dt>				<dd>					<? $this->magic_vars['varlgnore'] = array();$this->magic_vars['varsite_id'] = array(143); if(!isset($this->magic_vars['_G']['site_list'])) $this->magic_vars['_G']['site_list']= array(); $_from = $this->magic_vars['_G']['site_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from,'array'); } if (count($_from)):
 $i=0;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
 if ($this->magic_vars['var']['pid']!=''  && in_array($this->magic_vars['var']['site_id'],$this->magic_vars['varsite_id']) ): $this->magic_vars['key'] =$i?>					<? $this->magic_vars['query_type']='GetList';$data = array('key'=>'key','limit'=>'4','site_var'=>'var','var'=>'item','status'=>'1','site_id'=>$this->magic_vars['var']['site_id']);$default = '';  include_once(ROOT_PATH.'modules/article/article.class.php');$this->magic_vars['magic_result'] = articleClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['item']):
?>					<li><a title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"40");echo $_tmp;unset($_tmp); ?>" href="<? if (!isset($this->magic_vars['item']['site_nid'])) $this->magic_vars['item']['site_nid'] = ''; echo $this->magic_vars['item']['site_nid']; ?>/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank" class="green"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"40");echo $_tmp;unset($_tmp); ?>... </a></li>					<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>					<? $i++;endif;endforeach; endif;  unset($_from);unset($_magic_vars);unset($this->magic_vars['lgnore']); ?>				</dd>			</dl>		</div>		<div class="home_main_3f2_r_b">			<h1>				<span>发标预告</span>				<a href="/fbyg/main.html">更多&gt;&gt;</a>			</h1>			<dl class="clearfix">				<dt><img src="/public/images/new/img_39.png" alt="" /></dt>				<dd>					<? $this->magic_vars['varlgnore'] = array();$this->magic_vars['varsite_id'] = array(191); if(!isset($this->magic_vars['_G']['site_list'])) $this->magic_vars['_G']['site_list']= array(); $_from = $this->magic_vars['_G']['site_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from,'array'); } if (count($_from)):
 $i=0;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
 if ($this->magic_vars['var']['pid']!=''  && in_array($this->magic_vars['var']['site_id'],$this->magic_vars['varsite_id']) ): $this->magic_vars['key'] =$i?>					<? $this->magic_vars['query_type']='GetList';$data = array('key'=>'key','limit'=>'5','site_var'=>'var','var'=>'item','status'=>'1','site_id'=>$this->magic_vars['var']['site_id']);$default = '';  include_once(ROOT_PATH.'modules/article/article.class.php');$this->magic_vars['magic_result'] = articleClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['item']):
?>					<li><a title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"40");echo $_tmp;unset($_tmp); ?>" href="<? if (!isset($this->magic_vars['item']['site_nid'])) $this->magic_vars['item']['site_nid'] = ''; echo $this->magic_vars['item']['site_nid']; ?>/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank" class="green"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"40");echo $_tmp;unset($_tmp); ?>... </a></li>					<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>					<? $i++;endif;endforeach; endif;  unset($_from);unset($_magic_vars);unset($this->magic_vars['lgnore']); ?>				</dd>			</dl>		</div>	</div></div></div></div><div id="nav_page" style="display: none;">	<div class="home_main">		<div class="zl20150407_6f">			<div class="zl20150407_6f_main">				<div class="zl20150407_6f_main_2f">					<img src="public/images/zl20150407_6f.png" alt="" />				</div>			</div>		</div>	</div></div><div class="parterner">	<h1 style="background-image:url('/public/images/new/img_211.png');background-repeat:no-repeat;"></h1>	<div class="parterner_2">		<h2>合作媒体</h2>		<ul class="clearfix">			<li><img src="/public/images/new/img_42.png" /></li>			<li><img src="/public/images/new/img_44.png" /></li>			<li><img src="/public/images/new/img_46.png" /></li>		</ul>		<script>						$('.parterner_2 ul li:nth-child(5n+1)').css('margin-left', '16px');					</script>	</div>	<div class="parterner_3">		<h2>金融机构</h2>		<ul class="clearfix">			<li><img src="/public/images/new/img_51.png" /></li>			<li><img src="/public/images/new/img_52.png" /></li>			<li><img src="/public/images/new/img_53.png" /></li>			<li><img src="/public/images/new/img_55.png" /></li>			<li><img src="/public/images/new/img_57.png" /></li>		</ul>		<script>						$('.parterner_3 ul li:nth-child(5n+1)').css('margin-left', '16px');					</script>	</div>	<div class="parterner_3">		<h2>其他合作伙伴</h2>	<ul class="clearfix">		<? $this->magic_vars['query_type']='GetList';$data = array('limit'=>'30','type_id'=>'2');$default = '';  include_once(ROOT_PATH.'modules/links/links.class.php');$this->magic_vars['magic_result'] = linksClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>		<li><a href="<? if (!isset($this->magic_vars['var']['url'])) $this->magic_vars['var']['url'] = ''; echo $this->magic_vars['var']['url']; ?>" target="_blank"><? if (!isset($this->magic_vars['var']['webname'])) $this->magic_vars['var']['webname'] = ''; echo $this->magic_vars['var']['webname']; ?></a></li>		<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>	</ul>	<script>				$('.parterner ul li:nth-child(5n+1)').css('margin-left', '16px');			</script>	</div></div><ul class="youqing_link clearfix">	<li>友情链接：</li>	<? $this->magic_vars['query_type']='GetList';$data = array('limit'=>'8','type_id'=>'1');$default = '';  include_once(ROOT_PATH.'modules/links/links.class.php');$this->magic_vars['magic_result'] = linksClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>	<li><a href="<? if (!isset($this->magic_vars['var']['url'])) $this->magic_vars['var']['url'] = ''; echo $this->magic_vars['var']['url']; ?>" target="_blank"><? if (!isset($this->magic_vars['var']['webname'])) $this->magic_vars['var']['webname'] = ''; echo $this->magic_vars['var']['webname']; ?></a></li>	<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?></ul><? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>