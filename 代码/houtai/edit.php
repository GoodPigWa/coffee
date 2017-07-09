<?php
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset("utf8");
$id=$_GET['id'];
$username = $_GET['username'];
$sql = " select * from coffee where coff_id='$id'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
if($_POST){
	// echo "dad";
	$co_id=$_POST['co_id'];
	$coname=$_POST['coname'];
	$englishname=$_POST['englishname'];
	$coprice=$_POST['coprice'];
	$coimg=$_POST['coimg'];
	$active=$_POST['active'];
	$gongxiao=$_POST['gongxiao'];
	$copro=$_POST['copro'];
	$shiyong=$_POST['shiyong'];
	$sql = " update coffee set coffname='$coname',produce='$copro',price='$coprice',img='$coimg' where coff_id ='$co_id'";
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
		text-align: center;
	}
	form p{
		background: black;
		color:white;
		height:40px;
		line-height: 40px;
		text-align: center;
	}
	</style>
</head>
<body>
	<form action="" method="post">
		<p>欢迎：<?php echo $username; ?></p>
		<input type="text" readonly="true" name="co_id" value="<?php echo $row['coff_id'];?>"><br/>
		<input type="text" name="coname" value="<?php echo $row['coffname'];?>"><br/>
		<input type="text" name="englishname" value="<?php echo $row['englishname'];?>"><br/>
		<input type="text" name="coprice" value="<?php echo $row['price'];?>"><br/>
		<input type="text" name="coimg" value="<?php echo $row['img'];?>"><br/>
		<textarea style="width:200px;height:80px;" name="active">"<?php echo $row['active'];?>"</textarea>
	<br/>
		<textarea style="width:200px;height:80px;" name="gongxiao">"<?php echo $row['gongxiao'];?>"</textarea>
	<br/>
	<textarea style="width:200px;height:80px;" name="copro">"<?php echo $row['produce'];?>"</textarea>
	<br/>
		<textarea style="width:200px;height:80px;" name="shiyong">"<?php echo $row['shiyong'];?>"</textarea>
	<br/>
		<textarea style="width:200px;height:80px;" name="method">"<?php echo $row['method'];?>"</textarea>
	<br/>
		<button type="submit">提交</button>
	</form>
</body>
</html>
<?php
