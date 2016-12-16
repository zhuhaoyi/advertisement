//基础函数，简化版
function g(tag){  
	return document.getElementById(tag);
}

function q(className){
	var rt = [];
	var allDom =  document.getElementsByTagName("*");
	var allDomLength = allDom.length;
	var pattern = new RegExp("(^|\s*)"+className+"(\s*|$)");
	for(i=0,j=0;i<allDomLength;i++){
		   if(pattern.test(allDom[i].className)){
				rt[j] = allDom[i];
				j++;
		   }
	}
	return rt;
}

function addClass(dom,className){ //添加class    
	var pattern = new RegExp("(^|\s*)"+className+"(\s*|$)");
	var classes = dom.className.split(/\s+/);
	if(!(pattern.test(dom.className,className))){
		classes.push(className);
		classes =  classes.join(" ");
		dom.className = classes;
	}
	
}

function removeClass(dom,className){  //删除class
	var classes = dom.className;
	if(classes.indexOf(className)!=-1){  
		dom.className =  classes.replace(className,"");
	}
}

function hasAttr(dom,attr){             //是否有某种属性
	if(dom.getAttribute(attr)){
		return true;
	}else{
		return false;
	}
}

function toHalfWidth(str){   //全角转半角
	return String(str).replace(/[\uFF01-\uFF5E]/g, function (d) {return String.fromCharCode(d.charCodeAt(0) - 65248);}).replace(/\u3000/g, " ");
}

function trim(str){   //去除两端的空白
    return String(str).replace(new RegExp("(^[\\s\\t\\xa0\\u3000]+)|([\\u3000\\xa0\\s\\t]+$)", "g"), "");
}

function each(h, f) {  //直接从tangram中提取
    var d, g, c, a = h.length;
    if ("function" == typeof f) {
        for (c = 0; c < a; c++) {
            g = h[c];
            d = f.call(h, g, c);
            if (d === false) {
                break;
            }
        }
    }
    return h;
}

function on(dom, target, func) {
    var d = function (h) {func.call(dom, h);}
    if (dom.addEventListener) {
        dom.addEventListener(target, d, false);
    } else {
        if (dom.attachEvent) {
            dom.attachEvent("on" + target, d);
        }
    }
    return dom;
}
