<?php

$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
if(empty($user_id)){
	echo "<script>alert('未登录');location.href='userlogin.php?'</script>";
}
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
include('head.php');

$number = isset($_POST['number'])?$_POST['number']:"";
if($_GET){
	$id = isset($_GET['id'])?$_GET['id']:"";
	$sql = "select * from coffee where coff_id='$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$img = $row['img'];
	$coffname = $row['coffname'];
	$price = $row['price'];
	unset($sql);
	$sql = "select count(*) from cart where coff_id='$id' and user_id='$user_id'";
		$result = mysql_query($sql);
		$shu = mysql_fetch_row($result)[0];
	if($shu == 0){
		$sql1 = "insert into cart(img,coffname,shuliang,price,coff_id,user_id) value('$img','$coffname','$number','$price*shuliang','$id','$user_id')";
		if (mysql_query($sql1)) {
			echo "<script>location.href='cart.php';</script>";
		}
	}
	else{
		$sql1 = "update cart set shuliang=shuliang+$number where coff_id=$id";
		if (mysql_query($sql1)) {
			echo "<script>location.href='cart.php';</script>";
		}
	}
}
$sql = "select shuliang,coff_id from cart";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	if($row[0]==0){
		$sql = "delete from cart where coff_id='$row[1]>'";
          $result = mysql_query($sql);
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
	.container h2{
		color:black;
		margin-top: 70px;
	}
	#jiesuan{
		margin-left:630px;
	}
	.num{
		width: 45px;
		height: 25px;
		}
	</style>
