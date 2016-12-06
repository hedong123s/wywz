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
 
 $("#picurl").formValidator({onshow:"请上传广告图",onfocus:"请上传广告图"}).inputValidator({min:1,onerror:"请上传广告图"})
 
 })
</script>
</head>

<body>
<div class="add-tab" style="border:0;">
	<a href="javascript:location.reload();" style="float:right;" class="f5">刷新</a>
	<div class="at_tab">
		<a href="javascript:;" class="cur"><i><?php if(ACTION_NAME == 'add'): ?>添加广告<?php else: ?>编辑广告<?php endif; ?></i></a> | 
		<a href="<?php echo U('index',array('id'=>'')); if(ACTION_NAME == 'add'): echo ($_GET['id']); else: echo ($info['cid']); endif; ?>"><i>广告管理</i></a>

	</div>
	<div class="clearall"></div>
</div>
<!--table-list-->
<div class="table-edit ">
	
	<form method="post" id="myform" action="<?php echo U('send');?>">
	<div class="table-edit_form">
		<div  class="te_tab_c">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="200">所属广告位：</th>
				<td>
					
					<?php if(ACTION_NAME == 'edit'): echo type('ad_type',$info['cid'],1);?>
							<input type="hidden" value="<?php echo ($info['cid']); ?>" id="cid" name="info[cid]">
						<?php else: ?>
							<?php echo type('ad_type',$_GET['id'],1);?>
							<input type="hidden" value="<?php echo ($_GET['id']); ?>" id="cid" name="info[cid]"><?php endif; ?>
					
					
				</td>
			</tr>			
			<tr>
				<th>名称：</th>
				<td><input type="text" class="sys_text" name="info[title]" id="title"  value="<?php echo (escapeshow($info['title'])); ?>"></td>
			</tr>
			<tr>
				<th>缩略图：</th>
				<td><input type="text" class="sys_text sys_text350" name="info[picurl]" id="picurl" value="<?php echo ($info['picurl']); ?>"  />&nbsp;<input type="button" class="sys_btn" value="上传图片" onClick="getuploadify('uploadify','缩略图上传','image','image',1,<?php echo C(cfg_max_file_size);?>,'picurl')" /></td>
			</tr>			
			<tr>
				<th>链接：</th>
				<td><input type="text" class="sys_text" name="info[url]" id="siteurl"  value="<?php echo (escapeshow($info['url'])); ?>"></td>
			</tr>			
			<tr>
				<th>排序：</th>
				<td><input type="text" class="sys_text" name="info[orderid]" id="orderid" value="<?php echo (intval($info['orderid'])); ?>" /></td>
			</tr>			
			<tr>
				<th>是否显示：</th>
				<td>
					<label><input type="checkbox"   value="1" name="info[checkinfo]"  <?php if($info['checkinfo'] == '1' ): ?>checked="checked"<?php endif; ?> /> 不显示 </label> 
				</td>
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