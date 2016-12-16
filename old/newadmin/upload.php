<?php 
require('../config.php');
require_once('chink.php');
require('../class/class.php');
require('../class/class_json.php');
header("Content-type:text/html;charset=gbk");
/**PHP上传类调用demo
 * $upload = new upload('upload') 中最后的upload指的是是上传文件<input type="file" name="upload">
 */
$thumb =0;  //默认开启缩略图
$maxszie = 5; //设置上传文件大小 MB为单位
$ext = array('jpg','gif','png','bmp'); //设置上传文件类型
$upload = new upload('upload',$maxszie,$ext,$thumb);

//调用iscanupload方法
$upload->canupload();

?>