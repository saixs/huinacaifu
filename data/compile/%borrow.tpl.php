<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	<? if (!isset($_REQUEST['user_id'])) $_REQUEST['user_id']=''; ;if (  $_REQUEST['user_id']==""): ?>
	<form name="form1" method="post" action="" enctype="multipart/form-data" >
	<div class="module_title"><strong>���������Ϣ���û�����ID</strong></div>
	

	<div class="module_border">
		<div class="l">�û�ID��</div>
		<div class="c">
			<input type="text" name="user_id"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="c">
			<input type="text" name="username"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_submit" >
		
	</div>
	</form>
	<? else: ?>
	<div class="module_title"><strong>����û���Ϣ</strong></div>
	
	<form name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return check_form();" >
	
	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = '';$_tmp = $this->magic_vars['_A']['user_result']['username']; if (!isset($this->magic_vars['_A']['borrow_result']['username'])) $this->magic_vars['_A']['borrow_result']['username'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['borrow_result']['username']);echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�����;��</div>
		<div class="c">
		<? $result = $this->magic_vars['_G']['_linkage']['borrow_use']; echo "<select name='use' id=use >"; echo "<option value=''>asd</option>"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrow_result']['use']==$val['id'] ) { echo "<option value='{$val['id']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['id']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			 <span >˵�����ɹ���ľ�����;��</span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">������ޣ�</div>
		<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_time_limit']; echo "<select name='time_limit' id=time_limit >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrow_result']['time_limit']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?><span >���ɹ���,�����Լ����µ�ʱ���������� </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���ʽ��</div>
		<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_style']; echo "<select name='style' id=style >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrow_result']['style']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
		<span >�����ȷ��ڻ�����ָ�����߽��ɹ���,ÿ�»�Ϣ������������</span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����ܽ�</div>
		<div class="c"><input type="text" name="account" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['account'])) $this->magic_vars['_A']['borrow_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_result']['account']; ?>"  size="10"/>
<span >�����Ӧ��500Ԫ��50,000Ԫ֮�䡣���ױ��־�Ϊ����ҡ�</span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�����ʣ�</div>
		<div class="c">
			<input type="text" name="apr" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['apr'])) $this->magic_vars['_A']['borrow_result']['apr'] = ''; echo $this->magic_vars['_A']['borrow_result']['apr']; ?>" /> % <span >�����ȷ��ڻ�����ָ�����߽��ɹ���,ÿ�»�Ϣ������������</span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���Ͷ���</div>
		<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_lowest_account']; echo "<select name='lowest_account' id=lowest_account >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrow_result']['lowest_account']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
		<span >����Ͷ���߶�һ�������Ͷ���ܶ�����ơ�</span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���Ͷ���ܶ</div>
		<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_most_account']; echo "<select name='most_account' id=most_account >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrow_result']['most_account']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			<span >���ô˴ν�����ʵ����������ʽ��ȴﵽ100%��ֱ�ӽ�����վ�ĸ���</span>
		</div>
	</div>
	<div class="module_border">
		<div class="l">�Ƿ���꣺</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['pwd'])) $this->magic_vars['_A']['borrow_result']['pwd']=''; ;if (   $this->magic_vars['_A']['borrow_result']['pwd'] !=""): ?>��<? else: ?>��<? endif; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">��Чʱ�䣺</div>
		<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_valid_time']; echo "<select name='valid_time' id=valid_time >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['_A']['borrow_result']['valid_time']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			 <span>���ô˴ν�����ʵ����������ʽ��ȴﵽ100%��ֱ�ӽ�����վ�ĸ��� </span>
		</div>
	</div>
	<div class="module_title"><strong>���ý���</strong></div>
	<div class="module_border">
		<div class="w"><input type="radio" name="award" value="0" <? if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']='';if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']=''; ;if (  $this->magic_vars['_A']['borrow_result']['award']==0 ||  $this->magic_vars['_A']['borrow_result']['award']==""): ?> checked="checked"<? endif; ?>>�����ý���</div>
		<div class="c">
			 <span>����������˽��������ᶳ�����ʻ�����Ӧ���˻������Ҫ���ý�������ȷ�������ʻ����㹻 ���˻��� </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w"><input type="radio" name="award" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']=''; ;if (  $this->magic_vars['_A']['borrow_result']['award']==1): ?> checked="checked"<? endif; ?>/>���̶�����̯������</div>
		<div class="c">
			<input type="text" name="part_account" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['part_account'])) $this->magic_vars['_A']['borrow_result']['part_account'] = ''; echo $this->magic_vars['_A']['borrow_result']['part_account']; ?>" size="5" />Ԫ <span>���ܵ���5Ԫ,���ܸ����ܱ�Ľ���2%�����뱣������Ԫ��Ϊ��λ���������ñ��α��Ҫ����������Ͷ���û����ܽ�  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w"><input type="radio" name="award" value="2" <? if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']=''; ;if (  $this->magic_vars['_A']['borrow_result']['award']==2): ?> checked="checked"<? endif; ?>/>��Ͷ�������������</div>
		<div class="c">
			<input type="text" name="funds" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['funds'])) $this->magic_vars['_A']['borrow_result']['funds'] = ''; echo $this->magic_vars['_A']['borrow_result']['funds']; ?>" size="5" />%  <span>��Χ��0.1%~2% ���������ñ��α��Ҫ����������Ͷ���û��Ľ���������  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w"><input type="checkbox" name="is_false" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['is_false'])) $this->magic_vars['_A']['borrow_result']['is_false']=''; ;if (  $this->magic_vars['_A']['borrow_result']['is_false']==1): ?> checked="checked"<? endif; ?>/>���ʧ��ʱҲͬ��������</div>
		<div class="c">
			  <span>�������ѡ�˴�ѡ�����δ�������ʧ��ʱͬ���ά����Ͷ���û������û�й�ѡ�����ʧ��ʱ��ѽ������ⶳ���˻���   </span>
		</div>
	</div>

	<? if (!isset($this->magic_vars['_A']['borrow_result']['is_vouch'])) $this->magic_vars['_A']['borrow_result']['is_vouch']=''; ;if (  $this->magic_vars['_A']['borrow_result']['is_vouch']==1): ?>
	<div class="module_title"><strong>��������</strong></div>
	<div class="module_border">
		<div class="l">����������</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['vouch_award'])) $this->magic_vars['_A']['borrow_result']['vouch_award'] = ''; echo $this->magic_vars['_A']['borrow_result']['vouch_award']; ?>%
		</div>
	</div>
	<div class="module_border">
		<div class="l">ָ�������ˣ�</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['vouch_user'])) $this->magic_vars['_A']['borrow_result']['vouch_user'] = ''; echo $this->magic_vars['_A']['borrow_result']['vouch_user']; ?>
		</div>
	</div>
	<? endif; ?>
	
	<div class="module_title"><strong>�ʻ���Ϣ����</strong></div>
	<div class="module_border">
		<div class="w">�����ҵ��ʻ��ʽ������</div>
		<div class="c">
			<input type="checkbox" name="open_account" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_account'])) $this->magic_vars['_A']['borrow_result']['open_account']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_account']==1): ?> checked="checked"<? endif; ?>/> <span> ��������ϴ�ѡ�����ʵʱ�������ʻ��ģ��˻��ܶ�����������ܶ  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">�����ҵĽ���ʽ������</div>
		<div class="c">
			<input type="checkbox" name="open_borrow" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_borrow'])) $this->magic_vars['_A']['borrow_result']['open_borrow']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_borrow']==1): ?> checked="checked"<? endif; ?>/> <span>��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�����ܶ�ѻ����ܶδ�����ܶ�ٻ��ܶ�����ܶ </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">�����ҵ�Ͷ���ʽ������</div>
		<div class="c">
			<input type="checkbox" name="open_tender" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_tender'])) $this->magic_vars['_A']['borrow_result']['open_tender']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_tender']==1): ?> checked="checked"<? endif; ?>/> <span>��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�Ͷ���ܶ���ջ��ܶ���ջ��ܶ  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">�����ҵ����ö�������</div>
		<div class="c">
			<input type="checkbox" name="open_credit" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_credit'])) $this->magic_vars['_A']['borrow_result']['open_credit']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_credit']==1): ?> checked="checked"<? endif; ?>/> <span>��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�������ö�ȡ�������ö�ȡ�  </span>
		</div>
	</div>
	
	<div class="module_title"><strong>��ϸ��Ϣ</strong></div>
	<div class="module_border">
		<div class="l">���⣺</div>
		<div class="c">
			<input type="text" name="name" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['name'])) $this->magic_vars['_A']['borrow_result']['name'] = ''; echo $this->magic_vars['_A']['borrow_result']['name']; ?>" size="50" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��Ϣ��</div>
		<div class="c">
			<!--<?  if (!isset($this->magic_vars['_A']['borrow_result']['content'])) $this->magic_vars['_A']['borrow_result']['content']=''; ; $name = "content" ; $value = $this->magic_vars['_A']['borrow_result']['content'];require_once(ROOT_PATH ."/plugins/editor/sinaeditor/Editor.class.php");
