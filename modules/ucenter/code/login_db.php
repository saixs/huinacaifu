<?php
/**
 * UCenter Ӧ�ó��򿪷� Example
 *
 * Ӧ�ó������Լ����û����û���¼�� Example ����
 * ʹ�õ��Ľӿں�����
 * uc_user_login()	���룬�жϵ�¼�û�����Ч��
 * uc_authcode()	��ѡ�������û����ĵĺ����ӽ��ܼ����ִ��� Cookie
 * uc_user_synlogin()	��ѡ������ͬ����¼�Ĵ���
 */

function synLogin($data) {
    //ͨ���ӿ��жϵ�¼�ʺŵ���ȷ�ԣ�����ֵΪ����
    list($uid, $username, $password, $email) = uc_user_login($data['username'], $data['password']);
    if($uid > 0) {
        //����ͬ����¼�Ĵ���
        $ucsynlogin = uc_user_synlogin($uid);
    }
}

?>