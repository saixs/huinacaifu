<?php
/**
 * UCenter 应用程序开发 Example
 *
 * 应用程序有自己的用户表，用户登录的 Example 代码
 * 使用到的接口函数：
 * uc_user_login()	必须，判断登录用户的有效性
 * uc_authcode()	可选，借用用户中心的函数加解密激活字串和 Cookie
 * uc_user_synlogin()	可选，生成同步登录的代码
 */

function synLogin($data) {
    //通过接口判断登录帐号的正确性，返回值为数组
    list($uid, $username, $password, $email) = uc_user_login($data['username'], $data['password']);
    if($uid > 0) {
        //生成同步登录的代码
        $ucsynlogin = uc_user_synlogin($uid);
    }
}

?>