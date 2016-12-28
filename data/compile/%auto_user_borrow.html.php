<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" />

<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/auto_user.css" rel="stylesheet" type="text/css"/>
<!--用户中心的主栏目 开始-->
<div class="wrap950 " style="width: 1000px;">
<!--左边的导航 开始-->
<div class="user_left">
    <? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
</div>
<!--左边的导航 结束-->

<!--右边的内容 开始-->
<div class="user_right" style="top:-20px;">
<div class="user_right_menu">
    <ul>
        <li class="title"><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto">自动投标</a></li>
        <li
        <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="auto"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto">自动投标列表</a></li>
        <li
        <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="auto_new"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto_new">添加自动投标</a></li>

    </ul>
</div>

<div class="user_right_main">
    <!--自动投标 开始-->
    <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="auto"): ?>
    <div class="user_help">
        <div style="font-weight: bold"><? if (!isset($this->magic_vars['_G']['user_cache']['vip_status'])) $this->magic_vars['_G']['user_cache']['vip_status']=''; ;if (  $this->magic_vars['_G']['user_cache']['vip_status'] != 1): ?>注意: VIP用户方可使用自动投标功能.立即<a href="/vip/main.html"><span style="color: blue; font-weight: bold; font-size: 14px;">申请VIP</span></a><? else: ?>您已经是VIP用户<? endif; ?></div>
        1、一笔借款只有一条规则能自动投入资金,这意味着如果发生有多条规则排名相近的情况,只能投入一笔资金,后面的规则排名将继续推进<br/>
        2、对原有规则进行任何修改,该规则的排名将会被降至队列末尾.注意:在编辑规则页面点击保存即算一次修改,即便所有设置项没有任何变更<br/>
        3、所有规则,只要未能投到标，排名将始终保持前进
        4、一笔借款,单个用户只能投入一次,上限为借款总额的20%.
    </div>

    <!--还款明细 结束-->
    <table border="0" cellspacing="1" class="user_list_table">
        <form action="" method="post">
            <tr class="head">
                <td>状态</td>
                <td>排名</td>
                <td>净排名</td>
                <td>成功</td>
                <td>最低投入额</td>
                <td>最高投入额</td>
                <td>还款方式</td>
                <td>月标期限</td>
                <td>天标期限</td>
                <td>利率范围</td>
                <td>投标奖励</td>
                <td>可投标种</td>
                <td>操作</td>
            </tr>
            <? $this->magic_vars['query_type']='getUserAutoTenderListSort';$data = array('limit'=>'all','order'=>'order','user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::getUserAutoTenderListSort($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
            <span style="display:none"><? if (!isset($this->magic_vars['i'])) $this->magic_vars['i'] = ''; echo $this->magic_vars['i']++; ?></span>
            <tr
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>
            <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==1): ?>启用<? else: ?>未启用<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=1): ?>无<? else: ?><? if (!isset($this->magic_vars['var']['sort'])) $this->magic_vars['var']['sort'] = ''; echo $this->magic_vars['var']['sort']; ?><? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=1): ?>无<? else: ?><? if (!isset($this->magic_vars['var']['real_sort'])) $this->magic_vars['var']['real_sort'] = ''; echo $this->magic_vars['var']['real_sort']; ?><? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['tender_times'])) $this->magic_vars['var']['tender_times'] = ''; echo $this->magic_vars['var']['tender_times']; ?>次</td>
            <td><? if (!isset($this->magic_vars['var']['min_tender'])) $this->magic_vars['var']['min_tender'] = ''; echo $this->magic_vars['var']['min_tender']; ?></td>
            <td><? if (!isset($this->magic_vars['var']['max_tender'])) $this->magic_vars['var']['max_tender'] = ''; echo $this->magic_vars['var']['max_tender']; ?></td>
            <td><? if (!isset($this->magic_vars['var']['repayment_type'])) $this->magic_vars['var']['repayment_type']=''; ;if (  $this->magic_vars['var']['repayment_type']==0): ?>无限制<? if (!isset($this->magic_vars['var']['repayment_type'])) $this->magic_vars['var']['repayment_type']=''; ;elseif (  $this->magic_vars['var']['repayment_type']==1): ?>按月分期<? else: ?>先息后本<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['month_cycle_status'])) $this->magic_vars['var']['month_cycle_status']=''; ;if (  $this->magic_vars['var']['month_cycle_status']==1): ?><? if (!isset($this->magic_vars['var']['min_month'])) $this->magic_vars['var']['min_month'] = ''; echo $this->magic_vars['var']['min_month']; ?>~<? if (!isset($this->magic_vars['var']['max_month'])) $this->magic_vars['var']['max_month'] = ''; echo $this->magic_vars['var']['max_month']; ?><? if (!isset($this->magic_vars['var']['month_cycle_status'])) $this->magic_vars['var']['month_cycle_status']=''; ;elseif (  $this->magic_vars['var']['month_cycle_status']==0): ?>无限制<? else: ?>不投月标<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['day_cycle_status'])) $this->magic_vars['var']['day_cycle_status']=''; ;if (  $this->magic_vars['var']['day_cycle_status']==1): ?><? if (!isset($this->magic_vars['var']['min_day'])) $this->magic_vars['var']['min_day'] = ''; echo $this->magic_vars['var']['min_day']; ?>~<? if (!isset($this->magic_vars['var']['max_day'])) $this->magic_vars['var']['max_day'] = ''; echo $this->magic_vars['var']['max_day']; ?><? if (!isset($this->magic_vars['var']['day_cycle_status'])) $this->magic_vars['var']['day_cycle_status']=''; ;elseif (  $this->magic_vars['var']['day_cycle_status']==0): ?>无限制<? else: ?>不投天标<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['interest_rate_status'])) $this->magic_vars['var']['interest_rate_status']=''; ;if (  $this->magic_vars['var']['interest_rate_status']==1): ?><? if (!isset($this->magic_vars['var']['min_interest'])) $this->magic_vars['var']['min_interest'] = ''; echo $this->magic_vars['var']['min_interest']; ?>~<? if (!isset($this->magic_vars['var']['max_interest'])) $this->magic_vars['var']['max_interest'] = ''; echo $this->magic_vars['var']['max_interest']; ?><? else: ?>无限制<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['award_status'])) $this->magic_vars['var']['award_status']=''; ;if (  $this->magic_vars['var']['award_status']==1): ?><? if (!isset($this->magic_vars['var']['min_award'])) $this->magic_vars['var']['min_award'] = ''; echo $this->magic_vars['var']['min_award']; ?>~<? if (!isset($this->magic_vars['var']['max_award'])) $this->magic_vars['var']['max_award'] = ''; echo $this->magic_vars['var']['max_award']; ?><? else: ?>无限制<? endif; ?></td>
            <td><? if (!isset($this->magic_vars['var']['borrow_type'])) $this->magic_vars['var']['borrow_type']=''; ;if (  $this->magic_vars['var']['borrow_type']==0): ?>无限制<? if (!isset($this->magic_vars['var']['borrow_type'])) $this->magic_vars['var']['borrow_type']=''; ;elseif (  $this->magic_vars['var']['borrow_type']==1): ?>抵押标<? else: ?>信用标<? endif; ?></td>
            <td>
                <a href="/index.php?user&q=code/borrow/auto_new&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>">修改</a>
                <a href="#" onclick="javascript:if(confirm('你确定要删除此自动投标吗？')) location.href='<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/auto_del&id=<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>'">删除</a>
            </td>
            </tr>
            <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
        </form>
    </table>


