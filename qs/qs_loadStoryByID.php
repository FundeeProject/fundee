<?php
session_start();
include "../include/config.php";

$storyid = $_POST['storyid'];
$arr = array();
	
	$sql="SELECT * FROM page  WHERE  story_id = '$storyid' and picture <> 'NULL' order by page_number ASC ";
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
 ?>