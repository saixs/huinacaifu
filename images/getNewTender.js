// JavaScript Document
var xmlHttp;
try
{
	//Firefox, Opera 8.0+, Safari, Chrome
	xmlHttp=new XMLHttpRequest();
}
catch (e)
{
	//Internet Explorer
	try
	{
		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e)
	{
		try
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp = false;
		}
	}
}

function getNew()
{
	var url="/core/getNewTender.php?sid=" + Math.random();
	xmlHttp.open("GET", url, true);
	xmlHttp.onreadystatechange = ajaxShowInfo;
	xmlHttp.send(null);
	window.clearInterval(ss);
}

function ajaxShowInfo()
{
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) 
	{
		var info = xmlHttp.responseText;
		if(info!="" && info!=null)
		{
			document.getElementById("newTender").innerHTML=info;
		}
	}
}

var ss=setInterval(getNew,1);
setInterval(getNew,5000);