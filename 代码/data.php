<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
   $id = $_GET['id'];
	$sql = "delete from cart where coff_id=$id";
	$result = mysql_query($sql);
	echo json_encode($result);

?>