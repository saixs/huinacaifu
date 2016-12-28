<?php

function magic_modifier_czf($string, $default = ''){
	global $mysql;
	$now=time();
	$sql="select * from dw_borrow where id=$string order by `id` DESC";
	$data = $mysql->db_fetch_array($sql);
	if(isset($data['id'])) return "<a href='/invest/a{$data['id']}.html'>{$data['name']}</a>";
}
?>
