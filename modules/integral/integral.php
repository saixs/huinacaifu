 <?
if (!defined('ROOT_PATH'))  die('���ܷ���');//��ֱֹ�ӷ���
check_rank("integral_".$_A['query_type']);//���Ȩ��

include_once("integral.class.php");

$_A['list_purview'] = array(""=>array("��Ʒ�һ�"=>array("integral_list"=>"��Ʒ�һ��б�","integral_new"=>"�����Ʒ�һ�","integral_del"=>"ɾ����Ʒ�һ�","integral_convert"=>"�û��һ���Ϣ")));//Ȩ��
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>�һ���Ʒ�б�</a> - <a href='{$_A['query_url']}/new{$_A['site_url']}'>��Ӷһ���Ʒ</a>  - <a href='{$_A['query_url']}/convert{$_A['site_url']}'>�û��һ���Ϣ</a>  ";

$_A['integral_type'] = array(
	array('id' => '4','name' => '�����˶�'),
	array('id' => '5','name' => '����ҵ�'),
	array('id' => '1','name' => '�����ز�'),
	array('id' => '2','name' => '���ðٻ�'),
	array('id' => '3','name' => '�����Ʒ')
);
/**
 * �������Ϊ�յĻ�����ʾ���е��ļ��б�
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "��Ʒ�һ��б�";
	
	$data['page'] = $_A['page'];
	$data['epage'] = 20;
	$data['name'] = isset($_REQUEST['name'])?$_REQUEST['name']:"";
	$result = integralClass::GetList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
	
}



/**
 * ���
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit"){
	if($_A['query_type'] == "edit"){
		$_A['list_title'] = "������Ʒ���";
	}else{
		$_A['list_title'] = "������Ʒ�޸�";
	}
	//��ȡ�û�id����Ϣ
	if (isset($_POST['name'])){
		if(empty($_POST['province']) || empty($_POST['city']) || empty($_POST['area'])){
			$var = array('name','need','number','order','flag','content','status','type');
		}else{
			$var = array('name','need','number','province','city','area','order','flag','content','status','type');
		}
		
		$data = post_var($var);
		
        if ($_POST['clearlitpic'] == 1) {
            $data['litpic'] = "";
        } else {
            $_G['upimg']['file'] = "litpic";
            $_G['upimg']['mask_status'] = 0;
            $pic_result = $upload->upfile($_G['upimg']);
            if ($pic_result != "") {
                $data['litpic'] = $pic_result['filename'];
            }
        }
		if($_A['query_type'] == "new"){
			$result = integralClass::Add($data);
		}else{
			$data['id'] = $_REQUEST['id'];
			$result = integralClass::update($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("�����ɹ�");
		}
		$user->add_log($_log,$result);//��¼����
	}
	
	elseif($_A['query_type'] == "edit"){
		$data['id'] = $_REQUEST['id'];
		$result = integralClass::GetOne($data);
		if (is_array($result)){
			$_A['integral_result'] = $result;
		}else{
			$msg = array("��������");
		}
	}
}
	
/**
 * �鿴
**/	
elseif ($_A['query_type'] == "view"){
	$data['id'] = $_REQUEST['id'];
	$result = integralClass::GetOne($data);
	if (is_array($result)){
		if($result['type']==0){
			$result['type'] = 'δѡ������';
		}else{
			$result['type'] = $_A['integral_type'][$result['type']-1]['name'];
		}
		$_A['integral_result'] = $result;
	}else{
		$msg = array("��������");
	}
}


/**
 * ɾ��
**/
elseif ($_A['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$result = integralClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("ɾ���ɹ�");
	}
	$user->add_log($_log,$result);//��¼����
}


