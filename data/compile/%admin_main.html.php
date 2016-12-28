<? $this->magic_include(array('file' => "admin_head.html.php", 'vars' => array()));?>

			 <table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
             
				<tr>
					<td class="main_td1" align="left" width="100%" colspan="2" style="background:#0f74aa">待办事项:</td>
				</tr>	
                <? if (!isset($this->magic_vars['_G']['user_result']['typename'])) $this->magic_vars['_G']['user_result']['typename']='';if (!isset($this->magic_vars['_G']['user_result']['typename'])) $this->magic_vars['_G']['user_result']['typename']=''; ;if (  $this->magic_vars['_G']['user_result']['typename']=='信贷审核'||  $this->magic_vars['_G']['user_result']['typename']=='超级管理员'): ?>
				<tr>
					<td class="main_td1" align="right" width="15%">认证待审核:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/attestation/all"><? if (!isset($this->magic_vars['_A']['tj']['rz'])) $this->magic_vars['_A']['tj']['rz'] = ''; echo $this->magic_vars['_A']['tj']['rz']; ?></a></td>
				</tr>	 
				<tr>
					<td class="main_td1" align="right" width="15%">vip待审核:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/attestation/vip"><? if (!isset($this->magic_vars['_A']['tj']['vip'])) $this->magic_vars['_A']['tj']['vip'] = ''; echo $this->magic_vars['_A']['tj']['vip']; ?></a></td>
				</tr>	 
				<tr>
					<td class="main_td1" align="right" width="15%">借款额度申请:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow/amount&status=2"><? if (!isset($this->magic_vars['_A']['tj']['ed'])) $this->magic_vars['_A']['tj']['ed'] = ''; echo $this->magic_vars['_A']['tj']['ed']; ?></a></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">逾期待处理:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow/late"><? if (!isset($this->magic_vars['_A']['tj']['yq'])) $this->magic_vars['_A']['tj']['yq'] = ''; echo $this->magic_vars['_A']['tj']['yq']; ?></a></td>
				</tr>	
				<tr>
					<td class="main_td1" align="right" width="15%">发标待审核:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow&status=0"><? if (!isset($this->magic_vars['_A']['tj']['ds'])) $this->magic_vars['_A']['tj']['ds'] = ''; echo $this->magic_vars['_A']['tj']['ds']; ?></a></td>
				</tr>	
				<tr>
					<td class="main_td1" align="right" width="15%">满标待审核:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow/full&status=1"><? if (!isset($this->magic_vars['_A']['tj']['mb'])) $this->magic_vars['_A']['tj']['mb'] = ''; echo $this->magic_vars['_A']['tj']['mb']; ?></a></td>
				</tr>	
                <? endif; ?>
                 <? if (!isset($this->magic_vars['_G']['user_result']['typename'])) $this->magic_vars['_G']['user_result']['typename']='';if (!isset($this->magic_vars['_G']['user_result']['typename'])) $this->magic_vars['_G']['user_result']['typename']=''; ;if (  $this->magic_vars['_G']['user_result']['typename']=='财务客服'||  $this->magic_vars['_G']['user_result']['typename']=='超级管理员'): ?>
				<tr>
					<td class="main_td1" align="right" width="15%">充值待审核:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/account/recharge&status=0"><? if (!isset($this->magic_vars['_A']['tj']['cz'])) $this->magic_vars['_A']['tj']['cz'] = ''; echo $this->magic_vars['_A']['tj']['cz']; ?></a></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">提现待审核:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/account/cash&status=0"><? if (!isset($this->magic_vars['_A']['tj']['tx'])) $this->magic_vars['_A']['tj']['tx'] = ''; echo $this->magic_vars['_A']['tj']['tx']; ?></a></td>
				</tr>	
                <? endif; ?>
				<tr>
					<td class="main_td1" align="left" width="100%" colspan="2" style="background:#0f74aa">收入统计:</td>
				</tr>
				<?  if(!isset($this->magic_vars['_A']['borrow_tongji_all']) || $this->magic_vars['_A']['borrow_tongji_all']=='') $this->magic_vars['_A']['borrow_tongji_all'] = array();  $_from = $this->magic_vars['_A']['borrow_tongji_all']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['ak'] =>  $this->magic_vars['al']):
