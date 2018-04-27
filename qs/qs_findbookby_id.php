<?php
session_start();
include "../include/config.php";

$Myselect = $_POST['storyid'];
$arr = array();
	
	$sql="SELECT * FROM story join category on story.category_id = category.category_id join user on story.user_id = user.user_id WHERE  story_id = '$Myselect' ";
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
 ?>