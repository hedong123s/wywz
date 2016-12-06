<?php 

class AdsAction extends BaseAction{

	
	function index(){
		$id=intval($_GET['id']);
		$t=M('ad');
		if(empty($id)){
			$list=$t->order('orderid asc,id asc')->select();
		}else{
			$list=$t->where(array('cid'=>$id))->order('orderid asc,id asc')->select();
		}
		$this->assign('list',$list);
		$this->display();
	}
	
	
	function add(){
		$t=M('ad_type');
		$id=intval($_GET['id']);
		if(!$t->where(array('id'=>$id))->find()){
			$this->msg('数据不存在',U('category'),1);	
		}
		$this->display('edit');
	}
	
	function edit(){
		$t=M('ad');
		$id=intval($_GET['id']);
		if(!$row=$t->where(array('id'=>$id))->find()){
			$this->msg('数据不存在','',1);
		}
		$this->assign('info',$row);
		$this->display('edit');	
	}
	
	function send(){
		
		$t=D('Ad');
		if($row=$t->create($_POST['info'])){
		
			if($row['id']){
				$t->save();
				$this->msg('数据修改成功',U('index',array('id'=>$row['cid'])));
			}else{
				if($t->add()){
					$this->msg('数据添加成功',U('index',array('id'=>$row['cid'])));
				}else{
					$this->msg('数据添加失败',U('index',array('id'=>$row['cid'])),1);
				}
			}
		}else{
			$this->msg('数据创建失败',U('index',array('id'=>$row['cid'])),1);
		}	
	}
	
	
	function del(){
		$t=M('ad');
		$id=$_REQUEST['id'];
		if(empty($id)) $this->msg('数据不存在',U('index'),1);
		if(is_array($id)){
			foreach($id as $k=>$v){
				$t->where(array('id'=>intval($v)))->delete();
			}
		}else{
			$t->where(array('id'=>intval($id)))->delete();
		}
		$this->msg('操作成功',$_SERVER['HTTP_REFERER']);
	}
	
	
	/**************************************************类别操作**********************************************/
	function category(){
		
		$t=M('ad_type');
		
		$this->assign('list',$t->order("id asc")->select());
		$this->display();
	
	}
	
	function category_add(){
		
		
		$this->display('category_edit');
	}
	
	
	function category_edit(){
		$t=M('ad_type');
		$id=intval($_GET['id']);
		if($row=$t->where(array('id'=>$id))->find()){
			
			
			$this->assign('info',$row);
			
		}else{
			$this->msg('数据不存在',U('category'),1);
		}
		$this->display();
	}
	
	function category_send(){
		$t=M('ad_type');
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
		$t=M('ad_type');
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
	
	//排序
	function orderid(){
		$t=M('ad');
		$menuid=intval($_GET['menuid']);
		foreach($_POST['orderid'] as $key=>$v){
			$t->where(array('id'=>intval($key)))->data(array('orderid'=>intval($v)))->save();
		}
		$this->msg('操作成功',$_SERVER['HTTP_REFERER']);
	}
}


?>