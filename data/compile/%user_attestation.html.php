<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['item']):
?>
			<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/fileprogress.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/handlers.js'></script>	
	<script type='text/javascript'>
	//
  function swfUploadLoadedup1() {
	var btnSubmit = document.getElementById("sub");
	
	btnSubmit.onclick = doSubmitup1;
	
  }
  /*******************************/
  //
  function fileDialogStartup1() {
	var txtFileName = document.getElementById("txtFileNameup1");
	txtFileName.value = "";

	this.cancelUpload();
  }
  
  function fileQueuedup1(file) {
	try {
		var txtFileName = document.getElementById("txtFileNameup1");
		txtFileName.value = file.name;
	} catch (e) {
	}

}
  /***********************/
  //
	function doSubmitup1(e) {
	try {
		uploadup1.startUpload();
	} catch (ex) {

	}
	return false;
  }
  //
	function uploadDoneup1() {
	try {
		document.forms[0].submit();
	} catch (ex) {
		alert("Error submitting form");
	}
     }
  //
	function uploadSuccessup1(file, serverData) {
	try {
	file.id = "singlefile"; // This makes it so FileProgress only makes a single UI element, instead of one for each file
	var progress = new FileProgress(file, this.customSettings.progress_target);
	progress.setComplete();
	progress.setStatus("�ϴ����.");
	progress.toggleCancel(false);
	
	if (serverData === " ") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//���ļ��ϴ����ļ�·����ֵ������hidFileID
    document.getElementById("litpic").value = serverData;
   		
	}
	
	} catch (e) {
	}
	}
	//
	function uploadCompleteup1(file) {
	try {
		if (this.customSettings.upload_successful) {
			this.setButtonDisabled(true);
			uploadDoneup1();
		} else {

			alert("�ϴ������Ժ�����.");
		}
	} catch (e) {
	}
}

	</script><script type='text/javascript'>
		//��ʼ������
		var uploadup1;
		window.onload = function () {
			uploadup1 = new SWFUpload({
				// Backend settings
				upload_url: "plugins/swfupload/upload.php",
								post_params: {'PHPSESSID' :'<? echo $this->magic_vars['_G']['user_id'];?>'},
						
												
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : 2048,	// �ϴ��ļ���С
				file_types : '*.jpg;*.png;*.gif;*.bmp',			// or you could use something like: '*.doc;*.wpd;*.pdf',
				file_types_description : '*.jpg;*.png;*.gif;*.bmp',
				file_upload_limit : '1',
				file_queue_limit : '1',
	
				// Event handler settings
				swfupload_loaded_handler : swfUploadLoadedup1,
	
				file_dialog_start_handler: fileDialogStartup1,
				file_queued_handler : fileQueuedup1,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
	
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccessup1,
				upload_complete_handler : uploadCompleteup1,
	
				// Button Settings
				button_image_url: "../plugins/swfupload/mybutton.png",
				button_placeholder_id  :"upspanareaup1",
		    	button_width: 61,
			 	button_height: 22,
				//button_text: '<span class='theFont'>ѡ���ϴ�</span>',
				//button_text_style: '.theFont { font-size: 16; }',
				//button_text_left_padding: 12,
				//button_text_top_padding: 3,
	
	
				// Flash Settings
				flash_url : "../plugins/swfupload/swfupload.swf",
	
				custom_settings : {
					progress_target : "fsUploadProgressup1",
					upload_successful : false
				},
	
				// Debug settings
				debug: false
			});
	
		};
	</script><input type='text' id='txtFileNameup1' disabled='true' style='border: solid 1px; background-color: #FFFFFF;' />
			<span id='upspanareaup1'></span>(ֻ���ϴ�jpg;png;gif;bmpͼƬ����)
			<div style="text-align:center;margin:0 auto;" class='flash' id='fsUploadProgressup1'>
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
			The Handlers (in handlers.js) process the upload events and make the UI updates -->
			</div>
           	<input type='hidden' name='litpic' id='litpic' value='' />
			<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/fileprogress.js'></script>
            <script type='text/javascript' src='../plugins/swfupload/js/handlers.js'></script>	
	<script type='text/javascript'>
	//
  function swfUploadLoadedup1() {
	var btnSubmit = document.getElementById("sub");
	
	btnSubmit.onclick = doSubmitup1;
	
  }
  /*******************************/
  //
  function fileDialogStartup1() {
	var txtFileName = document.getElementById("txtFileNameup1");
	txtFileName.value = "";

	this.cancelUpload();
  }
  
  function fileQueuedup1(file) {
	try {
		var txtFileName = document.getElementById("txtFileNameup1");
		txtFileName.value = file.name;
	} catch (e) {
	}

}
  /***********************/
  //
	function doSubmitup1(e) {
	try {
		uploadup1.startUpload();
	} catch (ex) {

	}
	return false;
  }
  //
	function uploadDoneup1() {
	try {
		document.forms[0].submit();
	} catch (ex) {
		alert("Error submitting form");
	}
     }
  //
	function uploadSuccessup1(file, serverData) {
	try {
	file.id = "singlefile"; // This makes it so FileProgress only makes a single UI element, instead of one for each file
	var progress = new FileProgress(file, this.customSettings.progress_target);
	progress.setComplete();
	progress.setStatus("�ϴ����.");
	progress.toggleCancel(false);
	
	if (serverData === " ") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//���ļ��ϴ����ļ�·����ֵ������hidFileID
    document.getElementById("litpic").value = serverData;
   		
	}
	
	} catch (e) {
	}
	}
	//
	function uploadCompleteup1(file) {
	try {
		if (this.customSettings.upload_successful) {
			this.setButtonDisabled(true);
			uploadDoneup1();
		} else {

			alert("�ϴ������Ժ�����.");
		}
	} catch (e) {
	}
}

	</script><script type='text/javascript'>
		//��ʼ������
		var uploadup1;
		window.onload = function () {
			uploadup1 = new SWFUpload({
				// Backend settings
				upload_url: "plugins/swfupload/upload.php",
								post_params: {'PHPSESSID' :'<? echo $this->magic_vars['_G']['user_id'];?>'},
						
												
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : 2048,	// �ϴ��ļ���С
				file_types : '*.jpg;*.png;*.gif;*.bmp',			// or you could use something like: '*.doc;*.wpd;*.pdf',
				file_types_description : '*.jpg;*.png;*.gif;*.bmp',
				file_upload_limit : '1',
				file_queue_limit : '1',
	
				// Event handler settings
				swfupload_loaded_handler : swfUploadLoadedup1,
	
				file_dialog_start_handler: fileDialogStartup1,
				file_queued_handler : fileQueuedup1,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
	
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccessup1,
				upload_complete_handler : uploadCompleteup1,
	
				// Button Settings
				button_image_url: "../plugins/swfupload/mybutton.png",
				button_placeholder_id  :"upspanareaup1",
		    	button_width: 61,
			 	button_height: 22,
				//button_text: '<span class='theFont'>ѡ���ϴ�</span>',
				//button_text_style: '.theFont { font-size: 16; }',
				//button_text_left_padding: 12,
				//button_text_top_padding: 3,
	
	
				// Flash Settings
				flash_url : "../plugins/swfupload/swfupload.swf",
	
				custom_settings : {
					progress_target : "fsUploadProgressup1",
					upload_successful : false
				},
	
				// Debug settings
				debug: false
			});
	
		};
	</script><input type='text' id='txtFileNameup1' disabled='true' style='border: solid 1px; background-color: #FFFFFF;' />
			<span id='upspanareaup1'></span>(ֻ���ϴ�jpg;png;gif;bmpͼƬ����)
			<div style="text-align:center;margin:0 auto;" class='flash' id='fsUploadProgressup1'>
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
			The Handlers (in handlers.js) process the upload events and make the UI updates -->
			</div>
           	<input type='hidden' name='litpic' id='litpic' value='' />
			<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->
	<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/swfupload.queue.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/fileprogress.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/handlers.js'></script>
			<script type='text/javascript'>
			//��ʼ������
	  var uploadup2 ;
		window.onload = function() {
			 uploadup2 = new SWFUpload({
				// Backend Settings
				upload_url: "plugins/swfupload/upload.array.php",
				post_params: {'PHPSESSID' :'<? echo $this->magic_vars['_G']['user_id'];?>'},
						
													
				// File Upload Settings
				file_size_limit : 2048,	// �ļ���С
				file_types : '*.jpg;*.png;*.gif;*.bmp',
				file_types_description : '*.jpg;*.png;*.gif;*.bmp',
				file_upload_limit : '10',
				file_queue_limit : '10',
	
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
				button_image_url: "../plugins/swfupload/mybutton.png",
				button_placeholder_id :"upspanareaup2",
				button_width: 61,
				button_height: 22,

				// Flash Settings
				flash_url : "../plugins/swfupload/swfupload.swf",
				custom_settings : {
					progressTarget : "fsUploadProgressup2",
					cancelButtonId : "btnCancelup2"
				},
	
				// Debug Settings
				debug: false
			});
	
	     }
	</script><div>
						<div class='fieldset flash' id='fsUploadProgressup2'>
							<span class='legend'>�������֤���ϴ�</span>
						</div>
						<div style='padding-left: 5px;float:left'>
							<span id='upspanareaup2'></span>
							<input id='btnCancelup2' type='button' value='ȡ���ϴ�' onclick='cancelQueue(uploadup2);' 
									disabled='disabled' style='margin-left: 2px; height: 22px; font-size: 8pt;' />
							<br />
						</div>
					</div>