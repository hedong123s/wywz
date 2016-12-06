<?php 
/**
* 文件: search.php
* 功能: 搜索指定目录下的HTML文件
*/

class File{


	//获取目录下文件函数
	function getFile($dir)
	{
	$dp = opendir($dir);
	$fileArr = array();
	while (!false == $curFile = readdir($dp)) {
	if ($curFile!="." && $curFile!=".." && $curFile!="") {
	if (is_dir($curFile)) {
	   $fileArr = getFile($dir."/".$curFile);
	} else {
	   $fileArr[] = $dir."/".$curFile;
	}
	}
	}
	return $fileArr;
	}

	//获取文件内容
	function getFileContent($file)
	{
	if (!$fp = fopen($file, "r")) {
	die("Cannot open file $file");
	}
	while ($text = fread($fp, 4096)) {
	$fileContent .= $text;
	}
	return $fileContent;
	}

	//搜索指定文件
	function searchText($file, $keyword)
	{
	$text = $this->getFileContent($file);
	if (preg_match("/$keyword/i", $text)) {
	return true;
	}
	return false;
	}

	//搜索出文章的标题
	function getFileTitle($file, $default="None subject")
	{
	$fileContent = $this->getFileContent($file);
	$sResult = preg_match("/<title>.*<\/title>/i", $fileContent, $matchResult);
	$title = preg_replace(array("/(<title>)/i","/(<\/title>)/i"), "", $matchResult[0]);
		if (empty($title)) {
			return $default;
		} else {
			return $title;
		}
	}

	//获取文件描述信息
	function getFileDescribe($file,$length=200, $default="None describe")
	{
	$metas = get_meta_tags($file);
	if ($meta['description'] != "") {
	return $metas['description'];
	}
	$fileContent = $this->getFileContent($file);
	preg_match("/(<body.*<\/body>)/is", $fileContent, $matchResult);
	$pattern = array("/(<[^\x80-\xff]+>)/i","/(<input.*>)+/i", "/(<a.*>)+/i", "/(<img.*>)+/i", "/([<script.*>])+.*([<\/script>])+/i","/&amp;/i","/&quot;/i","/&#039;/i", "/\s/");
	$description = preg_replace($pattern, "", $matchResult[0]);
	$description = mb_substr($description, 0, $length)." ...";

	return $description;
	}

	//加亮搜索结果中的关键字
	function highLightKeyword($text, $keyword, $color="#C60A00")
	{
	$newword = "<font color=$color>$keyword</font>";
	$text = str_replace($keyword, $newword, $text);
	return $text;
	}

	//获取文件大小(KB)
	function getFileSize($file)
	{
	$filesize = intval(filesize($file)/1024)."K";
	return $filesize;
	}

	//获取文件最后修改的时间
	function getFileTime($file)
	{
	$filetime = date("Y-m-d", filemtime($file));
	return $filetime;
	}

	//搜索目录下所有文件
	function searchFile($dir, $keyword)
	{
	$sFile = $this->getFile($dir);
		if (count($sFile) <= 0) {
		return false;
		}
	$sResult = array();
	foreach ($sFile as $file) {
		if ($this->searchText($file, $keyword)) {
		$sResult[] = $file;
		}
	}
	if (count($sResult) <= 0) {
		return false;
		} else {
		return $sResult;
		}
	}
	
	//文件夹下所有文件
	function deldir($dir) {
	
	  //先删除目录下的文件：
	  $dh=opendir($dir);
	  while ($file=readdir($dh)) {
		if($file!="." && $file!="..") {
		  $fullpath=$dir."/".$file;
		  if(!is_dir($fullpath)) {
			  unlink($fullpath);
		  } else {
			  $this->deldir($fullpath);
		  }
		}
	  }
	  closedir($dh);
	  //删除当前文件夹：
	  if(rmdir($dir)) {
		return true;
	  } else {
		return false;
	  }
	}
}
?>