<?php
/*
@ 会员用户信息获取
author：Flc
creatdate：2014年6月19日 10:54:07
updatedate：2014年6月19日 10:54:15
*/
if(!isset($_SESSION))session_start();
//会员登录信息
$session_username=isset($_SESSION['account']['username'])?$_SESSION['account']['username']:"";
$session_time=isset($_SESSION['account']['logintime'])?$_SESSION['account']['logintime']:"";
$session_key=isset($_SESSION['account']['key'])?$_SESSION['account']['key']:"";

global $UID;
$UID=array(
	"check"=>"0",   //状态，1为已登录，其他登录失效
	"id"=>"",
	"username"=>""
);
if($session_username!=""&&md5($session_username.C('LOGIN_KEY').$session_time)==$session_key){
	$user=M("member");
	$row=$user->where(array("username"=>$session_username))->find();
	if(is_array($row)){
		$UID=$row;
		//用户登录状态
		if($UID['isauth']==1){
			$UID['check']=1;
		}else{
			unset($_SESSION['account']);
		}
	}
}else{
	unset($_SESSION['account']);
}
?>