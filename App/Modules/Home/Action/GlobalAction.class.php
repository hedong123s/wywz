<?php 
//非模版效果，通用
class GlobalAction extends BaseAction{	
	//验证码
	function verify(){
		import('ORG.Util.Image');
		ob_end_clean();
		Image::buildImageVerify();
	}
	
	//输出动态js,主要用于js内部调用动态连接
	/*前台引入方式<script src="<{:U('Global/javascript')}"></script>*/
	function javascript(){
		$config=array();   //格式："addCart"=>U('Cart/addCart'),  //加入购物车
		echo 'var config='.json_encode($config);
	}
}


?>