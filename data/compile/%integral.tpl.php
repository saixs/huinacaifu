<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>编辑<? else: ?>添加<? endif; ?>积分</strong></div>
	
	<div class="module_border">
		<div class="l">礼品名称：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['integral_result']['name'])) $this->magic_vars['_A']['integral_result']['name'] = ''; echo $this->magic_vars['_A']['integral_result']['name']; ?>" size="30" />
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">属性：</div>
		<div class="c">
			<?  if(!isset($this->magic_vars['_A']['flag_list']) || $this->magic_vars['_A']['flag_list']=='') $this->magic_vars['_A']['flag_list'] = array();  $_from = $this->magic_vars['_A']['flag_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?><input type="checkbox" name="flag[]" value="<? if (!isset($this->magic_vars['var']['nid'])) $this->magic_vars['var']['nid'] = ''; echo $this->magic_vars['var']['nid']; ?>" <? if (!isset($this->magic_vars['var']['nid'])) $this->magic_vars['var']['nid'] = '';$_tmp = $this->magic_vars['var']['nid']; if (!isset($this->magic_vars['_A']['integral_result']['flag'])) $this->magic_vars['_A']['integral_result']['flag'] = '';
$_tmp = $this->magic_modifier("checked",$_tmp,$this->magic_vars['_A']['integral_result']['flag']);echo $_tmp;unset($_tmp); ?>/><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?> <? endforeach; endif; unset($_from); ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			<select name="type">
				<option value="0">选择类型</option>
			<?  if(!isset($this->magic_vars['_A']['integral_type']) || $this->magic_vars['_A']['integral_type']=='') $this->magic_vars['_A']['integral_type'] = array();  $_from = $this->magic_vars['_A']['integral_type']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
				<option value="<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>" <? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id']='';if (!isset($this->magic_vars['_A']['integral_result']['type'])) $this->magic_vars['_A']['integral_result']['type']=''; ;if (  $this->magic_vars['var']['id']== $this->magic_vars['_A']['integral_result']['type']): ?>selected="selected"<? endif; ?>><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></option>
			<? endforeach; endif; unset($_from); ?>
			</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['_A']['integral_result']['status'])) $this->magic_vars['_A']['integral_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_result']['status'] == 0): ?>checked="checked"<? endif; ?>/>隐藏 <input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['_A']['integral_result']['status'])) $this->magic_vars['_A']['integral_result']['status']='';if (!isset($this->magic_vars['_A']['integral_result']['status'])) $this->magic_vars['_A']['integral_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_result']['status'] ==1 || $this->magic_vars['_A']['integral_result']['status'] ==""): ?>checked="checked"<? endif; ?>/>显示 
		</div>
	</div>

	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['integral_result']['order'])) $this->magic_vars['_A']['integral_result']['order'] = '';$_tmp = $this->magic_vars['_A']['integral_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" size="10" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">缩略图：</div>
		<div class="c">
			<input type="file" name="litpic" size="30" class="input_border"/><? if (!isset($this->magic_vars['_A']['integral_result']['litpic'])) $this->magic_vars['_A']['integral_result']['litpic']=''; ;if (  $this->magic_vars['_A']['integral_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['integral_result']['litpic'])) $this->magic_vars['_A']['integral_result']['litpic'] = ''; echo $this->magic_vars['_A']['integral_result']['litpic']; ?>" target="_blank" title="有图片"><img src="./<? if (!isset($this->magic_vars['_A']['integral_result']['litpic'])) $this->magic_vars['_A']['integral_result']['litpic'] = ''; echo $this->magic_vars['_A']['integral_result']['litpic']; ?>" width="154px" height="154" border="0"  /></a><input type="checkbox" name="clearlitpic" value="1" />去掉缩略图<? endif; ?>
		</div>
	</div>


	<div class="module_border">
		<div class="l">所需积分：</div>
		<div class="c">
			<input type="text" name="need"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['integral_result']['need'])) $this->magic_vars['_A']['integral_result']['need'] = ''; echo $this->magic_vars['_A']['integral_result']['need']; ?>" onkeyup="value=value.replace(/[^0-9]/g,'')" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">数量：</div>
		<div class="c">
			<input type="text" name="number"  class="input_border" onkeyup="value=value.replace(/[^0-9]/g,'')" value="<? if (!isset($this->magic_vars['_A']['integral_result']['number'])) $this->magic_vars['_A']['integral_result']['number'] = ''; echo $this->magic_vars['_A']['integral_result']['number']; ?>" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换城市：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=area&area=<? if (!isset($this->magic_vars['_A']['integral_result']['area'])) $this->magic_vars['_A']['integral_result']['area'] = ''; echo $this->magic_vars['_A']['integral_result']['area']; ?>" type='text/javascript' language="javascript"></script>
		</div>
	</div>

	<div class="module_border">
		<div class="l">活动积分：</div>
		<div class="c">
			<?  if (!isset($this->magic_vars['_A']['integral_result']['content'])) $this->magic_vars['_A']['integral_result']['content']=''; ; $name = "content" ; $value = $this->magic_vars['_A']['integral_result']['content'];require_once(ROOT_PATH ."/plugins/editor/sinaeditor/Editor.class.php");
$editor=new sinaEditor($name);
	$editor->Value= "$value";

	$editor->AutoSave=false;
	echo $editor->Create(); ?>
		</div>
	</div>
	
	<div class="module_submit border_b" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['integral_result']['id'])) $this->magic_vars['_A']['integral_result']['id'] = ''; echo $this->magic_vars['_A']['integral_result']['id']; ?>" /><? endif; ?>
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
</div>

