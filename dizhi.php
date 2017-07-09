<?php
include('head.php');
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
$username = isset($_COOKIE['username'])?$_COOKIE['username']:"";
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
$dizhitextarea = isset($_POST["dizhitextarea"])?$_POST["dizhitextarea"]:"";
$user = isset($_POST["user"])?$_POST["user"]:"";
$tele = isset($_POST["tele"])?$_POST["tele"]:"";
if($_POST){
	$sql = "insert into dizhi(dizhi_user,dizhi,telephone) value('$user','$dizhitextarea','$tele')";
	$result=mysql_query($sql);
}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style>
	.bian{
		background: #d3cbc6;
		overflow: hidden;
		margin-top:51px;
		padding:80px 330px;
	}
	.bian>div{
		float: left;
		height:500px;
		border:1px solid red;
	}
	.left{
		width: 160px;
		font-size: 1.4em;
	}
	.left ul li{
		display: block;
		margin-top: 20px;
	}
	.clearfix{
 			clear: both;
 		}
	.right .tab_content{
 			display: none;
 			width:500px;
 			height:300px;
 		}
 		.tab_content1{
 			padding-left: 20px;
 		}
 		.tab_content2{
 			display: none;
 			padding-left:20px;
 		}
	.pic{
		width: 120px;
		height:120px;
		border:4px solid white;
		margin:20px 20px;
	}
	.right .tab_content:first-child{
 			display: block;
 		}
 		.content2 .tab_content2:first-child{
 			display: block;
 		}
 		.tab_content form{
 			padding:10px 0;
 		}
 		.tab_content form button{
 			background: red;
 			color:white;
 			padding:5px 14px;
 			display: inline-block;
 			margin: 10px 70px;
 		}
 		textarea{
 			float:left;
 		}
 		.img{
 			margin-left: 70px;
 			margin-top: -20px;
 			border:2px solid gray;
 			width:99px;
 			overflow: hidden;
 		}
 		#image{
 			margin-top:-20px;
			margin-left: 15px;
			display: none;
 		}
 		.xian{
 			width:93%;
 			margin:10px auto;
 			border-top:1px solid white;
 		}
 		.img:hover #image{
 			display: block;
 		}
 		/*.page a{
			text-decoration: none;
			border:1px solid #000;
			padding:5px 15px;
		}
		.active{
			background: red;
		}*/
</style>
</head>
<body>
	<div class="bian">
		<div class="left">
			<?php 
				$query = "select * from user where user_id=$user_id";
				$resultt = mysql_query($query);
				$roww = mysql_fetch_assoc($resultt);
				$image = $roww['image']
		?>
			<div class="pic"><img width="110px" height="110px" src="<?php echo $image?>" alt=""></div>
			账号管理
			<ul class="tab">
				<li><a href="">个人资料</a></li>
				<li><a href="">收货地址</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="right">
			<div class="tab_content">
				<div class="tab_content1">
					<span><a href="">基本资料</a></span>
					<span><a href="">头像照片</a></span>
					<hr>
				</div>
				<div class="content2">
		  			<div class="tab_content2">
		  				<form action="upload.php" method="post" enctype="multipart/form-data">
			  				<p>亲爱的<?php echo $username?>，填写真实的资料，有助于好友找到你哦。</p>
			  				<br/>
			  				<div class="up">当前头像：</div>

			  					<div class="img">
				  				   <span id="show"><img width="95px" height="95px" src="<?php echo $image?>" alt=""></span>
				  				   <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
				  				   	<input type="file" name="image" id="image">
				  				</div>

			  				<p class="clearfix"><br/>*昵称：<input type="text" name="user1" ></p>
			  				<div class="xian"></div>
			  				<button>保存</button>
						</form>
		  			</div>
		  			<div class="tab_content2">你好</div>
	  			</div>
	  		</div>
	  		<script>
				var image= document.getElementById("image");
				image.onchange = function(){
					var file = image.files[0];
					// console.log(file);

					var formData = new FormData();
					formData.append("image",file,file.name);

					var xhr = new XMLHttpRequest();
					xhr.open("POST","fileUpload.php",true);

					xhr.send(formData);
					xhr.onload = function(){
						if(xhr.status == 200){
							// console.log("x");
							
							document.getElementById("show").innerHTML = "<img src='"+xhr.response+"' width='95px' height='95px'>";
							console.log(xhr.response);
						}
					}


				}
	  		</script>
	  	
	</script>
			<div class="tab_content">
				<form action="" method="post">
					<p><div class="up">详细地址</div><textarea name="dizhitextarea" id="" cols="40" rows="3"></textarea></p>
					<p class="clearfix">收件人姓名<input type="text" name="user"></p>
					手机号码&nbsp;&nbsp;&nbsp;<input type="text" name="tele"><br/>
					<button>保存</button>
				</form>




				
