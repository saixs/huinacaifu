{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}积分</strong></div>
	
	<div class="module_border">
		<div class="l">礼品名称：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="{ $_A.integral_result.name}" size="30" />
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">属性：</div>
		<div class="c">
			{foreach from="$_A.flag_list" item="var"}<input type="checkbox" name="flag[]" value="{$var.nid}" {$var.nid|checked:$_A.integral_result.flag }/>{$var.name} {/foreach}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			<select name="type">
				<option value="0">选择类型</option>
			{foreach from="$_A.integral_type" item="var"}
				<option value="{$var.id}" {if $var.id==$_A.integral_result.type}selected="selected"{/if}>{$var.name}</option>
			{/foreach}
			</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="0"  { if $_A.integral_result.status == 0 }checked="checked"{/if}/>隐藏 <input type="radio" name="status" value="1"  { if $_A.integral_result.status ==1 ||$_A.integral_result.status ==""}checked="checked"{/if}/>显示 
		</div>
	</div>

	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.integral_result.order|default:10}" size="10" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">缩略图：</div>
		<div class="c">
			<input type="file" name="litpic" size="30" class="input_border"/>{if $_A.integral_result.litpic!=""}<a href="./{$_A.integral_result.litpic}" target="_blank" title="有图片"><img src="./{$_A.integral_result.litpic}" width="154px" height="154" border="0"  /></a><input type="checkbox" name="clearlitpic" value="1" />去掉缩略图{/if}
		</div>
	</div>


	<div class="module_border">
		<div class="l">所需积分：</div>
		<div class="c">
			<input type="text" name="need"  class="input_border" value="{ $_A.integral_result.need}" onkeyup="value=value.replace(/[^0-9]/g,'')" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">数量：</div>
		<div class="c">
			<input type="text" name="number"  class="input_border" onkeyup="value=value.replace(/[^0-9]/g,'')" value="{ $_A.integral_result.number}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换城市：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=area&area={$_A.integral_result.area}" type='text/javascript' language="javascript"></script>
		</div>
	</div>

	<div class="module_border">
		<div class="l">活动积分：</div>
		<div class="c">
			{editor name="content" type="sinaeditor" value="$_A.integral_result.content"}
		</div>
	</div>
	
	<div class="module_submit border_b" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.integral_result.id }" />{/if}
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
</div>
{literal}
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
{/literal}


{elseif $_A.query_type == "view"}
<div class="module_add">
	<div class="module_title"><strong>查看</strong></div>
	
	<div class="module_border">
		<div class="l">物品名称：</div>
		<div class="c">
			{ $_A.integral_result.name}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">属性：</div>
		<div class="c">
			 {$_A.integral_result.flag|flag}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			{$_A.integral_result.type} 
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			{ if $_A.integral_result.status == 0 }隐藏{else}显示{/if} 
		</div>
	</div>

	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			{ $_A.integral_result.order}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">缩略图：</div>
		<div class="c">
			{if $_A.integral_result.litpic!=""}<a href="./{$_A.integral_result.litpic}" target="_blank" title="有图片"><img src="{$_A.integral_result.litpic}" width="154px" height="154" border="0"  /></a>{/if}
		</div>
	</div>


	<div class="module_border">
		<div class="l">所需积分：</div>
		<div class="c">
			{ $_A.integral_result.need}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">数量：</div>
		<div class="c">
			{ $_A.integral_result.number}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换城市：</div>
		<div class="c">
			{$_A.integral_result.area|area}
		</div>
	</div>

	<div class="module_border">
		<div class="l">活动内容：</div>
		<div class="c">
			{$_A.integral_result.content}
		</div>
	</div>
</div>
{elseif $_A.query_type=="convert"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$_A.site_url}" method="post">
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
	{ foreach  from=$_A.integral_convert_list key=key item=item}
	<tr  {if $key%2==1}class="tr2"{/if}>
		<td>{ $item.id}</td>
		<td><a href="{$_A.query_url}/view&id={$item.integral_id}{$_A.site_url}">{$item.goods_name}</a></td>
		<td>{ $item.realname}({ $item.username})</td>
		<td>{$item.number}</td>
		<td>{$item.need}</td>
		<td>{ $item.integral}</td>
		<td>{ $item.addtime|date_format:"Y-m-d H:i"}</td>
		<td >{ if $item.status ==1}已兑换{ elseif $item.status ==2}关闭{else}未兑换{/if}</td>
		<td><a href="{$_A.query_url}/convert_view&id={$item.id}">查看</a></td>
	</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
	{ /foreach}
	<tr>
		<td colspan="11" class="action">
			<div class="floatl">
				<A href="?{$_A.query_string}&type1=excel">导出当前报表</A>
			</div>
			<div class="floatr">
			时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>   
			物品名称：<input type="text" name="goods" id="name" value="{$magic.request.name}"/>
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/>
			状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已兑换</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未兑换</option><option value="2" {if $magic.request.status=="2"} selected="selected"{/if}>已关闭</option></select>
			<input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="9" class="page">
		{$_A.showpage}
		</td>
	</tr>
	</form>
