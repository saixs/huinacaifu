<?php

function magic_modifier_borrowUse($id){
	global $mysql;
	$sql="select * from dw_linkage where `type_id`=19 and `id`={$id}";
	$data = $mysql->db_fetch_array($sql);
	if (isset($data['name'])) {
		return $data['name'];
	} else {
		return '其他项目';
	}
}
?>
