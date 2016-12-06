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
 
 $("#classname").formValidator({onshow:"请输入栏目名称",onfocus:"请输入栏目名称"}).inputValidator({min:1,onerror:"请输入栏目名称"})

 
})

$(function(){
		
	$("select[name='modelid']").change(function(){
		
		select_tpl($(this).val(),'','');
		
	})
	select_tpl('<?php echo ($data['modelid']); ?>','<?php echo ($_GET['id']); ?>','<?php echo ($_GET['id']); ?>');
}) 

function select_tpl(modelid,id,show){

	$.get('<?php echo U('select_tpl_ajax');?>','modelid='+modelid+'&id='+id+'&show='+show,function(data){

			arr=eval("("+data+")");
			$("#list_template").html(arr['list']);
			$("#show_template").html(arr['show']);
		
	});
}

$(function(){
	
	$("select[name='list_template']").live('change',function(){

		if($(this).val()==''){
			select_tpl('<?php echo ($data['modelid']); ?>','<?php echo ($data['id']); ?>',1); //显示全部模板
		}
		
	})
})




</script>
</head>
<body>

<!--add-tab-->
<div class="add-tab" style="border:0;">
	<div class="at_tab">
		<a href="<?php echo U('index');?>"><i>管理栏目</i></a> | 
		<?php if(ACTION_NAME == 'add'): ?><a href="<?php echo U('add');?>" class="cur"><i>添加栏目</i></a>
			<?php else: ?>
			
				<a href="javascript:;" class="cur"><i>编辑栏目</i></a><?php endif; ?>

		

	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->
<!--table-list-->
<div class="table-edit ">
	<form method="post" id="myform">

	<div class="table-edit_tab">
		<ul>
			<li data-id="te_tab_1" class="cur"><a href="#">基本选项</a></li>
		
			<li data-id="te_tab_3"><a href="#">SEO 设置</a></li>
			<li data-id="te_tab_4"><a href="#">模板设置</a></li>
		</ul>
		<div class="clearall"></div>
	</div>
	<div class="table-edit_form">
		<div id="te_tab_1" class="te_tab_c">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>		
			<tr>
				<th width="200">请选择模型：</th>
				<td>
					<?php echo ($data['model']); ?>
				</td>
			</tr>
			<tr>
				<th>所属栏目：</th>
				<td>
					<select name="pid" id="pid">
					<option value="0">作为一级栏目</option>
					<?php echo ($data['category_list']); ?>
					</select>
				</td>
			</tr>
			<tr>
				<th>栏目名称：</th>
				<td><input type="text" class="sys_text" name="classname" id="classname" value="<?php echo (escapeshow($data['classname'])); ?>" /></td>
			</tr>
			<tr>
				<th>英文目录：</th>
				<td><input type="text" class="sys_text" name="dirname" id="dirname" value="<?php echo (escapeshow($data['dirname'])); ?>" /></td>
			</tr>
			<tr>
				<th>属性：</th>
				<td>
                	<?php $classFlagArr=C("contentclassflag");?>
                	<?php if(is_array($classFlagArr)): foreach($classFlagArr as $key=>$v): ?><label><input type="checkbox" name="flag[]" <?php if( in_array($key,explode(",",$data["flag"])) ): ?>checked="checked"<?php endif; ?> value="<?php echo ($key); ?>" /> <?php echo ($v); ?>[<?php echo ($key); ?>]</label>&nbsp;<?php endforeach; endif; ?>
				</td>
			</tr>
			<tr>
				<th>链接地址：</th>
				<td><input type="text" class="sys_text" name="url" id="url" value="<?php echo (escapeshow($data['url'])); ?>" /></td>
			</tr>
			<tr>
				<th>栏目图片：</th>
				<td>
				
				<input type="text" class="sys_text sys_text350" name="picurl" id="picurl" value="<?php echo ($data['picurl']); ?>"  />&nbsp;<input type="button" class="sys_btn" value="上传图片" onClick="getuploadify('uploadify','缩略图上传','image','image',1,<?php echo C(cfg_max_file_size);?>,'picurl')" />

				</td>
			</tr>
			<tr>
				<th>排序：</th>
				<td><input type="text" class="sys_text" name="orderid" id="orderid" value="<?php echo (intval($data['orderid'])); ?>" /></td>
			</tr>		
			<tr>
				<th>是否在导航显示：</th>
				<td>
					<label><input type="checkbox"  value="1" name="navshow" <?php if($data['navshow'] == '1' ): ?>checked="checked"<?php endif; ?> /> 显示 </label> 
				</td>
			</tr>			
			<tr>
				<th>是否显示：</th>
				<td>
					<label><input type="checkbox"   value="1" name="checkinfo"  <?php if($data['checkinfo'] == '1' ): ?>checked="checked"<?php endif; ?> /> 不显示 </label> 
				</td>
			</tr>
			</tbody>
		</table>
		</div>
		<div id="te_tab_2" class="te_tab_c" style="display:none;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="200">栏目生成Html：</th>
				<td>
					<input type="text" value="" name="" class="sys_text">
				</td>
			</tr>
			<tr>
				<th>内容页生成Html：</th>
				<td>
					<select>
					<option value="" selected="">请选择模型</option>
					<option value="1">文章模型</option>
					<option value="2">下载模型</option>
					<option value="3">图片模型</option>
					<option value="11">产品模型</option></select>
				</td>
			</tr>
			
			</tbody>
		</table>
		</div>
		
		<div id="te_tab_3" class="te_tab_c" style="display:none;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th  width="200">
				<strong>META Title（栏目标题）</strong>
					<br>
				针对搜索引擎设置的标题
				</th>
				<td>
					<input type="text" name="seotitle" class="sys_text" value="<?php echo (escapeshow($data['seotitle'])); ?>">
				</td>
			</tr>
			<tr>
				<th>
					<strong>META Keywords（栏目关键词）</strong>
					<br>
					关键字中间用半角逗号隔开
				</th>
				<td>
				<textarea name="keywords" class="sys_textarea sys_textarea350"><?php echo (escapeshow($data['keywords'])); ?></textarea>
				</td>
			</tr>			
			<tr>
				<th>
					<strong>META Description（栏目描述）</strong>
						<br>
					针对搜索引擎设置的网页描述
				</th>
				<td>
				<textarea name="description" class="sys_textarea sys_textarea350"><?php echo (escapeshow($data['description'])); ?></textarea>
				</td>
			</tr>
			
			</tbody>
		</table>
		</div>		
		
		<div id="te_tab_4" class="te_tab_c" style="display:none;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
	
			<tr>
				<th width="200">
					栏目列表页模板：
				</th>
				<td id="list_template">
				
					
				</td>
			</tr>			
			<tr>
				<th>
					内容页模板：
				</th>
				<td id="show_template">
					
				</td>
			</tr>
			
			</tbody>
		</table>
		</div>
		
	</div>
	<div class="tools-edit">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
				<th width="200">&nbsp;</th>
				<td>
					<input type="submit" class="sys_blue_btn" value="提交" name="send" /> 
					<input type="hidden" value="<?php echo ($data['id']); ?>" name="id">
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<!--/table-list-->
</body>
</html>