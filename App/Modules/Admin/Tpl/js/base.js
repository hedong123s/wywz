// JavaScript Document
/* ===============================

@ title:系统基础js
@ author:flc
@ company:jiufang
@ creattime:2013-08-14 10:45:00
@ updatetime:2013-08-15 16:58:54

=================================*/

/*弹窗特效*/
/*----------------
参数说明
a : 弹窗文本
b : 弹窗类型，默认绿色，1为红色(error),  其他拓展，根据函数自定义，样式参考：master.css
c : 延迟退出时间，单位：毫秒，默认为2500
-----------------*/
function sys_alert(a,b,c){
	o=$(window.top.document).find("#sys_alert_show")  //获取当前顶级框架中的id，如本身为顶级也可用：o=$("#sys_alert_show");！！！！该效果，谷歌需在服务器下运行！
	if($("#sys_alert_show").size()<=0){   //此处效果为防止在框架内执行跳转时，出现延迟效果失效。将效果返回父级框架执行该函数
		if(top!=self){
			parent.sys_alert(a,b,c)
		}else{
		
			alert(a);
			
		}
		return false
	}
	o.empty().fadeOut(1).hide().stop().removeClass().addClass("sys_alert");  //初始化内容，特效，可见,其他class等
	
	o.html(a);
	w=o.outerWidth();
	o.css({"margin-left":"-"+w/2+"px"});
	switch(b){
		case 1:  //报错样式  红色
			o.addClass('sys_alert_error');
			break;
	}
	o.show();
	if(!c){c=2500};//延迟淡出效果，默认值
	o.delay(c).fadeOut(50);
}

/*橙色警告条*/
$(function(){
	$(".notewarn .close").live("click",function(){
		$(this).parent(".notewarn").fadeOut(300)//.slideUp(300)
	})
})

//自定义js跳转
//URL跳转不弹窗,不填写，直接返回上一级
function GoUrl(url){
	if(url==''){
		history.go(-1);
	}else{
		location.replace(url);
	}
}