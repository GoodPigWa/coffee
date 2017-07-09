<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";

$user = $_POST['user1'];
 if($_FILES){
// 	//4.判断文件上传是否成功
	if($_FILES['image']['error']){
		switch($_FILES['image']['error']){
			case 1:
				$error = "上传的文件超过服务器设置的2m";
				break;
			case 2:
				$error = "上传的文件超出客户端设置的大小";
				break;
			case 3:
				$error = "只有部分文件被上传";
				break;
			case 4:
				$error = "请选择上传的文件";
				break;
		}
		echo $error;
	}

	
	$allowExt = array('png','gif','jpg');
	$extension = pathinfo($_FILES['image']['name'])['extension'];
	if(!in_array($extension, $allowExt)){
		echo "上传文件不符合要求";
		exit();
	}
	// 6.判断文件大小是否超过我们限制的大小  
	$maxfilesize = 10*1024*1024;
	if($_FILES['image']['size']>$maxfilesize){
		echo "上传文件的大小超出10M";
		exit();
	}
	// 7.文件保存的目录，文件的名称
	$dir = 'uploads/';
	$month = date('Ym',time());
	$dirname = $dir . $month;

	// 判断文件夹是否存在，如果不存在，创建此目录
	if(!is_dir($dirname)){
		// 创建目录
		mkdir($dirname);
	}

	// 设置文件的名称,文件重命名
	$filename = date("YmdHis",time()).'.'.$extension;
	$path = $dirname . '/' .$filename;

	// 判断文件是通过HTTP,POST的方式提交上来的
	if(is_uploaded_file($_FILES['image']['tmp_name'])){
		move_uploaded_file($_FILES['image']['tmp_name'], $path);

		// echo "文件上传成功，上传文件的路径是：".$path;
		// echo "<img src='$path'>";
	}

}
	$sql ="update user set image='$path',username='$user' where user_id=$user_id";
	$result = mysql_query($sql);



	echo "<script>location.href='dizhi.php';</script>";
