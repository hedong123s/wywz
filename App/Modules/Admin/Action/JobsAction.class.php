<?php 
class JobsAction extends BaseAction{

	function index(){
		$t=M('jobs');
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
		$t=M('jobs');
		$id=intval($_GET['id']);
		if($row=$t->where(array('id'=>$id))->find()){
			
			$this->assign('info',$row);
		}else{
			$this->msg('数据不存在',U('index'),1);
		}		
		
		$this->display();
	}

	
	function send(){
		$t=D('Jobs');
	
		if($row=$t->create($_POST['info'])){
			if($row['id']){
				$t->save();
	
			}else{
				$t->add();
				
			}
			$this->msg('操作成功',U('index'));
			
		}else{
			$this->msg($t->geterror(),U('index'),1);
		}
	
	}
	
	//删除
	function del(){
		$t=M('jobs');
		$m=M('mjobs');
		$id=$_REQUEST['id'];
		if(is_array($id)){
			foreach($id as $v){
				
				$t->where(array('id'=>$v))->delete();
				$m->where(array('pid'=>$v))->delete();
				
			}
		}else{
			$t->where(array('id'=>$id))->delete();
			$m->where(array('pid'=>$id))->delete();
		}
		
		
		$this->msg('操作成功',U('index'));
	}
	
	
	/********************************应聘********************************/
	
	
	function message(){
	
		$t=M('jobs');
		$m=M('mjobs');
		$id=intval($_GET['id']);
		if(!$row=$t->where(array('id'=>$id))->find()){
			$this->msg('数据不存在',U('index'),1);
		}
		import('ORG.Util.Page2');
		$page = new Page($t->order("id desc")->count(),20);
		$this->assign('list',$m->where(array('pid'=>$id))->limit($page->firstRow.','.$page->listRows)->order("id desc")->select());
		$this->assign('data',$row);
		
		$this->display();
	}
	
	
	
	
	
	//删除
	function mdel(){
		$t=M('mjobs');

		$id=$_REQUEST['id'];
	
		if(is_array($id)){
			foreach($id as $v){
				$pid=$t->where(array('id'=>$v))->getfield('pid');
				$t->where(array('id'=>$v))->delete();
				
				
			}
		}else{
			$pid=$t->where(array('id'=>$id))->getfield('pid');
			$t->where(array('id'=>$id))->delete();
			
		}
		
		
		$this->msg('操作成功',U('message',array('id'=>$pid)));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>