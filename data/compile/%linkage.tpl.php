<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_action" method="post">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">��������</td>
		<td class="main_td">��ʾ��</td>
		<td class="main_td">����</td>
		<td class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['linkage_list']) || $this->magic_vars['_A']['linkage_list']=='') $this->magic_vars['_A']['linkage_list'] = array();  $_from = $this->magic_vars['_A']['linkage_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center" width="50"><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td class="main_td1" align="center" width="250"><input type="text" value="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>" name="name[]" /></td>
		<td class="main_td1" align="center" width="*"><? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?></td>
		<td class="main_td1" align="center" ><input type="text" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = '';$_tmp = $this->magic_vars['item']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" name="order[]" size="5" /><input type="hidden" name="id[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" /></td>
		<td class="main_td1" align="center" width="130"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/new&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">����</a> / <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_edit&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�޸�</a> / <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr >
		<td colspan="8"  class="page">
			<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
		</td>
	</tr>
	<tr >
		<td colspan="8"  class="submit">
			<input type="submit" name="submit" value="�޸�����" />
		</td>
	</tr>
	</form>	
</table>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/actions" method="post">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">��������</td>
		<td class="main_td">������</td>
		<td class="main_td">����ֵ</td>
		<td class="main_td">����</td>
		<td class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['linkage_list']) || $this->magic_vars['_A']['linkage_list']=='') $this->magic_vars['_A']['linkage_list'] = array();  $_from = $this->magic_vars['_A']['linkage_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['_A']['linkage_type_result']['name'])) $this->magic_vars['_A']['linkage_type_result']['name'] = ''; echo $this->magic_vars['_A']['linkage_type_result']['name']; ?></td>
		<td class="main_td1" align="center"><input type="text" value="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>" name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" value="<? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = ''; echo $this->magic_vars['item']['value']; ?>" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = '';$_tmp = $this->magic_vars['item']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" name="order[]" size="5" /><input type="hidden" name="id[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" /></td>
		<td class="main_td1" align="center" width="130"><!--<a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/subnew&id=<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>&pid=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">����</a> /--> <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
<tr >
	<td colspan="6"  class="submit">
		<input type="submit" name="submit" value="�޸�����" />
	</td>
</tr>
</form>	
</table>

<div class="module_add">
<form name="form1" method="post" action="" onsubmit="return check_form()" >
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?> (<? if (!isset($this->magic_vars['_A']['linkage_type_result']['name'])) $this->magic_vars['_A']['linkage_type_result']['name'] = ''; echo $this->magic_vars['_A']['linkage_type_result']['name']; ?>) �����µ�����</strong></div>
	
	<div class="module_border">
		<div class="l">�������</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['linkage_type_result']['name'])) $this->magic_vars['_A']['linkage_type_result']['name'] = ''; echo $this->magic_vars['_A']['linkage_type_result']['name']; ?>
		</div>
	</div>

	<div class="module_border">
		<div class="l">���������ƣ�</div>
		<div class="c">
			<input type="text" name="name"  value="<? if (!isset($this->magic_vars['_A']['linkage_result']['name'])) $this->magic_vars['_A']['linkage_result']['name'] = ''; echo $this->magic_vars['_A']['linkage_result']['name']; ?>"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">������ֵ��</div>
		<div class="c">
			<input type="text" name="value"  value="<? if (!isset($this->magic_vars['_A']['linkage_result']['value'])) $this->magic_vars['_A']['linkage_result']['value'] = ''; echo $this->magic_vars['_A']['linkage_result']['value']; ?>" /> ���ֵ��д����Ϊ����������
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����</div>
		<div class="c">
			<input type="text" name="order"  value="<? if (!isset($this->magic_vars['_A']['linkage_result']['order'])) $this->magic_vars['_A']['linkage_result']['order'] = '';$_tmp = $this->magic_vars['_A']['linkage_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" onkeyup="value=value.replace(/[^0-9]/g,'')"/>
		</div>
	</div>
	
	<div class="module_submit" >
		<input type="hidden" name="pid" value="<? if (!isset($_REQUEST['pid'])) $_REQUEST['pid'] = '';$_tmp = $_REQUEST['pid'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" />
		<input type="hidden" name="type_id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" />
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
</form>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/actions" method="post">
	<tr >
		<td class="main_td" colspan="6" align="left">&nbsp;�������</td>
	</tr>
	<tr  class="tr2">
		<td class="main_td1" align="center">����</td>
		<td class="main_td1" align="center">ֵ</td>
		<td class="main_td1" align="center" >����</td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]"  value="10"size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]"  value="10"size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<input type="hidden" name="type_id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" />
<tr >
	<td colspan="6"  class="submit">
		<input type="submit" name="submit" value="ȷ�����" />
	</td>
