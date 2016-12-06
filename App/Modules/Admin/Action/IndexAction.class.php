<?php 

class IndexAction extends BaseAction{

	//框架
	function index(){
		//导航菜单
		//require(APP_NAME.'/Modules/Admin/Tpl/left_menu.php');
		$this->assign('menu_list',$menu_arr);
		$this->display();
	}

	//框架主体
	function main(){
		$t=M('content');
		$c=M('category');
		$content_list=$t->where(array('id'=>array('neq','')))->order("orderid desc,id desc")->select();
		foreach($content_list as $key=>$v){
			$content_list[$key]['style']=explode(';',$v['style']);
		}
		
		
		$this->assign('category_list',$c->where(array('id'=>array('neq','')))->order("id desc")->select());
		$this->assign('content_list',$content_list);
		$this->display();
	}
	
	
	

	//管理员备注
	function public_admin_text(){
		$content=trim($_POST['content']);
		M('admin_text')->where(array('id'=>1))->data(array('content'=>$content))->save();
		
	}

	
}


?>