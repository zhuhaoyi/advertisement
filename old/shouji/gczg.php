<?php
require('../config.php');
require('../class/class.php');

$mobile = $_POST['mobile'];
$username = $_POST['username'];
$laiurl = $_POST['laiurl'];
//echo $mobile .'----'. $username;exit;

if($mobile != "" && $username != "" && $laiurl !=""){
    if(strlen($mobile) == 11){
        $exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$|147[0-9]{8}$/";
        if(preg_match($exp,$mobile)){
            //调用财付通的接口
            $ch = curl_init();
            $url = "http://apis.baidu.com/apistore/mobilenumber/mobilenumber?phone=$mobile";
            $header = array(
                'apikey:817467d92c36b82784217a11dbe0adc2',
            );
            // 添加apikey到header
            curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // 执行HTTP请求
            curl_setopt($ch , CURLOPT_URL , $url);
            $res = curl_exec($ch);
            $result = json_decode($res,true);
            $province = $result['retData']['province'];
            $city = $result['retData']['city'];
            $carrier = $province.' '.$city;
               $sql = "INSERT hi_zhenggu(add_time,phone_seatof,laiurl,mobile,ip,gupiao,ipcity) VALUES ('".time()."','".$carrier."','".$laiurl."','".$mobile."','".getIP()."','".$username."','".getCity()."')";
              // $sql;exit;
            $reg_install=$db->query($sql);
            //var_dump($reg_install);exit;
            if(!empty($reg_install)){
                echo '<script>location.href="index.html"</script>';
            }
        }else{
            echo '<script>location.href="index.html"</script>';
        }
    }else{
        echo  '<script>location.href="index.html"</script>';
    }
}else{
     echo '<script>location.href="index.html"</script>';
}

