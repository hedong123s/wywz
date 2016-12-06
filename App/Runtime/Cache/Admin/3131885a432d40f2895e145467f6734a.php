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
		<a href="javascript:;" class="cur"><i>会员管理</i></a> | 
		<a href="<?php echo U('add');?>"><i>添加会员</i></a>
	
	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->
<!--table-list-->
<div class="table-edit">
	<form id="myform" method="post">

<!--table-list-->
<div class="table-list ">

	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-list_tb">
		<tr>
			<th width="15"><input type="checkbox" value="" id="check_box" ></th>
			<th width="55">用户ID</th>
			<th>用户名(姓名)</th>
			<th width="100">手机</th>
			<th  width="100">座机</th>
			<th width="60">允许登录</th>
			<th width="80">注册ip</th>
			<th width="120">最后登录</th>
			<th width="120">操作</th>
		</tr>
		<tbody>
		<?php if($list): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><tr>
			<td><input type="checkbox" value="<?php echo ($foo['id']); ?>" name="id[]"></td>
			<td align="center"><?php echo ($foo['id']); ?></td>
			<td  align="center"><?php echo (escapeshow($foo["username"])); ?>(<?php echo (escapeshow($foo["realname"])); ?>)</td>
			<td align="center"><?php echo (escapeshow($foo["phone"])); ?></td>
			<td align="center"><?php echo (escapeshow($foo["tel"])); ?></td>
			<td align="center"><img src="<?php if($foo['isauth'] == '0'): ?>__TMPL__images/no_ico.gif<?php else: ?>__TMPL__images/ok_ico.gif<?php endif; ?>"></td>
			<td align="center"><?php echo ($foo["regip"]); ?></td>
			<td align="center"><?php echo (getdatetime($foo["logintime"])); ?></td>
			<td align="center"><a href="<?php echo U('edit',array('id'=>$foo['id']));?>">修改</a> | <a href="<?php echo U('del',array('id'=>$foo['id']));?>" onclick="return del(0);">删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
		<tr><td colspan="10" class="nodata">暂无相关数据</td></tr><?php endif; ?>
		</tbody>
	</table>

	<div class="tools-list">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
		
				<td colspan="2">
				<label for="check_box">全选/取消</label>
					<input type="button" class="sys_btn" value="删除" onclick="myform.action='<?php echo U('del');?>';return confirm_del();" /> 
					
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