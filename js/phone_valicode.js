$(function(){
	 $("#sendMsg").click(function(){
		  var nub= 	$("#phone").attr("value");
		  if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(nub))){ 
			  alert("不是完整的11位手机号或者正确的手机号前七位"); 
			  return false;
		  } else{
			  var mydata = {"nub":nub};
				 $.ajax({
					  type: 'post',
					  url: '/core/phone_ajax.php',
					  data: mydata ,
					  cache: false,
					  dataType: 'json',
					  success: function(json) {
						  if(json !== null) {
								if(json.status == 1){
									alert("短信已发送到你手机上请查收");
								}else{
									alert("短信发送失败，请你稍后再发 ");
								}
						  }
					  }
				  });
		  }

	  });
});