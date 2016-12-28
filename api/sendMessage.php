<?php
/**
 * Created by JetBrains PhpStorm.
 * @Author      Wuu!
 * @Date        13-7-17上午10:15
 * @Intro       
 * @Email       easy_borrow@163.com
 */
const HOME_ACCESS = TRUE;
include_once $_SERVER['DOCUMENT_ROOT'].'/include/init.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/api/ymphone.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/plugins/mail/mail.php';

class sendMessage {

	public $type;                // 当前所申请发送认证码或邮件用途
    public $isMulti;             // 是否可能向多个用户发送
    public $isVerify;            // 当前发送的信息是否属于验证码类
    public $sendType;            // 用户当前设置的发送方式
	public $lifeTime;            // 验证码存活期 单位分钟
	public $allowFlashTime;      // 允许重新发送验证码的间隔时间 单位分钟
	public $updateTimeFieldName; // 数据库中 该类型的update_time字段名 使用$this->type组合 如 cookie_pwd_update_time
	public $lifeTimeFieldName;   // 类上
	public $typeName;            // 对外显示的名称当前请求验证类型名称
	public $approveType;         // 需要用以判断的相关认证状态在users表中的字段名
    public $receiveUser;
    public $mailTeam   = array(); // 邮件接收队列
    public $mobileTeam = array(); // 短信接收队列
    public $errorInfo  = '';      // 错误信息
    public $mobileObject;
    public $mailerObject;

    /**
     * @param $is_multi               int 是否有可能向多个用户发送
     * @param $receive_user           string 接收信息的用户id 如果多个用户,使用逗号隔开
     * @param $item_name              string 当前请求的项目名称 如:withdraw_verify,recharge_success_remind之类
     * @param int $life_time          int 如果当前请求是验证码类型的,指定该验证码存活时间 单位:分钟
     * @param int $allow_flash_time   int 如果当前请求是验证码类型的,则指定两次请求发送验证码的间隔时间
     */
    public function __construct($is_multi, $receive_user, $item_name, $life_time = 10, $allow_flash_time = 1) {
        global $db;
        $this->type    = $item_name;
        $this->isMulti = $is_multi;
        $arr = explode('_', $item_name);
        $num = count($arr);
        if ($arr[$num - 1] == 'verify') {
            $this->isVerify            = 1;
            $this->lifeTime            = $life_time;
            $this->allowFlashTime      = $allow_flash_time;
            $this->updateTimeFieldName = $this->type.'_update_time';
            $this->lifeTimeFieldName   = $this->type.'_life_time';
            $this->receiveUser         = $receive_user;
        } else {
            $this->receiveUser = $receive_user;
            $this->isVerify    = 0;
        }

        // 获取当前请求信息名称;
        $sql = "SELECT * FROM `previous_mobile_item_name`";
        $result = $db->fetchOneByNormal($sql);
        if (isset($result[$this->type])) {
            $this->typeName = $result[$this->type];
        }
	}

