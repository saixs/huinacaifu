<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	<? if (!isset($_REQUEST['id'])) $_REQUEST['id']=''; ;if (  $_REQUEST['id']==""): ?>
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
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
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
	</form>
	<? else: ?>
	<div class="module_title"><span id="user_info_menu"> <a href="javascript:void(0)" class="current"  tab="1"  >��������</a>  <a href="javascript:void(0)"  tab="2">������ϸ����</a>  <a href="javascript:void(0)" tab="3">��������</a>  <a href="javascript:void(0)" tab="4">��λ����</a>  <a href="javascript:void(0)" tab="5">˽Ӫҵ������</a>   <a href="javascript:void(0)" tab="6">����״��</a>   <a href="javascript:void(0)" tab="7">��ϵ��ʽ</a>    <a href="javascript:void(0)" tab="8">��ż����</a>    <a href="javascript:void(0)" tab="9">��������</a>     <a href="javascript:void(0)" tab="11">������Ϣ</a> </span><strong>����û���Ϣ</strong></div>
	
	<form name="form1" method="post" action=""  enctype="multipart/form-data" >
	<div id="user_info_menu_tab">
		<!--�������� ��ʼ-->
		<div id="user_info_menu_1">
			<div class="module_border">
				<div class="l">�û���</div>
				<div class="c">
					<? if (!isset($this->magic_vars['_A']['userinfo_result']['username'])) $this->magic_vars['_A']['userinfo_result']['username'] = ''; echo $this->magic_vars['_A']['userinfo_result']['username']; ?> (ID:<? if (!isset($this->magic_vars['_A']['userinfo_result']['user_id'])) $this->magic_vars['_A']['userinfo_result']['user_id'] = ''; echo $this->magic_vars['_A']['userinfo_result']['user_id']; ?>)
				</div>
			</div>
			<div class="module_border">
				<div class="l">��ʵ������</div>
				<div class="c">
					<? if (!isset($this->magic_vars['_A']['userinfo_result']['realname'])) $this->magic_vars['_A']['userinfo_result']['realname'] = ''; echo $this->magic_vars['_A']['userinfo_result']['realname']; ?> 
				</div>
			</div>
			<div class="module_border">
				<div class="l">���䣺</div>
				<div class="c">
					<? if (!isset($this->magic_vars['_A']['userinfo_result']['email'])) $this->magic_vars['_A']['userinfo_result']['email'] = ''; echo $this->magic_vars['_A']['userinfo_result']['email']; ?> 
				</div>
			</div>
			
			<div class="module_border">
				
				<div class="c">
					������һ�����������ύ
				</div>
			</div>
			
		</div>
		<!--�������� ����-->
		
		<!--�������� ��ʼ-->
		<div id="user_info_menu_2" class="hide">
			
			<div class="module_border">
				<div class="w">����״����</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=marry&nid=user_marry&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['marry'])) $this->magic_vars['_A']['userinfo_result']['marry'] = ''; echo $this->magic_vars['_A']['userinfo_result']['marry']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�� Ů��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=child&nid=user_child&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['child'])) $this->magic_vars['_A']['userinfo_result']['child'] = ''; echo $this->magic_vars['_A']['userinfo_result']['child']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">ѧ ����</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=education&nid=user_education&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['education'])) $this->magic_vars['_A']['userinfo_result']['education'] = ''; echo $this->magic_vars['_A']['userinfo_result']['education']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�����룺</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=income&nid=user_income&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['income'])) $this->magic_vars['_A']['userinfo_result']['income'] = ''; echo $this->magic_vars['_A']['userinfo_result']['income']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�� ����</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=shebao&nid=user_shebao&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['shebao'])) $this->magic_vars['_A']['userinfo_result']['shebao'] = ''; echo $this->magic_vars['_A']['userinfo_result']['shebao']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�籣���Ժţ�</div>
				<div class="c">
					<input type="text" size="30" name="shebaoid" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['shebaoid'])) $this->magic_vars['_A']['userinfo_result']['shebaoid'] = ''; echo $this->magic_vars['_A']['userinfo_result']['shebaoid']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">ס��������</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=housing&nid=user_housing&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['housing'])) $this->magic_vars['_A']['userinfo_result']['housing'] = ''; echo $this->magic_vars['_A']['userinfo_result']['housing']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�Ƿ񹺳���</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=car&nid=user_car&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['car'])) $this->magic_vars['_A']['userinfo_result']['car'] = ''; echo $this->magic_vars['_A']['userinfo_result']['car']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">���ڼ�¼��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=late&nid=user_late&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['late'])) $this->magic_vars['_A']['userinfo_result']['late'] = ''; echo $this->magic_vars['_A']['userinfo_result']['late']; ?>"></script>
				</div>
			</div>
		</div>
		<!--�������� ��ʼ-->
		
		<!--�������� ��ʼ-->
		<div id="user_info_menu_3" class="hide">
			
			<div class="module_border">
				<div class="w">������ַ��</div>
				<div class="c">
					<input type="text" size="30" name="house_address" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_address'])) $this->magic_vars['_A']['userinfo_result']['house_address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_address']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">���������</div>
				<div class="c">
					<input type="text" size="15" name="house_area" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_area'])) $this->magic_vars['_A']['userinfo_result']['house_area'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_area']; ?>"/> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ݣ�</div>
				<div class="c">
					<input type="text" size="15" name="house_year" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_year'])) $this->magic_vars['_A']['userinfo_result']['house_year'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_year']; ?>" onclick="change_picktime()" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">����״����</div>
				<div class="c">
					<input type="text" size="15" name="house_status" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_status'])) $this->magic_vars['_A']['userinfo_result']['house_status'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_status']; ?>" /> Ԫ
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">����Ȩ��1��</div>
				<div class="c">
					<input type="text" size="15" name="house_holder1" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_holder1'])) $this->magic_vars['_A']['userinfo_result']['house_holder1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_holder1']; ?>" /> ��Ȩ�ݶ�<input type="text" size="15" name="house_right1" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_right1'])) $this->magic_vars['_A']['userinfo_result']['house_right1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_right1']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">����Ȩ��2��</div>
				<div class="c">
					<input type="text" size="15" name="house_holder2" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_holder2'])) $this->magic_vars['_A']['userinfo_result']['house_holder2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_holder2']; ?>" /> ��Ȩ�ݶ�<input type="text" size="15" name="house_right2" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_right2'])) $this->magic_vars['_A']['userinfo_result']['house_right2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_right2']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">���������ڰ�����, ����д��</div>
				<div class="c">
					�������ޣ�<input type="text" size="10" name="house_loanyear" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_loanyear'])) $this->magic_vars['_A']['userinfo_result']['house_loanyear'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_loanyear']; ?>" />ÿ�¹���<input type="text" size="10" name="house_loanprice" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_loanprice'])) $this->magic_vars['_A']['userinfo_result']['house_loanprice'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_loanprice']; ?>" /> Ԫ
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��Ƿ������</div>
				<div class="c">
					<input type="text" size="15" name="house_balance" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_balance'])) $this->magic_vars['_A']['userinfo_result']['house_balance'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_balance']; ?>" /> Ԫ
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�������У�</div>
				<div class="c">
					<input type="text" size="15" name="house_bank" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['house_bank'])) $this->magic_vars['_A']['userinfo_result']['house_bank'] = ''; echo $this->magic_vars['_A']['userinfo_result']['house_bank']; ?>" /> 
				</div>
			</div>
		</div>
		<!--�������� ����-->
		
		<!--��λ���� ��ʼ-->
		<div id="user_info_menu_4" class="hide">
			
			<div class="module_border">
				<div class="w">��˾���ƣ�</div>
				<div class="c">
					<input type="text" size="15" name="company_name" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_name'])) $this->magic_vars['_A']['userinfo_result']['company_name'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_name']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��˾���ʣ�</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_type&nid=user_company_type&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_type'])) $this->magic_vars['_A']['userinfo_result']['company_type'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_type']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��˾��ҵ��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_industry&nid=user_company_industry&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_industry'])) $this->magic_vars['_A']['userinfo_result']['company_industry'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_industry']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��������</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_jibie&nid=user_company_jibie&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_jibie'])) $this->magic_vars['_A']['userinfo_result']['company_jibie'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_jibie']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">ְ λ��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_office&nid=user_company_office&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_office'])) $this->magic_vars['_A']['userinfo_result']['company_office'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_office']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">����ʱ�䣺</div>
				<div class="c">
					<input type="text" size="15" name="company_worktime1" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_worktime1'])) $this->magic_vars['_A']['userinfo_result']['company_worktime1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_worktime1']; ?>" onclick="change_picktime()" />  �� <input type="text" size="15" name="company_worktime2" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_worktime2'])) $this->magic_vars['_A']['userinfo_result']['company_worktime2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_worktime2']; ?>" onclick="change_picktime()" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�������ޣ�</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_workyear&nid=user_company_workyear&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_workyear'])) $this->magic_vars['_A']['userinfo_result']['company_workyear'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_workyear']; ?>"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�����绰��</div>
				<div class="c">
					<input type="text" size="15" name="company_tel" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_tel'])) $this->magic_vars['_A']['userinfo_result']['company_tel'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_tel']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��˾��ַ��</div>
				<div class="c">
					<input type="text" size="15" name="company_address" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_address'])) $this->magic_vars['_A']['userinfo_result']['company_address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_address']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��˾��վ��</div>
				<div class="c">
					<input type="text" size="15" name="company_weburl" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['company_weburl'])) $this->magic_vars['_A']['userinfo_result']['company_weburl'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_weburl']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��ע˵����</div>
				<div class="c">
					<textarea  cols="50" rows="6"name="company_reamrk"  ><? if (!isset($this->magic_vars['_A']['userinfo_result']['company_reamrk'])) $this->magic_vars['_A']['userinfo_result']['company_reamrk'] = ''; echo $this->magic_vars['_A']['userinfo_result']['company_reamrk']; ?></textarea>
				</div>
			</div>
		</div>
		<!--��λ���� ����-->
		
		
		<!--˽Ӫҵ������ ��ʼ-->
		<div id="user_info_menu_5" class="hide">
			
			<div class="module_border">
				<div class="w">˽Ӫ��ҵ���ͣ�</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=private_type&nid=user_company_industry&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_type'])) $this->magic_vars['_A']['userinfo_result']['private_type'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_type']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�������ڣ�</div>
				<div class="c">
					<input type="text" size="15" name="private_date" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_date'])) $this->magic_vars['_A']['userinfo_result']['private_date'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_date']; ?>" onclick="change_picktime()"/> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��Ӫ������</div>
				<div class="c">
					<input type="text" size="15" name="private_place" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_place'])) $this->magic_vars['_A']['userinfo_result']['private_place'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_place']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">���</div>
				<div class="c">
					<input type="text" size="15" name="private_rent" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_rent'])) $this->magic_vars['_A']['userinfo_result']['private_rent'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_rent']; ?>" /> Ԫ
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">���ڣ�</div>
				<div class="c">
					<input type="text" size="15" name="private_term" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_term'])) $this->magic_vars['_A']['userinfo_result']['private_term'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_term']; ?>" /> ��
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">˰���ţ�</div>
				<div class="c">
					<input type="text" size="15" name="private_taxid" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_commerceid'])) $this->magic_vars['_A']['userinfo_result']['private_commerceid'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_commerceid']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">���̵ǼǺţ�</div>
				<div class="c">
					<input type="text" size="15" name="private_commerceid" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_commerceid'])) $this->magic_vars['_A']['userinfo_result']['private_commerceid'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_commerceid']; ?>" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">ȫ��ӯ��/����</div>
				<div class="c">
					<input type="text" size="15" name="private_income" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_income'])) $this->magic_vars['_A']['userinfo_result']['private_income'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_income']; ?>" /> Ԫ����ȣ�
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��Ա������</div>
				<div class="c">
					<input type="text" size="15" name="private_employee" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['private_employee'])) $this->magic_vars['_A']['userinfo_result']['private_employee'] = ''; echo $this->magic_vars['_A']['userinfo_result']['private_employee']; ?>" /> ��
				</div>
			</div>
		</div>
		<!--˽Ӫҵ������ ����-->
		
		<!--����״�� ��ʼ-->
		<div id="user_info_menu_6" class="hide">
			
			<div class="module_border">
				<div class="w">ÿ���޵�Ѻ�����</div>
				<div class="c">
					<input type="text" size="15" name="finance_repayment" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_repayment'])) $this->magic_vars['_A']['userinfo_result']['finance_repayment'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_repayment']; ?>" /> Ԫ
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">���з�����</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=finance_property&nid=user_finance_property&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_property'])) $this->magic_vars['_A']['userinfo_result']['finance_property'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_property']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">ÿ�·��ݰ��ҽ�</div>
				<div class="c">
					<input type="text" size="15" name="finance_amount" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_amount'])) $this->magic_vars['_A']['userinfo_result']['finance_amount'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_amount']; ?>" /> Ԫ
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">����������</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=finance_car&nid=user_finance_car&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_car'])) $this->magic_vars['_A']['userinfo_result']['finance_car'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_car']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">ÿ���������ҽ�</div>
				<div class="c">
					<input type="text" size="15" name="finance_caramount" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_caramount'])) $this->magic_vars['_A']['userinfo_result']['finance_caramount'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_caramount']; ?>" /> Ԫ
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">ÿ�����ÿ������</div>
				<div class="c">
					<input type="text" size="15" name="finance_creditcard" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['finance_creditcard'])) $this->magic_vars['_A']['userinfo_result']['finance_creditcard'] = ''; echo $this->magic_vars['_A']['userinfo_result']['finance_creditcard']; ?>" /> Ԫ
				</div>
			</div>
		</div>
		<!--����״�� ����-->
		
		<!--��ż���� ��ʼ-->
		<div id="user_info_menu_7" class="hide">
			
			<div class="module_border">
				<div class="w">��ס�ص绰��</div>
				<div class="c">
					<input type="text" size="20" name="tel" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel'])) $this->magic_vars['_A']['userinfo_result']['tel'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�ֻ����룺</div>
				<div class="c">
					<input type="text" size="20" name="phone" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone'])) $this->magic_vars['_A']['userinfo_result']['phone'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��ס����ʡ�У�</div>
				<div class="c">
					<script src="/plugins/index.php?q=area&area=<? if (!isset($this->magic_vars['_A']['userinfo_result']['area'])) $this->magic_vars['_A']['userinfo_result']['area'] = ''; echo $this->magic_vars['_A']['userinfo_result']['area']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">��ס���ʱࣺ</div>
				<div class="c">
					<input type="text" size="20" name="post" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['post'])) $this->magic_vars['_A']['userinfo_result']['post'] = ''; echo $this->magic_vars['_A']['userinfo_result']['post']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�־�ס��ַ��</div>
				<div class="c">
					<input type="text" size="20" name="address" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['address'])) $this->magic_vars['_A']['userinfo_result']['address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['address']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�ڶ���ϵ��������</div>
				<div class="c">
					<input type="text" size="20" name="linkman1" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['linkman1'])) $this->magic_vars['_A']['userinfo_result']['linkman1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['linkman1']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�ڶ���ϵ�˹�ϵ��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation1&nid=user_relation&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['relation1'])) $this->magic_vars['_A']['userinfo_result']['relation1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['relation1']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�ڶ���ϵ����ϵ�绰��</div>
				<div class="c">
					<input type="text" size="20" name="tel1" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel1'])) $this->magic_vars['_A']['userinfo_result']['tel1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel1']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">�ڶ���ϵ����ϵ�ֻ���</div>
				<div class="c">
					<input type="text" size="20" name="phone1" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone1'])) $this->magic_vars['_A']['userinfo_result']['phone1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone1']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ��������</div>
				<div class="c">
					<input type="text" size="20" name="linkman2" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['linkman2'])) $this->magic_vars['_A']['userinfo_result']['linkman2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['linkman2']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ�˹�ϵ��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation2&nid=user_relation&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['relation2'])) $this->magic_vars['_A']['userinfo_result']['relation2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['relation2']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ����ϵ�绰��</div>
				<div class="c">
					<input type="text" size="20" name="tel2" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel2'])) $this->magic_vars['_A']['userinfo_result']['tel2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel2']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ����ϵ�ֻ���</div>
				<div class="c">
					<input type="text" size="20" name="phone2" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone2'])) $this->magic_vars['_A']['userinfo_result']['phone2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone2']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ��������</div>
				<div class="c">
					<input type="text" size="20" name="linkman3" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['linkman3'])) $this->magic_vars['_A']['userinfo_result']['linkman3'] = ''; echo $this->magic_vars['_A']['userinfo_result']['linkman3']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ�˹�ϵ��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation3&nid=user_relation&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['relation3'])) $this->magic_vars['_A']['userinfo_result']['relation3'] = ''; echo $this->magic_vars['_A']['userinfo_result']['relation3']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ����ϵ�绰��</div>
				<div class="c">
					<input type="text" size="20" name="tel3" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['tel3'])) $this->magic_vars['_A']['userinfo_result']['tel3'] = ''; echo $this->magic_vars['_A']['userinfo_result']['tel3']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������ϵ����ϵ�ֻ���</div>
				<div class="c">
					<input type="text" size="20" name="phone3" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['phone3'])) $this->magic_vars['_A']['userinfo_result']['phone3'] = ''; echo $this->magic_vars['_A']['userinfo_result']['phone3']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">MSN��</div>
				<div class="c">
					<input type="text" size="20" name="msn" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['msn'])) $this->magic_vars['_A']['userinfo_result']['msn'] = ''; echo $this->magic_vars['_A']['userinfo_result']['msn']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">QQ��</div>
				<div class="c">
					<input type="text" size="20" name="qq" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['qq'])) $this->magic_vars['_A']['userinfo_result']['qq'] = ''; echo $this->magic_vars['_A']['userinfo_result']['qq']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">������</div>
				<div class="c">
					<input type="text" size="20" name="wangwang" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['wangwang'])) $this->magic_vars['_A']['userinfo_result']['wangwang'] = ''; echo $this->magic_vars['_A']['userinfo_result']['wangwang']; ?>" />
				</div>
			</div>
		</div>
		<!--��ż���� ����-->
		
		<!--��ż���� ��ʼ-->
		<div id="user_info_menu_8"  class="hide">
			
			<div class="module_border">
				<div class="l">��ż������</div>
				<div class="c">
					<input type="text" size="20" name="mate_name" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_name'])) $this->magic_vars['_A']['userinfo_result']['mate_name'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_name']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">ÿ��н��</div>
				<div class="c">
					<input type="text" size="20" name="mate_salary" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_salary'])) $this->magic_vars['_A']['userinfo_result']['mate_salary'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_salary']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">�ƶ��绰��</div>
				<div class="c">
					<input type="text" size="20" name="mate_phone" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_phone'])) $this->magic_vars['_A']['userinfo_result']['mate_phone'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_phone']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">��λ�绰��</div>
				<div class="c">
					<input type="text" size="20" name="mate_tel" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_tel'])) $this->magic_vars['_A']['userinfo_result']['mate_tel'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_tel']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">������λ��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=mate_type&nid=user_company_industry&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_type'])) $this->magic_vars['_A']['userinfo_result']['mate_type'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_type']; ?>"></script> 
				</div>
			</div>
			
			
			<div class="module_border">
				<div class="l">ְλ��</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=mate_office&nid=user_company_office&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_office'])) $this->magic_vars['_A']['userinfo_result']['mate_office'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_office']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">��λ��ַ��</div>
				<div class="c">
					<input type="text" size="20" name="mate_address" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_address'])) $this->magic_vars['_A']['userinfo_result']['mate_address'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_address']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">�����룺</div>
				<div class="c">
					<input type="text" size="20" name="mate_income" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['mate_income'])) $this->magic_vars['_A']['userinfo_result']['mate_income'] = ''; echo $this->magic_vars['_A']['userinfo_result']['mate_income']; ?>" />
				</div>
			</div>
			
		</div>
		<!--��ż���� ����-->
		
		<!--�������� ��ʼ-->
		<div id="user_info_menu_9"  class="hide">
			
			<div class="module_border">
				<div class="l">���ѧ����</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=education_record&nid=user_education&value=<? if (!isset($this->magic_vars['_A']['userinfo_result']['education_record'])) $this->magic_vars['_A']['userinfo_result']['education_record'] = ''; echo $this->magic_vars['_A']['userinfo_result']['education_record']; ?>"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">���ѧ��ѧУ��</div>
				<div class="c">
					<input type="text" size="20" name="education_school" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['education_school'])) $this->magic_vars['_A']['userinfo_result']['education_school'] = ''; echo $this->magic_vars['_A']['userinfo_result']['education_school']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">רҵ��</div>
				<div class="c">
					<input type="text" size="20" name="education_study" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['education_study'])) $this->magic_vars['_A']['userinfo_result']['education_study'] = ''; echo $this->magic_vars['_A']['userinfo_result']['education_study']; ?>" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">ʱ�䣺</div>
				<div class="c">
					<input type="text" size="20" name="education_time1" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['education_time1'])) $this->magic_vars['_A']['userinfo_result']['education_time1'] = ''; echo $this->magic_vars['_A']['userinfo_result']['education_time1']; ?>" onclick="change_picktime()" /> �� <input type="text" size="20" name="education_time2" value="<? if (!isset($this->magic_vars['_A']['userinfo_result']['education_time2'])) $this->magic_vars['_A']['userinfo_result']['education_time2'] = ''; echo $this->magic_vars['_A']['userinfo_result']['education_time2']; ?>" onclick="change_picktime()" /> 
				</div>
			</div>
		</div>
		<!--�������� ����-->
		
		<!--�������� ��ʼ-->
		<div id="user_info_menu_10" class="hide">
			
			<div class="module_border">
				<div class="l">����������</div>
				<div class="c">
					<textarea rows="7" cols="50" name="ability"><? if (!isset($this->magic_vars['_A']['userinfo_result']['ability'])) $this->magic_vars['_A']['userinfo_result']['ability'] = ''; echo $this->magic_vars['_A']['userinfo_result']['ability']; ?></textarea><br />���������������֯Э�������������� 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">���˰��ã�</div>
				<div class="c">
					<textarea rows="7" cols="50" name="interest"><? if (!isset($this->magic_vars['_A']['userinfo_result']['interest'])) $this->magic_vars['_A']['userinfo_result']['interest'] = ''; echo $this->magic_vars['_A']['userinfo_result']['interest']; ?></textarea><br />��ͻ���Լ��ĸ��ԣ�����̬�Ȼ����˶��Լ������۵ȣ�
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">����˵����</div>
				<div class="c">
					<textarea rows="7" cols="50" name="others"><? if (!isset($this->magic_vars['_A']['userinfo_result']['others'])) $this->magic_vars['_A']['userinfo_result']['others'] = ''; echo $this->magic_vars['_A']['userinfo_result']['others']; ?></textarea><br />
					
				</div>
			</div>
		</div>
		<!--�������� ����-->
		
		<!--������Ϣ ��ʼ-->
		<div id="user_info_menu_11" class="hide">
			
			<div class="module_border">
				<div class="l">����������</div>
				<div class="c">
					<textarea rows="7" cols="50" name="ability"><? if (!isset($this->magic_vars['_A']['userinfo_result']['ability'])) $this->magic_vars['_A']['userinfo_result']['ability'] = ''; echo $this->magic_vars['_A']['userinfo_result']['ability']; ?></textarea><br />���������������֯Э�������������� 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">���˰��ã�</div>
				<div class="c">
					<textarea rows="7" cols="50" name="interest"><? if (!isset($this->magic_vars['_A']['userinfo_result']['interest'])) $this->magic_vars['_A']['userinfo_result']['interest'] = ''; echo $this->magic_vars['_A']['userinfo_result']['interest']; ?></textarea><br />��ͻ���Լ��ĸ��ԣ�����̬�Ȼ����˶��Լ������۵ȣ�
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">����˵����</div>
				<div class="c">
					<textarea rows="7" cols="50" name="others"><? if (!isset($this->magic_vars['_A']['userinfo_result']['others'])) $this->magic_vars['_A']['userinfo_result']['others'] = ''; echo $this->magic_vars['_A']['userinfo_result']['others']; ?></textarea><br />
				</div>
			</div>
		</div>
		<!--������Ϣ ����-->
	</div>
	<div class="module_submit" >
		<input type="hidden"  name="user_id" value="<? if (!isset($_REQUEST['id'])) $_REQUEST['id'] = ''; echo $_REQUEST['id']; ?>" />
		<input type="submit"  name="submit" value="ȷ���ύ" />
		<input type="reset"  name="reset" value="���ñ�" />
	</div>
	</form>
	
	
	<? endif; ?>
