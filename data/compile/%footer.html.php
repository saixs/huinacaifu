    <div class="clear"></div>
    <div class="botsum">
      <div class="botsum_tit">合作伙伴</div>
      <div class="botsum_b">
        <div id="demo">
          <div id="indemo">
            <div id="demo1">
              <ul>
                  <? $this->magic_vars['query_type']='GetList';$data = array('limit'=>'8','logo'=>'true');$default = '';  include_once(ROOT_PATH.'modules/links/links.class.php');$this->magic_vars['magic_result'] = linksClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
                <li><a href="<? if (!isset($this->magic_vars['var']['url'])) $this->magic_vars['var']['url'] = ''; echo $this->magic_vars['var']['url']; ?>" target="_blank"><img src="/<? if (!isset($this->magic_vars['var']['logoimg'])) $this->magic_vars['var']['logoimg'] = ''; echo $this->magic_vars['var']['logoimg']; ?>" /></a></li>
                <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
              </ul>
            </div>
            <div id="demo2"></div>
          </div>
        </div>
      </div>
    </div>

<!--主体 end--> 

<!--底部-->
<div id="footer_box">
  <div id="footer">
    <div class="index_footsum">
      <dl>
        <dt><a href="/cjwt/main.html">帮助中心</a></dt>
        <dd><a href="/cjwt/main.html">常见问题</a></dd>
        <dd><a href="/ptyl/main.html">平台原理</a></dd>
        <dd><a href="/creditrole/main.html">积分规则</a></dd>
      </dl>
      <dl>
        <dt><a href="/about_us/main.html">关于我们</a></dt>
        <!--<dd><a href="/about_us/main.html">关于我们</a></dd>-->
        <dd><a href="/lianxi/main.html">联系我们</a></dd>
        <dd><a href="/zhengjian/main.html">证照资质</a></dd>
        <dd><a href="/companydispaly/main.html">公司展示</a></dd>
      </dl>
      <dl>
        <dt><a href="/aqbz/main.html">安全保障</a></dt>
        <dd><a href="/lawrole/main.html">政策法规</a></dd>
        <dd><a href="/aqbz/main.html">安全保障</a></dd>
      </dl>
      <dl>
        <dt><a href="/gonggao/main.html">最新动态</a></dt>
        <dd><a href="/gonggao/main.html">网站公告</a></dd>
        <dd><a href="/newscenter/main.html">媒体报道</a></dd>
        <dd><a href="/projecttell/main.html">行业资讯</a></dd>
      </dl>
      <div class="index_footsum_r">
        <!--<div class="img"><a href=""><img src="/images/f_pic.jpg" /></a></div>
        <div class="text">扫描二维码，关注汇纳财富最新动态!</div>-->
      </div>
      <div class="clear"></div>
    </div>
    <!--友情链接-->
    <div id="link">
      <span class="link_span">友情链接：</span>
      <div class="link_gd">
        <p>		  
            <? $this->magic_vars['query_type']='GetList';$data = array('limit'=>'8','logo'=>'true');$default = '';  include_once(ROOT_PATH.'modules/links/links.class.php');$this->magic_vars['magic_result'] = linksClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
            <a href="<? if (!isset($this->magic_vars['var']['url'])) $this->magic_vars['var']['url'] = ''; echo $this->magic_vars['var']['url']; ?>" target="_blank"><? if (!isset($this->magic_vars['var']['webname'])) $this->magic_vars['var']['webname'] = ''; echo $this->magic_vars['var']['webname']; ?></a>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
        </p>
      </div>
    </div>
      
    <script type="text/javascript">jQuery(".topLoop4").slide({ mainCell:"p a",effect:"topLoop",autoPlay:true,vis:1,scroll:1,trigger:"click"});</script>
    
    <!--友情链接 end--> <div class="footext">
      <p><a href="/about_us/main.html">关于我们</a>|<a href="/lawrole/main.html">法律政策</a>|<a href="/lianxi/main.html">联系我们</a>|<a href="/rczp/main.html">招贤纳士</a>|<a href="/feerole/main.html">资费说明</a> </p>
      <p>
          ? 2014-2018 www.bljinrong.com All Rights Reserved.
          <span><a href="http://www.miitbeian.gov.cn"><? if (!isset($this->magic_vars['_G']['system']['con_beian'])) $this->magic_vars['_G']['system']['con_beian'] = ''; echo $this->magic_vars['_G']['system']['con_beian']; ?></a></span></p>
    </div>
    <ul class="footimg2">
      <li></li>
      <li style="position: relative; left: 50px;">
          <a href="http://webscan.360.cn/index/checkwebsite/url/www.bljinrong.com"><img border="0" src="http://img.webscan.360.cn/status/pai/hash/cbf5544bbbf556f74997a55143ece541"/></a>
      </li>
    </ul>
  </div>