</table>
<script>
var url = '{$_A.query_url}/{$_A.query_type}{$_A.site_url}';
{literal}
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
{/literal}
</script>
{/literal}
{elseif $_A.query_type == "convert_view"}
<div class="module_add">
	<form action="" name="form1" method="post">
	<div class="module_title"><strong>兑换信息查看</strong></div>
	<div class="module_border">
		<div class="l">物品名称：</div>
		<div class="c">
			<a href="{$_A.query_url}/view&id={$_A.integral_convert_result.integral_id}{$_A.site_url}" target="_blank">{ $_A.integral_convert_result.goods_name}</a>
		</div>
	</div>
	

	<div class="module_border">
		<div class="l">兑换人：</div>
		<div class="c">
			{ $_A.integral_convert_result.realname}({ $_A.integral_convert_result.username})
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换数量：</div>
		<div class="c">
			{ $_A.integral_convert_result.number}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">兑换分值：</div>
		<div class="c">
			{ $_A.integral_convert_result.need}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">应扣积分：</div>
		<div class="c">
			{ $_A.integral_convert_result.integral}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">收货地址：</div>
		<div class="c">
			{ $_A.integral_convert_result.address}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">收货人：</div>
		<div class="c">
			{ $_A.integral_convert_result.receiver}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">联系号码：</div>
		<div class="c">
			{ $_A.integral_convert_result.phone}
		</div>
	</div>
	
	{if $_A.integral_convert_result.status==1}
	<div class="module_border">
		<div class="l">发货时间：</div>
		<div class="c">
			{$_A.integral_convert_result.send_time|date_format:"Y-m-d H:i:s"}
		</div>
	</div>
	{/if}
	
	{if $_A.integral_convert_result.status!=2}
	<div class="module_border">
		<div class="l">快递单号：</div>
		<div class="c">
		{if $_A.integral_convert_result.status==0}
			<input type="text" name="send_num" value="" />
		{else}
			{$_A.integral_convert_result.send_num}
		{/if}
		</div>
	</div>
	{/if}
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			{if $_A.integral_convert_result.status!=1}
			<input type="radio" name="status" value="0" checked="checked" />未兑换 <input type="radio" name="status" value="1" />已兑换 <input type="radio" name="status" value="2" />关闭此兑换（关闭后将会将积分返回到用户的积分总数去）
			{else}
				已兑换
			{/if}
		</div>
	</div>
	
	{if $_A.integral_convert_result.status==0}
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<textarea name="remark" cols="50" rows="7">{$_A.integral_convert_result.remark}</textarea>
		</div>
	</div>
	
	<div class="module_submit">
		<input type="hidden" name="id" value="{$_A.integral_convert_result.id}" />
		<input type="submit" value="确认" onclick="return confirm('确定提交?')"/> 一旦确定将不能修改
	</div>
	{else}
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			{$_A.integral_convert_result.remark}
		</div>
	</div>
	{/if}
	</form>

</div>
{literal}
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
{/literal}
{elseif $_A.query_type == "log"}
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
		{ foreach  from=$_A.integral_log_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}{if $item.type_id==17} style="color:red;"{elseif $item.type_id==18} style="color:blue;"{/if}>
			<td >{ $item.tid}</td>
			<td ><a href="{$_A.query_url}/user_list&a=integral&username={$item.username}"{if $item.type_id==17} style="color:red;"{elseif $item.type_id==18} style="color:blue;"{/if}>{$item.username}</a></td>
			<td >{if $item.type_id==1}{if empty($item.borrow_name)}该标已删除（或为测试，请删除此条记录以及其他相关记录）{else}<a href="/invest/a{$item.borrow_id}.html" style="color:blue;" target="_blank">【{$item.borrow_name}】</a>{/if}{ $item.integral_name}{else}{ $item.integral_name}{if $item.type_id==2}（连续签到{$item.day}天）{/if}{/if}</td>
			<td >{ $item.value}</td>
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
            <td >{ $item.remark}</td>
            <td >{if empty($item.op_user) || $item.op_user==0}系统操作{else}{ $item.op_username}{/if}</td>
			<!--<td ><a href="{$_A.query_url}/cash_view{$_A.site_url}&id={$item.id}">审核/查看</a></td>-->
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		<A href="?{$_A.query_string}&type1=excel">导出当前报表</A>
		</div>
		<div class="floatr">
			时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>   
		{linkages nid="integral_type" value="$magic.request.type" name="type" type="value" default="全部" } 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/><input type="button" value="搜索" / onclick="sousuo_log()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="11" class="page">
			{$_A.showpage} 
			</td>
		</tr>
	</form>	
