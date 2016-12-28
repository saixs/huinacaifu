<?php
/**
 * UCenter Ӧ�ó��򿪷� Example
 *
 * Ӧ�ó������Լ����û����û�ע�ᡢ����� Example ����
 * ʹ�õ��Ľӿں�����
 * uc_get_user()	���룬��ȡ�û�����Ϣ
 * uc_user_register()	���룬ע���û�����
 * uc_authcode()	��ѡ�������û����ĵĺ����ӽ��ܼ����ִ��� Cookie
 */

function synReg($data) {
    //��UCenterע���û���Ϣ
    $uid = uc_user_register($data['username'], $data['password'], $data['email']);
    if($uid <= 0) {
        return $uid;
    } else {
        $username = $_POST['username'];
        setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
        return 1;
    }
}

function getSynErrorInfo ($uid) {
    if($uid == -1) {
        $msg = '��̳ͬ��ע��ʧ��:�û������Ϸ�';
    } elseif($uid == -2) {
        $msg = '��̳ͬ��ע��ʧ��:����Ҫ����ע��Ĵ���';
    } elseif($uid == -3) {
        $msg = '��̳ͬ��ע��ʧ��:�û����Ѿ�����';
    } elseif($uid == -4) {
        $msg = '��̳ͬ��ע��ʧ��:Email ��ʽ����';
    } elseif($uid == -5) {
        $msg = '��̳ͬ��ע��ʧ��:Email ������ע��';
    } elseif($uid == -6) {
        $msg = '��̳ͬ��ע��ʧ��:�� Email �Ѿ���ע��';
    } elseif($uid == -100) {
        $msg = '��̳ͬ��ע��ʧ��:��̳ע������ͬ��ʧ��';
    } else {
        $msg =  '��̳ͬ��ע��ʧ��:δ����Ĵ���';
    }

    return $msg;
}

?>