<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<!--用户中心的主栏目 开始-->
<div class="wrap950 ">
	<!--左边的导航 开始-->
	<div class="user_left">
		<? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
	</div>
	<!--左边的导航 结束-->
	
	<!--右边的内容 开始-->
	<div class="user_right">
		<div class="user_right_menu">
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="userpwd" ||  $this->magic_vars['_U']['query_type']=="paypwd" ||  $this->magic_vars['_U']['query_type']=="protection" ||  $this->magic_vars['_U']['query_type']=="getpaypwd"): ?>
			<ul>
				<li class="title" ><a href="/index.php?user&q=code/user/userpwd">安全信息</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="userpwd"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/userpwd">登录密码</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="paypwd" ||  $this->magic_vars['_U']['query_type']=="getpaypwd"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/paypwd">交易密码</a></li>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="reginvite"  ||  $this->magic_vars['_U']['query_type']=="request" ||  $this->magic_vars['_U']['query_type']=="myfriend" ||  $this->magic_vars['_U']['query_type']=="black"): ?>
			<ul>
				<li style="position: relative; left:10px;" <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="reginvite"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/reginvite">邀请好友</a></li>
				<!--<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="request"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/request">好友请求</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="myfriend"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myfriend">我的好友</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="black"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/black">黑名单</a></li>-->
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit"): ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/credit">信用积分记录</a></li>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit_invest"): ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/credit_invest">投标积分记录</a></li>
			</ul>
			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser"): ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myuser">客户管理</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="myuser"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/myuser">我的客服</a></li>
				<li ><a href="index.php?user&q=code/borrow/myuser">客户借款</a></li>
				<li ><a href="index.php?user&q=code/borrow/myuser_account">统计信息</a></li>
			</ul>
			<? else: ?>
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">修改个人信息 </a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="realname"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/realname">实名认证</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="email_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/email_status">邮箱认证</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="phone_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/phone_status">手机认证</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="video_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/video_status">视频认证</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="scene_status"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/scene_status">现场认证</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="avatar"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/avatar">头像信息</a></li>
				<!--<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="privacy"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/privacy">设置隐私</a></li>-->
			</ul>
			<? endif; ?>
		</div>
		
		<div class="user_right_main">
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="avatar"): ?>
		<!--头像 开始-->
		<div class="user_help">请上传你网站的头像</div>
		<div><img src="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = '';$_tmp = $this->magic_vars['_G']['user_id'];$_tmp = $this->magic_modifier("avatar",$_tmp,"");$_tmp = $this->magic_modifier("imgurl_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>" /></div>
		<div> <? 
 require_once(ROOT_PATH.'plugins/avatar/configs.php');