<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var title = frm.elements['name'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	  if ($("#site_center").val()==""){
		errorMsg += '请选择栏目' + '\n';
	}
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{
		return true;
	  }
}

</script>



<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view"): ?>
<div class="module_add">
	<div class="module_title"><strong>查看</strong></div>
	
	<div class="module_border">
		<div class="l">物品名称：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['name'])) $this->magic_vars['_A']['integral_result']['name'] = ''; echo $this->magic_vars['_A']['integral_result']['name']; ?>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">属性：</div>
		<div class="c">
			 <? if (!isset($this->magic_vars['_A']['integral_result']['flag'])) $this->magic_vars['_A']['integral_result']['flag'] = '';$_tmp = $this->magic_vars['_A']['integral_result']['flag'];$_tmp = $this->magic_modifier("flag",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['type'])) $this->magic_vars['_A']['integral_result']['type'] = ''; echo $this->magic_vars['_A']['integral_result']['type']; ?> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['status'])) $this->magic_vars['_A']['integral_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_result']['status'] == 0): ?>隐藏<? else: ?>显示<? endif; ?> 
		</div>
	</div>

	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['order'])) $this->magic_vars['_A']['integral_result']['order'] = ''; echo $this->magic_vars['_A']['integral_result']['order']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">缩略图：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['litpic'])) $this->magic_vars['_A']['integral_result']['litpic']=''; ;if (  $this->magic_vars['_A']['integral_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['integral_result']['litpic'])) $this->magic_vars['_A']['integral_result']['litpic'] = ''; echo $this->magic_vars['_A']['integral_result']['litpic']; ?>" target="_blank" title="有图片"><img src="<? if (!isset($this->magic_vars['_A']['integral_result']['litpic'])) $this->magic_vars['_A']['integral_result']['litpic'] = ''; echo $this->magic_vars['_A']['integral_result']['litpic']; ?>" width="154px" height="154" border="0"  /></a><? endif; ?>
		</div>
	</div>


	<div class="module_border">
		<div class="l">所需积分：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['need'])) $this->magic_vars['_A']['integral_result']['need'] = ''; echo $this->magic_vars['_A']['integral_result']['need']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">数量：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['number'])) $this->magic_vars['_A']['integral_result']['number'] = ''; echo $this->magic_vars['_A']['integral_result']['number']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换城市：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['area'])) $this->magic_vars['_A']['integral_result']['area'] = '';$_tmp = $this->magic_vars['_A']['integral_result']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>

	<div class="module_border">
		<div class="l">活动内容：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_result']['content'])) $this->magic_vars['_A']['integral_result']['content'] = ''; echo $this->magic_vars['_A']['integral_result']['content']; ?>
		</div>
	</div>
