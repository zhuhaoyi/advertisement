<?php
 require_once '../config.php';
 require_once('chink.php');
?>
<html>
<head>
<title>menu</title>
<link rel="stylesheet" href="skin/css/base.css" type="text/css" />
<link rel="stylesheet" href="skin/css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="skin/js/frame/menu.js"></script>
<base target="main" />
</head>
<body target="main">
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td style='padding-left:3px;padding-top:8px' valign="top">
	<!-- Item 1 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items1_1")'><b>ȫ������</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <ul class='sitemu'>
            <li><a href='overall.php' target='main'>վ����Ϣ</a> </li>
			<li><a href='user_list.php' target='main'>�ֻ��������</a> </li>
			<li><a href='suogu.php' target='main'>�����ֻ��������</a> </li>
			<li><a href='zhengu.php' target='main'>����ֻ��������</a> </li>
            <li><a href='admin_pass.php' target='main'>����Ա(�����޸�)</a> </li>
            <li><a href='/index.php' target='_blank'>�鿴��ҳ</a> </li>
            
          </ul>
        </dd>
      </dl>
      <!-- Item 1 End -->
      <?
	  require('banquan.php');
	  ?>
	  </td>
  </tr>
</table>
</body>
</html>