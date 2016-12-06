<?php 
//引入用户登录数据
require("user.info.php");


//查询分页数据
/*
参数说明
$sql sql语句
$pageNum 每页显示数量
$lan  默认为cn，还有en为英文

使用方法：如：
$page=new listPages("select * from `#@__goods`",12);
$list=$page->data;   //返回数据集
$pages=$page->pages;   //返回分页代码
*/
class listPages{
	public $total=0;  //数据总数
	public $data;  //当前数据集
	public $pages;  //分页显示代码
	public $totalPages;  //总页数
	public $nowPage;  //当前页数
	public $pageNum;  //每页显示数量
	
	function __construct($sql,$pageNum='',$lan='cn'){
		$this->pageNum=$pageNum;
		$sql=str_replace(C('REPLACEDBPREFIX'),C('DB_PREFIX'),$sql);  //替换表前缀
		
		$Model = new Model(); // 实例化一个model对象
		$row=$Model->query($sql);
		
		$this->total=count($row);  //获取总数
		
		if($lan=='en'){
			import('ORG.Util.PageEn');
		}else{
			import('ORG.Util.Page');
		}
		if(empty($pageNum)) $pageNum=C('cfg_pagenum');
		$this->total=count($row);  //获取总数
		
		$Page=new Page($this->total,$pageNum);// 实例化分页类 传入总记录数
		$data=$Model->query($sql.' limit '.$Page->firstRow.','.$Page->listRows.'');  //获取记录集
		
		$this->data=$data;
		$this->pages=$Page->show();// 分页显示输出
		$this->totalPages=$Page->totalPages;
		$this->nowPage=$Page->nowPage;
	}
}

//获取当前位置
/*
$id 栏目ID
$model 模型, shop则为商城，此时调用商城相关信息，默认为content，即内容模型
$str 分隔符
*/
function getPos($id,$model='content',$str=' &gt; '){
	switch($model){
		case 'shop':   //商品类型
			$catdb=M("shopcategory");
			break;
		case 'content':
			$catdb=M("category");
			break;
	}
	$tpl='';
	if($r=$catdb->where(array("id"=>$id))->find()){
		$path=$r['path'];
		$pathArr=explode(",",$path);
		foreach($pathArr as $v){
			if($v!=0 && $v!=''){
				$catname=$catdb->where(array("id"=>$v))->getField("classname");
				$catInfo='<a href="'.UU('lists',array('cid'=>$v)).'">'.$catname.'</a>';
				$tpl.=$str.$catInfo;
			}
		}
		return $tpl;
	}else{
		$tpl="参数错误";
	}	
	return $tpl;
}


/*
###获取前台SEO信息
$id 栏目ID或内容ID
$type 是否为显示页，1为显示页（即此时的$id为内容页ID），其他为栏目页ID
$str 自定义标题
$model 模型, shop则为商城，此时调用商城相关信息，默认为content，即内容模型，若定义$str
以上代码，$str优先级大于任何情况
*/
function getSeo($id,$type=0,$str='',$model='content'){
	$webSeo=array(
		'title'=>C('cfg_webname'),
		'keywords'=>C('cfg_keyword'),
		"description"=>C('cfg_description'),
	);
	$seoTitle=$webSeo;  //初始化
	switch($model){
		case 'shop':   //商品类型
			$catdb=M("shopcategory");
			$condb=M("goods");
			break;
		case 'content':
			$catdb=M("category");
			$condb=M("content");
			break;
	}
	//获取对应的SEO信息
	if(!!$catdb || !!$condb){
		if($type==1){  //内容页
			if($r=$condb->where(array("id"=>$id))->find()){
				$seoTitle['title']=$r['title']!=''?$r['title'].' - '.$webSeo['title']:$webSeo['title'];
				$seoTitle['keywords']=$r['keywords']!=''?$r['keywords']:$webSeo['keywords'];
				$seoTitle['description']=$r['description']!=''?$r['description']:$webSeo['description'];
			}
		}else{
			if($r=$catdb->where(array("id"=>$id))->find()){
				$seoTitle['title']=($r['seotitle']!=''?$r['seotitle']:$r['classname'])." - ".$webSeo['title'];
				$seoTitle['keywords']=$r['keywords']!=''?$r['keywords']:$webSeo['keywords'];
				$seoTitle['description']=$r['description']!=''?$r['description']:$webSeo['description'];
			}
		}
	}
	
	if($str!=''){
		$seoTitle['title']=$str.' - '.$webSeo['title'];
	}
	
	$seoHtml='<title>'.escapeshow($seoTitle['title']).'</title>'."\n";
	$seoHtml.='<meta name="keywords" content="'.escapeshow($seoTitle['keywords']).'"/>'."\n";
	$seoHtml.='<meta name="description" content="'.escapeshow($seoTitle['description']).'" />'."\n";
	return $seoHtml;
}

