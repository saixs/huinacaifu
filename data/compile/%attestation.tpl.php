<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">

	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
		<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>编辑<? else: ?>添加<? endif; ?>认证</strong></div>


		<div class="module_border">
			<div class="l">用户ID：</div>
			<div class="c">
				<input type="text" name="user_id"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['user_id'])) $this->magic_vars['_A']['attestation_result']['user_id'] = ''; echo $this->magic_vars['_A']['attestation_result']['user_id']; ?>" size="30" />
			</div>
		</div>

		<div class="module_border">
			<div class="l">所属栏目：</div>
			<div class="c">
				<select  name="type_id" ><?  if(!isset($this->magic_vars['_A']['attestation_type_list']) || $this->magic_vars['_A']['attestation_type_list']=='') $this->magic_vars['_A']['attestation_type_list'] = array();  $_from = $this->magic_vars['_A']['attestation_type_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?><option value="<? if (!isset($this->magic_vars['var']['type_id'])) $this->magic_vars['var']['type_id'] = ''; echo $this->magic_vars['var']['type_id']; ?>" <? if (!isset($this->magic_vars['_A']['attestation_result']['type_id'])) $this->magic_vars['_A']['attestation_result']['type_id']='';if (!isset($this->magic_vars['var']['type_id'])) $this->magic_vars['var']['type_id']=''; ;if (  $this->magic_vars['_A']['attestation_result']['type_id'] ==  $this->magic_vars['var']['type_id']): ?> selected="selected"<? endif; ?>><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></option> <? endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</div>

		<div class="module_border" >
			<div class="l">上传图片：</div>
			<div class="c">
				<input type="file" name="litpic" size="30" class="input_border"/><? if (!isset($this->magic_vars['_A']['attestation_result']['litpic'])) $this->magic_vars['_A']['attestation_result']['litpic']=''; ;if (  $this->magic_vars['_A']['attestation_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['attestation_result']['litpic'])) $this->magic_vars['_A']['attestation_result']['litpic'] = ''; echo $this->magic_vars['_A']['attestation_result']['litpic']; ?>" target="_blank" title="有图片"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><? endif; ?></div>
		</div>


		<div class="module_border" >
			<div class="l">排序:</div>
			<div class="c">
				<input type="text" name="order"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['order'])) $this->magic_vars['_A']['attestation_result']['order'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" size="10" />
			</div>
		</div>

		<div class="module_border" >
			<div class="l">内容简介:</div>
			<div class="c">
				<textarea name="content" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['attestation_result']['content'])) $this->magic_vars['_A']['attestation_result']['content'] = ''; echo $this->magic_vars['_A']['attestation_result']['content']; ?></textarea>
			</div>


		</div>

		<div class="module_submit" >
			<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['id'])) $this->magic_vars['_A']['attestation_result']['id'] = ''; echo $this->magic_vars['_A']['attestation_result']['id']; ?>" /><? endif; ?>
			<input type="submit"  name="submit" value="确认提交" />
			<input type="reset"  name="reset" value="重置表单" />
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
			errorMsg += '标题必须填写' + '\n';
		}

		if (errorMsg.length > 0){
			alert(errorMsg); return false;
		} else{
			return true;
		}
	}

</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == 'bankCheck'): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr>
		<th width="" class="main_td">ID</th>
		<th width="*" class="main_td">用户名</th>
		<th width="*" class="main_td">真实姓名</th>
		<th width="*" class="main_td">开户银行</th>
		<th width="" class="main_td">开户支行</th>
		<th width="" class="main_td">银行帐号</th>
		<th width="" class="main_td">联系电话</th>
		<th width="" class="main_td">邮箱</th>
		<th width="" class="main_td">发生时间</th>
		<th width="" class="main_td">操作</th>
	</tr>
	<?  if(!isset($this->magic_vars['list']) || $this->magic_vars['list']=='') $this->magic_vars['list'] = array();  $_from = $this->magic_vars['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
	<tr>
		<td><? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?></td>
		<td><? if (!isset($this->magic_vars['var']['username'])) $this->magic_vars['var']['username'] = ''; echo $this->magic_vars['var']['username']; ?></td>
		<td><? if (!isset($this->magic_vars['var']['realname'])) $this->magic_vars['var']['realname'] = ''; echo $this->magic_vars['var']['realname']; ?></td>
		<td><? if (!isset($this->magic_vars['var']['bank'])) $this->magic_vars['var']['bank'] = '';$_tmp = $this->magic_vars['var']['bank'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
		<td><? if (!isset($this->magic_vars['var']['branch'])) $this->magic_vars['var']['branch'] = ''; echo $this->magic_vars['var']['branch']; ?></td>
		<td><? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = '';$_tmp = $this->magic_vars['var']['account'];$_tmp = $this->magic_modifier("hideMiddle",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
		<td><? if (!isset($this->magic_vars['var']['phone'])) $this->magic_vars['var']['phone'] = ''; echo $this->magic_vars['var']['phone']; ?></td>
		<td><? if (!isset($this->magic_vars['var']['email'])) $this->magic_vars['var']['email'] = ''; echo $this->magic_vars['var']['email']; ?></td>
		<td><? if (!isset($this->magic_vars['var']['addtime'])) $this->magic_vars['var']['addtime'] = '';$_tmp = $this->magic_vars['var']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
		<td>
			<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/attestation/bankCheck&type=allow&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>">通过</a> |
			<a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/attestation/bankCheck&type=reject&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>">拒绝</a>
		</td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
</table>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view"): ?>
<div class="module_add">

	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
		<div class="module_title"><strong>证件查看</strong></div>

		<div class="module_border">
			<div class="l">用户名：</div>
			<div class="c">
				<a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['_A']['attestation_result']['user_id'])) $this->magic_vars['_A']['attestation_result']['user_id'] = ''; echo $this->magic_vars['_A']['attestation_result']['user_id']; ?>&type=scene",500,230,"true","","true","text");'><? if (!isset($this->magic_vars['_A']['attestation_result']['username'])) $this->magic_vars['_A']['attestation_result']['username'] = ''; echo $this->magic_vars['_A']['attestation_result']['username']; ?></a>
			</div>
		</div>


		<div class="module_border">
			<div class="l">类型：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['attestation_result']['type_name'])) $this->magic_vars['_A']['attestation_result']['type_name'] = ''; echo $this->magic_vars['_A']['attestation_result']['type_name']; ?>
			</div>
		</div>


		<div class="module_border">
			<div class="l">证件图片：</div>
			<div class="c">
				<a href="<? if (!isset($this->magic_vars['_A']['attestation_result']['litpic'])) $this->magic_vars['_A']['attestation_result']['litpic'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['litpic'];$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" target="_blank"><img src="<? if (!isset($this->magic_vars['_A']['attestation_result']['litpic'])) $this->magic_vars['_A']['attestation_result']['litpic'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['litpic'];$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" width="100" height="100" /></a>
			</div>
		</div>

		<div class="module_border">
			<div class="l">简介:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['attestation_result']['content'])) $this->magic_vars['_A']['attestation_result']['content'] = ''; echo $this->magic_vars['_A']['attestation_result']['content']; ?></div>
		</div>

		<div class="module_border">
			<div class="l">添加时间/IP:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['attestation_result']['addtime'])) $this->magic_vars['_A']['attestation_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>/<? if (!isset($this->magic_vars['_A']['attestation_result']['addip'])) $this->magic_vars['_A']['attestation_result']['addip'] = ''; echo $this->magic_vars['_A']['attestation_result']['addip']; ?></div>
		</div>

		<? if (!isset($this->magic_vars['_A']['attestation_result']['status'])) $this->magic_vars['_A']['attestation_result']['status']=''; ;if (  $this->magic_vars['_A']['attestation_result']['status']==1): ?>

		<div class="module_border">
			<div class="l">积分:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['attestation_result']['jifen'])) $this->magic_vars['_A']['attestation_result']['jifen'] = ''; echo $this->magic_vars['_A']['attestation_result']['jifen']; ?> 分</div>
		</div>

		<div class="module_border">
			<div class="l">审核备注:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['attestation_result']['verify_remark'])) $this->magic_vars['_A']['attestation_result']['verify_remark'] = ''; echo $this->magic_vars['_A']['attestation_result']['verify_remark']; ?></div>
		</div>

		<div class="module_border">
			<div class="l">审核时间:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['attestation_result']['verify_time'])) $this->magic_vars['_A']['attestation_result']['verify_time'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></div>
		</div>
		<? else: ?>
		<div class="module_title"><strong>审核此证件</strong></div>

		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<input type="radio" name="status" value="1"/><font color="#009900">审核通过</font> <input type="radio" name="status" value="2" checked="checked"/>审核不通过 </div>
		</div>

		<div class="module_border" >
			<div class="l">通过得信用积分:</div>
			<div class="c">
				<input type="text" name="jifen" value="<? if (!isset($this->magic_vars['_A']['arrestation_value'])) $this->magic_vars['_A']['arrestation_value'] = ''; echo $this->magic_vars['_A']['arrestation_value']; ?>" size="5"> 分
			</div>
		</div>

		<div class="module_border" >
			<div class="l">审核备注:</div>
			<div class="c">
				<textarea name="verify_remark" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['attestation_result']['verify_remark'])) $this->magic_vars['_A']['attestation_result']['verify_remark'] = ''; echo $this->magic_vars['_A']['attestation_result']['verify_remark']; ?></textarea>
			</div>
		</div>



		<div class="module_submit" >
			<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['id'])) $this->magic_vars['_A']['attestation_result']['id'] = ''; echo $this->magic_vars['_A']['attestation_result']['id']; ?>" />
			<input type="hidden" name="type_name" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['type_name'])) $this->magic_vars['_A']['attestation_result']['type_name'] = ''; echo $this->magic_vars['_A']['attestation_result']['type_name']; ?>" />
			<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['user_id'])) $this->magic_vars['_A']['attestation_result']['user_id'] = ''; echo $this->magic_vars['_A']['attestation_result']['user_id']; ?>" />

			<input type="submit"  name="reset" value="审核此证件" />
		</div>
	</form>
	<? endif; ?>
