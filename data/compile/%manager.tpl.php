<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">����Ա��</td>
		<th width="" class="main_td">���ʱ��</th>
		<th width="" class="main_td">״̬</th>
		<th width="" class="main_td">����Ա����</th>
		<th width="" class="main_td">��¼����</th>
		<th width="" class="main_td">����</th>
		<td width="" class="main_td">����</td>
	</tr>
	<form action="" method="post">
	<?  if(!isset($this->magic_vars['_A']['user_list']) || $this->magic_vars['_A']['user_list']=='') $this->magic_vars['_A']['user_list'] = array();  $_from = $this->magic_vars['_A']['user_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?>��ͨ<? else: ?>����<? endif; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['typename'])) $this->magic_vars['item']['typename'] = ''; echo $this->magic_vars['item']['typename']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['logintime'])) $this->magic_vars['item']['logintime'] = ''; echo $this->magic_vars['item']['logintime']; ?></td>
		<td class="main_td1" align="center"><input type="text" name="order[]" size="4" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = '';$_tmp = $this->magic_vars['item']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" /><input type="hidden" value="<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" name="user_id[]" /></td>
		<td class="main_td1" align="center"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">�޸�</a> / <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>'">ɾ��</a><? if (!isset($_SESSION['usertype'])) $_SESSION['usertype']=''; ;if (  $_SESSION['usertype']==1): ?> / <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/edit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">��ͨ�û�</a><? endif; ?> </td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="8" class="page">
		<input type="submit" value="�޸�����" /
		</td>
	</tr>
	<tr>
		<td colspan="8" class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
		</td>
	</tr>
	</form>
</table>


<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	
	<form name="form_user" method="post" action="" <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new"): ?>onsubmit="return check_user();"<? endif; ?> >
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>����Ա</strong></div>
	
	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] != "edit"): ?><input name="username" type="text"  class="input_border" /><? else: ?><? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = ''; echo $this->magic_vars['_A']['user_result']['username']; ?><input name="username" type="hidden"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = ''; echo $this->magic_vars['_A']['user_result']['username']; ?>" /><? endif; ?> <font color="#FF0000">*</font>
		</div>
	</div>
	<div class="module_border">
		<div class="l">��¼���룺</div>
		<div class="c">
			<input name="password" type="password" class="input_border" /><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?> ���޸���Ϊ��<? endif; ?> <font color="#FF0000">*</font>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">ȷ�����룺</div>
		<div class="c">
			<input name="password1" type="password" class="input_border" /><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?> ���޸���Ϊ��<? endif; ?> <font color="#FF0000">*</font>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��ʵ������</div>
		<div class="c">
			<input name="realname" type="text" value="<? if (!isset($this->magic_vars['_A']['user_result']['realname'])) $this->magic_vars['_A']['user_result']['realname'] = ''; echo $this->magic_vars['_A']['user_result']['realname']; ?>" class="input_border" />
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">�ԡ��� </div>
		<div class="c">
			<input type="radio" name="sex" value="0" <? if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']='';if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']=''; ;if (  $this->magic_vars['_A']['user_result']['sex']==0 ||  $this->magic_vars['_A']['user_result']['sex']==""): ?> checked="checked" <? endif; ?>/>
		����&nbsp;&nbsp;
		<input type="radio" name="sex" value="1" <? if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']=''; ;if (  $this->magic_vars['_A']['user_result']['sex']==1): ?> checked="checked" <? endif; ?> />
		��&nbsp;&nbsp;
		<input type="radio" name="sex" value="2"  <? if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']=''; ;if (  $this->magic_vars['_A']['user_result']['sex']==2): ?> checked="checked" <? endif; ?>/>
	  Ů&nbsp;&nbsp; 
		</div>
	</div>
	
	  <div class="module_border">
		<div class="l">���գ�</div>
		<div class="c">
		<input type="text" name="birthday"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['user_result']['birthday'])) $this->magic_vars['_A']['user_result']['birthday'] = ''; echo $this->magic_vars['_A']['user_result']['birthday']; ?>" size="20" onclick="change_picktime()"/> 
			
		</div>
	</div>
	 
	  <div class="module_border">
		<div class="l">���ͣ� </div>
		<div class="c">
			<select name="type_id">
