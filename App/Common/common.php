<?php
function pass_jm($str){
	$enc_str='87946(523asdfa#sd5453*44a)sf';
	return sha1(md5($str.$enc_str));

}

function type($db,$id='',$type='',$title='title'){
	$t=M($db);
	$row=$t->order("orderid asc,id asc")->select();
	$str='';
	foreach($row as $key=>$v){
		if(empty($type)){
			$select='';
			if($v['id']==$id) $select='selected="selected"';
			$str.='<option value="'.$v['id'].'" '.$select.'>'.$v[$title].'</option>';
		}else{
			if($v['id']==$id){
				$str=$v['title'];
			}
		}	
	}
	return $str;
}

//获取到顶级分类
function topclass($id,$f='',$db='category'){

	$t=M($db);
	$onerow=$t->where(array('id'=>$id,'checkinfo'=>0))->find();
	if(empty($onerow['pid'])){
		 $row=$onerow;

	}else{
		$arr=explode(',',$onerow['path']);
		$row=$t->where(array('id'=>$arr[1],'checkinfo'=>0))->find();
	}

	if(empty($f)){
		return $row;
	}else{
		return $row[$f];
	}

	
}


//获取IP
function getip()
{
	static $realip = NULL;
	if ($realip !== NULL)
	{
		return $realip;
	}
	if (isset($_SERVER))
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			/* 取X-Forwarded-For中第x个非unknown的有效IP字符? */
			foreach ($arr as $ip)
			{
				$ip = trim($ip);
				if ($ip != 'unknown')
				{
					$realip = $ip;
					break;
				}
			}
		}
		elseif (isset($_SERVER['HTTP_CLIENT_IP']))
		{
			$realip = $_SERVER['HTTP_CLIENT_IP'];
		}
		else
		{
			if (isset($_SERVER['REMOTE_ADDR']))
			{
				$realip = $_SERVER['REMOTE_ADDR'];
			}
			else
			{
				$realip = '127.0.0.1';
			}
		}
	}
	else
	{
		if (getenv('HTTP_X_FORWARDED_FOR'))
		{
			$realip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_CLIENT_IP'))
		{
			$realip = getenv('HTTP_CLIENT_IP');
		}
		else
		{
			$realip = getenv('REMOTE_ADDR');
		}
	}
	preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
	$realip = ! empty($onlineip[0]) ? $onlineip[0] : '127.0.0.1';
	return $realip;
}


//获取排序id
function getorderid($db){
	$t=M($db);
	return $t->max('orderid')+1;
}


//返回正确时间格式
function getdatetime($t,$format='Y-m-d H:i:s'){
	return date($format,$t);

}


//获得MySql的版本号
function getversion($isformat=true)
{

    $res = @mysql_query("SELECT VERSION();");
    $row = @mysql_fetch_array($res);;
    $mysql_version = $row[0];
    @mysql_free_result($res);
    if($isformat)
    {
        $mysql_versions = explode(".",trim($mysql_version));
        $mysql_version = number_format($mysql_versions[0].".".$mysql_versions[1],2);
    }
    return $mysql_version;
}

//字符转义
function escape($str) {
	//PHP5.4已经将此函数移除
    if(@!get_magic_quotes_gpc()){
            $str = addslashes($str);
    }
    return trim($str);
}

//去掉\扛，用于显示数据
function escapeshow($str,$iseditor=false){
	if($iseditor){
		return stripslashes($str); //编辑器不转义html
	}else{
		return htmlspecialchars(stripslashes($str));
	}

}



//完全过虑PHP，JS，css

function clearhtml($str){
	
	$str = strip_tags($str);

	//首先去掉头尾空格
	$str = trim($str);

	//接着去掉两个空格以上的
	$str = preg_replace('/\s(?=\s)/', '', $str);

	//最后将非空格替换为一个空格
	$str = preg_replace('/[\n\r\t]/', ' ', $str);

	$str = str_replace('&nbsp;','',$str);

	return trim($str);

}

/*
 * 函数说明：截取指定长度的字符串
 * (UTF-8专用 汉字和大写字母长度算1，其它字符长度算0.5)
 *
 * @param  string  $sourcestr  原字符串
 * @param  int     $cutlength  截取长度
 * @param  string  $etc        省略字符...
 * @return string              截取后的字符串
 */
