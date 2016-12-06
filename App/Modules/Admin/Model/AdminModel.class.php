<?php 
class AdminModel extends Model{
	
	protected $_validate=array(
		array('username','/\w$/','用户名非法！请使用0-9a-zA-Z_内的字符！',1),
	);
	
	protected $_auto=array(
		array('password','pass_encrypt','','function'),
	);
	
}

?>