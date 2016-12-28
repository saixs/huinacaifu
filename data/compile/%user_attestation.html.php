<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?><link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/main.css" rel="stylesheet" type="text/css" /><link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/user.css" rel="stylesheet" type="text/css" /><!--用户中心的主栏目 开始--><div class="wrap950 mar10">	<!--左边的导航 开始-->	<div class="user_left">		<? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>	</div>	<!--左边的导航 结束-->		<!--右边的内容 开始-->	<div class="user_right">		<div class="user_right_menu">			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="myuser"): ?>			<ul>				<li class="title" >客户管理</li>				<li ><a href="index.php?user&q=code/user/myuser">我的客服</a></li>				<li ><a href="index.php?user&q=code/borrow/myuser">客户借款</a></li>			</ul>			<? else: ?>			<ul>				<li class="title" ><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">证明信息 </a></li>				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="list"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>">证明材料</a></li>				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="one"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/one">单个资料上传</a></li>				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="qi"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/qi">七夕活动照片上传</a></li>				<li <? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="more"): ?> class="current"<? endif; ?>><a href="<? if (!isset($this->magic_vars['_U']['query_url'])) $this->magic_vars['_U']['query_url'] = ''; echo $this->magic_vars['_U']['query_url']; ?>/more">多个资料上传</a></li>			</ul>			<? endif; ?>		</div>		<!--收件箱 开始-->		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;if (  $this->magic_vars['_U']['query_type']=="list"): ?>		<div class="user_right_main">			<table  border="0"  cellspacing="0" class="user_list_table">			<form action="" method="post" id="form1">				<tr class="head" >				<td>说明信息 </td>				<td>资料类型</td>				<td>上传时间 </td>				<td>审核时间</td>				<td>审核说明</td>				<td>积分 </td>				<td>状态</td>				<td>操作</td>				</tr>			<? $this->magic_vars['query_type']='GetList';$data = array('showpage'=>'3','var'=>'loop','user_id'=>'0','epage'=>'20','user_id'=>$this->magic_vars['_G']['user_id']);$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['_G']['class_pages']->set_data($this->magic_vars['magic_result']); $this->magic_vars['loop']['showpage'] =  $this->magic_vars['_G']['class_pages']->show(3);?>				<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>				<td><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['type_name'])) $this->magic_vars['item']['type_name'] = ''; echo $this->magic_vars['item']['type_name']; ?></td>				<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['verify_time'])) $this->magic_vars['item']['verify_time'] = '';$_tmp = $this->magic_vars['item']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark'] = '';$_tmp = $this->magic_vars['item']['verify_remark'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['jifen'])) $this->magic_vars['item']['jifen'] = '';$_tmp = $this->magic_vars['item']['jifen'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?> 分</td>				<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>未审核<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>审核失败<? else: ?>已审核<? endif; ?></td>								<td><a href="<? if (!isset($this->magic_vars['item']['litpic'])) $this->magic_vars['item']['litpic'] = ''; echo $this->magic_vars['item']['litpic']; ?>" target="_blank">[查看]</a> | <a href="/index.php?user&q=code/attestation/del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">[删除]</a></td>								</tr>				<? endforeach; endif; unset($_from); ?>				<tr >					<td colspan="11" class="page">						<? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?>					</td>				</tr>				<? unset($_magic_vars); ?>			</form>				</table>			<!--收件箱 结束-->		</div>		<!--我的客户 开始-->		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="myuser"): ?>			<div class="user_right_main">			<table  border="0"  cellspacing="0" class="user_list_table">			<form action="" method="post" id="form1">				<tr class="head" >				<td>说明信息 </td>				<td>资料类型</td>				<td>上传时间 </td>				<td>审核时间</td>				<td>审核说明</td>				<td>积分 </td>				<td>状态</td>				</tr>				<? $this->magic_vars['query_type']='GetList';$data = array('kefu_userid'=>$this->magic_vars['_G']['user_id'],'var'=>'item','limit'=>'all','user_id'=>$_REQUEST['user_id']);$default = '';  include_once(ROOT_PATH.'modules/attestation/attestation.class.php');$this->magic_vars['magic_result'] = attestationClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['item']):
?>				<tr  <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr1"<? endif; ?>>				<td><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = '';$_tmp = $this->magic_vars['item']['name'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['type_name'])) $this->magic_vars['item']['type_name'] = ''; echo $this->magic_vars['item']['type_name']; ?></td>				<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['verify_time'])) $this->magic_vars['item']['verify_time'] = '';$_tmp = $this->magic_vars['item']['verify_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d H:i");$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['verify_remark'])) $this->magic_vars['item']['verify_remark'] = '';$_tmp = $this->magic_vars['item']['verify_remark'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>				<td><? if (!isset($this->magic_vars['item']['jifen'])) $this->magic_vars['item']['jifen'] = '';$_tmp = $this->magic_vars['item']['jifen'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?> 分</td>				<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status']==0): ?>未审核<? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;elseif (  $this->magic_vars['item']['status']==2): ?>审核失败<? else: ?>已审核<? endif; ?></td>												</tr>				<? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>			</form>				</table>			<!--我的客户 结束-->		</div>		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="one"): ?>		<div class="user_right_main">			<form action="" name="form1" method="post" onsubmit="return check_form()" enctype="multipart/form-data">			<div class="user_help"><font color="#FF0000">*</font> 必须是本人的相关资料<br />			<font color="#FF0000">*</font> 真实 有效<br /></div>			<div class="user_right_border">				<div class="l">资料上传：</div>				<div class="c" >								<link href='../plugins/swfupload/css/default.css' rel='stylesheet' type='text/css' />
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
	progress.setStatus("上传完成.");
	progress.toggleCancel(false);
	
	if (serverData === " ") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//将文件上传的文件路径等值反馈给hidFileID
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

			alert("上传有误，稍候再试.");
		}
	} catch (e) {
	}
}

	</script><script type='text/javascript'>
		//初始化对象
		var uploadup1;
		window.onload = function () {
			uploadup1 = new SWFUpload({
				// Backend settings
				upload_url: "plugins/swfupload/upload.php",
								post_params: {'PHPSESSID' :'<? echo $this->magic_vars['_G']['user_id'];?>'},
						
												
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : 2048,	// 上传文件大小
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
				//button_text: '<span class='theFont'>选择上传</span>',
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
			<span id='upspanareaup1'></span>(只能上传jpg;png;gif;bmp图片类型)
			<div style="text-align:center;margin:0 auto;" class='flash' id='fsUploadProgressup1'>
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
			The Handlers (in handlers.js) process the upload events and make the UI updates -->
			</div>
           	<input type='hidden' name='litpic' id='litpic' value='' />
			<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->				<!-- <input type="file" name="litpic" /> 上传最大的图片为1M，上传的格式为jpg.gif -->					</div>			</div>			<div class="user_right_border">				<div class="l">上传类型：</div>				<div class="c">					<select name="type_id">					<?  if(!isset($this->magic_vars['_U']['attestation_type_list']) || $this->magic_vars['_U']['attestation_type_list']=='') $this->magic_vars['_U']['attestation_type_list'] = array();  $_from = $this->magic_vars['_U']['attestation_type_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>					<option value="<? if (!isset($this->magic_vars['item']['type_id'])) $this->magic_vars['item']['type_id'] = ''; echo $this->magic_vars['item']['type_id']; ?>"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></option>					<? endforeach; endif; unset($_from); ?>					</select>				</div>			</div>			<div class="user_right_border">				<div class="l">备注说明：</div>				<div class="c">					<textarea cols="50" rows="5" name="name"></textarea>				</div>			</div>			<div class="user_right_border">				<div class="e"></div>				<div class="c">					<input type="submit" id="sub" name="sub" value="确认提交" size="30" /> 				</div>			</div>			</form>			<div class="user_right_foot">			* 温馨提示：我们将严格对用户的所有资料进行保密			</div>		</div>			<script>				function check_form(){					 var frm = document.forms['form1'];					 var file = frm.elements['litpic'].value;					 var errorMsg = '';					  if (file.length == 0 ) {						errorMsg += '* 图片不能为空' + '\n';					  }					 					  if (errorMsg.length > 0){						alert(errorMsg); return false;					  } else{  						return true;					}								}			</script>			<!--修改登录密码 结束-->			<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="qi"): ?>		<div class="user_right_main">			<form action="" name="form1" method="post" onsubmit="return check_form()" enctype="multipart/form-data">			<div class="user_help"><font color="#FF0000">*</font> 上传情侣照<br /></div>			<div class="user_right_border">				<div class="l">图片上传：</div>				<div class="c" >				<link href='../plugins/swfupload/css/default.css' rel='stylesheet' type='text/css' />
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
	progress.setStatus("上传完成.");
	progress.toggleCancel(false);
	
	if (serverData === " ") {
	this.customSettings.upload_successful = false;
	} else {
	this.customSettings.upload_successful = true;
	//将文件上传的文件路径等值反馈给hidFileID
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

			alert("上传有误，稍候再试.");
		}
	} catch (e) {
	}
}

	</script><script type='text/javascript'>
		//初始化对象
		var uploadup1;
		window.onload = function () {
			uploadup1 = new SWFUpload({
				// Backend settings
				upload_url: "plugins/swfupload/upload.php",
								post_params: {'PHPSESSID' :'<? echo $this->magic_vars['_G']['user_id'];?>'},
						
												
				file_post_name: 'resume_file',
	
				// Flash file settings
				file_size_limit : 2048,	// 上传文件大小
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
				//button_text: '<span class='theFont'>选择上传</span>',
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
			<span id='upspanareaup1'></span>(只能上传jpg;png;gif;bmp图片类型)
			<div style="text-align:center;margin:0 auto;" class='flash' id='fsUploadProgressup1'>
			<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
			The Handlers (in handlers.js) process the upload events and make the UI updates -->
			</div>
           	<input type='hidden' name='litpic' id='litpic' value='' />
			<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->				<!-- <input type="file" name="litpic" /> 上传最大的图片为1M，上传的格式为jpg.gif -->					</div>			</div>			<div class="user_right_border">				<div class="l">上传类型：</div>				<div class="c">					<select name="type_id">					<option value="35">情侣照片</option>					</select>				</div>			</div>			<div class="user_right_border">				<div class="l">备注说明：</div>				<div class="c">					<textarea cols="50" rows="5" name="name"></textarea>				</div>			</div>			<div class="user_right_border">				<div class="e"></div>				<div class="c">					<input type="submit" id="sub" name="sub" value="确认提交" size="30" /> 				</div>			</div>			</form>			<div class="user_right_foot">			* 温馨提示：我们将严格对用户的所有资料进行保密			</div>		</div>			<script>				function check_form(){					 var frm = document.forms['form1'];					 var file = frm.elements['litpic'].value;					 var errorMsg = '';					  if (file.length == 0 ) {						errorMsg += '* 图片不能为空' + '\n';					  }					 					  if (errorMsg.length > 0){						alert(errorMsg); return false;					  } else{  						return true;					}								}			</script>		<? if (!isset($this->magic_vars['_U']['query_type'])) $this->magic_vars['_U']['query_type']=''; ;elseif (  $this->magic_vars['_U']['query_type']=="more"): ?>		<div class="user_right_main">			<!--<form action="" name="form1" method="post" onsubmit="return check_form()" enctype="multipart/form-data">-->							<div class="user_help"><font color="#FF0000">*</font> 必须是本人的相关资料<br />					<font color="#FF0000">*</font> 真实 有效<br />			</div>			<!-- 多选文件上传 -->			<link href='../plugins/swfupload/css/default.css' rel='stylesheet' type='text/css' />
	<script type='text/javascript' src='../plugins/swfupload/swfupload.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/swfupload.queue.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/fileprogress.js'></script>
	<script type='text/javascript' src='../plugins/swfupload/js2/handlers.js'></script>
			<script type='text/javascript'>
			//初始化对象
	  var uploadup2 ;
		window.onload = function() {
			 uploadup2 = new SWFUpload({
				// Backend Settings
				upload_url: "plugins/swfupload/upload.array.php",
				post_params: {'PHPSESSID' :'<? echo $this->magic_vars['_G']['user_id'];?>'},
						
													
				// File Upload Settings
				file_size_limit : 2048,	// 文件大小
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
				//上传选择区域
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
							<span class='legend'>多个资料证明上传</span>
						</div>
						<div style='padding-left: 5px;float:left'>
							<span id='upspanareaup2'></span>
							<input id='btnCancelup2' type='button' value='取消上传' onclick='cancelQueue(uploadup2);' 
									disabled='disabled' style='margin-left: 2px; height: 22px; font-size: 8pt;' />
							<br />
						</div>
					</div>						<!-- 			upload_url="plugins/swfupload/upload.array.php"			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="700" height="500">  <param name="movie" value="/plugins/swfupload/swfupload.swf?config=/index.php%3fplugins%26ac=swfupload%26code=attestation" />  <param name="quality" value="high" />  <embed src="/plugins/swfupload/swfupload.swf?config=/index.php%3fplugins%26ac=swfupload%26code=attestation" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="700" height="500"></embed></object>			<div class="user_right_border">				<div class="e"></div>				<div class="c">					<input type="submit"  value="确认提交" size="30" /> 				</div>			</div>			</form> -->	</div>					<? endif; ?></div></div><!--用户中心的主栏目 结束--><? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>