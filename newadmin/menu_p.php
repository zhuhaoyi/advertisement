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
        <dt onClick='showHide("items1_1")'><b>产品管理中心</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <ul class='sitemu'>
            <li><a href='p_list.php' target='main'>产品列表</a> </li>
            <li><a href='p_add.php' target='main'>添加产品</a></li>
            <li><a href='p_order.php' target='main'>产品订单管理</a></li>
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