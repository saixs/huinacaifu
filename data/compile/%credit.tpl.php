<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td class="main_td">�û�ID</td>
		<td class="main_td">�û���</td>
		<td class="main_td">��ʵ����</td>
		<td class="main_td">�ܻ���</td>
		<td class="main_td">������ʱ��</td>
		<td class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['credit_list']) || $this->magic_vars['_A']['credit_list']=='') $this->magic_vars['_A']['credit_list'] = array();  $_from = $this->magic_vars['_A']['credit_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = ''; echo $this->magic_vars['item']['value']; ?>�� <img src="<? if (!isset($this->magic_vars['_G']['system']['con_credit_picurl'])) $this->magic_vars['_G']['system']['con_credit_picurl'] = ''; echo $this->magic_vars['_G']['system']['con_credit_picurl']; ?><? if (!isset($this->magic_vars['item']['pic'])) $this->magic_vars['item']['pic'] = ''; echo $this->magic_vars['item']['pic']; ?>"  /></td>
		<td ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
		<td><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/log<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" >�鿴��ϸ</a> <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/attestation/jifen&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" >�޸Ļ���</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="7" class="action">
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> <input type="button" value="����" / onclick="sousuo()">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="7"  class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
		</td>
	</tr>
</table>
<script>
var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';

function sousuo(){
	var username = $("#username").val();
	location.href=url+"&username="+encodeURI(username);
}

</script>



<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "log"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">�û���</td>
		<td class="main_td">��ʵ����</td>
		<td class="main_td">��������</td>
		<td class="main_td">�䶯����</td>
		<td class="main_td">�䶯��ֵ</td>
		<td class="main_td">����ʱ��</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['credit_list']) || $this->magic_vars['_A']['credit_list']=='') $this->magic_vars['_A']['credit_list'] = array();  $_from = $this->magic_vars['_A']['credit_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['type_name'])) $this->magic_vars['item']['type_name'] = ''; echo $this->magic_vars['item']['type_name']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['op'])) $this->magic_vars['item']['op']=''; ;if (  $this->magic_vars['item']['op']==1): ?>����<? else: ?>����<? endif; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = ''; echo $this->magic_vars['item']['value']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="7"  class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
		</td>
	</tr>
</table>
<script>
var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';

function sousuo(){
	var username = $("#username").val();
	location.href=url+"&username="+username;
}

</script>


<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "rank"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td class="main_td">�ȼ�����</td>
		<td class="main_td">�ȼ�</td>
		<td class="main_td">��ʼ��ֵ</td>
		<td class="main_td">����ֵ</td>
		<td class="main_td">ͼƬ</td>
		<td class="main_td">ͼƬ����</td>
		<td class="main_td">����</td>
	</tr>
	<form name="form1" method="post" action=""  enctype="multipart/form-data">
	<?  if(!isset($this->magic_vars['_A']['credit_rank_list']) || $this->magic_vars['_A']['credit_rank_list']=='') $this->magic_vars['_A']['credit_rank_list'] = array();  $_from = $this->magic_vars['_A']['credit_rank_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><input type="text" name="name[]" value="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>" size="15" /></td>
		<td><input type="text" name="rank[]" value="<? if (!isset($this->magic_vars['item']['rank'])) $this->magic_vars['item']['rank'] = ''; echo $this->magic_vars['item']['rank']; ?>"size="15" /></td>
		<td><input type="text" name="point1[]" value="<? if (!isset($this->magic_vars['item']['point1'])) $this->magic_vars['item']['point1'] = ''; echo $this->magic_vars['item']['point1']; ?>" size="15" /></td>
		<td><input type="text" name="point2[]" value="<? if (!isset($this->magic_vars['item']['point2'])) $this->magic_vars['item']['point2'] = ''; echo $this->magic_vars['item']['point2']; ?>" size="15" /></td>
		<td><input type="text" name="pic[]" value="<? if (!isset($this->magic_vars['item']['pic'])) $this->magic_vars['item']['pic'] = ''; echo $this->magic_vars['item']['pic']; ?>" size="15" /><input type="hidden" name="id[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" /></td>
		<td><img src="<? if (!isset($this->magic_vars['_G']['system']['con_credit_picurl'])) $this->magic_vars['_G']['system']['con_credit_picurl'] = ''; echo $this->magic_vars['_G']['system']['con_credit_picurl']; ?><? if (!isset($this->magic_vars['item']['pic'])) $this->magic_vars['item']['pic'] = ''; echo $this->magic_vars['item']['pic']; ?>" alt="û�б�ʾͼƬ����ȷ" /> </td>
		<td><a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/rank_del<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	
	<tr>
	<td colspan="7"  class="action" >
		 <input type="submit" value="ȷ�ϲ���" /> 
		</td>
	</tr>
	</form>
	<tr >
		<td class="main_td" colspan="7" align="left" >&nbsp;���</td>
	</tr>
	<form name="form1" method="post" action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/rank_new" enctype="multipart/form-data">
	<tr class="tr2">
		<td >�ȼ�����</td>
		<td >�ȼ�</td>
		<td >��ʼ��ֵ</td>
		<td >����ֵ</td>
		<td colspan="3" >ͼƬ</td>
	</tr>
	<tr >
		<td><input type="text" name="name"  /></td>
		<td><input type="text" name="rank" /></td>
		<td><input type="text" name="point1" /></td>
		<td><input type="text" name="point2" /></td>
		<td colspan="3" ><input type="text" name="pic" /></td>
	</tr>
	
	<tr>
		<td colspan="7"  class="action" >
		 <input type="submit" value="��ӵȼ�" /> 
		</td>
	</tr>
	</form>
</table>
<script>
var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';

function sousuo(){
	var username = $("#username").val();
	location.href=url+"&username="+username;
}

</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "type_new" ||  $this->magic_vars['_A']['query_type'] == "type_edit"): ?>
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>��������</strong></div>
	
	<div class="module_border">
		<div class="l">�����������ƣ�</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['credit_type_result']['name'])) $this->magic_vars['_A']['credit_type_result']['name'] = ''; echo $this->magic_vars['_A']['credit_type_result']['name']; ?>" size="20" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">���ִ��룺</div>
		<div class="c">
			<input type="text" name="nid"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['credit_type_result']['nid'])) $this->magic_vars['_A']['credit_type_result']['nid'] = ''; echo $this->magic_vars['_A']['credit_type_result']['nid']; ?>" size="20" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">����ֵ��</div>
		<div class="c">
			<input type="text" name="value"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['credit_type_result']['value'])) $this->magic_vars['_A']['credit_type_result']['value'] = ''; echo $this->magic_vars['_A']['credit_type_result']['value']; ?>" size="10" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">���ڣ�</div>
		<div class="c">
			<input type="radio" name="cycle" value="1" <? if (!isset($this->magic_vars['_A']['credit_type_result']['cycle'])) $this->magic_vars['_A']['credit_type_result']['cycle']=''; ;if ( 1== $this->magic_vars['_A']['credit_type_result']['cycle']): ?>checked<? endif; ?> /> һ��
			<input type="radio" name="cycle" value="2" <? if (!isset($this->magic_vars['_A']['credit_type_result']['cycle'])) $this->magic_vars['_A']['credit_type_result']['cycle']=''; ;if ( 2== $this->magic_vars['_A']['credit_type_result']['cycle']): ?>checked<? endif; ?> /> ÿ��
			<input type="radio" name="cycle" value="3" <? if (!isset($this->magic_vars['_A']['credit_type_result']['cycle'])) $this->magic_vars['_A']['credit_type_result']['cycle']=''; ;if ( 3== $this->magic_vars['_A']['credit_type_result']['cycle']): ?>checked<? endif; ?> /> ʱ����
			<input type="radio" name="cycle" value="4" <? if (!isset($this->magic_vars['_A']['credit_type_result']['cycle'])) $this->magic_vars['_A']['credit_type_result']['cycle']=''; ;if ( 4== $this->magic_vars['_A']['credit_type_result']['cycle']): ?>checked<? endif; ?> /> ����
		</div>
	</div>

	<div class="module_border">
		<div class="l">����������</div>
		<div class="c">
			<input type="text" name="award_times"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['credit_type_result']['award_times'])) $this->magic_vars['_A']['credit_type_result']['award_times'] = ''; echo $this->magic_vars['_A']['credit_type_result']['award_times']; ?>" size="8" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">ʱ������</div>
		<div class="c">
			<input type="text" name="interval"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['credit_type_result']['interval'])) $this->magic_vars['_A']['credit_type_result']['interval'] = ''; echo $this->magic_vars['_A']['credit_type_result']['interval']; ?>" size="8" /> ����
		</div>
	</div>

	<div class="module_submit border_b" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "type_edit"): ?><input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['credit_type_result']['id'])) $this->magic_vars['_A']['credit_type_result']['id'] = ''; echo $this->magic_vars['_A']['credit_type_result']['id']; ?>" /><? endif; ?>
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
</div>