$editor=new sinaEditor($name);
	$editor->Value= "$value";

	$editor->AutoSave=false;
	echo $editor->Create(); ?>-->
            <? if (!isset($this->magic_vars['_A']['borrow_result']['content'])) $this->magic_vars['_A']['borrow_result']['content'] = ''; echo $this->magic_vars['_A']['borrow_result']['content']; ?>
		</div>
	</div>
	<!--�������� ����-->
		
	<div class="module_submit" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden"  name="id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" /><? endif; ?>
		<input type="hidden" name="status" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status'] = ''; echo $this->magic_vars['_A']['borrow_result']['status']; ?>" />
		<input type="hidden"  name="user_id" value="<? if (!isset($_REQUEST['user_id'])) $_REQUEST['user_id'] = ''; echo $_REQUEST['user_id']; ?>" />
		
		<!--<input type="reset"  name="reset" value="���ñ�" />-->
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
		errorMsg += '���������д' + '\n';
	  }
	   if (award ==1 && part_account<5) {
		errorMsg += '��������С��5Ԫ' + '\n';
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
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>��˽���</strong></div>


	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="c">
		<a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['_A']['borrow_result']['user_id'])) $this->magic_vars['_A']['borrow_result']['user_id'] = ''; echo $this->magic_vars['_A']['borrow_result']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['_A']['user_result']['username'])) $this->magic_vars['_A']['user_result']['username'] = '';$_tmp = $this->magic_vars['_A']['user_result']['username']; if (!isset($this->magic_vars['_A']['borrow_result']['username'])) $this->magic_vars['_A']['borrow_result']['username'] = '';
$_tmp = $this->magic_modifier("default",$_tmp,$this->magic_vars['_A']['borrow_result']['username']);echo $_tmp;unset($_tmp); ?></a>
		</div>
	</div>
	<div class="module_border">
		<div class="l">״̬��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;if (  $this->magic_vars['_A']['borrow_result']['status']==0): ?>����������<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;elseif (  $this->magic_vars['_A']['borrow_result']['status']==1): ?>����ļ��<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;elseif (  $this->magic_vars['_A']['borrow_result']['status']==2): ?>���ʧ��<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;elseif (  $this->magic_vars['_A']['borrow_result']['status']==3): ?>������<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;elseif (  $this->magic_vars['_A']['borrow_result']['status']==4): ?>�������ʧ��<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;elseif (  $this->magic_vars['_A']['borrow_result']['status']==5): ?>����<? endif; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�����;��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['use'])) $this->magic_vars['_A']['borrow_result']['use'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['use'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">������ޣ�</div>
		<div class="c">
		<? if (!isset($this->magic_vars['_A']['borrow_result']['time_limit'])) $this->magic_vars['_A']['borrow_result']['time_limit'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['time_limit'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_time_limit");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_border">
	<div class="l">�Ƿ���꣺</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['pwd'])) $this->magic_vars['_A']['borrow_result']['pwd']=''; ;if (   $this->magic_vars['_A']['borrow_result']['pwd'] !=""): ?>��<? else: ?>��<? endif; ?>
		</div>
		</div>
	<div class="module_border">
		<div class="l">���ʽ��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['isday'])) $this->magic_vars['_A']['borrow_result']['isday']=''; ;if (  $this->magic_vars['_A']['borrow_result']['isday']==1): ?> 
                ����ȫ���
                <? else: ?>
                <? if (!isset($this->magic_vars['_A']['borrow_result']['style'])) $this->magic_vars['_A']['borrow_result']['style'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['style'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_style");echo $_tmp;unset($_tmp); ?>
                <? endif; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����ܽ�</div>
		<div class="c">
				<? if (!isset($this->magic_vars['_A']['borrow_result']['account'])) $this->magic_vars['_A']['borrow_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_result']['account']; ?><input type="hidden" name="account" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['account'])) $this->magic_vars['_A']['borrow_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_result']['account']; ?>" /> Ԫ
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">�����ʣ�</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['apr'])) $this->magic_vars['_A']['borrow_result']['apr'] = ''; echo $this->magic_vars['_A']['borrow_result']['apr']; ?> %
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���Ͷ���</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['lowest_account'])) $this->magic_vars['_A']['borrow_result']['lowest_account'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['lowest_account'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_lowest_account");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���Ͷ���ܶ</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['most_account'])) $this->magic_vars['_A']['borrow_result']['most_account'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['most_account'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_most_account");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;if (  $this->magic_vars['_A']['borrow_result']['status']==1): ?>
	<div class="module_border">
		<div class="l">���ʱ�䣺</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['verify_time'])) $this->magic_vars['_A']['borrow_result']['verify_time'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">����ˣ�</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['verify_username'])) $this->magic_vars['_A']['borrow_result']['verify_username'] = ''; echo $this->magic_vars['_A']['borrow_result']['verify_username']; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">��˱�ע��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['verify_remark'])) $this->magic_vars['_A']['borrow_result']['verify_remark'] = ''; echo $this->magic_vars['_A']['borrow_result']['verify_remark']; ?>
		</div>
	</div>
	
	<? endif; ?>
	<div class="module_border">
		<div class="l">��Чʱ�䣺</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['valid_time'])) $this->magic_vars['_A']['borrow_result']['valid_time'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['valid_time'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_valid_time");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_title"><strong>���ý���</strong></div>
	<div class="module_border">
		<div class="w"><input type="radio" name="award" value="0" <? if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']='';if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']=''; ;if (  $this->magic_vars['_A']['borrow_result']['award']==0 ||  $this->magic_vars['_A']['borrow_result']['award']==""): ?> checked="checked"<? endif; ?> disabled="disabled">�����ý���</div>
		<div class="c">
			 <span>����������˽��������ᶳ�����ʻ�����Ӧ���˻������Ҫ���ý�������ȷ�������ʻ����㹻 ���˻��� </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w"><input type="radio" name="award" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']=''; ;if (  $this->magic_vars['_A']['borrow_result']['award']==1): ?> checked="checked"<? endif; ?> disabled="disabled"/>���̶�����̯������</div>
		<div class="c">
			<input type="text" name="part_account" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['part_account'])) $this->magic_vars['_A']['borrow_result']['part_account'] = ''; echo $this->magic_vars['_A']['borrow_result']['part_account']; ?>" size="5" disabled="disabled"/>Ԫ <span>���ܵ���5Ԫ,���ܸ����ܱ�Ľ���2%�����뱣������Ԫ��Ϊ��λ���������ñ��α��Ҫ����������Ͷ���û����ܽ�  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w"><input type="radio" name="award" value="2" <? if (!isset($this->magic_vars['_A']['borrow_result']['award'])) $this->magic_vars['_A']['borrow_result']['award']=''; ;if (  $this->magic_vars['_A']['borrow_result']['award']==2): ?> checked="checked"<? endif; ?> disabled="disabled"/>��Ͷ�������������</div>
		<div class="c">
			<input type="text" name="funds" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['funds'])) $this->magic_vars['_A']['borrow_result']['funds'] = ''; echo $this->magic_vars['_A']['borrow_result']['funds']; ?>" size="5" disabled="disabled"/>%  <span>��Χ��0.1%~2% ���������ñ��α��Ҫ����������Ͷ���û��Ľ���������  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w"><input type="checkbox" name="is_false" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['is_false'])) $this->magic_vars['_A']['borrow_result']['is_false']=''; ;if (  $this->magic_vars['_A']['borrow_result']['is_false']==1): ?> checked="checked"<? endif; ?>  disabled="disabled"/>���ʧ��ʱҲͬ��������</div>
		<div class="c">
			  <span>�������ѡ�˴�ѡ�����δ�������ʧ��ʱͬ���ά����Ͷ���û������û�й�ѡ�����ʧ��ʱ��ѽ������ⶳ���˻���   </span>
		</div>
	</div>
	
	<? if (!isset($this->magic_vars['_A']['borrow_result']['is_vouch'])) $this->magic_vars['_A']['borrow_result']['is_vouch']=''; ;if (  $this->magic_vars['_A']['borrow_result']['is_vouch']==1): ?>
	<div class="module_title"><strong>��������</strong></div>
	<div class="module_border">
		<div class="l">����������</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['vouch_award'])) $this->magic_vars['_A']['borrow_result']['vouch_award'] = ''; echo $this->magic_vars['_A']['borrow_result']['vouch_award']; ?>%
		</div>
	</div>
	<div class="module_border">
		<div class="l">ָ�������ˣ�</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['vouch_user'])) $this->magic_vars['_A']['borrow_result']['vouch_user'] = ''; echo $this->magic_vars['_A']['borrow_result']['vouch_user']; ?>
		</div>
	</div>
	<? endif; ?>
	<div class="module_title"><strong>�ʻ���Ϣ����</strong></div>
	<div class="module_border">
		<div class="w">�����ҵ��ʻ��ʽ������</div>
		<div class="c">
			<input type="checkbox" name="open_account" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_account'])) $this->magic_vars['_A']['borrow_result']['open_account']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_account']==1): ?> checked="checked"<? endif; ?> disabled="disabled"/> <span> ��������ϴ�ѡ�����ʵʱ�������ʻ��ģ��˻��ܶ�����������ܶ  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">�����ҵĽ���ʽ������</div>
		<div class="c">
			<input type="checkbox" name="open_borrow" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_borrow'])) $this->magic_vars['_A']['borrow_result']['open_borrow']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_borrow']==1): ?> checked="checked"<? endif; ?> disabled="disabled"/> <span>��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�����ܶ�ѻ����ܶδ�����ܶ�ٻ��ܶ�����ܶ </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">�����ҵ�Ͷ���ʽ������</div>
		<div class="c">
			<input type="checkbox" name="open_tender" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_tender'])) $this->magic_vars['_A']['borrow_result']['open_tender']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_tender']==1): ?> checked="checked"<? endif; ?> disabled="disabled"/> <span>��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�Ͷ���ܶ���ջ��ܶ���ջ��ܶ  </span>
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">�����ҵ����ö�������</div>
		<div class="c">
			<input type="checkbox" name="open_credit" value="1" <? if (!isset($this->magic_vars['_A']['borrow_result']['open_credit'])) $this->magic_vars['_A']['borrow_result']['open_credit']=''; ;if (  $this->magic_vars['_A']['borrow_result']['open_credit']==1): ?> checked="checked"<? endif; ?> disabled="disabled"/> <span>��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�������ö�ȡ�������ö�ȡ�  </span>
		</div>
	</div>
	<div class="module_border">
		<div class="l">���ʱ��/IP:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['addtime'])) $this->magic_vars['_A']['borrow_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>/<? if (!isset($this->magic_vars['_A']['borrow_result']['addip'])) $this->magic_vars['_A']['borrow_result']['addip'] = ''; echo $this->magic_vars['_A']['borrow_result']['addip']; ?></div>
	</div>
	
	<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;if (  $this->magic_vars['_A']['borrow_result']['status']!=1): ?>
	<div class="module_title"><strong>��˴˽��</strong></div>
	
	<div class="module_border">
		<div class="l">״̬:</div>
		<div class="c">
		<input type="radio" name="status" value="1"/>���ͨ�� <input type="radio" name="status" value="2"  checked="checked"/>��˲�ͨ�� </div>
		
	</div>
	
	<div class="module_border" >
		<div class="l">��˱�ע:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['borrow_result']['verify_remark'])) $this->magic_vars['_A']['borrow_result']['verify_remark'] = ''; echo $this->magic_vars['_A']['borrow_result']['verify_remark']; ?></textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['id'])) $this->magic_vars['_A']['borrow_result']['id'] = ''; echo $this->magic_vars['_A']['borrow_result']['id']; ?>" />
		<input type="hidden" name="user_id" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['user_id'])) $this->magic_vars['_A']['borrow_result']['user_id'] = ''; echo $this->magic_vars['_A']['borrow_result']['user_id']; ?>" />
		<input type="hidden" name="name" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['name'])) $this->magic_vars['_A']['borrow_result']['name'] = ''; echo $this->magic_vars['_A']['borrow_result']['name']; ?>" />
		
		<input type="submit"  name="reset" value="��˴˽���" />
	</div>
	<? endif; ?>
	</form>
