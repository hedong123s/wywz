/*
用法：
.aa img{ width:110px; height:110px; padding:10px; border:#000000 solid 1px;}
<IMG  alt="" name="picautozoom" src="http://test.anjoweb.com/UploadFile/s/9500/S9503.jpg" >
或$("#ID").picauto();*//*
$(window).load(function(){
	$("img[name='picautozoom']").each(function() {
		$(this).picauto({FixWidth:220,FixHeight:220});
	});
});*/
$(document).ready(function(){
	//alert(1);
	$("img[name='picautozoom']").each(function() {
		$(this).picauto();
	});
	$(".autofill").each(function() {
		$(this).picautofill();
	});
});
$.fn.picauto = function(options){
	var defaults = {
		edge:"padding",
		FixWidth:0,
		FixHeight:0
		//edge:"margin"
	};
	options = $.extend(defaults, options);
	var src=this.attr("src");
	var smallWidth;
	if(options.FixWidth==0){
		 smallWidth = $(this).width();
		 }
	else{
		smallWidth=options.FixWidth;
		}
	var smallHeight;
	if(options.FixHeight==0){
		 smallHeight = $(this).height();
		 }
	else{
		smallHeight = options.FixHeight;
		}
	
	var _self = this;
    _self.hide();
    var img = new Image();
    $(img).load(function(){
			_self.width(smallWidth).css("height", "auto");
			if (_self.height() > smallHeight) {
				_self.height(smallHeight).css("width", "auto");
				_self.css(options.edge, "0px " + Math.floor(Math.abs((smallWidth - _self.width()) / 2)) + "px");
				//_self.css("margin", "0px " + Math.floor(Math.abs((smallWidth - _self.width()) / 2)) + "px");
			} else {
				_self.css(options.edge, Math.floor(Math.abs((smallHeight - _self.height()) / 2)) + "px 0px");
				//_self.css("margin", Math.floor(Math.abs((smallHeight - _self.height()) / 2)) + "px 0px");
			}
		//}
        _self.attr("src", src);
        _self.fadeIn("slow");
    }).attr("src", src);  //.atte("src",options.src)要放在load后面，
	$(img).error(function(){
		 $(img).attr("src", "/images/errorimg.jpg");
		})
    return _self;
};

$.fn.picautofill = function(options){
	var defaults = {
		edge:"margin",
		FixWidth:0,
		FixHeight:0
		//edge:"margin"
	};
	options = $.extend(defaults, options);
	var pWidth=$(this).width();
	var pHeight=$(this).height();
	//var pWidth=$(this).parent().width();
	//var pHeight=$(this).parent().height();
	//$(this).parent().css({"position":"relative","overflow":"hidden"});
	//$(this).css("position","absolute");
	var src=$(this).find("img").attr("src");
	//alert(src);
	var _self = $(this).find("img");
    _self.hide();

    var img = new Image();
	var py;
    $(img).load(function(){
			_self.width(pWidth).css("height", "auto");
			if (_self.height() < pHeight) {
				//_self.height(pHeight);
				_self.height(pHeight).css("width", "auto");
				py=Math.floor(Math.abs((pWidth - _self.width()) / 2));
				_self.css("margin-left", -py + "px");
			} else {
				py=Math.floor(Math.abs((pHeight - _self.height()) / 2));
				//alert(_self.height()+"|"+pHeight);
				_self.css("margin-top", -py + "px");
			}
			
		//}
        _self.attr("src", src);
        _self.fadeIn("slow");
    }).attr("src", src);  //.atte("src",options.src)要放在load后面，
	$(img).error(function(){
		 $(img).attr("src", "/images/errorimg.jpg");
		})
    return _self;
	
};
