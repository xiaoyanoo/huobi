<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}

	if($_POST){


		$url = 'index.php?kk&c=user&v=add';
		$url2 = 'index.php?kk&c=user';
		if(empty($_POST['username'])){
			tips('请填写用户名',$url);
		}
		if(empty($_POST['password'])){
			tips('请填写密码',$url);
		}

		$data['pid'] = trim($_POST['pid']);
		$data['username'] = trim($_POST['username']);
		$data['password'] = md5(trim($_POST['password']));
		$data['email'] = trim($_POST['email']);
		$data['c_time'] = $data['u_time'] = time();
		$res = add('user',$data);
		if($res){
			tips('添加成功',$url2);
		}else{
			tips('添加失败',$url);
		}
	}
	$pri = select_all('*','privilege','');
	$data['pri'] = $pri;
	display($data);
 ?>
