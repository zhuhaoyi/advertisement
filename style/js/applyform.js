
function G(str) {
	return document.getElementById(str);
}
 
function trim(source) {
    return String(source).replace(new RegExp("(^[\\s\\t\\xa0\\u3000]+)|([\\u3000\\xa0\\s\\t]+\x24)", "g"), "");
}
 
function isBlank(str) {
	return trim(str) == '';
} 

function submitForm() {
	if(Validator.check(G('registForm'))) {
		try {
			G('submitFrame').style.display = "block";
			G('registForm').style.display = "none";
		} catch (e) {};
		G('registForm').submit();
	}
}
 
var subCityList = {};
var StatusMgr = {
	pattern : 'phone',  /*pattern选项为phone或email*/
	cell     : false,
	phone    : false,
	contact  : false,
	log		 : false
};
 
var RegionData = {
	'provListWrap' : G('currProv'),
	'subCityList' : {},
	'provList' : [{"prov":"安徽","id":9},{"prov":"澳门","id":36},{"prov":"北京","id":1},{"prov":"重庆","id":33},{"prov":"福建","id":5},{"prov":"甘肃","id":11},{"prov":"广东","id":4},{"prov":"广西","id":12},{"prov":"贵州","id":10},{"prov":"海南","id":8},{"prov":"河北","id":13},{"prov":"河南","id":14},{"prov":"黑龙江","id":15},{"prov":"湖北","id":16},{"prov":"湖南","id":17},{"prov":"吉林","id":18},{"prov":"江苏","id":19},{"prov":"江西","id":20},{"prov":"辽宁","id":21},{"prov":"内蒙古","id":22},{"prov":"宁夏","id":23},{"prov":"青海","id":24},{"prov":"山东","id":25},{"prov":"山西","id":26},{"prov":"陕西","id":27},{"prov":"上海","id":2},{"prov":"四川","id":28},{"prov":"台湾","id":35},{"prov":"天津","id":3},{"prov":"西藏","id":29},{"prov":"香港","id":34},{"prov":"新疆","id":30},{"prov":"云南","id":31},{"prov":"浙江","id":32},{"prov":"国外及其他","id":37}],
	'cityList' : [{"pid":15,"city":[{"name":"大兴安岭","id":321},{"name":"大庆","id":320},{"name":"哈尔滨","id":322},{"name":"鹤岗","id":323},{"name":"黑河","id":324},{"name":"鸡西","id":325},{"name":"佳木斯","id":326},{"name":"牡丹江","id":327},{"name":"七台河","id":328},{"name":"齐齐哈尔","id":329},{"name":"双鸭山","id":330},{"name":"绥化","id":331},{"name":"伊春","id":332}]},{"pid":30,"city":[{"name":"阿克苏","id":136},{"name":"阿勒泰","id":423},{"name":"阿拉尔","id":137},{"name":"巴音郭楞蒙古自治州","id":138},{"name":"博乐","id":419},{"name":"博尔塔拉蒙古自治州","id":139},{"name":"昌吉回族自治州","id":140},{"name":"哈密","id":141},{"name":"和田","id":142},{"name":"喀什","id":143},{"name":"克孜勒苏柯尔克孜自治州","id":151},{"name":"克拉玛依","id":144},{"name":"库尔勒","id":425},{"name":"奎屯","id":418},{"name":"石河子","id":145},{"name":"塔城","id":428},{"name":"图木舒克","id":146},{"name":"吐鲁番","id":147},{"name":"乌鲁木齐","id":148},{"name":"五家渠","id":149},{"name":"伊犁哈萨克自治州","id":150}]},{"pid":8,"city":[{"name":"白沙黎族自治县","id":71},{"name":"保亭黎族苗族自治县","id":87},{"name":"昌江黎族自治县","id":72},{"name":"澄迈县","id":73},{"name":"儋州","id":86},{"name":"定安县","id":74},{"name":"东方","id":75},{"name":"海口","id":76},{"name":"乐东黎族自治县","id":77},{"name":"临高县","id":78},{"name":"陵水黎族自治县","id":79},{"name":"琼中黎族苗族自治县","id":88},{"name":"琼海","id":80},{"name":"三亚","id":81},{"name":"屯昌县","id":82},{"name":"万宁","id":83},{"name":"文昌","id":84},{"name":"五指山","id":85}]},{"pid":23,"city":[{"name":"固原","id":238},{"name":"石嘴山","id":239},{"name":"吴忠","id":240},{"name":"银川","id":241},{"name":"中卫","id":417}]},{"pid":16,"city":[{"name":"鄂州","id":303},{"name":"恩施土家族苗族自治州","id":304},{"name":"黄冈","id":305},{"name":"黄石","id":306},{"name":"江汉市","id":448},{"name":"荆州","id":308},{"name":"荆门","id":307},{"name":"潜江","id":309},{"name":"神农架林区","id":310},{"name":"十堰","id":311},{"name":"随州","id":312},{"name":"天门","id":313},{"name":"武汉","id":314},{"name":"仙桃","id":315},{"name":"咸宁","id":316},{"name":"襄樊","id":317},{"name":"孝感","id":318},{"name":"宜昌","id":319}]},{"pid":31,"city":[{"name":"保山","id":120},{"name":"楚雄彝族自治州","id":121},{"name":"大理白族自治州","id":122},{"name":"德宏傣族景颇族自治州","id":123},{"name":"迪庆藏族自治州","id":124},{"name":"红河哈尼族彝族自治州","id":125},{"name":"昆明","id":126},{"name":"丽江","id":127},{"name":"临沧","id":128},{"name":"怒江傈傈族自治州","id":129},{"name":"曲靖","id":130},{"name":"思茅","id":131},{"name":"文山壮族苗族自治州","id":132},{"name":"西双版纳傣族自治州","id":133},{"name":"玉溪","id":134},{"name":"昭通","id":135}]},{"pid":35,"city":[{"name":"台湾","id":108}]},{"pid":22,"city":[{"name":"阿拉善盟","id":226},{"name":"巴彦浩特","id":420},{"name":"巴彦淖尔盟","id":227},{"name":"包头","id":228},{"name":"赤峰","id":229},{"name":"鄂尔多斯","id":230},{"name":"海拉尔","id":450},{"name":"呼伦贝尔","id":232},{"name":"呼和浩特","id":231},{"name":"集宁市","id":424},{"name":"临河市","id":451},{"name":"通辽","id":233},{"name":"乌兰察布盟","id":235},{"name":"乌兰查布","id":426},{"name":"乌兰浩特","id":452},{"name":"乌海","id":234},{"name":"锡林浩特","id":427},{"name":"锡林郭勒盟","id":236},{"name":"兴安盟","id":237}]},{"pid":34,"city":[{"name":"香港","id":107}]},{"pid":32,"city":[{"name":"杭州","id":109},{"name":"湖州","id":110},{"name":"嘉兴","id":111},{"name":"金华","id":112},{"name":"丽水","id":113},{"name":"宁波","id":114},{"name":"衢州","id":119},{"name":"绍兴","id":115},{"name":"台州","id":116},{"name":"温州","id":117},{"name":"舟山","id":118}]},{"pid":9,"city":[{"name":"安庆","id":89},{"name":"蚌埠","id":90},{"name":"亳州","id":105},{"name":"巢湖","id":91},{"name":"池州","id":92},{"name":"滁州","id":93},{"name":"阜阳","id":94},{"name":"合肥","id":95},{"name":"淮北","id":96},{"name":"淮南","id":97},{"name":"黄山","id":98},{"name":"六安","id":99},{"name":"马鞍山","id":100},{"name":"宿州","id":101},{"name":"铜陵","id":102},{"name":"芜湖","id":103},{"name":"宣城","id":104}]},{"pid":21,"city":[{"name":"鞍山","id":242},{"name":"本溪","id":243},{"name":"朝阳","id":244},{"name":"大连","id":245},{"name":"丹东","id":246},{"name":"抚顺","id":247},{"name":"阜新","id":248},{"name":"葫芦岛","id":249},{"name":"锦州","id":250},{"name":"辽阳","id":251},{"name":"盘锦","id":252},{"name":"沈阳","id":253},{"name":"铁岭","id":254},{"name":"营口","id":255}]},{"pid":33,"city":[{"name":"重庆","id":106}]},{"pid":1,"city":[{"name":"北京","id":38}]},{"pid":480,"city":[{"name":"日本","id":481}]},{"pid":29,"city":[{"name":"阿里","id":152},{"name":"昌都","id":153},{"name":"拉萨","id":154},{"name":"林芝","id":155},{"name":"那曲","id":156},{"name":"日喀则","id":157},{"name":"山南","id":158}]},{"pid":14,"city":[{"name":"安阳","id":333},{"name":"鹤壁","id":334},{"name":"潢川市","id":415},{"name":"济源","id":335},{"name":"焦作","id":336},{"name":"开封","id":337},{"name":"洛阳","id":338},{"name":"漯河","id":349},{"name":"南阳","id":339},{"name":"平顶山","id":340},{"name":"濮阳","id":350},{"name":"三门峡","id":341},{"name":"商丘","id":342},{"name":"新乡","id":343},{"name":"信阳","id":344},{"name":"许昌","id":345},{"name":"郑州","id":346},{"name":"周口","id":347},{"name":"驻马店","id":348}]},{"pid":24,"city":[{"name":"德令哈","id":456},{"name":"格尔木","id":421},{"name":"共和","id":455},{"name":"果洛藏族自治州","id":218},{"name":"海东","id":220},{"name":"海北藏族自治州","id":219},{"name":"海南藏族自治州","id":221},{"name":"海晏","id":454},{"name":"海西蒙古族藏族自治州","id":222},{"name":"黄南藏族自治州","id":223},{"name":"西宁","id":224},{"name":"玉树藏族自治州","id":225}]},{"pid":4,"city":[{"name":"潮州","id":46},{"name":"东莞","id":47},{"name":"佛山","id":48},{"name":"广州","id":41},{"name":"河源","id":49},{"name":"惠州","id":50},{"name":"江门","id":51},{"name":"揭阳","id":52},{"name":"茂名","id":53},{"name":"梅州","id":54},{"name":"清远","id":55},{"name":"汕头","id":56},{"name":"汕尾","id":57},{"name":"韶关","id":58},{"name":"深圳","id":42},{"name":"阳江","id":59},{"name":"云浮","id":60},{"name":"湛江","id":61},{"name":"肇庆","id":62},{"name":"中山","id":63},{"name":"珠海","id":45}]},{"pid":36,"city":[{"name":"澳门","id":399}]},{"pid":19,"city":[{"name":"常州","id":267},{"name":"淮安","id":268},{"name":"姜堰","id":405},{"name":"江阴","id":401},{"name":"靖江","id":402},{"name":"连云港","id":269},{"name":"南京","id":270},{"name":"南通","id":271},{"name":"苏州","id":272},{"name":"宿迁","id":273},{"name":"泰兴","id":404},{"name":"泰州","id":274},{"name":"无锡","id":275},{"name":"兴化","id":403},{"name":"徐州","id":276},{"name":"盐城","id":277},{"name":"扬州","id":278},{"name":"镇江","id":279}]},{"pid":26,"city":[{"name":"大同","id":191},{"name":"晋中","id":193},{"name":"晋城","id":192},{"name":"临汾","id":194},{"name":"吕梁","id":195},{"name":"朔州","id":196},{"name":"太原","id":197},{"name":"忻州","id":198},{"name":"阳泉","id":199},{"name":"运城","id":200},{"name":"长治","id":190}]},{"pid":11,"city":[{"name":"白银","id":376},{"name":"定西","id":377},{"name":"甘南藏族自治州","id":378},{"name":"嘉峪关","id":379},{"name":"金昌","id":380},{"name":"酒泉","id":381},{"name":"兰州","id":382},{"name":"临夏回族自治州","id":383},{"name":"陇南","id":384},{"name":"平凉","id":385},{"name":"庆阳","id":386},{"name":"天水","id":387},{"name":"武威","id":388},{"name":"张掖","id":389}]},{"pid":18,"city":[{"name":"白城","id":294},{"name":"白山","id":295},{"name":"珲春市","id":411},{"name":"吉林","id":297},{"name":"辽源","id":298},{"name":"梅河口","id":449},{"name":"四平","id":299},{"name":"松原","id":300},{"name":"通化","id":301},{"name":"延吉市","id":422},{"name":"延边朝鲜族自治州","id":302},{"name":"长春","id":296}]},{"pid":3,"city":[{"name":"天津","id":40}]},{"pid":12,"city":[{"name":"百色","id":362},{"name":"北海","id":363},{"name":"崇左","id":364},{"name":"防城港","id":365},{"name":"桂林","id":366},{"name":"贵港","id":367},{"name":"河池","id":368},{"name":"贺州","id":369},{"name":"来宾","id":370},{"name":"柳州","id":371},{"name":"南宁","id":372},{"name":"钦州","id":373},{"name":"梧州","id":374},{"name":"玉林","id":375}]},{"pid":27,"city":[{"name":"安康","id":180},{"name":"宝鸡","id":181},{"name":"汉中","id":182},{"name":"商洛","id":183},{"name":"铜川","id":184},{"name":"渭南","id":185},{"name":"西安","id":186},{"name":"咸阳","id":187},{"name":"延安","id":188},{"name":"榆林","id":189}]},{"pid":17,"city":[{"name":"常德","id":280},{"name":"郴州","id":282},{"name":"衡阳","id":283},{"name":"怀化","id":284},{"name":"吉首市","id":416},{"name":"娄底","id":285},{"name":"邵阳","id":286},{"name":"湘潭","id":287},{"name":"湘西土家族苗族自治州","id":288},{"name":"益阳","id":289},{"name":"永州","id":290},{"name":"岳阳","id":291},{"name":"张家界","id":293},{"name":"长沙","id":281},{"name":"株洲","id":292}]},{"pid":2,"city":[{"name":"上海","id":39}]},{"pid":13,"city":[{"name":"保定","id":351},{"name":"沧州","id":352},{"name":"承德","id":353},{"name":"邯郸","id":354},{"name":"衡水","id":355},{"name":"廊坊","id":356},{"name":"秦皇岛","id":357},{"name":"石家庄","id":358},{"name":"唐山","id":359},{"name":"邢台","id":360},{"name":"张家口","id":361}]},{"pid":28,"city":[{"name":"阿坝藏族羌族自治州","id":159},{"name":"巴中","id":160},{"name":"成都","id":161},{"name":"达州","id":162},{"name":"德阳","id":163},{"name":"甘孜藏族自治州","id":164},{"name":"广元","id":166},{"name":"广安","id":165},{"name":"乐山","id":167},{"name":"凉山彝族自治州","id":168},{"name":"泸州","id":179},{"name":"眉山","id":169},{"name":"绵阳","id":170},{"name":"南充","id":171},{"name":"内江","id":172},{"name":"攀枝花","id":173},{"name":"遂宁","id":174},{"name":"西昌市","id":453},{"name":"雅安","id":175},{"name":"宜宾","id":176},{"name":"资阳","id":177},{"name":"自贡","id":178}]},{"pid":20,"city":[{"name":"抚州","id":256},{"name":"赣州","id":257},{"name":"吉安","id":258},{"name":"景德镇","id":259},{"name":"九江","id":260},{"name":"南昌","id":261},{"name":"萍乡","id":262},{"name":"上饶","id":263},{"name":"新余","id":264},{"name":"宜春","id":265},{"name":"鹰潭","id":266}]},{"pid":37,"city":[{"name":"其他国家和地区","id":400},{"name":"韩国","id":457},{"name":"马来西亚","id":408},{"name":"日本","id":480},{"name":"新加坡","id":407},{"name":"印度尼西亚","id":409}]},{"pid":25,"city":[{"name":"滨州","id":201},{"name":"德州","id":202},{"name":"东营","id":203},{"name":"菏泽","id":204},{"name":"济南","id":205},{"name":"济宁","id":206},{"name":"莱芜","id":207},{"name":"聊城","id":208},{"name":"临沂","id":209},{"name":"青岛","id":210},{"name":"日照","id":211},{"name":"泰安","id":212},{"name":"威海","id":213},{"name":"潍坊","id":214},{"name":"烟台","id":215},{"name":"枣庄","id":216},{"name":"淄博","id":217}]},{"pid":10,"city":[{"name":"安顺","id":390},{"name":"毕节","id":391},{"name":"都匀市","id":414},{"name":"贵阳","id":392},{"name":"凯里市","id":412},{"name":"六盘水","id":393},{"name":"黔东南苗族侗族自治州","id":394},{"name":"黔南布依族苗族自治州","id":395},{"name":"黔西南布依族苗族自治州","id":396},{"name":"铜仁","id":397},{"name":"兴义市","id":413},{"name":"遵义","id":398}]},{"pid":5,"city":[{"name":"福州","id":44},{"name":"龙岩","id":64},{"name":"南平","id":65},{"name":"宁德","id":66},{"name":"莆田","id":67},{"name":"泉州","id":68},{"name":"三明","id":69},{"name":"厦门","id":43},{"name":"漳州","id":70}]}],
	
	'ABROAD_AREA_ID' : 37,
 
	'createOption' : function(text,value) {
		var option = document.createElement('option');
 
		option.value = value;
		option.innerHTML = text;
 
		return option;
	},
 
	'createProvList' : function () {
		var frag = document.createDocumentFragment();
		
		for (var i = 0,len = this.provList.length; i < len; i ++) {
			var option =  this.createOption(this.provList[i].prov,this.provList[i].id);
			frag.appendChild(option);
		}
 
		this.provListWrap.appendChild(frag);
	},
 
	'setSubList' : function() {
		for (var i = 0,len = this.cityList.length; i < len; i++) {
			var item = this.cityList[i];
			this.subCityList[item.pid] = [];	
			for (var j = 0,len2 = item.city.length; j < len2; j++ ) {
				this.subCityList[item.pid][j] = item.city[j];
			}
		}
	},
 
	'showSubList' : function(){
		var me =this;
 
		this.provListWrap.onchange = function() {
			var value = this.value,form = G('registForm'),subSelect = G('currCity');
			var subCity = me.subCityList[value];
		
 
			for (var i = subSelect.options.length-1; i >= 0; i--) {
				subSelect.removeChild(subSelect.options[i]);
			}			
			
			subSelect.options[0] = new Option("城市",'');
			if(subCity && subCity.length > 0) {
				
				for (var i = 0,len = subCity.length; i < len; i ++) {
					subSelect.options[i+1] = new Option(subCity[i].name,subCity[i].id);
 
				}
 
				//城市下拉框只有1个选项时，默认选中并隐藏下拉框
				if (subCity.length == 1 ) {
					subSelect.style.display = 'none';
					subSelect.selectedIndex = 1;
					Validator._showMsg('currProvId','','');//无出错提示
				} else {
					subSelect.style.display = '';
					Validator._showMsg('currProvId','请选择城市','');
				}
			}
 
			/*公司所在地为国外时，隐藏电话填写区域，显示邮箱*/
			if(value == me.ABROAD_AREA_ID) {
				G('emailItem').style.display = '';
				G('phoneItems').style.display = 'none';
				G('dvContactTel').style.display = 'none';
				G("tip4").style.display = "";
				StatusMgr.pattern = 'email';
			} else {
				G("emailItem").style.display = 'none';
				G("tip4").style.display = "none";
				G('phoneItems').style.display = '';
				G('dvContactTel').style.display = '';
				StatusMgr.pattern = 'phone';
			}
 
			if (value == '') {
				Validator._showMsg('currProvId','请选择省份','');
				subSelect.style.display = 'none';
			}
		}	
	},
 
	init : function(){
		this.createProvList();
		this.setSubList();
		this.showSubList();
 
		G('registForm').reset();
	}
};
 
