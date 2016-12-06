<?php
return array(
	//'配置项'=>'配置值'
	
	/* 默认 */
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',
	'TMPL_FILE_DEPR'=>'_',
	'TMPL_CACHE_ON'=>false, //关闭缓存
	'URL_CASE_INSENSITIVE' =>true,	//url不区分大小写
	'URL_PATHINFO_DEPR' =>'-', 
	
	/* 系统变量名称设置*/
    'VAR_GROUP' => 'g', // 默认分组获取变量
    'VAR_MODULE' => 'm', // 默认模块获取变量
    'VAR_ACTION' => 'a', // 默认操作获取变量

	 
	/* 分组  */
	'APP_GROUP_LIST'=>'Home,Admin',
	'DEFAULT_GROUP'=>'Home',
	'APP_GROUP_MODE'=>1, //0普通，1独立  本项目不允许使用普通分组
	'APP_AUTOLOAD_PATH'=>'Modules',
	'TMPL_STRIP_SPACE'=>false,  // 是否去除模板文件里面的html空格与换行
	
    /* 数据缓存设置 
    'DATA_CACHE_TIME'       => 0,      // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS'   => false,   // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK'      => false,   // 数据缓存是否校验缓存
    'DATA_CACHE_PREFIX'     => 'aaa',     // 缓存前缀
    'DATA_CACHE_TYPE'       => 'File',  // 数据缓存类型
    'DATA_CACHE_PATH'       => TEMP_PATH,// 缓存路径设置 (仅对File方式有效)
    'DATA_CACHE_SUBDIR'     => false,  // 使用子目录缓存 (根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL'       => 1,        // 子目录缓存级别
	*/
	
	
	/* 语言 */
	
	'LANG_SWITCH_ON' => true,
	'DEFAULT_LANG' => 'cn', // 默认语言
	'LANG_AUTO_DETECT' => true, // 自动侦测语言
	'LANG_LIST'=>'cn',//必须写可允许的语言列表
	
	
	/* 调试 */
	'SHOW_PAGE_TRACE'=>false, //开启调试信息	
	
    
	/* 加载自定义配置文件 */
	'LOAD_EXT_CONFIG'=>'conn,config_cache,watermark_cache,email_cache,kefu,flag,config_diy',
	
	//加载自定义函数文件
	"LOAD_EXT_FILE"=>"common.diy",


	'cfg_webname'=>'富鼎能源有限公司',
	'cfg_weburl'=>'localhost',
	'cfg_webpath'=>'',
	'cfg_keyword'=>'富鼎能源有限公司',
	'cfg_description'=>'富鼎能源有限公司',
	'cfg_copyright'=>'',
	'cfg_webswitch'=>'Y',
	'cfg_switchshow'=>'升级中',
	'cfg_upload_img_type'=>'gif|png|jpg|bmp',
	'cfg_upload_soft_type'=>'zip|gz|rar|iso|doc|docx|xls|xlsx|ppt|wps|txt',
	'cfg_upload_media_type'=>'swf|flv|mpg|mp3|rm|rmvb|wmv|wma|wav',
	'cfg_max_file_size'=>'2097152',
	'cfg_imgresize'=>'Y',
	'cfg_pagenum'=>'10',
	'cfg_mb_open'=>'Y',
	'cfg_mb_disable'=>'admin,admin888',
	'cfg_mb_allowreg'=>'Y',
	'cfg_feedbackcheck'=>'Y',
	'cfg_replacestr'=>'',
	'cfg_feedback_time'=>'',
	'cfg_count_code'=>'',
	'cfg_runmode'=>'1',
	'cfg_beianhao'=>'',
	'cfg_mobile'=>'15814083660',
	'cfg_tel'=>'86-0755-29580912',
	'cfg_no_category_id'=>'',
	'cfg_webname_en'=>'Shenzhen Fuding New Energy Co., Ltd.',
	'cfg_keyword_en'=>'Shenzhen Fuding New Energy Co., Ltd.',
	'cfg_description_en'=>'Shenzhen Fuding New Energy Co., Ltd.',
	'cfg_fax'=>'86-0755-29580631',
	'cfg_facaddress'=>'江苏省徐州市铜山经济开发区嵩山路220号华聚工业园',
	'cfg_comaddress'=>'广东深圳龙华新区大浪街道高峰社区亿康商务大厦11层',
	'cfg_facaddress_en'=>'Xuzhou city, jiangsu province tongshan economic development zone industrial park of songshan road 220 huaju',
	'cfg_comaddress_en'=>'1988, Yikang Business Building, Gaofeng Community, Dalang Street, Longhua New Dist., Shenzhen, Guangdong, China (Mainland)',

	
);
?>