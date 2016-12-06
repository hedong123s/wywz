<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo getSeo();?>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/cn/style/base.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/cn/style/sys.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/cn/style/master.css" />
<script type="text/javascript" src="__PUBLIC__/cn/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/cn/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="__PUBLIC__/cn/js/base.js"></script>
</head>

<body>
<!--header-->
<div class="headerm">
	<div class="w1100 header clearfix">
    	<div class="logo fl"><a href="<?php echo U('Index/cn');?>"><img src="__PUBLIC__/cn/images/logo.jpg" /></a></div>
        <div class="nav fl">
        	<ul>
            	<li <?php if($navId == 1): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Index/cn');?>">首页</a></li>
                <li <?php if($navId == 2): ?>class="cur"<?php endif; ?>><a href="<?php echo UU('Content/lists',array('cid'=>16));?>">关于我们</a></li>
                <li <?php if($navId == 3): ?>class="cur"<?php endif; ?>><a href="<?php echo UU('Content/lists',array('cid'=>12));?>">新闻中心</a></li>
                <li <?php if($navId == 4): ?>class="cur"<?php endif; ?>><a href="<?php echo UU('Content/lists',array('cid'=>13));?>">产品中心</a></li>
                <li <?php if($navId == 5): ?>class="cur"<?php endif; ?>><a href="<?php echo UU('Content/lists',array('cid'=>14));?>">荣誉客户</a></li>
                <li <?php if($navId == 6): ?>class="cur"<?php endif; ?>><a href="<?php echo UU('Content/lists',array('cid'=>15));?>">下载中心</a></li>
                <li <?php if($navId == 7): ?>class="cur"<?php endif; ?>><a href="<?php echo UU('Content/lists',array('cid'=>20));?>">联系我们</a></li>
            </ul>
        </div>
        <div class="language fl"><a href="<?php echo U('Index/cn');?>" class="cur">中</a>| <a href="<?php echo U('Index/en');?>">EN</a></div>
    </div>
</div>
<!--header-->

<!--banner-->
<?php if($navId == 1): ?><script type="text/javascript" src="__PUBLIC__/en/js/slide/jquery.easing.1.3.js"></script>
<style type="text/css">
/* slide-banner */
.slide-banner{height:450px;overflow:hidden;position:relative;}
.banner-bg{position:absolute;left:0;top:0;height:450px;z-index:1;width:100%;background-color:#f4f4f4;background-position:50% 0;}
.banner-nav-bg{height:70px;position:relative;z-index:199;bottom:70px;}
.banner-nav{position:absolute;left:50%;bottom:87px;z-index:999;}
.banner-nav li{background:url(__PUBLIC__/en/images/icons.png) no-repeat;}
.banner-nav li{float:left;width:16px;height:16px;background-position:3px 0px;margin-right:8px;cursor:pointer;}
.banner-nav li.active{background-position:-20px 0px;}
.banner-content{width:1100px;margin:0 auto;position:relative;height:450px;z-index:100;}
.banner-img{position:absolute;z-index:2;left:-150%;}
.banner-bar-bg{width:100%;height:3px;margin:0 auto;bottom:71px;position:relative;z-index:99999; display:none;}
.banner-bar{height:3px;width:0;background:#00925f;position:absolute;left:0;z-index:999;}
</style>
<div class="slide-banner">

	<div class="banner-bg" style="display:block;background-image:url(__PUBLIC__/en/images/img/1p0.jpg);"></div>
	
	<div class="banner-content">
		<a class="banner" data-bg="__PUBLIC__/en/images/img/1p0.jpg" href="javascript:;">
			<div class="banner-img" style="left:0"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/1p1.png" alt=""></div>
			<div class="banner-img" style="left:0"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/1p2.png" alt=""></div>
			<div class="banner-img" style="left:0"><img style="display:none" /> </div>
		</a>
		
		<a class="banner" data-bg="__PUBLIC__/en/images/img/2p0.jpg" href="javascript:;">
			<div class="banner-img"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/2p1.png" alt=""></div>
			<div class="banner-img"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/2p2.png" alt=""></div>
			<div class="banner-img"><img style="display:none" /> </div>
		</a>
        
        <a class="banner" data-bg="__PUBLIC__/en/images/img/3p0.jpg" href="javascript:;">
			<div class="banner-img"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/3p1.png" alt=""></div>
			<div class="banner-img"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/3p2.png" alt=""></div>
			<div class="banner-img"><img style="display:none" /> </div>
		</a>
        
        <a class="banner" data-bg="__PUBLIC__/en/images/img/4p0.jpg" href="javascript:;">
			<div class="banner-img"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/4p1.png" alt=""></div>
			<div class="banner-img"><img style="margin-left: 0px" src="__PUBLIC__/en/images/img/4p2.png" alt=""></div>
			<div class="banner-img"><img style="display:none" /> </div>
		</a>
	</div>
	
	<div class="banner-nav-bg"></div>
	
	<ul class="banner-nav">
		<li class="active"></li>
		<li></li>
		<li></li>
        <li></li>
	</ul>
	
	<div class="banner-bar-bg">
		<div class="banner-bar"></div>
	</div>
	
</div>
<script type="text/javascript" src="__PUBLIC__/en/js/slide/bannerSlide.js"></script>
<?php else: ?>
<div class="aboutbanner" style="background:url(<?php echo ($aboutBanner); ?>) no-repeat center center;"></div><?php endif; ?>
<!--banner-->

<!--itype-->
<div class="w1100 itype">
	<ul class="clearfix">
    	<?php $itypeArr=M("category")->where("pid=13 and checkinfo=0")->order("orderid asc,id asc")->limit(4)->select(); ?>
    	<?php if(is_array($itypeArr)): $num = 0; $__LIST__ = $itypeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fo): $mod = ($num % 2 );++$num;?><li>
        	<div class="itypeWrap">
            	<div class="itypePic"><img src="__ROOT__/<?php echo (thumb($fo['picurl'],260,150)); ?>" width="260" height="150" /></div>
                <div class="itypeIco itypeIco<?php echo ($i); ?>"></div>
                <div class="itypeList">
                	<?php $itypeSubArr=M("category")->where("pid=".$fo['id']." and checkinfo=0")->order("orderid asc,id asc")->limit(4)->select(); ?>
                    <?php if(is_array($itypeSubArr)): $i = 0; $__LIST__ = $itypeSubArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$foo): $mod = ($i % 2 );++$i;?><p><a href="<?php echo U('Content/lists',array('cid'=>$foo['id']));?>" title="<?php echo (escapeshow($foo['classname'])); ?>"><?php echo (escapeshow($foo['classname'])); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="itpyeMore"><a href="<?php echo U('Content/lists',array('cid'=>$fo['id']));?>" title="<?php echo (escapeshow($fo['classname'])); ?>">查看详情</a></div>
                </div>
                <div class="itypeT">
                	<p class="itypeTtip">
                    <?php switch($num): case "1": ?>大容量/方便易携带<?php break;?>
                        <?php case "2": ?>携带方便/操作简便易行/性能稳定可靠<?php break;?>
                        <?php case "3": ?>方便快捷/高品质<?php break;?>
                        <?php case "4": ?>做工精良/新潮、时尚<?php break; endswitch;?>
                    </p>
                	<p class="itypeTit"><a href="<?php echo U('Content/lists',array('cid'=>$fo['id']));?>" title="<?php echo (escapeshow($fo['classname'])); ?>"><?php echo (escapeshow($fo['classname'])); ?></a></p>
                </div>
            </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<!--itype-->

