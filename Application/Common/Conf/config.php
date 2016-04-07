<?php
return array(
    //'配置项'=>'配置值'
    //自定义路径
    'BASE_PATH'             =>  $_SERVER['DOCUMENT_ROOT'].'/',     //根目录 
    'UPLOAD_PATH'           =>  BASE_PATH.'Public/Upload/',

    //数据库配置
    'DB_TYPE'               =>  'mysqli',           //数据库类型
    'DB_HOST'               =>  'localhost',        // 服务器地址
    'DB_NAME'               =>  'yp_love',          // 数据库名
    'DB_USER'               =>  'root',             // 用户名
    'DB_PWD'                =>  'aa',               // 密码
    'DB_PORT'               =>  '3306',             // 端口
    'DB_PREFIX'             =>  'yp_',              // 数据库表前缀
    'DB_DEBUG'              =>  TRUE,               // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,               // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',             // 数据库编码默认采用utf8


    //模版主题设置 
    'DEFAULT_THEME'         =>  'default',          //开启模版主题，默认主题为'default'
    'THEME'                 =>  'default,love',     //主题列表
    'TMPL_DETECT_THEME'     =>  TRUE,               //开启主题切换

    //模版引擎
    //'TMPL_ENGINE_TYPE'      =>  'PHP',              //原生模版引擎（默认为tp自带的引擎）

    //自定义模版常量
    'TMPL_PARSE_STRING'     =>  array(
        '__ADMIN__'         =>  '/Public/default/admin/',
        '__HOME__'          =>  '/Public/default/home/',
    ),

    //自定义类库Library目录
    'AUTOLOAD_NAMESPACE'    =>  array(
           'Library'        =>  APP_PATH.'Library', 
    ),

    //分页
    'PAGE_SIZE'             =>  10,

);
