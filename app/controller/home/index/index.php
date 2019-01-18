<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('登录成功','index.php?c=index&v=login');
	}
	if(isset($_GET['act'])&&$_GET['act']=='logout'){//如果有get过来

		$_SESSION['id'] = '';//把用户id保存到session
		$_SESSION['username'] = '';//把用户名保存到session
		tips('退出成功','index.php?c=index&v=login');
	}
	if($_POST){//如果有post过来
//		if(empty($_POST['money'])){
//			tips('请输入修改金额','index.php?c=index&v=index');
//		}
//		if(empty($_POST['pwd'])){
//			tips('请输入管理密码','index.php?c=index&v=index');
//		}
//		if(md5(trim($_POST['pwd']))!=md5('123456')){
//			tips('管理密码错误','index.php?c=index&v=index');
//		}
//		$user=select_one('*','user','id='.$_SESSION['id']);
//		if($_POST['type']==1){
//			$in['money'] = trim($_POST['money'])+$user['money'];
//		}else{
//			$in['money'] = $user['money']-trim($_POST['money']);
//			if($in['money']<0){
//				$in['money']=0;
//			}
//		}

//		$res = update('user',$in,'id = '.$_SESSION['id']);
//		if($res){
//			tips('修改成功','index.php?c=index&v=index');
//		}else{
//			tips('修改失败','index.php?c=index&v=index');
//		}
	}
	$data['id']=$_SESSION['id'];
	$res = select_one('*','user',$data,'');//根据post过来的用户名跟密码 查找数据库
	$data['css'] = 'index';
	$data['js'] = 'index';
	$data['title'] = '首页';
	$data['user']=$res;
	if($res['type']==1){
		tips2('index.php?c=index&v=adminindex');
	}
	display($data);
?>