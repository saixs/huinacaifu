<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $_REQUEST['type']=="fast" and  $this->magic_vars['_G']['user_result']['phone_status']!=1): ?>
     <script>
	   alert("�Բ���,���Ƚ����ֻ���֤");
	   location.href='/index.php?user&q=code/user/phone_status';
     </script>
<? endif; ?>

<STYLE> 
P
{
	margin-top: 0em;
	margin-bottom: 1em;
}
LI
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
.red
{
	height: 20px;
	color: #8f0600;
	font-size: 16px;
	font-weight: bold;
}
.Way
{
	margin: 5px 0px 0px 25px;
	width: 60px;
	float: left;
}
A
{
	color: #666;
	text-decoration: none;
}
UL
{
	padding-bottom: 0px;
	list-style-type: none;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	display: block;
	padding-top: 0px;
}
LI
{
	padding-bottom: 0px;
	list-style-type: none;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	display: block;
	padding-top: 0px;
}
BODY
{
	line-height: 22px;
	margin: 0px;
	width: 100%;
	font-family: ����,Verdana, Tahoma, sans-serif, Arial, Helvetica;
	height: 100%;
	color: #666;
	font-size: 12px;
}
FORM
{
	line-height: 22px;
	margin: 0px;
	width: 100%;
	font-family: ����,Verdana, Tahoma, sans-serif, Arial, Helvetica;
	height: 100%;
	color: #666;
	font-size: 12px;
}
.kuang2
{
	width: 130px;
	float: left;
}
BODY
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
P
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
UL
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
LI
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
FORM
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
INPUT
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
TEXTAREA
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
DIV
{
	padding-bottom: 0px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
BODY
{
	font: 12px/1.5 '����', Arial, helvetica, sans-serif;
}
INPUT
{
	font: 12px/1.5 '����', Arial, helvetica, sans-serif;
}
SELECT
{
	font: 12px/1.5 '����', Arial, helvetica, sans-serif;
}
TEXTAREA
{
	font: 12px/1.5 '����', Arial, helvetica, sans-serif;
}
INPUT
{
	vertical-align: middle;
}
SELECT
{
	vertical-align: middle;
}
B
{
	font-style: normal;
	font-weight: normal;
}
UL
{
	padding-bottom: 0px;
	list-style-type: none;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
LI
{
	padding-bottom: 0px;
	list-style-type: none;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-top: 0px;
}
A
{
	outline-style: none;
	color: #333;
	text-decoration: none;
}
.clear
{
	height: 0px;
	clear: both;
	overflow: hidden;
}
.height
{
	height: 10px;
	overflow: hidden;
}
.content
{
	position: relative;
	margin: 0px auto;
	width: 980px;
}
.red
{
	color: #f00;
}
.sqdk UL.tab_menu
{
	margin-left: 10px;
}
.sqdk UL.tab_menu LI
{
	line-height: 28px;
	display: block;
	float: left;
	height: 28px;
}
.sqdk UL.tab_menu LI A
{
	line-height: 28px;
	display: block;
	float: left;
	height: 28px;
}
.sqdk UL.tab_menu LI A
{
	border-bottom: #b4b4b4 1px;
	position: relative;
	border-left: #b4b4b4 1px solid;
	padding-bottom: 0px;
	padding-left: 7px;
	padding-right: 7px;
	background: #f0f0f0;
	color: #666;
	border-top: #b4b4b4 1px solid;
	top: -1px;
	font-weight: bold;
	margin-right: 3px;
	border-right: #b4b4b4 1px solid;
	padding-top: 0px;
	_top: 0px;
}
.sqdk UL.tab_menu LI.dq A
{
	border-bottom: #be2800 1px;
	border-left: #be2800 1px solid;
	background-color: #fff;
	color: #be2800;
	border-top: #be2800 1px solid;
	top: 0px;
	border-right: #be2800 1px solid;
	_top: 1px;
}
.sqdk .sq_cont
{
	border-top: #be2800 1px solid;
}
.border
{
	border-bottom: #b4b4b4 1px solid;
	border-left: #b4b4b4 1px solid;
	padding-bottom: 5px;
	padding-left: 5px;
	padding-right: 5px;
	height: 1%;
	border-top: #b4b4b4 1px;
	border-right: #b4b4b4 1px solid;
	padding-top: 5px;
}
.sqdk .sq_cont
{
	color: #555;
}
.sqdk .sq_cont LI
{
	clear: both;
}
.sqdk .sq_cont LI P
{
	margin: 7px 0px;
	float: left;
}
.sqdk .sq_cont LI P B
{
	font-size: 12px;
	font-weight: normal;
}
.sqdk .sq_cont LI P.no_1
{
	text-align: right;
	width: 100px;
}
.sqdk .sq_cont LI P TEXTAREA
{
	border-bottom: #b4b4b4 1px solid;
	border-left: #b4b4b4 1px solid;
	width: 300px;
	height: 80px;
	border-top: #b4b4b4 1px solid;
	border-right: #b4b4b4 1px solid;
}
.sqdk .sq_cont LI P.diqu
{
	margin-top: -4px;
}
.WayArea
{
	margin: 0px 40px 0px 10px;
}
 
</STYLE>
<script type="text/javascript">
 function change(obj){
 		if($(obj).attr("id")=="qiye"){
			$(obj).parent("li").addClass("dq");
			$("#geren").parent("li").removeClass("dq");
			$("#isqiye").val("1");
			$("#gerenz").hide("");
			$("#qiyeh").show("");
		}else if($(obj).attr("id")=="geren"){
			$(obj).parent("li").addClass("dq");
			$("#qiye").parent("li").removeClass("dq");
			$("#isqiye").val("0");
			$("#qiyeh").hide("");
			$("#gerenz").show("");
		}
 }

</script>
<script type="text/javascript">
 function changediya(){
                var itype=$('input:radio[name="Mortgage"]:checked').val();
 		if(itype=="��"){
			$("#cbdiya").css("display","none");

		}else{
			$("#cbdiya").css("display","block");

		}
 }

</script>
<FORM id="aspnetForm" method="post" name="aspnetForm" action="">
<input type="hidden" name="isqiye" id="isqiye" value="0" />
<DIV>
<DIV class="content">
<DIV class="height">
</DIV>
<!--����״̬����-->
<DIV class="sqdk">
<UL class="tab_menu">
<LI class="dq">
<A href="javascript:;" id="geren" onclick="change(this);">����������</A> 
</LI>
<LI>
<A href="javascript:;" id="qiye" onclick="change(this);">��ҵ������</A> 
</LI>
</UL>
<DIV class="clear">
</DIV>
<DIV class="sq_cont border">
<UL>
<LI>
<P class="no_1 diqu">
<SPAN class="red">*</SPAN> ���ڵ�����
</P>
<SPAN style="FLOAT: left">
<STYLE> 
.WayArea {
MARGIN: 0px 40px 0px 10px
}
</STYLE>
<DIV id="AreaSelect1_UpdatePanel1" style="color:#FF0000">ע�⣬������Ȩ��----------���ؼ��ܱߵ���</DIV>
</SPAN>
</LI>
<LI>
<P class="no_1">
�����;��
</P>
<P>
<INPUT id="cbEntrepreneurship" type="checkbox" name="yongtu[]" value="��ҵ" /><LABEL for="cbEntrepreneurship">��ҵ</LABEL> <INPUT id="cbPurchase" type="checkbox" name="yongtu[]" value="����" /><LABEL for="cbPurchase">����</LABEL> <INPUT id="cbCar" type="checkbox" name="yongtu[]" value="��" /><LABEL for="cbCar">��</LABEL> <INPUT id="cbManagement" type="checkbox" name="yongtu[]" value="��Ӫ" /><LABEL for="cbManagement">��Ӫ</LABEL> <INPUT id="cbRenovation" type="checkbox" name="yongtu[]" value="װ��" /><LABEL for="cbRenovation">װ��</LABEL> <INPUT id="cbWedding" type="checkbox" name="yongtu[]" value="���" /><LABEL for="cbWedding">���</LABEL> <INPUT id="cbTraveling" type="checkbox" name="yongtu[]" value="����" /><LABEL for="cbTraveling">����</LABEL> <INPUT id="cbShopping" type="checkbox" name="yongtu[]" value="����" /><LABEL for="cbShopping">����</LABEL> <INPUT id="cbSchool" type="checkbox" name="yongtu[]" value="��ѧ" /><LABEL for="cbSchool">��ѧ</LABEL> <INPUT id="cbOther" type="checkbox" name="yongtu[]" value="����" /><LABEL for="cbOther">����</LABEL> 
</P>
</LI>
<LI>
<P class="no_1">
<SPAN class="red">*</SPAN> ���޵�Ѻ��
</P>
<P>
<INPUT id="rbYes" type="radio" name="Mortgage" value="��" onclick="changediya();"/><LABEL for="rbYes">��</LABEL> <INPUT id="rbNo" type="radio" name="Mortgage" value="��" onclick="changediya();"/><LABEL for="rbNo">��</LABEL> 
</P>
</LI>
<LI>
<P class="no_1"><SPAN class="red">*</SPAN> ��Ѻ�</P>
<P id="cbdiya">
<INPUT id="cbCollateralHouse" type="checkbox" name="diya[]" value="����" /><LABEL for="cbCollateralHouse">����</LABEL> <INPUT id="cbCollateralCar" type="checkbox" name="diya[]" value="����" /><LABEL for="cbCollateralCar">����</LABEL> <INPUT id="cbCollateralNegotiable" type="checkbox" name="diya[]" value="�м�֤ȯ" /><LABEL for="cbCollateralNegotiable">�м�֤ȯ</LABEL> <INPUT id="cbCollateralOther" type="checkbox" name="diya[]" value="����" /><LABEL for="cbCollateralOther">����</LABEL>
</P>
</LI>
<LI id="gerenz">
<P class="no_1">
<SPAN class="red">*</SPAN> �������ϣ�
</P>
<P>
<SELECT id="ddlAge" name="ddlAge"> <OPTION value="��������">��������</OPTION> <OPTION value="22������">22������</OPTION> <OPTION value="22-30��">22-30��</OPTION> <OPTION value="31-40��">31-40��</OPTION> <OPTION value="41-50��">41-50��</OPTION> <OPTION value="50������">50������</OPTION></SELECT> - <SELECT id="ddlOccupation" name="ddlOccupation"> <OPTION value="-999">��ѡ������ְҵ</OPTION> <OPTION value="�����ܼ�">�����ܼ�</OPTION> <OPTION value="��������">��������</OPTION> <OPTION value="���/˰��">���/˰��</OPTION> <OPTION value="����/�ɱ�">����/�ɱ�</OPTION> <OPTION value="�����Ա">�����Ա</OPTION> <OPTION value="������Դ�ܼ�">������Դ�ܼ�</OPTION> <OPTION value="������Դ����/����">������Դ����/����</OPTION> <OPTION value="��Ƹ����/����">��Ƹ����/����</OPTION> <OPTION value="н�ʸ�������/����">н�ʸ�������/����</OPTION> <OPTION value="������">������</OPTION> <OPTION value="��ѵ����/����">��ѵ����/����</OPTION> <OPTION value="����רԱ/����">����רԱ/����</OPTION> <OPTION value="�г�/���г�">�г�/���г�</OPTION> <OPTION value="�Ŵ�/���ù���">�Ŵ�/���ù���</OPTION> <OPTION value="�ʲ�����/����">�ʲ�����/����</OPTION> <OPTION value="Ͷ������Ŀ/����">Ͷ������Ŀ/����</OPTION> <OPTION value="������/���ʽ���">������/���ʽ���</OPTION> <OPTION value="���չ���">���չ���</OPTION> <OPTION value="֤ȯ/�ڻ�">֤ȯ/�ڻ�</OPTION> <OPTION value="�ͻ�����/����">�ͻ�����/����</OPTION> <OPTION value="�˱�/����">�˱�/����</OPTION> <OPTION value="���մ�����/����">���մ�����/����</OPTION> <OPTION value="����רԱ/��̨">����רԱ/��̨</OPTION> <OPTION value="����ʦ">����ʦ</OPTION> <OPTION value="�༭/����/�İ�">�༭/����/�İ�</OPTION> <OPTION value="�������">�������</OPTION> <OPTION value="ƽ�����">ƽ�����</OPTION> <OPTION value="װ��/�������">װ��/�������</OPTION> <OPTION value="��֯/��װ���">��֯/��װ���</OPTION> <OPTION value="����Ʒ/�鱦���">����Ʒ/�鱦���</OPTION> <OPTION value="����">����</OPTION> <OPTION value="����">����</OPTION> <OPTION value="���﹤��">���﹤��</OPTION> <OPTION value="ҩ��ע��">ҩ��ע��</OPTION> <OPTION value="�ٴ��о�/Э��">�ٴ��о�/Э��</OPTION> <OPTION value="ҩ���з�/��������ʦ">ҩ���з�/��������ʦ</OPTION> <OPTION value="��ѧ����ʦ">��ѧ����ʦ</OPTION> <OPTION value="��������ʦ">��������ʦ</OPTION> <OPTION value="������Ա">������Ա</OPTION> <OPTION value="�ṹ/��������ʦ">�ṹ/��������ʦ</OPTION> <OPTION value="��������ʦ/����ʦ">��������ʦ/����ʦ</OPTION> <OPTION value="����/����ˮ/ůͨ����ʦ">����/����ˮ/ůͨ����ʦ</OPTION> <OPTION value="�������ʦ/Ԥ����">�������ʦ/Ԥ����</OPTION> <OPTION value="����/��ȫ����ʦ">����/��ȫ����ʦ</OPTION> <OPTION value="���ز�����/�߻�">���ز�����/�߻�</OPTION> <OPTION value="԰�־���/���й滮ʦ">԰�־���/���й滮ʦ</OPTION> <OPTION value="��ҵ����">��ҵ����</OPTION> <OPTION value="���ز�����/�н�/����">���ز�����/�н�/����</OPTION> <OPTION value="����/��·����ʦ">����/��·����ʦ</OPTION> <OPTION value="��������ʦ">��������ʦ</OPTION> <OPTION value="�뵼�幤��ʦ">�뵼�幤��ʦ</OPTION> <OPTION value="���Թ���ʦ">���Թ���ʦ</OPTION> <OPTION value="�Զ�������ʦ">�Զ�������ʦ</OPTION> <OPTION value="��ѧ����ʦ">��ѧ����ʦ</OPTION> <OPTION value="��������ʦ">��������ʦ</OPTION> <OPTION value="ˮ��/ˮ�繤��ʦ">ˮ��/ˮ�繤��ʦ</OPTION> <OPTION value="��Ƭ��/DLC/DSP/�ײ���������">��Ƭ��/DLC/DSP/�ײ���������</OPTION> <OPTION value="��������ʦ">��������ʦ</OPTION> <OPTION value="������Ա">������Ա</OPTION> <OPTION value="����">����</OPTION> <OPTION value="����/������">����/������</OPTION> <OPTION value="��������/��������">��������/��������</OPTION> <OPTION value="��Ʒ����">��Ʒ����</OPTION> <OPTION value="��ҵ/��Ʒ���">��ҵ/��Ʒ���</OPTION> <OPTION value="����/�ƻ�/����">����/�ƻ�/����</OPTION> <OPTION value="��������">��������</OPTION> <OPTION value="��Ŀ����">��Ŀ����</OPTION> <OPTION value="�����豸����">�����豸����</OPTION> <OPTION value="��ȫ/����/��������">��ȫ/����/��������</OPTION> <OPTION value="��������/����">��������/����</OPTION> <OPTION value="����">����</OPTION> <OPTION value="��е����ʦ">��е����ʦ</OPTION> <OPTION value="ά�޹���ʦ">ά�޹���ʦ</OPTION> <OPTION value="��е���/��ͼ">��е���/��ͼ</OPTION> <OPTION value="���繤��ʦ">���繤��ʦ</OPTION> <OPTION value="ģ�߹���ʦ">ģ�߹���ʦ</OPTION> <OPTION value="���ܻ�е/�����Ǳ�">���ܻ�е/�����Ǳ�</OPTION> <OPTION value="��������ʦ">��������ʦ</OPTION> <OPTION value="��ѹ/ע��/����">��ѹ/ע��/����</OPTION> <OPTION value="����/���ֹ���">����/���ֹ���</OPTION> <OPTION value="�Ƶ�/���ݹ���">�Ƶ�/���ݹ���</OPTION> <OPTION value="������Ա/���">������Ա/���</OPTION> <OPTION value="����/���й���/Ʊ��">����/���й���/Ʊ��</OPTION> <OPTION value="ӪҵԱ/����Ա">ӪҵԱ/����Ա</OPTION> <OPTION value="�����ܼ�/��ϯ����ִ�й�">�����ܼ�/��ϯ����ִ�й�</OPTION> <OPTION value="��������">��������</OPTION> <OPTION value="��Ŀ����">��Ŀ����</OPTION> <OPTION value="ϵͳ��������ʦ">ϵͳ��������ʦ</OPTION> <OPTION value="ERPӦ�ù���">ERPӦ�ù���</OPTION> <OPTION value="���ݿ⹤��ʦ/����Ա">���ݿ⹤��ʦ/����Ա</OPTION> <OPTION value="������������ʦ">������������ʦ</OPTION> <OPTION value="Ӳ����������ʦ">Ӳ����������ʦ</OPTION> <OPTION value="��Ϣ֧��/��ȫά��">��Ϣ֧��/��ȫά��</OPTION> <OPTION value="��ҳ���/�༭">��ҳ���/�༭</OPTION> <OPTION value="ͨѶ����ʦ">ͨѶ����ʦ</OPTION> <OPTION value="��ý��/��Ϸ����">��ý��/��Ϸ����</OPTION> <OPTION value="�ɹ�����/����">�ɹ�����/����</OPTION> <OPTION value="�ɹ�רԱ/����">�ɹ�רԱ/����</OPTION> <OPTION value="ó�׾���/����">ó�׾���/����</OPTION> <OPTION value="�г���ѯ/����">�г���ѯ/����</OPTION> <OPTION value="������߻�">������߻�</OPTION> <OPTION value="�ͷ�����/����">�ͷ�����/����</OPTION> <OPTION value="�ͷ�רԱ/����">�ͷ�רԱ/����</OPTION> <OPTION value="�ͻ���ϵ����">�ͻ���ϵ����</OPTION> <OPTION value="�ͻ���ѯ/����֧��">�ͻ���ѯ/����֧��</OPTION> <OPTION value="�����ܼ�">�����ܼ�</OPTION> <OPTION value="���۾���">���۾���</OPTION> <OPTION value="����/��������">����/��������</OPTION> <OPTION value="ҵ����չ����">ҵ����չ����</OPTION> <OPTION value="��������/����">��������/����</OPTION> <OPTION value="��ǰ/�ۺ�֧��">��ǰ/�ۺ�֧��</OPTION> <OPTION value="���۹���ʦ">���۹���ʦ</OPTION> <OPTION value="���۴���">���۴���</OPTION> <OPTION value="ҽҩ����">ҽҩ����</OPTION> <OPTION value="��������">��������</OPTION> <OPTION value="רҵ����">רҵ����</OPTION> <OPTION value="��ѯʦ">��ѯʦ</OPTION> <OPTION value="����Ա">����Ա</OPTION> <OPTION value="Ӣ�﷭��">Ӣ�﷭��</OPTION> <OPTION value="���﷭��">���﷭��</OPTION> <OPTION value="���﷭��">���﷭��</OPTION> <OPTION value="���﷭��">���﷭��</OPTION> <OPTION value="���﷭��">���﷭��</OPTION> <OPTION value="�������﷭��">�������﷭��</OPTION> <OPTION value="��������">��������</OPTION> <OPTION value="����/�ܾ���/�ܲ�">����/�ܾ���/�ܲ�</OPTION> <OPTION value="��ϯִ�й�/��Ӫ��">��ϯִ�й�/��Ӫ��</OPTION> <OPTION value="Ӫ���ܼ�/����">Ӫ���ܼ�/����</OPTION> <OPTION value="�ϻ���">�ϻ���</OPTION> <OPTION value="�����ܼ�">�����ܼ�</OPTION> <OPTION value="��������">��������</OPTION> <OPTION value="����/����">����/����</OPTION> <OPTION value="����/����">����/����</OPTION> <OPTION value="ǰ̨/��Ա">ǰ̨/��Ա</OPTION> <OPTION value="��������/����">��������/����</OPTION> <OPTION value="����רԱ/����">����רԱ/����</OPTION> <OPTION value="����/�ֿ����">����/�ֿ����</OPTION> <OPTION value="��Ӧ��">��Ӧ��</OPTION> <OPTION value="����/���˲���">����/���˲���</OPTION> <OPTION value="��֤/����Ա">��֤/����Ա</OPTION> <OPTION value="��ʦ/����">��ʦ/����</OPTION> <OPTION value="��Դ/����">��Դ/����</OPTION> <OPTION value="ҽ��/����">ҽ��/����</OPTION> <OPTION value="������Ա">������Ա</OPTION> <OPTION value="��ѵ/����">��ѵ/����</OPTION> <OPTION value="�����ɲ�/��ѵ��">�����ɲ�/��ѵ��</OPTION> <OPTION value="��Уѧ��">��Уѧ��</OPTION> <OPTION value="����ְλ">����ְλ</OPTION> <OPTION value="����ְλ">����ְλ</OPTION></SELECT> - <SELECT id="ddlInCome" name="ddlInCome"> <OPTION value="-999">��ѡ����������</OPTION> <OPTION value="1000Ԫ����">1000Ԫ����</OPTION> <OPTION value="2001-3000Ԫ">2001-3000Ԫ</OPTION> <OPTION value="3001-4000Ԫ">3001-4000Ԫ</OPTION> <OPTION value="4001-5000Ԫ">4001-5000Ԫ</OPTION> <OPTION value="5001-8000Ԫ">5001-8000Ԫ</OPTION> <OPTION value="8001-10000Ԫ">8001-10000Ԫ</OPTION> <OPTION value="10001-30000Ԫ">10001-30000Ԫ</OPTION> <OPTION value="30001-50000Ԫ">30001-50000Ԫ</OPTION> <OPTION value="50000Ԫ����">50000Ԫ����</OPTION> <OPTION value="1001-2000Ԫ">1001-2000Ԫ</OPTION></SELECT> 
</P>
</LI>

<LI id="qiyeh" style="display:none">
<P class="no_1">
<SPAN class="red">*</SPAN> ������ҵ��
</P>
<P>
<SELECT id="ddlIndustry" name="ddlIndustry"> <OPTION value="-999">��ѡ������ҵ��������ҵ</OPTION> <OPTION value="ũ���֡�������ҵ">ũ���֡�������ҵ</OPTION> <OPTION value="����ҵ">����ҵ</OPTION> <OPTION value="������ȼ����ˮ�������͹�Ӧҵ">������ȼ����ˮ�������͹�Ӧҵ</OPTION> <OPTION value="����ҵ">����ҵ</OPTION> <OPTION value="��ͨ���䡢�ִ�������ҵ">��ͨ���䡢�ִ�������ҵ</OPTION> <OPTION value="��Ϣ���䡢��������������ҵ">��Ϣ���䡢��������������ҵ</OPTION> <OPTION value="����������ҵ">����������ҵ</OPTION> <OPTION value="����ҵ">����ҵ</OPTION> <OPTION value="���ز�ҵ">���ز�ҵ</OPTION> <OPTION value="�ɿ�ҵ">�ɿ�ҵ</OPTION> <OPTION value="���޺��������ҵ">���޺��������ҵ</OPTION> <OPTION value="��ѧ�о�����������͵��ʿ���ҵ">��ѧ�о�����������͵��ʿ���ҵ</OPTION> <OPTION value="ˮ���������͹�����ʩ����ҵ">ˮ���������͹�����ʩ����ҵ</OPTION> <OPTION value="����������������ҵ">����������������ҵ</OPTION> <OPTION value="����">����</OPTION> <OPTION value="��������ᱣ�Ϻ���ḣ��ҵ">��������ᱣ�Ϻ���ḣ��ҵ</OPTION> <OPTION value="�Ļ�������������ҵ">�Ļ�������������ҵ</OPTION> <OPTION value="���������������֯">���������������֯</OPTION> <OPTION value="������֯">������֯</OPTION></SELECT> 
</P>
</LI>


<LI>
<P class="no_1">
<SPAN class="red">*</SPAN> ��ҵ���ܣ�
</P>
<P>
<SELECT id="ddlTurnover" name="ddlTurnover"> <OPTION value="-999">��Ӫҵ��</OPTION> <OPTION value="100������">100������</OPTION> <OPTION value="100��-500��">100��-500��</OPTION> <OPTION value="500��-2000��">500��-2000��</OPTION> <OPTION value="2000��-1��">2000��-1��</OPTION> <OPTION value="1������">1������</OPTION></SELECT> - <SELECT id="ddlStaff" name="ddlStaff"> <OPTION value="-999">Ա������</OPTION> <OPTION value="20������">20������</OPTION> <OPTION value="20-49��">20-49��</OPTION> <OPTION value="50-99��">50-99��</OPTION> <OPTION value="100-49��">100-49��</OPTION> <OPTION value="500������">500������</OPTION></SELECT> 
</P>
</LI>
<LI>
<P class="no_1">
���˵����
</P>
<P>
<TEXTAREA style="WIDTH: 342px; HEIGHT: 94px" id="txtRemark" name="txtRemark"></TEXTAREA> 
</P>
</LI>
<LI>
<P class="no_1">
<SPAN class="red">*</SPAN> ��ϵ�ˣ�
</P>
<P>
<INPUT id="txtContact" name="txtContact" value="" /> 
</P>
</LI>
<LI>
<P class="no_1">
<SPAN class="red">*</SPAN> �Ա�
</P>
<P>
<INPUT id="rbBoy" CHECKED type="radio" name="Sex" value="��" /><LABEL for="rbBoy">��</LABEL> <INPUT id="rbGirl" type="radio" name="Sex" value="Ů" /><LABEL for="rbGirl">Ů</LABEL>
</P>
</LI>
<LI>
<P class="no_1">
<SPAN class="red">*</SPAN> ��ϵ�绰��
</P>
<P>
<INPUT id="txtTelephone" name="txtTelephone" value="" /> 
</P>
</LI>
<LI>
<P class="no_1">
&nbsp;&nbsp;&nbsp;
</P>
<P>
<INPUT id="btnOK" type="submit" name="btnOK" value="�ύ����" /> 
</P>
<DIV class="clear">
</DIV>
</LI>
</UL>
</DIV>
</DIV>
<!--Ͷ�����̽���-->
<DIV class="height">
</DIV>
</DIV>
 
</DIV></FORM>


<? $this->magic_include(array('file' => "footer.html", 'vars' => array()));?>