<? if (!isset($this->magic_vars['list_type'])) $this->magic_vars['list_type'] = array(); $_from =$this->magic_vars['list_type'];$_selected='';  foreach ($_from as $key => $value):echo "<option value='$key'"; if(isset($this->magic_vars['_A']['user_result']['type_id']) && $key == $this->magic_vars['_A']['user_result']['type_id']){ echo ' selected '; };echo " >$value</option>"; endforeach; ?></select>

		</div>
	</div>
	
	<div class="module_border">
		<div class="l">״̬��</div>
		<div class="c">
			 <input name="status" type="radio" value="0"   <? if (!isset($this->magic_vars['_A']['user_result']['status'])) $this->magic_vars['_A']['user_result']['status']=''; ;if (  $this->magic_vars['_A']['user_result']['status']=="0"): ?> checked="checked"<? endif; ?>/>�ر�<input name="status" type="radio" value="1" <? if (!isset($this->magic_vars['_A']['user_result']['status'])) $this->magic_vars['_A']['user_result']['status']='';if (!isset($this->magic_vars['_A']['user_result']['status'])) $this->magic_vars['_A']['user_result']['status']=''; ;if (  $this->magic_vars['_A']['user_result']['status']==1 ||  $this->magic_vars['_A']['user_result']['status']==""): ?> checked="checked"<? endif; ?>/>��ͨ
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���ڵأ�</div>
		<div class="c">
			<script src="./plugins/index.php?&q=area&area=<? if (!isset($this->magic_vars['_A']['user_result']['area'])) $this->magic_vars['_A']['user_result']['area'] = ''; echo $this->magic_vars['_A']['user_result']['area']; ?>" type='text/javascript' language="javascript"></script>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">�����ʼ���ַ�� </div>
		<div class="c">
			<input name="email" value="<? if (!isset($this->magic_vars['_A']['user_result']['email'])) $this->magic_vars['_A']['user_result']['email'] = ''; echo $this->magic_vars['_A']['user_result']['email']; ?>" type="text"  class="input_border" /> <font color="#FF0000">*</font>
		</div>
	</div>
	<div class="module_border">
		<div class="l">QQ��</div>
		<div class="c">
			<input name="qq" type="text" value="<? if (!isset($this->magic_vars['_A']['user_result']['qq'])) $this->magic_vars['_A']['user_result']['qq'] = ''; echo $this->magic_vars['_A']['user_result']['qq']; ?>" class="input_border" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">������</div>
		<div class="c">
			<input name="wangwang" type="text" value="<? if (!isset($this->magic_vars['_A']['user_result']['wangwang'])) $this->magic_vars['_A']['user_result']['wangwang'] = ''; echo $this->magic_vars['_A']['user_result']['wangwang']; ?>" class="input_border" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��ͥ�绰��</div>
		<div class="c">
			<input name="tel" type="text" value="<? if (!isset($this->magic_vars['_A']['user_result']['tel'])) $this->magic_vars['_A']['user_result']['tel'] = ''; echo $this->magic_vars['_A']['user_result']['tel']; ?>" class="input_border" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�ֻ���</div>
		<div class="c">
			<input name="phone" type="text" value="<? if (!isset($this->magic_vars['_A']['user_result']['phone'])) $this->magic_vars['_A']['user_result']['phone'] = ''; echo $this->magic_vars['_A']['user_result']['phone']; ?>" class="input_border" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��ϸ��ַ��</div>
		<div class="c">
			<input name="address" type="text" value="<? if (!isset($this->magic_vars['_A']['user_result']['address'])) $this->magic_vars['_A']['user_result']['address'] = ''; echo $this->magic_vars['_A']['user_result']['address']; ?>" class="input_border" />
		</div>
	</div>
	
	<div class="module_submit border_b" >
	<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_A']['user_result']['user_id'])) $this->magic_vars['_A']['user_result']['user_id'] = ''; echo $this->magic_vars['_A']['user_result']['user_id']; ?>" /><? endif; ?>
	<input type="submit" value="ȷ���ύ" />
	<input type="reset" name="reset" value="���ñ�" />
	</div>
	</form>
</div>

<script>
function joincity(id){
	alert($("#"+id+"city option").text());

}

