<?php
$username = isset($_COOKIE['username'])?$_COOKIE['username']:'';
if(empty($username)){
	echo "<script>alert('未登录');location.href='login.php'</script>";
}
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style>
	.btn-cart{
		margin-bottom: 12px;
	}
	body{
		padding-top:70px;
	}
	.white{
		color:white;
		margin-left:400px;
		padding-top:15px; 
	}
	.cha{
		padding-bottom: 20px;
		margin-left:550px;
	}
	.yangshi{
		height:80px;
		/*border:1px solid gray;*/
	}
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<ul class="nav navbar-nav">
					<li><a href="index.php">首页</a></li>
					<li><a href="cart.php">购物车</a></li>
					<li class="white">欢迎</li>
					<li><a href="cart.php"><?php echo $username ?></a></li>
					<li><a href="login.php?tuichu=ok">注销</a></li>
				</ul>
			</div>
		</nav>
	</header>
</body>
</html>
<?php

	$action = isset($_GET['action'])?$_GET['action']:"";
	switch($action){
		case "del":
			$id = (int)$_GET['id'];
			del($id);
			break;
	}
	// 删除
	function del($id){
		echo "$id";
		$sql = "delete from coffee where coff_id='$id'";
		$result = mysql_query($sql);
		echo "<script>location.href='index.php';</script>";
	}
	// 查找
	$keywords = isset($_GET['keywords'])?$_GET['keywords']:"";

	if(!empty($keywords)){
		$where=" where coffname like'%".$keywords."%' or produce like '%$keywords%'";
	}
	else{
		$where = '';
	}

// $sql = "select count(coff_id) from coffee $where";
// $result = mysql_query($sql);
// $row = mysql_fetch_assoc($result);
// var_dump($row);
$sql = "select * from coffee $where";
$result = mysql_query($sql);
?>

	<form action="" method="get" class="cha">
		<input type="text" name="keywords" value="<?php echo $keywords; ?>">
		<input style='display:none' type="text" name="username" value="<?php echo $username; ?>">
		<button type="submit">搜索</button>
	</form>
<table border="1" align="center">
	<tr align="center">
			<td>图片</td>
			<td width="">名字</td>
			<td width="3%">英文名</td>
			<td width="5%">价格</td>
			<td width="5%">活动</td>
			<td width="13%">适用</td>
			<td width="13%">功效</td>
			<td width="13%">介绍</td>
			<td width="13%">方法</td>
			<td>操作</td>
			<td>操作</td>
		</tr>
<?php
while($row = mysql_fetch_assoc($result)){
	?>
		<tr align="center">
			<td><img style='width:100px;height:100px;' src="<?php echo $row['img']?>"></td>
			<td><?php echo $row['coffname']?></td>
			<td><?php echo $row['englishname']?></td>
			<td><p><?php echo $row['price']?></p></td>
			<td><?php echo $row['active']?></td>
			<td><?php echo $row['shiyong']?></td>
			<td><?php echo $row['gongxiao']?></td>
			<td><?php echo $row['produce']?></td>
			<td><?php echo $row['method']?></td>
			<td align="center"><a href="edit.php?id=<?php echo $row['coff_id']?>&username=<?php echo $username?>" class='btn-cart btn btn-primary'>修改</a></td>
			<td  align="center"><a href="index.php?action=del&id=<?php echo $row['coff_id']?>&<?php echo $username?>"  class='btn-cart btn btn-primary'>删除</a></td>
		</tr>
	
<?php
}

?>
</table>;
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.zhuan{
			transform: rotate(90deg);
			margin-top:-20px;
		}
	</style>
</head>
<body>
<a href="insert.php">
	<div style="width:150px; float:left; height:150px;border:1px solid gray; cursor:pointer;">
		<hr style="margin-top:70px;">
		<hr class="zhuan">	
	</div>
</a>
</body>
</html>
