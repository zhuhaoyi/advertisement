<?
 require_once '../config.php';
 require('../class/class.php');
 require_once('chink.php');
 if($_GET['type']=="add" and $_POST['a_id']!=''){
	 $db->query("UPDATE hi_all SET a_title='".$_POST['a_title']."',a_key='".$_POST['a_key']."',a_disc='".$_POST['a_disc']."',a_bottom='".$_POST['a_bottom']."',a_alipay='".$_POST['a_alipay']."',a_paykey='".$_POST['a_paykey']."',a_pid='".$_POST['a_pid']."',a_alipayclass='".$_POST['a_alipayclass']."',a_tel='".$_POST['a_tel']."',a_qq='".$_POST['a_qq']."',a_www='".$_POST['a_www']."',s_jf='".$_POST['s_jf']."',mysite='".$_POST['mysite']."',yjbl='".$_POST['yjbl']."',fx='".$_POST['fx']."',user_top='".$_POST['user_top']."',p_gs='".$_POST['p_gs']."' WHERE a_id='".$_POST['a_id']."'");
	 echo tiao('�޸ĳɹ�','overall.php');
	die();
 }else{
	$db->query("SELECT * FROM hi_all WHERE a_id='1'");
 	$row = $db->fetch_array($rs);
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>ȫ������</title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">
</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>
<form name="forms" method="post" action="?type=add">
<table width="98%px" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">ȫ������</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">��վTitle</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_title" value="<?=$row['a_title']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">��վ�ؼ���</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_key" value="<?=$row['a_key']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">��վ����</td>
  <td width="81%" align="left"><textarea name="a_disc" style="width:300px" rows="5"><?=$row['a_disc']?></textarea> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">��վ�ײ�</td>
  <td width="81%" align="left"><textarea name="a_bottom" style="width:300px" rows="5"><?=$row['a_bottom']?></textarea> *</td>
</tr>
<!--tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">�ƹ������½�������</td>
  <td width="81%" align="left"><textarea name="user_top" style="width:300px" rows="8"><?=$row['user_top']?></textarea> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">֧����(����)</td>
  <td width="81%" align="left"><input type="radio" name="a_alipayclass" value="1"<?
  if($row['a_alipayclass']=='1'){
	echo ' checked';
  }
  ?> />��ʱ����&nbsp;&nbsp;<input type="radio" name="a_alipayclass" value="2"<?
  if($row['a_alipayclass']=='2'){
	echo ' checked';
  }
  ?> />��������&nbsp;&nbsp;<input type="radio" name="a_alipayclass" value="3"<?
  if($row['a_alipayclass']=='3'){
	echo ' checked';
  }
  ?> />˫��֧��&nbsp;&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">վ�㶥������</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="mysite" value="<?=$row['mysite']?>" /> (�磺hicaifu.com)</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">�Ƿ���ʾ������Ʒ</td>
  <td width="81%" align="left"><select name="fx">
    <option value="1" <?
    if($row['fx']==1){
	echo "selected";	
	}
	?>>��ʾ������Ʒ</option>
    <option value="0" <?
    if($row['fx']==0){
	echo "selected";	
	}
	?>>����ʾ������Ʒ</option>
  </select> *</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">֧����(�˺�)</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_alipay" value="<?=$row['a_alipay']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">֧����(key)</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_paykey" value="<?=$row['a_paykey']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">֧����(pid)</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_pid" value="<?=$row['a_pid']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">�ͷ��绰</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_tel" value="<?=$row['a_tel']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">�ͷ�QQ</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_qq" value="<?=$row['a_qq']?>" />
  *���QQ�� , �Ÿ���</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">�ƹ�ǰ׺</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_www" value="<?=$row['a_www']?>" /> (ǰȥ�Խ�ƽ̨��ע���˺ţ���������ר���ƹ�ǰ׺) <a href="http://www.<?=hifun($sjiecn,'D','hifun')?>" target="_blank">����鿴</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">�ƹ��ͻ���</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="s_jf" value="<?=$row['s_jf']?>" /> ���ƹ�һ����Ա�Ͷ��ٻ��֣�</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">Ӷ�����</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="yjbl" value="<?=$row['yjbl']?>" /> ����0.3 �ʹ��� 30%��</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">ÿҳ��ʾ��Ʒ����</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="p_gs" value="<?=$row['p_gs']?>" /> 
  *Ϊ0����ʾĬ�� 5��</td>
</tr-->
<input type="hidden" type="text" name="a_id" value="1" /> 
<tr align="center" bgcolor="#FAFAF1" height="30">
	<td colspan="2"><input type="submit" name="submit" value="�ύ" />&nbsp;&nbsp;<input type="reset"  name="reset" value="��д"></td>
</tr>
</table>
</form>
</body>
</html>