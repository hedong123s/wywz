<script type="text/javascript">

		<?php 
			echo '$("#'.$_GET['tid'].'").trigger("click")';
		?>

</script>
<?php 
$menu_arr=array(
	

	'4'=>array(

		'title'=>'内容',
		'menu'=>array(
			array(
					'title'=>'内容发布管理',
					'menu'=>array(
						array(	'title'=>'管理内容','url'=>'g=Admin&m=sort_iframe&a=menu','target'=>'sort_iframe','id'=>'content_manage'),

					),
			),			
		
			
			array(
					'title'=>'发布管理',
					'menu'=>array(
						array(	'title'=>'生成内容列表页','url'=>'g=Admin&m=html&a=contentcategory'),
						array(	'title'=>'生成内容显示页','url'=>'g=Admin&m=html&a=contentshow'),
						//array(	'title'=>'一键清理数据','url'=>'g=admin&m=content&a=clear_data'),
					),
			),			
			
		
			array(
					'title'=>'内容相关设置',
					'menu'=>array(
						array(	'title'=>'管理栏目','url'=>'g=admin&m=category','id'=>'category_manage'),

					),
			),

		),
	
	),	
	

	'1'=>array(

		'title'=>'控制面板',
		'menu'=>array(
			array(
					'title'=>'个人信息',
					'menu'=>array(
						array(	'title'=>'修改个人信息','url'=>'g=admin&m=admin_manage&a=public_edit_info'),
						array(	'title'=>'修改密码','url'=>'g=admin&m=admin_manage&a=public_edit_pwd'),
					),
			),			
		
		),
	
	),	
	
	'2'=>array(

		'title'=>'设置',
		'menu'=>array(
			array(
					'title'=>'相关设置',
					'menu'=>array(
						array(	'title'=>'基本设置','url'=>'g=admin&m=setting&tab=1','id'=>'setting'),
						array(	'title'=>'附件配置','url'=>'g=admin&m=setting&tab=2'),
						array(	'title'=>'性能配置','url'=>'g=admin&m=setting&tab=3'),
						array(	'title'=>'会员配置','url'=>'g=admin&m=setting&tab=4'),
						array(	'title'=>'互动配置','url'=>'g=admin&m=setting&tab=5'),
						array(	'title'=>'水印配置','url'=>'g=admin&m=setting&tab=10'),
						array(	'title'=>'邮箱配置','url'=>'g=admin&m=setting&tab=11'),
					),
			),

			array(
					'title'=>'管理员设置',
					'menu'=>array(
						array(	'title'=>'管理员管理','url'=>'g=admin&m=admin_manage'),
					),
			)
		
		),
	
	),	
	

	'3'=>array(

		'title'=>'模块',
		'menu'=>array(
			array(
					'title'=>'模块管理',
					'menu'=>array(
						array(	'title'=>'广告管理','url'=>'g=admin&m=ads&a=category'),
						//array(	'title'=>'友情链接','url'=>'g=admin&m=links'),
						array(	'title'=>'留言信息','url'=>'g=admin&m=message','id'=>'form'),
						//array(	'title'=>'招聘信息','url'=>'g=admin&m=jobs'),
						//array(	'title'=>'在线客服','url'=>'g=admin&m=kefu'),
					),
			),

		),
	
	),
	
	


	
	'5'=>array(

		'title'=>'用户',
		'menu'=>array(
			array(
					'title'=>'会员管理',
					'menu'=>array(
						array(	'title'=>'会员管理','url'=>'g=admin&m=member','id'=>'member'),
					),
			),			
		),
	
	),	
	
/*
	'6'=>array(

		'title'=>'界面',
		'menu'=>array(
			array(
					'title'=>'模板管理',
					'menu'=>array(
						array(	'title'=>'模板风格','url'=>''),
						array(	'title'=>'标签向导','url'=>''),
					),
			),			
			


		),
	
	),
		
	*/
	
	
	'7'=>array(

		'title'=>'扩展',
		'menu'=>array(
			array(
					'title'=>'扩展',
					'menu'=>array(
						//array(	'title'=>'来源管理','url'=>'m=admin&a=copyfrom&c=list'),
						array(	'title'=>'更新全站缓存','url'=>'g=admin&m=cache&a=del_cache'),
						array(	'title'=>'IP禁止','url'=>'g=admin&m=ip'),
						array(	'title'=>'数据库工具','url'=>'g=admin&m=database'),
						array(	'title'=>'联动菜单','url'=>'g=admin&m=linkage'),
					),
			),			
			


		),
	
	),
	

);


if(isset($_GET['id'])){
	$id=intval($_GET['id']);
}else{
	$id=0;
}


if(is_array($menu_arr)  && array_key_exists($id,$menu_arr)){
	$menu_list='';
	foreach($menu_arr[$id]['menu'] as $v){
		$menu_list.='<h4>'.$v['title'].'</h4>';
		$menu_list.='<ul>';
			foreach($v['menu'] as $v2){	
				if(!empty($v2['target'])){
					$target=$v2['target'];
				}else{
					$target='main_iframe';
				}

				if(!empty($v2['id'])){
					$v2['id']=$v2['id'];
				}else{
					$v2['id']='';
				}
		
				$menu_list.='<li><a href="index.php?'.$v2['url'].'"  target="'.$target.'" id="'.$v2['id'].'" >'.$v2['title'].'</a></li>';
			}	
		$menu_list.='</ul>';


	}
	echo  $menu_list;
}

?>


