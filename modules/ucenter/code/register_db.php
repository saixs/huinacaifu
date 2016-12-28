<?php
/**
 * UCenter 应用程序开发 Example
 *
 * 应用程序有自己的用户表，用户注册、激活的 Example 代码
 * 使用到的接口函数：
 * uc_get_user()	必须，获取用户的信息
 * uc_user_register()	必须，注册用户数据
 * uc_authcode()	可选，借用用户中心的函数加解密激活字串和 Cookie
 */

function synReg($data) {
    //在UCenter注册用户信息
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
        $msg = '论坛同步注册失败:用户名不合法';
    } elseif($uid == -2) {
        $msg = '论坛同步注册失败:包含要允许注册的词语';
    } elseif($uid == -3) {
        $msg = '论坛同步注册失败:用户名已经存在';
    } elseif($uid == -4) {
        $msg = '论坛同步注册失败:Email 格式有误';
    } elseif($uid == -5) {
        $msg = '论坛同步注册失败:Email 不允许注册';
    } elseif($uid == -6) {
        $msg = '论坛同步注册失败:该 Email 已经被注册';
    } elseif($uid == -100) {
        $msg = '论坛同步注册失败:论坛注册数据同步失败';
    } else {
        $msg =  '论坛同步注册失败:未定义的错误';
    }

    return $msg;
}

?>