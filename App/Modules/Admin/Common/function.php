<?php 
require("function.diy..php");  //加入自行编写function

function pass_encrypt($str){
	$enc_str='asdf432423jjsdf';
	return sha1(md5($str.$enc_str));

}


function category($db,$id='',$type='',$name='title'){
	$t=M($db);
	$row=$t->order('orderid asc,id asc')->select();

	foreach($row as $key=>$v){
		if(empty($type)){
			$select='';
			if($v['id']==$id) $select='selected="selected"';
			$str.='<option value='.$v['id'].' '.$select.'>'.escapeshow($v[$name]).'</option>';
		}else{
			if($v['id']==$id){
				$str=$v[$name];
			}
		}
	}

	return $str;
	
}


function model($id='',$type=''){
	
		$modelarr=array('单页模型','列表模型','图片模型');
		if(empty($type)){
			$list='';
			$list.='<select name="modelid">';
			foreach($modelarr as $key=>$v){
				$selected='';	
				if($key==$id) $selected='selected="selected"';
				$list.='<option value="'.$key.'" '.$selected.'>'.$v.'</option>';	
			}
			$list.='</select>';
			return $list;
			
		}else{
			
			if(array_key_exists($id,$modelarr)){
				return $modelarr[$id];
			}
			
		}

}

//获取到几级分类
function pathclass($id,$pathkey,$f='',$db='category'){

	$t=M($db);
	$onerow=$t->where(array('id'=>$id))->find();
	
	$patharr=explode(',',$onerow['path']);

	$row=$t->where(array('id'=>$patharr[$pathkey]))->find();

	if(empty($f)){
		return $row;
	}else{
		return $row[$f];
	}

	
}


?>