<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link type="text/css" rel="stylesheet" href="/images/css.css" />
<!--主体-->
<div id="about_main">
	<div id="about">
		<ul class="about_left">
			<!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="bzzx"  ||  $this->magic_vars['_G']['site_result']['nid']=="bzzx"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/bzzx/main.html">帮助中心</a></li>-->
			<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="cjwt"  ||  $this->magic_vars['_G']['site_result']['nid']=="cjwt"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/cjwt/main.html">常见问题</a></li>
			<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="ptyl"  ||  $this->magic_vars['_G']['site_result']['nid']=="ptyl"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/ptyl/main.html">平台原理</a></li>
			<!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="lendhelp"  ||  $this->magic_vars['_G']['site_result']['nid']=="lendhelp"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/lendhelp/main.html">如何借款</a></li>
			<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="bowrrowhelp"  ||  $this->magic_vars['_G']['site_result']['nid']=="bowrrowhelp"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/bowrrowhelp/main.html">如何理财</a></li>-->
			<!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="ljgengduo"  ||  $this->magic_vars['_G']['site_result']['nid']=="ljgengduo"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/ljgengduo/main.html">了解更多</a></li>-->
			<!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="fwgz"  ||  $this->magic_vars['_G']['site_result']['nid']=="fwgz"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/fwgz/main.html">服务规则</a></li>-->
			<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="lixi"  ||  $this->magic_vars['_G']['site_result']['nid']=="lixi"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/lixi/main.html">利息计算器 </a></li>
		</ul>
		<div class="about_right">
			<div class="about_right_tit"><? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name'] = ''; echo $this->magic_vars['_G']['site_result']['name']; ?><span class="sp1"><span class="sp2"></span>当前位置： >> <? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name'] = ''; echo $this->magic_vars['_G']['site_result']['name']; ?></span></div>
			<div class="about_right_sum">
				<? if (!isset($this->magic_vars['_G']['site_result']['content'])) $this->magic_vars['_G']['site_result']['content'] = ''; echo $this->magic_vars['_G']['site_result']['content']; ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--主体 end-->

<!-- 底部 -->
<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>
<!-- 底部 end -->