function check_user(){
	 var frm = document.forms['form_user'];
	 var username = frm.elements['username'].value;
	 var password = frm.elements['password'].value;
	  var password1 = frm.elements['password1'].value;
	   var email = frm.elements['email'].value;
	 var errorMsg = '';
	  if (username.length == 0 ) {
		errorMsg += '�û�������Ϊ��' + '\n';
	  }
	   if (username.length<4) {
		errorMsg += '�û������Ȳ�������4λ' + '\n';
	  }
	  if (password.length==0) {
		errorMsg += '���벻��Ϊ��' + '\n';
	  }
	  if (password.length<6) {
		errorMsg += '���볤�Ȳ���С��6λ' + '\n';
	  }
	   if (password.length!=password1.length) {
		errorMsg += '�������벻һ��' + '\n';
	  }
	   if (email.length==0) {
		errorMsg += '���䲻��Ϊ��' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "type"): ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" >
	<tr>
		<td class="main_td">��������</td>
		<td class="main_td">��Ҫ</td>
		<td class="main_td">��ע</td>
		<td class="main_td">����</td>
		<td class="main_td">״̬</td>
		<td class="main_td">����</td>
	</tr>
	<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_order" method="post">
	<?  if(!isset($this->magic_vars['_A']['user_type_list']) || $this->magic_vars['_A']['user_type_list']=='') $this->magic_vars['_A']['user_type_list'] = array();  $_from = $this->magic_vars['_A']['user_type_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td bgcolor="#ffffff" ><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
		<td bgcolor="#ffffff" ><? if (!isset($this->magic_vars['item']['summary'])) $this->magic_vars['item']['summary'] = ''; echo $this->magic_vars['item']['summary']; ?></td>
		<td bgcolor="#ffffff"><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
		<td bgcolor="#ffffff"><input name="order[]" size="2" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']; ?>"type="text" ><input name="type_id[]" type="hidden" size="2" value="<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>" ></td>
		<td  bgcolor="#ffffff" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?>��ͨ<? else: ?><font color=red>�ر�</font><? endif; ?></td>
		<td bgcolor="#ffffff"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_edit&type_id=<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>">�޸�</a>/<a href="#" onclick="javascript:if(confirm('ȷ��Ҫɾ����?������')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_del&type_id=<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>'">ɾ��</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td   colspan="6" class="action"><input type="button" onclick="javascript:location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_new<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>'" value="�������" />  <input type="submit" value="�޸�����" /> </td>
	</tr>
	</form>
</table>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "type_new" ||  $this->magic_vars['_A']['query_type'] == "type_edit"): ?>
<div class="module_add">
	
	<form enctype="multipart/form-data" name="form1" method="post" action="" onsubmit="return check_form();"  >
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>����Ա����</strong></div>
	
	<div class="module_border">
		<div class="l">��������:</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['result']['name'])) $this->magic_vars['result']['name'] = ''; echo $this->magic_vars['result']['name']; ?>" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����:</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="<? if (!isset($this->magic_vars['result']['order'])) $this->magic_vars['result']['order'] = '';$_tmp = $this->magic_vars['result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" size="10" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">״̬:</div>
		<div class="c">
			<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['result']['status'])) $this->magic_vars['result']['status']=''; ;if (  $this->magic_vars['result']['status'] == 0): ?>checked="checked"<? endif; ?>/> �ر�<input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['result']['status'])) $this->magic_vars['result']['status']='';if (!isset($this->magic_vars['result']['status'])) $this->magic_vars['result']['status']=''; ;if (  $this->magic_vars['result']['status'] ==1 || $this->magic_vars['result']['status'] ==""): ?>checked="checked"<? endif; ?>/>��ͨ
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��Ҫ˵��:</div>
		<div class="c">
			<textarea name="summary" cols="55" rows="6" ><? if (!isset($this->magic_vars['result']['summary'])) $this->magic_vars['result']['summary'] = ''; echo $this->magic_vars['result']['summary']; ?></textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��ע:</div>
		<div class="c">
			<textarea name="remark" cols="55" rows="6" ><? if (!isset($this->magic_vars['result']['remark'])) $this->magic_vars['result']['remark'] = ''; echo $this->magic_vars['result']['remark']; ?></textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">Ȩ��:</div>
		<div class="c">
			
				<script>
				var checkflag = false;
				function changeAll(field,id) { 
					var chkArray = document.all(field);
					var checkflag = document.getElementById(id).checked;
					if (checkflag == true) { 
						for (i = 0; i < chkArray.length; i++) { 
							chkArray[i].checked = true; 
						}  
					} else { 
						for (i = 0; i < chkArray.length; i++) { 
							chkArray[i].checked = false;
						} 
					}
				}
				</script>
				
                <div>
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['attestation_all'])) $this->magic_vars['pur']['attestation_all']=''; ;if (  $this->magic_vars['pur']['attestation_all'] === true): ?>checked<? endif; ?> name="purview[]" value="attestation_all" />��֤����Ȩ��
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['borrow_all'])) $this->magic_vars['pur']['borrow_all']=''; ;if (  $this->magic_vars['pur']['borrow_all'] === true): ?>checked<? endif; ?> name="purview[]" value="borrow_all" />������Ȩ��
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['account_all'])) $this->magic_vars['pur']['account_all']=''; ;if (  $this->magic_vars['pur']['account_all'] === true): ?>checked<? endif; ?> name="purview[]" value="account_all" />�ʽ����Ȩ��
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['integral_all'])) $this->magic_vars['pur']['integral_all']=''; ;if (  $this->magic_vars['pur']['integral_all'] === true): ?>checked<? endif; ?> name="purview[]" value="integral_all" />���ֹ���Ȩ��
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['userinfo_all'])) $this->magic_vars['pur']['userinfo_all']=''; ;if (  $this->magic_vars['pur']['userinfo_all'] === true): ?>checked<? endif; ?> name="purview[]" value="userinfo_all" />�û���Ϣ����Ȩ��
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['content_all'])) $this->magic_vars['pur']['content_all']=''; ;if (  $this->magic_vars['pur']['content_all'] === true): ?>checked<? endif; ?> name="purview[]" value="content_all" />���ݹ���Ȩ��
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['bbs_all'])) $this->magic_vars['pur']['bbs_all']=''; ;if (  $this->magic_vars['pur']['bbs_all'] === true): ?>checked<? endif; ?> name="purview[]" value="bbs_all" />��̳����Ȩ��
                    <input type="checkbox" <? if (!isset($this->magic_vars['pur']['other_all'])) $this->magic_vars['pur']['other_all']=''; ;if (  $this->magic_vars['pur']['other_all'] === true): ?>checked<? endif; ?> name="purview[]" value="other_all" />����Ȩ��
                </div>
				<!--<?  if(!isset($this->magic_vars['_A']['user_purview']) || $this->magic_vars['_A']['user_purview']=='') $this->magic_vars['_A']['user_purview'] = array();  $_from = $this->magic_vars['_A']['user_purview']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
					<div style="height:auto; width:90%" class="floatr">
					<?  if(!isset($this->magic_vars['item']) || $this->magic_vars['item']=='') $this->magic_vars['item'] = array();  $_from = $this->magic_vars['item']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['_key'] =>  $this->magic_vars['_item']):
