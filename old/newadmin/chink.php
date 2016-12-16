<?php
if(empty($_SESSION['adminid']) or empty($_SESSION['adminname']) or empty($_SESSION['key'])){
	echo "<script language='javascript'>alert('已超时，请重新登陆。');location.replace('/admin.php');</script>";
	die();
}
	
?>