</div>

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

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="list"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�û�����</td>
			<td width="*" class="main_td">�û�����</td>
			<td width="" class="main_td">������</td>
			<td width="" class="main_td">�����</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">�������</td>
			<td width="" class="main_td">�������</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">��ʾ״̬</td>
			<td width="" class="main_td">״̬</td>
			<td width="" class="main_td">����</td>
                        <td width="" class="main_td">�鿴Ͷ���¼</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_list']) || $this->magic_vars['_A']['borrow_list']=='') $this->magic_vars['_A']['borrow_list'] = array();  $_from = $this->magic_vars['_A']['borrow_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?><input type="hidden" name="id[]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" /></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td><? if (!isset($this->magic_vars['item']['credit_jifen'])) $this->magic_vars['item']['credit_jifen'] = ''; echo $this->magic_vars['item']['credit_jifen']; ?>��</td>
			<td title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>"><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan'] == 1): ?><span style="color:#FF0000">(��ת��)</span><? endif; ?><? if (!isset($this->magic_vars['item']['is_mb'])) $this->magic_vars['item']['is_mb']=''; ;if (  $this->magic_vars['item']['is_mb'] == 1): ?><span style="color:#FF0000">(���)</span><? endif; ?><? if (!isset($this->magic_vars['item']['is_jin'])) $this->magic_vars['item']['is_jin']=''; ;if (  $this->magic_vars['item']['is_jin'] == 1): ?><span style="color:#FF0000">(��ֵ��)</span><? endif; ?><? if (!isset($this->magic_vars['item']['is_fast'])) $this->magic_vars['item']['is_fast']=''; ;if (  $this->magic_vars['item']['is_fast'] == 1): ?>(<a href="javascript:void(0)" onclick='tipsWindown("��Ѻ����ϸ��Ϣ","url:get?/index.php?q=viewfast&id=<? if (!isset($this->magic_vars['item']['fastid'])) $this->magic_vars['item']['fastid'] = ''; echo $this->magic_vars['item']['fastid']; ?>",500,430,"true","","true","text");'>	<span style="color:#FF0000"><? if (!isset($this->magic_vars['item']['isqiye'])) $this->magic_vars['item']['isqiye']=''; ;if (  $this->magic_vars['item']['isqiye'] == 1): ?>��ҵ-<? else: ?>����-<? endif; ?>��Ѻ��</span></a>)<? endif; ?><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?><? if (!isset($this->magic_vars['item']['cz_old_id'])) $this->magic_vars['item']['cz_old_id']=''; ;if (  $this->magic_vars['item']['cz_old_id'] > 0): ?><span style="color:#FF0000">���鸸�꣺<? if (!isset($this->magic_vars['item']['cz_old_id'])) $this->magic_vars['item']['cz_old_id'] = '';$_tmp = $this->magic_vars['item']['cz_old_id'];$_tmp = $this->magic_modifier("czf",$_tmp,"");echo $_tmp;unset($_tmp); ?></span><? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>Ԫ</td>
			<td><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?>%</td>
			<td><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday'] ==1): ?><? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>��<? else: ?><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����<? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['is_vouch'])) $this->magic_vars['item']['is_vouch']=''; ;if (  $this->magic_vars['item']['is_vouch'] =="1"): ?><font color="#FF0000">��������</font><? else: ?>��ͨ����<? endif; ?></td>
			<td><select name="flag[]"><option value="0" <? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag']=''; ;if (  $this->magic_vars['item']['flag']==0): ?> selected="selected"<? endif; ?>>һ���</option><option  value="1" <? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag']=''; ;if (  $this->magic_vars['item']['flag']==1): ?> selected="selected"<? endif; ?>>�Ƽ���</option><!--<option value="2" <? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag']=''; ;if (  $this->magic_vars['item']['flag']==2): ?> selected="selected"<? endif; ?>>������</option><option  value="3" <? if (!isset($this->magic_vars['item']['flag'])) $this->magic_vars['item']['flag']=''; ;if (  $this->magic_vars['item']['flag']==3): ?> selected="selected"<? endif; ?>>��Ѻ��</option>--></select></td>
				<td><select name="view[]"><option  value="">��</option><option  value="1" <? if (!isset($this->magic_vars['item']['view_type'])) $this->magic_vars['item']['view_type']=''; ;if (  $this->magic_vars['item']['view_type']==1): ?> selected="selected"<? endif; ?>>��ʾ1</option><option value="2" <? if (!isset($this->magic_vars['item']['view_type'])) $this->magic_vars['item']['view_type']=''; ;if (  $this->magic_vars['item']['view_type']==2): ?> selected="selected"<? endif; ?>>��ʾ2</option><option  value="3" <? if (!isset($this->magic_vars['item']['view_type'])) $this->magic_vars['item']['view_type']=''; ;if (  $this->magic_vars['item']['view_type']==3): ?> selected="selected"<? endif; ?>>��ʾ3</option></select></td>
			<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?>���ͨ��<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status'] ==0): ?>�ȴ����<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status'] ==-1): ?><font color="#999999">��δ����</font><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status'] ==3): ?>����ɹ�����<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status'] ==4): ?>����δ����<? else: ?>���δͨ��<? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==0): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">���</a><? endif; ?> <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">�鿴</a> <a href="#" onclick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/cancel<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">����</a></td>
                        <td><a href=<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/investlist&borrow_id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>&a=borrow>Ͷ���¼</a></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
			
		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> ״̬<select id="status" ><option value="">ȫ��</option><option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>��ͨ��</option><option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> selected="selected"<? endif; ?>>�����</option></select> <select id="is_vouch" ><option value="">ȫ��</option><option value="1" <? if (!isset($_REQUEST['is_vouch'])) $_REQUEST['is_vouch']=''; ;if (  $_REQUEST['is_vouch']==1): ?> selected="selected"<? endif; ?>>������</option><option value="0" <? if (!isset($_REQUEST['is_vouch'])) $_REQUEST['is_vouch']=''; ;if (  $_REQUEST['is_vouch']=="0"): ?> selected="selected"<? endif; ?>>��ͨ��</option></select> <input type="button" value="����"  onclick="sousuo('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>')"/>
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="14" class="page">
			<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
			</td>
		</tr>
	</form>	
