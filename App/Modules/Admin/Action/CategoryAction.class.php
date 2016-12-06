<?php 

class CategoryAction extends BaseAction{


	
	function index(){
		$this->assign('list',$this->list_node());	
		$this->display();
	}
	
	

	//添加栏目
	function add(){
		if(isset($_POST['send'])){
			$t=D('Category');
			
			if($t->create()){
				$insertid=$t->add();

				if(empty($_POST['pid'])){
					$t->where(array('id'=>$insertid))->data(array('path'=>'0,'.$insertid.','))->save();
				}else{
					$onerow=$t->where(array('id'=>intval($_POST['pid'])))->find();
					$t->where(array('id'=>$insertid))->data(array('path'=>$onerow['path'].$insertid.','))->save();
				}
				$this->categoryCache();  //生成栏目缓存
				$this->msg('操作成功');
			}else{
				$this->msg($t->geterror(),'',1);
			
			}
		}else{
		
			if(isset($_GET['id'])){
				$t=M('category');
				$id=intval($this->_get('id'));
				if($row=$t->where(array('id'=>$id))->find()){
					$modelid=$row['modelid'];
				}else{
				$this->msg('此栏目不存在',U('index'),1);
				}
			}

			$data['model']=model($modelid);
			$data['orderid']=getorderid('category');
			$data['category_list']=$this->category_node(0,$id);
			$data['classname']='';
			$data['dirname']='';
			$data['flag']='';
			$data['url']='';
			$data['picurl']='';
			$data['seotitle']='';
			$data['keywords']='';
			$data['description']='';
			$data['navshow']='';
			$data['checkinfo']='';
			$this->assign('data',$data);
			$this->display('edit');	
		
		}

	}



	//编辑
	function edit(){
		if(isset($_POST['send'])){
			$t=D('Category');
	
			if($row=$t->create()){
				
				//所选择的上级分类不能是当前分类或者当前分类的下级分类!
				$pathrow=$t->where(array('path'=>array('like','%,'.intval($_POST['id']).',%')))->select();
				foreach($pathrow as $key=>$v){
					$pathrow_v[$key]=$pathrow[$key]['id'];
				}
			
				if(in_array($row['pid'],$pathrow_v)){
					$this->msg('所选择的上级分类不能是当前分类或者当前分类的下级分类','',1);
				}

				
				$t->save();
				$this->categoryCache();  //生成栏目缓存
				$this->msg('操作成功',U('index'));
			}else{
				$this->msg($t->geterror(),'',1);
			}	
		}else{
			$t=M('category');
			$id=intval($this->_get('id'));
			if(!$row=$t->where(array('id'=>$id))->find()){
				$this->msg('此栏目不存在',U('category',array('c'=>'list')),1);
			}
			$row['model']=model($row['modelid']);
			$row['category_list']=$this->category_node(0,$row['pid']);
			$this->assign('data',$row);
			$this->display();
		}

	}




	//审核
	function checkinfo(){
		$t=M('category');
		$id=intval($this->_get('id'));
		if($t->where(array('id'=>$id))->getfield('checkinfo')==0){
			$t->where(array('id'=>$id))->data(array('checkinfo'=>1))->save();
		}else{
			$t->where(array('id'=>$id))->data(array('checkinfo'=>0))->save();
		}
		$this->msg('操作成功',U('index'));
	}

	//删除
	function del(){
		$t=M('category');
		$c=M('content');
		$no_category_id=explode(',',C('cfg_no_category_id'));
		$id=$_REQUEST['id'];
		if(is_array($id)){
			foreach($id as $v){
				if(!in_array($v,$no_category_id)){
					$t->where(array('path'=>array('like','%,'.intval($v).',%')))->delete();
					$c->where(array('path'=>array('like','%,'.intval($v).',%')))->delete();
				}

			}
		}else{
			if(!in_array($id,$no_category_id)){
				$t->where(array('path'=>array('like','%,'.intval($id).',%')))->delete();
				$c->where(array('path'=>array('like','%,'.intval($id).',%')))->delete();
			}
		}
		
		$this->categoryCache();  //生成栏目缓存
		$this->msg('操作成功',U('index'));
	}

