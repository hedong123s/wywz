<?php 
class ContentModel extends Model{
	
	protected $_validate=array(
		//array('title','trim','请输入标题',0,'function'),
	);

	protected $_auto=array(
		array('checkinfo','checkinfo',3,'callback'),
		array('path','editpath',3,'callback'),
		array('posttime','time',1,'function'),
		array('updatetime','time',3,'function'),
		array('username','username',3,'callback'),
		array('flag','flag',3,'callback'),
	);

	
	function checkinfo(){
		if(empty($_POST['info']['checkinfo'])){
			return 0;
		}else{
			return 1;
		}
		
	} 
	
	function editpath(){
		$t=M('category');
		return $t->where(array('id'=>intval($_POST['info']['pid'])))->getfield('path');
	}

	function username(){
		return $_SESSION['admin_9f_username'];
	}	
	
	function flag(){
		return implode(',',$_POST['info']['flag']);
	}

}

?>