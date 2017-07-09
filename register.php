<meta charset="utf-8">
<?php
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
if($_POST){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $password2 = $_POST['password2'];

$sql = " select count(*) from user where username='$username'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
// $row = $row[0];
// echo "$row";
// die();
if($row[0] > 0){
	echo "用户名重复";
}
else{
$sql = "insert into user(username,password)
		values('$username','".$password."')";
		if(mysql_query($sql)){
			echo "<script>alert('注册成功');location.href='login.php'</script>";
			exit();
		}
		else{
			echo "注册失败";
		}
}

}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户注册</title>
	<style>
body{
		background: url(img/baikafei.jpg) no-repeat;
		background-size: 100%;
	}
	form{
		text-align: center;
		border:1px solid gray;
		width:400px;
		margin:100 auto;
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
	/*a{
		background: #ebf6f7;
		color:black;
		display: inline-block;
		font-family: "微软雅黑";
		font-size: 14px;
		text-decoration: none;
		width:35px;
		height: 20px;
		margin-left: 20px;
	}*/
	</style>
</head>
<body>
	<form action="" method="post">
		<h2>注册界面</h2>
		<p>用户名：&nbsp;&nbsp;<input type="text" name="username"></p>
		<p>密&nbsp;&nbsp;码：&nbsp;&nbsp;<input type="password" name="password"></p>
		<p>确认密码：<input type="password" name="password2"></p>
		<button type="submit">注册</button>
	</form>
</body>
</html>