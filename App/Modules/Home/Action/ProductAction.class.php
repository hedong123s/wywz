<?php 

class ProductAction extends BaseAction{
	/**
	 * Ceramics
	 */
	function ceramics(){
		$this->display();
	} 

	/**
	 * Sanitary ware
	 */
	function sanitary(){
		$this->display();
	}

	function faucet(){
		$this->display();
	}

	function detail(){
		$id = I('id');
		$map['id'] = $id;
		$res = M("content")->where($map)->find();
		$this->assign("res",$res);
		$this->display();
	}


}