</table>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="full"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�û�����</td>
			<td width="*" class="main_td">���û���</td>
			<td width="*" class="main_td">����ʱ��</td>
			<td width="" class="main_td">������</td>
			<td width="" class="main_td">�����</td>
			<td width="" class="main_td">������</td>
			<td width="" class="main_td">Ͷ�����</td>
			<td width="" class="main_td">�������</td>
			<td width="" class="main_td">״̬</td>
			<td width="" class="main_td">����</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_list']) || $this->magic_vars['_A']['borrow_list']=='') $this->magic_vars['_A']['borrow_list'] = array();  $_from = $this->magic_vars['_A']['borrow_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td><? if (!isset($this->magic_vars['item']['credit_jifen'])) $this->magic_vars['item']['credit_jifen'] = ''; echo $this->magic_vars['item']['credit_jifen']; ?></td>
			<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
			<td title="<? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?>"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></td>
			<td><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>Ԫ</td>
			<td><? if (!isset($this->magic_vars['item']['apr'])) $this->magic_vars['item']['apr'] = ''; echo $this->magic_vars['item']['apr']; ?>%</td>
			<td><? if (!isset($this->magic_vars['item']['tender_times'])) $this->magic_vars['item']['tender_times'] = '';$_tmp = $this->magic_vars['item']['tender_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></td>
			<td><? if (!isset($this->magic_vars['item']['isday'])) $this->magic_vars['item']['isday']=''; ;if (  $this->magic_vars['item']['isday']==1): ?> 
                <? if (!isset($this->magic_vars['item']['time_limit_day'])) $this->magic_vars['item']['time_limit_day'] = ''; echo $this->magic_vars['item']['time_limit_day']; ?>��
                <? else: ?>
                <? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����
                <? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==3): ?>������ɹ�<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==4): ?>�����ʧ��<? else: ?>���������<? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']!=3): ?><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan']==1): ?>��ת������<? else: ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/full_view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">���</a><? endif; ?><? endif; ?></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
                ������ʼʱ�䣺<input type="text" id="start_ts" value="" onclick="change_picktime()" />
                 �����ֹʱ�䣺<input type="text" id="end_ts" value="" onclick="change_picktime()" />
		 <input type="button" value="������ǰ����" onclick="exportFullExcl();" />
		
		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/><input type="button" value="����" / onclick="sousuo('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/full<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>')">
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
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "full_view"): ?>
<div class="module_add">
	<div class="module_title"><strong>������������</strong></div>
	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="c">
			<a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['_A']['borrow_result']['user_id'])) $this->magic_vars['_A']['borrow_result']['user_id'] = ''; echo $this->magic_vars['_A']['borrow_result']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['_A']['borrow_result']['username'])) $this->magic_vars['_A']['borrow_result']['username'] = ''; echo $this->magic_vars['_A']['borrow_result']['username']; ?></a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���⣺</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['name'])) $this->magic_vars['_A']['borrow_result']['name'] = ''; echo $this->magic_vars['_A']['borrow_result']['name']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����</div>
		<div class="h">
			��<? if (!isset($this->magic_vars['_A']['borrow_result']['account'])) $this->magic_vars['_A']['borrow_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_result']['account']; ?>
		</div>
		<div class="l">�����ʣ�</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['apr'])) $this->magic_vars['_A']['borrow_result']['apr'] = ''; echo $this->magic_vars['_A']['borrow_result']['apr']; ?> %
		</div>
	</div>
	<div class="module_border">
		<div class="l">������ޣ�</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['isday'])) $this->magic_vars['_A']['borrow_result']['isday']=''; ;if (  $this->magic_vars['_A']['borrow_result']['isday']==1): ?> 
                <? if (!isset($this->magic_vars['_A']['borrow_result']['time_limit_day'])) $this->magic_vars['_A']['borrow_result']['time_limit_day'] = ''; echo $this->magic_vars['_A']['borrow_result']['time_limit_day']; ?>��
                <? else: ?>
                <? if (!isset($this->magic_vars['_A']['borrow_result']['time_limit'])) $this->magic_vars['_A']['borrow_result']['time_limit'] = ''; echo $this->magic_vars['_A']['borrow_result']['time_limit']; ?>����
                <? endif; ?>
		</div>
		<div class="l">�����;��</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['use'])) $this->magic_vars['_A']['borrow_result']['use'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['use'];$_tmp = $this->magic_modifier("linkage",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_border">
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">

		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�û�����</td>
			<td width="*" class="main_td">���û���</td>
			<td width="" class="main_td">Ͷ�ʽ��</td>
			<td width="" class="main_td">��Ч���</td>
			<td width="" class="main_td">״̬</td>
			<td width="" class="main_td">Ͷ��ʱ��</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_tender_list']) || $this->magic_vars['_A']['borrow_tender_list']=='') $this->magic_vars['_A']['borrow_tender_list'] = array();  $_from = $this->magic_vars['_A']['borrow_tender_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td><? if (!isset($this->magic_vars['item']['credit_jifen'])) $this->magic_vars['item']['credit_jifen'] = ''; echo $this->magic_vars['item']['credit_jifen']; ?>��</td>
			<td><? if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money'] = ''; echo $this->magic_vars['item']['money']; ?>Ԫ</td>
			<td><font color="#FF0000"><? if (!isset($this->magic_vars['item']['tender_account'])) $this->magic_vars['item']['tender_account'] = ''; echo $this->magic_vars['item']['tender_account']; ?>Ԫ</font></td>
			<td><? if (!isset($this->magic_vars['item']['money'])) $this->magic_vars['item']['money']='';if (!isset($this->magic_vars['item']['tender_account'])) $this->magic_vars['item']['tender_account']=''; ;if (  $this->magic_vars['item']['money'] ==  $this->magic_vars['item']['tender_account']): ?>ȫ��ͨ��<? else: ?>����ͨ��<? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="9" class="page">
			<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
			</td>
		</tr>
</table>

	</div>
	<div class="module_border">
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�ƻ�������</td>
			<td width="*" class="main_td">Ԥ�����</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">��Ϣ</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_repayment']) || $this->magic_vars['_A']['borrow_repayment']=='') $this->magic_vars['_A']['borrow_repayment'] = array();  $_from = $this->magic_vars['_A']['borrow_repayment']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']+1; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['repayment_time'])) $this->magic_vars['item']['repayment_time'] = '';$_tmp = $this->magic_vars['item']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
			<td>��<? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?></td>
			<td>��<? if (!isset($this->magic_vars['item']['capital'])) $this->magic_vars['item']['capital'] = ''; echo $this->magic_vars['item']['capital']; ?></td>
			<td>��<? if (!isset($this->magic_vars['item']['interest'])) $this->magic_vars['item']['interest'] = ''; echo $this->magic_vars['item']['interest']; ?>Ԫ</td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
</table>

	</div>
	<? if (!isset($this->magic_vars['_A']['borrow_result']['status'])) $this->magic_vars['_A']['borrow_result']['status']=''; ;if (  $this->magic_vars['_A']['borrow_result']['status']==1): ?>
	<div class="module_title"><strong>��˴˽��</strong></div>
	<form name="form1" method="post" action="" >
	<div class="module_border">
		<div class="l">״̬:</div>
		<div class="c">
		<input type="radio" name="status" value="3"/>����ͨ�� <input type="radio" name="status" value="4"  checked="checked"/>����ͨ�� </div>
	</div>
	
	<div class="module_border" >
		<div class="l">��˱�ע:</div>
		<div class="c">
			<textarea name="repayment_remark" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['borrow_result']['repayment_remark'])) $this->magic_vars['_A']['borrow_result']['repayment_remark'] = ''; echo $this->magic_vars['_A']['borrow_result']['repayment_remark']; ?></textarea>
		</div>
	</div>
	<div class="module_border" >
		<div class="l">��֤��:</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['borrow_result']['id'])) $this->magic_vars['_A']['borrow_result']['id'] = ''; echo $this->magic_vars['_A']['borrow_result']['id']; ?>" />
		
		<input type="submit"  name="reset" value="��˴˽���" />
	</div>
	
