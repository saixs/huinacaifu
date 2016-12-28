<?php
session_start ();
// function magic_function_swfupload($parse_var) {
function magic_function_swfupload($parse_var) {
	
	// $uploadserial, $file_upload_limit, $file_size,$upspanarea,$fsUploadProgress,$btnCancel,$info
	global $mysql, $_G;
	foreach ( $parse_var as $_key => $_val ) {
		
		switch ($_key) {
			// �����ϴ��ı�����ʽ�������û���Ϊ0�ǵ��ļ��ϴ�������Ϊ���ļ��ϴ�
			case 'style' :
				$style = $_val;
				break;
			// ��ʼ���ϴ��ؼ����кţ�ͬһҳ��ÿ�����кű��벻ͬ
			case 'uploadserial' :
				$uploadserial = $_val;
				break;
			// �ļ��ϴ���������0Ϊ�������⣬1Ϊ1�����ޣ���������
			case 'file_upload_limit' :
				$file_upload_limit = $_val;
				break;
			// ���ϴ��ļ���С(�ɺ������ã������Զ���ȡ���ϴ����ֵ���޷���ȡ�Զ�����Ϊ2M,)
			// kbΪ��λ����1M=1024
			case 'file_size' :
				$file_size = $_val;
				break;
			// ��ʾ��Ϣ
			case 'info' :
				$info = $_val;
				break;
			// ��ʾ��Ϣ
			case 'filetype' :
				$filetype = $_val;
				break;
			// �ϴ�����ҳ��
			case 'upload_url' :
				$upload_url = $_val;
				break;
			// �ϴ�����ҳ��
			case 'sub_btn' :
				$sub_btn = $_val;
				break;
			
			// ���ύʱ�����÷��ص�id
			case 'return_img_id' :
				$return_img_id = $_val;
				break;
	
			// 2���ϴ����ڶ���
			case 'otherstyle' :
				$otherstyle = $_val;
				break;
			default :
				break;
		}
	}
	
	// ����Ĭ���ϴ��ļ���С����
	if ($file_size == "" || $file_size == 0) {
		if (@ini_get ( "file_uploads" )) {
			// ��ȡphp��ini���ã��ó��ϴ���post��������ֵ��������ΪĬ������ϴ�ֵ
			if (ini_get ( "upload_max_filesize" ) < ini_get ( "post_max_size" )) {
				$file_size = ini_get ( "upload_max_filesize" ) * 1024;
			} else {
				$file_size = ini_get ( "post_max_size" ) * 1024;
			}
		} else {
			// ��������޷���ȡphp.ini�е�����ֵ��Ĭ��Ϊ2M
			$file_size = 2048;
		}
	}
	
	// �������ϴ��������ƣ���Ĭ��Ϊ1��
	if ($file_upload_limit == "" || $file_upload_limit == 0) {
		// ������ʽȷ��ÿ������ϴ����ļ�����
		
		$file_upload_limit = 1;
	}
	
	// �ļ��������ƣ���������ƾ���ȫ��
	if ($filetype == "") {
		
		$filetype = "*.*";
	}
	
	// $sessid, $uploadserial, $file_upload_limit, $file_size,$upspanarea,$fsUploadProgress,$btnCancel,$info
	
	/**
	 * *********************************************��һ����ʽ********************************************************
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
	progress.setStatus(\"�ϴ����.\");
	progress.toggleCancel(false);
	
	if (serverData === \" \") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//���ļ��ϴ����ļ�·����ֵ������hidFileID
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

			alert(\"�ϴ������Ժ�����.\");
		}
	} catch (e) {
	}
}

	</script>";
	
	$html .= "<script type='text/javascript'>
		//��ʼ������
		var upload" . $uploadserial . ";
		window.onload = function () {
			upload" . $uploadserial . " = new SWFUpload({
				// Backend settings
				upload_url: \"" . $upload_url . "\",
								post_params: {'PHPSESSID' :'<? echo \$this->magic_vars['_G']['user_id'];?>'},
						
												
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : " . $file_size . ",	// �ϴ��ļ���С
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
				//button_text: '<span class='theFont'>ѡ���ϴ�</span>',
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
	 * *********************************************�ڶ�����ʽ********************************************************
	 */
	// �����ļ�
	$html1 = "<link href='../plugins/swfupload/css/default.css' rel='stylesheet' type='text/css' />
	<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/swfupload.queue.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/fileprogress.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/handlers.js'></script>
			";
	// ��ʼ���ϴ��ؼ�
	$html1 .= "<script type='text/javascript'>
			//��ʼ������
	  var upload" . $uploadserial . " ;
		window.onload = function() {
			 upload" . $uploadserial . " = new SWFUpload({
				// Backend Settings
				upload_url: \"" . $upload_url . "\",
				post_params: {'PHPSESSID' :'<? echo \$this->magic_vars['_G']['user_id'];?>'},
						
													
				// File Upload Settings
				file_size_limit : " . $file_size . ",	// �ļ���С
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
				//�ϴ�ѡ������
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
							<input id='btnCancel" . $uploadserial . "' type='button' value='ȡ���ϴ�' onclick='cancelQueue(upload" . $uploadserial . ");' 
									disabled='disabled' style='margin-left: 2px; height: 22px; font-size: 8pt;' />
							<br />
						</div>
					</div>";
	/**
	 * **************************************��������ʽ��2���ϴ��ؼ���**************************************************************
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
	progress.setStatus(\"�ϴ����.\");
	progress.toggleCancel(false);
	
	if (serverData === \" \") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//���ļ��ϴ����ļ�·����ֵ������hidFileID
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
	
			alert(\"�ϴ������Ժ�����.\");
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
	progress.setStatus(\"�ϴ����.\");
	progress.toggleCancel(false);
		
	if (serverData === \" \") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//���ļ��ϴ����ļ�·����ֵ������hidFileID
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
		
			alert(\"�ϴ������Ժ�����.\");
		}
	} catch (e) {
	}
}
		
	</script>";
	
	
	$html2 .= "<script type='text/javascript'>
		//��ʼ������
		var upload" . $uploadserial . ";";
	

	$html2 .= "var upload" . $uploadserial . "other;";
	
	
	$html2 .= "	window.onload = function () {
			upload" . $uploadserial . " = new SWFUpload({
				// Backend settings
				upload_url: \"" . $upload_url . "\",
								post_params: {'PHPSESSID' :'<? echo \$this->magic_vars['_G']['user_id'];?>'},
						
																		
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : " . $file_size . ",	// �ϴ��ļ���С
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
				//button_text: '<span class='theFont'>ѡ���ϴ�</span>',
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
				file_size_limit : " . $file_size . ",	// �ϴ��ļ���С
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
				//button_text: '<span class='theFont'>ѡ���ϴ�</span>',
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
		// ���ļ��ϴ�
		return $html;
	} else {
		if($otherstyle==""){
			// ���ļ��ϴ�
			return $html1;
		}else{
			// ���������
			return $html2;
		}
	
		
		
	}
	
	// */
}

?>