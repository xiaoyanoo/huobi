<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}


	$id = trim($_GET['id']);
	if(empty($id)||!is_numeric($id)||$id<1){
		tips('参数错误','index.php?kk&c=user');
	}
	$res = del('user','id = '.$id);
	if($res){
		tips('删除成功','index.php?kk&c=user');
	}else{
		tips('删除失败','index.php?kk&c=user');
	}
 ?>