    public function getReceiveTeam() {
        global $db;
        // 获取用户所有与验证/提醒相关的必要信息
        $sql = "SELECT mobile.*,chk.*,usr.`username`,usr.`email_status`,usr.`email`,usr.`phone_status`,usr.`phone`
                FROM `previous_mobile_setting` AS mobile
                LEFT JOIN `previous_user` AS usr
                ON mobile.`user_id` = usr.`user_id`
                LEFT JOIN `previous_mobile_check` AS chk
                ON mobile.`user_id` = chk.`user_id`
                ";

        if ($this->isMulti == 1) {
            $sql .= " WHERE usr.`user_id` IN ({$this->receiveUser}) ";
        } else {
            $sql .= " WHERE usr.`user_id`={$this->receiveUser} ";
        }
        $result = $db->fetchAllByNormal($sql);

        foreach ($result as $value) {
            // 检查该用户当前请求项是否开启

            if ( isset($value[$this->type]) ) {
                if ($value['is_on'] !=1 || $value[$this->type] != 1) {
                    $this->errorInfo = '未开启'.$this->typeName.'验证';
                    break;
                }
            } else {
                if ($this->type !== 'phone_approve_verify' && $this->type !== 'change_send_type_verify' && $this->type !== 'item_switch_verify') { // 如果不再必须验证的选项中
                    $this->errorInfo = '非法请求!';
                    break;
                } else {
                    if ($this->type === 'phone_approve_verify' && $value['phone_status'] == 1) {
                        $this->errorInfo = '抱歉!您的电话号码已经通过认证!请不要重复操作!';
                        break;
                    }
                }
            }

            $send_type = $value['send_type'];
            // 检查用户修改接收方式时间
            if ($value['change_send_type_status'] == 1) { // 0:尚未收到用户紧急修改状态 1:用户紧急修改状态
                $this->errorInfo = '抱歉!本次更换[验证码/提醒]接收方式的请求被用户紧急处理中断,请联系客服为您处理该次异常,提醒您注意账户安全,及时修改网站登录密码,邮箱密码,并对您的电脑进行病毒查杀!';
                break;
            } else {
                if (
                    time()
                    <
                    ($value['change_send_type_time'] + 30 * 60)
                )
                {

                    // 取反用户接收方法
                    if ($value['send_type'] == 1) {
                        $send_type = 0;
                    } else {
                        $send_type = 1;
                    }
                }
            }

            // 获取用户当前接收方式
            if ($send_type == 1) {
                if ($value['phone_status'] == 1) {
                    $this->mobileTeam[] = $value['phone'];
                } else {
                    if ($this->isVerify) {
                        if ($this->type !== 'phone_approve_verify') {
                            $this->errorInfo = '抱歉!您的手机还未通过认证';
                        } else {
                            $this->mobileTeam[] = $value['phone'];
                        }
                    }
                }

            } elseif ($send_type == 0) {
                if ($value['email_status'] == 1) {
                    $this->mailTeam[] = $value['email'];
                } else {
                    if ($this->isVerify) {
                        $this->errorInfo = '抱歉!您的邮箱还未通过认证';
                    }
                }
            }
        }
    }

    /**
     * @param $type     string 需要检查的验证项目在数据库中的列名
     * @param $user_id  int    需要检查的用户ID
     * @return bool     true:已经开启 false:未开启
     */
    public static function checkVerifyTypeStatus($type,$user_id) {
        global $db;
        $sql = "SELECT * FROM `previous_mobile_check` WHERE `user_id`={$user_id}";
        $result = $db->fetchOneByNormal($sql);
        if (!empty($result) && $result['is_on'] == 1 && isset($result[$type]) && $result[$type] == 1 ) {
            return true;
        } else {
            return false;
        }
    }

