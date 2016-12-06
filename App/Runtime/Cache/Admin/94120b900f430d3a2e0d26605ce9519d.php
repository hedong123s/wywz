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
		<a href="#" class="cur"><i>管理员管理</i></a> | <a href="<?php echo U('add');?>"><i>添加管理员</i></a>
	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->



<!--table-list-->
<div class="table-list">
	<form>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-list_tb">
		<tr>
	
			<th width="35" class="nobg">序号</th>
			<th>用户名</th>
			<th>E-mail</th>
			<th>真实姓名</th>
			<th>所属角色</th>
			<th>最后登录IP</th>
			<th>最后登录时间</th>
			<th>操作</th>
		</tr>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><tr>
		
			<td align="center"><?php echo ($foo["userid"]); ?></td>
			<td align="center"><?php echo ($foo["username"]); ?></td>
			<td align="center"><?php echo ($foo["email"]); ?></td>
			<td align="center"><?php echo ($foo["realname"]); ?></td>
			<td align="center">超级管理员</td>
			<td align="center"><?php echo (getdatetime($foo["lastlogintime"])); ?></td>
			<td align="center"><?php echo ($foo["lastloginip"]); ?></td>
			<td align="center">
            	<?php if($foo['userid'] == 2): ?>-
                <?php else: ?>
            		<a href="<?php echo U('edit',array('id'=>$foo['userid']));?>">修改</a> | <?php if($foo['userid'] == '1' ): ?><span style="color:#ccc;">删除</span><?php else: ?><a href="<?php echo U('del',array('id'=>$foo['userid']));?>" onClick="return del(0);">删除</a><?php endif; endif; ?>
            </td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	</form>
</div>
<!--/table-list-->


</body>
</html>