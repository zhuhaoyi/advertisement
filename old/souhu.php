<?php
require('config.php');
require('./class/class.php');
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$laiurl = $_POST['laiurl'];
$users = $_POST['users'];
if($users != ""){
	//����ҳ�洫������ֵ��niugushouhu.html��
	if($mobile != "" && $laiurl != ""){
		if(strlen($mobile) == 11){
			$exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$/";
			if(preg_match($exp,$mobile)){
				$url = file_get_contents("http://api.k780.com:88/?app=phone.get&phone=$mobile&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
				$res = json_decode($url,true);
				$re = $res['result']['att'];
				$arr = explode(",",$re);
				$province = $arr[1];
				$city = $arr[2];
				$carrier = $province.' '.$city;
				//echo $province .'----'.$city;exit;
				//var_dump($carrier);exit;

//				$sql = "insert into  hi_suogu(add_time,phone_seatof,laiurl,mobile,ip,ipcity) VALUES ('".time()."','".$carrier."','".$laiurl."','".$mobile."','".getIP()."','".getCity()."')";
//				echo $sql;exit;

				$reg_install=$db->query("INSERT hi_suogu(add_time,phone_seatof,laiurl,mobile,ip,ipcity) VALUES ('".time()."','".$carrier."','".$laiurl."','".$mobile."','".getIP()."','".getCity()."')");
				if(!empty($reg_install)){
					echo '<script>location.href="ngsh1.php"</script>';
				}
			}else{
				echo '<script>location.href="ngsh.php"</script>';
			}			
		}else{
			echo '<script>location.href="ngsh.php"</script>';
		}
	}else{
		echo '<script>location.href="ngsh.php"</script>';
	}
}else{
	//���ҳ�洫������ֵ(zhenduanshouhu.php)
	if($mobile != "" && $username != "" && $laiurl != ""){
		
		if(strlen($mobile) == 11){
			$exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$|147[0-9]{8}$/";
			
			if(preg_match($exp,$mobile)){
				$url = file_get_contents("http://api.k780.com:88/?app=phone.get&phone=$mobile&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
				$res = json_decode($url,true);
				$re = $res['result']['att'];
				$arr = explode(",",$re);
				$province = $arr[1];
				$city = $arr[2];
				$carrier = $province.' '.$city;
				
				$reg_install=$db->query("INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,ipcity,gupiao) VALUES ('".time()."','".$carrier."','".$laiurl."','".$mobile."','".getIP()."','".getCity()."','".$username."')");
				if(!empty($reg_install)){
					echo '<script>location.href="zgsh1.php"</script>';
				}
			}else{
				echo '<script>location.href="zgsh.php"</script>';
			}
		}else{
			echo  '<script>location.href="zgsh.php"</script>';
		}
	}else{
		echo '<script>location.href="zgsh.php"</script>';
	}
}


?>