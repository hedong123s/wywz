// JavaScript Document
/* ===============================

@ title:系统GOODS商品规格js
@ author:flc
@ company:jiufang
@ creattime:2014年6月16日 11:21:04
@ updatetime:2014年6月19日 10:54:48

=================================*/

//开启/关闭规格按钮
$(function(){
	//开启规格
	$(".openSpecBtn").live("click",function(){
		openSpecFun();  //开启规格函数
	})
	//关闭规格
	$(".closeSpecBtn").click(function(){
		$("#specAttr").val('');
		checkSpecBtn();  //判断规格开关
	})
})

//开启规格函数
function openSpecFun(){
	var defaultSpecAttrVal=$("#specAttr").val();
	$.dialog.data("specAttr",defaultSpecAttrVal);//数据同步
	$.dialog.open(_config.openSpecHtml,{
		title: '选择商品规格与属性',
		width:'80%',
		height:'80%',
		lock:'true',
		fixed:'true',
		init:function(){
			var iframe=$(this.iframe).contents();
			if (!!this.iframe.contentWindow.document.body) {   //加载完成才执行效果
				iframe.find("#specAttr").val($.dialog.data("specAttr"))  //将值赋值给框架内规格属性表单
				this.iframe.contentWindow.getSpecVal()  //执行框架内的函数
			}
		},
		ok:function(){
			var iframe=$(this.iframe).contents();
			if (!!this.iframe.contentWindow.document.body) {   //加载完成才执行效果
				var specAttrVal=iframe.find("#specAttr").val();  //获取框架内的规格属性值
				$.dialog.data("specAttr",specAttrVal)  //写入框架共享数据
				$("#specAttr").val(specAttrVal);   //将数据写入到当前规格属性表单
				if(defaultSpecAttrVal!=specAttrVal){
					checkSpecBtn();  //判断规格开关
				}
			}
		}
	})
}

//通过判断规格开关，给予不同显示
function checkSpecBtn(goodsid){
	var val=$("#specAttr").val();
	if(val!=''){
		$(".openSpecBtn").text("修改规格");
		$(".closeSpecHtml").show();
	}else{
		$("#specAttr").val('');
		$(".openSpecBtn").text("开启规格")
		$(".closeSpecHtml").hide();
	}
	getSpecAttrPrice(goodsid);  //显示规格属性等设置
}