<!--hotproduct-->
<div class="w1100 hotProduct">
	<div class="hotProductT clearfix">
		<div class="hotProductTit fl">热门产品</div>
        <div class="hotProductHd fr hd">
        	<a href="javascript:;" class="prev">prev</a>
            <a href="javascript:;" class="next">next</a>
        </div>
    </div>
    <div class="hotProductList">
    	<ul class="clearfix">
        	<?php $hotProList=M("content")->where("instr(path,'0,13,')>0 and instr(flag,'h')>0 and checkinfo=0")->order("orderid desc,id desc")->limit(12)->select(); ?>
            <?php if(is_array($hotProList)): $i = 0; $__LIST__ = $hotProList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fo): $mod = ($i % 2 );++$i;?><li>
            	<a href="<?php echo U('Content/show',array('id'=>$fo['id']));?>" target="_blank" title="<?php echo (escapeshow($fo['title'])); ?>">
                    <img src="__ROOT__/<?php echo (thumb($fo['picurl'],260,175)); ?>" width="260" height="175" />
                    <span class="hotProductMbg"></span>
                    <span class="hotProductMTit"><?php echo (restrlen(escapeshow($fo['title']),32)); ?></span>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">jQuery(".hotProduct").slide({ mainCell:".hotProductList ul",effect:"leftLoop",vis:4,scroll:4,autoPlay:true,autoPage:true});</script>
<!--hotproduct-->

<!--wrap-->
<div class="w1100 clearfix mt20">
	<div class="fl inews">
    	<div class="inewsTit">新闻中心</div>
        <div class="inewsList">
        	<?php if($r=M("content")->where("instr(path,'0,12,')>0 and checkinfo=0")->order("orderid desc,id desc")->limit(3)->getField("title,id,posttime")){ ?>
        	<ul>
            	<?php if(is_array($r)): $i = 0; $__LIST__ = $r;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fo): $mod = ($i % 2 );++$i;?><li><em><?php echo (getdatetime($fo['posttime'],'Y.m.d')); ?></em><a href="<?php echo U('Content/show',array('id'=>$fo['id']));?>" target="_blank" title="<?php echo (escapeshow($fo['title'])); ?>"><?php echo (restrlen(escapeshow($fo['title']),55)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php }else{echo "Nothing";} ?>
        </div>
    </div>
    
    <div class="fr ibtn">
    	<div class="ibtn1"><a href="<?php echo U('Content/lists',array('cid'=>14));?>">Honor</a></div>
        <div class="ibtn2"><a href="<?php echo U('Content/lists',array('cid'=>20));?>">Contact</a></div>
    </div>
</div>
<!--wrap-->

<!--footer-->
<div class="footerm">
	<p>联系电话:<?php echo C('cfg_tel');?>    手机号码:<?php echo C('cfg_mobile');?>    联系传真:<?php echo C('cfg_fax');?></p>
    <p>工厂地址：<?php echo C('cfg_facaddress');?>  公司地址：<?php echo C('cfg_comaddress');?></p>
	<p>Copyritht © 2008-<?php echo getdatetime(time(),'Y');?> 富鼎能源有限公司 All Rights Reserved  技术支持:<a href="http://www.dos999.com" target="_blank">九方互联</a> <?php echo C('cfg_count_code');?></p>
</div>
<!--footer-->
</body>
</html>