/*
###获取前台SEO信息[英文版]
$id 栏目ID或内容ID
$type 是否为显示页，1为显示页（即此时的$id为内容页ID），其他为栏目页ID
$str 自定义标题
$model 模型, shop则为商城，此时调用商城相关信息，默认为content，即内容模型，若定义$str
以上代码，$str优先级大于任何情况
*/
function getSeoEn($id,$type=0,$str='',$model='content'){
	$webSeo=array(
		'title'=>C('cfg_webname_en'),
		'keywords'=>C('cfg_keyword_en'),
		"description"=>C('cfg_description_en'),
	);
	$seoTitle=$webSeo;  //初始化
	switch($model){
		case 'shop':   //商品类型
			$catdb=M("shopcategory");
			$condb=M("goods");
			break;
		case 'content':
			$catdb=M("category");
			$condb=M("content");
			break;
	}
	//获取对应的SEO信息
	if(!!$catdb || !!$condb){
		if($type==1){  //内容页
			if($r=$condb->where(array("id"=>$id))->find()){
				$seoTitle['title']=$r['title']!=''?$r['title'].' - '.$webSeo['title']:$webSeo['title'];
				$seoTitle['keywords']=$r['keywords']!=''?$r['keywords']:$webSeo['keywords'];
				$seoTitle['description']=$r['description']!=''?$r['description']:$webSeo['description'];
			}
		}else{
			if($r=$catdb->where(array("id"=>$id))->find()){
				$seoTitle['title']=($r['seotitle']!=''?$r['seotitle']:$r['classname'])." - ".$webSeo['title'];
				$seoTitle['keywords']=$r['keywords']!=''?$r['keywords']:$webSeo['keywords'];
				$seoTitle['description']=$r['description']!=''?$r['description']:$webSeo['description'];
			}
		}
	}
	
	if($str!=''){
		$seoTitle['title']=$str.' - '.$webSeo['title'];
	}
	
	$seoHtml='<title>'.escapeshow($seoTitle['title']).'</title>'."\n";
	$seoHtml.='<meta name="keywords" content="'.escapeshow($seoTitle['keywords']).'"/>'."\n";
	$seoHtml.='<meta name="description" content="'.escapeshow($seoTitle['description']).'" />'."\n";
	return $seoHtml;
}


//编辑器文件路径修改
function editor($content){
	return 	str_replace('uploads/',__ROOT__.'/uploads/',$content);
}

/*
====生成缩略图====
$src 原图路径
$w 生成图片宽度
$h 生成图片高度
$newpic 生成图片文件名（非路径），若为空，则直接源文件名基础上加_宽度_高度
$isauto 生成方式，1为裁图，0为填充
*/
function thumb($src,$w,$h,$newpic='',$isauto="1"){
		if(empty($src)) return 'data/images/nopic.jpg';
		import('ORG.Util.Thumbnails2');
		$formatarr=explode('.',$src);
		$arr=explode('/',$src);
		foreach($arr as $k=>$v){
			if($k!=(count($arr)-1)){
				$arrpic[]=$v;
			}
		}
		if(is_array($arrpic)){
			if(empty($newpic)){
				$srcfile_arr=explode('.',$arr[count($arr)-1]);
				$newpic=implode('/',$arrpic).'/'.$srcfile_arr[0].'_'.$w.'_'.$h.'.'.$srcfile_arr[1];
			}else{
				$newpic=implode('/',$arrpic).'/'.$newpic.'.'.$formatarr[count($formatarr)-1];
			}
		}

		if(!file_exists($newpic)){
			$resizeimage = new resizeimage($src, $w, $h, $isauto,$newpic);
			$arr=$resizeimage->objectToArray($resizeimage);
			return $arr['dstimg'];
		}else{
			return $newpic;
		}
	

}

//显示信息
function showMsg($msg='', $gourl='-1'){
	if($gourl != '-1'){
		echo '<script>alert("'.$msg.'");location.href="'.$gourl.'";</script>';
		exit;
	}else{
		echo '<script>alert("'.$msg.'");history.go(-1);</script>';
		exit;
	}
}


/**
 * URL静态封装，参数同U函数   //【仅前台（默认分组）有效】
 * @param string $url URL表达式，格式：'[分组/模块/操作#锚点@域名]?参数1=值1&参数2=值2...'
 * @param string|array $vars 传入的参数，支持数组和字符串
 * @param string $suffix 伪静态后缀，默认为true表示获取配置值
 * @param boolean $redirect 是否跳转，如果设置为true则表示跳转到该URL地址
 * @param boolean $domain 是否显示域名
 * @return string
 */
