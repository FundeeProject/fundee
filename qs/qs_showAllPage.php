<?php
session_start();
?>
<?php 
include "../include/config.php";
$story_id = $_POST['story_id'];
$arr = array();

	$sql="SELECT * FROM   page where  story_id =  '$story_id'  ORDER BY page_number  ASC";
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
//echo $sql ;

 ?>