</div>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="convert"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/action<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>" method="post">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">礼品名称</td>
		<td  class="main_td">兑换人</td>
		<td class="main_td">数量</td>
		<td class="main_td">分值</td>
		<td class="main_td">总兑换积分</td>
		<td  class="main_td">兑换时间</td>
		<td  class="main_td">状态</td>
		<td class="main_td">操作</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['integral_convert_list']) || $this->magic_vars['_A']['integral_convert_list']=='') $this->magic_vars['_A']['integral_convert_list'] = array();  $_from = $this->magic_vars['_A']['integral_convert_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view&id=<? if (!isset($this->magic_vars['item']['integral_id'])) $this->magic_vars['item']['integral_id'] = ''; echo $this->magic_vars['item']['integral_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>"><? if (!isset($this->magic_vars['item']['goods_name'])) $this->magic_vars['item']['goods_name'] = ''; echo $this->magic_vars['item']['goods_name']; ?></a></td>
		<td><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?>(<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>)</td>
		<td><? if (!isset($this->magic_vars['item']['number'])) $this->magic_vars['item']['number'] = ''; echo $this->magic_vars['item']['number']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['need'])) $this->magic_vars['item']['need'] = ''; echo $this->magic_vars['item']['need']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['integral'])) $this->magic_vars['item']['integral'] = ''; echo $this->magic_vars['item']['integral']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
		<td ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?>已兑换<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status'] ==2): ?>关闭<? else: ?>未兑换<? endif; ?></td>
		<td><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/convert_view&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">查看</a></td>
	</tr><input type="hidden" name="flag[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag'] = ''; echo $this->magic_vars['item']['flag']; ?>" />
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="11" class="action">
			<div class="floatl">
				<A href="?<? if (!isset($this->magic_vars['_A']['query_string'])) $this->magic_vars['_A']['query_string'] = ''; echo $this->magic_vars['_A']['query_string']; ?>&type1=excel">导出当前报表</A>
			</div>
			<div class="floatr">
			时间：<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = '';$_tmp = $_REQUEST['dotime1']; if (!isset($this->magic_vars['day7'])) $this->magic_vars['day7'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['day7']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = '';$_tmp = $_REQUEST['dotime2']; if (!isset($this->magic_vars['nowtime'])) $this->magic_vars['nowtime'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['nowtime']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" id="dotime2" size="15" onclick="change_picktime()"/>   
			物品名称：<input type="text" name="goods" id="name" value="<? if (!isset($_REQUEST['name'])) $_REQUEST['name'] = ''; echo $_REQUEST['name']; ?>"/>
			用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/>
			状态<select id="status" ><option value="">全部</option><option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>已兑换</option><option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> selected="selected"<? endif; ?>>未兑换</option><option value="2" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="2"): ?> selected="selected"<? endif; ?>>已关闭</option></select>
			<input type="button" value="搜索" / onclick="sousuo()">
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
var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type'] = ''; echo $this->magic_vars['_A']['query_type']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>';

function sousuo(){
	$(function(){
	   var u = $("#username").val();
	  	$("#username").attr("value",decodeURI(u));
	})
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var name = $("#name").val();
	if (name!=""){
		sou += "&name="+name;
	}
	var amountm = $("#amountm").val();
	if (amountm!=""){
		sou += "&amountm="+amountm;
	}
	var ordernum = $("#ordernum").val();
	if (ordernum!=""){
		sou += "&ordernum="+ordernum;
	}
	var status = $("#status").val();
	if (status!="" && status!=null){
		sou += "&status="+status;
	}
	var dotime1 = $("#dotime1").val();
	var keywords = $("#keywords").val();
	var username = $("#username").val();
	var dotime2 = $("#dotime2").val();
	var type = $("#type").val();
	
	if (ordernum!=null){
		 sou += "&ordernum="+ordernum;
	}
	if (keywords!=null){
		 sou += "&keywords="+keywords;
	}
	if (dotime1!=null){
		 sou += "&dotime1="+dotime1;
	}
	if (dotime2!=null){
		 sou += "&dotime2="+dotime2;
	}
	if (type!=null){
		 sou += "&type="+type;
	}
	
	if (sou!=""){
		location.href=url+sou;
	}
}

</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "convert_view"): ?>
<div class="module_add">
	<form action="" name="form1" method="post">
	<div class="module_title"><strong>兑换信息查看</strong></div>
	<div class="module_border">
		<div class="l">物品名称：</div>
		<div class="c">
			<a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view&id=<? if (!isset($this->magic_vars['_A']['integral_convert_result']['integral_id'])) $this->magic_vars['_A']['integral_convert_result']['integral_id'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['integral_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>" target="_blank"><? if (!isset($this->magic_vars['_A']['integral_convert_result']['goods_name'])) $this->magic_vars['_A']['integral_convert_result']['goods_name'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['goods_name']; ?></a>
		</div>
	</div>
	

	<div class="module_border">
		<div class="l">兑换人：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['realname'])) $this->magic_vars['_A']['integral_convert_result']['realname'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['realname']; ?>(<? if (!isset($this->magic_vars['_A']['integral_convert_result']['username'])) $this->magic_vars['_A']['integral_convert_result']['username'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['username']; ?>)
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换数量：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['number'])) $this->magic_vars['_A']['integral_convert_result']['number'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['number']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换分值：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['need'])) $this->magic_vars['_A']['integral_convert_result']['need'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['need']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">应扣积分：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['integral'])) $this->magic_vars['_A']['integral_convert_result']['integral'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['integral']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">收货地址：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['address'])) $this->magic_vars['_A']['integral_convert_result']['address'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['address']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">收货人：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['receiver'])) $this->magic_vars['_A']['integral_convert_result']['receiver'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['receiver']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">联系号码：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['phone'])) $this->magic_vars['_A']['integral_convert_result']['phone'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['phone']; ?>
		</div>
	</div>
	
	<? if (!isset($this->magic_vars['_A']['integral_convert_result']['status'])) $this->magic_vars['_A']['integral_convert_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_convert_result']['status']==1): ?>
	<div class="module_border">
		<div class="l">发货时间：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['send_time'])) $this->magic_vars['_A']['integral_convert_result']['send_time'] = '';$_tmp = $this->magic_vars['_A']['integral_convert_result']['send_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<? endif; ?>
	
	<? if (!isset($this->magic_vars['_A']['integral_convert_result']['status'])) $this->magic_vars['_A']['integral_convert_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_convert_result']['status']!=2): ?>
	<div class="module_border">
		<div class="l">快递单号：</div>
		<div class="c">
		<? if (!isset($this->magic_vars['_A']['integral_convert_result']['status'])) $this->magic_vars['_A']['integral_convert_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_convert_result']['status']==0): ?>
			<input type="text" name="send_num" value="" />
		<? else: ?>
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['send_num'])) $this->magic_vars['_A']['integral_convert_result']['send_num'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['send_num']; ?>
		<? endif; ?>
		</div>
	</div>
	<? endif; ?>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['status'])) $this->magic_vars['_A']['integral_convert_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_convert_result']['status']!=1): ?>
			<input type="radio" name="status" value="0" checked="checked" />未兑换 <input type="radio" name="status" value="1" />已兑换 <input type="radio" name="status" value="2" />关闭此兑换（关闭后将会将积分返回到用户的积分总数去）
			<? else: ?>
				已兑换
			<? endif; ?>
		</div>
	</div>
	
	<? if (!isset($this->magic_vars['_A']['integral_convert_result']['status'])) $this->magic_vars['_A']['integral_convert_result']['status']=''; ;if (  $this->magic_vars['_A']['integral_convert_result']['status']==0): ?>
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<textarea name="remark" cols="50" rows="7"><? if (!isset($this->magic_vars['_A']['integral_convert_result']['remark'])) $this->magic_vars['_A']['integral_convert_result']['remark'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['remark']; ?></textarea>
		</div>
	</div>
	
	<div class="module_submit">
		<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['integral_convert_result']['id'])) $this->magic_vars['_A']['integral_convert_result']['id'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['id']; ?>" />
		<input type="submit" value="确认" onclick="return confirm('确定提交?')"/> 一旦确定将不能修改
	</div>
	<? else: ?>
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['integral_convert_result']['remark'])) $this->magic_vars['_A']['integral_convert_result']['remark'] = ''; echo $this->magic_vars['_A']['integral_convert_result']['remark']; ?>
		</div>
	</div>
	<? endif; ?>
	</form>

