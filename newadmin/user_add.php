<?
 require_once '../config.php';
 require_once('chink.php');
 if($_GET['id']!="" and $_GET['type']==""){
 $db->query("SELECT * FROM hi_user WHERE u_id='".$_GET['id']."'");
 $row = $db->fetch_array($rs);
 }elseif($_GET['id']!="" and $_GET['type']=="add"){
	 if(empty($_POST['user_pass'])){
		 $db->query("UPDATE hi_user SET user_name='".$_POST['user_name']."',jf='".$_POST['jf']."',qian='".$_POST['qian']."',u_qx='".$_POST['u_qx']."',alipay='".$_POST['alipay']."',alipayname='".$_POST['alipayname']."',shdz='".$_POST['shdz']."' WHERE u_id='".$_GET['id']."'");
	 }else{
		$db->query("UPDATE hi_user SET user_name='".$_POST['user_name']."',jf='".$_POST['jf']."',qian='".$_POST['qian']."',u_qx='".$_POST['u_qx']."',user_pass='".md5($_POST['user_pass'])."',alipay='".$_POST['alipay']."',alipayname='".$_POST['alipayname']."',shdz='".$_POST['shdz']."' WHERE u_id='".$_GET['id']."'"); 
	 }
	 
	
	 echo "<script language='javascript'>alert('修改成功!');location.replace('user_list.php');</script>";
	die();
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>会员编辑</title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>


<table width="98%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D1DDAA" align="center">
<tr>
 <td height="26" background="skin/images/newlinebg3.gif">
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center">
    
<input type='button' class="coolbg np" onClick="location='user_list.php';" value='手机号码列表' />
 </td>
 </tr>
</table>
</td>
</tr>
</table>
  

<form name="forms" method="post" action="?type=add&id=<?=$row['u_id']?>">

<table width="98%px" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">号码详情<a href="admin_web.php" target="main"></a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">股票代码</td>
  <td width="81%" align="left"><input style="width:100px" type="text" name="user_name" value="<?=$row['user_name']?>" />
  </td>
</tr>
<!--tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">账号密码</td>
  <td width="81%" align="left"><input style="width:300px" type="password" name="user_pass" value="" />
  (为空则不修改)
  </td>
</tr-->
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">手机号码</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="email" value="<?=$row['email']?>" disabled /> 
  
  </td>
</tr>




<!--tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">会员hi币</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="jf" value="<?=$row['jf']?>" />
  </td>
</tr>

<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">会员人民币</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="qian" value="<?=$row['qian']?>" />
  </td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">支付宝账号</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="alipay" value="<?=$row['alipay']?>" />
  </td>
</tr>

<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">支付宝姓名</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="alipayname" value="<?=$row['alipayname']?>" />
  </td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">收货地址</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="shdz" value="<?=$row['shdz']?>" />
  </td>
</tr>

<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">推荐人</td>
  <td width="81%" align="left"><a href="user_add.php?id=<?=$row['user_tui']?>"><u>查看推荐人</u></a>
  </td>
</tr-->

<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">提交IP</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="u_ip" value="<?=$row['u_ip']?>" disabled />
  </td>
</tr>
<!--tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">会员权限</td>
  <td width="81%" align="left">
    <select name="u_qx">
      <option value="0" <?
        if($row['u_qx']=='0'){
			echo 'selected';	
		}
		?>>违规用户</option>
      <option value="1" <?
        if($row['u_qx']=='1'){
			echo 'selected';	
		}
		?>>普通会员</option>
        <option value="2" <?
        if($row['u_qx']=='2'){
			echo 'selected';	
		}
		?>>推广者</option>
        <option value="3" <?
        if($row['u_qx']=='3'){
			echo 'selected';	
		}
		?>>VIP会员</option>
      </select>
    </td>
</tr-->
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">提交时间</td>
  <td width="81%" align="left"><?=date('Y-m-d H:i:s',$row['add_time'])?>
  </td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	
	<td colspan="2"><input type="submit" name="submit" value="提交" />&nbsp;&nbsp;<input type="reset"  name="reset" value="重写"></td>
</tr>



</table>

</form>


</body>
</html>