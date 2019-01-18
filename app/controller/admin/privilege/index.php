<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}


	$p = !empty($_GET['p'])?$_GET['p']:1;//获取当前的页码

	$count = select_one('count(id) as num','privilege','');//统计总数据量

	$url = 'index.php?kk&c=privilege&p=';//定义页码url

	$n = 5;//每页显示的条数



	$page = admin_page($url,$count['num'],$p);

	$ss = ($p-1)*$n;//每页开始的数据下标


	$res = select_all('*','privilege','','c_time desc',"$ss,$n");

	// include(VIEW_PATH.'public/header.html');
	// include(VIEW_PATH.C.'/'.V.'.html');
	// include(VIEW_PATH.'public/footer.html');
	$data['res'] = $res;
	$data['page'] = $page;
	display($data);
 ?>
