<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
 
 $("#realname").formValidator({onshow:"请输入真实姓名",onfocus:"真实姓名应该为2-20位之间"}).inputValidator({min:2,max:20,onerror:"真实姓名应该为2-20位之间"})
 $("#email").formValidator({onshow:"请输入E-mail",onfocus:"请输入E-mail",oncorrect:"E-mail格式正确"}).regexValidator({regexp:"email",datatype:"enum",onerror:"E-mail格式错误"});
 
 })
</script>
</head>

<body>

<!--add-tab-->
<div class="add-tab">
	<div class="at_tab">

		<a href="#" class="cur"><i>修改个人信息</i></a> 

	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->

<!--table-list-->
<div class="table-edit ">
	
	<form method="post" id="myform">
	<div class="table-edit_form">
		<div  class="te_tab_c">
			
			<!--修改个人信息-->
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="100">用户名：</th>
				<td><?php echo (session('admin_9f_username')); ?></td>
			</tr>
			<tr>
				<th >最后登录时间：</th>
				<td><?php echo (getdatetime(session('admin_9f_lastlogintime'))); ?></td>
			</tr>
			<tr>
				<th >最后登录IP：</th>
				<td><?php echo (session('admin_9f_lastloginip')); ?></td>
			</tr>
			<tr>
				<th >真实姓名：</th>
				<td><input type="text" class="sys_text" name="realname" id="realname"  value="<?php echo (escapeshow($data['realname'])); ?>" />
					
				</td>
			</tr>
			<tr>
				<th >E-mail：</th>
				<td><input type="text" class="sys_text" name="email" id="email" value="<?php echo (escapeshow($data['email'])); ?>" /> </td>
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