</div>

<script>
change_menu_tab("user_info_menu");

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

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view"): ?>
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>֤���鿴</strong></div>

	<div class="module_border">
		<div class="l">�û�����</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['attestation_result']['username'])) $this->magic_vars['_A']['attestation_result']['username'] = ''; echo $this->magic_vars['_A']['attestation_result']['username']; ?>
		</div>
	</div>


	<div class="module_border">
		<div class="l">������Ŀ��</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['attestation_result']['type_name'])) $this->magic_vars['_A']['attestation_result']['type_name'] = ''; echo $this->magic_vars['_A']['attestation_result']['type_name']; ?>
		</div>
	</div>


	<div class="module_border">
		<div class="l">֤��ͼƬ��</div>
		<div class="c">
			<a href="<? if (!isset($this->magic_vars['_A']['attestation_result']['litpic'])) $this->magic_vars['_A']['attestation_result']['litpic'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['litpic'];$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" ><img src="<? if (!isset($this->magic_vars['_A']['attestation_result']['litpic'])) $this->magic_vars['_A']['attestation_result']['litpic'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['litpic'];$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" width="100" height="100" /></a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">���:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['attestation_result']['content'])) $this->magic_vars['_A']['attestation_result']['content'] = ''; echo $this->magic_vars['_A']['attestation_result']['content']; ?></div>
	</div>

	<div class="module_border">
		<div class="l">���ʱ��/IP:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['attestation_result']['addtime'])) $this->magic_vars['_A']['attestation_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['attestation_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?>/<? if (!isset($this->magic_vars['_A']['attestation_result']['addip'])) $this->magic_vars['_A']['attestation_result']['addip'] = ''; echo $this->magic_vars['_A']['attestation_result']['addip']; ?></div>
	</div>
	
	
	<div class="module_title"><strong>��˴�֤��</strong></div>
	
	<div class="module_border">
		<div class="l">״̬:</div>
		<div class="c">
		<input type="radio" name="status" value="0" <? if (!isset($this->magic_vars['_A']['attestation_result']['status'])) $this->magic_vars['_A']['attestation_result']['status']=''; ;if (  $this->magic_vars['_A']['attestation_result']['status']==0): ?> checked="checked"<? endif; ?> />�ȴ����  <input type="radio" name="status" value="1" <? if (!isset($this->magic_vars['_A']['attestation_result']['status'])) $this->magic_vars['_A']['attestation_result']['status']=''; ;if (  $this->magic_vars['_A']['attestation_result']['status']==1): ?> checked="checked"<? endif; ?>/>���ͨ�� <input type="radio" name="status" value="2" <? if (!isset($this->magic_vars['_A']['attestation_result']['status'])) $this->magic_vars['_A']['attestation_result']['status']=''; ;if (  $this->magic_vars['_A']['attestation_result']['status']==2): ?> checked="checked"<? endif; ?>/>��˲�ͨ�� </div>
	</div>
	
	<div class="module_border" >
		<div class="l">ͨ����Ӧ�Ļ���:</div>
		<div class="c">
			<input type="text" name="jifen" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['jifen'])) $this->magic_vars['_A']['attestation_result']['jifen'] = ''; echo $this->magic_vars['_A']['attestation_result']['jifen']; ?>" size="5">
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">��˱�ע:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['attestation_result']['verify_remark'])) $this->magic_vars['_A']['attestation_result']['verify_remark'] = ''; echo $this->magic_vars['_A']['attestation_result']['verify_remark']; ?></textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['attestation_result']['id'])) $this->magic_vars['_A']['attestation_result']['id'] = ''; echo $this->magic_vars['_A']['attestation_result']['id']; ?>" />
		
		<input type="submit"  name="reset" value="��˴�֤��" />
	</div>
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
			<td width="*" class="main_td">�û�����</td>
			<td width="" class="main_td">��������</td>
			<td width="" class="main_td">��λ����</td>
			<td width="" class="main_td">˽Ӫҵ������</td>
			<td width="" class="main_td">����״��</td>
			<td width="" class="main_td">��ϵ��ʽ</td>
			<td width="" class="main_td">��ż����</td>
			<td width="" class="main_td">��������</td>
			<td width="" class="main_td">������Ϣ</td>
			<td width="" class="main_td">����</td>
		</tr>
		<?  if(!isset($this->magic_vars['_A']['userinfo_list']) || $this->magic_vars['_A']['userinfo_list']=='') $this->magic_vars['_A']['userinfo_list'] = array();  $_from = $this->magic_vars['_A']['userinfo_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
		<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
			<td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['building_status'])) $this->magic_vars['item']['building_status']=''; ;if (  $this->magic_vars['item']['building_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['company_status'])) $this->magic_vars['item']['company_status']=''; ;if (  $this->magic_vars['item']['company_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['firm_status'])) $this->magic_vars['item']['firm_status']=''; ;if (  $this->magic_vars['item']['firm_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['finance_status'])) $this->magic_vars['item']['finance_status']=''; ;if (  $this->magic_vars['item']['finance_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['contact_status'])) $this->magic_vars['item']['contact_status']=''; ;if (  $this->magic_vars['item']['contact_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['mate_status'])) $this->magic_vars['item']['mate_status']=''; ;if (  $this->magic_vars['item']['mate_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['edu_status'])) $this->magic_vars['item']['edu_status']=''; ;if (  $this->magic_vars['item']['edu_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><? if (!isset($this->magic_vars['item']['job_status'])) $this->magic_vars['item']['job_status']=''; ;if (  $this->magic_vars['item']['job_status']==1): ?>��Ϣ����<? else: ?>��Ϣ������<? endif; ?></td>
			<td class="main_td1" align="center" ><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/new&id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?><? if (!isset($this->magic_vars['_A']['site_url'])) $this->magic_vars['_A']['site_url'] = ''; echo $this->magic_vars['_A']['site_url']; ?>">�޸�</a> </td>
		</tr>
		<? endforeach; endif; unset($_from); ?>
		<tr>
		<td colspan="15" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			�û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';$_tmp = $_REQUEST['username'];$_tmp = $this->magic_modifier("urldecode",$_tmp,"");echo $_tmp;unset($_tmp); ?>"/> ״̬<select id="status" ><option value="">ȫ��</option><option value="1" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']==1): ?> selected="selected"<? endif; ?>>��ͨ��</option><option value="0" <? if (!isset($_REQUEST['status'])) $_REQUEST['status']=''; ;if (  $_REQUEST['status']=="0"): ?> selected="selected"<? endif; ?>>δͨ��</option></select> <input type="button" value="����" / onclick="sousuo()">
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
		sou += "&username="+encodeURI(username);
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