</form>
	<? endif; ?>
	<div class="module_title"><strong>������ϸ����</strong></div>
	<div class="module_border">
		<div class="l">Ͷ�꽱����</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['awad'])) $this->magic_vars['_A']['borrow_result']['awad']=''; ;if (  $this->magic_vars['_A']['borrow_result']['awad']==0): ?>�޽���<? if (!isset($this->magic_vars['_A']['borrow_result']['awad'])) $this->magic_vars['_A']['borrow_result']['awad']=''; ;elseif (  $this->magic_vars['_A']['borrow_result']['awad']==1): ?>������<? if (!isset($this->magic_vars['_A']['borrow_result']['funds'])) $this->magic_vars['_A']['borrow_result']['funds'] = ''; echo $this->magic_vars['_A']['borrow_result']['funds']; ?>%<? else: ?><? if (!isset($this->magic_vars['_A']['borrow_result']['part_account'])) $this->magic_vars['_A']['borrow_result']['part_account'] = ''; echo $this->magic_vars['_A']['borrow_result']['part_account']; ?><? endif; ?>
		</div>
		<div class="l">Ͷ��ʧ���Ƿ�����</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['is_false'])) $this->magic_vars['_A']['borrow_result']['is_false']=''; ;if (  $this->magic_vars['_A']['borrow_result']['is_false']==0): ?>��<? else: ?>��<? endif; ?>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">���ʱ�䣺</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['addtime'])) $this->magic_vars['_A']['borrow_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>
		</div>
		<div class="l">�б�ʱ�䣺</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['verify_time'])) $this->magic_vars['_A']['borrow_result']['verify_time'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">���ݣ�</div>
		<div class="hb" >
			<table><tr><td align="left"><? if (!isset($this->magic_vars['_A']['borrow_result']['content'])) $this->magic_vars['_A']['borrow_result']['content'] = ''; echo $this->magic_vars['_A']['borrow_result']['content']; ?></td></tr></table>
		</div>
	</div>
	
</div>
<!---�ѻ���--->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="repayment"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�����</td>
			<td width="" class="main_td">������</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">����ʱ��</td>
			<td width="" class="main_td">������</td>
            <td width="" class="main_td">������Ϣ</td>
            <td width="" class="main_td">��Ϣ</td>
			<td width="" class="main_td">����ʱ��</td>
			<td width="" class="main_td">״̬</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_list']) || $this->magic_vars['_A']['borrow_list']=='') $this->magic_vars['_A']['borrow_list'] = array();  $_from = $this->magic_vars['_A']['borrow_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan'] == 1): ?><span style="color:#FF0000">(��ת��)</span><? endif; ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
			<td><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']+1; ?>/<? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?></td>
			<td><? if (!isset($this->magic_vars['item']['repayment_time'])) $this->magic_vars['item']['repayment_time'] = '';$_tmp = $this->magic_vars['item']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
			<td><? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?>Ԫ</td>
            <td><? if (!isset($this->magic_vars['item']['interest'])) $this->magic_vars['item']['interest'] = ''; echo $this->magic_vars['item']['interest']; ?>Ԫ</td>
            <td><? if (!isset($this->magic_vars['item']['late_interest'])) $this->magic_vars['item']['late_interest'] = ''; echo $this->magic_vars['item']['late_interest']; ?>Ԫ</td>
			<td><? if (!isset($this->magic_vars['item']['repayment_yestime'])) $this->magic_vars['item']['repayment_yestime'] = '';$_tmp = $this->magic_vars['item']['repayment_yestime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
			<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?><font color="#006600">�ѻ�</font><? else: ?><font color="#FF0000">δ��--<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==2): ?><font color="#FF0000">�Ѵ���</font><? else: ?><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days']=''; ;if (  $this->magic_vars['item']['late_days']>-5): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/late_repay<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">������</a><? else: ?>-<? endif; ?><? endif; ?></font><? endif; ?></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>�ؼ��֣�
			<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = '';$_tmp = $_REQUEST['keywords'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/><select id="status" >
			<option value="">����</option>
			<option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>�ѻ�</option>
			<option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==0): ?> selected="selected"<? endif; ?>>δ��</option>
			</select><input type="button" value="����"  onclick="sousuo('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/repayment<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>')"/>
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


<!---����--->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="liubiao"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�����</td>
			<td width="" class="main_td">������</td>
			<td width="" class="main_td">�������</td>
			<td width="" class="main_td">�����</td>
			<td width="" class="main_td">��Ͷ���</td>
			<td width="" class="main_td">��ʼʱ��</td>
			<td width="" class="main_td">����ʱ��</td>
		
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_list']) || $this->magic_vars['_A']['borrow_list']=='') $this->magic_vars['_A']['borrow_list'] = array();  $_from = $this->magic_vars['_A']['borrow_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
			<td title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan'] == 1): ?><span style="color:#FF0000">(��ת��)</span><? endif; ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
			<td><? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?>����</td>
			<td><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>Ԫ</td>
			<td><? if (!isset($this->magic_vars['item']['account_yes'])) $this->magic_vars['item']['account_yes'] = ''; echo $this->magic_vars['item']['account_yes']; ?>Ԫ</td>
			<td><? if (!isset($this->magic_vars['item']['verify_time'])) $this->magic_vars['item']['verify_time'] = '';$_tmp = $this->magic_vars['item']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
			<td><? if (!isset($this->magic_vars['item']['verify_time'])) $this->magic_vars['item']['verify_time'] = ''; if (!isset($this->magic_vars['item']['valid_time'])) $this->magic_vars['item']['valid_time'] = '';$_tmp = $this->magic_vars['item']['verify_time']+$this->magic_vars['item']['valid_time']*24*60*60;$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
		
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/>�ؼ��֣�<input type="text" name="keywords" id="keywords" value="<? if (!isset($_REQUEST['keywords'])) $_REQUEST['keywords'] = ''; echo $_REQUEST['keywords']; ?>"/>
			<!--<select id="status" >
			<option value="">����</option>
			<option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>�ѻ�</option>
			<option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==0): ?> selected="selected"<? endif; ?>>δ��</option>
			</select>--><input type="button" value="����"  onclick="sousuo('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/repayment<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>')"/>
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


<!--������ ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="liubiao_edit"): ?>
<div class="module_title"><strong>�������</strong></div>
	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['username'])) $this->magic_vars['_A']['borrow_result']['username'] = ''; echo $this->magic_vars['_A']['borrow_result']['username']; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">���⣺</div>
		<div >
			<? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan'] == 1): ?><span style="color:#FF0000">(��ת��)</span><? endif; ?><a href="/invest/a<? if (!isset($this->magic_vars['_A']['borrow_result']['id'])) $this->magic_vars['_A']['borrow_result']['id'] = ''; echo $this->magic_vars['_A']['borrow_result']['id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['_A']['borrow_result']['name'])) $this->magic_vars['_A']['borrow_result']['name'] = ''; echo $this->magic_vars['_A']['borrow_result']['name']; ?></a>
		</div>
	</div>
	<div class="module_border">
		<div class="l">����ȣ�</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['account'])) $this->magic_vars['_A']['borrow_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_result']['account']; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">�ѽ��ȣ�</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['account_yes'])) $this->magic_vars['_A']['borrow_result']['account_yes'] = ''; echo $this->magic_vars['_A']['borrow_result']['account_yes']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����ʱ�䣺</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['verify_time'])) $this->magic_vars['_A']['borrow_result']['verify_time'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">����ʱ�䣺</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_result']['verify_time'])) $this->magic_vars['_A']['borrow_result']['verify_time'] = ''; if (!isset($this->magic_vars['_A']['borrow_result']['valid_time'])) $this->magic_vars['_A']['borrow_result']['valid_time'] = '';$_tmp = $this->magic_vars['_A']['borrow_result']['verify_time']+$this->magic_vars['_A']['borrow_result']['valid_time']*24*60*60;$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_title"><strong>���</strong></div>
	<form method="post" action="">
	<div class="module_border">
		<div class="l">���״̬��</div>
		<div >
			<input type="radio" name="status" value="1" />���귵�ؽ��<input type="radio" name="status" value="2" checked="checked" />�ӳ��������
		</div>
	</div>
	<div class="module_border">
		<div class="l">�ӳ�������</div>
		<div >
			<input type="text" name="days" value="<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['account'])) $this->magic_vars['_A']['borrow_amount_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_amount_result']['account']; ?>" size="5" value="0" />��
		</div>
	</div>
	
	<div class="module_border">
		<div class="l"></div>
		<div class="h">
			<input type="submit" value="ȷ�����" />
		</div>
	</div>
	</form>

