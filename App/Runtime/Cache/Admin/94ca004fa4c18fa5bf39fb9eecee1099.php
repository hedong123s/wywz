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
<script type="text/javascript">

	$(document).ready(function(){
	
		$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
		$("#title").formValidator({onshow:"请输入标题",onfocus:"请输入标题"}).inputValidator({min:1,onerror:"请输入标题"})

	})

	
     $(function(){
			UE.getEditor('content');	
			UE.getEditor('content1');	
	 })	 

</script>
<script type="text/javascript" src="__TMPL__Plugin/colorpicker/colorpicker.js"></script>
</head>
<body>

<?php if($data['modelid']=='0'){ ?>
<!--add-tab-->
<div class="add-tab" style="border:0;">
	<div class="at_tab">
		<a href="javascript:;" class="cur"><i>单页内容</i></a>
	

	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->
<!--table-list-->
<div class="table-edit ">
	<form method="post" id="myform">

	<div class="table-edit_form">
		<div id="te_tab_1" class="te_tab_c">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>		
			<tr>
				<th width="200">栏目名称：</th>
				<td><?php echo ($data['classname']); ?></td>
			</tr>			
			<tr style="display:none;">
				<th>标题：</th>
				<td><input type="text" class="sys_text sys_text350" name="ctitle" id="ctitle" value="<?php echo (escapeshow($data['ctitle'])); ?>" /></td>
			</tr>			
			<tr>
				<th>缩略图：</th>
				<td><input type="text" class="sys_text sys_text350" name="cpicurl" id="cpicurl" value="<?php echo ($data['cpicurl']); ?>"  />&nbsp;<input type="button" class="sys_btn" value="上传图片" onClick="getuploadify('uploadify','缩略图1上传','image','image',1,'2mb','cpicurl')" /></td>
			</tr>
			<tr>
				<th>内容：</th>
				<td><textarea id="content" style="height:300px;width:85%;" name="content"><?php echo (escapeshow($data['content'],true)); ?></textarea>  </td>
			</tr>

			</tbody>
		</table>
		</div>
	
	</div>
	<div class="tools-edit">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
				<th width="200">&nbsp;</th>
				<td>
					<input type="submit" class="sys_blue_btn" value="提交" name="send" /> 
					<input type="hidden" value="<?php echo ($data['id']); ?>" name="id">
				
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<!--/table-list-->
<?php }else{ ?>
<!--add-tab-->
<div class="add-tab" style="border:0;">
	<a href="javascript:location.reload();" style="float:right;" class="f5">刷新</a>
	<div class="at_tab">
		<a href="javascript:;" class="cur"><i><?php if(ACTION_NAME == 'add'): ?>添加内容<?php else: ?>编辑内容<?php endif; ?></i></a> | 
		<a href="<?php echo U('content/index',array('menuid'=>$data['id']));?>"><i>信息管理</i></a>

	</div>
	<div class="clearall"></div>
</div>
<!--add-tab-->
<!--table-list-->

<div class="table-edit">
	<form method="post" id="myform" action="<?php echo U('send');?>">
	<div class="table-edit_tab">
		<ul>
			<li data-id="te_tab_1" class="cur"><a href="javascript:;">常规信息</a></li>
			<li data-id="te_tab_2"><a href="javascript:;">其它信息</a></li>
			<li data-id="te_tab_3"><a href="javascript:;">相关信息</a></li>
		</ul>
		<div class="clearall"></div>
	</div>
	<div class="table-edit_form">
		<div id="te_tab_1" class="te_tab_c">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>	
			<tr >
				<th  width="200">所属栏目</th>
				<td>
					<span id="category_text"><?php echo (escapeshow($data['classname'])); ?></span> <input type="hidden" value="<?php echo ($data['id']); ?>" id="pid" name="info[pid]">
				<?php if(ACTION_NAME == 'edit'): ?><span style="padding:0 0 0 15px;color:#1307ff;cursor:pointer;" onClick="editCategory();">修改分类</span><?php endif; ?>
				 
				</td>
			</tr>			

			<tr>
				<th>标题</th>
				<td>
					<input type="text" class="sys_text sys_text350 sys_input_title" name="info[title]" id="title" value="<?php echo (escapeshow($info['title'])); ?>" style="color:<?php echo ($info['style'][0]); ?>;font-weight:<?php echo ($info['style'][1]); ?>;" /><span class="maroon">*</span>
					<div class="title_panel">
						<input type="hidden" name="colorval" id="colorval" value="<?php echo ($info['style'][0]); ?>">
						<input type="hidden" name="boldval" id="boldval" value="<?php echo ($info['style'][1]); ?>" />
					<span title="标题颜色" class="color" onClick="colorpicker('colorpanel','colorval','title');"> </span> <span id="colorpanel"></span> <span title="标题加粗" class="blod" onClick="blodpicker('boldval','title');"> </span> <span title="清除属性" class="clear" onClick="clearpicker()">[#]</span> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					</div>
				</td>
			</tr>
			
			<tr>
				<th>来源</th>
				<td>
					<input type="text" class="sys_text" name="info[source][text]" id="source" value="<?php echo ($info['source'][0]); ?>" />
					
				</td>
			</tr>	
			
			<tr>
				<th>缩略图</th>
				<td>
						<input type="text" class="sys_text sys_text350" name="info[picurl]" id="picurl" value="<?php echo ($info['picurl']); ?>"  />&nbsp;<input type="button" class="sys_btn" value="上传图片" onClick="getuploadify('uploadify','缩略图上传','image','image',1,'2mb','picurl')" />
				</td>
			</tr>			
			<?php if(topclass($_GET['menuid'],'id') == 5 || topclass($_GET['menuid'],'id') == 15): ?><tr>
				<th>附件</th>
				<td>
						<input type="text" class="sys_text sys_text350" name="info[content_arr][down]" id="down" value="<?php echo ($info['content_arr']['down']); ?>"  />&nbsp;<input type="button" class="sys_btn" value="上传" onClick="getuploadify('uploadify','附件上传','soft','soft',1,<?php echo C('cfg_max_file_size');?>,'down')" />
				</td>
			</tr><?php endif; ?>
			
			
			<tr>
				<th>链接地址</th>
				<td><input type="text" class="sys_text" name="info[url]" id="url" value="<?php echo (escapeshow($info['url'])); ?>" /></td>
			</tr>
			
			
			<tr>
				<th>Tag标签</th>
				<td><input type="text" class="sys_text " name="info[tag]" id="tag" value="<?php echo (escapeshow($info['tag'])); ?>" /><span style="color:#999;padding:0 0 0 10px;">多个用逗号,隔开</span></td>
			</tr>
			<tr>
				<th>关键词</th>
				<td><input type="text" class="sys_text " name="info[keywords]" id="keywords" value="<?php echo (escapeshow($info['keywords'])); ?>" /></td>
			</tr>			
			<tr>
				<th>摘要</th>
				<td>
					<textarea class="sys_textarea sys_textarea350" name="info[description]" id="description" ><?php echo (escapeshow($info['description'])); ?></textarea>
					<div> 最多能输入 <strong>255</strong> 个字符 </div>
				</td>
			</tr>			
		
			
		
			<tr>
				<th>内容</th>
				<td><textarea name="info[content]" id="content" style="width:85%;height:300px;"><?php echo (escapeshow($info['content'],true)); ?></textarea></td>
			</tr>		
			
			
			<tr style="display:none;">
				<th>组图</th>
				<td>
				<fieldset class="picarr">
					<legend>列表</legend>
					<div>最多可以上传<strong><?php if(topclass($_GET['menuid'],'id') == 3): ?>3<?php endif; if(topclass($_GET['menuid'],'id') == 29): ?>10<?php endif; ?></strong>张图片<span onClick="getuploadify('uploadify2','组图上传','image','image',<?php if(topclass($_GET['menuid'],'id') == 3): ?>3<?php endif; if(topclass($_GET['menuid'],'id') == 29): ?>10<?php endif; ?>,<?php echo C('cfg_max_file_size');?>,'picarr','picarr_area')">开始上传</span></div>
					<ul id="picarr_area">
						<?php if(trim($info['picarr'][0]) != '' ): if(is_array($info['picarr'])): $i = 0; $__LIST__ = $info['picarr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><li rel="<?php echo ($foo); ?>"><input type="text" name="info[picarr][]" value="<?php echo ($foo); ?>"><a href="javascript:void(0);" onClick="ClearPicArr('<?php echo ($foo); ?>')">删除</a> <a style="padding:0;margin:0;" target="_blank" href="<?php echo ($foo); ?>">查看</a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</ul>
				</fieldset>
				</td>
			</tr>
			
			
			<tr>
				<th>浏览次数</th>
				<td><input type="text" class="sys_text" name="info[hits]" id="hits" value="<?php echo (intval($info['hits'])); ?>" /></td>
			</tr>	
			
			<tr>
				<th>排序</th>
				<td><input type="text" class="sys_text" name="info[orderid]" id="orderid" value="<?php echo (intval($info['orderid'])); ?>" /></td>
			</tr>		
		
			<tr>
				<th>审核</th>
				<td>
					<label><input type="checkbox"   value="1" name="info[checkinfo]"  <?php if($info['checkinfo'] == '1' ): ?>checked="checked"<?php endif; ?> /> 不通过 </label> 
				</td>
			</tr>
			</tbody>
		</table>
		</div>
		<div id="te_tab_2" class="te_tab_c" style="display:none;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="200">属性</th>
				<td>
					<?php $FlagArr=C("contentflag");?>
                	<?php if(is_array($FlagArr)): foreach($FlagArr as $key=>$v): ?><label><input type="checkbox" name="info[flag][]" <?php if( in_array($key,explode(",",$info["flag"])) ): ?>checked="checked"<?php endif; ?> value="<?php echo ($key); ?>" /> <?php echo ($v); ?>[<?php echo ($key); ?>]</label>&nbsp;<?php endforeach; endif; ?>
				</td>
			</tr>
			
			</tbody>
		</table>
		</div>			
		
		<div id="te_tab_3" class="te_tab_c" style="display:none;">
			<input type="hidden" id="relation_id" name="info[relation_id]" value="<?php echo ($info['relation_id']); ?>">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
			<tbody>
			<tr>
				<th width="200">所属栏目</th>
				<td>
					<select id="pid_ajax" name="pid_ajax">
						<option value="">请选择</option>
						<?php echo R('Content/category_node',array(0));?>
					</select>
				</td>
			</tr>			
			<tr>
				<th>相关内容</th>
				<td>
					<select id="option_list" size="2" multiple="multiple" style="width:600px;height:150px;">
						
					</select>
				</td>
			</tr>			
			<tr>
				<th valign="top">已选内容</th>
				<td id="relation_text">
					<ul>
						<?php if(is_array($relation)): $i = 0; $__LIST__ = $relation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><li><span><?php echo ($foo['id']); ?>-<?php echo (escapeshow($foo['title'])); ?></span><a href="javascript:;" data-id="<?php echo ($foo['id']); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</td>
			</tr>
			
			</tbody>
		</table>
		</div>	
		
	</div>
	<div class="tools-edit">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tools-list_tb">
			<tr>
				<th width="165">&nbsp;</th>
				<td>
					<input type="submit" class="sys_blue_btn" value="提交" /> 
					<input type="hidden" value="<?php echo ($info['id']); ?>" name="info[id]">
			
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<!--/table-list-->




<!--修改栏目弹窗-->
<div id="editCategoryDiv" style="display:none;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-edit_tb">
        <tbody>	
        <tr>
            <th width="80">修改栏目</th>
            <td>
            	<select id="edit_pid">
                    <option value="0">请选择</option>
                    <?php echo R('Content/edit_category_node',array(0,topclass($data['id'],'id')));?>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<!--修改栏目弹窗-->

<?php } ?>


</body>
</html>

<script type="text/javascript">
//修改栏目弹窗
function editCategory(){
	$.dialog({
		content:document.getElementById("editCategoryDiv"),
		id:"pricingDialogDiv",
		padding:"10px",
		title:"修改栏目",
		background:"#fff",
		lock:true,
		fixed:true,
		ok:function(){
			var val=$("#edit_pid").val();
			if(val==0){alert("请选择栏目");return false;}
			
			$("#pid").val(val);
			$("#category_text").html('<font style="color:red;">已修改成：</font>'+$("#edit_pid option:selected").attr('text'));
		},
	})
}

$(function(){
	
	
	$("#pid_ajax").change(function(){
	
		$.get('<?php echo U('pulibc_relation_ajax');?>','id='+$(this).val(),function(data){
			
			$("#option_list").html(data);
			
		})
	})
	
	$("#option_list option").live('click',function(){
		
		$("#relation_id").val($("#relation_id").val()+','+$(this).val());
		$("#relation_text ul").append('<li><span>'+$(this).html()+'</span><a href="javascript:;" data-id="'+$(this).val()+'"></a></li>');
	})
	
	$("#relation_text ul li a").live('click',function(){
		$(this).parent("li").remove();
		var dataid='';
		$("#relation_text ul li").find("a").each(function(){
			dataid+=','+$(this).attr('data-id');
			
		})
	
		$("#relation_id").val(dataid);
		
	})
	
})



</script>