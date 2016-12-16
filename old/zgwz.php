<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>国诚买卖点诊股仪（网站）</title>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/gupiao.js"></script>
	<style type="text/css">
		@import url("css/style.css");
	</style>
</head>
<body>
<div class="head">
	<img src="images/ZDHD_01.png">
</div>
<div class="bgi">
	<div class="middle">
		<img class="middle_left" src="images/ZDHD_02.png">
		<div class="middle_right">
			<form action="wangzhan.php" method="post" id="form1">
				<div class="zhengu">
					<input name="username" type="text" id="txb_stock" class="stock" placeholder="股票代码或名称">
				</div>
				<div class="enter">
					<input name="mobile" type="text" id="txb_telnum" class="telnum" placeholder="接收诊断结果手机号码">
					<input name="laiurl" type="hidden" value="网站-诊股">
					<input type="submit" name="btn_sub" value=" " id="btn_sub" class="btn">
				</div>
			</form>
			<div id="demo">
				<div id="demo1">
					<ul  class="mulitline">
						<li>155****0987 002292 奥飞动漫</li>
						<li>186****5739 002243 通产丽星</li>
						<li>186****6879 300059 东方财富</li>
						<li>150****9386 601989 中国重工</li>
						<li>138****0721 600201 生物股份</li>
						<li>159****6225 002010 传化股份</li>
						<li>185****5367 000338 潍柴动力</li>
						<li>132****5735 600521 华海药业</li>
						<li>157****3697 000930 中粮生化</li>
						<li>158****1213 601618 中国中冶</li>
						<li>136****0225 002375 亚厦股份</li>
						<li>158****2892 600602 仪电电子</li>
						<li>131****6321 000725 京东方A</li>
						<li>156****7886 002197 证通电子</li>
						<li>185****1368 300459 浙江金科</li>
						<li>139****6452 000018 神州长城</li>
						<li>189****1552 300490 华自科技</li>
						<li>188****0223 600806 昆明机床</li>
						<li>186****8008 300130 新国都</li>
						<li>138****6183 600868 梅雁吉祥</li>
						<li>180****0712 600234 山水文化</li>
						<li>139****9182 002292 奥飞动漫</li>
						<li>136****6891 002226 江南化工</li>
						<li>187****9276 600549 厦门钨业</li>
						<li>151****1675 002103 广博股份</li>
						<li>137****7021 300135 宝丽国际</li>
						<li>135****9259 300033 同花顺</li>
						<li>158****0216 002011 盾安环境</li>
						<li>135****7531 000973 佛塑科技</li>
						<li>158****1368 002504 弘高创意</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="footer">
		<img src="images/ZDHD_04.png">
	</div>
</div>
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
<div style="display:none">
	<script type="text/javascript">
		var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259813167'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1259813167%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
		$('cnzz_protocol').hide();
	</script>
</div>
</body>
</html>