</div>

<script>
	function check_form(){
		var frm = document.forms['form1'];
		var verify_remark = frm.elements['verify_remark'].value;
		var errorMsg = '';
		if (verify_remark.length == 0 ) {
			errorMsg += '备注必须填写' + '\n';
		}

		if (errorMsg.length > 0){
			alert(errorMsg); return false;
		} else{
			return true;
		}
	}

</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="" method="post">
		<tr >
			<td class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="*" class="main_td">真实姓名</td>
			<td class="main_td">认证类型</td>
			<td class="main_td">认证图片</td>
			<td class="main_td">认证状态</td>
			<td class="main_td">认证积分</td>
			<td class="main_td">认证简介</td>
			<td class="main_td">操作</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['attestation_list']) || $this->magic_vars['_A']['attestation_list']=='') $this->magic_vars['_A']['attestation_list'] = array();  $_from = $this->magic_vars['_A']['attestation_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['type_name'])) $this->magic_vars['item']['type_name'] = ''; echo $this->magic_vars['item']['type_name']; ?></td>
		<td class="main_td1" align="center" ><a href="<? if (!isset($this->magic_vars['item']['litpic'])) $this->magic_vars['item']['litpic'] = '';$_tmp = $this->magic_vars['item']['litpic'];$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" target="_blank" ><img src="<? if (!isset($this->magic_vars['item']['litpic'])) $this->magic_vars['item']['litpic'] = '';$_tmp = $this->magic_vars['item']['litpic'];$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" width="50" height="50" style="border:1px solid #CCCCCC" /></a></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?><font color="#009900">审核通过</font><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status'] ==0): ?><font color="#ff0000">等待审核</font><? else: ?>审核未通过<? endif; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['jifen'])) $this->magic_vars['item']['jifen'] = ''; echo $this->magic_vars['item']['jifen']; ?>分</td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = ''; echo $this->magic_vars['item']['content']; ?></td>
		<td class="main_td1" align="center" >
			<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] !=1): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">[审核]</a><? endif; ?>
			<? if (!isset($this->magic_vars['item']['is_delete'])) $this->magic_vars['item']['is_delete']=''; ;if (  $this->magic_vars['item']['is_delete'] !=1): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&del_id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">[删除]</a><? endif; ?>
		</td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="10" class="action">
				<div class="floatl">

				</div>
				<div class="floatr">
					用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/> 真实姓名：<input type="text" name="realname" id="realname" value="<? if (!isset($_REQUEST['realname'])) $_REQUEST['realname'] = ''; echo $_REQUEST['realname']; ?>"/> 状态<select id="status" ><option value="">全部</option><option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>已通过</option><option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> selected="selected"<? endif; ?>>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="9" class="page">
				<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
			</td>
		</tr>
	</form>
</table>
<script>
	var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>';
	var _url = '<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>';
	
	function sousuo(){
		var sou = "";
		var username = $("#username").val();
		if (username!=""){
			sou += "&username="+username;
		}
		var realname = $("#realname").val();
		if (realname!=""){
			sou += "&realname="+realname;
		}
		var status = $("#status").val();
		if (status!=""){
			sou += "&status="+status;
		}

		location.href=url+sou+_url;

	}
</script>


<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "type_list"): ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" >
	<tr>
		<td class="main_td">类型名称</td>
		<td class="main_td">积分</td>
		<td class="main_td">简要</td>
		<td class="main_td">备注</td>
		<td class="main_td">排序</td>
		<td class="main_td">状态</td>
		<td class="main_td">操作</td>
	</tr>
	<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_order" method="post">
		<?  if(!isset($this->magic_vars['_A']['attestation_type_list']) || $this->magic_vars['_A']['attestation_type_list']=='') $this->magic_vars['_A']['attestation_type_list'] = array();  $_from = $this->magic_vars['_A']['attestation_type_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td bgcolor="#ffffff" ><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
		<td bgcolor="#ffffff" ><? if (!isset($this->magic_vars['item']['jifen'])) $this->magic_vars['item']['jifen'] = ''; echo $this->magic_vars['item']['jifen']; ?></td>
		<td bgcolor="#ffffff" ><? if (!isset($this->magic_vars['item']['summary'])) $this->magic_vars['item']['summary'] = ''; echo $this->magic_vars['item']['summary']; ?></td>
		<td bgcolor="#ffffff"><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
		<td bgcolor="#ffffff"><input name="order[]" size="2" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']; ?>"type="text" ><input name="type_id[]" type="hidden" size="2" value="<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>" ></td>
		<td  bgcolor="#ffffff" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?>开通<? else: ?><font color=red>关闭</font><? endif; ?></td>
		<td bgcolor="#ffffff"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_edit&type_id=<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>">修改</a>/<a href="#" onclick="javascript:if(confirm('确定要删除吗?请慎重')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_del&type_id=<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>'">删除</a></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
			<td   colspan="7" class="action"><input type="button" onclick="javascript:location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/type_new<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>'" value="添加类型" />  <input type="submit" value="修改排序" /> </td>
		</tr>
	</form>
</table>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "type_new" ||  $this->magic_vars['_A']['query_type'] == "type_edit"): ?>
<div class="module_add">

	<form enctype="multipart/form-data" name="form1" method="post" action="" onsubmit="return check_form();"  >
		<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>编辑<? else: ?>添加<? endif; ?>认证类型</strong></div>

		<div class="module_border">
			<div class="l">类型名称:</div>
			<div class="c">
				<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['attestation_type_result']['name'])) $this->magic_vars['_A']['attestation_type_result']['name'] = ''; echo $this->magic_vars['_A']['attestation_type_result']['name']; ?>" size="30" />
			</div>
		</div>

		<div class="module_border">
			<div class="l">排序:</div>
			<div class="c">
				<input type="text" name="order"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['attestation_type_result']['order'])) $this->magic_vars['_A']['attestation_type_result']['order'] = '';$_tmp = $this->magic_vars['_A']['attestation_type_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" size="10" />
			</div>
		</div>

		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['_A']['attestation_type_result']['status'])) $this->magic_vars['_A']['attestation_type_result']['status']=''; ;if (  $this->magic_vars['_A']['attestation_type_result']['status'] == 0): ?>checked="checked"<? endif; ?>/> 关闭<input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['_A']['attestation_type_result']['status'])) $this->magic_vars['_A']['attestation_type_result']['status']='';if (!isset($this->magic_vars['_A']['attestation_type_result']['status'])) $this->magic_vars['_A']['attestation_type_result']['status']=''; ;if (  $this->magic_vars['_A']['attestation_type_result']['status'] ==1 || $this->magic_vars['_A']['attestation_type_result']['status'] ==""): ?>checked="checked"<? endif; ?>/>开通
			</div>
		</div>

		<div class="module_border">
			<div class="l">默认积分:</div>
			<div class="c">
				<input type="text" name="jifen" value="<? if (!isset($this->magic_vars['_A']['attestation_type_result']['jifen'])) $this->magic_vars['_A']['attestation_type_result']['jifen'] = '';$_tmp = $this->magic_vars['_A']['attestation_type_result']['jifen'];$_tmp = $this->magic_modifier("default",$_tmp,"2");echo $_tmp;unset($_tmp); ?>" /
			</div>
		</div>

		<div class="module_border">
			<div class="l">简要说明:</div>
			<div class="c">
				<textarea name="summary" cols="55" rows="6" ><? if (!isset($this->magic_vars['_A']['attestation_type_result']['summary'])) $this->magic_vars['_A']['attestation_type_result']['summary'] = ''; echo $this->magic_vars['_A']['attestation_type_result']['summary']; ?></textarea>
			</div>
		</div>

		<div class="module_border">
			<div class="l">备注:</div>
			<div class="c">
				<textarea name="remark" cols="55" rows="6" ><? if (!isset($this->magic_vars['_A']['attestation_type_result']['remark'])) $this->magic_vars['_A']['attestation_type_result']['remark'] = ''; echo $this->magic_vars['_A']['attestation_type_result']['remark']; ?></textarea>
			</div>
		</div>

		<div class="module_submit" >
			<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "type_edit"): ?><input type="hidden" name="type_id" value="<? if (!isset($this->magic_vars['_A']['attestation_type_result']['type_id'])) $this->magic_vars['_A']['attestation_type_result']['type_id'] = ''; echo $this->magic_vars['_A']['attestation_type_result']['type_id']; ?>" /><? endif; ?>
			<input type="submit" value="确认提交" />
			<input type="reset" name="reset" value="重置表单" />
		</div>
	</form>
