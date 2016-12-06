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
</head>

<body>

<!--add-tab-->
<div class="add-tab">
	<div class="at_tab">
		<a href="" class="cur"><i><?php echo ($data['classname']); ?>生成内容列表页</i></a>
	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->

<!--table-list-->
<div class="table-list">
	<form name="myform" id="myform" method="post" action="<?php echo U('contentcategorysend');?>">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-list_tb">
		<tr>
			<th width="450">按栏目生成</th>
			<th>ID</th>
		</tr>
		<tr>
			<td rowspan="3" align="center">
            	<select name="cid[]" size="2" style="height:200px;" multiple="multiple" title="按住“Ctrl”或“Shift”键可以多选，按住“Ctrl”可取消选择">
                    <option value="" selected="">不限栏目</option>
                    <?php echo ($category); ?>
                </select>
            </td>
			<td>
            	每轮更新 <input type="text" value="10" name="size" onKeyUp="CheckInputInt(this)" class="sys_text sys_text50" /> 条信息
            </td>
		</tr>
		<tr>
		  <td>
				<input type="submit" class="sys_blue_btn" value="提交" /> 
          </td>
	  </tr>
      <tr>
		  <td valign="top"></td>
	  </tr>
	</table>
  </form>
</div>
<!--/table-list-->
</body>
</html>
<script>
//不能小于0.1
function CheckInputInt(oInput) {
	if ('' != oInput.value.replace(/\d/g,'')){
		oInput.value = oInput.value.replace(/\D/g,'');   
	}  
	if(parseInt(oInput.value)<0.1){oInput.value="1"; }
}
</script>