//通过规格属性，列出规格属性及属性价格
function getSpecAttrPrice(goodsid){
	var specAttrVal=$("#specAttr").val();
	if(specAttrVal==''){
		$(".setSpecAttrTr,.setAttrPriceTr").hide();
		$(".setSpecAttrHtml,.setAttrPriceHtml").empty();
		return false;
	}
	
	$(".setSpecLoadingTr").show();	
	//开始运算
	$.get(_config.getSpecAttrJson,{"specAttrVal":specAttrVal,"goodsId":goodsid,"rnd":Math.random()},function(data){
		if(data.stats='ok'){
			var specAttr=data.specattr;
			var attrPrice=data.attrprice;
			
			//规格属性HTML
			var setSpecAttrHtml='',seti=1;
			$.each(specAttr,function(i,v){
				setSpecAttrHtmlClass=seti==1?'':'mt12';
				setSpecAttrHtml+='<div class="setWrap setSpecAttr '+setSpecAttrHtmlClass+'">';
				isPicCheck=v.ispic==1?' checked="checked" ':'';
				setSpecAttrHtml+='<div class="setWrapTit">规格：<input type="text" class="sys_text sys_text80" name="info[spec]['+v.specid+'][specname]" value="'+v.specname+'" /> <label><input type="checkbox" value="1" name="info[spec]['+v.specid+'][ispic]" '+isPicCheck+'> 本规格以图片展示</label></div>';
				setSpecAttrHtml+='<table cellpadding="0" cellspacing="0" border="0" width="100%" class="setWrapListTable">';
				setSpecAttrHtml+='<tr><th width="150">属性</th><th>属性缩略图</th></tr>';
				
				$.each(v.attr,function(ii,vv){
					setSpecAttrHtml+='<tr>'
					setSpecAttrHtml+='<td><input type="text" class="sys_text sys_text120 specAttrName" data-attrid="'+vv.id+'" name="info[spec]['+v.specid+'][attr]['+vv.id+'][attrname]" value="'+vv.name+'"></td>';
					setSpecAttrHtml+='<td><input type="text" class="sys_text sys_text200 specThumbPicurl" id="specThumb_'+vv.id+'" name="info[spec]['+v.specid+'][attr]['+vv.id+'][picurl]" value="'+vv.picurl+'"> <input type="button" class="sys_btn" value="上传" onClick="getuploadify(\'uploadify\',\'缩略图上传\',\'image\',\'image\',1,2097152,\'specThumb_'+vv.id+'\')" />';
					setSpecAttrHtml+='<span class="specThumbTool">';
					if(vv.picurl!='') setSpecAttrHtml+='<a href="javascript:;" class="specThumbToolDefault" data-picurl="'+vv.picurl+'">恢复默认缩略图</a> | ';
					setSpecAttrHtml+='<a href="javascript:;" class="specThumbToolShow">查看当前缩略图</a></span></td>';
					setSpecAttrHtml+='</tr>';
				})
				setSpecAttrHtml+='</table></div>';
				seti++;
			})
			$(".setSpecAttrHtml").html(setSpecAttrHtml);
			$(".setSpecAttrTr").show();
			
			//属性价格HTML
			var _mktprice=$("#mktprice").val();
			var _price=$("#price").val();
			var setAttrPriceHtml='',setkey=0;
			setAttrPriceHtml+='<div class="setWrap setSpecAttr">';
			setAttrPriceHtml+='<table cellpadding="0" cellspacing="0" border="0" width="100%" class="setWrapListTable">';
			setAttrPriceHtml+='<tr><th width="150">规格属性</th><th width="120">市场价</th><th width="120">本网价</th><th>&nbsp;</th></tr>';
			$.each(attrPrice,function(i,v){
				var attrPriceName='',attrPriceVal='';
				$.each(v.name,function(ii,vv){
					attrPriceName+=attrPriceName==''?'':' / ';
					attrPriceName+='<span class="attrPriceName_'+ii+'">'+vv+'</span>'
					attrPriceVal+=attrPriceVal==''?'':'_';
					attrPriceVal+=ii;
				})
				setAttrPriceHtml+='<tr>';
				setAttrPriceHtml+='<input type="hidden" name="info[goods_attr][attr]['+setkey+']" value="'+attrPriceVal+'" />';
				setAttrPriceHtml+='<td>'+attrPriceName+'</td>';
				_mktprice=v.mktprice==''?_mktprice:v.mktprice;
				setAttrPriceHtml+='<td><input type="text" class="sys_text sys_text100" name="info[goods_attr][mktprice]['+setkey+']" value="'+_mktprice+'"  onKeyUp="if(isNaN(value))execCommand(\'undo\')" onafterpaste="if(isNaN(value))execCommand(\'undo\')"></td>';
				_price=v.price==''?_price:v.price;
				setAttrPriceHtml+='<td><input type="text" class="sys_text sys_text100" name="info[goods_attr][price]['+setkey+']" value="'+_price+'" onKeyUp="if(isNaN(value))execCommand(\'undo\')" onafterpaste="if(isNaN(value))execCommand(\'undo\')"></td>';
				setAttrPriceHtml+='<td>&nbsp;</td>';
				setAttrPriceHtml+='</tr>';
				setkey++;
			})
			setAttrPriceHtml+='</table></div>';
			
			$(".setAttrPriceHtml").html(setAttrPriceHtml);
			$(".setAttrPriceTr").show();
			
		}else{
			alert("参数错误");
			$(".setSpecAttrTr,.setAttrPriceTr").hide();
			$(".setSpecAttrHtml,.setAttrPriceHtml").empty();
		}
		$(".setSpecLoadingTr").hide();		
	},"json")
}

//恢复默认缩略图，查看当前缩略图
$(function(){
	$(".specThumbToolDefault").live("click",function(){
		var picurl=$(this).closest("tr").find("input.specThumbPicurl");
		picurl.val($(this).attr("data-picurl"));
	})
	
	$(".specThumbToolShow").live("click",function(){
		var val=$(this).closest("tr").find("input.specThumbPicurl").val();
		if($.trim(val)==''){
			$.dialog.alert("请先上传缩略图");
			return false;
		}else{
			$.dialog({
				title:false,
				id:"thumbShow",
				content:'<img src="'+_config.ROOT+val+'" width="400" />',
				padding: 10,
			});
		}		
	})
})

//修改属性，属性价格同样修改
$(function(){
	$(".specAttrName").live("keyup blur",function(){
		var i=$(this);
		attrid=i.attr("data-attrid");
		$(".attrPriceName_"+attrid).text(i.val());
	})
})