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
</head>

<body>

<style type="text/css">
html{_overflow-y:scroll}
.showMsg{border: 1px solid #339ddc; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
.showMsg h5{background-image: url(/younk/App/Modules/Admin/Tpl/images/msg.png);background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
.showMsg .content{ margin-top:50px; font-size:14px; height:64px; position:relative}
.forword{ background:#e3eff7; position:absolute; bottom:0; width:450px; height:32px; line-height:32px; text-align:center; color:#267eb2;}
.forword a{ color:#267eb2; text-decoration:none;}
.forword a:hover{ color:#267eb2; text-decoration:underline;}

</style>
<div class="showMsg" style="text-align:center">
	<h5>生成静态</h5>
    <div class="content"><?php echo ($content); ?></div>
    <div class="forword">
        <a href="<?php echo ($url); ?>">如页面长时间未跳转，请点击此连接</a>
    </div>
</div>
<script language="javascript">
setTimeout("redirect('<?php echo ($url); ?>');",<?php echo ($time); ?>);
function redirect(url) {
	location.href = url;
}
</script> 


</body>
</html>