function restrlen($sourcestr, $cutlength=10, $etc='...')
{
	$returnstr = '';
	$i = 0;
	$n = 0.0;
	$str_length = strlen($sourcestr); //字符串的字节数
	while( ($n < $cutlength) and ($i < $str_length) ){
	   $temp_str = substr($sourcestr, $i, 1);
	   $ascnum = ord($temp_str); //得到字符串中第$i位字符的ASCII码
	   if ( $ascnum >= 252) //如果ASCII位高与252
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 6); //根据UTF-8编码规范，将6个连续的字符计为单个字符
			$i = $i + 6; //实际Byte计为6
			$n++; //字串长度计1
	   }
	   elseif ( $ascnum >= 248 ) //如果ASCII位高与248
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 5); //根据UTF-8编码规范，将5个连续的字符计为单个字符
			$i = $i + 5; //实际Byte计为5
			$n++; //字串长度计1
	   }
	   elseif ( $ascnum >= 240 ) //如果ASCII位高与240
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 4); //根据UTF-8编码规范，将4个连续的字符计为单个字符
			$i = $i + 4; //实际Byte计为4
			$n++; //字串长度计1
	   }
	   elseif ( $ascnum >= 224 ) //如果ASCII位高与224
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
			$i = $i + 3 ; //实际Byte计为3
			$n++; //字串长度计1
	   }
	   elseif ( $ascnum >= 192 ) //如果ASCII位高与192
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
			$i = $i + 2; //实际Byte计为2
			$n++; //字串长度计1
	   }
	   elseif ( $ascnum>=65 and $ascnum<=90 and $ascnum!=73) //如果是大写字母 I除外
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 1);
			$i = $i + 1; //实际的Byte数仍计1个
			$n++; //但考虑整体美观，大写字母计成一个高位字符
	   }
	   elseif ( !(array_search($ascnum, array(37, 38, 64, 109 ,119)) === FALSE) ) //%,&,@,m,w 字符按1个字符宽
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 1);
			$i = $i + 1; //实际的Byte数仍计1个
			$n++; //但考虑整体美观，这些字条计成一个高位字符
	   }
	   else //其他情况下，包括小写字母和半角标点符号
	   {
			$returnstr = $returnstr . substr($sourcestr, $i, 1);
			$i = $i + 1; //实际的Byte数计1个
			$n = $n + 0.5; //其余的小写字母和半角标点等与半个高位字符宽...
	   }
	}
	if ( $i < $str_length )
	{
	   $returnstr = $returnstr.$etc; //超过长度时在尾处加上省略号
	}
	return $returnstr;
}

function getsize($size)
{
	$kb = 1024;          // Kilobyte
	$mb = 1024 * $kb;    // Megabyte
	$gb = 1024 * $mb;    // Gigabyte
	$tb = 1024 * $gb;    // Terabyte

	if($size < $kb)
		return $size.'B';

	else if($size < $mb)
		return round($size/$kb,2).'KB';

	else if($size < $gb)
		return round($size/$mb,2).'MB';

	else if($size < $tb)
		return round($size/$gb,2).'GB';

	else
		return round($size/$tb,2).'TB';
}


//获取图片信息
function getimageinfo($picurl,$key=''){
	if(empty($key)){
		$info=getimagesize($picurl);
	}else{
		$arr=getimagesize($picurl);
		$info=$arr[$key];
	}
	return $info;
}

//获取目录下的文件（不包括子目录）
function get_file($dir){
	    $handler = opendir($dir);
		while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
        if ($filename != "." && $filename != "..") {
                $files[] = $filename ;
           }
       }
    closedir($handler);
	return  $files;
}

//从普通时间转换为Linux时间截
if(!function_exists('GetMkTime'))
{
	function GetMkTime($dtime)
	{
		if(!preg_match("/[^0-9]/", $dtime))
		{
			return $dtime;
		}
		$dtime = trim($dtime);
		$dt = array(1970, 1, 1, 0, 0, 0);
		$dtime = preg_replace("/[\r\n\t]|日|秒/", " ", $dtime);
		$dtime = str_replace("年", "-", $dtime);
		$dtime = str_replace("月", "-", $dtime);
		$dtime = str_replace("时", ":", $dtime);
		$dtime = str_replace("分", ":", $dtime);
		$dtime = trim(preg_replace("/[ ]{1,}/", " ", $dtime));
		$ds = explode(" ", $dtime);
		$ymd = explode("-", $ds[0]);
		if(!isset($ymd[1])) $ymd = explode(".", $ds[0]);
		if(isset($ymd[0])) $dt[0] = $ymd[0];
		if(isset($ymd[1])) $dt[1] = $ymd[1];
		if(isset($ymd[2])) $dt[2] = $ymd[2];
		if(strlen($dt[0])==2) $dt[0] = '20'.$dt[0];
		if(isset($ds[1]))
		{
			$hms = explode(":", $ds[1]);
			if(isset($hms[0])) $dt[3] = $hms[0];
			if(isset($hms[1])) $dt[4] = $hms[1];
			if(isset($hms[2])) $dt[5] = $hms[2];
		}
		foreach($dt as $k=>$v)
		{
			$v = preg_replace("/^0{1,}/", '', trim($v));
			if($v == '')
			{
				$dt[$k] = 0;
			}
		}

		$mt = mktime($dt[3], $dt[4], $dt[5], $dt[1], $dt[2], $dt[0]);
		if(!empty($mt)) return $mt;
		else return time();
	}
}

