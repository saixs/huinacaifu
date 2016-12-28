{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">

	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
		<div class="module_title"><strong>{ if $_A.query_type == "edit" }�༭{else}����{/if}��֤</strong></div>


		<div class="module_border">
			<div class="l">�û�ID��</div>
			<div class="c">
				<input type="text" name="user_id"  class="input_border" value="{ $_A.attestation_result.user_id}" size="30" />
			</div>
		</div>

		<div class="module_border">
			<div class="l">������Ŀ��</div>
			<div class="c">
				<select  name="type_id" >{foreach from="$_A.attestation_type_list" item="var"}<option value="{$var.type_id}" {if $_A.attestation_result.type_id == $var.type_id} selected="selected"{/if}>{$var.name}</option> {/foreach}
				</select>
			</div>
		</div>

		<div class="module_border" >
			<div class="l">�ϴ�ͼƬ��</div>
			<div class="c">
				<input type="file" name="litpic" size="30" class="input_border"/>{if $_A.attestation_result.litpic!=""}<a href="./{ $_A.attestation_result.litpic}" target="_blank" title="��ͼƬ"><img src="{ $tpldir }/images/ico_1.jpg" border="0"  /></a>{/if}</div>
		</div>


		<div class="module_border" >
			<div class="l">����:</div>
			<div class="c">
				<input type="text" name="order"  class="input_border" value="{ $_A.attestation_result.order|default:10}" size="10" />
			</div>
		</div>

		<div class="module_border" >
			<div class="l">���ݼ��:</div>
			<div class="c">
				<textarea name="content" cols="45" rows="5">{ $_A.attestation_result.content}</textarea>
			</div>


		</div>

		<div class="module_submit" >
			{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.attestation_result.id }" />{/if}
			<input type="submit"  name="submit" value="ȷ���ύ" />
			<input type="reset"  name="reset" value="���ñ���" />
		</div>
	</form>
</div>
{literal}
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

</script>
{/literal}
{elseif $_A.query_type == 'bankCheck'}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr>
		<th width="" class="main_td">ID</th>
		<th width="*" class="main_td">�û���</th>
		<th width="*" class="main_td">��ʵ����</th>
		<th width="*" class="main_td">��������</th>
		<th width="" class="main_td">����֧��</th>
		<th width="" class="main_td">�����ʺ�</th>
		<th width="" class="main_td">��ϵ�绰</th>
		<th width="" class="main_td">����</th>
		<th width="" class="main_td">����ʱ��</th>
		<th width="" class="main_td">����</th>
	</tr>
	{foreach from=$list item="var"}
	<tr>
		<td>{$var.id}</td>
		<td>{$var.username}</td>
		<td>{$var.realname}</td>
		<td>{$var.bank|linkage}</td>
		<td>{$var.branch}</td>
		<td>{$var.account|hideMiddle}</td>
		<td>{$var.phone}</td>
		<td>{$var.email}</td>
		<td>{$var.addtime|date_format:'Y-m-d H:i:s'}</td>
		<td>
			<a href="{$_A.admin_url}&q=module/attestation/bankCheck&type=allow&id={$var.id}">ͨ��</a> |
			<a href="{$_A.admin_url}&q=module/attestation/bankCheck&type=reject&id={$var.id}">�ܾ�</a>
		</td>
	</tr>
	{/foreach}
</table>
{elseif $_A.query_type == "view"}
<div class="module_add">

	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
		<div class="module_title"><strong>֤���鿴</strong></div>

		<div class="module_border">
			<div class="l">�û�����</div>
			<div class="c">
				<a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?{$_A.admin_url}&q=module/user/view&user_id={$_A.attestation_result.user_id}&type=scene",500,230,"true","","true","text");'>{ $_A.attestation_result.username}</a>
			</div>
		</div>


		<div class="module_border">
			<div class="l">���ͣ�</div>
			<div class="c">
				{ $_A.attestation_result.type_name }
			</div>
		</div>


		<div class="module_border">
			<div class="l">֤��ͼƬ��</div>
			<div class="c">
				<a href="{ $_A.attestation_result.litpic|imgurl_format }" target="_blank"><img src="{ $_A.attestation_result.litpic|imgurl_format }" width="100" height="100" /></a>
			</div>
		</div>

		<div class="module_border">
			<div class="l">���:</div>
			<div class="c">
				{ $_A.attestation_result.content}</div>
		</div>

		<div class="module_border">
			<div class="l">����ʱ��/IP:</div>
			<div class="c">
				{ $_A.attestation_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.attestation_result.addip}</div>
		</div>

		{if $_A.attestation_result.status==1 }

		<div class="module_border">
			<div class="l">����:</div>
			<div class="c">
				{ $_A.attestation_result.jifen} ��</div>
		</div>

		<div class="module_border">
			<div class="l">��˱�ע:</div>
			<div class="c">
				{ $_A.attestation_result.verify_remark}</div>
		</div>

		<div class="module_border">
			<div class="l">���ʱ��:</div>
			<div class="c">
				{ $_A.attestation_result.verify_time|date_format:'Y-m-d H:i:s'}</div>
		</div>
		{else}
		<div class="module_title"><strong>��˴�֤��</strong></div>

		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				<input type="radio" name="status" value="1"/><font color="#009900">���ͨ��</font> <input type="radio" name="status" value="2" checked="checked"/>��˲�ͨ�� </div>
		</div>

		<div class="module_border" >
			<div class="l">ͨ�������û���:</div>
			<div class="c">
				<input type="text" name="jifen" value="{ $_A.arrestation_value}" size="5"> ��
			</div>
		</div>

		<div class="module_border" >
			<div class="l">��˱�ע:</div>
			<div class="c">
				<textarea name="verify_remark" cols="45" rows="5">{ $_A.attestation_result.verify_remark}</textarea>
			</div>
		</div>



		<div class="module_submit" >
			<input type="hidden" name="id" value="{ $_A.attestation_result.id }" />
			<input type="hidden" name="type_name" value="{ $_A.attestation_result.type_name }" />
			<input type="hidden" name="user_id" value="{ $_A.attestation_result.user_id }" />

			<input type="submit"  name="reset" value="��˴�֤��" />
		</div>
	</form>
	{/if}
</div>
{literal}
<script>
	function check_form(){
		var frm = document.forms['form1'];
		var verify_remark = frm.elements['verify_remark'].value;
		var errorMsg = '';
		if (verify_remark.length == 0 ) {
			errorMsg += '��ע������д' + '\n';
		}

		if (errorMsg.length > 0){
			alert(errorMsg); return false;
		} else{
			return true;
		}
	}

</script>
{/literal}
{elseif $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="" method="post">
		<tr >
			<td class="main_td">ID</td>
			<td width="*" class="main_td">�û�����</td>
			<td width="*" class="main_td">��ʵ����</td>
			<td class="main_td">��֤����</td>
			<td class="main_td">��֤ͼƬ</td>
			<td class="main_td">��֤״̬</td>
			<td class="main_td">��֤����</td>
			<td class="main_td">��֤���</td>
			<td class="main_td">����</td>
		</tr>
		{ foreach  from=$_A.attestation_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center" >{ $item.id}</td>
		<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
		<td class="main_td1" align="center" >{ $item.realname}</td>
		<td class="main_td1" align="center" >{$item.type_name}</td>
		<td class="main_td1" align="center" ><a href="{ $item.litpic|imgurl_format }" target="_blank" ><img src="{ $item.litpic|imgurl_format }" width="50" height="50" style="border:1px solid #CCCCCC" /></a></td>
		<td class="main_td1" align="center" >{ if $item.status ==1}<font color="#009900">���ͨ��</font>{ elseif $item.status ==0}<font color="#ff0000">�ȴ����</font>{else}���δͨ��{/if}</td>
		<td class="main_td1" align="center" >{$item.jifen}��</td>
		<td class="main_td1" align="center" >{$item.content}</td>
		<td class="main_td1" align="center" >
			{if $item.status !=1}<a href="{$_A.query_url}/view{$_A.site_url}&id={$item.id}">[���]</a>{/if}
			{if $item.is_delete !=1}<a href="{$_A.query_url}/view{$_A.site_url}&del_id={$item.id}">[ɾ��]</a>{/if}
		</td>
		</tr>
		{ /foreach}
		<tr>
			<td colspan="10" class="action">
				<div class="floatl">

				</div>
				<div class="floatr">
					�û�����<input type="text" name="username" id="username" value="{$magic.request.username}"/> ��ʵ������<input type="text" name="realname" id="realname" value="{$magic.request.realname}"/> ״̬<select id="status" ><option value="">ȫ��</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>��ͨ��</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>δͨ��</option></select> <input type="button" value="����" / onclick="sousuo()">
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
	var url = '{$_A.query_url}';
	var _url = '{$_A.site_url}';
	{literal}
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
{/literal}

{elseif $_A.query_type == "type_list"}
<table width="100%" border="0" cellpadding="5" cellspacing="1" >
	<tr>
		<td class="main_td">��������</td>
		<td class="main_td">����</td>
		<td class="main_td">��Ҫ</td>
		<td class="main_td">��ע</td>
		<td class="main_td">����</td>
		<td class="main_td">״̬</td>
		<td class="main_td">����</td>
	</tr>
	<form action="{$_A.query_url}/type_order" method="post">
		{ foreach from = $_A.attestation_type_list key=key item=item}
		<tr {if $key%2==1} class="tr2"{/if}>
		<td bgcolor="#ffffff" >{$item.name}</td>
		<td bgcolor="#ffffff" >{$item.jifen}</td>
		<td bgcolor="#ffffff" >{$item.summary}</td>
		<td bgcolor="#ffffff">{$item.remark}</td>
		<td bgcolor="#ffffff"><input name="order[]" size="2" value="{ $item.order}"type="text" ><input name="type_id[]" type="hidden" size="2" value="{ $item.type_id}" ></td>
		<td  bgcolor="#ffffff" >{ if $item.status==1}��ͨ{else}<font color=red>�ر�</font>{/if}</td>
		<td bgcolor="#ffffff"><a href="{$_A.query_url}/type_edit&type_id={$item.type_id}">�޸�</a>/<a href="#" onclick="javascript:if(confirm('ȷ��Ҫɾ����?������')) location.href='{$_A.query_url}/type_del&type_id={$item.type_id}'">ɾ��</a></td>
		</tr>
		{ /foreach}
		<tr>
			<td   colspan="7" class="action"><input type="button" onclick="javascript:location.href='{$_A.query_url}/type_new{$_A.site_url}'" value="��������" />  <input type="submit" value="�޸�����" /> </td>
		</tr>
	</form>
</table>
{ elseif $_A.query_type == "type_new" || $_A.query_type == "type_edit" }
<div class="module_add">

	<form enctype="multipart/form-data" name="form1" method="post" action="" onsubmit="return check_form();"  >
		<div class="module_title"><strong>{ if $_A.query_type == "edit" }�༭{else}����{/if}��֤����</strong></div>

		<div class="module_border">
			<div class="l">��������:</div>
			<div class="c">
				<input type="text" name="name"  class="input_border" value="{ $_A.attestation_type_result.name}" size="30" />
			</div>
		</div>

		<div class="module_border">
			<div class="l">����:</div>
			<div class="c">
				<input type="text" name="order"  class="input_border" value="{ $_A.attestation_type_result.order|default:10}" size="10" />
			</div>
		</div>

		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				<input type="radio" name="status" value="0"  { if $_A.attestation_type_result.status == 0 }checked="checked"{/if}/> �ر�<input type="radio" name="status" value="1"  { if $_A.attestation_type_result.status ==1 ||$_A.attestation_type_result.status ==""}checked="checked"{/if}/>��ͨ
			</div>
		</div>

		<div class="module_border">
			<div class="l">Ĭ�ϻ���:</div>
			<div class="c">
				<input type="text" name="jifen" value="{ $_A.attestation_type_result.jifen|default:2}" /
			</div>
		</div>

		<div class="module_border">
			<div class="l">��Ҫ˵��:</div>
			<div class="c">
				<textarea name="summary" cols="55" rows="6" >{ $_A.attestation_type_result.summary}</textarea>
			</div>
		</div>

		<div class="module_border">
			<div class="l">��ע:</div>
			<div class="c">
				<textarea name="remark" cols="55" rows="6" >{ $_A.attestation_type_result.remark}</textarea>
			</div>
		</div>

		<div class="module_submit" >
			{ if $_A.query_type == "type_edit" }<input type="hidden" name="type_id" value="{ $_A.attestation_type_result.type_id }" />{/if}
			<input type="submit" value="ȷ���ύ" />
			<input type="reset" name="reset" value="���ñ���" />
		</div>
	</form>
</div>

{literal}
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
	{/literal}
</script>
{elseif $_A.query_type=="realname"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">

	<tr >

		<td width="*" class="main_td">�û�����</td>
		<td class="main_td">��ʵ����</td>
		<td class="main_td">�Ա�</td>
		<td class="main_td">����</td>
		<td class="main_td">����</td>
		<td class="main_td">֤������</td>
		<td class="main_td">֤������</td>
		<td class="main_td">����</td>
		<td class="main_td">����֤ͼƬ</td>
		<td class="main_td">״̬</td>
		<td class="main_td">����</td>
	</tr>
	{ foreach  from=$_A.user_real_list key=key item=item}
	<tr  {if $key%2==1} class="tr2"{/if}>
	<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
	<td class="main_td1" align="center" >{$item.realname}</td>
	<td class="main_td1" align="center" >{if $item.sex==1}��{else}Ů{/if}</td>
	<td class="main_td1" align="center" >{$item.nation|linkage}</td>
	<td class="main_td1" align="center" >{$item.birthday|date_format:"Y-m-d "}</td>
	<td class="main_td1" align="center" >{$item.card_type|linkage:"card_type"}</td>
	<td class="main_td1" align="center" >{$item.card_id}</td>
	<td class="main_td1" align="center" >{$item.area|area}</td>
	<td class="main_td1" align="center" >{if $item.card_pic1!=""}<a href="{$item.card_pic1}" target="_blank">����</a>{else}��{/if}| {if $item.card_pic2!=""}<a  href="{$item.card_pic2}" target="_blank">����</a>{else}��{/if}</td>
	<!--
	<td class="main_td1" align="center" >{if $item.card_pic1!=""}<a href="{$item.card_pic1}"  onclick='tipsWindown("����֤����ͼƬ","img:{$item.card_pic1}",500,430,"true","","true","img")'>����</a>{else}��{/if}| {if $item.card_pic2!=""}<a  href="#"  onclick='tipsWindown("����֤����ͼƬ","img:{$item.card_pic2}",500,430,"true","","true","img")'>����</a>{else}��{/if}</td>
	-->
	<td class="main_td1" align="center" >{if $item.real_status==2}<font color="#00ffff">�ȴ����</font>{else}<font color="#009900">���ͨ��</font>{/if}</td>
	<td class="main_td1" align="center" >{if $item.real_status!=1}<a href="javascript:void(0)" onclick='tipsWindown("��ʵ�������","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=realname",500,230,"true","","true","text");'>���</a>{else}-{/if} </td>
	</tr>
	{ /foreach}
	<tr>
		<td colspan="11" class="action">
			<div class="floatl">

			</div>
			<div class="floatr">
				�û�����<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/> ״̬<select id="status" ><option value="">ȫ��</option><option value="1" {if $magic.request.real_status==1} selected="selected"{/if}>��ͨ��</option><option value="0" {if $magic.request.real_status=="0"} selected="selected"{/if}>δͨ��</option></select> <input type="button" value="����" / onclick="sousuo()">
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
	var url = '{$_A.query_url}/realname';
	{literal}
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
{/literal}
{elseif $_A.query_type == "vip"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">�û���</td>
		<td width="*" class="main_td">�ͷ�����</td>
		<th width="" class="main_td">����ʱ��</th>
		<th width="" class="main_td">�û�����</th>
		<th width="" class="main_td">��¼����</th>
		<th width="" class="main_td">״̬</th>
		<th width="" class="main_td">�Ƿ�ɷ�</th>
		<td width="" class="main_td">����</td>
	</tr>
	{ foreach  from=$_A.user_vip_list key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
	<td class="main_td1" align="center">{ $item.user_id}</td>
	<td class="main_td1" align="center">{$item.username}</td>
	<td class="main_td1" align="center">{$item.kefu_username}</td>
	<td class="main_td1" align="center" >{$item.addtime|date_format:"Y-m-d H:i:s"}</td>
	<td class="main_td1" align="center" >{$item.typename}</td>
	<td class="main_td1" align="center">{$item.logintime}</td>
	<td class="main_td1" align="center">{if $item.vip_status==2}vip���{else}VIP��Ա{/if}</td>
	<td class="main_td1" align="center">{if $item.vip_money==""}��{else}{$item.vip_money}Ԫ{/if}</td>
	<td class="main_td1" align="center"><a href="{$_A.query_url}/vipview&user_id={$item.user_id}{$_A.site_url}">��˲鿴</a> </td>
	</tr>
	{ /foreach}
	<tr>
		<td colspan="10" class="action">
			<div class="floatl">
				<script>
					var url = '{$_A.query_url}/vip&type={$magic.request.type}';
					{literal}
					function sousuo(){
						var username = $("#username").val();
						var kefu = $("#kefu").val();
						var keywords = $("#keywords").val();
						location.href=url+"&keywords="++encodeURI(keywords)+"&kefu="+kefu;
					}

				</script>
				{/literal}
			</div>
			<div class="floatr">
				�û�����<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords|urldecode}"/> 	�ͷ��û�����<input type="text" name="kefu" id="kefu" value="{$magic.request.kefu|urldecode}"/> <input type="button" value="����" / onclick="sousuo()">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="10" class="page">
			{$_A.showpage}
		</td>
	</tr>
</table>
{ elseif $_A.query_type == "vipview"  }
<div class="module_add">

	<form enctype="multipart/form-data" name="form1" method="post" action="" onsubmit="return check_form();"  >
		<div class="module_title"><strong>VIP��˲鿴</strong></div>

		<div class="module_border">
			<div class="l">�û���:</div>
			<div class="c">
				{$_A.user_result.username}
			</div>
		</div>

		<div class="module_border">
			<div class="l">���:</div>
			<div class="c">
				<input type="radio" value="1" name="vip_status" />���ͨ�� <input type="radio" value="0" name="vip_status" checked="checked" />��˲�ͨ��
			</div>
		</div>
		<div class="module_border">
			<div class="l">��ע:</div>
			<div class="c">
				{$_A.user_result.vip_remark}
			</div>
		</div>


		<div class="module_border">
			<div class="l">��˱�ע:</div>
			<div class="c">
				<textarea name="vip_verify_remark" cols="55" rows="6" >{$_A.user_result.vip_verify_remark}</textarea>
			</div>
		</div>

		<div class="module_submit" >
			<input type="hidden" name="user_id" value="{$_A.user_result.user_id}" />
			<input type="submit" value="ȷ���ύ" />
			<input type="reset" name="reset" value="���ñ���" />
		</div>
	</form>
	{elseif $_A.query_type=="all"}
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">

		<tr >

			<td width="*" class="main_td">�û�����</td>
			<td class="main_td">��ʵ����</td>
			<td class="main_td">ʵ����֤</a></td>
			<td class="main_td">������֤</a></td>
			<td class="main_td" width="220"> �ֻ���֤</td>
			<td class="main_td">��Ƶ��֤</td>
			<td class="main_td">�ֳ���֤</td>
			<td class="main_td">����</td>
		</tr>
		{ foreach  from=$_A.user_all_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
		<td class="main_td1" align="center" >{$item.realname}</td>
		<td class="main_td1" align="center" >{if $item.real_status==2}<a href="javascript:void(0)" onclick='tipsWindown("��ʵ�������","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=realname",500,230,"true","","true","text");'><font color="#FF0000">�ȴ����</font></a>{elseif $item.real_status==1}<font color="#009900">���ͨ��</font>{else}<font color="#cccccc">û������</font>{/if}</td>
		<td class="main_td1" align="center" >{if $item.email_status==2}<a href="javascript:void(0)" onclick='tipsWindown("������֤���","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=email",500,230,"true","","true","text");'><font color="#FF0000">�ȴ����</font></a>{elseif $item.email_status==1}<font color="#009900">���ͨ��</font>{else}<font color="#cccccc">û������</font>{/if}</td>
		<td class="main_td1" align="center" >
			{if $item.phone_status>1}<font color="#999999">[�ֻ���{$item.phone}]</font>
			<a href="javascript:void(0)" onclick='tipsWindown("�ֻ���֤���","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=phone",500,230,"true","","true","text");'>
				<font color="#FF0000">�ȴ����</font>
			</a>
			{elseif $item.phone_status==1}
			<font color="#999999">[�ֻ���{$item.phone}]</font>
			<font color="#009900">���ͨ��</font>
			{else}
			<font color="#cccccc">û������</font>
			{/if}
		</td>
		<td class="main_td1" align="center" >{if $item.video_status==2}<a href="javascript:void(0)" onclick='tipsWindown("��Ƶ��֤���","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=video",500,230,"true","","true","text");'><font color="#FF0000">�ȴ����</font></a>{elseif $item.video_status==1}<font color="#009900">���ͨ��</font>{else}<font color="#cccccc">û������</font>{/if}</td>
		<td class="main_td1" align="center" >{if $item.scene_status==0}<a href="javascript:void(0)" onclick='tipsWindown("�ֳ����","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'><font color="#FF0000">�ȴ����</font></a>{elseif $item.scene_status==1}<font color="#009900">���ͨ��</font>{else}<font color="#cccccc">û������</font>{/if}</td>
		<td class="main_td1" align="center" ><a href="{$_A.query_url}/jifen&user_id={$item.user_id}">�����޸�</a></td>

		</tr>
		{ /foreach}
		<tr>
			<td colspan="11" class="action">
				<div class="floatl">

				</div>
				<div class="floatr">
					�û�����<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/> ��ʵ������<input type="text" name="realname" id="realname" value="{$magic.request.realname|urldecode}"/> ״̬<select id="type" ><option value="">ȫ��</option>
					<option value="phone" {if $magic.request.type=="phone"} selected="selected"{/if}>�ֻ���֤</option>
					<option value="video" {if $magic.request.type=="video"} selected="selected"{/if}>��Ƶ��֤</option>
					<option value="realname" {if $magic.request.type=="realname"} selected="selected"{/if}>ʵ����֤</option>
					<option value="email" {if $magic.request.type=="email"} selected="selected"{/if}>������֤</option>
					<option value="scene" {if $magic.request.type=="scene"} selected="selected"{/if}>�ֳ���֤</option>

				</select> <input type="button" value="����" / onclick="sousuo()">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="11" class="page">
				{$_A.showpage}
			</td>
		</tr>
	</table>
	<script>
		var url = '{$_A.query_url}/all';
		{literal}
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
	{/literal}

	{elseif $_A.query_type == "viewall"}
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�û���</td>
			<td width="*" class="main_td">��ʵ����</td>
			<th width="" class="main_td">ʵ����֤</th>
			<th width="" class="main_td">������֤</th>
			<th width="" class="main_td">�ֻ���֤</th>
			<th width="" class="main_td">�Ƿ�VIP</th>
			<th width="" class="main_td">����ʱ��</th>
			<td width="" class="main_td">����</td>
		</tr>
		{ foreach  from=$_A.viewall_list key=key item=item}
		<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.user_id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.realname}</td>
		<td class="main_td1" align="center">{if $item.real_status==1}����֤{else}<font color="#FF0000">δ��֤</font>{/if}</td>
		<td class="main_td1" align="center">{if $item.email_status==1}����֤{else}<font color="#FF0000">δ��֤</font>{/if}</td>
		<td class="main_td1" align="center">{if $item.phone_status==1}����֤{else}<font color="#FF0000">δ��֤</font>{/if}</td>
		<td class="main_td1" align="center">{if $item.vip_status==1}VIP��Ա{else}��ͨ��Ա{/if}</td>
		<td class="main_td1" align="center" >{$item.addtime|date_format:"Y-m-d H:i:s"}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url}/view_all&user_id={$item.user_id}{$_A.site_url}">�鿴ȫ������</a> </td>
		</tr>
		{ /foreach}
		<tr>
			<td colspan="10" class="action">
				<div class="floatl">
				</div>
				<div class="floatr">
					�û�����<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords|urldecode}"/> ������<input type="text" name="realname" id="realname" value="{$magic.request.realname|urldecode}"/>
					<input type="button" value="����" onclick="sousuo()" />
				</div>
				<script>
					var url = '{$_A.query_url}/viewall';
					{literal}
					function sousuo(){
						var username = $("#username").val();
						var realname = $("#realname").val();
						var keywords = $("#keywords").val();
						location.href=url+"&keywords="+encodeURI(keywords)+"&realname="+realname;
					}
					{/literal}
				</script>

			</td>
		</tr>
		<tr>
			<td colspan="10" class="page">
				{$_A.showpage}
			</td>
		</tr>
	</table>
	{ elseif $_A.query_type == "view_all"  }
	<div class="module_add">

		<div class="module_title"><strong>�û���Ϣ�鿴</strong></div>

		<div class="module_border">
			<div class="l">�û���:</div>
			<div class="c">
				{$_A.user_result.username}
			</div>
		</div>
		<div class="module_border">
			<div class="l">��½����:</div>
			<div class="c">
				{$_A.user_result.logintime}
			</div>
		</div>

		<div class="module_border">
			<div class="l">����¼ʱ��:</div>
			<div class="c">
				{$_A.user_result.lasttime|date_format}
			</div>
			<div class="l">ע��ʱ��:</div>
			<div class="c">
				{$_A.user_result.addtime|date_format}
			</div>
		</div>
		<div class="module_title"><strong>�˺�����</strong></div>
		{article module="borrow" function="GetUserLog" user_id="request" var="acc"}
		<div class="module_border">
			<div class="w">�˻��ܶ�:</div>
			<div class="h">
				��{$acc.total|default:0}
			</div>
			<div class="w">�������:</div>
			<div class="h">
				��{$acc.use_money|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w">�����ܶ�:</div>
			<div class="h">
				��{$acc.no_use_money|default:0}
			</div>
			<div class="w">�����ܶ�:</div>
			<div class="h">
				��{$acc.collection|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w">������Ϣ:</div>
			<div class="h">
				��{$acc.collection_interest0|default:0}
			</div>
			<div class="w">������ս��:</div>
			<div class="h">
				��{$acc.new_collection_account|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w">��׬��Ϣ:</div>
			<div class="h">
				��{$acc.collection_interest1|default:0}
			</div>
			<div class="w">��׬����:</div>
			<div class="h">
				��{$acc.award_add|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w">����ܶ�:</div>
			<div class="h">
				��{$acc.borrow_num|default:0}
			</div>
			<div class="w">�����ܶ�:</div>
			<div class="h">
				��{$acc.wait_payment|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w">����������:</div>
			<div class="h">
				��{$acc.new_repay_account|default:0}
			</div>
			<div class="w">���ۻ��:</div>
			<div class="h">
				��{if $_U.user_cache.vip_money=="" && $_G.user_result.vip_status==1}{$_G.system.con_vip_money}{else}0{/if}
			</div>
		</div>
		<div class="module_border">
			<div class="w">���ö��:</div>
			<div class="h">
				��{$acc.credit|default:0}
			</div>
			<div class="w">�������ö��:</div>
			<div class="h">
				��{$acc.credit_use|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w">�������:</div>
			<div class="h">
				��{$acc.borrow_vouch|default:0}
			</div>
			<div class="w">���ý������:</div>
			<div class="h">
				��{$acc.borrow_vouch_use|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w">Ͷ�ʵ������:</div>
			<div class="h">
				��{$acc.tender_vouch|default:0}
			</div>
			<div class="w">����Ͷ�ʵ������:</div>
			<div class="h">
				��{$acc.tender_vouch_use|default:0}
			</div>
		</div>
		<div class="module_border">
			<div class="w"> �������ʱ��:</div>
			<div class="h">
				{$acc.new_collection_time|date_format:"Y-m-d"}
			</div>
			<div class="w">�������ʱ��:</div>
			<div class="h">
				{$acc.new_repay_time|date_format:"Y-m-d"|default:""}
			</div>
		</div>
		{/article}
		<div class="module_title"><strong>�ѳɹ�Ͷ�ʵĽ��</strong></div>
		<table width="1000" border="1">
			<tr>
				<td  ><strong>����</strong></td>
				<td  ><strong>�����</strong></td>
				<td  ><strong>����߻���</strong></td>
				<td  ><strong>���(Ԫ)</strong></td>
				<td  ><strong>������</strong></td>
				<td  ><strong>����</strong></td>
				<td  ><strong>Ͷ��ʱ��</strong></td>
				<td  ><strong>Ӧ�ձ�Ϣ</strong></td>
				<td  ><strong>������</strong></td>
			</tr>
			{list module="borrow" var="loop" function ="GetBorrowSucces" showpage="3" user_id="request" keywords="request" dotime1="request" dotime2="request" type="$magic.request.type" }
			{foreach from="$loop.list" item="item"}
			<tr>
				<td title="{$item.borrow_name}"><pre><a href="/invest/a{$item.id}.html" target="_blank">{$item.borrow_name|truncate:10}</a></pre></td>
				<td  ><pre><a href="/index.php?user&q=code/message/sent&receive={$item.username}">{$item.username}</a></pre></td>
				<td  ><pre>{$item.credit|credit}{$item.credit}��</pre></td>
				<td  ><pre>��{$item.account}</pre></td>
				<td  ><pre>{$item.apr}%</pre></td>
				<td  ><pre>{ if $item.isday ==1}{$item.time_limit_day}��{ else}{$item.time_limit}����{/if}</pre></td>
				<td  ><pre>{$item.tender_time|date_format:"Y-m-d H:i:s"}</pre></td>
				<td  ><pre>��{$item.repayment_account}</pre></td>
				<td  ><pre>��{$item.anum}</pre></td>
			</tr>
			{/foreach}
			<td colspan="11" class="page">
				{$loop.showpage}
			</td>
			{/list}
		</table>

		<div class="module_title"><strong>�����б�Ľ��</strong></div>
		<table width="1000" border="1">
			<tr>
				<td  ><strong>����</strong></td>
				<td  ><strong>����</strong></td>
				<td  ><strong>���(Ԫ)</strong></td>
				<td  ><strong>������</strong></td>
				<td  ><strong>����</strong></td>
				<td  ><strong>����ʱ��</strong></td>
				<td  ><strong>����</strong></td>
				<td  ><strong>״̬</strong></td>
			</tr>
			{literal}
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
			{/literal}
			{list module="borrow" var="loop" function ="GetList" showpage="3" user_id="request" keywords="request" dotime1="request" dotime2="request" status="0,1,2,4,5,6" }
			{foreach from="$loop.list" item="item"}
			<tr {if $key%2==1} class="tr1"{/if} >
			<td><pre><a href="/invest/a{$item.id}.html" title="{$item.name}" target="_blank">{$item.name|truncate:12}</a></pre></td>
			<td  ><pre>{if $item.is_vouch==1}������{else}��ͨ��{/if}</pre></td>
			<td  ><pre>{$item.account}Ԫ</pre></td>
			<td  ><pre>{$item.apr} %</pre></td>
			<td  ><pre>{ if $item.isday ==1}{$item.time_limit_day}��{ else}{$item.time_limit}����{/if}</pre></td>
			<td  ><pre>{$item.addtime|date_format:"Y-m-d H:i:s"}</pre></td>
			<td  ><pre><div align="left" style="width:87px;border: 1px solid #CCC;padding:1px;overflow:hidden;line-height:10px;height:10px; ">
				<div  class="rate_tiao" style=" width:{$item.scale_width|default:0}px;"></div>
			</div><span>{$item.scale}%</span></pre></td>
			<td  ><pre>{if $item.status==0}����������{elseif $item.status==1}{if $item.account_yes==$item.account}���������{else}����ļ��{/if}{elseif $item.status==2}���ʧ��{elseif $item.status==3}������{elseif $item.status==4}�������ʧ��{elseif $item.status==5}����{/if}</pre></td>

			</tr>
			{/foreach}
			<tr >
				<td colspan="8" class="page">
					{$loop.showpage}
				</td>

			</tr>
			{/list}
		</table>
		<div class="module_title"><strong>ʵ����֤��Ϣ</strong></div>
		<div class="module_border">
			<div class="l">��ʵ���� :</div>
			<div class="h">
				{$_A.user_result.realname}
			</div>
			<div class="l">�Ա� :</div>
			<div class="c">
				{if $_A.user_result.sex==1}��{else}Ů{/if}
			</div>
		</div>

		<div class="module_border">
			<div class="l">֤������:</div>
			<div class="h">
				{$_A.user_result.card_type|linkage:"card_type"}
			</div>
			<div class="l">֤������:</div>
			<div class="c">
				{$_A.user_result.card_id }
			</div>
		</div>
		<div class="module_border">
			<div class="l">����:</div>
			<div class="h">
				{$_A.user_result.area|area}
			</div>
			<div class="l">����֤ͼƬ:</div>
			<div class="c">
				<a href="{$_A.user_result.card_pic1}" target="_blank">����</a> | <a href="{$_A.user_result.card_pic2}" target="_blank">����</a>
			</div>
		</div>

		<div class="module_border">
			<div class="l">����:</div>
			<div class="h">
				{$_A.user_result.nation|linkage}
			</div>
			<div class="l">����:</div>
			<div class="c">
				{$_A.user_result.birthday|date_format:"Y-m-d"}
			</div>
		</div>

		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				{if $_A.user_result.real_status==1}��ͨ����֤{else}δͨ����֤ {/if}
			</div>
		</div>

		<div class="module_title"><strong>������֤��Ϣ</strong></div>
		<div class="module_border">
			<div class="l">���� :</div>
			<div class="h">
				{$_A.user_result.email}
			</div>

		</div>
		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				{if $_A.user_result.email_status==1}������ͨ����֤{else}δͨ����֤{/if}
			</div>
		</div>
		<div class="module_title"><strong>��Ƶ��֤</strong></div>

		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				{if $_A.user_result.video_status==1}��ͨ����Ƶ��֤{elseif $_A.user_result.video_status==2}��Ƶ��֤������{else}δͨ����Ƶ��֤ {/if}
			</div>
		</div>
		<div class="module_title"><strong>�ֳ���֤</strong></div>

		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				{if $_A.user_result.scene_status==1}��ͨ���ֳ���֤{elseif $_A.user_result.scene_status==2}�ֳ���֤������{else}δͨ���ֳ���֤ {/if}
			</div>
		</div>
		<div class="module_title"><strong>�ֻ���֤��Ϣ</strong></div>
		<div class="module_border">
			<div class="l">�ֻ��� :</div>
			<div class="h">
				{$_A.user_result.phone|default:"-"}
			</div>
		</div>
		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				{if $_A.user_result.phone_status==1}�ֻ���ͨ����֤{else}δͨ����֤ {/if}
			</div>
		</div>


		<div class="module_title"><strong>VIP��֤��Ϣ</strong></div>
		<div class="module_border">
			<div class="l">���뱸ע:</div>
			<div class="h">
				{$_A.user_result.vip_verify_remark}
			</div>
		</div>
		<div class="module_border">
			<div class="l">״̬:</div>
			<div class="c">
				{if $_A.user_result.vip_status==1}VIP��Ա{else}δͨ�� {/if}
			</div>
		</div>
		<div class="module_title"><strong>�û�������Ϣ</strong></div>

		<div class="module_border">
			<div class="w">����״����</div>
			<div class="h">
				{$_A.userinfo_result.marry|linkage}
			</div>

			<div class="w">�� Ů��</div>
			<div class="c">
				{$_A.userinfo_result.child|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">ѧ ����</div>
			<div class="h">
				{$_A.userinfo_result.education|linkage}
			</div>
			<div class="w">�����룺</div>
			<div class="c">
				{$_A.userinfo_result.income|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">�� ����</div>
			<div class="h">
				{$_A.userinfo_result.shebao|linkage}
			</div>
			<div class="w">�籣���Ժţ�</div>
			<div class="c">
				{$_A.userinfo_result.shebaoid}
			</div>
		</div>

		<div class="module_border">
			<div class="w">ס��������</div>
			<div class="h">
				{$_A.userinfo_result.housing}
			</div>
			<div class="w">�Ƿ񹺳���</div>
			<div class="c">
				{$_A.userinfo_result.car|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">���ڼ�¼��</div>
			<div class="c">
				{$_A.userinfo_result.late|linkage}
			</div>
		</div>

		<div class="module_title"><strong>��������</strong></div>
		<div class="module_border">
			<div class="w">������ַ��</div>
			<div class="h">
				{$_A.userinfo_result.house_address}
			</div>
			<div class="w">���������</div>
			<div class="c">
				{$_A.userinfo_result.house_area}
			</div>
		</div>

		<div class="module_border">
			<div class="w">������ݣ�</div>
			<div class="h">
				{$_A.userinfo_result.house_year|date_format:"Y-m-d"}
			</div>
			<div class="w">����״����</div>
			<div class="c">
				{$_A.userinfo_result.house_status} Ԫ
			</div>
		</div>

		<div class="module_border">
			<div class="w">����Ȩ��1��</div>
			<div class="h">
				{$_A.userinfo_result.house_holder1} ��Ȩ�ݶ�{$_A.userinfo_result.house_right1}
			</div>
			<div class="w">����Ȩ��2��</div>
			<div class="c">
				{$_A.userinfo_result.house_holder2} ��Ȩ�ݶ�{$_A.userinfo_result.house_right2}
			</div>
		</div>

		<div class="module_border">
			<div class="w">���������ڰ�����, ����д��</div>
			<div class="h">
				�������ޣ�{$_A.userinfo_result.house_loanyear} ÿ�¹��� {$_A.userinfo_result.house_loanprice} Ԫ
			</div>
			<div class="w">��Ƿ������</div>
			<div class="c">
				{$_A.userinfo_result.house_balance} Ԫ
			</div>
		</div>

		<div class="module_border">
			<div class="w">�������У�</div>
			<div class="c">
				{$_A.userinfo_result.house_bank}
			</div>
		</div>

		<div class="module_title"><strong>��˾����</strong></div>
		<div class="module_border">
			<div class="w">��˾���ƣ�</div>
			<div class="h">
				{$_A.userinfo_result.company_name}
			</div>
			<div class="w">��˾���ʣ�</div>
			<div class="c">
				{$_A.userinfo_result.company_type|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">��˾��ҵ��</div>
			<div class="h">
				{$_A.userinfo_result.company_industry|linkage}
			</div>
			<div class="w">��������</div>
			<div class="c">
				{$_A.userinfo_result.company_jibie|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">ְ λ��</div>
			<div class="h">
				{$_A.userinfo_result.company_office|linkage}
			</div>
			<div class="w">����ʱ�䣺</div>
			<div class="c">
				{$_A.userinfo_result.company_worktime1|date_format:"Y-m-d"}  ��{$_A.userinfo_result.company_worktime2|date_format:"Y-m-d"}
			</div>
		</div>

		<div class="module_border">
			<div class="w">�������ޣ�</div>
			<div class="h">
				{$_A.userinfo_result.company_workyear|linkage}
			</div>
			<div class="w">�����绰��</div>
			<div class="c">
				{$_A.userinfo_result.company_tel}
			</div>
		</div>

		<div class="module_border">
			<div class="w">��˾��ַ��</div>
			<div class="h">
				{$_A.userinfo_result.company_address}
			</div>
			<div class="w">��˾��վ��</div>
			<div class="c">
				{$_A.userinfo_result.company_weburl}
			</div>
		</div>

		<div class="module_border">
			<div class="w">��˾��ע˵����</div>
			<div class="c">
				{$_A.userinfo_result.company_reamrk}
			</div>
		</div>

		<div class="module_title"><strong>˽Ӫҵ������</strong></div>
		<div class="module_border">
			<div class="w">˽Ӫ��ҵ���ͣ�</div>
			<div class="h">
				{$_A.userinfo_result.private_type|linkage}
			</div>
			<div class="w">�������ڣ�</div>
			<div class="c">
				{$_A.userinfo_result.private_date|date_format:"Y-m-d"}
			</div>
		</div>

		<div class="module_border">
			<div class="w">��Ӫ������</div>
			<div class="h">
				{$_A.userinfo_result.private_place}
			</div>
			<div class="w">���</div>
			<div class="c">
				{$_A.userinfo_result.private_rent}Ԫ
			</div>
		</div>

		<div class="module_border">
			<div class="w">���ڣ�</div>
			<div class="h">
				{$_A.userinfo_result.private_term} ��
			</div>
			<div class="w">˰���ţ�</div>
			<div class="c">
				{$_A.userinfo_result.private_taxid}
			</div>
		</div>

		<div class="module_border">
			<div class="w">���̵ǼǺţ�</div>
			<div class="h">
				{$_A.userinfo_result.private_commerceid}
			</div>
			<div class="w">ȫ��ӯ��/����</div>
			<div class="c">
				{$_A.userinfo_result.private_income} Ԫ����ȣ�
			</div>
		</div>

		<div class="module_border">
			<div class="w">��Ա������</div>
			<div class="c">
				{$_A.userinfo_result.private_employee}  ��
			</div>
		</div>
		<div class="module_title"><strong>����״��</strong></div>
		<div class="module_border">
			<div class="w">ÿ���޵�Ѻ�����</div>
			<div class="h">
				{$_A.userinfo_result.finance_repayment} Ԫ
			</div>
			<div class="w">���з�����</div>
			<div class="c">
				{$_A.userinfo_result.finance_property|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">ÿ�·��ݰ��ҽ�</div>
			<div class="h">
				{$_A.userinfo_result.finance_amount} Ԫ
			</div>
			<div class="w">����������</div>
			<div class="c">
				{$_A.userinfo_result.finance_car|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">ÿ���������ҽ�</div>
			<div class="h">
				{$_A.userinfo_result.finance_caramount} Ԫ
			</div>
			<div class="w">ÿ�����ÿ������</div>
			<div class="c">
				{$_A.userinfo_result.finance_creditcard} Ԫ
			</div>
		</div>
		<div class="module_title"><strong>��ϵ��ʽ</strong></div>
		<div class="module_border">
			<div class="w">��ס�ص绰��</div>
			<div class="h">
				{$_A.userinfo_result.tel}
			</div>

			<div class="w">�ֻ����룺</div>
			<div class="c">
				{$_A.userinfo_result.phone}
			</div>
		</div>

		<div class="module_border">
			<div class="w">��ס����ʡ�У�</div>
			<div class="h">
				{$_A.userinfo_result.area|area}
			</div>
			<div class="w">��ס���ʱࣺ</div>
			<div class="c">
				{$_A.userinfo_result.post}
			</div>
		</div>

		<div class="module_border">
			<div class="w">�־�ס��ַ��</div>
			<div class="h">
				{$_A.userinfo_result.address}
			</div>
		</div>

		<div class="module_border">
			<div class="w">�ڶ���ϵ��������</div>
			<div class="h">
				{$_A.userinfo_result.linkman1}
			</div>
			<div class="w">�ڶ���ϵ�˹�ϵ��</div>
			<div class="h">
				{$_A.userinfo_result.relation1|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">�ڶ���ϵ����ϵ�绰��</div>
			<div class="h">
				{$_A.userinfo_result.tel1}
			</div>
			<div class="w">�ڶ���ϵ����ϵ�ֻ���</div>
			<div class="h">
				{$_A.userinfo_result.phone1}
			</div>
		</div>

		<div class="module_border">
			<div class="w">������ϵ��������</div>
			<div class="h">
				{$_A.userinfo_result.linkman2}
			</div>
			<div class="w">������ϵ�˹�ϵ��</div>
			<div class="h">
				{$_A.userinfo_result.relation2|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">������ϵ����ϵ�绰��</div>
			<div class="h">
				{$_A.userinfo_result.tel2}
			</div>
			<div class="w">������ϵ����ϵ�ֻ���</div>
			<div class="h">
				{$_A.userinfo_result.phone2}
			</div>
		</div>

		<div class="module_border">
			<div class="w">������ϵ��������</div>
			<div class="h">
				{$_A.userinfo_result.linkman3}
			</div>
			<div class="w">������ϵ�˹�ϵ��</div>
			<div class="c">
				{$_A.userinfo_result.relation3|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="w">������ϵ����ϵ�绰��</div>
			<div class="h">
				{$_A.userinfo_result.tel3}
			</div>
			<div class="w">������ϵ����ϵ�ֻ���</div>
			<div class="c">
				{$_A.userinfo_result.phone3}
			</div>
		</div>

		<div class="module_border">
			<div class="w">MSN��</div>
			<div class="h">
				{$_A.userinfo_result.msn}
			</div>
			<div class="w">QQ��</div>
			<div class="c">
				{$_A.userinfo_result.qq}
			</div>
		</div>

		<div class="module_border">
			<div class="w">������</div>
			<div class="c">
				{$_A.userinfo_result.wangwang}
			</div>
		</div>
		<div class="module_title"><strong>��ż����</strong></div>
		<div class="module_border">
			<div class="l">��ż������</div>
			<div class="h">
				{$_A.userinfo_result.mate_name}
			</div>
			<div class="l">ÿ��н��</div>
			<div class="c">
				{$_A.userinfo_result.mate_salary}
			</div>
		</div>

		<div class="module_border">
			<div class="l">�ƶ��绰��</div>
			<div class="h">
				{$_A.userinfo_result.mate_phone}
			</div>
			<div class="l">��λ�绰��</div>
			<div class="c">
				{$_A.userinfo_result.mate_tel}
			</div>
		</div>

		<div class="module_border">
			<div class="l">������λ��</div>
			<div class="h">
				{$_A.userinfo_result.mate_type|linkage}
			</div>
			<div class="l">ְλ��</div>
			<div class="c">
				{$_A.userinfo_result.mate_office|linkage}
			</div>
		</div>

		<div class="module_border">
			<div class="l">��λ��ַ��</div>
			<div class="h">
				{$_A.userinfo_result.mate_address}
			</div>
			<div class="l">�����룺</div>
			<div class="c">
				{$_A.userinfo_result.mate_income}
			</div>
		</div>
		<div class="module_title"><strong>������Ϣ</strong></div>
		<div class="module_border">
			<div class="l">����������</div>
			<div class="c">
				{$_A.userinfo_result.ability|nl2br}
			</div>
		</div>

		<div class="module_border">
			<div class="l">���˰��ã�</div>
			<div class="c">
				{$_A.userinfo_result.interest|nl2br}
			</div>
		</div>

		<div class="module_border">
			<div class="l">����˵����</div>
			<div class="c">
				{$_A.userinfo_result.others|nl2br}
			</div>
		</div>

	</div>
	{elseif $_A.query_type == "jifen"}
	<form method="post">
		<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
			<tr >
				<td width="" class="main_td">ID</td>
				<td width="*" class="main_td">�û���</td>
				<td width="*" class="main_td">��ʵ����</td>
				<th width="" class="main_td">��֤����</th>
				<th width="" class="main_td">��֤����</th>
				<th width="" class="main_td">��ע</th>
				<th width="" class="main_td">���ʱ��</th>
			</tr>
			{ foreach  from=$_A.jifen_result key=key item=item}
			<tr {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center">{ $item.user_id}<input type="hidden" value="{$item.id}" name="id[]" /></td>
			<td class="main_td1" align="center">{$item.username}</td>
			<td class="main_td1" align="center">{$item.realname}</td>
			<td class="main_td1" align="center">{$item.typename}</td>
			<td class="main_td1" align="center"><input type="text" value="{$item.value}" size="5" name="val[]" /></td>
			<td class="main_td1" align="center">{$item.remark}</td>
			<td class="main_td1" align="center">{$item.addtime|date_format}<input type="hidden" name="user_id" value="{$magic.request.user_id}" /></td>
			</tr>
			{ /foreach}
			<tr >
				<td colspan="7"><input type="submit" value="�޸Ļ���" /></td>
			</tr>
		</table>
	</form>
	{/if}