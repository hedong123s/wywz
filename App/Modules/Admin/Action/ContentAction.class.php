<?php 

class ContentAction extends BaseAction{

	function index(){
	
		$t=M('category');
		$c=M('content');
		$menuid=intval($_GET['menuid']);
	
		if($row=$t->where(array('id'=>$menuid))->find()){

			import('ORG.Util.Page2');
			$page = new Page($c->where(array('path'=>array('like','%,'.$row['id'].',%')))->order("id DESC")->count(),20);
			
			$list=$c->where(array('path'=>array('like','%,'.$row['id'].',%')))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			
			foreach($list as $key=>$v){
				$list[$key]['style']=explode(';',$list[$key]['style']);
			}
			$this->assign('data',$row);
			$this->assign('list',$list);
			$this->assign('page',$page->show());
			
		}	
		$this->display();
	}

	//添加
	function add(){
		$t=M('category');
		$menuid=intval($_GET['menuid']);
		if($row=$t->where(array('id'=>$menuid))->find()){
			$info['title']='';
			$info['source']='';
			$info['picurl']='';
			$info['url']='';
			$info['keywords']='';
			$info['description']='';
			$info['content']='';
			$info['hits']=1;
			$info['orderid']=0;//getorderid('content');
			$info['checkinfo']='';
			$info['id']='';
			$this->assign('info',$info);
			$this->assign('data',$row);
			$this->display('edit');
		}else{
			
			$this->msg('此栏目不存在',U('content/index',array('menuid'=>$row['id'])),1);
			
		}	

	}


	//编辑
	function edit(){
	
		$t=M('category');
		
		if(isset($_POST['send'])){
			
			if($row=$t->create()){
				$t->save();
				$this->msg('内容修改成功',U('content/edit',array('menuid'=>$row['id'])));
			}
		}else{
		
			$menuid=intval($_GET['menuid']);
			if($row=$t->where(array('id'=>$menuid))->find()){
				
				if(empty($row['modelid'])){
					//单页数据
		
				}else{
					//模型数据
					$id=intval($_GET['id']);
					$c=M('content');
					if($info=$c->where(array('id'=>$id,'pid'=>$menuid))->find()){
						$info['style']=explode(';',$info['style']);
						$info['source']=explode('=',$info['source']);
						$info['content_arr']=json_decode($info['content_arr'],true);
						$info['picarr']=explode(',',$info['picarr']);
						
						$this->assign('relation',$c->where(array('id'=>array('in',$info['relation_id'])))->select());
						$this->assign('info',$info);
					}else{
						$this->msg('数据不存在',U('index',array('menuid'=>$menuid)),1);
					}
				}	
				
				
				$this->assign('data',$row);
				$this->display();
			
			}else{
				$this->msg('此栏目不存在',U('category/index'),1);
			}
		}
	
	}



	//内容提交
	function send(){
		$t=D('Content');
		$_POST['info']['path']='';	
		$_POST['info']['style']=$_POST['colorval'].';'.$_POST['boldval'];	
		$_POST['info']['source']=implode('=',$_POST['info']['source']);
		$_POST['info']['content_arr']=jsonEscape(json_encode($_POST['info']['content_arr']));
		$_POST['info']['picarr']=is_array($_POST['info']['picarr'])?implode(',',$_POST['info']['picarr']):'';
		$_POST['info']['relation_id']=empty($_POST['info']['relation_id'])?'':implode(',',array_unique(explode(',',trim($_POST['info']['relation_id'],','))));

		if($row=$t->create($_POST['info'])){
			if($row['id']){
			
				if($t->save()){
					$this->msg('数据编辑成功',U('content/index',array('menuid'=>$row['pid'])));
				}else{
					$this->msg('数据编辑失败，请重新操作',U('content/edit',array('menuid'=>$row['pid'])),1);
				}
			}else{
			
				if($t->add()){
					$this->msg('数据添加成功',U('content/index',array('menuid'=>$row['pid'])));
				}else{
					$this->msg('数据添加失败，请重新操作',U('content/add',array('menuid'=>$row['pid'])),1);
				}
				
			}


		}else{
			$this->msg('数据创建失败！',U('content/index',array('menuid'=>$_POST['info']['pid'])),1);
		}

	}


	//审核
	function checkinfo(){
		$t=M('content');
		$id=intval($this->_get('id'));
		$menuid=intval($_GET['menuid']);
		if($t->where(array('id'=>$id))->getfield('checkinfo')==0){
			$t->where(array('id'=>$id))->data(array('checkinfo'=>1))->save();
		}else{
			$t->where(array('id'=>$id))->data(array('checkinfo'=>0))->save();
		}
		$this->msg('操作成功',U('content/index',array('menuid'=>$menuid)));
	}

	//排序
	function orderid(){
		$t=M('content');
		$menuid=intval($_GET['menuid']);
		foreach($_POST['orderid'] as $key=>$v){
			$t->where(array('id'=>intval($key)))->data(array('orderid'=>intval($v)))->save();
		}
		$this->msg('操作成功',U('content/index',array('menuid'=>$menuid)));
	}



