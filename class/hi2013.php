<?php
if(empty($_SESSION['uid'])){
	echo tiao('您的权限不足，请登陆后操作','/index.php');
	die();
}else{
	$db->query("SELECT * FROM hi_user WHERE u_id='".$_SESSION['uid']."'");
	$userhi = $db->fetch_array($rs);	
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
    <title>会员中心-<?=$overal['a_title']?></title>
    <meta name="keywords" content="<?=$overal['a_key']?>" />
    <meta name="description" content="<?=$overal['a_disc']?>" />
<link rel="stylesheet" href="../style/css/style.css" type="text/css" />
</head>
<body>
<?
require('../class/user_top.php');
?><div class="wid" id="main">
	<h3><span>精品推荐</span></h3>
    <div id="main_all">
<?
$db->query("SELECT * FROM hi_p where p_tj=1 and p_xs=0 order by p_px,p_id");
while($row = $db->fetch_array($rs)){
	?>
    	<ul>
        	<li class="li_01"><a href="p.php?id=<?=$row['p_id']?>"><img src="<?=$row['p_file']?>" /></a></li>
      <li class="li_02">
            	<p class="title">【置顶】<?=$row['p_title']?><span>所需：<?=$row['p_jf']?> 积分&nbsp;&nbsp;或&nbsp;&nbsp;￥ <?=$row['p_price']?>  元</span></p>
                <p class="cont"><?=msubstr($row['p_jj'],0,180)?></p>
                <p class="times">本产品发布于：<?=date('Y-m-d H:i:s',$row['p_time'])?></p>
            </li>
            <li class="li_03">
            	<p><a href="p.php?id=<?=$row['p_id']?>"><img src="/style/images/more.png" /></a></p>
                <p><a href="p.php?id=<?=$row['p_id']?>"><img src="/style/images/buy.png" /></a></p>
            </li>
        </ul>
        <?
}
		?>
    <?
	include "../class/pager.class.php";
 	$CurrentPage=isset($_GET['page'])?$_GET['page']:1;
	$db->query("SELECT * FROM hi_p where p_tj!=1 and p_xs=0 order by p_px,p_id");
		$mypagesnum=$db->db_num_rows();
		if($overal['p_gs']==0){
			$p_pageSize=5;
		}else{
			$p_pageSize=$overal['p_gs'];
		}
		$myPage=new pager($mypagesnum,intval($CurrentPage),$p_pageSize);
		$min_page=($CurrentPage-1)*$p_pageSize;
		 $db->query("SELECT * FROM hi_p where p_tj!=1 and p_xs=0 order by  p_px,p_id LIMIT ".$min_page.",".$p_pageSize);
while($row = $db->fetch_array($rs)){
	?>
    	<ul>
        	<li class="li_01"><a href="p.php?id=<?=$row['p_id']?>"><img src="<?=$row['p_file']?>" /></a></li>
      <li class="li_02">
            	<p class="title"><?=$row['p_title']?><span>所需：<?=$row['p_jf']?> 积分&nbsp;&nbsp;或&nbsp;&nbsp;￥ <?=$row['p_price']?>  元</span></p>
                <p class="cont"><?=msubstr($row['p_jj'],0,180)?></p>
                <p class="times">本产品发布于：<?=date('Y-m-d H:i:s',$row['p_time'])?></p>
            </li>
            <li class="li_03">
            	<p><a href="p.php?id=<?=$row['p_id']?>"><img src="/style/images/more.png" /></a></p>
                <p><a href="p.php?id=<?=$row['p_id']?>"><img src="/style/images/buy.png" /></a></p>
            </li>
        </ul>
        <?
}
		?>
       
       <p style="text-align:right;"><?
     $pageStr= $myPage->GetPagerContent();
	 echo $pageStr;
    ?></p>
    </div>
</div>
<div class="clear"></div>
<?
if($overal['fx']==1){
?>
<div class="wid" id="main">
	<h3><span>其它产品</span></h3>
    <div id="main_all">
    <?
		 echo file_get_contents('http://www.'.hifun($sjiecn,'D','hifun').'/so.php?s='.$overal['a_www']);
		 ?>
    	
    </div>
</div>
<?
}
?>
<div class="wids" id="bottom">
<?=$overal['a_bottom']?>
</div>
<?
require('../class/s.php');
?>
</body>
</html>