<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/main1.css" rel="stylesheet" type="text/css" />
<div style="margin-top:130px; margin-bottom:30px;">
<div class="wrap950 mar10" style=" border:1px solid #CCCCCC; width:1003px; margin: 0 auto;">
	<div style=" background-color:#E8E8E8; margin:1px; line-height:25px; padding-left:10px; font-size:13px;"><strong>系统信息</strong></div>
	<div style="text-align:center"><br />
<? if (!isset($this->magic_vars['_U']['showmsg']['msg'])) $this->magic_vars['_U']['showmsg']['msg'] = ''; echo $this->magic_vars['_U']['showmsg']['msg']; ?><br /><br  /> <div id="msg_content"><a href="<? if (!isset($this->magic_vars['_U']['showmsg']['url'])) $this->magic_vars['_U']['showmsg']['url'] = ''; echo $this->magic_vars['_U']['showmsg']['url']; ?>"><? if (!isset($this->magic_vars['_U']['showmsg']['content'])) $this->magic_vars['_U']['showmsg']['content'] = ''; echo $this->magic_vars['_U']['showmsg']['content']; ?></a></div><br />
	</div>
</div></div>
<script> 

var url = '<? if (!isset($this->magic_vars['_U']['showmsg']['url'])) $this->magic_vars['_U']['showmsg']['url'] = ''; echo $this->magic_vars['_U']['showmsg']['url']; ?>';
var content = '<? if (!isset($this->magic_vars['_U']['showmsg']['content'])) $this->magic_vars['_U']['showmsg']['content'] = ''; echo $this->magic_vars['_U']['showmsg']['content']; ?>';

if (url == ""){
	document.getElementById('msg_content').innerHTML = "<a href='javascript:history.go(-1)'>"+content+"</a>";
}else{
	document.getElementById('msg_content').innerHTML = "<a href='"+url+"'>"+content+"</a>";
}
setInterval("testTime()",5000); 
function testTime() { 
	if (url == ""){
		history.go(-1);
	}else{
		location.href = url; //#设定跳转的链接地址
	}
}
</script>


<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>