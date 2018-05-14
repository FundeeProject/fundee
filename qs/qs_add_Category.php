<?php
session_start();
?>
<?php 
$Categoryname = $_POST['Categoryname'];
include "../include/config.php";
$text = $_POST['text'];
$arr = array();


$sql1="select * FROM  category where category_name='$Categoryname'";
$objExec1 = mysql_query($sql1) or die (mysql_error());
while($objResult = mysql_fetch_array($objExec1) )
	{
		array_push($arr,$objResult);
	}
	
	if(count($arr) == 0){
		$sql="INSERT INTO category (category_name)"." VALUES ( '$Categoryname' )";
		$objExec = mysql_query($sql) or die (mysql_error());
		echo "ok";
	}else{
		echo "The name is already";
	}


 ?>