</head>
<body>

	<div class="container">
    	<h2 class="text-center">购物车列表</h2>
    	<form action="buy.php" method="post">
	    	<table class="table table-bordered" id="tab">
	    		<tr>
	    			<th><input type="checkbox" onclick="myChoose()" id="btn" value="全选"></button></th>
	    			<th>产品名称</th>
	    			<th>缩略图</th>
	    			<th>价格</th>
	    			<th>数量</th>
	    			<th>id</th>
	    			<th>总价</th>
	    			<th>操作</th>
	    		</tr>
	    		<?php 
	    			$sql="select * from cart where user_id='$user_id'";
	    			$result = mysql_query($sql);
	    			while($row = mysql_fetch_assoc($result)){
	    		    ?>
		    		<tr>
		    			<td><input type="checkbox" onclick="getprice(this)" class="xuankuang" name="xuan[]" value="<?php echo $row['coff_id']?>"></td>
		    			<td><?php echo $row['coffname']?></td>
		    			<td><a href="sole.php?id=<?php echo $row['coff_id']?>"><img width="50px" height="50px" src="<?php echo $row['img']?>" alt=""></a></td>
		    			<td><span class="price"><?php echo $row['price']?></span></td>
		    			<td>
		    				<input type="button" class="min" value="-"  onclick="delOne(<?php echo $row['coff_id']?>)"/>
		    				<input name="number" type="text" class="num" value="<?php echo $row['shuliang']?>" />
		    				<input type="button" class="add" value="+" onclick="addOne(<?php echo $row['coff_id']?>)"/>
		    			</td>
		    			<td><?php echo $row['coff_id']?></td>
		    			<td><span id="total"><?php echo $row['price']*$row['shuliang']?></span></td>
		    			<td><button class="btn btn-danger" name="del" onclick="if(confirm('是否确定删除'))
		    				{search(<?php echo $row['coff_id']?>);}">删除</button></td>
		    		</tr>

	    			<?php
	    			}
	    		    ?>	
	    	</table>
	    	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	    	<script>
	    	var sum = 0;

	    	function getprice(ds){
	    		sum=$("#sumprice").html();
	    		if (sum == '') {
	    			sum=0;
	    		};
	    		sum = parseInt(sum);
	    		if($(ds).is(':checked')){
	    			var price = $(ds).parent().parent().children().find('span[id*=total]').html();
	    			var tprice = parseInt(price);
		    		if(typeof(tprice)!=="undefined"){
		    			sum+=tprice
		    		}
	    		}else{
	    			var price = $(ds).parent().parent().children().find('span[id*=total]').html();
	    			var tprice = parseInt(price);
		    		if(typeof(tprice)!=="undefined"){
		    			sum-=tprice
		    		}
	    		}	
	    		$("#sumprice").html(sum);
	    		pandun();
	    	}
	    	</script>
	    		<script type="text/javascript">
	    					$(".add").click(function(){ 
	    						var p=$(this).parent().parent().children().find('span[class*=price]'); 
								var t=$(this).parent().find('input[class*=num]'); 
								var i=$(this).parent().parent().children().find('input[type*=checkbox]').is(':checked'); 
								t.val(parseInt(t.val())+1) 
								var s=0; 
								s=parseInt(t.val())*parseFloat(p.text()); 
								$(this).parent().parent().children().find('#total').html(s); 
								if(i){
									var su=0;
									su=parseInt($("#sumprice").html())+parseFloat(p.text()); 
									$("#sumprice").html(su);
								}
								pandun();
							}) 
							$(".min").click(function(){ 
								var p=$(this).parent().parent().children().find('span[class*=price]');
								var t=$(this).parent().find('input[class*=num]'); 
								var i=$(this).parent().parent().children().find('input[type*=checkbox]').is(':checked');
								if(parseInt(t.val())>1){ 
								 t.val(parseInt(t.val())-1) 
								} 
								
								if(parseInt(t.val())<1){ 
								  t.val(1); 
								} 
								var s=0; 
								s=parseInt(t.val())*parseFloat(p.text()); 
								console.log(s);
								$(this).parent().parent().children().find('#total').html(s); 
								if(i){
									var su=0;
									su=parseInt($("#sumprice").html())-parseFloat(p.text()); 
									$("#sumprice").html(su);
								}
								pandun();
							}) 
							function addOne(id) {
							    var xhr = new XMLHttpRequest();
								var url = "shuliangdata.php?id="+id+"&c=1";
								xhr.responseType = 'json';
								xhr.open('GET',url,true);
								xhr.send();
								xhr.onload = function(){
									if(xhr.status == 200){
										var result = xhr.response;
									}
								}
							}
							function delOne(id) {
							    var xhr = new XMLHttpRequest();
								var url = "shuliangdata.php?id="+id+"&c=-1";
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
		 <script>
		 	function  pandun(){
		 		var pp = $('#sumprice').html();
		 		var prr = parseInt(pp);
		 		console.log(prr);
		 		if(prr>0){
		 			$('#sumprice').next().next().removeAttr("disabled");
		 		}
		 	}
		 </script>
	  	<script language="javascript">
			    function myChoose()
					   {
					   var xuan=document.getElementsByName("xuan[]");
					   var btn=document.getElementById("btn");
					   if(btn.value=="全选")
					   {
					      btn.value="全不选";
					   for(var i=0;i<xuan.length;i++)
					   {
					       xuan[i].checked=true;
					   }
					   }
					   else
					   {
					      btn.value="全选";
					   for(var i=0;i<xuan.length;i++)
					   {
					      xuan[i].checked=false;
					   }
					   }
			   }
		  </script>
		 <!-- 每个表格后边的删除 -->
			<script>
				function search(id){
					var xhr = new XMLHttpRequest();
					var url = "data.php?id="+id;
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
	    	<div class="row">
	    		<div class="col-md-12">
	    			<button type="submit" class="btn btn-danger" name="del">删除</button>
	    			<a href="" class="btn btn-danger" onclick="if(confirm('是否确定删除')){quansearch();}">清空购物车</a>
	    			<a id="jiesuan" href=""></a>  合计：<span id="sumprice">0</span><span>￥ </span><button disabled type="submit" name="buy" class="btn btn-danger">结算</btuuon>
	    		</div>
	    	</div>
	    	<script>
	    	// 全部删除
				function quansearch(){
					var xhr = new XMLHttpRequest();
					var url = "data1.php";
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
    	</form>
    </div>
</body>
</html>