</div>

<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var remark = frm.elements['remark'].value;
	 var errorMsg = '';
	  if (remark.length == 0 ) {
		errorMsg += '备注不能为空' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{
		return true;
	  }
}
</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "log"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">类型</td>
			<td width="" class="main_td">积分变化</td>
			<td width="" class="main_td">记录时间</td>
            <td width="" class="main_td">备注</td>
            <td width="" class="main_td">操作人</td>
			<!--<td width="" class="main_td">操作</td>-->
		</tr>
		<?  if(!isset($this->magic_vars['_A']['integral_log_list']) || $this->magic_vars['_A']['integral_log_list']=='') $this->magic_vars['_A']['integral_log_list'] = array();  $_from = $this->magic_vars['_A']['integral_log_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?><? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']==17): ?> style="color:red;"<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;elseif (  $this->magic_vars['item']['type_id']==18): ?> style="color:blue;"<? endif; ?>>
			<td ><? if (!isset($this->magic_vars['item']['tid'])) $this->magic_vars['item']['tid'] = ''; echo $this->magic_vars['item']['tid']; ?></td>
			<td ><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/user_list&a=integral&username=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>"<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']==17): ?> style="color:red;"<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;elseif (  $this->magic_vars['item']['type_id']==18): ?> style="color:blue;"<? endif; ?>><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td ><? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']==1): ?><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name']=''; ;if ( empty( $this->magic_vars['item']['borrow_name'])): ?>该标已删除（或为测试，请删除此条记录以及其他相关记录）<? else: ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" style="color:blue;" target="_blank">【<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>】</a><? endif; ?><? if (!isset($this->magic_vars['item']['integral_name'])) $this->magic_vars['item']['integral_name'] = ''; echo $this->magic_vars['item']['integral_name']; ?><? else: ?><? if (!isset($this->magic_vars['item']['integral_name'])) $this->magic_vars['item']['integral_name'] = ''; echo $this->magic_vars['item']['integral_name']; ?><? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']==2): ?>（连续签到<? if (!isset($this->magic_vars['item']['day'])) $this->magic_vars['item']['day'] = ''; echo $this->magic_vars['item']['day']; ?>天）<? endif; ?><? endif; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['value'])) $this->magic_vars['item']['value'] = ''; echo $this->magic_vars['item']['value']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
            <td ><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
            <td ><? if (!isset($this->magic_vars['item']['op_user'])) $this->magic_vars['item']['op_user']='';if (!isset($this->magic_vars['item']['op_user'])) $this->magic_vars['item']['op_user']=''; ;if ( empty( $this->magic_vars['item']['op_user']) ||  $this->magic_vars['item']['op_user']==0): ?>系统操作<? else: ?><? if (!isset($this->magic_vars['item']['op_username'])) $this->magic_vars['item']['op_username'] = ''; echo $this->magic_vars['item']['op_username']; ?><? endif; ?></td>
			<!--<td ><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/cash_view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">审核/查看</a></td>-->
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		<A href="?<? if (!isset($this->magic_vars['_A']['query_string'])) $this->magic_vars['_A']['query_string'] = ''; echo $this->magic_vars['_A']['query_string']; ?>&type1=excel">导出当前报表</A>
		</div>
		<div class="floatr">
			时间：<input type="text" name="dotime1" id="dotime1" value="<? if (!isset($_REQUEST['dotime1'])) $_REQUEST['dotime1'] = '';$_tmp = $_REQUEST['dotime1']; if (!isset($this->magic_vars['day7'])) $this->magic_vars['day7'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['day7']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="<? if (!isset($_REQUEST['dotime2'])) $_REQUEST['dotime2'] = '';$_tmp = $_REQUEST['dotime2']; if (!isset($this->magic_vars['nowtime'])) $this->magic_vars['nowtime'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['nowtime']);$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>" id="dotime2" size="15" onclick="change_picktime()"/>   
		  用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/><input type="button" value="搜索" / onclick="sousuo_log()">
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
var log_url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type'] = ''; echo $this->magic_vars['_A']['query_type']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>';

