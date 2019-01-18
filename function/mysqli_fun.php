<?php
	header('Content-type:text/html;charset=utf-8');
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	function db_connect(){
		$config = include(CONFIG_PATH.'db_config.php');
		$con = mysqli_connect($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']);//服务器地址,数据库的帐号,数据库密码,数据库名字

		if(!$con){
			exit('数据库连接失败');
		}
		mysqli_query($con,'set names utf8');//设置传输编码为utf8，防止数据库与php通讯时出现乱码
		return $con;
	}
	// $where = 'id = 1 and password = 123456';
	function query($sql){
		$con = db_connect();
		$res = mysqli_query($con,$sql);//执行语句
		return $res;
	}

	function select_all($field,$table,$where,$order='',$limit='',$join='',$group=''){

		$con = db_connect();
		//select * from user where `id` = 'abc' and password = 123456 and sex = 2 order by id desc limit 0,5
		if(empty($where)){
			$where = '';
		}else{
			if(is_array($where)){
				$str = '';
				foreach ($where as $k => $v) {//遍历$where数组
					$str .= '`'.$k.'` = \''.$v.'\' and ';  //数组的下标代表字段，下标对应的值代表字段的值
				}
				$str = rtrim($str,'and ');//rtrim 把$str 右边的  'and '去掉//  ltrim去掉左边的指定字符   trim去掉两边的指定字符
				$where = 'WHERE '.$str;
			}else{
				$where = 'WHERE '.$where;
			}
		}

		if(empty($group)){
			$group = '';
		}else{
			$group = 'GROUP BY '.$group;
		}

		if(empty($order)){
			$order = '';
		}else{
			$order = 'ORDER BY '.$order;
		}

		if(empty($limit)){
			$limit = '';
		}else{
			$limit = 'LIMIT '.$limit;
		}

		$sql = "select $field from $table $join $where $group $order $limit";

		// var_dump($sql);exit;
		$res = mysqli_query($con,$sql);//执行语句

		$data = [];

		while($row = mysqli_fetch_assoc($res)){
			$data[] = $row;
		}

		return $data;
	}

	function select_one($field,$table,$where,$order='',$join=''){
		$con = db_connect();

		//select * from user where `id` = 'abc' and password = 123456 and sex = 2 order by id desc limit 0,5
		if(empty($where)){
			$where = '';
		}else{
			if(is_array($where)){
				$str = '';
				foreach ($where as $k => $v) {//遍历$where数组
					$str .= '`'.$k.'` = \''.$v.'\' and ';  //数组的下标代表字段，下标对应的值代表字段的值
				}
				$str = rtrim($str,'and ');//rtrim 把$str 右边的  'and '去掉//  ltrim去掉左边的指定字符   trim去掉两边的指定字符
				$where = 'where '.$str;
			}else{
				$where = 'where '.$where;
			}
		}

		if(empty($order)){
			$order = '';
		}else{
			$order = 'ORDER BY '.$order;
		}


		$sql = "select $field from $table $join $where $order LIMIT 0,1";
		$res = mysqli_query($con,$sql);//执行语句
		$data = mysqli_fetch_assoc($res);

		return $data;
	}

	function add($table,$data){
		$con = db_connect();
		//INSERT INTO user (`username`,`password`,`mobile`,`birthday`) VALUES ('admin','qweqwe','13659874326','1326545878');
		$fields = '';
		$value = '';
		foreach ($data as $k => $v) {
			$fields .= '`'.$k.'`,';
			$value .= '\''.$v.'\',';
		}
		$fields = rtrim($fields,',');
		$value = rtrim($value,',');
		$sql = 'insert into '.$table.' ('.$fields.') VALUES ('.$value.')';
		$res = mysqli_query($con,$sql);//执行语句
		return $res;
	}

	function update($table,$data,$where){
		$con = db_connect();
		//UPDATE `user` SET `username`='阿斯顿马丁1', `password`='qwe' WHERE `id`='2'

		if(is_array($where)){
			$str = '';
			foreach ($where as $k => $v) {//遍历$where数组
				$str .= '`'.$k.'` = \''.$v.'\' and ';  //数组的下标代表字段，下标对应的值代表字段的值
			}
			$str = rtrim($str,'and ');//rtrim 把$str 右边的  'and '去掉//  ltrim去掉左边的指定字符   trim去掉两边的指定字符
			$where = ' WHERE '.$str;
		}else{
			$where = ' WHERE '.$where;
		}
		$str = '';
		foreach ($data as $k => $v) {
			$str .= '`'.$k.'` = \''.$v.'\' ,';  //数组的下标代表字段，下标对应的值代表字段的值
		}
		$str = rtrim($str,',');
		$sql = 'update '.$table.' set '.$str.$where;

		$res = mysqli_query($con,$sql);//执行语句

		return $res;
	}

	function del($table,$where){
		$con = db_connect();
		//delete from user where id = 3;
		if(is_array($where)){
			$str = '';
			foreach ($where as $k => $v) {//遍历$where数组
				$str .= '`'.$k.'` = \''.$v.'\' and ';  //数组的下标代表字段，下标对应的值代表字段的值
			}
			$str = rtrim($str,'and ');//rtrim 把$str 右边的  'and '去掉//  ltrim去掉左边的指定字符   trim去掉两边的指定字符
			$where = ' WHERE '.$str;
		}else{
			$where = ' WHERE '.$where;
		}
		$sql = 'delete from '.$table.$where;

		$res = mysqli_query($con,$sql);//执行语句

		return $res;
	}
 ?>