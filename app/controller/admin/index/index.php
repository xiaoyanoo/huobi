<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}

$res = select_all('*','menus','');
$str='';
$num=0;
$num1=0;
foreach($res as $k=>$v){
	$one=explode('/',$v['url']);

	if($str!=$one[0]){
		if($k>0){
			++$num;
		}
		$menu[$num]['id']=$v['id'];
		$menu[$num]['c']=$one[0];
		$menu[$num]['title']=$v['name'];
		$str=$one[0];
	}else{
		$menu[$num]['son'][$num1]['id']=$v['id'];
		$menu[$num]['son'][$num1]['v']=$one[1];
		$menu[$num]['son'][$num1]['title']=$v['name'];
		$menu[$num]['son'][$num1]['hidden']=$v['hidden'];
		$num1++;
	}

}
$da['menu']=$menu;
	display($da);
 ?>