function sousuo_log(){
	$(function(){
		   var u = $("#username").val();
		  // alert(decodeURI(u))
		  $("#username").attr("value",decodeURI(u));
		   })
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var amountm = $("#amountm").val();
	if (amountm!=""){
		sou += "&amountm="+amountm;
	}
	var ordernum = $("#ordernum").val();
	if (ordernum!=""){
		sou += "&ordernum="+ordernum;
	}
	var status = $("#status").val();
	if (status!="" && status!=null){
		sou += "&status="+status;
	}
	var dotime1 = $("#dotime1").val();
	var keywords = $("#keywords").val();
	var username = $("#username").val();
	var dotime2 = $("#dotime2").val();
	var type = $("#type").val();
	var is_get_balance = $("#is_get_balance").val();
//	if (username!=null){
//		 sou += "&username="+username;
//	}
	if (ordernum!=null){
		 sou += "&ordernum="+ordernum;
	}
	if (keywords!=null){
		 sou += "&keywords="+keywords;
	}
	if (dotime1!=null){
		 sou += "&dotime1="+dotime1;
	}
	if (dotime2!=null){
		 sou += "&dotime2="+dotime2;
	}
	if (type!=null){
		 sou += "&type="+type;
	}
	if (is_get_balance!=null){
		 sou += "&is_get_balance="+is_get_balance;
	}
	
	if (sou!=""){
	location.href=log_url+sou;
	}
}

</script>
<!--添加积分充值 开始-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "recharge_integral"): ?>

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>添加充值</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			积分充值<input type="hidden" name="type" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">积分数：</div>
		<div class="c">
			<input type="text" name="integral" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<input type="text" name="remark" />
		</div>
	</div>
	
	<div class="module_submit" >
		
		<input type="submit"  name="reset" value="确认充值" />
	</div>
	</form>
