<?php 

class IndexAction extends BaseAction{


	/**
	 * 首页
	 * @return [type] [description]
	 */
	function index(){
		$map1['pid'] = 57;   //Ceramics
		$map2['pid'] = 58;   //Sanitary ware
		$list1 = M("content")->where($map1)->select();
		$list2 = M("content")->where($map2)->select();
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->display();
		//header("location:".U("cn"));
	}


	/**
	 * 简介
	 * @return [type] [description]
	 */
	function catalog(){
		$map['pid'] = 53;   //Ceramics
		$id = I('id');
		if(!empty($id)){
			$maps['pid'] = $id;
			$list = M("content")->where($maps)->select();
		}else{
			$maps['path'] = array('like',"%53%");
			$list = M("content")->where($maps)->select();
		}
		$cate = M("category")->where($map)->select();
		$this->assign("list",$list);
		$this->assign("cate",$cate);
		$this->display();
	}

	function products(){
		$map1['pid'] = 57;   //Ceramics
		$map2['pid'] = 58;   //Sanitary ware
		$list1 = M("category")->where($map1)->select();
		$list2 = M("category")->where($map2)->select();
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->display();
	}

	function news(){
		$map['pid'] = 55;   //Ceramics
		$id = I('id');
		if(!empty($id)){
			$maps['pid'] = $id;
			$list = M("content")->where($maps)->select();
		}else{
			$maps['path'] = array('like',"%55%");
			$list = M("content")->where($maps)->select();
		}
		$cate = M("category")->where($map)->select();
		$this->assign("list",$list);
		$this->assign("cate",$cate);
		$this->display();
	}

	function company(){
		$this->display();
	}

}

?>