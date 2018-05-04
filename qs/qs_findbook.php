<?php
session_start();
?>
<?php 
include "../include/config.php";

$Myselect = $_POST['Myselect'];
/// 1 คือดูทั้งหมด  0 คือเฉพาะนิทานส่วนตัว
$arr = array();
	if($Myselect == 9 ){
		$sql="SELECT * FROM   story  WHERE   user_id = '$_SESSION[user_id]' ";	
	}else{
		$sql="SELECT * FROM   story  WHERE status_id = '$Myselect' AND user_id = '$_SESSION[user_id]' ";
	}
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
 ?>