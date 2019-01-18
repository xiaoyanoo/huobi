<?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}
	if(empty($_SESSION['id'])){
		tips('请登录','index.php?kk&c=login');
	}


	$p = !empty($_GET['p'])?$_GET['p']:1;//获取当前的页码

	$count = select_one('count(id) as num','news','');//统计总数据量

	$url = 'index.php?kk&c=news&p=';//定义页码url

	$n = 5;//每页显示的条数


	/**分页开始**/

	// $total =  ceil($count['num']/$n);//ceil  向上取整  算出总页数

	// $limit_page = 5;//显示多少个页码

	// $offset = floor($limit_page/2);//floor 向下取整  算出当前页跟开始结束页的偏移量

	// $start = $p - $offset;  //开始页

	// $end = $p + $offset;  //结束页

	// if($total<$limit_page){//总页数小于要显示的页码的时候
	// 	$limit_page = $total;
	// }

	// if($start < 1){//开始页小于1的时候
	// 	$start = 1;
	// 	$end = $limit_page;
	// }
	// if($end > $total){//结束页大于总页数
	// 	$start = $total-$limit_page+1;
	// 	$end = $total;
	// }

	// $page = '';
	// if($p!=1){
	// 	$prev = $p-1;//上一页页码
	// 	$page .= '<a href="'.$url.'1" title="首页">首页</a><a href="'.$url.$prev.'" title="上一页">上一页</a>';
	// }
	// for ($i = $start; $i <= $end ; $i++) {
	// 	if($p==$i){
	// 		$page .= '<a href="'.$url.$i.'" class="number current" title="'.$i.'">'.$i.'</a>';
	// 	}else{
	// 		$page .= '<a href="'.$url.$i.'" class="number" title="'.$i.'">'.$i.'</a>';
	// 	}
	// }
	// if($p!=$total){
	// 	$next = $p+1;
	// 	$page .= '<a href="'.$url.$next.'" title="下一页">下一页</a><a href="'.$url.$total.'" title="尾页">尾页</a>';
	// }
	/**分页结束**/
	$page = admin_page($url,$count['num'],$p);

	$ss = ($p-1)*$n;//每页开始的数据下标


	$res = select_all('news.*,category.name as cname','news','','news.c_time desc',"$ss,$n",'left join category on category.id = news.cid');

	// include(VIEW_PATH.'public/header.html');
	// include(VIEW_PATH.C.'/'.V.'.html');
	// include(VIEW_PATH.'public/footer.html');
	$data['news'] = $res;
	$data['page'] = $page;
	display($data);
 ?>
