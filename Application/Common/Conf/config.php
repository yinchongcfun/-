<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => array(


        '__PUBLIC__'=>__ROOT__.'/Public',

    ),

    'DB_TYPE'               =>  'MYSQL',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'exam',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '19950327',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tb',    // 数据库表前缀
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8


    //显示跟踪信息
    'SHOW_PAGE_TRACE'       =>  true,  	//默认为false，开启则改写成true
);