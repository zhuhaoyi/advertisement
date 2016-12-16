<div class="wids" style="background:#2566A0">
    <div class="wid" id="nav">
    	
    </div>
</div>
<div class="wid" id="banner">
	<div id="user_left">
    	<div id="user_top_1">
        	<img src="/style/images/pho.png" />
            <h3>户名：<?=$userhi['user_name']?>【<?
            if($userhi['u_qx']==1){
				echo '普通会员';
			}else if($userhi['u_qx']==2){
				echo '推广者';
			}else if($userhi['u_qx']==3){
				echo 'VIP';
			}

			?>】</h3>
            <p>邮箱：<?=$userhi['email']?></p>
            <p><a href="/class/login.php?type=loginout">退出登陆</a></p>
        </div>
        <div id="user_top_2">
        	积分：<span><?=$userhi['jf']?>分</span>RMB：<span>￥<?=$userhi['qian']?>元</span>
        </div>
        <div id="user_top_3">
        	<ul>
            	<li><a href="Information.php"><img src="/style/images/no1.png" /></a></li>
                <li><?
                if($userhi['u_qx']==1){
					echo '<a href="tuiuser.php"><img src="/style/images/no5.png" /></a>';	
				}else{
					echo '<a href="/guizhe.doc"><img src="/style/images/no2.png" /></a>';	
				}
				?></li>
                <li><a href="Recharge.php"><img src="/style/images/no3.png" /></a></li>
                <li><a href="Withdrawals.php"><img src="/style/images/no4.png" /></a></li>
            </ul>
        </div>
    </div>
    <div id="user_rights">
    <img style="float:right; margin-left:10px; width:229px; height:196px" src="<?=$row['p_file']?>" />
    	<h3>产品名称：<span style="color:#ff0000"><?=$row['p_title']?></span></h3>
        <p style="font-weight:bold">产品价格：<span style="color:#ff0000">￥<?=$row['p_price']?>元</span></p>
        <p style="font-weight:bold">积分兑换：<span style="color:#ff0000"><?=$row['p_jf']?>分</span></p>
        <p style="font-weight:bold">产品简介：<span style="font-weight:100"><?=msubstr($row['p_jj'],0,60)?></span></p>
        <div id="zhifu">
        <form name="formss" method="post" action="order.php">
        	<h3>现在订购:</h3>
            <p><input type="radio" name="ptype" value="1" checked="checked" />余额支付&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ptype" value="0" />积分兑换&nbsp;&nbsp;&nbsp;<input type="hidden" name="num" value="1" style="width:40px;"  /> </p>
            <input type="hidden" name="id" value="<?=$row['p_id']?>" />
            <p><input type="image" src="/style/images/dg.png" name="images" /></p>
            </form>
        </div>
        
    </div>
</div>