//创建多级目录
if(!function_exists('mkdirs'))
{
	function mkdirs($dir)
	{ 
		return is_dir($dir) or (mkdirs(dirname($dir)) and mkdir($dir, 0777)); 
	}
}

//读取文件内容
if(!function_exists('Readf'))
{
	function Readf($file)
	{
		if(file_exists($file) && is_readable($file))
		{
			if(function_exists('file_get_contents'))
			{
				$str = file_get_contents($file);
			}
			else
			{
				$str = '';
	
				$fp = fopen($file, 'r');
				while(!feof($fp))
				{
					$str .= fgets($fp, 1024);
				}
				fclose($fp);
			}
			return $str;
		}
		else
		{
			return FALSE;
		}
	}
}


//写入文件内容
if(!function_exists('Writef'))
{
	function Writef($file,$str,$mode='w')
	{
		if(file_exists($file) && is_writable($file))
		{
			$fp = @fopen($file, $mode);
			@flock($fp, 3);
			@fwrite($fp, $str);
			@fclose($fp);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

//获取指定长度随机字符串
if(!function_exists('GetRandStr'))
{
	function GetRandStr($length=6)
	{
		//'!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$random_str = '';
	
		for($i=0; $i<$length; $i++)
		{
			//这里提供两种字符获取方式
			//第一种是使用 substr 截取$chars中的任意一位字符；
			//第二种是取字符数组 $chars 的任意元素
			//$password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
			$random_str .= $chars[mt_rand(0, strlen($chars) - 1)];
		}
	
		return $random_str;
	}
}


/* 参数解释
   $string： 明文 或 密文
   $operation：DECODE表示解密,其它表示加密
   $key： 密匙
   $expiry：密文有效期*/
if(!function_exists('AuthCode'))
{
	function AuthCode($string, $operation='DECODE', $key='', $expiry=0)
	{
		// 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
		// 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
		// 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
		// 当此值为 0 时，则不产生随机密钥
		$ckey_length = 4;
		// 密匙
		$key = md5($key ? $key : $GLOBALS['cfg_auth_key']);
		// 密匙a会参与加解密
		$keya = md5(substr($key, 0, 16));
		// 密匙b会用来做数据完整性验证
		$keyb = md5(substr($key, 16, 16));
		// 密匙c用于变化生成的密文
		$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
		// 参与运算的密匙
		$cryptkey = $keya.md5($keya.$keyc);
		$key_length = strlen($cryptkey);
		// 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，解密时会通过这个密匙验证数据完整性
		// 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
		$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
		$string_length = strlen($string);
		$result = '';
		$box = range(0, 255);
		$rndkey = array();
	
		// 产生密匙簿
		for($i = 0; $i <= 255; $i++)
		{
			$rndkey[$i] = ord($cryptkey[$i % $key_length]);
		}
	
		// 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上并不会增加密文的强度
		for($j = $i = 0; $i < 256; $i++)
		{
			//$j是三个数相加与256取余
			$j = ($j + $box[$i] + $rndkey[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}
	
		// 核心加解密部分
		for($a = $j = $i = 0; $i < $string_length; $i++)
		{
			//在上面基础上再加1 然后和256取余
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;//$j加$box[$a]的值 再和256取余
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			// 从密匙簿得出密匙进行异或，再转成字符，加密和解决时($box[($box[$a] + $box[$j]) % 256])的值是不变的。
			$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
		}
	
		if($operation == 'DECODE')
		{
			// substr($result, 0, 10) == 0 验证数据有效性
			// substr($result, 0, 10) - time() > 0 验证数据有效性
			// substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16) 验证数据完整性
			// 验证数据有效性，请看未加密明文的格式
			if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16))
			{
				return substr($result, 26);
			}
			else
			{
				return '';
			}
		}
		else
		{
			// 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
			// 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
			return $keyc.str_replace('=', '', base64_encode($result));
		}
	}
}

// 获取当前页面完整URL地址
function getUrl() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}

//获取当前页面URL开头（如，http://localhost:8888）
function getHttpUrl() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
	return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
}
?>