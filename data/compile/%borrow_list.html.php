<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>

<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/css.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/index.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />

<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/style.css" rel="stylesheet" type="text/css" />

 


<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/base.js"></script>
<script src="/plugins/timepicker/WdatePicker.js" type="text/javascript"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/tipswindown.js"></script>

<script charset="utf-8" src="/plugins/editor/kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/plugins/editor/kindeditor/lang/zh_CN.js"></script>
		
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});
				K('input[name=getHtml]').click(function(e) {
					alert(editor.html());
				});
				K('input[name=isEmpty]').click(function(e) {
					alert(editor.isEmpty());
				});
				K('input[name=getText]').click(function(e) {
					alert(editor.text());
				});
				K('input[name=selectedHtml]').click(function(e) {
					alert(editor.selectedHtml());
				});
				K('input[name=setHtml]').click(function(e) {
					editor.html('<h3>Hello KindEditor</h3>');
				});
				K('input[name=setText]').click(function(e) {
					editor.text('<h3>Hello KindEditor</h3>');
				});
				K('input[name=insertHtml]').click(function(e) {
					editor.insertHtml('<strong>����HTML</strong>');
				});
				K('input[name=appendHtml]').click(function(e) {
					editor.appendHtml('<strong>���HTML</strong>');
				});
				K('input[name=clear]').click(function(e) {
					editor.html('');
				});
			});
		</script>
		
<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_id']==""): ?>
<script>
	alert("�㻹û�е�¼�����ȵ�¼");
	location.href='/index.php?user&q=action/login';
</script>
<? endif; ?>
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;if (  $_REQUEST['type']=="vouch" and  $this->magic_vars['_G']['user_result']['scene_status']!=1): ?>
<script>
	alert("�Բ��������˻���ʱ���߱������������ʸ�����ͷ���ϵ���뷢���ʸ�");
	location.href='/';
</script>
<? endif; ?>
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;if (  $_REQUEST['type']=="month" and  $this->magic_vars['_G']['user_result']['scene_status']!=1): ?>
<script>
	alert("�Բ��������˻���ʱ���߱��������ñ��ʸ�����ͷ���ϵ���뷢���ʸ�");
	location.href='/';
</script>
<? endif; ?>
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;if (  $_REQUEST['type']=="fast" and  $this->magic_vars['_G']['user_result']['scene_status']!=1): ?>
<script>
	alert("�Բ��������˻���ʱ���߱�������Ѻ���ʸ�����ͷ���ϵ���뷢���ʸ�");
	location.href='/';
</script>
<? endif; ?>
<? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id'] > 0): ?>
<script>
	alert("���˴�����Ľ��Ϊծ�����飬�˱�ծ������Ĺ̶������Ϊ<? if (!isset($this->magic_vars['cb'])) $this->magic_vars['cb'] = ''; echo $this->magic_vars['cb']; ?>");
</script>
<? endif; ?>
<div id="zx" style="clear:both;">
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($_REQUEST['article_id'])) $_REQUEST['article_id']=''; ;if (  $_REQUEST['type']=="" &&  $_REQUEST['article_id']==""): ?>

<div class="wrap950 list_1">
	<div class="borrow_box">
		<div><strong>�������½��</strong></div>
		<div>���ȶϢ�����м���</div>
		<div align="center"><a href="/publish/main.html?type=month"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/borrow_yue.jpg" align=""/></a></div>
	</div>
	
	<div class="borrow_box">
		<div><strong>�����������</strong></div>
		<div>���ȶϢ�����м���</div>
		<div align="center"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/borrow_ji.jpg" align=""/></div>
	</div>
	
	<div class="borrow_box">
		<div><strong>�����������</strong></div>
		<div>���ȶϢ�����м���</div>
		<div align="center"><a href="/publish/main.html?type=vouch"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/borrow_danbao.jpg" align=""/></a></div>
	</div>
</div>
<? else: ?>
	<? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="vouch"): ?>
	<!--
	<? if (!isset($this->magic_vars['_G']['user_result']['borrow_vouch'])) $this->magic_vars['_G']['user_result']['borrow_vouch']=''; ;if (  $this->magic_vars['_G']['user_result']['borrow_vouch']==0): ?>
	<script>
		alert("��û��Ȩ�޷������꣬����ͷ���ϵ");
		location.href='/borrow/main.html';
	</script>
	<? endif; ?>
	-->
	<? endif; ?>
	
