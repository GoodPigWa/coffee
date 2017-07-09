<?php
include('head.php');
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
$image = isset($_COOKIE['image'])?$_COOKIE['image']:"";
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
$username = isset($_COOKIE['username'])?$_COOKIE['username']:"";
$id=$_GET['id'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>多功能jquery图片预览放大镜插件|DEMO_jQuery之家-自由分享jQuery、html5、css3的插件库</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/demo.css" />
	<script src="js/vendor/modernizr.js"></script>
	<script src="js/vendor/jquery.js"></script>
	<!-- xzoom plugin here -->
	<script type="text/javascript" src="source/js/xzoom.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/xzoom.css" media="all" /> 
	<!-- hammer plugin here -->
	<script type="text/javascript" src="hammer.js/1.0.5/jquery.hammer.min.js"></script>  
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link type="text/css" rel="stylesheet" media="all" href="fancybox/source/jquery.fancybox.css" />
	<link type="text/css" rel="stylesheet" media="all" href="magnific-popup/css/magnific-popup.css" />
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.js"></script>
	<script type="text/javascript" src="magnific-popup/js/magnific-popup.js"></script> 
	<meta charset="UTF-8">
	<title>Document</title>
<style>
	*{
		margin:0;
		padding:0;
	}
		.floor{
			width:100%;
			margin:0 auto;
			border:1px solid black;
		}
		.head{
			height:50px;
			border-bottom:2px solid gray;
			/*border:1px solid red;*/
		}
		.title{
			float: left;
			width:120px;
		}
		.tab{
            border:2px solid #ccc;
            border-bottom: none;
			float: left;
			list-style: none;
		}
		.tab li{
			float:left;
			padding:10px 4px;
            border-bottom: none;
            position: relative;
            border-right: 1px solid #ccc;
        
		}
		.tab li:before{
			content:'';
			display: block;
			height:2px;
			width:100%;
			position: absolute;
			background: #fff;
			bottom:-2px;
			left:0;
		}
		.tab li:on{
			border-left:1px solid red;
			border-right:1px solid red;
			border-top:2px solid red;
		}
		.tab li a{
			text-decoration: none;
			display: inline-block;
			color:#ccc;
            
            padding:1px 12px;
		}
 		.clearfix{
 			clear: both;
 		}
 		.content .tab_content{
 			display: none;
 			width:100%;
 			/*height:300px;*/
 		}
 		.content .tab_content:first-child{
 			display: block;
 		}
	.pic2{
		width:300px;
		display: inline-block;
		padding-left: 20px;
		font-family: "微软雅黑";
	}
	.pic2 .color{
		color:red;
	}
	.pic2 span{
		font-size: 25px;
		}
	.pic2 .buy{
		width:130px;
		height:50px;
		text-align: center;
		line-height: 50px;
		margin:0 auto;
		font-size: 15px;
		color:white;
		background: #2ba6cb;
		display:inline-block;
		}
		#qubuy{
			color: white;
		}
		.xzoom-container{
			display: inline-block;
		}
		.pic2 .red{
			color:red;
			font-size: 15px;
		}
		.pic2{
			font-family: "微软雅黑";
		}
		.pic input{
			width: 45px;
			height: 25px;
		}
		.produce1{
			width: 100%;
			border:1px solid gray;
			/*background: #c8c2be;*/
			color: white;
			height:1100px;
		}
		.produce{
			margin:0 auto;
			text-align: center;
		}
		.produce p{
			text-align: center;
			width: 230px;
			/*border:1px solid red;*/
			margin:0 auto;
		}
		.produce .pro{
			padding: 10px 0;
			font-size: 14px;
		}
		.produce img{
			margin:0 auto;
		}
		.htmleaf-container{
			border-right:1px solid gray;
			width: 100%;
		}
		.left{
			float: left;
			width: 81%;
			padding-left: 130px;
			padding-top: 100px;
			background: #887f7a;
		}
		.right{
			float: left;
			width: 250px;
			background: #887f7a;
			text-align: center;
			font-family: "微软雅黑";
			padding-top: 100px;
		}
		.shihe{
			margin:20px 0;
		}
		.ming{
			float: left;
			height:150px;
			width: 150px;
			text-align: center;
		}
		.ping{
			float: left;
		}
		body{
			background: #887f7a;
		}
		.ming div{
			width:80px;
			height:50px;
			margin:10px auto;
		}
		.ming img{
			width:100%;
			height:50px;
		}
		.biankuang{
			border-bottom:1px solid black;
			overflow: hidden;
			margin-top: 20px;
			margin:0 auto;
			padding-top: 10px;
			width: 80%;
		}
	</style>
