<?php
include('head.php');
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
$id = $_GET['id'];
echo $id;
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
		margin-bottom: 50px;
	}
	.pingjia{
		border-top:1px solid #d6c6df;
		padding:5px 0 30px 0px;
	}
	.produce{
		padding:30px 20px;
	}
	.sp{
		padding:13px 25px;
		display: inline-block;
		width:20px;
		background:#e6eae3; 
		vertical-align: top;
		margin-left: 20px;
	}
	form{
		/*margin-left: 20px;*/
		/*width:350px;*/
	}
	textarea{
		margin-left: -10px;
	}
	button{
		margin:70px 0;
		margin-left: 400px;
		background: #cd8c5c;
		color:white;
	}
	.end{
		border-bottom: 1px solid #d6c6df;
		margin-left: 20px;
		font-family: "微软雅黑";
		font-weight: bold;
	}
	.kongge{
		height:20px;
	}
	.xian{
		height:1px;
		width:100%;
		border-top:1px solid #d6c6df;
		margin-top:35px;
	}
	</style>
</head>
<body>
	<div class="red"></div>
	<div class="wai">
		<div class="kuang">
			<div class="head">商品评价</div>
			<div class="pingjia">
				<?php 
					$sql = "select * from dingdan where dingdan_id = '$id' and user_id = '$user_id'";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);	
					// var_dump($row);
				?>
				<div class="produce">
					<span><a href=""><img height="70px" width="110px" src="<?php echo $row['dingdan_img']?>" alt=""></a></span>
					<span><?php echo $row['dingdan_name']?></span>
				</div>
				<div class="biaodan">
					<form action="pingjiadata.php?id=<?php echo $row['dingdan_id']?>" method="post">
						<span class="sp">商品评价</span>
						<textarea name="mytextarea" id="" cols="40" rows="5"></textarea>
						<div class="xian"></div>
						<button>发表评价</button>
					</form>
				</div>
			</div>
			<div class="end">她们正在说</div>
			<div class="kongge"></div>
		</div>
	</div>
</body>
</html>