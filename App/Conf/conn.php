<?php 

$type='';
if(empty($type)){
	return array(
		//数据库配置信息
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'wywz', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => '', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => '9f_', // 数据库表前缀 
	);
	
}else{
	return array(
		//数据库配置信息
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'fuding', // 数据库名
		'DB_USER'   => 'fuding', // 用户名
		'DB_PWD'    => 'fuding1205', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => '9f_', // 数据库表前缀 
	);
	
}	



?>