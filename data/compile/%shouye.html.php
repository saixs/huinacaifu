<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link type="text/css" rel="stylesheet" href="/images/css.css" />

<!--主体-->
<div id="about_main"> 
<div id="about">
  <ul class="about_left">
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="about_us"  ||  $this->magic_vars['_G']['site_result']['nid']=="about_us"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/about_us/main.html">关于我们 </a></li>
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="lianxi"  ||  $this->magic_vars['_G']['site_result']['nid']=="lianxi"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/lianxi/main.html">联系我们 </a></li>
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="companypro"  ||  $this->magic_vars['_G']['site_result']['nid']=="companypro"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/companypro/main.html">公司证件</a></li>
	  <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="office"  ||  $this->magic_vars['_G']['site_result']['nid']=="office"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/office/main.html">公司展示</a></li>
	  <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="team"  ||  $this->magic_vars['_G']['site_result']['nid']=="team"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/team/main.html">团队成员</a></li>
	  <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="innovation"  ||  $this->magic_vars['_G']['site_result']['nid']=="innovation"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/innovation/main.html">创新风控体系</a></li>
	<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="consultant"  ||  $this->magic_vars['_G']['site_result']['nid']=="consultant"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/consultant/main.html">顾问团队</a></li>
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="flzc"  ||  $this->magic_vars['_G']['site_result']['nid']=="flzc"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/flzc/main.html">法律政策</a></li>
	<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="qualifications"  ||  $this->magic_vars['_G']['site_result']['nid']=="qualifications"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/qualifications/main.html">资质与荣誉</a></li>
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