<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/auto_user.css" rel="stylesheet" type="text/css"/>
<!--�û����ĵ�����Ŀ ��ʼ-->
<div class="wrap950 " style="width: 1000px;">
<!--��ߵĵ��� ��ʼ-->
<div class="user_left">
    <? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
</div>
<!--��ߵĵ��� ����-->

<!--�ұߵ����� ��ʼ-->
<div class="user_right" style="top:-20px;">
<div class="user_right_menu">
    <ul>
        <li class="title"><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto">�Զ�Ͷ��</a></li>
        <li
        <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="auto"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto">�Զ�Ͷ���б�</a></li>
        <li
        <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="auto_new"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto_new">����Զ�Ͷ��</a></li>

    </ul>
</div>

<div class="user_right_main">
    <!--�Զ�Ͷ�� ��ʼ-->
    <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="auto"): ?>
    <div class="user_help">
        <div style="font-weight: bold"><? if (!isset($this->magic_vars['_G']['user_cache']['vip_status'])) $this->magic_vars['_G']['user_cache']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_cache']['vip_status'] != 1): ?>ע��: VIP�û�����ʹ���Զ�Ͷ�깦��.����<a href="/vip/main.html"><span style="color: blue; font-weight: bold; font-size: 14px;">����VIP</span></a><? else: ?>���Ѿ���VIP�û�<? endif; ?></div>
        1��һ�ʽ��ֻ��һ���������Զ�Ͷ���ʽ�,����ζ����������ж�������������������,ֻ��Ͷ��һ���ʽ�,����Ĺ��������������ƽ�<br/>
        2����ԭ�й�������κ��޸�,�ù�����������ᱻ��������ĩβ.ע��:�ڱ༭����ҳ�������漴��һ���޸�,��������������û���κα��<br/>
        3�����й���,ֻҪδ��Ͷ���꣬������ʼ�ձ���ǰ��
        4��һ�ʽ��,�����û�ֻ��Ͷ��һ��,����Ϊ����ܶ��20%.
    </div>

    <!--������ϸ ����-->
    <table border="0" cellspacing="1" class="user_list_table">
        <form action="" method="post">
            <tr class="head">
                <td>״̬</td>
                <td>����</td>
                <td>������</td>
                <td>�ɹ�</td>
                <td>���Ͷ���</td>
                <td>���Ͷ���</td>
                <td>���ʽ</td>
                <td>�±�����</td>
                <td>�������</td>
                <td>���ʷ�Χ</td>
                <td>Ͷ�꽱��</td>
                <td>��Ͷ����</td>
                <td>����</td>
            </tr>
            <? $this->magic_vars['query_type']='getUserAutoTenderListSort';$data = array('limit'=>'all','order'=>'order','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::getUserAutoTenderListSort($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
            <span style="display:none"><? if (!isset($this->magic_vars['i'])) $this->magic_vars['i'] = ''; echo $this->magic_vars['i']++; ?></span>
            <tr
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
            <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==1): ?>����<? else: ?>δ����<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=1): ?>��<? else: ?><? if (!isset($this->magic_vars['var']['sort'])) $this->magic_vars['var']['sort'] = ''; echo $this->magic_vars['var']['sort']; ?><? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=1): ?>��<? else: ?><? if (!isset($this->magic_vars['var']['real_sort'])) $this->magic_vars['var']['real_sort'] = ''; echo $this->magic_vars['var']['real_sort']; ?><? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['tender_times'])) $this->magic_vars['var']['tender_times'] = ''; echo $this->magic_vars['var']['tender_times']; ?>��</td>
            <td><? if (!isset($this->magic_vars['var']['min_tender'])) $this->magic_vars['var']['min_tender'] = ''; echo $this->magic_vars['var']['min_tender']; ?></td>
            <td><? if (!isset($this->magic_vars['var']['max_tender'])) $this->magic_vars['var']['max_tender'] = ''; echo $this->magic_vars['var']['max_tender']; ?></td>
            <td><? if (!isset($this->magic_vars['var']['repayment_type'])) $this->magic_vars['var']['repayment_type']=''; ;if (  $this->magic_vars['var']['repayment_type']==0): ?>������<? if (!isset($this->magic_vars['var']['repayment_type'])) $this->magic_vars['var']['repayment_type']=''; ;elseif (  $this->magic_vars['var']['repayment_type']==1): ?>���·���<? else: ?>��Ϣ��<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['month_cycle_status'])) $this->magic_vars['var']['month_cycle_status']=''; ;if (  $this->magic_vars['var']['month_cycle_status']==1): ?><? if (!isset($this->magic_vars['var']['min_month'])) $this->magic_vars['var']['min_month'] = ''; echo $this->magic_vars['var']['min_month']; ?>~<? if (!isset($this->magic_vars['var']['max_month'])) $this->magic_vars['var']['max_month'] = ''; echo $this->magic_vars['var']['max_month']; ?><? if (!isset($this->magic_vars['var']['month_cycle_status'])) $this->magic_vars['var']['month_cycle_status']=''; ;elseif (  $this->magic_vars['var']['month_cycle_status']==0): ?>������<? else: ?>��Ͷ�±�<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['day_cycle_status'])) $this->magic_vars['var']['day_cycle_status']=''; ;if (  $this->magic_vars['var']['day_cycle_status']==1): ?><? if (!isset($this->magic_vars['var']['min_day'])) $this->magic_vars['var']['min_day'] = ''; echo $this->magic_vars['var']['min_day']; ?>~<? if (!isset($this->magic_vars['var']['max_day'])) $this->magic_vars['var']['max_day'] = ''; echo $this->magic_vars['var']['max_day']; ?><? if (!isset($this->magic_vars['var']['day_cycle_status'])) $this->magic_vars['var']['day_cycle_status']=''; ;elseif (  $this->magic_vars['var']['day_cycle_status']==0): ?>������<? else: ?>��Ͷ���<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['interest_rate_status'])) $this->magic_vars['var']['interest_rate_status']=''; ;if (  $this->magic_vars['var']['interest_rate_status']==1): ?><? if (!isset($this->magic_vars['var']['min_interest'])) $this->magic_vars['var']['min_interest'] = ''; echo $this->magic_vars['var']['min_interest']; ?>~<? if (!isset($this->magic_vars['var']['max_interest'])) $this->magic_vars['var']['max_interest'] = ''; echo $this->magic_vars['var']['max_interest']; ?><? else: ?>������<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['award_status'])) $this->magic_vars['var']['award_status']=''; ;if (  $this->magic_vars['var']['award_status']==1): ?><? if (!isset($this->magic_vars['var']['min_award'])) $this->magic_vars['var']['min_award'] = ''; echo $this->magic_vars['var']['min_award']; ?>~<? if (!isset($this->magic_vars['var']['max_award'])) $this->magic_vars['var']['max_award'] = ''; echo $this->magic_vars['var']['max_award']; ?><? else: ?>������<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['borrow_type'])) $this->magic_vars['var']['borrow_type']=''; ;if (  $this->magic_vars['var']['borrow_type']==0): ?>������<? if (!isset($this->magic_vars['var']['borrow_type'])) $this->magic_vars['var']['borrow_type']=''; ;elseif (  $this->magic_vars['var']['borrow_type']==1): ?>��Ѻ��<? else: ?>���ñ�<? endif; ?></td>
            <td>
                <a href="/index.php?user&q=code/borrow/auto_new&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>">�޸�</a>
                <a href="#" onclick="javascript:if(confirm('��ȷ��Ҫɾ�����Զ�Ͷ����')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto_del&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>'">ɾ��</a>
            </td>
            </tr>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
        </form>
    </table>