?>
					 <div style="width:97%; border-bottom:1px dashed #CCCCCC; height:28px; padding-top:5px"><strong><? if (!isset($this->magic_vars['_key'])) $this->magic_vars['_key'] = ''; echo $this->magic_vars['_key']; ?></strong>
					 <input type="checkbox" title="ȫѡ" onclick="changeAll('<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>','_<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>')" id="_<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>"/></div>
					 <div style="width:97%;border-bottom:1px solid #CCCCCC;  padding-top:5px">
						<?  if(!isset($this->magic_vars['_item']) || $this->magic_vars['_item']=='') $this->magic_vars['_item'] = array();  $_from = $this->magic_vars['_item']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['__key'] =>  $this->magic_vars['__item']):
?>
						<div style="float:left; width:140px; height:25px;" title="<? if (!isset($this->magic_vars['__key'])) $this->magic_vars['__key'] = ''; echo $this->magic_vars['__key']; ?>"><input type="checkbox" value="<? if (!isset($this->magic_vars['__key'])) $this->magic_vars['__key'] = ''; echo $this->magic_vars['__key']; ?>" name="purview[]" id="<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>" <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "type_edit"): ?><? if (!isset($this->magic_vars['__key'])) $this->magic_vars['__key'] = '';$_tmp = $this->magic_vars['__key']; if (!isset($this->magic_vars['result']['purview'])) $this->magic_vars['result']['purview'] = '';
$_tmp = $this->magic_modifier("checked",$_tmp,$this->magic_vars['result']['purview']);echo $_tmp;unset($_tmp); ?><? endif; ?>  /> <? if (!isset($this->magic_vars['__item'])) $this->magic_vars['__item'] = ''; echo $this->magic_vars['__item']; ?></div>
						<? endforeach; endif; unset($_from); ?>
					</div>
					<? endforeach; endif; unset($_from); ?>
					</div>
				<? endforeach; endif; unset($_from); ?>-->
			</div>
	</div>
	<div class="module_submit" >
	<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "type_edit"): ?><input type="hidden" name="type_id" value="<? if (!isset($this->magic_vars['result']['type_id'])) $this->magic_vars['result']['type_id'] = ''; echo $this->magic_vars['result']['type_id']; ?>" /><? endif; ?>
		<input type="submit" value="ȷ���ύ" />
		<input type="reset" name="reset" value="���ñ�" />
	</div>
	</form>
</div>


<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var title = frm.elements['name'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '�������Ʊ�����д' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>

<? endif; ?>