<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var name = frm.elements['name'].value;
	 var nid = frm.elements['nid'].value;
	 var errorMsg = '';
	  if (name.length == 0 ) {
		errorMsg += '���������д' + '\n';
	  }
	  if (nid.length == 0 ) {
		errorMsg += '�����ʾ��������д' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "type"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/action<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>" method="post">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">������������</td>
		<td class="main_td">���ִ���</td>
		<td class="main_td">����</td>
		<td class="main_td">����</td>
		<td class="main_td">��������</td>
		<td class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['credit_type_list']) || $this->magic_vars['_A']['credit_type_list']=='') $this->magic_vars['_A']['credit_type_list'] = array();  $_from = $this->magic_vars['_A']['credit_type_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = ''; echo $this->magic_vars['item']['value']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['cycle'])) $this->magic_vars['item']['cycle']=''; ;if ( 1== $this->magic_vars['item']['cycle']): ?>һ��<? if (!isset($this->magic_vars['item']['cycle'])) $this->magic_vars['item']['cycle']=''; ;elseif ( 2== $this->magic_vars['item']['cycle']): ?>ÿ��<? if (!isset($this->magic_vars['item']['cycle'])) $this->magic_vars['item']['cycle']=''; ;elseif ( 3== $this->magic_vars['item']['cycle']): ?>ÿ<? if (!isset($this->magic_vars['item']['interval'])) $this->magic_vars['item']['interval'] = ''; echo $this->magic_vars['item']['interval']; ?>����<? else: ?>����<? endif; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['award_times'])) $this->magic_vars['item']['award_times']=''; ;if ( 0== $this->magic_vars['item']['award_times']): ?>����<? else: ?><? if (!isset($this->magic_vars['item']['award_times'])) $this->magic_vars['item']['award_times'] = ''; echo $this->magic_vars['item']['award_times']; ?>��<? endif; ?></td>
		<td><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_edit<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" >�޸�</a> <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_del<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">ɾ��</a></td>
	</tr><input type="hidden" name="flag[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag'] = ''; echo $this->magic_vars['item']['flag']; ?>" />
	<? endforeach; endif; unset($_from); ?></form>
	<tr>
		<td colspan="7" class="action">
		<div class="floatr">
			�ؼ��֣�<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = ''; echo $_REQUEST['keywords']; ?>"/> <input type="button" value="����" / onclick="sousuo()">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="7"  class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
		</td>
	</tr>
	</form>
</table>

<script>
var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';

function sousuo(){
	var username = $("#username").val();
	var keywords = $("#keywords").val();
	location.href=url+"&username="+username+"&keywords="+keywords;
}

</script>

<? endif; ?>