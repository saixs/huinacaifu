<? $this->magic_include(array('file' => "admin_head.html.php", 'vars' => array()));?>

<!--վ������б���Թ�����б���ʼ-->
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class'] == "loop"): ?>
 <table  border="0"  cellspacing="1" bgcolor="#CCCCCC"  width="100%">
	  <form action="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/order" method="post" name="form1">
		<tr >
			<td width="" class="main_td" >ȫѡ</td>						
			<td width="" class="main_td" >ID</td>
			<td width="*" class="main_td">վ������</td>
			<th width="" class="main_td">ʶ��ID</th>
			<th width="" class="main_td">����Ȩ��</th>
			<th width="" class="main_td">����ģ��</th>
			<th width="" class="main_td">����</th>
			<td width="" class="main_td">����</td>
		</tr>
		<?  if(!isset($this->magic_vars['_G']['site_list']) || $this->magic_vars['_G']['site_list']=='') $this->magic_vars['_G']['site_list'] = array();  $_from = $this->magic_vars['_G']['site_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  id="id_<? if (!isset($this->magic_vars['item']['pid'])) $this->magic_vars['item']['pid'] = ''; echo $this->magic_vars['item']['pid']; ?>_<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>" <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==0): ?>class="tr2"<? endif; ?>>
			<td class="main_td1" align="center" width="40">
			<? if (!isset($this->magic_vars['item']['ppid'])) $this->magic_vars['item']['ppid']=''; ;if (  $this->magic_vars['item']['ppid']==1): ?>
			<a href="javascript:void(0);" onclick="change_tr('<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>','<? if (!isset($this->magic_vars['item']['pid'])) $this->magic_vars['item']['pid'] = ''; echo $this->magic_vars['item']['pid']; ?>');"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_open.gif" align="absmiddle" border="0" id="imgopen_<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>"  /><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_close.gif" align="absmiddle" border="0" id="imgclose_<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>"  style="display:none" /></a> 
			<? else: ?>
			<img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_no.gif" />
			<? endif; ?>
			<input type="hidden" value="<? if (!isset($this->magic_vars['item']['ppid'])) $this->magic_vars['item']['ppid'] = ''; echo $this->magic_vars['item']['ppid']; ?>" id="ppd_<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>" />
			</td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?></td>
			<td class="main_td1" align="left" ><? if (!isset($this->magic_vars['item']['aname'])) $this->magic_vars['item']['aname'] = ''; echo $this->magic_vars['item']['aname']; ?></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?></td>
			<td class="main_td1" align="center">
			
			<? if (!isset($this->magic_vars['_A']['admin_type_check'])) $this->magic_vars['_A']['admin_type_check'] = array();
 $_from =$this->magic_vars['_A']['admin_type_check'];
 $checked=isset($this->magic_vars['item']['rank'])?$this->magic_vars['item']['rank']:'';$kname=$this->magic_vars['key'];
 if (!is_array($checked)) $checked = explode(',',$checked);
 foreach ($_from as $key => $value):echo "<input type=checkbox value='$key' name='rank[$kname][]' "; if(isset($checked) && isset($checked) && in_array($key,$checked)){ echo ' checked '; };echo " >$value "; endforeach; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['module_name'])) $this->magic_vars['item']['module_name'] = ''; echo $this->magic_vars['item']['module_name']; ?></td>
			<td class="main_td1" align="center" ><input type="text" name="order[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']; ?>" size="3" /><input type="hidden" name="site_id[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>" /></td>
			<td class="main_td1" align="center" >
			<!--	<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/view&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>" target="_blank">Ԥ��</a> -->
			<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?><? if (!isset($this->magic_vars['site_url'])) $this->magic_vars['site_url'] = ''; echo $this->magic_vars['site_url']; ?>">����</a> <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/new&pid=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?><? if (!isset($this->magic_vars['site_url'])) $this->magic_vars['site_url'] = ''; echo $this->magic_vars['site_url']; ?>">���</a> <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/edit&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?><? if (!isset($this->magic_vars['site_url'])) $this->magic_vars['site_url'] = ''; echo $this->magic_vars['site_url']; ?>">�޸�</a> <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/move&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?><? if (!isset($this->magic_vars['site_url'])) $this->magic_vars['site_url'] = ''; echo $this->magic_vars['site_url']; ?>">�ƶ�</a> <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/del&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?><? if (!isset($this->magic_vars['site_url'])) $this->magic_vars['site_url'] = ''; echo $this->magic_vars['site_url']; ?>'">ɾ��</a></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
	<tr>
	<td colspan="8" class="submit" >
	<input type="submit" value="�޸�����" /> 
	</td>
