<?
 require_once '../config.php';
 require('../class/class.php');
 require_once('chink.php');
 if($_GET['type']=="add"){
	if(!empty($_POST['admin_pass'])){
	 	$db->query("UPDATE hi_admin SET admin_pass='".md5($_POST['admin_pass'])."' WHERE admin_id='1'");
	 	//echo tiaos('/admin.php?type=loginout');
		echo tiao('�����޸ĳɹ�,���˳���̨���µ�¼','admin_pass.php');
	die();
	}else{
		echo tiao('���벻��Ϊ��','admin_pass.php');
	}
 }else{
	$db->query("SELECT * FROM hi_admin WHERE admin_id='1'");
 	$row = $db->fetch_array($rs);
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>����Ա�����޸�</title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">
</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>
<form name="forms" method="post" action="?type=add">
<table width="98%px" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">ȫ������</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">����Ա�˺�</td>
  <td width="81%" align="left"><input style="width:100px" type="text" name="admin_name" value="<?=$row['admin_name']?>" disabled /></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">����Ա����</td>
  <td width="81%" align="left"><input style="width:200px" type="text" name="admin_pass" value="" /> 
    Ϊ�����ʾ���޸�</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td colspan="2"><input type="submit" name="submit" value="�ύ" />&nbsp;&nbsp;<input type="reset"  name="reset" value="��д"></td>
</tr>
</table>
</form>
</body>
</html>