<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}

 	if($_POST){
 		$id = trim($_POST['id']);
 		if(isset($_POST['pid'])&&is_numeric($_POST['pid'])){
 			$in['pid'] = trim($_POST['pid']);
 		}else{
 			tips('请选择上级分类','index.php?kk&c=category&v=update&id='.$id);
 		}

 		if(empty($_POST['name'])){
 			tips('请填写分类名字','index.php?kk&c=category&v=update&id='.$id);
 		}
 		$in['name'] = trim($_POST['name']);
 		$in['u_time'] = time();
 		$res = update('category',$in,'id = '.$id);
 		if($res){
 			tips('修改成功','index.php?kk&c=category');
 		}else{
 			tips('修改失败','index.php?kk&c=category&v=update&id='.$id);
 		}
 	}

 	$id = trim($_GET['id']);
	if(empty($id)||!is_numeric($id)||$id<1){
		tips('参数错误','index.php?kk&c=category');
	}
	$where['id'] = $id;
	$one = select_one('*','category',$where);
 	$cates = select_all('*','category','');
 	$cate = get_category($cates);
 	$son = get_category($cates,$one['id']);
 	if($son){
 		$ss = [];
 		foreach ($son as $k => $v) {
 			$ss[] = $v['id'];
 		}
 		$data['ss'] = $ss;
 	}
 	$data['cate'] = $cate;
 	$data['one'] = $one;
 	display($data);
 ?>