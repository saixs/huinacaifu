<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_id']==""): ?>
	<script>alert("你还没有登录，请先登录再查看");location.href='/index.php?user';</script>
    <?php die;?>
<? endif; ?>
<? $data = array('id'=>$_REQUEST['borrow_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::protocolViewAllow($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
    <? if (!isset($this->magic_vars['var']['0'])) $this->magic_vars['var']['0']='';if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['var']['0'] != 1 &&  $this->magic_vars['_G']['user_id']!=1): ?>
        <script>alert("只允许参与该笔借款投资的投资人查看");location.href='/index.php?user';</script>
        <?php die;?>
    <? endif; ?>
<? unset($_magic_vars);unset($data); ?>
<? $data = array('id'=>$_REQUEST['borrow_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetOne($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
<!--<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=3): ?>
<script>alert("您的操作有误");location.href='/index.php?user';</script>
<? endif; ?>-->

<style type="text/css">
    .pro_title {font-size:16px; font-weight: bold}
    .indent_four{text-indent:40px;}
    .indent_eight{text-indent: 80px;}
</style>

<div class="wrap950 mar10">
	<div class="protocol">
        <br />
		<div class="pro_title">借款协议书(汇纳财富网)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;协议号：<? if (!isset($this->magic_vars['var']['addtime'])) $this->magic_vars['var']['addtime'] = ''; echo $this->magic_vars['var']['addtime']; ?><? if (!isset($this->magic_vars['var']['number_id'])) $this->magic_vars['var']['number_id'] = ''; echo $this->magic_vars['var']['number_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签订日期：<? if (!isset($this->magic_vars['var']['repayment_time'])) $this->magic_vars['var']['repayment_time'] = '';$_tmp = $this->magic_vars['var']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></div><br />
        <strong>甲方(出借人):</strong> <br /><br />
            <div>
                <table class="gvList" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvLoans" style="width:60%;border-collapse:collapse;position: relative; left: 40px;">
                    <tr height="30">
                        <th align="center" scope="col">出借人</th>
                        <th align="center" scope="col">出借金额</th>
                        <th align="center" scope="col">出借期限</th>
                        <th align="center" scope="col"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?>还款本息<? else: ?>月还款本息<? endif; ?></th>
                    </tr>
                    <? $this->magic_vars['query_type']='GetTenderList';$data = array('var'=>'bor','borrow_id'=>isset($_REQUEST['borrow_id'])?$_REQUEST['borrow_id']:'','limit'=>'all');$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['bor']):
?>
                    <tr height="30">
                        <td style="text-align: center"><? if (!isset($this->magic_vars['bor']['username'])) $this->magic_vars['bor']['username'] = ''; echo $this->magic_vars['bor']['username']; ?></td>
                        <td style="text-align: center"><? if (!isset($this->magic_vars['bor']['tender_account'])) $this->magic_vars['bor']['tender_account'] = ''; echo $this->magic_vars['bor']['tender_account']; ?>元</td>
                        <? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>
                        <td style="text-align: center"><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?>天</td>
                        <? else: ?><td style="text-align: center"><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = '';$_tmp = $this->magic_vars['var']['time_limit'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_time_limit");echo $_tmp;unset($_tmp); ?></td><? endif; ?>
                        <td style="text-align: center"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?> <? if (!isset($this->magic_vars['bor']['repayment_account'])) $this->magic_vars['bor']['repayment_account'] = ''; echo $this->magic_vars['bor']['repayment_account']; ?> 元  <? else: ?><? if (!isset($this->magic_vars['bor']['equal']['monthly_repayment'])) $this->magic_vars['bor']['equal']['monthly_repayment'] = ''; echo $this->magic_vars['bor']['equal']['monthly_repayment']; ?> 元<? endif; ?></td>
                    </tr>
                    <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
                </table>
            </div><br />
        <strong>乙方(借款人):</strong> <? if (!isset($this->magic_vars['var']['realname'])) $this->magic_vars['var']['realname'] = '';$_tmp = $this->magic_vars['var']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?> <br />
        <strong>身份证号:</strong> <? if (!isset($this->magic_vars['var']['card_id'])) $this->magic_vars['var']['card_id'] = '';$_tmp = $this->magic_vars['var']['card_id'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?><br />
        <strong>汇纳财富网用户名:</strong> <? if (!isset($this->magic_vars['var']['username'])) $this->magic_vars['var']['username'] = ''; echo $this->magic_vars['var']['username']; ?> <br /><br />
        <strong>丙方(居间人):</strong>昆明汇纳经济信息服务有限公司 <br />
        <strong>注册号:</strong>530103100135670 <br /><br />
        <strong>鉴于：</strong><br />
        1.甲方拥有富余资金拟供出借以获取利息收益，丙方掌握丰富的借款人资源信息并拥有专业的信用评价和管理服务平台；<br />
        2.甲方愿意接受丙方提供的投资咨询与管理服务，由丙方撮合甲方与乙方达成借贷交易，并由丙方提供与借款协议的履行有
        关的其他服务，丙方愿意向甲方提供该等服务。<br /><br />
        <strong>乙方通过汇纳财富网www.huinacaifu.com网站 ( 即杭州汇纳财富信息服务有限公司 www.huinacaifu.com,以下简称“丙方”) 的居间,就有关
        借款事项与甲方各出借人达成如下协议：</strong><br /><br />
		<div class="pro_title">第一条：借款详情如下表所示:</div><br />
		<div>
        <? $this->magic_vars['query_type']='GetTenderList';$data = array('var'=>'bor','borrow_id'=>isset($_REQUEST['borrow_id'])?$_REQUEST['borrow_id']:'','limit'=>'all');$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['bor']):
?>
        <table class="gvList" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvLoans" style="width:60%;border-collapse:collapse;position: relative; left: 40px;">
            <tr height="30"><td align="center">出借人</td><td align="center"><? if (!isset($this->magic_vars['bor']['username'])) $this->magic_vars['bor']['username'] = ''; echo $this->magic_vars['bor']['username']; ?></td></tr>
            <tr height="30"><td align="center">借款金额</td><td align="center"><? if (!isset($this->magic_vars['bor']['tender_account'])) $this->magic_vars['bor']['tender_account'] = ''; echo $this->magic_vars['bor']['tender_account']; ?>元</td></tr>
            <tr height="30">
                <td align="center">借款期限</td>
                <? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>
                    <td align="center"><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?>天</td>
                <? else: ?>
                    <td align="center"><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = '';$_tmp = $this->magic_vars['var']['time_limit'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_time_limit");echo $_tmp;unset($_tmp); ?></td>
                <? endif; ?>
            </tr>
            <tr height="30"><td align="center">年利率</td><td align="center"><? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>%</td></tr>
            <tr height="30"><td align="center">借款开始日</td><td align="center"><? if (!isset($this->magic_vars['var']['success_time'])) $this->magic_vars['var']['success_time'] = '';$_tmp = $this->magic_vars['var']['success_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td></tr>
            <tr height="30"><td align="center">借款到期日</td><td align="center"><? if (!isset($this->magic_vars['var']['end_time'])) $this->magic_vars['var']['end_time'] = '';$_tmp = $this->magic_vars['var']['end_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td></tr>
            <tr height="30"><td align="center">月截止还款日</td><td align="center"><? if (!isset($this->magic_vars['var']['each_time'])) $this->magic_vars['var']['each_time'] = ''; echo $this->magic_vars['var']['each_time']; ?></td></tr>
            <tr height="30">
                <td align="center"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?>还款本息<? else: ?>月还款本息<? endif; ?></td>
                <td align="center"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?> <? if (!isset($this->magic_vars['bor']['repayment_account'])) $this->magic_vars['bor']['repayment_account'] = ''; echo $this->magic_vars['bor']['repayment_account']; ?> 元  <? else: ?><? if (!isset($this->magic_vars['bor']['equal']['monthly_repayment'])) $this->magic_vars['bor']['equal']['monthly_repayment'] = ''; echo $this->magic_vars['bor']['equal']['monthly_repayment']; ?> 元<? endif; ?></td>
            </tr>
        </table>
        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
		</div>
		<div class="content">
            <div class="pro_title">第二条：还款</div>
            <p class="indent_four">1、乙方承诺按照本协议第一条约定的时间和金额按期足额向甲方还款。</p>
            <p class="indent_four">2、乙方的最后一期还款必须包含全部剩余本金、利息及其他根据本协议产生的全部费用。</p>
            <p class="indent_four">3、乙方的每一期还款的还款金额计算公式为：每月需还款总金额=每月需还利息+每月需还本金。</p>
            <div class="pro_title">第三条：逾期还款</div>
            <p class="indent_four">1、若乙方逾期仍未还款,乙方除向出借人支付正常利息以外,还应每天向丙方支付逾期罚息(金额为未偿还本息的千分之四)。
                甲方和乙方均同意并认可，丙方可通过短信、电话、上门催收等方式对乙方逾期未偿还的本息进行催收,且丙方有权按照前述
                标准向乙方收取催收服务费用，暂不公开个人隐私资料。 上门催收费为每次2000元。</p>
            <p class="indent_four">2、乙方同意，其逾期还款造成甲方因此支付的费用(包括但不限于律师费)由乙方承担；</p>
            <p class="indent_four">3、乙方同意，如乙方逾期未偿还任何一期还款，丙方有权采取以下措施之一项或几项：</p>
            <p class="indent_eight">（1）将乙方的有关身份资料及其他个人信息通过丙方“逾期黑名单”等栏目对外公开；</p>
            <p class="indent_eight">（2）将乙方的有关身份资料及其他个人信息正式备案在“不良信用记录”,列入全国个人信用评级体系的黑名单(“不良
                信用记录”数据将为银行、电信、担保公司、人才中心等有关机构提供个人不良信用信息)；</p>
            <p class="indent_eight">（3）对乙方采取法律措施,由此所产生的所有法律后果将由乙方来承担。甲方同意授权并支持丙方采取以上措施。</p>
            <p class="indent_four">4、对于抵押借款标，甲方和乙方均同意，如甲方为VIP用户，乙方还款日当天23:00仍未清偿借款本金(如甲方为非VIP用户，
                乙方逾期1天仍未清偿借款本息),则甲方将本协议项下的债权转让给本公司或本公司合作公司；对于净值借款标，甲方和乙方
                均同意，如甲方为VIP用户，乙方逾期10天仍未清偿借款本息(如甲方为非VIP用户，乙方逾期30天仍未清偿借款本息),则甲方
                将本协议项下的债权转让给本公司或本公司合作公司；转让价格为不超过乙方逾期仍未偿还的借款本息（具体金额视甲方在
                丙方的会员级别不同而有所不同），本公司或本公司合作公司向甲方支付乙方逾期仍未偿还的本金即可取得甲方在本协议项
                下的债权；本公司或本公司合作公司将依法自行承担清收费用，向乙方追收借款本金、利息、逾期罚息等，坏账风险由本公
                司或本公司合作公司承担。</p>
            <p class="indent_four">5、丙方对逾期仍未还款的乙方收取逾期罚息作为催收费用、采取多种方式进行催收、将乙方的相关信息对外公开或列入“不
                良信用记录”或采取法律措施等各项行为，是丙方根据本协议为甲方提供的一种服务，该等服务的法律后果均由乙方和甲方
                自行承担。</p>
            <div class="pro_title">第四条：借款的支付和还款方式</div>
            <p class="indent_four">1、甲方在同意向乙方出借相应款项时,已委托丙方在本借款协议生效时将该笔借款直接划付至乙方帐户。</p>
            <p class="indent_four">2、乙方已委托丙方将还款直接划付至甲方帐户。</p>
            <p class="indent_four">3、乙方和甲方均同意，丙方接受乙方或甲方委托所采取的划付款项行为，所产生的法律后果均由相应委托方乙方或甲方自行
                承担。</p>
            <p class="indent_four">4、若乙方的任何一期还款不足以偿还应还本金、利息和违约金,则甲方之间同意按照各自出借金额在出借金额总额中的比例
                收取还款。</p>
            <p class="indent_four">5、本协议的履行地为丙方的住所地(杭州市)。</p>
            <div class="pro_title">第五条：提前到期和提前偿还</div>
            <p class="indent_four">1、双方同意,若乙方出现如下任何一种情况,则本协议项下的全部借款自动提前到期,乙方在收到丙方发出的借款提前到期通
                知后，应立即清偿全部本金、利息、逾期利息及根据本协议产生的其他全部费用：</p>
            <p class="indent_eight">（1）乙方因任何原因逾期支付任何一期还款超过10天的；</p>
            <p class="indent_eight">（2）乙方的工作单位、职务或住所变更后，未在30天内通知丙方；</p>
            <p class="indent_eight">（3）乙方发生影响其清偿本协议项下借款的其他不利变化，未在30天内通知丙方。</p>
            <p class="indent_four">2、双方同意,乙方有权提前清偿全部或者部分借款，提前还款需支付当期利息。</p>
            <p class="indent_four">3、本借款协议中的每一甲方与乙方之间的借款均是相互独立的,一旦乙方逾期未归还借款本息,任何一甲方有权单独对该甲方
                未收回的借款本息向乙方追索或者提起诉讼。</p>
            <div class="pro_title">第六条：法律适用和管辖</div>
            <p class="indent_four">本协议的签订、履行、终止、解释均适用中华人民共和国法律,并由协议履行地杭州市人民法院管辖。</p>
            <div class="pro_title">第七条：网站的收费</div>
            <p class="indent_four">丙方（www.huinacaifu.com）为甲方及乙方提供居间服务，并收取相关费用。抵押标
                审核费为本金的0-6%。抵押标的账户管理费为本金的0.5%每月。审核费及账户管理费在借款标复审通过时一次性扣除，不退还。其他收费以网站的最新公告为准。</p>
            <div class="pro_title">第八条：特别条款</div>
            <p class="indent_four">1、乙方保证，乙方的借款用于合法用途，不将所借款项用于任何违法活动(包括但不限于赌博、吸毒、贩毒、卖淫嫖娼等)及
                一切高风险投资(如证券期货、彩票等)。如乙方违反前述保证或有违反前述保证的嫌疑，则甲方有权采取下列措施：</p>
            <p class="indent_eight">（1）宣布提前收回全部借款；</p>
            <p class="indent_eight">（2）甲方向公安等有关行政机关举报，追回此款并追究乙方的刑事责任，甲方和乙方均同意并授权丙方采取前述措施。</p>
            <p class="indent_four">2、丙方仅作为小额资金互助平台,乙方和甲方均不得利用丙方平台进行信用卡套现和其他洗钱等不正当交易行为,否则甲方、
                乙方和丙方有权向公安等有关行政机关举报,追究其相关法律责任。</p>
            <p class="indent_four">3、用户一经注册丙方（汇纳财富网），即视为同意并认可本服务协议，并全权委托杭州杭州汇纳财富信息服务有限公司代为选择适当
                的代理人为用户办理具体的款项借出事宜。代理人因办理款项借出而产生的任何权益，包括但不限于债权、物权、利息收益
                、逾期收益等，除另有约定外，均无条件归甲方所有。因乙方原因导致代理人无法对用户履行义务时，除另有约定外，甲方
                可无条件，直接代位行使代理人对乙方的一切权利。</p>
            <div class="pro_title">第九条：其他</div>
            <p class="indent_four">1、本协议采用电子文本形式制成。</p>
            <p class="indent_four">2、本协议自乙方在丙方发布的借款标的审核成功之日即本协议题头标明的签订日起生效,乙方、甲方、丙方各执一份,并具同
                等法律效力。</p>
            <p class="indent_four">3、乙方、甲方在履行本协议过程中，应遵守丙方的各项规定。</p>
            <p class="indent_four">4、甲方、乙方同意、授权或认可，丙方作为网络借款的中间平台根据本协议的规定和丙方的其他规定行使各项权利、发出各
                项通知或采取各项措施，一切法律后果和风险均由乙方或甲方承担。</p>
            <p class="indent_four">5、丙方（汇纳财富网www.huinacaifu.com）拥有对本协议的最终解释权。</p>

		</div>
		<div style="float:right;padding-top:-20px;">
		</div>
		<div style="float:right;">
		<? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?></br>
		<? if (!isset($this->magic_vars['var']['verify_time'])) $this->magic_vars['var']['verify_time'] = '';$_tmp = $this->magic_vars['var']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"");echo $_tmp;unset($_tmp); ?>
		</div>
	</div>
</div>
<? unset($_magic_vars);unset($data); ?>
<? $this->magic_include(array('file' => "footer.html", 'vars' => array()));?>