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
					editor.insertHtml('<strong>插入HTML</strong>');
				});
				K('input[name=appendHtml]').click(function(e) {
					editor.appendHtml('<strong>添加HTML</strong>');
				});
				K('input[name=clear]').click(function(e) {
					editor.html('');
				});
			});
		</script>
		
<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_id']==""): ?>
<script>
	alert("你还没有登录，请先登录");
	location.href='/index.php?user&q=action/login';
</script>
<? endif; ?>
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;if (  $_REQUEST['type']=="vouch" and  $this->magic_vars['_G']['user_result']['scene_status']!=1): ?>
<script>
	alert("对不起，您的账户暂时不具备发布担保标资格，请与客服联系申请发布资格");
	location.href='/';
</script>
<? endif; ?>
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;if (  $_REQUEST['type']=="month" and  $this->magic_vars['_G']['user_result']['scene_status']!=1): ?>
<script>
	alert("对不起，您的账户暂时不具备发布信用标资格，请与客服联系申请发布资格");
	location.href='/';
</script>
<? endif; ?>
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;if (  $_REQUEST['type']=="fast" and  $this->magic_vars['_G']['user_result']['scene_status']!=1): ?>
<script>
	alert("对不起，您的账户暂时不具备发布抵押标资格，请与客服联系申请发布资格");
	location.href='/';
</script>
<? endif; ?>
<? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id'] > 0): ?>
<script>
	alert("您此次申请的借款为债务重组，此笔债务重组的固定借款额度为<? if (!isset($this->magic_vars['cb'])) $this->magic_vars['cb'] = ''; echo $this->magic_vars['cb']; ?>");
</script>
<? endif; ?>
<div id="zx" style="clear:both;">
<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($_REQUEST['article_id'])) $_REQUEST['article_id']=''; ;if (  $_REQUEST['type']=="" &&  $_REQUEST['article_id']==""): ?>

<div class="wrap950 list_1">
	<div class="borrow_box">
		<div><strong>发布按月借款</strong></div>
		<div>按等额本息法进行计算</div>
		<div align="center"><a href="/publish/main.html?type=month"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/borrow_yue.jpg" align=""/></a></div>
	</div>
	
	<div class="borrow_box">
		<div><strong>发布按季借款</strong></div>
		<div>按等额本息法进行计算</div>
		<div align="center"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/borrow_ji.jpg" align=""/></div>
	</div>
	
	<div class="borrow_box">
		<div><strong>发布担保借款</strong></div>
		<div>按等额本息法进行计算</div>
		<div align="center"><a href="/publish/main.html?type=vouch"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/borrow_danbao.jpg" align=""/></a></div>
	</div>
</div>
<? else: ?>
	<? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type']=="vouch"): ?>
	<!--
	<? if (!isset($this->magic_vars['_G']['user_result']['borrow_vouch'])) $this->magic_vars['_G']['user_result']['borrow_vouch']=''; ;if (  $this->magic_vars['_G']['user_result']['borrow_vouch']==0): ?>
	<script>
		alert("你没有权限发担保标，请跟客服联系");
		location.href='/borrow/main.html';
	</script>
	<? endif; ?>
	-->
	<? endif; ?>
	
<? $data = array('article_id'=>isset($_REQUEST['article_id'])?$_REQUEST['article_id']:'','user_id'=>'0','user_id'=>$this->magic_vars['_G']['user_id'],'id'=>isset($_REQUEST['article_id'])?$_REQUEST['article_id']:'');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetOnes($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
<!--子栏目 开始-->
<div class="wrap950 header_site_sub" style="margin-top:0px;">
	<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $_REQUEST['type']=="vouch" ||  $this->magic_vars['var']['is_vouch']==1): ?>
	<a><font color="#FF0000">您正在借的是担保标，担保标将先由有担保额度的用户进行担保，等担保额度满了自动会进行投标</font></a>
	<? else: ?>
	<? endif; ?>
</div>
<!--子栏目 结束-->

