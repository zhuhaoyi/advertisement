<?
 require_once '../config.php';
 require_once('chink.php');
 if($_GET['type']==""){
 $db->query("SELECT * FROM hi_list WHERE lid=1");
 $row = $db->fetch_array($rs);
 }elseif($_GET['type']=="add"){
	
	 $db->query("UPDATE hi_list SET xitong='".$_POST['xitong']."',content='".$_POST['content']."' WHERE lid='1'");
	
	 echo "<script language='javascript'>alert('���Ƴɹ�!');location.replace('xulie.php');</script>";
	 die();
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title></title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>


<table width="98%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D1DDAA" align="center">
<tr>
 <td height="26" background="skin/images/newlinebg3.gif">
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center">

 </td>
 </tr>
</table>
</td>
</tr>
</table>
  

<form name="forms" method="post" action="?type=add">

<table width="98%px" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">�������ʼ�����<a href="admin_web.php" target="main"></a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">�ʼ�ϵͳ</td>
  <td width="81%" align="left"><input type="radio" name="xitong" value="1" <?
  if($row['xitong']==1){
	echo "checked";  
  }
  ?> /><a href="http://sjie.cn/read-HI-tid-4505-ds-1.shtml" target="_blank"><u>HiList(HIӪ�������з�)</u></a>&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="xitong" value="2" <?
  if($row['xitong']==2){
	echo "checked";  
  }
  ?> /><a href="http://list.qq.com" target="_blank"><u>QQList(��Ѷ��Ʒ)</u></a>&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="xitong" value="3" <?
  if($row['xitong']==3){
	echo "checked";  
  }
  ?> /><a href="http://www.maxmail.cn" target="_blank"><u>����</u></a>&nbsp;&nbsp;&nbsp;&nbsp;
  
  <input type="radio" name="xitong" value="4" <?
  if($row['s_title']==4){
	echo "checked";  
  }
  ?> /><a href="#" target="_blank"><u>��ʹ��������</u></a>&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
</tr>

<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">���ƴ���</td>
  <td width="81%" align="left">
    <textarea name="content" style="width:700px" rows="6"><?=$row['content']?></textarea>
    </td>
</tr>
<tr align="left" bgcolor="#FAFAF1">
  <td colspan="2">
  Hilist���Ʒ�����ֱ������(���ƴ�����)HIlist���ô���<br />
  QQlist���Ʒ�����ֱ������(���ƴ�����)qqlist������<br />
  �������Ʒ��������������� UserClassID*ProjectID (10244*17828)���뵽���ƴ�����<br />
  ��ʹ�������ţ����ᷢ���ʼ��������ʼ�,���ƴ�����Ϊ��
  <br />
  </td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	
	<td colspan="2"><input type="submit" name="submit" value="�ύ" />&nbsp;&nbsp;<input type="reset"  name="reset" value="��д"></td>
</tr>



</table>

</form>






</body>
</html>