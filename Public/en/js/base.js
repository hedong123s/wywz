//hotProductList
$(function(){
	$(".hotProductList ul li").hover(function(){
		$(this).find(".hotProductMbg").stop(true).animate({"top":0},250);
		$(this).find(".hotProductMTit").stop(true).animate({"top":0},250);
	},function(){
		$(this).find(".hotProductMTit").stop(true).animate({"top":175},250);
		$(this).find(".hotProductMbg").stop(true).animate({"top":175},250);
	})
})

//itypeWrap
$(function(){
	$(".itypeWrap").hover(function(e){
		var i=$(this);
		i.addClass("itypeWrapHover");
		i.find(".itypeIco").stop(true,true).fadeOut(300);
		i.find(".itypePic").stop(true,true).slideDown(300);
		i.find(".itypeList").stop(true,true).slideDown(300);
		i.stop(true,true).animate({"height":425},300,function(){
			i.find(".itypeIco").stop(true,true).hide().css({"bottom":239}).fadeIn(200);
		})
	},function(){
		var i=$(this);
		i.removeClass("itypeWrapHover");
		i.find(".itypeIco").stop(true,true).hide();
		i.find(".itypePic").stop(true,true).slideUp(300);
		i.find(".itypeList").stop(true,true).slideUp(300);
		i.stop(true,true).animate({"height":105},300,function(){
			i.find(".itypeIco").stop(true,true).hide().css({"bottom":70}).fadeIn(200);
		})
	})
})

//listProductsMain
$(function(){
	$(".listProductsMain").hover(function(){
		$(this).find(".listProductMainTit,.listProductMainBg").stop(true,true).animate({"bottom":0},200)
	},function(){
		$(this).find(".listProductMainTit,.listProductMainBg").stop(true,true).animate({"bottom":-26},200)
	})
})