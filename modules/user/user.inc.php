<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

$valicode = isset($_POST['valicode'])?$_POST['valicode']:"";
$url = $_U['query_url']."/{$_U['query_type']}";
if (isset($_G['query_string'][2])){
	$url .= "&".$_G['query_string'][2];
}
if  ($_U['query_type'] == "vip") $url = "";
if (isset($_POST['valicode']) && strtolower($valicode)!=$_SESSION['valicode']){
		
		$msg = array("验证码错误","",$url);
}else{
	$_SESSION['valicode'] = "";
	//密码保护功能
	if ($_U['query_type'] == "protection"){
		if ((isset($_POST['type']) && $_POST['type'] == 1)){
			if (  $_G['user_result']['answer']=="" || $_POST['answer'] == $_G['user_result']['answer']){
				$_U['answer_type'] = 2;
			}else{
				$msg = array("问题答案不正确","",$url);
			}
		}elseif (isset($_POST['type']) && $_POST['type'] == 2){
			$var = array("question","answer");
			$data = post_var($var);
			if ($data['answer']==""){
				$msg = array("问题答案不能为空","",$url);	
			}else{
				$data['user_id'] = $_G['user_id'];
				$result = $user->UpdateUserProtection($data);
				if ($result == false){
					$msg = array($result);	
				}else{
					$msg = array("密码保护修改成功","",$url);	
				}
			}
		}
	}
	
	
	//交易密码设置
	elseif ($_U['query_type'] == "paypwd"){
		if (isset($_POST['oldpassword'])){
			if ($_G['user_result']['paypassword'] == "" && (md5($_POST['oldpassword']) != $_G['user_result']['password']&&md5("&*()".$_POST['oldpassword']."!@#$%^") != $_G['user_result']['password'])){
				$msg = array("密码不正确，请输入您的登录密码","",$url);	
			}elseif ($_G['user_result']['paypassword'] != "" && md5($_POST['oldpassword']) != $_G['user_result']['paypassword']){
				$msg = array("密码不正确，请输入您的旧交易密码","",$url);	
			}else{
				$data['user_id'] = $_G['user_id'];
				$data['paypassword'] = md5($_POST['newpassword']);
				$result = $user->UpdateUserAll($data);
				if ($result == false){
					$msg = array($result);	
				}else{
					$msg = array("交易密码修改成功","",$url);	
				}
			}
		}
	}
	//交易密码设置
	elseif ($_U['query_type'] == "getpaypwd"){
		if(isset($_REQUEST['id']) && $_REQUEST['id']!=""){
			if (isset($_POST['paypwd']) && $_POST['paypwd']!=""){
				if ($_POST['paypwd']==""){
					$msg = array("密码不能为空","",$url);
				}elseif ($_POST['paypwd']!=$_POST['paypwd1']){
					$msg = array("两次密码不一样","",$url);
				}else{
					$data['user_id'] = $_G['user_id'];
					$data['paypassword'] = md5($_POST['paypwd']);
					$result = $user->UpdateUser($data);
					$msg = array("交易密码修改成功","","index.php?user&q=code/user/paypwd");
				}
			}else{
				$id = urldecode($_REQUEST['id']);
				$_id = explode(",",authcode(trim($id),"DECODE"));
				$data['user_id'] = $_id[0];
				if ($_id[1]+60*60<time()){
					$msg = array("信息已过期，请重新申请。");
				}elseif ($data['user_id']!=$_G['user_id']){
					$msg = array("此信息不是你的信息，请不要乱操作");
				}
				
			}
		}elseif (isset($_POST['valicode'])){
			$data['user_id'] = $_G['user_id'];
			$data['username'] = $_G['user_result']['username'];
			$data['email'] = $_G['user_result']['email'];
			$data['webname'] = $_G['system']['con_webname'];
			$data['title'] = "交易密码取回";
			$data['key'] = "getPayPwd";
			$data['query_url'] = "code/user/getpaypwd";
			$data['msg'] = RegEmailMsg($data);
			$data['type'] = "getpaypwd";
			$result = $user->SendEmail($data);
			$msg = array("信息已发送到您的邮箱，请注意查收");
		}
	}
	
	//登录密码设置
	elseif ($_U['query_type'] == "userpwd"){
		if (isset($_POST['oldpassword'])){
			if (md5($_POST['oldpassword']) != $_G['user_result']['password']&&md5("&*()".$_POST['oldpassword']."!@#$%^") != $_G['user_result']['password']){
				$msg = array("密码不正确，请输入您的旧密码","",$url);	
			}else{
				$data['user_id'] = $_G['user_id'];
				$data['password'] = md5($_POST['newpassword']);
				$result = $user->UpdateUserAll($data);
				if ($result == false){
					$msg = array($result);	
				}else{
					$msg = array("交易密码修改成功","",$url);	
				}
			}
		}
	}
	
	
	//设置隐私
	elseif ($_U['query_type'] == "privacy"){
		if (isset($_POST['friend'])){	
			$var = array("friend","friend_comment","borrow_list","loan_log","sent_msg","friend_request","look_black","allow_black_sent","allow_black_request");
			$_result = post_var($var);
			$data['privacy'] = serialize($_result);
			$data['user_id'] = $_G['user_id'];
			$result = $user->UpdateUserAll($data);
			if ($result == false){
				$msg = array($result);	
			}else{
				$msg = array("隐私设置成功","",$url);	
			}
			
		}else{
			$result = unserialize($_G['user_result']['privacy']);
			$_U['user_privacy'] = $result;
		}
	}
		//实名认证
	elseif ($_U['query_type'] == "realname"){
		if (isset($_POST['realname'])){	
			$var = array("realname","sex","card_type","card_id","province","city","province","city","area","nation");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$data['birthday'] = get_mktime($_POST['birthday']);
			$data['real_status'] = 2;
			
			$result = userClass::CheckIdcard(array("user_id"=>$data['user_id'],"card_id"=>$data['card_id']));
			if(!isIdCard($data['card_id'])){
				$msg = array("身份证号码格式不正确","","?user&q=code/user/realname");
			}elseif($result == true){
				$msg = array("身份证号码已经存在","","?user&q=code/user/realname");	
			}else{
				$_G['upimg']['file'] = "card_pic2";
				$_G['upimg']['code'] = "user";
				
				//$pic_result = $upload->upfile($_G['upimg']);
				
				if ($_POST["card_pic"]!=""){
	
					$data['card_pic1'] =$_POST["card_pic"];;
				}
				$_G['upimg']['file'] = "card_pic1";
				
				//$pic_result = $upload->upfile($_G['upimg']);
				
				if ($_POST["card_picother"]!=""){
					$data['card_pic2'] =$_POST["card_picother"];
				}
				$result = $user->UpdateUserAll($data);
				if ($result == false){
					$msg = array($result);	
				}else{
					// 身份验证
					$client = new SoapClient ("http://service.sfxxrz.com/IdentifierService.svc?wsdl");
					$r = new stdClass();
					$r->IDNumber = $data['card_id']; //要查询的身份证号码
					$r->Name = gbk2utf8($data['realname']);                  //要查询的姓名

					$c = new stdClass();
					$c->UserName = "hnjj_admin";  // 将“user”修改为签订合同后提供的正式账号
					$c->Password = "2zJYgJqB";  //  将“pwd”修改为签订合同后提供的密码

					$result_json = $client->SimpleCheckByJson(array("request"=>json_encode($r), "cred"=>json_encode($c)))->SimpleCheckByJsonResult;
					$result = json_decode($result_json);
					if (utf82gbk($result->ResponseText) == "成功"){
						//认证结果（一致/不一致/库中无此号)
						if (utf82gbk($result->Identifier->Result) == "一致"){
							$sql = "UPDATE `dw_user` SET `real_status`=1 WHERE `user_id`={$data['user_id']}";
							$mysql->db_query($sql);
							$msg = array("身份信息验证成功,自动通过实名认证","",$url);
						}else{
							$msg = array("身份信息验证失败,请重新提交实名认证或联系客服为您手动审核","",$url);
						}
					}else{
						$msg = array("身份信息验证失败,请重新提交实名认证或联系客服为您手动审核","",$url);
					}
					//$msg = array("姓名认证添加成功，请等待管理员审核","",$url);
				}
			}
		}
	}
	
	//邮箱认证
	elseif ($_U['query_type'] == "email_status"){
		if (isset($_POST['email']) && $_POST['email']!="" ){
			$data['user_id'] = $_G['user_id'];
			$data['email'] = $_POST['email'];
			$result = $user->CheckEmail($data);
			if ($result==false){
				$result = $user->UpdateUserAll($data);
				if ($result == false){
					$msg = array($result);	
				}else{
					$data['username'] = $_G['user_result']['username'];
					$data['webname'] = $_G['system']['con_webname'];
					$data['title'] = "注册邮件确认";
					$data['msg'] = RegEmailMsg($data);
					$data['type'] = "reg";
					if (isset($_SESSION['sendemail_time']) && $_SESSION['sendemail_time']+60*2>time()){
						$msg = array("请2分钟后再次请求。","",$url);
					}else{
						$result = $user->SendEmail($data);
						if ($result==true) {
							$_SESSION['sendemail_time'] = time();
							$msg = array("激活信息已经发送到您的邮箱，请注意查收。","",$url);
						}
						else{
							$msg = array("发送失败，请跟管理员联系。","",$url);
						}
					}
				}
			}else{
				$msg = array("你重新填写的邮箱已经存在","",$url);	
			}
		}
	}
	
	//手机认证
	elseif ($_U['query_type'] == "phone_statusx"){
		if($_G['system']['con_auto_phone']==1)
		{
            if (isset($_POST['phone']) && $_POST['phone']!="" && $_POST['phone']>1 && isset($_POST['phone_valicode']) && $_POST['phone_valicode'] != ""){
                include_once $_SERVER['DOCUMENT_ROOT'].'/api/sendMessage.php';
                $sendObj = new sendMessage(0,$_SESSION['user_id'],'phone_approve_verify');
                $sendObj->getReceiveTeam();
                if ($sendObj->errorInfo === '') {
                    $status = $sendObj->verifyCodeCheck($_POST['phone_valicode'], $_SESSION['user_id']);
                    if ($status === 1) {
                        $result = $user->UpdateUser(array("user_id"=>$_SESSION['user_id'],"phone"=>$_POST['phone'],"phone_status"=>1));
                        if ($result == false){
                            $msg = array($result);
                        }else{
                            $msg = array("手机认证操作成功","","/index.php?user");
                        }
                    } else {
                        $msg=array("手机认证失败:".$sendObj->verifyResultName($status),"","/index.php?user&q=code/user/phone_status");
                    }
                } else {
                    $msg=array($sendObj->errorInfo,"","/index.php?user&q=code/user/phone_status");
                }
            }else{
                $msg=array("手机认证失败","","/index.php?user&q=code/user/phone_status");
            }
		}
        else
        {
            if (isset($_POST['phone']) && $_POST['phone']!="" && $_POST['phone']>1){

                $data['user_id'] = $_G['user_id'];
                $data['phone_status'] = $_POST['phone'];

                $result = $user->UpdateUserAll($data);
                if ($result == false){
                        $msg = array($result);
                }else{
                        $msg = array("手机认证操作成功，请等待客服人员审核","","/index.php?user&q=code/user/phone_status");
                }
            }else{
                $msg = array("手机号码不能为空","","/index.php?user&q=code/user/phone_status");
            }
                  
		}
	}
	
	//视频认证
	elseif ($_U['query_type'] == "video_status"){
		if (isset($_POST['submit']) && $_POST['submit']!="" ){
			
			$data['user_id'] = $_G['user_id'];
			$data['video_status'] = 2;
			
			$result = $user->UpdateUserAll($data);
			if ($result == false){
				$msg = array($result);	
			}else{
				$msg = array("视频操作成功，请等待客服人员与你联系","",$url);	
			}
		}
	}
	
	//交易密码设置
	elseif ($_U['query_type'] == "credit"){
		$_U['user_cache'] = userClass::GetUserCache(array("user_id"=>$_G['user_id']));//用户缓存
	}
	
	//邀请好友
	elseif ($_U['query_type'] == "reginvite"){
		$_U['user_inviteid'] =  Key2Url($_G['user_id'],"reg_invite");
	}
	
	//VIP申请
	elseif ($_U['query_type'] == "applyvip"){
		if (isset($_POST['vip_remark'])){
			$data['user_id'] = $_G['user_id'];
			$data['vip_remark'] = nl2br($_POST['vip_remark']);;
			$data['kefu_userid'] = $_POST['kefu_userid'];
		    $_data['user_id'] = $_G['user_id'];
			$result = $user->GetOnes($_data);
		if($result['real_status']==1)
			{
			userClass::ApplyUserVip($data);//用户缓存
			$msg = array("VIP申请成功，请等待管理员审核","","?vip");
			}else
			{
				$msg = array("您还没有实名认证，请先实名认证","","/index.php?user&q=code/user/realname");	
			}
		}
	}
	
	//加为好友
	elseif ($_U['query_type'] == "addfriend"){
		if (isset($_POST['type'])){
			$data['type'] = $_POST['type'];
			$data['content'] = nl2br($_POST['content']);
			$data['friends_userid'] = $_POST['friends_userid'];
			$data['user_id'] = $_G['user_id'];
			$result = userClass::AddFriends($data);
			if ($result==false){
				$msg = array($result,"","/index.php?user&q=code/user/myfriend");	
			}else{
				$msg = array("添加好友成功，请等待好友的审核","","/index.php?user&q=code/user/myfriend");	
			}
		}else{
				$result = userClass::GetOnes(array("username"=>$_REQUEST['username']));
			if ($result==false){
				$result = userClass::GetOnes(array("username"=>urldecode($_REQUEST['username'])));
				$_REQUEST['username'] = urldecode($_REQUEST['username']);
			}
			if ($result==false){
				echo "<script>alert('找不到此用户，请不要乱操作');location.href='/index.php?user'</script>";
				exit;
			}elseif ($result['user_id']==$_G['user_id']){
				echo "<script>alert('不能加自己为好友');location.href='/index.php?user';</script>";
				exit;
			}else{
				echo "<form method='post' action='/index.php?user&q=code/user/addfriend'>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;好友：{$_REQUEST['username']}<input type='hidden' name='friends_userid' value='{$result['user_id']}'></div>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;类型：<select name='type'>";
				foreach ($_G["_linkage"]['friends_type'] as $key => $value){
					echo "<option value='{$value['value']}'>{$value['name']}</option>";
				}
				echo "</select></div><div align='left'><br>&nbsp;&nbsp;&nbsp;内容：<textarea rows='5' cols='30' name='content'></textarea></div>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;<input type='submit' value='确定添加'></div>";
				echo "</form>";
				exit;
			}
		}
	}
	
	//请求的加为好友
	elseif ($_U['query_type'] == "raddfriend"){
		if (isset($_POST['type'])){
			$data['type'] = $_POST['type'];
			$data['content'] = nl2br($_POST['content']);
			$data['friends_userid'] = $_POST['friends_userid'];
			$data['user_id'] = $_G['user_id'];
			$result = userClass::RAddFriends($data);
			if ($result==false){
				$msg = array($result,"","/index.php?user&q=code/user/myfriend");	
			}else{
				$msg = array("成功添加好友成功","","/index.php?user&q=code/user/myfriend");	
			}
		}else{
			$result = userClass::GetOnes(array("username"=>$_REQUEST['username']));
			if ($result==false){
				echo "<script>alert('找不到此用户，请不要乱操作');location.href='/index.php?user'</script>";
				exit;
			}elseif ($result['user_id']==$_G['user_id']){
				echo "<script>alert('不能加自己为好友');location.href='/index.php?user';</script>";
				exit;
			}else{
				echo "<form method='post' action='/index.php?user&q=code/user/raddfriend'>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;好友：{$_REQUEST['username']}<input type='hidden' name='friends_userid' value='{$result['user_id']}'></div>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;类型：<select name='type'>";
				foreach ($_G["_linkage"]['friends_type'] as $key => $value){
					echo "<option value='{$value['value']}'>{$value['name']}</option>";
				}
				echo "</select></div><div align='left'><br>&nbsp;&nbsp;&nbsp;内容：<textarea rows='5' cols='30' name='content'></textarea></div>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;<input type='submit' value='确定添加'></div>";
				echo "</form>";
				exit;
			}
		}
	}
	
	
	//加为好友
	elseif ($_U['query_type'] == "checkaddfriend"){
		if (isset($_POST['type'])){
			$data['type'] = $_POST['type'];
			$data['content'] = nl2br($_POST['content']);
			$data['friends_userid'] = $_POST['friends_userid'];
			$data['user_id'] = $_G['user_id'];
			$result = userClass::AddFriends($data);
			if ($result==false){
				$msg = array($result,"","/index.php?user&q=code/user/myfriend");	
			}else{
				$msg = array("添加好友成功，请等待好友的审核","","/index.php?user&q=code/user/myfriend");	
			}
		}else{
			$result = userClass::GetOnes(array("username"=>$_REQUEST['username']));
			if ($result==false){
				echo "<script>alert('找不到此用户，请不要乱操作');location.href='/index.php?user'</script>";
				exit;
			}elseif ($result['user_id']==$_G['user_id']){
				echo "<script>alert('不能加自己为好友');location.href='/index.php?user';</script>";
				exit;
			}else{
				echo "<form method='post' action='/index.php?user&q=code/user/addfriend'>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;好友：{$_REQUEST['username']}<input type='hidden' name='friends_userid' value='{$result['user_id']}'></div>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;类型：<select name='type'>";
				foreach ($_G["_linkage"]['friends_type'] as $key => $value){
					echo "<option value='{$value['value']}'>{$value['name']}</option>";
				}
				echo "</select></div><div align='left'><br>&nbsp;&nbsp;&nbsp;内容：<textarea rows='5' cols='30' name='content'></textarea></div>";
				echo "<div align='left'><br>&nbsp;&nbsp;&nbsp;<input type='submit' value='确定添加'></div>";
				echo "</form>";
				exit;
			}
		}
	}
	
	//删除好友
	elseif ($_U['query_type'] == "delfriend"){
		$data['user_id'] = $_G['user_id'];
		$data['friend_username'] = $_REQUEST['username'];
		userClass::DeleteFriends($data);
		$msg = array("删除成功","",$_U['query_url']."/myfriend");
	
	}
	
	//加为黑名单
	elseif ($_U['query_type'] == "blackfriend"){
		$data['user_id'] = $_G['user_id'];
		$data['friend_username'] = $_REQUEST['username'];
		userClass::BlackFriends($data);
		$msg = array("已成功加入黑名单","",$_U['query_url']."/black");
	
	}
	//重新加为好友
	elseif ($_U['query_type'] == "readdfriend"){
		$data['user_id'] = $_G['user_id'];
		$data['friend_username'] = $_REQUEST['username'];
		userClass::ReaddFriends($data);
		$msg = array("已成功加为好友","",$_U['query_url']."/myfriend");
	
	}
	
	//申请成为兼职
	elseif ($_U['query_type'] == "jianzhi"){
		if(isset($_POST['content']) && $_POST['content']!=""){
			$data['user_id'] = $_G['user_id'];
			$data['content'] = $_POST['content'];
			$data['old_type'] = $_G['user_result']['type_id'];
			$data['new_type'] = 7;
			userClass::TypeChange($data);
			$msg = array("资料以提交，请等待管理员的审核","",$_U['query_url']."/jianzhi");
		}else{
			$_U['typechange_result'] = userClass::TypeChange($data);
		}
	}
	//每日签到
	elseif(!empty($_U['query_type']) && $_U['query_type']=='qiandao'){
		//微信登录
		if(strstr($_SERVER['REQUEST_URI'],'/wx/') || !empty($_REQUEST['wx'])){
			if(empty($_G['user_id'])){
				$msg = array("请先登录","","index.php?user&q=action/login&wx=1");
			}else{
				$data['user_id'] = $_G['user_id'];
				$result = userClass::QianDao($data);
				if(empty($result) || !is_array($result)){
					$msg = array($result,"返回用户中心","/index.php?user&q=code/account&wx=1");
				}else{
					$msg = array('今日签到获得积分'.$result['value'].'分,已连续签到'.$result['day'].'天,请保持',"返回用户中心","/index.php?user&q=code/account&wx=1");
				}
			}
		}else{
			if(empty($_G['user_id'])){
				$msg = array("请先登录","","index.php?user&q=action/login");
			}else{
				$data['user_id'] = $_G['user_id'];
				$result = userClass::QianDao($data);
				if(empty($result) || !is_array($result)){
					$msg = array($result,"","");
				}else{
					$msg = array('今日签到获得积分'.$result['value'].'分,已连续签到'.$result['day'].'天,请保持',"","");
				}
			}
		}	
	}
}

$template = "user_info.html";
?>
