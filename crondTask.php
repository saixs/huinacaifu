<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-18
 * Time: ����12:27
 */

date_default_timezone_set('PRC');
$msg = date('Y-m-d H:i:s', time()).'  ����ű�->';
include_once ($_SERVER['DOCUMENT_ROOT']."/core/config.inc.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/modules/borrow/borrow.class.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/modules/account/account.class.php';
if (md5($_GET['password']) != 'f05438a789bc9a54f9ae6519d852cde4') {
    echo '�������'."\r\n";
    die;
}
$time           = time();
$allow_dif_time = 300;// �ݲ�ʱ�� 300��, �� ���ݿ��е� crond_time ��������ڴ˷�Χ�ڵĽ����Դ����Զ�����
$job_max_time   = $time + $allow_dif_time;
$job_min_time   = $time - $allow_dif_time;

$sql = "SELECT * FROM {borrow} WHERE `status`=0 AND `is_crond`=1 AND `crond_time` BETWEEN {$job_min_time} AND {$job_max_time} ORDER BY `crond_time` ASC";
$res =  $mysql->db_fetch_arrays($sql);
if (count($res) < 1) {
    $msg .= 'û��ƥ��Ľ��->'."\r\n";
} else {
    $msg .= '׼������ѭ��->'."\r\n";
    foreach ($res as $key => $value)
    {
        $msg .= '��ʼѭ��:';
        $data['id'] = $value['id'];
        $data['status'] = 1;
        $data['verify_remark'] = '��ʱ������,ϵͳ�Զ�����';
        $data['verify_user'] = 0;
        $data['verify_time'] = $time;

        $sql = "UPDATE `{borrow}` SET verify_time={$time},verify_user='{$data['verify_user']}',verify_remark='{$data['verify_remark']}',status={$data['status']}
                WHERE  id='{$data['id']}' AND `status`=0";
        $result = $mysql->db_query($sql);
        $msg .= '���'.$data['id'].'���½��״̬';
        if ($result == false) {
            // ���½��ʧ��
            $msg .= 'ʧ��->';
        } else {
            //�Զ�Ͷ��
            $msg .= '�ɹ�->';
            $bor_sql = "select * from `{borrow}` where id ={$data['id']}";
            $bor_row = $mysql->db_fetch_array($bor_sql);
            if ($bor_row['is_mb'] != 1 and $bor_row['is_dxb'] != 1 and $bor_row['is_vouch'] != 1 and $bor_row['is_liuzhuan'] != 1) {
                $msg .= '�����Զ�Ͷ��->';
                $auto['id'] = $data['id'];
                $auto['user_id'] = $bor_row['user_id'];
                borrowClass::auto_borrow($auto);
            } else {
                $msg .= '�����Զ�Ͷ��ʧ��->';
            }
            // �Զ�Ͷ�����
        }
        $_data['user_id'] = $_POST['user_id'];
        $_data['content'] = "�ɹ�������\"<a href=\'/invest/a{$data['id']}.html\' target=\'_blank\'>{$_POST['name']}</a>\"����";
        $result = userClass::AddUserTrend($_data);
        $msg .= '����ѭ������'."\r\n";
    }
}
$msg .= '--------------------------------------------------'."\r\n";
/*putContent('crond.log', $msg);*/
echo $msg;