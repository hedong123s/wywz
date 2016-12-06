<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
<link rel="stylesheet" type="text/css" href="__TMPL__style/base.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/main.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/dialog.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__style/skin/layer.css" />

<script type="text/javascript" src="__TMPL__js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__js/artDialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="__TMPL__js/artDialog/plugins/iframeTools.source.js"></script>
<script type="text/javascript" src="__TMPL__js/base.js"></script>
<script type="text/javascript" src="__TMPL__js/main.js"></script>
<script type="text/javascript"   src="__TMPL__js/getuploadify.js" ></script>
<script type="text/javascript"   src="__TMPL__js/formvalidator.js" ></script>
<script type="text/javascript"   src="__TMPL__js/formvalidatorregex.js" ></script>
<script src="__ROOT__/data/ueditor/ueditor.config.js" type="text/javascript"></script>
<script src="__ROOT__/data/ueditor/ueditor.all.min.js" type="text/javascript"></script>
<script type="text/javascript" src="__ROOT__/data/ueditor/lang/zh-cn/zh-cn.js"></script>
<?php if($_GET['menuid']== ''): ?><script type="text/javascript">
	$(function(){
		$("#cat_search").keyup(function(){
			if($.trim($(this).val())!=''){
				$.ajax({
					url:'<?php echo U('category/public_ajax_search');?>',
					data:'classname='+$.trim($(this).val()),
					type:'GET',
					dataType:'html',
					success:function(data){
						if(data!=''){
							$("#search_div").show();
							$("#search_div").html(data);
						}else{
							$("#search_div").hide();
							$("#search_div").html('');
						}

					
					}
				})
			}else{
				$("#search_div").hide();
			}

		})
	})
</script><?php endif; ?>

</head>
<body>


<?php if($_GET['menuid']== ''): ?><style type="text/css">
html{_overflow-y:scroll}
.showMsg{border: 1px solid #339ddc; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
.showMsg h5{background-image: url(__TMPL__images/msg.png);background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
.showMsg .content{ margin-top:50px; font-size:14px; height:64px; position:relative}
#search_div{ position:absolute; top:24px; border:1px solid #dfdfdf; text-align:left; padding:1px; left:71px; width:304px; background-color:#FFF;  font-size:12px;border-top:0;display:none;}
#search_div li{ line-height:24px;}
#search_div li a{  padding-left:6px;display:block}
#search_div li a:hover{ background-color:#e2eaff}

</style>
<div class="showMsg" style="text-align:center">
	<h5>快速进入</h5>
    <div class="content">
	<input type="text" size="41" class="sys_text" id="cat_search" style="width:300px;" value="输入“拼音”或者“栏目名称”可快速搜索" onFocus="if(this.value == this.defaultValue) this.value = ''" onBlur="if(this.value.replace(' ','') == '') this.value = this.defaultValue;">
    <ul id="search_div">
	</ul>
	</div>
</div>

<!--<p style="font-size:12px;position:absolute;top:44%;left:50%;margin:-50px 0 0 -100px;">请点击左侧分类</p>-->
<?php else: ?>

<!--add-tab-->
<div class="add-tab">

	<div class="at_tab">
		<a href="javascript:;" class="cur"><i><?php echo ($data['classname']); ?>管理</i></a> | 
		<a href="<?php echo U('content/add',array('menuid'=>$data['id']));?>"><i>添加内容</i></a>

	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->
<!--table-list-->
<div class="table-edit">
<form name="myform" id="myform"  method="post" action="">

<!--table-list-->
<div class="table-list ">

	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-list_tb">
		<tr>
			<th width="15" class="nobg"><input type="checkbox" value="" id="check_box" ></th>
			<th width="35">排序</th>
			<th width="35">ID</th>
			<th>标题</th>
			<th width="40">点击量 </th>
			<th width="70">发布人</th>
			<th width="118">更新时间</th>
			<th width="110">操作</th>
		</tr>
		<?php if($list): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><tr>
			<td><input type="checkbox" value="<?php echo ($foo['id']); ?>" name="id[]"></td>
			<td><input type="text" class="sys_text" style="width:25px;text-align:center;" name="orderid[<?php echo ($foo['id']); ?>]" value="<?php echo (intval($foo["orderid"])); ?>" /></td>
			<td align="center"><?php echo ($foo["id"]); ?></td>
			<td><a href="<?php echo U('edit',array('id'=>$foo['id'],'menuid'=>$foo['pid']));?>" style="color:<?php echo ($foo['style'][0]); ?>;font-weight:<?php echo ($foo['style'][1]); ?>;"><?php echo (escapeshow($foo["title"])); ?></a> <?php if($foo["picurl"] != '' ): ?><a href="__ROOT__/<?php echo ($foo["picurl"]); ?>" target="_blank"><img src="__TMPL__images/infoimg_ico.png" title="有缩略图,点击可查看"></a>&nbsp;<?php endif; ?> 
				<span style="color:#999;">
                	<?php $flagArr=explode(",",$foo['flag']);$configFlagArr=C("contentflag");?>
                    <?php if(is_array($flagArr)): foreach($flagArr as $key=>$flagVal): echo ($configFlagArr[$flagVal]); ?>&nbsp;<?php endforeach; endif; ?>
                </span>	
			</td>
			<td align="center" ><?php echo ($foo["hits"]); ?></td>
			<td align="center"  ><?php echo ($foo["username"]); ?></td>
			<td align="center"  ><?php echo (getdatetime($foo["updatetime"])); ?></td>
			<td align="center" ><a href="<?php echo U('content/checkinfo',array('id'=>$foo['id'],'menuid'=>$foo['pid']));?>"><?php if($foo["checkinfo"] == '0'): ?>已审核<?php else: ?><span style="color:red;">未审核</span><?php endif; ?></a> | <a href="<?php echo U('content/edit',array('id'=>$foo['id'],'menuid'=>$foo['pid']));?>">修改</a> | <a href="<?php echo U('content/del',array('id'=>$foo['id']));?>" onClick="return del(0);">删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
		<tr><td colspan="8" class="nodata">暂无相关数据</td></tr><?php endif; ?>
	</table>

	<div class="tools-list">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
		
				<td colspan="2">
				<label for="check_box">全选/取消</label>
					<input type="button" class="sys_btn" value="删除" onClick="myform.action='<?php echo U('del');?>';return confirm_del();" /> 
					&nbsp;<input type="button" class="sys_btn" value="排序" onClick="myform.action='<?php echo U('orderid',array('menuid'=>$data['id']));?>';myform.submit();" /> 
				</td>
				<td class="bk_right">
					<div class="pages"><?php echo ($page); ?></div>
				</td>
			</tr>
		</table>
	</div>

</div>

<!--/table-list-->
	</form>

</div>
<!--/table-list--><?php endif; ?>
</body>
</html>