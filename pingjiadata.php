<?php 
include('head.php');
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
$mytextarea = $_POST["mytextarea"];
$id = $_GET['id'];
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
$sql = "update dingdan set pingjia = '$mytextarea' where dingdan_id='$id' and user_id = '$user_id'";
$result = mysql_query($sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
.red{
			height:2px;
			border:1px solid red;
			margin-top: 50px;
		}
	.wai{
		background: #e6eae3;
		padding-bottom: 40px;
	}
	.kuang{
		width: 70%;
		margin:0 auto;
		background: white;
	}
	.head{
		padding:10px 10px;
		font-size: 1.4em;
		border:1px solid #d6c6df;
	}
	.center{
		height:300px;
		border:1px solid gray;
	}
	.small{
		width:150px;
		margin:150px auto;
	}
	.small div{
		float: left;
	}
	</style>
</head>
<body>
	<div class="red"></div>
	<div class="wai">
		<div class="kuang">
			<div class="head">商品评价</div>
			<div class="center"> 
				<div class="small">
					<div><img width="47px" height="40px"src="image/duihao.png" alt=""></div>
					<div><strong>评价成功！</strong><br/>谢谢姑凉的好评~</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>