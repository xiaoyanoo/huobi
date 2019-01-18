<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}

	if($_POST){
		// var_dump($_POST);exit;
		$url = 'index.php?kk&c=privilege&v=add';

		$url2 = 'index.php?kk&c=privilege';
		if(empty($_POST['privilege'])){
			tips('请选择权限',$url);
		}
		if(empty($_POST['pri_name'])){
			tips('请填写权限组名',$url);
		}
		$data['privilege'] = implode(',',$_POST['privilege']);
		$data['pri_name'] = trim($_POST['pri_name']);
		$data['c_time'] = $data['u_time'] = time();
		$res = add('privilege',$data);
		if($res){
			tips('添加成功',$url2);
		}else{
			tips('添加失败',$url);
		}
	}
	display();
 ?>