<? $data = array('article_id'=>isset($_REQUEST['article_id'])?$_REQUEST['article_id']:'','user_id'=>'0','user_id'=>$this->magic_vars['_G']['user_id'],'id'=>isset($_REQUEST['article_id'])?$_REQUEST['article_id']:'');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetOnes($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
<!--����Ŀ ��ʼ-->
<div class="wrap950 header_site_sub" style="margin-top:0px;">
	<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $_REQUEST['type']=="vouch" ||  $this->magic_vars['var']['is_vouch']==1): ?>
	<a><font color="#FF0000">�����ڽ���ǵ����꣬�����꽫�����е�����ȵ��û����е������ȵ�����������Զ������Ͷ��</font></a>
	<? else: ?>
	<? endif; ?>
</div>
<!--����Ŀ ����-->

<form name="form1" method="post" action="/index.php?user&q=code/borrow/<? if (!isset($this->magic_vars['var']['user_id'])) $this->magic_vars['var']['user_id']=''; ;if (  $this->magic_vars['var']['user_id']==""): ?>add<? else: ?>update<? endif; ?>"  enctype="multipart/form-data" onsubmit="return check_form();" >
<!--�����Ϣ ��ʼ-->
<div class="wrap950 list_1">
	<div class="title"><span>��Ŀ���ͣ�</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">��Ŀ���ͣ�</div>
			<div class="c">
				<? $result = $this->magic_vars['_G']['_linkage']['borrow_use']; echo "<select name='use' id=use >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['var']['use']==$val['id'] ) { echo "<option value='{$val['id']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['id']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			</div>
			<div class="sco" >��Ŀ�������͡�</div>
		</div>

		<div class="module_border">
			<div class="w">������ޣ�</div>
			<div class="c">
				<span id="time_limit">
				<select name='time_limit' id=time_limit ><option value='100'>15��</option> <option value='1' selected>1����</option><option value='2' >2����</option><option value='3' >3����</option><option value='4' >4����</option><option value='5' >5����</option><option value='6' >6����</option><option value='7' >7����</option><option value='8' >8����</option><option value='9' >9����</option><option value='10' >10����</option><option value='11' >11����</option><option value='12' >12����</option></select>
				</span>
			</div>
			<div class="sco" >��Ҫ�����ʱ�䡣</div>
		</div>
		<div class="module_border">
			<div class="w">���ʽ��</div>
			<div class="c">
            <span id="day" name="day" style="display:none">����ȫ���</span>
				<select name="style" id="style">
					<option value="0">���·���</option>
					<option selected value="3">���ڻ������¸�Ϣ</option>					<option selected value="2">���ڻ�����Ϣ</option>
				</select>
			</div>
			<div class="sco" >���·��ڻ�����ָ����߽��ɹ���ÿ�»���Ϣ��<br />���ڻ������¸�Ϣ��ָ����߽��ɹ���,ÿ�»�Ϣ,���һ�»�Ϣͬʱ������.</div>
		</div>
	
		<div class="module_border">
			<div class="w">����ܽ�</div>
			<div class="c">
					<input type="text" name="account"  id="account" <? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id'] > 0): ?> value="<? if (!isset($this->magic_vars['cb'])) $this->magic_vars['cb'] = ''; echo $this->magic_vars['cb']; ?>"  readonly="readonly" <? else: ?> value="<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?>" <? endif; ?> onkeyup="value=value.replace(/[^0-9]/g,'')" /> 
					<? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id']>0): ?><input type="hidden" name="is_cz" value="yes" /><input type="hidden" name="cz_id" value="<? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id'] = ''; echo $this->magic_vars['cz_id']; ?>" /><? endif; ?>
			</div>
			<div class="sco" ><? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id']>0): ?><span style="color:#FF0000">���˴�����Ľ��Ϊծ�����飬�˱�ծ������Ĺ̶������Ϊ<? if (!isset($this->magic_vars['cb'])) $this->magic_vars['cb'] = ''; echo $this->magic_vars['cb']; ?>Ԫ��ծ�����������˽�Եģ�ֻ�н���˱��˺ͺ�̨���Կ�������ծ������꣬������Ա���������Ϊ������</span><? else: ?>�����Ӧ��500Ԫ��2,000,000Ԫ֮�䡣���ױ��־�Ϊ����ҡ����ɹ���,  2��������ȡ�����
                            <? if (!isset($this->magic_vars['miaobiao'])) $this->magic_vars['miaobiao']=''; ;if (  $this->magic_vars['miaobiao']): ?> 0Ԫ 
                            <? if (!isset($this->magic_vars['jinbiao'])) $this->magic_vars['jinbiao']=''; ;elseif (  $this->magic_vars['jinbiao']): ?> 2%
                            <? else: ?>2 % ��Ϊ��������ѣ��Ժ�ÿ����һ���£�����0.4%<? endif; ?>����������Ѳ���Ϣ�����˻����ڽ������ֱ�ӿ۳��� ���꾡����Ϣ��鿴������վ �շѹ���<? endif; ?></div>
		</div>
		
		<div class="module_border">
			<div class="w">�����ʣ�</div>
			<div class="c">
				<input type="text" name="apr" value="<? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>" onkeyup="value=value.replace(/[^0-9.]/g,'')" /> % 
			</div>
			<div class="sco" >��д���ṩ��Ͷ���ߵ�������,����д��������������������ʡ������ʲ��ܳ���24 ��Χ��1%��24%����ֻ����С���������λ��
