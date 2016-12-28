<?php
session_start ();
// function magic_function_swfupload($parse_var) {
function magic_function_swfupload($parse_var) {
	
	// $uploadserial, $file_upload_limit, $file_size,$upspanarea,$fsUploadProgress,$btnCancel,$info
	global $mysql, $_G;
	foreach ( $parse_var as $_key => $_val ) {
		
		switch ($_key) {
			// 设置上传文本框样式，不设置或者为0是单文件上传，其他为多文件上传
			case 'style' :
				$style = $_val;
				break;
			// 初始化上传控件序列号，同一页面每个序列号必须不同
			case 'uploadserial' :
				$uploadserial = $_val;
				break;
			// 文件上传数量，除0为不限制外，1为1个上限，其他类推
			case 'file_upload_limit' :
				$file_upload_limit = $_val;
				break;
			// 可上传文件大小(可忽略设置，程序自动获取可上传最大值，无法获取自动限制为2M,)
			// kb为单位，如1M=1024
			case 'file_size' :
				$file_size = $_val;
				break;
			// 提示信息
			case 'info' :
				$info = $_val;
				break;
			// 提示信息
			case 'filetype' :
				$filetype = $_val;
				break;
			// 上传处理页面
			case 'upload_url' :
				$upload_url = $_val;
				break;
			// 上传处理页面
			case 'sub_btn' :
				$sub_btn = $_val;
				break;
			
			// 表单提交时，设置返回的id
			case 'return_img_id' :
				$return_img_id = $_val;
				break;
	
			// 2个上传，第二个
			case 'otherstyle' :
				$otherstyle = $_val;
				break;
			default :
				break;
		}
	}
	
	// 设置默认上传文件大小限制
	if ($file_size == "" || $file_size == 0) {
		if (@ini_get ( "file_uploads" )) {
			// 获取php。ini配置，得出上传和post允许的最大值，并设置为默认最大上传值
			if (ini_get ( "upload_max_filesize" ) < ini_get ( "post_max_size" )) {
				$file_size = ini_get ( "upload_max_filesize" ) * 1024;
			} else {
				$file_size = ini_get ( "post_max_size" ) * 1024;
			}
		} else {
			// 如果程序无法获取php.ini中的限制值，默认为2M
			$file_size = 2048;
		}
	}
	
	// 不设置上传个数限制，就默认为1个
	if ($file_upload_limit == "" || $file_upload_limit == 0) {
		// 根据样式确定每次最多上传的文件个数
		
		$file_upload_limit = 1;
	}
	
	// 文件类型限制，如果不限制就是全部
	if ($filetype == "") {
		
		$filetype = "*.*";
	}
	
	// $sessid, $uploadserial, $file_upload_limit, $file_size,$upspanarea,$fsUploadProgress,$btnCancel,$info
	
	/**
	 * *********************************************第一种样式********************************************************
	 */
	$html = "<link href='../plugins/swfupload/css/default.css' rel='stylesheet' type='text/css' />
			<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/fileprogress.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/handlers.js'></script>	";
	$html .= "
	<script type='text/javascript'>
	//
  function swfUploadLoaded" . $uploadserial . "() {
	var btnSubmit = document.getElementById(\"" . $sub_btn . "\");
	
	btnSubmit.onclick = doSubmit" . $uploadserial . ";
	
  }
  /*******************************/
  //
  function fileDialogStart" . $uploadserial . "() {
	var txtFileName = document.getElementById(\"txtFileName" . $uploadserial . "\");
	txtFileName.value = \"\";

	this.cancelUpload();
  }
  
  function fileQueued" . $uploadserial . "(file) {
	try {
		var txtFileName = document.getElementById(\"txtFileName" . $uploadserial . "\");
		txtFileName.value = file.name;
	} catch (e) {
	}

}
  /***********************/
  //
	function doSubmit" . $uploadserial . "(e) {
	try {
		upload" . $uploadserial . ".startUpload();
	} catch (ex) {

	}
	return false;
  }
  //
	function uploadDone" . $uploadserial . "() {
	try {
		document.forms[0].submit();
	} catch (ex) {
		alert(\"Error submitting form\");
	}
     }
  //
	function uploadSuccess" . $uploadserial . "(file, serverData) {
	try {
	file.id = \"singlefile\"; // This makes it so FileProgress only makes a single UI element, instead of one for each file
	var progress = new FileProgress(file, this.customSettings.progress_target);
	progress.setComplete();
	progress.setStatus(\"上传完成.\");
	progress.toggleCancel(false);
	
	if (serverData === \" \") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//将文件上传的文件路径等值反馈给hidFileID
    document.getElementById(\"" . $return_img_id . "\").value = serverData;
   		
	}
	
	} catch (e) {
	}
	}
	//
	function uploadComplete" . $uploadserial . "(file) {
	try {
		if (this.customSettings.upload_successful) {
			this.setButtonDisabled(true);
			uploadDone" . $uploadserial . "();
		} else {

			alert(\"上传有误，稍候再试.\");
		}
	} catch (e) {
	}
}

	</script>";
	
	$html .= "<script type='text/javascript'>
		//初始化对象
		var upload" . $uploadserial . ";
		window.onload = function () {
			upload" . $uploadserial . " = new SWFUpload({
				// Backend settings
				upload_url: \"" . $upload_url . "\",
								post_params: {'PHPSESSID' :'<? echo \$this->magic_vars['_G']['user_id'];?>'},
						
												
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : " . $file_size . ",	// 上传文件大小
				file_types : '" . $filetype . "',			// or you could use something like: '*.doc;*.wpd;*.pdf',
				file_types_description : '".$filetype."',
				file_upload_limit : '" . $file_upload_limit . "',
				file_queue_limit : '" . $file_upload_limit . "',
	
				// Event handler settings
				swfupload_loaded_handler : swfUploadLoaded" . $uploadserial . ",
	
				file_dialog_start_handler: fileDialogStart" . $uploadserial . ",
				file_queued_handler : fileQueued" . $uploadserial . ",
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
	
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess" . $uploadserial . ",
				upload_complete_handler : uploadComplete" . $uploadserial . ",
	
				// Button Settings
				button_image_url: \"../plugins/swfupload/mybutton.png\",
				button_placeholder_id  :\"upspanarea" . $uploadserial . "\",
		    	button_width: 61,
			 	button_height: 22,
				//button_text: '<span class='theFont'>选择上传</span>',
				//button_text_style: '.theFont { font-size: 16; }',
				//button_text_left_padding: 12,
				//button_text_top_padding: 3,
	
	
				// Flash Settings
				flash_url : \"../plugins/swfupload/swfupload.swf\",
	
				custom_settings : {
					progress_target : \"fsUploadProgress" . $uploadserial . "\",
					upload_successful : false
				},
	
				// Debug settings
				debug: false
			});
	
		};
	</script>";
	
	$html .= "<input type='text' id='txtFileName" . $uploadserial . "' disabled='true' style='border: solid 1px; background-color: #FFFFFF;' />
			<span id='upspanarea" . $uploadserial . "'></span>(" . $info . ")
			<div style=\"text-align:center;margin:0 auto;\" class='flash' id='fsUploadProgress" . $uploadserial . "'>
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
			The Handlers (in handlers.js) process the upload events and make the UI updates -->
			</div>
           	<input type='hidden' name='" . $return_img_id . "' id='" . $return_img_id . "' value='' />
			<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->";
	
	/**
	 * *********************************************第二种样式********************************************************
	 */
	// 引入文件
	$html1 = "<link href='../plugins/swfupload/css/default.css' rel='stylesheet' type='text/css' />
	<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/swfupload.queue.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/fileprogress.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/handlers.js'></script>
			";
	// 初始化上传控件
	$html1 .= "<script type='text/javascript'>
			//初始化对象
	  var upload" . $uploadserial . " ;
		window.onload = function() {
			 upload" . $uploadserial . " = new SWFUpload({
				// Backend Settings
				upload_url: \"" . $upload_url . "\",
				post_params: {'PHPSESSID' :'<? echo \$this->magic_vars['_G']['user_id'];?>'},
						
													
				// File Upload Settings
				file_size_limit : " . $file_size . ",	// 文件大小
				file_types : '" . $filetype . "',
				file_types_description : '".$filetype."',
				file_upload_limit : '" . $file_upload_limit . "',
				file_queue_limit : '" . $file_upload_limit . "',
	
				// Event Handler Settings (all my handlers are in the Handler.js file)
				file_dialog_start_handler : fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
	
				// Button Settings
				//上传选择区域
				button_image_url: \"../plugins/swfupload/mybutton.png\",
				button_placeholder_id :\"upspanarea" . $uploadserial . "\",
				button_width: 61,
				button_height: 22,

				// Flash Settings
				flash_url : \"../plugins/swfupload/swfupload.swf\",
				custom_settings : {
					progressTarget : \"fsUploadProgress" . $uploadserial . "\",
					cancelButtonId : \"btnCancel" . $uploadserial . "\"
				},
	
				// Debug Settings
				debug: false
			});
	
	     }
	</script>";
	$html1 .= "<div>
						<div class='fieldset flash' id='fsUploadProgress" . $uploadserial . "'>
							<span class='legend'>" . $info . "</span>
						</div>
						<div style='padding-left: 5px;float:left'>
							<span id='upspanarea" . $uploadserial . "'></span>
							<input id='btnCancel" . $uploadserial . "' type='button' value='取消上传' onclick='cancelQueue(upload" . $uploadserial . ");' 
									disabled='disabled' style='margin-left: 2px; height: 22px; font-size: 8pt;' />
							<br />
						</div>
					</div>";
	/**
	 * **************************************第三种样式（2个上传控件）**************************************************************
	 */
	$html2 = "<link href='../plugins/swfupload/css/default.css' rel='stylesheet' type='text/css' />
			<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/fileprogress.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/handlers.js'></script>	";
	$html2 .= "
	<script type='text/javascript'>
	//
  function swfUploadLoaded" . $uploadserial . "() {
	var btnSubmit = document.getElementById(\"" . $sub_btn . "\");
	
	btnSubmit.onclick = doSubmit" . $uploadserial . ";
	
  }
  /*******************************/
  //
  function fileDialogStart" . $uploadserial . "() {
	var txtFileName = document.getElementById(\"txtFileName" . $uploadserial . "\");
	txtFileName.value = \"\";
	
	this.cancelUpload();
  }
	
  function fileQueued" . $uploadserial . "(file) {
	try {
		var txtFileName = document.getElementById(\"txtFileName" . $uploadserial . "\");
		txtFileName.value = file.name;
	} catch (e) {
	}
	
}
  /***********************/
  //
	function doSubmit" . $uploadserial . "(e) {
	try {
		upload" . $uploadserial . ".startUpload();
	} catch (ex) {
	
	}
	return false;
  }
  //
	function uploadDone" . $uploadserial . "() {
	try {
		//document.forms[0].submit();
			upload" . $uploadserial . "other.startUpload();
	} catch (ex) {
		alert(\"Error submitting form\");
	}
     }
  //
	function uploadSuccess" . $uploadserial . "(file, serverData) {
	try {
	file.id = \"singlefile\"; // This makes it so FileProgress only makes a single UI element, instead of one for each file
	var progress = new FileProgress(file, this.customSettings.progress_target);
	progress.setComplete();
	progress.setStatus(\"上传完成.\");
	progress.toggleCancel(false);
	
	if (serverData === \" \") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//将文件上传的文件路径等值反馈给hidFileID
    document.getElementById(\"" . $return_img_id . "\").value = serverData;
   
	}
	
	} catch (e) {
	}
	}
	//
	function uploadComplete" . $uploadserial . "(file) {
	try {
		if (this.customSettings.upload_successful) {
			this.setButtonDisabled(true);
			uploadDone" . $uploadserial . "();
		} else {
	
			alert(\"上传有误，稍候再试.\");
		}
	} catch (e) {
	}
}
	
	</script>";
	

	$html2 .= "
	<script type='text/javascript'>
	//
  function swfUploadLoaded" . $uploadserial . "other() {
	var btnSubmit = document.getElementById(\"" . $sub_btn . "other\");
		
	btnSubmit.onclick = doSubmit" . $uploadserial . "other;
		
  }
  /*******************************/
  //
  function fileDialogStart" . $uploadserial . "other() {
	var txtFileName = document.getElementById(\"txtFileName" . $uploadserial . "other\");
	txtFileName.value = \"\";
		
	this.cancelUpload();
  }
		
  function fileQueued" . $uploadserial . "other(file) {
	try {
		var txtFileName = document.getElementById(\"txtFileName" . $uploadserial . "other\");
		txtFileName.value = file.name;
	} catch (e) {
	}
		
}
  /***********************/
  //
	function doSubmit" . $uploadserial . "other(e) {
	try {
		upload" . $uploadserial . "other.startUpload();
	} catch (ex) {
		
	}
	return false;
  }
  //
	function uploadDone" . $uploadserial . "other() {
	try {
		document.forms[0].submit();
	} catch (ex) {
		alert(\"Error submitting form\");
	}
     }
  //
	function uploadSuccess" . $uploadserial . "other(file, serverData) {
	try {
	file.id = \"singlefile\"; // This makes it so FileProgress only makes a single UI element, instead of one for each file
	var progress = new FileProgress(file, this.customSettings.progress_target);
	progress.setComplete();
	progress.setStatus(\"上传完成.\");
	progress.toggleCancel(false);
		
	if (serverData === \" \") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//将文件上传的文件路径等值反馈给hidFileID
    document.getElementById(\"" . $return_img_id . "other\").value = serverData;
  
	}
		
	} catch (e) {
	}
	}
	//
	function uploadComplete" . $uploadserial . "other(file) {
	try {
		if (this.customSettings.upload_successful) {
			this.setButtonDisabled(true);
			uploadDone" . $uploadserial . "other();
		} else {
		
			alert(\"上传有误，稍候再试.\");
		}
	} catch (e) {
	}
}
		
	</script>";
	
	
	$html2 .= "<script type='text/javascript'>
		//初始化对象
		var upload" . $uploadserial . ";";
	

	$html2 .= "var upload" . $uploadserial . "other;";
	
	
	$html2 .= "	window.onload = function () {
			upload" . $uploadserial . " = new SWFUpload({
				// Backend settings
				upload_url: \"" . $upload_url . "\",
								post_params: {'PHPSESSID' :'<? echo \$this->magic_vars['_G']['user_id'];?>'},
						
																		
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : " . $file_size . ",	// 上传文件大小
				file_types : '" . $filetype . "',			// or you could use something like: '*.doc;*.wpd;*.pdf',
				file_types_description : '".$filetype."',
				file_upload_limit : '" . $file_upload_limit . "',
				file_queue_limit : '" . $file_upload_limit . "',
	
				// Event handler settings
				swfupload_loaded_handler : swfUploadLoaded" . $uploadserial . ",
	
				file_dialog_start_handler: fileDialogStart" . $uploadserial . ",
				file_queued_handler : fileQueued" . $uploadserial . ",
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
	
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess" . $uploadserial . ",
				upload_complete_handler : uploadComplete" . $uploadserial . ",
	
				// Button Settings
				button_image_url: \"../plugins/swfupload/mybutton.png\",
				button_placeholder_id  :\"upspanarea" . $uploadserial . "\",
		    	button_width: 61,
			 	button_height: 22,
				//button_text: '<span class='theFont'>选择上传</span>',
				//button_text_style: '.theFont { font-size: 16; }',
				//button_text_left_padding: 12,
				//button_text_top_padding: 3,
	
	
				// Flash Settings
				flash_url : \"../plugins/swfupload/swfupload.swf\",
	
				custom_settings : {
					progress_target : \"fsUploadProgress" . $uploadserial . "\",
					upload_successful : false
				},
	
				// Debug settings
				debug: false
			});";
	
	
	
	$html2.="upload" . $uploadserial . "other = new SWFUpload({
				// Backend settings
				upload_url: \"" . $upload_url . "\",
				post_params: {'PHPSESSID' :'<? echo \$this->magic_vars['_G']['user_id'];?>'},
												
						
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : " . $file_size . ",	// 上传文件大小
				file_types : '" . $filetype . "',			// or you could use something like: '*.doc;*.wpd;*.pdf',
				file_types_description : 'All Files',
				file_upload_limit : '" . $file_upload_limit . "',
				file_queue_limit : '" . $file_upload_limit . "',
	
				// Event handler settings
				swfupload_loaded_handler : swfUploadLoaded" . $uploadserial . "other,
	
				file_dialog_start_handler: fileDialogStart" . $uploadserial . "other,
				file_queued_handler : fileQueued" . $uploadserial . "other,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
	
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess" . $uploadserial . "other,
				upload_complete_handler : uploadComplete" . $uploadserial . "other,
	
				// Button Settings
				button_image_url: \"../plugins/swfupload/mybutton.png\",
				button_placeholder_id  :\"upspanarea" . $uploadserial . "other\",
		    	button_width: 61,
			 	button_height: 22,
				//button_text: '<span class='theFont'>选择上传</span>',
				//button_text_style: '.theFont { font-size: 16; }',
				//button_text_left_padding: 12,
				//button_text_top_padding: 3,
	
	
				// Flash Settings
				flash_url : \"../plugins/swfupload/swfupload.swf\",
	
				custom_settings : {
					progress_target : \"fsUploadProgress" . $uploadserial . "other\",
					upload_successful : false
				},
	
				// Debug settings
				debug: false
			});";
	
	$html2.="};
	</script>";
	
	$html2 .=  "<div style=\"float:left\">".$info."       <input type='text' id='txtFileName" . $uploadserial . "' disabled='true' style='border: solid 1px; background-color: #FFFFFF;' /><span style='color:#ff0000'>*</span>
			<span id='upspanarea" . $uploadserial . "'></span> 
			<div class='flash' id='fsUploadProgress" . $uploadserial . "'>
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
			The Handlers (in handlers.js) process the upload events and make the UI updates -->
			</div>
           	<input type='hidden' name='" . $return_img_id . "' id='" . $return_img_id . "' value='' />
			<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php --></div>";
	
	$html2 .=  "<div style=\"float:left\">".$otherstyle ."      <input type='text' id='txtFileName" . $uploadserial . "other' disabled='true' style='border: solid 1px; background-color: #FFFFFF;' /><span style='color:#ff0000'>*</span>
			<span id='upspanarea" . $uploadserial . "other'></span> 
			<div class='flash' id='fsUploadProgress" . $uploadserial . "other'>
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
			The Handlers (in handlers.js) process the upload events and make the UI updates -->
			</div>
           	<input type='hidden' name='" . $return_img_id . "other' id='" . $return_img_id . "other' value='' />
			<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php --></div>";
	
	if ($style == "" || $style == 0) {
		// 单文件上传
		return $html;
	} else {
		if($otherstyle==""){
			// 多文件上传
			return $html1;
		}else{
			// 第三种情况
			return $html2;
		}
	
		
		
	}
	
	// */
}

?>