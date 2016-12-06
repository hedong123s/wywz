<?php 
//生成静态页页面
class HtmlAction extends BaseAction{
	/*===================商城栏目页静态页生成 start==============================*/
	//选择-商城栏目页（带分页）
	function shopcategory(){
		$category=R('Shopcategory/category_node');
		$this->assign("category",$category);
		$this->display();
	}
	
	//处理-商城栏目页（带分页）
	function shopcategorysend(){
		$catdb=M('shopcategory');
		$db=M('goods');
		$cid=$_POST['cid'];
		$size=intval($_POST['size']);
		$cidArr=array();
		$pageName=md5(implode(",",$cid));  //缓存名字
		//获取栏目集合
		if(in_array('',$cid)){  //是否为不限栏目
			$cidArr=$catdb->field('id,path,classname')->select();
		}else{
			foreach($cid as $v){
				$getCate=getShopCateName($v,'[array]');
				$cidArr[]=array(
					"id"=>$v,
					"path"=>$getCate['path'],
					"classname"=>$getCate['classname'],
				);
			}
		}
		//获取每个商品的总数作为每个栏目最大分页数量
		$pageNum=1;   //$pageNum为每页显示数量
		foreach($cidArr as $k => $v){
			$count=$db->where("instr(path,'".$v['path']."')>0")->count();
			$cidArr[$k]['total']=ceil($count/$pageNum);   //$pageNum为每页显示数量
		}
		//将各自分页数组
		$pageArr=array();
		foreach($cidArr as $v){
			$tmpArr=$v;
			unset($tmpArr['path']);
			unset($tmpArr['total']);
			if(ceil($v['total']/$size)>0){
				for($i=0;$i<ceil($v['total']/$size);$i++){
					$tmpArr['startPage']=1+$size*$i;
					$tmpArr['endPage']=$size*($i+1);
					$pageArr[]=$tmpArr;
				}
			}else{
				$tmpArr['startPage']=1;
				$tmpArr['endPage']=1;
				$pageArr[]=$tmpArr;
			}
		}
		S($pageName,$pageArr,0); //生成缓存
		header('location:'.U('shopcategoryhtml',array('pageName'=>$pageName,'k'=>0)));
	}
	
	//生成-商城栏目页（带分页）
	function shopcategoryhtml($pageName='',$k=0){
		if($pageName=='' || !S($pageName)){
			$this->msg('参数错误',U('shopcategory'),1);
			exit;
		}
		$k=intval($k);
		$pageArr=S($pageName);
		if(isset($pageArr[$k])){
			$info=$pageArr[$k];
			
			$oldData='';
			for($i=$info['startPage'];$i<=$info['endPage'];$i++){
				$newData=$this->create_shop_lists($info['id'],$i);  //生成文件
				if($newData==$oldData){break;}else{$oldData=$newData;}   //如果发现重复，就不再生成，跳过
			}
			if($info['startPage']==$info['endPage']){
				$content='正在生成 栏目【'.$info['classname'].'】的第'.$info['startPage'].'页！';
			}else{
				$content='正在生成 栏目【'.$info['classname'].'】的'.$info['startPage'].'~'.$info['endPage'].'页！';
			}
			$url=U('shopcategoryhtml',array('pageName'=>$pageName,'k'=>$k+1));
		}else{
			S($pageName,NULL);  //清除缓存
			$content='生成成功！';
			$url=U('shopcategory');
		}
		$this->noticeshow($content,$url);
	}
	/*===================商城栏目页静态页生成 end==============================*/
	
	/*===================商城详细页静态页生成 start==============================*/
	//选择页（带分页）
	function shopshow(){
		$category=R('Shopcategory/category_node');
		$this->assign("category",$category);
		$this->display();
	}
	
