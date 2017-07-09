<?php
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
$username = $_COOKIE['username'];
if($_POST){
	$coname = $_POST['coname'];
	$copro = $_POST['copro'];
	$coprice = $_POST['coprice'];
	$coimg = $_POST['coimg'];
	$active = $_POST['active'];
	$gongxiao = $_POST['gongxiao'];
	$shiyong = $_POST['shiyong'];
	$method = $_POST['method'];
	$englishname = $_POST['englishname'];
	$sql = " insert into coffee(coffname,produce,price,img,active,gongxiao,shiyong,method,englishname) 
	value('$coname','$copro','$coprice','$coimg','$active','$gongxiao','$shiyong','$method','$englishname')";
	$result = mysql_query($sql);
    echo "<script>alert('修改成功');location.href='index.php?username=$username'</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	form{
		margin:0 auto;
		/*border:1px solid gray;*/
		width:380px;
		margin-top:50px;
	}
	</style>
</head>
<body>
	<form action="" method="post">
		咖啡名：&nbsp;&nbsp;<input type="text" name="coname" value=""><br/>
		英文名：&nbsp;&nbsp;<input type="text" name="englishname" value=""><br/>
		价&nbsp;&nbsp;&nbsp;&nbsp;格：<input type="text" name="coprice" value=""><br/>
		图片路径：<input type="text" name="coimg" value=""><br/>
		活&nbsp;&nbsp;&nbsp;&nbsp;动：<input type="text" name="active" value=""><br/>
		使&nbsp;&nbsp;&nbsp;&nbsp;用：<input type="text" name="shiyong" value=""><br/>
		方&nbsp;&nbsp;&nbsp;&nbsp;法：<input type="text" name="method" value=""><br/>
		功&nbsp;&nbsp;&nbsp;&nbsp;效：<textarea style="width:200px;height:80px;" name="gongxiao"></textarea>
	<br/>
	介&nbsp;&nbsp;&nbsp;&nbsp;绍：<textarea style="width:200px;height:80px;" name="copro"></textarea>
	<br/>
		<button type="submit">提交</button>
	</form>
</body>
</html>