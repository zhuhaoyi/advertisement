<?php
if(empty($_SESSION['adminid']) or empty($_SESSION['adminname']) or empty($_SESSION['key'])){
	echo "<script language='javascript'>alert('�ѳ�ʱ�������µ�½��');location.replace('/admin.php');</script>";
	die();
}
	
?>