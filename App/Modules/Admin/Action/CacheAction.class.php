<?php 
class CacheAction extends BaseAction{

	function index(){
		import("ORG.Util.Dir");
		$dir = new Dir;
		@unlink(RUNTIME_PATH.'~runtime.php');
		if(is_dir(RUNTIME_PATH.'Cache')){
			$dir->delDir(RUNTIME_PATH.'Cache');
		}
		if(is_dir(RUNTIME_PATH.'Data')){
			$dir->delDir(RUNTIME_PATH.'Data');
		}
		if(is_dir(RUNTIME_PATH.'Logs')){
			$dir->delDir(RUNTIME_PATH.'Logs');
		}
		if(is_dir(RUNTIME_PATH.'Temp')){
			$dir->delDir(RUNTIME_PATH.'Temp');
		}	
	}


	function del_cache(){
		$this->index();
		$this->success('缓存清除成功',U('Index/main'));
	}

}

?>