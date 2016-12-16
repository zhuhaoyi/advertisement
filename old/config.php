<?php
error_reporting(0);
session_start();
	// database host 数据库连接地址
$db_host   = "localhost";
// database name 数据库名称
$db_name   = "a0613130630";
//$db_name   = "test";

// database username数据库用户名
$db_user   = "root";
//$db_user   = "root";

// database password数据库的密码
$db_pass   = "zhuhao1";
//$db_pass   = "";
$sjiecn='1CJ5XdWuCIL3sRSGNoRl0e8YxQ';//防伪标签
if($_GET['id']!=""){
	if(is_numeric($_GET['id'])){
		$_GET['id']=$_GET['id'];
	}else{
	die('您的操作有误，请返回继续浏览!');	
	}
}
require('class/hi.php');
?>