</table>
<script>
var log_url = '{$_A.query_url}/{$_A.query_type}{$_A.site_url}';
{literal}
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
{/literal}
</script>
<!--添加积分充值 开始-->
{elseif $_A.query_type == "recharge_integral"}

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
{elseif $_A.query_type == "deduct"}

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
{elseif $_A.query_type=="user_list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名</td>
			<td width="" class="main_td">真实姓名</td>
			<td width="" class="main_td">当前积分</td>
			<td width="" class="main_td">投标所得积分</td>
		</tr>
		{ foreach  from=$_A.integral_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}{if $item.type_id==17} style="color:red;"{elseif $item.type_id==18} style="color:blue;"{/if}>
			<td >{ $item.user_id}</td>
			<td><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'{if $item.type_id==17} style="color:red;"{elseif $item.type_id==18} style="color:blue;"{/if}>{$item.username}</a></td>
			<td >{$item.realname}</td>
			<td >{if empty($item.integral)}{$item.integral|default:0}分{else}<a href="/index.php?fjd&q=module/integral/log&a=integral&username={$item.username}">{$item.integral|default:0}分</a>{/if}</td>
			<td >{$item.invest_integral|default:0}分</td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		<A href="?{$_A.query_string}&type=excel">导出当前报表</A>
		</div>
		<div class="floatr">
            查询额度：<input type="text" name="amountm" id="amountm" value="{$magic.request.amount}"/> 
			<select id="type" ><option value="">全部</option>
			<option value="total" {if $magic.request.type=="total"} selected="selected"{/if}>当前积分大于</option>
			<option value="total1" {if $magic.request.type=="total1"} selected="selected"{/if}>当前积分小于</option>
			<option value="canuse" {if $magic.request.type=="canuse"} selected="selected"{/if}>投标积分大于</option>
			<option value="canuse1" {if $magic.request.type=="canuse1"} selected="selected"{/if}>投标积分小于</option>
			
			</select>用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="9" class="page">
			{$_A.showpage} 
			</td>
		</tr>
	</form>	
</table>
<!--用户积分列表 结束-->
<script>
var url = '{$_A.query_url}/{$_A.query_type}{$_A.site_url}';
{literal}
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
{/literal}
</script>
{elseif $_A.query_type=="auto_sort"}
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
    {loop module="borrow" function ="getAutoTenderSort" " user_id="0" limit="all" order="order"}
        <tr
        {if $key%2==1} class="tr2"{/if}>
        <td>{if $var.status!=1}无{else}{$var.sort}{/if}</td>
        <td>{$var.username}</td>
        <td>{$var.tender_times}次</td>
        <td>{$var.use_money}</td>
        <td>{$var.min_tender}</td>
        <td>{$var.max_tender}</td>
        <td>{if $var.repayment_type==0}无限制{elseif $var.repayment_type==1}按月分期{else}先息后本{/if}</td>
        <td>{if $var.month_cycle_status==1}{$var.min_month}~{$var.max_month}{elseif $var.month_cycle_status==0}无限制{else}不投月标{/if}</td>
        <td>{if $var.day_cycle_status==1}{$var.min_day}~{$var.max_day}{elseif $var.day_cycle_status==0}无限制{else}不投天标{/if}</td>
        <td>{if $var.interest_rate_status==1}{$var.min_interest}~{$var.max_interest}{else}无限制{/if}</td>
        <td>{if $var.award_status==1}{$var.min_award}~{$var.max_award}{else}无限制{/if}</td>
        <td>{if $var.borrow_type==0}无限制{elseif $var.borrow_type==1}抵押标{else}信用标{/if}</td>
        </tr>
    {/loop}
</table>
{else}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$_A.site_url}" method="post">
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
	{ foreach  from=$_A.integral_list key=key item=item}
	<tr  {if $key%2==1}class="tr2"{/if}>
		<td><input type="checkbox" name="aid[{$key}]" value="{$item.id}"/></td>
		<td>{ $item.id}</td>
		<td>{$item.name}</td>
		<td>{$item.need}</td>
		<td>{ $item.number}</td>
		<td>{ $item.ex_number}</td>
		<td >{ if $item.status ==1}<a href="{$_A.query_url}{$_A.site_url}&status=0&id={ $item.id}">显示</a>{else}<a href="{$_A.query_url}{$_A.site_url}&status=1&id={ $item.id}">隐藏</a>{/if}</td>
		<td >{$item.flagname|default:' '}{if $item.litpic!=""}图片{/if}</td>
		<td><a href="{$_A.query_url}/convert&a=integral&id={$item.id}">兑换人</a>  <a href="{$_A.query_url}/view&id={$item.id}{$_A.site_url}">查看</a> <a href="{$_A.query_url}/edit&id={$item.id}{$_A.site_url}">编辑</a> <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/del&id={$item.id}{$_A.site_url}'">删除</a></td>
	</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
	{ /foreach}
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
		物品名称：<input type="text" name="goods" id="name" value="{$magic.request.name}"/>
		<input type="button" value="搜索" onclick="sousuo()" />
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="9" class="page">
		{$_A.showpage}
		</td>
	</tr>
	</form>
</table>
<script>
 var url = '{$_A.query_url}/{$_A.query_type}{$_A.site_url}';
{literal}
function sousuo(){
	var name = $("#name").val();
	location.href=url+"&name="+name;
}
</script>
{/literal}
{/if}