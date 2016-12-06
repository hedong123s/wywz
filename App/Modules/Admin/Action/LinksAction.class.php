<?php 
class LinksAction extends BaseAction{

	function index(){
		$t=M('link');
		import('ORG.Util.Page2');
		$page = new Page($t->order("orderid asc,id asc")->count(),20);
		$this->assign('list',$t->order('orderid asc,id asc')->limit($page->firstRow.','.$page->listRows)->select());
		$this->assign('page',$page->show());
		$this->display();
	}

	function add(){
		$this->display('edit');
	}

	function edit(){
		$t=M('link');
		$id=intval($_GET['id']);
		if(!$row=$t->where(array('id'=>$id))->find()){
			$this->msg('数据不存在','',1);
		}
		$this->assign('info',$row);
		$this->display();
	}
	
	function orderid(){
		$t=M('link');
		$orderid=$_POST['orderid'];
	
		foreach($orderid as $key=>$v){
			
			$t->where(array('id'=>$key))->data(array('orderid'=>$v))->save();
			
		}
		$this->msg('操作成功',U('index'));
	}
	
	


	function del(){
		$t=M('link');
		$id=$_REQUEST['id'];
		if(is_array($id)){
			foreach($id as $v){
				$t->where(array('id'=>intval($v)))->delete();
			}
		}else{
				$t->where(array('id'=>intval($id)))->delete();
		}
		
		$this->msg('删除成功',U('index'));
	}
	
	
	

	function send(){
		$t=M('link');
		$_POST['info']['checkinfo']=empty($_POST['info']['checkinfo'])?'0':$_POST['info']['checkinfo'];
		if($row=$t->create($_POST['info'])){
			if($row['id']){
				$t->save();
			$this->msg('数据修改成功',U('index'));
			}else{
				if($t->add()){
					$this->msg('数据添加成功',U('index'));
				}else{
					$this->msg('数据添加失败','',1);
				}
			}
		}else{
			$this->msg('数据创建失败','',1);
		}
	}

/**************************************************类别操作**********************************************/
	function category(){
		
		$t=M('link_type');
		
		$this->assign('list',$t->order("id asc")->select());
		$this->display();
	
	}
	
	function category_add(){
		
		
		$this->display('category_edit');
	}
	
	
	function category_edit(){
		$t=M('link_type');
		$id=intval($_GET['id']);
		if($row=$t->where(array('id'=>$id))->find()){
			
			
			$this->assign('info',$row);
			
		}else{
			$this->msg('数据不存在',U('category'),1);
		}
		$this->display();
	}
	
	function category_send(){
		$t=M('link_type');
		if($row=$t->create($_POST['info'])){
			if($row['id']){
				$t->save();
			$this->msg('数据修改成功',U('category'));
			}else{
				if($t->add()){
					$this->msg('数据添加成功',U('category'));
				}else{
					$this->msg('数据添加失败',U('category'),1);
				}
			}
		}else{
			$this->msg('数据创建失败',U('category'),1);
		}	
	}
	
	
	function category_del(){
		$t=M('link_type');
		$a=M('ad');
		$id=$_REQUEST['id'];
	
		if(is_array($id)){
			foreach($id as $v){
				$t->where(array('id'=>intval($v)))->delete();
				$a->where(array('cid'=>intval($v)))->delete();
			}
		}else{
				$t->where(array('id'=>intval($id)))->delete();
				$a->where(array('cid'=>intval($id)))->delete();
		}
		
		$this->msg('操作成功',U('category'));
	}
	
	
}
?>