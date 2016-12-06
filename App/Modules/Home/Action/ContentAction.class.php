<?php 

class ContentAction extends BaseAction{
	
	//列表页(如为单页，同为列表页)
	function lists(){
		$db=M("category");
		$cid=intval($_GET['cid']);  //获取栏目ID
		if($r=$db->where(array("id"=>$cid,"checkinfo"=>0))->find()){
			$categoryArray=$r;
		}else{
			showMsg("参数错误");
			exit;
		}
		
		//跳转
		if($categoryArray['url']!='') $this->goUrl($categoryArray['url']);
		
		$topClass=$this->getTopClass($categoryArray['path']);//获取顶级栏目信息
		$this->getMenuArray($topClass);  //获取左侧菜单
		$this->getNavId($topClass['id'],$cid);  //获取NavID
		
		$this->assign("cid",$cid);  //栏目ID
		$this->assign('categoryArray',$categoryArray);  //栏目数据信息
		$this->display($this->tpl($categoryArray['list_template']));
	}
	
	//显示页
	function show(){
		$db=M("content");
		$catdb=M("category");
		$id=intval($_GET['id']);  //获取ID
		//查询内容信息
		if($r=$db->where(array("id"=>$id,"checkinfo"=>0))->find()){
			$contentArray=$r;
			$cid=$r['pid'];
			//$db->where(array("id"=>$id,"checkinfo"=>0))->setinc("hits",1);  //更新点击量
		}else{
			showMsg("参数错误");
			exit;
		}
		
		//跳转
		if($contentArray['url']!='') $this->goUrl($contentArray['url']);
		
		//查询栏目信息
		if($r=$catdb->where(array("id"=>$cid,"checkinfo"=>0))->find()){
			$categoryArray=$r;
		}else{
			showMsg("参数错误");
			exit;
		}
		
		$topClass=$this->getTopClass($categoryArray['path']);//获取顶级栏目信息
		$this->getMenuArray($topClass);  //获取左侧菜单
		$this->getNavId($topClass['id'],$cid);  //获取NavID
		
		
		$this->assign("id",$id);  //内容ID
		$this->assign("cid",$cid);  //栏目ID
		$this->assign('contentArray',$contentArray);  //内容数据信息
		$this->assign('categoryArray',$categoryArray);  //栏目数据信息
		$this->display($this->tpl($categoryArray['show_template']));
	}
	
	//点击量
	function getShowHits(){
		$db=M("content");
		$id=intval($_GET['id']);  //获取ID
		//查询内容信息
		if($r=$db->field('hits')->where(array("id"=>$id,"checkinfo"=>0))->find()){
			$db->where(array("id"=>$id,"checkinfo"=>0))->setinc("hits",1);  //更新点击量
		}else{
			echo 'document.write("1")';
		}
		echo 'document.write("'.$r['hits'].'")';		
	}
	
	//获取顶级ID信息，返回数组信息
	function getTopClass($path){
		$db=M("category");
		$array=array();
		if($path!=''){
			$pathArr=explode(",",$path);
			if(isset($pathArr[1]) && $pathArr[1]!='' && is_numeric($pathArr[1])){
				if($r=$db->where(array("id"=>intval($pathArr[1]),"checinfo"=>0))->find()){
					$array=$r;
				}
			}
		}
		$this->assign('topClassArray',$array);  //顶级栏目数据信息
		return $array;
	}
	
	//获取栏目左侧子分类 
	function getMenuArray($topClass){
		$db=M("category");
		$array=array();
		if($r=$db->where(array("pid"=>$topClass['id'],"checkinfo"=>0))->order("orderid asc,id asc")->select()){
			$array=$r;
		}else{
			$array[]=$topClass;
		}
		$this->assign('ClassMenuArray',$array);  //顶级栏目数据信息
		return $array;
	}
	
	//获取navID($topId,父级顶级ID；cid为当前栏目ID)
	function getNavId($topId,$cid){
		$navId=0;
		$aboutBanner='';
		switch($topId){
			//英文
			case 1:
				$navId=2;
				$aboutBanner="__PUBLIC__/en/images/banner/2.jpg";
				break;
			case 2:
				$navId=3;
				$aboutBanner="__PUBLIC__/en/images/banner/3.jpg";
				break;
			case 3:
				$navId=4;
				$aboutBanner="__PUBLIC__/en/images/banner/4.jpg";
				break;
			case 4:
				$navId=5;
				$aboutBanner="__PUBLIC__/en/images/banner/5.jpg";
				break;
			case 5:
				$navId=6;
				$aboutBanner="__PUBLIC__/en/images/banner/6.jpg";
				break;
			//中文
			case 11:
				$navId=2;
				$aboutBanner="__PUBLIC__/cn/images/banner/2.jpg";
				break;
			case 12:
				$navId=3;
				$aboutBanner="__PUBLIC__/cn/images/banner/3.jpg";
				break;
			case 13:
				$navId=4;
				$aboutBanner="__PUBLIC__/cn/images/banner/4.jpg";
				break;
			case 14:
				$navId=5;
				$aboutBanner="__PUBLIC__/cn/images/banner/5.jpg";
				break;
			case 15:
				$navId=6;
				$aboutBanner="__PUBLIC__/cn/images/banner/6.jpg";
				break;
		}
		//联系我们
		if($cid==10){
			$navId=7;
			$aboutBanner="__PUBLIC__/en/images/banner/7.jpg";
		}
		if($cid==20){
			$navId=7;
			$aboutBanner="__PUBLIC__/cn/images/banner/7.jpg";
		}
		
		$this->assign("navId",$navId);   //导航样式ID
		$this->assign("aboutBanner",$aboutBanner);   //导航样式ID
		return $navId;
	}
}


?>