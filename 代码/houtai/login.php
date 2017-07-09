<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "select id,username,password from admintion where username='$username'";
	$result = mysql_query($sql);
	// $row = mysql_fetch_row($result);
	// var_dump($row);
	// die();
		if($row = mysql_fetch_assoc($result)){
			if($row['password'] == $password){
				echo "<script>alert('登录成功');location.href='index.php?'</script>";
				setcookie("username",$username);

				exit();
			}
			else{
				echo "登录失败";
			}
		}
		else{
			echo "用户名输入错误";
		}

	
	
}
if ($_GET) {
	if ($_GET['tuichu'] == 'ok') {
		setcookie('username','',time()-1);
	}
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style>
	body{
		background: url(img/baikafei.jpg) no-repeat;
		background-size: 100%;
		text-align: center;
	}
	form{
		text-align:center;
		border:1px solid gray;
		width:400px;
		margin:150px 300px;
	}
	button{
		margin:40px 0;
		cursor: pointer;
	}
	h2{
		background: #bfa46f;
		height:45px;
		line-height: 45px;
		margin-top: 0px;
	}
	a{
		background: #ebf6f7;
		color:black;
		display: inline-block;
		font-family: "微软雅黑";
		font-size: 14px;
		text-decoration: none;
		width:70px;
		height: 20px;
		margin-left: 20px;
	}
	</style>
<body>
	<form action="" method="post">
		<h2>登陆界面</h2>
		<p>用户名：<input type="text" name="username"></p>
		密&nbsp;&nbsp;码：<input type="password" name="password"><br/>
		<button type="submit">登录</button>
	</form>
</body>
</html>