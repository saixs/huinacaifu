<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<script src="plugins/timepicker/WdatePicker.js" type="text/javascript"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<!--用户中心的主栏目 开始-->
<div class="wrap950 mar10">
	<!--左边的导航 开始-->
	<div class="user_left">
		<? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
	</div>
	<!--左边的导航 结束-->

	<!--右边的内容 开始-->
	<div class="user_right">
		<div class="user_right_menu">
			<ul>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="list"): ?> class="active current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">帐户详情</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="bank"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/bank">银行账号</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="recharge_new"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/recharge_new">帐户充值</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="recharge"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/recharge">充值记录</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="cash_new"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cash_new">帐户提现</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="cash"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cash">提现记录</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="log"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/log">资金明细</a></li>
				<!--<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="fund"): ?>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="fund"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/fund">余额宝</a></li>
				<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="backfund"): ?>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="backfund"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/backfund">赎回</a></li>
				<? endif; ?>-->
			</ul>
		</div>

		<div class="user_right_main">
		<!--资金使用记录列表 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="log"): ?>
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		记录时间：<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = '';$_tmp = $_REQUEST['dotime1']; if (!isset($this->magic_vars['day7'])) $this->magic_vars['day7'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['day7']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = '';$_tmp = $_REQUEST['dotime2']; if (!isset($this->magic_vars['nowtime'])) $this->magic_vars['nowtime'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['nowtime']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" id="dotime2" size="15" onclick="change_picktime()"/>   
		<? $result = $this->magic_vars['_G']['_linkage']['account_type']; echo "<select name='type' id=type >"; echo "<option value=''>全部</option>"; if ($result!=''): foreach ($result as $key => $val): if ($_REQUEST['type']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?> <input value="搜索" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" /> 总计：￥<? if (!isset($this->magic_vars['_U']['account_num'])) $this->magic_vars['_U']['account_num'] = '';$_tmp = $this->magic_vars['_U']['account_num'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
		</div>	
			<table  border="0"  cellspacing="1" class="user_list_table">
			  <form action="" method="post">
				<tr class="head">
					<td>类型</td>
					<td>操作金额</td>
					<td>总金额</td>
					<td>可用金额</td>
					<td>冻结金额</td>
					<td>待收金额</td>
					<td>交易对方</td>
					<td>记录时间</td>
					<td width="130">备注信息</td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['account_log_list']) || $this->magic_vars['_U']['account_log_list']=='') $this->magic_vars['_U']['account_log_list'] = array();  $_from = $this->magic_vars['_U']['account_log_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type'] = '';$_tmp = $this->magic_vars['item']['type'];$_tmp = $this->magic_modifier("linkage",$_tmp,"account_type");echo $_tmp;unset($_tmp); ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money'] = ''; echo $this->magic_vars['item']['money']; ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['total'])) $this->magic_vars['item']['total'] = ''; echo $this->magic_vars['item']['total']; ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['use_money'])) $this->magic_vars['item']['use_money'] = ''; echo $this->magic_vars['item']['use_money']; ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['no_use_money'])) $this->magic_vars['item']['no_use_money'] = '';$_tmp = $this->magic_vars['item']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['collection'])) $this->magic_vars['item']['collection'] = ''; echo $this->magic_vars['item']['collection']; ?></td>
					<td><a href="/u/<? if (!isset($this->magic_vars['item']['to_user'])) $this->magic_vars['item']['to_user'] = ''; echo $this->magic_vars['item']['to_user']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['to_username'])) $this->magic_vars['item']['to_username'] = '';$_tmp = $this->magic_vars['item']['to_username'];$_tmp = $this->magic_modifier("default",$_tmp,"admin");echo $_tmp;unset($_tmp); ?></a></td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="11" class="page">
						<? if (!isset($this->magic_vars['_U']['show_page'])) $this->magic_vars['_U']['show_page'] = ''; echo $this->magic_vars['_U']['show_page']; ?>
					</td>
				</tr>
			</form>	
		</table>
		<!--资金使用记录列表 结束-->
	<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="fund"): ?>
			
		<div class="user_help"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>余额宝中的资金，可以<a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/backfund">赎回</a>，但是如果你保持余额宝中的金额将每日得到利息
		</div>
		<? $data = array('user_id'=>'0','var'=>'acc','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>
	
		<form action="" method="post">
		<div class="user_right_border">
			<div class="l">账户总额：</div>
			<div class="c">
               <? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">可用余额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['use_money'])) $this->magic_vars['acc']['use_money'] = '';$_tmp = $this->magic_vars['acc']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">冻结资金：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">余额宝资金：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = '';$_tmp = $this->magic_vars['acc']['fund'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

	  <div class="user_right_border">
			<div class="l">预计下期收益：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = ''; if (!isset($this->magic_vars['_G']['system']['con_Interest'])) $this->magic_vars['_G']['system']['con_Interest'] = '';$_tmp = $this->magic_vars['acc']['fund']*$this->magic_vars['_G']['system']['con_Interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="user_right_border">
			<div class="l">转入余额宝：</div>
			<div class="c">
				<input type="text" name="fund" value="" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input  class="login_input2"  name="valicode" type="text" size="20" maxlength="4"/><a class="p_ico"><img width="50" height="20" src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" /></a> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
		
		<!-- 近期余额宝资金变动记录 -->
			<table  border="0"  cellspacing="1" class="user_list_table">
			  <form action="" method="post">
				<tr class="head">
					<td>编号</td>
					<td>金额</td>
					<td>类型</td>
					<td>存入时间</td>
					<td>计算时间</td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['fundlist']) || $this->magic_vars['_U']['fundlist']=='') $this->magic_vars['_U']['fundlist'] = array();  $_from = $this->magic_vars['_U']['fundlist']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']+1; ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['income'])) $this->magic_vars['item']['income'] = ''; echo $this->magic_vars['item']['income']; ?></td>
					<td>往期利息 </td>
					<td><? if (!isset($this->magic_vars['item']['fromtime'])) $this->magic_vars['item']['fromtime'] = '';$_tmp = $this->magic_vars['item']['fromtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
			</form>	
		</table>
		
		
	 <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="backfund"): ?>
			<!-- 余额赎回 -->
     <div class="user_help"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>余额宝中的资金，<a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/backfund">赎回</a>后将没有利息，
		</div>
		<? $data = array('user_id'=>'0','var'=>'acc','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>
	
		<form action="" method="post">
		<div class="user_right_border">
			<div class="l">账户总额：</div>
			<div class="c">
               <? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">可用余额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['use_money'])) $this->magic_vars['acc']['use_money'] = '';$_tmp = $this->magic_vars['acc']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">冻结资金：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">余额宝资金：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = '';$_tmp = $this->magic_vars['acc']['fund'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
	  <div class="user_right_border">
			<div class="l">预计下期收益：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = ''; if (!isset($this->magic_vars['_G']['system']['con_Interest'])) $this->magic_vars['_G']['system']['con_Interest'] = '';$_tmp = $this->magic_vars['acc']['fund']*$this->magic_vars['_G']['system']['con_Interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">转入赎回金额：</div>
			<div class="c">
				<input type="text" name="backfund" value="" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
			</div>
		</div>
			<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input  class="login_input2"  name="valicode" type="text" size="20" maxlength="4"/><a class="p_ico"><img width="55" height="20" src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" /></a> 
			</div>
		</div>
		
		

		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
			
		<!--充值记录列表 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="recharge"): ?>
		<div class="user_help">成功充值<? if (!isset($this->magic_vars['_U']['account_log']['recharge_success'])) $this->magic_vars['_U']['account_log']['recharge_success'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元，线上成功充值<? if (!isset($this->magic_vars['_U']['account_log']['recharge_online'])) $this->magic_vars['_U']['account_log']['recharge_online'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_online'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元，线下成功充值<? if (!isset($this->magic_vars['_U']['account_log']['recharge_downline'])) $this->magic_vars['_U']['account_log']['recharge_downline'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_downline'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元,，手动成功充值<? if (!isset($this->magic_vars['_U']['account_log']['recharge_shoudong'])) $this->magic_vars['_U']['account_log']['recharge_shoudong'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_shoudong'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
</div>
		<table  border="0"  cellspacing="1" class="user_list_table">
		<form action="" method="post">
			<tr class="head" >
			<td>类型</td>
			<td>支付方式</td>
			<td>充值金额</td>
			<td>备注</td>
			<td>充值时间</td>
			<td>状态</td>
			<td>管理备注</td>
			</tr>
			<? $this->magic_vars['query_type']='GetRechargeList';$data = array('showpage'=>'3','var'=>'loop','user_id'=>'0','epage'=>'20','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['magic_result'] = accountClass::GetRechargeList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
			<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;if (  $this->magic_vars['item']['type']==1): ?>网上充值<? else: ?>线下充值<? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['payment_name'])) $this->magic_vars['item']['payment_name'] = '';$_tmp = $this->magic_vars['item']['payment_name'];$_tmp = $this->magic_modifier("default",$_tmp,"手动充值");echo $_tmp;unset($_tmp); ?></td>
			<td><font color="#FF0000">￥<? if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money'] = ''; echo $this->magic_vars['item']['money']; ?></font></td>
			<td><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
			<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
			<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>审核中<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (   $this->magic_vars['item']['status']==1): ?> 充值成功 <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>充值失败<? endif; ?></td>
			
			<td><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark'] = '';$_tmp = $this->magic_vars['item']['verify_remark'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
			</tr>
			<? endforeach; endif; unset($_from); ?>
			<tr >
				<td colspan="11" class="page"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
				</td>
			</tr>
			<? unset($_magic_vars); ?>
		</form>	
		</table>
		<!--充值记录列表 结束-->
		
		<!--提现记录列表 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="cash"): ?>
		<div class="user_help">成功提现<? if (!isset($this->magic_vars['_U']['cash_log']['cash_success']['money'])) $this->magic_vars['_U']['cash_log']['cash_success']['money'] = '';$_tmp = $this->magic_vars['_U']['cash_log']['cash_success']['money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元，提现到账<? if (!isset($this->magic_vars['_U']['cash_log']['cash_success']['credited'])) $this->magic_vars['_U']['cash_log']['cash_success']['credited'] = '';$_tmp = $this->magic_vars['_U']['cash_log']['cash_success']['credited'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元，手续费<? if (!isset($this->magic_vars['_U']['cash_log']['cash_success']['fee'])) $this->magic_vars['_U']['cash_log']['cash_success']['fee'] = '';$_tmp = $this->magic_vars['_U']['cash_log']['cash_success']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
</div>
		<table  border="0"  cellspacing="1" class="user_list_table">
			<form action="" method="post">
				<tr class="head">
					<td>提现银行</td>
					<td>提现账号</td>
					<td>提现总额</td>
					<td>到账金额</td>
					<td>手续费</td>
					<td>提现时间</td>
					<td>状态</td>
					<td>操作</td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['account_cash_list']) || $this->magic_vars['_U']['account_cash_list']=='') $this->magic_vars['_U']['account_cash_list'] = array();  $_from = $this->magic_vars['_U']['account_cash_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td><? if (!isset($this->magic_vars['item']['bank_name'])) $this->magic_vars['item']['bank_name'] = ''; echo $this->magic_vars['item']['bank_name']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = '';$_tmp = $this->magic_vars['item']['account'];$_tmp = $this->magic_modifier("hideMiddle",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['total'])) $this->magic_vars['item']['total'] = '';$_tmp = $this->magic_vars['item']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['credited'])) $this->magic_vars['item']['credited'] = '';$_tmp = $this->magic_vars['item']['credited'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td>￥<? if (!isset($this->magic_vars['item']['fee'])) $this->magic_vars['item']['fee'] = '';$_tmp = $this->magic_vars['item']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>	
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>审核中<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (   $this->magic_vars['item']['status']==1): ?> 提现成功 <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>提现失败 <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==3): ?>用户取消<? endif; ?></td>
					<td><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark']=''; ;if (  $this->magic_vars['item']['verify_remark']!=""): ?><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark'] = ''; echo $this->magic_vars['item']['verify_remark']; ?><? else: ?><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?><a href="#" onclick="javascript:if(confirm('确定要取消此提现申请')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cash_cancel&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">取消提现</a><? else: ?>-<? endif; ?><? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="11" class="page">
						<? if (!isset($this->magic_vars['_U']['show_page'])) $this->magic_vars['_U']['show_page'] = ''; echo $this->magic_vars['_U']['show_page']; ?>
					</td>
				</tr>
			</form>	
		</table>
		<!--提现记录列表 结束-->
		
		<!--账号充值 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="recharge_new"): ?>
    
		<div class="user_help"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>禁止信用卡套现、虚假交易等行为,一经发现将予以处罚,包括但不限于：限制收款、冻结账户、永久停止服务,并有可能影响相关信用记录。
