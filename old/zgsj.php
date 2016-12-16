<?php
require('config.php');
require('./class/class.php');
$laiurl1="搜狐-诊股";
$laiurl2="网易-诊股";
$laiurl3="网站-诊股";
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$laiurl = $_POST['laiurl'];
if($laiurl === "1"){
    if($mobile != "" && $username != ""){
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
                $reg_install=$db->query("INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,ipcity,gupiao) VALUES ('".time()."','".$carrier."','".$laiurl1."','".$mobile."','".getIP()."','".getCity()."','".$username."')");
                if(!empty($reg_install)){
                    echo '<script>location.href="zgsh1.html"</script>';
                }
            }else{
                echo '<script>location.href="zgsh.html"</script>';
            }
        }else{
            echo  '<script>location.href="zgsh.html"</script>';
        }
    }else{
        echo '<script>location.href="zgsh.html"</script>';
    }
}else if($laiurl === "2"){
    if($mobile != "" && $username != ""){
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
                $reg_install=$db->query("INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,ipcity,gupiao) VALUES ('".time()."','".$carrier."','".$laiurl2."','".$mobile."','".getIP()."','".getCity()."','".$username."')");
                if(!empty($reg_install)){
                    echo '<script>location.href="zgwy1.html"</script>';
                }
            }else{
                echo '<script>location.href="zgwy.html"</script>';
            }
        }else{
            echo  '<script>location.href="zgwy.html"</script>';
        }
    }else{
        echo '<script>location.href="zgwy.html"</script>';
    }
}else if($laiurl === "3"){
    if($mobile != "" && $username != ""){
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
                $reg_install=$db->query("INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,ipcity,gupiao) VALUES ('".time()."','".$carrier."','".$laiurl3."','".$mobile."','".getIP()."','".getCity()."','".$username."')");
                if(!empty($reg_install)){
                    echo '<script>location.href="zgwz1.html"</script>';
                }
            }else{
                echo '<script>location.href="zgwz.html"</script>';
            }
        }else{
            echo  '<script>location.href="zgwz.html"</script>';
        }
    }else{
        echo '<script>location.href="zgwz.html"</script>';
    }
}