RegionData.init();
 
 
var Validator = (function(){
	var tip5 = G('tip5');
	var form = G('registForm');
	var blurChkItems = ['companyName','contactName','email','contactTel','contactCell', 'companyUrl'];
	var submitChkItems = ['companyName','contactName','email','contactTel'];
 
	function showMsg(name,msg,type) {
		if (el.tipper) {
			el.tipper.innerHTML = msg;
			el.tipper.className = 'msg ' + type;
		}
	}
 
	return {
		
		tips : {
			'currProvId'		: G('tip1'),
			'currCityId'		: G('tip1'),
			'companyName'		: G('tip2'),
			'contactName'		: G('tip3'),
			'contactTel'		: G('tip5'),
			'email'				: G('tip4'),
			'contactCell'		: G('tip6'),
			'phone'				: G('tip7')
		},
		
		'_showMsg' : function(name,msg,type) {
			if (this.tips[name]) {
				this.tips[name].innerHTML = msg;
				this.tips[name].className = 'msg ' + type;
			}
		},
		
		
		'companyName' : function(el,noLog) {
            el.value = trim(el.value);
			if (isBlank(el.value)) {
				this._showMsg('companyName','请填写贵公司名称','');
				return false;
			} else {
				this._showMsg('companyName','','');
				return true;
			}
		},
 
		'contactName' : function(el,noLog) {
            el.value = trim(el.value);
			if (isBlank(el.value) || el.value == "填写推广负责人的真实姓名") {
				this._showMsg('contactName','请填写联系人姓名','');
				return false;
			} else {
				this._showMsg('contactName','','');
				return true;
			}
		},
 
		'email' : function(el,noLog) {
			if (StatusMgr.pattern == 'phone') {
				return true;
			}
 
			var reg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/i;
 
            el.value = trim(el.value);
			if (isBlank(el.value)) {
				this._showMsg('email','请填写联系人邮箱','');
				return false;
			}
 
			if (!reg.test(trim(el.value))) {
				this._showMsg('email','联系人邮箱格式不正确','');
				return false;
			}
 
			this._showMsg('email','','');
			return true;
		},
		
 
		updateContact : function() {
			var msg = '联系电话尚未填写正确';
			if ( StatusMgr.phone || StatusMgr.cell )
			{
				StatusMgr.contact = true;
				this._showMsg('phone','','');
 
				if (!StatusMgr.phone) {
					this._showMsg('contactTel','请按:区号-号码-分机 格式填写','hide');
				}
 
				if (!StatusMgr.cell) {
					this._showMsg('contactCell','请填写手机号码','hide');
				}
			} else {
				StatusMgr.contact = false;
				this._showMsg('phone',msg,'');
			}
		
		},
 
		'checkPhone' : function(noLog) {
			var seq = ['contactTel_prefix','contactTel_num','contactTel_tail'],
				telEl = {},
				pass = true;
			StatusMgr.phone = false;
			//add by HG 2011-3-14 合三为一
			var conTel = trim(form.elements['contactTel'].value);
			var conTelArry = conTel.split('-');
			if(conTelArry.length < 2 ||conTelArry.length > 3) {
				//this.updateContact();
				this._showMsg('contactTel','请按:区号-号码-分机 格式填写','');
				return false;
			}
			
            //去除前后空格
			for (var i = 0,len = seq.length; i < len; i++ ) {
				telEl[seq[i]] = conTelArry[i] ? trim(conTelArry[i]) : "";
			}
 
			for (var i = 0,len = seq.length; i < len; i++ ) {
				if (!this[seq[i]](telEl[seq[i]],noLog))
				{
					this.updateContact();
					return false;
				}
			}
			//将每个电话字段拼接处理
			form.elements['contactTel'].value = telEl['contactTel_prefix'] + '-' + telEl['contactTel_num'];
			if(telEl['contactTel_tail']){
				form.elements['contactTel'].value += '-' + telEl['contactTel_tail'];
			}
			
			StatusMgr.phone = true;
			this._showMsg('contactTel','','');
			this.updateContact();
 
			/*座机正确时，如果手机不正确，隐藏错误提示*/
			if (!StatusMgr.cell)
			{
				this._showMsg('contactCell','','hide');
			}
 
			return true;
		},
 
		'contactTel_prefix' : function(el,noLog) {
			var reg = /^0[0-9]{2,3}$/i;
			if (isBlank(el)) {
				this._showMsg('contactTel','请填写座机区号','');
				return false;
			} 
 
			if (!reg.test(trim(el))) {
				this._showMsg('contactTel','座机区号填写错误','');
				return false;
			}
			return true;
			
		},
 
		'contactTel_num' : function(el,noLog) {
			var reg = /^[0-9]{7,8}$/i;
			if (isBlank(el)) {
				this._showMsg('contactTel','请填写座机号码','');
				return false;
			}
 
			if (!reg.test(trim(el))) {
				this._showMsg('contactTel','座机号码填写错误','');
				return false;
			}
			return true;
		},
		
		'contactTel_tail' : function(el,noLog) {
			StatusMgr.tail = true;
			var reg = /^[0-9]{0,4}$/i;
			if (el != '分机' && !reg.test(trim(el))) {
				StatusMgr.tailRight = false;
				return true;
			}
			StatusMgr.tailRight = true;
			return true;
		},
		
		'contactCell' : function(noLog) {     //统一手机的参数
			var reg = /^0?1[0-9]{10}$/i;
			var el  = form.elements['contactCell'];
 
            el.value = trim(el.value);
			if (isBlank(el.value)) {
				this._showMsg('contactCell','请填写手机号码','');
				StatusMgr.cell = false;
				this.updateContact();
				return false;
			}
 
			if (!reg.test(trim(el.value))) {
				this._showMsg('contactCell','手机号码格式不正确','');
				StatusMgr.cell = false;
				this.updateContact();
				return false;
			}
			
			this._showMsg('contactCell','','');
			
			StatusMgr.cell = true;
			this.updateContact();
 
			if (!StatusMgr.phone)
			{
				this._showMsg('contactTel','','hide');
			}
			return true;
		},
		
		'contactTel' : function(el,noLog){
			if (StatusMgr.pattern == 'email') {
				return true;
			}
			this.checkPhone(noLog);
			if (!this.contactCell(noLog) && StatusMgr.phone )
			{	
				
				this._showMsg('contactCell','请填写手机号码','hide');
			}
			
 
			if (StatusMgr.phone || StatusMgr.cell) {
				this._showMsg('phone','','');
				return true;
			}
			this._showMsg('phone','联系电话尚未填写正确','');
			return false;
		},
 
        'companyUrl' : function(el,noLog) {
            el.value = trim(el.value);
		},
		
		_proAndCityChk : function() {
			
            var currProvId = form.elements['currProvId'].value;
			if ( currProvId == '') {
				this._showMsg('currProvId','请选择省份','');
				return false;
			}
			
            var currCityId = form.elements['currCityId'].value;
			if ( currCityId == '') {
				this._showMsg('currCityId','请选择城市','');
				return false;
			}
			return true;	
		},
 
		check : function(form) {
			var pass = true;
			StatusMgr.tailRight = false;
			for (var i = 0, len = submitChkItems.length; i < len; i++){
				var item = submitChkItems[i];
				if (!this[item](form.elements[item],1)){//设置第二个参数，整体验证的时候不再为每一个控件去发送日志，避免重复发送。日志只用填写来追加
					pass = false;
				}
			}
 
			if (!this._proAndCityChk()) {
				pass = false;
			}
 
			if (pass) {
				var telEl = trim(form.elements['contactTel'].value);
				var telElArray = telEl.split('-');
				var pre = telElArray[0] ? telElArray[0] : "",
					num = telElArray[1] ? telElArray[1] : "",
					tail = telElArray[2] ? telElArray[2] : "";
				if (tail == '分机' || !StatusMgr.tailRight){
					tail = '';
				}
 
				form.elements['contactTel'].value = [pre,'-',num,'-',tail].join('').replace(/-$/i,'');
 
				
				//清空错误座机号码
				if (!StatusMgr.phone) {
					form.elements['contactTel'].value = '';
				}
			
				//清空错误手机号码
				if (!StatusMgr.cell) {
					form.elements['contactCell'].value = '';
				}
 
				if (StatusMgr.pattern == 'email') {
					form.elements['contactCell'].value = '10000000000';
				}
				form.elements['contactCell'].value = form.elements['contactCell'].value.replace(/^0/,'');
			}
			ifSuccess = pass;
			/* comment by HG 2011-3-14
				if(pass) {
					sendSmLog("old","success")  
					sentSiteLog();   //成功发送一次日志用于整站串接clientId 和 意向单
				}
			*/
			return pass;
		},
 
		init : function() {
			//注册即时验证
			var me = this;
 
			for (var i = 0, len = blurChkItems.length; i < len; i++) {
				var item = blurChkItems[i];
				form.elements[item].onblur = (function(name){
					return function() {
						if (name == 'contactTel') {
							me.checkPhone();
						} else {
							me[name] && me[name](this,1);// add by HG 2011-3-14 不发log
						}
						this.className='done';
					}
				})(item);
				form.elements[item].onmouseover = (function(name){
					return function() {
						this.oldClass = this.className;
						this.className = 'hover';
					}
				})(item);
				form.elements[item].onmouseout = (function(name){
					return function() {
						this.className = this.oldClass;
					}
				})(item);
				form.elements[item].onfocus = (function(name){
					return function() {
						if (this.value == '填写推广负责人的真实姓名' || this.value == '区号-号码-分机') {
							this.value = '';
						}
						this.oldClass='focus';
						this.className='focus';
					}
				})(item);
			}
			
			form.elements['currCityId'].onchange = function(){
				if(this.value == '') {
					me._showMsg('currCityId','请选择城市','');
				} else {
					me._showMsg('currCityId','','');
				}
			}
		}
	}
 
})();
 
Validator.init();

var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F1747774b79e1da589f5eafc576b4c2e1' type='text/javascript'%3E%3C/script%3E"));
