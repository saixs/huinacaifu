<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link type="text/css" rel="stylesheet" href="/images/css.css" />
<!--主体-->
<div id="about_wrap">&nbsp;
  <div id="about">
    <div class="about_left">
      <ul class="about_leftsum">
          <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="gonggao"  ||  $this->magic_vars['_G']['site_result']['nid']=="gonggao"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/gonggao/main.html">网站公告 </a></li>
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="projecttell"  ||  $this->magic_vars['_G']['site_result']['nid']=="projecttell"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/projecttell/main.html">行业资讯 </a></li>
    <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="newscenter"  ||  $this->magic_vars['_G']['site_result']['nid']=="newscenter"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/newscenter/main.html">汇纳动态 </a></li>
    <!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="cjwt"  ||  $this->magic_vars['_G']['site_result']['nid']=="cjwt"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/cjwt/main.html">常见问题 </a></li>-->
        <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="fbyg"  ||  $this->magic_vars['_G']['site_result']['nid']=="fbyg"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/fbyg/main.html">发标预告 </a></li>
      </ul>
    </div>
    <div class="about_right">
      <div style="height:46px; line-height:46px; font-size:15px; text-align:right; padding-right:10px; border-bottom:#e8e8e8 1px solid;"><span class="sp1"><span class="sp2"></span>当前位置： >><? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name'] = ''; echo $this->magic_vars['_G']['site_result']['name']; ?></span></div>
      <div class="about_right_sum">
          <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']!=="cjwt"  &&  $this->magic_vars['_G']['site_result']['nid']!=="cjwt"): ?>
             <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','epage'=>'10','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','status'=>'1','site_id'=>$this->magic_vars['_G']['site_result']['site_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/article/article.class.php');$this->magic_vars['magic_result'] = articleClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>
             <?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
             
      
             
 <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px dashed #DAD7D7; font-size:14px;">
  <tr>
    <td height="40"><div style=" float:left; width:10px; height:10px; border:1px solid #0697DA;border-radius:50%; margin-right:16px;"></div></td>
    <td height="40"><a href="a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html" style="width:630px;float:left; font-size:14px;padding-left:0px;line-height:50px;"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></a></td>
    <td height="40"><? if (!isset($this->magic_vars['var']['publish'])) $this->magic_vars['var']['publish'] = '';$_tmp = $this->magic_vars['var']['publish'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></td>
  </tr>
</table>


             <? endforeach; endif; unset($_from); ?>
             <? unset($_magic_vars); ?>
             <center><div class="clear" > </div><div style="margin-top:20px;"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div></center>
          <? else: ?>
            <? if (!isset($this->magic_vars['_G']['site_result']['content'])) $this->magic_vars['_G']['site_result']['content'] = ''; echo $this->magic_vars['_G']['site_result']['content']; ?>
          <? endif; ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--底部-->
<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>