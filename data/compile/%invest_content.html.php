<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<? $data = array('article_id'=>'0','invest_user_id'=>$this->magic_vars['_G']['user_id'],'id'=>$this->magic_vars['_G']['article_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetInvest($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
<div class="touzi_main">
	<div class="touzi_m_contain">
		<div class="touzi2_m_1f clearfix">
			<div class="touzi2_m_1f_l">
				<h1><? if (!isset($this->magic_vars['var']['borrow']['name'])) $this->magic_vars['var']['borrow']['name'] = ''; echo $this->magic_vars['var']['borrow']['name']; ?></h1>
				<h2>
					<div class="tz2_h2_1">
						<p><strong>��<? if (!isset($this->magic_vars['var']['borrow']['account'])) $this->magic_vars['var']['borrow']['account'] = ''; echo $this->magic_vars['var']['borrow']['account']; ?></strong></p>
						<p>�ܶ��</p>
					</div>
					<div class="tz2_h2_2">
						<p><strong><? if (!isset($this->magic_vars['var']['borrow']['apr'])) $this->magic_vars['var']['borrow']['apr'] = ''; echo $this->magic_vars['var']['borrow']['apr']; ?>%</strong></p>
						<p>�껯������</p>
					</div>
					<div class="tz2_h2_3">
						<p>
								<strong>
								<? if (!isset($this->magic_vars['var']['borrow']['isday'])) $this->magic_vars['var']['borrow']['isday']=''; ;if (  $this->magic_vars['var']['borrow']['isday']==1): ?>
									<? if (!isset($this->magic_vars['var']['borrow']['time_limit_day'])) $this->magic_vars['var']['borrow']['time_limit_day'] = ''; echo $this->magic_vars['var']['borrow']['time_limit_day']; ?>��
								<? else: ?>
									<? if (!isset($this->magic_vars['var']['borrow']['time_limit'])) $this->magic_vars['var']['borrow']['time_limit'] = ''; echo $this->magic_vars['var']['borrow']['time_limit']; ?>����
								<? endif; ?>
							</strong>
						</p>
						<p>�������</p>
					</div>
				</h2>
				<h3>
					<div class="tz2_h3_l">
						<p>��ֹʱ�䣺<? if (!isset($this->magic_vars['var']['borrow']['end_time'])) $this->magic_vars['var']['borrow']['end_time'] = '';$_tmp = $this->magic_vars['var']['borrow']['end_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></p>
						<p>
							Ͷ�ʽ���:
							<? if (!isset($this->magic_vars['var']['borrow']['funds'])) $this->magic_vars['var']['borrow']['funds']=''; ;if (  $this->magic_vars['var']['borrow']['funds'] > 0): ?>
								<span class="borrow_info"><? if (!isset($this->magic_vars['var']['borrow']['funds'])) $this->magic_vars['var']['borrow']['funds'] = ''; echo $this->magic_vars['var']['borrow']['funds']; ?></span>%
							<? else: ?>
								�޽���
							<? endif; ?>
						</p>
					</div>
					<div class="tz2_h3_r">
						<p>��Ͷ�� <span>��<? if (!isset($this->magic_vars['var']['borrow']['lowest_account'])) $this->magic_vars['var']['borrow']['lowest_account'] = ''; echo $this->magic_vars['var']['borrow']['lowest_account']; ?>Ԫ</span></p>
						<p>����Ͷ�� <span><? if (!isset($this->magic_vars['var']['borrow']['most_account'])) $this->magic_vars['var']['borrow']['most_account']=''; ;if (  $this->magic_vars['var']['borrow']['most_account'] == 0): ?>������<? else: ?>��<? if (!isset($this->magic_vars['var']['borrow']['most_account'])) $this->magic_vars['var']['borrow']['most_account'] = ''; echo $this->magic_vars['var']['borrow']['most_account']; ?>Ԫ<? endif; ?></span></p>
					</div>
				</h3>
				<h4>
					<div class="tz2_h4_l">
						<p>
							<span>
								<? if (!isset($this->magic_vars['var']['borrow']['isday'])) $this->magic_vars['var']['borrow']['isday']=''; ;if (  $this->magic_vars['var']['borrow']['isday']==1): ?>
				                    ����ȫ���
				                <? else: ?>
				                    <? if (!isset($this->magic_vars['var']['borrow']['style'])) $this->magic_vars['var']['borrow']['style']=''; ;if (  $this->magic_vars['var']['borrow']['style'] == 0): ?>
				                        ���·���/�ȶϢ
									<? if (!isset($this->magic_vars['var']['borrow']['style'])) $this->magic_vars['var']['borrow']['style']=''; ;elseif (  $this->magic_vars['var']['borrow']['style'] == 2): ?>
										���ڻ�����Ϣ
				                    <? else: ?>
									
				                        ���ڻ������¸�Ϣ
				                    <? endif; ?>
				                <? endif; ?>
							</span>
							<em><i><? if (!isset($this->magic_vars['var']['borrow']['account_yes'])) $this->magic_vars['var']['borrow']['account_yes'] = ''; echo $this->magic_vars['var']['borrow']['account_yes']; ?> /</i> <? if (!isset($this->magic_vars['var']['borrow']['account'])) $this->magic_vars['var']['borrow']['account'] = ''; echo $this->magic_vars['var']['borrow']['account']; ?></em>
						</p>
						<div>
							<i style="width:<? if (!isset($this->magic_vars['var']['borrow']['scale'])) $this->magic_vars['var']['borrow']['scale'] = ''; echo $this->magic_vars['var']['borrow']['scale']; ?>%"></i>
						</div>
					</div>

					<div class="tz2_h4_r">
						ÿ100Ԫ���桡<span><? if (!isset($this->magic_vars['var']['borrow']['interest'])) $this->magic_vars['var']['borrow']['interest'] = '';$_tmp = $this->magic_vars['var']['borrow']['interest'];$_tmp = $this->magic_modifier("round",$_tmp,"2");echo $_tmp;unset($_tmp); ?></span>��Ԫ
					</div>
				</h4>
			</div>

			<div class="touzi2_m_1f_r">
				<h1>
					<span>����Ͷ��</span>
					<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']=''; ;if (  $this->magic_vars['var']['borrow']['status']==3): ?>
						<em><a href="/protocol/main.html?borrow_id=<? if (!isset($this->magic_vars['var']['borrow']['id'])) $this->magic_vars['var']['borrow']['id'] = ''; echo $this->magic_vars['var']['borrow']['id']; ?>" target="_blank" style="color: #0000ff">����Э����</a></em>
					<? endif; ?>
				</h1>
				<? if (!isset($this->magic_vars['_G']['user_result']['user_id'])) $this->magic_vars['_G']['user_result']['user_id']=''; ;if ( !( $this->magic_vars['_G']['user_result']['user_id'] > 0)): ?>
					<h2 style="height: 270px; ">
						<div style="font-size: 20px; font-weight: bold;position: relative; top:30px; left: 40px;">����û�е�¼�˺�!</div>
						<a style="font-size: 16px;color:blue;position: relative; top:60px; left: 40px;" href="/user/login.html">����ע��</a>
						<a style="font-size: 16px;color:blue;position: relative; top:60px; left: 60px;" href="/user/reg.html">��¼�˺�</a>
					</h2>
				<? else: ?>
					<? if (!isset($this->magic_vars['_G']['user_result']['paypassword'])) $this->magic_vars['_G']['user_result']['paypassword']='';if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_result']['paypassword'] == '' &&  $this->magic_vars['_G']['user_id'] > 0): ?>
					<h2>
						<div class="tz2_m_1f_h2_l">
							<p>�������:<span><? if (!isset($this->magic_vars['var']['user_account']['use_money'])) $this->magic_vars['var']['user_account']['use_money'] = '';$_tmp = $this->magic_vars['var']['user_account']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?> </span>Ԫ</p>
							<p>�������:<span id="less"><? if (!isset($this->magic_vars['var']['borrow']['other'])) $this->magic_vars['var']['borrow']['other']=''; ;if (  $this->magic_vars['var']['borrow']['other'] > 0): ?><? if (!isset($this->magic_vars['var']['borrow']['other'])) $this->magic_vars['var']['borrow']['other'] = ''; echo $this->magic_vars['var']['borrow']['other']; ?><? else: ?>0<? endif; ?></span>Ԫ</p>
						</div>
						<a class="tz2_m_1f_h2_r">��ֵ</a>
					</h2>
					<div style="font-size: 14px;padding-left: 20px; padding-bottom: 4px;">
						<div style="padding-top: 15px;">������������²��跽��Ͷ��</div><br/>
						<? if (!isset($this->magic_vars['_G']['user_result']['paypassword'])) $this->magic_vars['_G']['user_result']['paypassword']=''; ;if (  $this->magic_vars['_G']['user_result']['paypassword'] == ""): ?>
						����һ��<a style="font-weight: bold; color: blue;" href="/index.php?user&q=code/user/paypwd" target="_blank">֧����������</a><br/><br/>
						<? endif; ?>
					</div>
					<? else: ?>
						<h2>
							<div class="tz2_m_1f_h2_l">
								<p>�������:<span><? if (!isset($this->magic_vars['var']['user_account']['use_money'])) $this->magic_vars['var']['user_account']['use_money'] = '';$_tmp = $this->magic_vars['var']['user_account']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?> </span>Ԫ</p>
								<p>�������:<span id="less"><? if (!isset($this->magic_vars['var']['borrow']['other'])) $this->magic_vars['var']['borrow']['other']=''; ;if (  $this->magic_vars['var']['borrow']['other'] > 0): ?><? if (!isset($this->magic_vars['var']['borrow']['other'])) $this->magic_vars['var']['borrow']['other'] = ''; echo $this->magic_vars['var']['borrow']['other']; ?><? else: ?>0<? endif; ?></span>Ԫ</p>
							</div>
							<a class="tz2_m_1f_h2_r">��ֵ</a>
						</h2>
						<h3>
							<form action="/index.php?user&q=code/borrow/tender" name="form1"
							      onsubmit="return check_form(<? if (!isset($this->magic_vars['var']['borrow']['lowest_account'])) $this->magic_vars['var']['borrow']['lowest_account'] = '';$_tmp = $this->magic_vars['var']['borrow']['lowest_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>,<? if (!isset($this->magic_vars['var']['borrow']['most_account'])) $this->magic_vars['var']['borrow']['most_account'] = '';$_tmp = $this->magic_vars['var']['borrow']['most_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>,<? if (!isset($this->magic_vars['var']['user_account']['use_money'])) $this->magic_vars['var']['user_account']['use_money'] = '';$_tmp = $this->magic_vars['var']['user_account']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>)"
							      method="post">
								<table>
									<tr>
										<td width="70px">Ͷ���</td>
										<td><input class="right_box_input" class="text" id="money" name="money" size="11" onkeyup="value=value.replace(/[^0-9]/g,'')">Ԫ
											<a onclick="inputAll(<? if (!isset($this->magic_vars['var']['user_account']['use_money'])) $this->magic_vars['var']['user_account']['use_money'] = '';$_tmp = $this->magic_vars['var']['user_account']['use_money'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>);">�������</a></td>
									</tr>
									<tr>
										<td width="70px">֧�����룺</td>
										<td><input class="text" type="password" name="paypassword" size="11"/></td>
									</tr>
									<tr>
										<td width="70px">��֤�룺</td>
										<td>
											<input class="text" name="valicode" type="text" size="11" maxlength="4" tabindex="3"/>&nbsp;
											<img src="/plugins/index.php?q=imgcode" alt="���ˢ��"
											     onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle"
											     style="cursor:pointer"/>
										</td>
									</tr>
								</table>
								<div class="submit">
									<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_G']['article_id'])) $this->magic_vars['_G']['article_id'] = ''; echo $this->magic_vars['_G']['article_id']; ?>"/>
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']=''; ;if (  $this->magic_vars['var']['borrow']['status'] == 0): ?>
										<input type="submit" disabled value="�ȴ�����" />
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']='';if (!isset($this->magic_vars['var']['borrow']['other'])) $this->magic_vars['var']['borrow']['other']=''; ;elseif (  $this->magic_vars['var']['borrow']['status'] == 1 &&  $this->magic_vars['var']['borrow']['other'] > 0): ?>
									<input type="submit" value="ȷ��Ͷ��" />
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']=''; ;elseif (  $this->magic_vars['var']['borrow']['status'] == 1): ?>
										<input type="submit" disabled value="������" />
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']=''; ;elseif (  $this->magic_vars['var']['borrow']['status'] == 2): ?>
										<input type="submit" disabled value="����δͨ��" />
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']='';if (!isset($this->magic_vars['var']['borrow']['repayment_account'])) $this->magic_vars['var']['borrow']['repayment_account']='';if (!isset($this->magic_vars['var']['borrow']['repayment_yesaccount'])) $this->magic_vars['var']['borrow']['repayment_yesaccount']=''; ;elseif (  $this->magic_vars['var']['borrow']['status'] == 3 &&  $this->magic_vars['var']['borrow']['repayment_account'] >  $this->magic_vars['var']['borrow']['repayment_yesaccount']): ?>
										<input type="submit" disabled value="������" />
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']=''; ;elseif (  $this->magic_vars['var']['borrow']['status'] == 3): ?>
										<input type="submit" disabled value="�ѻ���" />
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']=''; ;elseif (  $this->magic_vars['var']['borrow']['status'] == 4): ?>
										<input type="submit" disabled value="����δͨ��" />
									<? if (!isset($this->magic_vars['var']['borrow']['status'])) $this->magic_vars['var']['borrow']['status']=''; ;elseif (  $this->magic_vars['var']['borrow']['status'] == 5): ?>
										<input type="submit" disabled value="�ѳ���" />
									<? endif; ?>

								</div>
							</form>
						</h3>
					<? endif; ?>
				<? endif; ?>
			</div>
		</div>



<script>
    function check_form(lowest, most, use_money) {
        var frm = document.forms['form1'];
        var account = frm.elements['money'].value;
        var valicode = frm.elements['valicode'].value;
        if (account == "") {
            alert("Ͷ�����Ϊ��");
            return false;
        } else if (account > use_money) {
            alert("���Ŀ������С������Ͷ��ҪͶ�����ȳ�ֵ��");
            return false;
        } else if (account > most && most > 0) {
            alert("Ͷ����ܴ�������޶�" + most + "Ԫ");
            return false;
        } else if (account < lowest && lowest > 0) {
            alert("Ͷ����ܵ�����С�޶�" + lowest + "Ԫ");
            return false;
        }
        if (valicode == "") {
            alert("��֤�벻��Ϊ��");
            return false;
        }
        if (confirm('ȷ��ҪͶ��' + account + 'Ԫ��ȷ���˽�����ȡ��')) {
            return true;
        } else {
            return false;
        }

    }

    function inputAll(use_money) {
        var input_money;
        var less = document.getElementById('less').innerHTML;
        use_money = parseInt(use_money);

        if (less > use_money) {
            if (use_money % 100 != 0) {
                input_money = use_money - (use_money % 100);
            } else {
                input_money = use_money;
            }
        } else {
            if (less % 100 != 0) {
                input_money = less - (less % 100);
            } else {
                input_money = less;
            }
        }
        jQuery("#money").val(input_money);
    }
</script>



<!--��������ҳ ��ʼ-->

<!--��������ҳ ����-->

<script type="text/javascript">
    var CID = "endtime";
    if (window.CID != null) {
        var iTime = document.getElementById(CID).innerHTML;
        var Account;
        RemainTime();
    }
    function RemainTime() {
        var iDay, iHour, iMinute, iSecond;
        var sDay = "", sTime = "";
        if (iTime >= 0) {
            iDay = parseInt(iTime / 24 / 3600);
            iHour = parseInt((iTime / 3600) % 24);
            iMinute = parseInt((iTime / 60) % 60);
            iSecond = parseInt(iTime % 60);

            if (iDay > 0) {
                sDay = iDay + "��";
            }
            sTime = sDay + iHour + "Сʱ" + iMinute + "����" + iSecond + "��";

            if (iTime == 0) {
                clearTimeout(Account);
                sTime = "<span style='color:green'>ʱ�䵽�ˣ�</span>";
            } else {
                Account = setTimeout("RemainTime()", 1000);
            }
            iTime = iTime - 1;
        } else {
            sTime = "<span style='color:red'>�˱��ѹ��ڣ�</span>";
        }
        document.getElementById(CID).innerHTML = sTime;
    }
</script>
<style type="text/css">
    .title {
        line-height: 15px;
        text-indent: 30px
    }
    .check_1,.check_2,.check_3,.check_4 {
        height: 30px; line-height:30px; width: 120px; background-color:#1bb8e3; text-align: center;color: #fff; font-size: 14px; cursor: pointer; margin-right:5px; float:left;
    }
</style>
<script type="text/javascript">
    function change_show_box(num) {
        for(var i = 1; i < 5; i++) {
            if (num != i) {
                $('#show_box_'+i).hide();
	            $('#'+i).removeClass('active');
            }
        }
        $('#show_box_'+num).fadeIn(500);
	    $('#'+num).addClass('active');
    }
</script>

<br>
<div style="clear: both"></div>
<div class="touzi2_m_2f clearfix" style="width: 100%;">
	<div class="touzi2_m_2f_l" style="width: 100%;">
		<ul class="tz2_m_2f_lt_alt" style="width: 100%;">
			<li id="1" class="active" onclick="change_show_box(this.id)">�������Ϣ</li>
			<li id="2" onclick="change_show_box(this.id)">�������</li>
			<li id="3" onclick="change_show_box(this.id)">Ͷ���¼</li>
			<li id="4" onclick="change_show_box(this.id)">�������¼</li>
		</ul>


<!--�˻����� ��ʼ-->
<div id="show_box_1" style="display: show; background:#fff;" class="wrap950 list_li_3 ">
    <div class="content" style="padding-top: 20px;">
        <table border="0" cellspacing="0" width="100%" class="tab1">
            <tr>
                <td style="padding-left:20px;"><? if (!isset($this->magic_vars['var']['borrow']['content'])) $this->magic_vars['var']['borrow']['content'] = ''; echo $this->magic_vars['var']['borrow']['content']; ?></td>
            </tr>
        </table>
    </div>
</div>

<!--������� ��ʼ-->
<div id="show_box_2" style="display: none" class="wrap950 list_li_3">
    <div class="content" style="padding-top: 20px;">
        <table>
            <tr>
            <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'5','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
                <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
                    <div>
                        <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
                            <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
                        </a>
                    </div>
                </td>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
            </tr>
            <tr>
            <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 4 &&  $this->magic_vars['key'] < 10): ?>
                <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
                    <div>
                        <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
                            <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
                        </a>
                    </div>
                </td>
            <? endif; ?>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
            </tr>
            <tr>
            <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 9 &&  $this->magic_vars['key'] < 15): ?>
            <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
                <div>
                    <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
                        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
                    </a>
                </div>
            </td>
            <? endif; ?>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
            </tr>
			
			<tr>
            <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 14 &&  $this->magic_vars['key'] < 20): ?>
            <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
                <div>
                    <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
                        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
                    </a>
                </div>
            </td>
            <? endif; ?>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
            </tr>
			
			<tr>
            <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 19 &&  $this->magic_vars['key'] < 25): ?>
            <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
                <div>
                    <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
                        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
                    </a>
                </div>
            </td>
            <? endif; ?>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
            </tr>
	        <tr>
		        <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
		        <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 24 &&  $this->magic_vars['key'] < 30): ?>
		        <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
			        <div>
				        <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
					        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
				        </a>
			        </div>
		        </td>
		        <? endif; ?>
		        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
	        </tr>

	        <tr>
		        <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
		        <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 29 &&  $this->magic_vars['key'] < 35): ?>
		        <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
			        <div>
				        <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
					        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
				        </a>
			        </div>
		        </td>
		        <? endif; ?>
		        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
	        </tr>

	        <tr>
		        <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
		        <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 34 &&  $this->magic_vars['key'] < 40): ?>
		        <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
			        <div>
				        <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
					        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
				        </a>
			        </div>
		        </td>
		        <? endif; ?>
		        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
	        </tr>
	        <tr>
		        <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
		        <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 39 &&  $this->magic_vars['key'] < 45): ?>
		        <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
			        <div>
				        <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
					        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
				        </a>
			        </div>
		        </td>
		        <? endif; ?>
		        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
	        </tr>
	        <tr>
		        <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'arr_var','limit'=>'all','status'=>'1','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['arr_var']):