</div>

<!--添加积分充值 结束-->

<!--扣除积分 结束 开始-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "deduct"): ?>

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>费用扣除</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			<select name="type">
				<option value="4" id="deduct_integral">扣除积分</option>
			</select>
		</div>
	</div>
	<div class="module_border">
		<div class="l">积分数：</div>
		<div class="c">
			<input type="text" name="integral" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<input type="text" name="remark" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">验证码：</div>
		<div class="c"><input  class="user_aciton_input"  name="valicode" type="text" size="8" maxlength="4" style=" padding-top:4px; height:16px; width:70px;"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>
	<div class="module_submit" >
		
		<input type="submit"  name="reset" value="确定扣除" />
	</div>
</form>
</div>

<!--扣除积分 结束-->

<!--用户积分列表 开始-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="user_list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名</td>
			<td width="" class="main_td">真实姓名</td>
			<td width="" class="main_td">当前积分</td>
			<td width="" class="main_td">投标所得积分</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['integral_list']) || $this->magic_vars['_A']['integral_list']=='') $this->magic_vars['_A']['integral_list'] = array();  $_from = $this->magic_vars['_A']['integral_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?><? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']==17): ?> style="color:red;"<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;elseif (  $this->magic_vars['item']['type_id']==18): ?> style="color:blue;"<? endif; ?>>
			<td ><? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?></td>
			<td><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']==17): ?> style="color:red;"<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;elseif (  $this->magic_vars['item']['type_id']==18): ?> style="color:blue;"<? endif; ?>><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td ><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['integral'])) $this->magic_vars['item']['integral']=''; ;if ( empty( $this->magic_vars['item']['integral'])): ?><? if (!isset($this->magic_vars['item']['integral'])) $this->magic_vars['item']['integral'] = '';$_tmp = $this->magic_vars['item']['integral'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>分<? else: ?><a href="/index.php?fjd&q=module/integral/log&a=integral&username=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>"><? if (!isset($this->magic_vars['item']['integral'])) $this->magic_vars['item']['integral'] = '';$_tmp = $this->magic_vars['item']['integral'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>分</a><? endif; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['invest_integral'])) $this->magic_vars['item']['invest_integral'] = '';$_tmp = $this->magic_vars['item']['invest_integral'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>分</td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		<A href="?<? if (!isset($this->magic_vars['_A']['query_string'])) $this->magic_vars['_A']['query_string'] = ''; echo $this->magic_vars['_A']['query_string']; ?>&type=excel">导出当前报表</A>
		</div>
		<div class="floatr">
            查询额度：<input type="text" name="amountm" id="amountm" value="<? if (!isset($_REQUEST['amount'])) $_REQUEST['amount'] = ''; echo $_REQUEST['amount']; ?>"/> 
			<select id="type" ><option value="">全部</option>
			<option value="total" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="total"): ?> selected="selected"<? endif; ?>>当前积分大于</option>
			<option value="total1" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="total1"): ?> selected="selected"<? endif; ?>>当前积分小于</option>
			<option value="canuse" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="canuse"): ?> selected="selected"<? endif; ?>>投标积分大于</option>
			<option value="canuse1" <? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="canuse1"): ?> selected="selected"<? endif; ?>>投标积分小于</option>
			
			</select>用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--用户积分列表 结束-->
<script>
var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type'] = ''; echo $this->magic_vars['_A']['query_type']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>';

function sousuo(){
	$(function(){
		   var u = $("#username").val();
		  // alert(decodeURI(u))
		  $("#username").attr("value",decodeURI(u));
		   })
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+encodeURI(username);
	}
	var amountm = $("#amountm").val();
	if (amountm!=""){
		sou += "&amountm="+amountm;
	}
	var ordernum = $("#ordernum").val();
	if (ordernum!=""){
		sou += "&ordernum="+ordernum;
	}
	var status = $("#status").val();
	if (status!="" && status!=null){
		sou += "&status="+status;
	}
	var dotime1 = $("#dotime1").val();
	var keywords = $("#keywords").val();
	var username = $("#username").val();
	var dotime2 = $("#dotime2").val();
	var type = $("#type").val();
	var is_get_balance = $("#is_get_balance").val();
