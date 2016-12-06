<?php 

return array (
	'URL_MODEL' => 0, //默认是1
	'URL_HTML_SUFFIX' => 'html',  //URL的静态后缀
	'DEFAULT_THEME' => 'default',
	'HTML_FILE_SUFFIX' =>'.html',  //静态文件后缀
	
	'HTML_CACHE_ON'=>true, // 开启静态缓存
	'HTML_CACHE_TIME'=>5, // 静态缓存有效期 
	'HTML_CACHE_RULES'=> array(
		'content:lists' => array('/content/lists/{cid}/{p|getHtmlPage}'),  //栏目列表页
		'content:show' => array('/content/show/{id}'),  //内容详细页
		
		
		/*静态生成规则
		一：分页相关要求
			1.所有分页，作为最后参数（p），getHtmlPage函数：如：'shop:lists' => array('/shop/lists/{cid}/{p|getHtmlPage}')
			2.生成所有分页需要考虑第一页生成index.html和1.html的情况
			3.其他参数作为文件夹是生成
		二：不带分页，根据规则，可随意写规则
		三：参数|函数，可通过返回值生成目录或对应的html文件
		*/
	)
)

?>