</tr>
</form>	
</table>

<script>
function check_form(){
	
	var frm = document.forms['form1'];
	var title = frm.elements['name'].value;
	
	 var errorMsg = '';
	  if (title == "") {
		errorMsg += '���������Ʊ�����д' + '\n';
	  }
	 
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "subnew" ||  $this->magic_vars['_A']['query_type'] == "subedit"): ?>

<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	 <form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/order" method="post">
	<tr >
		<td class="main_td">����</td>
		<td class="main_td">����</td>
		<td class="main_td">��������</td>
		<td class="main_td">����</td>
		<td class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['result']) || $this->magic_vars['result']=='') $this->magic_vars['result'] = array();  $_from = $this->magic_vars['result']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center" width="250"><input type="text" value="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>" name="name[]" /></td>
		<td class="main_td1" align="center" width="150"><? if (!isset($this->magic_vars['liandong_type']['typename'])) $this->magic_vars['liandong_type']['typename'] = ''; echo $this->magic_vars['liandong_type']['typename']; ?></td>
		<td class="main_td1" align="center" width="150"><? if (!isset($this->magic_vars['liandong_sub']['name'])) $this->magic_vars['liandong_sub']['name'] = ''; echo $this->magic_vars['liandong_sub']['name']; ?></td>
		<td class="main_td1" align="center" ><input type="text" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = '';$_tmp = $this->magic_vars['item']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" name="order[]" size="5" /><input type="hidden" name="id[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" /></td>
		<td class="main_td1" align="center" width="130"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/subnew&id=<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>&pid=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">����</a> / <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�޸�</a> / <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
<tr >
	<td colspan="6"  class="submit">
		<input type="submit" name="submit" value="�޸�����" />
	</td>
</tr>
</form>	

<form action="" method="post">
	<tr >
		<td colspan="6" class="action">
			<strong>�����������ͣ�</strong><? if (!isset($this->magic_vars['liandong_type']['typename'])) $this->magic_vars['liandong_type']['typename'] = ''; echo $this->magic_vars['liandong_type']['typename']; ?> -> <input type="text" name="name" /> <input type="submit" name="submit" value="���" /> <input type="hidden" name="pid" value="<? if (!isset($_REQUEST['pid'])) $_REQUEST['pid'] = '';$_tmp = $_REQUEST['pid'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" /><input type="hidden" name="type_id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" />
		</td>
	</tr>
	</form>	
</table>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "type_new" ||  $this->magic_vars['_A']['query_type'] == "type_edit"): ?>
<div class="module_add">

	<form name="form1" method="post" action="" >
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "type_edit"): ?>�༭<? else: ?>���<? endif; ?>��������</strong></div>
	
	<div class="module_border">
		<div class="l">�����������ƣ�</div>
		<div class="c">
			<input type="text" name="name" value="<? if (!isset($this->magic_vars['_A']['linkage_type_result']['name'])) $this->magic_vars['_A']['linkage_type_result']['name'] = ''; echo $this->magic_vars['_A']['linkage_type_result']['name']; ?>" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">�����ı�ʶ����</div>
		<div class="c">
			<input type="text" name="nid"  value="<? if (!isset($this->magic_vars['_A']['linkage_type_result']['nid'])) $this->magic_vars['_A']['linkage_type_result']['nid'] = ''; echo $this->magic_vars['_A']['linkage_type_result']['nid']; ?>" onkeyup="value=value.replace(/[^a-z_]/g,'')"/>
		</div>
	</div>

	<div class="module_border">
		<div class="l">����</div>
		<div class="c">
			<input type="text" name="order"  value="<? if (!isset($this->magic_vars['_A']['linkage_type_result']['order'])) $this->magic_vars['_A']['linkage_type_result']['order'] = '';$_tmp = $this->magic_vars['_A']['linkage_type_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>"  onkeyup="value=value.replace(/[^0-9]/g,'')"/>
		</div>
	</div>
	
	<div class="module_submit" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type']=="type_edit"): ?><input type="hidden" name="id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" /><? endif; ?>
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
	</form>
</div>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "type_new"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_action" method="post">
	<tr >
		<td class="main_td" colspan="6" align="left">&nbsp;�������</td>
	</tr>
	<tr  class="tr2">
		<td class="main_td1" align="center">������������</td>
		<td class="main_td1" align="center">�����ı�ʶ��</td>
		<td class="main_td1" align="center" >����</td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="nid[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="nid[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="nid[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="nid[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]"  value="10"size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="nid[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	
<tr >
	<td colspan="6"  class="submit">
		<input type="hidden" name="type" value="add" />
		<input type="submit" name="submit" value="ȷ�����" /> 
	</td>
</tr>
</form>	
</table>
<? endif; ?>
<? endif; ?>