<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>����</strong></div>
	
	<div class="module_border">
		<div class="l">���⣺</div>
		<div class="c">
			<input type="text" name="title"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['title'])) $this->magic_vars['_A']['liuyan_result']['title'] = ''; echo $this->magic_vars['_A']['liuyan_result']['title']; ?>" size="30" />  
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���</div>
		<div class="c">
			<select name="type">
			<?  if(!isset($this->magic_vars['_A']['liuyan_type_list']) || $this->magic_vars['_A']['liuyan_type_list']=='') $this->magic_vars['_A']['liuyan_type_list'] = array();  $_from = $this->magic_vars['_A']['liuyan_type_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<option value="<? if (!isset($this->magic_vars['item'])) $this->magic_vars['item'] = ''; echo $this->magic_vars['item']; ?>" <? if (!isset($this->magic_vars['item'])) $this->magic_vars['item']='';if (!isset($this->magic_vars['_A']['liuyan_result']['type'])) $this->magic_vars['_A']['liuyan_result']['type']=''; ;if (  $this->magic_vars['item']== $this->magic_vars['_A']['liuyan_result']['type']): ?> selected="selected"<? endif; ?>><? if (!isset($this->magic_vars['item'])) $this->magic_vars['item'] = ''; echo $this->magic_vars['item']; ?></option>
		
		<? endforeach; endif; unset($_from); ?>
		</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">״̬��</div>
		<div class="c">
			<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] == 0): ?>checked="checked"<? endif; ?>/>���� <input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']='';if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] ==1 || $this->magic_vars['_A']['liuyan_result']['status'] ==""): ?>checked="checked"<? endif; ?>/>��ʾ </div>
	</div>
	
	<div class="module_border">
		<div class="l">������</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['name'])) $this->magic_vars['_A']['liuyan_result']['name'] = ''; echo $this->magic_vars['_A']['liuyan_result']['name']; ?>" size="20" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">EMAIL:</div>
		<div class="c">
			<input type="text" name="email"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['email'])) $this->magic_vars['_A']['liuyan_result']['email'] = ''; echo $this->magic_vars['_A']['liuyan_result']['email']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">��˾:</div>
		<div class="c">
			<input type="text" name="company"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['company'])) $this->magic_vars['_A']['liuyan_result']['company'] = ''; echo $this->magic_vars['_A']['liuyan_result']['company']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">�绰:</div>
		<div class="c">
			<input type="text" name="tel"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['tel'])) $this->magic_vars['_A']['liuyan_result']['tel'] = ''; echo $this->magic_vars['_A']['liuyan_result']['tel']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<input type="text" name="fax"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['fax'])) $this->magic_vars['_A']['liuyan_result']['fax'] = ''; echo $this->magic_vars['_A']['liuyan_result']['fax']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">��ַ:</div>
		<div class="c">
			<input type="text" name="address"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['address'])) $this->magic_vars['_A']['liuyan_result']['address'] = ''; echo $this->magic_vars['_A']['liuyan_result']['address']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">ͼƬ:</div>
		<div class="c">
			<input type="file" name="litpic"  class="input_border" size="20" /><? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic'] = ''; echo $this->magic_vars['_A']['liuyan_result']['litpic']; ?>" target="_blank" title="��ͼƬ"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><? endif; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<textarea name="content" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['liuyan_result']['content'])) $this->magic_vars['_A']['liuyan_result']['content'] = ''; echo $this->magic_vars['_A']['liuyan_result']['content']; ?></textarea></div>
	</div>
	
	<div class="module_submit" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['id'])) $this->magic_vars['_A']['liuyan_result']['id'] = ''; echo $this->magic_vars['_A']['liuyan_result']['id']; ?>" /><? endif; ?>
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
</div>
</form>


<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var title = frm.elements['title'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '���������д' + '\n';
	  }
	  if (content.length == 0 ) {
		errorMsg += '���ݱ�����д' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "set"): ?>
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	
	<div class="module_title"><strong>��������</strong></div>
	
	<div class="module_border">
		<div class="l">���Ա��⣺</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_set']['name'])) $this->magic_vars['_A']['liuyan_set']['name'] = ''; echo $this->magic_vars['_A']['liuyan_set']['name']; ?>" size="30" />  
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�������ͣ�</div>
		<div class="c">
			<input type="text" name="type"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_set']['type'])) $this->magic_vars['_A']['liuyan_set']['type'] = ''; echo $this->magic_vars['_A']['liuyan_set']['type']; ?>" size="30" />  ����������� | ����
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��ʾҳ����</div>
		<div class="c">
			<input type="text" name="page"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_set']['page'])) $this->magic_vars['_A']['liuyan_set']['page'] = ''; echo $this->magic_vars['_A']['liuyan_set']['page']; ?>" size="30" />  
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����״̬��</div>
		<div class="c">
			<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['_A']['liuyan_set']['status'])) $this->magic_vars['_A']['liuyan_set']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_set']['status'] == 0): ?>checked="checked"<? endif; ?>/>���� <input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']='';if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] ==1 || $this->magic_vars['_A']['liuyan_result']['status'] ==""): ?>checked="checked"<? endif; ?>/>��ʾ </div>
	</div>
	
	<div class="module_submit">
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
	</form>
	