	//处理页（带分页）
	function shopshowsend(){
		$catdb=M('shopcategory');
		$db=M('goods');
		$cid=$_POST['cid'];
		$size=intval($_POST['size']);
		$cidArr=array();
		$pageName=md5(implode(",",$cid));  //缓存名字
		//获取栏目集合
		if(in_array('',$cid)){  //是否为不限栏目
			$cidArr[]=array(
				"id"=>0,
				"path"=>'0,',
				"classname"=>'所有栏目',
			);
		}else{
			foreach($cid as $v){
				$getCate=getShopCateName($v,'[array]');
				$cidArr[]=array(
					"id"=>$v,
					"path"=>$getCate['path'],
					"classname"=>$getCate['classname'],
				);
			}
		}
		//过滤子栏目（取父级）
		foreach($cidArr as $v){
			foreach($cidArr as $key=>$vv){
				if(substr_count($vv['path'],$v['path'])>0 && $vv!=$v){
					unset($cidArr[$key]);
				}
			}
		}
		//获取商品的总数栏目
		foreach($cidArr as $k => $v){
			$count=$db->where("instr(path,'".$v['path']."')>0")->count();
			$cidArr[$k]['total']=$count;
			if($count==0) unset($cidArr[$k]);
		}
		$pageArr=$cidArr;
		if(count($pageArr)==0){
			$this->msg('数据为空，请先添加相关数据',U('shopshow'),1);
			exit;
		}		
		S($pageName,$pageArr,0); //生成缓存
		header('location:'.U('shopshowhtml',array('pageName'=>$pageName,'size'=>$size,'k'=>0,'total'=>$pageArr[0]['total'])));
	}
	
	//生成页（带分页）
	function shopshowhtml($pageName='',$size=10,$k=0,$total=0,$page=1){
		if($pageName=='' || !S($pageName)){
			$this->msg('参数错误',U('shopshow'),1);
			exit;
		}
		$k=intval($k);
		$pageArr=S($pageName);
		if(isset($pageArr[$k])){
			$info=$pageArr[$k];
			$goodsdb=M('goods');
			$r=$goodsdb->field("id")->where("instr(path,'".$info['path']."')>0")->limit("".(0+$size*($page-1)).",".($size+$size*($page-1))."")->select();
			foreach($r as $v){
				$this->create_shop_show_info($v['id']);  //生成相关详细页
			}
			
			$content='【'.$info['classname'].'】 有 <font color="red">'.$total.'</font> 条信息 - 已完成 <font color="red">'.($page*$size>=$total?$total:$page*$size).'</font> 条（<font color="red">'.intval(($page*$size>=$total?$total:$page*$size)/$total*100).'%</font>）';
			
			//下一个连接
			if($page*$size>=$total){
				$k++;
				$page=1;
				$total=isset($pageArr[$k])?$pageArr[$k]:0;
			}else{
				$page++;
			}
			
			$url=U('shopshowhtml',array('pageName'=>$pageName,'size'=>$size,'k'=>$k,'total'=>$total,'page'=>$page));
		}else{
			S($pageName,NULL);  //清除缓存
			$content='生成成功！';
			$url=U('shopshow');
		}
		$this->noticeshow($content,$url,200);
	}
	/*===================商城详细页静态页生成 end==============================*/
	
	/*===================内容模块栏目页静态页生成 start==============================*/
	//选择-栏目页（带分页）
	function contentcategory(){
		$category=R('Category/category_node');
		$this->assign("category",$category);
		$this->display();
	}
	
	//处理-栏目页（带分页）
	function contentcategorysend(){
		$catdb=M('category');
		$db=M('content');
		$cid=$_POST['cid'];
		$size=intval($_POST['size']);
		$cidArr=array();
		$pageName=md5(implode(",",$cid));  //缓存名字
		//获取栏目集合
		if(in_array('',$cid)){  //是否为不限栏目
			$cidArr=$catdb->field('id,path,classname')->select();
		}else{
			foreach($cid as $v){
				$getCate=getCateName($v,'[array]');
				$cidArr[]=array(
					"id"=>$v,
					"path"=>$getCate['path'],
					"classname"=>$getCate['classname'],
				);
			}
		}
		//获取每个内容的总数作为每个栏目最大分页数量
		$pageNum=1;   //$pageNum为每页显示数量
		foreach($cidArr as $k => $v){
			$count=$db->where("instr(path,'".$v['path']."')>0")->count();
			$cidArr[$k]['total']=ceil($count/$pageNum);   //$pageNum为每页显示数量
		}
		//将各自分页数组
		$pageArr=array();
		foreach($cidArr as $v){
			$tmpArr=$v;
			unset($tmpArr['path']);
			unset($tmpArr['total']);
			if(ceil($v['total']/$size)>0){
				for($i=0;$i<ceil($v['total']/$size);$i++){
					$tmpArr['startPage']=1+$size*$i;
					$tmpArr['endPage']=$size*($i+1);
					$pageArr[]=$tmpArr;
				}
			}else{
				$tmpArr['startPage']=1;
				$tmpArr['endPage']=1;
				$pageArr[]=$tmpArr;
			}
		}
		S($pageName,$pageArr,0); //生成缓存
		header('location:'.U('contentcategoryhtml',array('pageName'=>$pageName,'k'=>0)));
	}
	
