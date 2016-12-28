<?php
//session_cache_limiter('private,must-revalidate');
session_start();
if(empty($_SESSION['username'])){
echo "k";
}else{
	
	echo $_SESSION['username'];
}



?>