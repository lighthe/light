<?php
return [
	/*
	|--------------------------------------------------------------------------
	| 处理方式
	|--------------------------------------------------------------------------
	| redirect 直接跳转,会分配$errors到前台
	| show 直接显示错误信息,使用以下配置的模板文件显示错误处理
	| default 由开发者自行处理
	*/
	'dispose'  => 'show',

	/*
	|--------------------------------------------------------------------------
	| 消息模板
	|--------------------------------------------------------------------------
	| 当dispose为show时使用以下定义的模板显示错误信息
	*/
	'template' => ROOT_PATH . '/resource/view/validate.php',
];