</div>


<script>
	function check_form(){
		var frm = document.forms['form1'];
		var title = frm.elements['name'].value;
		var errorMsg = '';
		if (title.length == 0 ) {
			errorMsg += '类型名称必须填写' + '\n';
		}
		if (errorMsg.length > 0){
			alert(errorMsg); return false;
		} else{
			return true;
		}
	}
	
</script>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="realname"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">

	<tr >

		<td width="*" class="main_td">用户名称</td>
		<td class="main_td">真实姓名</td>
		<td class="main_td">性别</td>
		<td class="main_td">民族</td>
		<td class="main_td">生日</td>
		<td class="main_td">证件类型</td>
		<td class="main_td">证件号码</td>
		<td class="main_td">籍贯</td>
		<td class="main_td">身份证图片</td>
		<td class="main_td">状态</td>
		<td class="main_td">操作</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['user_real_list']) || $this->magic_vars['_A']['user_real_list']=='') $this->magic_vars['_A']['user_real_list'] = array();  $_from = $this->magic_vars['_A']['user_real_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
	<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['sex'])) $this->magic_vars['item']['sex']=''; ;if (  $this->magic_vars['item']['sex']==1): ?>男<? else: ?>女<? endif; ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['nation'])) $this->magic_vars['item']['nation'] = '';$_tmp = $this->magic_vars['item']['nation'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['birthday'])) $this->magic_vars['item']['birthday'] = '';$_tmp = $this->magic_vars['item']['birthday'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d ");echo $_tmp;unset($_tmp); ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['card_type'])) $this->magic_vars['item']['card_type'] = '';$_tmp = $this->magic_vars['item']['card_type'];$_tmp = $this->magic_modifier("linkage",$_tmp,"card_type");echo $_tmp;unset($_tmp); ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['card_id'])) $this->magic_vars['item']['card_id'] = ''; echo $this->magic_vars['item']['card_id']; ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['area'])) $this->magic_vars['item']['area'] = '';$_tmp = $this->magic_vars['item']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['card_pic1'])) $this->magic_vars['item']['card_pic1']=''; ;if (  $this->magic_vars['item']['card_pic1']!=""): ?><a href="<? if (!isset($this->magic_vars['item']['card_pic1'])) $this->magic_vars['item']['card_pic1'] = ''; echo $this->magic_vars['item']['card_pic1']; ?>" target="_blank">正面</a><? else: ?>无<? endif; ?>| <? if (!isset($this->magic_vars['item']['card_pic2'])) $this->magic_vars['item']['card_pic2']=''; ;if (  $this->magic_vars['item']['card_pic2']!=""): ?><a  href="<? if (!isset($this->magic_vars['item']['card_pic2'])) $this->magic_vars['item']['card_pic2'] = ''; echo $this->magic_vars['item']['card_pic2']; ?>" target="_blank">背面</a><? else: ?>无<? endif; ?></td>
	<!--
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['card_pic1'])) $this->magic_vars['item']['card_pic1']=''; ;if (  $this->magic_vars['item']['card_pic1']!=""): ?><a href="<? if (!isset($this->magic_vars['item']['card_pic1'])) $this->magic_vars['item']['card_pic1'] = ''; echo $this->magic_vars['item']['card_pic1']; ?>"  onclick='tipsWindown("身份证正面图片","img:<? if (!isset($this->magic_vars['item']['card_pic1'])) $this->magic_vars['item']['card_pic1'] = ''; echo $this->magic_vars['item']['card_pic1']; ?>",500,430,"true","","true","img")'>正面</a><? else: ?>无<? endif; ?>| <? if (!isset($this->magic_vars['item']['card_pic2'])) $this->magic_vars['item']['card_pic2']=''; ;if (  $this->magic_vars['item']['card_pic2']!=""): ?><a  href="#"  onclick='tipsWindown("身份证反面图片","img:<? if (!isset($this->magic_vars['item']['card_pic2'])) $this->magic_vars['item']['card_pic2'] = ''; echo $this->magic_vars['item']['card_pic2']; ?>",500,430,"true","","true","img")'>背面</a><? else: ?>无<? endif; ?></td>
	-->
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['real_status'])) $this->magic_vars['item']['real_status']=''; ;if (  $this->magic_vars['item']['real_status']==2): ?><font color="#00ffff">等待审核</font><? else: ?><font color="#009900">审核通过</font><? endif; ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['real_status'])) $this->magic_vars['item']['real_status']=''; ;if (  $this->magic_vars['item']['real_status']!=1): ?><a href="javascript:void(0)" onclick='tipsWindown("真实姓名审核","url:get?<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/audit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=realname",500,230,"true","","true","text");'>审核</a><? else: ?>-<? endif; ?> </td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="11" class="action">
			<div class="floatl">

			</div>
			<div class="floatr">
				用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> 状态<select id="status" ><option value="">全部</option><option value="1" <? if (!isset($_REQUEST['real_status'])) $_REQUEST['real_status']=''; ;if (  $_REQUEST['real_status']==1): ?> selected="selected"<? endif; ?>>已通过</option><option value="0" <? if (!isset($_REQUEST['real_status'])) $_REQUEST['real_status']=''; ;if (  $_REQUEST['real_status']=="0"): ?> selected="selected"<? endif; ?>>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="11" class="page">
			<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
		</td>
	</tr>
	</form>
</table>
<script>
	var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/realname';
	
	function sousuo(){
		var sou = "";
		var username = $("#username").val();
		if (username!=""){
			sou += "&username="+encodeURI(username);
		}
		var status = $("#status").val();
		if (status!=""){
			sou += "&real_status="+status;
		}

		location.href=url+sou;

	}
