<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<!--�û����ĵ�����Ŀ ��ʼ-->
<div class="wrap950 ">
	<!--��ߵĵ��� ��ʼ-->
	<div class="user_left">
		<? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
	</div>
	<!--��ߵĵ��� ����-->
	
	<!--�ұߵ����� ��ʼ-->
	<div class="user_right">
		<div class="user_right_menu">
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="userpwd" ||  $this->magic_vars['_U']['query_type']=="paypwd" ||  $this->magic_vars['_U']['query_type']=="protection" ||  $this->magic_vars['_U']['query_type']=="getpaypwd"): ?>
			<ul>
				<li class="title" ><a href="/index.php?user&q=code/user/userpwd">��ȫ��Ϣ</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="userpwd"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/userpwd">��¼����</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="paypwd" ||  $this->magic_vars['_U']['query_type']=="getpaypwd"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/paypwd">��������</a></li>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="reginvite"  ||  $this->magic_vars['_U']['query_type']=="request" ||  $this->magic_vars['_U']['query_type']=="myfriend" ||  $this->magic_vars['_U']['query_type']=="black"): ?>
			<ul>
				<li style="position: relative; left:10px;" <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="reginvite"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/reginvite">�������</a></li>
				<!--<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="request"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/request">��������</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="myfriend"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myfriend">�ҵĺ���</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="black"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/black">������</a></li>-->
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit"): ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/credit">���û��ּ�¼</a></li>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit_invest"): ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/credit_invest">Ͷ����ּ�¼</a></li>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser"): ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myuser">�ͻ�����</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="myuser"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myuser">�ҵĿͷ�</a></li>
				<li ><a href="index.php?user&q=code/borrow/myuser">�ͻ����</a></li>
				<li ><a href="index.php?user&q=code/borrow/myuser_account">ͳ����Ϣ</a></li>
			</ul>
			<? else: ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">�޸ĸ�����Ϣ </a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="realname"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/realname">ʵ����֤</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="email_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/email_status">������֤</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="phone_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/phone_status">�ֻ���֤</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="video_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/video_status">��Ƶ��֤</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="scene_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/scene_status">�ֳ���֤</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="avatar"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/avatar">ͷ����Ϣ</a></li>
				<!--<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="privacy"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/privacy">������˽</a></li>-->
			</ul>
			<? endif; ?>
		</div>
		
		<div class="user_right_main">
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="avatar"): ?>
		<!--ͷ�� ��ʼ-->
		<div class="user_help">���ϴ�����վ��ͷ��</div>
		<div><img src="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = '';$_tmp = $this->magic_vars['_G']['user_id'];$_tmp = $this->magic_modifier("avatar",$_tmp,"");$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /></div>
		<div> <? 
 require_once(ROOT_PATH.'plugins/avatar/configs.php');