    public function changeSendType($user_id, $new_send_type) {
        global $db;
        // 获取当前用户设置信息
        $sql = "SELECT * FROM `previous_mobile_setting` WHERE `user_id`={$user_id}";
        $result = $db->fetchOneByNormal($sql);
        $currentSendType = $result['send_type'];

        if ($new_send_type == $currentSendType) {
            return '抱歉,本次设置与旧设置相比没有变更,请勿提交无意义的操作';
        }

        // 检查是否距离上次请求超过30分钟,防止用户反复请求,同样能达到更换接收方式的目的
        if ( ($result['change_send_type_time'] + 30 * 60) > time() ) {
            return '抱歉,两次更换接收方式的请求时间必须大于30分钟!';
        }

        // 检查用户当前接收方式对应的认证是否已经完成
        $sql = "SELECT * FROM `previous_user` WHERE `user_id`={$user_id}";
        $result = $db->fetchOneByNormal($sql);
        if ($result['phone_status'] != 1 || $result['email_status'] != 1) {
            return '抱歉,请先完成手机认证和邮箱认证两项必须前置条件后再执行次操作';
        }

        $code = mt_rand(10000000,99999999);

        $_time = time();
        $time = date('Y-m-d H:i:s', $_time);
        // 向用户同时发送短信和邮件通知
        $mobileObj = new phone2();
        $sendInfo = array();
        $sendInfo['mobile'] = array($result['phone']);
        $sendInfo['msg'] = '您的账户:'.$result['username'].'于'.$time.'进行了[验证码/提醒]接收方式变更操作,如果这不是您申请的,请在30分钟内访问地址:[www.bljinrong.com/safe.php]随提示使用校检码:'.$code.'取消本次变更，[汇纳财富]';
        $mobileObj->login();
        $res = $mobileObj->sendSMS($sendInfo);
        if ($res != 0) {
            return '抱歉!向用户手机发送通知失败,错误返回代码:'.$res;
        }
        $mailObj = new Mail();
        $res = $mailObj->Send('[汇纳财富]紧急通知,[验证码/提醒]接收方式变更通知', '您的账户:'.$result['username'].'于'.$time.'进行了[验证码/提醒]接收方式变更操作,如果这不是您申请的,请在30分钟内访问地址:<a href="www.bljinrong.com/safe.php">www.bljinrong.com/safe.php</a>,随提示使用校检码:'.$code.'取消本次变更!', array($result['email']));
        if (!$res) {
            return '抱歉!向用户发送通知邮件失败!';
        }
        // 更新设置
        $sql = "UPDATE `previous_mobile_setting` SET `send_type`={$new_send_type}, `change_send_type_in_process`=1,`code`={$code},`change_send_type_time`={$_time} WHERE `user_id`={$user_id}";
        $db->executeDMLByNormal($sql);
        return '';
    }

    /**
     * 向队列发送短信与邮件
     * @param string $content
     * @return string
     */
    public function send($content = '') {

        $verifyCode  = mt_rand(1000000,9999999);
        $time        = time();
        $_time       = date('Y-m-d--H:i:s', $time);

        // 发送短信
        if ( !empty($this->mobileTeam) && count($this->mobileTeam) >= 1 ) {
            $sendInfo = array();
            $sendInfo['mobile'] = $this->mobileTeam;
            $this->mobileObject = new phone2();
            if ($this->isVerify == 1) {
                if (!$this->flashTimeCheck($this->receiveUser)) {
                    return '距离上次发件请求间隔少于'.$this->allowFlashTime.'分钟,请稍后尝试!';
                }
                $updateResult = $this->updateMobileSetting($verifyCode, $this->receiveUser, $time);

                // 准备发送信息
                $sendInfo['msg'] = '你的手机验证码为：'.$verifyCode.'【汇纳财富】';
                //$sendInfo['msg'] = $verifyCode;

                if ($updateResult) {
                    if (count($this->mobileTeam) == 1) {
                        //P($this->mobileObject->bal());
                        $this->mobileObject->login();
                        $res = $this->mobileObject->sendSMS($sendInfo);
                    } else {
                        return '抱歉!无法获取接收本次验证信息的手机号码或邮箱!';
                    }
                } else {
                    return '抱歉!更新您的验证相关信息失败,请与系统管理员联系';
                }

                if ($res)
                    return '恭喜!本次验证码成功发送到您的认证手机,请注意接收!';
                else
                    return '抱歉!本次验证码发送失败,错误返回代码:'.$res;
            } else {
                $sendInfo['msg'] = '你的手机验证码为：'.$verifyCode.'【汇纳财富】';
                //P($sendInfo);
                $this->mobileObject->login();
                //P($this->mobileObject->bal());
                $this->mobileObject->sendSMS($sendInfo);
            }
        }

        // 发送邮件
        if ( !empty($this->mailTeam) && count($this->mailTeam) >= 1 ) {
            $this->mailerObject = new Mail();
            if ($this->isVerify == 1) {
                if (!$this->flashTimeCheck($this->receiveUser)) {
                    return '距离上次发件请求间隔少于'.$this->allowFlashTime.'分钟,请稍后尝试!';
                }
                $updateResult    = $this->updateMobileSetting($verifyCode, $this->receiveUser, time());

                // 准备发送信息
                $title   = '[汇纳财富]'.$this->typeName;
                $content = '您于'.$_time.'所申请的'.$this->typeName.'为:'.$verifyCode;

                if ($updateResult) {
                    if ( count($this->mailTeam) == 1 )
                        $res = $this->mailerObject->Send($title, $content, $this->mailTeam);
                    else
                        return '抱歉!无法获取接收本次验证信息的手机号码或邮箱!';
                } else {
                    return '抱歉!更新您的验证相关信息失败,请与系统管理员联系';
                }

                if ($res)
                    return '恭喜!本次验证码成功发送到您的认证邮箱,请注意接收!';
                else
                    return '抱歉!向认证邮箱发送验证码失败';

            } else {
                $title = '[汇纳财富]'.$this->typeName;
                if ( count($this->mailTeam) == 1 ) {
                    $this->mailerObject->Send($title, $content, $this->mailTeam);
                } elseif ( count($this->mailTeam) > 1 ) {
                    $this->mailerObject->sendBcc($title,$content,$this->mailTeam);
                }
            }
        }
    }

