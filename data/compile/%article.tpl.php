<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>����</strong></div>
	

	<div class="module_border">
		<div class="l">���⣺</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['code_result']['name'])) $this->magic_vars['_A']['code_result']['name'] = ''; echo $this->magic_vars['_A']['code_result']['name']; ?>" size="30" />  
			<input type="checkbox" onclick="jump_url()" <? if (!isset($this->magic_vars['_A']['code_result']['is_jump'])) $this->magic_vars['_A']['code_result']['is_jump']=''; ;if (  $this->magic_vars['_A']['code_result']['is_jump']=="1"): ?> checked="checked"<? endif; ?> name="is_jump" value="1"/> ��ת
		</div>
	</div>
	
	<div class="module_border" style="display:none;">
		<div class="l">�������ԣ�</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['flag'])) $this->magic_vars['_A']['code_result']['flag'] = '';$_tmp = $this->magic_vars['_A']['code_result']['flag'];$_tmp = $this->magic_modifier("flag",$_tmp,"input");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>

	<div class="module_border" id="jump_url" style="<? if (!isset($this->magic_vars['_A']['code_result']['is_jump'])) $this->magic_vars['_A']['code_result']['is_jump']=''; ;if (  $this->magic_vars['_A']['code_result']['is_jump']!=1): ?>display:none<? endif; ?>">
		<div class="l">��ת��ַ��</div>
		<div class="c">
			<input type="text" name="jumpurl"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['code_result']['jumpurl'])) $this->magic_vars['_A']['code_result']['jumpurl'] = ''; echo $this->magic_vars['_A']['code_result']['jumpurl']; ?>" size="30" /></div>
	</div>

	<div class="module_border">
		<div class="l">������Ŀ��</div>
		<div class="c">
			<select name="site_id"><option value="0">Ĭ������</option><?  if(!isset($this->magic_vars['_A']['site_code_list']) || $this->magic_vars['_A']['site_code_list']=='') $this->magic_vars['_A']['site_code_list'] = array();  $_from = $this->magic_vars['_A']['site_code_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
<option value="<? if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id'] = ''; echo $this->magic_vars['item']['site_id']; ?>" <? if (!isset($this->magic_vars['_A']['code_result']['site_id'])) $this->magic_vars['_A']['code_result']['site_id']='';if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id']='';if (!isset($_REQUEST['site_id'])) $_REQUEST['site_id']='';if (!isset($this->magic_vars['item']['site_id'])) $this->magic_vars['item']['site_id']=''; ;if (  $this->magic_vars['_A']['code_result']['site_id'] ==  $this->magic_vars['item']['site_id'] ||  $_REQUEST['site_id'] ==  $this->magic_vars['item']['site_id']): ?> selected="selected"<? endif; ?> >-<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></option>
<? endforeach; endif; unset($_from); ?></select></div>
	</div>

	<div class="module_border"  <? if (!isset($this->magic_vars['_A']['show_fields']['source'])) $this->magic_vars['_A']['show_fields']['source']=''; ;if (  $this->magic_vars['_A']['show_fields']['source']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">������Դ��</div>
		<div class="c">
			<input type="text" name="source"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['code_result']['source'])) $this->magic_vars['_A']['code_result']['source'] = ''; echo $this->magic_vars['_A']['code_result']['source']; ?>" size="30" /></div>
	</div>

	<div class="module_border" <? if (!isset($this->magic_vars['_A']['show_fields']['author'])) $this->magic_vars['_A']['show_fields']['author']=''; ;if (  $this->magic_vars['_A']['show_fields']['author']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">���ߣ�</div>
		<div class="c">
			<input type="text" name="author"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['code_result']['author'])) $this->magic_vars['_A']['code_result']['author'] = ''; echo $this->magic_vars['_A']['code_result']['author']; ?>" size="30" /></div>
	</div>

	
	<div class="module_border"  <? if (!isset($this->magic_vars['_A']['show_fields']['publish'])) $this->magic_vars['_A']['show_fields']['publish']=''; ;if (  $this->magic_vars['_A']['show_fields']['publish']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">����ʱ�䣺</div>
		<div class="c">
			<input type="text" name="publish"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['code_result']['publish'])) $this->magic_vars['_A']['code_result']['publish'] = '';$_tmp = $this->magic_vars['_A']['code_result']['publish'];$_tmp = $this->magic_modifier("default",$_tmp,"nowdate");echo $_tmp;unset($_tmp); ?>" size="30" onclick="change_picktime('yyyy-MM-dd HH:mm:ss')" readonly=""/></div>
	</div>

	<div id="jump_id"  style="<? if (!isset($this->magic_vars['_A']['code_result']['is_jump'])) $this->magic_vars['_A']['code_result']['is_jump']=''; ;if (  $this->magic_vars['_A']['code_result']['is_jump']==1): ?>display:none<? endif; ?>">
	<div class="module_border" <? if (!isset($this->magic_vars['_A']['show_fields']['area'])) $this->magic_vars['_A']['show_fields']['area']=''; ;if (  $this->magic_vars['_A']['show_fields']['area']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">���ڵأ�</div>
		<div class="c">
			<script src="./plugins/index.php?&q=procity&area_id=<? if (!isset($this->magic_vars['_A']['code_result']['area'])) $this->magic_vars['_A']['code_result']['area'] = '';$_tmp = $this->magic_vars['_A']['code_result']['area']; if (!isset($_SESSION['result']['area'])) $_SESSION['result']['area'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$_SESSION['result']['area']);echo $_tmp;unset($_tmp); ?>" type='text/javascript' language="javascript"></script> </div>
	</div>

	<div class="module_border" <? if (!isset($this->magic_vars['_A']['show_fields']['litpic'])) $this->magic_vars['_A']['show_fields']['litpic']=''; ;if (  $this->magic_vars['_A']['show_fields']['litpic']==false): ?>style="display:none"<? endif; ?> id="jump_url">
		<div class="l">����ͼ��</div>
		<div class="c">
			<input type="file" name="litpic" size="30" class="input_border"/><? if (!isset($this->magic_vars['_A']['code_result']['litpic'])) $this->magic_vars['_A']['code_result']['litpic']=''; ;if (  $this->magic_vars['_A']['code_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['code_result']['litpic'])) $this->magic_vars['_A']['code_result']['litpic'] = ''; echo $this->magic_vars['_A']['code_result']['litpic']; ?>" target="_blank" title="��ͼƬ"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><input type="checkbox" name="clearlitpic" value="1" />ȥ������ͼ<? endif; ?></div>
	</div>

	<div class="module_border" <? if (!isset($this->magic_vars['_A']['show_fields']['status'])) $this->magic_vars['_A']['show_fields']['status']=''; ;if (  $this->magic_vars['_A']['show_fields']['status']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">״̬��</div>
		<div class="c">
			<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['_A']['code_result']['status'])) $this->magic_vars['_A']['code_result']['status']=''; ;if (  $this->magic_vars['_A']['code_result']['status'] == 0): ?>checked="checked"<? endif; ?>/>���� <input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['_A']['code_result']['status'])) $this->magic_vars['_A']['code_result']['status']='';if (!isset($this->magic_vars['_A']['code_result']['status'])) $this->magic_vars['_A']['code_result']['status']=''; ;if (  $this->magic_vars['_A']['code_result']['status'] ==1 || $this->magic_vars['_A']['code_result']['status'] ==""): ?>checked="checked"<? endif; ?>/>��ʾ </div>
	</div>

	<div class="module_border" <? if (!isset($this->magic_vars['_A']['show_fields']['order'])) $this->magic_vars['_A']['show_fields']['order']=''; ;if (  $this->magic_vars['_A']['show_fields']['order']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">����:</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['code_result']['order'])) $this->magic_vars['_A']['code_result']['order'] = '';$_tmp = $this->magic_vars['_A']['code_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" size="10" />
		</div>
	</div>

	

	<div class="module_border" <? if (!isset($this->magic_vars['_A']['show_fields']['summary'])) $this->magic_vars['_A']['show_fields']['summary']=''; ;if (  $this->magic_vars['_A']['show_fields']['summary']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">���ݼ��:</div>
		<div class="c">
			<textarea name="summary" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['code_result']['summary'])) $this->magic_vars['_A']['code_result']['summary'] = ''; echo $this->magic_vars['_A']['code_result']['summary']; ?></textarea>
		</div>
	</div>

	<div class="module_border" <? if (!isset($this->magic_vars['_A']['show_fields']['content'])) $this->magic_vars['_A']['show_fields']['content']=''; ;if (  $this->magic_vars['_A']['show_fields']['content']==false): ?>style="display:none"<? endif; ?>>
		<div class="l">����:</div>
		<div class="c">
		    <textarea name="content" style="width:640px;height:460px;visibility:hidden;">
