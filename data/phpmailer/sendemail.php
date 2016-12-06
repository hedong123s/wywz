<?php 
require_once('data/phpmailer/class.phpmailer.php');


function sendemail($from,$user,$pass,$theme='',$body='',$fromname='',$host='smtp.qq.com',$port='25'){
	
	$mail = new PHPMailer(); //�����ʼ�������
	$mail->IsSMTP(); // ʹ��SMTP��ʽ����
	$mail->CharSet='UTF-8';// �����ʼ����ַ�����
	$mail->Host = $host; // smtp����
	$mail->Port = $port; // �˿�
	$mail->SMTPAuth = true; // ����SMTP��֤����
	$mail->Username = $user; // �ʾ��û���(����д������email��ַ)
	$mail->Password = $pass; // �ʾ�����
	$mail->From = $user; //�ʼ�������email��ַ
	$mail->FromName = $fromname;
	if(is_array($from)){
		foreach($from as $v){
			$mail->AddAddress($v, "");  //�ռ��˵�ַ���ռ��˳ƺ�
		}
		
	}else{
		$mail->AddAddress($from, "");  //�ռ��˵�ַ���ռ��˳ƺ�
	}
	
	$mail->Subject = $theme; //�ʼ�����
	$mail->IsHTML(true);
	$mail->Body = $body; //�ʼ�����
	if(!$mail->Send()){

		return false;
	
	}else{
		return true;
	}
}

?>