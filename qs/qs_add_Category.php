<?php
session_start();
?>
<?php 
$Categoryname = $_POST['Categoryname'];
include "../include/config.php";
$text = $_POST['text'];

$sql="INSERT INTO category (category_name)"." VALUES ( '$Categoryname' )";
$objExec = mysql_query($sql) or die (mysql_error());
echo "ok";

 ?>