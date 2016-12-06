<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
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
<script type="text/javascript">
$(document).ready(function(){
 $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
 
 $("#title").formValidator({onshow:"请输入名称",onfocus:"请输入名称"}).inputValidator({min:1,onerror:"请输入名称"})
 $("#width").formValidator({onshow:"请输入宽和高",onfocus:"请输入宽和高"}).inputValidator({min:1,onerror:"请输入宽和高"})

 })
</script>
</head>

<body>
<div class="add-tab" style="border:0;">
	<a href="javascript:location.reload();" style="float:right;" class="f5">刷新</a>
	<div class="at_tab">
		<a href="javascript:;" class="cur"><i><?php if(ACTION_NAME == 'category_add'): ?>添加广告位<?php else: ?>编辑广告位<?php endif; ?></i></a> | 
		<a href="<?php echo U('category');?>"><i>广告位管理</i></a>

	</div>
	<div class="clearall"></div>
</div>
<!--table-list-->
<div class="table-edit ">
	
	<form method="post" id="myform" action="<?php echo U('category_send');?>">
	<div class="table-edit_form">
		<div  class="te_tab_c">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>		
			<tr>
				<th  width="200">广告位名称：</th>
				<td><input type="text" class="sys_text" name="info[title]" id="title"  value="<?php echo (escapeshow($info['title'])); ?>"></td>
			</tr>
		
			<tr>
				<th>广告位尺寸：</th>
				<td>宽：<input type="text" class="sys_text" name="info[width]" id="width" style="width:50px;"  value="<?php echo ($info['width']); ?>">&nbsp;px&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<input type="text" class="sys_text"  style="width:50px;"  name="info[height]" id="height"  value="<?php echo ($info['height']); ?>">&nbsp;px </td>
			</tr>				
			<tr>
				<th>描述：</th>
				<td><textarea name="info[description]" id="description" class="sys_textarea sys_textarea350"><?php echo (escapeshow($info['description'])); ?></textarea></td>
			</tr>			


			</tbody>
		    </table>
		</div>

	</div>
	<div class="tools-edit">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
				<th>&nbsp;</th>
				<td>
					<input type="submit" class="sys_blue_btn" value="提交" /> 
					<input type="hidden" value="<?php echo ($info['id']); ?>" name="info[id]">
					<input type="hidden" value="send" name="action">
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<!--/table-list-->




</body>
</html>