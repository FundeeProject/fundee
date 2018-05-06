<?php
session_start();
include "../include/config.php";

$statusid = $_POST['statusid'];
$arr = array();

	$sql="SELECT * FROM story WHERE  status_id = '$statusid'  "; 
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
 ?>