require_once(ROOT_PATH.'plugins/avatar/avatar.class.php');
$objAvatar = new Avatar();
echo $objAvatar->uc_avatar($this->magic_vars['_G']['user_id'], 'virtual');
?></div>
		<div class="user_right_foot">
		* ��ܰ��ʾ��ͷ�����������֣����У�С
		</div>
		<!--ͷ�� ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="privacy"): ?>
		<div class="user_help">���ø��˵���˽</div>
		<form action="" method="post">
		<div class="user_main_title">�ҵ���ҳ</div>
		<div class="user_right_border">
			<div class="e">�����б�</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=friend&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['friend'])) $this->magic_vars['_U']['user_privacy']['friend'] = ''; echo $this->magic_vars['_U']['user_privacy']['friend']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">�������ۣ�</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=friend_comment&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['friend_comment'])) $this->magic_vars['_U']['user_privacy']['friend_comment'] = ''; echo $this->magic_vars['_U']['user_privacy']['friend_comment']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">����б�</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=borrow_list&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['borrow_list'])) $this->magic_vars['_U']['user_privacy']['borrow_list'] = ''; echo $this->magic_vars['_U']['user_privacy']['borrow_list']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">Ͷ���¼��</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=loan_log&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['loan_log'])) $this->magic_vars['_U']['user_privacy']['loan_log'] = ''; echo $this->magic_vars['_U']['user_privacy']['loan_log']; ?>"></script>
			</div>
		</div>
			
		
		<div class="user_main_title">վ����/��Ϊ����</div>
		<div class="user_right_border">
			<div class="e">˭���Ը��ҷ�վ���ţ�</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=sent_msg&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['sent_msg'])) $this->magic_vars['_U']['user_privacy']['sent_msg'] = ''; echo $this->magic_vars['_U']['user_privacy']['sent_msg']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">˭�������ҷ��������룺</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=friend_request&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['friend_request'])) $this->magic_vars['_U']['user_privacy']['friend_request'] = ''; echo $this->magic_vars['_U']['user_privacy']['friend_request']; ?>"></script>
			</div>
		</div>
		
		
		<div class="user_main_title">������</div>
		<div class="user_right_border">
			<div class="e">˭���Կ��ҵĺ�������</div>
			<div class="c">
				<select name="look_black">
					<option value="0" <? if (!isset($this->magic_vars['_U']['user_privacy']['look_black'])) $this->magic_vars['_U']['user_privacy']['look_black']=''; ;if (  $this->magic_vars['_U']['user_privacy']['look_black']==0): ?> selected="selected"<? endif; ?>>�������ҵĺ��Ѳ鿴�ҵĺ�����</option>
					<option value="1" <? if (!isset($this->magic_vars['_U']['user_privacy']['look_black'])) $this->magic_vars['_U']['user_privacy']['look_black']=''; ;if (  $this->magic_vars['_U']['user_privacy']['look_black']==1): ?> selected="selected"<? endif; ?>>�����ҵĺ��Ѳ鿴�ҵĺ�����</option>
					<option value="2"<? if (!isset($this->magic_vars['_U']['user_privacy']['look_black'])) $this->magic_vars['_U']['user_privacy']['look_black']=''; ;if (  $this->magic_vars['_U']['user_privacy']['look_black']==2): ?> selected="selected"<? endif; ?>>��������ͬ��ĺ��Ѳ鿴�ҵĺ�����</option>
				</select>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">������������ҷ����ţ�</div>
			<div class="c">
				<input type="radio" name="allow_black_sent" value="1" <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_sent'])) $this->magic_vars['_U']['user_privacy']['allow_black_sent']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_sent']==1): ?> checked="checked"<? endif; ?>/> ���� <input type="radio" name="allow_black_sent" value="0"   <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_sent'])) $this->magic_vars['_U']['user_privacy']['allow_black_sent']='';if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_sent'])) $this->magic_vars['_U']['user_privacy']['allow_black_sent']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_sent']==0 ||  $this->magic_vars['_U']['user_privacy']['allow_black_sent']==""): ?> checked="checked"<? endif; ?> /> ������ 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e">������������ҷ��ͺ�������</div>
			<div class="c">
				<input type="radio" name="allow_black_request" value="1"  <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_request'])) $this->magic_vars['_U']['user_privacy']['allow_black_request']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_request']==1): ?> checked="checked"<? endif; ?>/> ���� <input type="radio" name="allow_black_request" value="0" <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_request'])) $this->magic_vars['_U']['user_privacy']['allow_black_request']='';if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_request'])) $this->magic_vars['_U']['user_privacy']['allow_black_request']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_request']==0 ||  $this->magic_vars['_U']['user_privacy']['allow_black_request']==""): ?> checked="checked"<? endif; ?>/> ������ 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		</form>
		
		<div class="user_right_foot">
		* ��ܰ��ʾ���뱣�����Լ�����˽
		</div>
		<!--�˺ų�ֵ ����-->
		
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="userpwd"): ?>
		<!--�޸ĵ�¼���� ��ʼ-->
		<form action="" name="form1" method="post" onsubmit="return check_form()">
		<div class="user_help">�����벻Ҫ̫�򵥣���ɸ���һ�㣬������ĸ+����</div>
		<div class="user_right_border">
			<div class="e">ԭʼ���룺</div>
			<div class="c">
				<input type="password" name="oldpassword" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e">�����룺</div>
			<div class="c">
				<input type="password" name="newpassword" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e">ȷ�����룺</div>
			<div class="c">
				<input type="password" name="newpassword1" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* ��ܰ��ʾ�����ǽ��ϸ���û����������Ͻ��б���
		</div>
		<script>
			function check_form(){
				 var frm = document.forms['form1'];
				 var oldpassword = frm.elements['oldpassword'].value;
				 var newpassword = frm.elements['newpassword'].value;
				  var newpassword1 = frm.elements['newpassword1'].value;
				 var errorMsg = '';
				  if (oldpassword.length == 0 ) {
					errorMsg += '* ������ɵĵ�¼����' + '\n';
				  }
				  if (newpassword.length == 0 ) {
					errorMsg += '* �����벻��Ϊ��' + '\n';
				  }
				   if (newpassword.length >15 || newpassword.length<6 ) {
					errorMsg += '* �����볤����6��15֮��' + '\n';
				  }
				    if (newpassword.length !=newpassword1.length) {
					errorMsg += '* �������벻һ��' + '\n';
				  }
				  if (errorMsg.length > 0){
					alert(errorMsg); return false;
				  } else{  
					return true;
				}
			
			}
		</script>
		<!--�޸ĵ�¼���� ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="paypwd"): ?>
		<!--�޸İ�ȫ���� ��ʼ-->
		<form action="" name="form1" method="post" onsubmit="return check_form()">
		<div class="user_help">�����벻Ҫ̫�򵥣���ɸ���һ�㣬������ĸ+����</div>
		<div class="user_right_border">
			<div class="l">ԭ�������룺</div>
			<div class="c">
				<input type="password" name="oldpassword" /> ������ԭ�������롣(��ʼ������������ע��ʱ�ĵ�¼����һ��)
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">�½������룺</div>
			<div class="c">
				<input type="password" name="newpassword" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">ȷ�Ͻ������룺</div>
			<div class="c">
				<input type="password" name="newpassword1" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> <a href="/index.php?user&q=code/user/getpaypwd">���ǽ������룿</a>
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* ��ܰ��ʾ�����ǽ��ϸ���û����������Ͻ��б���
		</div>
		<!--�޸İ�ȫ���� ����-->
		<script>
			function check_form(){
				 var frm = document.forms['form1'];
				 var oldpassword = frm.elements['oldpassword'].value;
				 var newpassword = frm.elements['newpassword'].value;
				  var newpassword1 = frm.elements['newpassword1'].value;
				 var errorMsg = '';
				  if (oldpassword.length == 0 ) {
					errorMsg += '* ����������룬���û���趨�������룬�������¼����' + '\n';
				  }
				  if (newpassword.length == 0 ) {
					errorMsg += '* �����벻��Ϊ��' + '\n';
				  }
				   if (newpassword.length >15 || newpassword.length<6 ) {
					errorMsg += '* �����볤����6��15֮��' + '\n';
				  }
				    if (newpassword.length !=newpassword1.length) {
					errorMsg += '* �������벻һ��' + '\n';
				  }
				  if (errorMsg.length > 0){
					alert(errorMsg); return false;
				  } else{  
					return true;
				}
			
			}
		</script>
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="getpaypwd"): ?>
		<!--�޸İ�ȫ���� ��ʼ-->
		<? if (!isset($_REQUEST['id'])) $_REQUEST['id']=''; ;if (  $_REQUEST['id']!=""): ?>
		<form action="" name="form1" method="post" onsubmit="return check_form()" >
		<div class="user_help">��������������֧������</div>
		<div class="user_right_border">
			<div class="l">���������룺</div>
			<div class="c">
				<input type="password" name="paypwd" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">����һ���������룺</div>
			<div class="c">
				<input type="password" name="paypwd1" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		</form>
		<script>
			function check_form(){
				 var frm = document.forms['form1'];
				 var newpassword = frm.elements['paypwd'].value;
				  var newpassword1 = frm.elements['paypwd1'].value;
				 var errorMsg = '';
				  if (newpassword.length == 0 ) {
					errorMsg += '* �����벻��Ϊ��' + '\n';
				  }
				   if (newpassword.length >15 || newpassword.length<6 ) {
					errorMsg += '* �����볤����6��15֮��' + '\n';
				  }
				    if (newpassword.length !=newpassword1.length) {
					errorMsg += '* �������벻һ��' + '\n';
				  }
				  if (errorMsg.length > 0){
					alert(errorMsg); return false;
				  } else{  
					return true;
				}
			
			}
		</script>
		<? else: ?>
		<form action="" name="form1" method="post" >
		<div class="user_help">���¼�����һ�</div>
		<div class="user_right_border">
			<div class="l">�������䣺</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		</form>
		<? endif; ?>
		<div class="user_right_foot">
		* ��ܰ��ʾ�����ǽ��ϸ���û����������Ͻ��б���
		</div>
		<!--�޸İ�ȫ���� ����-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="protection"): ?>
		<!--���뱣�� ��ʼ-->
		 <form action="" method="post">
		<? if (!isset($this->magic_vars['_U']['answer_type'])) $this->magic_vars['_U']['answer_type']='';if (!isset($this->magic_vars['_G']['user_result']['answer'])) $this->magic_vars['_G']['user_result']['answer']=''; ;if (  $this->magic_vars['_U']['answer_type']=="2" ||  $this->magic_vars['_G']['user_result']['answer'] == ""): ?>
		<div class="user_help">��ѡ��һ���µ��ʺű�������,������𰸡��ʺű�������Ϊ���Ժ����������롢��Ҫ���õȲ�����ʱ��,�ṩ��ȫ���ϡ� </div>
		<div class="user_right_border">
			<div class="l">��ѡ�����⣺</div>
			<div class="c">
				<script src="/plugins/index.php?q=linkage&name=question&nid=pwd_protection&isid=false"></script> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">������𰸣�</div>
			<div class="c">
				<input type="text" name="answer" /><input type="hidden" name="type" value="2" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">��֤�룺</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<? else: ?>
		<div class="user_help">���Ѿ����������뱣�����ܣ�����������ٽ����޸ġ� </div>
		<div class="user_right_border">
			<div class="l">��ѡ�����⣺</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['question'])) $this->magic_vars['_G']['user_result']['question'] = '';$_tmp = $this->magic_vars['_G']['user_result']['question'];$_tmp = $this->magic_modifier("linkage",$_tmp,"pwd_protection");echo $_tmp;unset($_tmp); ?> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">������𰸣�</div>
			<div class="c">
				<input type="text" name="answer" /> <input type="hidden" name="type" value="1" />
			</div>
		</div>
		
		<? endif; ?>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="ȷ���ύ" size="30" /> 
			</div>
		</div>
		<div class="user_right_foot">
		* ��ܰ��ʾ�����ǽ��ϸ���û����������Ͻ��б���
		</div>
		
		</form>
		<!--���뱣�� ����-->
		
		
		<!--�������� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="reginvite"): ?>
		<div class="user_help" > 
			��ܰ��ʾ���벻Ҫ���������Ÿ�����Ϥ����ʿ,��������˴�������Ҫ�����š�<br />
