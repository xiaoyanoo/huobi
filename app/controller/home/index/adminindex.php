<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('登录成功','index.php?c=index&v=login');
	}
	if(isset($_POST['act'])&&$_GET['act']=='logout'){//如果有get过来

		$_SESSION['id'] = '';//把用户id保存到session
		$_SESSION['username'] = '';//把用户名保存到session
		tips('退出成功','index.php?c=index&v=login');
	}

	$p = !empty($_GET['p'])?$_GET['p']:1;//获取当前的页码

	$count = select_one('count(id) as num','user','');//统计总数据量

	$url = 'index.php?c=index&v=adminindex&p=';//定义页码url

	$n = 5;//每页显示的条数

	$page = home_page($url,$count['num'],$p);

	$ss = ($p-1)*$n;//每页开始的数据下标
	$wh='id>0';
	if(isset($_POST['key'])&&!empty($_POST['key'])){
		$wh.=' and id='.$_POST['key'];
	}
	$res = select_all('*','user',$wh,'id asc',"$ss,$n");
	$config=select_one('*','config','id=1');
	$data['info'] = $config;
	$data['user'] = $res;

	$data['css'] = 'index';
	$data['js'] = 'index';
	$data['title'] = '管理后台';
	$data['page'] = $page;

	display($data);
?>