<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>后台管理登陆</title>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	;
	background-repeat: repeat-x;
}
.font{font-size:14px;font-weight:bolder;color:#434C7E;}
.welcome{font-size:12px;;color:#000000;}
-->
</style></head>

<script>
function check_login(){
	if (form1.username.value==""){
		alert("用户名不能为空！");
		return false;
	}else if (form1.password.value==""){
		alert("密码不能为空！");
		return false;
	}else if (form1.valicode.value==""){
		alert("验证码不能为空！");
		return false;
	}

}
</script>

<body background="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/login_bg.gif">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="68"><table width="100%" height="68" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10"></td>
        <td><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/login_top.jpg" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="93"></td>
  </tr>
  <tr>
    <td height="309">
        <table width="420" height="309" border="0" align="center" cellpadding="0" cellspacing="0">
      <form id="form1" name="form1" method="post" action="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=login" onsubmit="return check_login();">
	  <tr>
        <td background="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/login_main.jpg">
		<table width="420" height="309" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="120" height="100"></td>
            <td width="190"></td>
            <td width="110"></td>
          </tr>
		    <tr>
            <td width="150" height="29" colspan="2" align="center"><? if (!isset($this->magic_vars['login_msg'])) $this->magic_vars['login_msg']=''; ;if (  $this->magic_vars['login_msg']!=""): ?><font color="#FF0000" size="2"><? if (!isset($this->magic_vars['login_msg'])) $this->magic_vars['login_msg'] = ''; echo $this->magic_vars['login_msg']; ?></font><? endif; ?></td>
            <td width="*"></td>
          </tr>
          <tr>
            <td width="120" height="35" align="center"><span class="font">用户名：</span></td>
            <td width="190"><input name="username" type="text" size="20" maxlength="20" tabindex="1" style="width:145px;"/></td>
            <td rowspan="2" align="left"><input width="47" height="51" type="image" src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/login_button.gif" /></td>
          </tr>
          <tr>
            <td width="120" height="35" align="center"><span class="font">密&nbsp;&nbsp;码：</span></td>
            <td width="190"><input name="password" type="password" size="21" maxlength="20"  tabindex="2" style="width:145px;"/></td>
            </tr>
            <tr>
                <td width="120" height="35" align="center"><span class="font">内部密码：</span></td>
                <td width="190"><input name="internal_pwd" type="password" size="21" maxlength="20" tabindex="2" style="width:145px;"/></td>
            </tr>
          <tr>
            <td width="120" height="35" align="center"><span class="font">验证码：</span></td>
            <td width="190"><input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" /></td>
            <td></td>
          </tr>
          <tr>
            <td width="120" height="40" align="center"></td>
            <td colspan="2" align="center" class="welcome">欢迎您登陆<? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>借贷平台后台管理系统 --- <a href="/">回首页</a></td>
            </tr>
        </table></td>
      </tr>
	  </form>
    </table></td>
  </tr>
</table>
</body>
</html>