/**
 * ��ʾ�һ���Ϣ�б�
**/
elseif ($_A['query_type'] == "convert"){
	$_A['list_title'] = "��Ʒ�һ���ϸ��Ϣ";
	
	$data['page'] = $_A['page'];
	$data['epage'] = 20;
	$data['username'] = isset($_REQUEST['username'])?urldecode($_REQUEST['username']):"";
	$data['name'] = isset($_REQUEST['name'])?urldecode($_REQUEST['name']):"";
	$data['id'] = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	$data['dotime1'] = isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:"";
	$data['dotime2'] = isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:"";
	if(!empty($_REQUEST['status'])){
		$data['status'] = $_REQUEST['status'];
	}elseif(isset($_REQUEST['status'])){
		$data['status'] = 0;
	}

	$result = integralClass::GetConvertList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_convert_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
		if (isset($_REQUEST['type1']) && $_REQUEST['type1']=="excel"){
			$title = array("ID","��Ʒ����","�һ���","����","��ֵ","�ܶһ�����","�һ�ʱ��","״̬");
			$data['limit'] = "all";
			$result = integralClass::GetConvertList($data);
			
			foreach ($result as $key => $value){
					
				//�����û����磺�����Ϊ��ɫ����������ɫ
				if($value['type_id']==17){
					$value['username'] = '<red>'.$value['username'].'</red>';
				}elseif($value['type_id']==18){
					$value['username'] = '<blue>'.$value['username'].'</blue>';
				}
				
				if($value['status']==1){
					$value['status'] = '�Ѷһ�';
				}elseif($value['status']==2){
					$value['status'] = '�ѹر�';
				}else{
					$value['status'] = 'δ�һ�';
				}
				
				$_data[$key] = array($value['id'],$value['goods_name'],$value['username'],$value['number'],$value['need'],$value['integral'],date("Y-m-d H:i",$value['addtime']),$value['status']);
			}
			exportData("��Ʒ�һ���ϸ��Ϣ",$title,$_data);
			exit;
		}
	}else{
		$msg = array($result);
	}
	
}

	
/**
 * �鿴
**/	
elseif ($_A['query_type'] == "convert_view"){
	if (isset($_POST['status'])){
		$data['status'] = $_POST['status'];
		$data['verify_remark'] = $_POST['remark'];
		$data['id'] = $_POST['id'];
		$data['send_time'] = time();
		$data['send_num'] = $_POST['send_num'];
		$result = integralClass::ActionConvert($data);
		$msg = array("�һ��ɹ�");
	}else{
		$data['id'] = $_REQUEST['id'];
		$result = integralClass::GetConvertOne($data);
		if (is_array($result)){
			$_A['integral_convert_result'] = $result;
		}else{
			$msg = array("��������");
		}
	}
}

/**
 * ���ּ�¼
**/	
elseif ($_A['query_type'] == "log"){
	$_A['list_title'] = "���ּ�¼";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username'])){
		//$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username'] = iconv("UTF-8","GB2312",$data['username']);
	}
	
	if (isset($_REQUEST['type'])){
		$data['type'] = $_REQUEST['type'];
	}
	
	if (isset($_REQUEST['dotime1'])){
		$data['dotime1'] = $_REQUEST['dotime1'];
	}
	
	if (isset($_REQUEST['dotime2'])){
		$data['dotime2'] = $_REQUEST['dotime2'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = integralClass::GetIntegralLog($data);

	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_log_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
		if (isset($_REQUEST['type1']) && $_REQUEST['type1']=="excel"){
			$title = array("���ݿ����","�û���","����","���ֱ仯","��¼ʱ��","��ע","������");
			$data['limit'] = "all";
			$result = integralClass::GetIntegralLog($data);
			foreach ($result as $key => $value){
				// 2012-10-17 �޸���$value['remark'] ԭ�����иô�Ϊ $value['type'] ���µ����ļ�¼���ʽ�ʹ����ĿΪӢ��,remark�ֶ�Ϊ����
				$remark = $result[$key]['remark'];
				$http_host = $_SERVER['HTTP_HOST'];
				$pattern = "/^(.*)\[<a.*(\/invest\/a[0-9]{1,}.html)' target=_blank>(.*)<\/a>(.*)$/i";
				$res = preg_match_all($pattern, $remark,$match_array);
				if ($res)
				{
					//$remark = $match_array['1']['0'].'[<a href="http://'.$http_host.$match_array['2']['0'].'" target=_blank>'.$match_array['3']['0'].'</a>'.$match_array['4']['0'];
				}
				
				//�����û����磺�����Ϊ��ɫ����������ɫ
				if($value['type_id']==17){
					$value['username'] = '<red>'.$value['username'].'</red>';
				}elseif($value['type_id']==18){
					$value['username'] = '<blue>'.$value['username'].'</blue>';
				}
				//��������
				if($value['type_id']==1){
					if(empty($value['borrow_name'])){
						$value['type'] = '�ñ���ɾ������Ϊ���ԣ���ɾ��������¼�Լ�������ؼ�¼��';
					}else{
						$value['type'] = '��'.$value['borrow_name'].'��'.$value['integral_name'];
					}
				}else{
					$value['type'] = $value['integral_name'];
					if($value['type_id']==2){
						$value['type'] .= '������ǩ��'.$value['day'].'�죩';
					}
				}
				//������
				if(empty($value['op_user'])){
					$value['op_user'] = 'ϵͳ����';
				}else{
					$value['op_user'] = $value['op_username'];
				}
				
				$_data[$key] = array($value['tid'],$value['username'],$value['type'],$value['value'],date("Y-m-d H:i",$value['addtime']),$remark,$value['op_user']);
				// 2012-10-17�޸�
				//$_data[$key] = array($key+1,$value['trade_no'],$value['username'],$type,$payment,$value['money'],$value['fee'],$value['total'],date("Y-m-d H:i",$value['addtime']),$status);
			}
			exportData("���ּ�¼����",$title,$_data);
			exit;
		}
	}else{
		$msg = array($result);
	}
}
/**
 * ���ֳ�ֵ
**/
elseif ($_A['query_type'] == "recharge_integral"){
	include_once(ROOT_PATH."/modules/integral/integral.class.php");
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = userClass::GetOnes($_data);
		if ($result==false){
			$msg = array("�û���������");
		}else{
			$data['user_id'] = $result['user_id'];
			$data['value']   = $_POST['integral'];
			$data['type_id'] = 3;
			$data['remark'] = $_POST['remark'];
			
			$result = integralClass::AddRechargeIntegral($data);
			if (empty($result)){
				$msg = array($result);
			}else{
				//��������
				$remind['nid'] = "recharge_integral";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $result['user_id'];
				$remind['title'] = "{$result['remark']}��û���{$result['value']}��";
				$remind['content'] = "���Ѿ���".date("Y-m-d",time())."��û���{$result['value']}��";
				$remind['type'] = "recharge_integral";
				remindClass::sendRemind($remind);
				$msg = array("�����ɹ�");
			}
		}
	}
}