<!--��ȹ��� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="amount"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�û�����</td>
			<td width="" class="main_td">��������</td>
			<td width="" class="main_td">ԭ�����</td>
			<td width="" class="main_td">������</td>
			<td width="" class="main_td">�¶��</td>
			<td width="" class="main_td">����ʱ��</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">��ע</td>
			<td width="" class="main_td">״̬123</td>
			<td width="" class="main_td">����</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_amount_list']) || $this->magic_vars['_A']['borrow_amount_list']=='') $this->magic_vars['_A']['borrow_amount_list'] = array();  $_from = $this->magic_vars['_A']['borrow_amount_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td ><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td width="80"><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;if (  $this->magic_vars['item']['type'] =="tender_vouch"): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/amount&type=tender_vouch">Ͷ�ʵ������</a><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;elseif (  $this->magic_vars['item']['type'] =="borrow_vouch"): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/amount&type=borrow_vouch">�������</a><? else: ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/amount&type=credit">������ö��</a><? endif; ?></td>
			<td width="70"><? if (!isset($this->magic_vars['item']['account_old'])) $this->magic_vars['item']['account_old'] = ''; echo $this->magic_vars['item']['account_old']; ?>Ԫ</td>
			<td width="70" ><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?>Ԫ</td>
			<td ><? if (!isset($this->magic_vars['item']['account_new'])) $this->magic_vars['item']['account_new'] = ''; echo $this->magic_vars['item']['account_new']; ?>Ԫ</td>
			<td ><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
			<td ><? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = ''; echo $this->magic_vars['item']['content']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
			<td  width="50"><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==2): ?><font color="#6699CC">�����</font><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (   $this->magic_vars['item']['status']==1): ?> �ɹ� <? else: ?><font color="#FF0000">ʧ��</font><? endif; ?></td>
			<td  width="70"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/amount_view<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">���/�鿴</a></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> ״̬<select id="status" ><option value="">ȫ��</option><option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>��ͨ��</option><option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> selected="selected"<? endif; ?>>δͨ��</option></select> <input type="button" value="����"  onclick="sousuo('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/amount<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>')"/>
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
<!--��ȹ��� ����-->


<!--���� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="late"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr>
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�����</td>
			<td width="*" class="main_td">������</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">Ӧ��ʱ��</td>
			<td width="" class="main_td">Ӧ�����</td>
			<td width="" class="main_td">��������</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">����</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['borrow_repayment_list']) || $this->magic_vars['_A']['borrow_repayment_list']=='') $this->magic_vars['_A']['borrow_repayment_list'] = array();  $_from = $this->magic_vars['_A']['borrow_repayment_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td ><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
			<td><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan'] == 1): ?><span style="color:#FF0000">(��ת��)</span><? endif; ?><? if (!isset($this->magic_vars['item']['is_fast'])) $this->magic_vars['item']['is_fast']=''; ;if (  $this->magic_vars['item']['is_fast'] == 1): ?>(<a href="javascript:void(0)" onclick='tipsWindown("��Ѻ����ϸ��Ϣ","url:get?/index.php?q=viewfast&id=<? if (!isset($this->magic_vars['item']['fastid'])) $this->magic_vars['item']['fastid'] = ''; echo $this->magic_vars['item']['fastid']; ?>",500,430,"true","","true","text");'>	<span style="color:#FF0000"><? if (!isset($this->magic_vars['item']['isqiye'])) $this->magic_vars['item']['isqiye']=''; ;if (  $this->magic_vars['item']['isqiye'] == 1): ?>��ҵ-<? else: ?>����-<? endif; ?>��Ѻ��</span></a>)<? endif; ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?></a><? if (!isset($this->magic_vars['item']['is_cz'])) $this->magic_vars['item']['is_cz']=''; ;if (  $this->magic_vars['item']['is_cz']==1): ?>  <span style="color:#FF0000">�����飺<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = '';$_tmp = $this->magic_vars['item']['borrow_id'];$_tmp = $this->magic_modifier("czname",$_tmp,"");echo $_tmp;unset($_tmp); ?></span><? endif; ?></td>
			<td><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']+1; ?>/<? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['repayment_time'])) $this->magic_vars['item']['repayment_time'] = '';$_tmp = $this->magic_vars['item']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
			<td ><? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?>Ԫ</td>
			<td ><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days'] = ''; echo $this->magic_vars['item']['late_days']; ?>��</td>
			<td ><? if (!isset($this->magic_vars['item']['late_interest'])) $this->magic_vars['item']['late_interest'] = ''; echo $this->magic_vars['item']['late_interest']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==2): ?><font color="#FF0000">�Ѵ���</font><? else: ?><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days']=''; ;if (  $this->magic_vars['item']['late_days']>0): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/late_repay<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">����</a><? else: ?>-<? endif; ?><? endif; ?></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/> ״̬<select id="status" ><option value="">ȫ��</option><option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>��ͨ��</option><option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> selected="selected"<? endif; ?>>δͨ��</option></select> <input type="button" value="����"  onclick="sousuo('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/late<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>')"/>
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
<!--���� ����-->

<!--�����굽�� ��ʼ--><!--
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="lateFast"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">�����</td>
			<td width="*" class="main_td">������</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">Ӧ��ʱ��</td>
			<td width="" class="main_td">Ӧ�����</td>
			<td width="" class="main_td">��������</td>
			<td width="" class="main_td">����</td>
			<td width="" class="main_td">����</td>
		</tr>
                <?php  $showtime=date("y-m-d");?>
		<?  if(!isset($this->magic_vars['_A']['borrow_repayment_list']) || $this->magic_vars['_A']['borrow_repayment_list']=='') $this->magic_vars['_A']['borrow_repayment_list'] = array();  $_from = $this->magic_vars['_A']['borrow_repayment_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>

		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td ><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("�û���ϸ��Ϣ�鿴","url:get?<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/user/view&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>&type=scene",500,230,"true","","true","text");'>	<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
			<td><? if (!isset($this->magic_vars['item']['is_liuzhuan'])) $this->magic_vars['item']['is_liuzhuan']=''; ;if (  $this->magic_vars['item']['is_liuzhuan'] == 1): ?><span style="color:#FF0000">(��ת��)</span><? endif; ?><? if (!isset($this->magic_vars['item']['is_fast'])) $this->magic_vars['item']['is_fast']=''; ;if (  $this->magic_vars['item']['is_fast'] == 1): ?>(<a href="javascript:void(0)" onclick='tipsWindown("��ݱ���ϸ��Ϣ","url:get?/index.php?q=viewfast&id=<? if (!isset($this->magic_vars['item']['fastid'])) $this->magic_vars['item']['fastid'] = ''; echo $this->magic_vars['item']['fastid']; ?>",500,430,"true","","true","text");'>	<span style="color:#FF0000"><? if (!isset($this->magic_vars['item']['isqiye'])) $this->magic_vars['item']['isqiye']=''; ;if (  $this->magic_vars['item']['isqiye'] == 1): ?>��ҵ-<? else: ?>����-<? endif; ?>��ݱ�</span></a>)<? endif; ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?></a></td>
			<td><? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']+1; ?>/<? if (!isset($this->magic_vars['item']['time_limit'])) $this->magic_vars['item']['time_limit'] = ''; echo $this->magic_vars['item']['time_limit']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['repayment_time'])) $this->magic_vars['item']['repayment_time'] = '';$_tmp = $this->magic_vars['item']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
			<td ><? if (!isset($this->magic_vars['item']['repayment_account'])) $this->magic_vars['item']['repayment_account'] = ''; echo $this->magic_vars['item']['repayment_account']; ?>Ԫ</td>
			<td ><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days'] = ''; echo $this->magic_vars['item']['late_days']; ?>��</td>
			<td ><? if (!isset($this->magic_vars['item']['late_interest'])) $this->magic_vars['item']['late_interest'] = ''; echo $this->magic_vars['item']['late_interest']; ?></td>
			<td ><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==2): ?><font color="#FF0000">�Ѵ���</font><? else: ?><? if (!isset($this->magic_vars['item']['late_days'])) $this->magic_vars['item']['late_days']=''; ;if (  $this->magic_vars['item']['late_days']>=0): ?><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/late_repay<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">����</a><? else: ?>-<? endif; ?><? endif; ?></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">

		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>"/> ״̬<select id="status" ><option value="">ȫ��</option><option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>��ͨ��</option><option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> selected="selected"<? endif; ?>>δͨ��</option></select> <input type="button" value="����" / onclick="sousuo('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/amount<? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>')">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="11" class="page">
			<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
			</td>
		</tr>
	</form>
