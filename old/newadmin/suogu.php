<?php
require_once '../config.php';
require_once('chink.php');
include "../class/pager.class.php";
if($_GET[type]=="del"){
    $ID_Dele= implode(",",$_POST['checkboxid']);
    $sql="update hi_suogu set del_flg='1' where id IN (".$ID_Dele.")";
    $db->query($sql);
}
$CurrentPage=isset($_GET['page'])?$_GET['page']:1;

if($_GET['type']=="s"){
    //��̨����ҳ����ҳ����չʾ����
    $res = $db->query("SELECT * FROM hi_suogu where mobile='".$_POST['key']."' and del_flg='0' order by id desc ");
    if($res == NULL){
        echo "<script language='javascript' type = 'text/javascript' > window.location.href = 'suogu.php';</script>";
    }
}else{
    //��̨����ҳ����ҳչʾ����
    $db->query("select * from hi_suogu where del_flg='0' order by id desc");
}
$mypagesnum=$db->db_num_rows();
$p_pageSize=20;
$myPage=new pager($mypagesnum,intval($CurrentPage),$p_pageSize);
$min_page=($CurrentPage-1)*$p_pageSize;
if($_GET['type']=="s"){
    //��̨����ҳ����ҳ����չʾ���ݺͷ�ҳ
    $res = $db->query("SELECT * FROM hi_suogu where mobile='".$_POST['key']."' and del_flg='0' order by id desc LIMIT ".$min_page.",".$p_pageSize);
    if($res == NULL){
        echo "<script language='javascript' type = 'text/javascript' > window.location.href = 'suogu.php';</script>";
    }
}else{
    //��̨����ҳ����ҳչʾ���ݺͷ�ҳ
    $db->query("SELECT * FROM hi_suogu where del_flg='0' order by id desc LIMIT ".$min_page.",".$p_pageSize);
}

?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>�ֻ��������</title>
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
                        <input type='button' class="coolbg np" onClick="location='suogu.php';" value='�����ֻ������б�' />

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!--  �����б�   -->
<form name="checkboxform" method="post" action="?type=del">

    <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
        <tr bgcolor="#E7E7E7">
            <td height="24" colspan="10" background="skin/images/tbg.gif">&nbsp;�ֻ������б�&nbsp;</td>
        </tr>
        <tr align="center" bgcolor="#FAFAF1" height="22">
            <td width="6%">ID</td>
            <td width="6%">ѡ��</td>
            <td width="11%">�ֻ�����</td>
            <td width="8%">������</td>
            <td width="17%">IP��ַ (����)</td>
            <td width="10%">��Դҳ��</td>
            <td width="10%">�ύʱ��</td>
        </tr>
        <?
        while($row = $db->fetch_array($rs)){
            ?>
            <tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
                <td><?=$row['id']?></td>
                <td><input name="checkboxid[]" type="checkbox" value="<?=$row['id']?>" class="np"></td>
                <td><?=$row['mobile']?></td>
                <td><?=$row['phone_seatof']?></td>
                <td><?=$row['ip']?> ��<?=$row['ipcity']?>��</td>
                <td><u><?=$row['laiurl']?></u></td>
                <td><?=date('Y-m-d H:i:s',$row['add_time'])?></td>
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

<!--  ������  -->
<form name='form3' action='?type=s' method='post'>
    <table width='98%'  border='0' cellpadding='1' cellspacing='1' bgcolor='#CBD8AC' align="center" style="margin-top:8px">
        <tr bgcolor='#EEF4EA'>
            <td background='skin/images/wbg.gif' align='center'>
                <table border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                        <td width='90' align='center'>����</td>

                        <td width='70'>
                            �ֻ����룺
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