		//alert(document.documentElement.clientWidth);
	function FloatTop(acbc) {
		var startX1 =document.documentElement.clientWidth-185 ,startY1 = 5;
		var startX2 =1,startY2 = 95;
		var ns = (navigator.appName.indexOf("Netscape") != -1);
		var d = document;
		function ml(id,startX,startY) {
			var el=document.getElementById(id);
			//alert(el)
			if(d.layers)el.style=el;
			el.sP=function(x,y){this.style.left=x+"px";this.style.top=y+"px";};
			el.x = startX;
			el.y = startY;
			return el;
		}
		window.stayTopLeft=function() {
			var pY = ns ? pageYOffset : document.documentElement.scrollTop;
			ftlObj.y += (pY + startY1 - ftlObj.y)/8;
			ftlObj1.y += (pY + startY2 - ftlObj1.y)/8;
			ftlObj.sP(document.documentElement.scrollLeft+document.documentElement.clientWidth-185, ftlObj.y);

			ftlObj1.sP(ftlObj1.x, ftlObj1.y);
			setTimeout("stayTopLeft()", 30);
		}		
		ftlObj = ml("divStay",document.documentElement.clientWidth-acbc,0);
		ftlObj1 = ml("divStayTopleft",document.documentElement.clientWidth-acbc,30);
		stayTopLeft();
	}
	FloatTop(29);