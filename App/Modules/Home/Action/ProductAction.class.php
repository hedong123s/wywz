<?php 

class ProductAction extends BaseAction{
	/**
	 * Ceramics
	 */
	function ceramics(){
		$map1['pid'] = 57;   //Ceramics
		$map2['pid'] = 58;   //Sanitary ware
		$list1 = M("category")->order(array("orderid"=>"asc"))->where($map1)->select();
		$list2 = M("category")->order(array("orderid"=>"asc"))->where($map2)->select();
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
		$list1 = M("category")->order(array("orderid"=>"asc"))->where($map1)->select();
		$list2 = M("category")->order(array("orderid"=>"asc"))->where($map2)->select();
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
		$res = M("content")->order(array("orderid"=>"asc"))->where($map)->select();
		$this->assign("list",$res);
		$this->display();
	}

	function blist(){
		$id = I('id');
		$map['pid'] = $id;
		$res = M("category")->order(array("orderid"=>"asc"))->field("id")->where($map)->select();
		$new = array();
		foreach ($res as $k => $v) {
			$maps['pid'] = $v['id'];
			$r = M("category")->order(array("orderid"=>"asc"))->field("id")->where($maps)->select();
			if($r){
				foreach ($r as $key => $value) {
					$new[] = $value['id'];
				}
			}else{}
			$new[] = $v['id'];			
		}
		$arr['pid']  = array('in',$new);
		if($id == 72){
			$arr['pid'] = 72;
		}
		$res = M("content")->order(array("orderid"=>"asc"))->where($arr)->select();
		$this->assign("list",$res);
		$this->display();
	}

	function b2list(){
		$id = I('id');
		$map['pid'] = $id;
		$r = M("category")->order(array("orderid"=>"asc"))->field("id")->where($map)->select();
		if($r){
			foreach ($r as $key => $value) {
				$new[] = $value['id'];
			}
			$map['pid']  = array('in',$new);
		}
		$res = M("content")->order(array("orderid"=>"asc"))->where($map)->select();
		$this->assign("list",$res);
		$this->display();
	}

	function adetail(){
		$id = I('id');
		$map['id'] = $id;
		$res = M("content")->order(array("orderid"=>"asc"))->where($map)->find();
		$this->assign("res",$res);
		$this->display();
	}

	function bdetail(){
		$id = I('id');
		$map['id'] = $id;
		$res = M("content")->order(array("orderid"=>"asc"))->where($map)->find();
		$this->assign("res",$res);
		$this->display();
	}




}