</head>
<body>
    <?php
	$sql = "select * from coffee where coff_id='$id'";
    $result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
	?>
	<div class="left">
	    <div class="htmleaf-container pic">
			<div class="container">
			    <div class="row">
			    <section id="default" class="padding-top0">
			    <div class="row">
				    <div class="large-5 column">
				        <div class="xzoom-container" id="xzoom-container">
				          <img class="xzoom" id="xzoom-default" src="<?php echo $row['img'];?>" xoriginal="<?php echo $row['img'];?>" />
				          <div class="xzoom-thumbs">
				          	<?php
								$sql = "select image from image where code='$id'";
							    $result = mysql_query($sql);
								while($row = mysql_fetch_assoc($result)){
							?>	
							<a href="<?php echo $row['image'];?>">
								<img class="xzoom-gallery" width="80" src="<?php echo $row['image'];?>" title="The description goes here">
							</a>
				          <?php }
				          ?>
				      		</div>
				        </div>
				    </div>
			        <div class="pic2">
				      	<?php
						$sql = "SELECT * from coffee,image where coffee.coff_id = image.code and coff_id = '$id'";
					    $result = mysql_query($sql);
						$row = mysql_fetch_assoc($result)
						?>
						<form action="cart.php?id=<?php echo $id?>" method="POST">
							<h2><?php echo $row['coffname']?></h2>
							<span class="red">活动：</span><?php echo $row['active']?>
								<p class="color">活动价：￥<span><?php echo $row['price']?><span></p>
								<input id="coffeeid" style="display:none" type="text"  value="<?php echo $row['coff_id'] ?>">
		    				<p>数量：<input type="button" value="-" onclick="delOne()" />
		    						 <input name="number" type="text" id="num" value="1" />
		    						 <input type="button" value="+" onclick="addOne()" /></p>			
							<span class="buy"><a id="qubuy" >立即购买</a></span> 
						    <button>加入购物车</button>
<script>
	var qubuy = document.getElementById('qubuy');
	var coffeeid = document.getElementById('coffeeid').value;

	qubuy.onclick = function  () {
	var allnumber = document.getElementById('num').value;
		qubuy.setAttribute("href","buy.php?id="+coffeeid+"&allnum="+allnumber);
	}
</script>
						</form>
							<script type="text/javascript">
							function addOne() {
							    var num = document.getElementById("num");
							    num.value = parseInt(num.value) + 1;
							}
							function delOne() {
							    var num = document.getElementById("num");
							    if(num.value>1){
							    	 num.value = parseInt(num.value) - 1;
							    }				   
							}
							</script>
					</div>
			      <div class="large-7 column"></div>
			    </div>
			    </section>  	  
			  </div>
		     </div>
		</div>

	    <div class="floor">
			<div class="head">
				<ul class="tab">
					<li class="on"><a href="">商品详情</a></li>
					<li><a href="">累计评价</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
	  		<div class="content">
	  			<div class="tab_content">
	  				<div class="produce1">
						<div class="produce">
							<p>商品介绍</p><p class="pro"><?php echo $row['produce']?></p>
							<img src="<?php echo $row['img']?>"><br/>
							<div class="shihe"><strong>作用功效：</strong><?php echo $row['gongxiao']?></div>
							<img src="<?php echo $row['image']?>"><br/>
							<div class="shihe">适合人群：<?php echo $row['shiyong']?></div>
							<div class="shihe">使用方法：<?php echo $row['method']?></div>
						</div>
					</div>
	  			</div>
	  			<div class="tab_content">
	  				<div class="produce1">
	  					<?php 
	  						$sql = "select * from dingdan,`user` where dingdan.user_id = `user`.user_id and dingdan_id='$id'";
	  						$result = mysql_query($sql);
	  						while($row = mysql_fetch_assoc($result)){
	  							if(!empty($row['pingjia'])){
	  							?>
	  							<div class="biankuang">
		  							<div class="ming">
			  							<div><img src="<?php echo $row['image']?>" alt=""></div>
			  							<?php echo $row['username']?>
			  							</div>
		  							<div class="ping"><?php echo $row['pingjia']?></div>
		  						</div>
	  					<?
	  					}
	  						}
	  					?>
	  					
	  				</div>
	  			</div>
	  		</div>
		</div>
		<script>
			var floor = document.querySelectorAll('.floor');
			for(var j=0;j<floor.length;j++){
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

	</div>
	<div class="right">
		<p>....看了又看....</p>
		 <?php
		 $query = "select * from coffee order by coff_id desc limit 0,1";
		 $result1 = mysql_query($query);
		 $row1 = mysql_fetch_row($result1)[0];
		 $idd = $row1-$id;
		 if($id>($row1-5)){
		 	$sql2 = "select * from coffee order by coff_id desc limit $idd,5";
		 }else{
		 	$sql2 = "select * from coffee limit $id,5";
		 }		
		    $result2 = mysql_query($sql2);
			while($row2 = mysql_fetch_assoc($result2)){
		?>	<div>
				<a href="sole.php?id=<?php echo $row2['coff_id']?>"><img style="border:1px solid gray;"width="140px" height="70px" src="<?php echo $row2['img']?>"></a>
			</div>
		￥<?php echo $row2['price']?><br/>
		<?php echo $row2['coffname']?>
		<p></p>
		<?php
		}
		?>
	</div>
		
	<script src="js/foundation.min.js"></script>
      <script src="js/setup.js"></script>
<?php
    }?>

</body>
</html>