</div>
		</div>
		<div class="module_border">
			<div class="w">���Ͷ���</div>
			<div class="c">
					<input type="text" name="lowest_account" value="50" />Ԫ
			</div>
			<div class="sco" >����Ͷ���߶�һ����������Ͷ���������</div>
		</div>
		
		<div class="module_border">
			<div class="w">���Ͷ���ܶ</div>
			<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_most_account']; echo "<select name='most_account' id=most_account >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['var']['most_account']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			</div>
			<div class="sco" >����Ͷ���߶�һ�������Ͷ���ܶ������</div>
		</div>
		
		<div class="module_border">
			<div class="w">��Чʱ�䣺</div>
			<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_valid_time']; echo "<select name='valid_time' id=valid_time >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['var']['valid_time']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			</div>
			<div class="sco" >���ô˴ν�����ʵ����������ʽ��ȴﵽ100%��ֱ�ӽ�����վ�ĸ���</div>
		</div>
		
	</div>
	<div class="foot"></div>
</div>
<!--�����Ϣ ����-->

<? if (!isset($this->magic_vars['miaobiao'])) $this->magic_vars['miaobiao']=''; ;if (  $this->magic_vars['miaobiao']): ?>

<? else: ?>
<!--Ͷ�꽱�� ��ʼ-->
<div class="wrap950 list_1">
	<div class="title"> <span>Ͷ�꽱����</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w"><input type="radio" name="award" id="award" value="0" <? if (!isset($this->magic_vars['var']['award'])) $this->magic_vars['var']['award']='';if (!isset($this->magic_vars['var']['award'])) $this->magic_vars['var']['award']=''; ;if (  $this->magic_vars['var']['award']==0 ||  $this->magic_vars['var']['award']==""): ?> checked="checked"<? endif; ?> onclick="change_j(0)">�����ý���</div>
			<div class="c">
			</div>
			<div class="sco" >����������˽��������ᶳ�����ʻ�����Ӧ���˻������Ҫ���ý�������ȷ�������ʻ����㹻 ���˻��� </div>
		</div>
		
		<div class="module_border">
			<div class="w"><input type="radio" name="award" id="award" value="2" <? if (!isset($this->magic_vars['var']['award'])) $this->magic_vars['var']['award']=''; ;if (  $this->magic_vars['var']['award']==2): ?> checked="checked"<? endif; ?> onclick="change_j(2)"/>��Ͷ�������������</div>
			<div class="c">
				<input type="text" id="funds" name="funds" value="<? if (!isset($this->magic_vars['var']['funds'])) $this->magic_vars['var']['funds'] = ''; echo $this->magic_vars['var']['funds']; ?>" size="5" />%  
			</div>
			<div class="sco" >�������ñ��α��Ҫ����������Ͷ���û��Ľ���������</div>
		</div>
		
		<div class="module_border">
			<div class="w"><input type="checkbox" name="is_false" value="1" <? if (!isset($this->magic_vars['var']['is_false'])) $this->magic_vars['var']['is_false']=''; ;if (  $this->magic_vars['var']['is_false']==1): ?> checked="checked"<? endif; ?>  <? if (!isset($this->magic_vars['var']['is_false'])) $this->magic_vars['var']['is_false']=''; ;if (  $this->magic_vars['var']['is_false']!=1): ?>disabled="disabled"<? endif; ?>/>���ʧ��ʱҲͬ��������</div>
			<div class="c">
				  
			</div>
			<div class="sco" >�������ѡ�˴�ѡ�����δ�������ʧ��ʱͬ���ά����Ͷ���û������û�й�ѡ�����ʧ��ʱ��ѽ������ⶳ���˻��� </div>
		</div>
	
	</div>
	<div class="foot"></div>
