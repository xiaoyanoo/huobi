<?php
	header('Content-type:text/html;charset=utf-8');
	date_default_timezone_set('PRC');

	define('CC','666');//定义一个安全常量  检测是否从入口文件进入

	define('ROOT_PATH',dirname(__FILE__));//获取根目录路径

	session_start();//开启session


	$_GET = array_change_key_case($_GET,CASE_LOWER);//把get数组的下标全部变成小写

	if(isset($_GET['kk'])){//isset  判断是否存在  判断get里面的参数有没有kk这个参数
		$m = 'admin'; //如果有get到kk  那么我们访问的是后台
	}else{
		$m = 'home';//如果没有get到kk  那么我们访问的是前台
	}

	if(!empty($_GET['c'])){//判断get到的c是否为空
		$c = strtolower(trim($_GET['c']));//get到的c不为空的时候 $c 就是 get到的c

		//strtolower 把字符串转换成小写
	}else{
		$c = 'index';//get到的c为空的时候 $c 就是 index
	}

	if(!empty($_GET['v'])){//判断get到的c是否为空
		$v = strtolower(trim($_GET['v']));//get到的c不为空的时候 $c 就是 get到的c
	}else{
		$v = 'homeindex';//get到的c为空的时候 $c 就是 index
	}
	$_GET = array_change_key_case($_GET,CASE_LOWER);
	// var_dump($m,$c,$v);
	// exit;
	define('M',$m);
	define('C',$c);
	define('V',$v);

	include('config/common_config.php');
	include(FUN_PATH.'mysqli_fun.php');
	require(FUN_PATH.'function.php');


	include(CON_PATH.$c.'/'.$v.'.php');

 ?>