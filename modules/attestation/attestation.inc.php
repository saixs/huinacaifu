<?php
if (!defined('ROOT_PATH'))  die('���ܷ���');//��ֱֹ�ӷ���
include_once("attestation.class.php");

if (isset($_POST['valicode']) && strtolower($_POST['valicode'])!=$_SESSION['valicode']){
		$msg = array("��֤�����");
}else{
	$_SESSION['valicode'] = "";
	if ($_U['query_type'] == "list"){	
		
	}
	elseif($_U['query_type'] == "one" || $_U['query_type'] == "qi"){
		if (isset($_POST['name'])){
			$var = array("name","type_id");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$_G['upimg']['user_id'] = $_G['user_id'];
			//ͼƬ�ϴ����ȡ��
			$_G['upimg']['file'] = "litpic";
			
			$_G['upimg']['cut_status'] = 0;
			$_G['upimg']['code'] = "attestation";
			
 			 
		    //$pic_result = $upload->upfile($_G['upimg']);
		    //
		    //��ȡ�ļ���
		    $pic_result['filename']=$_POST["litpic"];
		    
			if ($pic_result!=""){
				$data['litpic'] = $pic_result['filename'];//�ϴ���ͼƬ

				//$data['upfiles_id'] = $pic_result['upfiles_id'];//�ϴ���ͼƬ
			}
			
			$result = attestationClass::Add($data);
			if ($result!==true){
				$msg = array($reuslt);
			}else{
				$msg = array("�����ɹ�.","","index.php?user&q=code/attestation");
			}
			
		//*/
		}else{
			$_U['attestation_type_list'] = attestationClass::GetTypeList(array("limit"=>"all"));
		}
	} elseif ($_U['query_type'] == "del") {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            // ��ѯ��ͼƬ��Ϣ
            $sql = "SELECT * FROM {attestation} WHERE `id`={$id} AND `is_delete`=0";
            $res = $mysql->db_fetch_array($sql);
            if (is_array($res) && $res['user_id'] == $_G['user_id']) {
                if (is_file($_SERVER['DOCUMENT_ROOT'].'/'.$res['litpic']) && unlink($_SERVER['DOCUMENT_ROOT'].'/'.$res['litpic'])) {
                    $sql = "UPDATE {attestation} SET `is_delete`=1 WHERE `id`={$id}";
                    $res = $mysql->db_query($sql);
                    $msg = array("�����ɹ�.","","index.php?user&q=code/attestation");
                } else {
                    $msg = array("�ļ��޷�ɾ��,���ļ�����������ϵͳ����Աȡ����ϵ.","","index.php?user&q=code/attestation");
                }
            } else {
                $msg = array("����ʧ��,�����ڸ�ͼƬ��Ϣ.","","index.php?user&q=code/attestation");
            }
        } else {
            $msg = array("�Ƿ�����","","index.php?user&q=code/attestation");
        }
    } else {

    }

}



$template = "user_attestation.html";
?>