?>
		        <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']='';if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key'] > 44 &&  $this->magic_vars['key'] < 50): ?>
		        <td style="width: 200px;height: 200px;overflow: hidden;text-align: center;">
			        <div>
				        <a href="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" target="_blank">
					        <img src="/<? if (!isset($this->magic_vars['arr_var']['litpic'])) $this->magic_vars['arr_var']['litpic'] = ''; echo $this->magic_vars['arr_var']['litpic']; ?>" width="0" height="0" onload="AutoResizeImage(160,160,this)" />
				        </a>
			        </div>
		        </td>
		        <? endif; ?>
		        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
	        </tr>
        </table>
    </div>
</div>
<script>

function AutoResizeImage(maxWidth,maxHeight,objImg){
        var img = new Image();
        img.src = objImg.src;
        var hRatio;
        var wRatio;
        var Ratio = 1;
        var w = img.width;
        var h = img.height;
        wRatio = maxWidth / w;
        hRatio = maxHeight / h;
        if (maxWidth ==0 && maxHeight==0){
            Ratio = 1;
        }else if (maxWidth==0){//
            if (hRatio<1) Ratio = hRatio;
        }else if (maxHeight==0){
            if (wRatio<1) Ratio = wRatio;
        }else if (wRatio<1 || hRatio<1){
            Ratio = (wRatio<=hRatio?wRatio:hRatio);
        }

        if (Ratio<1){
            w = w * Ratio;
            h = h * Ratio;
        }
        objImg.height = h;
        objImg.width = w;
    }

