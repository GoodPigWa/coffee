<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');

// 删除


	$sql = "delete from cart";
	$result = mysql_query($sql);
	// var_dump($result);
echo json_encode($result);

?>