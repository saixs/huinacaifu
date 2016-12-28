<?php

require '../../core/config.inc.php';
if (isset($_POST["PHPSESSID"])) {
	session_id($_POST["PHPSESSID"]);
} else if (isset($_GET["PHPSESSID"])) {
	session_id($_GET["PHPSESSID"]);
}

//$_user_id = explode(",",authcode(isset($_COOKIE[Key2Url("user_id","hisdhkcjsew")])?$_COOKIE[Key2Url("user_id","hisdhkcjsew")]:"","DECODE"));


//echo session_id("PHPSESSID");


/*
//用户cookies中的用户id
//echo $_user_id[0];
//用户最后登录时间
//echo $_user_id[1];
if($_user_id[0]==""||$_user_id[0]==0){
	//用户未登录状态
	echo "failed>>>>>>";
	exit(0);
}

//*/
 

   //*/
    // The Demos don't save files  
  
   /*
    if (isset($_FILES["resume_file"]) && is_uploaded_file($_FILES["resume_file"]["tmp_name"]) && $_FILES["resume_file"]["error"] == 0) {  
        //echo $_FILES["resume_file"]["name"];    // Create a pretend file id, this might have come from a database.  
    }  
  
    if (isset($_FILES["images"]) && is_uploaded_file($_FILES["images"]["tmp_name"]) && $_FILES["images"]["error"] == 0) {  
        //echo $_FILES["images"]["name"]; // Create a pretend file id, this might have come from a database.  
    }  
    //*/
  
    $extension_whitelist = array("jpg", "gif", "png","bmp");	// Allowed file extensions
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
    $save_path1="../../";
    $save_path2="data/upfiles/litpics/";
    $save_path =  $save_path1.$save_path2;	
    
    $file_name = $_FILES["resume_file"]["name"];  

    // Validate that we won't over-write an existing file
    if (file_exists($save_path . $file_name)) {
    	//HandleError("File with this name already exists");
    	exit(0);
    }
    $file_name = "pic".mktime().rand(0,999). rechinese($file_name);  



// Validate file extension
	$path_info = pathinfo($file_name);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
		HandleError("Invalid file extension");
		exit(0);
	}


    if (!@move_uploaded_file($_FILES["resume_file"]["tmp_name"], $save_path .$file_name)) {  
        echo "Directory litpics does not permission write!";  
        exit(0);  
    }else{  
        echo  $save_path2.$file_name;  
    } 
  
    function rechinese($str)
    {
    	$par = "/[\x80-\xff]/";
    	return preg_replace($par,"",$str);
    }
    exit(0);    // If there was an error we don't return anything and the webpage will have to deal with it.  
?>  
