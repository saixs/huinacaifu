<?
include ("../core/config.inc.php");
$q = !isset($_REQUEST['q']) ? "" : $_REQUEST['q'];
$qa = array('apply', 'area', 'areas', 'count', 'imgcode', 'imgurl', 'liandong', 'linkage', 'procity', 'proschool', 'prosite', 'protime', 'school', 'upload', 'uploadannex', 'uploadimg', 'user');

if (in_array($q,$qa)){
	$file = "html/" . $q . ".inc.php";
	if (file_exists($file)) {
		include_once ($file);
		exit;
	}
} else {
	die('非法请求!');
}


?>
