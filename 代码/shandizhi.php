<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect("localhost","root","root");
mysql_select_db("demo");
mysql_set_charset('utf8');
$dizhitextarea = isset($_POST["dizhitextarea"])?$_POST["dizhitextarea"]:"";
$user = isset($_POST["user"])?$_POST["user"]:"";
$tele = isset($_POST["tele"])?$_POST["tele"]:"";
$id = isset($_GET['id'])?$_GET['id']:"";
$idd = isset($_GET['idd'])?$_GET['idd']:"";
if(!empty($id)){
	$sql = "delete from dizhi where dizhi_id=$id";
	$result = mysql_query($sql);
}
echo json_encode($result);
if(!empty($idd)){
	$query = "delete from dingdan where dingdan_id=$idd";
	$result = mysql_query($query);
}
	
	

?>