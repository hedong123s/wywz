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

	$(function(){
		 $.formValidator.initConfig({autotip:true,formid:"add_form",onerror:function(msg){}});	
		$("#varname").formValidator({onshow:"请输入变量名称",onfocus:"变量名称只能是英文且不能重复"}).inputValidator({onerror:"变量名称请输入有误"}).regexValidator({regexp:"^[a-z_]+$",onerror:"变量名称只能为英文"});
		 $("#varinfo").formValidator({onshow:"请输入参数说明",onfocus:"请输入参数说明"}).inputValidator({min:1,onerror:"参数说明不能小于1位"})
		
	
	})
	
	$(function(){
		$("form#add_form").submit(function(){
			if($("input[name='add_var[vartype]']:checked").val()=='bool' && ($("#varvalue").val()!='Y' && $("#varvalue").val()!='N')){
				alert('布尔变量值必须为Y或N！');
				return false;
			}
			
		})
	})

function test_mail() {
	$("#testButton").val('发送中,请等待结果...');

    $.post("<?php echo U('public_test_mail');?>",{mail_type:$("input[name='mail_type']:checked").val(),mail_server:$("#mail_server").val(),mail_port:$("#mail_port").val(),mail_from:$("#mail_from").val(),mail_user:$("#mail_user").val(),mail_password:$("#mail_password").val(),mail_to:$("#mail_to").val()}, function(data){
		$("input[type='button']").val('测试发送');
		alert(data);
	});
	return false;
}


function tag(id){
	if(id=='') id=1;
	
	$(".table-edit_form").find(".te_tab_c").hide();
	$(".table-edit_tab").find("li").removeClass('cur');
	$(".table-edit_tab").find("li").each(function(){
	;
		if($(this).attr('data-id')=='te_tab_'+id){
			$(this).addClass('cur');
		}
	});
	$("#te_tab_"+id).show();
}

$(function(){
	tag('<?php echo ($_GET['tab']); ?>');
})	
	
	
</script>
</head>
<body>


