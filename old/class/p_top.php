<div class="wids" style="background:#2566A0">
    <div class="wid" id="nav">
    	
    </div>
</div>
<div class="wid" id="banner">
	<div id="user_left">
    	<div id="user_top_1">
        	<img src="/style/images/pho.png" />
            <h3>������<?=$userhi['user_name']?>��<?
            if($userhi['u_qx']==1){
				echo '��ͨ��Ա';
			}else if($userhi['u_qx']==2){
				echo '�ƹ���';
			}else if($userhi['u_qx']==3){
				echo 'VIP';
			}

			?>��</h3>
            <p>���䣺<?=$userhi['email']?></p>
            <p><a href="/class/login.php?type=loginout">�˳���½</a></p>
        </div>
        <div id="user_top_2">
        	���֣�<span><?=$userhi['jf']?>��</span>RMB��<span>��<?=$userhi['qian']?>Ԫ</span>
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
    	<h3>��Ʒ���ƣ�<span style="color:#ff0000"><?=$row['p_title']?></span></h3>
        <p style="font-weight:bold">��Ʒ�۸�<span style="color:#ff0000">��<?=$row['p_price']?>Ԫ</span></p>
        <p style="font-weight:bold">���ֶһ���<span style="color:#ff0000"><?=$row['p_jf']?>��</span></p>
        <p style="font-weight:bold">��Ʒ��飺<span style="font-weight:100"><?=msubstr($row['p_jj'],0,60)?></span></p>
        <div id="zhifu">
        <form name="formss" method="post" action="order.php">
        	<h3>���ڶ���:</h3>
            <p><input type="radio" name="ptype" value="1" checked="checked" />���֧��&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ptype" value="0" />���ֶһ�&nbsp;&nbsp;&nbsp;<input type="hidden" name="num" value="1" style="width:40px;"  /> </p>
            <input type="hidden" name="id" value="<?=$row['p_id']?>" />
            <p><input type="image" src="/style/images/dg.png" name="images" /></p>
            </form>
        </div>
        
    </div>
</div>