	/**
	 * @param $inputValue
	 * @param $userId
	 * @return int
	 */
	public function verifyCodeCheck($inputValue, $userId) {
		if ($this->verifyLifeTime($userId)) {
			$typeInfo = $this->currentVerifyInfo($userId);
			if (md5(trim($inputValue, ' ')) == $typeInfo[$this->type.'_code']) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return -1;
		}
	}

	/**
	 * @param $get
	 *
	 * @return bool
	 */
    //TODO::用于处理修改接收方式的紧急处理请求
	public function verifyMailLink($data) {
		global $db;
		$data['id']       = !empty($data['id'])       ? intval($data['id'])   : 0;
		$data['time']     = intval($data['time']) > 0 ? intval($data['time']) : 'not set';
		$data['randCode'] = !empty($data['randCode']) ? $data['randCode']      : 'not set';

		if ($this->verifyLifeTime($data['id'])) {
			$sql = "SELECT `{$this->type}` FROM `previous_temp_verify` WHERE `user_id`={$data['id']} AND `{$this->updateTimeFieldName}`={$data['time']}";
			$result = $db->fetchOneByNormal($sql);
			if ($result && $result[$this->type] == md5($data['randCode'])) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return -1;
		}
	}

	public function verifyResultName($code) {
		switch($code) {
			case 0:	$str = '您的'.$this->typeName.'有误!';break;
			case 1:	$str = $this->typeName.'正确!';break;
			case -1:$str = $this->typeName.'已过期或者没有请求发送,请重新请求发送';break;
			default:$str = $this->typeName.'校检发生未知错误,请与系统管理员联系!';
		}
		return $str;
	}

	/**
	 * 验证当前生成的验证码是否已过期
     * @param $userId 用户id
	 * @return bool true 未过期, false 已过期
	 */
	public function verifyLifeTime($userId) {
		$typeInfo = $this->currentVerifyInfo($userId);

		$time     = time();
		if (isset($typeInfo[$this->lifeTimeFieldName]) && $time < $typeInfo[$this->lifeTimeFieldName])
			return true;
		else
			return false;
	}


    /**
     * 验证两次验证码请求间隔时间是否合法
     * @param $userId int 用户id
     * @return bool true:允许刷新,false:不允许刷新
     */
    public function flashTimeCheck($userId) {
		$typeInfo   = $this->currentVerifyInfo($userId);
		$time       = time();
		$allow_time = $typeInfo[$this->updateTimeFieldName] + $this->allowFlashTime * 60;
		if ($time > $allow_time)
			return true;
		else
			return false;
	}