require_once(ROOT_PATH.'plugins/avatar/avatar.class.php');
$objAvatar = new Avatar();
echo $objAvatar->uc_avatar($this->magic_vars['_G']['user_id'], 'virtual');
?></div>
		<div class="user_right_foot">
		* 温馨提示：头像现在有三种，大，中，小
		</div>
		<!--头像 结束-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="privacy"): ?>
		<div class="user_help">设置个人的隐私</div>
		<form action="" method="post">
		<div class="user_main_title">我的主页</div>
		<div class="user_right_border">
			<div class="e">好友列表：</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=friend&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['friend'])) $this->magic_vars['_U']['user_privacy']['friend'] = ''; echo $this->magic_vars['_U']['user_privacy']['friend']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">好友评论：</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=friend_comment&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['friend_comment'])) $this->magic_vars['_U']['user_privacy']['friend_comment'] = ''; echo $this->magic_vars['_U']['user_privacy']['friend_comment']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">借款列表：</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=borrow_list&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['borrow_list'])) $this->magic_vars['_U']['user_privacy']['borrow_list'] = ''; echo $this->magic_vars['_U']['user_privacy']['borrow_list']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">投标记录：</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=loan_log&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['loan_log'])) $this->magic_vars['_U']['user_privacy']['loan_log'] = ''; echo $this->magic_vars['_U']['user_privacy']['loan_log']; ?>"></script>
			</div>
		</div>
			
		
		<div class="user_main_title">站内信/加为好友</div>
		<div class="user_right_border">
			<div class="e">谁可以给我发站内信：</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=sent_msg&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['sent_msg'])) $this->magic_vars['_U']['user_privacy']['sent_msg'] = ''; echo $this->magic_vars['_U']['user_privacy']['sent_msg']; ?>"></script>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">谁可以向我发好友申请：</div>
			<div class="c">
				<script src="plugins/index.php?q=linkage&nid=yinsi&name=friend_request&isid=false&value=<? if (!isset($this->magic_vars['_U']['user_privacy']['friend_request'])) $this->magic_vars['_U']['user_privacy']['friend_request'] = ''; echo $this->magic_vars['_U']['user_privacy']['friend_request']; ?>"></script>
			</div>
		</div>
		
		
		<div class="user_main_title">黑名单</div>
		<div class="user_right_border">
			<div class="e">谁可以看我的黑名单：</div>
			<div class="c">
				<select name="look_black">
					<option value="0" <? if (!isset($this->magic_vars['_U']['user_privacy']['look_black'])) $this->magic_vars['_U']['user_privacy']['look_black']=''; ;if (  $this->magic_vars['_U']['user_privacy']['look_black']==0): ?> selected="selected"<? endif; ?>>不允许我的好友查看我的黑名单</option>
					<option value="1" <? if (!isset($this->magic_vars['_U']['user_privacy']['look_black'])) $this->magic_vars['_U']['user_privacy']['look_black']=''; ;if (  $this->magic_vars['_U']['user_privacy']['look_black']==1): ?> selected="selected"<? endif; ?>>允许我的好友查看我的黑名单</option>
					<option value="2"<? if (!isset($this->magic_vars['_U']['user_privacy']['look_black'])) $this->magic_vars['_U']['user_privacy']['look_black']=''; ;if (  $this->magic_vars['_U']['user_privacy']['look_black']==2): ?> selected="selected"<? endif; ?>>仅允许我同意的好友查看我的黑名单</option>
				</select>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e">允许黑名单向我发内信：</div>
			<div class="c">
				<input type="radio" name="allow_black_sent" value="1" <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_sent'])) $this->magic_vars['_U']['user_privacy']['allow_black_sent']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_sent']==1): ?> checked="checked"<? endif; ?>/> 允许 <input type="radio" name="allow_black_sent" value="0"   <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_sent'])) $this->magic_vars['_U']['user_privacy']['allow_black_sent']='';if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_sent'])) $this->magic_vars['_U']['user_privacy']['allow_black_sent']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_sent']==0 ||  $this->magic_vars['_U']['user_privacy']['allow_black_sent']==""): ?> checked="checked"<? endif; ?> /> 不允许 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e">允许黑名单向我发送好友请求：</div>
			<div class="c">
				<input type="radio" name="allow_black_request" value="1"  <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_request'])) $this->magic_vars['_U']['user_privacy']['allow_black_request']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_request']==1): ?> checked="checked"<? endif; ?>/> 允许 <input type="radio" name="allow_black_request" value="0" <? if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_request'])) $this->magic_vars['_U']['user_privacy']['allow_black_request']='';if (!isset($this->magic_vars['_U']['user_privacy']['allow_black_request'])) $this->magic_vars['_U']['user_privacy']['allow_black_request']=''; ;if (  $this->magic_vars['_U']['user_privacy']['allow_black_request']==0 ||  $this->magic_vars['_U']['user_privacy']['allow_black_request']==""): ?> checked="checked"<? endif; ?>/> 不允许 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="e"></div>
			<div class="c">
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
		
		<div class="user_right_foot">
		* 温馨提示：请保护好自己的隐私
		</div>
		<!--账号充值 结束-->
		
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="userpwd"): ?>
		<!--修改登录密码 开始-->
		<form action="" name="form1" method="post" onsubmit="return check_form()">
		<div class="user_help">密码请不要太简单，设成复杂一点，做好字母+符号</div>
		<div class="user_right_border">
			<div class="e">原始密码：</div>
			<div class="c">
				<input type="password" name="oldpassword" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e">新密码：</div>
			<div class="c">
				<input type="password" name="newpassword" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e">确认密码：</div>
			<div class="c">
				<input type="password" name="newpassword1" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="e"></div>
			<div class="c">
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* 温馨提示：我们将严格对用户的所有资料进行保密
		</div>
		<script>
			function check_form(){
				 var frm = document.forms['form1'];
				 var oldpassword = frm.elements['oldpassword'].value;
				 var newpassword = frm.elements['newpassword'].value;
				  var newpassword1 = frm.elements['newpassword1'].value;
				 var errorMsg = '';
				  if (oldpassword.length == 0 ) {
					errorMsg += '* 请输入旧的登录密码' + '\n';
				  }
				  if (newpassword.length == 0 ) {
					errorMsg += '* 新密码不能为空' + '\n';
				  }
				   if (newpassword.length >15 || newpassword.length<6 ) {
					errorMsg += '* 新密码长度在6到15之间' + '\n';
				  }
				    if (newpassword.length !=newpassword1.length) {
					errorMsg += '* 两次密码不一样' + '\n';
				  }
				  if (errorMsg.length > 0){
					alert(errorMsg); return false;
				  } else{  
					return true;
				}
			
			}
		</script>
		<!--修改登录密码 结束-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="paypwd"): ?>
		<!--修改安全密码 开始-->
		<form action="" name="form1" method="post" onsubmit="return check_form()">
		<div class="user_help">密码请不要太简单，设成复杂一点，做好字母+符号</div>
		<div class="user_right_border">
			<div class="l">原交易密码：</div>
			<div class="c">
				<input type="password" name="oldpassword" /> 请输入原交易密码。(初始交易密码与您注册时的登录密码一致)
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">新交易密码：</div>
			<div class="c">
				<input type="password" name="newpassword" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">确认交易密码：</div>
			<div class="c">
				<input type="password" name="newpassword1" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="确认提交" size="30" /> <a href="/index.php?user&q=code/user/getpaypwd">忘记交易密码？</a>
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* 温馨提示：我们将严格对用户的所有资料进行保密
		</div>
		<!--修改安全密码 结束-->
		<script>
			function check_form(){
				 var frm = document.forms['form1'];
				 var oldpassword = frm.elements['oldpassword'].value;
				 var newpassword = frm.elements['newpassword'].value;
				  var newpassword1 = frm.elements['newpassword1'].value;
				 var errorMsg = '';
				  if (oldpassword.length == 0 ) {
					errorMsg += '* 请输入旧密码，如果没有设定交易密码，请输入登录密码' + '\n';
				  }
				  if (newpassword.length == 0 ) {
					errorMsg += '* 新密码不能为空' + '\n';
				  }
				   if (newpassword.length >15 || newpassword.length<6 ) {
					errorMsg += '* 新密码长度在6到15之间' + '\n';
				  }
				    if (newpassword.length !=newpassword1.length) {
					errorMsg += '* 两次密码不一样' + '\n';
				  }
				  if (errorMsg.length > 0){
					alert(errorMsg); return false;
				  } else{  
					return true;
				}
			
			}
		</script>
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="getpaypwd"): ?>
		<!--修改安全密码 开始-->
		<? if (!isset($_REQUEST['id'])) $_REQUEST['id']=''; ;if (  $_REQUEST['id']!=""): ?>
		<form action="" name="form1" method="post" onsubmit="return check_form()" >
		<div class="user_help">请重新输入您的支付密码</div>
		<div class="user_right_border">
			<div class="l">请输入密码：</div>
			<div class="c">
				<input type="password" name="paypwd" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">请再一次输入密码：</div>
			<div class="c">
				<input type="password" name="paypwd1" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="确认提交" size="30" /> 
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
					errorMsg += '* 新密码不能为空' + '\n';
				  }
				   if (newpassword.length >15 || newpassword.length<6 ) {
					errorMsg += '* 新密码长度在6到15之间' + '\n';
				  }
				    if (newpassword.length !=newpassword1.length) {
					errorMsg += '* 两次密码不一样' + '\n';
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
		<div class="user_help">请登录邮箱找回</div>
		<div class="user_right_border">
			<div class="l">您的邮箱：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
		<? endif; ?>
		<div class="user_right_foot">
		* 温馨提示：我们将严格对用户的所有资料进行保密
		</div>
		<!--修改安全密码 结束-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="protection"): ?>
		<!--密码保护 开始-->
		 <form action="" method="post">
		<? if (!isset($this->magic_vars['_U']['answer_type'])) $this->magic_vars['_U']['answer_type']='';if (!isset($this->magic_vars['_G']['user_result']['answer'])) $this->magic_vars['_G']['user_result']['answer']=''; ;if (  $this->magic_vars['_U']['answer_type']=="2" ||  $this->magic_vars['_G']['user_result']['answer'] == ""): ?>
		<div class="user_help">请选择一个新的帐号保护问题,并输入答案。帐号保护可以为您以后在忘记密码、重要设置等操作的时候,提供安全保障。 </div>
		<div class="user_right_border">
			<div class="l">请选择问题：</div>
			<div class="c">
				<script src="/plugins/index.php?q=linkage&name=question&nid=pwd_protection&isid=false"></script> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">请输入答案：</div>
			<div class="c">
				<input type="text" name="answer" /><input type="hidden" name="type" value="2" /> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">验证码：</div>
			<div class="c">
				<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
			</div>
		</div>
		<? else: ?>
		<div class="user_help">您已经设置了密码保护功能，请先输入答案再进行修改。 </div>
		<div class="user_right_border">
			<div class="l">请选择问题：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['question'])) $this->magic_vars['_G']['user_result']['question'] = '';$_tmp = $this->magic_vars['_G']['user_result']['question'];$_tmp = $this->magic_modifier("linkage",$_tmp,"pwd_protection");echo $_tmp;unset($_tmp); ?> 
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">请输入答案：</div>
			<div class="c">
				<input type="text" name="answer" /> <input type="hidden" name="type" value="1" />
			</div>
		</div>
		
		<? endif; ?>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit" name="name"  value="确认提交" size="30" /> 
			</div>
		</div>
		<div class="user_right_foot">
		* 温馨提示：我们将严格对用户的所有资料进行保密
		</div>
		
		</form>
		<!--密码保护 结束-->
		
		
		<!--好友邀请 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="reginvite"): ?>
		<div class="user_help" > 
			温馨提示：请不要发送邀请信给不熟悉的人士,避免给别人带来不必要的困扰。<br />
