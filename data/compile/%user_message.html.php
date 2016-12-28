<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<!--用户中心的主栏目 开始-->
<div class="wrap950 mar10">
	<!--左边的导航 开始-->
	<div class="user_left">
		<? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
	</div>
	<!--左边的导航 结束-->
	
	<!--右边的内容 开始-->
	<div class="user_right">
		<div class="user_right_menu">
			<ul>
				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">站内信 </a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="list" ||  $this->magic_vars['_U']['query_type']=="view"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">收件箱</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']='';if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="sented" ||  $this->magic_vars['_U']['query_type']=="viewed"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/sented">已发送</a></li>
				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="sent"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/sent">发信息</a></li>
			</ul>
		</div>
	 <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>		
		
		
		<!--收件箱 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="list"): ?>
		<div class="user_main_title1" ><input type="button"  value="删除" onclick="on_submit('<? if (!isset($this->magic_vars['_G']['query_url'])) $this->magic_vars['_G']['query_url'] = ''; echo $this->magic_vars['_G']['query_url']; ?>/sented',1)" /> <input type="button" value="标记已读" onclick="on_submit('<? if (!isset($this->magic_vars['_G']['query_url'])) $this->magic_vars['_G']['query_url'] = ''; echo $this->magic_vars['_G']['query_url']; ?>/sented',2)"/> <input type="button" value="标记未读" onclick="on_submit('<? if (!isset($this->magic_vars['_G']['query_url'])) $this->magic_vars['_G']['query_url'] = ''; echo $this->magic_vars['_G']['query_url']; ?>/sented',3)"/></div>
		<div class="user_right_main">
			<table  border="0"  cellspacing="0" class="user_list_table">
			<form action="" method="post" id="form1">
				<tr class="head" >
				<td><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/><input type="hidden" name="type" id="type" value="0" /></td>
				<td><div class="icon_xin_no"></div></td>
				<td>发件人 </td>
				<td>标题</td>
				<td>发送时间 </td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['message_list']) || $this->magic_vars['_U']['message_list']=='') $this->magic_vars['_U']['message_list'] = array();  $_from = $this->magic_vars['_U']['message_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
				<td><input type="checkbox" name="id[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>"/></td>
				<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==1): ?><div class="icon_xin_yes"></div><? else: ?><div class="icon_xin_no"></div><? endif; ?></td>
				<td><? if (!isset($this->magic_vars['item']['sent_username'])) $this->magic_vars['item']['sent_username'] = '';$_tmp = $this->magic_vars['item']['sent_username'];$_tmp = $this->magic_modifier("default",$_tmp,"admin");echo $_tmp;unset($_tmp); ?></td>
				<td><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/view&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>"><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?><strong><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></strong><? else: ?><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?><? endif; ?></a></td>
				<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="11" class="page">
						<div class="user_list_page"><? if (!isset($this->magic_vars['_U']['show_page'])) $this->magic_vars['_U']['show_page'] = ''; echo $this->magic_vars['_U']['show_page']; ?></div>
					</td>
				</tr>
			</form>	
			</table>
			<!--收件箱 结束-->
		</div>
		
		<!--发件箱 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="sented"): ?>
		<div class="user_main_title1" ><input type="button"  value="删除" onclick="on_submit('<? if (!isset($this->magic_vars['_G']['query_url'])) $this->magic_vars['_G']['query_url'] = ''; echo $this->magic_vars['_G']['query_url']; ?>/sented',1)" /></div>
		<form action="" method="post" id="form1">
		<div class="user_right_main">
			<table  border="0"  cellspacing="0" class="user_list_table">
				<tr class="head" >
				<td><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
				<td>收件人 </td>
				<td>标题</td>
				<td>发送时间 </td>
				</tr>
				<?  if(!isset($this->magic_vars['_U']['message_list']) || $this->magic_vars['_U']['message_list']=='') $this->magic_vars['_U']['message_list'] = array();  $_from = $this->magic_vars['_U']['message_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
				<td><input type="checkbox" name="id[<? if (!isset($this->magic_vars['key'])) $this->magic_vars['key'] = ''; echo $this->magic_vars['key']; ?>]" value="<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>"/></td>
				<td><? if (!isset($this->magic_vars['item']['receive_username'])) $this->magic_vars['item']['receive_username'] = '';$_tmp = $this->magic_vars['item']['receive_username'];$_tmp = $this->magic_modifier("default",$_tmp,"admin");echo $_tmp;unset($_tmp); ?></td>
				<td><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/viewed&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></a></td>
				<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
				<tr >
					<td colspan="5" class="page">
						<div class="user_list_page"><? if (!isset($this->magic_vars['_U']['show_page'])) $this->magic_vars['_U']['show_page'] = ''; echo $this->magic_vars['_U']['show_page']; ?></div>
					</td>
				</tr>
				<input type="hidden" name="type" id="type" value="0" />
			</form>	
			</table>
			<!--发件箱 结束-->
		</div>
		<!--发件箱 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="sent"): ?>
		<form method="post" action="" >
		<div class="user_right_border">
			<div class="l">发件人：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?> (<? if (!isset($this->magic_vars['_G']['user_result']['realname'])) $this->magic_vars['_G']['user_result']['realname'] = ''; echo $this->magic_vars['_G']['user_result']['realname']; ?>)
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">收件人：</div>
			<div class="c">
				<input type="text" name="receive_user" value="<? if (!isset($_REQUEST['receive'])) $_REQUEST['receive'] = ''; echo $_REQUEST['receive']; ?>" />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">标题：</div>
			<div class="c">
				<input type="text" name="name"  />
			</div>
		</div>
		<div class="user_right_border">
			<div class="l">内容：</div>
			<div class="c">
				<textarea name="content" rows="7" cols="50"></textarea>
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
				<input name="sented" type="checkbox" value="1" />保存到发件箱
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="submit"   value="确认提交" size="30" /> 
			</div>
		</div>
		</form>
		<div class="user_right_foot">
		* 温馨提示：如果要送管理员发送信息，请输入发件人admin
		</div>
		
		
		<!--查看 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="view"): ?>
		<div class="user_main_title1" ><input type="button" onclick="javascript:location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>'" value="返回" /> <input type="button" value="删除" onclick="javascript:location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/del&id=<? if (!isset($this->magic_vars['_U']['message_result']['id'])) $this->magic_vars['_U']['message_result']['id'] = ''; echo $this->magic_vars['_U']['message_result']['id']; ?>'"/></div>
		<form method="post" action="" >
		<div class="user_right_border">
			<div class="l">标题：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['name'])) $this->magic_vars['_U']['message_result']['name'] = ''; echo $this->magic_vars['_U']['message_result']['name']; ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">发送人：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['sent_username'])) $this->magic_vars['_U']['message_result']['sent_username'] = '';$_tmp = $this->magic_vars['_U']['message_result']['sent_username'];$_tmp = $this->magic_modifier("default",$_tmp,"admin");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">发送时间：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['addtime'])) $this->magic_vars['_U']['message_result']['addtime'] = '';$_tmp = $this->magic_vars['_U']['message_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">发送内容：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['content'])) $this->magic_vars['_U']['message_result']['content'] = ''; echo $this->magic_vars['_U']['message_result']['content']; ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">回复：</div>
			<div class="c">
				<textarea name="content" rows="7" cols="50"></textarea>
			</div>
		</div>
		<div class="user_right_border">
			<div class="l"></div>
			<div class="c">
				<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_U']['message_result']['id'])) $this->magic_vars['_U']['message_result']['id'] = ''; echo $this->magic_vars['_U']['message_result']['id']; ?>" />
				<input type="submit"  value="回复"  /> 
			</div>
		</div>
		</form>
		<!--查看 结束-->
		
		<!--查看 开始-->
		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="viewed"): ?>
		<div class="user_main_title1" ><input type="button" onclick="javascript:location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/sented'" value="返回" /> <input type="button" value="删除" onclick="javascript:location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/deled&id=<? if (!isset($this->magic_vars['_U']['message_result']['id'])) $this->magic_vars['_U']['message_result']['id'] = ''; echo $this->magic_vars['_U']['message_result']['id']; ?>'"/></div>
		<div class="user_right_border">
			<div class="l">标题：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['name'])) $this->magic_vars['_U']['message_result']['name'] = ''; echo $this->magic_vars['_U']['message_result']['name']; ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">收件人：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['receive_username'])) $this->magic_vars['_U']['message_result']['receive_username'] = '';$_tmp = $this->magic_vars['_U']['message_result']['receive_username'];$_tmp = $this->magic_modifier("default",$_tmp,"admin");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">发送时间：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['addtime'])) $this->magic_vars['_U']['message_result']['addtime'] = '';$_tmp = $this->magic_vars['_U']['message_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?>
			</div>
		</div>
		
		<div class="user_right_border">
			<div class="l">发送内容：</div>
			<div class="c">
				<? if (!isset($this->magic_vars['_U']['message_result']['content'])) $this->magic_vars['_U']['message_result']['content'] = ''; echo $this->magic_vars['_U']['message_result']['content']; ?>
			</div>
		</div>
		
		<!--查看 结束-->
		
		<? endif; ?>
	</div>
</div>
<!--用户中心的主栏目 结束-->
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>