<form name="form1" method="post" action="/index.php?user&q=code/borrow/<? if (!isset($this->magic_vars['var']['user_id'])) $this->magic_vars['var']['user_id']=''; ;if (  $this->magic_vars['var']['user_id']==""): ?>add<? else: ?>update<? endif; ?>"  enctype="multipart/form-data" onsubmit="return check_form();" >
<!--借款信息 开始-->
<div class="wrap950 list_1">
	<div class="title"><span>项目类型：</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">项目类型：</div>
			<div class="c">
				<? $result = $this->magic_vars['_G']['_linkage']['borrow_use']; echo "<select name='use' id=use >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['var']['use']==$val['id'] ) { echo "<option value='{$val['id']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['id']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			</div>
			<div class="sco" >项目所属类型。</div>
		</div>

		<div class="module_border">
			<div class="w">借款期限：</div>
			<div class="c">
				<span id="time_limit">
				<select name='time_limit' id=time_limit ><option value='100'>15天</option> <option value='1' selected>1个月</option><option value='2' >2个月</option><option value='3' >3个月</option><option value='4' >4个月</option><option value='5' >5个月</option><option value='6' >6个月</option><option value='7' >7个月</option><option value='8' >8个月</option><option value='9' >9个月</option><option value='10' >10个月</option><option value='11' >11个月</option><option value='12' >12个月</option></select>
				</span>
			</div>
			<div class="sco" >需要借多少时间。</div>
		</div>
		<div class="module_border">
			<div class="w">还款方式：</div>
			<div class="c">
            <span id="day" name="day" style="display:none">到期全额还款</span>
				<select name="style" id="style">
					<option value="0">按月分期</option>
					<option selected value="3">到期还本按月付息</option>					<option selected value="2">到期还本付息</option>
				</select>
			</div>
			<div class="sco" >按月分期还款是指借款者借款成功后，每月还本息。<br />到期还本按月付息是指借款者借款成功后,每月还息,最后一月还息同时还本金.</div>
		</div>
	
		<div class="module_border">
			<div class="w">借款总金额：</div>
			<div class="c">
					<input type="text" name="account"  id="account" <? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id'] > 0): ?> value="<? if (!isset($this->magic_vars['cb'])) $this->magic_vars['cb'] = ''; echo $this->magic_vars['cb']; ?>"  readonly="readonly" <? else: ?> value="<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?>" <? endif; ?> onkeyup="value=value.replace(/[^0-9]/g,'')" /> 
					<? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id']>0): ?><input type="hidden" name="is_cz" value="yes" /><input type="hidden" name="cz_id" value="<? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id'] = ''; echo $this->magic_vars['cz_id']; ?>" /><? endif; ?>
			</div>
			<div class="sco" ><? if (!isset($this->magic_vars['cz_id'])) $this->magic_vars['cz_id']=''; ;if (  $this->magic_vars['cz_id']>0): ?><span style="color:#FF0000">您此次申请的借款为债务重组，此笔债务重组的固定借款额度为<? if (!isset($this->magic_vars['cb'])) $this->magic_vars['cb'] = ''; echo $this->magic_vars['cb']; ?>元，债务重组标是隐私性的，只有借款人本人和后台可以看到这是债务重组标，其他会员看到这个标为正常标</span><? else: ?>借款金额应在500元至2,000,000元之间。交易币种均为人民币。借款成功后,  2个月内收取借款本金的
                            <? if (!isset($this->magic_vars['miaobiao'])) $this->magic_vars['miaobiao']=''; ;if (  $this->magic_vars['miaobiao']): ?> 0元 
                            <? if (!isset($this->magic_vars['jinbiao'])) $this->magic_vars['jinbiao']=''; ;elseif (  $this->magic_vars['jinbiao']): ?> 2%
                            <? else: ?>2 % 作为借款手续费，以后每增加一个月，增加0.4%<? endif; ?>，借款手续费不计息，不退还，在借款金额中直接扣除。 更详尽的信息请查看帮助网站 收费规则<? endif; ?></div>
		</div>
		
		<div class="module_border">
			<div class="w">年利率：</div>
			<div class="c">
				<input type="text" name="apr" value="<? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>" onkeyup="value=value.replace(/[^0-9.]/g,'')" /> % 
			</div>
			<div class="sco" >填写您提供给投资者的年利率,所填写的利率是您还款的年利率。年利率不能超过24 范围：1%至24%，且只保留小数后最后两位。
