<?php 

class LoginAction extends Action{

	
	function index(){

		$this->display();
	}
	
	function logout(){
		
		unset($_SESSION['admin_9f_id']);
		unset($_SESSION['admin_9f_username']);
		unset($_SESSION['admin_9f_key']);
		unset($_SESSION['admin_9f_lastloginip']);
		unset($_SESSION['admin_9f_lastlogintime']);
		header('Location:'.U('Admin/Login/index'));
	}
	
	
	function ajaxlogin(){
		$t=M('admin');
		$data['username']=trim($_POST['username']);
		$data['password']=pass_encrypt($_POST['password']);

		$code=trim($_POST['code']);

		if(strtolower(md5($code))!=strtolower($_SESSION['meverify'])){
			exit('1');
		}

		if($row=$t->where($data)->find()){
			$savedata['lastloginip']=getip();
			$savedata['lastlogintime']=time();
			$t->where($data)->data($savedata)->save();
			$t->where($data)->setinc('loginnum',1);
			$_SESSION['admin_9f_id']=$row['userid'];
			$_SESSION['admin_9f_username']=$data['username'];
			$_SESSION['admin_9f_key']=md5(md5($data['username'].$row['password'])); 
			$_SESSION['admin_9f_lastloginip']=$row['lastloginip'];
			$_SESSION['admin_9f_lastlogintime']=$row['lastlogintime'];
			echo '0';
		}
	}
	
	function verify(){
		import('ORG.Util.Image');
		ob_end_clean();
		Image::buildImageVerify();
	}	
	
}


?>