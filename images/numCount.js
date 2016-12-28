// JavaScript Document
$(document).ready(function(){
for(i=1;i<=4;i++)
	{
	var numCount=$("#n"+i+" span").text().length;
	var dd=numCount*15;
	$("#n"+i+" span").css({"margin-right":"-6px"});
	$("#n"+i).css({"width":dd});
	}
});