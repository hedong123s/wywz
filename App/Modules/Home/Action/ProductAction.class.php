<?php 

class ProductAction extends BaseAction{
	/**
	 * Ceramics
	 */
	function ceramics(){
		$map1['pid'] = 57;   //Ceramics
		$map2['pid'] = 58;   //Sanitary ware
		$list1 = M("category")->where($map1)->select();
		$list2 = M("category")->where($map2)->select();
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->display();
	} 

	/**
	 * Sanitary ware
	 */
	function sanitary(){
		$map1['pid'] = 57;   //Ceramics
		$map2['pid'] = 58;   //Sanitary ware
		$list1 = M("category")->where($map1)->select();
		$list2 = M("category")->where($map2)->select();
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->display();
	}

	function faucet(){
		$this->display();
	}

	function alist(){
		$id = I('id');
		$map['pid'] = $id;
		$res = M("content")->where($map)->select();
		$this->assign("list",$res);
		$this->display();
	}

	function blist(){
		$id = I('id');
		$map['pid'] = $id;
		$res = M("category")->field("id")->where($map)->select();
		$new = array();
		foreach ($res as $k => $v) {
			$new[] = $v['id'];			
		}
		$arr['pid']  = array('in',$new);
		$res = M("content")->where($arr)->select();
		$this->assign("list",$res);
		$this->display();
	}

	function b2list(){
		$id = I('id');
		$map['pid'] = $id;
		$res = M("content")->where($map)->select();
		$this->assign("list",$res);
		$this->display();
	}

	function adetail(){
		$id = I('id');
		$map['id'] = $id;
		$res = M("content")->where($map)->find();
		$this->assign("res",$res);
		$this->display();
	}

	function bdetail(){
		$id = I('id');
		$map['id'] = $id;
		$res = M("content")->where($map)->find();
		$this->assign("res",$res);
		$this->display();
	}




}
