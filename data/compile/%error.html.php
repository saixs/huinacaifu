<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/css/css.css" rel="stylesheet" type="text/css" />
<table class="container_0">
	<tr>
		<td class="topleft"></td>
		<td class="topcenter"></td>
		<td class="topright"></td>
	</tr> 
	<tr>
		<td class="middleleft"></td>
		<td class="middlecenter">
				<div class="bbs_position"><span>当前位置:</span> <a href="/bbs/main.html"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?></a> -> <span>操作提示</span></div>
				<div class="div_out bbs_msgdiv">
				<table class="msgtable">
					<tr>
						<td class="left"></td>
						<td class="right">
				<div class="content"><? if (!isset($this->magic_vars['_G']['msg']['0'])) $this->magic_vars['_G']['msg']['0'] = ''; echo $this->magic_vars['_G']['msg']['0']; ?><br /></div>
				<? if (!isset($this->magic_vars['_G']['msg']['1'])) $this->magic_vars['_G']['msg']['1'] = ''; echo $this->magic_vars['_G']['msg']['1']; ?>
						</td>
					</tr>
				</table>
				</div>
				<div class="div_clear" style="height:30px;"></div>
		</td>
		<td class="middleright"></td>
	</tr>
	<tr>
		<td class="bottomleft"></td>
		<td class="bottomcenter"></td>
		<td class="bottomright"></td>
	</tr>
</table>

<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>