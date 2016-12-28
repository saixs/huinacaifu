<?php

function magic_modifier_czname($string, $default = ''){
	global $mysql;
	$now=time();
	$sql="select * from dw_borrow where cz_old_id=$string order by `id` DESC";
	$data = $mysql->db_fetch_array($sql);
	if(isset($data['id'])) return "<a href='/invest/a{$data['id']}.html'>{$data['name']}</a>";
}
?>