function UU($url='',$vars='',$suffix=true,$redirect=false,$domain=false) {
	if(C('cfg_runmode')==0 || !C('HTML_CACHE_ON')){  //如为动态，直接返回
		$baseUrl=U($url,$vars,$suffix,$redirect,$domain);
		return U($url,$vars,$suffix,$redirect,$domain);exit;
	}	
	//如果为静态
	$htmls = C('HTML_CACHE_RULES'); // 读取静态规则
	if(!empty($htmls)) {
		$htmls = array_change_key_case($htmls);
		// 静态规则文件定义格式 actionName=>array('静态规则','缓存时间','附加规则')
		// 'read'=>array('{id},{name}',60,'md5') 必须保证静态规则的唯一性 和 可判断性
		// 检测静态规则
		$url_model=C('URL_MODEL');  //获取Url模型
		C('URL_MODEL',0);  //重新定义URl模型为0
		$baseUrl=U($url,$vars,$suffix,$redirect,$domain);  //原始连接（此时模型类型为0)
		
		//将URL字符串转换成参数数组
		$baseUrlArr=parse_url($baseUrl);
		$vars[C('VAR_MODULE')]=C('DEFAULT_MODULE'); //初始化
		$vars[C('VAR_ACTION')]=C('DEFAULT_ACTION');
		if(is_string($baseUrlArr['query'])){
			parse_str($baseUrlArr['query'],$vars);// aaa=1&bbb=2 转换成数组
		}
		if(isset($baseUrlArr['fragment'])) { // 解析锚点
        	$anchor = $baseUrlArr['fragment'];
		}
		
		$APP_NAME=APP_NAME;
		$Module_Name=strip_tags(C('URL_CASE_INSENSITIVE')?strtolower($vars[C('VAR_MODULE')]):$vars[C('VAR_MODULE')]);  //模型
		$Action_NAme=strip_tags(C('URL_CASE_INSENSITIVE')?strtolower($vars[C('VAR_ACTION')]):$vars[C('VAR_ACTION')]);  //方法
		
		/*静态页连接转换*/
		$moduleName = strtolower($Module_Name);
		$actionName = strtolower($Action_NAme);
		if(isset($htmls[$moduleName.':'.$actionName])) {
			$html   =   $htmls[$moduleName.':'.$actionName];   // 某个模块的操作的静态规则
		}elseif(isset($htmls[$moduleName.':'])){// 某个模块的静态规则
			$html   =   $htmls[$moduleName.':'];
		}elseif(isset($htmls[$actionName])){
			$html   =   $htmls[$actionName]; // 所有操作的静态规则
		}elseif(isset($htmls['*'])){
			$html   =   $htmls['*']; // 全局静态规则
		}elseif(isset($htmls['empty:index']) && !class_exists(MODULE_NAME.'Action')){
			$html   =    $htmls['empty:index']; // 空模块静态规则
		}elseif(isset($htmls[$moduleName.':_empty']) && $this->isEmptyAction(MODULE_NAME,ACTION_NAME)){
			$html   =    $htmls[$moduleName.':_empty']; // 空操作静态规则
		}
		if(!empty($html)) {
			// 解读静态规则
			$rule   = $html[0];
			// 以$_开头的系统变量
			$rule   = preg_replace('/{\$(_\w+)\.(\w+)\|(\w+)}/e',"\\3(\$\\1['\\2'])",$rule);
			$rule   = preg_replace('/{\$(_\w+)\.(\w+)}/e',"\$\\1['\\2']",$rule);
			// {ID|FUN} GET变量的简写
			$rule   = preg_replace('/{(\w+)\|(\w+)}/e',"\\2(\$vars['\\1'])",$rule);
			$rule   = preg_replace('/{(\w+)}/e',"\$vars['\\1']",$rule);
			// 特殊系统变量
			$rule   = str_ireplace(
				array('{:app}','{:module}','{:action}','{:group}'),
				array(APP_NAME,Module_Name,Action_NAme,''),
				$rule);
			// {|FUN} 单独使用函数
			$rule  = preg_replace('/{|(\w+)}/e',"\\1()",$rule);
			if(!empty($html[2])) $rule    =   $html[2]($rule); // 应用附加函数
			// 当前缓存文件
			
			C('URL_MODEL',$url_model);  //恢复URl模型
			$urlLast=__ROOT__.'/'.HTML_PATH . $rule;
			if(substr($urlLast,-5)=='index'){   //去除index
				$urlLast=substr($urlLast,0,strlen($urlLast)-5);
			}else{
				$urlLast.=C('HTML_FILE_SUFFIX');
			}
			if(isset($anchor)){
				$urlLast  .= '#'.$anchor;
			}
			return $urlLast;
		}else{
			C('URL_MODEL',$url_model);  //恢复URl模型
			return $baseUrl;  //原始连接（此时模型类型为0)
		}
		/*静态页连接转换end*/
	}else{
		return $baseUrl;
	}
}

//静态页分页规则函数
function getHtmlPage($p){
	if(isset($p)){
		return $p;
	}else{
		return 'index';
	}
}
?>