</tr>		
</table>
<!--վ������б����Թ�����б�����-->
		
			
<!--վ������б������˶����Բ鿴����ʼ-->
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class'] == "list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC"  width="100%">
	<tr >					
		<td width="" class="main_td" >ID</td>
		<td width="*" class="main_td">վ������</td>
		<th width="" class="main_td">ʶ��ID</th>
		<th width="" class="main_td">����ģ��</th>
		<th width="" class="main_td">����</th>
	</tr>
	<?  if(!isset($this->magic_vars['_G']['site_list']) || $this->magic_vars['_G']['site_list']=='') $this->magic_vars['_G']['site_list'] = array();  $_from = $this->magic_vars['_G']['site_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr  id="id_<? if (!isset($this->magic_vars['item']['pid'])) $this->magic_vars['item']['pid'] = ''; echo $this->magic_vars['item']['pid']; ?>_<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>" <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==0): ?>class="tr2"<? endif; ?>>
		
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?></td>
		<td class="main_td1" align="left" ><? if (!isset($this->magic_vars['item']['aname'])) $this->magic_vars['item']['aname'] = ''; echo $this->magic_vars['item']['aname']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['module_name'])) $this->magic_vars['item']['module_name'] = ''; echo $this->magic_vars['item']['module_name']; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']; ?></td>
	
	</tr>
	<? endforeach; endif; unset($_from); ?>	
</table>
<!--վ������б������˶����Բ鿴������-->
			
