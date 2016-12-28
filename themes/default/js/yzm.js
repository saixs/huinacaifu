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

function check_yzm()
{
	var valicode = document.getElementById('valicode').value;
	if(valicode.length>=4)
	{
		var url="/core/getv.php?sid=" + Math.random();
		xmlHttp.open("GET", url, true);
		xmlHttp.onreadystatechange = ajaxShowYzm;
		xmlHttp.send(null);
	}
}

function ajaxShowYzm()
{
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) 
	{
		var yzm = xmlHttp.responseText;
		var valicode = document.getElementById('valicode').value;
		if(yzm==valicode)
		{
			document.getElementById('vyzm').style.cssText='background-image:url(/images/yes.png); width:16px; height:16px;float:left;position:relative; left:210px; top:-20px';
			document.getElementById('cyzm').value='yes';
		} else {
			document.getElementById('vyzm').style.cssText='background-image:url(/images/no.png); width:16px; height:16px;float:left;position:relative; left:210px; top:-20px';
			document.getElementById('cyzm').value='no';
		}
	}
}

var sss=0;
function show_yzm()
{
	//<img src="/plugins/index.php?q=imgcode&t=' + Math.random();" id="yzm" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" />
	if(sss==0)
	{
		document.getElementById('show_yzm').innerHTML="<img src='/plugins/index.php?q=imgcode&t=" + Math.random() + "' id='yzm' alt='点击刷新' onClick=\"this.src='/plugins/index.php?q=imgcode&t=" + Math.random() + "'\" title='点击刷新' align='absmiddle' />";
		sss++;
	}
}