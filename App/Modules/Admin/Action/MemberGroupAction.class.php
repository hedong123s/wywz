<?php 

class MemberGroupAction extends BaseAction{

	function index(){
		$t=M('member_group');
		$c=M('member');
		$row=$t->order("id asc")->select();
		foreach($row as $key=>$v){
			$row[$key]['member_count']=$c->where(array('group_id'=>$v['id']))->count();
		}
		$this->assign('list',$row);	
		$this->display();
	}

	//添加栏目
	function add(){

		$this->display('edit');	

	}



	//编辑
	function edit(){
	
		
		$t=M('member_group');
		$id=intval($this->_get('id'));
		if(!$row=$t->where(array('id'=>$id))->find()){
			$this->msg('数据不存在',U('index'),1);
		}

		$this->assign('data',$row);
		$this->display();
		

	}






	//删除
	function del(){
		$t=M('member_group');
		$c=M('content');
		$id=$_REQUEST['id'];
		if(is_array($id)){
			foreach($id as $v){
				if($v == 1) continue;
				$t->where(array('id'=>$v))->delete();
				
			}
		}else{
			if($id != 1){
				$t->where(array('id'=>$id))->delete();
			}
			
			
		}
		
		
		$this->msg('操作成功',U('index'));
	}

	function send(){
		$t=M('member_group');
		$_POST['info']['checkinfo']=empty($_POST['info']['checkinfo'])?'0':'1';
		if($row=$t->create($_POST['info'])){
		
			if($row['id']){
				
				$t->save();
				$this->msg('操作成功',U('index'));
				
			}else{
				if($t->add()){
					$this->msg('操作成功',U('index'));
				}else{
					$this->msg('操作失败',U('index'),1);
				}
				
			}
			
			
		}else{
			$this->msg($t->geterror(),'',1);
		}
	}
	
	
	function checkinfo(){
		$t=M('member_group');
		$id=intval($this->_get('id'));

		if($t->where(array('id'=>$id))->getfield('checkinfo')==0){
			$t->where(array('id'=>$id))->data(array('checkinfo'=>1))->save();
		}else{
			$t->where(array('id'=>$id))->data(array('checkinfo'=>0))->save();
		}
		$this->msg('操作成功',U('index'));
	}

	function orderid(){
		$t=M('member_group');
		foreach($_POST['orderid'] as $key=>$v){
			$t->where(array('id'=>intval($key)))->data(array('orderid'=>intval($v)))->save();
		}
		$this->msg('操作成功',U('index'));
	}
	
	
}







?>