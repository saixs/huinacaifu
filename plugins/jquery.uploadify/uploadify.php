<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
require_once ("../../core/config.inc.php");

// Define a destination
$save_path1 = "../../";
$save_path2 = "data/upfiles/userimg/";

$targetFolder = $save_path1 . $save_path2; // Relative to the root
//不存在就创建文件夹
createFolder($targetFolder);

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$file_name = $_FILES['Filedata']['name'];
	$file_name = "pic".mktime().rand(0,999). rechinese($file_name);
	
	$targetFile = $targetFolder . $file_name;
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	
	$fileParts = pathinfo($file_name);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		if(move_uploaded_file($tempFile,$targetFile)){
			$data["img"]=$save_path2.$file_name;
			$data["auctionid"]=0;
			if(isset($_POST["reloadid"])&&$_POST["reloadid"]!=="0"){
				$sql = "update `{attestation}` set `addtime` = '" . time () . "',`addip` = '" . ip_address () . "'";
				foreach ( $data as $key => $value ) {
					$sql .= ",`$key` = '$value'";
				}
				$sql.=" where id={$_POST["reloadid"]}";
			}else{
				$sql = "insert into `{attestation}` set `addtime` = '" . time () . "',`addip` = '" . ip_address () . "'";
				foreach ( $data as $key => $value ) {
					$sql .= ",`$key` = '$value'";
				}
			}
			
			
			
			$result=$mysql->db_query ( $sql );
			if ($result) {
				//返回插入的id
				if(isset($_POST["reloadid"])&&$_POST["reloadid"]!=="0" ){
					echo json_encode(array("id"=>$_POST["reloadid"],"filename"=>$file_name));
				}else{
					echo json_encode(array("id"=>$mysql->db_insert_id(),"filename"=>$file_name));
						
				}
			} else {
				echo "faild";
			}	
			
		}else{
			echo "faild";
		}
		

	} else {
		echo 'Invalid file type.';
	}
}
//创建文件夹
function createFolder($path)
{
	if (!file_exists($path))
	{
		createFolder(dirname($path));
		mkdir($path, 0777);
	}
}

function rechinese($str)
{
	$par = "/[\x80-\xff]/";
	return preg_replace($par,"",$str);
}
?>