<? if (!isset($this->magic_vars['_A']['code_result']['content'])) $this->magic_vars['_A']['code_result']['content'] = ''; echo $this->magic_vars['_A']['code_result']['content']; ?></textarea>
		</div>
	</div>

	<?  if(!isset($this->magic_vars['_A']['code_input']) || $this->magic_vars['_A']['code_input']=='') $this->magic_vars['_A']['code_input'] = array();  $_from = $this->magic_vars['_A']['code_input']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<div class="module_border">
		<div class="l"><? if (!isset($this->magic_vars['item']['0'])) $this->magic_vars['item']['0'] = ''; echo $this->magic_vars['item']['0']; ?>:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['item']['1'])) $this->magic_vars['item']['1'] = ''; echo $this->magic_vars['item']['1']; ?>
		</div>
	</div>
	<? endforeach; endif; unset($_from); ?>
	
	</div>
	
	<div class="module_submit" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['code_result']['id'])) $this->magic_vars['_A']['code_result']['id'] = ''; echo $this->magic_vars['_A']['code_result']['id']; ?>" /><? endif; ?>
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
	</form>
</div>

<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var name = frm.elements['name'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (name.length == 0 ) {
		errorMsg += '���������д' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

function jump_url(){
	if (document.getElementById('jump_url').style.display == ""){
		document.getElementById('jump_url').style.display = "none";
		document.getElementById('jump_id').style.display = "";
	}else{
		document.getElementById('jump_url').style.display = "";
		document.getElementById('jump_id').style.display = "none";
	}
}
</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view"): ?>
<div class="module_add">
	
	<form name="form1" method="post" action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>update<? else: ?>add<? endif; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>���ݲ鿴</strong></div>

	<div class="module_border">
		<div class="l">���⣺</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['name'])) $this->magic_vars['_A']['code_result']['name'] = ''; echo $this->magic_vars['_A']['code_result']['name']; ?>
		</div>
	</div>
