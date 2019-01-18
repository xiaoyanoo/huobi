<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if($_POST){//如果有post过来


		if(empty($_POST['password'])){
			tips('密码不能为空','index.php?c=index&v=reg');
		}
		if(empty($_POST['newpassword'])){
			tips('密码不能为空','index.php?c=index&v=reg');
		}
		if($_POST['newpassword']!=$_POST['password']){
			tips('两者密码不匹配','index.php?c=index&v=reg');
		}
		$data['password'] = md5(trim($_POST['password']));
		$res = update('user',$data,'id = '.$_SESSION['id']);
		if($res){
			tips('修改成功','index.php?c=index&v=index');
		}else{
			tips('修改失败','index.php?c=index&v=index');
		}
	}
	$user=select_one('*','user','id='.$_SESSION['id']);
	$data['css'] = 'index';
	$data['js'] = 'index';
	$data['title'] = '修改密码';
	$data['user']=$user;
	display($data);
?>