</div>


<!--�Զ�Ͷ�� ����-->
<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="auto_new"): ?>
<form method="post" name="form1" action="/index.php?user&q=code/borrow/auto_add">
<div class="user_help">
    <strong>�Զ�Ͷ�괥����������</strong>
</div>

<style type="text/css">
    table th {text-align: right}
    table tr {height: 50px;}
    .middle_td {width: 620px; padding-left: 20px;}
    td span {color: #888}
</style>
<script type="text/javascript">
    function show_select(id) {
        $('#'+id).show();
    }

    function hide_select(id) {
        $('#'+id).hide();
    }
</script>

<div style=" width: 780px; margin:0 auto; padding-bottom:20px;">
<div class="sideT">

<div class="set_table" style=" clear:both; float:left">

    <table border="0" style="text-align:left;position: relative;left: 100px;">
        <tr>
            <th>�Ƿ����ã�</th>
            <td class="middle_td">
                <input id="status" type="checkbox" name="status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['status'])) $this->magic_vars['_U']['auto_result']['status']=''; ;if (  $this->magic_vars['_U']['auto_result']['status']==1): ?> checked="checked" <? endif; ?>/>
                <span>�����ѡ����ǰ���򲻻���Ч</span>
            </td>
        </tr>
        <tr>
            <th>���Ͷ��</th>
            <td class="middle_td"><input type="text" name="min_tender" value="<? if (!isset($this->magic_vars['_U']['auto_result']['min_tender'])) $this->magic_vars['_U']['auto_result']['min_tender']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_tender'] > 0): ?><? if (!isset($this->magic_vars['_U']['auto_result']['min_tender'])) $this->magic_vars['_U']['auto_result']['min_tender'] = ''; echo $this->magic_vars['_U']['auto_result']['min_tender']; ?><? else: ?>0<? endif; ?>"/></td>
        </tr>
        <tr>
            <th></th>
            <td class="middle_td" colspan="2"><span>����ÿ��Ͷ���ʵ��Ͷ���õ��ڸ���ֵ,�������������������ô�Ͷ�����,<br />�������ƽ�����,����0Ϊ������</span></td>
        </tr>
        <tr>
            <th>���Ͷ��</th>
            <td class="middle_td"><input type="text" name="max_tender" value="<? if (!isset($this->magic_vars['_U']['auto_result']['max_tender'])) $this->magic_vars['_U']['auto_result']['max_tender']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_tender'] > 0): ?><? if (!isset($this->magic_vars['_U']['auto_result']['max_tender'])) $this->magic_vars['_U']['auto_result']['max_tender'] = ''; echo $this->magic_vars['_U']['auto_result']['max_tender']; ?><? else: ?>0<? endif; ?>"/></td>
        </tr>
        <tr>
            <th></th>
            <td class="middle_td" colspan="2"><span>����ÿ��Ͷ���ʵ��Ͷ���ø��ڸ���ֵ,�����������Զ�����.����0Ϊ������</span></td>
        </tr>
        <tr>
            <th>
                ���ʽ��
            </th>
            <td class="middle_td">
                <input type="radio" name="repayment_type" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['repayment_type'])) $this->magic_vars['_U']['auto_result']['repayment_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['repayment_type']==0): ?> checked="checked"<? endif; ?>/>������
                <input type="radio" name="repayment_type" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['repayment_type'])) $this->magic_vars['_U']['auto_result']['repayment_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['repayment_type']==1): ?> checked="checked"<? endif; ?>>���·���
                <input type="radio" name="repayment_type" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['repayment_type'])) $this->magic_vars['_U']['auto_result']['repayment_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['repayment_type']==2): ?> checked="checked"<? endif; ?>>��Ϣ��
            </td>
        </tr>
        <tr>
            <th>�±������ޣ�</th>
            <td class="middle_td">
                <input onclick="hide_select('month_cycle_chose')" name="month_cycle_status" type="radio" value="0" checked="checked" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']==0): ?>
                checked="checked"<? endif; ?>/><label for="">������</label>
                <input onclick="hide_select('month_cycle_chose')" name="month_cycle_status" type="radio" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']==2): ?>
                checked="checked"<? endif; ?>/><label for="">��Ͷ�±�</label>
                <input onclick="show_select('month_cycle_chose')" type="radio" name="month_cycle_status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']==1): ?> checked="checked"<? endif; ?>/>
                <label for="">����������Χ</label>
                <span id="month_cycle_chose" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']!=1): ?>style="display: none"<? endif; ?>>
                <select id="min_month" name="min_month">
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==1): ?> selected="selected"<? endif; ?> value="1">1����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==2): ?> selected="selected"<? endif; ?> value="2">2����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==3): ?> selected="selected"<? endif; ?> value="3">3����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==4): ?> selected="selected"<? endif; ?> value="4">4����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==5): ?> selected="selected"<? endif; ?> value="5">5����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==6): ?> selected="selected"<? endif; ?> value="6">6����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==7): ?> selected="selected"<? endif; ?> value="7">7����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==8): ?> selected="selected"<? endif; ?> value="8">8����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==9): ?> selected="selected"<? endif; ?> value="9">9����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==10): ?> selected="selected"<? endif; ?> value="10">10����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==11): ?> selected="selected"<? endif; ?> value="11">11����</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==12): ?> selected="selected"<? endif; ?> value="12">12����</option>
                </select>
                ~
                <select id="max_month" name="max_month">
                    <option value="1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==1): ?> selected="selected"<? endif; ?>>1����</option>
                    <option value="2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==2): ?> selected="selected"<? endif; ?>>2����</option>
                    <option value="3"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==3): ?> selected="selected"<? endif; ?>>3����</option>
                    <option value="4"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==4): ?> selected="selected"<? endif; ?>>4����</option>
                    <option value="5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==5): ?> selected="selected"<? endif; ?>>5����</option>
                    <option value="6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==6): ?> selected="selected"<? endif; ?>>6����</option>
                    <option value="7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==7): ?> selected="selected"<? endif; ?>>7����</option>
                    <option value="8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==8): ?> selected="selected"<? endif; ?>>8����</option>
                    <option value="9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==9): ?> selected="selected"<? endif; ?>>9����</option>
                    <option value="10"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==10): ?> selected="selected"<? endif; ?>>10����</option>
                    <option value="11"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==11): ?> selected="selected"<? endif; ?>>11����</option>
                    <option value="12"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==12): ?> selected="selected"<? endif; ?>>12����</option>
                </select>
                </span>
            </td>
        </tr>

        <tr>
            <th>��������ޣ�</th>
            <td class="middle_td">
                <input onclick="hide_select('day_cycle_chose')" name="day_cycle_status" type="radio" value="0" checked="checked" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']==0): ?>
                checked="checked"<? endif; ?>/><label for="">������</label>
                <input onclick="hide_select('day_cycle_chose')" name="day_cycle_status" type="radio" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']==2): ?>
                checked="checked"<? endif; ?>/><label for="">��Ͷ���</label>
                <input onclick="show_select('day_cycle_chose')" name="day_cycle_status" type="radio"  value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']==1): ?> checked="checked"<? endif; ?>/>
                <label for="">����������Χ</label>
                <span id="day_cycle_chose" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']!=1): ?>style="display: none"<? endif; ?>>
                <select id="min_day" name="min_day">

                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==1): ?> selected="selected"<? endif; ?> value="1">1��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==2): ?> selected="selected"<? endif; ?> value="2">2��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==3): ?> selected="selected"<? endif; ?> value="3">3��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==4): ?> selected="selected"<? endif; ?> value="4">4��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==5): ?> selected="selected"<? endif; ?> value="5">5��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==6): ?> selected="selected"<? endif; ?> value="6">6��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==7): ?> selected="selected"<? endif; ?> value="7">7��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==8): ?> selected="selected"<? endif; ?> value="8">8��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==9): ?> selected="selected"<? endif; ?> value="9">9��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==10): ?> selected="selected"<? endif; ?> value="10">10��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==11): ?> selected="selected"<? endif; ?> value="11">11��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==12): ?> selected="selected"<? endif; ?> value="12">12��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==13): ?> selected="selected"<? endif; ?> value="12">13��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==14): ?> selected="selected"<? endif; ?> value="12">14��</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==15): ?> selected="selected"<? endif; ?> value="12">15��</option>
                </select>
                ~
                <select id="max_day" name="max_day">
                    <option value="1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==1): ?> selected="selected"<? endif; ?>>1��</option>
                    <option value="2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==2): ?> selected="selected"<? endif; ?>>2��</option>
                    <option value="3"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==3): ?> selected="selected"<? endif; ?>>3��</option>
                    <option value="4"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==4): ?> selected="selected"<? endif; ?>>4��</option>
                    <option value="5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==5): ?> selected="selected"<? endif; ?>>5��</option>
                    <option value="6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==6): ?> selected="selected"<? endif; ?>>6��</option>
                    <option value="7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==7): ?> selected="selected"<? endif; ?>>7��</option>
                    <option value="8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==8): ?> selected="selected"<? endif; ?>>8��</option>
                    <option value="9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==9): ?> selected="selected"<? endif; ?>>9��</option>
                    <option value="10"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==10): ?> selected="selected"<? endif; ?>>10��</option>
                    <option value="11"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==11): ?> selected="selected"<? endif; ?>>11��</option>
                    <option value="12"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==12): ?> selected="selected"<? endif; ?>>12��</option>
                    <option value="13"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==13): ?> selected="selected"<? endif; ?>>13��</option>
                    <option value="14"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==14): ?> selected="selected"<? endif; ?>>14��</option>
                    <option value="15"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==15): ?> selected="selected"<? endif; ?>>15��</option>
                </select>
                </span>
            </td>
        </tr>

        <tr>
            <th>
                ����ѡ�
            </th>
            <td class="middle_td">
                <input onclick="hide_select('interest_rate_chose')" type="radio" name="interest_rate_status" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['interest_rate_status'])) $this->magic_vars['_U']['auto_result']['interest_rate_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['interest_rate_status']==0): ?> checked="checked"<? endif; ?>/>������
                <input onclick="show_select('interest_rate_chose')" type="radio" name="interest_rate_status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['interest_rate_status'])) $this->magic_vars['_U']['auto_result']['interest_rate_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['interest_rate_status']==1): ?> checked="checked"<? endif; ?>/>���������ʷ�Χ
                <span id="interest_rate_chose" <? if (!isset($this->magic_vars['_U']['auto_result']['interest_rate_status'])) $this->magic_vars['_U']['auto_result']['interest_rate_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['interest_rate_status']!=1): ?>style="display: none"<? endif; ?>>
                <select name="min_interest">
                    <option value="1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==1): ?> selected="selected"<? endif; ?>>1%</option>
                    <option value="2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==2): ?> selected="selected"<? endif; ?>>2%</option>
                    <option value="3"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==3): ?> selected="selected"<? endif; ?>>3%</option>
                    <option value="4"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==4): ?> selected="selected"<? endif; ?>>4%</option>
                    <option value="5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==5): ?> selected="selected"<? endif; ?>>5%</option>
                    <option value="6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==6): ?> selected="selected"<? endif; ?>>6%</option>
                    <option value="7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==7): ?> selected="selected"<? endif; ?>>7%</option>
                    <option value="8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==8): ?> selected="selected"<? endif; ?>>8%</option>
                    <option value="9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==9): ?> selected="selected"<? endif; ?>>9%</option>
                    <option value="10"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==10): ?> selected="selected"<? endif; ?>>10%</option>
                    <option value="11"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==11): ?> selected="selected"<? endif; ?>>11%</option>
                    <option value="12"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==12): ?> selected="selected"<? endif; ?>>12%</option>
                    <option value="13"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==13): ?> selected="selected"<? endif; ?>>13%</option>
                    <option value="14"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==14): ?> selected="selected"<? endif; ?>>14%</option>
                    <option value="15"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==15): ?> selected="selected"<? endif; ?>>15%</option>
                    <option value="16"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==16): ?> selected="selected"<? endif; ?>>16%</option>
                    <option value="17"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==17): ?> selected="selected"<? endif; ?>>17%</option>
                    <option value="18"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==18): ?> selected="selected"<? endif; ?>>18%</option>
                    <option value="19"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==19): ?> selected="selected"<? endif; ?>>19%</option>
                    <option value="20"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==20): ?> selected="selected"<? endif; ?>>20%</option>
                    <option value="21"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==21): ?> selected="selected"<? endif; ?>>21%</option>
                    <option value="22"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==22): ?> selected="selected"<? endif; ?>>22%</option>
                    <option value="23"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==23): ?> selected="selected"<? endif; ?>>23%</option>
                    <option value="24"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==24): ?> selected="selected"<? endif; ?>>24%</option>
                    <option value="25"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_interest'])) $this->magic_vars['_U']['auto_result']['min_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_interest']==25): ?> selected="selected"<? endif; ?>>25%</option>
                </select>
                ~
                <select name="max_interest">
                    <option value="5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==5): ?> selected="selected"<? endif; ?>>5%</option>
                    <option value="6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==6): ?> selected="selected"<? endif; ?>>6%</option>
                    <option value="7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==7): ?> selected="selected"<? endif; ?>>7%</option>
                    <option value="8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==8): ?> selected="selected"<? endif; ?>>8%</option>
                    <option value="9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==9): ?> selected="selected"<? endif; ?>>9%</option>
                    <option value="10"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==10): ?> selected="selected"<? endif; ?>>10%</option>
                    <option value="11"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==11): ?> selected="selected"<? endif; ?>>11%</option>
                    <option value="12"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==12): ?> selected="selected"<? endif; ?>>12%</option>
                    <option value="13"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==13): ?> selected="selected"<? endif; ?>>13%</option>
                    <option value="14"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==14): ?> selected="selected"<? endif; ?>>14%</option>
                    <option value="15"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==15): ?> selected="selected"<? endif; ?>>15%</option>
                    <option value="16"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==16): ?> selected="selected"<? endif; ?>>16%</option>
                    <option value="17"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==17): ?> selected="selected"<? endif; ?>>17%</option>
                    <option value="18"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==18): ?> selected="selected"<? endif; ?>>18%</option>
                    <option value="19"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==19): ?> selected="selected"<? endif; ?>>19%</option>
                    <option value="20"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==20): ?> selected="selected"<? endif; ?>>20%</option>
                    <option value="21"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==21): ?> selected="selected"<? endif; ?>>21%</option>
                    <option value="22"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==22): ?> selected="selected"<? endif; ?>>22%</option>
                    <option value="23"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==23): ?> selected="selected"<? endif; ?>>23%</option>
                    <option value="24"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==24): ?> selected="selected"<? endif; ?>>24%</option>
                    <option value="25"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_interest'])) $this->magic_vars['_U']['auto_result']['max_interest']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_interest']==25): ?> selected="selected"<? endif; ?>>25%</option>
                </select>
                </span>
            </td>
        </tr>
        <tr>
            <th>
                ����ѡ�
            </th>
            <td class="middle_td">
                <input onclick="hide_select('award_status_chose')" type="radio" name="award_status" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['award_status'])) $this->magic_vars['_U']['auto_result']['award_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['award_status']==0): ?> checked="checked"<? endif; ?> />������
                <input onclick="show_select('award_status_chose')" type="radio" name="award_status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['award_status'])) $this->magic_vars['_U']['auto_result']['award_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['award_status']==1): ?> checked="checked"<? endif; ?> />
                <label for="">���ƽ�����Χ</label>
                <span id="award_status_chose" <? if (!isset($this->magic_vars['_U']['auto_result']['award_status'])) $this->magic_vars['_U']['auto_result']['award_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['award_status']!=1): ?>style="display: none"<? endif; ?>>
                <select name="min_award">
                    <option value="0"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0"): ?> selected="selected"<? endif; ?>>0%</option>
                    <option value="0.1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.1"): ?> selected="selected"<? endif; ?>>0.1%</option>
                    <option value="0.2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.2"): ?> selected="selected"<? endif; ?>>0.2%</option>
                    <option value="0.3"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.3"): ?> selected="selected"<? endif; ?>>0.3%</option>
                    <option value="0.4"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.4"): ?> selected="selected"<? endif; ?>>0.4%</option>
                    <option value="0.5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.5"): ?> selected="selected"<? endif; ?>>0.5%</option>
                    <option value="0.6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.6"): ?> selected="selected"<? endif; ?>>0.6%</option>
                    <option value="0.7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.17"): ?> selected="selected"<? endif; ?>>0.7%</option>
                    <option value="0.8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.8"): ?> selected="selected"<? endif; ?>>0.8%</option>
                    <option value="0.9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="0.9"): ?> selected="selected"<? endif; ?>>0.9%</option>
                    <option value="1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="1"): ?> selected="selected"<? endif; ?>>1%</option>
                    <option value="1.5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="1.5"): ?> selected="selected"<? endif; ?>>1.5%</option>
                    <option value="2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_award'])) $this->magic_vars['_U']['auto_result']['min_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_award']=="2"): ?> selected="selected"<? endif; ?>>2%</option>

                </select>
                ~
                <select name="max_award">
                    <option value="0.1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.1"): ?> selected="selected"<? endif; ?>>0.1%</option>
                    <option value="0.2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.2"): ?> selected="selected"<? endif; ?>>0.2%</option>
                    <option value="0.3"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.3"): ?> selected="selected"<? endif; ?>>0.3%</option>
                    <option value="0.4"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.4"): ?> selected="selected"<? endif; ?>>0.4%</option>
                    <option value="0.5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.5"): ?> selected="selected"<? endif; ?>>0.5%</option>
                    <option value="0.6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.6"): ?> selected="selected"<? endif; ?>>0.6%</option>
                    <option value="0.7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.17"): ?> selected="selected"<? endif; ?>>0.7%</option>
                    <option value="0.8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.8"): ?> selected="selected"<? endif; ?>>0.8%</option>
                    <option value="0.9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="0.9"): ?> selected="selected"<? endif; ?>>0.9%</option>
                    <option value="1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="1"): ?> selected="selected"<? endif; ?>>1%</option>
                    <option value="1.5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="1.5"): ?> selected="selected"<? endif; ?>>1.5%</option>
                    <option value="2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_award'])) $this->magic_vars['_U']['auto_result']['max_award']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_award']=="2"): ?> selected="selected"<? endif; ?>>2%</option>

                </select>
            </td>
        </tr>
        <tr>
            <th>
                �������ƣ�
            </th>
            <td class="middle_td">
                <input type="radio" name="borrow_type" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['borrow_type'])) $this->magic_vars['_U']['auto_result']['borrow_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['borrow_type']==0): ?> checked="checked"<? endif; ?> />������
                <input type="radio" name="borrow_type" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['borrow_type'])) $this->magic_vars['_U']['auto_result']['borrow_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['borrow_type']==1): ?> checked="checked"<? endif; ?> />
                <label>ֻͶ��Ѻ��</label>
                <input type="radio" name="borrow_type" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['borrow_type'])) $this->magic_vars['_U']['auto_result']['borrow_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['borrow_type']==2): ?> checked="checked"<? endif; ?>/>
                <label>ֻͶ���ñ�</label>
            </td>
        </tr>
    </table>
</div>
</div>
<div style="text-align:center; clear:both">
    <input type="hidden" name="auto_id" value="<? if (!isset($this->magic_vars['_U']['auto_result']['id'])) $this->magic_vars['_U']['auto_result']['id'] = ''; echo $this->magic_vars['_U']['auto_result']['id']; ?>"/>
    <input type="submit" name="" value="����" id="" style="width:100px;"/>
</div>
</div>
</form>
<? endif; ?>
<script>
    var url = "<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type'] = ''; echo $this->magic_vars['_U']['query_type']; ?>";
    
    function sousuo(urla) {
        if (urla != "") url = urla;
        var _url = "";
        var dotime1 = $("#dotime1").val();
        var keywords = $("#keywords").val();
        var username = $("#username").val();
        var status = $("#status").val();
        var reply_status = $("#reply_status").val();
        var tender_username = $("#tender_username").val();
        var dotime2 = $("#dotime2").val();
        if (username != null) {
            _url += "&username=" + username;
        }
        if (tender_username != null) {
            _url += "&tender_username=" + tender_username;
        }
        if (status != null) {
            _url += "&status=" + status;
        }
        if (reply_status != null) {
            _url += "&reply_status=" + reply_status;
        }
        if (keywords != null) {
            _url += "&keywords=" + keywords;
        }
        if (dotime1 != null) {
            _url += "&dotime1=" + dotime1;
        }
        if (dotime2 != null) {
            _url += "&dotime2=" + dotime2;
        }
        location.href = url + _url;
    }

</script>

</div>
</div>
</div>
<!--�û����ĵ�����Ŀ ����-->
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>