<?php 
class AdModel extends Model{
	
	protected $_validate=array(
		//array('classname','trim','请输入栏目名称',1,'function'),
	);

	protected $_auto=array(
		array('checkinfo','checkinfo',3,'callback'),
		array('posttime','time',1,'function'),
	);
	 
	function checkinfo(){
		if(empty($_POST['info']['checkinfo'])){
			return 0;
		}else{
			return 1;
		}
		
	} 


}

?>