	//模板选择ajax
	function select_tpl_ajax(){
		$t=M('category');
		$modelid=intval($_GET['modelid']);
		$id=intval($_GET['id']);
		$show=intval($_GET['show']);
		$row=$t->where(array('id'=>$id))->find();

		switch($modelid){
			case 0;
				$tpl_v='page';

			break;	
			case 1;
				$tpl_v='list';

			break;
			case 2;
				$tpl_v='img';

			break;
			case 3; //链接模型
				$tpl_v='链接模型不需要模板';
			break;
			default;
				$tpl_v='page';
		}	
		
		if(!empty($show)){
			$tpl_v=''; //显示全部模板
		}
		
		foreach(get_file(APP_PATH.'Modules/Home/Tpl/default/') as $key=>$v){
			
			//列表
			if(stripos($v,'content_'.$tpl_v)!==false){
				$list_file[]=$v;
			}
			
			//详细
			if(stripos($v,'content_show_')!==false){
				$show_file[]=$v;
			}
			
		}


		//模板列表
		$tpl['list'].='<select name="list_template">';
		$tpl['list'].='<option value="">请选择</option>';	
		foreach($list_file as $k=>$v){
			$tpl_list_select='';
			if($row){
				if($v==$row['list_template']) $tpl_list_select='selected="selected"';
			}else{
				if(empty($k)) $tpl_list_select='selected="selected"';
			}	
			
			
			$tpl['list'].='<option value="'.$v.'" '.$tpl_list_select.'>'.$v.'</option>';
		}
		$tpl['list'].='</select>';			

		//模板详细
		$tpl['show'].='<select name="show_template">';
		$tpl['show'].='<option value="">请选择</option>';	
		foreach($show_file as $k=>$v){
			$tpl_show_select='';
			if($row){
				if($v==$row['show_template']) $tpl_show_select='selected="selected"';
				
			}else{
				if(empty($k)) $tpl_show_select='selected="selected"';
			}	

			$tpl['show'].='<option value="'.$v.'" '.$tpl_show_select.'>'.$v.'</option>';
		}
		$tpl['show'].='</select>';
		
		echo  json_encode($tpl);
		
	}



	//列表
	function list_node($pid=0){
		global $rows;
		$t=M('category');
		$row=$t->where(array('pid'=>$pid))->order('orderid asc,id asc')->select();
		if(is_array($row)){
			foreach($row as $key=>$v){
				$row[$key]['d']=''; //初使化键值,调试下有错误
				for($j=1;$j<substr_count($row[$key]['path'],',')-1;$j++){
					 $row[$key]['d'].='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				if(!empty($row[$key]['pid'])){
					$row[$key]['d']=$row[$key]['d'].'├─ ';
				}
				$rows[]=$row[$key];
				$this->list_node($row[$key]['id']);
				
			}
		}

		return $rows;
		
	}


	//栏目分类
	function category_node($pid=0,$id='',$d='├'){
		global $list;
		$t=M('Category');
		$row=$t->where(array('pid'=>$pid))->select();
		if(is_array($row)){  //验证下，不然调试模式有错误
			foreach($row as $key=>$v){
				$selected='';
				if($id==$row[$key]['id']) $selected='selected="selected"';
				$list.='<option value="'.$row[$key]['id'].'" '.$selected.'>';
				for($j=1;$j<substr_count($row[$key]['path'],',')-1;$j++){
					 $list.='&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				if(!empty($row[$key]['pid'])){
					$list.=$d;
				}
				
				
				$list.=$row[$key]['classname'];
				$list.='</option>';
				$this->category_node($row[$key]['id'],$id,$d);
			
			}
		}

		return $list;
	}

	//排序
	function orderid(){
		$t=M('category');
	
		foreach($_POST['orderid'] as $key=>$v){
			$t->where(array('id'=>intval($key)))->data(array('orderid'=>intval($v)))->save();
		}
		$this->categoryCache();  //生成栏目缓存
		$this->msg('操作成功',U('index'));
	
	}


	//栏目搜索
	function public_ajax_search(){
		$t=M('category');
		//导入拼音库
		import('ORG.Util.Pinyin');
		$pinyin=new Pinyin;
		$classname=trim($_GET['classname']);
		$getpinyin=$pinyin->c($classname);

		$row=$t->select();
		foreach($row as $key=>$v){
			
			$mpinyin=$pinyin->c($v['classname']);

			if($getpinyin==substr($mpinyin,0,strlen($getpinyin))){
				//url处理 单页去修改 其它都去列表
				if(empty($v['modelid'])){
					echo '<li><a href="'.U('content/edit',array('menuid'=>$v['id'])).'">'.escapeshow($v['classname']).'</a></li>';	
				}else{
					echo '<li><a href="'.U('content/index',array('menuid'=>$v['id'])).'">'.escapeshow($v['classname']).'</a></li>';	
				}
					
			}
		}
	}

	
	//生成栏目缓存
	function categoryCache(){
		$db=M("category");
		$r=$db->order('orderid asc,id asc')->getField("id,classname,pid,path,modelid");
		$array=array();
		foreach($r as $v){
			unset($v['content']);
			$array[$v['id']]=$v;
		}
		//写入缓存
		F("admin/category",$array);
	}
	
	//生成栏目缓存HTML
	function categoryCacheHtml(){
		$this->categoryCache();  //生成栏目缓存
		$this->msg('操作成功',$_SERVER['HTTP_REFERER']);
	}



}







?>