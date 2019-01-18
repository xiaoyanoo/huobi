    <?php
	if(!defined('CC')){
		die('非法入侵，请拨打110');
	}

	function tips($msg,$url){
		echo '<script>alert("'.$msg.'");window.location.href="'.$url.'"</script>';exit;
	}
	function tips2($url){
		echo '<script>window.location.href="'.$url.'"</script>';exit;
	}
	function display($result=array(),$header=true){
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
				$menu[$num]['son']=[];

				$str=$one[0];
			}else{
				$menu[$num]['son'][$num1]['id']=$v['id'];
				$menu[$num]['son'][$num1]['v']=$one[1];
				$menu[$num]['son'][$num1]['title']=$v['name'];
				$menu[$num]['son'][$num1]['hidden']=$v['hidden'];
				$num1++;
			}
		}
		$result['menus']=$menu;
		check_power($menu);

		extract($result);//把数组的下标作为变量的名字，下标对应的值作为变量的值
		if($header==true){//如果$header是true的话 说明需要头尾分离
			include(VIEW_PATH.'public/header.html');
			include(VIEW_PATH.C.'/'.V.'.html');
			include(VIEW_PATH.'public/footer.html');
		}else{//$header是false的话 说明不需要头尾分离
			include(VIEW_PATH.C.'/'.V.'.html');
		}

	}

	function create_code(){
		header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
		header("Content-type: image/png;charset=utf8");
		$im = imagecreatetruecolor(150,60);//返回图像资源
		$bg_color = imagecolorallocate($im, 210, 105, 30);//使用三元色验证码——画图流程
		imagefilledrectangle($im, 0, 0, 150, 60, $bg_color);
		$border_color = imagecolorallocate($im, 255, 0, 0);//定义边框颜色
		imagerectangle($im, 0, 0, 499, 299,$border_color);//画边框
		for ($i=0; $i <150 ; $i++) {
			$random_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
			imagesetpixel($im, rand(0,150),rand(0,60),$random_color);//画点
		}
		for ($i=0; $i < 10 ; $i++) {
			$random_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
			imagearc($im,rand(0,150),rand(0,60),rand(0,150),rand(0,60),rand(0,360),rand(0,360),$random_color);
		}
		$str = 'qwertyupasdfghjkzxcvnmQWERTYUPASDFGJKLZXCVBNM2345789';
		$len = strlen($str);
		$code = '';
		for ($i=0; $i < 4 ; $i++) {
			$ss = $str[rand(0,$len-1)];
			$code .= $ss;
			$random_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
			imagefttext($im, 24 , rand(-45,45), 31+$i*24, 40, $random_color,TTF_PATH.'simsun.ttc',$ss);

		}
		$_SESSION['code'] = strtolower($code);
		// imagearc($im,100,100,50,50,0,180,$dot_color);
		// imagefttext($im, 30 , 0, 250, 150, $dot_color,'simsun.ttc',"龖龘");
		imagepng($im);
	}


	function admin_page($url,$count,$p,$limit_page='5',$n='5'){

		$total =  ceil($count/$n);//ceil  向上取整  算出总页数

		$offset = floor($limit_page/2);//floor 向下取整  算出当前页跟开始结束页的偏移量

		$start = $p - $offset;  //开始页

		$end = $p + $offset;  //结束页

		if($total<$limit_page){//总页数小于要显示的页码的时候
			$limit_page = $total;
		}

		if($start < 1){//开始页小于1的时候
			$start = 1;
			$end = $limit_page;
		}

		if($end > $total){//结束页大于总页数
			$start = $total-$limit_page+1;
			$end = $total;
		}

		$page = '';

		if($p!=1){
			$prev =  $p-1<1?1:$p-1;//上一页页码
			$page .= '<a href="'.$url.'1" title="首页">首页</a><a href="'.$url.$prev.'" title="上一页">上一页</a>';
		}
		for ($i = $start; $i <= $end ; $i++) {
			if($p==$i){
				$page .= '<a href="'.$url.$i.'" class="number current" title="'.$i.'">'.$i.'</a>';
			}else{
				$page .= '<a href="'.$url.$i.'" class="number" title="'.$i.'">'.$i.'</a>';
			}
		}
		if($p!=$total){
			$next = $p+1>$total?$total:$p+1;
			$page .= '<a href="'.$url.$next.'" title="下一页">下一页</a><a href="'.$url.$total.'" title="尾页">尾页</a>';
		}

		return $page;
	}

	function home_page($url,$count,$p,$limit_page='5',$n='5'){

		$total =  ceil($count/$n);//ceil  向上取整  算出总页数

		$offset = floor($limit_page/2);//floor 向下取整  算出当前页跟开始结束页的偏移量

		$start = $p - $offset;  //开始页

		$end = $p + $offset;  //结束页

		if($total<$limit_page){//总页数小于要显示的页码的时候
			$limit_page = $total;
		}

		if($start < 1){//开始页小于1的时候
			$start = 1;
			$end = $limit_page;
		}

		if($end > $total){//结束页大于总页数
			$start = $total-$limit_page+1;
			$end = $total;
		}

		$page = '';

		$prev = $p-1<1?1:$p-1;//上一页页码
		$page .= '<li style="width:90px;height:44px;"><a href="'.$url.$prev.'" title="上一页">上一页</a></li>';
		for ($i = $start; $i <= $end ; $i++) {
			if($p==$i){
				$page .= '<li class="on"><a href="'.$url.$i.'"  title="'.$i.'">'.$i.'</a></li>';
			}else{
				$page .= '<li><a href="'.$url.$i.'" class="number" title="'.$i.'">'.$i.'</a></li>';
			}
		}
		$next = $p+1>$total?$total:$p+1;
		$page .= '<li style="width:90px;height:44px;"><a href="'.$url.$next.'" title="下一页">下一页</a></li>';

		return $page;
	}

	function get_category($data,$pid=0,$level=1){
		if(!isset($data['old'])){
			$new['old'] = $data;
			$new['new'] = [];
			$data = $new;
		}
		foreach ($data['old'] as $k => $v) {
			if($v['pid']==$pid){
				$v['level'] = $level;
				$data['new'][] = $v;
				unset($data['old'][$k]);
				$data['new'] = get_category($data,$v['id'],$level+1);
			}
		}
		return $data['new'];
	}

	function check_power($menus){

		foreach ($menus as $k => $v) {
			if($v['c']==C){
				if(!in_array($v['id'],$_SESSION['pri'])){
					tips('权限不足','index.php?kk');
				}else{
					foreach ($v['son'] as $k1 => $v1) {
						if($v1['v']==V){
							if(!in_array($v1['id'],$_SESSION['pri'])){
								tips('权限不足','index.php?kk');
							}
						}
					}
				}
			}
		}
	}

	function upFile($dir='./public/admin/img/upload/'){
		if(empty($_FILES)){
			$status = 1;
			$info = '没有文件上传';
		}
		$da=[];
		foreach($_FILES as $k=>$v){
			if($v['error'] === 0 || $v['error'] === '0' ){
				//文件上传成功
				$tmp = pathinfo($v['name']);
				$new_fname = $tmp['filename'].'_'.rand(1000000,9999999).'.'.$tmp['extension'];
				$path=$dir.$new_fname;
				if(!move_uploaded_file($v['tmp_name'], $path)){
					$status = 1;
					$info = '上传（移动）失败';
				}else{
					$status = 0;
					$info = '上传成功';
				}
				$da[$k]=$path;

			} else {
				//文件上传失败
				$info = '文件上传失败';
				switch($v['error']){
					case 1:
						$info = '上传文件超过php.ini中upload_max_filesize配置参数';
						break;
					case 2:
						$info = '上传文件超过表单MAX_FILE_SIZE选项指定的值';
						break;
					case 3:
						$info = '文件只有部份被上传';
						break;
					case 4:
						$info = '没有文件被上传';
						break;
					case 5:
						$info = '上传文件大小为0';
						break;
				}
				$status = 1;
			}
		}

		return array('status'=>$status, 'info'=>$info,'data'=>$da);
	}
?>