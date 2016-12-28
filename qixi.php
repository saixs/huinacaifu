<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/core/config.inc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/account/account.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/modules/payment/payment.class.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] <= 0) {
	echo '-1'; die;
} else {
	$sql = "SELECT * FROM dw_user where user_id={$_SESSION['user_id']}";
	$res = $mysql->db_fetch_array($sql);
	if ($res['toupiao'] == 1) {
		echo '-2';die;
	} else {
		$id = intval($_GET['id']);
		$sql = "SELECT * from dw_attestation where id={$id}";
		$r   = $mysql->db_fetch_array($sql);
		if (isset($r['times'])) {
			$sql = "update dw_attestation set times=times+1 where id={$id}";
			$res = $mysql->db_query($sql);
			if ($res) {
				$sql = "update dw_user set toupiao=1 where user_id={$_SESSION['user_id']}";
				$res = $mysql->db_query($sql);
				echo '1';die;
			} else {
				echo '0';die;
			}
		} else {
			echo '-3';die;
		}
	}
}
?>