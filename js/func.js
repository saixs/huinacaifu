var imgwidth=700;
function $(id){return document.getElementById(id);}
function show(o){document.getElementById(o).style.display="block";}
function hide(o){document.getElementById(o).style.display="none";}
function geturl(url,id){
var http=false;
$(id).innerHTML='<span class="loading">&nbsp;&nbsp;</span>';
if(window.XMLHttpRequest){http=new XMLHttpRequest();if(http.overrideMimeType){http.overrideMimeType('text/plain');}}else if(window.ActiveXObject){try{http=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{http=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
if(!http){alert('Cannot send an XMLHTTP request');return false;}
http.onreadystatechange=function(){if(http.readyState==4){$(id).innerHTML=http.responseText;}}
http.open("get", url, true);
http.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
http.send(null);
}
function imgsize(){
	var img=document.getElementById("content").getElementsByTagName("img");
	for(var i=0; i<img.length;i++){
		if(img[i].width>imgwidth){img[i].width=imgwidth;img[i].style.width=imgwidth;img[i].title="View";img[i].style.cursor="pointer";img[i].border=0;img[i].onclick=function(e){window.open(this.src);}}
	}
}


// 首页banner轮换效果
var num=5;
function getObj(objName){return(document.getElementById(objName));}
function tag(id){
getObj("searconrow2").innerHTML=getObj("produce"+id).innerHTML;
for(var i=1;i<=num;i++){
if(i==id) {
getObj("changebox"+i).className="search1";
}
else{
if(i==3 || i==(id-1)){
getObj("changebox"+i).className="search3";}
else{
getObj("changebox"+i).className="search2";}
}
}
}
function loadme(){
getObj("searconrow2").innerHTML=getObj("produce1").innerHTML;
}


//   首页滑动导航效果
function selectTag(showContent,selfObj){
	// 标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
	tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 标签内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
	j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}

function homePage(obj) {
    var url = window.location.href;
    try {

        obj.style.behavior = 'url(#default#homepage)';
        obj.setHomePage(url);
    }
    catch(e) {

        if (window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch(e) {
      
            }
            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref('browser.startup.homepage', url);
        }
    }
}
function add() {
    var url = window.location.href;
    try {
        window.external.addFavorite(url, "收藏名称");
    }
    catch(e) {
        try {
            window.sidebar.addPanel("收藏名称", url, "");
        }
        catch(e) {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }

    }

}