?>
				<tr>
					<td class="main_td1" align="right" width="15%"><? if (!isset($this->magic_vars['ak'])) $this->magic_vars['ak'] = ''; echo $this->magic_vars['ak']; ?>:</td>
					<td class="main_td1" align="left"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/borrow/tongji&site_id=15&a=site">￥<? if (!isset($this->magic_vars['al'])) $this->magic_vars['al'] = ''; echo $this->magic_vars['al']; ?></a></td>
				</tr>
				<? endforeach; endif; unset($_from); ?>
			   <tr>
					<td colspan="4" bgcolor="#dddddd" class="main_td4" >
					
				</tr>
			   <tr>
					<td colspan="2" bgcolor="#ffffff" class="main_td2" >
					<div class="main_title">软件版本信息 </div>
					</td>
				</tr>

				<tr>
					<td class="main_td1" align="right" width="15%">系统名称:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?>借贷平台系统</td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">系统版本:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_G']['system']['con_gsm'])) $this->magic_vars['_G']['system']['con_gsm'] = ''; echo $this->magic_vars['_G']['system']['con_gsm']; ?> gbk</td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">开发团队:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_G']['system']['con_gsm'])) $this->magic_vars['_G']['system']['con_gsm'] = ''; echo $this->magic_vars['_G']['system']['con_gsm']; ?></td>
				</tr>
				
			  <tr>
					<td colspan="2" bgcolor="#ffffff" class="main_td2" >
					<div class="main_title">系统基本信息</div>
					</td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">php版本:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_A']['php_info']['phpv'])) $this->magic_vars['_A']['php_info']['phpv'] = ''; echo $this->magic_vars['_A']['php_info']['phpv']; ?></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">GD库版本:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_A']['php_info']['sp_gd'])) $this->magic_vars['_A']['php_info']['sp_gd'] = ''; echo $this->magic_vars['_A']['php_info']['sp_gd']; ?></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">是否安全模式:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_A']['php_info']['sp_safe_mode'])) $this->magic_vars['_A']['php_info']['sp_safe_mode'] = ''; echo $this->magic_vars['_A']['php_info']['sp_safe_mode']; ?></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">服务器操作系统:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_A']['php_info']['sp_os'])) $this->magic_vars['_A']['php_info']['sp_os'] = ''; echo $this->magic_vars['_A']['php_info']['sp_os']; ?></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">服务器IP:</td>
					<td class="main_td1" align="left"><? if (!isset($this->magic_vars['_A']['php_info']['sp_host'])) $this->magic_vars['_A']['php_info']['sp_host'] = ''; echo $this->magic_vars['_A']['php_info']['sp_host']; ?></td>
				</tr>	
				<!--tr>
					<td colspan="2" bgcolor="#ffffff" class="main_td2" >
					<div class="main_title">使用帮助</div>
					</td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">官方网站:</td>
					<td class="main_td1" align="left"><a href="http://www.xmdw.cn" target="_blank">www.xmdw.cn</a></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">官方论坛:</td>
					<td class="main_td1" align="left"><a href="http://bbs.xmdw.cn" target="_blank">bbs.xmdw.cn</a></td>
				</tr>
				<tr>
					<td class="main_td1" align="right" width="15%">系统帮助:</td>
					<td class="main_td1" align="left"><a href="http://help.xmdw.cn" target="_blank">help.xmdw.cn</a></td>
				</tr-->
	      </table>
		
<? $this->magic_include(array('file' => "admin_foot.html", 'vars' => array()));?>