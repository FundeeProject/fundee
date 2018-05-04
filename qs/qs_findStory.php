<?php
session_start();
?>
<?php 
include "../include/config.php";
$searchName = $_POST['searchName'];
$arr = array();

if($searchName == "all"){
	$sql="SELECT * FROM   story where  status_id = '2'  ORDER BY create_date  DESC LIMIT 8";
}else{
	$sql="SELECT * FROM   story where  story_name like  '%$searchName%' AND status_id = '2' ORDER BY create_date  DESC";
}
	
	$objExec = mysql_query($sql) or die (mysql_error());
	while($objResult = mysql_fetch_array($objExec) )
	{
		array_push($arr,$objResult);
	}
	echo json_encode($arr);
///status_id = '0' ยังไม่แชร์
///status_id = '1' รออนุมัติ
///status_id = '2' แชร์แล้วอนุมัติแล้ว

 ?>