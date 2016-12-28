<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-18
 * Time: 下午12:27
 */

date_default_timezone_set('PRC');
$msg = date('Y-m-d H:i:s', time()).'  进入脚本->';
include_once ($_SERVER['DOCUMENT_ROOT']."/core/config.inc.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/modules/borrow/borrow.class.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/modules/account/account.class.php';
if (md5($_GET['password']) != 'f05438a789bc9a54f9ae6519d852cde4') {
    echo '密码错误'."\r\n";
    die;
}
$time           = time();
$allow_dif_time = 300;// 容差时间 300秒, 即 数据库中的 crond_time 左右误差在此范围内的借款都可以触发自动复审
$job_max_time   = $time + $allow_dif_time;
$job_min_time   = $time - $allow_dif_time;

$sql = "SELECT * FROM {borrow} WHERE `status`=0 AND `is_crond`=1 AND `crond_time` BETWEEN {$job_min_time} AND {$job_max_time} ORDER BY `crond_time` ASC";
$res =  $mysql->db_fetch_arrays($sql);
if (count($res) < 1) {
    $msg .= '没有匹配的借款->'."\r\n";
} else {
    $msg .= '准备进入循环->'."\r\n";
    foreach ($res as $key => $value)
    {
        $msg .= '开始循环:';
        $data['id'] = $value['id'];
        $data['status'] = 1;
        $data['verify_remark'] = '定时发布标,系统自动复审';
        $data['verify_user'] = 0;
        $data['verify_time'] = $time;

        $sql = "UPDATE `{borrow}` SET verify_time={$time},verify_user='{$data['verify_user']}',verify_remark='{$data['verify_remark']}',status={$data['status']}
                WHERE  id='{$data['id']}' AND `status`=0";
        $result = $mysql->db_query($sql);
        $msg .= '编号'.$data['id'].'更新借款状态';
        if ($result == false) {
            // 更新借款失败
            $msg .= '失败->';
        } else {
            //自动投标
            $msg .= '成功->';
            $bor_sql = "select * from `{borrow}` where id ={$data['id']}";
            $bor_row = $mysql->db_fetch_array($bor_sql);
            if ($bor_row['is_mb'] != 1 and $bor_row['is_dxb'] != 1 and $bor_row['is_vouch'] != 1 and $bor_row['is_liuzhuan'] != 1) {
                $msg .= '触发自动投标->';
                $auto['id'] = $data['id'];
                $auto['user_id'] = $bor_row['user_id'];
                borrowClass::auto_borrow($auto);
            } else {
                $msg .= '触发自动投标失败->';
            }
            // 自动投标结束
        }
        $_data['user_id'] = $_POST['user_id'];
        $_data['content'] = "成功发布了\"<a href=\'/invest/a{$data['id']}.html\' target=\'_blank\'>{$_POST['name']}</a>\"借款标";
        $result = userClass::AddUserTrend($_data);
        $msg .= '单次循环结束'."\r\n";
    }
}
$msg .= '--------------------------------------------------'."\r\n";
/*putContent('crond.log', $msg);*/
echo $msg;