</div>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view"): ?>
<form name="form1" method="post" action="" >
<div class="module_add">
	
	<div class="module_title"><strong>���Բ鿴</strong></div>
	
	<div class="module_border">
		<div class="l">���Ա��⣺</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['name'])) $this->magic_vars['_A']['liuyan_result']['name'] = ''; echo $this->magic_vars['_A']['liuyan_result']['name']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['type'])) $this->magic_vars['_A']['liuyan_result']['type'] = ''; echo $this->magic_vars['_A']['liuyan_result']['type']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">״̬��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']='';if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] ==1 || $this->magic_vars['_A']['liuyan_result']['status'] ==""): ?>����<? else: ?>��ʾ<? endif; ?> </div>
	</div>
	
	<div class="module_border">
		<div class="l">������</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['name'])) $this->magic_vars['_A']['liuyan_result']['name'] = ''; echo $this->magic_vars['_A']['liuyan_result']['name']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">EMAIL:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['email'])) $this->magic_vars['_A']['liuyan_result']['email'] = ''; echo $this->magic_vars['_A']['liuyan_result']['email']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">��˾:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['company'])) $this->magic_vars['_A']['liuyan_result']['company'] = ''; echo $this->magic_vars['_A']['liuyan_result']['company']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">�绰:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['tel'])) $this->magic_vars['_A']['liuyan_result']['tel'] = ''; echo $this->magic_vars['_A']['liuyan_result']['tel']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['fax'])) $this->magic_vars['_A']['liuyan_result']['fax'] = ''; echo $this->magic_vars['_A']['liuyan_result']['fax']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">��ַ:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['address'])) $this->magic_vars['_A']['liuyan_result']['address'] = ''; echo $this->magic_vars['_A']['liuyan_result']['address']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">ͼƬ:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic'] = ''; echo $this->magic_vars['_A']['liuyan_result']['litpic']; ?>" target="_blank" title="��ͼƬ"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><? endif; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['content'])) $this->magic_vars['_A']['liuyan_result']['content'] = ''; echo $this->magic_vars['_A']['liuyan_result']['content']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">���ʱ��/IP:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['addtime'])) $this->magic_vars['_A']['liuyan_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['liuyan_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>/<? if (!isset($this->magic_vars['_A']['liuyan_result']['addip'])) $this->magic_vars['_A']['liuyan_result']['addip'] = ''; echo $this->magic_vars['_A']['liuyan_result']['addip']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">�ظ�:</div>
		<div class="c">
			<textarea name="reply" cols="40" rows="6"><? if (!isset($this->magic_vars['_A']['liuyan_result']['reply'])) $this->magic_vars['_A']['liuyan_result']['reply'] = ''; echo $this->magic_vars['_A']['liuyan_result']['reply']; ?></textarea></div>
	</div>
	
	<div class="module_submit" >
		<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['id'])) $this->magic_vars['_A']['liuyan_result']['id'] = ''; echo $this->magic_vars['_A']['liuyan_result']['id']; ?>" />
		<input type="submit"   value="ȷ�ϻظ�"/>
		<input type="button"  name="reset" value="�޸�����" onclick="javascript:location.href('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&id=<? if (!isset($this->magic_vars['_A']['liuyan_result']['id'])) $this->magic_vars['_A']['liuyan_result']['id'] = ''; echo $this->magic_vars['_A']['liuyan_result']['id']; ?>')"/>
		
	</div>
</div>
</form>
<? else: ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/order" method="post">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">����</td>
		<td class="main_td">����</td>
		<td class="main_td">״̬</td>
		<td class="main_td">���ʱ��</td>
		<td class="main_td">�Ƿ�ظ�</td>
		<td class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['liuyan_list']) || $this->magic_vars['_A']['liuyan_list']=='') $this->magic_vars['_A']['liuyan_list'] = array();  $_from = $this->magic_vars['_A']['liuyan_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['title'])) $this->magic_vars['item']['title'] = ''; echo $this->magic_vars['item']['title']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type'] = ''; echo $this->magic_vars['item']['type']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?>��ʾ<? else: ?>����<? endif; ?></td>
		<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
		<td ><? if (!isset($this->magic_vars['item']['reply'])) $this->magic_vars['item']['reply']=''; ;if (  $this->magic_vars['item']['reply'] == ""): ?><font color="#FF0000">δ�ظ�</font><? else: ?>�ѻظ�<? endif; ?></td>
		<td><a href=" <? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�ظ�</a> / <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�޸�</a> / <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?> /del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="8"  class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
		</td>
	</tr>
</form>	
</table>
<? endif; ?>