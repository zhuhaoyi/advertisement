<?
 require_once '../config.php';
 require_once('chink.php');
 
 if($_GET['id']!="" and $_GET['type']==""){
 $db->query("SELECT * FROM hi_p WHERE p_id='".$_GET['id']."'");
 $row = $db->fetch_array($rs);
 }elseif($_GET['id']!="" and $_GET['type']=="add"){
	if($_POST['p_tj']==''){
		 $_POST['p_tj']=0;
	 }
	 $mykkkkk=$db->query("UPDATE hi_p SET p_title='".$_POST['p_title']."',p_cont='".trim($_POST['content'])."',p_jj='".$_POST['p_jj']."',p_jf='".$_POST['p_jf']."',p_price='".$_POST['p_price']."',p_tj='".$_POST['p_tj']."',p_file='".$_POST['files']."',p_data='".$_POST['p_data']."',p_px='".$_POST['p_px']."',p_xs='".$_POST['p_xs']."' WHERE p_id='".$_GET['id']."'");
	if($mykkkkk){
	 echo "<script language='javascript'>alert('修改成功!');location.replace('p_list.php');</script>";
	die();
	}else{
	echo "<script language='javascript'>alert('修改错误，不能含有单引号!');location.replace('p_list.php');</script>";
	die();
	}
 }elseif($_GET['id']=="" and $_GET['type']=="add"){
	 if($_POST['p_tj']==''){
		 $_POST['p_tj']='0';
	 }
	 $mykkks=$db->query("INSERT hi_p(p_title,p_jj,p_cont,p_jf,p_price,p_tj,p_time,p_file,p_data,p_px,p_xs) VALUES ('".$_POST['p_title']."','".$_POST['p_jj']."','".trim($_POST['content'])."','".$_POST['p_jf']."','".$_POST['p_price']."','".$_POST['p_tj']."','".time()."','".$_POST['files']."','".$_POST['p_data']."','".$_POST['p_px']."','".$_POST['p_xs']."')");
	if($mykkks){
	echo "<script language='javascript'>alert('添加成功!');location.replace('p_list.php');</script>";
	die();
	}else{
	echo "<script language='javascript'>alert('添加错误，不能含有单引号!');location.replace('p_list.php');</script>";
	die();
	}
 }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>产品编辑</title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">
<script type="text/javascript" charset="gbk" src="/cmedit/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="/cmedit/ueditor.all.js"></script>
<style type="text/css">
        #myEditor{
            width: 700px;
            height: 400px;
        }
</style>
</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>


<table width="98%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D1DDAA" align="center">
<tr>
 <td height="26" background="skin/images/newlinebg3.gif">
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center">
        <input type='button' class="coolbg np" onClick="location='p_list.php';" value='产品列表' />
    <input type='button' class="coolbg np" onClick="location='p_add.php';" value='产品添加' />
 </td>
 </tr>
</table>
</td>
</tr>
</table>
  

<form name="form2" method="post" action="?type=add&id=<?=$row['p_id']?>">

<table width="98%px" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">产品详情   注：不能有单引号<a href="admin_web.php" target="main"></a></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">产品名称</td>
  <td width="81%" align="left"><input style="width:300px" type="text" name="p_title" value="<?=$row['p_title']?>" />
  (字数不能超过254个英文字符)</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="12%">形象图片</td>
	<td width="88%" align="left">
   <input type="text" name="files" id="files" value="<?=$row['p_file']?>" style="width:150px" /><iframe runat="server" src="uploads.php" width="400" height="22" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
    </td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">相关参数</td>
  <td width="81%" align="left"><input style="width:100px" type="text" name="p_jf" value="<?=$row['p_jf']?>" /> 
  所需积分
 &nbsp;&nbsp;&nbsp;&nbsp;
 <input style="width:100px" type="text" name="p_price" value="<?=$row['p_price']?>" /> 所需价格&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="p_tj" value="1" <?
 	if($row['p_tj']==1){
		echo 'checked';	
	}
 ?> /> 是否为置顶&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="p_xs" value="1" <?
 	if($row['p_xs']==1){
		echo 'checked';	
	}
 ?> /> 
 是否为不显示 &nbsp;&nbsp;&nbsp;&nbsp;
 <input type="text" name="p_px" value="<?=$row['p_px']?>" style="width:40px" /> 排序</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">下载地址</td>
  <td width="81%" align="left"><textarea name="p_data" style="width:300px;" rows="5"><?=$row['p_data']?></textarea></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">产品简介</td>
  <td width="81%" align="left"><textarea name="p_jj" style="width:300px;" rows="5"><?=$row['p_jj']?></textarea></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
  <td width="19%">产品详细介绍</td>
  <td width="81%" align="left"><textarea style="width:700px; height:400px" id="myEditor" name="content"><?=$row['p_cont']?></textarea>
    </td>
</tr>


<tr align="center" bgcolor="#FAFAF1" height="22">
	
	<td colspan="2"><input type="submit" name="submit" value="提交" />&nbsp;&nbsp;<input type="reset"  name="reset" value="重写"></td>
</tr>



</table>

</form>

<script type="text/javascript">
UE.getEditor('myEditor')
</script>
</body>
</html>