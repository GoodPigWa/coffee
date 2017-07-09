<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
   $id = $_GET['id'];
	$sql = "select * from dizhi where dizhi_id=$id";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$data[] = $row;
		// var_dump($data);
	}
	echo json_encode($data);

?>