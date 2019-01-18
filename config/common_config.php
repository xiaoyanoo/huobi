<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	//C:\wamp\www\ccc\3.13(5)\e0201/app/
	define('APP_PATH',ROOT_PATH.'/app/');//定义应用文件夹路径
	define('CONFIG_PATH',ROOT_PATH.'/config/');//定义配置文件夹路径
	define('FUN_PATH',ROOT_PATH.'/function/');//定义函数库文件夹路径
	define('PUBLIC_PATH',ROOT_PATH.'/public/');	//定义公共资源文件夹路径

	//C:\wamp\www\ccc\3.13(5)\e0201/app/controller/admin/
	//C:\wamp\www\ccc\3.13(5)\e0201/app/controller/home/
	define('CON_PATH',APP_PATH.'controller/'.M.'/');//定义控制器文件夹路径
	define('VIEW_PATH',APP_PATH.'view/'.M.'/');//定义视图文件夹路径


	define('ADMIN_CSS_PATH','./public/admin/css/');//定义后台CSS文件夹路径
	define('ADMIN_IMG_PATH','./public/admin/img/');//定义后台CSS文件夹路径
	define('ADMIN_JS_PATH','./public/admin/js/');//定义后台CSS文件夹路径

	define('HOME_CSS_PATH','./public/home/css/');//定义前台CSS文件夹路径
	define('HOME_IMG_PATH','./public/home/images/');//定义前台CSS文件夹路径
	define('HOME_JS_PATH','./public/home/js/');//定义前台CSS文件夹路径

	define('TTF_PATH','./public/ttf/');//定义字体文件夹路径
	define('EDITOR_PATH','./public/editor/');//定义编辑器文件夹路径
	define('XML_PATH','./public/xml/');//定义XML文件夹路径

	define('MD5PWD','qwertyuioashjk');//定义加密常量
 ?>