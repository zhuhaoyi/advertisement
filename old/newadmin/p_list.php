<?php
 require_once '../config.php';
 require_once('chink.php');
 include "../class/pager.class.php";
      if($_GET[type]=="del"){
	 $ID_Dele= implode(",",$_POST['checkboxid']);
	 $sql="DELETE FROM hi_p WHERE p_id IN (".$ID_Dele.")";
$db->query($sql);
 }
 $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
 $db->query("SELECT * FROM hi_p order by p_px,p_id");
 
  		$mypagesnum=$db->db_num_rows();
		$p_pageSize=20;
		$myPage=new pager($mypagesnum,intval($CurrentPage),$p_pageSize);
		$min_page=($CurrentPage-1)*$p_pageSize;
 $db->query("SELECT * FROM hi_p order by p_px,p_id LIMIT ".$min_page.",".$p_pageSize);

?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ʒ����</title>
<link rel="stylesheet" type="text/css" href="skin/css/base.css">
<script language="javascript">

function SelectAll() {
 var checkboxs=document.getElementsByName("checkboxid[]");
 for (var i=0;i<checkboxs.length;i++) {
  var e=checkboxs[i];
  e.checked=!e.checked;
 }
}//ȫѡ�ͷ�ѡjavascript
function mysubmit(){
 document.checkboxform.submit();
}//�ύ
</script>
</head>
<body leftmargin="8" topmargin="8" background='skin/images/allbg.gif'>

<!--  ����ת��λ�ð�ť  -->
<table width="98%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D1DDAA" align="center">
<tr>
 <td height="26" background="skin/images/newlinebg3.gif">
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center">
    <input type='button' class="coolbg np" onClick="location='p_list.php';" value='��Ʒ�б�' />
    <input type='button' class="coolbg np" onClick="location='p_add.php';" value='��Ʒ����' />
    
    
 </td>
 </tr>
</table>
</td>
</tr>
</table>
  
<!--  �����б�   -->
<form name="checkboxform" method="post" action="?type=del">

<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">&nbsp;��Ʒ�б�&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="5%">ID</td>
	<td width="4%">ѡ��</td>
	<td width="24%">��Ʒ����</td>
	<td width="13%">����ʱ��</td>
    <td width="8%">״̬</td>
    <td width="11%">�۸�</td>
        <td width="8%">����</td>
        <td width="13%">����</td>
	<td width="14%">����</td>
</tr>
<?
while($row = $db->fetch_array($rs)){
?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?=$row['p_id']?></td>
	<td><input name="checkboxid[]" type="checkbox" value="<?=$row['p_id']?>" class="np"></td>
	<td><u><?=$row['p_title']?></u></td>
	<td><?=date('Y-m-d H:i:s',$row['p_time'])?></td>
    <td><?
	if($row['p_tj']=='0'){
		echo "δ�ö�";	
	}else if($row['p_tj']=='1'){
		echo "���ö�";	
	}
	?></td>
    <td><?=$row['p_price']?></td>
    <td><?=$row['p_jf']?></td>
    <td><?=$row['p_px']?></td>
	<td><a href="p_add.php?id=<?=$row['p_id']?>">�༭</a>
   </td>
</tr>
<?
}
?>
<tr bgcolor="#FAFAF1">
<td height="28" colspan="10">
	&nbsp;
    <a href="javascript:SelectAll()" class="coolbg">ȫѡ</a>
	<a href="javascript:SelectAll()" class="coolbg">ȡ��</a>

	<a href="javascript:mysubmit();" class="coolbg">&nbsp;ɾ��&nbsp;</a>
</td>
</tr>
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