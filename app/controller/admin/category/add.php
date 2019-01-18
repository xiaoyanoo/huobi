<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?c=login');
	}
 	if($_POST){
 		if(isset($_POST['pid'])&&is_numeric($_POST['pid'])){
 			$in['pid'] = trim($_POST['pid']);
 		}else{
 			tips('请选择上级分类','index.php?kk&c=category&v=add');
 		}

 		if(empty($_POST['name'])){
 			tips('请填写分类名字','index.php?kk&c=category&v=add');
 		}
 		$in['name'] = trim($_POST['name']);
 		$in['c_time'] = $in['u_time'] = time();
 		$res = add('category',$in);
 		if($res){
 			tips('添加成功','index.php?kk&c=category');
 		}else{
 			tips('添加失败','index.php?kk&c=category&v=add');
 		}
 	}
 	$cate = select_all('*','category','');
 	$cate = get_category($cate);
 	$data['cate'] = $cate;
 	display($data);
 ?>