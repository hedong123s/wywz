<?php 

class IndexAction extends BaseAction{


	/**
	 * 首页
	 * @return [type] [description]
	 */
	function index(){
		$map1['pid'] = 57;   //Ceramics
		$map2['pid'] = 58;   //Sanitary ware
		$map['cid'] = 1;
		$ads = M('ad')->where($map)->select();
		$list1 = M("category")->where($map1)->order(array("orderid"=>"asc"))->select();
		$list2 = M("category")->where($map2)->order(array("orderid"=>"asc"))->select();
		$this->assign("ads",$ads);
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
		$map['pid'] = 53;   //news
		$id = I('id');
		if($id){
			$maps['pid'] = $id;
		}else{
			$maps['path'] = array('like','0,53%');
		}
		$count  = M('content')->where($maps)->count();// 查询满足要求的总记录数
		import('ORG.Util.Page');// 导入分页类
		$Page   = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show   = $Page->show();// 分页显示输出
		$list = M("content")->order(array("orderid"=>"asc"))->where($maps)->limit($Page->firstRow.','.$Page->listRows)->select();
		$cate = M("category")->where($map)->select();
		$this->assign("list",$list);
		$this->assign("cate",$cate);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	function products(){
		$map1['pid'] = 57;   //Ceramics
		$map2['pid'] = 58;   //Sanitary ware
		$list1 = M("category")->order(array("orderid"=>"asc"))->where($map1)->select();
		$list2 = M("category")->order(array("orderid"=>"asc"))->where($map2)->select();
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->display();
	}

	function news(){
		$map['pid'] = 55;   //news
		$id = I('id');
		if($id){
			$maps['pid'] = $id;
		}else{
			$maps['path'] = array('like','0,55%');
		}
		$count  = M('content')->where($maps)->count();// 查询满足要求的总记录数
		import('ORG.Util.Page');// 导入分页类
		$Page   = new Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show   = $Page->show();// 分页显示输出


		$list = M("content")->order(array("orderid"=>"asc"))->where($maps)->limit($Page->firstRow.','.$Page->listRows)->select();
		$cate = M("category")->order(array("orderid"=>"asc"))->where($map)->select();
		$this->assign("list",$list);
		$this->assign("cate",$cate);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	function company(){
		$this->display();
	}

	function history(){
		$this->display();
	}

	function search(){
		$keyword = I('k');
		$map['title'] = array('like',"%$keyword%");
		$list = M("content")->order(array("orderid"=>"asc"))->where($map)->limit(8)->select();
		$this->assign("list",$list);
		$this->display();
	}

	function content(){
		$id = I('id');
		$map['id'] = $id;
		$list = M("category")->where($map)->find();
		$this->assign("r",$list);
		$this->display();
	}

}

?>