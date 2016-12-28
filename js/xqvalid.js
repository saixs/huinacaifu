/*
*兮穹表单验证插件
*/
(function($){
	var settings;
	var dis = new Object;
	var nb = 0;
	var ay= new Array();
	var an= new Array();
	$.fn.xqvalid=function(callerSettings){
		settings = $.extend(
		{tp:1,ajmsg:0}
		,callerSettings||{}
		)
		if(settings.tp == 2){
			if($(".xq_msgbox").length >0){
				$(".xq_msgbox").hide();
			}
		}
		var mydom= $(this).find("input:not(:submit,:hidden) ");
		var opem = new Object;
		var nb= 0;
		 $.each(mydom,function(k,v){	
				var dtype = $("#"+v.id).attr("dtype");	
				if(dtype!=null ||typeof(dtype) != "undefined"){
				   opem[k]=v;
				   nb = nb +1
				}
		 });			
	    $.each(opem,function(k,v){			
           dis[v.id] = 0; 
		   var checktipDom = $("#"+v.id).parent().find(".xq_msgbox"); 
								   
           $("#"+v.id).live("blur",function(){
			  var xdom = $(this);
			  var val = xdom.attr("value");
			  var dtype = xdom.attr("dtype");			 
			  var errormsg = xdom.attr("emsg");				
			  var pattn = getType(dtype);
			  var recheck = xdom.attr("recheck");
			  var aurl = xdom.attr("aurl");
			  if(recheck!=null ||typeof(recheck) != "undefined"){//两次输入是否相同
				  var leval = $("#"+recheck).attr("value");
				  if(val == leval){
					  tip(xdom,settings,1)
					  dis[v.id] = 1; 
				  }else{
					  tip(xdom,settings,0)
					  dis[v.id] = 0; 
				  }
			  }else{
				  if(val.length< pattn.mi_len || val.length> pattn.mx_len){
					  tip(xdom,settings,0)
					  dis[v.id] = 0; 
				  }else if(!pattn.pattn.test(val)){
					  tip(xdom,settings,0)
					  dis[v.id] = 0; 
	
				  }else{
					  if(aurl!=null ||typeof(aurl) != "undefined"){
						  if($.inArray(val,ay)>=0){
								tip(xdom,settings,1)
								dis[v.id] = 1;
								//alert($.inArray(val,ay))
						  }else if($.inArray(val,an)>=0){
								settings['ajmsg'] = "已被占用";
								tip(xdom,settings,0)
								dis[v.id] = 0; 	
								settings['ajmsg'] =0;  
								//alert($.inArray(val,an))
						  }else{
					          var mydata={'url':aurl,'param':v.id,'val':val};
							  if(xq_Unique(mydata)){
								tip(xdom,settings,1)
								dis[v.id] = 1; 	
								ay.push(val);
							  }else{
								settings['ajmsg'] = "已被占用";
								tip(xdom,settings,0)
								dis[v.id] = 0; 	
								settings['ajmsg'] =0;
								an.push(val);
							  }							  
						  }
					  }else{
						tip(xdom,settings,1)
						dis[v.id] = 1; 
					  }
				  }
			  }
								   
			});
		   
		   $("#"+v.id).live("focus",function(){
					$(this).css("background","#FFE7E7");
		   });
			
					 
	  })
		 
	    $(this).submit(function(){
		    if(!resub(dis,nb)){
				//alert(" 注册信息不完整"+settings.tp)
		    //return false;
			return true;
			}else{
				
				return true;
			}

	    })
		
		$(".xq_close").live("click",function(){
			$(".xq_tip2").hide();								 
		});
		
		return this;
	}


    //gettype返回验证类型
	function getType(pa){
		var str;
		 str = pa.split("|");
		var le = str[1].split("-")
		var mi_len = le[0]?parseInt(le[0]):4;	
		var mx_len = le[1]?parseInt(le[1]):20;
		var pattn;
		if(str[0] == "s"){
			pattn = /^([a-zA-Z0-9_]|[\u4E00-\u9FA5]){2,15}$/;
		}else if(str[0] == "e"){
			pattn = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
		}else if(str[0] == "z"){
			pattn = /^[\u4E00-\u9FA5\uf900-\ufa2d]{2,4}$/;
		}else if(str[0] == "p"){
			pattn = /^1[3|4|5|8][0-9]\d{4,8}$/;
		}else{
			pattn = /^([a-zA-Z0-9_]|[\u4E00-\u9FA5]){2,15}$/;
		}
		var robj = {'mi_len':mi_len,'mx_len':mx_len,'pattn':pattn}
		return robj;
		
	}
	
	function resub(dis,nb){
			var n = 0;
			//var l = 0;
			$.each(dis,function(k,v){
				 n = n +v	
				// l=l+1;
				 
			})
			var r = n<nb ?false:true;
			return r;
	}
	/*
	*提示实现xdom操作对象，tp提示类型，rn：错误提示还是正确提示 都为必填参数
	*/
	function tip(xdom,settings,rn){
		var bgcss = xdom.css("background");
		
		
		var tmsg = xdom.attr("tmsg");
		if(settings.ajmsg !=0){
			var emsg = settings.ajmsg;
		}else{
			var emsg = xdom.attr("emsg");
		}
		var n_id = xdom.attr("id");
		tmsg = tmsg!=null ||typeof(tmsg) != "undefined" ?tmsg :"验证通过";
		var checktipDom = xdom.parent().find(".xq_msgbox");
		//提示1——提示信息放 class=xq_msgbox元素中
		var tmsgdom = $("<span style='color:#669933'></span>");
		    tmsgdom.append(tmsg);
		var emsgdom = $("<span style='color:#ff0000'></span>");
		    emsgdom.append(emsg);
		var credom = rn ==1 ? tmsgdom :emsgdom
		if(settings.tp ==1){			
			checktipDom.empty();
			checktipDom.append(credom);
		}
		if(settings.tp ==2){
			
			var dleft = xdom.offset().left
			var dtop = xdom.offset().top
			var dwidth = xdom.width();
			var left = dleft + dwidth +5;
			if($("#"+n_id+"etip").length == 0){
				var ndom = $("<div id='"+n_id+"etip' class='xq_tip'></div>");				
			}else{
				var ndom = $("#"+n_id+"etip");
			}
			ndom.empty();
			ndom.append(credom);

			ndom.css("position","absolute");
			ndom.css("left",left+"px");
			ndom.css("top",dtop+"px");
			xdom.parent().append(ndom); 
		}
	   if(settings.tp ==3){
	      if($(".xq_tip2").length == 0){
			  var ndom = $("<div class='xq_tip2'></div>");
			  var ndom_top=($("<div class='top'><div class='xq_close'>×</div></div>"))
			  var ndom_con=$("<div class='tip2_content'></div>");
			  ndom_con.empty();
			  ndom_con.append(credom);
			 ndom.append(ndom_top);
			 ndom.append(ndom_con);
			 ndom.css("position","absolute");
			 ndom.css("left","550px");
			 ndom.css("top","350px");	
			 $(document.body).append(ndom);
			 
			}else{
				  $(".tip2_content").empty();
				  $(".tip2_content").append(credom);
			  	$(".xq_tip2").show();
			}
		}
		 if(settings.tp ==4){
			  if(rn ==1){
                 alert(tmsg);
			  }else{
                 alert(emsg);
			  }
		 }
		if(rn ==1){
           xdom.css("background",bgcss);
		}else{
           xdom.css("background","#FFE7E7");
		}			
		
	}

	function xq_Unique(mydata){
		var temp;
		var mdata={'param':mydata.param,'val':mydata.val};
		var url =mydata.url
		  $.ajax({			
			  type:"POST",
			  dataType: 'json',
			  data:mdata,
			  cache:false,
			  async:false,
			  url:url,
			  success: function(dat){
				   //var mp = jq("<p>"+dat.hp+"||"+dat.ret+"</p>");
					temp=  dat.status;
				   //jq("#aac").append(mp);
			  }
		 });	
		  //alert(temp)
		  if(temp =="y"){		
		  
		    return 1;
		  }else{
			return 0;
		  }
	}

})(jQuery);