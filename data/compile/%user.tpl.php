<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">�û���</td>
		<td width="*" class="main_td">��ʵ����</td>
		<td width="*" class="main_td">�Ա�</td>
		<td width="*" class="main_td">����</td>
		<td width="*" class="main_td">QQ</td>
		<td width="*" class="main_td">�ֻ�</td>
		<td width="*" class="main_td">���ڵ�</td>
		<td width="*" class="main_td">���֤</td>
		<th width="" class="main_td">���ʱ��</th>
		<th width="" class="main_td">״̬</th>
		<th width="" class="main_td">�û�����</th>
		<!--<th width="" class="main_td">��¼����</th>-->
		<td width="" class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['user_list']) || $this->magic_vars['_A']['user_list']=='') $this->magic_vars['_A']['user_list'] = array();  $_from = $this->magic_vars['_A']['user_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['sex'])) $this->magic_vars['item']['sex']=''; ;if (  $this->magic_vars['item']['sex']==1): ?>��<? else: ?>Ů<? endif; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['email'])) $this->magic_vars['item']['email'] = ''; echo $this->magic_vars['item']['email']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['qq'])) $this->magic_vars['item']['qq'] = ''; echo $this->magic_vars['item']['qq']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['phone'])) $this->magic_vars['item']['phone'] = ''; echo $this->magic_vars['item']['phone']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['area'])) $this->magic_vars['item']['area'] = '';$_tmp = $this->magic_vars['item']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['card_id'])) $this->magic_vars['item']['card_id'] = ''; echo $this->magic_vars['item']['card_id']; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?>��ͨ<? else: ?>����<? endif; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['typename'])) $this->magic_vars['item']['typename'] = ''; echo $this->magic_vars['item']['typename']; ?></td>
		<!--<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['logintime'])) $this->magic_vars['item']['logintime'] = ''; echo $this->magic_vars['item']['logintime']; ?></td>-->
		<td class="main_td1" align="center"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">�޸�</a> / <a href="#" onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>'">ɾ��</a><? if (!isset($_SESSION['usertype'])) $_SESSION['usertype']=''; ;if (  $_SESSION['usertype']==1): ?> / <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/manager/edit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">�����û�</a><? endif; ?> </td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
			<td colspan="11" class="action">
			<div class="floatl">
			<script>
	  var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';
          var urlExport = url + "&site_id=50&a=userinfo&type=excel";
	    
	  	function sousuo(){
			var username = $("#username").val();
			var email = $("#email").val();
			var keywords = $("#keywords").val();
			var realname = $("#realname").val();
			location.href=url+"&keywords="+encodeURI(keywords)+"&email="+encodeURI(email)+"&realname="+encodeURI(realname);
		}
                
                function exportExcl() {

                    var start = $("#start_ts").val();
                    if(start !== "") {
                        urlExport += "&start_ts=" + start;
                    }
                    var end = $("#end_ts").val();
                    if(end !== "") {
                        urlExport += "&end_ts=" + end;
                    }
                    location.href=urlExport;
                }
	  
	  </script>
	  
			</div>
                        <div class="floatl">
                            ������ʼʱ�䣺<input type="text" id="start_ts" value="" onclick="change_picktime()" />
                            �����ֹʱ�䣺<input type="text" id="end_ts" value="" onclick="change_picktime()" />
		            <input type="button" value="������ǰ����" onclick="exportExcl();" />
                        </div>
			<div class="floatr">
				�û�����<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>  ���䣺<input type="text" name="email" id="email" value="<? if (!isset($_REQUEST['email'])) $_REQUEST['email'] = '';$_tmp = $_REQUEST['email'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>  ��ʵ������<input type="text" name="realname" id="realname" value="<? if (!isset($_REQUEST['realname'])) $_REQUEST['realname'] = '';$_tmp = $_REQUEST['realname'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> <input type="button" value="����" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr>
		<td colspan="7" class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
		</td>
	</tr>
</table>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "typechange"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">�û���</td>
		<td width="*" class="main_td">��ʵ����</td>
		<td width="*" class="main_td">ԭ��������</td>
		<td width="*" class="main_td">����������</td>
		<td width="*" class="main_td">����ԭ��</td>
		<td width="*" class="main_td">״̬</td>
		<th width="" class="main_td">���ʱ��</th>
		<th width="" class="main_td">���Ip</th>
		<td width="" class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['user_list']) || $this->magic_vars['_A']['user_list']=='') $this->magic_vars['_A']['user_list'] = array();  $_from = $this->magic_vars['_A']['user_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['old_typename'])) $this->magic_vars['item']['old_typename'] = ''; echo $this->magic_vars['item']['old_typename']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['new_typename'])) $this->magic_vars['item']['new_typename'] = ''; echo $this->magic_vars['item']['new_typename']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = ''; echo $this->magic_vars['item']['content']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>�����<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==1): ?>�ɹ�<? else: ?>ʧ��<? endif; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['addip'])) $this->magic_vars['item']['addip'] = ''; echo $this->magic_vars['item']['addip']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?><a href="#" onClick="javascript:if(confirm('�������ɣ�<? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = ''; echo $this->magic_vars['item']['content']; ?>/ȷ��Ҫ���ͨ����')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/typechange&status=1&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>'">ͨ�� </a>| <a href="#" onClick="javascript:if(confirm('�������ɣ�<? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = ''; echo $this->magic_vars['item']['content']; ?>/ȷ����˲�ͨ����')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/typechange&status=2&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>'">��ͨ��</a><? else: ?>-<? endif; ?></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
			<td colspan="11" class="action">
			<div class="floatl">
			<script>
	  var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';
	    
	  	function sousuo(){
			var username = $("#username").val();
			var email = $("#email").val();
			var keywords = $("#keywords").val();
			var realname = $("#realname").val();
			location.href=url+"&keywords="+encodeURI(keywords)+"&email="+encodeURI(email)+"&realname="+encodeURI(realname);
		}
	  
	  </script>
	  
			</div>
			<div class="floatr">
				�û�����<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>  ���䣺<input type="text" name="email" id="email" value="<? if (!isset($_REQUEST['email'])) $_REQUEST['email'] = '';$_tmp = $_REQUEST['email'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>  ��ʵ������<input type="text" name="realname" id="realname" value="<? if (!isset($_REQUEST['realname'])) $_REQUEST['realname'] = '';$_tmp = $_REQUEST['realname'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> <input type="button" value="����" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr>
		<td colspan="7" class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
		</td>
	</tr>
</table>


<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	
	<form name="form_user" method="post" action="" <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new"): ?>onsubmit="return check_user();"<? endif; ?> >
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>�û�</strong></div>
	
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
		<input type="radio" name="sex" value="1" <? if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']=''; ;if (  $this->magic_vars['_A']['user_result']['sex']==1): ?> checked="checked" <? endif; ?> />
		��&nbsp;&nbsp;
		<input type="radio" name="sex" value="2"  <? if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']=''; ;if (  $this->magic_vars['_A']['user_result']['sex']==2): ?> checked="checked" <? endif; ?>/>
	  Ů&nbsp;&nbsp; 
		</div>
	</div>
	
	  <div class="module_border">
		<div class="l">���գ�</div>
		<div class="c">
		<input type="text" name="birthday"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['user_result']['birthday'])) $this->magic_vars['_A']['user_result']['birthday'] = '';$_tmp = $this->magic_vars['_A']['user_result']['birthday'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" size="20" onclick="change_picktime()"/> 
			
		</div>
	</div>
	 <div class="module_border">
			<div class="l">�����ͷ���</div>
			<div class="c">
			<select name="kefu_userid">
			<option value="0">��</option>
				<? $this->magic_vars['query_type']='GetList';$data = array('type_id'=>'7,3','limit'=>'all');$default = '';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
			<option value="<? if (!isset($this->magic_vars['var']['user_id'])) $this->magic_vars['var']['user_id'] = ''; echo $this->magic_vars['var']['user_id']; ?>" <? if (!isset($this->magic_vars['_A']['user_result']['kefu_userid'])) $this->magic_vars['_A']['user_result']['kefu_userid']='';if (!isset($this->magic_vars['var']['user_id'])) $this->magic_vars['var']['user_id']=''; ;if (  $this->magic_vars['_A']['user_result']['kefu_userid']== $this->magic_vars['var']['user_id']): ?> selected="selected"<? endif; ?>><? if (!isset($this->magic_vars['var']['username'])) $this->magic_vars['var']['username'] = ''; echo $this->magic_vars['var']['username']; ?></option>
				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				</select>
			</div>
		</div>
		
	
	 <div class="module_border">
			<div class="l">�Ƿ���Է������꣺</div>
			<div class="c">
				<input type="radio" name="borrow_vouch" value="0" <? if (!isset($this->magic_vars['_A']['user_result']['borrow_vouch'])) $this->magic_vars['_A']['user_result']['borrow_vouch']=''; ;if (  $this->magic_vars['_A']['user_result']['borrow_vouch']==0): ?> checked="checked"<? endif; ?>/>�� <input type="radio" name="borrow_vouch" value="1" <? if (!isset($this->magic_vars['_A']['user_result']['borrow_vouch'])) $this->magic_vars['_A']['user_result']['borrow_vouch']=''; ;if (  $this->magic_vars['_A']['user_result']['borrow_vouch']==1): ?> checked="checked"<? endif; ?>/>����
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
		<div class="l">�Ƿ�������</div>
		<div class="c">
			 <input name="islock" type="radio" value="0"   <? if (!isset($this->magic_vars['_A']['user_result']['islock'])) $this->magic_vars['_A']['user_result']['islock']=''; ;if (  $this->magic_vars['_A']['user_result']['islock']=="0"): ?> checked="checked"<? endif; ?>/>��ͨ<input name="islock" type="radio" value="1" <? if (!isset($this->magic_vars['_A']['user_result']['islock'])) $this->magic_vars['_A']['user_result']['islock']='';if (!isset($this->magic_vars['_A']['user_result']['islock'])) $this->magic_vars['_A']['user_result']['islock']=''; ;if (  $this->magic_vars['_A']['user_result']['islock']==1 ||  $this->magic_vars['_A']['user_result']['islock']==""): ?> checked="checked"<? endif; ?>/>����
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
			<div class="l">֤�����ͣ�</div>
			<div class="c">
				<select name="card_type">
					<option value="1" <? if (!isset($this->magic_vars['_A']['user_result']['card_type'])) $this->magic_vars['_A']['user_result']['card_type']=''; ;if (  $this->magic_vars['_A']['user_result']['card_type']==1): ?> selected="selected"<? endif; ?>>���֤</option>
					<option value="2" <? if (!isset($this->magic_vars['_A']['user_result']['card_type'])) $this->magic_vars['_A']['user_result']['card_type']=''; ;if (  $this->magic_vars['_A']['user_result']['card_type']==2): ?> selected="selected"<? endif; ?>>����֤</option>
					<option value="3" <? if (!isset($this->magic_vars['_A']['user_result']['card_type'])) $this->magic_vars['_A']['user_result']['card_type']=''; ;if (  $this->magic_vars['_A']['user_result']['card_type']==3): ?> selected="selected"<? endif; ?>>̨��֤</option>
				</select>
				<input name="card_id" type="text" value="<? if (!isset($this->magic_vars['_A']['user_result']['card_id'])) $this->magic_vars['_A']['user_result']['card_id'] = ''; echo $this->magic_vars['_A']['user_result']['card_id']; ?>" class="input_border" />
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
	<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="user_id" value="<? if (!isset($_REQUEST['user_id'])) $_REQUEST['user_id'] = ''; echo $_REQUEST['user_id']; ?>" /><? endif; ?>
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
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>�û�����</strong></div>
	
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
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "vip"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">�û���</td>
		<th width="" class="main_td">���ʱ��</th>
		<th width="" class="main_td">״̬</th>
		<th width="" class="main_td">�û�����</th>
		<th width="" class="main_td">��¼����</th>
		<th width="" class="main_td">״̬</th>
		<th width="" class="main_td">�Ƿ�ɷ�</th>
		<td width="" class="main_td">����</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['user_vip_list']) || $this->magic_vars['_A']['user_vip_list']=='') $this->magic_vars['_A']['user_vip_list'] = array();  $_from = $this->magic_vars['_A']['user_vip_list']; 
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
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['isvip'])) $this->magic_vars['item']['isvip']=''; ;if (  $this->magic_vars['item']['isvip']==-1): ?>vip���<? else: ?>VIP��Ա<? endif; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['vip_money'])) $this->magic_vars['item']['vip_money']=''; ;if (  $this->magic_vars['item']['vip_money']==""): ?>��<? else: ?><? if (!isset($this->magic_vars['item']['vip_money'])) $this->magic_vars['item']['vip_money'] = ''; echo $this->magic_vars['item']['vip_money']; ?>Ԫ<? endif; ?></td>
		<td class="main_td1" align="center"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/vipview&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">��˲鿴</a> </td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
			<td colspan="10" class="action">
			<div class="floatl">
			<script>
	  var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';
	    
	  	function sousuo(){
			var username = $("#username").val();
			var keywords = $("#keywords").val();
			location.href=url+"&keywords="+keywords;
		}
	  
	  </script>
	  
			</div>
			<div class="floatr">
				�û�����<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = ''; echo $_REQUEST['keywords']; ?>"/> <input type="button" value="����" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr>
		<td colspan="10" class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
		</td>
	</tr>
