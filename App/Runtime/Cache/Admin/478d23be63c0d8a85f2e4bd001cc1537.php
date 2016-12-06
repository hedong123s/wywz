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
	$(function(){

		$("#s_category").change(function(){
			
			$.get('<?php echo U('public_data_ajax');?>','id='+$(this).val(),function(data){
				
				$("#data_list").html(data);
				$("#data_list option").eq(0).attr('selected',true);
			});
			
		})		
		
		$("#data_list").change(function(){
			
			if($(this).find("option:selected")){
			
			}
			
		})
		
		
		
		$("input[name='send']").click(function(){
			
			if(!$("#s_category").val()){
				alert('请选择栏目');
				return false;
			}			
			
			if($("#data_list").find("option").length<1){
				alert('无数据');
				return false;
			}
			
			if(!$("#g_category").val()){
				alert('请选择移动到所在的栏目');
				return false;
			}
			
			
			if(confirm('确定要把【'+$("#s_category option:selected").attr('text')+'】的数据移动到【'+$("#g_category option:selected").attr('text')+'】栏目里？')){
				return true;
			}else{
				return false;	
			}	
		
			
			
			
		})
		
		
	})
</script>

</head>
<body>

<!--add-tab-->
<div class="add-tab">

	<div class="at_tab">
		<a href="javascript:;" class="cur"><i>数据移动</i></a>
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
			<th width="300">选择栏目</th>
			<th>选择数据</th>
			<th>移动到</th>
		</tr>
	
	
		<tr>
			<td  align="center">
				<select name="s_category" size="2" style="height:300px;" id="s_category">
					<?php echo ($list); ?>
				</select>
			</td>
			<td align="center" valign="top" title="按住“Ctrl”或“Shift”键可以多选，按住“Ctrl”可取消选择">
				<select name="data_list[]" multiple="multiple" style="height:300px;width:300px;"  id="data_list">
				
					
				</select>
			</td>
			<td align="center">
				<select name="g_category" size="2" style="height:300px;" id="g_category">
					<?php echo ($list); ?>
				</select>
			</td>			
	
		</tr>
	
	</table>
			<div class="tools-edit">
				<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
					<tr>
						<td align="center">
							<input type="submit" class="sys_blue_btn" value="提交" name="send" /> 			
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