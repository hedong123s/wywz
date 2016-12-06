<?php 
class SortIframeAction extends BaseAction{

	
	function menu(){
		$this->display();
	}	
	
	function menu_list(){
		//$this->assign('list',$this->node());
		echo $this->node();
	}
	
	

	function node($pid=0){
		global $str;
		//$t=M('category');
		//$row=$t->where(array('pid'=>$pid))->order("orderid asc,id asc")->select();
		
		//读取缓存
		$category=F('admin/category'); 
		if(!$category){
			echo '<div style="padding:12px 0; text-align:center;">请先更新<a href="'.U('Category/categoryCacheHtml').'" style="color:#07c">栏目缓存</a></div>';
			return false;
		}
		
		foreach($category as $k=>$v){
			if($v['pid']==$pid){
				$row[]=$v;
			}
		}	
		
		foreach($row as $key=>$v){
			
			//图标处理	
			if(empty($row[$key]['modelid']) || $row[$key]['modelid']==3){
				$class='';
			}else{
				$class='add';
			}
		
			$str.='<li class="'.$class.'"><div>';
			//链接处理
			if(empty($row[$key]['modelid'])){
				$str.='<a href="'.U('content/edit',array('menuid'=>$row[$key]['id'])).'" target="main_iframe">'.escapeshow($row[$key]['classname']).'</a>';
			}elseif($row[$key]['modelid']==3){
				$url='';
				if($v['url']==''){
					$url='javascript:;';
				}else{
					$url=$v['url'];
					$_blank='_blank';
				}
				$str.='<a href="'.$url.'" target="'.$_blank.'">'.$row[$key]['classname'].'</a>';
			}else{
				$str.='<a href="'.U('content/add',array('menuid'=>$row[$key]['id'])).'" target="main_iframe"><img src="App/Modules/Admin/Tpl/images/add_content.gif"></a> <a href="'.U('content/index',array('menuid'=>$row[$key]['id'])).'" target="main_iframe">'.escapeshow($row[$key]['classname']).'</a>';
			}

			
			$str.='</div>';
			
			//查看是否有子分类
			$issub=false;
			foreach($category as $v){
				if($v['pid']==$row[$key]['id']){
					$issub=true;
					break;
				}
			}
			
			if(!!$issub){
				$str.= "<ul>";
				$this->node($row[$key]['id']);
				$str.= "</ul>";
			}
			$str.= '</li>';
		}
		
		return $str;
	}


}

?>