<? if (!isset($this->magic_vars['_A']['code_result']['jumpurl'])) $this->magic_vars['_A']['code_result']['jumpurl']=''; ;if (  $this->magic_vars['_A']['code_result']['jumpurl']!=""): ?>
	<div class="module_border">
		<div class="l">��ת��ַ��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['jumpurl'])) $this->magic_vars['_A']['code_result']['jumpurl'] = ''; echo $this->magic_vars['_A']['code_result']['jumpurl']; ?></div>
	</div>
<? endif; ?>
	<div class="module_border">
		<div class="l">������Ŀ��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['site_name'])) $this->magic_vars['_A']['code_result']['site_name'] = '';$_tmp = $this->magic_vars['_A']['code_result']['site_name'];$_tmp = $this->magic_modifier("default",$_tmp,"Ĭ����Ŀ");echo $_tmp;unset($_tmp); ?></select>
		</div>
	</div>

<? if (!isset($this->magic_vars['_A']['code_result']['flag'])) $this->magic_vars['_A']['code_result']['flag']=''; ;if (  $this->magic_vars['_A']['code_result']['flag']!=""): ?>
	<div class="module_border">
		<div class="l">���ԣ�</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['flag'])) $this->magic_vars['_A']['code_result']['flag'] = '';$_tmp = $this->magic_vars['_A']['code_result']['flag'];$_tmp = $this->magic_modifier("flag",$_tmp,"");echo $_tmp;unset($_tmp); ?></div>
	</div>
