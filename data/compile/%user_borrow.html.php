<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<!--�û����ĵ�����Ŀ ��ʼ-->
<script src="plugins/timepicker/WdatePicker.js" type="text/javascript"></script>
<div class="wrap950 ">
	<!--��ߵĵ��� ��ʼ-->
	<div class="user_left">
		<? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
	</div>
	<!--��ߵĵ��� ����-->
	
	<!--�ұߵ����� ��ʼ-->
	<div class="user_right">
		<div class="user_right_menu">
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="repayment" ||  $this->magic_vars['_U']['query_type']=="repaymentplan" ||  $this->magic_vars['_U']['query_type']=="loandetail" ||  $this->magic_vars['_U']['query_type']=="repaymentyes" ||  $this->magic_vars['_U']['query_type']=="repayment_view"): ?>
			<ul>
				<li class="title" >�������Ϣ</li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="repayment"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repayment">���ڻ���Ľ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="repaymentplan"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repaymentplan">������ϸ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="loandetail"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/loandetail">�����ϸ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="repaymentyes"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repaymentyes">�ѻ���Ľ��</a></li>
				<? if (!isset($_REQUEST['id'])) $_REQUEST['id']=''; ;if (  $_REQUEST['id']!=""): ?>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="repayment_view"): ?> class="current"<? endif; ?>>��Ļ�����Ϣ</li>
				<? endif; ?>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="succes" ||  $this->magic_vars['_U']['query_type']=="gathering" ||  $this->magic_vars['_U']['query_type']=="lenddetail" ||  $this->magic_vars['_U']['query_type']=="succesyes"): ?>
			<ul style="position: relative; left:10px;">
				<!--<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/succes">�ѳɹ�Ͷ�ʵĽ��</a></li>
				<li <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="wait"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/succes&type=wait">�����տ�Ľ��</a></li>-->
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $this->magic_vars['_U']['query_type']=="gathering" &&  $_REQUEST['status']==0): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/gathering&status=0">δ�տ���ϸ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $this->magic_vars['_U']['query_type']=="gathering" &&  $_REQUEST['status']==1): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/gathering&status=1">���տ���ϸ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="lenddetail"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/lenddetail">�����ϸ��</a></li>
				<li <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="yes"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/succes&type=yes">�ѻ���Ľ��</a></li>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (   $this->magic_vars['_U']['query_type']=="bid" ||  $this->magic_vars['_U']['query_type']=="appraisal" ||  $this->magic_vars['_U']['query_type']=="attention" ||   $this->magic_vars['_U']['query_type']=="tender_reply"): ?>
			<ul>
				<li class="title" >��ҪͶ��</li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="succes"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/succes&type=wait">�ѳɹ�Ͷ�ʵĽ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="bid"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/bid">����Ͷ��Ľ��</a></li>
				<!--<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="appraisal"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/appraisal">�ҵ�����</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="tender_reply"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_reply">����߻ظ�</a></li>-->
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="tender_vouch" ||  $this->magic_vars['_U']['query_type']=="tender_vouch_finish"): ?>
			<ul>
			<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="tender_vouch"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch">Ͷ��/���󵣱���</a></li>
			<li <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch_finish&status=0">�����еĵ�����</a></li>
			<li <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="1"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch_finish&status=1">�ѻ���ĵ�����</a></li></ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser" ||  $this->magic_vars['_U']['query_type']=="myuserrepay" ||  $this->magic_vars['_U']['query_type']=="myuser_account"): ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myuser">�ͻ�����</a></li>
				<li ><a href="index.php?user&q=code/user/myuser">�ҵĿͷ�</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="myuserrepay" ||  $this->magic_vars['_U']['query_type']=="myuser"): ?> class="current"<? endif; ?>><a href="index.php?user&q=code/borrow/myuser">�ͻ����</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="myuser_account"): ?> class="current"<? endif; ?>><a href="index.php?user&q=code/borrow/myuser_account">ͳ����Ϣ</a></li>
			</ul>
			<? else: ?>
			<ul>
				<li class="title" >��Ҫ���</li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="publish"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish">�����Ľ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="unpublish"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/unpublish">��δ�����Ľ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="repayment"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repayment">���ڻ���Ľ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="borrow_vouch"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/borrow_vouch">�����Ľ��</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="loanermsg"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/loanermsg">Ͷ���߻ظ�</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="limitapp"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/limitapp">�������</a></li>
			</ul>
			<? endif; ?>
		</div>
		
		<div class="user_right_main">
		
	
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="publish"): ?>
		<!--�����б� ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<td  >����</td>
					<td  >���(Ԫ)</td>
					<td  >������</td>
					<td  >����</td>
					<td  >����ʱ��</td>
					<td  >����</td>
					<td  >״̬</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','status'=>'0,1,2,4,5,6','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?> >
					<td width="70"  ><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?><a href="/liuzhuan/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>" target="_blank"><? else: ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>" target="_blank"><? endif; ?><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"12");echo $_tmp;unset($_tmp); ?></a></td>
					<td  ><? if (!isset($this->magic_vars['item']['is_vouch'])) $this->magic_vars['item']['is_vouch']=''; ;if (  $this->magic_vars['item']['is_vouch']==1): ?>������<? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;elseif (  $this->magic_vars['item']['is_liuzhuan']==1): ?>��ת��<? else: ?>��ͨ��<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>Ԫ</td>
					<td  ><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?> %</td>
					<td  ><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>��<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
					<td  ><div class="rate_bg floatl" align="left">
							<div class="rate_tiao" style=" width:<? if (!isset($this->magic_vars['item']['scale'])) $this->magic_vars['item']['scale'] = '';$_tmp = $this->magic_vars['item']['scale'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>%"></div>
						</div><span class="floatl"><? if (!isset($this->magic_vars['item']['scale'])) $this->magic_vars['item']['scale'] = ''; echo $this->magic_vars['item']['scale']; ?>%</span></td>
					<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>����������<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==1): ?><? if (!isset($this->magic_vars['item']['account_yes'])) $this->magic_vars['item']['account_yes']='';if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account']=''; ;if (  $this->magic_vars['item']['account_yes']== $this->magic_vars['item']['account']): ?>���������<? else: ?>����ļ��<? endif; ?><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>���ʧ��<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==3): ?>������<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==4): ?>�������ʧ��<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==5): ?>����<? endif; ?></td>
					<td>
                        <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>
                            <a href="#" onclick="javascript:if(confirm('ȷ��Ҫ���ش��б�')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cancel&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">����</a>
                        <? else: ?>
                            <? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?>
                            <? else: ?>
                                <? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?>
                                    <a href="#" onclick="javascript:if(confirm('ȷ��Ҫ���ش��б�')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/cancel&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">����</a>
                                <? else: ?>
                                    --
                                    <!--<a href="#" onclick="javascript:if(confirm('ȷ��Ҫɾ���˱���')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a>-->
                                <? endif; ?>
                            <? endif; ?>
                        <? endif; ?>
                    </td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		
		<!--�����б� ����-->
		
		
		<!--��δ���� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="unpublish"): ?>
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<td  >���(Ԫ)</td>
					<td  >������</td>
					<td  >����</td>
					<td  >����ʱ��</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','status'=>'-1','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td  ><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>(Ԫ)</td>
					<td  ><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?> %</td>
					<td  ><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>��<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
					<td  ><a href="/publish/main.html?article_id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�༭</a> <a href="#" onclick="javascript:if(confirm('ȷ��Ҫɾ�����б�')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--��δ���� ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="repayment" ||   $this->magic_vars['_U']['query_type']=="repaymentyes"): ?>
		<!--���ڻ���Ľ�� ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<td  >Э��</td>
					<td  >�����</td>
					<td  >������</td>
					<td  >��������</td>
					<td  >������Ϣ</td>
					<td  >�ѻ���Ϣ</td>
					<td  >δ����Ϣ</td>
					<td  >����</td>
				</tr><? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="repayment"): ?>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','type'=>'now','status'=>'6','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>"><a href="/<? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?>liuzhuan<? else: ?>invest<? endif; ?>/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
					<td  ><a href="/protocol/main.html?borrow_id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" target="_blank">�鿴Э��</a></td>
					<td  ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>(Ԫ)</td>
					<td  ><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?> %</td>
					<td  ><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>��<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����<? endif; ?> </td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_yesaccount'])) $this->magic_vars['item']['repayment_yesaccount'] = '';$_tmp = $this->magic_vars['item']['repayment_yesaccount'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_noaccount'])) $this->magic_vars['item']['repayment_noaccount'] = ''; echo $this->magic_vars['item']['repayment_noaccount']; ?></td>
					<td  ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repayment_view&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" target="_blank">������ϸ</a><?php global $magic;$magic->assign("nowtime",time());?><? if (!isset($this->magic_vars['item']['verify_time'])) $this->magic_vars['item']['verify_time']='';if (!isset($this->magic_vars['item']['valid_time'])) $this->magic_vars['item']['valid_time']='';if (!isset($this->magic_vars['nowtime'])) $this->magic_vars['nowtime']=''; ;if ( ( $this->magic_vars['item']['verify_time']+ $this->magic_vars['item']['valid_time']*24*60*60)< $this->magic_vars['nowtime']): ?> <? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="9" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
				<? else: ?>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','type'=>'yes','status'=>'3','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>"><a href="/invest/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
					<td  >�鿴Э��</td>
					<td  ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>(Ԫ)</td>
					<td  ><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?> %</td>
					<td  ><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>��<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����<? endif; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_yesaccount'])) $this->magic_vars['item']['repayment_yesaccount'] = '';$_tmp = $this->magic_vars['item']['repayment_yesaccount'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_noaccount'])) $this->magic_vars['item']['repayment_noaccount'] = ''; echo $this->magic_vars['item']['repayment_noaccount']; ?></td>
					<td  ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repayment_view&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" >������ϸ</a></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="9" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
				<? endif; ?>
			</form>	
		</table>
		<!--���ڻ���Ľ�� ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="repaymentplan"): ?>
		<!--������ϸ ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<td  >�ڼ���</td>
					<td  >Ӧ��������</td>
					<td  >����Ӧ����Ϣ</td>
					<td  >��Ϣ</td>
					<td  >���ɽ�</td>
					<td  >������Ϣ</td>
					<td  >��������</td>
					<td  >����״̬</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetRepaymentList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','order'=>'repayment_time','status'=>'0,2','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetRepaymentList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']+1; ?>/<? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['repayment_time'])) $this->magic_vars['item']['repayment_time'] = '';$_tmp = $this->magic_vars['item']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d ");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['interest'])) $this->magic_vars['item']['interest'] = ''; echo $this->magic_vars['item']['interest']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['forfeit'])) $this->magic_vars['item']['forfeit'] = ''; echo $this->magic_vars['item']['forfeit']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['late_interest'])) $this->magic_vars['item']['late_interest'] = ''; echo $this->magic_vars['item']['late_interest']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days'] = ''; echo $this->magic_vars['item']['late_days']; ?>��</td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>������<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>��վ�ȵ渶<? else: ?>�ѻ���<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']='';if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0 ||  $this->magic_vars['item']['status']==2): ?><a href="#" onclick="javascript:if(confirm('��ȷ��Ҫ�����˽����')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repay&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">����</a><? else: ?>-<? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--������ϸ ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuserrepay"): ?>
		<!--�ҵĿͻ� ��ʼ-->
		
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<td  >�ڼ���</td>
					<td  >�����û�</td>
					<td  >Ӧ��������</td>
					<td  >����Ӧ����Ϣ</td>
					<td  >��Ϣ</td>
					<td  >���ɽ�</td>
					<td  >������Ϣ</td>
					<td  >��������</td>
					<td  >����״̬</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetRepaymentList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>$_REQUEST['user_id'],'keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','kefu_userid'=>$this->magic_vars['_G']['user_id'],'dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','order'=>'repayment_time');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetRepaymentList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
					<td  ><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']+1; ?>/<? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?></td>
					<td  ><a href="/u/<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
					<td  ><? if (!isset($this->magic_vars['item']['repayment_time'])) $this->magic_vars['item']['repayment_time'] = '';$_tmp = $this->magic_vars['item']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['interest'])) $this->magic_vars['item']['interest'] = ''; echo $this->magic_vars['item']['interest']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['forfeit'])) $this->magic_vars['item']['forfeit'] = ''; echo $this->magic_vars['item']['forfeit']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['late_interest'])) $this->magic_vars['item']['late_interest'] = ''; echo $this->magic_vars['item']['late_interest']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days'] = ''; echo $this->magic_vars['item']['late_days']; ?>��</td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>������<? else: ?>�ѻ���<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?><a href="#" onclick="javascript:if(confirm('��ȷ��Ҫ�����˽����')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repay&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">����</a><? else: ?>-<? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�ҵĿͻ� ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="loandetail"): ?>
		<!--�����ϸ ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		Ͷ���ߣ�<input type="text" name="username" id="username" size="15" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >Ͷ���� </td>
					<td  >�����ܶ�</td>
					<td  >�����ܶ�</td>
					<td  >�ѻ���Ϣ</td>
					<td  >�ѻ����ɽ�</td>
					<td  >�����ܶ�</td>
					<td  >������Ϣ</td>
				</tr>
				<? $this->magic_vars['query_type']='GetTenderUserList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','username'=>isset($_REQUEST['username'])?$_REQUEST['username']:'','borrow_status'=>'3','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderUserList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td  ><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>

					<td  ><font color="#FF0000">��<? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></font></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_yesaccount'])) $this->magic_vars['item']['repayment_yesaccount'] = '';$_tmp = $this->magic_vars['item']['repayment_yesaccount'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_yesinterest'])) $this->magic_vars['item']['repayment_yesinterest'] = '';$_tmp = $this->magic_vars['item']['repayment_yesinterest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['forfeit'])) $this->magic_vars['item']['forfeit'] = '';$_tmp = $this->magic_vars['item']['forfeit'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['wait_account'])) $this->magic_vars['item']['wait_account'] = '';$_tmp = $this->magic_vars['item']['wait_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['wait_interest'])) $this->magic_vars['item']['wait_interest']=''; ;if (  $this->magic_vars['item']['wait_interest']>=0): ?><? if (!isset($this->magic_vars['item']['wait_interest'])) $this->magic_vars['item']['wait_interest'] = '';$_tmp = $this->magic_vars['item']['wait_interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?><? else: ?>0<? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�����ϸ ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="loanermsg"): ?>
		<!--Ͷ�������� ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		�����ڲ鿴����:<select name="status"> <option value="">���лظ�</option> <option value="0">���һظ�</option> <option value="1">�ѻظ�</option></select>
		<input value="����" type="submit" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >��ı���</td>
					<td  >������</td>
					<td  >��������</td>
					<td  >����ʱ��</td>
					<td  >����״̬</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td  ><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>(Ԫ)</td>
					<td  ><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?> %</td>
					<td  ><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?> ����</td>
					<td  ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--Ͷ�������� ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="limitapp"): ?>
		<!--������� ��ʼ-->
		<div class="user_main_title"> 
		�������ԭ����ÿ���������1��
		</div>
		<? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status']=''; ;if (  $this->magic_vars['_G']['user_result']['real_status']!=1): ?>
			<div align="center"><font color="#FF0000"><br />
