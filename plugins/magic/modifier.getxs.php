<?php

function magic_modifier_getxs($string, $default = ''){
	global $mysql;
	$now=time();
	$sql="select `order` from dw_borrow_repayment where borrow_id=$string and repayment_time<{$now} and repayment_yestime is null order by `order` asc";
	$data = $mysql->db_fetch_array($sql);
	if(isset($data['order'])) return "<a href='/index.php?user&q=code/borrow/repayment_cz&id=$string'>ÖØ×é</a>";
}
?>
