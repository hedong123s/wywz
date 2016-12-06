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

	$("#username").formValidator({onshow:"请输入用户名",onfocus:"用户名应该为2-20位之间"}).inputValidator({min:2,max:20,onerror:"用户名应该为2-20位之间"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"用户名格式错误"}).ajaxValidator({
	    type : "get",
		url : "<?php echo U('public_checkname_ajax');?>",
		data :"",
		datatype : "html",
		async:'false',
		success : function(data){
		
            if( data == "1" ) {
                return true;
			} else {
                return false;
			}
		},
		buttons: $("#send"),
		onerror : "禁止注册或用户已存在。",
		onwait : "请稍候..."
	});
	<?php if(ACTION_NAME == 'edit'): ?>$("#password").formValidator({empty:true,onshow:"不修改密码请留空。",onfocus:"密码应该为6-20位之间"}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"});
		$("#repassword").formValidator({empty:true,onshow:"不修改密码请留空。",onfocus:"两次密码不同。",oncorrect:"密码输入一致"}).compareValidator({desid:"password",operateor:"=",onerror:"两次密码不同。"});
	<?php else: ?>
	$("#password").formValidator({onshow:"请输入密码",onfocus:"密码应该为6-20位之间"}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"});
	$("#repassword").formValidator({onshow:"请输入确认密码",onfocus:"请输入两次密码不同。",oncorrect:"密码输入一致"}).compareValidator({desid:"password",operateor:"=",onerror:"请输入两次密码不同。"});<?php endif; ?>

	//$("#point").formValidator({tipid:"pointtip",onshow:"请输入积分点数，积分点数将影响会员用户组",onfocus:"积分点数应该为1-8位的数字"}).regexValidator({regexp:"^\\d{1,8}$",onerror:"积分点数应该为1-8位的数字"});
	$("#email").formValidator({onshow:"请输入邮箱",onfocus:"邮箱格式错误",oncorrect:"邮箱格式正确"}).inputValidator({min:2,max:32,onerror:"邮箱应该为2-32位之间"}).regexValidator({regexp:"email",datatype:"enum",onerror:"邮箱格式错误"});
 
 })
</script>
</head>

<body>

<div class="add-tab" style="border:0;">
	<a href="javascript:location.reload();" style="float:right;" class="f5">刷新</a>
	<div class="at_tab">
		<a href="javascript:;" class="cur"><i><?php if(ACTION_NAME == 'add'): ?>添加会员<?php else: ?>编辑会员<?php endif; ?></i></a> | 
		<a href="<?php echo U('index');?>"><i>会员管理</i></a>

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
				<th>用户名：</th>
				<td>	
				<?php if(ACTION_NAME == 'add'): ?><input type="text" class="sys_text" name="info[username]" id="username"  value="<?php echo (escapeshow($info['username'])); ?>">
				<?php else: ?>
				<?php echo ($info['username']); endif; ?>
				</td>
			</tr>			
			<tr>
				<th>密码：</th>
				<td><input type="password" class="sys_text" name="info[password]" id="password"  value=""></td>
			</tr>
			<tr>
				<th>确认密码：</th>
				<td><input type="password" class="sys_text" name="info[repassword]" id="repassword"  value=""></td>
			</tr>					
			<tr>
				<th>邮箱：</th>
				<td><input type="text" class="sys_text" name="info[email]" id="email" value="<?php echo ($info['email']); ?>" /></td>
			</tr>	
			<tr>
				<th>姓名：</th>
				<td><input type="text" class="sys_text" name="info[realname]" id="realname" value="<?php echo ($info['realname']); ?>"  /></td>
			</tr>			
			<tr>
				<th>电话：</th>
				<td><input type="text" class="sys_text" name="info[tel]" id="tel" value="<?php echo ($info['tel']); ?>" /></td>
			</tr>				
			<tr>
				<th>手机：</th>
				<td><input type="text" class="sys_text" name="info[phone]" id="phone" value="<?php echo ($info['phone']); ?>" maxlength="11" /></td>
			</tr>
			<tr>
				<th>QQ</th>
				<td><input type="text" class="sys_text" name="info[qq]" id="qq" value="<?php echo ($info['qq']); ?>" /></td>
			</tr>
			<tr>
				<th>公司名称</th>
				<td><input type="text" class="sys_text" name="info[company]" id="qq" value="<?php echo ($info['company']); ?>" /></td>
			</tr>
			<tr>
				<th>地址：</th>
				<td><input type="text" class="sys_text" style="width:350px;" name="info[address]" id="company_address" value="<?php echo ($info['address']); ?>" /></td>
			</tr>	
			
			
			<tr>
				<th width="200">会员组：</th>
				<td>
					<select name="info[group_id]" id="group_id">
					<?php echo category('member_group',$info['group_id']);?>
					</select>
				</td>
			</tr>				
			<tr>
				<th>允许登录：</th>
				<td>
					<select name="info[isauth]" id="isauth">
						<option value="0" <?php if($info['isauth'] == 0): ?>selected="selected"<?php endif; ?>>不允许</option>
						<option value="1" <?php if($info['isauth'] == 1): ?>selected="selected"<?php endif; ?>>允许</option>
					</select>
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
					<input type="submit" class="sys_blue_btn" value="提交" id="send" name="send" /> 
					<input type="hidden" value="<?php echo ($info['id']); ?>" name="info[id]">
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<!--/table-list-->




</body>
</html>