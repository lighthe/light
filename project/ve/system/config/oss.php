<?php
//阿里云oss配置
return [

	/*
	|--------------------------------------------------------------------------
	| 登录阿里云访问控制查看
	|--------------------------------------------------------------------------
	| https://ram.console.aliyun.com/
	*/
	'accessKeyId'     => '',
	'accessKeySecret' => '',

	/*
	|--------------------------------------------------------------------------
	| 外网Endpoint
	|--------------------------------------------------------------------------
	| 登录阿里云后台查看,可以设置阿里云提供的公共域名，也可以使用自定义域名。
    | 如果使用自定义域名，需要将下面的 "自定义域名" 设置为 true
	*/
	'endpoint'        => '',

	/*
	|--------------------------------------------------------------------------
	| 自定义域名
	|--------------------------------------------------------------------------
	| 是否使用自定义域名，需要先在阿里云后台OSS业务处做好域名解析
	*/
	'custom_domain'   => false,

	/*
	|--------------------------------------------------------------------------
	| Bucket块名称
	|--------------------------------------------------------------------------
	| https://oss.console.aliyun.com/index
	*/
	'bucket'          => ''
];