<br />
<? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>�����㣺</font>�㻹û��ʵ����֤������<a href="/index.php?user&q=code/user/realname"><strong>����ʵ����֤</strong></a>��</div><br /><br /><br />

		<? else: ?>
		<? $data = array('user_id'=>'0','var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetAmountApplyOne($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
		<form action="" method="post">
		<div class="user_right_border">
			<div class="e">�����ߣ�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?>
			</div>
		</div>
		<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==2): ?>
		<div class="user_right_border">
			<div class="e"> ״̬��</div>
			<div class="c">
				���������
			</div>
		</div>
		<div class="user_right_border">
			<div class="e"> �������ͣ�</div>
			<div class="c">
				<? if (!isset($this->magic_vars['var']['type'])) $this->magic_vars['var']['type']=''; ;if (  $this->magic_vars['var']['type']=="vouch"): ?>Ͷ�ʵ������<? if (!isset($this->magic_vars['var']['type'])) $this->magic_vars['var']['type']=''; ;elseif (  $this->magic_vars['var']['type']=="borrowvouch"): ?>�������<? else: ?>������ö��<? endif; ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="e"> �����</div>
			<div class="c">
				<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="e">��ϸ˵����</div>
			<div class="c">
				<? if (!isset($this->magic_vars['var']['content'])) $this->magic_vars['var']['content'] = ''; echo $this->magic_vars['var']['content']; ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">�����ط������ϸ˵����</div>
			<div class="c">
			<? if (!isset($this->magic_vars['var']['remark'])) $this->magic_vars['var']['remark'] = ''; echo $this->magic_vars['var']['remark']; ?>
			</div>
		</div>
		
		<? else: ?>
		
		<div class="user_right_border">
			<div class="e"> �������ͣ�</div>
			<div class="c">
				<select name="type"><option value="credit" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="credit"): ?> selected="selected"<? endif; ?>>������ö��</option><option value="tender_vouch" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="tender_vouch"): ?> selected="selected"<? endif; ?>>Ͷ�ʵ������</option>