	//生成-栏目页（带分页）
	function contentcategoryhtml($pageName='',$k=0){
		if($pageName=='' || !S($pageName)){
			$this->msg('参数错误',U('contentcategory'),1);
			exit;
		}
		$k=intval($k);
		$pageArr=S($pageName);
		if(isset($pageArr[$k])){
			$info=$pageArr[$k];
			
			$oldData='';
			for($i=$info['startPage'];$i<=$info['endPage'];$i++){
				$newData=$this->create_content_lists($info['id'],$i);  //生成文件
				if($newData==$oldData){break;}else{$oldData=$newData;}   //如果发现重复，就不再生成，跳过
			}
			if($info['startPage']==$info['endPage']){
				$content='正在生成 栏目【'.$info['classname'].'】的第'.$info['startPage'].'页！';
			}else{
				$content='正在生成 栏目【'.$info['classname'].'】的'.$info['startPage'].'~'.$info['endPage'].'页！';
			}
			$url=U('contentcategoryhtml',array('pageName'=>$pageName,'k'=>$k+1));
		}else{
			S($pageName,NULL);  //清除缓存
			$content='生成成功！';
			$url=U('contentcategory');
		}
		$this->noticeshow($content,$url);
	}
	/*===================内容模块栏目页静态页生成 end==============================*/
	
	/*===================内容模块详细页静态页生成 start==============================*/
	//选择页（带分页）
	function contentshow(){
		$category=R('Category/category_node');
		$this->assign("category",$category);
		$this->display();
	}
	
	//处理页（带分页）
	function contentshowsend(){
		$catdb=M('category');
		$db=M('content');
		$cid=$_POST['cid'];
		$size=intval($_POST['size']);
		$cidArr=array();
		$pageName=md5(implode(",",$cid));  //缓存名字
		//获取栏目集合
		if(in_array('',$cid)){  //是否为不限栏目
			$cidArr[]=array(
				"id"=>0,
				"path"=>'0,',
				"classname"=>'所有栏目',
			);
		}else{
			foreach($cid as $v){
				$getCate=getCateName($v,'[array]');
				$cidArr[]=array(
					"id"=>$v,
					"path"=>$getCate['path'],
					"classname"=>$getCate['classname'],
				);
			}
		}
		//过滤子栏目（取父级）
		foreach($cidArr as $v){
			foreach($cidArr as $key=>$vv){
				if(substr_count($vv['path'],$v['path'])>0 && $vv!=$v){
					unset($cidArr[$key]);
				}
			}
		}
		//获取商品的总数栏目
		foreach($cidArr as $k => $v){
			$count=$db->where("instr(path,'".$v['path']."')>0")->count();
			$cidArr[$k]['total']=$count;
			if($count==0) unset($cidArr[$k]);
		}
		$pageArr=$cidArr;
		if(count($pageArr)==0){
			$this->msg('数据为空，请先添加相关数据',U('contentshow'),1);
			exit;
		}		
		S($pageName,$pageArr,0); //生成缓存
		header('location:'.U('contentshowhtml',array('pageName'=>$pageName,'size'=>$size,'k'=>0,'total'=>$pageArr[0]['total'])));
	}
	
