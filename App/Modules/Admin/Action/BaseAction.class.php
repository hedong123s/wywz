<?php 
class BaseAction extends Action{

	function _initialize() {
		
		header ( "Content-Type:text/html; charset=UTF-8" );
		error_reporting(0);
		
		//验证登陆信息
		if(isset($_SESSION['admin_9f_id']) && isset($_SESSION['admin_9f_username']) && isset($_SESSION['admin_9f_key']) && isset($_SESSION['admin_9f_lastloginip']) && isset($_SESSION['admin_9f_lastlogintime'])){
			
			$v=M('admin');
			
			$vdata['userid']=$_SESSION['admin_9f_id'];
			$vdata['username']=$_SESSION['admin_9f_username'];
		
			if($vrow=$v->where($vdata)->find()){
				if($_SESSION['admin_9f_key']!=md5(md5($vrow['username'].$vrow['password']))){
					$this->error('登陆信息不正确，请重新登陆',U('Login/index'));
				}
				
			}else{
				$this->error('登陆信息不正确，请重新登陆',U('Login/index'));
			}
	
		}else{
			
			header('location:'.U('Login/index'));
		}

	}

	
	//提示
	function msg($text='',$url='',$type='0'){

		echo '<script src="'.APP_PATH.'Modules/Admin/Tpl/js/jquery.js"></script>';
		echo '<script src="'.APP_PATH.'Modules/Admin/Tpl/js/base.js"></script>';
		echo '<script>sys_alert("'.$text.'",'.$type.');location.replace("'.$url.'")</script>';
		exit();
	}
	
	
	//空操作
	function _empty(){
		
	}
	

}


?>
