<?php

$nowtime=time();

$ExpDate = gmdate ("D, d M Y H:i:s", $nowtime + 3600 * 24 * 15 ); // 设置15天过期

header("Expires: $ExpDate GMT");    // Date in the past

header("Last-Modified: " . gmdate ("D, d M Y H:i:s", $nowtime) . " GMT"); // always modified

header("Cache-Control: public"); // HTTP/1.1

header("Pragma: Pragma");          // HTTP/1.0


//$referurl=parse_url($_SERVER["HTTP_REFERER"]);
//$referhost=$referurl[host];
//$referpath=$referurl[path];

$url = $_REQUEST['url'];
$picurl =  Url2Key($url,"@imgurl@");
$pic = $picurl[1];
$FType=array('jpg','gif','bmp','png');
if(!in_array(strtolower(substr($pic,-3,3)),$FType)){
	echo base64_decode("PGEgaHJlZj0iaHR0cDovL3d3dy5jeWJlcnBvbGljZS5jbi93ZmpiL2h0bWwveHhnZy9pbmRleC5zaHRtbCI+sbG+qc34vq88L2E+o7rQxc+i0tG8x8K8o6E=");
	exit;
}
//$pic="../data/upfiles/images/user.jpg";
if (!file_exists(ROOT_PATH.$pic)){
	echo 1;exit;
}
$fp = fopen(ROOT_PATH.$pic,"r");
$size = filesize(ROOT_PATH.$pic);

$image = fread($fp,$size);
header("Content-type: image/JPEG",true);
echo $image;

?> 