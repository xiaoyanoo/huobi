<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	// unset($_SESSION['id']);//销毁SESSION id
	// unset($_SESSION['uname']);//销毁SESSION uname

	// $_SESSION = array();
	
	session_destroy();
	tips('登出成功','index.php?kk&c=login');
 ?>