</div>
<!--Ͷ�꽱�� ����-->
<? endif; ?>

<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $_REQUEST['type']=="vouch" ||  $this->magic_vars['var']['is_vouch']==1): ?>

<!--�������� ��ʼ-->
<div class="wrap950 list_1">
	<div class="title"> <span>����������</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">����������</div>
			<div class="c">
			<input name="vouch_award" type="text" value="<? if (!isset($this->magic_vars['var']['vouch_award'])) $this->magic_vars['var']['vouch_award'] = ''; echo $this->magic_vars['var']['vouch_award']; ?>" size="6" />%
			</div>
			<div class="sco" >��������������Ҫ���İٷֱȸ������ˣ������100��������3%�������˽��50������50*3%=1.5</div>
		</div>
		<div class="module_border">
			<div class="w">ָ�������ˣ�</div>
			<div class="c">
			<input name="vouch_user" type="text" value="<? if (!isset($this->magic_vars['var']['vouch_user'])) $this->magic_vars['var']['vouch_user'] = ''; echo $this->magic_vars['var']['vouch_user']; ?>" /><input name="is_vouch" type="hidden" value="1" />
			</div>
			<div class="sco" >ָ���������������|������Ϊ�ձ�ʾ�����˶����Ե���</div>
		</div>
	</div>
	<div class="foot"></div>
</div>
<!--�������� ����-->
<? endif; ?>

<!--�ʻ���Ϣ�������� ��ʼ-->
<div class="wrap950 list_1">
	<div class="title"> <span>�ʻ���Ϣ�������ã�</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">�����ҵ��ʻ��ʽ����<input type="checkbox" name="open_account" value="1" checked="checked" disabled="disabled"/> </div>
			<div class="sco" >��������ϴ�ѡ�����ʵʱ�������ʻ��ģ��˻��ܶ�����������ܶ </div>
		</div>
		
		<div class="module_border">
			<div class="w">�����ҵĽ���ʽ����<input type="checkbox" name="open_borrow" value="1" checked="checked" disabled="disabled"/></div>
			<div class="sco" >��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�����ܶ�ѻ����ܶδ�����ܶ�ٻ��ܶ�����ܶ</div>
		</div>
		
		<div class="module_border">
			<div class="w">�����ҵ�Ͷ���ʽ����<input type="checkbox" name="open_tender" value="1" <? if (!isset($this->magic_vars['var']['open_tender'])) $this->magic_vars['var']['open_tender']=''; ;if (  $this->magic_vars['var']['open_tender']==1): ?> checked="checked"<? endif; ?>/></div>
			<div class="sco" >��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�Ͷ���ܶ���ջ��ܶ���ջ��ܶ</div>
		</div>
		
		<div class="module_border">
			<div class="w">
				�����ҵ����ö����� <input type="checkbox" name="open_credit" value="1" checked="checked" disabled="disabled"/></div>
			
			<div class="sco" >��������ϴ�ѡ�����ʵʱ�������ʻ��ģ�������ö�ȡ�������ö�ȡ� </div>
		</div>
	
	</div>
	<div class="foot"></div>
</div>
<!--�ʻ���Ϣ�������� ����-->

<!--�ʻ���Ϣ�������� ��ʼ-->
<div class="wrap950 list_1">
	<div class="title"> <span>Ͷ�����ϸ˵����</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">���⣺</div>
			<div>
				<input type="text" name="name" value="<? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?>" size="50" /> 
			</div>
			<div class="sco" >��д���ı��⣬д��һ���ܽ�ļ���Ҳ��һ��</div>
		</div>
            	<!--<div class="module_border">
			<div class="w">��Ŀ���壺</div>
			<div>
				<input type="text" name="maindetail" value="<? if (!isset($this->magic_vars['var']['maindetail'])) $this->magic_vars['var']['maindetail'] = ''; echo $this->magic_vars['var']['maindetail']; ?>" size="50" style='margin-top: 5px;'/> 
			</div>
		</div>-->
		
		<div class="module_border">
			<div class="w">��Ϣ��</div>
			<div style='margin-top: 5px;'>
				<textarea name="content" style="width:750px;height:460px;visibility:hidden;">
