<?php 
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
$user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id']:"";
   $id = isset($_GET['id'])?$_GET['id']:"";
	// if(!empty($id)){
		$query = "delete from dingdan where dingdan_id=$id and user_id=$user_id";
		$result = mysql_query($query);
	echo "<script>location.href='dingdan.php';</script>";
echo json_encode($result);
?>