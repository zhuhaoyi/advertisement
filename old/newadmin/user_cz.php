<?php
 require_once '../config.php';
 require_once('chink.php');
 include "../class/pager.class.php";
 $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
  if($_GET['type']=="del"){
	 $ID_Dele= implode(",",$_POST['checkboxid']);
	 $sql="DELETE FROM hi_cz WHERE c_id IN (".$ID_Dele.")";
	 $db->query($sql);
 }
 
 if($_GET['type']=="s"){
 $db->query("SELECT * FROM hi_cz as a left join hi_user b on a.u_id=b.u_id where a.orderid='".$_POST['key']."' order by c_id desc ");
 }else{
 $db->query("SELECT * FROM hi_cz as a left join hi_user b on a.u_id=b.u_id order by a.c_id desc ");	 
 }
 $mypagesnum=$db->db_num_rows();
		$p_pageSize=20;
		$myPage=new pager($mypagesnum,intval($CurrentPage),$p_pageSize);
		$min_page=($CurrentPage-1)*$p_pageSize;
 if($_GET['type']=="s"){
 $db->query("SELECT * FROM hi_cz as a left join hi_user b on a.u_id=b.u_id where a.orderid='".$_POST['key']."' order by c_id desc LIMIT ".$min_page.",".$p_pageSize);
 }else{
 $db->query("SELECT * FROM hi_cz as a left join hi_user b on a.u_id=b.u_id order by a.c_id desc LIMIT ".$min_page.",".$p_pageSize);
 }
 
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ֵ��¼</title>
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
    <input type='button' class="coolbg np" onClick="location='user_cz.php';" value='��ֵ��¼' />
    
 </td>
 </tr>
</table>
</td>
</tr>
</table>
  
<!--  �����б�   -->
<form name="form2">

<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="skin/images/tbg.gif">&nbsp;��ֵ��¼&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="7%">ID</td>
	<td width="7%">ѡ��</td>
	<td width="10%">�ƺ�</td>
	<td width="9%">��ֵ���</td>
    
	<td width="17%">�������</td>
    <td width="8%">״̬</td>
    <td width="12%">QQ����</td>
    <td width="6%">�Ƽ���</td>
    <td width="14%">ע��ʱ��</td>

</tr>
<?
while($row = $db->fetch_array($rs)){
?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?=$row['c_id']?></td>
	<td><input name="checkboxid[]" type="checkbox" value="<?=$row['c_id']?>" class="np"></td>
	<td><span style="color:#ff0000">[<?
        if($row['u_qx']=='0'){
			echo 'Υ��';	
		}else if($row['u_qx']=='1'){
			echo '�ջ�';	
		}else if($row['u_qx']=='2'){
			echo '��';	
		}else if($row['u_qx']=='3'){
			echo 'VIP';	
		}else{
			echo 'δ֪';	
		}
		?>]</span>
      <?=$row['user_name']?></td>
	
	<td>��<?=$row['price']?>Ԫ</td>
    	
        
	<td><?=$row['orderid']?></td>
    <td><?
	if($row['zt']==0){
		echo 'δ֧��';	
	}else if($row['zt']==1){
		echo '��֧��';	
	}else{
		echo 'δ֪';	
	}
	?></td>
    <td><!-- WPA Button Begin -->
    <?
	$myqqs=explode('@',$row['email']);
	?>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$myqqs[0]?>site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?=$myqqs[0]?>:42" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ"></a>
<!-- WPA Button END --></td>
	<td><a href="user_add.php?id=<?=$row['user_tui']?>"><u><?=$row['user_tui']?></u></a></td>
    <td><?=date('Y-m-d',$row['addtime'])?></td>

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

<!--  ������  -->
<form name='form3' action='?type=s' method='post'>
<table width='98%'  border='0' cellpadding='1' cellspacing='1' bgcolor='#CBD8AC' align="center" style="margin-top:8px">
  <tr bgcolor='#EEF4EA'>
    <td background='skin/images/wbg.gif' align='center'>
      <table border='0' cellpadding='0' cellspacing='0'>
        <tr>
          <td width='90' align='center'>����</td>
         
        <td width='70'>
          ������ţ�
        </td>
        <td width='160'>
          	<input type='text' name='key' value='' style='width:150px' />
        </td>
        
        <td>
          <input name="imageField" type="image" src="skin/images/frame/search.gif" width="45" height="20" border="0" class="np" />
        </td>
       </tr>
      </table>
    </td>
  </tr>
</table>
</form>
</body>
</html>