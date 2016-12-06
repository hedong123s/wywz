// JavaScript Document
/* ===============================

@ title:系统main内容框架js
@ author:flc
@ company:jiufang
@ creattime:2013-08-16 14:20:44
@ updatetime:2013-08-16 14:20:08

=================================*/

/*main首页，mbox切换*/
$(function(){
	$(".mbox .mbox_t ul li").mouseover(function(){
		_idx=$(this).index()
		$(this).addClass("cur").siblings("li").removeClass("cur")
		$(this).parents(".mbox").first().find(".mbox_con:eq("+_idx+")").show().siblings(".mbox_con").hide()
	})
})

/*mlogin_note_textarea*/
$(function(){
	$("#note_memo").blur(function(){
		o=$("#note_memo")
		//执行ajax存储
		//....
		$.post('index.php?g=admin&m=index&a=public_admin_text','content='+$(this).val(),function(data){
			sys_alert("保存成功")
		})
		
	})
})

//订单信息进度条
$(function(){
	$(".mrate_gray").each(function(){
		o=$(this).children(".mrate_color")
		w=$(this).children(".mrate_color").attr("data-width")
		if(w>1){w=1}
		o.animate({width:(w*100)+"%"},400)
	})
})

/*at_tab 添加内容右侧tab*/
$(function(){
	$(".at_tab a").click(function(){
		$(this).addClass("cur").siblings("a").removeClass("cur")
	})
})

/*编辑页切换*/
$(function(){
	$(".table-edit_tab ul li").click(function(){
		_id=$(this).attr("data-id")
		if(!!_id){
			$(this).addClass("cur").siblings("li").removeClass("cur")
			$(".te_tab_c").hide()
			$("#"+_id).show()
		}
	})
})


//删除单条提示
function del(i){
	var tips = Array();
	tips[0] = "确定要删除此信息吗？";
	tips[1] = "系统会自动删除类别下所有子类别以及信息，确定删除吗？";
	tips[2] = "系统会自动删除类别下所有子类别，确定删除吗？";

	if(confirm(tips[i])) return true;
	else return false;
}

//checkbox全选

$(function(){
	$("#check_box").bind('click',function(){
		if($(this).attr('checked')=='checked'){
			$("input[name='id[]']").attr('checked','checked');
		}else{
			$("input[name='id[]']").attr('checked',false);
		}
	})
})


//删除
function confirm_del(){
	
	if(confirm('确定删除？')) myform.submit();

}