����±ߵ����ӵ�ַ�������ĺ��ѣ��������ͳ������������û���<br />
		</div><br />
		<div class="user_right_border">
			<div class="l">�������ӣ�</div>
			<div class="c">
				<textarea cols="40" rows="3" id="invite">http://<? if (!isset($_SERVER['SERVER_NAME'])) $_SERVER['SERVER_NAME'] = ''; echo $_SERVER['SERVER_NAME']; ?>/index.php?user&q=action/reg&invite=<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?></textarea> <input type="button" onclick="doCopy('invite')" value="����" />
			</div>
		</div><br /><br />
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >������ĺ��� </td>
					<td  >ע��ʱ�� </td>
					<td  >Ͷ��</td>
				</tr>

				<? $this->magic_vars['query_type']='GetFriendsInvite';$data = array('var'=>'loop','user_id'=>'0','showpage'=>'3','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetFriendsInvite($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['total_tender'])) $this->magic_vars['item']['total_tender'] = ''; echo $this->magic_vars['item']['total_tender']; ?>Ԫ</td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		
		<script>
		
		function doCopy(id) { 
		  var codeid;
		  codeid=id;
		 if (document.all){
		   var obj;
		   obj=document.getElementById(codeid);
		   window.clipboardData.setData("text",obj.innerText)
		   alert("�������ӵ�ַ���Ƴɹ��������ֱ�Ӹ��Ʒ�����ĺ���");
		 }
		 else{
		   alert("�˹���ֻ����IE����Ч\n\n�����ı�������Ctrl+Aѡ���ٸ���");
		 }
		}

		</script>
		
		<!--�������� ����-->
		
		<!--�������� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="request"): ?>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >�Է�����</td>
					<td  >����ʱ��</td>
					<td  >����˵��</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetFriendsRlist';$data = array('var'=>'loop','user_id'=>'0','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetFriendsRlist($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><a href="/u/<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></a></td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = ''; echo $this->magic_vars['item']['content']; ?></td>
					<td><a href="javascript:void(0)" onclick='tipsWindown("��Ϊ����","url:get?/index.php?user&q=code/user/raddfriend&username=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>",400,230,"true","","true","text");'>��Ϊ����</a>  <a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/delfriend&username=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>">ɾ������</a> </td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page"><? if (!isset($this->magic_vars['loop']['show_page'])) $this->magic_vars['loop']['show_page'] = ''; echo $this->magic_vars['loop']['show_page']; ?></div>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�������� ����-->
		
		<!--�ҵĺ��� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myfriend"): ?>
		
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		
		&nbsp; &nbsp; &nbsp; �û�����<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>" /> <input value="����" type="button" onclick="sousuo()"  />
		</div>
		
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >�Է�����</td>
					<td  >����ʱ��</td>
					<td  >����˵��</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetFriendsList';$data = array('var'=>'loop','user_id'=>'0','status'=>'1','showpage'=>'3','username'=>isset($_REQUEST['username'])?$_REQUEST['username']:'','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetFriendsList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><a href="/u/<? if (!isset($this->magic_vars['item']['friends_userid'])) $this->magic_vars['item']['friends_userid'] = ''; echo $this->magic_vars['item']['friends_userid']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?></a></td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['content'])) $this->magic_vars['item']['content'] = '';$_tmp = $this->magic_vars['item']['content'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
					<td><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/delfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">ɾ������</a>  <a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/blackfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">��Ϊ������</a></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--�ҵĺ��� ����-->
				<script>
var url = "<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type'] = ''; echo $this->magic_vars['_U']['query_type']; ?>";

function sousuo(){
	var $ = function(id){
		id = id.replace("#","");
		return document.getElementById(id)||"";
	}
	var _url = "";
	var dotime1 = $("#dotime1")?$("#dotime1").value:'';
	var keywords = $("#keywords")?$("#keywords").value:'';
	var username = $("#username")?$("#username").value:'';
	var dotime2 = $("#dotime2")?$("#dotime2").value:'';
	if (username!=null){
		 _url += "&username="+username;
	}
	if (keywords!=null){
		 _url += "&keywords="+keywords;
	}
	if (dotime1!=null){
		 _url += "&dotime1="+dotime1;
	}
	if (dotime2!=null){
		 _url += "&dotime2="+dotime2;
	}
	location.href=url+_url;
}

</script>

		
		<!--������ ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="black"): ?>
		<!--
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		�������ͣ�<script src="plugins/index.php?q=linkage&nid=friends_type&isid=false"></script>
		&nbsp; &nbsp; &nbsp; �û�����<input type="text" name="" /> <input value="����" type="submit" />
		</div>
		-->
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >�Է�����</td>
					<td  >����</td>
				</tr>
				<? $this->magic_vars['query_type']='GetFriendsList';$data = array('var'=>'loop','user_id'=>'0','status'=>'2','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetFriendsList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><a href="/u/<? if (!isset($this->magic_vars['item']['friends_userid'])) $this->magic_vars['item']['friends_userid'] = ''; echo $this->magic_vars['item']['friends_userid']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?></a></td>
					<td><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/delfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">ɾ������</a>  <a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/readdfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">���¼�Ϊ����</a></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page"><? if (!isset($this->magic_vars['loop']['show_page'])) $this->magic_vars['loop']['show_page'] = ''; echo $this->magic_vars['loop']['show_page']; ?></div>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--������ ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="realname"): ?>
		<!--�޸ĵ�¼���� ��ʼ-->
		<!--�޸ĵ�¼���� ��ʼ-->
		<? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status']=''; ;if (  $this->magic_vars['_G']['user_result']['real_status']==1): ?> 
		<div class="user_help">ע�⣺���Ѿ�ͨ����ʵ����֤����Ҫ�޸�����ͷ���ϵ��</div>
		<div class="user_right_border">
			<div class="l">�û�����</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">��ʵ������</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = '';$_tmp = $this->magic_vars['_G']['user_result']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?> ** 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">���֤���룺</div>
			<div class="c">
		<span id="num">	<? if (!isset($this->magic_vars['_G']['user_result']['card_id'])) $this->magic_vars['_G']['user_result']['card_id'] = '';$_tmp = $this->magic_vars['_G']['user_result']['card_id'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?></span>
			</div>
		</div>
                
		<script>

</script>

		<? else: ?>
		
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
		<form action="" name="form1" method="post" onsubmit="return check_form()" enctype="multipart/form-data">
		<div class="user_help">ע�⣺��������д���µ����ݣ�һ��ͨ��ʵ����֤������Ϣ�������޸ġ�</div>
		<div class="user_right_border">
			<div class="l">�û�����</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">��ʵ������</div>
			<div class="c">
				<input type="text" name="realname" value="<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = ''; echo $this->magic_vars['_G']['user_result']['realname']; ?>" /><font color="#FF0000">*</font> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">���֤���룺</div>
			<div class="c">
				<input type="text" name="card_id" value="<? if (!isset($this->magic_vars['_G']['user_result']['card_id'])) $this->magic_vars['_G']['user_result']['card_id'] = ''; echo $this->magic_vars['_G']['user_result']['card_id']; ?>" />  <font color="#FF0000">*</font> 
			</div>
		</div>
		<!-- 
		<div class="user_right_border">
			<div class="l">���֤�����ϴ���</div>
			<div class="c">

			<input type="file" name="card_pic1" size="20" class="input_border"/>

		 <? if (!isset($this->magic_vars['_G']['user_result']['card_pic1'])) $this->magic_vars['_G']['user_result']['card_pic1']=''; ;if (  $this->magic_vars['_G']['user_result']['card_pic1']!=""): ?><a href="./<? if (!isset($this->magic_vars['_G']['user_result']['card_pic1'])) $this->magic_vars['_G']['user_result']['card_pic1'] = ''; echo $this->magic_vars['_G']['user_result']['card_pic1']; ?>" target="_blank" title="��ͼƬ">
		 <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/ico_yes.gif" border="0"  /></a><? endif; ?>  <font color="#FF0000">*</font> 
	
			</div>
		</div>
		
		
	<div class="user_right_border">
			<div class="l">���֤�����ϴ���</div>
			<div class="c">

		<input type="file" name="card_pic2" size="20" class="input_border"/>
				
				 <? if (!isset($this->magic_vars['_G']['user_result']['card_pic2'])) $this->magic_vars['_G']['user_result']['card_pic2']=''; ;if (  $this->magic_vars['_G']['user_result']['card_pic2']!=""): ?><a href="./<? if (!isset($this->magic_vars['_G']['user_result']['card_pic2'])) $this->magic_vars['_G']['user_result']['card_pic2'] = ''; echo $this->magic_vars['_G']['user_result']['card_pic2']; ?>" target="_blank" title="��ͼƬ"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/ico_yes.gif" border="0"  /></a><? endif; ?>  <font color="#FF0000">*</font> 
			</div>
		</div>
		
		-->
		
		
		
		
		<div class="user_right_border">
			<div class="e"></div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money']=''; ;if (  $this->magic_vars['_G']['user_result']['use_money']>=0): ?><input type="submit" name="name" id="sub"  value="ȷ���ύ" size="30" /> <? else: ?> �������Ϊ<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = ''; echo $this->magic_vars['_G']['user_result']['use_money']; ?>,���� <a href="/index.php?user&q=code/account/recharge_new"><font color="#FF0000">��ֵ</font></a>��<? endif; ?>
			</div>
		</div>
		</form><? endif; ?>
		<div class="user_right_foot">
		* ��ܰ��ʾ�����ǽ��ϸ���û����������Ͻ��б���
		</div>
		<script>
			function check_form(){
				 var frm = document.forms['form1'];
				 var realname = frm.elements['realname'].value;
				 var birthday = frm.elements['birthday'].value;
				 var card_id = frm.elements['card_id'].value;
				 var area = frm.elements['area'].value;
				 var errorMsg = '';
				  if (realname.length == 0 ) {
					errorMsg += '* ��ʵ��������Ϊ��' + '\n';
				  }
				  if (birthday.length == 0 ) {
					birthday += '* ���ղ���Ϊ��' + '\n';
				  }
				  if (card_id.length == 0 ) {
					errorMsg += '* ֤�����벻��Ϊ��' + '\n';
				  }
				  if (area.length == 0 ) {
					errorMsg += '* ����д����' + '\n';
				  }
				   
				  if (errorMsg.length > 0){
					alert(errorMsg); return false;
				  } else{  
					return true;
				}
			
			}
		</script>
		<!--�޸ĵ�¼���� ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="email_status"): ?>
		<!--������֤ ��ʼ-->
		<? if (!isset($this->magic_vars['_G']['user_result']['email_status'])) $this->magic_vars['_G']['user_result']['email_status']=''; ;if (  $this->magic_vars['_G']['user_result']['email_status']==1): ?>
		<div class="user_help">���������Ѿ�ͨ����֤��<b><? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?></b> </div>
		
		<? else: ?>
		<div class="user_help">�������仹ûͨ����֤��<b><? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?></b></div>
		<div class="user_right_border">
			<div class="c">
				<form action="" method="post" onsubmit="this.elements['submit'].disabled='disabled';return true;">
				�������䣺<input type="text" name="email" value="<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?>" />  <input type="submit" name="submit" value="���¼���"  />
				</form>
			</div>
		</div>
		<? endif; ?>
		<!--������֤ ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="phone_status"): ?>
		<!--������֤ ��ʼ-->
		<? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']==1): ?>
		<div class="user_help">�����ֻ��Ѿ�ͨ����֤����֤���ֻ�����Ϊ��<b><? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = '';$_tmp = $this->magic_vars['_G']['user_result']['phone'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?></b></div>
		<? else: ?>
		<div class="user_help">
		<? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']!=0): ?>�����ֻ������Ѿ��ύ�������ĵȴ��ͷ���ˡ��ֻ��ţ�<font color="#FF0000"><? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = ''; echo $this->magic_vars['_G']['user_result']['phone']; ?></font>��<? else: ?>�����ֻ���ûͨ����֤��<span style="font-weight: bold;color: red">������ĵ绰�޷�������֤��,���������ֻ����벢�����ȡ��֤���,��ϵ�ͷ�Ϊ���˹����</span><? endif; ?></b></div>
		<? endif; ?>
		<div class="user_right_border">
			<div class="c">
			<? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']==1): ?>
			�ֻ����룺<? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = '';$_tmp = $this->magic_vars['_G']['user_result']['phone'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			<? else: ?>
            <? if (!isset($this->magic_vars['_G']['system']['con_auto_phone'])) $this->magic_vars['_G']['system']['con_auto_phone']=''; ;if (  $this->magic_vars['_G']['system']['con_auto_phone']==1): ?>
                
                <script type="text/javascript">
                    function GetAjaxObject(){
                        var ajaxObj = null;
                        try {
                            ajaxObj=new XMLHttpRequest();	// Firefox, Opera 8.0+, Safari
                        }catch (e){							// Internet Explorer
                            try	{
                                ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll�����ϰ汾
                            }catch (e){
                                ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6�����°汾
                            }
                        }
                        return ajaxObj;
                    }

                    var XMLHttp = null;
                    function sendSMS(){
                        XMLHttp = GetAjaxObject();
                        XMLHttp.open('post','/core/phone_ajax.php',true);
                        XMLHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                        XMLHttp.onreadystatechange = get_response;
                        var item_name = document.getElementById('item_name').value;
                        var phone     = document.getElementById('phone').value;
                        XMLHttp.send('item_name='+item_name+'&phone='+phone);
                    }

                    function get_response()
                    {
                        if (XMLHttp.readyState == 4)
                        {
                            document.getElementById('VerifySendResult').innerHTML = XMLHttp.responseText;
                        }
                    }
                </script>
                

				<form action="/index.php?user&q=code/user/phone_statusx" method="post">
                    �ֻ����룺<input type="text" name="phone" id="phone" value="<? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = ''; echo $this->magic_vars['_G']['user_result']['phone']; ?>" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
                    <input type="button" value="������Ϣ" id="getVerify" name="getVerify" value="��ȡ��֤��" onclick="sendSMS()" /><br /><br />
                    <input type="hidden" id="item_name" name="item_name" value="phone_approve_verify" />
                    ��֤�뷢��״̬:<span id="VerifySendResult">��δ���뷢����֤��</span><br />
                    �ֻ���֤��: <input type="text" id="phone_valicode" name="phone_valicode" onkeyup="this.value=this.value.replace(/\D/g,'')"/> <br /><br />
                    <input type="submit" name="tj" id="tj"  value="ȷ���ύ"/>
                </form>
			<? else: ?>
				<form action="/index.php?user&q=code/user/phone_statusx" method="post">
                    �ֻ����룺<input type="text" name="phone" id="phonesd" value="<? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = ''; echo $this->magic_vars['_G']['user_result']['phone']; ?>" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
                    <input type="submit" class="botton" value="ȷ���ύ"/><br /><br />
                </form>
            <? endif; ?>
         
			<? endif; ?>
			</div>
		</div>
		<!--������֤ ����-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="video_status"): ?>
		<!--��Ƶ��֤ ��ʼ-->
		<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_result']['vip_status']!=1): ?>
		<div class="user_help">�㻹����VIP��Ա��������Ƶ��֤��</a>
		<div class="c">
			��Ҫ�����ΪVIP��Ա����㰴ť�ύ��VIP����ҳ��<input type="button" onclick="javacript:location.href='/vip/main.html'" value="����VIP��Ա"  /><br /><br /></form>

			</div>
		</div>

		<? if (!isset($this->magic_vars['_G']['user_result']['video_status'])) $this->magic_vars['_G']['user_result']['video_status']=''; ;elseif (  $this->magic_vars['_G']['user_result']['video_status']==1): ?>
		<div class="user_help">���Ѿ�ͨ������Ƶ��֤</div>
		<? else: ?>
		<div class="user_help">
		<? if (!isset($this->magic_vars['_G']['user_result']['video_status'])) $this->magic_vars['_G']['user_result']['video_status']=''; ;if (  $this->magic_vars['_G']['user_result']['video_status']!=0): ?>������Ƶ��֤�Ѿ��ύ���ͷ���Ա�ἰʱ�ĸ�����ϵ��</font>��<? else: ?>��ӭ������Ƶ��֤��<div class="user_right_border">
			<div class="c">
				<form action="" method="post">
				
				<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money']=''; ;if (  $this->magic_vars['_G']['user_result']['use_money'] >0): ?>�������Ҫ��Ƶ��֤����㰴ť�ύ��<input type="submit" value="�ύ����" name="submit" /><br /><br /><? else: ?><a href="/index.php?user&q=code/account/recharge_new"><font color="#FF0000">���ȳ�ֵ</font></a><? endif; ?></form>

			</div>
		</div><? endif; ?></div>
		<? endif; ?>
		<!--��Ƶ��֤ ����-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="scene_status"): ?>
		<!--��Ƶ��֤ ��ʼ-->
		<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_result']['vip_status']!=1): ?>
		<div class="user_help">�㻹����VIP��Ա�������ֳ���֤��</a>
		<div class="c">
			��Ҫ�����ΪVIP��Ա����㰴ť�ύ��VIP����ҳ��<input type="button" onclick="javacript:location.href='/vip/main.html'" value="����VIP��Ա"  /><br /><br /></form>

			</div>
		</div>
		<? if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;elseif (  $this->magic_vars['_G']['user_result']['scene_status']==1): ?>
		<div class="user_help">���Ѿ�ͨ�����ֳ���֤</b></div>
		<? else: ?>
		<div class="user_help">�������Ҫ�ֳ���֤����������˾��ַ��
		</div>
		<? endif; ?>
		<!--��Ƶ��֤ ����-->
		
		
		
		<!--���û��� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit"): ?>
		<div class="user_help" > 
		<strong>�����ܵ÷֣�</strong> <font size="3" color="#FF0000"><strong><? if (!isset($this->magic_vars['_U']['user_cache']['credit'])) $this->magic_vars['_U']['user_cache']['credit'] = ''; echo $this->magic_vars['_U']['user_cache']['credit']; ?></strong></font>  <? if (!isset($this->magic_vars['_U']['user_cache']['credit'])) $this->magic_vars['_U']['user_cache']['credit'] = '';$_tmp = $this->magic_vars['_U']['user_cache']['credit'];$_tmp = $this->magic_modifier("credit",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >��������</td>
					<td  >����</td>
					<td  >��ע</td>
				</tr>
				<? $this->magic_vars['query_type']='GetLogList';$data = array('limit'=>'all','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/credit/credit.class.php');$this->magic_vars['magic_result'] = creditClass::GetLogList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
				<tr >
					<td><? if (!isset($this->magic_vars['var']['type_name'])) $this->magic_vars['var']['type_name'] = ''; echo $this->magic_vars['var']['type_name']; ?></td>
					<td><? if (!isset($this->magic_vars['var']['value'])) $this->magic_vars['var']['value'] = ''; echo $this->magic_vars['var']['value']; ?> ��</td>
					<td><? if (!isset($this->magic_vars['var']['remark'])) $this->magic_vars['var']['remark'] = ''; echo $this->magic_vars['var']['remark']; ?></td>
				</tr>
				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page"><? if (!isset($this->magic_vars['_U']['show_page'])) $this->magic_vars['_U']['show_page'] = ''; echo $this->magic_vars['_U']['show_page']; ?></div>
					</td>
				</tr>
			</form>	
		</table>
		<!--���û��� ����-->
		<!--Ͷ����� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit_invest"): ?>
		<div class="user_help" > 
		<strong>�����ܻ��֣�</strong> <font size="3" color="#FF0000"><strong><? if (!isset($this->magic_vars['_G']['user_result']['get_all_integral'])) $this->magic_vars['_G']['user_result']['get_all_integral']=''; ;if ( empty( $this->magic_vars['_G']['user_result']['get_all_integral'])): ?>0<? else: ?><? if (!isset($this->magic_vars['_G']['user_result']['get_all_integral'])) $this->magic_vars['_G']['user_result']['get_all_integral'] = ''; echo $this->magic_vars['_G']['user_result']['get_all_integral']; ?><? endif; ?></strong></font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/integral/convert_log/main.html">���ֶһ���¼</a>
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >����</td>
					<!-- <td  >Ͷ����</td> -->
					<td  >���ֱ仯</td>
					<td  >ʱ��</td>
					<td  >��ע</td>
				</tr>
				<? $this->magic_vars['query_type']='GetIntegralLog';$data = array('var'=>'loop','showpage'=>'3','user_id'=>$this->magic_vars['_G']['user_id'],'get_invest_integral_log'=>'1','id_order'=>'desc');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetIntegralLog($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']=='1'): ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank" title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"20");echo $_tmp;unset($_tmp); ?></a><? else: ?><? if (!isset($this->magic_vars['item']['integral_name'])) $this->magic_vars['item']['integral_name'] = ''; echo $this->magic_vars['item']['integral_name']; ?><? endif; ?></td>
					<!-- <td><? if (!isset($this->magic_vars['item']['tender_account'])) $this->magic_vars['item']['tender_account'] = ''; echo $this->magic_vars['item']['tender_account']; ?> Ԫ</td> -->
					<td><? if (!isset($this->magic_vars['item']['invest_integral'])) $this->magic_vars['item']['invest_integral'] = ''; echo $this->magic_vars['item']['invest_integral']; ?> ��</td>
					<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
					<td><? if (!isset($this->magic_vars['item']['remark'])) $this->magic_vars['item']['remark'] = ''; echo $this->magic_vars['item']['remark']; ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
					</td>
				</tr>
				<? unset($_magic_vars); ?>
			</form>	
		</table>
		<!--Ͷ����� ����-->
		<!--���û��� ��ʼ-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser"): ?>
		<div class="user_help" > 
		<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','epage'=>'20','kefu_userid'=>$this->magic_vars['_G']['user_id'],'showpage'=>'3');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
			
		<strong>�ܿͻ���</strong> <? if (!isset($this->magic_vars['loop']['total'])) $this->magic_vars['loop']['total'] = ''; echo $this->magic_vars['loop']['total']; ?> ��
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >�û���</td>
					<td  >��ʵ����</td>
					<td  >�Ա�</td>
					<td  >�绰</td>
					<td  >QQ</td>
					<td  >����</td>
					<td  >���ڵ�</td>
					<td  >����</td>
				</tr>
					<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><A href="/u/<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></A></td>
					<td><a href="/index.php?user&q=code/borrow/myuser&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>"><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></a> </td>
					<td><? if (!isset($this->magic_vars['item']['sex'])) $this->magic_vars['item']['sex']=''; ;if (  $this->magic_vars['item']['sex']==1): ?>��<? else: ?>Ů<? endif; ?></td>
					<td><? if (!isset($this->magic_vars['item']['phone'])) $this->magic_vars['item']['phone'] = ''; echo $this->magic_vars['item']['phone']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['qq'])) $this->magic_vars['item']['qq'] = ''; echo $this->magic_vars['item']['qq']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['email'])) $this->magic_vars['item']['email'] = ''; echo $this->magic_vars['item']['email']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['area'])) $this->magic_vars['item']['area'] = '';$_tmp = $this->magic_vars['item']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td><a href="index.php?user&q=code/attestation/myuser&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>">����֤��</a> | <a href="index.php?user&q=code/borrow/myuserrepay&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>">������ϸ</a></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page">��<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
					</td>
				</tr>
			</form>	
		</table>
		<? unset($_magic_vars); ?>
		<!--���û��� ����-->
		
		<? endif; ?>
</div>
</div></div>
<!--�û����ĵ�����Ŀ ����-->
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>