<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}



	if($_POST){
		$id = $_POST['id'];

		$url = 'index.php?kk&c=privilege&v=update&id='.$id;
		$url2 = 'index.php?kk&c=privilege';
		if(empty($_POST['privilege'])){
			tips('请选择权限',$url);
		}
		if(empty($_POST['pri_name'])){
			tips('请填写权限组名',$url);
		}

		$data['privilege'] = implode(',',$_POST['privilege']);//implode() 把数组分割成字符串
		$data['pri_name'] = trim($_POST['pri_name']);
		$data['c_time'] = $data['u_time'] = time();
		$res = update('privilege',$data,'id = '.$id);
		if($res){
			tips('修改成功',$url2);
		}else{
			tips('修改失败',$url);
		}
	}
	$id = trim($_GET['id']);
	if(empty($id)||!is_numeric($id)||$id<1){
		tips('参数错误','index.php?kk&c=privilege');
	}
	$where['id'] = $id;
	$one = select_one('*','privilege',$where);
	$one['privilege'] = explode(',',$one['privilege']);//explode()  把字符串变成数组
	$data['one'] = $one;
	display($data);
 ?>