</div>
		</div>
		<div class="module_border">
			<div class="w">最低投标金额：</div>
			<div class="c">
					<input type="text" name="lowest_account" value="50" />元
			</div>
			<div class="sco" >允许投资者对一个借款标的最低投标金额的限制</div>
		</div>
		
		<div class="module_border">
			<div class="w">最多投标总额：</div>
			<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_most_account']; echo "<select name='most_account' id=most_account >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['var']['most_account']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			</div>
			<div class="sco" >允许投资者对一个借款标的投标总额的限制</div>
		</div>
		
		<div class="module_border">
			<div class="w">有效时间：</div>
			<div class="c">
			<? $result = $this->magic_vars['_G']['_linkage']['borrow_valid_time']; echo "<select name='valid_time' id=valid_time >"; if ($result!=''): foreach ($result as $key => $val): if ($this->magic_vars['var']['valid_time']==$val['value']) { echo "<option value='{$val['value']}' selected>{$val['name']}</option>"; }else{echo "<option value='{$val['value']}' >{$val['name']}</option>";} endforeach;echo "</select>";endif; ?>
			</div>
			<div class="sco" >设置此次借款融资的天数。融资进度达到100%后直接进行网站的复审</div>
		</div>
		
	</div>
	<div class="foot"></div>
</div>
<!--借款信息 结束-->

<? if (!isset($this->magic_vars['miaobiao'])) $this->magic_vars['miaobiao']=''; ;if (  $this->magic_vars['miaobiao']): ?>

<? else: ?>
<!--投标奖励 开始-->
<div class="wrap950 list_1">
	<div class="title"> <span>投标奖励：</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w"><input type="radio" name="award" id="award" value="0" <? if (!isset($this->magic_vars['var']['award'])) $this->magic_vars['var']['award']='';if (!isset($this->magic_vars['var']['award'])) $this->magic_vars['var']['award']=''; ;if (  $this->magic_vars['var']['award']==0 ||  $this->magic_vars['var']['award']==""): ?> checked="checked"<? endif; ?> onclick="change_j(0)">不设置奖励</div>
			<div class="c">
			</div>
			<div class="sco" >如果您设置了奖励金额，将会冻结您帐户中相应的账户余额。如果要设置奖励，请确保您的帐户有足够 的账户余额。 </div>
		</div>
		
		<div class="module_border">
			<div class="w"><input type="radio" name="award" id="award" value="2" <? if (!isset($this->magic_vars['var']['award'])) $this->magic_vars['var']['award']=''; ;if (  $this->magic_vars['var']['award']==2): ?> checked="checked"<? endif; ?> onclick="change_j(2)"/>按投标金额比例奖励：</div>
			<div class="c">
				<input type="text" id="funds" name="funds" value="<? if (!isset($this->magic_vars['var']['funds'])) $this->magic_vars['var']['funds'] = ''; echo $this->magic_vars['var']['funds']; ?>" size="5" />%  
			</div>
			<div class="sco" >这里设置本次标的要奖励给所有投标用户的奖励比例。</div>
		</div>
		
		<div class="module_border">
			<div class="w"><input type="checkbox" name="is_false" value="1" <? if (!isset($this->magic_vars['var']['is_false'])) $this->magic_vars['var']['is_false']=''; ;if (  $this->magic_vars['var']['is_false']==1): ?> checked="checked"<? endif; ?>  <? if (!isset($this->magic_vars['var']['is_false'])) $this->magic_vars['var']['is_false']=''; ;if (  $this->magic_vars['var']['is_false']!=1): ?>disabled="disabled"<? endif; ?>/>标的失败时也同样奖励：</div>
			<div class="c">
				  
			</div>
			<div class="sco" >如果您勾选了此选项，到期未满标或复审失败时同样会奖励给投标用户。如果没有勾选，标的失败时会把奖励金额解冻回账户余额。 </div>
		</div>
	
	</div>
	<div class="foot"></div>