</div>
<!--底部 end-->

<!-- 右侧客服 -->
<LINK rel=stylesheet type=text/css href="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/kefu.css">
<DIV id=floatTools class=float0831>
  <DIV class=floatL>
  <A style="display:block" id=aFloatTools_Show class=btnOpen title=查看在线客服 onClick="onload_show();">展开</A> 
<A id=aFloatTools_Hide class=btnCtn title=关闭在线客服 onClick="onload_hide();"  style='DISPLAY: none'
href="javascript:void(0);">收缩</A> 
  </DIV>
  <DIV id=divFloatToolsView class="floatR" style="display: none;">
    <DIV class=tp></DIV>
     <DIV class=cn>
      <UL>
        <LI class=top>
          <H1>在线客服</H1>
        </LI>
		<li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq1'])) $this->magic_vars['_G']['system']['con_qq1'] = ''; echo $this->magic_vars['_G']['system']['con_qq1']; ?>
		</li>
		<li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq2'])) $this->magic_vars['_G']['system']['con_qq2'] = ''; echo $this->magic_vars['_G']['system']['con_qq2']; ?>
		</li>    
		<li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq3'])) $this->magic_vars['_G']['system']['con_qq3'] = ''; echo $this->magic_vars['_G']['system']['con_qq3']; ?>
		</li>    
		<li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq4'])) $this->magic_vars['_G']['system']['con_qq4'] = ''; echo $this->magic_vars['_G']['system']['con_qq4']; ?>
		</li>    
		<li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq5'])) $this->magic_vars['_G']['system']['con_qq5'] = ''; echo $this->magic_vars['_G']['system']['con_qq5']; ?>
		</li>    
		  
    
      </UL>
 	  <!--<UL>
        <LI class=top>
          <H1>财务客服</H1>
        </LI>
        <li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq2'])) $this->magic_vars['_G']['system']['con_qq2'] = ''; echo $this->magic_vars['_G']['system']['con_qq2']; ?>
		</li>   
 
      </UL>
	  <UL>
        <LI class=top>
          <H1>客服专员</H1>
        </LI>
        <li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq3'])) $this->magic_vars['_G']['system']['con_qq3'] = ''; echo $this->magic_vars['_G']['system']['con_qq3']; ?>
		</li>
		<li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq4'])) $this->magic_vars['_G']['system']['con_qq4'] = ''; echo $this->magic_vars['_G']['system']['con_qq4']; ?>
		</li>
		<li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq5'])) $this->magic_vars['_G']['system']['con_qq5'] = ''; echo $this->magic_vars['_G']['system']['con_qq5']; ?>
		</li>
      </UL>-->
	  <ul>
        <li class=top>
          <h1>官方QQ群</h1>
        </li>
        <li>
        <SPAN style="font-family: 微软雅黑">&nbsp;&nbsp;&nbsp;&nbsp;<? if (!isset($this->magic_vars['_G']['system']['con_qq6'])) $this->magic_vars['_G']['system']['con_qq6'] = ''; echo $this->magic_vars['_G']['system']['con_qq6']; ?></SPAN>
		</li>   
      </ul>
      <UL>
        <LI>
          <H1>电话咨询</H1>
        </LI>
        <LI class="bot"><SPAN class=icoTl  style="padding-left:13px;"><? if (!isset($this->magic_vars['_G']['system']['con_fuwutel'])) $this->magic_vars['_G']['system']['con_fuwutel'] = ''; echo $this->magic_vars['_G']['system']['con_fuwutel']; ?></SPAN> </LI>
        <!--<LI class=bot><H3 class=titDc><A href="http://www.lanrentuku.com/" target="_blank">新查</A></H3>-->
        </LI>
      </UL>
    </DIV>

  </DIV>
</body>
</html>