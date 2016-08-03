<?php
return array(
	//'配置项'=>'配置值'
   'DEFAULT_FILTER' =>  '',//输入过滤配置
   'TMPL_PARSE_STRING' => array(
	    '__STATIC__' => __ROOT__ . '/Public/Static',
		'__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
		'__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
		'__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
	),//模板变量配置
);