请把下边的链接地址发给您的好友，这样您就成了他的上线用户。<br />
		</div><br />
		<div class="user_right_border">
			<div class="l">邀请链接：</div>
			<div class="c">
				<textarea cols="40" rows="3" id="invite">http://<? if (!isset($_SERVER['SERVER_NAME'])) $_SERVER['SERVER_NAME'] = ''; echo $_SERVER['SERVER_NAME']; ?>/index.php?user&q=action/reg&invite=<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = ''; echo $this->magic_vars['_G']['user_id']; ?></textarea> <input type="button" onclick="doCopy('invite')" value="复制" />
			</div>
		</div><br /><br />
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >我邀请的好友 </td>
					<td  >注册时间 </td>
					<td  >投资</td>
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
					<td><? if (!isset($this->magic_vars['item']['total_tender'])) $this->magic_vars['item']['total_tender'] = ''; echo $this->magic_vars['item']['total_tender']; ?>元</td>
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
		   alert("邀请链接地址复制成功，你可以直接复制发给你的好友");
		 }
		 else{
		   alert("此功能只能在IE上有效\n\n请在文本域中用Ctrl+A选择再复制");
		 }
		}

		</script>
		
		<!--好友请求 结束-->
		
		<!--好友请求 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="request"): ?>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >对方名称</td>
					<td  >请求时间</td>
					<td  >请求说明</td>
					<td  >操作</td>
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
					<td><a href="javascript:void(0)" onclick='tipsWindown("加为好友","url:get?/index.php?user&q=code/user/raddfriend&username=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>",400,230,"true","","true","text");'>加为好友</a>  <a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/delfriend&username=<? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?>">删除好友</a> </td>
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
		<!--好友请求 结束-->
		
		<!--我的好友 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myfriend"): ?>
		
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		
		&nbsp; &nbsp; &nbsp; 用户名：<input type="text" name="username" id="username" value="<? if (!isset($_REQUEST['username'])) $_REQUEST['username'] = ''; echo $_REQUEST['username']; ?>" /> <input value="搜索" type="button" onclick="sousuo()"  />
		</div>
		
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >对方名称</td>
					<td  >请求时间</td>
					<td  >请求说明</td>
					<td  >操作</td>
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
					<td><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/delfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">删除好友</a>  <a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/blackfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">设为黑名单</a></td>
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
		<!--我的好友 结束-->
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

		
		<!--黑名单 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="black"): ?>
		<!--
		<div class="user_main_title" style="height:30px; padding-top:7px;"> 
		好友类型：<script src="plugins/index.php?q=linkage&nid=friends_type&isid=false"></script>
		&nbsp; &nbsp; &nbsp; 用户名：<input type="text" name="" /> <input value="搜索" type="submit" />
		</div>
		-->
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >对方名称</td>
					<td  >操作</td>
				</tr>
				<? $this->magic_vars['query_type']='GetFriendsList';$data = array('var'=>'loop','user_id'=>'0','status'=>'2','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetFriendsList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><a href="/u/<? if (!isset($this->magic_vars['item']['friends_userid'])) $this->magic_vars['item']['friends_userid'] = ''; echo $this->magic_vars['item']['friends_userid']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?></a></td>
					<td><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/delfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">删除好友</a>  <a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/readdfriend&username=<? if (!isset($this->magic_vars['item']['friend_username'])) $this->magic_vars['item']['friend_username'] = ''; echo $this->magic_vars['item']['friend_username']; ?>">重新加为好友</a></td>
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
		<!--黑名单 结束-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="realname"): ?>
		<!--修改登录密码 开始-->
		<!--修改登录密码 开始-->
		<? if (!isset($this->magic_vars['_G']['user_result']['real_status'])) $this->magic_vars['_G']['user_result']['real_status']=''; ;if (  $this->magic_vars['_G']['user_result']['real_status']==1): ?> 
		<div class="user_help">注意：您已经通过了实名认证，如要修改请跟客服联系。</div>
		<div class="user_right_border">
			<div class="l">用户名：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">真实姓名：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = '';$_tmp = $this->magic_vars['_G']['user_result']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?> ** 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">身份证号码：</div>
			<div class="c">
		<span id="num">	<? if (!isset($this->magic_vars['_G']['user_result']['card_id'])) $this->magic_vars['_G']['user_result']['card_id'] = '';$_tmp = $this->magic_vars['_G']['user_result']['card_id'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?></span>
			</div>
		</div>
                
		<script>

</script>

		<? else: ?>
		
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
		<form action="" name="form1" method="post" onsubmit="return check_form()" enctype="multipart/form-data">
		<div class="user_help">注意：请认真填写以下的内容，一旦通过实名认证以下信息将不能修改。</div>
		<div class="user_right_border">
			<div class="l">用户名：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">真实姓名：</div>
			<div class="c">
				<input type="text" name="realname" value="<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = ''; echo $this->magic_vars['_G']['user_result']['realname']; ?>" /><font color="#FF0000">*</font> 
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">身份证号码：</div>
			<div class="c">
				<input type="text" name="card_id" value="<? if (!isset($this->magic_vars['_G']['user_result']['card_id'])) $this->magic_vars['_G']['user_result']['card_id'] = ''; echo $this->magic_vars['_G']['user_result']['card_id']; ?>" />  <font color="#FF0000">*</font> 
			</div>
		</div>
		<!-- 
		<div class="user_right_border">
			<div class="l">身份证正面上传：</div>
			<div class="c">

			<input type="file" name="card_pic1" size="20" class="input_border"/>

		 <? if (!isset($this->magic_vars['_G']['user_result']['card_pic1'])) $this->magic_vars['_G']['user_result']['card_pic1']=''; ;if (  $this->magic_vars['_G']['user_result']['card_pic1']!=""): ?><a href="./<? if (!isset($this->magic_vars['_G']['user_result']['card_pic1'])) $this->magic_vars['_G']['user_result']['card_pic1'] = ''; echo $this->magic_vars['_G']['user_result']['card_pic1']; ?>" target="_blank" title="有图片">
		 <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/ico_yes.gif" border="0"  /></a><? endif; ?>  <font color="#FF0000">*</font> 
	
			</div>
		</div>
		
		
	<div class="user_right_border">
			<div class="l">身份证背面上传：</div>
			<div class="c">

		<input type="file" name="card_pic2" size="20" class="input_border"/>
				
				 <? if (!isset($this->magic_vars['_G']['user_result']['card_pic2'])) $this->magic_vars['_G']['user_result']['card_pic2']=''; ;if (  $this->magic_vars['_G']['user_result']['card_pic2']!=""): ?><a href="./<? if (!isset($this->magic_vars['_G']['user_result']['card_pic2'])) $this->magic_vars['_G']['user_result']['card_pic2'] = ''; echo $this->magic_vars['_G']['user_result']['card_pic2']; ?>" target="_blank" title="有图片"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/ico_yes.gif" border="0"  /></a><? endif; ?>  <font color="#FF0000">*</font> 
			</div>
		</div>
		
		-->
		
		
		
		
		<div class="user_right_border">
			<div class="e"></div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money']=''; ;if (  $this->magic_vars['_G']['user_result']['use_money']>=0): ?><input type="submit" name="name" id="sub"  value="确认提交" size="30" /> <? else: ?> 您的余额为<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money'] = ''; echo $this->magic_vars['_G']['user_result']['use_money']; ?>,请先 <a href="/index.php?user&q=code/account/recharge_new"><font color="#FF0000">充值</font></a>。<? endif; ?>
			</div>
		</div>
		</form><? endif; ?>
		<div class="user_right_foot">
		* 温馨提示：我们将严格对用户的所有资料进行保密
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
					errorMsg += '* 真实姓名不能为空' + '\n';
				  }
				  if (birthday.length == 0 ) {
					birthday += '* 生日不能为空' + '\n';
				  }
				  if (card_id.length == 0 ) {
					errorMsg += '* 证件号码不能为空' + '\n';
				  }
				  if (area.length == 0 ) {
					errorMsg += '* 请填写籍贯' + '\n';
				  }
				   
				  if (errorMsg.length > 0){
					alert(errorMsg); return false;
				  } else{  
					return true;
				}
			
			}
		</script>
		<!--修改登录密码 结束-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="email_status"): ?>
		<!--邮箱认证 开始-->
		<? if (!isset($this->magic_vars['_G']['user_result']['email_status'])) $this->magic_vars['_G']['user_result']['email_status']=''; ;if (  $this->magic_vars['_G']['user_result']['email_status']==1): ?>
		<div class="user_help">您的邮箱已经通过认证：<b><? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?></b> </div>
		
		<? else: ?>
		<div class="user_help">您的邮箱还没通过认证：<b><? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?></b></div>
		<div class="user_right_border">
			<div class="c">
				<form action="" method="post" onsubmit="this.elements['submit'].disabled='disabled';return true;">
				重设邮箱：<input type="text" name="email" value="<? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?>" />  <input type="submit" name="submit" value="重新激活"  />
				</form>
			</div>
		</div>
		<? endif; ?>
		<!--邮箱认证 结束-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="phone_status"): ?>
		<!--邮箱认证 开始-->
		<? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']==1): ?>
		<div class="user_help">您的手机已经通过认证，认证的手机号码为：<b><? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = '';$_tmp = $this->magic_vars['_G']['user_result']['phone'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?></b></div>
		<? else: ?>
		<div class="user_help">
		<? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']!=0): ?>您的手机号码已经提交，请耐心等待客服审核。手机号：<font color="#FF0000"><? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = ''; echo $this->magic_vars['_G']['user_result']['phone']; ?></font>。<? else: ?>您的手机还没通过认证。<span style="font-weight: bold;color: red">如果您的电话无法接收验证码,请您输入手机号码并点击获取验证码后,联系客服为您人工审核</span><? endif; ?></b></div>
		<? endif; ?>
		<div class="user_right_border">
			<div class="c">
			<? if (!isset($this->magic_vars['_G']['user_result']['phone_status'])) $this->magic_vars['_G']['user_result']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_result']['phone_status']==1): ?>
			手机号码：<? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = '';$_tmp = $this->magic_vars['_G']['user_result']['phone'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?>
			<? else: ?>
            <? if (!isset($this->magic_vars['_G']['system']['con_auto_phone'])) $this->magic_vars['_G']['system']['con_auto_phone']=''; ;if (  $this->magic_vars['_G']['system']['con_auto_phone']==1): ?>
                
                <script type="text/javascript">
                    function GetAjaxObject(){
                        var ajaxObj = null;
                        try {
                            ajaxObj=new XMLHttpRequest();	// Firefox, Opera 8.0+, Safari
                        }catch (e){							// Internet Explorer
                            try	{
                                ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll或以上版本
                            }catch (e){
                                ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6或以下版本
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
                    手机号码：<input type="text" name="phone" id="phone" value="<? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = ''; echo $this->magic_vars['_G']['user_result']['phone']; ?>" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
                    <input type="button" value="发送信息" id="getVerify" name="getVerify" value="获取验证码" onclick="sendSMS()" /><br /><br />
                    <input type="hidden" id="item_name" name="item_name" value="phone_approve_verify" />
                    验证码发送状态:<span id="VerifySendResult">尚未申请发送验证码</span><br />
                    手机验证码: <input type="text" id="phone_valicode" name="phone_valicode" onkeyup="this.value=this.value.replace(/\D/g,'')"/> <br /><br />
                    <input type="submit" name="tj" id="tj"  value="确认提交"/>
                </form>
			<? else: ?>
				<form action="/index.php?user&q=code/user/phone_statusx" method="post">
                    手机号码：<input type="text" name="phone" id="phonesd" value="<? if (!isset($this->magic_vars['_G']['user_result']['phone'])) $this->magic_vars['_G']['user_result']['phone'] = ''; echo $this->magic_vars['_G']['user_result']['phone']; ?>" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
                    <input type="submit" class="botton" value="确认提交"/><br /><br />
                </form>
            <? endif; ?>
         
			<? endif; ?>
			</div>
		</div>
		<!--邮箱认证 结束-->
		
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="video_status"): ?>
		<!--视频认证 开始-->
		<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_result']['vip_status']!=1): ?>
		<div class="user_help">你还不是VIP会员不能做视频认证。</a>
		<div class="c">
			如要申请成为VIP会员，请点按钮提交到VIP申请页。<input type="button" onclick="javacript:location.href='/vip/main.html'" value="申请VIP会员"  /><br /><br /></form>

			</div>
		</div>

		<? if (!isset($this->magic_vars['_G']['user_result']['video_status'])) $this->magic_vars['_G']['user_result']['video_status']=''; ;elseif (  $this->magic_vars['_G']['user_result']['video_status']==1): ?>
		<div class="user_help">您已经通过了视频认证</div>
		<? else: ?>
		<div class="user_help">
		<? if (!isset($this->magic_vars['_G']['user_result']['video_status'])) $this->magic_vars['_G']['user_result']['video_status']=''; ;if (  $this->magic_vars['_G']['user_result']['video_status']!=0): ?>您的视频认证已经提交，客服人员会及时的跟你联系。</font>。<? else: ?>欢迎进行视频认证。<div class="user_right_border">
			<div class="c">
				<form action="" method="post">
				
				<? if (!isset($this->magic_vars['_G']['user_result']['use_money'])) $this->magic_vars['_G']['user_result']['use_money']=''; ;if (  $this->magic_vars['_G']['user_result']['use_money'] >0): ?>如果你需要视频认证，请点按钮提交。<input type="submit" value="提交申请" name="submit" /><br /><br /><? else: ?><a href="/index.php?user&q=code/account/recharge_new"><font color="#FF0000">请先充值</font></a><? endif; ?></form>

			</div>
		</div><? endif; ?></div>
		<? endif; ?>
		<!--视频认证 结束-->
		
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="scene_status"): ?>
		<!--视频认证 开始-->
		<? if (!isset($this->magic_vars['_G']['user_result']['vip_status'])) $this->magic_vars['_G']['user_result']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_result']['vip_status']!=1): ?>
		<div class="user_help">你还不是VIP会员不能做现场认证。</a>
		<div class="c">
			如要申请成为VIP会员，请点按钮提交到VIP申请页。<input type="button" onclick="javacript:location.href='/vip/main.html'" value="申请VIP会员"  /><br /><br /></form>

			</div>
		</div>
		<? if (!isset($this->magic_vars['_G']['user_result']['scene_status'])) $this->magic_vars['_G']['user_result']['scene_status']=''; ;elseif (  $this->magic_vars['_G']['user_result']['scene_status']==1): ?>
		<div class="user_help">您已经通过了现场认证</b></div>
		<? else: ?>
		<div class="user_help">如果您需要现场认证，请您到公司地址。
		</div>
		<? endif; ?>
		<!--视频认证 结束-->
		
		
		
		<!--信用积分 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit"): ?>
		<div class="user_help" > 
		<strong>信用总得分：</strong> <font size="3" color="#FF0000"><strong><? if (!isset($this->magic_vars['_U']['user_cache']['credit'])) $this->magic_vars['_U']['user_cache']['credit'] = ''; echo $this->magic_vars['_U']['user_cache']['credit']; ?></strong></font>  <? if (!isset($this->magic_vars['_U']['user_cache']['credit'])) $this->magic_vars['_U']['user_cache']['credit'] = '';$_tmp = $this->magic_vars['_U']['user_cache']['credit'];$_tmp = $this->magic_modifier("credit",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >积分类型</td>
					<td  >积分</td>
					<td  >备注</td>
				</tr>
				<? $this->magic_vars['query_type']='GetLogList';$data = array('limit'=>'all','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/credit/credit.class.php');$this->magic_vars['magic_result'] = creditClass::GetLogList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
				<tr >
					<td><? if (!isset($this->magic_vars['var']['type_name'])) $this->magic_vars['var']['type_name'] = ''; echo $this->magic_vars['var']['type_name']; ?></td>
					<td><? if (!isset($this->magic_vars['var']['value'])) $this->magic_vars['var']['value'] = ''; echo $this->magic_vars['var']['value']; ?> 分</td>
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
		<!--信用积分 结束-->
		<!--投标积分 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="credit_invest"): ?>
		<div class="user_help" > 
		<strong>所得总积分：</strong> <font size="3" color="#FF0000"><strong><? if (!isset($this->magic_vars['_G']['user_result']['get_all_integral'])) $this->magic_vars['_G']['user_result']['get_all_integral']=''; ;if ( empty( $this->magic_vars['_G']['user_result']['get_all_integral'])): ?>0<? else: ?><? if (!isset($this->magic_vars['_G']['user_result']['get_all_integral'])) $this->magic_vars['_G']['user_result']['get_all_integral'] = ''; echo $this->magic_vars['_G']['user_result']['get_all_integral']; ?><? endif; ?></strong></font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/integral/convert_log/main.html">积分兑换记录</a>
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >标题</td>
					<!-- <td  >投标金额</td> -->
					<td  >积分变化</td>
					<td  >时间</td>
					<td  >备注</td>
				</tr>
				<? $this->magic_vars['query_type']='GetIntegralLog';$data = array('var'=>'loop','showpage'=>'3','user_id'=>$this->magic_vars['_G']['user_id'],'get_invest_integral_log'=>'1','id_order'=>'desc');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetIntegralLog($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id']=''; ;if (  $this->magic_vars['item']['type_id']=='1'): ?><a href="/invest/a<? if (!isset($this->magic_vars['item']['borrow_id'])) $this->magic_vars['item']['borrow_id'] = ''; echo $this->magic_vars['item']['borrow_id']; ?>.html" target="_blank" title="<? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = ''; echo $this->magic_vars['item']['borrow_name']; ?>"><? if (!isset($this->magic_vars['item']['borrow_name'])) $this->magic_vars['item']['borrow_name'] = '';$_tmp = $this->magic_vars['item']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"20");echo $_tmp;unset($_tmp); ?></a><? else: ?><? if (!isset($this->magic_vars['item']['integral_name'])) $this->magic_vars['item']['integral_name'] = ''; echo $this->magic_vars['item']['integral_name']; ?><? endif; ?></td>
					<!-- <td><? if (!isset($this->magic_vars['item']['tender_account'])) $this->magic_vars['item']['tender_account'] = ''; echo $this->magic_vars['item']['tender_account']; ?> 元</td> -->
					<td><? if (!isset($this->magic_vars['item']['invest_integral'])) $this->magic_vars['item']['invest_integral'] = ''; echo $this->magic_vars['item']['invest_integral']; ?> 分</td>
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
		<!--投标积分 结束-->
		<!--信用积分 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser"): ?>
		<div class="user_help" > 
		<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','epage'=>'20','kefu_userid'=>$this->magic_vars['_G']['user_id'],'showpage'=>'3');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>
			
		<strong>总客户：</strong> <? if (!isset($this->magic_vars['loop']['total'])) $this->magic_vars['loop']['total'] = ''; echo $this->magic_vars['loop']['total']; ?> 个
		</div>
		<table  border="0"  cellspacing="1" class="user_list_table" style="width:98%">
			  <form action="" method="post">
				<tr class="head" >
					<td  >用户名</td>
					<td  >真实姓名</td>
					<td  >性别</td>
					<td  >电话</td>
					<td  >QQ</td>
					<td  >邮箱</td>
					<td  >所在地</td>
					<td  >操作</td>
				</tr>
					<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr >
					<td><A href="/u/<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>" target="_blank"><? if (!isset($this->magic_vars['item']['username'])) $this->magic_vars['item']['username'] = ''; echo $this->magic_vars['item']['username']; ?></A></td>
					<td><a href="/index.php?user&q=code/borrow/myuser&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>"><? if (!isset($this->magic_vars['item']['realname'])) $this->magic_vars['item']['realname'] = ''; echo $this->magic_vars['item']['realname']; ?></a> </td>
					<td><? if (!isset($this->magic_vars['item']['sex'])) $this->magic_vars['item']['sex']=''; ;if (  $this->magic_vars['item']['sex']==1): ?>男<? else: ?>女<? endif; ?></td>
					<td><? if (!isset($this->magic_vars['item']['phone'])) $this->magic_vars['item']['phone'] = ''; echo $this->magic_vars['item']['phone']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['qq'])) $this->magic_vars['item']['qq'] = ''; echo $this->magic_vars['item']['qq']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['email'])) $this->magic_vars['item']['email'] = ''; echo $this->magic_vars['item']['email']; ?></td>
					<td><? if (!isset($this->magic_vars['item']['area'])) $this->magic_vars['item']['area'] = '';$_tmp = $this->magic_vars['item']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"");echo $_tmp;unset($_tmp); ?></td>
					<td><a href="index.php?user&q=code/attestation/myuser&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>">资料证明</a> | <a href="index.php?user&q=code/borrow/myuserrepay&user_id=<? if (!isset($this->magic_vars['item']['user_id'])) $this->magic_vars['item']['user_id'] = ''; echo $this->magic_vars['item']['user_id']; ?>">还款明细</a></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="4" class="page">
						<div class="list_table_page">是<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
					</td>
				</tr>
			</form>	
		</table>
		<? unset($_magic_vars); ?>
		<!--信用积分 结束-->
		
		<? endif; ?>
</div>
</div></div>
<!--用户中心的主栏目 结束-->
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>