<?php 
class MemberAction extends BaseAction{

	function index(){
		$t=M('member');
		import('ORG.Util.Page2');
		$page = new Page($t->order("id desc")->count(),20);
		$this->assign('list',$t->order('id desc')->limit($page->firstRow.','.$page->listRows)->select());
		$this->assign('page',$page->show());
		$this->display();
	}

	function add(){		
		$this->display('edit');
	}
	
	function edit(){
		$t=M('member');
		$id=intval($_GET['id']);
		if($row=$t->where(array('id'=>$id))->find()){
			$this->assign('info',$row);
		}else{
			$this->msg('数据不存在',U('index'),1);
		}		
		
		$this->display();
	}
	
	
	function public_checkname_ajax(){
		$t=M('member');
		$username=trim($_GET['username']);
		$arr=array('admin','admin888');
		if(!$t->where(array('username'=>$username))->find() && !in_array(strtolower($username),$arr)){
			exit('1');
		}
		
	}
	
	
	function send(){
		$t=D('Member');
		if(empty($_POST['info']['password'])){
			unset($_POST['info']['password']);
		}else{
			$_POST['info']['password']=pass_jm($_POST['info']['password']);
		}
		if($row=$t->create($_POST['info'])){
			if($row['id']){
				$t->save();
				
				$this->msg('操作成功',U('index'));
				
			}else{
				$t->add();
				$this->msg('操作成功',U('index'));
			}
			
			
		}else{
			$this->msg($t->geterror(),'',1);
		}
	
	}
	
	//删除
	function del(){
		$t=M('member');
		$id=$_REQUEST['id'];
		if(is_array($id)){
			foreach($id as $v){
				
				$t->where(array('id'=>$v))->delete();
				
			}
		}else{
			$t->where(array('id'=>$id))->delete();
			
		}
		
		
		$this->msg('操作成功',U('index'));
	}
	
	
}
?>