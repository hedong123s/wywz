<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登陆</title>
<link rel="stylesheet" type="text/css" href="__TMPL__style/base.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/login.css" />
<script type="text/javascript" src="__TMPL__js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__js/base.js"></script>
<script type="text/javascript" src="__TMPL__js/login.js"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="__TMPL__images/iepng/iepngfix_tilebg.js"></script>
<style type="text/css">.png{behavior:url("__TMPL__images/iepng/iepngfix.htc");}</style>
<![endif]-->
<script language="javascript">
if (top != self)top.location.href = "<?php echo U('Login/index');?>"; 
$(function(){
	$("input[name='username']").focus();
})
</script>
</head>

<body>
<div class="login_wrap">
	<div class="login png">
		<div class="login_t"><div class="login_title png"></div></div>
		<div class="loginform">
			<form method="post"  onsubmit="return logincheck()">
				<dl>
					<dt>用户名：</dt>
					<dd><span class="lg_input"><input name="username" type="text"/></span></dd>
				</dl>
				<dl>
					<dt>密 码：</dt>
					<dd><span class="lg_input"><input name="password" type="password"/></span></dd>
				</dl>
				<dl>
					<dt>验证码：</dt>
					<dd><span class="lg_short_input"><input name="code" type="text"/></span>&nbsp;<img src="<?php echo U('verify');?>" class="bk_middle verify" /></dd>
				</dl>
				<div class="error"><div class="error_show">ERROR NOTICE!</div></div>
			  	<div class="lg_submit"><input type="submit" class="lg_btn" value=" " />&nbsp;<a href="http://www.dos999.com" target="_blank" title="九方互联" class="ft12">寻求技术支持？</a></div>
			</form>
		</div>
	
	</div>
	<div class="copyright">All Rights Reserved 2013 深圳市九方互联网络科技有限公司，并保留所有权利。</div>
</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	$(".verify").click(function(){
		var url="<?php echo U('verify');?>&rnd="+Math.random();
		$(this).attr("src",url);
	})
})
</script>