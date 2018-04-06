<?php
session_start();
?>
<?php 
include "../include/config.php";
$text = $_POST['text'];
$sql="DELETE FROM news WHERE description = '$text'";
$objExec = mysql_query($sql) or die (mysql_error());
echo "ok";

 ?>