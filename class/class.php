<?php
function tiao($keywords,$url){
	$key="<script language='javascript'>alert('".$keywords."');location.replace('".$url."');</script>";
	return 	$key;
}
function tiaos($url){
	$key="<script language='javascript'>location.replace('".$url."');</script>";
	return 	$key;
}

function msubstr($str, $start, $len) {
    $tmpstr = "";
    $strlen = $start + $len;
    for($i = 0; $i < $strlen; $i++) {
        if(ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 2);
            $i++;
        } else
            $tmpstr .= substr($str, $i, 1);
    }
    return $tmpstr;
}
function getIP()
{
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
 
 
    return $realip;
}

/*获得客户端真实IP地址对应的城市*/
function getCity($ip = ''){
    if(empty($ip)){
        $ip = GetIp();
    }
    $res = file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
	if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
	 if(!empty($json['province'])!= "" && !empty($json['city']) != ""){
        $json['ipcity'] = $json['province'].'-'.$json['city'];
        
    }else{
        return false;
    }
	$json['getcity'] = strval($json['ipcity']);
    return $json['getcity'];
}

function myweb2(){
	$host = explode('.',$_SERVER['HTTP_HOST']);
	if(count($host)>3){
		return '';
	}else if(count($host)==2){
		return '';
	}else if(count($host)==3 && $host[0]=='www'){
		return '';
	}else{
		return $host[0];
	}
}
function myweb1($hosts){
	$host = explode('.',$hosts);
	if(count($host)>1){
		return '';
	}else{
		return $host[0];
	}
}

	
	// 手机号码验证
function checkMobileValidity($mobile){
	echo $moblie;
	$exp = "/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$|14[57]{1}[0-9]{8}$/";
	if(preg_match($exp,$mobile)){
		return true;
	}else{
		return false;
	}
}
// 手机号码归属地
function checkMobilePlace($mobile){
	$url = "http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel=".$mobile."&t=".time();
	$content = file_get_contents($url);
	$p = substr($content, 56, 4);
	$mo = substr($content, 81, 4);
	return $str = conv2utf8($p).conv2utf8($mo);
}

function desktop($title,$url){
$title=$title;
$Shortcut = "[InternetShortcut]
URL=".$url."
IDList=
[{000214A0-0000-0000-C000-000000000046}]
Prop3=19,2";
Header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$title.".url;");
echo $Shortcut;	
}
?>