<?php
	require('../config.php');
	require('../class/class.php');
	require_once ("../Classes/PHPExcel.php"); 
	require_once ('../Classes/PHPExcel/IOFactory.php'); 
	require_once ('../Classes/PHPExcel/Writer/Excel5.php'); 
	//require_once ('../Classes/phpExcel/Writer/Excel2007.php'); 

	date_default_timezone_set('Asia/Shanghai'); //�趨�й�ʱ��
	$start = mktime(0,0,0,date('m'),date('d')-1,date('Y'));//��ȡ���쿪ʼ��ʱ�䣨����2016/6/29 0:0:0��
	$end = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;//��ȡ���쿪ʼ��ʱ�䣨����2016/6/29 23:59:59��
	//echo $start .'--'.$end;
	$data = $db->query("select mobile,phone_seatof from hi_zhenggu where add_time>='".$start."' and add_time<='".$end."'");
	//var_dump($data);
	
	$phpexcel = new PHPExcel();  
	
	//���ñȱ���
	$phpexcel->getActiveSheet()->setTitle('����ֻ��Ź���');
	//���ñ�ͷ
	$phpexcel->getActiveSheet()->setCellValue('A1','�绰����')
                            ->setCellValue('B1','������');
	//��foreach�ӵڶ��п�ʼд���ݣ���Ϊ��һ���Ǳ�ͷ
$i=2;
foreach($data as $key=>$val){
	echo '123';exit;
    $phpexcel->getActiveSheet()->setCellValue('A'.$i,$val['mobile'])
                            ->setCellValue('B'.$i, $val['phone_seatof']);
    $i++;
}
   
 
$obj_Writer = PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
$filename = date('Y-m-d-H-i-s').".xls";//�ļ���
 
//����header
header("Content-Type:application/force-download"); 
header("Content-Type:application/octet-stream"); 
header("Content-Type:application/download"); 
header('Content-Disposition:inline;filename="'.$filename.'"'); 
header("Content-Transfer-Encoding:binary"); 
header("Last-Modified:".gmdate("D,d M Y H:i:s")."GMT"); 
header("Cache-Control:must-revalidate,post-check=0,pre-check=0"); 
header("Pragma:no-cache"); 
$obj_Writer->save('php://output');//���
//��ִֹ��


?>