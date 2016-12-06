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
		<a href="<?php echo U('index');?>" class="cur"><i>管理栏目</i></a> | 
		<a href="<?php echo U('add');?>"><i>添加栏目</i></a> | 
        <a href="<?php echo U('categoryCacheHtml');?>"><i>更新栏目缓存</i></a>

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
			<th width="15" class="nobg"><input type="checkbox" value="" id="check_box" ></th>
			<th width="35">排序</th>
			<th width="35">ID</th>
			<th>栏目名称</th>
			<th>所属模型</th>
			<th>是否导航显示</th>
			<th>操作</th>
		</tr>
		<tbody>
		<?php if($list): $no_category_id=explode(',',C('cfg_no_category_id')); ?>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><tr>
			<td><input type="checkbox" value="<?php echo ($foo['id']); ?>" name="id[]" <?php if(in_array($foo['id'],explode(',',C('cfg_no_category_id')))): ?>disabled<?php endif; ?>></td>
			<td><input type="text" class="sys_text" style="width:25px;text-align:center;" name="orderid[<?php echo ($foo['id']); ?>]" value="<?php echo ($foo["orderid"]); ?>" /></td>
			<td align="center"><?php echo ($foo["id"]); ?></td>
			<td width="50%">
            	<?php echo ($foo["d"]); echo (escapeshow($foo["classname"])); ?>&nbsp;<?php if($foo["picurl"] != '' ): ?><a href="__ROOT__/<?php echo ($foo["picurl"]); ?>" target="_blank"><img src="__TMPL__images/infoimg_ico.png" title="有缩略图,点击可查看"></a><?php endif; ?>
            	<span style="color:#999;">
                	<?php $flagArr=explode(",",$foo['flag']);$configFlagArr=C("contentclassflag");?>
                    <?php if(is_array($flagArr)): foreach($flagArr as $key=>$flagVal): echo ($configFlagArr[$flagVal]); ?>&nbsp;<?php endforeach; endif; ?>
                </span>	
            </td>
			<td align="center" width="10%"><?php echo (model($foo["modelid"],1)); ?></td>
			<td align="center"  width="10%"><?php if($foo["navshow"] == '0' ): ?>否<?php else: ?><span style="color:green;">是</span><?php endif; ?></td>
			<td align="center"  width="30%"><a href="<?php echo U('checkinfo',array('id'=>$foo['id']));?>"><?php if($foo["checkinfo"] == '0'): ?>已审核<?php else: ?><span style="color:red;">未审核</span><?php endif; ?></a> | <a href="<?php echo U('add',array('id'=>$foo['id']));?>">添加子栏目</a> | <a href="<?php echo U('edit',array('id'=>$foo['id']));?>">修改</a> | 
			<?php if(in_array($foo['id'],$no_category_id)): ?><span style="color:#ccc;">删除</span>
			<?php else: ?>
			<a href="<?php echo U('del',array('id'=>$foo['id']));?>" onClick="return del(1);">删除</a><?php endif; ?>
			</td>
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
					<input type="button" class="sys_btn" value="删除" onClick="myform.action='<?php echo U('del');?>';return confirm_del();" /> 
					&nbsp;<input type="button" class="sys_btn" value="排序" onClick="myform.action='<?php echo U('orderid');?>';myform.submit();" /> 
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