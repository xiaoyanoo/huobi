<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}


	if($_POST){
		$id = $_POST['id'];
		$url = 'index.php?kk&c=news&v=update&id='.$id;
		if(empty($_POST['title'])){
			tips('请填写标题',$url);
		}else{
			$data['title'] = trim($_POST['title']);
		}
		if(!isset($_POST['cid'])||!is_numeric($_POST['cid'])){
			tips('请选择分类',$url);
		}

		if(empty($id)){
			tips('参数非法',$url);
		}
		$data['cid'] = trim($_POST['cid']);
		$data['author'] = trim($_POST['author']);
		$data['u_time'] = time();
		$res = update('news',$data,'id = '.$id);
		if($res){
			tips('修改成功','index.php?kk&c=news');
		}else{
			tips('修改失败',$url);
		}
	}
	$id = trim($_GET['id']);
	if(empty($id)||!is_numeric($id)||$id<1){
		tips('参数错误','index.php?kk&c=news');
	}
	$where['id'] = $id;
	$one = select_one('*','news',$where);
	// var_dump($one);exit;
	$cate = select_all('*','category','pid = 0');
	$data['one'] = $one;
	$data['cate'] = $cate;
	display($data);
 ?>
