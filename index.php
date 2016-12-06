<?php
/*
 九方互联CMS
 @版本：V1.2 企业版
 @最后更新时间：2014年7月24日 10:19:40
*/

if (@!get_magic_quotes_gpc()) {
    function stripslashes_deep($value) {
        $value = is_array($value) ? array_map('stripslashes_deep', $value) :addslashes($value);
        return $value;
    }
	
    $_GET     = array_map('stripslashes_deep', $_GET);
    $_POST    = array_map('stripslashes_deep', $_POST);
    $_COOKIE  = array_map('stripslashes_deep', $_COOKIE);
    $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}



define ( 'THINK_PATH', 'App/ThinkPHP/' );
define ( 'APP_DEBUG', true ); // 开启调试错误
define ( 'APP_NAME', 'App' );
define ( 'APP_PATH', 'App/');
define ( 'HTML_PATH','html');
require (THINK_PATH . '/ThinkPHP.php');

?>