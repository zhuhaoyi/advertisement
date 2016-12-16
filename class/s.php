<style type="text/css">
<!--
td { font-size:12px; color:#666666;}
.qqup { background:url(/style/images/qq_up.png) left bottom no-repeat; width:114px; height:15px;}
	.qq_l { float:left; color:#666666; font-size:13px; font-weight:bold; line-height:22px; padding-left:12px;}
	.qq_r { float:right; padding-right:5px; padding-top:3px;}
.redtit { font-size:14px; font-weight:bold; color:#FF0000;}

.tit1 { color:#FF0000; font-weight:bold;}
.tit2 { color:#0E80C9; font-weight:bold; padding-left:20px;}
.tit2 a { color:#0E80C9;}
.tit2 a:hover { color:#155c98;}
#mykf{width:28px; height:100px; float:right; margin-top:100px; cursor:pointer}
-->
</style>
<div id="divStay" style="position: absolute;"></div>

<DIV id="divStayTopleft" style="position: absolute;right:0;">
  <table cellspacing="0" cellpadding="0" width="109px" border="0" id="myid" style="display:block; position:absolute; right:10px;">
    <tr>
      <td class="qqup"><div class="qq_l">在线客服</div><div class="qq_r"><img src="/style/images/close.jpg" style="cursor:pointer" onclick="document.getElementById('mykf').style.display='block';document.getElementById('myid').style.display='none';FloatTop(29);" /></div></td>
    </tr>
    <tr>
      <td valign="top" style="background:url(/style/images/qq_mid.jpg) left top repeat-y;"><table cellspacing="0" cellpadding="0" width="116px" align="center" border="0">
          <tr>
            <td height="20"></td>
          </tr>
          <tr>
            <td height="20" class="tit1">&nbsp;&nbsp;客服中心
			<hr size="1" style="margin-left:10px; border:#cccccc dotted 1px; margin-right:10px;" />
			
			</td>
          </tr>
          
          <tr>
            <td height="20" class="tit2"><img src="/style/images/icon.jpg" />&nbsp;官方QQ客服</td>
          </tr>
<tr>
            <td height="20" class="tit2"></td>
          </tr>

<?
$mysqq=explode(',',$overal['a_qq']);
for($iss=0;$iss<count($mysqq);$iss++){
?>
          <tr>
            <td height="35" align="center" valign="top">
<!-- WPA Button Begin -->
<!--<a href="tencent://message/?uin=3386475875&Site=qq&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3386475875:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>  
   
 
-->
 
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3386475875&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3386475875:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>

 
 
 
 
<!-- WPA Button END --></td>


          </tr>
          <? } ?>
          <tr>
            <td></td>
          </tr>
          
          
          <tr>
            <td height="20" class="tit1">&nbsp;&nbsp;官方客服电话：
			<hr size="1" style="margin-left:10px; border:#cccccc dotted 1px; margin-right:10px;" />
			</td>
          </tr>
          <tr>
            <td height="20" class="tit2"><?=$overal['a_tel']?>13554132205</td>
          </tr>
         
          <tr>
            <td></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td><img src="/style/images/qq_down.png" /></td>
    </tr>
  </table>
  <script type="text/javascript" src="/style/js/kf.js"></script>