<? if (!isset($_REQUEST['ajax'])) $_REQUEST['ajax']='';if (!isset($_REQUEST['ajax'])) $_REQUEST['ajax']=''; ;if ( !isset( $_REQUEST['ajax']) ||  $_REQUEST['ajax'] != 'true'): ?>
	<? if (!isset($_REQUEST['ajaxInvest'])) $_REQUEST['ajaxInvest']='';if (!isset($_REQUEST['ajaxInvest'])) $_REQUEST['ajaxInvest']=''; ;if ( !isset( $_REQUEST['ajaxInvest']) ||  $_REQUEST['ajaxInvest'] != 'true'): ?>
		<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
		
		<?
		$this->magic_vars['_G']['uurl'] = url_format($this->magic_vars['_G']['nowurl'],"order");
		$this->magic_vars['_G']['epurl'] = url_format($this->magic_vars['_G']['nowurl'],"epage");
		?>
		

		<script type="text/javascript">
			
			var min_month = 0; var max_month = 30;
			var min_interest = 0; var max_interest = 22;
			var min_money = 0;var max_money = 999999999;

			function AJAXChange(value,type) {
				if (type == 1) {
					if (value == 0) {
						min_month = 0;
						max_month = 12;
					} else if (value == 1) {
						min_month = 'day';
						max_month = 'day';
					} else if (value == 3) {
						min_month = 1;
						max_month = 3;
					} else if (value == 6) {
						min_month = 3;
						max_month = 6;
					} else if (value == 12) {
						min_month = 6;
						max_month = 12;
					} else if (value == 13) {
						min_month = 12;
						max_month = 24;
					} else {
						min_month = 0;max_month = 12;
					}
				} else if (type == 2) {
					if (value == 0)	{
						min_interest = 0;
						max_interest = 22;
					} else if (value == 1) {
						min_interest = 0;
						max_interest = 10;
					} else if (value == 10) {
						min_interest = 10;
						max_interest = 15;
					} else if (value == 15) {
						min_interest = 15;
						max_interest = 22;
					} else {
						min_interest = 0;
						max_interest = 22;
					}
				} else {
					if (value == 0) {
						min_money = 0;
						max_money = 999999999;
					} else if (value == 50) {
						min_money = 0;
						max_money = 500000;
					} else if (value == 100) {
						min_money = 500000;
						max_money = 1000000;
					} else if (value == 200) {
						min_money = 1000000;
						max_money = 2000000;
					} else if (value == 201) {
						min_money = 2000000;
						max_money = 999999999;
					} else {
						min_money = 2000000;max_money = 999999999;
					}

				}
				callAJAX();
			}
			
		</script>
		<div class="touzi_main">
			<div class="touzi_m_contain">
				<div class="touzi_m_center clearfix">
					<div class="touzi_m_center_l">
						<div class="touzi_m_center_l_t">
							<h1>筛选投资项目</h1>
							<table>
								<tr>
									<td width="82px">借款状态：</td>
									<td width="88px"><a href="/invest/main.html?type=wait"><? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type'] == 'wait'): ?><span>进行中</span><? else: ?>进行中<? endif; ?></a></td>
									<td width="88px"><a href="/invest/main.html?type=success"><? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type'] == 'success'): ?><span>已完成</span><? else: ?>已完成<? endif; ?></a></td>
								</tr>
								<tr>
									<td width="82px">项目期限：</td>
									<td width="88px" style="cursor: pointer" onclick="AJAXChange(0,1)"><span>不限</span></td>
									<td width="96px" style="cursor: pointer" onclick="AJAXChange(1,1)">天标</td>
									<td width="96px" style="cursor: pointer" onclick="AJAXChange(3,1)">3个月以下</td>
									<td width="96px" style="cursor: pointer" onclick="AJAXChange(6,1)">3-6个月</td>
									<td width="100px" style="cursor: pointer" onclick="AJAXChange(12,1)">6-12个月</td>
									<td style="cursor: pointer" onclick="AJAXChange(13,1)">12个月以上</td>
								</tr>
								<tr>
									<td width="82px">项目收益：</td>
									<td width="88px" style="cursor: pointer" onclick="AJAXChange(0,2)"><span>不限</span></td>
									<td width="96px" style="cursor: pointer" onclick="AJAXChange(1,2)">10%以下</td>
									<td width="96px" style="cursor: pointer" onclick="AJAXChange(10,2)">10%-15%</td>
									<td width="100px" style="cursor: pointer" onclick="AJAXChange(15,2)">15%以上</td>
									<td></td>
								</tr>
								<tr>
									<td width="82px">项目规模：</td>
									<td width="88px" style="cursor: pointer" onclick="AJAXChange(0,3)"><span>不限</span></td>
									<td width="96px" style="cursor: pointer" onclick="AJAXChange(50,3)">50万以下</td>
									<td width="96px" style="cursor: pointer" onclick="AJAXChange(100,3)">50万-100万</td>
									<td width="100px" style="cursor: pointer" onclick="AJAXChange(200,3)">100万-200万</td>
									<td style="cursor: pointer" onclick="AJAXChange(201,3)">200万以上</td>
								</tr>
							</table>
						</div>
						<ul class="touzi_m_center_l_c" id="borrow_list">
							<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','type'=>isset($_REQUEST['type'])?$_REQUEST['type']:'','use'=>isset($_REQUEST['use'])?$_REQUEST['use']:'','is_day'=>isset($_REQUEST['is_day'])?$_REQUEST['is_day']:'','account1'=>isset($_REQUEST['account1'])?$_REQUEST['account1']:'','account2'=>isset($_REQUEST['account2'])?$_REQUEST['account2']:'','limittime'=>isset($_REQUEST['limittime'])?$_REQUEST['limittime']:'','limittime1'=>isset($_REQUEST['limittime1'])?$_REQUEST['limittime1']:'','limittime2'=>isset($_REQUEST['limittime2'])?$_REQUEST['limittime2']:'','award'=>isset($_REQUEST['award'])?$_REQUEST['award']:'','province'=>isset($_REQUEST['province'])?$_REQUEST['province']:'','city'=>isset($_REQUEST['city'])?$_REQUEST['city']:'','epage'=>'10','order'=>isset($_REQUEST['order'])?$_REQUEST['order']:'','gostatus'=>isset($_REQUEST['gostatus'])?$_REQUEST['gostatus']:'','style'=>isset($_REQUEST['style'])?$_REQUEST['style']:'','site_id'=>$this->magic_vars['_G']['site_result']['site_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>
							<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
							<li>
								<h1><a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></a></h1>
								<h2>
									<dl class="touzi_l_c_1">
										<dt>
										<p><strong><? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>%</strong></p>
										<p>年化利率</p>
										</dt>
										<dd>
											<p>
												<? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>
													<strong><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?></strong>天
												<? else: ?>
													<strong><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = ''; echo $this->magic_vars['var']['time_limit']; ?></strong>个月
												<? endif; ?>
											</p>
											<p>项目期限</p>
										</dd>
									</dl>
									<div class="touzi_l_c_2">
										<p>项目类型:<? if (!isset($this->magic_vars['var']['use'])) $this->magic_vars['var']['use'] = '';$_tmp = $this->magic_vars['var']['use'];$_tmp = $this->magic_modifier("borrowUse",$_tmp,"");echo $_tmp;unset($_tmp); ?></p>
										<p>截止时间:<? if (!isset($this->magic_vars['var']['verify_time'])) $this->magic_vars['var']['verify_time'] = ''; if (!isset($this->magic_vars['var']['valid_time'])) $this->magic_vars['var']['valid_time'] = '';$_tmp = $this->magic_vars['var']['verify_time']+$this->magic_vars['var']['valid_time']*24*60*60;$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></p>
									</div>
									<div class="touzi_l_c_3">
										<p>借款金额：<span>￥<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?></span></p>
									</div>
								</h2>
								<h3>
									<div class="touzi_l_c_h3_l">
										<p class="clearfix">
											<span>按月付息　到期还本</span>
											<em><i>当前进度/</i><? if (!isset($this->magic_vars['var']['scale'])) $this->magic_vars['var']['scale'] = ''; echo $this->magic_vars['var']['scale']; ?>%</em>
										</p>
										<div>
											<i percent="<? if (!isset($this->magic_vars['var']['scale'])) $this->magic_vars['var']['scale'] = ''; echo $this->magic_vars['var']['scale']; ?>%"></i>
										</div>
									</div>
									<a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html?detail=true" class="touzi_l_c_h3_r">
											<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']='';if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] == 0 ||  $this->magic_vars['var']['status'] == 1): ?>
											查看
											<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==3): ?>
											<? if (!isset($this->magic_vars['var']['repayment_account'])) $this->magic_vars['var']['repayment_account']='';if (!isset($this->magic_vars['var']['repayment_yesaccount'])) $this->magic_vars['var']['repayment_yesaccount']=''; ;if (  $this->magic_vars['var']['repayment_account'] ==  $this->magic_vars['var']['repayment_yesaccount']): ?>
											已还完
											<? else: ?>
											还款中
											<? endif; ?>
											<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==5): ?>
											已撤销
											<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account']='';if (!isset($this->magic_vars['var']['account_yes'])) $this->magic_vars['var']['account_yes']=''; ;elseif (  $this->magic_vars['var']['account']> $this->magic_vars['var']['account_yes']): ?>
											<? if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $this->magic_vars['var']['is_vouch']==1): ?><!--如果是担保标-->
											<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;if (  $this->magic_vars['var']['vouch_scale'] >=100): ?>
											立即投标
											<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;elseif (  $this->magic_vars['var']['vouch_scale'] < 100): ?>
											立即担保
											<? else: ?>
											<!--<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/tender.gif" />-->
											<? endif; ?>
											<? else: ?>
											立即投标
											<? endif; ?>
											<? else: ?>
											等待复审
											<? endif; ?>
									</a>
								</h3>
							</li>
							<? endforeach; endif; unset($_from); ?>
							<? unset($_magic_vars); ?>
							<div style="line-height:50px; text-align:center; border-bottom:#e7eaec 1px solid;"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
						</ul>
						<script type="text/javascript">
							
							var inputId = 'borrow_list';
							function callAJAX(min_value,max_value,type) {
								ajaxObj = new AJAXClass();
								buildRequest = '&ajaxInvest=true&apr1='+min_interest+'&apr2='+max_interest+'&account1='+min_money+'&account2='+max_money;
								if (min_month == 'day') {
									buildRequest += '&is_day=1'
								} else {
									buildRequest += '&limittime1='+min_month+'&limittime2='+max_month;
								}
								buildRequest += buildRequest;

								

								<? if (!isset($_REQUEST['type'])) $_REQUEST['type']=''; ;if (  $_REQUEST['type'] == 'wait'): ?>
									ajaxObj.path = '/invest/main.html?type=wait'+buildRequest;
								<? else: ?>
									ajaxObj.path = '/invest/main.html?type=success'+buildRequest;
								<? endif; ?>
								
								//document.write(ajaxObj.path);
								ajaxObj.AJAXRequest();
							}

							function ajaxUrl(url) {

								var inputId = 'borrow_list';
								ajaxObj = new AJAXClass();
								ajaxObj.path = '/invest/'+url;

								ajaxObj.AJAXRequest();
							}
							

						</script>
		            </div>
		        </div>
			</div>
		</div>
		<script>
			
			$.each($('.touzi_l_c_h3_l i'), function(){
				$(this).animate({width:$(this).attr('percent')});
			});
			
		</script>
		<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>
	<? else: ?>
		<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','type'=>isset($_REQUEST['type'])?$_REQUEST['type']:'','use'=>isset($_REQUEST['use'])?$_REQUEST['use']:'','is_day'=>isset($_REQUEST['is_day'])?$_REQUEST['is_day']:'','account1'=>isset($_REQUEST['account1'])?$_REQUEST['account1']:'','account2'=>isset($_REQUEST['account2'])?$_REQUEST['account2']:'','limittime'=>isset($_REQUEST['limittime'])?$_REQUEST['limittime']:'','limittime1'=>isset($_REQUEST['limittime1'])?$_REQUEST['limittime1']:'','limittime2'=>isset($_REQUEST['limittime2'])?$_REQUEST['limittime2']:'','apr1'=>isset($_REQUEST['apr1'])?$_REQUEST['apr1']:'','apr2'=>isset($_REQUEST['apr2'])?$_REQUEST['apr2']:'','award'=>isset($_REQUEST['award'])?$_REQUEST['award']:'','province'=>isset($_REQUEST['province'])?$_REQUEST['province']:'','city'=>isset($_REQUEST['city'])?$_REQUEST['city']:'','epage'=>'10','order'=>isset($_REQUEST['order'])?$_REQUEST['order']:'','gostatus'=>isset($_REQUEST['gostatus'])?$_REQUEST['gostatus']:'','style'=>isset($_REQUEST['style'])?$_REQUEST['style']:'','site_id'=>$this->magic_vars['_G']['site_result']['site_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>
		<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
		<li>
			<h1><a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></a></h1>
			<h2>
				<dl class="touzi_l_c_1">
					<dt>
					<p><strong><? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>%</strong></p>
					<p>年化利率</p>
					</dt>
					<dd>
						<p>
							<? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>
							<strong><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?></strong>天
							<? else: ?>
							<strong><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = ''; echo $this->magic_vars['var']['time_limit']; ?></strong>个月
							<? endif; ?>
						</p>
						<p>项目期限</p>
					</dd>
				</dl>
				<div class="touzi_l_c_2">
					<p>项目类型:<? if (!isset($this->magic_vars['var']['use'])) $this->magic_vars['var']['use'] = '';$_tmp = $this->magic_vars['var']['use'];$_tmp = $this->magic_modifier("borrowUse",$_tmp,"");echo $_tmp;unset($_tmp); ?></p>
					<p>截止时间:<? if (!isset($this->magic_vars['var']['verify_time'])) $this->magic_vars['var']['verify_time'] = ''; if (!isset($this->magic_vars['var']['valid_time'])) $this->magic_vars['var']['valid_time'] = '';$_tmp = $this->magic_vars['var']['verify_time']+$this->magic_vars['var']['valid_time']*24*60*60;$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></p>
				</div>
				<div class="touzi_l_c_3">
					<p>借款金额：<span>￥<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?></span></p>
				</div>
			</h2>
			<h3>
				<div class="touzi_l_c_h3_l">
					<p class="clearfix">
						<span>按月付息　到期还本</span>
						<em><i>当前进度/</i><? if (!isset($this->magic_vars['var']['scale'])) $this->magic_vars['var']['scale'] = ''; echo $this->magic_vars['var']['scale']; ?>%</em>
					</p>
					<div>
						<i style="width:<? if (!isset($this->magic_vars['var']['scale'])) $this->magic_vars['var']['scale'] = ''; echo $this->magic_vars['var']['scale']; ?>%; "></i>
					</div>
				</div>
				<a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html?detail=true" class="touzi_l_c_h3_r">
					<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']='';if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] == 0 ||  $this->magic_vars['var']['status'] == 1): ?>
					查看
					<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==3): ?>
					<? if (!isset($this->magic_vars['var']['repayment_account'])) $this->magic_vars['var']['repayment_account']='';if (!isset($this->magic_vars['var']['repayment_yesaccount'])) $this->magic_vars['var']['repayment_yesaccount']=''; ;if (  $this->magic_vars['var']['repayment_account'] ==  $this->magic_vars['var']['repayment_yesaccount']): ?>
					已还完
					<? else: ?>
					还款中
					<? endif; ?>
					<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==5): ?>
					已撤销
					<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account']='';if (!isset($this->magic_vars['var']['account_yes'])) $this->magic_vars['var']['account_yes']=''; ;elseif (  $this->magic_vars['var']['account']> $this->magic_vars['var']['account_yes']): ?>
					<? if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $this->magic_vars['var']['is_vouch']==1): ?><!--如果是担保标-->
					<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;if (  $this->magic_vars['var']['vouch_scale'] >=100): ?>
					立即投标
					<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;elseif (  $this->magic_vars['var']['vouch_scale'] < 100): ?>
					立即担保
					<? else: ?>
					<!--<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/tender.gif" />-->
					<? endif; ?>
					<? else: ?>
					立即投标
					<? endif; ?>
					<? else: ?>
					等待复审
					<? endif; ?>
				</a>
			</h3>
		</li>
		<? endforeach; endif; unset($_from); ?>
		<? unset($_magic_vars); ?>
		<div style="line-height:50px; text-align:center; border-bottom:#e7eaec 1px solid;"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
	<? endif; ?>
