<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link type="text/css" rel="stylesheet" href="/images/css.css" />

<!--����-->
<div style="float:left; height:120px;"></div>
<div id="about_main">
    <div id="about">
        <ul class="about_left">
            <!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="bzzx"  ||  $this->magic_vars['_G']['site_result']['nid']=="bzzx"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/bzzx/main.html">��������</a></li>-->
            <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="cjwt"  ||  $this->magic_vars['_G']['site_result']['nid']=="cjwt"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/cjwt/main.html">��������</a></li>
            <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="ptyl"  ||  $this->magic_vars['_G']['site_result']['nid']=="ptyl"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/ptyl/main.html">ƽ̨ԭ��</a></li>
            <!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="lendhelp"  ||  $this->magic_vars['_G']['site_result']['nid']=="lendhelp"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/lendhelp/main.html">��ν��</a></li>
            <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="bowrrowhelp"  ||  $this->magic_vars['_G']['site_result']['nid']=="bowrrowhelp"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/bowrrowhelp/main.html">�������</a></li>-->
            <!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="ljgengduo"  ||  $this->magic_vars['_G']['site_result']['nid']=="ljgengduo"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/ljgengduo/main.html">�˽����</a></li>-->
            <!--<li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="fwgz"  ||  $this->magic_vars['_G']['site_result']['nid']=="fwgz"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/fwgz/main.html">�������</a></li>-->
            <li <? if (!isset($this->magic_vars['_G']['site_presult']['nid'])) $this->magic_vars['_G']['site_presult']['nid']='';if (!isset($this->magic_vars['_G']['site_result']['nid'])) $this->magic_vars['_G']['site_result']['nid']=''; ;if (  $this->magic_vars['_G']['site_presult']['nid']=="lixi"  ||  $this->magic_vars['_G']['site_result']['nid']=="lixi"): ?> class="li2"  <? else: ?>   <? endif; ?>><a href="/lixi/main.html">��Ϣ������ </a></li>
        </ul>

        <div class="about_right">
            <div class="about_right_tit"><? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name'] = ''; echo $this->magic_vars['_G']['site_result']['name']; ?><span class="sp1"><span class="sp2"></span>��ǰλ�ã� >> <? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name'] = ''; echo $this->magic_vars['_G']['site_result']['name']; ?></span></div>
            <div class="about_right_sum">

<style type="text/css">
.title{text-indent:30px; line-height:15px}

</style>



<div class="list_li_3">
	
	<?
		$account = isset($_REQUEST['account'])?$_REQUEST['account']:"";
		$lilv = isset($_REQUEST['lilv'])?$_REQUEST['lilv']:"";
		$times = isset($_REQUEST['times'])?$_REQUEST['times']:"";
		$type = isset($_REQUEST['type'])?$_REQUEST['type']:"";
	?>
	<div class="content">
		<br />
		<font color="#FF0000">��Ϣ������,�������з�����ͨ�õ�"�ȶϢ���",�������ÿ������ȵĽ������Ϣ��</font>
		<br /><br />
		<div>
			<form action="" method="get">����<input type="text" name="account" size="10"  value="<? echo isset($_REQUEST['account'])?$_REQUEST['account']:""; ?>" value="<? echo $_REQUEST['account'];?>" /> �����ʣ�<input type="text" name="lilv"  size="10"  value="<? echo isset($_REQUEST['lilv'])?$_REQUEST['lilv']:""; ?>"/>%  ������ޣ�<input type="text" name="times"  size="10"  value="<? echo isset($_REQUEST['times'])?$_REQUEST['times']:""; ?>" />���� ���ʽ��<select name="type"><option value="0" >���»���</option><option value="3" >�¸�Ϣ���ڻ���</option></select>  <input type="submit" value="��ʼ����" /></form>
		</div>
	</div>
</div>
<?
require_once(ROOT_PATH."modules/borrow/borrow.class.php");
$data['account'] = $account;
$data['year_apr'] = $lilv;
$data['month_times'] = $times;
$data['borrow_time'] = time();

$data['borrow_style']=$_REQUEST['type'];
$list = borrowClass::EqualInterest($data);
$data['borrow_style']=$_REQUEST['type'];
$data['type']="all";
$result = borrowClass::EqualInterest($data);
if ($result!=""){
?>

<div>�������</div>

<div style="border: 1px #ccc solid;padding: 10px 20px;">
	<div>
		ÿ���½�������<? echo $result['monthly_repayment'];?>Ԫ &nbsp; &nbsp; �����ʣ�<? echo $result['month_apr'];?>% &nbsp; &nbsp; ���Ϣ�ܶ<? echo $result['repayment_account'];?>Ԫ
	</div>
</div>

<br />
<div>����ƻ�ʱ���</div>
<div class="list_tool">
	<div class="content ltable">
	
	<table style="width: 770px;">
		<tr>
			<td><strong>����</strong></td>
			<td><strong>�»��Ϣ</strong></td>
			<td><strong>�»����</strong></td>
			<td><strong>��Ϣ</strong></td>
			<td><strong>���</strong></td>
		</tr>
		<? foreach ($list as $key => $value){?>
		<tr style="height: 40px;line-height: 40px;">
			<td><? echo $key+1;?></td>
			<td><? echo $value['repayment_account'];?></td>
			<td><? echo $value['capital'];?></td>
			<td><? echo $value['interest'];?></td>
			<td><? if($_REQUEST['type']==3)  echo $data['account']; else  echo $result['repayment_account']-($key+1)*$value['repayment_account']<0.01?0:$result['repayment_account']-($key+1)*$value['repayment_account'] ?></td>
		</tr>
		<? }?>
	</table>
	</div>
	<div class="foot"></div>
</div>
<? }?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>