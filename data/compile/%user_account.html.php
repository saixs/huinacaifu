<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<script src="plugins/timepicker/WdatePicker.js" type="text/javascript"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<!--�û����ĵ�����Ŀ ��ʼ-->
<div class="wrap950 mar10">
	<!--��ߵĵ��� ��ʼ-->
	<div class="user_left">
		<? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
	</div>
	<!--��ߵĵ��� ����-->

	<!--�ұߵ����� ��ʼ-->
	<div class="user_right">
		<div class="user_right_menu">
			<ul>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="list"): ?> class="active current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">�ʻ�����</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="bank"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/bank">�����˺�</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="recharge_new"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/recharge_new">�ʻ���ֵ</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="recharge"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/recharge">��ֵ��¼</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="cash_new"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cash_new">�ʻ�����</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="cash"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cash">���ּ�¼</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="log"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/log">�ʽ���ϸ</a></li>
				<!--<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="fund"): ?>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="fund"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/fund">��</a></li>
				<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="backfund"): ?>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="backfund"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/backfund">���</a></li>
				<? endif; ?>-->
			</ul>
		</div>

		<div class="user_right_main">
		<!--�ʽ�ʹ�ü�¼�б� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="log"): ?>
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		��¼ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = '';$_tmp = $_REQUEST['dotime1']; if (!isset($this->magic_vars['day7'])) $this->magic_vars['day7'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['day7']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = '';$_tmp = $_REQUEST['dotime2']; if (!isset($this->magic_vars['nowtime'])) $this->magic_vars['nowtime'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['nowtime']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" id="dotime2" size="15" onclick="change_picktime()"/>   
		<? $result = $this->magic_vars['_G']['_linkage']['account_type']; echo "<select name='type' id=type >"; echo "<option value=''>ȫ��</option>"; if ($result!=''): foreach ($result as $key => $val): if ($_REQUEST['type']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?> <input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" /> �ܼƣ���<? if (!isset($this->magic_vars['_U']['account_num'])) $this->magic_vars['_U']['account_num'] = '';$_tmp = $this->magic_vars['_U']['account_num'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
		</div>	
			<table  border="0"  cellspacing="1" class="user_list_table">
			  <form action="" method="post">
				<tr class="head">
					<td>����</td>
					<td>�������</td>
					<td>�ܽ��</td>
					<td>���ý��</td>
					<td>������</td>
					<td>���ս��</td>
					<td>���׶Է�</td>
					<td>��¼ʱ��</td>
					<td width="130">��ע��Ϣ</td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['account_log_list']) || $this->magic_vars['_U']['account_log_list']=='') $this->magic_vars['_U']['account_log_list'] = array();  $_from = $this->magic_vars['_U']['account_log_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type'] = '';$_tmp = $this->magic_vars['item']['type'];$_tmp = $this->magic_modifier("linkage",$_tmp,"account_type");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money'] = ''; echo $this->magic_vars['item']['money']; ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['total'])) $this->magic_vars['item']['total'] = ''; echo $this->magic_vars['item']['total']; ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['use_money'])) $this->magic_vars['item']['use_money'] = ''; echo $this->magic_vars['item']['use_money']; ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['no_use_money'])) $this->magic_vars['item']['no_use_money'] = '';$_tmp = $this->magic_vars['item']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['collection'])) $this->magic_vars['item']['collection'] = ''; echo $this->magic_vars['item']['collection']; ?></td>
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
		<!--�ʽ�ʹ�ü�¼�б� ����-->
	<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="fund"): ?>
			
		<div class="user_help"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>���е��ʽ𣬿���<a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/backfund">���</a>����������㱣�����еĽ�ÿ�յõ���Ϣ
		</div>
		<? $data = array('user_id'=>'0','var'=>'acc','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>
	
		<form action="" method="post">
		<div class="user_right_border">
			<div class="l">�˻��ܶ</div>
			<div class="c">
               <? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['use_money'])) $this->magic_vars['acc']['use_money'] = '';$_tmp = $this->magic_vars['acc']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">�����ʽ�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">���ʽ�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = '';$_tmp = $this->magic_vars['acc']['fund'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

	  <div class="user_right_border">
			<div class="l">Ԥ���������棺</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = ''; if (!isset($this->magic_vars['_G']['system']['con_Interest'])) $this->magic_vars['_G']['system']['con_Interest'] = '';$_tmp = $this->magic_vars['acc']['fund']*$this->magic_vars['_G']['system']['con_Interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="user_right_border">
			<div class="l">ת������</div>
			<div class="c">
				<input type="text" name="fund" value="" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input  class="login_input2"  name="valicode" type="text" size="20" maxlength="4"/><a class="p_ico"><img width="50" height="20" src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" /></a> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		</form>
		
		<!-- �������ʽ�䶯��¼ -->
			<table  border="0"  cellspacing="1" class="user_list_table">
			  <form action="" method="post">
				<tr class="head">
					<td>���</td>
					<td>���</td>
					<td>����</td>
					<td>����ʱ��</td>
					<td>����ʱ��</td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['fundlist']) || $this->magic_vars['_U']['fundlist']=='') $this->magic_vars['_U']['fundlist'] = array();  $_from = $this->magic_vars['_U']['fundlist']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']+1; ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['income'])) $this->magic_vars['item']['income'] = ''; echo $this->magic_vars['item']['income']; ?></td>
					<td>������Ϣ </td>
					<td><? if (!isset($this->magic_vars['item']['fromtime'])) $this->magic_vars['item']['fromtime'] = '';$_tmp = $this->magic_vars['item']['fromtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
			</form>	
		</table>
		
		
	 <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="backfund"): ?>
			<!-- ������ -->
     <div class="user_help"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>���е��ʽ�<a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/backfund">���</a>��û����Ϣ��
		</div>
		<? $data = array('user_id'=>'0','var'=>'acc','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>
	
		<form action="" method="post">
		<div class="user_right_border">
			<div class="l">�˻��ܶ</div>
			<div class="c">
               <? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['use_money'])) $this->magic_vars['acc']['use_money'] = '';$_tmp = $this->magic_vars['acc']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">�����ʽ�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">���ʽ�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = '';$_tmp = $this->magic_vars['acc']['fund'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
	  <div class="user_right_border">
			<div class="l">Ԥ���������棺</div>
			<div class="c">
				<? if (!isset($this->magic_vars['acc']['fund'])) $this->magic_vars['acc']['fund'] = ''; if (!isset($this->magic_vars['_G']['system']['con_Interest'])) $this->magic_vars['_G']['system']['con_Interest'] = '';$_tmp = $this->magic_vars['acc']['fund']*$this->magic_vars['_G']['system']['con_Interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">ת����ؽ�</div>
			<div class="c">
				<input type="text" name="backfund" value="" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
			</div>
		</div>
			<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input  class="login_input2"  name="valicode" type="text" size="20" maxlength="4"/><a class="p_ico"><img width="55" height="20" src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" /></a> 
			</div>
		</div>
		
		

		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		</form>
			
		<!--��ֵ��¼�б� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="recharge"): ?>
		<div class="user_help">�ɹ���ֵ<? if (!isset($this->magic_vars['_U']['account_log']['recharge_success'])) $this->magic_vars['_U']['account_log']['recharge_success'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ�����ϳɹ���ֵ<? if (!isset($this->magic_vars['_U']['account_log']['recharge_online'])) $this->magic_vars['_U']['account_log']['recharge_online'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_online'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ�����³ɹ���ֵ<? if (!isset($this->magic_vars['_U']['account_log']['recharge_downline'])) $this->magic_vars['_U']['account_log']['recharge_downline'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_downline'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ,���ֶ��ɹ���ֵ<? if (!isset($this->magic_vars['_U']['account_log']['recharge_shoudong'])) $this->magic_vars['_U']['account_log']['recharge_shoudong'] = '';$_tmp = $this->magic_vars['_U']['account_log']['recharge_shoudong'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
</div>
		<table  border="0"  cellspacing="1" class="user_list_table">
		<form action="" method="post">
			<tr class="head" >
			<td>����</td>
			<td>֧����ʽ</td>
			<td>��ֵ���</td>
			<td>��ע</td>
			<td>��ֵʱ��</td>
			<td>״̬</td>
			<td>����ע</td>
			</tr>
			<? $this->magic_vars['query_type']='GetRechargeList';$data = array('showpage'=>'3','var'=>'loop','user_id'=>'0','epage'=>'20','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['magic_result'] = accountClass::GetRechargeList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
			<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;if (  $this->magic_vars['item']['type']==1): ?>���ϳ�ֵ<? else: ?>���³�ֵ<? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['payment_name'])) $this->magic_vars['item']['payment_name'] = '';$_tmp = $this->magic_vars['item']['payment_name'];$_tmp = $this->magic_modifier("default",$_tmp,"�ֶ���ֵ");echo $_tmp;unset($_tmp); ?></td>
			<td><font color="#FF0000">��<? if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money'] = ''; echo $this->magic_vars['item']['money']; ?></font></td>
			<td><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
			<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
			<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>�����<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (   $this->magic_vars['item']['status']==1): ?> ��ֵ�ɹ� <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>��ֵʧ��<? endif; ?></td>
			
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
		<!--��ֵ��¼�б� ����-->
		
		<!--���ּ�¼�б� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="cash"): ?>
		<div class="user_help">�ɹ�����<? if (!isset($this->magic_vars['_U']['cash_log']['cash_success']['money'])) $this->magic_vars['_U']['cash_log']['cash_success']['money'] = '';$_tmp = $this->magic_vars['_U']['cash_log']['cash_success']['money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ�����ֵ���<? if (!isset($this->magic_vars['_U']['cash_log']['cash_success']['credited'])) $this->magic_vars['_U']['cash_log']['cash_success']['credited'] = '';$_tmp = $this->magic_vars['_U']['cash_log']['cash_success']['credited'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ��������<? if (!isset($this->magic_vars['_U']['cash_log']['cash_success']['fee'])) $this->magic_vars['_U']['cash_log']['cash_success']['fee'] = '';$_tmp = $this->magic_vars['_U']['cash_log']['cash_success']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
</div>
		<table  border="0"  cellspacing="1" class="user_list_table">
			<form action="" method="post">
				<tr class="head">
					<td>��������</td>
					<td>�����˺�</td>
					<td>�����ܶ�</td>
					<td>���˽��</td>
					<td>������</td>
					<td>����ʱ��</td>
					<td>״̬</td>
					<td>����</td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['account_cash_list']) || $this->magic_vars['_U']['account_cash_list']=='') $this->magic_vars['_U']['account_cash_list'] = array();  $_from = $this->magic_vars['_U']['account_cash_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td><? if (!isset($this->magic_vars['item']['bank_name'])) $this->magic_vars['item']['bank_name'] = ''; echo $this->magic_vars['item']['bank_name']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = '';$_tmp = $this->magic_vars['item']['account'];$_tmp = $this->magic_modifier("hideMiddle",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['total'])) $this->magic_vars['item']['total'] = '';$_tmp = $this->magic_vars['item']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['credited'])) $this->magic_vars['item']['credited'] = '';$_tmp = $this->magic_vars['item']['credited'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['item']['fee'])) $this->magic_vars['item']['fee'] = '';$_tmp = $this->magic_vars['item']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>	
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>�����<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (   $this->magic_vars['item']['status']==1): ?> ���ֳɹ� <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>����ʧ�� <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==3): ?>�û�ȡ��<? endif; ?></td>
					<td><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark']=''; ;if (  $this->magic_vars['item']['verify_remark']!=""): ?><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark'] = ''; echo $this->magic_vars['item']['verify_remark']; ?><? else: ?><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?><a href="#" onclick="javascript:if(confirm('ȷ��Ҫȡ������������')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cash_cancel&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ȡ������</a><? else: ?>-<? endif; ?><? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="11" class="page">
						<? if (!isset($this->magic_vars['_U']['show_page'])) $this->magic_vars['_U']['show_page'] = ''; echo $this->magic_vars['_U']['show_page']; ?>
					</td>
				</tr>
			</form>	
		</table>
		<!--���ּ�¼�б� ����-->
		
		<!--�˺ų�ֵ ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="recharge_new"): ?>
    
		<div class="user_help"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>��ֹ���ÿ����֡���ٽ��׵���Ϊ,һ�����ֽ����Դ���,�����������ڣ������տ�����˻�������ֹͣ����,���п���Ӱ��������ü�¼��
</div>
		<div class="user_right_border">
			<div class="l">��ʵ������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = '';$_tmp = $this->magic_vars['_G']['user_result']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?>**
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">�˺ţ�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?>
			</div>
		</div>
		<form action="" method="post" name="form1" target="_blank" onsubmit = "return check();" >
		<div id="returnpay">
<div class="user_right_border">
			<div class="l">��ֵ��ʽ��</div>
			<div class="c">
                <input type="radio" name="type"  id="type"  class="input_border" checked="checked" onclick="change_type(1)" value="1"  /> ���ϳ�ֵ
				<!--<input type="radio" name="type" id="type" class="input_border" value="2" onclick="change_type(2)" /> ���³�ֵ-->
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">��ֵ��</div>
			<div class="c">
				<input type="text" name="money"  class="input_border" value="" size="10" onkeyup="commit(this);" maxlength="9" /> Ԫ <span id="realacc">ʵ�����ˣ�<font color="#FF0000" id="real_money">0</font> Ԫ</span>
			</div>
		</div>
		<div id="type_net">
			<div class="user_right_border">
				<div class="l">��ֵ���ͣ�</div>
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
				<div class="l">��ֵ���У�</div>
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
				<div class="l">�˵���ˮ�ţ�</div>
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
            <img id="1" onclick="myRadio(this.id)" src="../data/bank/�й�����.gif" alt="�й�����" />
            <input type="radio" num="2" value="3080" name="chinaBank" />
            <img id="2" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <input type="radio" num="3" value="105" name="chinaBank" />
            <img id="3" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <input type="radio" num="4" value="103" name="chinaBank" />
            <img id="4" onclick="myRadio(this.id)" src="../data/bank/ũҵ����.gif" alt="ũҵ����" />
            <input type="radio" num="5" value="301" name="chinaBank" />
            <img id="5" onclick="myRadio(this.id)" src="../data/bank/��ͨ����.gif" alt="��ͨ����" />
            <input type="radio" num="6" value="1025" name="chinaBank" />
            <img id="6" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <input type="radio" num="7" value="305" name="chinaBank" />
            <img id="7" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <input type="radio" num="8" value="306" name="chinaBank" />
            <img id="8" onclick="myRadio(this.id)" src="../data/bank/�㷢����.gif" alt="�㷢����" />
            <input type="radio" num="9" value="312" name="chinaBank" />
            <img id="9" onclick="myRadio(this.id)" src="../data/bank/�������.gif" alt="�������" />
            <input type="radio" num="10" value="311" name="chinaBank" />
            <img id="10" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <input type="radio" num="11" value="310" name="chinaBank" />
            <img id="11" onclick="myRadio(this.id)" src="../data/bank/ƽ������.gif" alt="ƽ������" />
            <input type="radio" num="12" value="313" name="chinaBank" />
            <img id="12" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <input type="radio" num="13" value="309" name="chinaBank" />
            <img id="13" onclick="myRadio(this.id)" src="../data/bank/��ҵ����.gif" alt="��ҵ����" />
            <!--<input type="radio" num="14" value="344" name="chinaBank" />-->
            <!--<img id="14" onclick="myRadio(this.id)" src="../data/bank/�������.gif" alt="�������" />-->
            <!--<input type="radio" num="15" value="3230" name="chinaBank" />
            <img id="15" onclick="myRadio(this.id)" src="../data/bank/�й�������������.gif" alt="�й�������������" />
            <input type="radio" num="16" value="314" name="chinaBank" />
            <img id="16" onclick="myRadio(this.id)" src="../data/bank/�Ϻ��ֶ���չ����.gif" alt="�Ϻ��ֶ���չ����" />
            <input type="radio" num="17" value="326" name="chinaBank" />
            <img id="17" onclick="myRadio(this.id)" src="../data/bank/�Ϻ�����.gif" alt="�Ϻ�����" />
            <input type="radio" num="18" value="316" name="chinaBank" />
            <img id="18" onclick="myRadio(this.id)" src="../data/bank/�Ͼ�����.gif" alt="�Ͼ�����" />
            <input type="radio" num="19" value="329" name="chinaBank" />
            <!--<img id="19" onclick="myRadio(this.id)" src="../data/bank/�㽭̩¡��ҵ����.gif" alt="�㽭̩¡��ҵ����" />-->
            <!--<input type="radio" num="20" value="302" name="chinaBank" />
            <img id="20" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <!--<input type="radio" num="21" value="332" name="chinaBank" />-->
            <!--<img id="21" onclick="myRadio(this.id)" src="../data/bank/������.gif" alt="������" />-->
            <!--<input type="radio" num="22" value="324" name="chinaBank" />
            <img id="22" onclick="myRadio(this.id)" src="../data/bank/��������.jpg" alt="��������" />
            <!--<input type="radio" num="23" value="339" name="chinaBank" />-->
            <!--<img id="23" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />-->
            <!--<input type="radio" num="24" value="310" name="chinaBank" />
            <img id="24" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <input type="radio" num="25" value="335" name="chinaBank" />
            <!--<input type="radio" num="26" value="317" name="chinaBank" />
            <img id="26" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />-->
            <!--<input type="radio" num="27" value="336" name="chinaBank" />
            <img id="27" onclick="myRadio(this.id)" src="../data/bank/�ɶ�����.gif" alt="�ɶ�����" />
            <!--<input type="radio" num="28" num="" value="345" name="chinaBank" />
            <img id="28" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />-->
            <!--<input type="radio" num="29" value="342" name="chinaBank" />
            <img id="29" onclick="myRadio(this.id)" src="../data/bank/����ũ������.gif" alt="����ũ������" />
            <input type="radio" num="30" value="334" name="chinaBank" />
            <img id="30" onclick="myRadio(this.id)" src="../data/bank/�ൺ����.gif" alt="�ൺ����" />
            <!--<input type="radio" num="31" value="340" name="chinaBank" />-->
            <!--<img id="31" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />-->
            <!--<input type="radio" num="32" value="327" name="chinaBank" />
            <img id="32" onclick="myRadio(this.id)" src="../data/bank/��������.gif" alt="��������" />
            <!--<hr />
            ���Խӿ�,����ʹ��<br  />
            <input type="radio" num="33" value="106" name="chinaBank" />
            <img id="33" onclick="myRadio(this.id)" src="../data/bank/�й�����.gif" alt="�й�����" />
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
			<div class="l">��֤�룺</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
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
					//alert('��ѡ���ֵ������');
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
				$("#returnpay").html("<font color='red'>�뵽�򿪵���ҳ���ֵ</font>");
				
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
		* ��ܰ��ʾ���������г�ֵ�����������ĵȴ�,��ֵ�ɹ����벻Ҫ�ر������,��ֵ�ɹ��󷵻�<? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>,��ֵ�����ܴ��������ʺš���������,����������ϵ
		</div>
		
		<!--�˺ų�ֵ ����-->
		
		<!--�����˺� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="bank"): ?>
		<div class="user_help">
            <? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>��ֹ���ÿ����֡���ٽ��׵���Ϊ,һ�����ֽ����Դ���,�����������ڣ������տ�����˻�������ֹͣ����,���п���Ӱ��������ü�¼��<br />
            <strong>ע��:</strong><br />
            1:��һ����ӵ������˻�����ͷ���˼�����Ч<br />
            2:����������޸������˻�����ͷ���˺�����Ч,����д��������ͷ���ϵ<br />
            3:ɾ�����޸������˻�,���뱣֤������վ��������һ����Ч�˻�����,�Ҹ���Ч�˻�����ɾ�����޸�<br />
        </div>
		<? if (!isset($this->magic_vars['num'])) $this->magic_vars['num']=''; ;if (  $this->magic_vars['num'] > 0): ?>
        <div style="text-align: left; position: relative; left: 15px;">�Ѿ���д�������˻�:</div>
        <div class="user_help">
        <table style="width: 730px;text-align: center">
            <tr><th>��������</th><th>����֧��</th><th>�����ʺ�</th><th>״̬</th><td>����</td></tr>
        <?  if(!isset($this->magic_vars['_U']['account_bank_result']) || $this->magic_vars['_U']['account_bank_result']=='') $this->magic_vars['_U']['account_bank_result'] = array();  $_from = $this->magic_vars['_U']['account_bank_result']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
            <tr <? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] != 1): ?>style="background: #cccccc"<? endif; ?>>
                <td><? if (!isset($this->magic_vars['var']['bank'])) $this->magic_vars['var']['bank'] = '';$_tmp = $this->magic_vars['var']['bank'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
                <td><? if (!isset($this->magic_vars['var']['branch'])) $this->magic_vars['var']['branch'] = ''; echo $this->magic_vars['var']['branch']; ?></td>
                <td><? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = '';$_tmp = $this->magic_vars['var']['account'];$_tmp = $this->magic_modifier("hideMiddle",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
                <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] == 1): ?>��Ч<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status'] == 0): ?>�����<? else: ?>��˲�ͨ��<? endif; ?></td>
                <td><a href="/index.php?user&q=code/account/changeBank&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>">�޸�/ɾ��</a></td>
            </tr>
        <? endforeach; endif; unset($_from); ?>
        </table>
        </div>
		<? endif; ?>
        <? if (!isset($this->magic_vars['num'])) $this->magic_vars['num']=''; ;if (  $this->magic_vars['num'] < 3): ?>
        <div style="text-align: left; position: relative; left: 15px;">���������˻�:</div>
		<form action="" method="post">
		<div class="user_right_border">
			<div class="l">�������У�</div>
			<div class="c">
				<script src="/plugins/index.php?q=linkage&name=bank&nid=account_bank&value=300"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">������֧�����ƣ�</div>
			<div class="c">
				<input type="text" name="branch" value="<? if (!isset($this->magic_vars['_U']['account_bank_result']['branch'])) $this->magic_vars['_U']['account_bank_result']['branch'] = ''; echo $this->magic_vars['_U']['account_bank_result']['branch']; ?>" /> &nbsp;&nbsp;**����**֧��**������Ӫҵ��(�磺�Ϻ���������֧�пؽ�·����)<br />

			</div>
		</div>

		<div class="user_right_border">
			<div class="l">�����˺ţ�</div>
			<div class="c">
				<input type="text" name="account" value="<? if (!isset($this->magic_vars['_U']['account_bank_result']['account'])) $this->magic_vars['_U']['account_bank_result']['account'] = ''; echo $this->magic_vars['_U']['account_bank_result']['account']; ?>" onkeyup="value=value.replace(/[^0-9]/g,'')"/>
			</div>
		</div>

		<div class="user_right_border">
			<div class="c">
                <span style="color: red">�ر����ѣ��������п��ŵĿ���������������������վʵ����֤ʱ��д��������ͬ, ���������˺ű�����д��ȷ,������������ʽ𽫴��ڷ���.</span>
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
                            ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll�����ϰ汾
                        }catch (e){
                            ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6�����°汾
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
            
            <input type="button" name="getVerifyCode" value="��ȡ��֤��" onclick="sendSMS()" />
            <input type="hidden" id="item_name" name="item_name" value="add_bank_account_verify" />
            <b>��֤�뷢��״̬:</b><span id="VerifySendResult">��δ���뷢����֤��</span>
            <br />
            ��������֤��:<input type="text" name="verifyCode" value="" />
            <? endif; ?>
            <input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
            <input type="submit" name="name"  value="ȷ���ύ" size="30" />
		</form>
        <? endif; ?>
		<div class="user_right_foot">
		* ��ܰ��ʾ����ֹ���ÿ�����
		</div>
		<!--�����˺� ����-->

        <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type'] == 'changeBank'): ?>

        <form action="" method="post">
            <div class="user_right_border">
                <div class="l">�������У�</div>
                <div class="c">
                    <script src="/plugins/index.php?q=linkage&name=bank&nid=account_bank&value=<? if (!isset($this->magic_vars['bank_info']['bank'])) $this->magic_vars['bank_info']['bank'] = ''; echo $this->magic_vars['bank_info']['bank']; ?>"></script>
                </div>
            <div class="user_right_border">
                <div class="l">����֧�У�</div>
                <div class="c">
                    <input type="text" name="branch" value="<? if (!isset($this->magic_vars['bank_info']['branch'])) $this->magic_vars['bank_info']['branch'] = ''; echo $this->magic_vars['bank_info']['branch']; ?>" />
                </div>
            </div>

            <div class="user_right_border">
                <div class="l">�����ʺţ�</div>
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
                            ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll�����ϰ汾
                        }catch (e){
                            ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6�����°汾
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
            <input type="button" name="getVerifyCode" value="��ȡ��֤��" onclick="sendSMS()" />
            <input type="hidden" id="item_name" name="item_name" value="reset_bank_account_verify" />
            <b>��֤�뷢��״̬:</b><span id="VerifySendResult">��δ���뷢����֤��</span>
            <br />
            &nbsp;������֤��:<input type="text" name="verifyCode" value="" />
            <? endif; ?>
            <? if (!isset($this->magic_vars['verify_status'])) $this->magic_vars['verify_status']=''; ;if (  $this->magic_vars['verify_status'] !== true): ?><div class="user_right_border" style="position: relative; left:52px;"><? endif; ?>
            <input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
            <input type="submit" name="update"  value="�޸�" />
            <input type="submit" name="delete"  value="ɾ��" />
            </div>
        </form>

		<!--���� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="cash_new"): ?>
		<div class="user_help">ע��1����������Ҫȡ�����,���ǽ���1��3��������(���ҽڼ��ճ���)֮�ڽ�Ǯת������վ����д�������ʺš� <br />
			  2�����㼱��Ҫ��Ǯת������ʺŻ���24Сʱ֮����վδ��Ǯת�뵽��������ʺ�,����ϵ�ͷ����ġ� <br />
			  3��ȷ�����������ʺŵ�������������վ�ϵ���ʵ����һ�¡� <br />
			  4����Ǯ�����ʺ�ʱ�ᷢһ��վ����֪ͨ�㡣 <br />
			  5��ÿ�����ֽ������100Ԫ���ϡ� <br />
			  6��ÿ�����ֽ����߲��ܳ���50000Ԫ���ϡ� <br />
			  7����Ŀǰ����ȡ����߶����<font color="#FF0000"><? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money']=''; ;if (  $this->magic_vars['_G']['user_result']['use_money']>50000): ?>50000<? else: ?><? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = ''; echo $this->magic_vars['_G']['user_result']['use_money']; ?><? endif; ?>Ԫ</font>�� <br />
		</div>
		<form action="" method="post" onsubmit="return check_form()" name="form1">
		<div class="user_right_border">
			<div class="l">��ʵ������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = '';$_tmp = $this->magic_vars['_G']['user_result']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?>**
			</div>
		</div>

            <div class="user_right_border">
                <div class="l">�˻��ܶ</div>
                <div class="c">
                    <span id="total_money"><? if (!isset($this->magic_vars['_G']['user_result']['total'])) $this->magic_vars['_G']['user_result']['total'] = '';$_tmp = $this->magic_vars['_G']['user_result']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></span>Ԫ
                </div>
            </div>
		
		<div class="user_right_border">
			<div class="l">������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_G']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
                <input type="hidden" id="can_user_money" value="<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_G']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" />
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">�����ܶ</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['no_use_money'])) $this->magic_vars['_G']['user_result']['no_use_money'] = '';$_tmp = $this->magic_vars['_G']['user_result']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
			</div>
		</div>
        <div class="user_right_border">
            <div class="l">�������ֽ�</div>
            <div class="c">
                <span id="proposal"><? if (!isset($this->magic_vars['proposal'])) $this->magic_vars['proposal'] = ''; echo $this->magic_vars['proposal']; ?></span>
                <span>(��ڼ䲻������������)</span>
                <input type="hidden" id="free_cash" value="<? if (!isset($this->magic_vars['free_cash'])) $this->magic_vars['free_cash'] = ''; echo $this->magic_vars['free_cash']; ?>" />
            </div>
        </div>
		<div class="user_right_border">
			<div class="l">���ֵ����У�</div>
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
			<div class="l">�������룺</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['account_bank_result']['0']['paypassword'])) $this->magic_vars['_U']['account_bank_result']['0']['paypassword']=''; ;if (  $this->magic_vars['_U']['account_bank_result']['0']['paypassword']==""): ?><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>&q=code/user/paypwd"><font color="#FF0000">��������һ��֧������</font></a><? else: ?><input type="password" name="paypassword" /><? endif; ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">���ֽ�</div>
			<div class="c">
				<input type="text" name="money"  onblur="commit(this);"  />
				<span id="realacc"><span id="real_money"></span></span>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
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
                            document.getElementById("real_money").innerHTML = '<br />������Ľ����ڵ�ǰ�Ŀ����ʽ�';
                            frm.elements['sub'].disabled = true;
                            return;
                        }
                        if(inputValue < 100 || inputValue > 50000){
                            obj.value=0;
                            document.getElementById("real_money").innerHTML = '<br />���ֽ��������100Ԫ��С��5��Ԫ';
                            frm.elements['sub'].disabled = true;
                            return;
                        }

                        frm.elements['sub'].disabled = false;

                        var cashAmount;
                        cashAmount = parseFloat(obj.value);
                        getCashFeeValue(cashAmount);
                    } else {
                        obj.value=0;
                        document.getElementById("real_money").innerHTML = '<br />���ֽ��������100Ԫ��С��5��Ԫ';
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
                        var exceed = cashAmount - free_cash; // �������ֵ����ֶ�
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
                        document.getElementById("real_money").innerHTML = '<br />ʵ�ʵ��ˣ�<font color="#FF0000" id="real_money">'+changeTwoDecimal(cashAmount-cashFee)+'</font> Ԫ,���ַ���:<font color="green">'+changeTwoDecimal(cashFee)+'</font><br /> <b></b>';
                    }else{
                        document.getElementById("real_money").innerHTML = '<br />ʵ�ʵ��ˣ�<font color="#FF0000" id="real_money">'+changeTwoDecimal(cashAmount-cashFee)+'</font> Ԫ'+',�������ַ���:<font color="green">'+changeTwoDecimal(cashFee)+'</font><br /><font style="color:blue;font-size: 14px; font-weight: bold;"></font>';
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
                                ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll�����ϰ汾
                            }catch (e){
                                ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6�����°汾
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
                
                <input type="button" name="getVerifyCode" value="��ȡ��֤��" onclick="sendSMS()" />
                <input type="hidden" id="item_name" name="item_name" value="withdraw_verify" />
                <b>��֤�뷢��״̬:</b><span id="VerifySendResult">��δ���뷢����֤��</span>
                <br />
                ������������֤��:<input type="text" name="verifyCode" value="" />
                <? endif; ?>
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input id="sub" type="submit" name="name"  value="ȷ���ύ" style="width: 80px; height: 33px;" />
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* ��ܰ��ʾ����ֹ���ÿ�����
		</div>

		<!--���� ����-->
        <!--���ֶһ� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="cash_score"): ?>
		<div class="user_help">ע��1���һ����ֺ󣬻��ּ��� <br />
			  
			  2����Ŀǰ����ȡ����߻��ֶ����<font color="#FF0000"><? if (!isset($this->magic_vars['_U']['user_score'])) $this->magic_vars['_U']['user_score'] = ''; echo $this->magic_vars['_U']['user_score']; ?></font>�� <br />
		</div>
		<form action="" method="post" onsubmit="return check_form()" name="form1">
		<div class="user_right_border">
			<div class="l">��ʵ������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = ''; echo $this->magic_vars['_G']['user_result']['realname']; ?>
			</div>
		</div>
			<div class="user_right_border">
			<div class="l">�����ܶ</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_score'])) $this->magic_vars['_U']['user_score'] = '';$_tmp = $this->magic_vars['_U']['user_score'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
        	<div class="user_right_border">
			<div class="l">�˻��ܶ</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['total'])) $this->magic_vars['_U']['user_result']['total'] = '';$_tmp = $this->magic_vars['_U']['user_result']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">�˻���</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['use_money'])) $this->magic_vars['_U']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_U']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['use_money'])) $this->magic_vars['_U']['user_result']['use_money'] = '';$_tmp = $this->magic_vars['_U']['user_result']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">�����ܶ</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['user_result']['no_use_money'])) $this->magic_vars['_U']['user_result']['no_use_money'] = '';$_tmp = $this->magic_vars['_U']['user_result']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ
			</div>
		</div>
		
		<div class="user_right_border"  style=" display:none;">
			<div class="l">���ֵ����У�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['account_bank_result']['bank'])) $this->magic_vars['_U']['account_bank_result']['bank'] = '';$_tmp = $this->magic_vars['_U']['account_bank_result']['bank'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?> <? if (!isset($this->magic_vars['_U']['account_bank_result']['branch'])) $this->magic_vars['_U']['account_bank_result']['branch'] = ''; echo $this->magic_vars['_U']['account_bank_result']['branch']; ?> <? if (!isset($this->magic_vars['_U']['account_bank_result']['account'])) $this->magic_vars['_U']['account_bank_result']['account'] = ''; echo $this->magic_vars['_U']['account_bank_result']['account']; ?> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">�������룺</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['account_bank_result']['paypassword'])) $this->magic_vars['_U']['account_bank_result']['paypassword']=''; ;if (  $this->magic_vars['_U']['account_bank_result']['paypassword']==""): ?><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>&q=code/user/paypwd"><font color="#FF0000">��������һ��֧������</font></a><? else: ?><input type="password" name="paypassword" /><? endif; ?>
			</div>
		</div>
		
	
		<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?>" />
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* ��ܰ��ʾ����ֹ���ÿ�����
		</div>
		
<script>
var use_money = <? if (!isset($this->magic_vars['_U']['user_score'])) $this->magic_vars['_U']['user_score'] = '';$_tmp = $this->magic_vars['_U']['user_score'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;

function check_form(){
	 var frm = document.forms['form1'];
	 var paypassword = frm.elements['paypassword'].value;
	 var money = frm.elements['money'].value;
	 var errorMsg = '';
	  if (paypassword.length == 0 ) {
		errorMsg += '���������Ľ�������' + '\n';
	  }
	  if (money.length == 0 ) {
		errorMsg += '��������Ķһ�����' + '\n';
	  }
	 if (money <100 || money >50000) {
		errorMsg += '�һ����Ҫ����100Ԫ����50000' + '\n';
	  }

	 if (money >use_money) {
		errorMsg += '���Ķһ����������еĿ���������' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>

		<!--���ֶһ� ����-->
				<? else: ?>
				
				<? $this->magic_vars['day7'] = time()-6*60*60*24;?>
				<? $this->magic_vars['nowtime'] = time();?>
				
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = '';$_tmp = $_REQUEST['dotime1']; if (!isset($this->magic_vars['day7'])) $this->magic_vars['day7'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['day7']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = '';$_tmp = $_REQUEST['dotime2']; if (!isset($this->magic_vars['nowtime'])) $this->magic_vars['nowtime'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['nowtime']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" id="dotime2" size="15" onclick="change_picktime()"/>   
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>	
		<? $data = array('user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
				<div style="line-height:30px; font-size:15px; font-weight:bold">�����ʽ�����</div>
				<div class="user_right_border">
					<div class="linvest">�˻��ܶ<strong>��<? if (!isset($this->magic_vars['var']['total'])) $this->magic_vars['var']['total'] = '';$_tmp = $this->magic_vars['var']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></strong></div>
					
					<div class="linvest">������<font color="#FF0000">��<? if (!isset($this->magic_vars['var']['use_money'])) $this->magic_vars['var']['use_money'] = '';$_tmp = $this->magic_vars['var']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></font></div>
					
					<div class="linvest">�������<? if (!isset($this->magic_vars['var']['no_use_money'])) $this->magic_vars['var']['no_use_money'] = '';$_tmp = $this->magic_vars['var']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					
				</div><div class="user_right_border">
					<div class="linvest">Ͷ�궳���ܶ��<? if (!isset($this->magic_vars['var']['tender'])) $this->magic_vars['var']['tender'] = '';$_tmp = $this->magic_vars['var']['tender'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">��ֵ�ɹ��ܶ��<? if (!isset($this->magic_vars['var']['recharge_success'])) $this->magic_vars['var']['recharge_success'] = '';$_tmp = $this->magic_vars['var']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">���ֳɹ��ܶ��<? if (!isset($this->magic_vars['var']['cash_success']['money'])) $this->magic_vars['var']['cash_success']['money'] = '';$_tmp = $this->magic_vars['var']['cash_success']['money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">���߳�ֵ�ܶ��<? if (!isset($this->magic_vars['var']['recharge_online'])) $this->magic_vars['var']['recharge_online'] = '';$_tmp = $this->magic_vars['var']['recharge_online'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">���³�ֵ�ܶ��<? if (!isset($this->magic_vars['var']['recharge_downline'])) $this->magic_vars['var']['recharge_downline'] = '';$_tmp = $this->magic_vars['var']['recharge_downline'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">�ֶ���ֵ�ܶ��<? if (!isset($this->magic_vars['var']['recharge_shoudong'])) $this->magic_vars['var']['recharge_shoudong'] = '';$_tmp = $this->magic_vars['var']['recharge_shoudong'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">�������ѣ���<? if (!isset($this->magic_vars['var']['fee'])) $this->magic_vars['var']['fee'] = ''; if (!isset($this->magic_vars['var']['recharge_fee'])) $this->magic_vars['var']['recharge_fee'] = '';$_tmp = $this->magic_vars['var']['fee']+$this->magic_vars['var']['recharge_fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">��ֵ�����ѣ���<? if (!isset($this->magic_vars['var']['fee'])) $this->magic_vars['var']['fee'] = '';$_tmp = $this->magic_vars['var']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">���������ѣ���<? if (!isset($this->magic_vars['var']['cash_success']['fee'])) $this->magic_vars['var']['cash_success']['fee'] = '';$_tmp = $this->magic_vars['var']['cash_success']['fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">��߶�ȣ���<? if (!isset($this->magic_vars['var']['amount'])) $this->magic_vars['var']['amount'] = '';$_tmp = $this->magic_vars['var']['amount'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">��Ͷ�ȣ���500</div>
					<div class="linvest">���ö�ȣ���<? if (!isset($this->magic_vars['var']['use_amount'])) $this->magic_vars['var']['use_amount'] = '';$_tmp = $this->magic_vars['var']['use_amount'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div style="line-height:30px; font-size:15px; font-weight:bold">Ͷ���ʽ�����</div>
			
				<div class="user_right_border">
					<div class="linvest">Ͷ���ܶ��<? if (!isset($this->magic_vars['var']['invest_account'])) $this->magic_vars['var']['invest_account'] = '';$_tmp = $this->magic_vars['var']['invest_account'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">����ܶ��<? if (!isset($this->magic_vars['var']['success_account'])) $this->magic_vars['var']['success_account'] = '';$_tmp = $this->magic_vars['var']['success_account'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">���������ܶ��<? if (!isset($this->magic_vars['var']['award_add'])) $this->magic_vars['var']['award_add'] = '';$_tmp = $this->magic_vars['var']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">�������ܶ��<? if (!isset($this->magic_vars['var']['collection_wait'])) $this->magic_vars['var']['collection_wait'] = '';$_tmp = $this->magic_vars['var']['collection_wait'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">�����ձ��𣺣�<? if (!isset($this->magic_vars['var']['collection_capital0'])) $this->magic_vars['var']['collection_capital0'] = '';$_tmp = $this->magic_vars['var']['collection_capital0'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">��������Ϣ����<? if (!isset($this->magic_vars['var']['collection_interest0'])) $this->magic_vars['var']['collection_interest0'] = '';$_tmp = $this->magic_vars['var']['collection_interest0'];$_tmp = $this->magic_modifier("round",$_tmp,"2");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">�ѻ����ܶ��<? if (!isset($this->magic_vars['var']['collection_yes'])) $this->magic_vars['var']['collection_yes'] = '';$_tmp = $this->magic_vars['var']['collection_yes'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">�ѻ��ձ��𣺣�<? if (!isset($this->magic_vars['var']['collection_capital1'])) $this->magic_vars['var']['collection_capital1'] = '';$_tmp = $this->magic_vars['var']['collection_capital1'];$_tmp = $this->magic_modifier("round",$_tmp,"0");$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">�ѻ�����Ϣ����<? if (!isset($this->magic_vars['var']['collection_interest1'])) $this->magic_vars['var']['collection_interest1'] = '';$_tmp = $this->magic_vars['var']['collection_interest1'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">��վ�渶�ܶ��<? if (!isset($this->magic_vars['var']['num_late_repay_account'])) $this->magic_vars['var']['num_late_repay_account'] = '';$_tmp = $this->magic_vars['var']['num_late_repay_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">���ڷ������룺��<? if (!isset($this->magic_vars['var']['late_collection'])) $this->magic_vars['var']['late_collection'] = '';$_tmp = $this->magic_vars['var']['late_collection'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">��ʧ��Ϣ�ܶ��<? if (!isset($this->magic_vars['var']['num_late_interes'])) $this->magic_vars['var']['num_late_interes'] = '';$_tmp = $this->magic_vars['var']['num_late_interes'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">����տ����ڣ�<? if (!isset($this->magic_vars['var']['collection_repaytime'])) $this->magic_vars['var']['collection_repaytime'] = '';$_tmp = $this->magic_vars['var']['collection_repaytime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div style="line-height:30px; font-size:15px; font-weight:bold">����ʽ�����</div>
			

				<div class="user_right_border">
					<div class="linvest">����ܶ��<? if (!isset($this->magic_vars['var']['borrow_num'])) $this->magic_vars['var']['borrow_num'] = '';$_tmp = $this->magic_vars['var']['borrow_num'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">�ѻ��ܶ��<? if (!isset($this->magic_vars['var']['borrow_num1'])) $this->magic_vars['var']['borrow_num1'] = '';$_tmp = $this->magic_vars['var']['borrow_num1'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">δ���ܶ��<? if (!isset($this->magic_vars['var']['wait_payment'])) $this->magic_vars['var']['wait_payment'] = '';$_tmp = $this->magic_vars['var']['wait_payment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">���������<? if (!isset($this->magic_vars['var']['borrow_times'])) $this->magic_vars['var']['borrow_times'] = '';$_tmp = $this->magic_vars['var']['borrow_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">���������<? if (!isset($this->magic_vars['var']['payment_times'])) $this->magic_vars['var']['payment_times'] = '';$_tmp = $this->magic_vars['var']['payment_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">����������<? if (!isset($this->magic_vars['var']['borrow_repay0'])) $this->magic_vars['var']['borrow_repay0'] = '';$_tmp = $this->magic_vars['var']['borrow_repay0'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
				</div>
				<div class="user_right_border">
					<div class="linvest">����������ڣ�<? if (!isset($this->magic_vars['var']['new_repay_time'])) $this->magic_vars['var']['new_repay_time'] = '';$_tmp = $this->magic_vars['var']['new_repay_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></div>
					<div class="linvest">���Ӧ�������<? if (!isset($this->magic_vars['var']['new_repay_account'])) $this->magic_vars['var']['new_repay_account'] = '';$_tmp = $this->magic_vars['var']['new_repay_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></div>
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
					<td>��<? if (!isset($this->magic_vars['var']['num'])) $this->magic_vars['var']['num'] = ''; echo $this->magic_vars['var']['num']; ?></td>
					<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				</tr>
		</table>
		-->
		<table  border="0"  cellspacing="1" class="user_list_table" width="300">
		<tr class="head"  width="300">
		<td>����</td>
		<td>�ɹ����+</td>
		<td>���������-</td>
		<td>��֤��-</td>
		<td>����-</td>
		<td>Ͷ��-</td>
		<td>�����ܶ�+</td>
		<td>Ͷ�꽱��+</td>
        <td>�տ�+</td>
		<td>����-</td>
		<td>��ֵ+</td>
		<td>����-</td>
		</tr>
			<? $this->magic_vars['query_type']='GetLogCount';$data = array('var'=>'var','dotime1'=>$_REQUEST['dotime1'],'dotime2'=>$_REQUEST['dotime2'],'user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['magic_result'] = accountClass::GetLogCount($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
				<tr  <? if (!isset($this->magic_vars['var']['i'])) $this->magic_vars['var']['i']=''; ;if (  $this->magic_vars['var']['i']%2==1): ?> class="tr1"<? endif; ?>>
				
					<td><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?></td>
					<td <? if (!isset($this->magic_vars['var']['borrow_success'])) $this->magic_vars['var']['borrow_success']=''; ;if (  $this->magic_vars['var']['borrow_success']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['borrow_success'])) $this->magic_vars['var']['borrow_success'] = '';$_tmp = $this->magic_vars['var']['borrow_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['borrow_fee'])) $this->magic_vars['var']['borrow_fee']=''; ;if (  $this->magic_vars['var']['borrow_fee']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['borrow_fee'])) $this->magic_vars['var']['borrow_fee'] = '';$_tmp = $this->magic_vars['var']['borrow_fee'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  <? if (!isset($this->magic_vars['var']['margin'])) $this->magic_vars['var']['margin']=''; ;if (  $this->magic_vars['var']['margin']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['margin'])) $this->magic_vars['var']['margin'] = '';$_tmp = $this->magic_vars['var']['margin'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  <? if (!isset($this->magic_vars['var']['award_lower'])) $this->magic_vars['var']['award_lower']=''; ;if (  $this->magic_vars['var']['award_lower']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['award_lower'])) $this->magic_vars['var']['award_lower'] = '';$_tmp = $this->magic_vars['var']['award_lower'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['tender'])) $this->magic_vars['var']['tender']=''; ;if (  $this->magic_vars['var']['tender']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['tender'])) $this->magic_vars['var']['tender'] = '';$_tmp = $this->magic_vars['var']['tender'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['collection'])) $this->magic_vars['var']['collection']=''; ;if (  $this->magic_vars['var']['collection']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['collection'])) $this->magic_vars['var']['collection'] = '';$_tmp = $this->magic_vars['var']['collection'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['award_add'])) $this->magic_vars['var']['award_add']=''; ;if (  $this->magic_vars['var']['award_add']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['award_add'])) $this->magic_vars['var']['award_add'] = '';$_tmp = $this->magic_vars['var']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
                    <td <? if (!isset($this->magic_vars['var']['invest_repayment'])) $this->magic_vars['var']['invest_repayment']=''; ;if (  $this->magic_vars['var']['invest_repayment']!=""): ?> style="color:#FF0000"<? endif; ?>> ��<? if (!isset($this->magic_vars['var']['invest_repayment'])) $this->magic_vars['var']['invest_repayment'] = '';$_tmp = $this->magic_vars['var']['invest_repayment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
                   
					<td <? if (!isset($this->magic_vars['var']['repayment'])) $this->magic_vars['var']['repayment']=''; ;if (  $this->magic_vars['var']['repayment']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['repayment'])) $this->magic_vars['var']['repayment'] = '';$_tmp = $this->magic_vars['var']['repayment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['recharge'])) $this->magic_vars['var']['recharge']=''; ;if (  $this->magic_vars['var']['recharge']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['recharge'])) $this->magic_vars['var']['recharge'] = '';$_tmp = $this->magic_vars['var']['recharge'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td <? if (!isset($this->magic_vars['var']['recharge_success'])) $this->magic_vars['var']['recharge_success']=''; ;if (  $this->magic_vars['var']['recharge_success']!=""): ?> style="color:#FF0000"<? endif; ?>>��<? if (!isset($this->magic_vars['var']['recharge_success'])) $this->magic_vars['var']['recharge_success'] = '';$_tmp = $this->magic_vars['var']['recharge_success'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					
				</tr>
				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				
		</table>	
			<? endif; ?>
	</div>
	<!--�ұߵ����� ����-->
</div>
<!--�û����ĵ�����Ŀ ����-->
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