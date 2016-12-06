<?php 
	class BaseAction extends Action{
		
		function _initialize() {
			header ( "Content-Type:text/html; charset=UTF-8" );
			
			//网站是否启用
			if(C('cfg_webswitch')=='N'){
				exit(c('cfg_switchshow'));
			}
			
			//是否启用动态或静态
			if(C('cfg_runmode')==1){
				C('HTML_CACHE_ON',true);
			}else{
				C('HTML_CACHE_ON',false);
			}
			
			//IP禁止访问
			$ip_list=M('ip')->getfield('content');
			$ip_arr=explode("\r\n",trim($ip_list));
			if(is_array($ip_arr)){
				if(in_array(getip(),$ip_arr)){
					exit(getip().'IP禁止访问本站');
				}
			}
			
			//用户数据全局
			global $UID;
			$this->assign("UID",$UID);
		
		}
		
		
		//跳转,如果生成静态页,必须用此调转
		function goUrl($url){  //{:ROOT}
			$url=str_replace('{:ROOT}',__ROOT__."/",$url);	  //URL替换		
			$tpl='<script>location.replace("'.$url.'")</script>';
			$this->assign("info",$tpl);
			$this->display(APP_PATH.'ThinkPHP/Tpl/Public_url.html');
			exit;
		}
		
		//模板文件名
		/*
		$tplname 模版文件名含后缀
		返回不带后缀的文件名
		*/
		function tpl($tplname){
			$tplarr=explode('.',$tplname);
			if(empty($tplname)){
				exit('模板不能为空，请选择模板！');
			}else{
				if(!file_exists(APP_PATH.'Modules/Home/Tpl/default/'.$tplname)){
				echo $tplname.'模板不存在！';
				exit();
				}
			}
			return '/'.$tplarr[0];
			
		}
		
		function _empty(){
			echo 'Action does not exist.';
		}
	}
?>