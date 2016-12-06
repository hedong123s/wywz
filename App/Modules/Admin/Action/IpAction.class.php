<?php 
class IpAction extends BaseAction{

	function index(){
		$t=M('ip');
		if(isset($_POST['send'])){
			$content=trim($_POST['info']['content']);
			if($t->find()){
					$t->data(array('content'=>$content))->where(array('id'=>array('neq','')))->save();
			}else{
					$t->data(array('content'=>$content))->add();
			}
			$this->msg('操作成功',U('index'));
		}else{
			$this->assign('data',$t->find());
			$this->display();
		}
		

	}


}

?>