<? endif; ?>
	<? if (!isset($this->magic_vars['_A']['code_result']['is_jump'])) $this->magic_vars['_A']['code_result']['is_jump']=''; ;if (  $this->magic_vars['_A']['code_result']['is_jump']!=1): ?>
	<? if (!isset($this->magic_vars['_A']['code_result']['litpic'])) $this->magic_vars['_A']['code_result']['litpic']=''; ;if (  $this->magic_vars['_A']['code_result']['litpic']!=""): ?>
	<div class="module_border">
		<div class="l">����ͼ��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['litpic'])) $this->magic_vars['_A']['code_result']['litpic']=''; ;if (  $this->magic_vars['_A']['code_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['code_result']['litpic'])) $this->magic_vars['_A']['code_result']['litpic'] = ''; echo $this->magic_vars['_A']['code_result']['litpic']; ?>" target="_blank" title="����鿴��ͼ" ><img src="./<? if (!isset($this->magic_vars['_A']['code_result']['litpic'])) $this->magic_vars['_A']['code_result']['litpic'] = ''; echo $this->magic_vars['_A']['code_result']['litpic']; ?>" border="0" width="100" alt="����鿴��ͼ" title="����鿴��ͼ" /></a><? endif; ?></div>
	</div>

	<? endif; ?>
	<div class="module_border">
		<div class="l">״̬��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['status'])) $this->magic_vars['_A']['code_result']['status']=''; ;if (  $this->magic_vars['_A']['code_result']['status'] == 0): ?>����<? else: ?>��ʾ<? endif; ?>
		 </div>
	</div>

	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['order'])) $this->magic_vars['_A']['code_result']['order'] = '';$_tmp = $this->magic_vars['_A']['code_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
<? if (!isset($this->magic_vars['_A']['code_result']['source'])) $this->magic_vars['_A']['code_result']['source']=''; ;if (  $this->magic_vars['_A']['code_result']['source']!=""): ?>
	<div class="module_border">
		<div class="l">������Դ:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['source'])) $this->magic_vars['_A']['code_result']['source'] = ''; echo $this->magic_vars['_A']['code_result']['source']; ?></div>
	</div>
	<? endif; ?>
<? if (!isset($this->magic_vars['_A']['code_result']['author'])) $this->magic_vars['_A']['code_result']['author']=''; ;if (  $this->magic_vars['_A']['code_result']['author']!=""): ?>
	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['author'])) $this->magic_vars['_A']['code_result']['author'] = ''; echo $this->magic_vars['_A']['code_result']['author']; ?></div>
	</div>
<? endif; ?>
<? if (!isset($this->magic_vars['_A']['code_result']['summary'])) $this->magic_vars['_A']['code_result']['summary']=''; ;if (  $this->magic_vars['_A']['code_result']['summary']!=""): ?>
	<div class="module_border">
		<div class="l">���ݼ��:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['summary'])) $this->magic_vars['_A']['code_result']['summary'] = ''; echo $this->magic_vars['_A']['code_result']['summary']; ?></div>
	</div>
