<?php
// $username = isset($_COOKIE['username'])?$_COOKIE['username']:"";
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
// $image = isset($_COOKIE['image'])?$_COOKIE['image']:"";
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");

$sql = "select * from user where user_id=$user_id";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$username = $row['username'];
$image = $row['image'];
unset($sql);
$sql = "select count(*) from cart where user_id=$user_id";
$result = mysql_query($sql);
$row = mysql_fetch_row($result)[0];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
	.btn-cart{
		width:28%;
		margin-bottom: 12px;
		margin-left: 20px;
	}
	body{
		/*padding-top:70px;*/
	}
	.white{
		
		margin-left:500px;
		padding-top:15px; 
	}
	.yuan img{
		border-radius: 50px;
		width:50px;
		height:50px;
	}

	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar-fixed-top" role="navigation">
			<div class="container">
				<ul class="nav navbar-nav">
					<li><a href="index.php">首页</a></li>
					<li><a href="cart.php">购物车  <?php echo $row?></a></li>
					<li><a href="dingdan.php">我的订单</a></li>
					<li class="white">欢迎</li>
					<li><a href="cart.php"><?php echo $username;?></a></li>
					<li class="yuan"><span><a href="dizhi.php"><img src="<?php echo $image;?>"></a></span></li>
					<li><a href="userlogin.php?tuichu=ok">注销</a></li>
				</ul>
			</div>
		</nav>
	</header>