<? else: ?>

	<? if (!isset($_REQUEST['home'])) $_REQUEST['home']='';if (!isset($_REQUEST['home'])) $_REQUEST['home']=''; ;if ( isset( $_REQUEST['home']) &&  $_REQUEST['home'] == 'true'): ?>
		<? $this->magic_vars['query_type']='GetList';$data = array('var'=>'loop','keywords'=>isset($_REQUEST['keywords'])?$_REQUEST['keywords']:'','type'=>'index','use'=>isset($_REQUEST['use'])?$_REQUEST['use']:'','account1'=>isset($_REQUEST['account1'])?$_REQUEST['account1']:'','account2'=>isset($_REQUEST['account2'])?$_REQUEST['account2']:'','limittime'=>isset($_REQUEST['limittime'])?$_REQUEST['limittime']:'','award'=>isset($_REQUEST['award'])?$_REQUEST['award']:'','province'=>isset($_REQUEST['province'])?$_REQUEST['province']:'','city'=>isset($_REQUEST['city'])?$_REQUEST['city']:'','epage'=>'9','order'=>isset($_REQUEST['order'])?$_REQUEST['order']:'','gostatus'=>isset($_REQUEST['gostatus'])?$_REQUEST['gostatus']:'','style'=>isset($_REQUEST['style'])?$_REQUEST['style']:'','project_type'=>isset($_REQUEST['project_type'])?$_REQUEST['project_type']:'','site_id'=>$this->magic_vars['_G']['site_result']['site_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>

		<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['var']):
?>
		<li <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] == 0 ||  $this->magic_vars['key'] == 3 ||  $this->magic_vars['key'] == 6): ?>style="margin-left:0px;"<? endif; ?>>
			<h1><a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = '';$_tmp = $this->magic_vars['var']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></h1>

			<h2>
				<p>募集金额：<span>￥<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?></span>　　 <span style="float:right;color: #000000"><? if (!isset($this->magic_vars['var']['use'])) $this->magic_vars['var']['use'] = '';$_tmp = $this->magic_vars['var']['use'];$_tmp = $this->magic_modifier("borrowUse",$_tmp,"");echo $_tmp;unset($_tmp); ?></span></p>
				<p>截止时间:<? if (!isset($this->magic_vars['var']['verify_time'])) $this->magic_vars['var']['verify_time'] = ''; if (!isset($this->magic_vars['var']['valid_time'])) $this->magic_vars['var']['valid_time'] = '';$_tmp = $this->magic_vars['var']['verify_time']+$this->magic_vars['var']['valid_time']*24*60*60;$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></p>
			</h2>
			<dl class="clearfix">
				<dt>
				<p><strong><? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>%</strong></p>
				<p>年化利率</p>
				</dt>
				<dd>
					<p>
						<? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>
						<strong><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?></strong>天
						<? else: ?>
						<strong><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = ''; echo $this->magic_vars['var']['time_limit']; ?></strong>个月
						<? endif; ?>
					</p>
					<p>项目期限</p>
				</dd>
			</dl>
			<h3>
				<p>按月付息　到期还本</p>
				<div>
					<i style="width:<? if (!isset($this->magic_vars['var']['scale'])) $this->magic_vars['var']['scale'] = ''; echo $this->magic_vars['var']['scale']; ?>%;"></i>
				</div>
				<p><span><? if (!isset($this->magic_vars['var']['account_yes'])) $this->magic_vars['var']['account_yes'] = ''; echo $this->magic_vars['var']['account_yes']; ?> /</span> <? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?></p>
			</h3>

			<h4>
				<a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html?detail=true">
					<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']='';if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status'] == 0 ||  $this->magic_vars['var']['status'] == 1): ?>
					查看
					<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==3): ?>
					<? if (!isset($this->magic_vars['var']['repayment_account'])) $this->magic_vars['var']['repayment_account']='';if (!isset($this->magic_vars['var']['repayment_yesaccount'])) $this->magic_vars['var']['repayment_yesaccount']=''; ;if (  $this->magic_vars['var']['repayment_account'] ==  $this->magic_vars['var']['repayment_yesaccount']): ?>
					已还完
					<? else: ?>
					还款中
					<? endif; ?>
					<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==5): ?>
					已撤销
					<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account']='';if (!isset($this->magic_vars['var']['account_yes'])) $this->magic_vars['var']['account_yes']=''; ;elseif (  $this->magic_vars['var']['account']> $this->magic_vars['var']['account_yes']): ?>
					<? if (!isset($this->magic_vars['var']['is_vouch'])) $this->magic_vars['var']['is_vouch']=''; ;if (  $this->magic_vars['var']['is_vouch']==1): ?><!--如果是担保标-->
					<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;if (  $this->magic_vars['var']['vouch_scale'] >=100): ?>
					立即投标
					<? if (!isset($this->magic_vars['var']['vouch_scale'])) $this->magic_vars['var']['vouch_scale']=''; ;elseif (  $this->magic_vars['var']['vouch_scale'] < 100): ?>
					立即担保
					<? else: ?>
					<!--<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/tender.gif" />-->
					<? endif; ?>
					<? else: ?>
					立即投标
					<? endif; ?>
					<? else: ?>
					等待复审
					<? endif; ?>
				</a>
			</h4>
		</li>
		<? endforeach; endif; unset($_from); ?>
		<? unset($_magic_vars); ?>
	<? else: ?>

	<? endif; ?>
<? endif; ?>