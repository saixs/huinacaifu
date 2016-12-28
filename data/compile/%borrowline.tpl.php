<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	<? if (!isset($_REQUEST['user_id'])) $_REQUEST['user_id']=''; ;if (  $_REQUEST['user_id']==""): ?>
	<form name="form1" method="post" action="" enctype="multipart/form-data" >
	<div class="module_title"><strong>请输入此信息的用户名或ID</strong></div>
	

	<div class="module_border">
		<div class="l">用户ID：</div>
		<div class="c">
			<input type="text" name="user_id"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_submit" >
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
	<? else: ?>
	<div class="module_title"><strong>机构信息</strong></div>
	
	<form name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return check_form();" >
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = '';$_tmp = $this->magic_vars['_A']['user_result']['username']; if (!isset($this->magic_vars['_A']['borrowline_result']['username'])) $this->magic_vars['_A']['borrowline_result']['username'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['borrowline_result']['username']);echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">贷款用途：</div>
		<div class="c">&nbsp;&nbsp;
		<? $result = $this->magic_vars['_G']['_linkage']['borrow_yongtu']; echo "<select name='borrow_use' id=borrow_use >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrowline_result']['borrow_use']==$val['id'] ) { echo "<option value='{$val['id']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['id']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">贷款期限：</div>
		<div class="c">&nbsp;&nbsp;
		<? $result = $this->magic_vars['_G']['_linkage']['borrow_qixian']; echo "<select name='borrow_qixian' id=borrow_qixian >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrowline_result']['borrow_qixian']==$val['id'] ) { echo "<option value='{$val['id']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['id']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?></div>
	</div>
	<div class="module_border">
		<div class="l">贷款地区:</div>
		<div class="c">&nbsp;&nbsp;<script src="/plugins/index.php?q=area&type=p,c&area=<? if (!isset($this->magic_vars['_A']['borrowline_result']['area'])) $this->magic_vars['_A']['borrowline_result']['area'] = ''; echo $this->magic_vars['_A']['borrowline_result']['area']; ?>"></script></div>
	</div>
	<div class="module_border">
		<div class="l">贷款金额:</div>
		<div class="c">&nbsp;&nbsp;<input type="text" name="account"  class="input_border"  size="6"  value="<? if (!isset($this->magic_vars['_A']['borrowline_result']['account'])) $this->magic_vars['_A']['borrowline_result']['account'] = ''; echo $this->magic_vars['_A']['borrowline_result']['account']; ?>"/>万元/单笔，若未满一万，填写小数如：0.5。</div>
	</div>
	<div class="module_border">
		<div class="l">有无抵押:</div>
		<div class="c">&nbsp;&nbsp;<input type="radio" name="pawn" value="1" checked="checked" <? if (!isset($this->magic_vars['_A']['borrowline_result']['pawn'])) $this->magic_vars['_A']['borrowline_result']['pawn']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['pawn']==1): ?> checked="checked"<? endif; ?> />有 <input type="radio" name="pawn" value="0"  <? if (!isset($this->magic_vars['_A']['borrowline_result']['pawn'])) $this->magic_vars['_A']['borrowline_result']['pawn']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['pawn']==0): ?> checked="checked"<? endif; ?> />无 </div>
	</div>
	<div class="module_border">
		<div class="l">贷款标题:</div>
		<div class="c">&nbsp;&nbsp;<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['borrowline_result']['name'])) $this->magic_vars['_A']['borrowline_result']['name'] = ''; echo $this->magic_vars['_A']['borrowline_result']['name']; ?>" size="15" />如：急需建新房子贷款8万，至少8中文字。标题请勿填写姓名和联系方式</div>
	</div>
	<div class="module_border">
		<div class="l">姓名:</div>
		<div class="c">&nbsp;&nbsp;<input type="text" name="xing"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['borrowline_result']['xing'])) $this->magic_vars['_A']['borrowline_result']['xing'] = ''; echo $this->magic_vars['_A']['borrowline_result']['xing']; ?>" size="5" /><input type="radio" name="sex" value="1" <? if (!isset($this->magic_vars['_A']['borrowline_result']['sex'])) $this->magic_vars['_A']['borrowline_result']['sex']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['sex']==1): ?> checked="checked"<? endif; ?> />先生 <input type="radio" name="sex" value="2" <? if (!isset($this->magic_vars['_A']['borrowline_result']['sex'])) $this->magic_vars['_A']['borrowline_result']['sex']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['sex']==2): ?> checked="checked"<? endif; ?> />女士 为了保证你的隐私，您只需要填写姓，最多两个中文字。如：李</div>
	</div>
	<div class="module_border">
		<div class="l">联系电话:</div>
		<div class="c">&nbsp;&nbsp;<input type="text" name="tel"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['borrowline_result']['tel'])) $this->magic_vars['_A']['borrowline_result']['tel'] = ''; echo $this->magic_vars['_A']['borrowline_result']['tel']; ?>" size="20" /> 为了方便找到你，请填写您的手机号码</div>
	</div>
	
	<div class="module_border">
		<div class="l">邮箱:</div>
		<div class="c">&nbsp;&nbsp;<input type="text" name="email"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['borrowline_result']['email'])) $this->magic_vars['_A']['borrowline_result']['email'] = ''; echo $this->magic_vars['_A']['borrowline_result']['email']; ?>" size="20" /> 信息发布后可用该邮箱为账号登录查看您的申请状态</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">贷款说明:</div>
		<div class="c">&nbsp;&nbsp;<textarea name="content" class="input_border" style="height:80px;" cols="50" rows="5"><? if (!isset($this->magic_vars['_A']['borrowline_result']['content'])) $this->magic_vars['_A']['borrowline_result']['content'] = ''; echo $this->magic_vars['_A']['borrowline_result']['content']; ?></textarea></div>
	</div>
	
	<div class="module_submit" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden"  name="id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" /><? endif; ?>
		<input type="hidden"  name="user_id" value="<? if (!isset($_REQUEST['user_id'])) $_REQUEST['user_id'] = ''; echo $_REQUEST['user_id']; ?>" />
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
	
	
	<? endif; ?>
