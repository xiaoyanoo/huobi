<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	$id=$_GET['id'];
	$cate=select_all('*','category','id='.$id);
	foreach($cate as $k=>$v){
		$news=[];
		$news=select_all('*','news','cid='.$v['id']);
		$cate[$k]['news']=$news;
	}
	$data['css'] = 'index';
	$data['js'] = 'index';
	$data['title'] = '详情';
	$data['cate'] =$cate;
	// var_dump(strlen('http://www.shijieshangzuihaodeyuyan.com/'));exit;
	display($data);
?>