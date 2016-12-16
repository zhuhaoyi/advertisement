<?php
require('../config.php');
require('../class/class.php');
if($_GET['type']=='login'){
$emails='/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/';
$u=$_POST['username'].'@qq.com';
	$passwords='/^[a-zA-Z0-9_]{3,16}$/';
	if(preg_match($emails,$u) && preg_match($passwords,$_POST['userpass'])){
		
		$db->query("SELECT * FROM hi_user WHERE email='".$u."' AND user_pass='".md5($_POST['userpass'])."'");
		if($db->db_num_rows($rs)==1){
			
			$row = $db->fetch_array($rs);
			if($row['u_qx']==0){
				echo tiao("您的账号违规，联系官方客服人员！","/index.php");
				die();
			}
			if($row['user_tui']!='' and $row['user_dlj']==0){
			$db->query("SELECT u_id FROM hi_user WHERE u_id='".$row['user_tui']."'");
				$rowmyurl=$db->fetch_array($rs);
				if($rowmyurl['u_id']!=''){
				 $db->query("UPDATE hi_user SET jf=jf+".$overal['s_jf']." WHERE u_id='".$rowmyurl['u_id']."'");	
			}
}
$db->query("UPDATE hi_user SET user_dlj='1' WHERE u_id='".$row['u_id']."'");

			$_SESSION['uid']=$row['u_id'];
			$_SESSION['email']=$row['email'];
			$_SESSION['qx']=$row['u_qx'];
			echo tiaos("/user/");
			die();
		}else{
			echo tiao("邮箱或密码输入错误!","/index.php");
		}
	}else{
		echo tiao("邮箱或密码输入不正确!","/index.php");
	}
}
if($_GET['type']=="loginout"){
	$_SESSION['uid']='';
	$_SESSION['email']='';
	echo tiao('退出成功','/index.php');
}
if(empty($_SESSION['uid'])){
?>
document.writeln("<form name=\"forms\" style=\"height:27px\" method=\"post\" action=\"class/login.php?type=login\">账号：<input type=\"text\" name=\"username\" style=\"border:1px solid #09F; height:16px; width:150px\" \/>&nbsp;&nbsp;密码：<input type=\"password\" name=\"userpass\" style=\"border:1px solid #09F; height:16px;width:150px\" \/>&nbsp;&nbsp;<input type=\"submit\" name=\"submit\" value=\"登陆\" style=\"height:20px\" \/>&nbsp;&nbsp;&nbsp;&nbsp;<a style=\"display:block;width:69px;height:30px;margin-top:6px; float:right\" href=\"/desktop.php\"><img src=\"/style/images/save_desktop.gif\" /></a><\/form>")
<?	
}
?>