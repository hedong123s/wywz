<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
a						{ text-decoration: none; color: #002280 }
a:hover					{ text-decoration: underline }
body					{ font-size: 9pt; }
table					{ font: 9pt Tahoma, Verdana; color: #000000 }
input,select,textarea	{ font: 9pt Tahoma, Verdana; font-weight: normal; }
select					{ font: 9pt Tahoma, Verdana; font-weight: normal; }
.nav					{ font: 9pt Tahoma, Verdana; color: #000000; font-weight: bold }
.nav a					{ color: #000000 }
.header					{ font: 9pt Tahoma, Verdana; color: #FFFFFF; font-weight: bold; background-color: #4FB4DE }
.header a				{ color: #FFFFFF }
.category				{ font: 9pt Tahoma, Verdana; color: #000000; background-color: #fcfcfc }
.tableborder			{ background: #C9F1FF; border: 1px solid #4FB4DE;margin:0 auto;} 
.singleborder			{ font-size: 0px; line-height: 1px; padding: 0px; background-color: #F8F8F8 }
.smalltxt				{ font: 9pt Tahoma, Verdana }
.outertxt				{ font: 9pt Tahoma, Verdana; color: #000000 }
.outertxt a				{ color: #000000 }
.bold					{ font-weight: bold }
</style>
</head>
<body>
<div class="system-message">
<present name="message">
<p class="success">
<table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td height="25"><div align="center">信息提示</div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="80"> 
      <div align="center">
	  <br>
        <b><?php echo($message); ?></b>
		 <br>
        <br><a href="<?php echo($jumpUrl); ?>" id="href">如果您的浏览器没有自动跳转，请点击这里</a>
<br/>
<br/>
	  </div></td>
  </tr>
</table>
</p>
<else/>

<p class="error">
<table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td height="25"><div align="center">信息提示</div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="80"> 
      <div align="center">
	  <br>
        <b><?php echo($error); ?></b>
		 <br>
        <br><a href="<?php echo($jumpUrl); ?>" id="href">如果您的浏览器没有自动跳转，请点击这里</a>
<br/>
<br/>
	  </div></td>
  </tr>
</table>
</p>
</present>
<p class="jump" style="display:none;"><b id="wait"><?php echo($waitSecond); ?></b></p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>