<? endif; ?>
	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<table><tr><td align="left"><? if (!isset($this->magic_vars['_A']['code_result']['content'])) $this->magic_vars['_A']['code_result']['content'] = ''; echo $this->magic_vars['_A']['code_result']['content']; ?></td></tr></table></div>
	</div>

	<?  if(!isset($this->magic_vars['input']) || $this->magic_vars['input']=='') $this->magic_vars['input'] = array();  $_from = $this->magic_vars['input']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<div class="module_border">
		<div class="l"><? if (!isset($this->magic_vars['item']['0'])) $this->magic_vars['item']['0'] = ''; echo $this->magic_vars['item']['0']; ?>:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['item']['1'])) $this->magic_vars['item']['1'] = ''; echo $this->magic_vars['item']['1']; ?>
		</div>
	</div>

	<? endforeach; endif; unset($_from); ?>
	<div class="module_border">
		<div class="l">�������/����:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['hits'])) $this->magic_vars['_A']['code_result']['hits'] = ''; echo $this->magic_vars['_A']['code_result']['hits']; ?>/<? if (!isset($this->magic_vars['_A']['code_result']['comment'])) $this->magic_vars['_A']['code_result']['comment'] = ''; echo $this->magic_vars['_A']['code_result']['comment']; ?></div>
	</div>

	<? endif; ?>
	<div class="module_border">
		<div class="l">���ʱ��/IP:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['addtime'])) $this->magic_vars['_A']['code_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['code_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>/<? if (!isset($this->magic_vars['_A']['code_result']['addip'])) $this->magic_vars['_A']['code_result']['addip'] = ''; echo $this->magic_vars['_A']['code_result']['addip']; ?></div>
	</div>

	<div class="module_border">
		<div class="l">�����:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['code_result']['username'])) $this->magic_vars['_A']['code_result']['username'] = ''; echo $this->magic_vars['_A']['code_result']['username']; ?></div>
	</div>

	<div class="module_submit" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['code_result']['id'])) $this->magic_vars['_A']['code_result']['id'] = ''; echo $this->magic_vars['_A']['code_result']['id']; ?>" /><? endif; ?>
		<input type="button"  name="submit" value="������һҳ" onclick="javascript:history.go(-1)" />
		<input type="button"  name="reset" value="�޸�����" onclick="javascript:location.href('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['_A']['code_result']['id'])) $this->magic_vars['_A']['code_result']['id'] = ''; echo $this->magic_vars['_A']['code_result']['id']; ?>')"/>
	</div>
	</form>
</div>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/action<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>" method="post">
		<tr >
			<td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">����</td>
			<td width="" class="main_td">��Ŀ����</td>
			<td width="" class="main_td">״̬</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">����</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['code_list']) || $this->magic_vars['_A']['code_list']=='') $this->magic_vars['_A']['code_list'] = array();  $_from = $this->magic_vars['_A']['code_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td class="main_td1" align="center" ><input type="checkbox" name="aid[]" id="aid[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>"/></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"34");echo $_tmp;unset($_tmp); ?><? if (!isset($this->magic_vars['item']['is_jump'])) $this->magic_vars['item']['is_jump']=''; ;if (  $this->magic_vars['item']['is_jump']==1): ?><font color="#CCCCCC">[��ת]</font><? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['site_name'])) $this->magic_vars['item']['site_name'] = '';$_tmp = $this->magic_vars['item']['site_name'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&status=0&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">��ʾ</a><? else: ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&status=1&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">����</a><? endif; ?></td>
			<td class="main_td1" align="center" ><input type="text" name="order[]" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']; ?>" size="3" /><input type="hidden" name="id[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" /><input type="hidden" name="flag[]" value="<? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag'] = ''; echo $this->magic_vars['item']['flag']; ?>" /></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['flagname'])) $this->magic_vars['item']['flagname'] = '';$_tmp = $this->magic_vars['item']['flagname'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
			<td class="main_td1" align="center" ><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�鿴</a> <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�޸�</a> <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="8"  class="action" >
			<div class="floatl"><select name="type">
			<option value="0">����</option>
			<option value="1">��ʾ</option>
			<option value="2">����</option>
			<option value="3">�Ƽ�</option>
			<option value="4">ͷ��</option>
			<option value="5">�õ�Ƭ</option>
			<option value="6">ɾ��</option>&nbsp;&nbsp;&nbsp;
			</select> <input type="submit" value="ȷ�ϲ���" /> ������ȫѡ
			</div>
			<div class="floatr">
			
			</div>
			</td>
		</tr>
		<tr>
			<td colspan="8" class="page">
			<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
			</td>
		</tr>
	</form>	
</table>
<? endif; ?>