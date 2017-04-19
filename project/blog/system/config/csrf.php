<?php
//表单令牌验证配置
return [
	/*
	|--------------------------------------------------------------------------
	| 开启表单验证
	|--------------------------------------------------------------------------
	|
	| 当为FALSE时不对表单进行CSRF验证
	*/
	'open'   => false,

	/*
	|--------------------------------------------------------------------------
	| 白名单
	|--------------------------------------------------------------------------
	|
	| 用于设置对某些请求不进行CSRF验证
	| 支持正则表达式 如: ''except' => ['\d+']' 即请求地址包含数字时不进行验证
	| 排除的URL中不能饮食 @ 这个字符串
	*/
	'except' => [ ]
];