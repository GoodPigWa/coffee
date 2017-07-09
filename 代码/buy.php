<?php
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
$username = isset($_COOKIE['username'])?$_COOKIE['username']:"";
if(empty($username)){
	echo "<script>alert('未登录');location.href='userlogin.php?'</script>";
}
include('head.php');
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
$sql="select count(*) from dizhi";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

if($row[0] == 0){
	echo "<script>alert('请填写地址');location.href='dizhi.php?'</script>";
}
$id= isset($_GET['id'])?$_GET['id']:'';
$allnum= isset($_GET['allnum'])?$_GET['allnum']:'';
$check = isset($_POST["xuan"])?$_POST["xuan"]:"";
if(isset($_POST["del"])){
	for($i=0;$i<count($check);$i++){
		$sql="delete from cart where coff_id={$check[$i]}";
		$res=mysql_query($sql);
		header("location:cart.php");
	}
}
if(!empty($check)){
	foreach ($check as $key => $value) {
		$id[] = $value;	
	}
	$id = implode(",", $id);
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style>
	.biaodan{
		margin:0px auto;
		margin-top: 100px;
		border-bottom:2px solid gray;
		width:70%;
		font-size: 1.4em;
		overflow: hidden;
	}
	.biaodan2{
		width:70%;
		margin:0px auto;
		margin-bottom: 100px;
		font-size: 1.2em;
	}
	.left{
		float: left;
	}
	.right{
		float: right;
	}
	.information{
		width: 70%;
		margin:0 auto;
		float: none;
	}
	.information p{
		font-size: 1.4em;
	}
	.information th{
		border-bottom: 2px solid #a0d8ef;
		margin-bottom: 50px;
	}
	.dingdan{
		padding:5px 5px;
		border:1px solid red;
		display:inline-block;
		margin:20px 0px;
		width: 300px;
	}
	.bian{
		border-top: 1px dashed #a0d8ef;
		background: #eaf4fc;
	}
	.dingdan2{
		margin-top: 50px;
		float: right;
	}
	</style>
</head>
<body>
	<form action="dingdan.php?id=<?php echo $id;?>&allnum=<?php echo $allnum?>" method="POST">
		<div class="biaodan">
			<span class="left">确认收货地址</span><a href="dizhi.php" class="right">管理收货地址</a>
		</div>
		<div class="biaodan2">
			<?php 
	    			$query = "select * from dizhi";
	    			$result1 = mysql_query($query);
	    			while($row1=mysql_fetch_assoc($result1)){
	    		    ?>
			<p>
				<input type="radio" width="300px" name="dizhi1" value="<?php echo $row1['dizhi_id'];?>" onclick="sea(<?php echo $row1['dizhi_id']?>);">
				<input type="text" name="dizhi" value="<?php echo $row1['dizhi']; echo '('.$row1['dizhi_user'].'收'.')';echo $row1['telephone'];?>">
			</p>
			<?php
		}?>
		</div>
		<div class="information">
			<p>确认订单信息</p>
			<table width="100%">
				<tr>
					<th width="20%">产品名称</th>
					<th width="20%">缩略图</th>
					<th width="20%">价格</th>
					<th width="20%">数量</th>
					<th width="20%">小计</th>
				</tr>
				<?php
				if(isset($_POST["buy"])){
					$allmoney = 0;
						foreach ($check as $key => $value) {
							$sql = "select * from cart where coff_id='$value'and user_id= '$user_id'";
							$result = mysql_query($sql);
							while($row = mysql_fetch_assoc($result)){
								$allmoney += $row['price']*$row['shuliang'];
								?>
								<tr height="30px"></tr>
								<tr class="bian" height="80px">
									<td><?php echo $row['coffname']?></td>
									<td><img width="50px" height="50px" src="<?php echo $row['img']?>" alt=""></td>
									<td><?php echo $row['price']?></td>
									<td><?php echo $row['shuliang']?></td>
									<td> <?php echo $row['price']*$row['shuliang']?></td>
								</tr>
								<?php
							}
						}
					}?>
					<?php
			if(isset($_GET['id'])){
				$allmoney = 0;
				$sql = "select * from coffee where coff_id='$id'";
					$result = mysql_query($sql);
					while($row = mysql_fetch_assoc($result)){
							$allmoney += $row['price']*$allnum;
					?>
						<tr height="30px"></tr>
						<tr class="bian" height="80px">
							<td><?php echo $row['coffname']?></td>
							<td><img width="50px" height="50px" src="<?php echo $row['img']?>" alt=""></td>
							<td><?php echo $row['price']?></td>
							<td><?php echo $allnum?></td>
							<td> <?php echo $row['price']*$allnum?></td>
						</tr>
						<?php
					}
			}

				?>
			</table>
			<div class="dingdan2">
				<div class="dingdan">
					<p>实付款：￥<?php echo $allmoney?></p>
					<p id="dizhi2">寄送至：</p>
					<p>收货人：<?php echo $username?></p>
				</div>
				<p><a href="cart.php">返回购物车</a><input type="submit" class="btn btn-danger" value="提交订单"> </p>
			</div>
		</div>
	</form>
	<script>
		function sea(id){
			console.log(id);
			var xhr = new XMLHttpRequest();
					var url = "dizhidata.php?id="+id;
					xhr.responseType = 'json';
					xhr.open('GET',url,true);
					xhr.send();
					xhr.onload = function(){
						if(xhr.status == 200){
							var result = xhr.response;
							console.log(result);
							document.getElementById('dizhi2').innerHTML='寄送至：';
							for(var i = 0 ; i < result.length; i++){
								document.getElementById('dizhi2').innerHTML +=result[i].dizhi;
								document.getElementById('dizhi2').innerHTML += result[i].dizhi_user;
									
							}
						}
					}
		}
	</script>
<!-- 	<form action="" class="information" method="get">
		
	</form> -->
</body>
</html>	 
