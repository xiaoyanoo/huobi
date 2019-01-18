<?php


	$data['id']=1;
$config = select_one('*','config',$data,'');//根据post过来的用户名跟密码 查找数据库
	$data['css'] = 'index';
	$data['js'] = 'index';
	$data['title'] = '首页';
	$data['config']=$config;

	display($data);
?>