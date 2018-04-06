<?php
session_start();
?>
<?php 
include "../include/config.php";

$description = $_POST['Detail'];
$user_id = $_SESSION["user_id"];
$date_create = date("Y-m-d");
$arr = array();

		
		// ค้นหา story_id
		$sql="SELECT news_id FROM  news ORDER BY news_id DESC LIMIT 1";
		$objExec = mysql_query($sql) or die (mysql_error());
		while($objResult = mysql_fetch_array($objExec) )
		{   
			$news_id = $objResult['news_id'];
			array_push($arr,$objResult);
		}
		///อัพโหลดรูปหน้าปก
		$ext = pathinfo(basename($_FILES['news_pic_upload']['name']),PATHINFO_EXTENSION);
		$new_img_name = 'news_'.$news_id.'.'.$ext;
		$img_path = "../img/";
		$upload_path = $img_path.$new_img_name;
		$success = move_uploaded_file($_FILES['news_pic_upload']['tmp_name'],$upload_path);
		if( $success == FALSE){
			//echo "ไม่สามารถอัพโหลดรูปได้ " ;
			echo "statusUpload = 'notsuccess'; ".$new_img_name ;
		}else{ ///ถ้าอัพได้ ให้เพิ่มชื่อรูป
			////add dB
			$sql="INSERT INTO news (news_picture, description, create_date, user_id,Is_show  )".
		            " VALUES ( '$new_img_name' , '$description' , '$date_create' ,'$user_id' , 'Y'  )";
			$objExec = mysql_query($sql) or die (mysql_error());
			echo "success" ;
		}
	
?>