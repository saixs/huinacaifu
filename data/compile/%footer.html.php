    <div class="clear"></div>
    <div class="botsum">
      <div class="botsum_tit">�������</div>
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

<!--���� end--> 

<!--�ײ�-->
<div id="footer_box">
  <div id="footer">
    <div class="index_footsum">
      <dl>
        <dt><a href="/cjwt/main.html">��������</a></dt>
        <dd><a href="/cjwt/main.html">��������</a></dd>
        <dd><a href="/ptyl/main.html">ƽ̨ԭ��</a></dd>
        <dd><a href="/creditrole/main.html">���ֹ���</a></dd>
      </dl>
      <dl>
        <dt><a href="/about_us/main.html">��������</a></dt>
        <!--<dd><a href="/about_us/main.html">��������</a></dd>-->
        <dd><a href="/lianxi/main.html">��ϵ����</a></dd>
        <dd><a href="/zhengjian/main.html">֤������</a></dd>
        <dd><a href="/companydispaly/main.html">��˾չʾ</a></dd>
      </dl>
      <dl>
        <dt><a href="/aqbz/main.html">��ȫ����</a></dt>
        <dd><a href="/lawrole/main.html">���߷���</a></dd>
        <dd><a href="/aqbz/main.html">��ȫ����</a></dd>
      </dl>
      <dl>
        <dt><a href="/gonggao/main.html">���¶�̬</a></dt>
        <dd><a href="/gonggao/main.html">��վ����</a></dd>
        <dd><a href="/newscenter/main.html">ý�屨��</a></dd>
        <dd><a href="/projecttell/main.html">��ҵ��Ѷ</a></dd>
      </dl>
      <div class="index_footsum_r">
        <!--<div class="img"><a href=""><img src="/images/f_pic.jpg" /></a></div>
        <div class="text">ɨ���ά�룬��ע���ɲƸ����¶�̬!</div>-->
      </div>
      <div class="clear"></div>
    </div>
    <!--��������-->
    <div id="link">
      <span class="link_span">�������ӣ�</span>
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
    
    <!--�������� end--> <div class="footext">
      <p><a href="/about_us/main.html">��������</a>|<a href="/lawrole/main.html">��������</a>|<a href="/lianxi/main.html">��ϵ����</a>|<a href="/rczp/main.html">������ʿ</a>|<a href="/feerole/main.html">�ʷ�˵��</a> </p>
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
<!--�ײ� end-->

<!-- �Ҳ�ͷ� -->
<LINK rel=stylesheet type=text/css href="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/kefu.css">
<DIV id=floatTools class=float0831>
  <DIV class=floatL>
  <A style="display:block" id=aFloatTools_Show class=btnOpen title=�鿴���߿ͷ� onClick="onload_show();">չ��</A> 
<A id=aFloatTools_Hide class=btnCtn title=�ر����߿ͷ� onClick="onload_hide();"  style='DISPLAY: none'
href="javascript:void(0);">����</A> 
  </DIV>
  <DIV id=divFloatToolsView class="floatR" style="display: none;">
    <DIV class=tp></DIV>
     <DIV class=cn>
      <UL>
        <LI class=top>
          <H1>���߿ͷ�</H1>
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
          <H1>����ͷ�</H1>
        </LI>
        <li>
        <? if (!isset($this->magic_vars['_G']['system']['con_qq2'])) $this->magic_vars['_G']['system']['con_qq2'] = ''; echo $this->magic_vars['_G']['system']['con_qq2']; ?>
		</li>   
 
      </UL>
	  <UL>
        <LI class=top>
          <H1>�ͷ�רԱ</H1>
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
          <h1>�ٷ�QQȺ</h1>
        </li>
        <li>
        <SPAN style="font-family: ΢���ź�">&nbsp;&nbsp;&nbsp;&nbsp;<? if (!isset($this->magic_vars['_G']['system']['con_qq6'])) $this->magic_vars['_G']['system']['con_qq6'] = ''; echo $this->magic_vars['_G']['system']['con_qq6']; ?></SPAN>
		</li>   
      </ul>
      <UL>
        <LI>
          <H1>�绰��ѯ</H1>
        </LI>
        <LI class="bot"><SPAN class=icoTl  style="padding-left:13px;"><? if (!isset($this->magic_vars['_G']['system']['con_fuwutel'])) $this->magic_vars['_G']['system']['con_fuwutel'] = ''; echo $this->magic_vars['_G']['system']['con_fuwutel']; ?></SPAN> </LI>
        <!--<LI class=bot><H3 class=titDc><A href="http://www.lanrentuku.com/" target="_blank">�²�</A></H3>-->
        </LI>
      </UL>
    </DIV>

  </DIV>
</body>
</html>