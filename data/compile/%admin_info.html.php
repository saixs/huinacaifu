<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type']=="list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="" method="post"  >
	<tr >
	  <td width="32%" class="main_td" >��������</td>
	  <td width="*" class="main_td">����ֵ</td>
	  <td width="22%" class="main_td">������</td>
	   <td width="12%" class="main_td">�༭</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['system_list']) || $this->magic_vars['_A']['system_list']=='') $this->magic_vars['_A']['system_list'] = array();  $_from = $this->magic_vars['_A']['system_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?> >
	  <td   class="main_td1" ><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
	  <td align="left" class="main_td1" >
	  <? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;if (  $this->magic_vars['item']['type']==0): ?>
		<input type="text" value="<? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = '';$_tmp = $this->magic_vars['item']['value'];$_tmp = $this->magic_modifier("br2nl",$_tmp,"");echo $_tmp;unset($_tmp); ?>" name="value[<? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?>]"/>
	  <? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;elseif (  $this->magic_vars['item']['type']==2): ?>
	  <textarea name="value[<? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?>]" cols="30" rows="4"><? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = '';$_tmp = $this->magic_vars['item']['value'];$_tmp = $this->magic_modifier("br2nl",$_tmp,"");echo $_tmp;unset($_tmp); ?></textarea>
	  <? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;elseif (  $this->magic_vars['item']['type']==3): ?>
	  <input  name="value[<? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?>]" value="<? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = '';$_tmp = $this->magic_vars['item']['value'];$_tmp = $this->magic_modifier("br2nl",$_tmp,"");echo $_tmp;unset($_tmp); ?>" size="15"> <INPUT onclick="uploadImg('value[<? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?>]');" type=button value=�ϴ�ͼƬ...>
	  <? else: ?>
	  <input type="radio" name="value[<? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?>]" value="1" <? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value']=''; ;if (  $this->magic_vars['item']['value']==1): ?> checked="checked"<? endif; ?> /> �� <input type="radio" name="value[<? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?>]"  value="0"  <? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value']=''; ;if (  $this->magic_vars['item']['value']==0): ?> checked="checked"<? endif; ?>/> ��
	  <? endif; ?>
	  </td>
	  <td class="main_td1" > &nbsp;<? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?></td>
	   <td class="main_td1" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�޸�</a> / <a href=" <? if (!isset($this->magic_vars['url'])) $this->magic_vars['url'] = ''; echo $this->magic_vars['url']; ?>/del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">ɾ��</a><? else: ?> - <? endif; ?></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr >
	  <td  colspan="7" class="submit" ><input type="submit" value="ȷ���޸�"  />&nbsp;&nbsp;&nbsp;<input value="��Ӳ���" type="button" onclick="javascript:location='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/new';" /></td>
	</tr>
	</form>
</table>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>

<div class="module_add">

<form action="" method="post" name="form1" onsubmit="return check_form()"  >
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type']=="edit"): ?><input type="hidden" value="<? if (!isset($this->magic_vars['_A']['system_result']['id'])) $this->magic_vars['_A']['system_result']['id'] = ''; echo $this->magic_vars['_A']['system_result']['id']; ?>" name="id" /><? endif; ?>
<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>����</strong></div>


<div class="module_border">
<div class="l">�� �� �� �ƣ�</div>
<div class="c">
	<input type="text" align="absmiddle" name="name" value="<? if (!isset($this->magic_vars['_A']['system_result']['name'])) $this->magic_vars['_A']['system_result']['name'] = ''; echo $this->magic_vars['_A']['system_result']['name']; ?>"/>
</div>
</div>
<div class="module_border">
		<div class="l">��������</div>
		<div class="c">
			<input type="text" align="absmiddle" name="nid"  value="<? if (!isset($this->magic_vars['_A']['system_result']['nid'])) $this->magic_vars['_A']['system_result']['nid'] = ''; echo $this->magic_vars['_A']['system_result']['nid']; ?>"/>����ǰ���con_
</div>
</div>
<div class="module_border">
		<div class="l">�������ͣ�</div>
		<div class="c">
			
