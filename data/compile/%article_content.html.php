<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link type="text/css" rel="stylesheet" href="/images/css.css" />
<!--头部 end--> 
<!--主体-->
<div id="about_wrap">&nbsp;
  <div id="about">
    <div class="about_left">
      <ul class="about_leftsum">
	  <? if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_result']['nid']=="kfservice"): ?>
		 <li <? if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_result']['nid']=="kfservice"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="###">客户服务</a></li>
	  <? endif; ?>

          <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="gonggao"  ||  $this->magic_vars['_G']['site_result']['nid']=="gonggao"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/gonggao/main.html">网站公告 </a></li>
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="projecttell"  ||  $this->magic_vars['_G']['site_result']['nid']=="projecttell"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/projecttell/main.html">行业资讯 </a></li>
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="newscenter"  ||  $this->magic_vars['_G']['site_result']['nid']=="newscenter"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/newscenter/main.html">汇纳动态 </a></li>
<!--    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="cjwt"  ||  $this->magic_vars['_G']['site_result']['nid']=="cjwt"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/cjwt/main.html">常见问题 </a></li>-->
        <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="fbyg"  ||  $this->magic_vars['_G']['site_result']['nid']=="fbyg"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/fbyg/main.html">发标预告 </a></li>
      </ul>
    </div>
    <div class="about_right">
      <div style="height:46px; line-height:46px; font-size:15px; text-align:right; padding-right:10px; border-bottom:#e8e8e8 1px solid;"><span class="sp1"><span class="sp2"></span>当前位置： >> <? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name'] = ''; echo $this->magic_vars['_G']['site_result']['name']; ?></span></div>
      <div class="about_right_sum">
		  <? if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_result']['nid']=="kfservice"): ?>
			<div class="zx-righttxt clearfix">
			<div class="info" id="lxjs">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#666666">
				<tbody><tr>
					<td colspan="6" bgcolor="#FFFFFF">
							<div style="width: 260px; float: left; margin: 0 10px 0 10px"><br>
								<div class="floatl" style="width: 120px;height:120px;float: left;">
								<img src="/public/images/logo.jpg" style="width: 120px; height: 100px; float: right;">
								</div>
								<div style="margin-left: 10px;">
									<ul class="kefu_li" style="float: left; padding: 0px 0px 0px 10px;">
										<li style="padding-bottom: 5px;">汇纳客服</li>
										<li style="padding-bottom: 5px;">电话:400-0571-208</li>
										<li style="padding-bottom: 5px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<? if (!isset($this->magic_vars['_G']['system']['con_qq1'])) $this->magic_vars['_G']['system']['con_qq1'] = ''; echo $this->magic_vars['_G']['system']['con_qq1']; ?>&amp;site=qq&amp;menu=yes">
												<img border="0" src="http://wpa.qq.com/pa?p=2:<? if (!isset($this->magic_vars['_G']['system']['con_qq1'])) $this->magic_vars['_G']['system']['con_qq1'] = ''; echo $this->magic_vars['_G']['system']['con_qq1']; ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息">
										</a></li>
									
									</ul>
								</div>
							</div>
							<div style="width: 260px; float: left; margin: 0 10px 0 10px;"><br>
								<div class="floatl" style="width: 120px;height:120px;float: left;">
								<img src="/public/images/logo.jpg" style="width: 120px; height: 100px; float: right;">
								</div>
								<div style="margin-left: 10px;">
									<ul class="kefu_li" style="float: left; padding: 0px 0px 0px 10px;">
										<li style="padding-bottom: 5px;">汇纳客服</li>
										<li style="padding-bottom: 5px;">电话:400-0571-208</li>
										<li style="padding-bottom: 5px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<? if (!isset($this->magic_vars['_G']['system']['con_qq2'])) $this->magic_vars['_G']['system']['con_qq2'] = ''; echo $this->magic_vars['_G']['system']['con_qq2']; ?>&amp;site=qq&amp;menu=yes">
												<img border="0" src="http://wpa.qq.com/pa?p=2:<? if (!isset($this->magic_vars['_G']['system']['con_qq2'])) $this->magic_vars['_G']['system']['con_qq2'] = ''; echo $this->magic_vars['_G']['system']['con_qq2']; ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息">
										</a></li>
									
									</ul>
								</div>
							</div>
							<div style="width: 260px; float: left; margin: 0 10px 0 10px;"><br>
								<div class="floatl" style="width: 120px;height:120px;float: left;">
								<img src="/public/images/logo.jpg" style="width: 120px; height: 100px; float: right;">
								</div>
								<div style="margin-left: 10px;">
									<ul class="kefu_li" style="float: left; padding: 0px 0px 0px 10px;">
										<li style="padding-bottom: 5px;">汇纳客服</li>
										<li style="padding-bottom: 5px;">电话:400-0571-208</li>
										<li style="padding-bottom: 5px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<? if (!isset($this->magic_vars['_G']['system']['con_qq3'])) $this->magic_vars['_G']['system']['con_qq3'] = ''; echo $this->magic_vars['_G']['system']['con_qq3']; ?>&amp;site=qq&amp;menu=yes">
												<img border="0" src="http://wpa.qq.com/pa?p=2:<? if (!isset($this->magic_vars['_G']['system']['con_qq3'])) $this->magic_vars['_G']['system']['con_qq3'] = ''; echo $this->magic_vars['_G']['system']['con_qq3']; ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息">
										</a></li>
									
									</ul>
								</div>
							</div>
							<div style="width: 260px; float: left; margin: 0 10px 0 10px;"><br>
								<div class="floatl" style="width: 120px;height:120px;float: left;">
								<img src="/public/images/logo.jpg" style="width: 120px; height: 100px; float: right;">
								</div>
								<div style="margin-left: 10px;">
									<ul class="kefu_li" style="float: left; padding: 0px 0px 0px 10px;">
										<li style="padding-bottom: 5px;">汇纳客服</li>
										<li style="padding-bottom: 5px;">电话:400-0571-208</li>
										<li style="padding-bottom: 5px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<? if (!isset($this->magic_vars['_G']['system']['con_qq4'])) $this->magic_vars['_G']['system']['con_qq4'] = ''; echo $this->magic_vars['_G']['system']['con_qq4']; ?>&amp;site=qq&amp;menu=yes">
												<img border="0" src="http://wpa.qq.com/pa?p=2:<? if (!isset($this->magic_vars['_G']['system']['con_qq4'])) $this->magic_vars['_G']['system']['con_qq4'] = ''; echo $this->magic_vars['_G']['system']['con_qq4']; ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息">
										</a></li>
									
									</ul>
								</div>
							</div>
							<div style="width: 260px; float: left; margin: 0 10px 0 10px;"><br>
								<div class="floatl" style="width: 120px;height:120px;float: left;">
								<img src="/public/images/logo.jpg" style="width: 120px; height: 100px; float: right;">
								</div>
								<div style="margin-left: 10px;">
									<ul class="kefu_li" style="float: left; padding: 0px 0px 0px 10px;">
										<li style="padding-bottom: 5px;">汇纳客服</li>
										<li style="padding-bottom: 5px;">电话:400-0571-208</li>
										<li style="padding-bottom: 5px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<? if (!isset($this->magic_vars['_G']['system']['con_qq5'])) $this->magic_vars['_G']['system']['con_qq5'] = ''; echo $this->magic_vars['_G']['system']['con_qq5']; ?>&amp;site=qq&amp;menu=yes">
												<img border="0" src="http://wpa.qq.com/pa?p=2:<? if (!isset($this->magic_vars['_G']['system']['con_qq5'])) $this->magic_vars['_G']['system']['con_qq5'] = ''; echo $this->magic_vars['_G']['system']['con_qq5']; ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息">
										</a></li>
									
									</ul>
								</div>
							</div>
					</td>
				</tr>
			</tbody></table>
			</div>
		   </div>
		  <? else: ?>
			<div style="text-align: center"><h2 style="font-size: 16px; color: #000000; margin-top:25px; font-weight: bold;"><? if (!isset($this->magic_vars['_G']['article']['name'])) $this->magic_vars['_G']['article']['name'] = ''; echo $this->magic_vars['_G']['article']['name']; ?></h2></div><br />
			  <? if (!isset($this->magic_vars['_G']['article']['content'])) $this->magic_vars['_G']['article']['content'] = ''; echo $this->magic_vars['_G']['article']['content']; ?>
			  <div style="position: relative; left: 550px;color: #666">发布时间:<? if (!isset($this->magic_vars['_G']['article']['addtime'])) $this->magic_vars['_G']['article']['addtime'] = '';$_tmp = $this->magic_vars['_G']['article']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></div>
		  <? endif; ?>
          
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--底部-->
<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>