/**
 * ��Ա���ֿ۳�
**/
elseif ($_A['query_type'] == "deduct"){
	include_once(ROOT_PATH."/modules/integral/integral.class.php");
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = userClass::GetOnes($_data);
		if ($result==false){
			$msg = array("�û���������");
		}elseif (strtolower($_POST['valicode'])!=$_SESSION['valicode']){
			$msg = array("��֤�벻��ȷ");
		}else{
			$result1 = userClass::GetOne($_data);
			if($result1['integral']>=$_POST['integral'])
			{
				$data['user_id'] = $result['user_id'];
				$data['value'] = $_POST['integral'];
				$data['type_id'] = $_POST['type'];
				$data['remark'] = $_POST['remark'];
				$result = integralClass::Deduct($data);
                      
				if (empty($result)){
					$msg = array($result);
				}else{
					$msg = array("�����ѳɹ��۳�","",$_A['query_url']."/deduct");
					$_SESSION['valicode'] = "";
				}
           	}else{
				$msg = array("��Ա���ֲ���۳�"); 
			}
		}
	}
}
/**
 * ��Ա�����б�
**/
elseif ($_A['query_type'] == "user_list"){
	$_A['list_title'] = "�ʻ�������Ϣ�б�";
	
	if (isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=""){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username']) && $_REQUEST['username']!=""){
			if (isset($_REQUEST['username'])){
		//$data['username'] = $_REQUEST['username'];
		$data['username'] = urldecode($_REQUEST['username']);
		$data['username']= iconv("UTF-8","GB2312",$data['username']); 
	}

	}
	if(isset($_REQUEST['type'])&&$_REQUEST['type']!="")
	{
		$data['type'] = $_REQUEST['type'];
		$data['amount'] = $_REQUEST['amountm'];
	}

	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = integralClass::GetUserList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['integral_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
		if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
			$title = array("ID","�û���","��ʵ����","��ǰ����","Ͷ�����û���");
			$data['limit'] = "all";
			$result = accountClass::GetList($data);
			
			foreach ($result as $key => $value){
					
				//�����û����磺�����Ϊ��ɫ����������ɫ
				if($value['type_id']==17){
					$value['username'] = '<red>'.$value['username'].'</red>';
				}elseif($value['type_id']==18){
					$value['username'] = '<blue>'.$value['username'].'</blue>';
				}
				//�û���ǰ����
				if(empty($value['integral'])){
					$value['integral'] = 0;
				}
				//�û�Ͷ�����
				if(empty($value['invest_integral'])){
					$value['invest_integral'] = 0;
				}
				
				$_data[$key] = array($value['user_id'],$value['username'],$value['realname'],$value['integral'],$value['invest_integral']);
			}
			exportData("�ʻ�������Ϣ�б�",$title,$_data);
			exit;
		}
	
	}else{
		$msg = array($result);
	}
}
?>