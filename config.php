<?php
error_reporting(0);
session_start();
	// database host ���ݿ����ӵ�ַ
$db_host   = "localhost";
// database name ���ݿ�����
$db_name   = "a0613130630";
// database username���ݿ��û���
$db_user   = "root";
// database password���ݿ������
$db_pass   = "pDaaOuxBCdnsdrT6wtVp";
$sjiecn='1CJ5XdWuCIL3sRSGNoRl0e8YxQ';//��α��ǩ
if($_GET['id']!=""){
	if(is_numeric($_GET['id'])){
		$_GET['id']=$_GET['id'];
	}else{
	die('���Ĳ��������뷵�ؼ������!');	
	}
}
require('class/hi.php');
?>