<?php
require_once '../config.php';
require_once('chink.php');
include "../class/pager.class.php";

if ($_GET['source'] == 'zg') {
    $table = 'hi_zhenggu';
} elseif ($_GET['source'] == 'sg') {
    $table = 'hi_suogu';
}
$db->query("set character set 'utf8'");//读库
$db->query("select * from " . $table . " where del_flg='0' order by id desc");
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="user.csv"');
header("Cache-Control: max-age=0");
$fp = fopen('php://output', 'a');
while ($row = $db->fetch_array($rs)) {
    fputcsv($fp, array($row['id'], $row['mobile'] . ' ', $row['phone_seatof'], $row['ip'] . $row['ipcity'], $row['laiurl'], date('Y-m-d H:i:s', $row['add_time'])));
}