<? if (!isset($this->magic_vars['var']['content'])) $this->magic_vars['var']['content']=''; ;if (  $this->magic_vars['var']['content']!=""): ?><? if (!isset($this->magic_vars['var']['content'])) $this->magic_vars['var']['content'] = ''; echo $this->magic_vars['var']['content']; ?><? else: ?><P>������飺 </P>
<P>վ�ڹ����û�����</P>
<P>����ϣ�</P>
<? endif; ?></textarea>
		<!--	<iframe src="/plugins/editor/sinaeditor/editor.htm?id=content&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="640" height="460"></iframe>-->
			</div>
		</div>
	</div>
	<div class="foot"></div>
</div>
<!--�ʻ���Ϣ�������� ����-->
<!--�ʻ���Ϣ�������� ��ʼ-->
<div class="wrap950 list_1">
	<div class="title"> <span>�ύ��</span></div>
	<div class="content">
		<input type="hidden" value="<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>" name="id" />
		<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		<input type="submit" value="ȷ���ύ" name="submit" /> <input type="submit" value="����ݸ�"  name="submit" />
	</div>
	<div class="foot"></div>
</div>
</form>
<? unset($_magic_vars);unset($data); ?>
<? if (!isset($this->magic_vars['miaobiao'])) $this->magic_vars['miaobiao']=''; ;if (  $this->magic_vars['miaobiao']): ?>
<script>
alert("�����ڷ�����������ֻҪ���ɹ������Զ�����");
</script>
<? endif; ?>
</div>
<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>

<script type="text/javascript">
								
