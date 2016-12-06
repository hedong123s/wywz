<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>九方互联 - 后台管理系统</title>
<link rel="stylesheet" type="text/css" href="__TMPL__style/base.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/main.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/dialog.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/skin/layer.css" />

<script type="text/javascript" src="__TMPL__js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__js/artDialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="__TMPL__js/artDialog/plugins/iframeTools.source.js"></script>
<script type="text/javascript" src="__TMPL__js/base.js"></script>
<script type="text/javascript" src="__TMPL__js/main.js"></script>
<script type="text/javascript"   src="__TMPL__js/getuploadify.js" ></script>
<script type="text/javascript"   src="__TMPL__js/formvalidator.js" ></script>
<script type="text/javascript"   src="__TMPL__js/formvalidatorregex.js" ></script>
<script src="__ROOT__/data/ueditor/ueditor.config.js" type="text/javascript"></script>
<script src="__ROOT__/data/ueditor/ueditor.all.min.js" type="text/javascript"></script>
<script type="text/javascript" src="__ROOT__/data/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript"   src="__TMPL__js/layer/layer.min.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
 $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});

 $("#old_password").formValidator({onshow:'请输入旧密码',onfocus:'密码应该为6-20位之间'}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"});
 $("#password").formValidator({onshow:'请输入新密码',onfocus:'密码应该为6-20位之间'}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"});
 $("#repassword").formValidator({onshow:"请输入重复密码",onfocus:"请输入两次密码不同。",oncorrect:"密码输入一致"}).compareValidator({desid:"password",operateor:"=",onerror:"请输入两次密码不同"});
 })
</script>
</head>

<body>

<!--add-tab-->
<div class="add-tab">
	<div class="at_tab">

		<a href="#" class="cur"><i>修改密码</i></a> 

	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->

<!--table-list-->
<div class="table-edit ">
	
	<form method="post" id="myform">
	<div class="table-edit_form">
		<div  class="te_tab_c">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="100">用户名：</th>
				<td><?php echo (session('admin_9f_username')); ?></td>
			</tr>			
			<tr>
				<th>真实姓名：</th>
				<td><?php echo (escapeshow($data['realname'])); ?></td>
			</tr>			
			<tr>
				<th>E-mail：</th>
				<td><?php echo (escapeshow($data['email'])); ?></td>
			</tr>

			<tr>
				<th> 旧密码：</th>
				<td><input type="password" class="sys_text" name="old_password" id="old_password"  /></td>
			</tr>
			<tr>
				<th >新密码：</th>
				<td><input type="password" class="sys_text" name="password" id="password"  /></td>
			</tr>			
			<tr>
				<th >重复密码：</th>
				<td><input type="password" class="sys_text" name="repassword" id="repassword"  /></td>
			</tr>

			</tbody>
		    </table>
			
			
		</div>

	</div>
	
	
	<div class="tools-edit">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
				<th width="100">&nbsp;</th>
				<td>
					<input type="submit" class="sys_blue_btn" value="提交" name="send" /> 
			
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<!--/table-list-->


</body>
</html>