<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}

 	$id = trim($_GET['id']);
	if(empty($id)||!is_numeric($id)||$id<1){
		tips('参数错误','index.php?kk&c=category');
	}
	$cate = select_all('*','category','');
	$son = get_category($cate,$id);
	if($son){
		tips('请先删除该分类的子级','index.php?kk&c=category');
	}else{
		$res = del('category','id = '.$id);
		if($res){
			tips('删除成功','index.php?kk&c=category');
		}else{
			tips('删除失败','index.php?kk&c=category');
		}
	}

 ?>