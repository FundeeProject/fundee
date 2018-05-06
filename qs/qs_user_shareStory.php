<?php
session_start();
?>
<?php 
include "../include/config.php";
$storyid = $_POST['storyid'];

$sql="UPDATE story SET status_id = 1 WHERE story_id = '$storyid' and status_id = 0";
$objExec = mysql_query($sql) or die (mysql_error());

	if(!$objExec) {
		echo "failed";
	}
	else{
		echo "ok";
	}
 ?>