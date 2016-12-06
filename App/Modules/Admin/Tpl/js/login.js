// JavaScript Document
/* ===============================

@ title:系统登录js
@ author:flc
@ company:jiufang
@ creattime:2013-08-20 10:23:50
@ updatetime:2013-08-20 10:23:56

=================================*/

$(function(){
	$(".lg_input input").focus(function(){
		$(this).parent(".lg_input").addClass("lg_input_cur")
	}).blur(function(){
		$(this).parent(".lg_input").removeClass("lg_input_cur")
	})
	$(".lg_short_input input").focus(function(){
		$(this).parent(".lg_short_input").addClass("lg_short_input_cur")
	}).blur(function(){
		$(this).parent(".lg_short_input").removeClass("lg_short_input_cur")
	})
})


//验证登录
function logincheck(){
	var username,password,code
	username=$("input[name='username']")
	password=$("input[name='password']")
	code=$("input[name='code']")
	if(username.val()==""){rep_error("请输入用户名！");username.focus();return false;}
	if(password.val()==""){rep_error("请输入密码！");password.focus();return false;}
	if(code.val()==""){rep_error("请输入验证码！");code.focus();return false;}
	rep_error();
	$.ajax({
		url:'index.php?g=admin&m=login&a=ajaxlogin',
		data:$("form").serialize(),
		type:'POST',
		success:function(data){
		
			if(data=='0'){
				location.href='index.php?g=admin&m=index&a=index';
			}else if(data=='1'){
				rep_error("验证码不正确！");return false;
			}else{
				rep_error("用户名或密码错误！");return false;
			}
		}
	})
	
	return false;
}

//报错
function rep_error(i){
	var error,error_show
	error=$(".error")
	error_show=$(".error_show")
	if(!!i){
		error_show.html(i);
		error.show();
	}else{
		error_show.empty();
		error.hide();
	}
}