<?php 

class LinkageAction extends BaseAction{

	function index(){
		$t=M('linkage');
			$id=intval($_GET['id']);
		if(empty($id)){
			$row=$t->order("id asc")->where(array('pid'=>0))->select();
		}else{
			$row=$t->where(array('pid'=>$id))->order("orderid asc,id asc")->select();
		}	
		
		
		$this->assign('list',$row);	
		$this->display();
	}

	//添加栏目
	function add(){
	
		
		if(isset($_GET['id'])){
			$t=M('linkage');
			$id=intval($this->_get('id'));
			if(!$row=$t->where(array('id'=>$id))->find()){
				$this->msg('菜单不存在',U('index'),1);
			}
			$row['upclassname']=$row['classname'];
			$row['id']='';
			$row['pid']=$id;
			$row['classname']='';
			$row['description']='';
		}
		
		$this->assign('data',$row);
		$this->display('edit');	
		
	}




	//编辑
	function edit(){
		$t=M('linkage');
		$id=intval($this->_get('id'));
		if(!$row=$t->where(array('id'=>$id))->find()){
			$this->msg('菜单不存在',U('index'),1);
		}
		$row['upclassname']=$t->where(array('id'=>$row['pid']))->getfield('classname');
		$this->assign('data',$row);
		$this->display();
	}




	//审核
	function checkinfo(){
		$t=M('category');
		$id=intval($this->_get('id'));
		if($t->where(array('id'=>$id))->getfield('checkinfo')==0){
			$t->where(array('id'=>$id))->data(array('checkinfo'=>1))->save();
		}else{
			$t->where(array('id'=>$id))->data(array('checkinfo'=>0))->save();
		}
		$this->msg('操作成功',U('index'));
	}

	//删除
	function del(){
		$t=M('linkage');
		$id=$_REQUEST['id'];
		if(is_array($id)){
			foreach($id as $v){
				
			$t->where(array('pid'=>$v))->delete();
			$t->where(array('id'=>$v))->delete();
			}
		}else{
			$t->where(array('pid'=>$id))->delete();
			$t->where(array('id'=>$id))->delete();
		}
		
		
		$this->msg('操作成功',U('index'));
	}

	


	//排序
	function orderid(){
		$t=M('category');
	
		foreach($_POST['orderid'] as $key=>$v){
			$t->where(array('id'=>intval($key)))->data(array('orderid'=>intval($v)))->save();
		}
		$this->msg('操作成功',U('index'));
	
	}
	
	
	function send(){
		
		$t=M('linkage');
		if($row=$t->create()){
			if($row['id']){
				$t->save();
				$this->msg('操作成功',U('index',array('id'=>$row['pid'])));
			}else{
				if($t->add()){
					$this->msg('操作成功',U('index',array('id'=>$row['pid'])));
				}else{
					$this->msg('操作失败',U('index'),1);
				}
			}
			
		}else{
			$this->msg($t->geterror(),'',1);
		
		}
	
	}


	


}







?>