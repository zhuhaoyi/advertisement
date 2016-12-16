<?php
	require('../config.php');
	require('../class/class.php');
	require_once ("../Classes/PHPExcel.php"); 
	require_once ('../Classes/PHPExcel/IOFactory.php'); 
	require_once ('../Classes/PHPExcel/Writer/Excel5.php'); 
	//require_once ('../Classes/phpExcel/Writer/Excel2007.php'); 

	date_default_timezone_set('Asia/Shanghai'); //设定中国时区
	$start = mktime(0,0,0,date('m'),date('d')-1,date('Y'));//获取昨天开始的时间（例如2016/6/29 0:0:0）
	$end = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;//获取昨天开始的时间（例如2016/6/29 23:59:59）
	//echo $start .'--'.$end;
	$data = $db->query("select mobile,phone_seatof from hi_zhenggu where add_time>='".$start."' and add_time<='".$end."'");
	//var_dump($data);
	
	$phpexcel = new PHPExcel();  
	
	//设置比标题
	$phpexcel->getActiveSheet()->setTitle('诊股手机号管理');
	//设置表头
	$phpexcel->getActiveSheet()->setCellValue('A1','电话号码')
                            ->setCellValue('B1','归属地');
	//用foreach从第二行开始写数据，因为第一行是表头
$i=2;
foreach($data as $key=>$val){
	echo '123';exit;
    $phpexcel->getActiveSheet()->setCellValue('A'.$i,$val['mobile'])
                            ->setCellValue('B'.$i, $val['phone_seatof']);
    $i++;
}
   
 
$obj_Writer = PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
$filename = date('Y-m-d-H-i-s').".xls";//文件名
 
//设置header
header("Content-Type:application/force-download"); 
header("Content-Type:application/octet-stream"); 
header("Content-Type:application/download"); 
header('Content-Disposition:inline;filename="'.$filename.'"'); 
header("Content-Transfer-Encoding:binary"); 
header("Last-Modified:".gmdate("D,d M Y H:i:s")."GMT"); 
header("Cache-Control:must-revalidate,post-check=0,pre-check=0"); 
header("Pragma:no-cache"); 
$obj_Writer->save('php://output');//输出
//终止执行


?>