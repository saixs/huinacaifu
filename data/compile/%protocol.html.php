<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_id']==""): ?>
	<script>alert("�㻹û�е�¼�����ȵ�¼�ٲ鿴");location.href='/index.php?user';</script>
    <?php die;?>
<? endif; ?>
<? $data = array('id'=>$_REQUEST['borrow_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::protocolViewAllow($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
    <? if (!isset($this->magic_vars['var']['0'])) $this->magic_vars['var']['0']='';if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['var']['0'] != 1 &&  $this->magic_vars['_G']['user_id']!=1): ?>
        <script>alert("ֻ�������ñʽ��Ͷ�ʵ�Ͷ���˲鿴");location.href='/index.php?user';</script>
        <?php die;?>
    <? endif; ?>
<? unset($_magic_vars);unset($data); ?>
<? $data = array('id'=>$_REQUEST['borrow_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetOne($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
<!--<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=3): ?>
<script>alert("���Ĳ�������");location.href='/index.php?user';</script>
<? endif; ?>-->

<style type="text/css">
    .pro_title {font-size:16px; font-weight: bold}
    .indent_four{text-indent:40px;}
    .indent_eight{text-indent: 80px;}
</style>

<div class="wrap950 mar10">
	<div class="protocol">
        <br />
		<div class="pro_title">���Э����(���ɲƸ���)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Э��ţ�<? if (!isset($this->magic_vars['var']['addtime'])) $this->magic_vars['var']['addtime'] = ''; echo $this->magic_vars['var']['addtime']; ?><? if (!isset($this->magic_vars['var']['number_id'])) $this->magic_vars['var']['number_id'] = ''; echo $this->magic_vars['var']['number_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ǩ�����ڣ�<? if (!isset($this->magic_vars['var']['repayment_time'])) $this->magic_vars['var']['repayment_time'] = '';$_tmp = $this->magic_vars['var']['repayment_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></div><br />
        <strong>�׷�(������):</strong> <br /><br />
            <div>
                <table class="gvList" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvLoans" style="width:60%;border-collapse:collapse;position: relative; left: 40px;">
                    <tr height="30">
                        <th align="center" scope="col">������</th>
                        <th align="center" scope="col">������</th>
                        <th align="center" scope="col">��������</th>
                        <th align="center" scope="col"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?>���Ϣ<? else: ?>�»��Ϣ<? endif; ?></th>
                    </tr>
                    <? $this->magic_vars['query_type']='GetTenderList';$data = array('var'=>'bor','borrow_id'=>isset($_REQUEST['borrow_id'])?$_REQUEST['borrow_id']:'','limit'=>'all');$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['bor']):
?>
                    <tr height="30">
                        <td style="text-align: center"><? if (!isset($this->magic_vars['bor']['username'])) $this->magic_vars['bor']['username'] = ''; echo $this->magic_vars['bor']['username']; ?></td>
                        <td style="text-align: center"><? if (!isset($this->magic_vars['bor']['tender_account'])) $this->magic_vars['bor']['tender_account'] = ''; echo $this->magic_vars['bor']['tender_account']; ?>Ԫ</td>
                        <? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>
                        <td style="text-align: center"><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?>��</td>
                        <? else: ?><td style="text-align: center"><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = '';$_tmp = $this->magic_vars['var']['time_limit'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_time_limit");echo $_tmp;unset($_tmp); ?></td><? endif; ?>
                        <td style="text-align: center"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?> <? if (!isset($this->magic_vars['bor']['repayment_account'])) $this->magic_vars['bor']['repayment_account'] = ''; echo $this->magic_vars['bor']['repayment_account']; ?> Ԫ  <? else: ?><? if (!isset($this->magic_vars['bor']['equal']['monthly_repayment'])) $this->magic_vars['bor']['equal']['monthly_repayment'] = ''; echo $this->magic_vars['bor']['equal']['monthly_repayment']; ?> Ԫ<? endif; ?></td>
                    </tr>
                    <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
                </table>
            </div><br />
        <strong>�ҷ�(�����):</strong> <? if (!isset($this->magic_vars['var']['realname'])) $this->magic_vars['var']['realname'] = '';$_tmp = $this->magic_vars['var']['realname'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?> <br />
        <strong>���֤��:</strong> <? if (!isset($this->magic_vars['var']['card_id'])) $this->magic_vars['var']['card_id'] = '';$_tmp = $this->magic_vars['var']['card_id'];$_tmp = $this->magic_modifier("hideMiddleShow2",$_tmp,"");echo $_tmp;unset($_tmp); ?><br />
        <strong>���ɲƸ����û���:</strong> <? if (!isset($this->magic_vars['var']['username'])) $this->magic_vars['var']['username'] = ''; echo $this->magic_vars['var']['username']; ?> <br /><br />
        <strong>����(�Ӽ���):</strong>�������ɾ�����Ϣ�������޹�˾ <br />
        <strong>ע���:</strong>530103100135670 <br /><br />
        <strong>���ڣ�</strong><br />
        1.�׷�ӵ�и����ʽ��⹩�����Ի�ȡ��Ϣ���棬�������շḻ�Ľ������Դ��Ϣ��ӵ��רҵ���������ۺ͹������ƽ̨��<br />
        2.�׷�Ը����ܱ����ṩ��Ͷ����ѯ���������ɱ�����ϼ׷����ҷ���ɽ�����ף����ɱ����ṩ����Э���������
        �ص��������񣬱���Ը����׷��ṩ�õȷ���<br /><br />
        <strong>�ҷ�ͨ�����ɲƸ���www.huinacaifu.com��վ ( �����ݻ��ɲƸ���Ϣ�������޹�˾ www.huinacaifu.com,���¼�ơ�������) �ľӼ�,���й�
        ���������׷��������˴������Э�飺</strong><br /><br />
		<div class="pro_title">��һ��������������±���ʾ:</div><br />
		<div>
        <? $this->magic_vars['query_type']='GetTenderList';$data = array('var'=>'bor','borrow_id'=>isset($_REQUEST['borrow_id'])?$_REQUEST['borrow_id']:'','limit'=>'all');$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['bor']):
?>
        <table class="gvList" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvLoans" style="width:60%;border-collapse:collapse;position: relative; left: 40px;">
            <tr height="30"><td align="center">������</td><td align="center"><? if (!isset($this->magic_vars['bor']['username'])) $this->magic_vars['bor']['username'] = ''; echo $this->magic_vars['bor']['username']; ?></td></tr>
            <tr height="30"><td align="center">�����</td><td align="center"><? if (!isset($this->magic_vars['bor']['tender_account'])) $this->magic_vars['bor']['tender_account'] = ''; echo $this->magic_vars['bor']['tender_account']; ?>Ԫ</td></tr>
            <tr height="30">
                <td align="center">�������</td>
                <? if (!isset($this->magic_vars['var']['isday'])) $this->magic_vars['var']['isday']=''; ;if (  $this->magic_vars['var']['isday']==1): ?>
                    <td align="center"><? if (!isset($this->magic_vars['var']['time_limit_day'])) $this->magic_vars['var']['time_limit_day'] = ''; echo $this->magic_vars['var']['time_limit_day']; ?>��</td>
                <? else: ?>
                    <td align="center"><? if (!isset($this->magic_vars['var']['time_limit'])) $this->magic_vars['var']['time_limit'] = '';$_tmp = $this->magic_vars['var']['time_limit'];$_tmp = $this->magic_modifier("linkage",$_tmp,"borrow_time_limit");echo $_tmp;unset($_tmp); ?></td>
                <? endif; ?>
            </tr>
            <tr height="30"><td align="center">������</td><td align="center"><? if (!isset($this->magic_vars['var']['apr'])) $this->magic_vars['var']['apr'] = ''; echo $this->magic_vars['var']['apr']; ?>%</td></tr>
            <tr height="30"><td align="center">��ʼ��</td><td align="center"><? if (!isset($this->magic_vars['var']['success_time'])) $this->magic_vars['var']['success_time'] = '';$_tmp = $this->magic_vars['var']['success_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td></tr>
            <tr height="30"><td align="center">������</td><td align="center"><? if (!isset($this->magic_vars['var']['end_time'])) $this->magic_vars['var']['end_time'] = '';$_tmp = $this->magic_vars['var']['end_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td></tr>
            <tr height="30"><td align="center">�½�ֹ������</td><td align="center"><? if (!isset($this->magic_vars['var']['each_time'])) $this->magic_vars['var']['each_time'] = ''; echo $this->magic_vars['var']['each_time']; ?></td></tr>
            <tr height="30">
                <td align="center"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?>���Ϣ<? else: ?>�»��Ϣ<? endif; ?></td>
                <td align="center"><? if (!isset($this->magic_vars['var']['style'])) $this->magic_vars['var']['style']=''; ;if (  $this->magic_vars['var']['style']==3): ?> <? if (!isset($this->magic_vars['bor']['repayment_account'])) $this->magic_vars['bor']['repayment_account'] = ''; echo $this->magic_vars['bor']['repayment_account']; ?> Ԫ  <? else: ?><? if (!isset($this->magic_vars['bor']['equal']['monthly_repayment'])) $this->magic_vars['bor']['equal']['monthly_repayment'] = ''; echo $this->magic_vars['bor']['equal']['monthly_repayment']; ?> Ԫ<? endif; ?></td>
            </tr>
        </table>
        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
		</div>
		<div class="content">
            <div class="pro_title">�ڶ���������</div>
            <p class="indent_four">1���ҷ���ŵ���ձ�Э���һ��Լ����ʱ��ͽ��������׷����</p>
            <p class="indent_four">2���ҷ������һ�ڻ���������ȫ��ʣ�౾����Ϣ���������ݱ�Э�������ȫ�����á�</p>
            <p class="indent_four">3���ҷ���ÿһ�ڻ���Ļ�������㹫ʽΪ��ÿ���軹���ܽ��=ÿ���軹��Ϣ+ÿ���軹����</p>
            <div class="pro_title">�����������ڻ���</div>
            <p class="indent_four">1�����ҷ�������δ����,�ҷ����������֧��������Ϣ����,��Ӧÿ�������֧�����ڷ�Ϣ(���Ϊδ������Ϣ��ǧ��֮��)��
                �׷����ҷ���ͬ�Ⲣ�Ͽɣ�������ͨ�����š��绰�����Ŵ��յȷ�ʽ���ҷ�����δ�����ı�Ϣ���д���,�ұ�����Ȩ����ǰ��
                ��׼���ҷ���ȡ���շ�����ã��ݲ�����������˽���ϡ� ���Ŵ��շ�Ϊÿ��2000Ԫ��</p>
            <p class="indent_four">2���ҷ�ͬ�⣬�����ڻ�����ɼ׷����֧���ķ���(��������������ʦ��)���ҷ��е���</p>
            <p class="indent_four">3���ҷ�ͬ�⣬���ҷ�����δ�����κ�һ�ڻ��������Ȩ��ȡ���´�ʩ֮һ����</p>
            <p class="indent_eight">��1�����ҷ����й�������ϼ�����������Ϣͨ�����������ں�����������Ŀ���⹫����</p>
            <p class="indent_eight">��2�����ҷ����й�������ϼ�����������Ϣ��ʽ�����ڡ��������ü�¼��,����ȫ����������������ϵ�ĺ�����(������
                ���ü�¼�����ݽ�Ϊ���С����š�������˾���˲����ĵ��йػ����ṩ���˲���������Ϣ)��</p>
            <p class="indent_eight">��3�����ҷ���ȡ���ɴ�ʩ,�ɴ������������з��ɺ�������ҷ����е����׷�ͬ����Ȩ��֧�ֱ�����ȡ���ϴ�ʩ��</p>
            <p class="indent_four">4�����ڵ�Ѻ���꣬�׷����ҷ���ͬ�⣬��׷�ΪVIP�û����ҷ������յ���23:00��δ�峥����(��׷�Ϊ��VIP�û���
                �ҷ�����1����δ�峥��Ϣ),��׷�����Э�����µ�ծȨת�ø�����˾�򱾹�˾������˾�����ھ�ֵ���꣬�׷����ҷ�
                ��ͬ�⣬��׷�ΪVIP�û����ҷ�����10����δ�峥��Ϣ(��׷�Ϊ��VIP�û����ҷ�����30����δ�峥��Ϣ),��׷�
                ����Э�����µ�ծȨת�ø�����˾�򱾹�˾������˾��ת�ü۸�Ϊ�������ҷ�������δ�����Ľ�Ϣ���������Ӽ׷���
                �����Ļ�Ա����ͬ��������ͬ��������˾�򱾹�˾������˾��׷�֧���ҷ�������δ�����ı��𼴿�ȡ�ü׷��ڱ�Э����
                �µ�ծȨ������˾�򱾹�˾������˾���������ге����շ��ã����ҷ�׷�ս�����Ϣ�����ڷ�Ϣ�ȣ����˷����ɱ���
                ˾�򱾹�˾������˾�е���</p>
            <p class="indent_four">5��������������δ������ҷ���ȡ���ڷ�Ϣ��Ϊ���շ��á���ȡ���ַ�ʽ���д��ա����ҷ��������Ϣ���⹫�������롰��
                �����ü�¼�����ȡ���ɴ�ʩ�ȸ�����Ϊ���Ǳ������ݱ�Э��Ϊ�׷��ṩ��һ�ַ��񣬸õȷ���ķ��ɺ�������ҷ��ͼ׷�
                ���ге���</p>
            <div class="pro_title">������������֧���ͻ��ʽ</div>
            <p class="indent_four">1���׷���ͬ�����ҷ�������Ӧ����ʱ,��ί�б����ڱ����Э����Чʱ���ñʽ��ֱ�ӻ������ҷ��ʻ���</p>
            <p class="indent_four">2���ҷ���ί�б���������ֱ�ӻ������׷��ʻ���</p>
            <p class="indent_four">3���ҷ��ͼ׷���ͬ�⣬���������ҷ���׷�ί������ȡ�Ļ���������Ϊ���������ķ��ɺ��������Ӧί�з��ҷ���׷�����
                �е���</p>
            <p class="indent_four">4�����ҷ����κ�һ�ڻ�����Գ���Ӧ��������Ϣ��ΥԼ��,��׷�֮��ͬ�ⰴ�ո��Գ������ڳ������ܶ��еı���
                ��ȡ���</p>
            <p class="indent_four">5����Э������е�Ϊ������ס����(������)��</p>
            <div class="pro_title">����������ǰ���ں���ǰ����</div>
            <p class="indent_four">1��˫��ͬ��,���ҷ����������κ�һ�����,��Э�����µ�ȫ������Զ���ǰ����,�ҷ����յ����������Ľ����ǰ����ͨ
                ֪��Ӧ�����峥ȫ��������Ϣ��������Ϣ�����ݱ�Э�����������ȫ�����ã�</p>
            <p class="indent_eight">��1���ҷ����κ�ԭ������֧���κ�һ�ڻ����10��ģ�</p>
            <p class="indent_eight">��2���ҷ��Ĺ�����λ��ְ���ס�������δ��30����֪ͨ������</p>
            <p class="indent_eight">��3���ҷ�����Ӱ�����峥��Э�����½������������仯��δ��30����֪ͨ������</p>
            <p class="indent_four">2��˫��ͬ��,�ҷ���Ȩ��ǰ�峥ȫ�����߲��ֽ���ǰ������֧��������Ϣ��</p>
            <p class="indent_four">3�������Э���е�ÿһ�׷����ҷ�֮��Ľ������໥������,һ���ҷ�����δ�黹��Ϣ,�κ�һ�׷���Ȩ�����Ըü׷�
                δ�ջصĽ�Ϣ���ҷ�׷�������������ϡ�</p>
            <div class="pro_title">���������������ú͹�Ͻ</div>
            <p class="indent_four">��Э���ǩ�������С���ֹ�����;������л����񹲺͹�����,����Э�����еغ���������Ժ��Ͻ��</p>
            <div class="pro_title">����������վ���շ�</div>
            <p class="indent_four">������www.huinacaifu.com��Ϊ�׷����ҷ��ṩ�Ӽ���񣬲���ȡ��ط��á���Ѻ��
                ��˷�Ϊ�����0-6%����Ѻ����˻������Ϊ�����0.5%ÿ�¡���˷Ѽ��˻�������ڽ��긴��ͨ��ʱһ���Կ۳������˻��������շ�����վ�����¹���Ϊ׼��</p>
            <div class="pro_title">�ڰ������ر�����</div>
            <p class="indent_four">1���ҷ���֤���ҷ��Ľ�����ںϷ���;������������������κ�Υ���(�����������ڶĲ���������������������潵�)��
                һ�и߷���Ͷ��(��֤ȯ�ڻ�����Ʊ��)�����ҷ�Υ��ǰ����֤����Υ��ǰ����֤�����ɣ���׷���Ȩ��ȡ���д�ʩ��</p>
            <p class="indent_eight">��1��������ǰ�ջ�ȫ����</p>
            <p class="indent_eight">��2���׷��򹫰����й��������ؾٱ���׷�ش˿׷���ҷ����������Σ��׷����ҷ���ͬ�Ⲣ��Ȩ������ȡǰ����ʩ��</p>
            <p class="indent_four">2����������ΪС���ʽ���ƽ̨,�ҷ��ͼ׷����������ñ���ƽ̨�������ÿ����ֺ�����ϴǮ�Ȳ�����������Ϊ,����׷���
                �ҷ��ͱ�����Ȩ�򹫰����й��������ؾٱ�,׷������ط������Ρ�</p>
            <p class="indent_four">3���û�һ��ע����������ɲƸ�����������Ϊͬ�Ⲣ�Ͽɱ�����Э�飬��ȫȨί�к��ݺ��ݻ��ɲƸ���Ϣ�������޹�˾��Ϊѡ���ʵ�
                �Ĵ�����Ϊ�û��������Ŀ��������ˡ��������������������������κ�Ȩ�棬������������ծȨ����Ȩ����Ϣ����
                ����������ȣ�������Լ���⣬����������׷����С����ҷ�ԭ���´������޷����û���������ʱ��������Լ���⣬�׷�
                ����������ֱ�Ӵ�λ��ʹ�����˶��ҷ���һ��Ȩ����</p>
            <div class="pro_title">�ھ���������</div>
            <p class="indent_four">1����Э����õ����ı���ʽ�Ƴɡ�</p>
            <p class="indent_four">2����Э�����ҷ��ڱ��������Ľ������˳ɹ�֮�ռ���Э����ͷ������ǩ��������Ч,�ҷ����׷���������ִһ��,����ͬ
                �ȷ���Ч����</p>
            <p class="indent_four">3���ҷ����׷������б�Э������У�Ӧ���ر����ĸ���涨��</p>
            <p class="indent_four">4���׷����ҷ�ͬ�⡢��Ȩ���Ͽɣ�������Ϊ��������м�ƽ̨���ݱ�Э��Ĺ涨�ͱ����������涨��ʹ����Ȩ����������
                ��֪ͨ���ȡ�����ʩ��һ�з��ɺ���ͷ��վ����ҷ���׷��е���</p>
            <p class="indent_four">5�����������ɲƸ���www.huinacaifu.com��ӵ�жԱ�Э������ս���Ȩ��</p>

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