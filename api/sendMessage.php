<?php
/**
 * Created by JetBrains PhpStorm.
 * @Author      Wuu!
 * @Date        13-7-17����10:15
 * @Intro       
 * @Email       easy_borrow@163.com
 */
const HOME_ACCESS = TRUE;
include_once $_SERVER['DOCUMENT_ROOT'].'/include/init.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/api/ymphone.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/plugins/mail/mail.php';

class sendMessage {

	public $type;                // ��ǰ�����뷢����֤����ʼ���;
    public $isMulti;             // �Ƿ���������û�����
    public $isVerify;            // ��ǰ���͵���Ϣ�Ƿ�������֤����
    public $sendType;            // �û���ǰ���õķ��ͷ�ʽ
	public $lifeTime;            // ��֤������ ��λ����
	public $allowFlashTime;      // �������·�����֤��ļ��ʱ�� ��λ����
	public $updateTimeFieldName; // ���ݿ��� �����͵�update_time�ֶ��� ʹ��$this->type��� �� cookie_pwd_update_time
	public $lifeTimeFieldName;   // ����
	public $typeName;            // ������ʾ�����Ƶ�ǰ������֤��������
	public $approveType;         // ��Ҫ�����жϵ������֤״̬��users���е��ֶ���
    public $receiveUser;
    public $mailTeam   = array(); // �ʼ����ն���
    public $mobileTeam = array(); // ���Ž��ն���
    public $errorInfo  = '';      // ������Ϣ
    public $mobileObject;
    public $mailerObject;

