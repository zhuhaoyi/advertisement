<?php
 require_once '../config.php';
 require_once('chink.php');
 include "../class/pager.class.php";
 $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
 $db->query("SELECT * FROM hi_o as a left join hi_user b on a.u_id=b.u_id order by o_id desc");
 
  		$mypagesnum=$db->db_num_rows();
		$p_pageSize=20;
		$myPage=new pager($mypagesnum,intval($CurrentPage),$p_pageSize);
		$min_page=($CurrentPage-1)*$p_pageSize;
 $db->query("SELECT * FROM hi_o as a left join hi_user b on a.u_id=b.u_id order by o_id desc LIMIT ".$min_page.",".$p_pageSize);

?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>订单管理</title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>

<!--  快速转换位置按钮  -->
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
  
<!--  内容列表   -->
<form name="form2">

<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">&nbsp;订单列表&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="6%">ID</td>
	<td width="5%">选择</td>
	<td width="25%">订单号</td>
	<td width="17%">添加时间</td>
    <td width="10%">产品ID</td>
        <td width="15%">所有者ID</td>
        <td width="10%">推广者ID</td>
        <td width="12%">付款方式</td>
         
</tr>
<?
while($row = $db->fetch_array($rs)){
?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?=$row['o_id']?></td>
	<td><input name="checkboxid[]" type="checkbox" value="<?=$row['o_id']?>" class="np"></td>
	<td><?=$row['orderid']?></td>
	<td><?=date('Y-m-d H:i:s',$row['addtime'])?></td>

    <td><a href="p_add.php?id=<?=$row['p_id']?>"><u><?=$row['p_id']?></u></a></td>
    <td><a href="user_add.php?id=<?=$row['u_id']?>"><u><?=$row['u_id']?></u></a></td>
    <td><a href="user_add.php?id=<?=$row['user_tui']?>"><u><?=$row['user_tui']?></u></a></td>
    <td><?
    if($row['ptype']==0){
		echo '积分兑换';	
	}else{
		echo '购买';
	}
	?></td>

</tr>
<?
}
?>

<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="10" align="right"><?
     $pageStr= $myPage->GetPagerContent();
	 echo $pageStr;
    ?></td>
</tr>
</table>

</form>


</body>
</html>