</div>
		<div class="user_right_border">
			<div class="l">真实姓名：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = '';$_tmp = $this->magic_vars['_G']['user_result']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?>**
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">账号：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?>
			</div>
		</div>
		<form action="" method="post" name="form1" target="_blank" onsubmit = "return check();" >
		<div id="returnpay">
<div class="user_right_border">
			<div class="l">充值方式：</div>
			<div class="c">
                <input type="radio" name="type"  id="type"  class="input_border" checked="checked" onclick="change_type(1)" value="1"  /> 网上充值
				<!--<input type="radio" name="type" id="type" class="input_border" value="2" onclick="change_type(2)" /> 线下充值-->
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">充值金额：</div>
			<div class="c">
				<input type="text" name="money"  class="input_border" value="" size="10" onkeyup="commit(this);" maxlength="9" /> 元 <span id="realacc">实际入账：<font color="#FF0000" id="real_money">0</font> 元</span>
			</div>
		</div>
		<div id="type_net">
			<div class="user_right_border">
				<div class="l">充值类型：</div>
				<div class="c">
					<?  if(!isset($this->magic_vars['_U']['account_payment_list']) || $this->magic_vars['_U']['account_payment_list']=='') $this->magic_vars['_U']['account_payment_list'] = array();  $_from = $this->magic_vars['_U']['account_payment_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
					<? if (!isset($this->magic_vars['var']['nid'])) $this->magic_vars['var']['nid']=''; ;if (  $this->magic_vars['var']['nid']!="offline"): ?>
					<input type="radio" name="payment1"  class="input_border" <? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id']=''; ;if (  $this->magic_vars['var']['id']==53): ?>checked="checked"<? endif; ?> value="<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>" id="payment1"  />
					<? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?>
					<input type="hidden" name="payname<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>" value="<? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?>" /><br />
					
					<? endif; ?>
					<? endforeach; endif; unset($_from); ?>
				</div>
			</div>
		</div>

		<div id="type_now" class="dishide">
			<div class="user_right_border">
				<div class="l">充值银行：</div>
				<div class="c">
					<?  if(!isset($this->magic_vars['_U']['account_payment_list']) || $this->magic_vars['_U']['account_payment_list']=='') $this->magic_vars['_U']['account_payment_list'] = array();  $_from = $this->magic_vars['_U']['account_payment_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
					<? if (!isset($this->magic_vars['var']['nid'])) $this->magic_vars['var']['nid']=''; ;if (  $this->magic_vars['var']['nid']=="offline"): ?>
					<input type="radio" name="payment2"  class="input_border" checked="checked" value="<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>"  /><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?>  <br />
                    <font color="#FF0000"><? if (!isset($this->magic_vars['var']['description'])) $this->magic_vars['var']['description'] = ''; echo $this->magic_vars['var']['description']; ?></font> <br />
					<? endif; ?>
					<? endforeach; endif; unset($_from); ?>
				</div>
			</div>

			<div class="user_right_border">
				<div class="l">账单流水号：</div>
				<div class="c">
					<input type="text" name="remark"  class="input_border" value="" size="30" />
				</div>
			</div>
		</div>
        <!--<style type="text/css">
            
            #chinaBankOptions_1 img {cursor: pointer;border: 2px solid #ffffff; opacity:0.5}
            #chinaBankOptions_1 input {display: none}
            
        </style>

        <div id="chinaBankOptions_1" style="display: block">
            <input type="radio" num="1" value="104" name="chinaBank" />
            <img id="1" onclick="myRadio(this.id)" src="../data/bank/中国银行.gif" alt="中国银行" />
            <input type="radio" num="2" value="3080" name="chinaBank" />
            <img id="2" onclick="myRadio(this.id)" src="../data/bank/招商银行.gif" alt="招商银行" />
            <input type="radio" num="3" value="105" name="chinaBank" />
            <img id="3" onclick="myRadio(this.id)" src="../data/bank/建设银行.gif" alt="建设银行" />
            <input type="radio" num="4" value="103" name="chinaBank" />
            <img id="4" onclick="myRadio(this.id)" src="../data/bank/农业银行.gif" alt="农业银行" />
            <input type="radio" num="5" value="301" name="chinaBank" />
            <img id="5" onclick="myRadio(this.id)" src="../data/bank/交通银行.gif" alt="交通银行" />
            <input type="radio" num="6" value="1025" name="chinaBank" />
            <img id="6" onclick="myRadio(this.id)" src="../data/bank/工商银行.gif" alt="工商银行" />
            <input type="radio" num="7" value="305" name="chinaBank" />
            <img id="7" onclick="myRadio(this.id)" src="../data/bank/民生银行.gif" alt="民生银行" />
            <input type="radio" num="8" value="306" name="chinaBank" />
            <img id="8" onclick="myRadio(this.id)" src="../data/bank/广发银行.gif" alt="广发银行" />
            <input type="radio" num="9" value="312" name="chinaBank" />
            <img id="9" onclick="myRadio(this.id)" src="../data/bank/光大银行.gif" alt="光大银行" />
            <input type="radio" num="10" value="311" name="chinaBank" />
            <img id="10" onclick="myRadio(this.id)" src="../data/bank/华夏银行.gif" alt="华夏银行" />
            <input type="radio" num="11" value="310" name="chinaBank" />
            <img id="11" onclick="myRadio(this.id)" src="../data/bank/平安银行.gif" alt="平安银行" />
            <input type="radio" num="12" value="313" name="chinaBank" />
            <img id="12" onclick="myRadio(this.id)" src="../data/bank/中信银行.gif" alt="中信银行" />
            <input type="radio" num="13" value="309" name="chinaBank" />
            <img id="13" onclick="myRadio(this.id)" src="../data/bank/兴业银行.gif" alt="兴业银行" />
            <!--<input type="radio" num="14" value="344" name="chinaBank" />-->
            <!--<img id="14" onclick="myRadio(this.id)" src="../data/bank/恒丰银行.gif" alt="恒丰银行" />-->
            <!--<input type="radio" num="15" value="3230" name="chinaBank" />
            <img id="15" onclick="myRadio(this.id)" src="../data/bank/中国邮政储蓄银行.gif" alt="中国邮政储蓄银行" />
            <input type="radio" num="16" value="314" name="chinaBank" />
            <img id="16" onclick="myRadio(this.id)" src="../data/bank/上海浦东发展银行.gif" alt="上海浦东发展银行" />
            <input type="radio" num="17" value="326" name="chinaBank" />
            <img id="17" onclick="myRadio(this.id)" src="../data/bank/上海银行.gif" alt="上海银行" />
            <input type="radio" num="18" value="316" name="chinaBank" />
            <img id="18" onclick="myRadio(this.id)" src="../data/bank/南京银行.gif" alt="南京银行" />
            <input type="radio" num="19" value="329" name="chinaBank" />
            <!--<img id="19" onclick="myRadio(this.id)" src="../data/bank/浙江泰隆商业银行.gif" alt="浙江泰隆商业银行" />-->
            <!--<input type="radio" num="20" value="302" name="chinaBank" />
            <img id="20" onclick="myRadio(this.id)" src="../data/bank/宁波银行.gif" alt="宁波银行" />
            <!--<input type="radio" num="21" value="332" name="chinaBank" />-->
            <!--<img id="21" onclick="myRadio(this.id)" src="../data/bank/金华银行.gif" alt="金华银行" />-->
            <!--<input type="radio" num="22" value="324" name="chinaBank" />
            <img id="22" onclick="myRadio(this.id)" src="../data/bank/杭州银行.jpg" alt="杭州银行" />
            <!--<input type="radio" num="23" value="339" name="chinaBank" />-->
            <!--<img id="23" onclick="myRadio(this.id)" src="../data/bank/富滇银行.gif" alt="富滇银行" />-->
            <!--<input type="radio" num="24" value="310" name="chinaBank" />
            <img id="24" onclick="myRadio(this.id)" src="../data/bank/北京银行.gif" alt="北京银行" />
            <input type="radio" num="25" value="335" name="chinaBank" />
            <!--<input type="radio" num="26" value="317" name="chinaBank" />
            <img id="26" onclick="myRadio(this.id)" src="../data/bank/渤海银行.gif" alt="渤海银行" />-->
            <!--<input type="radio" num="27" value="336" name="chinaBank" />
            <img id="27" onclick="myRadio(this.id)" src="../data/bank/成都银行.gif" alt="成都银行" />
            <!--<input type="radio" num="28" num="" value="345" name="chinaBank" />
            <img id="28" onclick="myRadio(this.id)" src="../data/bank/重庆银行.gif" alt="重庆银行" />-->
            <!--<input type="radio" num="29" value="342" name="chinaBank" />
            <img id="29" onclick="myRadio(this.id)" src="../data/bank/重庆农商银行.gif" alt="重庆农商银行" />
            <input type="radio" num="30" value="334" name="chinaBank" />
            <img id="30" onclick="myRadio(this.id)" src="../data/bank/青岛银行.gif" alt="青岛银行" />
            <!--<input type="radio" num="31" value="340" name="chinaBank" />-->
            <!--<img id="31" onclick="myRadio(this.id)" src="../data/bank/汉口银行.gif" alt="汉口银行" />-->
            <!--<input type="radio" num="32" value="327" name="chinaBank" />
            <img id="32" onclick="myRadio(this.id)" src="../data/bank/其他银行.gif" alt="其他银行" />
            <!--<hr />
            测试接口,请勿使用<br  />
            <input type="radio" num="33" value="106" name="chinaBank" />
            <img id="33" onclick="myRadio(this.id)" src="../data/bank/中国银行.gif" alt="中国银行" />
        </div>-->
        
        <script type="text/javascript">
            function myRadio(sId){
                $("img[id='"+sId+"']").css({"border":"2px solid #FF6600","opacity":"1"});
                $("img[id='"+sId+"']").siblings("img").css({"border":"2px solid #ffffff","opacity":"0.5"});
                if (sId != 32) {
                    $("input[name='chinaBank'][num='"+sId+"']").attr("checked","checked");
                }
                $("input[name='chinaBank'][value='"+sId+"']").siblings("input").removeAttr("checked");
            }
        </script>
        
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
		</div>
		
		
		
		
		<script>
		function check(){
			var aa = "";
			aa = $("input[name=type][checked]").val();
			if(aa == 2){
				//if (!ctype()){
					//alert('请选择充值的银行');
				//return false;
				//}
			}
		}
        function change_type(type){
            if (type==2){
                $("#type_net").addClass("dishide");
                $("#type_now").removeClass();
                $("#realacc").hide();
                $("#chinaBankOptions_1").hide();

            }else{
                $("#type_now").addClass("dishide");
                $("#type_net").removeClass();

                $("#realacc").show();
                $("#chinaBankOptions_1").show();
            }
        }
        function processChinaBankOptions(type) {
            if (type == 1) {
                $("#chinaBankOptions_1").show();
            } else {
                $("#chinaBankOptions_1").hide();
            }
        }
		function payment (){
	 		var type = GetRadioValue("type");
			if (type==1){
				$("#returnpay").html("<font color='red'>请到打开的新页面充值</font>");
				
			}
			
		}
		function ctype(){
		var resualt=false;
		
			alert(document.form1.payment2.length);
			for(var i=0;i<document.form1.payment2.length;i++)
			{
				
				if(document.form1.payment2[i].checked)
				{
				  resualt=true;
				}
			}
			return resualt;
		}
        function commit(obj) {
            if (parseFloat(obj.value) > 0 ) 
            {
//                var realMoney = Math.round(parseFloat(obj.value)) / 100;

//                if (realMoney > 50) realMoney = 50;

//                document.getElementById("hspanReal").innerText = Math.round(parseFloat(obj.value)*10)/10 - realMoney;
                var realMoney=parseFloat(obj.value);
                if(realMoney>=25000)
                {
                    //document.getElementById("real_money").innerText = realMoney - 50;
					document.getElementById("real_money").innerText = realMoney;
                }
                else if(realMoney<=100)
				{
					document.getElementById("real_money").innerText = realMoney;
				}else
                {
					document.getElementById("real_money").innerText = realMoney;
                   // document.getElementById("real_money").innerText = parseInt(realMoney*0.998*100)/100;
                }
            }else{
				 var realMoney=parseFloat(obj.value);
				 if(realMoney)
				 {
                 document.getElementById("real_money").innerText = realMoney ;
				 }else
				 {
					 document.getElementById("real_money").innerText =0;
				 }
			}
        }
    </script>
		
		<div class="user_right_foot">
		* 温馨提示：网上银行充值过程中请耐心等待,充值成功后，请不要关闭浏览器,充值成功后返回<? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>,充值金额才能打入您的帐号。如有问题,请与我们联系
		</div>
		
		<!--账号充值 结束-->
		
		<!--银行账号 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="bank"): ?>
		<div class="user_help">
            <? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>禁止信用卡套现、虚假交易等行为,一经发现将予以处罚,包括但不限于：限制收款、冻结账户、永久停止服务,并有可能影响相关信用记录。<br />
            <strong>注意:</strong><br />
            1:第一个添加的银行账户无需客服审核即刻生效<br />
            2:其后新增或修改银行账户必须客服审核后方能生效,请填写后主动与客服联系<br />
            3:删除或修改银行账户,必须保证您在网站中至少有一个生效账户存在,且该有效账户不得删除或修改<br />
        </div>
		<? if (!isset($this->magic_vars['num'])) $this->magic_vars['num']=''; ;if (  $this->magic_vars['num'] > 0): ?>
        <div style="text-align: left; position: relative; left: 15px;">已经填写的银行账户:</div>
        <div class="user_help">
        <table style="width: 730px;text-align: center">
            <tr><th>开户银行</th><th>开户支行</th><th>银行帐号</th><th>状态</th><td>操作</td></tr>
        <?  if(!isset($this->magic_vars['_U']['account_bank_result']) || $this->magic_vars['_U']['account_bank_result']=='') $this->magic_vars['_U']['account_bank_result'] = array();  $_from = $this->magic_vars['_U']['account_bank_result']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
            <tr <? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] != 1): ?>style="background: #cccccc"<? endif; ?>>
                <td><? if (!isset($this->magic_vars['var']['bank'])) $this->magic_vars['var']['bank'] = '';$_tmp = $this->magic_vars['var']['bank'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
                <td><? if (!isset($this->magic_vars['var']['branch'])) $this->magic_vars['var']['branch'] = ''; echo $this->magic_vars['var']['branch']; ?></td>
                <td><? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = '';$_tmp = $this->magic_vars['var']['account'];$_tmp = $this->magic_modifier("hideMiddle",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
                <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] == 1): ?>生效<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status'] == 0): ?>待审核<? else: ?>审核不通过<? endif; ?></td>
                <td><a href="/index.php?user&q=code/account/changeBank&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>">修改/删除</a></td>
            </tr>
        <? endforeach; endif; unset($_from); ?>
        </table>
        </div>
		<? endif; ?>
        <? if (!isset($this->magic_vars['num'])) $this->magic_vars['num']=''; ;if (  $this->magic_vars['num'] < 3): ?>
        <div style="text-align: left; position: relative; left: 15px;">新增银行账户:</div>
		<form action="" method="post">
		<div class="user_right_border">
			<div class="l">开户银行：</div>
			<div class="c">
				<script src="/plugins/index.php?q=linkage&name=bank&nid=account_bank&value=300"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">开户行支行名称：</div>
			<div class="c">
				<input type="text" name="branch" value="<? if (!isset($this->magic_vars['_U']['account_bank_result']['branch'])) $this->magic_vars['_U']['account_bank_result']['branch'] = ''; echo $this->magic_vars['_U']['account_bank_result']['branch']; ?>" /> &nbsp;&nbsp;**分行**支行**分理处或营业部(如：上海分行杨浦支行控江路分理处)<br />

			</div>
		</div>

		<div class="user_right_border">
			<div class="l">银行账号：</div>
			<div class="c">
				<input type="text" name="account" value="<? if (!isset($this->magic_vars['_U']['account_bank_result']['account'])) $this->magic_vars['_U']['account_bank_result']['account'] = ''; echo $this->magic_vars['_U']['account_bank_result']['account']; ?>" onkeyup="value=value.replace(/[^0-9]/g,'')"/>
			</div>
		</div>

		<div class="user_right_border">
			<div class="c">
                <span style="color: red">特别提醒：上述银行卡号的开户人姓名必须与您在网站实名认证时填写的姓名相同, 个人银行账号必须填写正确,否则你的提现资金将存在风险.</span>
			</div>
		</div>
            <? if (!isset($this->magic_vars['verify_status'])) $this->magic_vars['verify_status']=''; ;if (  $this->magic_vars['verify_status'] === true): ?>
            
            <script type="text/javascript">
                function GetAjaxObject(){
                    var ajaxObj = null;
                    try {
                        ajaxObj=new XMLHttpRequest();	// Firefox, Opera 8.0+, Safari
                    }catch (e){							// Internet Explorer
                        try	{
                            ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll或以上版本
                        }catch (e){
                            ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6或以下版本
                        }
                    }
                    return ajaxObj;
                }

                var XMLHttp = null;
                function sendSMS(){
                    XMLHttp = GetAjaxObject();
                    XMLHttp.open('post','/core/phone_ajax.php',true);
                    XMLHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttp.onreadystatechange = get_response;
                    var item_name = document.getElementById('item_name').value;
                    XMLHttp.send('item_name='+item_name);
                }

                function get_response()
                {
                    if (XMLHttp.readyState == 4)
                    {
                        document.getElementById('VerifySendResult').innerHTML = XMLHttp.responseText;
                    }
                }
            </script>
            
            <input type="button" name="getVerifyCode" value="获取验证码" onclick="sendSMS()" />
            <input type="hidden" id="item_name" name="item_name" value="add_bank_account_verify" />
            <b>验证码发送状态:</b><span id="VerifySendResult">尚未申请发送验证码</span>
            <br />
            请输入验证码:<input type="text" name="verifyCode" value="" />
            <? endif; ?>
            <input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
            <input type="submit" name="name"  value="确认提交" size="30" />
		</form>
        <? endif; ?>
		<div class="user_right_foot">
		* 温馨提示：禁止信用卡套现
		</div>
		<!--银行账号 结束-->

        <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type'] == 'changeBank'): ?>

        <form action="" method="post">
            <div class="user_right_border">
                <div class="l">开户银行：</div>
                <div class="c">
                    <script src="/plugins/index.php?q=linkage&name=bank&nid=account_bank&value=<? if (!isset($this->magic_vars['bank_info']['bank'])) $this->magic_vars['bank_info']['bank'] = ''; echo $this->magic_vars['bank_info']['bank']; ?>"></script>
                </div>
            <div class="user_right_border">
                <div class="l">开户支行：</div>
                <div class="c">
                    <input type="text" name="branch" value="<? if (!isset($this->magic_vars['bank_info']['branch'])) $this->magic_vars['bank_info']['branch'] = ''; echo $this->magic_vars['bank_info']['branch']; ?>" />
                </div>
            </div>

            <div class="user_right_border">
                <div class="l">银行帐号：</div>
                <div class="c">
                    <input type="text" name="account" value="<? if (!isset($this->magic_vars['bank_info']['account'])) $this->magic_vars['bank_info']['account'] = ''; echo $this->magic_vars['bank_info']['account']; ?>" />
                </div>
            </div>
            <? if (!isset($this->magic_vars['verify_status'])) $this->magic_vars['verify_status']=''; ;if (  $this->magic_vars['verify_status'] === true): ?>
            
            <script type="text/javascript">
                function GetAjaxObject(){
                    var ajaxObj = null;
                    try {
                        ajaxObj=new XMLHttpRequest();	// Firefox, Opera 8.0+, Safari
                    }catch (e){							// Internet Explorer
                        try	{
                            ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll或以上版本
                        }catch (e){
                            ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6或以下版本
                        }
                    }
                    return ajaxObj;
                }

                var XMLHttp = null;
                function sendSMS(){
                    XMLHttp = GetAjaxObject();
                    XMLHttp.open('post','/core/phone_ajax.php',true);
                    XMLHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttp.onreadystatechange = get_response;
                    var item_name = document.getElementById('item_name').value;
                    XMLHttp.send('item_name='+item_name);
                }

                function get_response()
                {
                    if (XMLHttp.readyState == 4)
                    {
                        document.getElementById('VerifySendResult').innerHTML = XMLHttp.responseText;
                    }
                }
            </script>
            
            <div class="user_right_border" style="position: relative; left:52px;">
            <input type="button" name="getVerifyCode" value="获取验证码" onclick="sendSMS()" />
            <input type="hidden" id="item_name" name="item_name" value="reset_bank_account_verify" />
            <b>验证码发送状态:</b><span id="VerifySendResult">尚未申请发送验证码</span>
            <br />
            &nbsp;输入验证码:<input type="text" name="verifyCode" value="" />
            <? endif; ?>
            <? if (!isset($this->magic_vars['verify_status'])) $this->magic_vars['verify_status']=''; ;if (  $this->magic_vars['verify_status'] !== true): ?><div class="user_right_border" style="position: relative; left:52px;"><? endif; ?>
            <input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
            <input type="submit" name="update"  value="修改" />
            <input type="submit" name="delete"  value="删除" />
            </div>
        </form>

		<!--提现 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="cash_new"): ?>
		<div class="user_help">注：1、请输入您要取出金额,我们将在1至3个工作日(国家节假日除外)之内将钱转入您网站上填写的银行帐号。 <br />
			  2、如你急需要把钱转到你的帐号或者24小时之内网站未将钱转入到你的银行帐号,请联系客服中心。 <br />
			  3、确保您的银行帐号的姓名和您的网站上的真实姓名一致。 <br />
			  4、在钱打到您帐号时会发一封站内信通知你。 <br />
			  5、每笔提现金额至少100元以上。 <br />
			  6、每笔提现金额最高不能超过50000元以上。 <br />
			  7、您目前能提取的最高额度是<font color="#FF0000"><? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money']=''; ;if (  $this->magic_vars['_G']['user_result']['use_money']>50000): ?>50000<? else: ?><? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = ''; echo $this->magic_vars['_G']['user_result']['use_money']; ?><? endif; ?>元</font>。 <br />
		</div>
		<form action="" method="post" onsubmit="return check_form()" name="form1">
		<div class="user_right_border">
			<div class="l">真实姓名：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = '';$_tmp = $this->magic_vars['_G']['user_result']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?>**
			</div>
		</div>

            <div class="user_right_border">
                <div class="l">账户总额：</div>
                <div class="c">
                    <span id="total_money"><? if (!isset($this->magic_vars['_G']['user_result']['total'])) $this->magic_vars['_G']['user_result']['total'] = '';$_tmp = $this->magic_vars['_G']['user_result']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></span>元
                </div>
            </div>
		
		<div class="user_right_border">
			<div class="l">可用余额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_G']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
                <input type="hidden" id="can_user_money" value="<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_G']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" />
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">冻结总额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['no_use_money'])) $this->magic_vars['_G']['user_result']['no_use_money'] = '';$_tmp = $this->magic_vars['_G']['user_result']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
			</div>
		</div>
        <div class="user_right_border">
            <div class="l">建议提现金额：</div>
            <div class="c">
                <span id="proposal"><? if (!isset($this->magic_vars['proposal'])) $this->magic_vars['proposal'] = ''; echo $this->magic_vars['proposal']; ?></span>
                <span>(活动期间不收提现手续费)</span>
                <input type="hidden" id="free_cash" value="<? if (!isset($this->magic_vars['free_cash'])) $this->magic_vars['free_cash'] = ''; echo $this->magic_vars['free_cash']; ?>" />
            </div>
        </div>
		<div class="user_right_border">
			<div class="l">提现的银行：</div>
			<div class="c">
                <select name="bank">
                <?  if(!isset($this->magic_vars['_U']['account_bank_result']) || $this->magic_vars['_U']['account_bank_result']=='') $this->magic_vars['_U']['account_bank_result'] = array();  $_from = $this->magic_vars['_U']['account_bank_result']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
                    <option value="<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>"><? if (!isset($this->magic_vars['var']['bank'])) $this->magic_vars['var']['bank'] = '';$_tmp = $this->magic_vars['var']['bank'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?> <? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = '';$_tmp = $this->magic_vars['var']['account'];$_tmp = $this->magic_modifier("hideMiddle",$_tmp,"");echo $_tmp;unset($_tmp); ?></option>
                <? endforeach; endif; unset($_from); ?>
                </select>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">交易密码：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['account_bank_result']['0']['paypassword'])) $this->magic_vars['_U']['account_bank_result']['0']['paypassword']=''; ;if (  $this->magic_vars['_U']['account_bank_result']['0']['paypassword']==""): ?><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>&q=code/user/paypwd"><font color="#FF0000">请先设置一个支付密码</font></a><? else: ?><input type="password" name="paypassword" /><? endif; ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">提现金额：</div>
			<div class="c">
				<input type="text" name="money"  onblur="commit(this);"  />
				<span id="realacc"><span id="real_money"></span></span>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
            <script>
                
                function commit(obj)
                {
                    var frm = document.forms['form1'];
                    if (parseFloat(obj.value) > 0)
                    {
                        var realMoney=parseFloat(obj.value);
                        var inputValue=parseFloat(obj.value);
                        var free_cash = document.getElementById("free_cash").value;
                        var total_money = document.getElementById("total_money").innerHTML;
                        var can_user_money = document.getElementById("can_user_money").value;
                        if(free_cash < 0){
                            free_cash = 0;
                        }
                        if(inputValue > can_user_money){
                            document.getElementById("real_money").innerHTML = '<br />您输入的金额大于当前的可用资金';
                            frm.elements['sub'].disabled = true;
                            return;
                        }
                        if(inputValue < 100 || inputValue > 50000){
                            obj.value=0;
                            document.getElementById("real_money").innerHTML = '<br />提现金额必须大于100元且小于5万元';
                            frm.elements['sub'].disabled = true;
                            return;
                        }

                        frm.elements['sub'].disabled = false;

                        var cashAmount;
                        cashAmount = parseFloat(obj.value);
                        getCashFeeValue(cashAmount);
                    } else {
                        obj.value=0;
                        document.getElementById("real_money").innerHTML = '<br />提现金额必须大于100元且小于5万元';
                        frm.elements['sub'].disabled = true;
                        return;
                    }
                }

                function getCashFeeValue(cashAmount){

                    var free_cash = document.getElementById("free_cash").value;
                    var cashFee;

                    if(cashAmount <= free_cash){
                        if(cashAmount >= 100 && cashAmount <= 30000){
                            cashFee = 0;
                        }else if(cashAmount > 30000 && cashAmount <= 50000){
                            cashFee = 0;
                        }
                    }else{
                        var exceed = cashAmount - free_cash; // 超出部分的提现额
                        var free_cash_fee;
                        if(free_cash >= 0 && free_cash < 1000){
                            free_cash_fee = 0;
                            //free_cash_fee = free_cash * 0.003;
                        }else if(free_cash >= 1000 && free_cash <= 30000){
                            free_cash_fee = 0;
                            //free_cash_fee = 3;
                        }else{
                            free_cash_fee = 0;
                            //free_cash_fee = 5;
                        }

                        if(exceed == cashAmount){
                            free_cash_fee = 0;
                        }
                        var exceed_fee = changeTwoDecimal(exceed * 0.003);
                        cashFee = exceed_fee + free_cash_fee;
                    }
                    if (cashAmount <= free_cash){
                        document.getElementById("real_money").innerHTML = '<br />实际到账：<font color="#FF0000" id="real_money">'+changeTwoDecimal(cashAmount-cashFee)+'</font> 元,提现费用:<font color="green">'+changeTwoDecimal(cashFee)+'</font><br /> <b></b>';
                    }else{
                        document.getElementById("real_money").innerHTML = '<br />实际到账：<font color="#FF0000" id="real_money">'+changeTwoDecimal(cashAmount-cashFee)+'</font> 元'+',受限提现费用:<font color="green">'+changeTwoDecimal(cashFee)+'</font><br /><font style="color:blue;font-size: 14px; font-weight: bold;"></font>';
                    }
                }

                function changeTwoDecimal(x)
                {
                    var f_x = parseFloat(x);
                    var f_x = Math.round(x*100)/100;
                    return f_x;
                }
            </script>
            
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
                <? if (!isset($this->magic_vars['verify_status'])) $this->magic_vars['verify_status']=''; ;if (  $this->magic_vars['verify_status'] === true): ?>
                
                <script type="text/javascript">
                    function GetAjaxObject(){
                        var ajaxObj = null;
                        try {
                            ajaxObj=new XMLHttpRequest();	// Firefox, Opera 8.0+, Safari
                        }catch (e){							// Internet Explorer
                            try	{
                                ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll或以上版本
                            }catch (e){
                                ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6或以下版本
                            }
                        }
                        return ajaxObj;
                    }

                    var XMLHttp = null;
                    function sendSMS(){
                        XMLHttp = GetAjaxObject();
                        XMLHttp.open('post','/core/phone_ajax.php',true);
                        XMLHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                        XMLHttp.onreadystatechange = get_response;
                        var item_name = document.getElementById('item_name').value;
                        XMLHttp.send('item_name='+item_name);
                    }

                    function get_response()
                    {
                        if (XMLHttp.readyState == 4)
                        {
                            document.getElementById('VerifySendResult').innerHTML = XMLHttp.responseText;
                        }
                    }
                </script>
                
                <input type="button" name="getVerifyCode" value="获取验证码" onclick="sendSMS()" />
                <input type="hidden" id="item_name" name="item_name" value="withdraw_verify" />
                <b>验证码发送状态:</b><span id="VerifySendResult">尚未申请发送验证码</span>
                <br />
                请输入提现验证码:<input type="text" name="verifyCode" value="" />
                <? endif; ?>
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input id="sub" type="submit" name="name"  value="确认提交" style="width: 80px; height: 33px;" />
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* 温馨提示：禁止信用卡套现
		</div>

		<!--提现 结束-->
        <!--积分兑换 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="cash_score"): ?>
		<div class="user_help">注：1、兑换积分后，积分减少 <br />
			  
			  2、您目前能提取的最高积分额度是<font color="#FF0000"><? if (!isset($this->magic_vars['_U']['user_score'])) $this->magic_vars['_U']['user_score'] = ''; echo $this->magic_vars['_U']['user_score']; ?></font>。 <br />
		</div>
		<form action="" method="post" onsubmit="return check_form()" name="form1">
		<div class="user_right_border">
			<div class="l">真实姓名：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = ''; echo $this->magic_vars['_G']['user_result']['realname']; ?>
			</div>
		</div>
			<div class="user_right_border">
			<div class="l">积分总额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_score'])) $this->magic_vars['_U']['user_score'] = '';$_tmp = $this->magic_vars['_U']['user_score'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
        	<div class="user_right_border">
			<div class="l">账户总额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['total'])) $this->magic_vars['_U']['user_result']['total'] = '';$_tmp = $this->magic_vars['_U']['user_result']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">账户余额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['use_money'])) $this->magic_vars['_U']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_U']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">可用余额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['use_money'])) $this->magic_vars['_U']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_U']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">冻结总额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['no_use_money'])) $this->magic_vars['_U']['user_result']['no_use_money'] = '';$_tmp = $this->magic_vars['_U']['user_result']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>元
			</div>
		</div>
		
		<div class="user_right_border"  style=" display:none;">
			<div class="l">提现的银行：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['account_bank_result']['bank'])) $this->magic_vars['_U']['account_bank_result']['bank'] = '';$_tmp = $this->magic_vars['_U']['account_bank_result']['bank'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?> <? if (!isset($this->magic_vars['_U']['account_bank_result']['branch'])) $this->magic_vars['_U']['account_bank_result']['branch'] = ''; echo $this->magic_vars['_U']['account_bank_result']['branch']; ?> <? if (!isset($this->magic_vars['_U']['account_bank_result']['account'])) $this->magic_vars['_U']['account_bank_result']['account'] = ''; echo $this->magic_vars['_U']['account_bank_result']['account']; ?> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">交易密码：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['account_bank_result']['paypassword'])) $this->magic_vars['_U']['account_bank_result']['paypassword']=''; ;if (  $this->magic_vars['_U']['account_bank_result']['paypassword']==""): ?><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>&q=code/user/paypwd"><font color="#FF0000">请先设置一个支付密码</font></a><? else: ?><input type="password" name="paypassword" /><? endif; ?>
			</div>
		</div>
		
	
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* 温馨提示：禁止信用卡套现
		</div>
		
<script>
var use_money = <? if (!isset($this->magic_vars['_U']['user_score'])) $this->magic_vars['_U']['user_score'] = '';$_tmp = $this->magic_vars['_U']['user_score'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;

function check_form(){
	 var frm = document.forms['form1'];
	 var paypassword = frm.elements['paypassword'].value;
	 var money = frm.elements['money'].value;
	 var errorMsg = '';
	  if (paypassword.length == 0 ) {
		errorMsg += '请输入您的交易密码' + '\n';
	  }
	  if (money.length == 0 ) {
		errorMsg += '请输入你的兑换积分' + '\n';
	  }
	 if (money <100 || money >50000) {
		errorMsg += '兑换金额要大于100元少于50000' + '\n';
	  }

	 if (money >use_money) {
		errorMsg += '您的兑换金额大于现有的可用最大积分' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>

		<!--积分兑换 结束-->
				<? else: ?>
				
				<? $this->magic_vars['day7'] = time()-6*60*60*24;?>
				<? $this->magic_vars['nowtime'] = time();?>
				
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		发布时间：<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = '';$_tmp = $_REQUEST['dotime1']; if (!isset($this->magic_vars['day7'])) $this->magic_vars['day7'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['day7']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = '';$_tmp = $_REQUEST['dotime2']; if (!isset($this->magic_vars['nowtime'])) $this->magic_vars['nowtime'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['nowtime']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" id="dotime2" size="15" onclick="change_picktime()"/>   
		<input value="搜索" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>	
		<? $data = array('user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
				<div style="line-height:30px; font-size:15px; font-weight:bold">个人资金详情</div>
				<div class="user_right_border">
					<div class="linvest">账户总额：<strong>￥<? if (!isset($this->magic_vars['var']['total'])) $this->magic_vars['var']['total'] = '';$_tmp = $this->magic_vars['var']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></strong></div>
					
					<div class="linvest">可用余额：<font color="#FF0000">￥<? if (!isset($this->magic_vars['var']['use_money'])) $this->magic_vars['var']['use_money'] = '';$_tmp = $this->magic_vars['var']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></font></div>
					
					<div class="linvest">冻结金额：￥<? if (!isset($this->magic_vars['var']['no_use_money'])) $this->magic_vars['var']['no_use_money'] = '';$_tmp = $this->magic_vars['var']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					
				</div><div class="user_right_border">
					<div class="linvest">投标冻结总额：￥<? if (!isset($this->magic_vars['var']['tender'])) $this->magic_vars['var']['tender'] = '';$_tmp = $this->magic_vars['var']['tender'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">充值成功总额：￥<? if (!isset($this->magic_vars['var']['recharge_success'])) $this->magic_vars['var']['recharge_success'] = '';$_tmp = $this->magic_vars['var']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">提现成功总额：￥<? if (!isset($this->magic_vars['var']['cash_success']['money'])) $this->magic_vars['var']['cash_success']['money'] = '';$_tmp = $this->magic_vars['var']['cash_success']['money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">在线充值总额：￥<? if (!isset($this->magic_vars['var']['recharge_online'])) $this->magic_vars['var']['recharge_online'] = '';$_tmp = $this->magic_vars['var']['recharge_online'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">线下充值总额：￥<? if (!isset($this->magic_vars['var']['recharge_downline'])) $this->magic_vars['var']['recharge_downline'] = '';$_tmp = $this->magic_vars['var']['recharge_downline'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">手动充值总额：￥<? if (!isset($this->magic_vars['var']['recharge_shoudong'])) $this->magic_vars['var']['recharge_shoudong'] = '';$_tmp = $this->magic_vars['var']['recharge_shoudong'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">总手续费：￥<? if (!isset($this->magic_vars['var']['fee'])) $this->magic_vars['var']['fee'] = ''; if (!isset($this->magic_vars['var']['recharge_fee'])) $this->magic_vars['var']['recharge_fee'] = '';$_tmp = $this->magic_vars['var']['fee']+$this->magic_vars['var']['recharge_fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">充值手续费：￥<? if (!isset($this->magic_vars['var']['fee'])) $this->magic_vars['var']['fee'] = '';$_tmp = $this->magic_vars['var']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">提现手续费：￥<? if (!isset($this->magic_vars['var']['cash_success']['fee'])) $this->magic_vars['var']['cash_success']['fee'] = '';$_tmp = $this->magic_vars['var']['cash_success']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">最高额度：￥<? if (!isset($this->magic_vars['var']['amount'])) $this->magic_vars['var']['amount'] = '';$_tmp = $this->magic_vars['var']['amount'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">最低额度：￥500</div>
					<div class="linvest">可用额度：￥<? if (!isset($this->magic_vars['var']['use_amount'])) $this->magic_vars['var']['use_amount'] = '';$_tmp = $this->magic_vars['var']['use_amount'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div style="line-height:30px; font-size:15px; font-weight:bold">投资资金详情</div>
			
				<div class="user_right_border">
					<div class="linvest">投标总额：￥<? if (!isset($this->magic_vars['var']['invest_account'])) $this->magic_vars['var']['invest_account'] = '';$_tmp = $this->magic_vars['var']['invest_account'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">借出总额：￥<? if (!isset($this->magic_vars['var']['success_account'])) $this->magic_vars['var']['success_account'] = '';$_tmp = $this->magic_vars['var']['success_account'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">奖励收入总额：￥<? if (!isset($this->magic_vars['var']['award_add'])) $this->magic_vars['var']['award_add'] = '';$_tmp = $this->magic_vars['var']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">待回收总额：￥<? if (!isset($this->magic_vars['var']['collection_wait'])) $this->magic_vars['var']['collection_wait'] = '';$_tmp = $this->magic_vars['var']['collection_wait'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">待回收本金：￥<? if (!isset($this->magic_vars['var']['collection_capital0'])) $this->magic_vars['var']['collection_capital0'] = '';$_tmp = $this->magic_vars['var']['collection_capital0'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">待回收利息：￥<? if (!isset($this->magic_vars['var']['collection_interest0'])) $this->magic_vars['var']['collection_interest0'] = '';$_tmp = $this->magic_vars['var']['collection_interest0'];$_tmp = $this->magic_modifier("round",$_tmp,"2");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">已回收总额：￥<? if (!isset($this->magic_vars['var']['collection_yes'])) $this->magic_vars['var']['collection_yes'] = '';$_tmp = $this->magic_vars['var']['collection_yes'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">已回收本金：￥<? if (!isset($this->magic_vars['var']['collection_capital1'])) $this->magic_vars['var']['collection_capital1'] = '';$_tmp = $this->magic_vars['var']['collection_capital1'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">已回收利息：￥<? if (!isset($this->magic_vars['var']['collection_interest1'])) $this->magic_vars['var']['collection_interest1'] = '';$_tmp = $this->magic_vars['var']['collection_interest1'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">网站垫付总额：￥<? if (!isset($this->magic_vars['var']['num_late_repay_account'])) $this->magic_vars['var']['num_late_repay_account'] = '';$_tmp = $this->magic_vars['var']['num_late_repay_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">逾期罚金收入：￥<? if (!isset($this->magic_vars['var']['late_collection'])) $this->magic_vars['var']['late_collection'] = '';$_tmp = $this->magic_vars['var']['late_collection'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">损失利息总额：￥<? if (!isset($this->magic_vars['var']['num_late_interes'])) $this->magic_vars['var']['num_late_interes'] = '';$_tmp = $this->magic_vars['var']['num_late_interes'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">最近收款日期：<? if (!isset($this->magic_vars['var']['collection_repaytime'])) $this->magic_vars['var']['collection_repaytime'] = '';$_tmp = $this->magic_vars['var']['collection_repaytime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div style="line-height:30px; font-size:15px; font-weight:bold">借款资金详情</div>
			

				<div class="user_right_border">
					<div class="linvest">借款总额：￥<? if (!isset($this->magic_vars['var']['borrow_num'])) $this->magic_vars['var']['borrow_num'] = '';$_tmp = $this->magic_vars['var']['borrow_num'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">已还总额：￥<? if (!isset($this->magic_vars['var']['borrow_num1'])) $this->magic_vars['var']['borrow_num1'] = '';$_tmp = $this->magic_vars['var']['borrow_num1'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">未还总额：￥<? if (!isset($this->magic_vars['var']['wait_payment'])) $this->magic_vars['var']['wait_payment'] = '';$_tmp = $this->magic_vars['var']['wait_payment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">发标次数：<? if (!isset($this->magic_vars['var']['borrow_times'])) $this->magic_vars['var']['borrow_times'] = '';$_tmp = $this->magic_vars['var']['borrow_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">还款标数：<? if (!isset($this->magic_vars['var']['payment_times'])) $this->magic_vars['var']['payment_times'] = '';$_tmp = $this->magic_vars['var']['payment_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">待还笔数：<? if (!isset($this->magic_vars['var']['borrow_repay0'])) $this->magic_vars['var']['borrow_repay0'] = '';$_tmp = $this->magic_vars['var']['borrow_repay0'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">最近还款日期：<? if (!isset($this->magic_vars['var']['new_repay_time'])) $this->magic_vars['var']['new_repay_time'] = '';$_tmp = $this->magic_vars['var']['new_repay_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">最近应还款金额：￥<? if (!isset($this->magic_vars['var']['new_repay_account'])) $this->magic_vars['var']['new_repay_account'] = '';$_tmp = $this->magic_vars['var']['new_repay_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<? unset($_magic_vars);unset($data); ?>
				<!--
			<table  border="0"  cellspacing="1" class="user_list_table">
				<tr class="head">
					<? $this->magic_vars['query_type']='GetLogGroup';$data = array('var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['magic_result'] = accountClass::GetLogGroup($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
					<td><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></td>
					<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				</tr>
				
				<tr >
					<? $this->magic_vars['query_type']='GetLogGroup';$data = array('var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['magic_result'] = accountClass::GetLogGroup($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
					<td>￥<? if (!isset($this->magic_vars['var']['num'])) $this->magic_vars['var']['num'] = ''; echo $this->magic_vars['var']['num']; ?></td>
					<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				</tr>
		</table>
		-->
		<table  border="0"  cellspacing="1" class="user_list_table" width="300">
		<tr class="head"  width="300">
		<td>日期</td>
		<td>成功借款+</td>
		<td>借款手续费-</td>
		<td>借款保证金-</td>
		<td>借款奖励-</td>
		<td>投标-</td>
		<td>待收总额+</td>
		<td>投标奖励+</td>
        <td>收款+</td>
		<td>还款-</td>
		<td>充值+</td>
		<td>提现-</td>
		</tr>
			<? $this->magic_vars['query_type']='GetLogCount';$data = array('var'=>'var','dotime1'=>$_REQUEST['dotime1'],'dotime2'=>$_REQUEST['dotime2'],'user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['magic_result'] = accountClass::GetLogCount($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
				<tr  <? if (!isset($this->magic_vars['var']['i'])) $this->magic_vars['var']['i']=''; ;if (  $this->magic_vars['var']['i']%2==1): ?> class="tr1"<? endif; ?>>
				
					<td><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?></td>
					<td <? if (!isset($this->magic_vars['var']['borrow_success'])) $this->magic_vars['var']['borrow_success']=''; ;if (  $this->magic_vars['var']['borrow_success']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['borrow_success'])) $this->magic_vars['var']['borrow_success'] = '';$_tmp = $this->magic_vars['var']['borrow_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['borrow_fee'])) $this->magic_vars['var']['borrow_fee']=''; ;if (  $this->magic_vars['var']['borrow_fee']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['borrow_fee'])) $this->magic_vars['var']['borrow_fee'] = '';$_tmp = $this->magic_vars['var']['borrow_fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  <? if (!isset($this->magic_vars['var']['margin'])) $this->magic_vars['var']['margin']=''; ;if (  $this->magic_vars['var']['margin']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['margin'])) $this->magic_vars['var']['margin'] = '';$_tmp = $this->magic_vars['var']['margin'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  <? if (!isset($this->magic_vars['var']['award_lower'])) $this->magic_vars['var']['award_lower']=''; ;if (  $this->magic_vars['var']['award_lower']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['award_lower'])) $this->magic_vars['var']['award_lower'] = '';$_tmp = $this->magic_vars['var']['award_lower'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['tender'])) $this->magic_vars['var']['tender']=''; ;if (  $this->magic_vars['var']['tender']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['tender'])) $this->magic_vars['var']['tender'] = '';$_tmp = $this->magic_vars['var']['tender'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['collection'])) $this->magic_vars['var']['collection']=''; ;if (  $this->magic_vars['var']['collection']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['collection'])) $this->magic_vars['var']['collection'] = '';$_tmp = $this->magic_vars['var']['collection'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['award_add'])) $this->magic_vars['var']['award_add']=''; ;if (  $this->magic_vars['var']['award_add']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['award_add'])) $this->magic_vars['var']['award_add'] = '';$_tmp = $this->magic_vars['var']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
                    <td <? if (!isset($this->magic_vars['var']['invest_repayment'])) $this->magic_vars['var']['invest_repayment']=''; ;if (  $this->magic_vars['var']['invest_repayment']!=""): ?> style="color:#FF0000"<? endif; ?>> ￥<? if (!isset($this->magic_vars['var']['invest_repayment'])) $this->magic_vars['var']['invest_repayment'] = '';$_tmp = $this->magic_vars['var']['invest_repayment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
                   
					<td <? if (!isset($this->magic_vars['var']['repayment'])) $this->magic_vars['var']['repayment']=''; ;if (  $this->magic_vars['var']['repayment']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['repayment'])) $this->magic_vars['var']['repayment'] = '';$_tmp = $this->magic_vars['var']['repayment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['recharge'])) $this->magic_vars['var']['recharge']=''; ;if (  $this->magic_vars['var']['recharge']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['recharge'])) $this->magic_vars['var']['recharge'] = '';$_tmp = $this->magic_vars['var']['recharge'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['recharge_success'])) $this->magic_vars['var']['recharge_success']=''; ;if (  $this->magic_vars['var']['recharge_success']!=""): ?> style="color:#FF0000"<? endif; ?>>￥<? if (!isset($this->magic_vars['var']['recharge_success'])) $this->magic_vars['var']['recharge_success'] = '';$_tmp = $this->magic_vars['var']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					
				</tr>
				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				
		</table>	
			<? endif; ?>
	</div>
	<!--右边的内容 结束-->
</div>
<!--用户中心的主栏目 结束-->
	<script>
var url = "<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type'] = ''; echo $this->magic_vars['_U']['query_type']; ?>";

function sousuo(){
	var _url = "";
	var username=null;
	var keywords=null;
	var dotime1 = document.getElementById("dotime1").value;
	if(document.getElementById("type")){
            var type = document.getElementById("type").value;
        }
	var dotime2 = document.getElementById("dotime2").value;
	
	if (username!=null){
		 _url += "&username="+username;
	}
	if (keywords!=null){
		 _url += "&keywords="+keywords;
	}
	if (dotime1!=null){
		 _url += "&dotime1="+dotime1;
	}
	if (dotime2!=null){
		 _url += "&dotime2="+dotime2;
	}
	if (type!=null){
		 _url += "&type="+type;
	}
	window.location.href=url+_url;
}

</script>

</div>
</div>
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>