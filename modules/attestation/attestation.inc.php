<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
include_once("attestation.class.php");

if (isset($_POST['valicode']) && strtolower($_POST['valicode'])!=$_SESSION['valicode']){
		$msg = array("验证码错误");
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
			//图片上传框获取的
			$_G['upimg']['file'] = "litpic";
			
			$_G['upimg']['cut_status'] = 0;
			$_G['upimg']['code'] = "attestation";
			
 			 
		    //$pic_result = $upload->upfile($_G['upimg']);
		    //
		    //获取文件名
		    $pic_result['filename']=$_POST["litpic"];
		    
			if ($pic_result!=""){
				$data['litpic'] = $pic_result['filename'];//上传的图片

				//$data['upfiles_id'] = $pic_result['upfiles_id'];//上传的图片
			}
			
			$result = attestationClass::Add($data);
			if ($result!==true){
				$msg = array($reuslt);
			}else{
				$msg = array("操作成功.","","index.php?user&q=code/attestation");
			}
			
		//*/
		}else{
			$_U['attestation_type_list'] = attestationClass::GetTypeList(array("limit"=>"all"));
		}
	} elseif ($_U['query_type'] == "del") {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            // 查询该图片信息
            $sql = "SELECT * FROM {attestation} WHERE `id`={$id} AND `is_delete`=0";
            $res = $mysql->db_fetch_array($sql);
            if (is_array($res) && $res['user_id'] == $_G['user_id']) {
                if (is_file($_SERVER['DOCUMENT_ROOT'].'/'.$res['litpic']) && unlink($_SERVER['DOCUMENT_ROOT'].'/'.$res['litpic'])) {
                    $sql = "UPDATE {attestation} SET `is_delete`=1 WHERE `id`={$id}";
                    $res = $mysql->db_query($sql);
                    $msg = array("操作成功.","","index.php?user&q=code/attestation");
                } else {
                    $msg = array("文件无法删除,该文件不存在请与系统管理员取得联系.","","index.php?user&q=code/attestation");
                }
            } else {
                $msg = array("操作失败,不存在该图片信息.","","index.php?user&q=code/attestation");
            }
        } else {
            $msg = array("非法访问","","index.php?user&q=code/attestation");
        }
    } else {

    }

}



$template = "user_attestation.html";
?>