    /**
     * @param $is_multi               int �Ƿ��п��������û�����
     * @param $receive_user           string ������Ϣ���û�id �������û�,ʹ�ö��Ÿ���
     * @param $item_name              string ��ǰ�������Ŀ���� ��:withdraw_verify,recharge_success_remind֮��
     * @param int $life_time          int �����ǰ��������֤�����͵�,ָ������֤����ʱ�� ��λ:����
     * @param int $allow_flash_time   int �����ǰ��������֤�����͵�,��ָ��������������֤��ļ��ʱ��
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

        // ��ȡ��ǰ������Ϣ����;
        $sql = "SELECT * FROM `previous_mobile_item_name`";
        $result = $db->fetchOneByNormal($sql);
        if (isset($result[$this->type])) {
            $this->typeName = $result[$this->type];
        }
	}

    public function getReceiveTeam() {
        global $db;
        // ��ȡ�û���������֤/������صı�Ҫ��Ϣ
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
            // �����û���ǰ�������Ƿ���

            if ( isset($value[$this->type]) ) {
                if ($value['is_on'] !=1 || $value[$this->type] != 1) {
                    $this->errorInfo = 'δ����'.$this->typeName.'��֤';
                    break;
                }
            } else {
                if ($this->type !== 'phone_approve_verify' && $this->type !== 'change_send_type_verify' && $this->type !== 'item_switch_verify') { // ������ٱ�����֤��ѡ����
                    $this->errorInfo = '�Ƿ�����!';
                    break;
                } else {
                    if ($this->type === 'phone_approve_verify' && $value['phone_status'] == 1) {
                        $this->errorInfo = '��Ǹ!���ĵ绰�����Ѿ�ͨ����֤!�벻Ҫ�ظ�����!';
                        break;
                    }
                }
            }

            $send_type = $value['send_type'];
            // ����û��޸Ľ��շ�ʽʱ��
            if ($value['change_send_type_status'] == 1) { // 0:��δ�յ��û������޸�״̬ 1:�û������޸�״̬
                $this->errorInfo = '��Ǹ!���θ���[��֤��/����]���շ�ʽ�������û����������ж�,����ϵ�ͷ�Ϊ������ô��쳣,������ע���˻���ȫ,��ʱ�޸���վ��¼����,��������,�������ĵ��Խ��в�����ɱ!';
                break;
            } else {
                if (
                    time()
                    <
                    ($value['change_send_type_time'] + 30 * 60)
                )
                {

                    // ȡ���û����շ���
                    if ($value['send_type'] == 1) {
                        $send_type = 0;
                    } else {
                        $send_type = 1;
                    }
                }
            }

            // ��ȡ�û���ǰ���շ�ʽ
            if ($send_type == 1) {
                if ($value['phone_status'] == 1) {
                    $this->mobileTeam[] = $value['phone'];
                } else {
                    if ($this->isVerify) {
                        if ($this->type !== 'phone_approve_verify') {
                            $this->errorInfo = '��Ǹ!�����ֻ���δͨ����֤';
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
                        $this->errorInfo = '��Ǹ!�������仹δͨ����֤';
                    }
                }
            }
        }
    }

    /**
     * @param $type     string ��Ҫ������֤��Ŀ�����ݿ��е�����
     * @param $user_id  int    ��Ҫ�����û�ID
     * @return bool     true:�Ѿ����� false:δ����
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
        // ��ȡ��ǰ�û�������Ϣ
        $sql = "SELECT * FROM `previous_mobile_setting` WHERE `user_id`={$user_id}";
        $result = $db->fetchOneByNormal($sql);
        $currentSendType = $result['send_type'];

        if ($new_send_type == $currentSendType) {
            return '��Ǹ,������������������û�б��,�����ύ������Ĳ���';
        }

        // ����Ƿ�����ϴ����󳬹�30����,��ֹ�û���������,ͬ���ܴﵽ�������շ�ʽ��Ŀ��
        if ( ($result['change_send_type_time'] + 30 * 60) > time() ) {
            return '��Ǹ,���θ������շ�ʽ������ʱ��������30����!';
        }

        // ����û���ǰ���շ�ʽ��Ӧ����֤�Ƿ��Ѿ����
        $sql = "SELECT * FROM `previous_user` WHERE `user_id`={$user_id}";
        $result = $db->fetchOneByNormal($sql);
        if ($result['phone_status'] != 1 || $result['email_status'] != 1) {
            return '��Ǹ,��������ֻ���֤��������֤�������ǰ����������ִ�дβ���';
        }

        $code = mt_rand(10000000,99999999);

        $_time = time();
        $time = date('Y-m-d H:i:s', $_time);
        // ���û�ͬʱ���Ͷ��ź��ʼ�֪ͨ
        $mobileObj = new phone2();
        $sendInfo = array();
        $sendInfo['mobile'] = array($result['phone']);
        $sendInfo['msg'] = '�����˻�:'.$result['username'].'��'.$time.'������[��֤��/����]���շ�ʽ�������,����ⲻ���������,����30�����ڷ��ʵ�ַ:[www.bljinrong.com/safe.php]����ʾʹ��У����:'.$code.'ȡ�����α����[���ɲƸ�]';
        $mobileObj->login();
        $res = $mobileObj->sendSMS($sendInfo);
        if ($res != 0) {
            return '��Ǹ!���û��ֻ�����֪ͨʧ��,���󷵻ش���:'.$res;
        }
        $mailObj = new Mail();
        $res = $mailObj->Send('[���ɲƸ�]����֪ͨ,[��֤��/����]���շ�ʽ���֪ͨ', '�����˻�:'.$result['username'].'��'.$time.'������[��֤��/����]���շ�ʽ�������,����ⲻ���������,����30�����ڷ��ʵ�ַ:<a href="www.bljinrong.com/safe.php">www.bljinrong.com/safe.php</a>,����ʾʹ��У����:'.$code.'ȡ�����α��!', array($result['email']));
        if (!$res) {
            return '��Ǹ!���û�����֪ͨ�ʼ�ʧ��!';
        }
        // ��������
        $sql = "UPDATE `previous_mobile_setting` SET `send_type`={$new_send_type}, `change_send_type_in_process`=1,`code`={$code},`change_send_type_time`={$_time} WHERE `user_id`={$user_id}";
        $db->executeDMLByNormal($sql);
        return '';
    }

    /**
     * ����з��Ͷ������ʼ�
     * @param string $content
     * @return string
     */
    public function send($content = '') {

        $verifyCode  = mt_rand(1000000,9999999);
        $time        = time();
        $_time       = date('Y-m-d--H:i:s', $time);

        // ���Ͷ���
        if ( !empty($this->mobileTeam) && count($this->mobileTeam) >= 1 ) {
            $sendInfo = array();
            $sendInfo['mobile'] = $this->mobileTeam;
            $this->mobileObject = new phone2();
            if ($this->isVerify == 1) {
                if (!$this->flashTimeCheck($this->receiveUser)) {
                    return '�����ϴη�������������'.$this->allowFlashTime.'����,���Ժ���!';
                }
                $updateResult = $this->updateMobileSetting($verifyCode, $this->receiveUser, $time);

                // ׼��������Ϣ
                $sendInfo['msg'] = '����ֻ���֤��Ϊ��'.$verifyCode.'�����ɲƸ���';
                //$sendInfo['msg'] = $verifyCode;

                if ($updateResult) {
                    if (count($this->mobileTeam) == 1) {
                        //P($this->mobileObject->bal());
                        $this->mobileObject->login();
                        $res = $this->mobileObject->sendSMS($sendInfo);
                    } else {
                        return '��Ǹ!�޷���ȡ���ձ�����֤��Ϣ���ֻ����������!';
                    }
                } else {
                    return '��Ǹ!����������֤�����Ϣʧ��,����ϵͳ����Ա��ϵ';
                }

                if ($res)
                    return '��ϲ!������֤��ɹ����͵�������֤�ֻ�,��ע�����!';
                else
                    return '��Ǹ!������֤�뷢��ʧ��,���󷵻ش���:'.$res;
            } else {
                $sendInfo['msg'] = '����ֻ���֤��Ϊ��'.$verifyCode.'�����ɲƸ���';
                //P($sendInfo);
                $this->mobileObject->login();
                //P($this->mobileObject->bal());
                $this->mobileObject->sendSMS($sendInfo);
            }
        }

        // �����ʼ�
        if ( !empty($this->mailTeam) && count($this->mailTeam) >= 1 ) {
            $this->mailerObject = new Mail();
            if ($this->isVerify == 1) {
                if (!$this->flashTimeCheck($this->receiveUser)) {
                    return '�����ϴη�������������'.$this->allowFlashTime.'����,���Ժ���!';
                }
                $updateResult    = $this->updateMobileSetting($verifyCode, $this->receiveUser, time());

                // ׼��������Ϣ
                $title   = '[���ɲƸ�]'.$this->typeName;
                $content = '����'.$_time.'�������'.$this->typeName.'Ϊ:'.$verifyCode;

                if ($updateResult) {
                    if ( count($this->mailTeam) == 1 )
                        $res = $this->mailerObject->Send($title, $content, $this->mailTeam);
                    else
                        return '��Ǹ!�޷���ȡ���ձ�����֤��Ϣ���ֻ����������!';
                } else {
                    return '��Ǹ!����������֤�����Ϣʧ��,����ϵͳ����Ա��ϵ';
                }

                if ($res)
                    return '��ϲ!������֤��ɹ����͵�������֤����,��ע�����!';
                else
                    return '��Ǹ!����֤���䷢����֤��ʧ��';

            } else {
                $title = '[���ɲƸ�]'.$this->typeName;
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
    //TODO::���ڴ����޸Ľ��շ�ʽ�Ľ�����������
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
			case 0:	$str = '����'.$this->typeName.'����!';break;
			case 1:	$str = $this->typeName.'��ȷ!';break;
			case -1:$str = $this->typeName.'�ѹ��ڻ���û��������,������������';break;
			default:$str = $this->typeName.'У�췢��δ֪����,����ϵͳ����Ա��ϵ!';
		}
		return $str;
	}

	/**
	 * ��֤��ǰ���ɵ���֤���Ƿ��ѹ���
     * @param $userId �û�id
	 * @return bool true δ����, false �ѹ���
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
     * ��֤������֤��������ʱ���Ƿ�Ϸ�
     * @param $userId int �û�id
     * @return bool true:����ˢ��,false:������ˢ��
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
	 * �����û�����ʱ��֤���е��������
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
     * �Ա�mobile���ֶ���post����������ͬ�Ľ��� �޳�id �� user_id�� ������Ҫ���µ�sql���
     * return string ��: `is_on`=1,`cash=0`...
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
     * ��ȡ�û�mobile_check��Ϣ
     * @param $user_id
     *
     * @return mixed �����
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

        // ��ȡ��Ŀ������Ϣ
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

        // ������ȡ�û�id
        $user_id_list = '';
        foreach ($result as $value) {
            $user_id_list .= ','.$value['user_id'];
        }

        return ltrim($user_id_list, ',');
    }
}