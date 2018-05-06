<?php
session_start();
?>
<?php 
include "../include/config.php";
$storyid = $_POST['storyid'];

$sql="UPDATE story SET status_id = 2 WHERE story_id = '$storyid'";
$objExec = mysql_query($sql) or die (mysql_error());

	if(!$objExec) {
		echo "failed";
	}
	else{
		echo "ok";
	}
 ?>