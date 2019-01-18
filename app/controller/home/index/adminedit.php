<?php

	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('登录成功','index.php?c=index&v=login');
	}

	if($_POST&&isset($_POST['act'])&&$_POST['act']=='edit'){
		if(empty($_POST['money'])&&$_POST['money']!=0){
			tips('请输入修改金额','index.php?c=index&v=index');
		}

//		if(md5(trim($_POST['pwd']))!=md5('123456')){
//			tips('管理密码错误','index.php?c=index&v=index');
//		}
		$user=select_one('*','user','id='.$_POST['id']);
		if($_POST['type']==1){
			$in['money'] = trim($_POST['money'])+$user['money'];
		}else{
			$in['money'] = $user['money']-trim($_POST['money']);
		}
		if($in['money']){
			$in['money']=0;
		}
		$in['level'] = trim($_POST['level']);
		$res = update('user',$in,'id = '.$_POST['id']);
		if($res){
			tips('修改成功','index.php?c=index&v=index');
		}else{
			tips('修改失败','index.php?c=index&v=index');
		}
	}
	if($_POST&&isset($_POST['act'])&&$_POST['act']=='config'){
		if(empty($_POST['version'])){
			tips('请输入版本号','index.php?c=index&v=index');
		}
		if(empty($_POST['version'])){
			tips('请输入大小','index.php?c=index&v=index');
		}
		if(empty($_POST['version'])){
			tips('请输入名称','index.php?c=index&v=index');
		}
		if(empty($_POST['download_url'])){
			tips('请输入下载链接','index.php?c=index&v=index');
		}

		$arr=upFile();
		if($arr['status']==0){
			$in = $arr['data'];
		}
		if(!empty($left_img)){

		}
//		$config=select_one('*','config','id=1');
		$in['version'] = $_POST['version'];
		$in['name'] = $_POST['name'];
		$in['size'] = $_POST['size'];
		$in['download_url'] = $_POST['download_url'];
		$in['update_content'] = $_POST['update_content'];
		$in['desc'] = $_POST['desc'];
		$res = update('config',$in,'id = 1');
		if($res){
			tips('修改成功','index.php?c=index&v=index');
		}else{
			tips('修改失败','index.php?c=index&v=index');
		}
	}
?>