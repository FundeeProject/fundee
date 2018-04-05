<?php
session_start();

include "../include/config.php";
$arr = array();

	$sql="SELECT * FROM   news where  Is_show =  'Y'  ORDER BY news_id  ";
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
//echo $sql ;

 ?>