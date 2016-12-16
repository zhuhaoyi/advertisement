<?php
require('config.php');
require('./class/class.php');
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$laiurl = $_POST['laiurl'];
$users = $_POST['users'];
if($users != ""){
	//索股页面传过来的值（niugushouhu.html）
	if($mobile != "" && $laiurl != ""){
		if(strlen($mobile) == 11){
			$exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$/";
			if(preg_match($exp,$mobile)){
				//调用财付通的接口
				$xml = file_get_contents("http://life.tenpay.com/cgi-bin/mobile/MobileQueryAttribution.cgi?chgmobile=".$mobile."&t=".time());
				$result = simplexml_load_string($xml);
				//var_dump($result);
				$city =  iconv("utf-8","gb2312",strval($result->city));
				$province =  iconv("utf-8","gb2312",strval($result->province));
				$carrier = $province.$city;
				
				$reg_install=$db->query("INSERT hi_suogu(add_time,phone_seatof,laiurl,mobile,ip) VALUES ('".time()."','".$carrier."','".$laiurl."','".$mobile."','".getIP()."')");
				if(!empty($reg_install)){
					echo '<script>location.href="ngsh1.php"</script>';
				}
			}else{
				echo '<script>location.href="ngsh.php"</script>';
			}			
		}else{
			echo '<script>location.href="ngush.php"</script>';
		}
	}else{
		echo '<script>location.href="ngsh.php"</script>';
	}
}else{
	//诊股页面传过来的值(zhenduanshouhu.php)
	if($mobile != "" && $username != "" && $laiurl != ""){
		
		if(strlen($mobile) == 11){
			//$exp = "/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$|";
			$exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$|147[0-9]{8}$/";
			
			if(preg_match($exp,$mobile)){
				//调用财付通的接口
				$xml = file_get_contents("http://life.tenpay.com/cgi-bin/mobile/MobileQueryAttribution.cgi?chgmobile=".$mobile."&t=".time());
				$result = simplexml_load_string($xml);
				//var_dump($result);
				$city =  iconv("utf-8","gb2312",strval($result->city));
				$province =  iconv("utf-8","gb2312",strval($result->province));
				$carrier = $province.$city;
				
				//$sql = "INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,gupiao) VALUES ('".time()."','".$carrier."','http://tcc.taobao.com/cc/json/mobile_tel_segment.htm','".$mobile."','".getIP()."','".$username."')";
				//echo $sql;
				$reg_install=$db->query("INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,gupiao) VALUES ('".time()."','".$carrier."','".$laiurl."','".$mobile."','".getIP()."','".$username."')");
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