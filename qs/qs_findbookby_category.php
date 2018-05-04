<?php
session_start();
include "../include/config.php";

$categoryid = $_POST['categoryid'];
$arr = array();
	if($categoryid == 0 ){
		$sql="SELECT * FROM story WHERE  status_id = '2' "; //// status_id = '1' หมายถึงนิทานอนุญาตแล้ว//
	}else{
		$sql="SELECT * FROM story WHERE  category_id = '$categoryid' AND status_id = '2' "; 
	}
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
 ?>