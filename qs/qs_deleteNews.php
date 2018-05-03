<?php
session_start();
?>
<?php 
include "../include/config.php";
$news_id = $_POST['news_id'];
$sql="DELETE FROM news WHERE news_id = '$news_id'";
$objExec = mysql_query($sql) or die (mysql_error());
echo "ok";

 ?>