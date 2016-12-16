<?
 require_once '../config.php';
 require('../class/class.php');
 require_once('chink.php');
 if($_GET['type']=="add" and $_POST['a_id']!=''){
	 $db->query("UPDATE hi_all SET a_title='".$_POST['a_title']."',a_key='".$_POST['a_key']."',a_disc='".$_POST['a_disc']."',a_bottom='".$_POST['a_bottom']."',a_alipay='".$_POST['a_alipay']."',a_paykey='".$_POST['a_paykey']."',a_pid='".$_POST['a_pid']."',a_alipayclass='".$_POST['a_alipayclass']."',a_tel='".$_POST['a_tel']."',a_qq='".$_POST['a_qq']."',a_www='".$_POST['a_www']."',s_jf='".$_POST['s_jf']."',mysite='".$_POST['mysite']."',yjbl='".$_POST['yjbl']."',fx='".$_POST['fx']."',user_top='".$_POST['user_top']."',p_gs='".$_POST['p_gs']."' WHERE a_id='".$_POST['a_id']."'");
	 echo tiao('修改成功','overall.php');
	die();
 }else{
	$db->query("SELECT * FROM hi_all WHERE a_id='1'");
 	$row = $db->fetch_array($rs);
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>全局设置</title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">
</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>
<form name="forms" method="post" action="?type=add">
<table width="98%px" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">全局设置</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">网站Title</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_title" value="<?=$row['a_title']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">网站关键字</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_key" value="<?=$row['a_key']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">网站描述</td>
  <td width="81%" align="left"><textarea name="a_disc" style="width:300px" rows="5"><?=$row['a_disc']?></textarea> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">网站底部</td>
  <td width="81%" align="left"><textarea name="a_bottom" style="width:300px" rows="5"><?=$row['a_bottom']?></textarea> *</td>
</tr>
<!--tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">推广连接下介绍文字</td>
  <td width="81%" align="left"><textarea name="user_top" style="width:300px" rows="8"><?=$row['user_top']?></textarea> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">支付宝(类型)</td>
  <td width="81%" align="left"><input type="radio" name="a_alipayclass" value="1"<?
  if($row['a_alipayclass']=='1'){
	echo ' checked';
  }
  ?> />即时到账&nbsp;&nbsp;<input type="radio" name="a_alipayclass" value="2"<?
  if($row['a_alipayclass']=='2'){
	echo ' checked';
  }
  ?> />担保交易&nbsp;&nbsp;<input type="radio" name="a_alipayclass" value="3"<?
  if($row['a_alipayclass']=='3'){
	echo ' checked';
  }
  ?> />双向支付&nbsp;&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">站点顶级域名</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="mysite" value="<?=$row['mysite']?>" /> (如：hicaifu.com)</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">是否显示分销产品</td>
  <td width="81%" align="left"><select name="fx">
    <option value="1" <?
    if($row['fx']==1){
	echo "selected";	
	}
	?>>显示分销产品</option>
    <option value="0" <?
    if($row['fx']==0){
	echo "selected";	
	}
	?>>不显示分销产品</option>
  </select> *</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">支付宝(账号)</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_alipay" value="<?=$row['a_alipay']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">支付宝(key)</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_paykey" value="<?=$row['a_paykey']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">支付宝(pid)</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_pid" value="<?=$row['a_pid']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">客服电话</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_tel" value="<?=$row['a_tel']?>" /> *</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">客服QQ</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_qq" value="<?=$row['a_qq']?>" />
  *多个QQ用 , 号隔开</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">推广前缀</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="a_www" value="<?=$row['a_www']?>" /> (前去对接平台，注册账号，配制您的专属推广前缀) <a href="http://www.<?=hifun($sjiecn,'D','hifun')?>" target="_blank">点击查看</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">推广送积分</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="s_jf" value="<?=$row['s_jf']?>" /> （推广一个会员送多少积分）</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">佣金比例</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="yjbl" value="<?=$row['yjbl']?>" /> （例0.3 就代表 30%）</a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="30">
  <td width="19%">每页显示产品个数</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="p_gs" value="<?=$row['p_gs']?>" /> 
  *为0将显示默认 5个</td>
</tr-->
<input type="hidden" type="text" name="a_id" value="1" /> 
<tr align="center" bgcolor="#FAFAF1" height="30">
	<td colspan="2"><input type="submit" name="submit" value="提交" />&nbsp;&nbsp;<input type="reset"  name="reset" value="重写"></td>
</tr>
</table>
</form>
</body>
</html>