</script>
<!--������� ����-->

<? if (!isset($this->magic_vars['var']['borrow']['is_vouch'])) $this->magic_vars['var']['borrow']['is_vouch']=''; ;if (  $this->magic_vars['var']['borrow']['is_vouch']==1): ?>
<!--�������� ��ʼ-->
<div class="wrap950 list_li_3 ">
    <div><span>��������</span></div>
    <div class="content">
        <? if (!isset($this->magic_vars['var']['borrow']['vouch_award'])) $this->magic_vars['var']['borrow']['vouch_award']=''; ;if (  $this->magic_vars['var']['borrow']['vouch_award']==""): ?>
        <font color="#FF0000" size="3">û�н���</font>
        <? else: ?>
        <table border="0" cellspacing="0" width="100%" class="tab1">
            <tr>
                <td width="30%">������ʽ������������</td>
                <td width="30%">����������<? if (!isset($this->magic_vars['var']['borrow']['vouch_award'])) $this->magic_vars['var']['borrow']['vouch_award'] = ''; echo $this->magic_vars['var']['borrow']['vouch_award']; ?>%</td>
                <td width="30%">ָ�������ˣ�<? if (!isset($this->magic_vars['var']['borrow']['vouch_user'])) $this->magic_vars['var']['borrow']['vouch_user'] = ''; echo $this->magic_vars['var']['borrow']['vouch_user']; ?></td>
            </tr>
        </table>
        <? endif; ?>
    </div>
