<?php 
/*===============
自定义函数（当前页面函数整站有效有效）
================*/
//价格格式化
function formatPrice($str,$len=2){
	return sprintf("%01.".$len."f", $str);
}

/*
通过ID获取内容栏目名称或其他字段
$field 默认为classname，如果填写其他字段，则返回其他字段数据。此时返回值，而非数组
若$field的值为[array]则，返回当前id所有字段值，此时返回数组
*/
function getCateName($id,$field='classname'){
	$db=M("category");
	if($field=='[array]'){
		$row=$db->where(array("id"=>$id))->find();
	}else{
		$row=$db->where(array("id"=>$id))->getField($field);
	}
	if(!!$row){
		return $row;
	}else{
		return false;
	}
}

//URL跳转不弹窗,不填写，直接返回上一级
function GoUrl($url=''){
	if(empty($url)){
		echo '<script>history.go(-1);</script>';
	}else{
		echo '<script>location.replace("'.$url.'")</script>';
	}
	exit;
}

//发送邮件
/*
$reci 收件人email
$theme 邮件主题
$body= 邮件内容
$fromname 发送人称呼
返回true或false，
例子
require_once('data/phpmailer/class.phpmailer.php');
echo sendsEmail("2355866907@qq.com","111","22222");
*/
function sendsEmail($reci,$theme='',$body='',$fromname=''){
	$mail = new PHPMailer(); //建立邮件发送类
	$mail->IsSMTP(); // 使用SMTP方式发送
	$mail->CharSet='UTF-8';// 设置邮件的字符编码
	$mail->Host = C("cfg_mail_server"); // smtp设置
	$mail->Port = C("cfg_mail_port"); // 端口
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	$mail->Username = C("cfg_mail_user"); // 邮局用户名(请填写完整的email地址)
	$mail->Password = C("cfg_mail_password"); // 邮局密码
	$mail->From = C("cfg_mail_user"); //邮件发送者email地址
	$mail->FromName = $fromname;
	$mail->AddAddress($reci, "");  //收件人地址，收件人称呼
	$mail->Subject = $theme; //邮件标题
	$mail->IsHTML(true);
	$mail->Body = $body; //邮件内容
	if(!$mail->Send()){
		return false;
		//echo "错误原因: " . $mail->ErrorInfo;
		//exit;
	}else{
		return true;
	}
}

//Json存数据库转义 （用于考虑get_magic_quotes_gpc是否开启）
function jsonEscape($val){
	if(!!get_magic_quotes_gpc()){
		return addslashes($val);
	}else{
		return $val;
	}
}
?>