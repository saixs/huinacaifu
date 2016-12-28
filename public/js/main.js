// JavaScript Document
$('.r_online li').hover(function(){
	$(this).find('.r_line_m').stop(true).animate({width:'136px', left:'0px'},'fast');
},function(){
	$(this).find('.r_line_m').stop(true).animate({width:'0px', left:'136px'},'fast');	
});


if($('.home_roll_win li').length > 4) {
	$(".home_roll_win").jCarouselLite({
		visible: 4,
		auto: 4000
	});
}
$('.mail_1f h2 ul a').click(function(){
	$('.mail_1f h2 ul a').removeClass('active');
	$(this).addClass('active');
});
$('.mail_tab .t_head :checkbox').click(function(){
	if(this.checked){
		$('.mail_tab :checkbox').prop('checked', true);
	}
	else {
		$('.mail_tab :checkbox').prop('checked', false);
	}
});
$('.choalread').click(function(){
	$('.mail_tab :checkbox').prop('checked', false);
	$('.mail_tab .is_read :checkbox').prop('checked', true);
});
$('.chonoread').click(function(){
	$('.mail_tab :checkbox').prop('checked', true);
	$('.mail_tab .is_read :checkbox,.mail_tab .t_head :checkbox').prop('checked', false);
});





function AJAXClass(aItemName,path) {
	this.aItemName = aItemName;
	this.path = path;
	if (typeof AJAXClass._initialized == "undefined") {
		AJAXClass.prototype.GetAjaxObject = function() {
			var ajaxObj = null;
			try {
				ajaxObj=new XMLHttpRequest();	// Firefox, Opera 8.0+, Safari
			}catch (e){							// Internet Explorer
				try	{
					ajaxObj=new ActiveXObject("Msxml2.XMLHTTP");		//msxml3.dll或以上版本
				}catch (e){
					ajaxObj=new ActiveXObject("Microsoft.XMLHTTP");		//msxml2.6或以下版本
				}
			}
			return ajaxObj;
		};

		AJAXClass.prototype.AJAXRequest = function(buildRequest) {
			XMLHttp = null;
			XMLHttp = this.GetAjaxObject();
			XMLHttp.open('post',this.path,true);
			XMLHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			XMLHttp.onreadystatechange = this.get_response;
			var request = '';
			if (buildRequest == '') {
				for (var i = 0; i<this.aItemName.length; i++) {
					var currentValue = document.getElementById(this.aItemName[i]).value;
					request = request+'&'+this.aItemName[i]+'='+currentValue;
				}
			} else {
				request = buildRequest;
			}
			document.getElementById(inputId).innerHTML = '';
			document.getElementById(inputId).innerHTML = '<img style="display:block; margin: 0 auto;" src="/public/images/loading.gif" />';
			XMLHttp.send(request);
		};

		AJAXClass.prototype.get_response = function() {
			if (XMLHttp.readyState == 4) {
				document.getElementById(inputId).innerHTML = '';
				document.getElementById(inputId).innerHTML = XMLHttp.responseText;
			}
		};
		AJAXClass._initialized = true;
	}
};