	//删除
	function del(){
		$t=M('content');
		$id=$_REQUEST['id'];
		if(empty($id)) $this->msg('数据不存在',U('index'),1);
		if(is_array($id)){
			foreach($id as $k=>$v){
				//$menuid=$t->where(array('id'=>intval($v)))->getfield('pid');
				$t->where(array('id'=>intval($v)))->delete();
				
			}
		}else{
			//$menuid=$t->where(array('id'=>intval($id)))->getfield('pid');
			$t->where(array('id'=>intval($id)))->delete();
			
		}

		$this->msg('操作成功',$_SERVER['HTTP_REFERER']);
	}

	//清除数据
	function clear_data(){
		$this->display();
	}

	function clear_data_send(){

		$tables=$_POST['tables'];
		
		foreach($tables as $key=>$v){
			
			M($v)->execute("TRUNCATE TABLE ".c('DB_PREFIX').$v);

		
		}

		R('Cache/index');//清除缓存
		//$this->success('一、数据已经清理完毕!<br/>二、本次数据已经备份到caches/bakup/default/下面',U('',array('c'=>'clear_data')),5);
		$this->success('数据已经清理完毕!',U('clear_data'));

	}
	
	
	//数据移动
	function move_data(){
		$t=M('category');
		$c=M('content');
		if($_POST['send']){
			$s_category=intval($_POST['s_category']);
			$data_list=$_POST['data_list'];
			$g_category=intval($_POST['g_category']);

			
			
			//内容的path值
			$path=$t->where(array('id'=>$g_category))->getfield('path');
			
			if(empty($data_list[0])){  //全部
				$c->where(array('path'=>array('like','%,'.$s_category.',%')))->data(array('pid'=>$g_category,'path'=>$path))->save();
			}else{                  //选择性
				$c->where(array('id'=>array('in',implode(',',$data_list))))->data(array('pid'=>$g_category,'path'=>$path))->save();
			}
			$this->msg('操作成功',U('move_data'));
			
		}else{
			$list=$this->category_node();
		
			$this->assign('list',$list);
			
			$this->display();
		}

	
	}
	
	
	//栏目分类
	function category_node($pid=0,$id='',$d='├'){
		global $list;
		$t=M('Category');
		$c=M('content');
		$row=$t->where(array('pid'=>$pid))->select();
		if(is_array($row)){  //验证下，不然调试模式有错误
			foreach($row as $key=>$v){
				$selected='';
				$disabled='';
				if($id==$row[$key]['id']) $selected='selected="selected"';
				if(empty($row[$key]['modelid'])) $disabled='disabled="disabled"';
			
				$list.='<option value="'.$row[$key]['id'].'" '.$selected.' '. $disabled.'  text="'.escapeshow($v['classname']).'">';
				for($j=1;$j<substr_count($row[$key]['path'],',')-1;$j++){
					 $list.='&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				if(!empty($row[$key]['pid'])){
					$list.=$d;
				}
				
				
				$list.=$row[$key]['classname'];
				if(!empty($row[$key]['modelid'])){
					$list.='('.$c->where(array('path'=>array('like','%,'.$v['id'].',%')))->count().')';
				}
				
				$list.='</option>';
				$this->category_node($row[$key]['id'],$id,$d);
			
			}
		}

		return $list;
	}
	
	
	function public_data_ajax(){
		$t=M('content');
		$id=intval($_GET['id']);
		$row=$t->where(array('path'=>array('like','%,'.$id.',%')))->order("orderid desc,id desc")->field('id,title')->select();

		$data='';
		$data='<option value="0">全部</option>';
		if($row){
			foreach($row as $k=>$v){
				$data.='<option value="'.$v['id'].'">'.$v['id'].'-'.escapeshow($v['title']).'</option>';
			}
		}else{
			$data='';
		}

		echo $data;
		
	}
	
	
	function pulibc_relation_ajax(){
		$t=M('content');
		$id=intval($_GET['id']);
	
		$row=$t->where(array('path'=>array('like','%,'.$id.',%')))->order("orderid desc,id desc")->field('id,title')->select();
	
		$data='';
	
		if($row){
			foreach($row as $k=>$v){
				$data.='<option value="'.$v['id'].'">'.$v['id'].'-'.escapeshow($v['title']).'</option>';
			}
		}else{
			$data='';
		}

		echo $data;
		
	}
	
	
	//修改栏目，只显示同分类下的
	function edit_category_node($pid=0,$id,$d='├'){
		
		global $list_option;
		$t=M('category');
		$c=M('content');
		
		$row=$t->where(array('pid'=>$pid,'path'=>array('like','%,'.$id.',%')))->select();
		
		if(is_array($row)){  //验证下，不然调试模式有错误
			
			foreach($row as $key=>$v){
				
				$list_option.='<option value="'.$row[$key]['id'].'"  text="'.escapeshow($v['classname']).'">';
				for($j=1;$j<substr_count($row[$key]['path'],',')-1;$j++){
					 $list_option.='&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				if(!empty($row[$key]['pid'])){
					$list_option.=$d;
				}
				
				
				$list_option.=$row[$key]['classname'];
				if(!empty($row[$key]['modelid'])){
					$list_option.='('.$c->where(array('path'=>array('like','%,'.$v['id'].',%')))->count().')';
				}
				
				$list_option.='</option>';
				$this->edit_category_node($row[$key]['id'],$id,$d);
			
			}
		}

		return $list_option;
	}
	

}


?>