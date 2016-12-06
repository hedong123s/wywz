<?php
$adsList=M('ad')->where("cid=".$flash_cid." and checkinfo=0")->order("orderid desc,id desc")->limit(5)->select();

if (count($adsList)>0){
$ad_i=1;
$ad_str="";
$ad_link="";
foreach($adsList as $v){
	if($ad_i==1){
		$ad_str="__ROOT__/".$v['picurl'];
		if (!empty($v['url'])){
		$ad_link=$v['url'];
		}
	}else{
		$ad_str.="|__ROOT__/".$v['picurl'];
		if (!empty($row['url'])){
			$ad_link.="|".$v['url'];
		}
	}
	$ad_i++;
}
?>
<script type="text/javascript"> 
var swf_width=<?php echo $flash_width;?>;
var swf_height=<?php echo $flash_height;?>;
var files = '<?php echo $ad_str;?>&AutoPlayTime=3';
var links = '<?php echo $ad_link;?>';
var texts='|';
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="__ROOT__/data/focus/bcastr31.swf"><param name="quality" value="high"><param name="bgcolor" value="#E5E5EB">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
document.write('<embed src="__ROOT__/data/focus/bcastr31.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); 
document.write('</object>'); 
</script>
<?php
}
//注销变量
unset($flash_cid);
unset($flash_width);
unset($flash_height);
unset($ad_str);
unset($ad_link);
unset($ad_count);


//幻灯片 调用方法
/*===============================

$flash_cid="46";
$flash_width=1000;
$flash_height=430;
require('data/focus/adflash.php');

================================*/
?>