</div>

<script>


function check_form(){
	 var frm = document.forms['form1'];
	 var name = frm.elements['name'].value;
	 var award = frm.elements['award'].value;
	 var part_account = frm.elements['part_account'].value;
	 var errorMsg = '';
	  if (name.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	   if (award ==1 && part_account<5) {
		errorMsg += '奖励金额不能小于5元' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view"): ?>
<div class="module_title"><strong>机构信息</strong></div>
	
	<form name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return check_form();" >
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = '';$_tmp = $this->magic_vars['_A']['user_result']['username']; if (!isset($this->magic_vars['_A']['borrowline_result']['username'])) $this->magic_vars['_A']['borrowline_result']['username'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['borrowline_result']['username']);echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">贷款用途：</div>
		<div class="c">&nbsp;&nbsp;
		<? if (!isset($this->magic_vars['_A']['borrowline_result']['borrow_use'])) $this->magic_vars['_A']['borrowline_result']['borrow_use'] = '';$_tmp = $this->magic_vars['_A']['borrowline_result']['borrow_use'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">贷款期限：</div>
		<div class="c">&nbsp;&nbsp;
		<? if (!isset($this->magic_vars['_A']['borrowline_result']['borrow_qixian'])) $this->magic_vars['_A']['borrowline_result']['borrow_qixian'] = '';$_tmp = $this->magic_vars['_A']['borrowline_result']['borrow_qixian'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?></div>
	</div>
	<div class="module_border">
		<div class="l">贷款地区:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['area'])) $this->magic_vars['_A']['borrowline_result']['area'] = '';$_tmp = $this->magic_vars['_A']['borrowline_result']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"p,c");echo $_tmp;unset($_tmp); ?></div>
	</div>
	<div class="module_border">
		<div class="l">贷款金额:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['account'])) $this->magic_vars['_A']['borrowline_result']['account'] = ''; echo $this->magic_vars['_A']['borrowline_result']['account']; ?>万元/单笔</div>
	</div>
	<div class="module_border">
		<div class="l">有无抵押:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['pawn'])) $this->magic_vars['_A']['borrowline_result']['pawn']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['pawn']==1): ?> 有<? else: ?>无<? endif; ?> </div>
	</div>
	<div class="module_border">
		<div class="l">贷款标题:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['name'])) $this->magic_vars['_A']['borrowline_result']['name'] = ''; echo $this->magic_vars['_A']['borrowline_result']['name']; ?></div>
	</div>
	<div class="module_border">
		<div class="l">姓名:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['xing'])) $this->magic_vars['_A']['borrowline_result']['xing'] = ''; echo $this->magic_vars['_A']['borrowline_result']['xing']; ?> <? if (!isset($this->magic_vars['_A']['borrowline_result']['sex'])) $this->magic_vars['_A']['borrowline_result']['sex']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['sex']==1): ?>先生<? else: ?>女士<? endif; ?></div>
	</div>
	<div class="module_border">
		<div class="l">联系电话:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['tel'])) $this->magic_vars['_A']['borrowline_result']['tel'] = ''; echo $this->magic_vars['_A']['borrowline_result']['tel']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">邮箱:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['email'])) $this->magic_vars['_A']['borrowline_result']['email'] = ''; echo $this->magic_vars['_A']['borrowline_result']['email']; ?></div>
	</div>
	
	
	<div class="module_border">
		<div class="l">贷款说明:</div>
		<div class="c">&nbsp;&nbsp;<? if (!isset($this->magic_vars['_A']['borrowline_result']['content'])) $this->magic_vars['_A']['borrowline_result']['content'] = ''; echo $this->magic_vars['_A']['borrowline_result']['content']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">&nbsp;&nbsp;<input type="radio" name="status" value="1" <? if (!isset($this->magic_vars['_A']['borrowline_result']['status'])) $this->magic_vars['_A']['borrowline_result']['status']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['status']==1): ?> checked="checked"<? endif; ?> />通过<input type="radio" name="status" value="2" <? if (!isset($this->magic_vars['_A']['borrowline_result']['status'])) $this->magic_vars['_A']['borrowline_result']['status']=''; ;if (  $this->magic_vars['_A']['borrowline_result']['status']==2): ?> checked="checked"<? endif; ?> />不通过</div>
	</div>
	
	<div class="module_border">
		<div class="l">贷款说明:</div>
		<div class="c">&nbsp;&nbsp;<textarea name="verify_remark" class="input_border" style="height:80px;" cols="50" rows="5"><? if (!isset($this->magic_vars['_A']['borrowline_result']['verify_remark'])) $this->magic_vars['_A']['borrowline_result']['verify_remark'] = ''; echo $this->magic_vars['_A']['borrowline_result']['verify_remark']; ?></textarea></div>
	</div> 
	
	<div class="module_submit" >
		<input type="hidden"  name="id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" />
		<input type="hidden"  name="user_id" value="<? if (!isset($_REQUEST['user_id'])) $_REQUEST['user_id'] = ''; echo $_REQUEST['user_id']; ?>" />
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
</div>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
			<td width="*" class="main_td">用户名</td>
			<td width="" class="main_td">姓名</td>
			<td width="" class="main_td">标题</td>
			<td width="" class="main_td">借款金额</td>
			<td width="" class="main_td">电话</td>
			<td width="" class="main_td">添加时间</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">操作</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrowline_list']) || $this->magic_vars['_A']['borrowline_list']=='') $this->magic_vars['_A']['borrowline_list'] = array();  $_from = $this->magic_vars['_A']['borrowline_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td class="main_td1" align="center" ><input type="checkbox" name="aid[]" id="aid[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>"/></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['xing'])) $this->magic_vars['item']['xing'] = ''; echo $this->magic_vars['item']['xing']; ?><? if (!isset($this->magic_vars['item']['sex'])) $this->magic_vars['item']['sex']=''; ;if (  $this->magic_vars['item']['sex']==1): ?>先生<? else: ?>女士<? endif; ?></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"34");echo $_tmp;unset($_tmp); ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['tel'])) $this->magic_vars['item']['tel'] = ''; echo $this->magic_vars['item']['tel']; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?>审核通过<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status'] ==2): ?>审核失败<? else: ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">待审核</a><? endif; ?></td>
			<td class="main_td1" align="center" ><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">修改</a> <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">删除</a></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/> <input type="button" value="搜索" / onclick="sousuo()">
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

function sousuo(){
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var status = $("#status").val();
	if (status!=""){
		sou += "&status="+status;
	}
	if (sou!=""){
	location.href=url+sou;
	}
}
</script>


<? endif; ?>