//	if (username!=null){
//		 sou += "&username="+username;
//	}
	if (ordernum!=null){
		 sou += "&ordernum="+ordernum;
	}
	if (keywords!=null){
		 sou += "&keywords="+keywords;
	}
	if (dotime1!=null){
		 sou += "&dotime1="+dotime1;
	}
	if (dotime2!=null){
		 sou += "&dotime2="+dotime2;
	}
	if (type!=null){
		 sou += "&type="+type;
	}
	if (is_get_balance!=null){
		 sou += "&is_get_balance="+is_get_balance;
	}
	
	if (sou!=""){
	location.href=url+sou;
	}
}

</script>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="auto_sort"): ?>
<table border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
    <tr class="head">
        <td class="main_td">排名</td>
        <td class="main_td">用户名</td>
        <td class="main_td">成功</td>
        <td class="main_td">可用</td>
        <td class="main_td">最低投入额</td>
        <td class="main_td">最高投入额</td>
        <td class="main_td">还款方式</td>
        <td class="main_td">月标期限</td>
        <td class="main_td">天标期限</td>
        <td class="main_td">利率范围</td>
        <td class="main_td">投标奖励</td>
        <td class="main_td">可投标种</td>
    </tr>
    <? $this->magic_vars['query_type']='getAutoTenderSort';$data = array('limit'=>'all','order'=>'order','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::getAutoTenderSort($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
        <tr
        <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
        <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=1): ?>无<? else: ?><? if (!isset($this->magic_vars['var']['sort'])) $this->magic_vars['var']['sort'] = ''; echo $this->magic_vars['var']['sort']; ?><? endif; ?></td>
        <td><? if (!isset($this->magic_vars['var']['username'])) $this->magic_vars['var']['username'] = ''; echo $this->magic_vars['var']['username']; ?></td>
        <td><? if (!isset($this->magic_vars['var']['tender_times'])) $this->magic_vars['var']['tender_times'] = ''; echo $this->magic_vars['var']['tender_times']; ?>次</td>
        <td><? if (!isset($this->magic_vars['var']['use_money'])) $this->magic_vars['var']['use_money'] = ''; echo $this->magic_vars['var']['use_money']; ?></td>
        <td><? if (!isset($this->magic_vars['var']['min_tender'])) $this->magic_vars['var']['min_tender'] = ''; echo $this->magic_vars['var']['min_tender']; ?></td>
        <td><? if (!isset($this->magic_vars['var']['max_tender'])) $this->magic_vars['var']['max_tender'] = ''; echo $this->magic_vars['var']['max_tender']; ?></td>
        <td><? if (!isset($this->magic_vars['var']['repayment_type'])) $this->magic_vars['var']['repayment_type']=''; ;if (  $this->magic_vars['var']['repayment_type']==0): ?>无限制<? if (!isset($this->magic_vars['var']['repayment_type'])) $this->magic_vars['var']['repayment_type']=''; ;elseif (  $this->magic_vars['var']['repayment_type']==1): ?>按月分期<? else: ?>先息后本<? endif; ?></td>
        <td><? if (!isset($this->magic_vars['var']['month_cycle_status'])) $this->magic_vars['var']['month_cycle_status']=''; ;if (  $this->magic_vars['var']['month_cycle_status']==1): ?><? if (!isset($this->magic_vars['var']['min_month'])) $this->magic_vars['var']['min_month'] = ''; echo $this->magic_vars['var']['min_month']; ?>~<? if (!isset($this->magic_vars['var']['max_month'])) $this->magic_vars['var']['max_month'] = ''; echo $this->magic_vars['var']['max_month']; ?><? if (!isset($this->magic_vars['var']['month_cycle_status'])) $this->magic_vars['var']['month_cycle_status']=''; ;elseif (  $this->magic_vars['var']['month_cycle_status']==0): ?>无限制<? else: ?>不投月标<? endif; ?></td>
        <td><? if (!isset($this->magic_vars['var']['day_cycle_status'])) $this->magic_vars['var']['day_cycle_status']=''; ;if (  $this->magic_vars['var']['day_cycle_status']==1): ?><? if (!isset($this->magic_vars['var']['min_day'])) $this->magic_vars['var']['min_day'] = ''; echo $this->magic_vars['var']['min_day']; ?>~<? if (!isset($this->magic_vars['var']['max_day'])) $this->magic_vars['var']['max_day'] = ''; echo $this->magic_vars['var']['max_day']; ?><? if (!isset($this->magic_vars['var']['day_cycle_status'])) $this->magic_vars['var']['day_cycle_status']=''; ;elseif (  $this->magic_vars['var']['day_cycle_status']==0): ?>无限制<? else: ?>不投天标<? endif; ?></td>
        <td><? if (!isset($this->magic_vars['var']['interest_rate_status'])) $this->magic_vars['var']['interest_rate_status']=''; ;if (  $this->magic_vars['var']['interest_rate_status']==1): ?><? if (!isset($this->magic_vars['var']['min_interest'])) $this->magic_vars['var']['min_interest'] = ''; echo $this->magic_vars['var']['min_interest']; ?>~<? if (!isset($this->magic_vars['var']['max_interest'])) $this->magic_vars['var']['max_interest'] = ''; echo $this->magic_vars['var']['max_interest']; ?><? else: ?>无限制<? endif; ?></td>
        <td><? if (!isset($this->magic_vars['var']['award_status'])) $this->magic_vars['var']['award_status']=''; ;if (  $this->magic_vars['var']['award_status']==1): ?><? if (!isset($this->magic_vars['var']['min_award'])) $this->magic_vars['var']['min_award'] = ''; echo $this->magic_vars['var']['min_award']; ?>~<? if (!isset($this->magic_vars['var']['max_award'])) $this->magic_vars['var']['max_award'] = ''; echo $this->magic_vars['var']['max_award']; ?><? else: ?>无限制<? endif; ?></td>
        <td><? if (!isset($this->magic_vars['var']['borrow_type'])) $this->magic_vars['var']['borrow_type']=''; ;if (  $this->magic_vars['var']['borrow_type']==0): ?>无限制<? if (!isset($this->magic_vars['var']['borrow_type'])) $this->magic_vars['var']['borrow_type']=''; ;elseif (  $this->magic_vars['var']['borrow_type']==1): ?>抵押标<? else: ?>信用标<? endif; ?></td>
        </tr>
    <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
