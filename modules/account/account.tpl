{if $_A.query_type == "new" || $_A.query_type == "edit"}


{elseif $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名</td>
			<td width="" class="main_td">真实姓名</td>
			<td width="" class="main_td">总余额</td>
			<td width="" class="main_td">可用余额</td>
			<td width="" class="main_td">冻结金额</td>
			<td width="" class="main_td">待收金额</td>
            <td width="" class="main_td">待还金额</td>
		</tr>
		{ foreach  from=$_A.account_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.user_id}</td>
			<td><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
			<td >{$item.realname}</td>
			<td >{$item.total|default:0}元</td>
			<td >{$item.use_money|default:0}元</td>
			<td >{$item.no_use_money|default:0}元</td>
			<td >{$item.collection|default:0}元</td>
            <td >{$item.wait|default:0}元</td>
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
			<option value="total" {if $magic.request.type=="total"} selected="selected"{/if}>总额大于</option>
			<option value="total1" {if $magic.request.type=="total1"} selected="selected"{/if}>总额小于</option>
			<option value="canuse" {if $magic.request.type=="canuse"} selected="selected"{/if}>可用大于</option>
			<option value="canuse1" {if $magic.request.type=="canuse1"} selected="selected"{/if}>可用小于</option>
			<option value="nouse" {if $magic.request.type=="nouse"} selected="selected"{/if}>冻结大于</option>
            <option value="nouse1" {if $magic.request.type=="nouse1"} selected="selected"{/if}>冻结小于</option>
			
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
{elseif $_A.query_type=="borrower_account"}
    <table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
        <form action="" method="post">
            <tr >
                <td width="" class="main_td">ID</td>
                <td width="*" class="main_td">用户名</td>
                <td width="" class="main_td">真实姓名</td>
                <td width="" class="main_td">总余额</td>
                <td width="" class="main_td">可用余额</td>
                <td width="" class="main_td">冻结金额</td>
                <td width="" class="main_td">待收金额</td>
                <td width="" class="main_td">待还金额</td>
            </tr>
            { foreach  from=$_A.account_list key=key item=item}
            <tr  {if $key%2==1} class="tr2"{/if}>
                <td >{ $item.user_id}</td>
                <td><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
                <td >{$item.realname}</td>
                <td >{$item.total|default:0}元</td>
                <td >{$item.use_money|default:0}元</td>
                <td >{$item.no_use_money|default:0}元</td>
                <td >{$item.collection|default:0}元</td>
                <td >{$item.wait|default:0}元</td>
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
                            <option value="total" {if $magic.request.type=="total"} selected="selected"{/if}>总额大于</option>
                            <option value="total1" {if $magic.request.type=="total1"} selected="selected"{/if}>总额小于</option>
                            <option value="canuse" {if $magic.request.type=="canuse"} selected="selected"{/if}>可用大于</option>
                            <option value="canuse1" {if $magic.request.type=="canuse1"} selected="selected"{/if}>可用小于</option>
                            <option value="nouse" {if $magic.request.type=="nouse"} selected="selected"{/if}>冻结大于</option>
                            <option value="nouse1" {if $magic.request.type=="nouse1"} selected="selected"{/if}>冻结小于</option>

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
<!--提现记录列表 开始-->
{elseif $_A.query_type=="everyday"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">日期</td>
			<td width="*" class="main_td">充值额度</td>
			<td width="" class="main_td">提现额度</td>
			<td width="" class="main_td">利息管理费</td>
			<td width="" class="main_td">vip费</td>
			<td width="" class="main_td">借款费用</td>
            <td width="" class="main_td">实名认证费</td>
			
		</tr>
		{ foreach  from=$_A.account_day key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			
			<td >{ $item.everydate}</td>
			<td >{ $item.chongzhi|round 2}</td>
			<td >{ $item.tixian|round 2}</td>
			<td >{ $item.lxmanage|round 2}</td>
			<td >{ $item.vipfee|round 2}</td>
			<td >{ $item.borrowfee|round 2}</td>
            <td >{ $item.realnamefee|round 2}</td>
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		<input type="button" onclick="javascript:location.href='{$_A.query_url}/everyday&type=excel'" value="导出列表" />
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
<!--提现记录列表 结束-->
<!--资金记录汇总 开始-->
{elseif $_A.query_type=="sumlog"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">类型</td>
			<td width="*" class="main_td">总额</td>
			<td width="" class="main_td">标示</td>
		
			
		</tr>
		{ foreach  from=$_A.account_day key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $key}</td>
			
			<td >{ $item.name}</td>
			<td >{ $item.summoney|round 2}</td>
			<td >{ $item.type}</td>
			
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		<input type="button" onclick="javascript:location.href='{$_A.query_url}/sumlog&type=excel'" value="导出列表" />
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
<!--资金记录汇总 结束-->

<!--资金平衡表列表 开始-->
{elseif $_A.query_type=="fundy"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">可用总金额</td>
			<td width="*" class="main_td">+冻结总金额</td>
            
            <td width="" class="main_td">+vip扣费</td>
			<td width="" class="main_td">+借款手续费</td>
			<td width="" class="main_td">+利息提成</td>
                        <td width="" class="main_td">+实名认证费</td>
                        <td width="" class="main_td">-系统代还</td>
                        <td width="" class="main_td">+逾期利息扣除</td>
                        <td width="" class="main_td">-逾期系统收入</td>
                        
                        
                        
                        <td width="*" class="main_td">+逾期扣款</td><td width="*" class="main_td">+垫付后还款</td>
			<td width="*" class="main_td">==充值</td>
			<td width="" class="main_td">-提现</td>
			
			
		</tr>
		{ foreach  from=$_A.account_fundy key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.k_money}</td>
			
			<td >{ $item.n_money}</td>
            
           
			<td >{ $item.vip}</td>
			<td >{ $item.borrow_fee}</td>
			<td >{ $item.tender_mange}</td>
                        <td >{ $item.real_fee}</td>
                        
                        <td >{ $item.system_repayment}</td>
                        
                        <td >{ $item.late_rate}</td>
			<td >{ $item.late_repayment}</td>
             <td >{ $item.df_repayment}</td>
            <td >{ $item.late_collection}</td>
                        <td >{ $item.recharge}</td>
                       <td >{ $item.recharge_success}</td>
			
                       
                        
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		<input type="button" onclick="javascript:location.href='{$_A.query_url}/fundy&type=excel'" value="导出列表" />
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
<!--资金平衡列表 结束-->

<!--提现记录列表 开始-->
{elseif $_A.query_type=="cash"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="*" class="main_td">真实姓名</td>
			<td width="" class="main_td">提现账号</td>
			<td width="" class="main_td">提现银行</td>
			<td width="" class="main_td">支行</td>
			<td width="" class="main_td">提现总额</td>
			<td width="" class="main_td">到账金额</td>
			<td width="" class="main_td">手续费</td>
			<td width="" class="main_td">提现时间</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.account_cash_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/cash&username={$item.username}">{$item.username}</a></td>
			<td >{ $item.realname}</td>
			<td >{ $item.account}</td>
			<td >{ $item.bank_name}</td>
			<td >{ $item.branch}</td>
			<td >{ $item.total}</td>
			<td >{ $item.credited}</td>
			<td >{ $item.fee}</td>	
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
			<td >{if $item.status==0}审核中{elseif  $item.status==1} 已通过 {elseif $item.status==2}被拒绝{/if}</td>
			<td ><a href="{$_A.query_url}/cash_view{$_A.site_url}&id={$item.id}">审核/查看</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
                报表起始时间：<input type="text" id="start_ts" value="" onclick="change_picktime()" />
                 报表截止时间：<input type="text" id="end_ts" value="" onclick="change_picktime()" />
		 <input type="button" value="导出当前报表" onclick="exportCashExcl();" />
		
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--提现记录列表 结束-->


<!--提现审核 开始-->
{elseif $_A.query_type == "cash_view"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>提现审核/查看</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			{ $_A.account_cash_result.username}
		</div>
	</div>

	<div class="module_border">
		<div class="l">提现银行：</div>
		<div class="c">
			{ $_A.account_cash_result.bank_name }
		</div>
	</div>

	<div class="module_border">
		<div class="l">提现支行：</div>
		<div class="c">
			{ $_A.account_cash_result.branch }
		</div>
	</div>

	<div class="module_border">
		<div class="l">提现账号：</div>
		<div class="c">
			{ $_A.account_cash_result.account }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">提现总额：</div>
		<div class="c">
			{ $_A.account_cash_result.total }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">到账金额：</div>
		<div class="c">
			{ $_A.account_cash_result.credited }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">费率：</div>
		<div class="c">
			{ $_A.account_cash_result.fee }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
		{if $item.status==0}提现审核中{elseif  $item.status==1} 提现已通过 {elseif $item.status==2}提现被拒绝{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			{ $_A.account_cash_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.account_cash_result.addip}</div>
	</div>
	
	{if $_A.account_cash_result.status==0}
	<div class="module_title"><strong>审核此提现信息</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
		<input type="radio" name="status" value="0" {if $_A.account_cash_result.status==0} checked="checked"{/if} />等待审核  <input type="radio" name="status" value="1" {if $_A.account_cash_result.status==1} checked="checked"{/if}/>审核通过 <input type="radio" name="status" value="2" {if $_A.account_cash_result.status==2} checked="checked"{/if}/>审核不通过 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">到账金额:</div>
		<div class="c">
			<input type="text" name="credited" value="{ $_A.account_cash_result.credited}" size="10">（一旦审核通过将不可再进行修改）
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">费率:</div>
		<div class="c">
			<input type="text" name="fee" value="{ $_A.account_cash_result.fee}" size="5">
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.account_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.account_cash_result.id }" />
		<input type="hidden" name="user_id" value="{ $_A.account_cash_result.user_id }" />
		<input type="submit"  name="reset" value="审核此提现信息" />
	</div>
	{else}
	<div class="module_border">
		<div class="l">审核信息：</div>
		<div class="c">
			审核人：{ $_A.account_cash_result.verify_username },审核时间：{ $_A.account_cash_result.verify_time|date_format:"Y-m-d H:i" },审核备注：{ $_A.account_cash_result.verify_remark}
		</div>
	</div>
	{/if}
	</form>
</div>
{literal}
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
{/literal}


<!--充值记录列表 开始-->
{elseif $_A.query_type=="recharge"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
            <td width="" class="main_td">订单号</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">类型</td>
			<td width="" class="main_td">所属银行</td>
			<td width="" class="main_td">充值金额</td>
			<td width="" class="main_td">费用</td>
			<td width="" class="main_td">到账金额</td>
			<td width="" class="main_td">充值时间</td>
            <td width="" class="main_td">审核时间</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.account_recharge_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
            <td >{ $item.trade_no}</td>
			<td><a href="{$_A.query_url}/recharge&username={$item.username}">{$item.username}</a></td>
			<td >{ if $item.type==1}网上充值{else}线下充值{/if}</td>
			<td >{if $item.payment==0}手动充值{else}{ $item.payment_name}{/if}</td>
			<td >{ $item.money}元</td>
			<td >{if $item.fee==0}{$item.fee}{else}{ $item.fee|round:2}{/if}元</td>
			<td ><font color="#FF0000">{if $item.total==0}{$item.total}{else}{$item.total|round:2}{/if}元</font></td>
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
            <td >{ $item.verify_time|date_format:"Y-m-d H:i"}</td>
			<td >{if $item.status==0}<font color="#6699CC">审核</font>{elseif  $item.status==1} 成功 {else}<font color="#FF0000">失败</font>{/if}</td>
			<td ><a href="{$_A.query_url}/recharge_view{$_A.site_url}&id={$item.id}">审核/查看</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
                 <!--报表起始时间：<input type="text" id="start_ts" value="" {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal}  />
                 报表截止时间：<input type="text" id="end_ts" value="" {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal}  />-->
		
		</div>
		<div class="floatr">
                     <input type='button' onclick='location.href="?{$_A.query_string}&type=excel"' value='导出当前列表'/>
 订单号：<input type="text" name="ordernum" id="ordernum" value="{$magic.request.ordernum}"/>
用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 
起始时间：<input type="text"  name="start_ts" id="sts"  value="{$magic.request.start_ts}"  {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal}   />
截止时间：<input type="text"  name="end_ts" id="ets" value="{$magic.request.end_ts}" {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal}   />
<div style='float:left;margin-left: 254px;'>所属银行：<input type="text" name="bank" id="bank" value="{$magic.request.bank|urldecode}" /> 
充值金额：<input type="text" name="money" id="money" value="{$magic.request.money}"/> 
状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--充值记录列表 结束-->

{elseif $_A.query_type=="offrecharge"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">真实姓名</td>
			<td width="" class="main_td">充值时间</td>
			<td width="" class="main_td">充值金额</td>
			<td width="" class="main_td">充值奖励</td>
                        <td width="" class="main_td">审核时间</td>
		</tr>
		{ foreach  from=$_A.account_orlist key=key item=item}
		{if $item.money >= 5000}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{$item.username}</td>
                        <td>{$item.realname}</td>
                        <td>{$item.addtime|date_format:"Y-m-d H:i"}</td>
                        <td>{$item.money}</td>
                        <td>{$item.fee}</td>
                         <td>{$item.verify_time|date_format:"Y-m-d H:i"}</td>
		</tr>
		{/if}
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
                 报表起始时间：<input type="text" id="start_ts" value="" {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal} />
                 报表截止时间：<input type="text" id="end_ts" value="" {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal}  />
		 <input type="button" value="导出当前报表" onclick="exportExcl2();" />
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


<!--充值核查列表 开始-->
{elseif $_A.query_type=="recharge_ver"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户ID</td>
			<td width="" class="main_td">类型</td>
			<td width="" class="main_td">充值金额</td>
			<td width="" class="main_td">充值时间</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.account_verification_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/recharge&username={$item.user_id}">{$item.user_id}</a></td>
			<td >{$item.remark}</td>
			<td >{$item.money}</td>
			<td >{$item.addtime|date_format:"Y-m-d H:i"}</td>
			<td ><a href="{$_A.query_url}/verification_view{$_A.site_url}&user_id={$item.user_id}&addtime={$item.addtime}">/查看</a></td>
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		 <A href="?{$_A.query_string}&type=excel">导出当前报表</A>
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--充值核查列表 结束-->

<!--充值核查显示 开始-->
{elseif $_A.query_type == "verification_view"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户ID</td>
			<td width="" class="main_td">类型</td>
			<td width="" class="main_td">充值金额</td>
			<td width="" class="main_td">充值时间</td>

		</tr>
		{ foreach  from=$_A.account_verification_view key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/recharge&username={$item.user_id}">{$item.user_id}</a></td>
			<td >{$item.remark}</td>
			<td >{$item.money}</td>
			<td >{$item.addtime|date_format:"Y-m-d H:i"}</td>
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		 <A href="?{$_A.query_string}&type=excel">导出当前报表</A>
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--充值核查显示 开始-->


<!--提现审核 开始-->
{elseif $_A.query_type == "recharge_view"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>充值查看</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$_A.account_recharge_result.user_id}&type=scene",500,230,"true","","true","text");'>{ $_A.account_recharge_result.username}</a>
		</div>
	</div>

	<div class="module_border">
		<div class="l">充值类型：</div>
		<div class="c">
			{if $_A.account_recharge_result.type==1}网上充值{else}线下充值{/if}
		</div>
	</div>

	<div class="module_border">
		<div class="l">支付方式：</div>
		<div class="c">
			{ $_A.account_recharge_result.payment_name}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">充值总额：</div>
		<div class="c">
			{ $_A.account_recharge_result.money }元
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">费用：</div>
		<div class="c">
			{ $_A.account_recharge_result.fee }元
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">实际到账：</div>
		<div class="c">
			{ $_A.account_recharge_result.total }元
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">用户备注：</div>
		<div class="c">
		{ $_A.account_recharge_result.remark }
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">流水号：</div>
		<div class="c">
		{ $_A.account_recharge_result.remark }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
		{if $_A.account_recharge_result.status==0}等待审核{elseif  $_A.account_recharge_result.status==1} 充值成功 {elseif $_A.account_recharge_result.status==2}充值失败{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			{ $_A.account_recharge_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.account_recharge_result.addip}</div>
	</div>
	
	{if $_A.account_recharge_result.status==0  }
	<div class="module_title"><strong>审核此充值信息</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
	<input type="radio" name="status" value="1"/>充值成功   <input type="radio" name="status" value="2"  checked="checked"/>充值失败 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">到账金额:</div>
		<div class="c">
			<input type="text" name="total" value="{ $_A.account_recharge_result.total }" size="15" >（一旦审核通过将不可再进行修改）
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.account_recharge_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.account_recharge_result.id }" />
		
		<input type="submit"  name="reset" value="审核此充值信息" />
	</div>
	{else}
		{if $_A.account_recharge_result.type==2 }
	<div class="module_border">
		<div class="l">审核信息：</div>
		<div class="c">
			审核人：{ $_A.account_result.verify_username },审核时间：{ $_A.account_result.verify_time|date_format:"Y-m-d H:i" },审核备注：{ $_A.account_result.verify_remark}
		</div>
	</div>
	{/if}
	{/if}
	</form>
</div>
{literal}
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
{/literal}



<!--添加充值记录 开始-->
{elseif $_A.query_type == "recharge_new"}

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
			线下充值<input type="hidden" name="type" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">金额：</div>
		<div class="c">
			<input type="text" name="money" />
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

<!--添加充值记录 结束-->

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


<!--添加充值记录 开始-->
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
				<option value="scene_account">现场认证费用</option>
				<option value="vouch_advanced">担保垫付扣费</option>
				<option value="borrow_kouhui">借款人罚金扣回</option>
				<option value="account_other">其他</option>
			</select>
		</div>
	</div>
	<div class="module_border">
		<div class="l">金额：</div>
		<div class="c">
			<input type="text" name="money" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<input type="text" name="remark" />比如，现场费用扣除200元
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

<!--添加充值记录 结束-->

<!--资金使用记录列表 开始-->
{elseif $_A.query_type=="log"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">类型</td>
			<td width="" class="main_td">总金额</td>
			<td width="" class="main_td">操作金额</td>
			<td width="" class="main_td">可用金额</td>
			<td width="" class="main_td">冻结金额</td>
			<td width="" class="main_td">待收金额</td>
			<td width="" class="main_td">交易对方</td>
			<td width="" class="main_td">记录时间</td>
            <td width="" class="main_td">备注</td>
			<!--<td width="" class="main_td">操作</td>-->
		</tr>
		{ foreach  from=$_A.account_log_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/recharge&username={$item.username}">{$item.username}</a></td>
			<td >{ $item.type|linkage:"account_type"}</td>
			<td >{ $item.total}</td>
			<td >{ $item.money}</td>
			<td >{ $item.use_money}</td>
			<td >{ $item.no_use_money|default:0}</td>
			<td >{ $item.collection|default:0}</td>
			<td >{ $item.to_username|default:admin}</td>
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
            <td >{ $item.remark}</td>
			<!--<td ><a href="{$_A.query_url}/cash_view{$_A.site_url}&id={$item.id}">审核/查看</a></td>-->
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
                报表起始时间：<input type="text" id="start_ts" name="start_ts" value="{$magic.request.start_ts}" {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal} />
                报表截止时间：<input type="text" id="end_ts" name="end_ts" value="{$magic.request.end_ts}" {literal} onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" {/literal} />
		<input type="button" value="导出当前报表" onclick="exportLogExcl();" />
		</div>
		<div class="floatr">
			时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>   
		{linkages nid="account_type" value="$magic.request.type" name="type" type="value" default="全部" } 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--资金使用记录列表 结束-->


{/if}
<script>
var url = '{$_A.query_url}/{$_A.query_type}';
var urlExport="?{$_A.query_string}&type=excel";
var urlLogExport="?{$_A.query_string}&type1=excel";
var urlCashExport = "{$_A.query_url}/cash&status={$magic.request.status}&type=excel";
var urloffExport = "{$_A.query_url}/offrecharge&type=excel";
{literal}
function exportLogExcl() {

    var start = $("#start_ts").val();
    if(start != "") {
        urlLogExport += "&start_ts=" + start;
    }
    var end = $("#end_ts").val();
    if(end != "") {
        urlLogExport += "&end_ts=" + end;
    }

    location.href=urlLogExport;

}    

function exportCashExcl() {

    var start = $("#start_ts").val();
    if(start != "") {
        urlCashExport += "&start_ts=" + start;
    }
    var end = $("#end_ts").val();
    if(end != "") {
        urlCashExport += "&end_ts=" + end;
    }
    location.href=urlCashExport;

}
    
    
function exportExcl() {

    var start = $("#start_ts").val();
    if(start != "") {
        urlExport += "&start_ts=" + start;
    }
    var end = $("#end_ts").val();
    if(end != "") {
        urlExport += "&end_ts=" + end;
    }
    location.href=urlExport;
}
function ttime(){
WdatePicker({dateFmt:'yyyy年MM月dd日 HH时mm分ss秒'});
}
function exportExcl2() {

    var start = $("#start_ts").val();
    if(start != "") {
        urloffExport += "&start_ts=" + start;
    }
    var end = $("#end_ts").val();
    if(end != "") {
       urloffExport += "&end_ts=" + end;
    }
    location.href=urloffExport;
}


  
function sousuo(){
	$(function(){
	var u = $("#username").val();
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
        var start_ts = $("#start_ts").val();
        var end_ts = $("#end_ts").val();
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
        if (start_ts!=null){
		 sou += "&start_ts="+start_ts;
	}
        if (end_ts!=null){
		 sou += "&end_ts="+end_ts;
	}

        var sts=$("#sts").val();
        var ets=$("#ets").val();
        var money=$("#money").val();
        var bank=$("#bank").val();
        if(sts!=null){
        sou+="&start_ts="+sts;
        }
        if(ets!=null){
        sou+="&end_ts="+ets;
        }
        if(money!=null){
        sou+="&money="+money;
        }
        if(bank!=null){
        sou+="&bank="+encodeURI(bank);
        }
	if (sou!=""){
	location.href=url+sou+"&a=cash";
	}
}

</script>
{/literal}