<?php 
require_once('data/phpmailer/class.phpmailer.php');


function sendemail($from,$user,$pass,$theme='',$body='',$fromname='',$host='smtp.qq.com',$port='25'){
	
	$mail = new PHPMailer(); //建立邮件发送类
	$mail->IsSMTP(); // 使用SMTP方式发送
	$mail->CharSet='UTF-8';// 设置邮件的字符编码
	$mail->Host = $host; // smtp设置
	$mail->Port = $port; // 端口
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	$mail->Username = $user; // 邮局用户名(请填写完整的email地址)
	$mail->Password = $pass; // 邮局密码
	$mail->From = $user; //邮件发送者email地址
	$mail->FromName = $fromname;
	if(is_array($from)){
		foreach($from as $v){
			$mail->AddAddress($v, "");  //收件人地址，收件人称呼
		}
		
	}else{
		$mail->AddAddress($from, "");  //收件人地址，收件人称呼
	}
	
	$mail->Subject = $theme; //邮件标题
	$mail->IsHTML(true);
	$mail->Body = $body; //邮件内容
	if(!$mail->Send()){

		return false;
	
	}else{
		return true;
	}
}

?>