</table>
<? else: ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/action<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>" method="post">
	<tr >
		<td class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
		<td class="main_td">ID</td>
		<td class="main_td">物品名称</td>
		<td class="main_td">所需积分</td>
		<td class="main_td">数量</td>
		<td  class="main_td">已兑换数量</td>
		<td  class="main_td">状态</td>
		<td  class="main_td">属性</td>
		<td class="main_td">操作</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['integral_list']) || $this->magic_vars['_A']['integral_list']=='') $this->magic_vars['_A']['integral_list'] = array();  $_from = $this->magic_vars['_A']['integral_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><input type="checkbox" name="aid[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>"/></td>
		<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['need'])) $this->magic_vars['item']['need'] = ''; echo $this->magic_vars['item']['need']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['number'])) $this->magic_vars['item']['number'] = ''; echo $this->magic_vars['item']['number']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['ex_number'])) $this->magic_vars['item']['ex_number'] = ''; echo $this->magic_vars['item']['ex_number']; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&status=0&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">显示</a><? else: ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&status=1&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">隐藏</a><? endif; ?></td>
		<td ><? if (!isset($this->magic_vars['item']['flagname'])) $this->magic_vars['item']['flagname'] = '';$_tmp = $this->magic_vars['item']['flagname'];$_tmp = $this->magic_modifier("default",$_tmp," ");echo $_tmp;unset($_tmp); ?><? if (!isset($this->magic_vars['item']['litpic'])) $this->magic_vars['item']['litpic']=''; ;if (  $this->magic_vars['item']['litpic']!=""): ?>图片<? endif; ?></td>
		<td><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/convert&a=integral&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">兑换人</a>  <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">查看</a> <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">编辑</a> <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>'">删除</a></td>
	</tr><input type="hidden" name="flag[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag'] = ''; echo $this->magic_vars['item']['flag']; ?>" />
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="9" class="action">
		<div class="floatl"> 
		<select name="type">
		<option value="0">排序</option>
		<option value="1">显示</option>
		<option value="2">隐藏</option>
		<option value="3">推荐</option>
		<option value="4">头条</option>
		<option value="5">幻灯片</option>
		<option value="6">删除</option>&nbsp;&nbsp;&nbsp;
		</select> <input type="submit" value="确认操作" /> 排序不用全选
		</div>
		<div class="floatr">
		物品名称：<input type="text" name="goods" id="name" value="<? if (!isset($_REQUEST['name'])) $_REQUEST['name'] = ''; echo $_REQUEST['name']; ?>"/>
		<input type="button" value="搜索" onclick="sousuo()" />
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
 var url = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type'] = ''; echo $this->magic_vars['_A']['query_type']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>';

function sousuo(){
	var name = $("#name").val();
	location.href=url+"&name="+name;
}
</script>

<? endif; ?>