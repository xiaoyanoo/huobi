<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}

 	$res = select_all('*','category','pid=0');

 	$cate = get_category($res);
 	// $new = [];

 	// foreach ($res as $k => $v) {
 	// 	if($v['pid'] == 0){
 	// 		$new[]= $v;
 	// 		foreach ($res as $k1 => $v1) {
 	// 			if($v1['pid']==$v['id']){
 	// 				$new[]= $v1;
 	// 				foreach ($res as $k2 => $v2) {
 	// 					if($v2['pid']==$v1['id']){
 	// 						$new[]= $v2;
 	// 					}
 	// 				}
 	// 			}
 	// 		}
 	// 	}
 	// }
 	$data['cate'] = $cate;
 	display($data);
 ?>