<!--table-list-->
<div class="table-edit">
	<div class="table-edit_tab">
		<ul>
			<?php if(is_array($vargroup)): $i = 0; $__LIST__ = $vargroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><li data-id="te_tab_<?php echo ($foo["id"]); ?>" <?php if($i == 1): ?>class="cur"<?php endif; ?>><a href="javascript:;"><?php echo ($foo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			<li data-id="te_tab_0"><a href="javascript:;">添加新变量</a></li>
		</ul>
		<div class="clearall"></div>
	</div>
	<div class="table-edit_form">
		<form method="post" action="<?php echo U('update');?>">

		<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($k % 2 );++$k;?><div id="te_tab_<?php echo ($k); ?>" class="te_tab_c" style="display:<?php if($k == 1): ?>block<?php else: ?>none<?php endif; ?>;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<?php if(is_array($foo['list'])): $i = 0; $__LIST__ = $foo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><tr>
				<th width="200"><?php echo ($foo['varinfo']); ?></th>
				<td width="534">
					<?php if($foo['vartype'] == 'string'): ?><input type="text" value="<?php echo (escapeshow($foo['varvalue'])); ?>" name="<?php echo ($foo['varname']); ?>" class="sys_text sys_text350"><?php endif; ?>					
					
					<?php if($foo['vartype'] == 'number' && $foo['id'] != 36): ?><input type="text" value="<?php echo (escapeshow($foo['varvalue'])); ?>" name="<?php echo ($foo['varname']); ?>" class="sys_text"><?php endif; ?>		
					
					<?php if($foo['id'] == 36): ?><label><input type="radio" <?php if(intval($foo['varvalue']) == 0): ?>checked="checked"<?php endif; ?> value="0" name="<?php echo ($foo['varname']); ?>"> 动态 </label> 
					<label><input type="radio" <?php if(intval($foo['varvalue']) == 1): ?>checked="checked"<?php endif; ?>  value="1" name="<?php echo ($foo['varname']); ?>"> 纯静态</label><?php endif; ?>
					
					<?php if($foo['vartype'] == 'bool'): ?><label><input type="radio" <?php if($foo['varvalue'] == 'Y'): ?>checked="checked"<?php endif; ?> value="Y" name="<?php echo ($foo['varname']); ?>"> 是 </label> 
					<label><input type="radio" <?php if($foo['varvalue'] == 'N'): ?>checked="checked"<?php endif; ?>  value="N" name="<?php echo ($foo['varname']); ?>"> 否</label><?php endif; ?>
					
					<?php if($foo['vartype'] == 'bstring'): ?><textarea class="sys_textarea " style="width:500px;height:120px;" name="<?php echo ($foo['varname']); ?>"><?php echo (escapeshow($foo['varvalue'])); ?></textarea><?php endif; ?>
					
					
					
				</td>
				<td width="278"><span style="color:#999;font-size:12px;font-family:Arial;">&lt;{:C('cfg_<?php echo ($foo['varname']); ?>')}&gt;</span></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
			<div class="tools-edit">
		  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
				<tr>
					<th width="230">&nbsp;</th>
					<td>
						<input type="submit" class="sys_blue_btn" value="提交" /> 
					</td>
				</tr>
			</table>
		</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		
		
		
		</form>
		
		<form method="post" enctype="multipart/form-data" action="<?php echo U('update_wmk');?>">
		<div id="te_tab_10" class="te_tab_c" style="display:none;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="200">是否开启水印</th>
				<td>
					<label><input  type="radio" value="Y" name="markswitch" <?php if(C('cfg_markswitch') == 'Y'): ?>checked="checked"<?php endif; ?>> 启用 </label> 
					<label><input  type="radio" value="N" name="markswitch" <?php if(C('cfg_markswitch') == 'N'): ?>checked="checked"<?php endif; ?>> 关闭</label> 
				</td>
			</tr>
			<tr>
				<th>水印添加条件</th>
				<td>
					宽&nbsp;
					<input type="text" name="markminwidth" id="markminwidth" value="<?php echo intval(C('cfg_markminwidth'));?>" class="sys_text" style="width:50px;" />
					px&nbsp;&nbsp;高&nbsp;
					<input type="text" name="markminheight" id="markminheight" value="<?php echo intval(C('cfg_markminheight'));?>" class="sys_text" style="width:50px;" />
					px 
					
				</td>
			</tr>
			<tr>
				<th>水印类型</th>
				<td>
				<label><input name="marktype" type="radio" value="0" <?php if(C('cfg_marktype') == '0'): ?>checked="checked"<?php endif; ?>  />
					图片</label> &nbsp;
				<label><input type="radio" name="marktype"  value="1" <?php if(C('cfg_marktype') == '1'): ?>checked="checked"<?php endif; ?>  />
					文字</label>
				</td>
			</tr>
		
			<tr>
				<th>水印预览</th>
				<td>
					<?php if(C('cfg_markpicurl') != ''): ?><img src="<?php echo C('cfg_markpicurl');?>" id="watermark_prew" />
					<input name="markpicurl" type="hidden" id="markpicurl" value="<?php echo C('cfg_markpicurl');?>" /><?php endif; ?>
				</td>
			</tr>
			<tr>
				<th>上传水印</th>
				<td><input type="file"  name="watermarket"></td>
			</tr>			
			<tr>
				<th>水印文字</th>
				<td><input name="marktext" type="text" id="marktext" class="sys_text" value="<?php echo escapeshow(C('cfg_marktext'));?>" style="color:<?php echo C('cfg_markcolor');?>;" /></td>
			</tr>				
			<tr>
				<th>水印文字</th>
				<td><input name="markcolor" type="text" id="markcolor" class="sys_text" value="<?php echo escapeshow(C('cfg_markcolor'));?>" /></td>
			</tr>			
			
			<tr>
				<th>文字大小</th>
				<td><input name="marksize" type="text" id="marksize" class="sys_text" value="<?php echo intval(C('cfg_marksize'));?>" /></td>
			</tr>
			
			
			<tr>
				<th width="200">水印位置：</th>
				<td>
					<label><input type="radio" value="1" name="markwhere" <?php if(C('cfg_markwhere') == '1'): ?>checked="checked"<?php endif; ?> > 左上  </label>
					<label><input type="radio" value="2" name="markwhere" <?php if(C('cfg_markwhere') == '2'): ?>checked="checked"<?php endif; ?>> 中上  </label>
					<label><input type="radio" value="3" name="markwhere" <?php if(C('cfg_markwhere') == '3'): ?>checked="checked"<?php endif; ?>> 右上</label>
					<br/>
					<label><input type="radio" value="4" name="markwhere" <?php if(C('cfg_markwhere') == '4'): ?>checked="checked"<?php endif; ?>> 左中  </label>
					<label><input type="radio" value="5" name="markwhere" <?php if(C('cfg_markwhere') == '5'): ?>checked="checked"<?php endif; ?>> 中间  </label>
					<label><input type="radio" value="6" name="markwhere" <?php if(C('cfg_markwhere') == '6'): ?>checked="checked"<?php endif; ?>> 右中</label>
					<br/>
					<label><input type="radio" value="7"  name="markwhere" <?php if(C('cfg_markwhere') == '7'): ?>checked="checked"<?php endif; ?>> 左下  </label>
					<label><input type="radio" value="8" name="markwhere" <?php if(C('cfg_markwhere') == '8'): ?>checked="checked"<?php endif; ?>> 中下  </label>
					<label><input type="radio" value="9" name="markwhere" <?php if(C('cfg_markwhere') == '9'): ?>checked="checked"<?php endif; ?>> 右下</label>
					<br/>
					<label><input type="radio"  value="0" name="markwhere" <?php if(C('cfg_markwhere') == '0'): ?>checked="checked"<?php endif; ?>> 随机</label>
					
				</td>
			</tr>
	
			</tbody>
		</table>
			<div class="tools-edit">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
				<tr>
					<th width="200">&nbsp;</th>
					<td>
						<input type="submit" class="sys_blue_btn" value="提交" /> 
					</td>
				</tr>
			</table>
		</div>
		</div>
		</form>
		
		
		<form method="post"  id="email_form" action="<?php echo U('update_email');?>">
		<div id="te_tab_11" class="te_tab_c" style="display:none;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="200">邮件发送模式 </th>
				<td>
					<label><input type="radio" checked="checked"   value="1" name="mail_type">SMTP 函数发送</label>
					<label><input type="radio" disabled="disabled" value="0"  name="mail_type">mail 模块发送</label> 
				</td>
			</tr>
			<tr>
				<th>邮件服务器</th>
				<td><input type="text" class="sys_text"  value="<?php echo escapeshow(C('Cfg_mail_server'));?>" name="mail_server" id="mail_server" />
				</td>
			</tr>
			<tr>
				<th>邮件发送端口</th>
				<td><input type="text" class="sys_text"  value="<?php echo intval(C('Cfg_mail_port'));?>" name="mail_port" id="mail_port" /></td>
			</tr>
            <tr>
				<th>发件人地址</th>
				<td><input type="text" class="sys_text " value="<?php echo escapeshow(C('Cfg_mail_user'));?>" name="mail_user" id="mail_user" /></td>
			</tr>
			<tr>
				<th>密码</th>
				<td><input type="password" class="sys_text " value="<?php echo C('Cfg_mail_password');?>" name="mail_password" id="mail_password" /></td>
			</tr>
			<tr>
				<th>收件人地址</th>
				<td><input type="text" class="sys_text"  value="<?php echo escapeshow(C('Cfg_mail_from'));?>" name="mail_from" id="mail_from" /></td>
			</tr>
			<tr>
				<th>邮件标题测试</th>
				<td>
					<input type="text" class="sys_text " name="mail_to" id="mail_to" value="<?php echo escapeshow(C('Cfg_mail_to'));?>" /> <input type="button" id="textButton" value="测试发送" class="sys_btn" onClick="javascript:test_mail();">
				</td>
			</tr>
			</tbody>
		</table>
			<div class="tools-edit">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
				<tr>
					<th width="200">&nbsp;</th>
					<td>
						<input type="submit" class="sys_blue_btn" value="提交" /> 
					</td>
				</tr>
			</table>
		</div>
		</div>
		</form>
		

	
		<form name="" method="post" id="add_form" action="<?php echo U('add_var');?>">
		<div id="te_tab_0" class="te_tab_c" style="display:none;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="200">变量名称</th>
				<td>
					<input type="text"  id="varname" class="sys_text" name="add_var[varname]" >
				</td>
			</tr>
			<tr>
				<th>参数说明</th>
				<td>
					<input type="text" id="varinfo" class="sys_text" name="add_var[varinfo]" >
				</td>
			</tr>
			<tr>
				<th>变量值</th>
				<td><input type="text" class="sys_text" id="varvalue"  name="add_var[varvalue]" /></td>
			</tr>
			<tr>
				<th>变量类型</th>
				<td>
					<label><input type="radio" value="string" name="add_var[vartype]" checked="checked"> 文本 </label>
					<label><input type="radio" value="number" name="add_var[vartype]"> 数字 </label>
					<label><input type="radio" value="bool" name="add_var[vartype]"> 布尔(Y/N) </label>
					<label><input type="radio" value="bstring" name="add_var[vartype]"> 多行文本 </label>
					<label><input type="radio" value="edit" name="add_var[vartype]"> 编辑器 </label>
				</td>
			</tr>
			<tr>
				<th>所属组</th>
				<td>
				<select name="add_var[vargroup]">
					<?php if(is_array($vargroup)): $i = 0; $__LIST__ = $vargroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i; if($foo["id"] != '10' and $foo["id"] != '11' ): ?><option value="<?php echo ($foo['id']); ?>"><?php echo ($foo["title"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</td>
			</tr>

			</tbody>
		</table>
			<div class="tools-edit">
				<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
					<tr>
						<th width="100">&nbsp;</th>
						<td>
							<input type="submit" class="sys_blue_btn" value="提交" /> 			
						</td>
					</tr>
				</table>
			</div>
		</div>
		</form>
		
	</div>
	
</div>
<!--/table-list-->
</body>
</html>