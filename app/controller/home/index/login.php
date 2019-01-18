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
			tips('密码不能为空','index.php?c=index&v=login');
		}
		$data['password'] = md5(trim($_POST['password']));
		$res = select_one('*','user',$data,'');//根据post过来的用户名跟密码 查找数据库
		if($res){//有结果  说明数据库里面有这个用户名跟密码  那么登录成功
			$_SESSION['id'] = $res['id'];//把用户id保存到session
			$_SESSION['username'] = $res['username'];//把用户名保存到session
			if($res['type']==1){
				tips('登录成功','index.php?c=index&v=adminindex');
			}else{
				tips('登录成功','index.php?c=index&v=index');
			}

		}else{//没有结果 说明数据库里面没有数据与这个用户名跟密码匹配 那么不给登录
			tips('登录失败','index.php?c=index&v=login');
		}
	}
	$data['css'] = 'index';
	$data['js'] = 'index';
	$data['title'] = '登录';
	display($data);
?>