</div>
<!--投标奖励 结束-->
<? endif; ?>

<? if (!isset($_REQUEST['type'])) $_REQUEST['type']='';if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $_REQUEST['type']=="vouch" ||  $this->magic_vars['var']['is_vouch']==1): ?>

<!--担保奖励 开始-->
<div class="wrap950 list_1">
	<div class="title"> <span>担保奖励：</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">担保比例：</div>
			<div class="c">
			<input name="vouch_award" type="text" value="<? if (!isset($this->magic_vars['var']['vouch_award'])) $this->magic_vars['var']['vouch_award'] = ''; echo $this->magic_vars['var']['vouch_award']; ?>" size="6" />%
			</div>
			<div class="sco" >担保奖励按照所要借款的百分比给担保人，比如借100，奖励是3%，担保人借出50，则奖励50*3%=1.5</div>
		</div>
		<div class="module_border">
			<div class="w">指定担保人：</div>
			<div class="c">
			<input name="vouch_user" type="text" value="<? if (!isset($this->magic_vars['var']['vouch_user'])) $this->magic_vars['var']['vouch_user'] = ''; echo $this->magic_vars['var']['vouch_user']; ?>" /><input name="is_vouch" type="hidden" value="1" />
			</div>
			<div class="sco" >指定多个担保人请用|隔开，为空表示所有人都可以担保</div>
		</div>
	</div>
	<div class="foot"></div>
</div>
<!--担保奖励 结束-->
<? endif; ?>

<!--帐户信息公开设置 开始-->
<div class="wrap950 list_1">
	<div class="title"> <span>帐户信息公开设置：</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">公开我的帐户资金情况<input type="checkbox" name="open_account" value="1" checked="checked" disabled="disabled"/> </div>
			<div class="sco" >如果您勾上此选项，将会实时公开您帐户的：账户总额、可用余额、冻结总额。 </div>
		</div>
		
		<div class="module_border">
			<div class="w">公开我的借款资金情况<input type="checkbox" name="open_borrow" value="1" checked="checked" disabled="disabled"/></div>
			<div class="sco" >如果您勾上此选项，将会实时公开您帐户的：借款总额、已还款总额、未还款总额、迟还总额、逾期总额。</div>
		</div>
		
		<div class="module_border">
			<div class="w">公开我的投标资金情况<input type="checkbox" name="open_tender" value="1" <? if (!isset($this->magic_vars['var']['open_tender'])) $this->magic_vars['var']['open_tender']=''; ;if (  $this->magic_vars['var']['open_tender']==1): ?> checked="checked"<? endif; ?>/></div>
			<div class="sco" >如果您勾上此选项，将会实时公开您帐户的：投标总额、已收回总额、待收回总额。</div>
		</div>
		
		<div class="module_border">
			<div class="w">
				公开我的信用额度情况 <input type="checkbox" name="open_credit" value="1" checked="checked" disabled="disabled"/></div>
			
			<div class="sco" >如果您勾上此选项，将会实时公开您帐户的：最低信用额度、最高信用额度。 </div>
		</div>
	
	</div>
	<div class="foot"></div>
</div>
<!--帐户信息公开设置 结束-->

<!--帐户信息公开设置 开始-->
<div class="wrap950 list_1">
	<div class="title"> <span>投标的详细说明：</span></div>
	<div class="content">
		<div class="module_border">
			<div class="w">标题：</div>
			<div>
				<input type="text" name="name" value="<? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?>" size="50" /> 
			</div>
			<div class="sco" >填写借款的标题，写好一点能借的几率也大一点</div>
		</div>
            	<!--<div class="module_border">
			<div class="w">项目主体：</div>
			<div>
				<input type="text" name="maindetail" value="<? if (!isset($this->magic_vars['var']['maindetail'])) $this->magic_vars['var']['maindetail'] = ''; echo $this->magic_vars['var']['maindetail']; ?>" size="50" style='margin-top: 5px;'/> 
			</div>
		</div>-->
		
		<div class="module_border">
			<div class="w">信息：</div>
			<div style='margin-top: 5px;'>
				<textarea name="content" style="width:750px;height:460px;visibility:hidden;">
