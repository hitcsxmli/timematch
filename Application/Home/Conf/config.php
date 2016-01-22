<?php
return array(
	'APP_DEBUG' => false,
	'DB_TYPE' => 'mysql', // 数据库类型
	'DB_HOST' => '127.0.0.1', // 服务器地址
	'DB_NAME' => 'timematching', // 数据库名
	'DB_USER' => 'root', // 用户名
	'DB_PWD' => 'camp8418', // 密码
	'DB_PORT' => '3306', // 端口
	'DB_PREFIX' => 'tim_', // 数据库表前缀
	'DB_PARAMS' => array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),
	'DB_FIELDS_CACHE' => false,
	'LOG_RECORD' => true, // 开启日志记录
	'URL_MODEL' => 2,
	'URL_CASE_INSENSITIVE' => true,
	
	'TMPL_PARSE_STRING'    => 	array(
     
		'__JS__'   =>__ROOT__.'/Public/js',
		'__IMG__'  =>__ROOT__.'/Public/images',
		'__CSS__'  =>__ROOT__.'/Public/css',
		'__Fonts__'  =>__ROOT__.'/Public/fonts',

	),
	
	
	'MAIL_HOST' => 'smtp.163.com',
	'MAIL_SMTPAUTH' => TRUE, //启用smtp认证
	'MAIL_USERNAME' => '18612725213@163.com',
	'MAIL_FROM' => '18612725213@163.com',
	'MAIL_FROMNAME' => '18612725213@163.com',
	'MAIL_PASSWORD' => 'cepiec@163.com',
	'MAIL_CHARSET' => 'utf-8',
	'MAIL_ISHTML' => TRUE, // 是否HTML格式邮件
	'localurl' => $_SERVER['HTTP_HOST'],
	'SHOW_PAGE_TRACE' => false,
	'TMPL_ACTION_SUCCESS'=>'Public:success',
	'TMPL_ACTION_ERROR'=>'Public:error',
);
?>