var tips0; 
var theTop0 = 100;
var old0 = theTop0;
function initFloatTips0() 
{ 
	tips0 = document.getElementById('lib_Tab1');
	moveTips0();
}
function moveTips0()
{
	  var tt0=50; 
	  if (window.innerHeight) 
	  {
		pos0 = window.pageYOffset  
	  }else if (document.documentElement && document.documentElement.scrollTop) {
		pos0 = document.documentElement.scrollTop  
	  }else if (document.body) {
		pos0 = document.body.scrollTop;  
	  }
	  //http:
	  pos0=pos0-tips0.offsetTop+theTop0; 
	  pos0=tips0.offsetTop+pos0/10; 
	  if (pos0 < theTop0){
		 pos0 = theTop0;
	  }
	  if (pos0 != old0) { 
		 tips0.style.top = pos0+"px";
		 tt0=10;//alert(tips.style.top);  
	  }
	  old0 = pos0;
	  setTimeout(moveTips0,tt0);
}
initFloatTips0();
if(typeof(HTMLElement)!="undefined")//给firefox定义contains()方法，ie下不起作用
	{  
	  HTMLElement.prototype.contains=function (obj)  
	  {  
		  while(obj!=null&&typeof(obj.tagName)!="undefind"){//
   　　 　if(obj==this) return true;  
   　　　	　obj=obj.parentNode;
   　　	  }  
		  return false;  
	  }
}