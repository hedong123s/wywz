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
		<a href="javascript:;" class="cur"><i>广告</i></a>&nbsp;|&nbsp;<a href="<?php echo U('category_add');?>"><i>添加广告位</i></a> 
	
	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->
<!--table-list-->
<div class="table-edit">
	<form id="myform" name="myform" method="post">

<!--table-list-->
<div class="table-list ">

	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-list_tb">
		<tr>
			<th width="15" class="nobg"><input type="checkbox" value="" id="check_box" ></th>
			<th>广告位名称</th>
			<th>广告位尺寸</th>
			<th>广告数</th>
			<th>描述</th>
			<th>操作</th>
		</tr>
		<tbody>
		<?php if($list): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><tr>
			<td><input type="checkbox" value="<?php echo ($foo['id']); ?>" name="id[]"></td>
			<td  align="left" ><?php echo (escapeshow($foo["title"])); ?></td>
			<td align="center" width="200"><?php echo ($foo['width']); ?>px*<?php echo ($foo['height']); ?>px</td>
			<td align="center" width="50"><?php echo M('ad')->where(array('cid'=>$foo['id']))->count();;?></td>
			<td align="center" width="300"><?php echo (escapeshow($foo['description'])); ?></td>
			<td align="center" width="220"><a href="<?php echo U('add',array('id'=>$foo['id']));?>">添加广告</a> | <a href="<?php echo U('index',array('id'=>$foo['id']));?>">广告列表</a> | <a href="<?php echo U('category_edit',array('id'=>$foo['id']));?>">修改</a> | <a href="<?php echo U('category_del',array('id'=>$foo['id']));?>" onClick="return del(0);">删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
		<tr><td colspan="7" class="nodata">暂无相关数据</td></tr><?php endif; ?>
		</tbody>
	</table>
	<div class="tools-list">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
		
				<td colspan="2">
				<label for="check_box">全选/取消</label>
					<input type="button" class="sys_btn" value="删除" onClick="myform.action='<?php echo U('category_del');?>';return confirm_del();" /> 
					
				</td>
				<td class="bk_right">
					<div class="pages"><?php echo ($page); ?></div>
				</td>
			</tr>
		</table>
	</div>

</div>

<!--/table-list-->
	</form>

</div>
<!--/table-list-->
</body>
</html>