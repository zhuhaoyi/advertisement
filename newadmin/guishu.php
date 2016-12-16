<?php 
header("content-type:text/html; charset=utf-8"); 
$mobile = @$_GET['mobile'];
//echo $mobile;
$phone = simplexml_load_file('http://life.tenpay.com/cgi-bin/mobile/MobileQueryAttribution.cgi?chgmobile='.$mobile.''); 
$sheng =$phone->province;
$shi =$phone->city;
$yunying =$phone->supplier;
echo "$sheng$shi$yunying"; 
?> 
<html>
<head>
<style>
body{font-size: 12px;
    font-family: "宋体";}
</style>
	</head>
<html>