<option value="borrow_vouch" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="borrow_vouch"): ?> selected="selected"<? endif; ?>>�������</option>				
				</select>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e"> �����</div>
			<div class="c">
				<input type="text" name="account" value="" /> 
			</div>
		</div>
		
		
		<div class="user_right_border">
			<div class="e">��ϸ˵����</div>
			<div class="c">
				<textarea rows="5" cols="40" name="content"></textarea>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">�����ط������ϸ˵����</div>
			<div class="c">
			<textarea rows="5" cols="40" name="remark"></textarea>
			</div>
		</div>
		
		
		<div class="user_right_border">
			<div class="e"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		<? endif; ?>
		</form>
		
		<? unset($_magic_vars);unset($data); ?>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����ʱ��</td>
					<td  >��������</td>
					<td  >������(Ԫ)</td>
					<td  >ͨ�����(Ԫ)</td>
					<td  >��ע˵��</td>
					<td  >״̬</td>
					<td  >���ʱ��</td>
					<td  >��˱�ע</td>
				</tr>
				<? $this->magic_vars['query_type']='GetAmountApplyList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetAmountApplyList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td  ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td width="70"><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;if (  $this->magic_vars['item']['type']=="tender_vouch"): ?>Ͷ�ʵ������<? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;elseif (  $this->magic_vars['item']['type']=="borrow_vouch"): ?>�������<? else: ?>������ö��<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['newaccount'])) $this->magic_vars['item']['newaccount'] = ''; echo $this->magic_vars['item']['newaccount']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = ''; echo $this->magic_vars['item']['content']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>��˲�ͨ��<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==1): ?>���ͨ��<? else: ?>�������<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['verify_time'])) $this->magic_vars['item']['verify_time'] = '';$_tmp = $this->magic_vars['item']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?> </td>
					<td  ><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark'] = ''; echo $this->magic_vars['item']['verify_remark']; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<div class="user_right_foot">
		* ��ܰ��ʾ���������� ���������Ƿ���׼ �����һ���º�����ٴ����룬ÿ����ֻ������һ����������,����������ϵ
		</div>
		<!--������� ����-->
		<? endif; ?>
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="succes"): ?>
		<!--�ɹ�Ͷ�� ��ʼ-->
		<? $data = array('user_id'=>'0','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
		<div class="user_help">���ͳ�ƣ�����ܶ<? if (!isset($this->magic_vars['var']['success_account'])) $this->magic_vars['var']['success_account'] = '';$_tmp = $this->magic_vars['var']['success_account'];$_tmp = $this->magic_modifier("round",$_tmp,"0");echo $_tmp;unset($_tmp); ?> �����ܶ<? if (!isset($this->magic_vars['var']['collection_capital1'])) $this->magic_vars['var']['collection_capital1'] = '';$_tmp = $this->magic_vars['var']['collection_capital1'];$_tmp = $this->magic_modifier("round",$_tmp,"0");echo $_tmp;unset($_tmp); ?> δ���ܶ<? if (!isset($this->magic_vars['var']['collection_capital0'])) $this->magic_vars['var']['collection_capital0'] = '';$_tmp = $this->magic_vars['var']['collection_capital0'];$_tmp = $this->magic_modifier("round",$_tmp,"0");echo $_tmp;unset($_tmp); ?> ������Ϣ��<? if (!isset($this->magic_vars['var']['collection_interest1'])) $this->magic_vars['var']['collection_interest1'] = '';$_tmp = $this->magic_vars['var']['collection_interest1'];$_tmp = $this->magic_modifier("round",$_tmp,"0");echo $_tmp;unset($_tmp); ?> δ����Ϣ��<? if (!isset($this->magic_vars['var']['collection_interest0'])) $this->magic_vars['var']['collection_interest0'] = '';$_tmp = $this->magic_vars['var']['collection_interest0'];$_tmp = $this->magic_modifier("round",$_tmp,"0");echo $_tmp;unset($_tmp); ?> </div>
		<? unset($_magic_vars);unset($data); ?>
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywordss" id="keywordss" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch_finish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<td  >�����</td>
					<td  >����߻���</td>
					<td  >���(Ԫ)</td>
					<td  >������</td>
					<td  >����</td>
					<td  >Ͷ��ʱ��</td>
					<td  >Ӧ�ձ�Ϣ</td>
					<td  >������</td>
				</tr>
				<? $this->magic_vars['query_type']='GetBorrowSucces';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','type'=>$_REQUEST['type'],'user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetBorrowSucces($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><a href="/invest/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
					<td  ><a href="/index.php?user&q=code/message/sent&receive=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
					<td  ><? if (!isset($this->magic_vars['item']['credit'])) $this->magic_vars['item']['credit'] = '';$_tmp = $this->magic_vars['item']['credit'];$_tmp = $this->magic_modifier("credit",$_tmp,"");echo $_tmp;unset($_tmp); ?><? if (!isset($this->magic_vars['item']['credit'])) $this->magic_vars['item']['credit'] = ''; echo $this->magic_vars['item']['credit']; ?>��</td>
					<td  >��<? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?>%</td>
					<td  ><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>��<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����<? endif; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['tender_time'])) $this->magic_vars['item']['tender_time'] = '';$_tmp = $this->magic_vars['item']['tender_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['anum'])) $this->magic_vars['item']['anum'] = ''; echo $this->magic_vars['item']['anum']; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="11" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�ɹ�Ͷ�� ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="tender_vouch"): ?>
		<!--�ɹ����� ��ʼ-->
		
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>

					<td  >�����</td>
					<td  >����ܶ�</td>
					<td  >�������</td>
					<td  >��������</td>
					<td  >�����ܶ�</td>
					<td  >����ʱ��</td>
					<td  >״̬</td>
				</tr>
				<? $this->magic_vars['query_type']='GetVouchList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','type'=>$_REQUEST['type'],'user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetVouchList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
					<td  ><a href="/index.php?user&q=code/message/sent&receive=<? if (!isset($this->magic_vars['item']['borrow_username'])) $this->magic_vars['item']['borrow_username'] = ''; echo $this->magic_vars['item']['borrow_username']; ?>"><? if (!isset($this->magic_vars['item']['borrow_username'])) $this->magic_vars['item']['borrow_username'] = ''; echo $this->magic_vars['item']['borrow_username']; ?></a></td>
					
					<td  >��<? if (!isset($this->magic_vars['item']['borrow_account'])) $this->magic_vars['item']['borrow_account'] = ''; echo $this->magic_vars['item']['borrow_account']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['borrow_period'])) $this->magic_vars['item']['borrow_period'] = ''; echo $this->magic_vars['item']['borrow_period']; ?>����</td>
					<td  >��<? if (!isset($this->magic_vars['item']['award_account'])) $this->magic_vars['item']['award_account'] = ''; echo $this->magic_vars['item']['award_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?>�ɹ�<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?><font color="#FF0000">ʧ��</font><? else: ?>�����<? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="11" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--������ϸ ����-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="tender_vouch_finish"): ?>
		
 
</div>
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		�տ�ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywordss" id="keywordss" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch_finish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >�����</td>
					<td  >������</td>
					<td  >Ӧ������</td>
					<td  >�ڼ���/������</td>
					<td  >�ܶ�</td>
					<td  >�����ܶ�</td>
					<td  >����</td>
					<td  >��Ϣ</td>
					<td  >״̬</td>
				</tr>
				<? $this->magic_vars['query_type']='GetVouchRepayList';$data = array('var'=>'loop','showpage'=>'3','vouch_userid'=>$this->magic_vars['_G']['user_id'],'keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','borrow_status'=>'3','status'=>$_REQUEST['status'],'order'=>'repay_time');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetVouchRepayList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td  ><? if (!isset($this->magic_vars['item']['borrow_username'])) $this->magic_vars['item']['borrow_username'] = ''; echo $this->magic_vars['item']['borrow_username']; ?></td>
					<td  ><a href="/<? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?>liuzhuan<? else: ?>invest<? endif; ?>/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank" title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"13");echo $_tmp;unset($_tmp); ?></a></td>
					<td  ><? if (!isset($this->magic_vars['item']['repayment_time'])) $this->magic_vars['item']['repayment_time'] = '';$_tmp = $this->magic_vars['item']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']+1; ?>/<? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['capital'])) $this->magic_vars['item']['capital'] = ''; echo $this->magic_vars['item']['capital']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['interest'])) $this->magic_vars['item']['interest'] = ''; echo $this->magic_vars['item']['interest']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?><font color="#666666">�ѻ�</font><? else: ?><font color="#FF0000">δ��</font><? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--������ϸ ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="gathering"): ?>
		<? $data = array('user_id'=>'0','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['var'] = accountClass::GetAccountAll($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
		<!--�տ���ϸ ��ʼ-->
		<div class="user_help">
		<table style="width:98%">
			<tr>
			<td>Ͷ���ܶ��<? if (!isset($this->magic_vars['var']['tender_num'])) $this->magic_vars['var']['tender_num'] = '';$_tmp = $this->magic_vars['var']['tender_num'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>(�������ڵ�ͳ��) </td>
			<td>�����ܶ��<? if (!isset($this->magic_vars['var']['tender_yesnum'])) $this->magic_vars['var']['tender_yesnum'] = '';$_tmp = $this->magic_vars['var']['tender_yesnum'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>   </td>
			<td></td>
		</tr>
		<tr>
			<td>�����ܶ��<? if (!isset($this->magic_vars['var']['tender_wait'])) $this->magic_vars['var']['tender_wait'] = '';$_tmp = $this->magic_vars['var']['tender_wait'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
			<td>������Ϣ����<? if (!isset($this->magic_vars['var']['tender_wait_interest'])) $this->magic_vars['var']['tender_wait_interest'] = '';$_tmp = $this->magic_vars['var']['tender_wait_interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?> </td>
			<td>��׬��Ϣ����<? if (!isset($this->magic_vars['var']['tender_interest'])) $this->magic_vars['var']['tender_interest'] = '';$_tmp = $this->magic_vars['var']['tender_interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>  </td>
		</tr>
	</table>
		
    <? unset($_magic_vars);unset($data); ?>
 
</div>
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		�տ�ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywordss" id="keywordss" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch_finish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >������</td>
					<td  >Ӧ������</td>
					<td  >�����</td>
					<td  >�ڼ���/������</td>
					<td  >�տ��ܶ�</td>
					<td  >Ӧ�ձ���</td>
					<td  >Ӧ����Ϣ</td>
					<td  >������Ϣ</td>
					<td  >��������</td>
					<td  >״̬</td>
				</tr>
				<? $this->magic_vars['query_type']='GetCollectionList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','borrow_status'=>'3','status'=>$_REQUEST['status'],'order'=>'repay_time','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetCollectionList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td  ><a href="/<? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?>liuzhuan<? else: ?>invest<? endif; ?>/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank" title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"13");echo $_tmp;unset($_tmp); ?></a></td>
					<td  ><? if (!isset($this->magic_vars['item']['repay_time'])) $this->magic_vars['item']['repay_time'] = '';$_tmp = $this->magic_vars['item']['repay_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']+1; ?>/<? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repay_account'])) $this->magic_vars['item']['repay_account'] = ''; echo $this->magic_vars['item']['repay_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['capital'])) $this->magic_vars['item']['capital'] = ''; echo $this->magic_vars['item']['capital']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['interest'])) $this->magic_vars['item']['interest'] = ''; echo $this->magic_vars['item']['interest']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['late_interest'])) $this->magic_vars['item']['late_interest'] = '';$_tmp = $this->magic_vars['item']['late_interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td  ><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days'] = '';$_tmp = $this->magic_vars['item']['late_days'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>��</td>
					<td  ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?><font color="#666666">�ѻ�</font><? else: ?><font color="#FF0000">δ��</font><? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�տ���ϸ ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="lenddetail"): ?>
		<!--�����ϸ ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywordss" id="keywordss" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/tender_vouch_finish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >�����</td>
					<td  >����</td>
					<td  >����ܶ�</td>
					<td  >�����ܶ�</td>
					<td  >�����ܶ�</td>
					<td  >�����ܶ�</td>
					<td  >������Ϣ</td>
					<td  >������Ϣ</td>
                    <td>���״̬</td>
				</tr>
			<? $this->magic_vars['query_type']='GetTenderList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td  ><? if (!isset($this->magic_vars['item']['op_username'])) $this->magic_vars['item']['op_username'] = ''; echo $this->magic_vars['item']['op_username']; ?></td>
					<td  ><a title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>" href="/<? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?>liuzhuan<? else: ?>invest<? endif; ?>/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"8");echo $_tmp;unset($_tmp); ?></a></td>
					<td  >��<? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_yesaccount'])) $this->magic_vars['item']['repayment_yesaccount'] = ''; echo $this->magic_vars['item']['repayment_yesaccount']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['wait_account'])) $this->magic_vars['item']['wait_account'] = ''; echo $this->magic_vars['item']['wait_account']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['repayment_yesinterest'])) $this->magic_vars['item']['repayment_yesinterest'] = ''; echo $this->magic_vars['item']['repayment_yesinterest']; ?></td>
					<td  >��<? if (!isset($this->magic_vars['item']['wait_interest'])) $this->magic_vars['item']['wait_interest'] = ''; echo $this->magic_vars['item']['wait_interest']; ?></td>
                    <td>
                        <? if (!isset($this->magic_vars['item']['borrow_status'])) $this->magic_vars['item']['borrow_status']=''; ;if (  $this->magic_vars['item']['borrow_status'] == 1): ?>
                            <? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account']='';if (!isset($this->magic_vars['item']['account_yes'])) $this->magic_vars['item']['account_yes']=''; ;if (  $this->magic_vars['item']['account'] >  $this->magic_vars['item']['account_yes']): ?> δ���� <? else: ?> �ȳ��� <? endif; ?>
                        <? if (!isset($this->magic_vars['item']['borrow_status'])) $this->magic_vars['item']['borrow_status']=''; ;elseif (  $this->magic_vars['item']['borrow_status'] == 3): ?>
                        ��Ч
                        <? if (!isset($this->magic_vars['item']['borrow_status'])) $this->magic_vars['item']['borrow_status']=''; ;elseif (  $this->magic_vars['item']['borrow_status'] == 4): ?>
                        ����δͨ��
                        <? if (!isset($this->magic_vars['item']['borrow_status'])) $this->magic_vars['item']['borrow_status']=''; ;elseif (  $this->magic_vars['item']['borrow_status'] == 5): ?>
                        �ѳ���
                        <? if (!isset($this->magic_vars['item']['borrow_status'])) $this->magic_vars['item']['borrow_status']=''; ;elseif (  $this->magic_vars['item']['borrow_status'] == null): ?>
                        �����Ϣ��ɾ��
                        <? endif; ?>
                    </td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�����ϸ ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="bid"): ?>
		<!--����Ͷ��Ľ�� ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<td  >�����</td>
                    <td>Э����</td>
					<td  >Ͷ��/��Ч���</td>
					<td  >���û���/Ͷ��ʱ�� </td>
					<td  >����</td>
					<td  >״̬ </td>
				</tr>
				<? $this->magic_vars['query_type']='GetTenderList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','borrow_status'=>'1','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td style="line-height:21px;"><a href="/<? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?>liuzhuan<? else: ?>invest<? endif; ?>/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank" title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a> </td>
					<td  style="line-height:21px;">�����:<? if (!isset($this->magic_vars['item']['op_username'])) $this->magic_vars['item']['op_username'] = ''; echo $this->magic_vars['item']['op_username']; ?></td>
                    <td  style="line-height:21px;"><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?><a href="protocol2/main.html?borrow_id=<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" target="_blank">Э����</a><? else: ?><a href="protocol/main.html?borrow_id=<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" target="_blank">Э����</a><? endif; ?></td>
					<td style="line-height:21px;">Ͷ����:��<? if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money'] = ''; echo $this->magic_vars['item']['money']; ?><br />��Ч���:<font color="#FF0000">��<? if (!isset($this->magic_vars['item']['tender_account'])) $this->magic_vars['item']['tender_account'] = ''; echo $this->magic_vars['item']['tender_account']; ?></font></td>
					
					<td style="line-height:25px;"><span><img src="<? if (!isset($this->magic_vars['_G']['system']['con_credit_picurl'])) $this->magic_vars['_G']['system']['con_credit_picurl'] = ''; echo $this->magic_vars['_G']['system']['con_credit_picurl']; ?><? if (!isset($this->magic_vars['item']['credit_pic'])) $this->magic_vars['item']['credit_pic'] = ''; echo $this->magic_vars['item']['credit_pic']; ?>" title="<? if (!isset($this->magic_vars['item']['credit_jifen'])) $this->magic_vars['item']['credit_jifen'] = ''; echo $this->magic_vars['item']['credit_jifen']; ?>��"  /></span><br /><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
					
					<td style="line-height:21px;"><div class="rate_bg floatl" align="left">
							<div class="rate_tiao" style=" width:<? if (!isset($this->magic_vars['item']['scale'])) $this->magic_vars['item']['scale'] = '';$_tmp = $this->magic_vars['item']['scale'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>%"></div>
						</div><span class="floatl"><? if (!isset($this->magic_vars['item']['scale'])) $this->magic_vars['item']['scale'] = ''; echo $this->magic_vars['item']['scale']; ?>%</span></td>
					<td style="line-height:21px;"><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>Ͷ��ʧ��<? else: ?><? if (!isset($this->magic_vars['item']['tender_account'])) $this->magic_vars['item']['tender_account']='';if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money']=''; ;if (  $this->magic_vars['item']['tender_account']== $this->magic_vars['item']['money']): ?>ȫ��ͨ��<? else: ?>����ͨ��<? endif; ?><? endif; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="10" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
				
			</form>	
		</table>
		<!--����Ͷ��Ľ�� ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="appraisal"): ?>
		<!--�ҵ����� ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;">
		����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����      </td>
					<td  >�����</td>
					<td  >Ͷ����</td>
					<td  >���ʱ��</td>
					<td  >���۽��</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td ><strong>���ڽ���ǰ����</strong> </td>
					<td  >op6778</td>
					<td><img src="/pic/rank_4.gif" /></td>
					<td  >18%</td>
					<td  >1����</td>
					<td  >50</td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�ҵ����� ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="attention"): ?>
		<!--�ҹ�ע�Ľ�� ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		<select><option>�����еĽ��</option><option>�ѽ����Ľ��</option></select> ����ʱ�䣺<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = ''; echo $_REQUEST['dotime1']; ?>" size="15" onclick="change_picktime()"/> �� <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = ''; echo $_REQUEST['dotime2']; ?>" id="dotime2" size="15" onclick="change_picktime()"/>  �ؼ��֣�<input type="text" name="keywords" id="keywords" size="15" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /> 
		<input value="����" type="submit" onclick="sousuo('<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/publish')" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >ͼƬ                  </td>
					<td  >����</td>
					<td  >���(Ԫ)</td>
					<td  >����</td>
					<td  >����</td>
					<td  >���õȼ�</td>
					<td  >����</td>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td ><strong>���ڽ���ǰ����</strong> </td>
					<td  >op6778</td>
					<td><img src="/pic/rank_4.gif" /></td>
					<td  >18%</td>
					<td  >1����</td>
					<td  >50</td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�ҹ�ע�Ľ�� ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="tender_reply"): ?>
		<!--Ͷ�������� ��ʼ-->
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		�����ڲ鿴����:<select name="status"> <option value="">���лظ�</option> <option value="0">���һظ�</option> <option value="1">�ѻظ�</option></select>
		<input value="����" type="submit" />
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >��ı���</td>
					<td  >������</td>
					<td  >��������</td>
					<td  >����ʱ��</td>
					<td  >����״̬</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>'0','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td ><strong>���ڽ���ǰ����</strong> </td>
					<td  >op6778</td>
					<td><img src="/pic/rank_4.gif" /></td>
					<td  >18%</td>
					<td  >1����</td>
					<td  >50</td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="8" class="page">
						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--Ͷ�������� ����-->
		
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser"): ?>
		<!--�ҵĿͻ� ����-->
		<div class="user_help" > 
		<? $this->magic_vars['query_type']='GetMyuserList';$data = array('var'=>'loop','user_id'=>'0','showpage'=>'3','epage'=>'20','suser_id'=>$_REQUEST['user_id'],'user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetMyuserList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
			
		<strong>�ܽ������</strong> <? if (!isset($this->magic_vars['loop']['total'])) $this->magic_vars['loop']['total'] = ''; echo $this->magic_vars['loop']['total']; ?> ��
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >�û���</td>
					<td  >��ʵ����</td>
					<td  >����</td>
					<td  >�����</td>
					<td  >���ʱ��</td>
					<td  >�ɹ����ʱ��</td>
					<td  >״̬</td>
				</tr>
					<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><a href="/u/<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
					<td><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myuser&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>"><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></a> </td>
					<td><a href="/invest/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></a></td>
					<td>��<? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['success_time'])) $this->magic_vars['item']['success_time'] = '';$_tmp = $this->magic_vars['item']['success_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==5): ?>ȡ��<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==3): ?>���ɹ�<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>���ʧ��<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==4): ?>�������ʧ��<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==1): ?>�����б���<? endif; ?></td>
				</tr>
				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				<tr >
					<td colspan="8" class="page">
						<div class="list_table_page"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
					</td>
				</tr>
			</form>	
		</table>
		<? unset($_magic_vars); ?>
		<!--�ҵĿͻ� ����-->
		
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser_account"): ?>
		<!--�ҵĿͻ�ͳ�� ����-->
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >ʱ��</td>
					<td  >�ɹ����</td>
					<td  >�ɹ�Ͷ��</td>
					<td  >VIP��</td>
				</tr>
					<? $this->magic_vars['query_type']='GetMyuserAcount';$data = array('var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetMyuserAcount($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
				<tr >
					<td><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = '';$_tmp = $this->magic_vars['key'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['var']['borrow'])) $this->magic_vars['var']['borrow'] = '';$_tmp = $this->magic_vars['var']['borrow'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['var']['tender'])) $this->magic_vars['var']['tender'] = '';$_tmp = $this->magic_vars['var']['tender'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['var']['vip'])) $this->magic_vars['var']['vip'] = '';$_tmp = $this->magic_vars['var']['vip'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>��</td>
				</tr>
				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
			</form>	
		</table>
		<? unset($_magic_vars); ?>
		<!--�ҵĿͻ�ͳ�� ����-->
		
		
		
		<!--������ϸ ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="repayment_view"): ?>
		<div class="user_right_border">
			<div class="l">���⣺</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['borrow_result']['name'])) $this->magic_vars['_U']['borrow_result']['name'] = ''; echo $this->magic_vars['_U']['borrow_result']['name']; ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"> ����</div>
			<div class="rb">
				<font color="#FF0000"><strong>��<? if (!isset($this->magic_vars['_U']['borrow_result']['account'])) $this->magic_vars['_U']['borrow_result']['account'] = ''; echo $this->magic_vars['_U']['borrow_result']['account']; ?></strong></font>
			</div>
			<div class="l"> ������ʣ�</div>
			<div class="rb">
				 <? if (!isset($this->magic_vars['_U']['borrow_result']['apr'])) $this->magic_vars['_U']['borrow_result']['apr'] = ''; echo $this->magic_vars['_U']['borrow_result']['apr']; ?>%
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"> ������ޣ�</div>
			<div class="rb">
				 <? if (!isset($this->magic_vars['_U']['borrow_result']['isday'])) $this->magic_vars['_U']['borrow_result']['isday']=''; ;if (  $this->magic_vars['_U']['borrow_result']['isday'] ==1): ?><? if (!isset($this->magic_vars['_U']['borrow_result']['time_limit_day'])) $this->magic_vars['_U']['borrow_result']['time_limit_day'] = ''; echo $this->magic_vars['_U']['borrow_result']['time_limit_day']; ?>��<? else: ?><? if (!isset($this->magic_vars['_U']['borrow_result']['time_limit'])) $this->magic_vars['_U']['borrow_result']['time_limit'] = ''; echo $this->magic_vars['_U']['borrow_result']['time_limit']; ?>����<? endif; ?>
			</div>
			<div class="l"> ���ʽ��</div>
			<div class="rb">
				 <? if (!isset($this->magic_vars['_U']['borrow_result']['style'])) $this->magic_vars['_U']['borrow_result']['style'] = '';$_tmp = $this->magic_vars['_U']['borrow_result']['style'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_style");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"> ����ʱ�䣺</div>
			<div class="rb">
				 <? if (!isset($this->magic_vars['_U']['borrow_result']['addtime'])) $this->magic_vars['_U']['borrow_result']['addtime'] = '';$_tmp = $this->magic_vars['_U']['borrow_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="l"> ���ʱ�䣺</div>
			<div class="rb">
				 <? if (!isset($this->magic_vars['_U']['borrow_result']['verify_time'])) $this->magic_vars['_U']['borrow_result']['verify_time'] = '';$_tmp = $this->magic_vars['_U']['borrow_result']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<!--
		<div class="user_right_border">
			<div class="l"> �´λ���ʱ�䣺</div>
			<div class="rb">
				 <? if (!isset($this->magic_vars['_U']['borrow_result']['username'])) $this->magic_vars['_U']['borrow_result']['username'] = ''; echo $this->magic_vars['_U']['borrow_result']['username']; ?>
			</div>
			<div class="l"> �´λ����</div>
			<div class="rb">
				 <? if (!isset($this->magic_vars['_U']['user_result']['username'])) $this->magic_vars['_U']['user_result']['username'] = ''; echo $this->magic_vars['_U']['user_result']['username']; ?>
			</div>
		</div>
		-->
		<!--������ϸ ����-->
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >���</td>
					<td  >�ƻ�������</td>
					<td  >�ƻ����Ϣ</td>
					<td  >ʵ������</td>
					<td  >ʵ����Ϣ</td>
					<td  >���ڷ�Ϣ</td>
					<td  >��������</td>
					<td  >״̬</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetRepaymentList';$data = array('id'=>isset($_REQUEST['id'])?$_REQUEST['id']:'','limit'=>'all','order'=>'order','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetRepaymentList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
			
				<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
					<td ><? if (!isset($this->magic_vars['var']['order'])) $this->magic_vars['var']['order'] = ''; echo $this->magic_vars['var']['order']+1; ?></td>
					<td><? if (!isset($this->magic_vars['var']['repayment_time'])) $this->magic_vars['var']['repayment_time'] = '';$_tmp = $this->magic_vars['var']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['var']['repayment_account'])) $this->magic_vars['var']['repayment_account'] = ''; echo $this->magic_vars['var']['repayment_account']; ?></td>
					<td><? if (!isset($this->magic_vars['var']['repayment_yestime'])) $this->magic_vars['var']['repayment_yestime'] = '';$_tmp = $this->magic_vars['var']['repayment_yestime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
					<td>��<? if (!isset($this->magic_vars['var']['repayment_yesaccount'])) $this->magic_vars['var']['repayment_yesaccount'] = ''; echo $this->magic_vars['var']['repayment_yesaccount']; ?></td>
					<td>��<? if (!isset($this->magic_vars['var']['late_interest'])) $this->magic_vars['var']['late_interest'] = '';$_tmp = $this->magic_vars['var']['late_interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['var']['late_days'])) $this->magic_vars['var']['late_days'] = '';$_tmp = $this->magic_vars['var']['late_days'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>��</td>
					<td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==1): ?>�ѻ�<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==2): ?>���ϵ渶<? else: ?>������<? endif; ?></td>
					<td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==1): ?>-<? else: ?><a href="#" onclick="javascript:if(confirm('��ȷ��Ҫ�����˽����')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/repay&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>'">����</a><? endif; ?></td>
				</tr>
				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
			</form>	
		</table>
		<div class="user_right_foot">ע�����С�(Ԥ��)����ǵĽ��˵���ý���ʵ�ʻ���Ľ���ֻ�Ǽ����Ե�ǰʱ��Ϊ����ʱ���������û���Ҫ�����ٽ� ���ջ���������ʵ�ʻ�����Ϊ׼����ΪԤ�ƵĽ���ʵ�ʻ���Ľ����ܻ��������졣 һ����ȫ��彫��֧���¸��µ���Ϣ������¼����״̬�������ӻ�����֡�
		</div>
		<? endif; ?>
		<div id="s"></div>
		<script>
var url = "<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type'] = ''; echo $this->magic_vars['_U']['query_type']; ?>";

function sousuo(){
	var _url = "";
	var username=null;
	var dotime1 = document.getElementById("dotime1").value;
	var keywords = document.getElementById("keywordss").value;
	//var username = document.getElementById("username").value;
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
	window.location.href=url+_url;
}

</script>

</div>
</div>
</div>
</div>
<!--�û����ĵ�����Ŀ ����-->
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>