<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="__TMPL__style/base.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/master.css" />
<script type="text/javascript" src="__TMPL__js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__js/artDialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="__TMPL__js/artDialog/plugins/iframeTools.source.js"></script>
<script type="text/javascript" src="__TMPL__js/base.js"></script>
<script type="text/javascript" src="__TMPL__js/master.js"></script>

<!--[if lte IE 6]>
<script type="text/javascript" src="__TMPL__images/iepng/iepngfix_tilebg.js"></script>
<style type="text/css">.png{behavior:url("__TMPL__images/iepng/iepngfix.htc");}</style>
<![endif]-->

<script type="text/javascript">
	function _M(id,tid){
		
	
		$(".sys_left_menu").html('<img src="__TMPL__images/loading.gif" style="margin:15px auto;display:block;">');
	
		$(".sys_left_menu").load('__TMPL__left_menu.php?id='+id+'&tid='+tid);

	}


	
	
	$(function(){
		_M(4);			
	})
	

	


	
</script>

</head>

<body>

<!--top-->
<div class="top">
	<div class="top_l">
		<div class="top_r">
			<!--top_主题-->
			<div class="logo fl"><a href="<?php echo U('index');?>"><img src="__TMPL__images/logo.jpg" /></a></div>
	
			<!--快捷按钮-->
			<div class="shortcut fl">
				<ul>
					<li>
						<a href="<?php echo U('Admin/category/index');?>" target="main_iframe" onclick="_M(4,'category_manage');">
							<span class="shortcut_ico"><img src="__TMPL__images/shortcut_ico_2.png" class="png" /></span>
							<span class="shortcut_title">栏目管理</span>
						</a>
					</li>
					<li>
						<a href="<?php echo U('Admin/sort_iframe/menu');?>"  target="sort_iframe" onclick="_M(4,'content_manage');">
							<span class="shortcut_ico"><img src="__TMPL__images/shortcut_ico_1.png" class="png" /></span>
							<span class="shortcut_title">内容管理</span>
						</a>
					</li>
					<li>
						<a href="<?php echo U('Admin/setting/index',array('tag'=>'1'));?>"  target="main_iframe"  onclick="_M(2,'setting');">
							<span class="shortcut_ico"><img src="__TMPL__images/shortcut_ico_5.png" class="png" /></span>
							<span class="shortcut_title">网站配置</span>
						</a>
					</li>
					<li>
						<a href="<?php echo U('Admin/member/index');?>" target="main_iframe" onclick="_M(5,'member');">
							<span class="shortcut_ico"><img src="__TMPL__images/shortcut_ico_3.png" class="png" /></span>
							<span class="shortcut_title">会员信息</span>
						</a>
					</li>
					<li>
						<a href="<?php echo U('Admin/message/index');?>"  target="main_iframe" onclick="_M(3,'form');">
							<span class="shortcut_ico"><img src="__TMPL__images/shortcut_ico_4.png" class="png" /></span>
							<span class="shortcut_title">留言信息</span>
						</a>
					</li>
	
				</ul>
			</div>
			<!--快捷按钮-->
			
			<div class="fr">
				<div class="sys_adimin_inf">您好！ <?php echo (session('admin_9f_username')); ?>  [超级管理员]  [<a href="<?php echo U('Login/logout');?>">退出</a>]  |  <a href="__ROOT__/" target="_blank">网站首页</a>  |  <a href="<?php echo U('index');?>">后台首页</a></div>
				<div class="empty_18"></div>
				<div class="sys_menu png" id="sys_menu">
					
					<ul>
						<?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><li  <?php if($key == '4'): ?>class="cur"<?php endif; ?> <?php if(count($menu_list) == $i): ?>class="nobg"<?php endif; ?>><a href="javascript:_M('<?php echo ($key); ?>');" ><span><?php echo ($foo["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<!--top_主题-->
			

			
			
			<div class="clearall"></div>
		</div>
	</div>
</div>
<!--top-->

<!--sys_alert-->
<div class="sys_alert_wrap">
	<span class="sys_alert" id="sys_alert_show">...</span>
</div>
<!--sys_alert-->

<!--sys_wrap-->
<div class="sys_wrap">
	<!--sys_left_wrap-->
	<div class="col-div col-left fl">
		<div class="sys_left_wrap col-div-con">
			
			<div class="sys_left_menu">

			</div>
	
			<div class="sys_left_scroll">
				<a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);">&nbsp;</a>
				<a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);">&nbsp;</a>
			</div>
						
		</div>
	</div>
	<!--sys_left_wrap-->
	

	
	<!--sys_close_menu-->
	<a href="javascript:;" class="sys_close_menu" title="展开/关闭">关闭</a>
	<!--sys_close_menu-->
	
	<!--sys_sort_wrap-->
	<div class="col-div col-sort fl">
		<div class="sys_sort_wrap col-div-con">
			<div class="sys_sort_content"><iframe src="<?php echo U('sort_iframe');?>" width="178" frameborder="false" scrolling="auto"  allowtransparency="true" style="border:none;"  id="sys_sort_iframe" name="sort_iframe"></iframe></div>
		</div>
	</div>
	<!--sys_sort_wrap-->
	
	<!--sys_main-->
	<div class="col-div col-main fl">
		<div class="sys_main_wrap col-div-con">
			<div class="sys_main_content"><iframe src="<?php echo U('main');?>" width="100%" frameborder="false" scrolling="auto"  allowtransparency="true" style="border:none;" id="sys_main_iframe" name="main_iframe"></iframe></div>
		</div>
	</div>
	<!--sys_main-->
	
</div>
<!--sys_wrap-->
</body>
</html>