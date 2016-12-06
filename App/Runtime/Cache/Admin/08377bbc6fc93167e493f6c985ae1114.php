<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="__TMPL__style/base.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/main.css" />
<script type="text/javascript" src="__TMPL__js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__js/base.js"></script>
<script type="text/javascript" src="__TMPL__js/main.js"></script>
</head>

<body>
<div class="notewarn mb12" style="display:none;"><span class="close"><a href="javascript:;"></a></span>
	<div>显示分辨率 1360*768 显示效果最佳，建议使用新版</div>
</div>

<!--main_wrap-->
<div class="main_wrap">
	<!--main_wrap_left-->
	<div class="main_wrap_left">
		<!--main_login-->
		<div class="main_login">
			
			<div class="mlogin_inf">
				<div class="admininf fl">
					<p>Hi, <span class="ft_sup ft18 ft_ari"><?php echo (session('admin_9f_username')); ?></span></p>
					<p><span class="ft_gray">您上次登录的时间：</span><?php echo (getdatetime(session('admin_9f_lastlogintime'))); ?></p>
					<p><span class="ft_gray">您上次登录的IP：</span><?php echo (session('admin_9f_lastloginip')); ?>&nbsp;<a href="<?php echo U('admin/admin_manage/public_edit_pwd');?>" class="ft_sup">修改密码</a></p>
				</div>
				
				<div class="mlogin_date fr">
					<div class="md_day"><?php echo date('d',time());?></div>
					<div class="md_ym"><?php echo date('Y-m',time());?></div>
				</div>
				<div class="clearall"></div>
			</div>
			
			<div class="mlogin_note">
				<textarea class="mlogin_note_textarea" id="note_memo"><?php echo escapeshow(M('admin_text')->where(array('id'=>1))->getfield('content')) ?></textarea>
			</div>
		</div>
		<!--main_login-->
		
		<!--main_sysinf-->
		<div class="main_sysinf mbox mt12">
			<div class="mbox_t">
				<ul>
					<li class="cur">系统信息</li>
				</ul>
			</div>
			<div class="mbox_c">
				<div class="m_sysinf mbox_con">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_sysinf_table">
						<tr>
							<td height="28" colspan="2">软件版本号： <span>hdcms 2014-4 V1.1 Beta</span></td>
						</tr>
						<tr>
							<td width="50%" height="28">服务器版本： <span title="Apache/2.2.4 (Win32) PHP/5.2.3">Apache/2.2.4 </span></td>
							<td width="50%">操作系统： <?php echo PHP_OS;?></td>
						</tr>
						<tr>
							<td height="28">PHP版本号：<?php echo PHP_VERSION;?></td>
							<td>GDLibrary： 
							<?php if(function_exists(imageline)): ?><span class="inf_true">支持</span>
							<?php else: ?>
							<span class="inf_false">不支持</span><?php endif; ?>
							</td>
						</tr>
						<tr>
							<td height="28">MySql版本： <?php echo getversion(true);?></td>
							<td height="28">ZEND支持： 
							<?php if(extension_loaded('zend')): ?><span class="inf_true">支持</span>
							<?php else: ?>
							<span class="inf_false">不支持</span><?php endif; ?>
							</td>
						</tr>
						<tr class="nb">
							<td height="28" colspan="2">支持上传的最大文件：<?php echo ini_get('upload_max_filesize');?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!--main_sysinf-->
	</div>
	<!--main_wrap_left-->
	
	
	
	<div class="clearall"></div>
</div>
<!--main_wrap-->

<!--footer-->
<div class="mfooter">版权所有 © 2016</div>
<!--/footer-->
</body>
</html>