<input type="radio" value="0" name="type" checked="checked" onclick="change(0)" <? if (!isset($this->magic_vars['_A']['system_result']['type'])) $this->magic_vars['_A']['system_result']['type']=''; ;if (  $this->magic_vars['_A']['system_result']['type']==0): ?> checked="checked"<? endif; ?>/> �ı�/���� 
<input type="radio" value="1" name="type" onclick="change(1)" <? if (!isset($this->magic_vars['_A']['system_result']['type'])) $this->magic_vars['_A']['system_result']['type']=''; ;if (  $this->magic_vars['_A']['system_result']['type']==1): ?> checked="checked"<? endif; ?>/> ������Y/N��
<input type="radio" value="2" name="type" onclick="change(0)" <? if (!isset($this->magic_vars['_A']['system_result']['type'])) $this->magic_vars['_A']['system_result']['type']=''; ;if (  $this->magic_vars['_A']['system_result']['type']==2): ?> checked="checked"<? endif; ?>/> ����
<input type="radio" value="3" name="type" onclick="change(0)" <? if (!isset($this->magic_vars['_A']['system_result']['type'])) $this->magic_vars['_A']['system_result']['type']=''; ;if (  $this->magic_vars['_A']['system_result']['type']==3): ?> checked="checked"<? endif; ?>/>ͼƬ
</div>
</div>
<div class="module_border">
		<div class="l">����ֵ��</div>
		<div class="c">
			<div id="text_v" <? if (!isset($this->magic_vars['_A']['system_result']['type'])) $this->magic_vars['_A']['system_result']['type']=''; ;if (  $this->magic_vars['_A']['system_result']['type']==1): ?>style="display:none" <? endif; ?> align="left" >
		<input type="text" align="absmiddle" name="value1"  value="<? if (!isset($this->magic_vars['_A']['system_result']['value'])) $this->magic_vars['_A']['system_result']['value'] = ''; echo $this->magic_vars['_A']['system_result']['value']; ?>"/>
	</div>
	<div id="option_v" <? if (!isset($this->magic_vars['_A']['system_result']['type'])) $this->magic_vars['_A']['system_result']['type']='';if (!isset($this->magic_vars['_A']['system_result']['type'])) $this->magic_vars['_A']['system_result']['type']=''; ;if (  $this->magic_vars['_A']['system_result']['type']==0 ||  $this->magic_vars['_A']['system_result']['type']==3): ?>style="display:none" <? endif; ?>>
		<input type="radio" value="1" name="value2" checked="checked" <? if (!isset($this->magic_vars['_A']['system_result']['value'])) $this->magic_vars['_A']['system_result']['value']=''; ;if (  $this->magic_vars['_A']['system_result']['value']==1): ?> checked="checked"<? endif; ?>/> ��
		<input type="radio" value="0" name="value2" <? if (!isset($this->magic_vars['_A']['system_result']['value'])) $this->magic_vars['_A']['system_result']['value']=''; ;if (  $this->magic_vars['_A']['system_result']['value']==0): ?> checked="checked"<? endif; ?>/> �� 
	</div>
</div>
</div>
<div class="module_border">
		<div class="l">״̬��</div>
		<div class="c">
			<input type="radio" value="0" name="status" checked="checked"  <? if (!isset($this->magic_vars['_A']['system_result']['status'])) $this->magic_vars['_A']['system_result']['status']=''; ;if (  $this->magic_vars['_A']['system_result']['status']==0): ?> checked="checked"<? endif; ?>/> ϵͳ <input type="radio" value="1" name="status" <? if (!isset($this->magic_vars['_A']['system_result']['status'])) $this->magic_vars['_A']['system_result']['status']='';if (!isset($this->magic_vars['_A']['system_result']['status'])) $this->magic_vars['_A']['system_result']['status']=''; ;if (  $this->magic_vars['_A']['system_result']['status']==1 ||  $this->magic_vars['_A']['system_result']['status']==""): ?> checked="checked"<? endif; ?>/> �Զ���
</div>
</div>

<div class="module_submit">
<input name="" type="submit" value=" �ύ " /> <input name="" type="reset" value=" ���� " /><input type="hidden" name="style" value="1" />

</div>
</form>
</div>

<script>
function change(val){
if (val==0){
	document.getElementById("text_v").style.display ="";
	document.getElementById("option_v").style.display ="none";
}else{
	document.getElementById("text_v").style.display ="none";
	document.getElementById("option_v").style.display ="";
}
}
function check_form(){
var frm = document.forms['form1'];
 var title = frm.elements['name'].value;
 var nid = frm.elements['nid'].value;
 var errorMsg = '';
  if (title.length == 0 ) {
	errorMsg += '�������Ʊ�����д' + '\n';
  }
  if (nid.length == 0 ) {
	errorMsg += '������������д' + '\n';
  }
  if (errorMsg.length > 0){
	alert(errorMsg); return false;
  } else{  
	return true;
  }
}
</script>

<? endif; ?>