</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "vip"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">用户名</td>
		<td width="*" class="main_td">客服名称</td>
		<th width="" class="main_td">添加时间</th>
		<th width="" class="main_td">用户类型</th>
		<th width="" class="main_td">登录次数</th>
		<th width="" class="main_td">状态</th>
		<th width="" class="main_td">是否缴费</th>
		<td width="" class="main_td">操作</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['user_vip_list']) || $this->magic_vars['_A']['user_vip_list']=='') $this->magic_vars['_A']['user_vip_list'] = array();  $_from = $this->magic_vars['_A']['user_vip_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
	<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?></td>
	<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
	<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['kefu_username'])) $this->magic_vars['item']['kefu_username'] = ''; echo $this->magic_vars['item']['kefu_username']; ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
	<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['typename'])) $this->magic_vars['item']['typename'] = ''; echo $this->magic_vars['item']['typename']; ?></td>
	<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['logintime'])) $this->magic_vars['item']['logintime'] = ''; echo $this->magic_vars['item']['logintime']; ?></td>
	<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['vip_status'])) $this->magic_vars['item']['vip_status']=''; ;if (  $this->magic_vars['item']['vip_status']==2): ?>vip审核<? else: ?>VIP会员<? endif; ?></td>
	<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['vip_money'])) $this->magic_vars['item']['vip_money']=''; ;if (  $this->magic_vars['item']['vip_money']==""): ?>无<? else: ?><? if (!isset($this->magic_vars['item']['vip_money'])) $this->magic_vars['item']['vip_money'] = ''; echo $this->magic_vars['item']['vip_money']; ?>元<? endif; ?></td>
	<td class="main_td1" align="center"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/vipview&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">审核查看</a> </td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="10" class="action">
			<div class="floatl">
				<script>
					var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/vip&type=<? if (!isset($_REQUEST['type'])) $_REQUEST['type'] = ''; echo $_REQUEST['type']; ?>';
					
					function sousuo(){
						var username = $("#username").val();
						var kefu = $("#kefu").val();
						var keywords = $("#keywords").val();
						location.href=url+"&keywords="++encodeURI(keywords)+"&kefu="+kefu;
					}

				</script>
				
			</div>
			<div class="floatr">
				用户名：<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> 	客服用户名：<input type="text" name="kefu" id="kefu" value="<? if (!isset($_REQUEST['kefu'])) $_REQUEST['kefu'] = '';$_tmp = $_REQUEST['kefu'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> <input type="button" value="搜索" / onclick="sousuo()">
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
		<div class="module_title"><strong>VIP审核查看</strong></div>

		<div class="module_border">
			<div class="l">用户名:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = ''; echo $this->magic_vars['_A']['user_result']['username']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">审核:</div>
			<div class="c">
				<input type="radio" value="1" name="vip_status" />审核通过 <input type="radio" value="0" name="vip_status" checked="checked" />审核不通过
			</div>
		</div>
		<div class="module_border">
			<div class="l">备注:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['vip_remark'])) $this->magic_vars['_A']['user_result']['vip_remark'] = ''; echo $this->magic_vars['_A']['user_result']['vip_remark']; ?>
			</div>
		</div>


		<div class="module_border">
			<div class="l">审核备注:</div>
			<div class="c">
				<textarea name="vip_verify_remark" cols="55" rows="6" ><? if (!isset($this->magic_vars['_A']['user_result']['vip_verify_remark'])) $this->magic_vars['_A']['user_result']['vip_verify_remark'] = ''; echo $this->magic_vars['_A']['user_result']['vip_verify_remark']; ?></textarea>
			</div>
		</div>

		<div class="module_submit" >
			<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_A']['user_result']['user_id'])) $this->magic_vars['_A']['user_result']['user_id'] = ''; echo $this->magic_vars['_A']['user_result']['user_id']; ?>" />
			<input type="submit" value="确认提交" />
			<input type="reset" name="reset" value="重置表单" />
		</div>
	</form>
	<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="all"): ?>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">

		<tr >

			<td width="*" class="main_td">用户名称</td>
			<td class="main_td">真实姓名</td>
			<td class="main_td">实名认证</a></td>
			<td class="main_td">邮箱认证</a></td>
			<td class="main_td" width="220"> 手机认证</td>
			<td class="main_td">视频认证</td>
			<td class="main_td">现场认证</td>
			<td class="main_td">操作</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['user_all_list']) || $this->magic_vars['_A']['user_all_list']=='') $this->magic_vars['_A']['user_all_list'] = array();  $_from = $this->magic_vars['_A']['user_all_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['real_status'])) $this->magic_vars['item']['real_status']=''; ;if (  $this->magic_vars['item']['real_status']==2): ?><a href="javascript:void(0)" onclick='tipsWindown("真实姓名审核","url:get?<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/audit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=realname",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a><? if (!isset($this->magic_vars['item']['real_status'])) $this->magic_vars['item']['real_status']=''; ;elseif (  $this->magic_vars['item']['real_status']==1): ?><font color="#009900">审核通过</font><? else: ?><font color="#cccccc">没有申请</font><? endif; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['email_status'])) $this->magic_vars['item']['email_status']=''; ;if (  $this->magic_vars['item']['email_status']==2): ?><a href="javascript:void(0)" onclick='tipsWindown("邮箱认证审核","url:get?<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/audit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=email",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a><? if (!isset($this->magic_vars['item']['email_status'])) $this->magic_vars['item']['email_status']=''; ;elseif (  $this->magic_vars['item']['email_status']==1): ?><font color="#009900">审核通过</font><? else: ?><font color="#cccccc">没有申请</font><? endif; ?></td>
		<td class="main_td1" align="center" >
			<? if (!isset($this->magic_vars['item']['phone_status'])) $this->magic_vars['item']['phone_status']=''; ;if (  $this->magic_vars['item']['phone_status']>1): ?><font color="#999999">[手机：<? if (!isset($this->magic_vars['item']['phone'])) $this->magic_vars['item']['phone'] = ''; echo $this->magic_vars['item']['phone']; ?>]</font>
			<a href="javascript:void(0)" onclick='tipsWindown("手机认证审核","url:get?<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/audit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=phone",500,230,"true","","true","text");'>
				<font color="#FF0000">等待审核</font>
			</a>
			<? if (!isset($this->magic_vars['item']['phone_status'])) $this->magic_vars['item']['phone_status']=''; ;elseif (  $this->magic_vars['item']['phone_status']==1): ?>
			<font color="#999999">[手机：<? if (!isset($this->magic_vars['item']['phone'])) $this->magic_vars['item']['phone'] = ''; echo $this->magic_vars['item']['phone']; ?>]</font>
			<font color="#009900">审核通过</font>
			<? else: ?>
			<font color="#cccccc">没有申请</font>
			<? endif; ?>
		</td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['video_status'])) $this->magic_vars['item']['video_status']=''; ;if (  $this->magic_vars['item']['video_status']==2): ?><a href="javascript:void(0)" onclick='tipsWindown("视频认证审核","url:get?<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/audit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=video",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a><? if (!isset($this->magic_vars['item']['video_status'])) $this->magic_vars['item']['video_status']=''; ;elseif (  $this->magic_vars['item']['video_status']==1): ?><font color="#009900">审核通过</font><? else: ?><font color="#cccccc">没有申请</font><? endif; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['scene_status'])) $this->magic_vars['item']['scene_status']=''; ;if (  $this->magic_vars['item']['scene_status']==0): ?><a href="javascript:void(0)" onclick='tipsWindown("现场审核","url:get?<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/audit&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a><? if (!isset($this->magic_vars['item']['scene_status'])) $this->magic_vars['item']['scene_status']=''; ;elseif (  $this->magic_vars['item']['scene_status']==1): ?><font color="#009900">审核通过</font><? else: ?><font color="#cccccc">没有申请</font><? endif; ?></td>
		<td class="main_td1" align="center" ><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/jifen&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>">积分修改</a></td>

		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="11" class="action">
				<div class="floatl">

				</div>
				<div class="floatr">
					用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> 真实姓名：<input type="text" name="realname" id="realname" value="<? if (!isset($_REQUEST['realname'])) $_REQUEST['realname'] = '';$_tmp = $_REQUEST['realname'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> 状态<select id="type" ><option value="">全部</option>
					<option value="phone" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="phone"): ?> selected="selected"<? endif; ?>>手机认证</option>
					<option value="video" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="video"): ?> selected="selected"<? endif; ?>>视频认证</option>
					<option value="realname" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="realname"): ?> selected="selected"<? endif; ?>>实名认证</option>
					<option value="email" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="email"): ?> selected="selected"<? endif; ?>>邮箱认证</option>
					<option value="scene" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="scene"): ?> selected="selected"<? endif; ?>>现场认证</option>

				</select> <input type="button" value="搜索" / onclick="sousuo()">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="11" class="page">
				<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
			</td>
		</tr>
	</table>
	<script>
		var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/all';
		
		function sousuo(){
			var sou = "";
			var username = $("#username").val();
			if (username!=""){
				sou += "&username="+encodeURI(username);
			}
			var realname = $("#realname").val();
			if (realname!=""){
				sou += "&realname="+encodeURI(realname);
			}
			var type = $("#type").val();
			if (type!=""){
				sou += "&type="+type;
			}

			location.href=url+sou;

		}
	</script>
	

	<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "viewall"): ?>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名</td>
			<td width="*" class="main_td">真实姓名</td>
			<th width="" class="main_td">实名认证</th>
			<th width="" class="main_td">邮箱认证</th>
			<th width="" class="main_td">手机认证</th>
			<th width="" class="main_td">是否VIP</th>
			<th width="" class="main_td">添加时间</th>
			<td width="" class="main_td">操作</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['viewall_list']) || $this->magic_vars['_A']['viewall_list']=='') $this->magic_vars['_A']['viewall_list'] = array();  $_from = $this->magic_vars['_A']['viewall_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['real_status'])) $this->magic_vars['item']['real_status']=''; ;if (  $this->magic_vars['item']['real_status']==1): ?>已认证<? else: ?><font color="#FF0000">未认证</font><? endif; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['email_status'])) $this->magic_vars['item']['email_status']=''; ;if (  $this->magic_vars['item']['email_status']==1): ?>已认证<? else: ?><font color="#FF0000">未认证</font><? endif; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['phone_status'])) $this->magic_vars['item']['phone_status']=''; ;if (  $this->magic_vars['item']['phone_status']==1): ?>已认证<? else: ?><font color="#FF0000">未认证</font><? endif; ?></td>
		<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['vip_status'])) $this->magic_vars['item']['vip_status']=''; ;if (  $this->magic_vars['item']['vip_status']==1): ?>VIP会员<? else: ?>普通会员<? endif; ?></td>
		<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
		<td class="main_td1" align="center"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view_all&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">查看全部资料</a> </td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="10" class="action">
				<div class="floatl">
				</div>
				<div class="floatr">
					用户名：<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> 姓名：<input type="text" name="realname" id="realname" value="<? if (!isset($_REQUEST['realname'])) $_REQUEST['realname'] = '';$_tmp = $_REQUEST['realname'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>
					<input type="button" value="搜索" onclick="sousuo()" />
				</div>
				<script>
					var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/viewall';
					
					function sousuo(){
						var username = $("#username").val();
						var realname = $("#realname").val();
						var keywords = $("#keywords").val();
						location.href=url+"&keywords="+encodeURI(keywords)+"&realname="+realname;
					}
					
				</script>

			</td>
		</tr>
		<tr>
			<td colspan="10" class="page">
				<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
			</td>
		</tr>
	</table>
	<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view_all"): ?>
	<div class="module_add">

		<div class="module_title"><strong>用户信息查看</strong></div>

		<div class="module_border">
			<div class="l">用户名:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = ''; echo $this->magic_vars['_A']['user_result']['username']; ?>
			</div>
		</div>
		<div class="module_border">
			<div class="l">登陆次数:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['logintime'])) $this->magic_vars['_A']['user_result']['logintime'] = ''; echo $this->magic_vars['_A']['user_result']['logintime']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">最后登录时间:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['lasttime'])) $this->magic_vars['_A']['user_result']['lasttime'] = '';$_tmp = $this->magic_vars['_A']['user_result']['lasttime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="l">注册时间:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['addtime'])) $this->magic_vars['_A']['user_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['user_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_title"><strong>账号详情</strong></div>
		<? $data = array('user_id'=>isset($_REQUEST['user_id'])?$_REQUEST['user_id']:'','var'=>'acc');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>
		<div class="module_border">
			<div class="w">账户总额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">可用余额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['use_money'])) $this->magic_vars['acc']['use_money'] = '';$_tmp = $this->magic_vars['acc']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">冻结总额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">待收总额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['collection'])) $this->magic_vars['acc']['collection'] = '';$_tmp = $this->magic_vars['acc']['collection'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">待收利息:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['collection_interest0'])) $this->magic_vars['acc']['collection_interest0'] = '';$_tmp = $this->magic_vars['acc']['collection_interest0'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">最近待收金额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['new_collection_account'])) $this->magic_vars['acc']['new_collection_account'] = '';$_tmp = $this->magic_vars['acc']['new_collection_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">已赚利息:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['collection_interest1'])) $this->magic_vars['acc']['collection_interest1'] = '';$_tmp = $this->magic_vars['acc']['collection_interest1'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">已赚奖励:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['award_add'])) $this->magic_vars['acc']['award_add'] = '';$_tmp = $this->magic_vars['acc']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">借款总额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['borrow_num'])) $this->magic_vars['acc']['borrow_num'] = '';$_tmp = $this->magic_vars['acc']['borrow_num'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">待还总额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['wait_payment'])) $this->magic_vars['acc']['wait_payment'] = '';$_tmp = $this->magic_vars['acc']['wait_payment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">最近待还金额:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['new_repay_account'])) $this->magic_vars['acc']['new_repay_account'] = '';$_tmp = $this->magic_vars['acc']['new_repay_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">待扣会费:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['_U']['user_cache']['vip_money'])) $this->magic_vars['_U']['user_cache']['vip_money']='';if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_U']['user_cache']['vip_money']=="" &&  $this->magic_vars['_G']['user_result']['vip_status']==1): ?><? if (!isset($this->magic_vars['_G']['system']['con_vip_money'])) $this->magic_vars['_G']['system']['con_vip_money'] = ''; echo $this->magic_vars['_G']['system']['con_vip_money']; ?><? else: ?>0<? endif; ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">信用额度:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['credit'])) $this->magic_vars['acc']['credit'] = '';$_tmp = $this->magic_vars['acc']['credit'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">可用信用额度:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['credit_use'])) $this->magic_vars['acc']['credit_use'] = '';$_tmp = $this->magic_vars['acc']['credit_use'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">借款担保额度:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['borrow_vouch'])) $this->magic_vars['acc']['borrow_vouch'] = '';$_tmp = $this->magic_vars['acc']['borrow_vouch'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">可用借款担保额度:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['borrow_vouch_use'])) $this->magic_vars['acc']['borrow_vouch_use'] = '';$_tmp = $this->magic_vars['acc']['borrow_vouch_use'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w">投资担保额度:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['tender_vouch'])) $this->magic_vars['acc']['tender_vouch'] = '';$_tmp = $this->magic_vars['acc']['tender_vouch'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">可用投资担保额度:</div>
			<div class="h">
				￥<? if (!isset($this->magic_vars['acc']['tender_vouch_use'])) $this->magic_vars['acc']['tender_vouch_use'] = '';$_tmp = $this->magic_vars['acc']['tender_vouch_use'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="w"> 最近待收时间:</div>
			<div class="h">
				<? if (!isset($this->magic_vars['acc']['new_collection_time'])) $this->magic_vars['acc']['new_collection_time'] = '';$_tmp = $this->magic_vars['acc']['new_collection_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">最近待还时间:</div>
			<div class="h">
				<? if (!isset($this->magic_vars['acc']['new_repay_time'])) $this->magic_vars['acc']['new_repay_time'] = '';$_tmp = $this->magic_vars['acc']['new_repay_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");$_tmp = $this->magic_modifier("default",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<? unset($_magic_vars);unset($data); ?>
		<div class="module_title"><strong>已成功投资的借款</strong></div>
		<table width="1000" border="1">
			<tr>
				<td  ><strong>标题</strong></td>
				<td  ><strong>借款者</strong></td>
				<td  ><strong>借款者积分</strong></td>
				<td  ><strong>金额(元)</strong></td>
				<td  ><strong>年利率</strong></td>
				<td  ><strong>期限</strong></td>
				<td  ><strong>投标时间</strong></td>
				<td  ><strong>应收本息</strong></td>
				<td  ><strong>借出金额</strong></td>
			</tr>
			<? $this->magic_vars['query_type']='GetBorrowSucces';$data = array('var'=>'loop','showpage'=>'3','user_id'=>isset($_REQUEST['user_id'])?$_REQUEST['user_id']:'','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','type'=>$_REQUEST['type']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetBorrowSucces($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
			<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<tr>
				<td title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><pre><a href="/invest/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></pre></td>
				<td  ><pre><a href="/index.php?user&q=code/message/sent&receive=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></pre></td>
				<td  ><pre><? if (!isset($this->magic_vars['item']['credit'])) $this->magic_vars['item']['credit'] = '';$_tmp = $this->magic_vars['item']['credit'];$_tmp = $this->magic_modifier("credit",$_tmp,"");echo $_tmp;unset($_tmp); ?><? if (!isset($this->magic_vars['item']['credit'])) $this->magic_vars['item']['credit'] = ''; echo $this->magic_vars['item']['credit']; ?>分</pre></td>
				<td  ><pre>￥<? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></pre></td>
				<td  ><pre><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?>%</pre></td>
				<td  ><pre><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>天<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>个月<? endif; ?></pre></td>
				<td  ><pre><? if (!isset($this->magic_vars['item']['tender_time'])) $this->magic_vars['item']['tender_time'] = '';$_tmp = $this->magic_vars['item']['tender_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></pre></td>
				<td  ><pre>￥<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></pre></td>
				<td  ><pre>￥<? if (!isset($this->magic_vars['item']['anum'])) $this->magic_vars['item']['anum'] = ''; echo $this->magic_vars['item']['anum']; ?></pre></td>
			</tr>
			<? endforeach; endif; unset($_from); ?>
			<td colspan="11" class="page">
				<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
			</td>
			<? unset($_magic_vars); ?>
		</table>

		<div class="module_title"><strong>正在招标的借款</strong></div>
		<table width="1000" border="1">
			<tr>
				<td  ><strong>标题</strong></td>
				<td  ><strong>类型</strong></td>
				<td  ><strong>金额(元)</strong></td>
				<td  ><strong>年利率</strong></td>
				<td  ><strong>期限</strong></td>
				<td  ><strong>发布时间</strong></td>
				<td  ><strong>进度</strong></td>
				<td  ><strong>状态</strong></td>
			</tr>
			
			<style>
				.rate_tiao{width:auto;background-color: #F90;position: relative;top:-21px;float:left;height:10px;overflow:hidden;line-height;10px;}
				* html .rate_tiao{top:-1px;left:-1px;}
				.main_content .tr1 td{
					border-top-style: none;
					border-right-style: none;
					border-bottom-style: none;
					border-left-style: none;
				}
			</style>
			
			<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','showpage'=>'3','user_id'=>isset($_REQUEST['user_id'])?$_REQUEST['user_id']:'','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','dotime1'=>isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:'','dotime2'=>isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:'','status'=>'0,1,2,4,5,6');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
			<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?> >
			<td><pre><a href="/invest/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"12");echo $_tmp;unset($_tmp); ?></a></pre></td>
			<td  ><pre><? if (!isset($this->magic_vars['item']['is_vouch'])) $this->magic_vars['item']['is_vouch']=''; ;if (  $this->magic_vars['item']['is_vouch']==1): ?>担保标<? else: ?>普通标<? endif; ?></pre></td>
			<td  ><pre><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>元</pre></td>
			<td  ><pre><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?> %</pre></td>
			<td  ><pre><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>天<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>个月<? endif; ?></pre></td>
			<td  ><pre><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></pre></td>
			<td  ><pre><div align="left" style="width:87px;border: 1px solid #CCC;padding:1px;overflow:hidden;line-height:10px;height:10px; ">
				<div  class="rate_tiao" style=" width:<? if (!isset($this->magic_vars['item']['scale_width'])) $this->magic_vars['item']['scale_width'] = '';$_tmp = $this->magic_vars['item']['scale_width'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>px;"></div>
			</div><span><? if (!isset($this->magic_vars['item']['scale'])) $this->magic_vars['item']['scale'] = ''; echo $this->magic_vars['item']['scale']; ?>%</span></pre></td>
			<td  ><pre><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>发布审批中<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==1): ?><? if (!isset($this->magic_vars['item']['account_yes'])) $this->magic_vars['item']['account_yes']='';if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account']=''; ;if (  $this->magic_vars['item']['account_yes']== $this->magic_vars['item']['account']): ?>满标审核中<? else: ?>正在募集<? endif; ?><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>审核失败<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==3): ?>已满标<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==4): ?>满标审核失败<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==5): ?>撤回<? endif; ?></pre></td>

			</tr>
			<? endforeach; endif; unset($_from); ?>
			<tr >
				<td colspan="8" class="page">
					<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>
				</td>

			</tr>
			<? unset($_magic_vars); ?>
		</table>
		<div class="module_title"><strong>实名认证信息</strong></div>
		<div class="module_border">
			<div class="l">真实姓名 :</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['user_result']['realname'])) $this->magic_vars['_A']['user_result']['realname'] = ''; echo $this->magic_vars['_A']['user_result']['realname']; ?>
			</div>
			<div class="l">性别 :</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['sex'])) $this->magic_vars['_A']['user_result']['sex']=''; ;if (  $this->magic_vars['_A']['user_result']['sex']==1): ?>男<? else: ?>女<? endif; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">证件类型:</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['user_result']['card_type'])) $this->magic_vars['_A']['user_result']['card_type'] = '';$_tmp = $this->magic_vars['_A']['user_result']['card_type'];$_tmp = $this->magic_modifier("linkage",$_tmp,"card_type");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="l">证件号码:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['card_id'])) $this->magic_vars['_A']['user_result']['card_id'] = ''; echo $this->magic_vars['_A']['user_result']['card_id']; ?>
			</div>
		</div>
		<div class="module_border">
			<div class="l">籍贯:</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['user_result']['area'])) $this->magic_vars['_A']['user_result']['area'] = '';$_tmp = $this->magic_vars['_A']['user_result']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="l">身份证图片:</div>
			<div class="c">
				<a href="<? if (!isset($this->magic_vars['_A']['user_result']['card_pic1'])) $this->magic_vars['_A']['user_result']['card_pic1'] = ''; echo $this->magic_vars['_A']['user_result']['card_pic1']; ?>" target="_blank">正面</a> | <a href="<? if (!isset($this->magic_vars['_A']['user_result']['card_pic2'])) $this->magic_vars['_A']['user_result']['card_pic2'] = ''; echo $this->magic_vars['_A']['user_result']['card_pic2']; ?>" target="_blank">反面</a>
			</div>
		</div>

		<div class="module_border">
			<div class="l">民族:</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['user_result']['nation'])) $this->magic_vars['_A']['user_result']['nation'] = '';$_tmp = $this->magic_vars['_A']['user_result']['nation'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="l">生日:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['birthday'])) $this->magic_vars['_A']['user_result']['birthday'] = '';$_tmp = $this->magic_vars['_A']['user_result']['birthday'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['real_status'])) $this->magic_vars['_A']['user_result']['real_status']=''; ;if (  $this->magic_vars['_A']['user_result']['real_status']==1): ?>已通过认证<? else: ?>未通过认证 <? endif; ?>
			</div>
		</div>

		<div class="module_title"><strong>邮箱认证信息</strong></div>
		<div class="module_border">
			<div class="l">邮箱 :</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['user_result']['email'])) $this->magic_vars['_A']['user_result']['email'] = ''; echo $this->magic_vars['_A']['user_result']['email']; ?>
			</div>

		</div>
		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['email_status'])) $this->magic_vars['_A']['user_result']['email_status']=''; ;if (  $this->magic_vars['_A']['user_result']['email_status']==1): ?>邮箱已通过认证<? else: ?>未通过认证<? endif; ?>
			</div>
		</div>
		<div class="module_title"><strong>视频认证</strong></div>

		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['video_status'])) $this->magic_vars['_A']['user_result']['video_status']=''; ;if (  $this->magic_vars['_A']['user_result']['video_status']==1): ?>已通过视频认证<? if (!isset($this->magic_vars['_A']['user_result']['video_status'])) $this->magic_vars['_A']['user_result']['video_status']=''; ;elseif (  $this->magic_vars['_A']['user_result']['video_status']==2): ?>视频认证申请中<? else: ?>未通过视频认证 <? endif; ?>
			</div>
		</div>
		<div class="module_title"><strong>现场认证</strong></div>

		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['scene_status'])) $this->magic_vars['_A']['user_result']['scene_status']=''; ;if (  $this->magic_vars['_A']['user_result']['scene_status']==1): ?>已通过现场认证<? if (!isset($this->magic_vars['_A']['user_result']['scene_status'])) $this->magic_vars['_A']['user_result']['scene_status']=''; ;elseif (  $this->magic_vars['_A']['user_result']['scene_status']==2): ?>现场认证申请中<? else: ?>未通过现场认证 <? endif; ?>
			</div>
		</div>
		<div class="module_title"><strong>手机认证信息</strong></div>
		<div class="module_border">
			<div class="l">手机号 :</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['user_result']['phone'])) $this->magic_vars['_A']['user_result']['phone'] = '';$_tmp = $this->magic_vars['_A']['user_result']['phone'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['phone_status'])) $this->magic_vars['_A']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_A']['user_result']['phone_status']==1): ?>手机已通过认证<? else: ?>未通过认证 <? endif; ?>
			</div>
		</div>


		<div class="module_title"><strong>VIP认证信息</strong></div>
		<div class="module_border">
			<div class="l">申请备注:</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['user_result']['vip_verify_remark'])) $this->magic_vars['_A']['user_result']['vip_verify_remark'] = ''; echo $this->magic_vars['_A']['user_result']['vip_verify_remark']; ?>
			</div>
		</div>
		<div class="module_border">
			<div class="l">状态:</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['user_result']['vip_status'])) $this->magic_vars['_A']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_A']['user_result']['vip_status']==1): ?>VIP会员<? else: ?>未通过 <? endif; ?>
			</div>
		</div>
		<div class="module_title"><strong>用户基本信息</strong></div>

		<div class="module_border">
			<div class="w">婚姻状况：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['marry'])) $this->magic_vars['_A']['userinfo_result']['marry'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['marry'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>

			<div class="w">子 女：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['child'])) $this->magic_vars['_A']['userinfo_result']['child'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['child'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">学 历：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['education'])) $this->magic_vars['_A']['userinfo_result']['education'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['education'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">月收入：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['income'])) $this->magic_vars['_A']['userinfo_result']['income'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['income'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">社 保：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['shebao'])) $this->magic_vars['_A']['userinfo_result']['shebao'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['shebao'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">社保电脑号：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['shebaoid'])) $this->magic_vars['_A']['userinfo_result']['shebaoid'] = ''; echo $this->magic_vars['_A']['userinfo_result']['shebaoid']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">住房条件：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['housing'])) $this->magic_vars['_A']['userinfo_result']['housing'] = ''; echo $this->magic_vars['_A']['userinfo_result']['housing']; ?>
			</div>
			<div class="w">是否购车：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['car'])) $this->magic_vars['_A']['userinfo_result']['car'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['car'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">逾期记录：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['late'])) $this->magic_vars['_A']['userinfo_result']['late'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['late'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_title"><strong>房产资料</strong></div>
		<div class="module_border">
			<div class="w">房产地址：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_address'])) $this->magic_vars['_A']['userinfo_result']['house_address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_address']; ?>
			</div>
			<div class="w">建筑面积：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_area'])) $this->magic_vars['_A']['userinfo_result']['house_area'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_area']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">建筑年份：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_year'])) $this->magic_vars['_A']['userinfo_result']['house_year'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['house_year'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">供款状况：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_status'])) $this->magic_vars['_A']['userinfo_result']['house_status'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_status']; ?> 元
			</div>
		</div>

		<div class="module_border">
			<div class="w">所有权人1：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_holder1'])) $this->magic_vars['_A']['userinfo_result']['house_holder1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_holder1']; ?> 产权份额<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_right1'])) $this->magic_vars['_A']['userinfo_result']['house_right1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_right1']; ?>
			</div>
			<div class="w">所有权人2：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_holder2'])) $this->magic_vars['_A']['userinfo_result']['house_holder2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_holder2']; ?> 产权份额<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_right2'])) $this->magic_vars['_A']['userinfo_result']['house_right2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_right2']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">若房产尚在按揭中, 请填写：</div>
			<div class="h">
				贷款年限：<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_loanyear'])) $this->magic_vars['_A']['userinfo_result']['house_loanyear'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_loanyear']; ?> 每月供款 <? if (!isset($this->magic_vars['_A']['userinfo_result']['house_loanprice'])) $this->magic_vars['_A']['userinfo_result']['house_loanprice'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_loanprice']; ?> 元
			</div>
			<div class="w">尚欠贷款余额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_balance'])) $this->magic_vars['_A']['userinfo_result']['house_balance'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_balance']; ?> 元
			</div>
		</div>

		<div class="module_border">
			<div class="w">按揭银行：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_bank'])) $this->magic_vars['_A']['userinfo_result']['house_bank'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_bank']; ?>
			</div>
		</div>

		<div class="module_title"><strong>公司资料</strong></div>
		<div class="module_border">
			<div class="w">公司名称：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_name'])) $this->magic_vars['_A']['userinfo_result']['company_name'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_name']; ?>
			</div>
			<div class="w">公司性质：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_type'])) $this->magic_vars['_A']['userinfo_result']['company_type'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['company_type'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">公司行业：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_industry'])) $this->magic_vars['_A']['userinfo_result']['company_industry'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['company_industry'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">工作级别：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_jibie'])) $this->magic_vars['_A']['userinfo_result']['company_jibie'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['company_jibie'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">职 位：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_office'])) $this->magic_vars['_A']['userinfo_result']['company_office'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['company_office'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">服务时间：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_worktime1'])) $this->magic_vars['_A']['userinfo_result']['company_worktime1'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['company_worktime1'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>  到<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_worktime2'])) $this->magic_vars['_A']['userinfo_result']['company_worktime2'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['company_worktime2'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">工作年限：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_workyear'])) $this->magic_vars['_A']['userinfo_result']['company_workyear'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['company_workyear'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">工作电话：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_tel'])) $this->magic_vars['_A']['userinfo_result']['company_tel'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_tel']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">公司地址：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_address'])) $this->magic_vars['_A']['userinfo_result']['company_address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_address']; ?>
			</div>
			<div class="w">公司网站：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_weburl'])) $this->magic_vars['_A']['userinfo_result']['company_weburl'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_weburl']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">公司备注说明：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_reamrk'])) $this->magic_vars['_A']['userinfo_result']['company_reamrk'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_reamrk']; ?>
			</div>
		</div>

		<div class="module_title"><strong>私营业主资料</strong></div>
		<div class="module_border">
			<div class="w">私营企业类型：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_type'])) $this->magic_vars['_A']['userinfo_result']['private_type'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['private_type'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">成立日期：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_date'])) $this->magic_vars['_A']['userinfo_result']['private_date'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['private_date'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">经营场所：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_place'])) $this->magic_vars['_A']['userinfo_result']['private_place'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_place']; ?>
			</div>
			<div class="w">租金：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_rent'])) $this->magic_vars['_A']['userinfo_result']['private_rent'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_rent']; ?>元
			</div>
		</div>

		<div class="module_border">
			<div class="w">租期：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_term'])) $this->magic_vars['_A']['userinfo_result']['private_term'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_term']; ?> 月
			</div>
			<div class="w">税务编号：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_taxid'])) $this->magic_vars['_A']['userinfo_result']['private_taxid'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_taxid']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">工商登记号：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_commerceid'])) $this->magic_vars['_A']['userinfo_result']['private_commerceid'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_commerceid']; ?>
			</div>
			<div class="w">全年盈利/亏损额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_income'])) $this->magic_vars['_A']['userinfo_result']['private_income'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_income']; ?> 元（年度）
			</div>
		</div>

		<div class="module_border">
			<div class="w">雇员人数：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_employee'])) $this->magic_vars['_A']['userinfo_result']['private_employee'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_employee']; ?>  人
			</div>
		</div>
		<div class="module_title"><strong>财务状况</strong></div>
		<div class="module_border">
			<div class="w">每月无抵押贷款还款额：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_repayment'])) $this->magic_vars['_A']['userinfo_result']['finance_repayment'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_repayment']; ?> 元
			</div>
			<div class="w">自有房产：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_property'])) $this->magic_vars['_A']['userinfo_result']['finance_property'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['finance_property'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">每月房屋按揭金额：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_amount'])) $this->magic_vars['_A']['userinfo_result']['finance_amount'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_amount']; ?> 元
			</div>
			<div class="w">自有汽车：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_car'])) $this->magic_vars['_A']['userinfo_result']['finance_car'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['finance_car'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">每月汽车按揭金额：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_caramount'])) $this->magic_vars['_A']['userinfo_result']['finance_caramount'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_caramount']; ?> 元
			</div>
			<div class="w">每月信用卡还款金额：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_creditcard'])) $this->magic_vars['_A']['userinfo_result']['finance_creditcard'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_creditcard']; ?> 元
			</div>
		</div>
		<div class="module_title"><strong>联系方式</strong></div>
		<div class="module_border">
			<div class="w">居住地电话：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel'])) $this->magic_vars['_A']['userinfo_result']['tel'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel']; ?>
			</div>

			<div class="w">手机号码：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone'])) $this->magic_vars['_A']['userinfo_result']['phone'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">居住所在省市：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['area'])) $this->magic_vars['_A']['userinfo_result']['area'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="w">居住地邮编：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['post'])) $this->magic_vars['_A']['userinfo_result']['post'] = ''; echo $this->magic_vars['_A']['userinfo_result']['post']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">现居住地址：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['address'])) $this->magic_vars['_A']['userinfo_result']['address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['address']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">第二联系人姓名：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['linkman1'])) $this->magic_vars['_A']['userinfo_result']['linkman1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['linkman1']; ?>
			</div>
			<div class="w">第二联系人关系：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['relation1'])) $this->magic_vars['_A']['userinfo_result']['relation1'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['relation1'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">第二联系人联系电话：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel1'])) $this->magic_vars['_A']['userinfo_result']['tel1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel1']; ?>
			</div>
			<div class="w">第二联系人联系手机：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone1'])) $this->magic_vars['_A']['userinfo_result']['phone1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone1']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">第三联系人姓名：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['linkman2'])) $this->magic_vars['_A']['userinfo_result']['linkman2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['linkman2']; ?>
			</div>
			<div class="w">第三联系人关系：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['relation2'])) $this->magic_vars['_A']['userinfo_result']['relation2'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['relation2'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">第三联系人联系电话：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel2'])) $this->magic_vars['_A']['userinfo_result']['tel2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel2']; ?>
			</div>
			<div class="w">第三联系人联系手机：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone2'])) $this->magic_vars['_A']['userinfo_result']['phone2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone2']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">第四联系人姓名：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['linkman3'])) $this->magic_vars['_A']['userinfo_result']['linkman3'] = ''; echo $this->magic_vars['_A']['userinfo_result']['linkman3']; ?>
			</div>
			<div class="w">第四联系人关系：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['relation3'])) $this->magic_vars['_A']['userinfo_result']['relation3'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['relation3'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">第四联系人联系电话：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel3'])) $this->magic_vars['_A']['userinfo_result']['tel3'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel3']; ?>
			</div>
			<div class="w">第四联系人联系手机：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone3'])) $this->magic_vars['_A']['userinfo_result']['phone3'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone3']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">MSN：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['msn'])) $this->magic_vars['_A']['userinfo_result']['msn'] = ''; echo $this->magic_vars['_A']['userinfo_result']['msn']; ?>
			</div>
			<div class="w">QQ：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['qq'])) $this->magic_vars['_A']['userinfo_result']['qq'] = ''; echo $this->magic_vars['_A']['userinfo_result']['qq']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="w">旺旺：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['wangwang'])) $this->magic_vars['_A']['userinfo_result']['wangwang'] = ''; echo $this->magic_vars['_A']['userinfo_result']['wangwang']; ?>
			</div>
		</div>
		<div class="module_title"><strong>配偶资料</strong></div>
		<div class="module_border">
			<div class="l">配偶姓名：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_name'])) $this->magic_vars['_A']['userinfo_result']['mate_name'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_name']; ?>
			</div>
			<div class="l">每月薪金：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_salary'])) $this->magic_vars['_A']['userinfo_result']['mate_salary'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_salary']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">移动电话：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_phone'])) $this->magic_vars['_A']['userinfo_result']['mate_phone'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_phone']; ?>
			</div>
			<div class="l">单位电话：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_tel'])) $this->magic_vars['_A']['userinfo_result']['mate_tel'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_tel']; ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">工作单位：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_type'])) $this->magic_vars['_A']['userinfo_result']['mate_type'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['mate_type'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
			<div class="l">职位：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_office'])) $this->magic_vars['_A']['userinfo_result']['mate_office'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['mate_office'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">单位地址：</div>
			<div class="h">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_address'])) $this->magic_vars['_A']['userinfo_result']['mate_address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_address']; ?>
			</div>
			<div class="l">月收入：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_income'])) $this->magic_vars['_A']['userinfo_result']['mate_income'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_income']; ?>
			</div>
		</div>
		<div class="module_title"><strong>其他信息</strong></div>
		<div class="module_border">
			<div class="l">个人能力：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['ability'])) $this->magic_vars['_A']['userinfo_result']['ability'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['ability'];$_tmp = $this->magic_modifier("nl2br",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">个人爱好：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['interest'])) $this->magic_vars['_A']['userinfo_result']['interest'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['interest'];$_tmp = $this->magic_modifier("nl2br",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

		<div class="module_border">
			<div class="l">其他说明：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_A']['userinfo_result']['others'])) $this->magic_vars['_A']['userinfo_result']['others'] = '';$_tmp = $this->magic_vars['_A']['userinfo_result']['others'];$_tmp = $this->magic_modifier("nl2br",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>

	</div>
	<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "jifen"): ?>
	<form method="post">
		<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
			<tr >
				<td width="" class="main_td">ID</td>
				<td width="*" class="main_td">用户名</td>
				<td width="*" class="main_td">真实姓名</td>
				<th width="" class="main_td">认证名称</th>
				<th width="" class="main_td">认证积分</th>
				<th width="" class="main_td">备注</th>
				<th width="" class="main_td">审核时间</th>
			</tr>
			<?  if(!isset($this->magic_vars['_A']['jifen_result']) || $this->magic_vars['_A']['jifen_result']=='') $this->magic_vars['_A']['jifen_result'] = array();  $_from = $this->magic_vars['_A']['jifen_result']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><input type="hidden" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" name="id[]" /></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['typename'])) $this->magic_vars['item']['typename'] = ''; echo $this->magic_vars['item']['typename']; ?></td>
			<td class="main_td1" align="center"><input type="text" value="<? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = ''; echo $this->magic_vars['item']['value']; ?>" size="5" name="val[]" /></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?><input type="hidden" name="user_id" value="<? if (!isset($_REQUEST['user_id'])) $_REQUEST['user_id'] = ''; echo $_REQUEST['user_id']; ?>" /></td>
			</tr>
			<? endforeach; endif; unset($_from); ?>
			<tr >
				<td colspan="7"><input type="submit" value="修改积分" /></td>
			</tr>
		</table>
	</form>
	<? endif; ?>