</table>-->
<!--�����굽�� ����-->

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "invest"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="" method="post">
<tr>
<td width="" class="main_td">Ͷ����</td>
<td width="" class="main_td">��ʵ����</td>
<td width="" class="main_td">Ͷ����</td>
<td width="" class="main_td">Ͷ�����</td>
<td width="" class="main_td">Ͷ����</td>
<td width="" class="main_td">�������ʱ��</td>
</tr>
<?  if(!isset($this->magic_vars['_A']['borrow_invest']) || $this->magic_vars['_A']['borrow_invest']=='') $this->magic_vars['_A']['borrow_invest'] = array();  $_from = $this->magic_vars['_A']['borrow_invest']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
<tr>
<td><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
<td><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></td>
<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
<td><? if (!isset($this->magic_vars['item']['account'])) $this->magic_vars['item']['account'] = ''; echo $this->magic_vars['item']['account']; ?></td>
<td><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
<td><? if (!isset($this->magic_vars['item']['success_time'])) $this->magic_vars['item']['success_time'] = '';$_tmp = $this->magic_vars['item']['success_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
</tr>
<? endforeach; endif; unset($_from); ?>
<tr>
		<td colspan="11" class="action">
		<div class="floatl">

		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>
                        ��ʵ������<input type="text" name="realname" id="realname" value="<? if (!isset($_REQUEST['realname'])) $_REQUEST['realname'] = '';$_tmp = $_REQUEST['realname'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>
                        <input type="button" value="����" / onclick="sousuo('<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow/invest&site_id=69&a=userinfo')">
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

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "investlist"): ?>
<div class="content">
		<table  border="0"  cellspacing="0"  width="100%" class="tab1">
			<tr align="center">
			  <td width="" class="main_td"><strong>Ͷ����/��ϵ</strong> </td>
			  <td width="" class="main_td"><strong>��ǰ������</strong></td>
			  <td width="" class="main_td"><strong>Ͷ����</strong></td>
			  <td width="" class="main_td"><strong>��Ч���</strong></td>
			  <td width="" class="main_td"><strong>Ͷ��ʱ��</strong></td>
			  <td width="" class="main_td"><strong>״̬ </strong></td>
			  <td width="" class="main_td"><strong>Ͷ�꽱�� </strong></td>
			</tr>
			<? if (!isset($this->magic_vars['_A']['borrow_investlist'])) $this->magic_vars['_A']['borrow_investlist']=''; ;if (  $this->magic_vars['_A']['borrow_investlist']==null): ?>
			<tr>
			  <td colspan=7 align="center">����Ͷ���¼</td>
			 
			</tr>
			<? endif; ?>
			<?  if(!isset($this->magic_vars['_A']['borrow_investlist']) || $this->magic_vars['_A']['borrow_investlist']=='') $this->magic_vars['_A']['borrow_investlist'] = array();  $_from = $this->magic_vars['_A']['borrow_investlist']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['vat']):
?>
			<tr>
			  <td align="center"><? if (!isset($this->magic_vars['vat']['username'])) $this->magic_vars['vat']['username'] = ''; echo $this->magic_vars['vat']['username']; ?></td>
			  <td align="center" ><? if (!isset($this->magic_vars['vat']['apr'])) $this->magic_vars['vat']['apr'] = ''; echo $this->magic_vars['vat']['apr']; ?>%</td>
			  <td align="center" ><? if (!isset($this->magic_vars['vat']['money'])) $this->magic_vars['vat']['money'] = ''; echo $this->magic_vars['vat']['money']; ?>Ԫ</td>
			  <td align="center" ><? if (!isset($this->magic_vars['vat']['tender_account'])) $this->magic_vars['vat']['tender_account'] = ''; echo $this->magic_vars['vat']['tender_account']; ?>Ԫ</td>
			  <td align="center"><? if (!isset($this->magic_vars['vat']['addtime'])) $this->magic_vars['vat']['addtime'] = '';$_tmp = $this->magic_vars['vat']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
			  <td align="center"><? if (!isset($this->magic_vars['vat']['tender_account'])) $this->magic_vars['vat']['tender_account']='';if (!isset($this->magic_vars['vat']['money'])) $this->magic_vars['vat']['money']=''; ;if (  $this->magic_vars['vat']['tender_account']== $this->magic_vars['vat']['money']): ?>ȫ��ͨ��<? else: ?>����ͨ��<? endif; ?></td>
			  <td align="center"><? if (!isset($this->magic_vars['vat']['jl'])) $this->magic_vars['vat']['jl'] = ''; echo $this->magic_vars['vat']['jl']; ?></td>
			</tr>
			<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
			<tr>
				<td colspan="11" class="page">
					<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?>
				</td>
			</tr>
		</table>
	</div>


<!-- Ͷ�꽱��  -->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "tbjl"): ?>
<div class="content">
		<table  border="0"  cellspacing="0"  width="100%" class="tab1">
<form action="" method="post">
			<tr align="center">
			  <td width="" class="main_td"><strong>Ͷ����</strong> </td>
			  <td width="" class="main_td"><strong>��ʵ����</strong></td>
			  <td width="" class="main_td"><strong>Ͷ����</strong></td>
			  <td width="" class="main_td"><strong>Ͷ��ʱ��</strong></td>
			  <td width="" class="main_td"><strong>Ͷ�꽱�� </strong></td>
			</tr>
			<?  if(!isset($this->magic_vars['_A']['borrow_tbjl']) || $this->magic_vars['_A']['borrow_tbjl']=='') $this->magic_vars['_A']['borrow_tbjl'] = array();  $_from = $this->magic_vars['_A']['borrow_tbjl']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['vat']):
?>
			<tr  >
			  <td align="center"><? if (!isset($this->magic_vars['vat']['username'])) $this->magic_vars['vat']['username'] = ''; echo $this->magic_vars['vat']['username']; ?></td>
			  <td align="center" ><? if (!isset($this->magic_vars['vat']['realname'])) $this->magic_vars['vat']['realname'] = ''; echo $this->magic_vars['vat']['realname']; ?></td>
			  <td align="center" ><? if (!isset($this->magic_vars['vat']['money'])) $this->magic_vars['vat']['money'] = ''; echo $this->magic_vars['vat']['money']; ?>Ԫ</td>
			  <td align="center" ><? if (!isset($this->magic_vars['vat']['addtime'])) $this->magic_vars['vat']['addtime'] = '';$_tmp = $this->magic_vars['vat']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
			  <td align="center"><? if (!isset($this->magic_vars['vat']['jl'])) $this->magic_vars['vat']['jl'] = ''; echo $this->magic_vars['vat']['jl']; ?></td>
			</tr>
			<? endforeach; endif; unset($_from); ?>
<tr>
		<td colspan="11" class="action">
		<div class="floatl">

		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>
                        ��ʵ������<input type="text" name="realname" id="realname" value="<? if (!isset($_REQUEST['realname'])) $_REQUEST['realname'] = '';$_tmp = $_REQUEST['realname'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/>
                        <input type="button" value="����" / onclick="sousuo('<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow/tbjl&site_id=69&a=userinfo')">
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

	</div>