</div>


<!--自动投标 结束-->
<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="auto_new"): ?>
<form method="post" name="form1" action="/index.php?user&q=code/borrow/auto_add">
<div class="user_help">
    <strong>自动投标触发条件设置</strong>
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
            <th>是否启用：</th>
            <td class="middle_td">
                <input id="status" type="checkbox" name="status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['status'])) $this->magic_vars['_U']['auto_result']['status']=''; ;if (  $this->magic_vars['_U']['auto_result']['status']==1): ?> checked="checked" <? endif; ?>/>
                <span>如果不选中则当前规则不会生效</span>
            </td>
        </tr>
        <tr>
            <th>最低投入额：</th>
            <td class="middle_td"><input type="text" name="min_tender" value="<? if (!isset($this->magic_vars['_U']['auto_result']['min_tender'])) $this->magic_vars['_U']['auto_result']['min_tender']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_tender'] > 0): ?><? if (!isset($this->magic_vars['_U']['auto_result']['min_tender'])) $this->magic_vars['_U']['auto_result']['min_tender'] = ''; echo $this->magic_vars['_U']['auto_result']['min_tender']; ?><? else: ?>0<? endif; ?>"/></td>
        </tr>
        <tr>
            <th></th>
            <td class="middle_td" colspan="2"><span>限制每次投标的实际投标额不得低于该数值,当不满足条件将放弃该次投标机会,<br />保留或推进排名,填入0为不限制</span></td>
        </tr>
        <tr>
            <th>最高投入额：</th>
            <td class="middle_td"><input type="text" name="max_tender" value="<? if (!isset($this->magic_vars['_U']['auto_result']['max_tender'])) $this->magic_vars['_U']['auto_result']['max_tender']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_tender'] > 0): ?><? if (!isset($this->magic_vars['_U']['auto_result']['max_tender'])) $this->magic_vars['_U']['auto_result']['max_tender'] = ''; echo $this->magic_vars['_U']['auto_result']['max_tender']; ?><? else: ?>0<? endif; ?>"/></td>
        </tr>
        <tr>
            <th></th>
            <td class="middle_td" colspan="2"><span>限制每次投标的实际投标额不得高于该数值,若超过程序将自动调整.填入0为不限制</span></td>
        </tr>
        <tr>
            <th>
                还款方式：
            </th>
            <td class="middle_td">
                <input type="radio" name="repayment_type" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['repayment_type'])) $this->magic_vars['_U']['auto_result']['repayment_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['repayment_type']==0): ?> checked="checked"<? endif; ?>/>无限制
                <input type="radio" name="repayment_type" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['repayment_type'])) $this->magic_vars['_U']['auto_result']['repayment_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['repayment_type']==1): ?> checked="checked"<? endif; ?>>按月分期
                <input type="radio" name="repayment_type" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['repayment_type'])) $this->magic_vars['_U']['auto_result']['repayment_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['repayment_type']==2): ?> checked="checked"<? endif; ?>>先息后本
            </td>
        </tr>
        <tr>
            <th>月标借款期限：</th>
            <td class="middle_td">
                <input onclick="hide_select('month_cycle_chose')" name="month_cycle_status" type="radio" value="0" checked="checked" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']==0): ?>
                checked="checked"<? endif; ?>/><label for="">无限制</label>
                <input onclick="hide_select('month_cycle_chose')" name="month_cycle_status" type="radio" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']==2): ?>
                checked="checked"<? endif; ?>/><label for="">不投月标</label>
                <input onclick="show_select('month_cycle_chose')" type="radio" name="month_cycle_status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']==1): ?> checked="checked"<? endif; ?>/>
                <label for="">限制月数范围</label>
                <span id="month_cycle_chose" <? if (!isset($this->magic_vars['_U']['auto_result']['month_cycle_status'])) $this->magic_vars['_U']['auto_result']['month_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['month_cycle_status']!=1): ?>style="display: none"<? endif; ?>>
                <select id="min_month" name="min_month">
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==1): ?> selected="selected"<? endif; ?> value="1">1个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==2): ?> selected="selected"<? endif; ?> value="2">2个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==3): ?> selected="selected"<? endif; ?> value="3">3个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==4): ?> selected="selected"<? endif; ?> value="4">4个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==5): ?> selected="selected"<? endif; ?> value="5">5个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==6): ?> selected="selected"<? endif; ?> value="6">6个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==7): ?> selected="selected"<? endif; ?> value="7">7个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==8): ?> selected="selected"<? endif; ?> value="8">8个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==9): ?> selected="selected"<? endif; ?> value="9">9个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==10): ?> selected="selected"<? endif; ?> value="10">10个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==11): ?> selected="selected"<? endif; ?> value="11">11个月</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_month'])) $this->magic_vars['_U']['auto_result']['min_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_month']==12): ?> selected="selected"<? endif; ?> value="12">12个月</option>
                </select>
                ~
                <select id="max_month" name="max_month">
                    <option value="1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==1): ?> selected="selected"<? endif; ?>>1个月</option>
                    <option value="2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==2): ?> selected="selected"<? endif; ?>>2个月</option>
                    <option value="3"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==3): ?> selected="selected"<? endif; ?>>3个月</option>
                    <option value="4"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==4): ?> selected="selected"<? endif; ?>>4个月</option>
                    <option value="5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==5): ?> selected="selected"<? endif; ?>>5个月</option>
                    <option value="6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==6): ?> selected="selected"<? endif; ?>>6个月</option>
                    <option value="7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==7): ?> selected="selected"<? endif; ?>>7个月</option>
                    <option value="8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==8): ?> selected="selected"<? endif; ?>>8个月</option>
                    <option value="9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==9): ?> selected="selected"<? endif; ?>>9个月</option>
                    <option value="10"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==10): ?> selected="selected"<? endif; ?>>10个月</option>
                    <option value="11"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==11): ?> selected="selected"<? endif; ?>>11个月</option>
                    <option value="12"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_month'])) $this->magic_vars['_U']['auto_result']['max_month']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_month']==12): ?> selected="selected"<? endif; ?>>12个月</option>
                </select>
                </span>
            </td>
        </tr>

        <tr>
            <th>天标借款期限：</th>
            <td class="middle_td">
                <input onclick="hide_select('day_cycle_chose')" name="day_cycle_status" type="radio" value="0" checked="checked" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']==0): ?>
                checked="checked"<? endif; ?>/><label for="">无限制</label>
                <input onclick="hide_select('day_cycle_chose')" name="day_cycle_status" type="radio" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']==2): ?>
                checked="checked"<? endif; ?>/><label for="">不投天标</label>
                <input onclick="show_select('day_cycle_chose')" name="day_cycle_status" type="radio"  value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']==1): ?> checked="checked"<? endif; ?>/>
                <label for="">限制天数范围</label>
                <span id="day_cycle_chose" <? if (!isset($this->magic_vars['_U']['auto_result']['day_cycle_status'])) $this->magic_vars['_U']['auto_result']['day_cycle_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['day_cycle_status']!=1): ?>style="display: none"<? endif; ?>>
                <select id="min_day" name="min_day">

                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==1): ?> selected="selected"<? endif; ?> value="1">1天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==2): ?> selected="selected"<? endif; ?> value="2">2天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==3): ?> selected="selected"<? endif; ?> value="3">3天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==4): ?> selected="selected"<? endif; ?> value="4">4天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==5): ?> selected="selected"<? endif; ?> value="5">5天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==6): ?> selected="selected"<? endif; ?> value="6">6天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==7): ?> selected="selected"<? endif; ?> value="7">7天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==8): ?> selected="selected"<? endif; ?> value="8">8天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==9): ?> selected="selected"<? endif; ?> value="9">9天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==10): ?> selected="selected"<? endif; ?> value="10">10天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==11): ?> selected="selected"<? endif; ?> value="11">11天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==12): ?> selected="selected"<? endif; ?> value="12">12天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==13): ?> selected="selected"<? endif; ?> value="12">13天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==14): ?> selected="selected"<? endif; ?> value="12">14天</option>
                    <option
                    <? if (!isset($this->magic_vars['_U']['auto_result']['min_day'])) $this->magic_vars['_U']['auto_result']['min_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['min_day']==15): ?> selected="selected"<? endif; ?> value="12">15天</option>
                </select>
                ~
                <select id="max_day" name="max_day">
                    <option value="1"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==1): ?> selected="selected"<? endif; ?>>1天</option>
                    <option value="2"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==2): ?> selected="selected"<? endif; ?>>2天</option>
                    <option value="3"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==3): ?> selected="selected"<? endif; ?>>3天</option>
                    <option value="4"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==4): ?> selected="selected"<? endif; ?>>4天</option>
                    <option value="5"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==5): ?> selected="selected"<? endif; ?>>5天</option>
                    <option value="6"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==6): ?> selected="selected"<? endif; ?>>6天</option>
                    <option value="7"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==7): ?> selected="selected"<? endif; ?>>7天</option>
                    <option value="8"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==8): ?> selected="selected"<? endif; ?>>8天</option>
                    <option value="9"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==9): ?> selected="selected"<? endif; ?>>9天</option>
                    <option value="10"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==10): ?> selected="selected"<? endif; ?>>10天</option>
                    <option value="11"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==11): ?> selected="selected"<? endif; ?>>11天</option>
                    <option value="12"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==12): ?> selected="selected"<? endif; ?>>12天</option>
                    <option value="13"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==13): ?> selected="selected"<? endif; ?>>13天</option>
                    <option value="14"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==14): ?> selected="selected"<? endif; ?>>14天</option>
                    <option value="15"
                    <? if (!isset($this->magic_vars['_U']['auto_result']['max_day'])) $this->magic_vars['_U']['auto_result']['max_day']=''; ;if (  $this->magic_vars['_U']['auto_result']['max_day']==15): ?> selected="selected"<? endif; ?>>15天</option>
                </select>
                </span>
            </td>
        </tr>

        <tr>
            <th>
                利率选项：
            </th>
            <td class="middle_td">
                <input onclick="hide_select('interest_rate_chose')" type="radio" name="interest_rate_status" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['interest_rate_status'])) $this->magic_vars['_U']['auto_result']['interest_rate_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['interest_rate_status']==0): ?> checked="checked"<? endif; ?>/>无限制
                <input onclick="show_select('interest_rate_chose')" type="radio" name="interest_rate_status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['interest_rate_status'])) $this->magic_vars['_U']['auto_result']['interest_rate_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['interest_rate_status']==1): ?> checked="checked"<? endif; ?>/>限制年利率范围
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
                奖励选项：
            </th>
            <td class="middle_td">
                <input onclick="hide_select('award_status_chose')" type="radio" name="award_status" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['award_status'])) $this->magic_vars['_U']['auto_result']['award_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['award_status']==0): ?> checked="checked"<? endif; ?> />无限制
                <input onclick="show_select('award_status_chose')" type="radio" name="award_status" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['award_status'])) $this->magic_vars['_U']['auto_result']['award_status']=''; ;if (  $this->magic_vars['_U']['auto_result']['award_status']==1): ?> checked="checked"<? endif; ?> />
                <label for="">限制奖励范围</label>
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
                标种限制：
            </th>
            <td class="middle_td">
                <input type="radio" name="borrow_type" value="0" <? if (!isset($this->magic_vars['_U']['auto_result']['borrow_type'])) $this->magic_vars['_U']['auto_result']['borrow_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['borrow_type']==0): ?> checked="checked"<? endif; ?> />无限制
                <input type="radio" name="borrow_type" value="1" <? if (!isset($this->magic_vars['_U']['auto_result']['borrow_type'])) $this->magic_vars['_U']['auto_result']['borrow_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['borrow_type']==1): ?> checked="checked"<? endif; ?> />
                <label>只投抵押标</label>
                <input type="radio" name="borrow_type" value="2" <? if (!isset($this->magic_vars['_U']['auto_result']['borrow_type'])) $this->magic_vars['_U']['auto_result']['borrow_type']=''; ;if (  $this->magic_vars['_U']['auto_result']['borrow_type']==2): ?> checked="checked"<? endif; ?>/>
                <label>只投信用标</label>
            </td>
        </tr>
    </table>
</div>
</div>
<div style="text-align:center; clear:both">
    <input type="hidden" name="auto_id" value="<? if (!isset($this->magic_vars['_U']['auto_result']['id'])) $this->magic_vars['_U']['auto_result']['id'] = ''; echo $this->magic_vars['_U']['auto_result']['id']; ?>"/>
    <input type="submit" name="" value="保存" id="" style="width:100px;"/>
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
<!--用户中心的主栏目 结束-->
<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>