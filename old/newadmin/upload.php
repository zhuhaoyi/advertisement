<?php 
require('../config.php');
require_once('chink.php');
require('../class/class.php');
require('../class/class_json.php');
header("Content-type:text/html;charset=gbk");
/**PHP�ϴ������demo
 * $upload = new upload('upload') ������uploadָ�������ϴ��ļ�<input type="file" name="upload">
 */
$thumb =0;  //Ĭ�Ͽ�������ͼ
$maxszie = 5; //�����ϴ��ļ���С MBΪ��λ
$ext = array('jpg','gif','png','bmp'); //�����ϴ��ļ�����
$upload = new upload('upload',$maxszie,$ext,$thumb);

//����iscanupload����
$upload->canupload();

?>