<?php
session_start();
<<<<<<< HEAD
?>
<?php 
include "../include/config.php";
$story_id = $_POST['story_id'];
$arr = array();

	$sql="SELECT * FROM   news where  Is_show =  'Y'  ORDER BY news_id  ASC";
=======
 
include "../include/config.php";
$arr = array();

	$sql="SELECT * FROM   news where  Is_show =  'Y'  ORDER BY news_id  ";
>>>>>>> dabb252b2b628f667e1dfe2f1039ae3873926cf1
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
//echo $sql ;

 ?>