<?php 
class CategoryModel extends Model{
	
	protected $_validate=array(
		//array('classname','trim','请输入栏目名称',1,'function'),
	);

	protected $_auto=array(
		array('classname','trim',3,'function'),
		array('navshow','navshow',3,'callback'),
		array('checkinfo','checkinfo',3,'callback'),
		array('path','editpath',2,'callback'),
		array('flag','flag',3,'callback'),
	);
	
	 function navshow(){
		if($_POST['navshow']==''){
			return '0';
		}else{
			return '1';
		}
		
	} 	 
	
	function checkinfo(){
		if(empty($_POST['checkinfo'])){
			return '0';
		}else{
			return '1';
		}
		
	} 
	
	function editpath(){
		$t=M('category');
		$onerow=$t->where(array('id'=>intval($_POST['pid'])))->find();
		if(empty($_POST['pid'])){
			return '0,'.intval($_POST['id']).',';
		}else{


			return $onerow['path'].intval($_POST['id']).',';
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