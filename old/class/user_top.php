<script type=text/javascript src="/public/js/jquery.js"></script>
<script type=text/javascript src="/public/js/duxui.js"></script>

<script type=text/javascript src="/public/js/dialog/lhgdialog.min.js?skin=default"></script>
<script type=text/javascript src="/public/js/common.js"></script>
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
    <div id="user_right">
    	<h3>�ƹ�׬�������غ�����Դ��<span style="color:#ff0000; font-weight:100">(���Ƽ�<?
        $db->query("SELECT * FROM hi_user WHERE user_tui='".$_SESSION['uid']."'");
		$tuirs = $db->db_num_rows($rs);
		echo $tuirs;
		?>��)</span>&nbsp;&nbsp;<a style="font-weight:100" href="javascript:void(0);" onclick="edits('myuser.php')"><u>�鿴�����ƹ�Ļ�Ա</u></a></h3>
        <p class="hiinput"><input type="text" value="http://<?=$_SESSION['uid']?>.<?=$overal['mysite']?>/" />&nbsp;&nbsp;<a  href="javascript:void(0);" onclick="edit('leibu.php')"><b>��ȡ����</b></a></p>
        <?=$overal['user_top']?>
        <p>

        </p>
    </div>
</div>
<script>
function edit(url) {
	urldialog('�����ƹ�׬Ǯ����',url)
};
function edits(url) {
	urldialog('�����ƹ�Ļ�Ա',url)
};
</script>