<?php 

class AdminManageAction extends BaseAction{
	
	//管理员列表
	function index(){
		
		$t=M('admin');
		$row=$t->order('userid asc')->select();
		$this->assign('list',$row);
		$this->display();
		
	}
	
	//个人信息
	function public_edit_info(){
		
		$t=M('admin');
		if(isset($_POST['send'])){
			$data['realname']=$this->_post('realname','escape');
			$data['email']=$this->_post('email','escape');
			$t->where(array('userid'=>$_SESSION['admin_9f_id']))->data($data)->save();
			$this->msg('操作成功',U('public_edit_info'));
			
		}else{
			if($row=$t->where(array('userid'=>$_SESSION['admin_9f_id']))->find()){
				
				$this->assign('data',$row);

			}
			$this->display();
		}

	}

	//修改密码
	function public_edit_pwd(){
			
		$t=M('admin');
		if(isset($_POST['send'])){

				if($t->where(array('userid'=>$_SESSION['admin_9f_id'],'password'=>pass_encrypt($_POST['old_password'])))->find()){
					$t->where(array('userid'=>$_SESSION['admin_9f_id']))->data(array('password'=>pass_encrypt($_POST['password'])))->save();
					$this->msg('密码修改成功,请重新登陆',U('Login/index'));
				}else{
					$this->msg('输入的旧密码不正确',U('public_edit_pwd'),'',1);
				}
				
		}else{
		
			if($row=$t->where(array('userid'=>$_SESSION['admin_9f_id']))->find()){
				
				$this->assign('data',$row);

			}
			$this->display();
		}
	
	}
	
	//添加
	function add(){
		if(isset($_POST['send'])){
				
			$t=D('Admin');
			if($t->create()){
				$t->lastloginip=getip();
				$t->lastlogintime=time();
				$t->posttime=time();
				$t->add();
				$this->msg('管理员添加成功',U('index'));
			}else{
				$this->msg($t->GetError(),'',1);
			
			}
				
		}else{
			$data['userid']='';
			$data['email']='';
			$data['realname']='';
			$this->assign('data',$data);
			$this->display('edit');
		}

	}
	
	//编辑
	function edit(){
		if(isset($_POST['send'])){
			$t=M('Admin');
			$userid=intval($_POST['userid']);	
			$password=$_POST['password'];
			$data['realname']=trim($_POST['realname']);
			$data['email']=trim($_POST['email']);
			if($password!=''){
				$data['password']=pass_encrypt($password);
			}
			$t->where(array('userid'=>$userid))->data($data)->save();
			$this->msg('管理员修改成功',U('index'));
			
		}else{
			
			$t=M('admin');
			$id=intval($_GET['id']);
			
			if($row=$t->where(array('userid'=>$id))->find()){
				
				$this->assign('data',$row);
			}else{
				$this->msg('此管理员不存在',U('index'));
			}
			$this->display();
		}
	
		
	}
	
	//删除
	function del(){
	
		$t=M('admin');
		$id=intval($_GET['id']);
		if($id==1){
			$this->msg('此管理员不能删除',U('index'));
		}else{
			$t->where(array('userid'=>$id))->delete();
			$this->msg('删除成功',U('index'));
		}
		
	}
	

	
	function public_checkname_ajax(){
		
		$t=M('admin');
		$username=trim($_GET['username']);
		if(!$t->where(array('username'=>$username))->find()){
			exit('1');
		}
		
		
	}
	

	
}


?>