</div>
<!--�������� ����-->


<!--������¼ ��ʼ-->
<a name="vouch_user"></a>

<div class="wrap950 list_li_3 ">
    <div class="title"><span>������¼</span></div>
    <div class="content">
        <table border="0" cellspacing="0" width="100%" class="tab1">
            <tr align="center">
                <td><strong>������</strong></td>
                <td><strong>�������</strong></td>
                <td><strong>��Ч���</strong></td>
                <td><strong>����ʱ��</strong></td>
                <td><strong>״̬ </strong></td>
            </tr>
            <? $this->magic_vars['query_type']='GetVouchList';$data = array('limit'=>'all','var'=>'vat','borrow_id'=>$this->magic_vars['var']['borrow']['id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetVouchList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['vat']):
?>
            <tr>
                <td align="center"><a href="/u/<? if (!isset($this->magic_vars['vat']['user_id'])) $this->magic_vars['vat']['user_id'] = ''; echo $this->magic_vars['vat']['user_id']; ?>" target="_blank"><? if (!isset($this->magic_vars['vat']['username'])) $this->magic_vars['vat']['username'] = ''; echo $this->magic_vars['vat']['username']; ?></a></td>
                <td align="center"><? if (!isset($this->magic_vars['vat']['vouch_account'])) $this->magic_vars['vat']['vouch_account'] = ''; echo $this->magic_vars['vat']['vouch_account']; ?>Ԫ</td>
                <td align="center"><? if (!isset($this->magic_vars['vat']['account'])) $this->magic_vars['vat']['account'] = '';$_tmp = $this->magic_vars['vat']['account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ</td>
                <td align="center"><? if (!isset($this->magic_vars['vat']['addtime'])) $this->magic_vars['vat']['addtime'] = '';$_tmp = $this->magic_vars['vat']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
                <td align="center"><? if (!isset($this->magic_vars['vat']['vouch_account'])) $this->magic_vars['vat']['vouch_account']='';if (!isset($this->magic_vars['vat']['account'])) $this->magic_vars['vat']['account']=''; ;if (  $this->magic_vars['vat']['vouch_account']== $this->magic_vars['vat']['account']): ?>ȫ��ͨ��<? else: ?>����ͨ��<? endif; ?></td>
            </tr>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
        </table>

    </div>
</div>
<!--������¼ ����-->
<? endif; ?>


<!--�����¼ ��ʼ-->
<div id="show_box_4" style="display: none" class="wrap950 list_li_3 ">
    <div class="content" style="padding-top: 20px;">
        <table border="0" cellspacing="0" width="100%" class="tab1" style="text-align: center">
            <tr>
                <td><strong>�������</strong></td>
                <td><strong>����</strong></td>
                <td><strong>���Ϣ</strong></td>
                <td><strong>ʵ�ʵ�������</strong></td>
            </tr>
            <? $this->magic_vars['query_type']='GetRepaymentList';$data = array('status'=>'0,2','limit'=>'12','var'=>'vat','order'=>'repayment_time','user_id'=>$this->magic_vars['var']['user']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetRepaymentList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['vat']):
?>
            <tr>
                <td><a href="/invest/a<? if (!isset($this->magic_vars['vat']['borrow_id'])) $this->magic_vars['vat']['borrow_id'] = ''; echo $this->magic_vars['vat']['borrow_id']; ?>.html" target="_blank"><? if (!isset($this->magic_vars['vat']['borrow_name'])) $this->magic_vars['vat']['borrow_name'] = ''; echo $this->magic_vars['vat']['borrow_name']; ?></a></td>
                <td><? if (!isset($this->magic_vars['vat']['order'])) $this->magic_vars['vat']['order'] = ''; echo $this->magic_vars['vat']['order']+1; ?>/<? if (!isset($this->magic_vars['vat']['time_limit'])) $this->magic_vars['vat']['time_limit'] = ''; echo $this->magic_vars['vat']['time_limit']; ?></td>
                <td>��<? if (!isset($this->magic_vars['vat']['repayment_account'])) $this->magic_vars['vat']['repayment_account'] = ''; echo $this->magic_vars['vat']['repayment_account']; ?></td>
                <td><? if (!isset($this->magic_vars['vat']['repayment_time'])) $this->magic_vars['vat']['repayment_time'] = '';$_tmp = $this->magic_vars['vat']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
            </tr>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
        </table>
    </div>
</div>
<!--�����¼ ����-->
</div></div>


<!--Ͷ���¼ ��ʼ-->
<div id="show_box_3" style="display: none" class="wrap950 list_li_3 ">
    <div class="content" style="padding-top: 20px;">
        <table border="0" cellspacing="0" width="100%" class="tab1">
            <tr align="center">
                <td><strong>Ͷ����</strong></td>
                <td><strong>Ͷ�뷽ʽ</strong></td>
                <td><strong>��ǰ������</strong></td>
                <td><strong>Ͷ����</strong></td>
                <td><strong>��Ч���</strong></td>
                <td><strong>Ͷ��ʱ��</strong></td>
                <td><strong>״̬</strong></td>
            </tr>
            <? $this->magic_vars['query_type']='GetTender_List';$data = array('limit'=>'all','var'=>'vat','key'=>'key','borrow_id'=>$this->magic_vars['var']['borrow']['id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTender_List($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['vat']):
?>
            <tr
            <? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username']='';if (!isset($this->magic_vars['vat']['username'])) $this->magic_vars['vat']['username']=''; ;if (  $this->magic_vars['_G']['user_result']['username']== $this->magic_vars['vat']['username']): ?> bgcolor ="#ECF0F0" <? endif; ?>>
            <td align="center"><? if (!isset($this->magic_vars['vat']['username'])) $this->magic_vars['vat']['username'] = '';$_tmp = $this->magic_vars['vat']['username'];$_tmp = $this->magic_modifier("truncate",$_tmp,"2");echo $_tmp;unset($_tmp); ?>***</td>
            <td align="center"><? if (!isset($this->magic_vars['vat']['is_auto'])) $this->magic_vars['vat']['is_auto']=''; ;if (  $this->magic_vars['vat']['is_auto'] == 1): ?>�Զ�<? else: ?>�ֶ�<? endif; ?></td>
            <td align="center"><? if (!isset($this->magic_vars['var']['borrow']['apr'])) $this->magic_vars['var']['borrow']['apr'] = ''; echo $this->magic_vars['var']['borrow']['apr']; ?>%</td>
            <td align="center"><? if (!isset($this->magic_vars['vat']['money'])) $this->magic_vars['vat']['money'] = ''; echo $this->magic_vars['vat']['money']; ?>Ԫ</td>
            <td align="center"><? if (!isset($this->magic_vars['vat']['tender_account'])) $this->magic_vars['vat']['tender_account'] = '';$_tmp = $this->magic_vars['vat']['tender_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>Ԫ</td>
            <td align="center"><? if (!isset($this->magic_vars['vat']['addtime'])) $this->magic_vars['vat']['addtime'] = '';$_tmp = $this->magic_vars['vat']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i:s");echo $_tmp;unset($_tmp); ?></td>
            <td align="center"><? if (!isset($this->magic_vars['vat']['tender_account'])) $this->magic_vars['vat']['tender_account']='';if (!isset($this->magic_vars['vat']['money'])) $this->magic_vars['vat']['money']=''; ;if (  $this->magic_vars['vat']['tender_account']== $this->magic_vars['vat']['money']): ?>ȫ��ͨ��<? else: ?>����ͨ��<? endif; ?></td>
            </tr>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
        </table>
    </div>
</div>
<!--Ͷ���¼ ����-->
<br/>


<? unset($_magic_vars);unset($data); ?>
		</div></div>
<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>