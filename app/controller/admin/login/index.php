<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	// var_dump($_POST);
	if($_POST){//如果有post过来
		// var_dump($_POST);exit;
		if(strtolower(trim($_POST['code']))!=$_SESSION['code']){

			tips('验证码错误','index.php?kk&c=login');
		}
		if(empty($_POST['username'])){
			tips('用户名不能为空','index.php?kk&c=login');
		}
		$data['username'] = trim($_POST['username']);//处理数据

		if(empty($_POST['password'])){
			tips('密码不能为空','index.php?kk&c=login');
		}
		$data['password'] = md5(trim($_POST['password']));
		$res = select_one('user.*,privilege.privilege,privilege.id as pr_id','user',$data,'','left join privilege on user.pid = privilege.id');//根据post过来的用户名跟密码 查找数据库
		if($res){//有结果  说明数据库里面有这个用户名跟密码  那么登录成功
			$_SESSION['id'] = $res['id'];//把用户id保存到session
			$_SESSION['uname'] = $res['username'];//把用户名保存到session
			$_SESSION['pri'] = explode(',',$res['privilege']);
			if(!empty($_POST['remember'])){//判断有没有勾上记住我
				//有就保存cookie
				setcookie('username',$data['username'],time()+3600*24*7);
				setcookie('password',trim($_POST['password']),time()+3600*24*7);
				setcookie('rem',1,time()+3600*24*7);
			}else{
				//没有就清除cookie
				setcookie('username',null,0);
				setcookie('password',null,0);
				setcookie('rem',null,0);
			}
			tips('登录成功','index.php?kk');
		}else{//没有结果 说明数据库里面没有数据与这个用户名跟密码匹配 那么不给登录
			tips('登录失败','index.php?kk&c=login');
		}
	}
	display(array(),false);
 ?>