	/**
	 * 更新用户在临时验证表中的相关数据
	 * @param $randCode
	 * @param $userId
	 * @param $update_time
	 *
	 * @return int
	 */
	public function updateMobileSetting($randCode,$userId, $update_time) {
		global $db;
		$user_id     = intval($userId);
		$life_time   = $this->lifeTime * 60 + $update_time;
		$randCode    = md5($randCode);
		$sql = "update `previous_mobile_setting` set `{$this->type}_code`='{$randCode}',`{$this->lifeTimeFieldName}`={$life_time},`{$this->updateTimeFieldName}`={$update_time} where `user_id`={$user_id}";
		$num = $db->executeDMLByNormal($sql);
		return $num;
	}

	public function currentVerifyInfo($userId) {
		global $db;
		$user_id = intval($userId);
		$sql = "SELECT `{$this->type}_code`,`{$this->lifeTimeFieldName}`,`{$this->updateTimeFieldName}` FROM `previous_mobile_setting` WHERE `user_id`={$user_id}";
		$result = $db->fetchOneByNormal($sql);
		return $result;
	}

    public function updateSetting($user_id) {
        global $db;
        $_sql = $this->getMobileCustomFiled();
        $sql  = "UPDATE `previous_mobile_check` SET {$_sql} WHERE `user_id`={$user_id}";
        $result = $db->executeDMLByNormal($sql);
        return $result;
    }

    /*
     * 对比mobile表字段与post数据索引相同的交集 剔除id 与 user_id后 生成需要更新的sql语句
     * return string 例: `is_on`=1,`cash=0`...
     */
    public function getMobileCustomFiled() {
        global $db;
        $sql = "SHOW COLUMNS FROM `previous_mobile_check`";
        $result = $db->fetchAllByNormal($sql);
        $_result = array();
        foreach ($result as $value) {
            $_result[] = $value['Field'];
        }

        $_sql = '';
        foreach ($_result as $value) {
            if (isset($_POST[$value]) && $_POST[$value] == 1) {
                if ($value != 'id' && $value != 'user_id') {
                    $_sql .= "`$value`=1,";
                }
            } else {
                if ($value != 'id' && $value != 'user_id') {
                    $_sql .= "`$value`=0,";
                }
            }
        }
        return rtrim($_sql,',');
    }

    /**
     * 获取用户mobile_check信息
     * @param $user_id
     *
     * @return mixed 结果集
     */
    public static function getSetting($user_id) {
        global $db;
        $user_id = intval($user_id);
        $sql     = "SELECT st.`send_type`,usr.`email_status`,usr.`email`,usr.`phone_status`,usr.`phone`,usr.`real_status`,chk.*
                    FROM `previous_mobile_check` AS chk
                    LEFT JOIN `previous_mobile_setting` AS st
                    ON chk.`user_id` = st.`user_id`
                    LEFT JOIN `previous_user` AS usr
                    ON chk.`user_id` = usr.`user_id`
                    WHERE chk.`user_id`={$user_id}";
        $result  = $db->fetchOneByNormal($sql);

        // 获取项目名称信息
        $sql  = "SELECT * FROM `previous_mobile_item_name`";
        $name = $db->fetchOneByNormal($sql);
        $i = 0;
        $newArray = array();
        foreach ($result as $key=>$value) {
            if ($i < 8) {
                $newArray['user_info'][$key] = $value;
            } else {
                $newArray['setting_info'][$key]['value']   = $value;
                $newArray['setting_info'][$key]['name'] = $name[$key];
            }
            $i++;
        }
        return $newArray;
    }

    public static function getTenderUserId($borrow_id) {
        global $db;
        $sql = "SELECT * FROM `previous_borrow_tender` WHERE `borrow_id`={$borrow_id}";
        $result = $db->fetchAllByNormal($sql);
        if (count($result) < 1) {
            return 0;
        }

        // 遍历获取用户id
        $user_id_list = '';
        foreach ($result as $value) {
            $user_id_list .= ','.$value['user_id'];
        }

        return ltrim($user_id_list, ',');
    }
}