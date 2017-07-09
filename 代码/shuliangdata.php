<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
   $id = $_GET['id'];
   $c = $_GET['c'];
   $sqll = "select * from cart where coff_id=$id";
   $result1 = mysql_query($sqll);
   $row = mysql_fetch_assoc($result1);

   if($row['shuliang']>=1){
   	$sql = "update cart set shuliang=shuliang+$c where coff_id=$id";
	$result = mysql_query($sql);
	echo json_encode($result);
   }
	

?>