<? $data = array('user_id'=>'0','var'=>'acc','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['acc'] = borrowClass::GetUserLog($data);if(!is_array($this->magic_vars['acc'])){ $this->magic_vars['acc']=array();}?>

	var total_zi = (<? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['wait_payment'])) $this->magic_vars['acc']['wait_payment'] = '';$_tmp = $this->magic_vars['acc']['wait_payment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['borrowvouch_amount_useReal'])) $this->magic_vars['acc']['borrowvouch_amount_useReal'] = '';$_tmp = $this->magic_vars['acc']['borrowvouch_amount_useReal'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>)*0.95;
        var jinMoney = (<? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['wait_payment'])) $this->magic_vars['acc']['wait_payment'] = '';$_tmp = $this->magic_vars['acc']['wait_payment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['borrowvouch_amount_useReal'])) $this->magic_vars['acc']['borrowvouch_amount_useReal'] = '';$_tmp = $this->magic_vars['acc']['borrowvouch_amount_useReal'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>);
		 var jinMoney = <? if (!isset($this->magic_vars['acc']['jinzhi'])) $this->magic_vars['acc']['jinzhi'] = '';$_tmp = $this->magic_vars['acc']['jinzhi'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
       //var total_zi = (<? if (!isset($this->magic_vars['acc']['total'])) $this->magic_vars['acc']['total'] = '';$_tmp = $this->magic_vars['acc']['total'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['no_use_money'])) $this->magic_vars['acc']['no_use_money'] = '';$_tmp = $this->magic_vars['acc']['no_use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>-<? if (!isset($this->magic_vars['acc']['wait_payment'])) $this->magic_vars['acc']['wait_payment'] = '';$_tmp = $this->magic_vars['acc']['wait_payment'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>)*0.95;

	var video_status = <? if (!isset($this->magic_vars['_G']['user_result']['video_status'])) $this->magic_vars['_G']['user_result']['video_status'] = '';$_tmp = $this->magic_vars['_G']['user_result']['video_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
	var scene_status = <? if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status'] = '';$_tmp = $this->magic_vars['_G']['user_result']['scene_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
	var phone_status = <? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status'] = '';$_tmp = $this->magic_vars['_G']['user_result']['phone_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
        var vip_status = <? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status'] = '';$_tmp = $this->magic_vars['_G']['user_result']['vip_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
	var crmoney = <? if (!isset($this->magic_vars['acc']['credit'])) $this->magic_vars['acc']['credit'] = '';$_tmp = $this->magic_vars['acc']['credit'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
	var cr = <? if (!isset($this->magic_vars['_G']['user_result']['credit'])) $this->magic_vars['_G']['user_result']['credit'] = '';$_tmp = $this->magic_vars['_G']['user_result']['credit'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
	var real_s = <? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status'] = '';$_tmp = $this->magic_vars['_G']['user_result']['real_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
	var danbao_money = <? if (!isset($this->magic_vars['acc']['borrow_vouch'])) $this->magic_vars['acc']['borrow_vouch'] = '';$_tmp = $this->magic_vars['acc']['borrow_vouch'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>;
	var sxf = <? if (!isset($this->magic_vars['_G']['system']['con_borrow_fee'])) $this->magic_vars['_G']['system']['con_borrow_fee'] = ''; echo $this->magic_vars['_G']['system']['con_borrow_fee']*100; ?>;
	
	<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $_REQUEST['type']=="vouch" ||  $this->magic_vars['var']['is_vouch']==1): ?>
	alert("��Ľ������Ϊ<? if (!isset($this->magic_vars['acc']['borrow_vouch'])) $this->magic_vars['acc']['borrow_vouch'] = ''; echo $this->magic_vars['acc']['borrow_vouch']; ?>Ԫ,�㻹�ܽ�<? if (!isset($this->magic_vars['acc']['borrow_vouch_use'])) $this->magic_vars['acc']['borrow_vouch_use'] = ''; echo $this->magic_vars['acc']['borrow_vouch_use']; ?>Ԫ");
	var danbao = 1;
	var max_account = <? if (!isset($this->magic_vars['acc']['borrow_vouch_use'])) $this->magic_vars['acc']['borrow_vouch_use'] = ''; echo $this->magic_vars['acc']['borrow_vouch_use']; ?>;
	<? else: ?>
	//alert("��Ľ�����ö��Ϊ<? if (!isset($this->magic_vars['acc']['credit'])) $this->magic_vars['acc']['credit'] = ''; echo $this->magic_vars['acc']['credit']; ?>Ԫ,�㻹�ܽ�<? if (!isset($this->magic_vars['acc']['credit_use'])) $this->magic_vars['acc']['credit_use'] = ''; echo $this->magic_vars['acc']['credit_use']; ?>Ԫ");
	var danbao = 0;
	var max_account = <? if (!isset($this->magic_vars['acc']['credit_use'])) $this->magic_vars['acc']['credit_use'] = ''; echo $this->magic_vars['acc']['credit_use']; ?>;
	<? endif; ?>
<? unset($_magic_vars);unset($data); ?>
var max_fax =<? if (!isset($this->magic_vars['_G']['system']['con_max_fee'])) $this->magic_vars['_G']['system']['con_max_fee'] = '';$_tmp = $this->magic_vars['_G']['system']['con_max_fee'];$_tmp = $this->magic_modifier("default",$_tmp,"20");echo $_tmp;unset($_tmp); ?>;
var max_apr =<? if (!isset($this->magic_vars['_G']['system']['con_borrow_apr'])) $this->magic_vars['_G']['system']['con_borrow_apr'] = '';$_tmp = $this->magic_vars['_G']['system']['con_borrow_apr'];$_tmp = $this->magic_modifier("default",$_tmp,"22.18");echo $_tmp;unset($_tmp); ?>;

<? if (!isset($this->magic_vars['fastbiao'])) $this->magic_vars['fastbiao']=''; ;if (  $this->magic_vars['fastbiao']): ?> var maxdai = 1000000000; var max_account=1000000000; var fastbiao = 1;<? else: ?> var maxdai=5000; var fastbiao = 0;<? endif; ?>

<? if (!isset($this->magic_vars['miaobiao'])) $this->magic_vars['miaobiao']=''; ;if (  $this->magic_vars['miaobiao']): ?> var miaobiao_is = 1;<? else: ?> var miaobiao_is = 0;<? endif; ?>

<? if (!isset($this->magic_vars['jinbiao'])) $this->magic_vars['jinbiao']=''; ;if (  $this->magic_vars['jinbiao']): ?> var jinbiao = 1;<? else: ?> var jinbiao = 0;<? endif; ?>

<? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id']>0): ?> var czb = 1;<? else: ?> var czb=0;<? endif; ?>

 
 
	
	 

 




function checkDXB(){
    var frm = document.forms['form1'];
    if(frm.elements['isDXB'].checked){
        frm.elements['pwd'].disabled=false;
    }else{
        frm.elements['pwd'].disabled=true;
        frm.elements['pwd'].value="";
    }
}

function checkCrond() {
    var frm = document.forms['form1'];
    if(frm.elements['is_crond'].checked){
        frm.elements['crond_time'].disabled=false;
    }else{
        frm.elements['crond_time'].disabled=true;
        frm.elements['crond_time'].value="";
    }
}
function check_form(){
   
	 var frm = document.forms['form1'];
	 var account = frm.elements['account'].value;
	 var title = frm.elements['name'].value;
	 var style = frm.elements['style'].value;
	 var content = frm.elements['content'].value;
	 var time_limit = frm.elements['time_limit'].value;
	 var award = get_award_value();
	 var part_account = frm.elements['part_account'].value;
	 var funds = frm.elements['funds'].value;
	 var apr = frm.elements['apr'].value;
	 var valicode = frm.elements['valicode'].value;
	 var most_account = frm.elements['most_account'].value;
	 var use = frm.elements['most_account'].value;
	 var lowest_account = frm.elements['lowest_account'].value;
	
	 var errorMsg = '';
	  if (account.length == 0 ) {
		errorMsg += '- �ܽ���Ϊ��' + '\n';
	  }
	  
	  if(danbao){//����
              if(account > danbao_money){//������ڵ������,������
                  errorMsg += '- ����ǰ�Ľ����������Ŀ��õ�����ȣ�' + '\n';
              }else if(real_s != '1'){
                  errorMsg += '- ����δͨ��ʵ����֤' + '\n';
                  alert(errorMsg);
                  location.href='/index.php?user&q=code/user/realname';
                  return false;
              }else if(vip_status != 1){
                            errorMsg += '-������VIP�û�����������VIP��' + '\n';
                            alert(errorMsg);
                            location.href="/vip/main.html";
                            return false;
              }//else if(video_status != '1' && scene_status != '1'){
                 // errorMsg += '- ��δ������Ƶ��֤�����ֳ���֤�����Ƚ��������֤' + '\n';
                  //alert(errorMsg);
                  //location.href='/index.php?user&q=code/user/video_status';
                  //return false;
             // }
	      else if(account>(danbao_money)) errorMsg += '- �������ڵ������' + '\n';
	  }else if(miaobiao_is){//���
	  		//var donjie = parseFloat(apr)*parseFloat(account)/(100*12) + parseFloat(account)/100*sxf;//�����ʽ�
                        //var donjie = parseFloat(apr)*parseFloat(account)/(100*12);
	  		//if(parseInt(total_zi) < parseInt(donjie)) errorMsg += '- �����˻������С��(��Ϣ+���������ѵĽ��)' + '\n';
	  }else if(fastbiao){
	  		if(scene_status != '1'){
                          errorMsg += '- ��δ�����ֳ���֤�����Ƚ����ֳ���֤' + '\n';
                          alert(errorMsg);
                          location.href='/index.php?user&q=code/user/scene_status';
                          return false;
                        } 
	  		else if(account>5000000) errorMsg += '- ����ܽ��ܴ���500��' + '\n';
                        
	  }else if(jinbiao){//��ֵ��:�˻��ܶ��ȥ�����ܶ��ȥ�����ܶ��ȥ���˵������
       
              if(jinMoney < 500){
                            errorMsg += '-���ľ��ʲ�С��500�����ܷ����ʲ��꣡' + '\n';
              }else if(account>jinMoney){
                          errorMsg += '-�����ܴ��ھ��ʲ���' + '\n';
              }else if(phone_status != '1'){
                          errorMsg += '- ��δ�����ֻ���֤�����Ƚ����ֻ���֤' + '\n';
                          alert(errorMsg);
                          location.href='/index.php?user&q=code/user/phone_status';
                          return false;
              }
              
          }else{//���ñ�:
	  		if(real_s != '1'){
                            errorMsg += '-����ͨ��ʵ����֤��' + '\n';
                            alert(errorMsg);
                            location.href='/index.php?user&q=code/user/realname';
                            return false;
                        }else if(vip_status != 1){
                            errorMsg += '-������VIP�û�����������VIP��' + '\n';
                            alert(errorMsg);
                            location.href="/vip/main.html";
                            return false;
                        }else if(cr < 30 ){
                            errorMsg += '-���Ļ���С��30��,���ϴ����Ͻ�����֤��' + '\n';
                            alert(errorMsg);
                            location.href="/index.php?user&q=code/attestation";
                            return false;
                        }
                        ////else if(video_status != '1' && scene_status != '1'){
                          //errorMsg += '- ��δ������Ƶ��֤�����ֳ���֤�����Ƚ��������֤' + '\n';
                          //alert(errorMsg);
                          //location.href='/index.php?user&q=code/user/video_status';
                          //return false;
                      // }

			else  if(account>max_account && !czb) errorMsg += '- �������ڿ������ö��' + '\n';
	  }
	
	  if (apr.length == 0 ) {
		errorMsg += '- ���ʲ���Ϊ��' + '\n';
	  }
	  
	  if (time_limit >=1 && time_limit<=6 && apr>24) {
		errorMsg += '- 1��6���µ������ʲ��ܳ���24%' + '\n';
	  }else if (time_limit >6  && apr>24) {
		errorMsg += '- 6��12���µ������ʲ��ܳ���'+max_fax+'%' + '\n';
	  }
	  
	  if (apr<0 ||apr>max_apr) {
		errorMsg += '- ���ʲ��ܴ���'+max_apr+'%' + '\n';
	  }
	  
	  if (award==1 && (part_account=="" || part_account<5 || part_account>account*0.02)) {
		errorMsg += '- �̶�����̯�������ܵ���5Ԫ,���ܸ����ܱ�Ľ���2%' + '\n';
	  }
	  /*if (award==2 && (funds =="" || funds<0.1 || funds>6)) {
		errorMsg += '- Ͷ�����������0.1%~6% ' + '\n';
	  }*/
	  if (most_account!=0 && parseInt(most_account)<parseInt(lowest_account)){
		  errorMsg += '- Ͷ��������С����С���' + '\n';
	  }
	  if (title.length == 0 ) {
		errorMsg += '- ���ⲻ��Ϊ��' + '\n';
	  }
	  if (content.length == 0 ) {
		errorMsg += '- ���ݲ���Ϊ��' + '\n';
	  }
	  if (valicode.length == 0 ) {
		errorMsg += '- ��֤�벻��Ϊ��' + '\n';
	  }

	
	var awa = "";
	for(var i=0;i<frm.award.length;i++){   
	   if(frm.award[i].checked){
		 awa =  frm.award[i].value;
		}
	} 


	if(awa==1){
		if (part_account==""){
			errorMsg += '- �̶���̯������������Ϊ�� ' + '\n';
		}
	}
	if(awa==2){
		if (funds==""){
			errorMsg += '- Ͷ���������������Ϊ�� ' + '\n';
		}
	}
	
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }

}
function get_award_value()
{
    var form1 = document.forms['form1'];
    
    for (i=0; i<form1.award.length; i++)    {
        if (form1.award[i].checked)
        {
           return form1.award[i].value;
        }
    }
}
function change_j(type){
	var frm = document.forms['form1'];
	if (type==0){
                jQuery("#part_account").attr("disabled",true); 
		jQuery("#funds").attr("disabled",true); 
                jQuery("#is_false").attr("disabled",true); 
                
                //frm.elements['part_account'].disabled = "disabled";
		//frm.elements['funds'].disabled = "disabled";
		//frm.elements['is_false'].disabled = "disabled";
	}else if (type==1){
                jQuery("#part_account").attr("disabled",false); 
		jQuery("#funds").attr("disabled",true); 
                jQuery("#is_false").attr("disabled",false); 
                
		//frm.elements['part_account'].disabled = "";
		//frm.elements['funds'].disabled = "disabled";
		//frm.elements['is_false'].disabled = "";
	}else if (type==2){
            
                jQuery("#part_account").attr("disabled",true); 
		jQuery("#funds").attr("disabled",false); 
                jQuery("#is_false").attr("disabled",false); 
                
		//frm.elements['part_account'].disabled = "disabled";
		//frm.elements['funds'].disabled = "";
		//frm.elements['is_false'].disabled = "";
	}
}	
</script>


<? endif; ?>