<? if (!isset($this->magic_vars['var']['content'])) $this->magic_vars['var']['content']=''; ;if (  $this->magic_vars['var']['content']!=""): ?><? if (!isset($this->magic_vars['var']['content'])) $this->magic_vars['var']['content'] = ''; echo $this->magic_vars['var']['content']; ?><? else: ?><P>借款详情： </P>
<P>站内关联用户名：</P>
<P>还款保障：</P>
<? endif; ?></textarea>
		<!--	<iframe src="/plugins/editor/sinaeditor/editor.htm?id=content&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="640" height="460"></iframe>-->
			</div>
		</div>
	</div>
	<div class="foot"></div>
</div>
<!--帐户信息公开设置 结束-->
<!--帐户信息公开设置 开始-->
<div class="wrap950 list_1">
	<div class="title"> <span>提交：</span></div>
	<div class="content">
		<input type="hidden" value="<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>" name="id" />
		<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		<input type="submit" value="确认提交" name="submit" /> <input type="submit" value="保存草稿"  name="submit" />
	</div>
	<div class="foot"></div>
</div>
</form>
<? unset($_magic_vars);unset($data); ?>
<? if (!isset($this->magic_vars['miaobiao'])) $this->magic_vars['miaobiao']=''; ;if (  $this->magic_vars['miaobiao']): ?>
<script>
alert("您正在发布的是秒标借款，只要借款成功立即自动还款");
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
	alert("你的借款担保额度为<? if (!isset($this->magic_vars['acc']['borrow_vouch'])) $this->magic_vars['acc']['borrow_vouch'] = ''; echo $this->magic_vars['acc']['borrow_vouch']; ?>元,你还能借<? if (!isset($this->magic_vars['acc']['borrow_vouch_use'])) $this->magic_vars['acc']['borrow_vouch_use'] = ''; echo $this->magic_vars['acc']['borrow_vouch_use']; ?>元");
	var danbao = 1;
	var max_account = <? if (!isset($this->magic_vars['acc']['borrow_vouch_use'])) $this->magic_vars['acc']['borrow_vouch_use'] = ''; echo $this->magic_vars['acc']['borrow_vouch_use']; ?>;
	<? else: ?>
	//alert("你的借款信用额度为<? if (!isset($this->magic_vars['acc']['credit'])) $this->magic_vars['acc']['credit'] = ''; echo $this->magic_vars['acc']['credit']; ?>元,你还能借<? if (!isset($this->magic_vars['acc']['credit_use'])) $this->magic_vars['acc']['credit_use'] = ''; echo $this->magic_vars['acc']['credit_use']; ?>元");
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
		errorMsg += '- 总金额不能为空' + '\n';
	  }
	  
	  if(danbao){//担宝
              if(account > danbao_money){//如果大于担保额度,不允许
                  errorMsg += '- 您当前的借款金额大于您的可用担保额度！' + '\n';
              }else if(real_s != '1'){
                  errorMsg += '- 您尚未通过实名认证' + '\n';
                  alert(errorMsg);
                  location.href='/index.php?user&q=code/user/realname';
                  return false;
              }else if(vip_status != 1){
                            errorMsg += '-您不是VIP用户，请先申请VIP！' + '\n';
                            alert(errorMsg);
                            location.href="/vip/main.html";
                            return false;
              }//else if(video_status != '1' && scene_status != '1'){
                 // errorMsg += '- 您未进行视频认证或者现场认证，请先进行相关认证' + '\n';
                  //alert(errorMsg);
                  //location.href='/index.php?user&q=code/user/video_status';
                  //return false;
             // }
	      else if(account>(danbao_money)) errorMsg += '- 借款金额大于担保额度' + '\n';
	  }else if(miaobiao_is){//秒标
	  		//var donjie = parseFloat(apr)*parseFloat(account)/(100*12) + parseFloat(account)/100*sxf;//冻结资金
                        //var donjie = parseFloat(apr)*parseFloat(account)/(100*12);
	  		//if(parseInt(total_zi) < parseInt(donjie)) errorMsg += '- 您的账户总余额小于(利息+管理手续费的金额)' + '\n';
	  }else if(fastbiao){
	  		if(scene_status != '1'){
                          errorMsg += '- 您未进行现场认证，请先进行现场认证' + '\n';
                          alert(errorMsg);
                          location.href='/index.php?user&q=code/user/scene_status';
                          return false;
                        } 
	  		else if(account>5000000) errorMsg += '- 借款总金额不能大于500万' + '\n';
                        
	  }else if(jinbiao){//净值标:账户总额减去冻结总额减去待还总额减去替人担保金额
       
              if(jinMoney < 500){
                            errorMsg += '-您的净资产小于500，不能发净资产标！' + '\n';
              }else if(account>jinMoney){
                          errorMsg += '-借款金额不能大于净资产！' + '\n';
              }else if(phone_status != '1'){
                          errorMsg += '- 您未进行手机认证，请先进行手机认证' + '\n';
                          alert(errorMsg);
                          location.href='/index.php?user&q=code/user/phone_status';
                          return false;
              }
              
          }else{//信用标:
	  		if(real_s != '1'){
                            errorMsg += '-请先通过实名认证！' + '\n';
                            alert(errorMsg);
                            location.href='/index.php?user&q=code/user/realname';
                            return false;
                        }else if(vip_status != 1){
                            errorMsg += '-您不是VIP用户，请先申请VIP！' + '\n';
                            alert(errorMsg);
                            location.href="/vip/main.html";
                            return false;
                        }else if(cr < 30 ){
                            errorMsg += '-您的积分小于30分,请上传资料进行认证！' + '\n';
                            alert(errorMsg);
                            location.href="/index.php?user&q=code/attestation";
                            return false;
                        }
                        ////else if(video_status != '1' && scene_status != '1'){
                          //errorMsg += '- 您未进行视频认证或者现场认证，请先进行相关认证' + '\n';
                          //alert(errorMsg);
                          //location.href='/index.php?user&q=code/user/video_status';
                          //return false;
                      // }

			else  if(account>max_account && !czb) errorMsg += '- 借款金额大于可用信用额度' + '\n';
	  }
	
	  if (apr.length == 0 ) {
		errorMsg += '- 利率不能为空' + '\n';
	  }
	  
	  if (time_limit >=1 && time_limit<=6 && apr>24) {
		errorMsg += '- 1至6个月的年利率不能超过24%' + '\n';
	  }else if (time_limit >6  && apr>24) {
		errorMsg += '- 6至12个月的年利率不能超过'+max_fax+'%' + '\n';
	  }
	  
	  if (apr<0 ||apr>max_apr) {
		errorMsg += '- 利率不能大于'+max_apr+'%' + '\n';
	  }
	  
	  if (award==1 && (part_account=="" || part_account<5 || part_account>account*0.02)) {
		errorMsg += '- 固定金额分摊奖励不能低于5元,不能高于总标的金额的2%' + '\n';
	  }
	  /*if (award==2 && (funds =="" || funds<0.1 || funds>6)) {
		errorMsg += '- 投标金额比例奖励0.1%~6% ' + '\n';
	  }*/
	  if (most_account!=0 && parseInt(most_account)<parseInt(lowest_account)){
		  errorMsg += '- 投标最大金额不能小于最小金额' + '\n';
	  }
	  if (title.length == 0 ) {
		errorMsg += '- 标题不能为空' + '\n';
	  }
	  if (content.length == 0 ) {
		errorMsg += '- 内容不能为空' + '\n';
	  }
	  if (valicode.length == 0 ) {
		errorMsg += '- 验证码不能为空' + '\n';
	  }

	
	var awa = "";
	for(var i=0;i<frm.award.length;i++){   
	   if(frm.award[i].checked){
		 awa =  frm.award[i].value;
		}
	} 


	if(awa==1){
		if (part_account==""){
			errorMsg += '- 固定分摊比例奖励不能为空 ' + '\n';
		}
	}
	if(awa==2){
		if (funds==""){
			errorMsg += '- 投标金额比例奖励不能为空 ' + '\n';
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

