<?php 
class MemberModel extends Model{
	
	protected $_validate=array(
		
	);
	
	protected $_auto=array(
		array('password','pass_jm',1,'function'),
		array('regtime','time',1,'function'),
		array('regip','getip',1,'function'),
		array('logintime','time',1,'function'),
		array('loginip','getip',1,'function'),
	);
	
}

?>