<?php 
	$pageSize = 2;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$keywords = isset($_GET['keywords']) ? $_GET['keywords'] : "";
	if(!empty($keywords)){
		$where = "where username like '%".$keywords."%'";
	}else{
		$where = '';
	}
	$sql = "SELECT count(dizhi_id) from dizhi $where";
	$result = mysql_query($sql);
	$pageCount = mysql_fetch_row($result)[0];
	$totalPage = ceil($pageCount / $pageSize);
	if($page < 1){
		$page = 1;
	}
	if($page > $totalPage){
		$page = $totalPage;
	}
$startRecord = ($page -1) * $pageSize;
$sql = "SELECT * from dizhi $where limit $startRecord,$pageSize";
$result = mysql_query($sql);
 ?>
<form action="">
	<input type="text" name='keywords' value='<?php echo $keywords; ?>'>
	<button type='submit'>搜索</button>
	<!-- <button type='submit' onclick="location.href='fenye-1.php'">重置</button> -->
</form>

<table class="table table-bordered">
	<tr>
		<th>收件人</th>
		<th>详细地址</th>
		<th>电话</th>
		<th>操作</th>
	</tr>
	<?php
while($row = mysql_fetch_assoc($result)){
	?>
	<tr>
		<td><?php echo $row['dizhi_user']?></td>
		<td><?php echo $row['dizhi']?></td>
		<td><?php echo $row['telephone']?></td>    			
		<td>
			<a href="">
				<button class="btn btn-danger" onclick="if(confirm('是否确定删除')){searches(<?php echo $row['dizhi_id']?>);}">删除</button>
			</a>
			<button class="btn btn-danger">修改</button>
		</td>
	</tr>
	<?php
}?>
</table>


<?php 
echo "<div class='page'>";
echo "<a href='dizhi.php?page=1&keywords=".$keywords."'>首页</a>";
echo "<a href='dizhi.php?page=".($page-1)."&keywords=".$keywords."'>上一页</a>";
for($i=1; $i<$totalPage; $i++){
	if($page == $i){
		echo "<a href='dizhi.php?page=".$i."&keywords=".$keywords."' class='active'>$i</a>";
	}
	else{
		echo "<a href='dizhi.php?page=".$i."&keywords=".$keywords."'>$i</a>";
	}

}
echo "<a href='dizhi.php?page=".($page+1)."&keywords=".$keywords."'>下一页</a>";
echo "<a href='dizhi.php?page=".($totalPage)."&keywords=".$keywords."'>尾页</a>";
echo "</div>";

 ?>















			</div>
		</div>
	</div>
	<script>
		function searches(id){
			console.log(id);
			var xhr = new XMLHttpRequest();
			var url = "shandizhi.php?id="+id;
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
		var tab_content = document.querySelectorAll('.tab_content');
		for(var j=0;j<tab_content.length;j++){
			var tabspan = document.querySelectorAll('.tab_content1 span');
			for(var i = 0;i<tabspan.length;i++){
				(function(n,m){
					tabspan[n].onmouseover = function(){
					return changeTabe(n+1,m);
				    };
				})(i,j);
			}
	    }
	 		function changeTabe(index){
	 			var tabContent2 = document.querySelectorAll('.tab_content2');
	 			var tabspan = document.querySelectorAll('.tab_content1>span');
	 			for(var i=0;i<tabContent2.length;i++){
	 				tabContent2[i].style.display = 'none';
	 				
	 			}
	 			tabContent2[index-1].style.display = 'block';
	 		}
	</script>
<script>
	var bian = document.querySelectorAll('.bian');
	for(var j=0;j<bian.length;j++){
		var tabLi = document.querySelectorAll('.tab li');
		for(var i = 0;i<tabLi.length;i++){
			(function(n,m){
				tabLi[n].onmouseover = function(){
				return changeTab(n+1,m);
			    };
			})(i,j);
		}
    }
 		function changeTab(index){
 			var tabContent = document.querySelectorAll('.tab_content');
 			var tabLi = document.querySelectorAll('.tab>li');
 			for(var i=0;i<tabContent.length;i++){
 				tabContent[i].style.display = 'none';				
 			}
 			tabContent[index-1].style.display = 'block';
 			tabLi[index-1].style.display = 'block';
 		}
	</script>
</body>
</html>