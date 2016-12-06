<?php 
class ShopcategoryModel extends Model{
	
	protected $_validate=array(
		//array('classname','trim','请输入栏目名称',1,'function'),
	);

	protected $_auto=array(
		array('classname','trim',3,'function'),
		array('checkinfo','checkinfo',3,'callback'),
		array('flag','flag',3,'callback'),
	);
	 
	
	function checkinfo(){
		if(empty($_POST['checkinfo'])){
			return '0';
		}else{
			return '1';
		}
		
	}
	
	function flag(){
		$flag=$_POST['flag'];
		if(is_array($flag)){
			return implode(",",$flag);
		}else{
			return '';
		}
	}

}

?>