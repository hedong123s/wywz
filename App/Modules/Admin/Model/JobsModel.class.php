<?php 
class JobsModel extends Model{
	
	protected $_validate=array(
		
	);
	
	protected $_auto=array(
		array('posttime','time',1,'function'),
	);
	
}

?>