<?php
session_start();
?>
<?php 
include "../include/config.php";
$storyid = $_POST['storyid'];
$sql="DELETE FROM story WHERE story_id = '$storyid'";
$objExec = mysql_query($sql) or die (mysql_error());

	if(!$objExec) {
	   // die("Database query failed: " . mysql_error());
		echo "failed";
	}
	else{
		$sql2="DELETE FROM page WHERE story_id = '$storyid'";
		$objExec2 = mysql_query($sql2) or die (mysql_error());
		if(!$objExec2) {
			echo "failed";
		}
		else{
			echo "ok";
		}
	}
 ?>