<?php
header("Content-type:text/html;charset=utf-8");
include('head.php');
	$id = isset($_GET['id'])?$_GET['id']:"";
	$idd=explode(",", $id);
	if ($_POST) {
		$dizhi1 = $_POST['dizhi1'];
	}
	$allnum= isset($_GET['allnum'])?$_GET['allnum']:"";
	$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
	mysql_connect("localhost","root","root");
	mysql_select_db("demo");
	mysql_set_charset("utf8");
	foreach ($idd as $key => $value) {
		$sql1="select count(*) from dingdan where dingdan_id='$value' and user_id='$user_id'";
		$result = mysql_query($sql1);
		$shu = mysql_fetch_row($result)[0];
		if(!empty($user_id)){
			if(!empty($value)){
				if($shu==0){
					if(isset($_GET['allnum'])){
						$sql="select * from coffee where coff_id='$value'";
						$result = mysql_query($sql);
						while($row = mysql_fetch_assoc($result)){
							$dingdan_id = $row['coff_id'];
							$dingdan_name = $row['coffname'];
							$dingdan_img = $row['img'];
							$dingdan_price = $row['price'];
						}
						$query = "insert into dingdan(dingdan_id,dingdan_name,dingdan_img,dingdan_shuliang,dingdan_price,zhuangtai,user_id,dizhi_id) 
						value('$dingdan_id','$dingdan_name','$dingdan_img','$allnum','$dingdan_price*$allnum','交易完成','$user_id','$dizhi1')";
						$result = mysql_query($query);
					echo "<script>location.href='dingdan.php';</script>";
					}
					else{
						$sql="select * from cart where coff_id='$value' and user_id='$user_id'";
						$result = mysql_query($sql);
						while($row = mysql_fetch_assoc($result)){
							$dingdan_id = $row['coff_id'];
							$dingdan_name = $row['coffname'];
							$dingdan_img = $row['img'];
							$dingdan_shuliang = $row['shuliang'];
							$dingdan_price = $row['price'];
						}
						$query = "insert into dingdan(dingdan_id,dingdan_name,dingdan_img,dingdan_shuliang,dingdan_price,zhuangtai,user_id,dizhi_id) 
						value('$dingdan_id','$dingdan_name','$dingdan_img','$dingdan_shuliang','$dingdan_price','交易完成','$user_id','$dizhi1')";
						$result = mysql_query($query);
					echo "<script>location.href='dingdan.php';</script>";
					}
				}
				else{
					if(!empty($allnum)){
						$sql="update dingdan set dingdan_shuliang=dingdan_shuliang+$allnum where dingdan_id='$id' and user_id='$user_id'";
						$result = mysql_query($sql);
						echo "<script>location.href='dingdan.php';</script>";
					}
					else{
						$sql="select * from cart where coff_id='$value' and user_id='$user_id'";
						$result = mysql_query($sql);
						while($row = mysql_fetch_assoc($result)){
							$dingdan_shuliang = $row['shuliang'];
						}
						$sql="update dingdan set dingdan_shuliang=dingdan_shuliang+$dingdan_shuliang where dingdan_id='$id' and user_id='$user_id'";
						$result = mysql_query($sql);
						echo "<script>location.href='dingdan.php';</script>";
					}
					
				}
				
			}
			else{

			}
				
		}
		else{
			echo "<script>alert('未登录');location.href='userlogin.php';</script>";
		}
	}
	
	
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
			margin-top: 70px;
		}
		.kuang{
			width: 70%;
			margin:0 auto;
		}
			.header{
			background: #e6eae3;
			margin-bottom: 30px;
			border:1px solid #e6eae3;
		}
		.head li{
			display: inline-block;
			width:170px;
			font-size: 1.1em;
			font-family: "微软雅黑";
			text-align: center;
			margin:0 auto;
			vertical-align: middle;
		}
		.head a{
			top:-50px;
			text-decoration: none;
		}
		.center{
			border:1px solid gray;
		}
		.center p{
			background: #e6eae3;
			padding:5px;
			margin-top: 0px;
		}
		.caozuo a{
			display:block;
			margin:0 auto;
		}
		.pingjia{
			border:1px solid red;
			width: 80px;
			color:red;
			font-family: "微软雅黑";
		}
		
	</style>
	
</head>
<body>
	<div class="red"></div>
	<div class="kuang">
		<div class="header">
			<ul class="head">
				<li>商品</li>
				<li>单价(元)</li>
				<li>实付款(元)</li>
				<li>交易状态</li>
				<li>操作</li>
			</ul>
		</div>
		<?php 
		$sql="select * from dingdan where user_id='$user_id'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			?>
			<div class="center">
				<p>成交时间：？</p>
				<ul class="head">
					<li><img border="1px solid red" width="100px" height="80px" src="<?php echo $row['dingdan_img']?>"><a href=""><?php echo $row['dingdan_name']?></a></li>
					<li><?php echo $row['dingdan_price']?></li>
					<li><?php echo $row['dingdan_price']*$row['dingdan_shuliang']?></li>
					<li><?php echo $row['zhuangtai']?></li>
					<li class="caozuo">
						<a href="pingjia.php?id=<?php echo $row['dingdan_id']?>" class="pingjia">评价</a>						<a href="">
							<button onclick="if(confirm('是否确定删除')){search(<?php echo $row['dingdan_id']?>);}">删除订单</button>
						</a>
					</li>
				</ul>
			</div>
			<?php
		}
		?>

		<script>
			function search(id){
					var xhr = new XMLHttpRequest();
					var url = "shandingdata.php?id="+id;
					xhr.responseType = 'json';
					xhr.open('GET',url,true);
					xhr.send();
					xhr.onload = function(){
						if(xhr.status == 200){
							var result = xhr.response;
						}
					}
				}
		</script>
		
	
	</div>
</body>
</html>