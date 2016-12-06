// JavaScript Document
/* ===============================

@ title:系统框架js
@ author:flc
@ company:jiufang
@ creattime:2013-08-14 10:45:00
@ updatetime:2013-08-16 14:20:08

=================================*/

/*容器宽高定义*/
var default_let_menu_h

$(function(){
	default_let_menu_h=$(".sys_left_menu").outerHeight();  //左侧根据内容区域高度
	sys_resize();
	$(window).resize(function(){sys_resize();});
})
function sys_resize(){
	body_h=$(window).outerHeight();  //屏幕可见高度
	header_h=80;  //header的高度
	$(".sys_left_wrap").height(body_h-header_h);
	
	/*左侧区域*/
	offset_left_menu_h=body_h-header_h-30; //左侧根据屏幕可见区域高度
	
	$(".sys_left_menu").height(offset_left_menu_h);
	if (default_let_menu_h>offset_left_menu_h){
		$(".sys_left_scroll").show();
	}else{
		$(".sys_left_scroll").hide();
	}  //滚动样式隐藏显示
	
	/*关闭区域*/
	$(".sys_close_menu").height(body_h-header_h)
	
	/*内容分类区域*/
	$(".sys_sort_wrap").height(body_h-header_h-18)
	$(".sys_sort_content,#sys_sort_iframe").height(body_h-header_h-20)
	
	
	/*main显示区域*/
	$(".col-main").height(body_h-header_h-16)
	$(".sys_main_wrap").height(body_h-header_h-18)
	$(".sys_main_content,#sys_main_iframe").height(body_h-header_h-20)
	
	//定义main宽度
	var sys_main_w=0
	sys_main_w=$(window).outerWidth()   //屏幕可见区域
	
	if(sys_main_w<1100){sys_main_w=1100}   //若屏幕可见区域小于最小宽度，则定义最小宽度为准
	
	if(!$(".col-left").is(":hidden")){   //减左侧大菜单
		col_left_w=$(".col-left").outerWidth()
		sys_main_w-=col_left_w
	}
	
	sys_main_w-=$(".sys_close_menu").outerWidth()  //减左侧展开关闭div
	
	if(!$(".col-sort").is(":hidden")){   //减内容分类+边距
		col_sort_w=$(".col-sort").outerWidth()+8
		sys_main_w-=col_sort_w
	}
	sys_main_w-=(4+8) //减边框+边距 
	
	$(".col-main").width(sys_main_w+4)
	$(".sys_main_wrap").width(sys_main_w+2)
	$(".sys_main_content").width(sys_main_w)
}


//左侧滚动
function menuScroll(num){
	var Scroll = $(".sys_left_menu")
	if(num==1){
		Scroll.scrollTop(Scroll.scrollTop() - 60)
	}else{
		Scroll.scrollTop(Scroll.scrollTop() + 60)
	}
}

//大分类,点击样式修改
$(function(){
	$("#sys_menu>ul>li").click(function(){
		$(this).addClass("cur").siblings("li").removeClass("cur")
	})
})

//左侧菜单展开关闭及点击后效果
$(function(){
	$(".sys_left_menu h4").live("click",function(){
		_cur=$(this).next("ul").is(":hidden")
		if(!!_cur){
			$(this).removeClass("open")
			$(this).next("ul").show()
		}else{
			$(this).addClass("open")
			$(this).next("ul").hide()
		}
	})
	
	$(".sys_left_menu ul li").live("click",function(){
		$(".sys_left_menu li").removeClass("cur")
		$(this).addClass("cur")
		
		//若a连接的target转入的是内容分类框架(sort_iframe)，则内容框架div显示，否则关闭
		if($(this).find("a").attr("target")=="sort_iframe"){
			$(".col-sort").show()
		}else{
			$(".col-sort").hide()
		}
		sys_resize();//重置容器
		//end
	})
})

/*左侧大菜单展开关闭*/
$(function(){
	$(".sys_close_menu").show()
	$(".sys_close_menu").click(function(){
		_cur=$(".col-left").is(":hidden")
		if(!!_cur){
			$(this).removeClass("sys_close_menu_open")
			$(".col-left").show()
		}else{
			$(this).addClass("sys_close_menu_open")
			$(".col-left").hide()
		}
		sys_resize();//重置容器
	})
})