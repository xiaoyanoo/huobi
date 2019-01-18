<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}


	if($_POST){
		$url = 'index.php?kk&c=news&v=add';
		if(!isset($_POST['cid'])||!is_numeric($_POST['cid'])){
			tips('请选择分类',$url);
		}
		if(empty($_POST['title'])){
			tips('请填写标题',$url);
		}else{
			$data['title'] = trim($_POST['title']);
		}

		$data['cid'] = trim($_POST['cid']);
		$data['author'] = trim($_POST['author']);
		$data['c_time'] = $data['u_time'] = time();
		$res = add('news',$data);
		if($res){
			tips('添加成功','index.php?kk&c=news');
		}else{
			tips('添加失败',$url);
		}
	}
	$cate = select_all('*','category','pid =0');
	$data['cate'] = $cate;
	display($data);
 ?>
