<?php 
class MessageAction extends BaseAction{

	function index(){
		$t=M('message');
		import('ORG.Util.Page2');
		$page = new Page($t->order("id DESC")->count(),20);
		
		$this->assign('list',$t->order('id desc')->limit($page->firstRow.','.$page->listRows)->select());
		$this->assign('page',$page->show());
		$this->display();
	}
	
	function edit(){
		$t=M('message');
		$id=intval($_REQUEST['id']);
		if(!$row=$t->where(array('id'=>$id))->find()){
			$this->msg('数据不存在',U('index'),1);
		}
		if(isset($_POST['send'])){
			 $_POST['info']['isshow']=empty($_POST['info']['isshow'])?0: $_POST['info']['isshow'];
			 $_POST['info']['checkinfo']=empty($_POST['info']['checkinfo'])?0: $_POST['info']['checkinfo'];
			if(!empty($_POST['info']['re_content'])) $_POST['info']['re_posttime']=time();
			
			if($row=$t->create($_POST['info'])){
				if($row['id']){
					$t->save();
					
				}else{
					//添加不操作
				}
			}else{
				$this->msg('数据创建失败',U('index'),1);
			}
			
			$this->msg('操作成功',U('index'),1);
		}else{
			$this->assign('info',$row);
			$this->display();
		}
		

	}
	
	
	
	
	function del(){
		$t=M('message');
		if(is_array($_REQUEST['id'])){
			
			foreach($_REQUEST['id'] as $v){
				$t->where(array('id'=>intval($v)))->delete();
			}
		
		}else{
			
			$t->where(array('id'=>intval($_REQUEST['id'])))->delete();
		}
		
		$t->where(array('id'=>$id))->delete();
		$this->msg('删除成功',U('index'));
	}

}

?>