<!--��Ӻ��޸�վ�� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']='';if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class'] == "new" ||  $this->magic_vars['_A']['query_class'] == "edit"): ?>
	<div class="module_add">
	
	<form action="" method="post" name="form1" onsubmit="return check_form()" enctype="multipart/form-data">
	<div class="module_title"><span><? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class']=="edit"): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>&q=site/new&pid=<? if (!isset($this->magic_vars['_A']['site_result']['site_id'])) $this->magic_vars['_A']['site_result']['site_id'] = ''; echo $this->magic_vars['_A']['site_result']['site_id']; ?>&a=loop">�����վ��</a>&nbsp;<? endif; ?></span><strong><? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>վ��</strong></div>
	<div class="module_border">
		<div class="l">����վ�㣺</div>
		<div class="c">
			<strong><? if (!isset($this->magic_vars['_A']['site_presult']['name'])) $this->magic_vars['_A']['site_presult']['name'] = '';$_tmp = $this->magic_vars['_A']['site_presult']['name']; if (!isset($this->magic_vars['_A']['site_result']['pname'])) $this->magic_vars['_A']['site_result']['pname'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['site_result']['pname']);$_tmp = $this->magic_modifier("default",$_tmp,"��Ŀ¼");echo $_tmp;unset($_tmp); ?>
				<input type="hidden" name="pid" value="<? if (!isset($this->magic_vars['_A']['site_presult']['site_id'])) $this->magic_vars['_A']['site_presult']['site_id'] = '';$_tmp = $this->magic_vars['_A']['site_presult']['site_id']; if (!isset($this->magic_vars['_A']['site_result']['pid'])) $this->magic_vars['_A']['site_result']['pid'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['site_result']['pid']);$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" /></strong>
		</div>
	</div>
	
	 <div class="module_border">
		<div class="l">վ������ ��</div>
		<div class="c">
			<input type="text" align="absmiddle" name="name" value="<? if (!isset($this->magic_vars['_A']['site_result']['name'])) $this->magic_vars['_A']['site_result']['name'] = ''; echo $this->magic_vars['_A']['site_result']['name']; ?>" /> <input type="checkbox" name="isurl" value="1" onclick="jump_url()"  <? if (!isset($this->magic_vars['result']['isurl'])) $this->magic_vars['result']['isurl']=''; ;if (  $this->magic_vars['result']['isurl']=="1"): ?> checked="checked"<? endif; ?>/>��תҳ
		</div>
	</div>
	
	<div class="module_border" style="display:<? if (!isset($this->magic_vars['result']['isurl'])) $this->magic_vars['result']['isurl']=''; ;if (  $this->magic_vars['result']['isurl']!="1"): ?>none<? endif; ?>" id="jump_url">
		<div class="l">��ת��ַ��</div>
		<div class="c">
			<input type="text" name="url"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['site_result']['url'])) $this->magic_vars['_A']['site_result']['url'] = ''; echo $this->magic_vars['_A']['site_result']['url']; ?>" size="30" />
		</div>
	</div>
	
	
	<div class="module_border" >
		<div class="l">�Զ������ӣ�</div>
		<div class="c">
			<input type="text" name="aurl"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['site_result']['aurl'])) $this->magic_vars['_A']['site_result']['aurl'] = ''; echo $this->magic_vars['_A']['site_result']['aurl']; ?>" size="30" />�˴ο�����Ϊ��վվ����Զ������ӹ������署ʦ����ֱ������site/peixun/teacher 
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">ʶ��ID(nid)��</div>
		<div class="c">
			<input type="text" align="absmiddle" name="nid"  onkeyup="value=value.replace(/[^a-zA-Z_0-9]/g,'')" value="<? if (!isset($this->magic_vars['_A']['site_result']['nid'])) $this->magic_vars['_A']['site_result']['nid'] = ''; echo $this->magic_vars['_A']['site_result']['nid']; ?>"/>ֻ��Ϊ ��ĸ���»��ߣ�_��
				
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">״&nbsp;&nbsp;&nbsp; ̬ ��</div>
		<div class="c">
			<input type="radio" value="0" name="status" <? if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']='';if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']=''; ;if (  $this->magic_vars['_A']['site_result']['status']==0 ||  $this->magic_vars['_A']['site_result']['status']==""): ?>checked="checked"<? endif; ?>/>����
			<input type="radio" value="1" name="status" <? if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']='';if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']=''; ;if (  $this->magic_vars['_A']['site_result']['status']==1 ||  $this->magic_vars['_A']['site_result']['status']==""): ?>checked="checked"<? endif; ?> />��ʾ
		</div>
	</div>
	
	
	<div class="module_border" >
		<div class="l">վ�����ͣ�</div>
		<div class="c">
			<input type="radio" value="0" name="style" <? if (!isset($this->magic_vars['_A']['site_result']['style'])) $this->magic_vars['_A']['site_result']['style']='';if (!isset($this->magic_vars['_A']['site_result']['style'])) $this->magic_vars['_A']['site_result']['style']=''; ;if (  $this->magic_vars['_A']['site_result']['style']==0 || $this->magic_vars['_A']['site_result']['style']==""): ?>checked="checked"<? endif; ?>/>�б�
			<input type="radio" value="1" name="style" <? if (!isset($this->magic_vars['_A']['site_result']['style'])) $this->magic_vars['_A']['site_result']['style']=''; ;if (  $this->magic_vars['_A']['site_result']['style']==1): ?>checked="checked"<? endif; ?>/>��ҳ����
		</div>
	</div>
	
				<!--
			   <div class="module_border">
		<div class="l">����Ȩ�ޣ�</div>
		<div class="c">
			
				<? if (!isset($this->magic_vars['config']['type'])) $this->magic_vars['config']['type']=''; ;if (  $this->magic_vars['config']['type']=='edit'): ?>
					<? if (!isset($this->magic_vars['pur'])) $this->magic_vars['pur'] = ''; echo $this->magic_vars['pur']; ?>
				<? else: ?>
				<?  if(!isset($this->magic_vars['rank']) || $this->magic_vars['rank']=='') $this->magic_vars['rank'] = array();  $_from = $this->magic_vars['rank']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<input type="checkbox" value="<? if (!isset($this->magic_vars['item']['rank'])) $this->magic_vars['item']['rank'] = ''; echo $this->magic_vars['item']['rank']; ?>" name="rank[}"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?> 
				 <? endforeach; endif; unset($_from); ?>
				 <? endif; ?>
		
				����ѡ���ʾ�����ƣ�
		</div>
	</div>
	
	
			  -->
	 <div class="module_border">
		<div class="l">����˳��</div>
		<div class="c">
				<input type="text" align="absmiddle" name="order"  onkeyup="value=value.replace(/[^0-9]/g,'')" size="5" value="<? if (!isset($this->magic_vars['_A']['site_result']['order'])) $this->magic_vars['_A']['site_result']['order'] = '';$_tmp = $this->magic_vars['_A']['site_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>"/>
		</div>
	</div>
	
	 <div class="module_border">
		<div class="l">����ģ�飺</div>
		<div class="c">
				<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class'] == "edit"): ?>
					<? if (!isset($this->magic_vars['_A']['site_result']['module_name'])) $this->magic_vars['_A']['site_result']['module_name'] = ''; echo $this->magic_vars['_A']['site_result']['module_name']; ?>
				<input type="hidden" name="code" value="<? if (!isset($this->magic_vars['_A']['site_result']['code'])) $this->magic_vars['_A']['site_result']['code'] = ''; echo $this->magic_vars['_A']['site_result']['code']; ?>" />
				<? else: ?>
				<select name="code" id="code" >
				<option value="" >��ѡ��ģ��</option>
				<?  if(!isset($this->magic_vars['_A']['module_list']) || $this->magic_vars['_A']['module_list']=='') $this->magic_vars['_A']['module_list'] = array();  $_from = $this->magic_vars['_A']['module_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<option value="<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>" ><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></option>
				<? endforeach; endif; unset($_from); ?>
				</select>
				<? endif; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����ģ�壺</div>
		<div class="c">
			<input name="index_tpl" type="text"  style="width:300px" value="<? if (!isset($this->magic_vars['_A']['site_result']['index_tpl'])) $this->magic_vars['_A']['site_result']['index_tpl'] = '';$_tmp = $this->magic_vars['_A']['site_result']['index_tpl'];$_tmp = $this->magic_modifier("default",$_tmp,"[code].html");echo $_tmp;unset($_tmp); ?>" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�б�ģ�壺</div>
		<div class="c">
			<input name="list_tpl" type="text"  style="width:300px" value="<? if (!isset($this->magic_vars['_A']['site_result']['list_tpl'])) $this->magic_vars['_A']['site_result']['list_tpl'] = '';$_tmp = $this->magic_vars['_A']['site_result']['list_tpl'];$_tmp = $this->magic_modifier("default",$_tmp,"[code]_list.html");echo $_tmp;unset($_tmp); ?>" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����ģ�壺</div>
		<div class="c">
			<input name="content_tpl" type="text"  style="width:300px" value="<? if (!isset($this->magic_vars['_A']['site_result']['content_tpl'])) $this->magic_vars['_A']['site_result']['content_tpl'] = '';$_tmp = $this->magic_vars['_A']['site_result']['content_tpl'];$_tmp = $this->magic_modifier("default",$_tmp,"[code]_content.html");echo $_tmp;unset($_tmp); ?>" />
		</div>
	</div>
			  
	<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class']=="edit"): ?>
	<div class="module_border">
		<div class="l">ģ���޸ģ�</div>
		<div class="c">
			 <input type="checkbox" value="1" name="update_all" />����վ��һ���޸� <input type="checkbox" value="1" name="update_brother" />ͬ��վ��һ���޸�
		</div>
	</div>
	 <? endif; ?>
	 
	<div class="module_border">
		<div class="l">�б���������</div>
		<div class="c">
			<input name="list_name" type="text"  style="width:300px" value="<? if (!isset($this->magic_vars['_A']['site_result']['list_name'])) $this->magic_vars['_A']['site_result']['list_name'] = '';$_tmp = $this->magic_vars['_A']['site_result']['list_name'];$_tmp = $this->magic_modifier("default",$_tmp,"index_[page].html");echo $_tmp;unset($_tmp); ?>" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">������������</div>
		<div class="c">
			<input name="content_name" type="text"  style="width:300px" value="<? if (!isset($this->magic_vars['_A']['site_result']['content_name'])) $this->magic_vars['_A']['site_result']['content_name'] = '';$_tmp = $this->magic_vars['_A']['site_result']['content_name'];$_tmp = $this->magic_modifier("default",$_tmp,"[id].html");echo $_tmp;unset($_tmp); ?>" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�ļ�����Ŀ¼��</div>
		<div class="c">
			<input name="sitedir" type="text"  style="width:300px" value="<? if (!isset($this->magic_vars['_A']['site_result']['sitedir'])) $this->magic_vars['_A']['site_result']['sitedir'] = '';$_tmp = $this->magic_vars['_A']['site_result']['sitedir'];$_tmp = $this->magic_modifier("default",$_tmp,"[nid]");echo $_tmp;unset($_tmp); ?>" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">����Ȩ�ޣ�</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['admin_type_check'])) $this->magic_vars['_A']['admin_type_check'] = array();
 $_from =$this->magic_vars['_A']['admin_type_check'];
 $checked=isset($this->magic_vars['_A']['site_result']['rank'])?$this->magic_vars['_A']['site_result']['rank']:'';$kname="";
 if (!is_array($checked)) $checked = explode(',',$checked);
 foreach ($_from as $key => $value):echo "<input type=checkbox value='$key' name='rank[]' "; if(isset($checked) && isset($checked) && in_array($key,$checked)){ echo ' checked '; };echo " >$value "; endforeach; ?> 
		</div>
	</div>
	<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class']=="new"): ?>
	<div class="module_border">
		<div class="l">Ŀ¼���λ�ã�</div>
		<div class="c">
			<input name="referpath" type="radio" value="parent" checked="chekced" />
              �ϼ�Ŀ¼
                            <input name="referpath" type="radio" value="cmspath" />
              CMS��Ŀ¼
		</div>
	</div>
	<? endif; ?>
	
	<div class="module_border">
		<div class="l">�ļ��������ͣ�</div>
		<div class="c">
			<input type="radio" name="visit_type" value="0" <? if (!isset($this->magic_vars['result']['visit_type'])) $this->magic_vars['result']['visit_type']='';if (!isset($this->magic_vars['result']['visit_type'])) $this->magic_vars['result']['visit_type']=''; ;if (  $this->magic_vars['result']['visit_type']==0 ||  $this->magic_vars['result']['visit_type']==""): ?> checked="checked"<? endif; ?>  title="�磺?3/1"/> ��̬���� <input type="radio" name="visit_type" value="1" <? if (!isset($this->magic_vars['result']['visit_type'])) $this->magic_vars['result']['visit_type']=''; ;if (  $this->magic_vars['result']['visit_type']==1): ?> checked="checked"<? endif; ?> title="�磺?article/dongtai/1.html"/> ����html���� ����ע�����ϵͳ����α��̬Ϊ�ǣ���α��̬������
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">title������</div>
		<div class="c">
			<textarea name="title" cols="40" rows="3" id="title"><? if (!isset($this->magic_vars['_A']['site_result']['title'])) $this->magic_vars['_A']['site_result']['title'] = ''; echo $this->magic_vars['_A']['site_result']['title']; ?></textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�ؼ��֣�</div>
		<div class="c">
			<textarea name="keywords" cols="40" rows="3" id="keywords"><? if (!isset($this->magic_vars['_A']['site_result']['keywords'])) $this->magic_vars['_A']['site_result']['keywords'] = ''; echo $this->magic_vars['_A']['site_result']['keywords']; ?></textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">վ��������</div>
		<div class="c">
			 <textarea name="description" cols="40" rows="3" id="textarea2"><? if (!isset($this->magic_vars['_A']['site_result']['description'])) $this->magic_vars['_A']['site_result']['description'] = ''; echo $this->magic_vars['_A']['site_result']['description']; ?></textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">վ��ͼƬ��</div>
		<div class="c">
			 <input type="file" name="litpic" size="30" class="input_border"/><? if (!isset($this->magic_vars['_A']['site_result']['litpic'])) $this->magic_vars['_A']['site_result']['litpic']=''; ;if (  $this->magic_vars['_A']['site_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['site_result']['litpic'])) $this->magic_vars['_A']['site_result']['litpic'] = ''; echo $this->magic_vars['_A']['site_result']['litpic']; ?>" target="_blank" title="��ͼƬ"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><? endif; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">վ�����ݣ�</div>
		<div class="c">
        <textarea name="content" style="width:640px;height:460px;visibility:hidden;">
<? if (!isset($this->magic_vars['_A']['site_result']['content'])) $this->magic_vars['_A']['site_result']['content'] = ''; echo $this->magic_vars['_A']['site_result']['content']; ?></textarea>
			
		</div>
	</div>
	
	<div class="module_submit">
		<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class'] == "edit"): ?><input type="hidden" value="<? if (!isset($_REQUEST['site_id'])) $_REQUEST['site_id'] = ''; echo $_REQUEST['site_id']; ?>"  name="site_id" /><? endif; ?>
		<input type="submit" value=" �� �� "  name="submit_ok" />&nbsp;&nbsp;
		<input name="reset" type="reset"  value=" �� �� " />
	</div>
			</form>
 </div>
  <script>
	var url = "<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site";
	
	$(function() {
		$("#code").change(function() {
			$.ajax({
			  url: url+"/module&code="+this.value,
			  cache: false,
			  success: function(html){
				var aa = html.split(",");
				$("input[name='index_tpl']").attr("value",aa[0]);
				$("input[name='list_tpl']").attr("value",aa[1]);
				$("input[name='content_tpl']").attr("value",aa[2]);
			  }
			}); 

		})
		;
	});
	</script>
  
  
 <!--��Ӻ��޸�վ�� ����--> 
  	
	
<!--�༭վ�� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class'] == "update"): ?>
	<div class="module_add">
	
	<form action="" method="post" name="form1" onsubmit="return check_form()" enctype="multipart/form-data">
	<div class="module_title"><strong>�༭վ��</strong></div>
	<div class="module_border">
		<div class="l">����վ�㣺</div>
		<div class="c">
			<strong><? if (!isset($this->magic_vars['_A']['site_presult']['name'])) $this->magic_vars['_A']['site_presult']['name'] = '';$_tmp = $this->magic_vars['_A']['site_presult']['name']; if (!isset($this->magic_vars['_A']['site_result']['pname'])) $this->magic_vars['_A']['site_result']['pname'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['site_result']['pname']);$_tmp = $this->magic_modifier("default",$_tmp,"��Ŀ¼");echo $_tmp;unset($_tmp); ?>
				<input type="hidden" name="pid" value="<? if (!isset($this->magic_vars['_A']['site_presult']['site_id'])) $this->magic_vars['_A']['site_presult']['site_id'] = '';$_tmp = $this->magic_vars['_A']['site_presult']['site_id']; if (!isset($this->magic_vars['_A']['site_result']['pid'])) $this->magic_vars['_A']['site_result']['pid'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['site_result']['pid']);$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" /></strong>
		</div>
	</div>
	
	 <div class="module_border">
		<div class="l">վ������ ��</div>
		<div class="c">
			<input type="text" align="absmiddle" name="name" value="<? if (!isset($this->magic_vars['_A']['site_result']['name'])) $this->magic_vars['_A']['site_result']['name'] = ''; echo $this->magic_vars['_A']['site_result']['name']; ?>" />
		</div>
	
	</div>
	
	
	<div class="module_border">
		<div class="l">ʶ��ID(nid)��</div>
		<div class="c">
			<input type="text" align="absmiddle" name="nid"  onkeyup="value=value.replace(/[^a-zA-Z_]/g,'')" value="<? if (!isset($this->magic_vars['_A']['site_result']['nid'])) $this->magic_vars['_A']['site_result']['nid'] = ''; echo $this->magic_vars['_A']['site_result']['nid']; ?>"/>ֻ��Ϊ ��ĸ���»��ߣ�_��
				
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">״&nbsp;&nbsp;&nbsp; ̬ ��</div>
		<div class="c">
			<input type="radio" value="0" name="status" <? if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']='';if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']=''; ;if (  $this->magic_vars['_A']['site_result']['status']==0 ||  $this->magic_vars['_A']['site_result']['status']==""): ?>checked="checked"<? endif; ?>/>����
			<input type="radio" value="1" name="status" <? if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']='';if (!isset($this->magic_vars['_A']['site_result']['status'])) $this->magic_vars['_A']['site_result']['status']=''; ;if (  $this->magic_vars['_A']['site_result']['status']==1 ||  $this->magic_vars['_A']['site_result']['status']==""): ?>checked="checked"<? endif; ?> />��ʾ
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">վ��ͼƬ��</div>
		<div class="c">
			 <input type="file" name="litpic" size="30" class="input_border"/><? if (!isset($this->magic_vars['_A']['site_result']['litpic'])) $this->magic_vars['_A']['site_result']['litpic']=''; ;if (  $this->magic_vars['_A']['site_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['site_result']['litpic'])) $this->magic_vars['_A']['site_result']['litpic'] = ''; echo $this->magic_vars['_A']['site_result']['litpic']; ?>" target="_blank" title="��ͼƬ"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><input type="checkbox" name="clearlitpic" value="1" /> ȥ��ͼƬ<? endif; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���ݣ�</div>
		<div class="c">
			<textarea name="content" style="width:640px;height:460px;visibility:hidden;">
<? if (!isset($this->magic_vars['_A']['site_result']['content'])) $this->magic_vars['_A']['site_result']['content'] = ''; echo $this->magic_vars['_A']['site_result']['content']; ?></textarea>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">title������</div>
		<div class="c">
			<textarea name="title" cols="40" rows="3" id="title"><? if (!isset($this->magic_vars['_A']['site_result']['title'])) $this->magic_vars['_A']['site_result']['title'] = ''; echo $this->magic_vars['_A']['site_result']['title']; ?></textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�ؼ��֣�</div>
		<div class="c">
			<textarea name="keywords" cols="40" rows="3" id="keywords"><? if (!isset($this->magic_vars['_A']['site_result']['keywords'])) $this->magic_vars['_A']['site_result']['keywords'] = ''; echo $this->magic_vars['_A']['site_result']['keywords']; ?></textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">վ��������</div>
		<div class="c">
			 <textarea name="description" cols="40" rows="3" id="textarea2"><? if (!isset($this->magic_vars['_A']['site_result']['description'])) $this->magic_vars['_A']['site_result']['description'] = ''; echo $this->magic_vars['_A']['site_result']['description']; ?></textarea>
		</div>
	</div>
	<div class="module_submit">
		<input type="hidden" value="<? if (!isset($_REQUEST['site_id'])) $_REQUEST['site_id'] = ''; echo $_REQUEST['site_id']; ?>"  name="site_id" />
		<input type="submit" value=" �� �� "  name="submit_ok" />&nbsp;&nbsp;
		<input name="reset" type="reset"  value=" �� �� " />
	</div>
			</form>
 </div>
 
  
 <!--��Ӻ��޸�վ�� ����--> 
 
 	
		  <? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class'] == "recycle"): ?>
			 <table  border="0"  width="100%" cellspacing="1"  bgcolor="#CCCCCC" >
				 
					<tr >
						<td  class="main_td" >վ��ID</td>
						<td width="*" class="main_td">վ������</td>
						<td  class="main_td">ʶ��ID</td>
						<td  class="main_td">����ģ��</td>
						<td class="main_td" width="30%">����</td>
					</tr>
					<?  if(!isset($this->magic_vars['result']) || $this->magic_vars['result']=='') $this->magic_vars['result'] = array();  $_from = $this->magic_vars['result']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
					<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==0): ?>class="tr2"<? endif; ?>>
						<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?></td>
						<td class="main_td1" align="left"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
						<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?></td>
						<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['module_name'])) $this->magic_vars['item']['module_name'] = ''; echo $this->magic_vars['item']['module_name']; ?></td>
						<td class="main_td1" align="center" >
							<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>">����</a> 
							<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/new&pid=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>">���</a> 
							<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/edit&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>" >�޸�</a> 
							<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/move&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>">�ƶ�</a> 
							<a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=site/del&site_id=<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>'">ɾ��</a>
						</td>
					</tr>
					<? endforeach; endif; unset($_from); ?>
	      </table>
		 
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class']=="move"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%" >
	<tr >
		<td align="left" bgcolor="#FFFFFF" class="main_td">&nbsp;&nbsp;�ƶ�վ��</td>
	</tr>
<form action="" method="post">
<tr><td bgcolor="#FFFFFF" align="left" class="main_td1">
<input name="site_id" type="hidden" value="<? if (!isset($this->magic_vars['_A']['site_result']['site_id'])) $this->magic_vars['_A']['site_result']['site_id'] = ''; echo $this->magic_vars['_A']['site_result']['site_id']; ?>" />
<font color="#FF0000">�ƶ�վ�㲻��ɾ��ԭ�������ݡ�</font>
</td></tr>
<tr><td bgcolor="#FFFFFF" align="left" class="main_td1">
<div style="width:170px; overflow:hidden; float:left" align="left">�ƶ���վ�㣺</div><? if (!isset($this->magic_vars['_A']['site_result']['name'])) $this->magic_vars['_A']['site_result']['name'] = ''; echo $this->magic_vars['_A']['site_result']['name']; ?>
<br />
<div style="width:170px; overflow:hidden; float:left"align="left">��ѡ��Ҫ�ƶ�����վ���£�</div><select name="pid">
<option value="0">��Ŀ¼</option>
<? $this->magic_vars['varlgnore'] = array();$this->magic_vars['varsite_id'] = array(); if(!isset($this->magic_vars['_G']['site_list'])) $this->magic_vars['_G']['site_list']= array(); $_from = $this->magic_vars['_G']['site_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from,'array'); } if (count($_from)):
 $i=0;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
 if ($this->magic_vars['var']['pid']!=''  && $this->magic_vars['var']['pid']==0 ): $this->magic_vars['key'] =$i?>
<option value="<? if (!isset($this->magic_vars['var']['site_id'])) $this->magic_vars['var']['site_id'] = ''; echo $this->magic_vars['var']['site_id']; ?>" <? if (!isset($this->magic_vars['result']['pid'])) $this->magic_vars['result']['pid']='';if (!isset($this->magic_vars['var']['site_id'])) $this->magic_vars['var']['site_id']=''; ;if (  $this->magic_vars['result']['pid'] ==  $this->magic_vars['var']['site_id']): ?> selected="selected"<? endif; ?> >-<? if (!isset($this->magic_vars['var']['aname'])) $this->magic_vars['var']['aname'] = ''; echo $this->magic_vars['var']['aname']; ?></option>
<? $i++;endif;endforeach; endif;  unset($_from);unset($_magic_vars);unset($this->magic_vars['lgnore']); ?>
</select>
</td></tr>
	<tr   >
		<td  bgcolor="#FFFFFF" >
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value=" �� �� " class="submitstyle" name="submit_ok" />&nbsp;&nbsp;
		<input name="reset" type="reset" class="submitstyle" value=" �� �� " />
		</td>
	</tr>
</table>
</form>
 <? endif; ?>
		
<? $this->magic_include(array('file' => "admin_foot.html", 'vars' => array()));?>