</table>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "vipview"): ?>
<div class="module_add">
	
	<form enctype="multipart/form-data" name="form1" method="post" action="" onsubmit="return check_form();"  >
	<div class="module_title"><strong>VIP��˲鿴</strong></div>
	
	<div class="module_border">
		<div class="l">�û���:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = ''; echo $this->magic_vars['_A']['user_result']['username']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���:</div>
		<div class="c">
			<input type="radio" value="1" name="isvip" />���ͨ�� <input type="radio" value="0" name="isvip" checked="checked" />��˲�ͨ�� 
		</div>
	</div>
	<div class="module_border">
		<div class="l">��ע:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['user_result']['vip_remark'])) $this->magic_vars['_A']['user_result']['vip_remark'] = ''; echo $this->magic_vars['_A']['user_result']['vip_remark']; ?>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">��˱�ע:</div>
		<div class="c">
			<textarea name="vip_veremark" cols="55" rows="6" ><? if (!isset($this->magic_vars['_A']['user_result']['vip_veremark'])) $this->magic_vars['_A']['user_result']['vip_veremark'] = ''; echo $this->magic_vars['_A']['user_result']['vip_veremark']; ?></textarea>
		</div>
	</div>
	
	<div class="module_submit" >
	<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_A']['user_result']['user_id'])) $this->magic_vars['_A']['user_result']['user_id'] = ''; echo $this->magic_vars['_A']['user_result']['user_id']; ?>" />
		<input type="submit" value="ȷ���ύ" />
		<input type="reset" name="reset" value="���ñ�" />
	</div>
	</form>
<? endif; ?>