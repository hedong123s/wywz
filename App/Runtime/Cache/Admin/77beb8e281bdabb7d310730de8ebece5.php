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
<link rel="stylesheet" type="text/css" href="__TMPL__style/jquery.lightTreeview.css" />
<script type="text/javascript" src="__TMPL__js/jquery.lightTreeview.pack.js"></script>
<script type="text/javascript">



<?php if(ACTION_NAME == 'menu' ): ?>$("#sys_main_iframe",parent.document).attr('src','<?php echo U('content/index');?>');<?php endif; ?>


$(function(){
	
	$("span.btn").eq(0).toggle(function(){
		$.lightTreeview.close('#node ol,#node ul')
	},function(){
		$.lightTreeview.open('#node ol,#node ul')
	})
	
	$('#node').html("<div style='font-size:12px;padding:5px 0 5px 20px;overflow:hidden;'><img src='__TMPL__images/loading_d.gif' style='margin:10px 0 0 10px;display:block;'>加载中,请稍后</div>");

		$("#node").load('<?php echo U('SortIframe/menu_list');?>',function(){
		$('#node').lightTreeview({
			collapse: true,
			line: true,
			nodeEvent: false,
			unique: false,
			style: 'defalut', //red black gray
			animate: 0,
			fileico: false,
			folderico: false
		});
	});
	
	$("#node a").live("click",function(){
		$("#node").find("a").removeClass("cur");
		$(this).addClass("cur");
	})
	
})






</script>
<style type="text/css">

.btn {
	cursor: pointer;
	display:block;
	background:url(__TMPL__images/application_side_expand.png) 0 0 no-repeat;
	padding:0 0 5px 20px;
}
ul#node li{white-space:nowrap;}

</style>
</head>

<body>

<div class="description">
<span class="btn" >展开/收缩</span>
<span class="btn" onClick="$.lightTreeview.toggle('#node ol,#node ul')" style="display:none;"> 切换全部</span>


<ul id="node">
	
</ul>

</div>	
	
</body>
</html>