<!--������ ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="amount_view"): ?>
<div class="module_title"><strong>������</strong></div>
	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['username'])) $this->magic_vars['_A']['borrow_amount_result']['username'] = ''; echo $this->magic_vars['_A']['borrow_amount_result']['username']; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">������ͣ�</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['type'])) $this->magic_vars['_A']['borrow_amount_result']['type']=''; ;if (  $this->magic_vars['_A']['borrow_amount_result']['type']=="tender_vouch"): ?><font color="#FF0000">Ͷ�ʵ������</font><? if (!isset($this->magic_vars['_A']['borrow_amount_result']['type'])) $this->magic_vars['_A']['borrow_amount_result']['type']=''; ;elseif (  $this->magic_vars['_A']['borrow_amount_result']['type']=="borrow_vouch"): ?><font color="#FF0000">�������</font><? else: ?>���ö��<? endif; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">ԭ����</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['account_old'])) $this->magic_vars['_A']['borrow_amount_result']['account_old'] = '';$_tmp = $this->magic_vars['_A']['borrow_amount_result']['account_old'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">�����ȣ�</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['account'])) $this->magic_vars['_A']['borrow_amount_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_amount_result']['account']; ?>
		</div>
	</div>
	<div class="module_border">
		<div class="l">���ݣ�</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['content'])) $this->magic_vars['_A']['borrow_amount_result']['content'] = ''; echo $this->magic_vars['_A']['borrow_amount_result']['content']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��ע��</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['remark'])) $this->magic_vars['_A']['borrow_amount_result']['remark'] = ''; echo $this->magic_vars['_A']['borrow_amount_result']['remark']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">����ʱ�䣺</div>
		<div class="h">
			<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['addtime'])) $this->magic_vars['_A']['borrow_amount_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['borrow_amount_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
	<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['status'])) $this->magic_vars['_A']['borrow_amount_result']['status']=''; ;if (  $this->magic_vars['_A']['borrow_amount_result']['status']!=1): ?>
	<div class="module_title"><strong>���</strong></div>
	<form method="post" action="">
	<div class="module_border">
		<div class="l">���״̬��</div>
		<div class="h">
			<input type="radio" name="status" value="1" />ͨ��  <input type="radio" name="status" value="0" checked="checked" />��ͨ��
		</div>
	</div>
	<div class="module_border">
		<div class="l">ͨ����ȣ�</div>
		<div class="h">
			<input type="text" name="account" value="<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['account'])) $this->magic_vars['_A']['borrow_amount_result']['account'] = ''; echo $this->magic_vars['_A']['borrow_amount_result']['account']; ?>" />
			<input type="hidden" name="type" value="<? if (!isset($this->magic_vars['_A']['borrow_amount_result']['type'])) $this->magic_vars['_A']['borrow_amount_result']['type'] = ''; echo $this->magic_vars['_A']['borrow_amount_result']['type']; ?>" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">��˱�ע��</div>
		<div class="h">
			<textarea name="verify_remark" rows="5" cols="40" ></textarea>
		</div>
	</div>
	<div class="module_border">
		<div class="l"></div>
		<div class="h">
			<input type="submit" value="ȷ�����" />
		</div>
	</div>
	</form>
	<? endif; ?>

<!--ͳ�� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']=="tongji"): ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="*" class="main_td">����</td>
			<td width="*" class="main_td">�ܶ�</td>
		</tr>
        <tr  class="tr2">
			<td >�˻��ܶ�</td>
			<td >��<? if (!isset($this->magic_vars['_A']['allaccount_tongji']['atotal'])) $this->magic_vars['_A']['allaccount_tongji']['atotal'] = '';$_tmp = $this->magic_vars['_A']['allaccount_tongji']['atotal'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr  >
			<td >�������</td>
			<td >��<? if (!isset($this->magic_vars['_A']['allaccount_tongji']['ause_money'])) $this->magic_vars['_A']['allaccount_tongji']['ause_money'] = '';$_tmp = $this->magic_vars['_A']['allaccount_tongji']['ause_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr  class="tr2">
			<td >�����ܶ�</td>
			<td >��<? if (!isset($this->magic_vars['_A']['allaccount_tongji']['ano_use_money'])) $this->magic_vars['_A']['allaccount_tongji']['ano_use_money'] = '';$_tmp = $this->magic_vars['_A']['allaccount_tongji']['ano_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr  class="tr2">
			<td >�ɹ�����ܶ�</td>
			<td >��<? if (!isset($this->magic_vars['_A']['borrow_tongji']['success_num'])) $this->magic_vars['_A']['borrow_tongji']['success_num'] = '';$_tmp = $this->magic_vars['_A']['borrow_tongji']['success_num'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr  >
			<td >�������ܶ�</td>
			<td >��<? if (!isset($this->magic_vars['_A']['borrow_tongji']['success_num1'])) $this->magic_vars['_A']['borrow_tongji']['success_num1'] = '';$_tmp = $this->magic_vars['_A']['borrow_tongji']['success_num1'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr  class="tr2">
			<td >δ�����ܶ�</td>
			<td >��<? if (!isset($this->magic_vars['_A']['borrow_tongji']['success_num0'])) $this->magic_vars['_A']['borrow_tongji']['success_num0'] = '';$_tmp = $this->magic_vars['_A']['borrow_tongji']['success_num0'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr  >
			<td >�����ܶ�</td>
			<td ><? if (!isset($this->magic_vars['_A']['borrow_tongji']['laterepay'])) $this->magic_vars['_A']['borrow_tongji']['laterepay'] = '';$_tmp = $this->magic_vars['_A']['borrow_tongji']['laterepay'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr  class="tr2">
			<td >���ڼ������ܶ�</td>
			<td >��<? if (!isset($this->magic_vars['_A']['borrow_tongji']['success_laterepay'])) $this->magic_vars['_A']['borrow_tongji']['success_laterepay'] = '';$_tmp = $this->magic_vars['_A']['borrow_tongji']['success_laterepay'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
		</tr>
		<tr >
			<td >����δ�����ܶ�</td>
			<td >��<? if (!isset($this->magic_vars['_A']['borrow_tongji']['false_laterepay'])) $this->magic_vars['_A']['borrow_tongji']['false_laterepay'] = '';$_tmp = $this->magic_vars['_A']['borrow_tongji']['false_laterepay'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></td>
			
		</tr>
		
	</form>	
</table>
<!--ͳ�� ����-->

<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
	  <?  if(!isset($this->magic_vars['_A']['account_tongji']) || $this->magic_vars['_A']['account_tongji']=='') $this->magic_vars['_A']['account_tongji'] = array();  $_from = $this->magic_vars['_A']['account_tongji']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr >
			<td width="*" class="main_td">��������</td>
			<td width="*" class="main_td"><? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?></td>
			<td width="" class="main_td">���</td>
		</tr>
		<?  if(!isset($this->magic_vars['item']) || $this->magic_vars['item']=='') $this->magic_vars['item'] = array();  $_from = $this->magic_vars['item']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['_key'] =>  $this->magic_vars['_item']):
?>
		<tr  class="tr2">
			<td ><? if (!isset($this->magic_vars['_item']['type_name'])) $this->magic_vars['_item']['type_name'] = ''; echo $this->magic_vars['_item']['type_name']; ?></td>
			<td ><? if (!isset($this->magic_vars['_item']['type'])) $this->magic_vars['_item']['type'] = ''; echo $this->magic_vars['_item']['type']; ?></td>
			<td >��<? if (!isset($this->magic_vars['_item']['num'])) $this->magic_vars['_item']['num'] = ''; echo $this->magic_vars['_item']['num']; ?></td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
	<? endforeach; endif; unset($_from); ?>
	</form>	
</table>
<!--ͳ�� ����-->
<? endif; ?>

<literal>
<script>

var urls = '<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>';
var urlFullExport = "<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/full&status=<? if (!isset($_REQUEST['status'])) $_REQUEST['status'] = ''; echo $_REQUEST['status']; ?>&type=excel";
var urlFullExport2 = "<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/investlist&type=excel";

function exportFullExcl() {

    var start = $("#start_ts").val();
    if(start != "") {
        urlFullExport += "&start_ts=" + start;
    }
    var end = $("#end_ts").val();
    if(end != "") {
        urlFullExport += "&end_ts=" + end;
    }
    location.href=urlFullExport;

}
function exportExcl2(borrow_id){
    urlFullExport2+="&borrow_id="+borrow_id ;
    location.href=urlFullExport2;
}
    
function sousuo(url){
	var sou = "";
	var username = $("#username").val();
        var realname=  $("#realname").val();
	if (username!=""){
		sou += "&username="+encodeURI(username);
	}
        if (realname!=""){
		sou += "&realname="+encodeURI(realname);
	}
	var keywords = $("#keywords").val();
	if (keywords!=""){
		sou += "&keywords="+encodeURI(keywords);
	}
	var status = $("#status").val();
	if (status!=""){
		sou += "&status="+status;
	}
	var is_vouch = $("#is_vouch").val();
	if (is_vouch!=""){
		sou += "&is_vouch="+is_vouch;
	}
	if (sou!=""){
		
		location.href=url+sou;
	}
}
</script>
