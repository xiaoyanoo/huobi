<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}


	if($_POST){
		$id = $_POST['id'];
		$url = 'index.php?kk&c=user&v=update&id='.$id;
		$url2 = 'index.php?kk&c=user';
		if(empty($_POST['username'])){
			tips('请填写用户名',$url);
		}

		$old = trim($_POST['old_password']);
		$new = trim($_POST['new_password']);
		$re = trim($_POST['re_password']);

		if(!empty($old)){//如果有输入旧密码的时候

			$one = select_one('*','user','id = '.$id);//查询数据库的旧密码

			if($one['password']==md5($old)){//判断旧密码跟数据库密码是否一致

				if(!empty($new)){//判断有没有写新密码

					if($new==$re){//判断新密码确认密码是否一致

						$data['password'] = md5($new);

					}else{

						tips('两次输入的密码不一致','index.php?kk&c=user&v=update&id='.$id);
					}

				}else{

					tips('请输入新密码','index.php?kk&c=user&v=update&id='.$id);

				}

			}else{

				tips('旧密码不正确','index.php?kk&c=user&v=update&id='.$id);

			}
		}
		$data['pid'] = trim($_POST['pid']);
		$data['username'] = trim($_POST['username']);
		$data['phone'] = trim($_POST['phone']);
		$data['email'] = trim($_POST['email']);
		$data['u_time'] = time();
		$res = update('user',$data,'id = '.$id);
		if($res){
			tips('修改成功',$url2);
		}else{
			tips('修改失败',$url);
		}
	}
	$id = trim($_GET['id']);
	if(empty($id)||!is_numeric($id)||$id<1){
		tips('参数错误','index.php?kk&c=user');
	}
	$where['id'] = $id;
	$pri = select_all('*','privilege','');
	$one = select_one('*','user',$where);
	// var_dump($one);exit;
	$data['pri'] = $pri;
	$data['one'] = $one;
	display($data);
 ?>
