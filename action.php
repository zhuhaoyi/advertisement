<?php
header("Content-Type: text/html; charset=UTF-8");
require('config.php');
require('./class/class.php');
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$laiurl = $_POST['laiurl'];
$users = $_POST['users'];
if ($users != "") {//索股
    if ($mobile != "" && $laiurl != "") {
        if (strlen($mobile) == 11) {
            $exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$/";
            if (preg_match($exp, $mobile)) {
                $url = file_get_contents("http://api.k780.com:88/?app=phone.get&phone=$mobile&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
                $res = json_decode($url, true);
                $re = $res['result']['att'];
                $arr = explode(",", $re);
                $province = $arr[1];
                $city = $arr[2];
                $carrier = $province . ' ' . $city;
                //echo $province .'----'.$city;exit;
                //var_dump($carrier);exit;
//				$sql = "insert into  hi_suogu(add_time,phone_seatof,laiurl,mobile,ip,ipcity) VALUES ('".time()."','".$carrier."','".$laiurl."','".$mobile."','".getIP()."','".getCity()."')";
//				echo $sql;exit;
                $db->query("set names 'utf8'");
                $reg_install = $db->query("INSERT hi_suogu(add_time,phone_seatof,laiurl,mobile,ip,ipcity) VALUES ('" . time() . "','" . $carrier . "','" . $laiurl . "','" . $mobile . "','" . getIP() . "','" . getCity() . "')");
                if (!empty($reg_install)) {
                    //echo '<script>alert(\'提交成功\');history.go(-1);</script>';
					//多次提交则替换掉网址中的参数

					Header("Location:".str_replace('?p=ngsuccess','',str_replace('?p=sgsuccess','',$_SERVER['HTTP_REFERER'])).'?p=sgsuccess');
                }
            } else {
                echo '<script>alert(\'电话号码错误\');history.go(-1);</script>';
            }
        } else {
            echo '<script>alert(\'手机号码不是11位数\');history.go(-1);</script>';
        }
    } else {
        echo '<script>alert(\'未输入电话号码\');history.go(-1);</script>';
    }
} else {//诊股
    if ($mobile != "" && $username != "" && $laiurl != "") {

        if (strlen($mobile) == 11) {
            $exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$|147[0-9]{8}$/";

            if (preg_match($exp, $mobile)) {
                $url = file_get_contents("http://api.k780.com:88/?app=phone.get&phone=$mobile&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
                $res = json_decode($url, true);
                $re = $res['result']['att'];
                $arr = explode(",", $re);
                $province = $arr[1];
                $city = $arr[2];
                $carrier = $province . ' ' . $city;
                $db->query("set names 'utf8'");
				//echo getCity();exit;
                $reg_install = $db->query("INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,ipcity,gupiao) VALUES ('" . time() . "','" . $carrier . "','" . $laiurl . "','" . $mobile . "','" . getIP() . "','" . getCity() . "','" . $username . "')");
                if (!empty($reg_install)) {
                    //var_dump($reg_install);exit;
                    //echo '<script>alert(\'提交成功\');history.go(-1);</script>';
					//多次提交则替换掉网址中的参数
                    Header("Location:".str_replace('?p=ngsuccess','',str_replace('?p=sgsuccess','',$_SERVER['HTTP_REFERER'])).'?p=zgsuccess');
                }
            } else {
                echo '<script>alert(\'电话号码格式错误\');history.go(-1);</script>';
            }
        } else {
            echo '<script>alert(\'手机号码不是11位数\');history.go(-1);</script>';
        }
    } else {
        echo '<script>alert(\'手机号码或股票代码不能为空\');history.go(-1);</script>';
    }
}


?>