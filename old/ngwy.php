<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>牛股天机星</title>
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/gupiao.js"></script>
    <style type="text/css">
        @import url("suoqu/css/style.css");
    </style>
</head>
<body>
<!--顶部标题-->
<div class="header_top">
    <img id="logo" src="suoqu/images/logo.png">
    <div class="header">
        <img class="title" src="suoqu/images/img_1.png">
        <h1>哪些黑马爆发在即？</h1>
        <img class="title" src="suoqu/images/img_2.png">
    </div>
</div>
<div class="content_middle">
    <div class="left">
        <img src="suoqu/images/img_7.png">
        <div id="left_text">
            <p style="padding-top:10px; font-size:16px; line-height:28px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金秋十月，高送转主题已悄然升温，得高送转者得天下，策马扬鞭火速布局高送转至高领地！通过对两市两千多只个股深度扫描，综合历史数据特征形态，精选一批潜力黑马股，抢先布局爆发在即！</p>
            <p style="font-weight:bold;font-size:17px; ">主力大肆吸筹+经典爆发形态+重点资产重组  三大维度擒最牛黑马。。</p>
            <p style="font-weight:bold">300XXX</p>
            <p style="font-weight:bold; ">一、斥巨资收购某知名企业100%股权，股指将大幅提升；</p>
            <p style="font-weight:bold; ">二、底部放量K线阳多阴少，主力大肆吸筹；</p>
            <p style="font-weight:bold; ">三、高送转概念，均线多头发散，上涨模式即将开启。</p>
        </div>
    </div>
    <div class="right">
        <img class="k_line" src="suoqu/images/img_9.png">
        <div id="right_message">
            <form action="wangyi.php" method="post" name="hiform">
                <div class="enter">
                    <input name="users" type="hidden" id="txb_stock" class="stock" value="无股票代码">
                    <input name="mobile" type="text" id="txb_telnum" class="telnum" placeholder="&nbsp;接收信息手机号">
                    <input name="laiurl" type="hidden" value="网易-索股">
                    <input type="submit" name="btn_sub" value=" " id="btn_sub" class="btn">
                </div>
            </form>
            <p>(为保证不影响主力节奏 每日免费索取牛股天机星名额仅限200名！)</p>
            <img src="suoqu/images/img_6.png">
            <div id="demo">
                <div id="demo1">
                    <ul  class="mulitline">
                        <li>185****3471&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>135****8979&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>189****7951&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>132****8610&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>155****2689&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>158****6789&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>155****3289&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>131****6421&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>180****6785&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>189****8225&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>159****3185&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>138****0520&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>132****8566&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>186****0776&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                        <li>155****1213&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您成功参与</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script language="javascript" type="text/javascript">
    $(function () {
        //多行应用
        var _wrap = $('ul.mulitline'); //定义滚动区域
        var _interval = 3000; //定义滚动间隙时间
        var _moving; //需要清除的动画
        _wrap.hover(function () {
            clearInterval(_moving); //当鼠标在滚动区域中时,停止滚动
        }, function () {
            _moving = setInterval(function () {
                var _field = _wrap.find('li:first'); //此变量不可放置于函数起始处，li:first取值是变化的
                var _h = _field.height(); //取得每次滚动高度
                _field.animate({ marginTop: -_h + 'px' }, 600, function () {//通过取负margin值，隐藏第一行
                    _field.css('marginTop', 0).appendTo(_wrap); //隐藏后，将该行的margin值置零，并插入到最后，实现无缝滚动
                })
            }, _interval)//滚动间隔时间取决于_interval
        }).trigger('mouseleave'); //函数载入时，模拟执行mouseleave，即自动滚动
    });
</script>
<script type="text/javascript">
    var doc = window.document, input = doc.createElement('input');
    if( typeof input['placeholder'] == 'undefined' ) // 如果不支持placeholder属性
    {
        $('input').each(function( ele )
        {
            var me = $(this);
            var ph = me.attr('placeholder');
            if( ph && !me.val() )
            {
                me.val(ph).css('color', '#aaa').css('line-height', me.css('height'));
            }
            me.on('focus', function()
            {
                if( me.val() === ph)
                {
                    me.val(null).css('color', '');
                }
            }).on('blur', function()
            {
                if( !me.val() )
                {
                    me.val(ph).css('color', '#aaa').css('line-height', me.css('height'));
                }
            });
        });
    }
</script>
<div class="new">
    <div class="new_content">
        <ul id="new_one">
            <li>金科股份（000656）</li>
            <li>大杨创世（600233）</li>
            <li>森远股份（300210）</li>
        </ul>
        <ul id="new_two">
            <li>20160921</li>
            <li>20160919</li>
            <li>20160919</li>
        </ul>
        <ul id="new_three">
            <li>4.38</li>
            <li>23.3</li>
            <li>16.1</li>
        </ul>
        <ul id="new_four">
            <li>20.9%</li>
            <li>38.6%</li>
            <li>32.8%</li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<img class="foot" src="suoqu/images/bgi_foot.png">
<!--站长统计-->
<div style="display:none">
    <script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259813167'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1259813167%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
        $('cnzz_protocol').hide();
    </script>
</div>
</body>
</html>