	//生成页（带分页）
	function contentshowhtml($pageName='',$size=10,$k=0,$total=0,$page=1){
		if($pageName=='' || !S($pageName)){
			$this->msg('参数错误',U('contentshow'),1);
			exit;
		}
		$k=intval($k);
		$pageArr=S($pageName);
		if(isset($pageArr[$k])){
			$info=$pageArr[$k];
			$contentdb=M('content');
			$r=$contentdb->field("id")->where("instr(path,'".$info['path']."')>0")->limit("".(0+$size*($page-1)).",".($size+$size*($page-1))."")->select();
			foreach($r as $v){
				$this->create_content_show_info($v['id']);  //生成相关详细页
			}
			
			$content='【'.$info['classname'].'】 有 <font color="red">'.$total.'</font> 条信息 - 已完成 <font color="red">'.($page*$size>=$total?$total:$page*$size).'</font> 条（<font color="red">'.intval(($page*$size>=$total?$total:$page*$size)/$total*100).'%</font>）';
			
			//下一个连接
			if($page*$size>=$total){
				$k++;
				$page=1;
				$total=isset($pageArr[$k])?$pageArr[$k]:0;
			}else{
				$page++;
			}
			
			$url=U('contentshowhtml',array('pageName'=>$pageName,'size'=>$size,'k'=>$k,'total'=>$total,'page'=>$page));
		}else{
			S($pageName,NULL);  //清除缓存
			$content='生成成功！';
			$url=U('contentshow');
		}
		$this->noticeshow($content,$url,200);
	}
	/*===================内容模块详细页静态页生成 end==============================*/
		
	//生成静态页通知
	function noticeshow($content='',$url='',$time=1250){
		$this->assign('content',$content);
		$this->assign('url',$url);
		$this->assign('time',$time);
		$this->display('noticeshow');
	}
	
	
	/*======================模拟访问生成静态页 start=================================*/
	//生成商品列表页(带分页)
	function create_shop_lists($cid,$p=1,$isshow=0){
		$url=U('Home/Shop/lists',array('cid'=>$cid,'p'=>$p));
		$resp=$this->writeHtml($url);
		//如果为第一页
		if($p==1){
			$urlone=U('Home/Shop/lists',array('cid'=>$cid));
			$this->writeHtml($urlone);
		}
		if(!!$isshow){
			echo '生成成功';
		}else{
			return $resp;
		}
	}
	
	//生成商品详细页
	function create_shop_show(){
		$catdb=M('shopcategory');
		$db=M('goods');
		
	}
	
	
	//生成单个商品详细页
	//isshow是否显示生成成功html
	function create_shop_show_info($id,$isshow=0){
		$url=U('Home/Shop/show',array('id'=>$id));
		$this->writeHtml($url);
		if(!!$isshow){
			echo '生成成功';
		}else{
			return true;
		}
	}
	
	
	
	//生成内容列表页(带分页)
	function create_content_lists($cid,$p=1,$isshow=0){
		$url=U('Home/Content/lists',array('cid'=>$cid,'p'=>$p));
		$resp=$this->writeHtml($url);
		//如果为第一页
		if($p==1){
			$urlone=U('Home/Content/lists',array('cid'=>$cid));
			$this->writeHtml($urlone);
		}
		if(!!$isshow){
			echo '生成成功';
		}else{
			return $resp;
		}
	}
	
	//生成单个列表页（主要用于单页）
	function create_content_lists_info($cid,$isshow=0){
		$url=U('Home/Content/lists',array('cid'=>$cid));
		$this->writeHtml($url);
		if(!!$isshow){
			echo '生成成功';
		}else{
			return true;
		}
	}
	
	//生成单个文章详细页（包含单页）
	function create_content_show_info($id,$isshow=0){
		$url=U('Home/Content/show',array('id'=>$id));
		$this->writeHtml($url);
		if(!!$isshow){
			echo '生成成功';
		}else{
			return true;
		}
	}	
	
	//清除html文件
	function delHtmlCache(){
		import("ORG.Util.Dir");
		$dir = new Dir;
		if(is_dir(HTML_PATH)){
			$dir->delDir(HTML_PATH);
		}
	}
	
	//模拟访问读取动态程序，以生成静态缓存文件
	function writeHtml($url){
		$httpUrl=getHttpUrl();
		$url=$httpUrl.$url;
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$resp=curl_exec($ch);
		curl_close($ch);
		return $resp;
	}
	/*======================模拟访问生成静态页 start=================================*/
}
?>