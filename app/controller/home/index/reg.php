<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if($_POST){//如果有post过来
		if(empty($_POST['username'])){
			tips('用户名不能为空','index.php?c=index&v=login');
		}
		$data['username'] = trim($_POST['username']);//处理数据

		if(empty($_POST['password'])){
			tips('密码不能为空','index.php?c=index&v=reg');
		}
		if(mb_strlen($_POST['password'])>16||mb_strlen($_POST['password'])<6){
			tips('密码需要6~16位字符','index.php?c=index&v=reg');
		}
		if(empty($_POST['newpassword'])){
			tips('密码不能为空','index.php?c=index&v=reg');
		}
		if($_POST['newpassword']!=$_POST['password']){
			tips('两者密码不匹配','index.php?c=index&v=reg');
		}
		$data['password'] = md5(trim($_POST['password']));
		$res = select_one('*','user',$data,'');//根据post过来的用户名跟密码 查找数据库
		if($res){//有结果  说明数据库里面有这个用户名跟密码  那么登录成功
			tips('用户名已被注册','index.php?c=index&v=reg');
		}
		$in['username'] = trim($_POST['username']);
		$in['password'] =  md5(trim($_POST['password']));
		$in['u_time']=$in['c_time'] = time();
		$res = add('user',$in);

		if($res){
			$res2 = select_one('*','user',$data,'');//根据post过来的用户名跟密码 查找数据库
			$_SESSION['id'] = $res2['id'];//把用户id保存到session
			$_SESSION['username'] = $res2['username'];//把用户名保存到session
			tips('注册成功','index.php?c=index&v=index');
		}else{
			tips('注册失败','index.php?c=index&v=reg');
		}
	}

	$data['css'] = 'index';
	$data['js'] = 'index';
	$data['title'] = '注册';
	display($data);
?>