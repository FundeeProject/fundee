<?php
session_start();
?>
<?php 
include "../include/config.php";

$Storyname = $_POST['Storyname'];
$selectCategory = $_POST['selectCategory'];
$description = $_POST['description'];
$create_date =  date("Y-m-d") ;
$status_id = 0 ; //สถานะนิทานสร้างใหม่ยังเป็นส่วนตัวอยู่
$user_id = $_SESSION["user_id"];
$arr = array();
$story_id = $_POST['story_id'];
$isEditPic = $_POST['isEditPic'];

if($isEditPic == 1){
	///อัพโหลดรูปหน้าปก
		$ext = pathinfo(basename($_FILES['pic_upload']['name']),PATHINFO_EXTENSION);
		$new_img_name = $story_id.'_00.'.$ext;
		$img_path = "../imgStory/";
		$upload_path = $img_path.$new_img_name;
		$success = move_uploaded_file($_FILES['pic_upload']['tmp_name'],$upload_path);
		if( $success == FALSE){
			echo "notsuccess" ;
		}else{ ///ถ้าอัพได้ ให้เพิ่มชื่อรูป
			$sql = "UPDATE  story set story_name = '$Storyname', story_description = '$description',category_id = '$selectCategory' ,story_pic = '$new_img_name' where story_id = '$story_id' ";
			$objExec = mysql_query($sql) or die (mysql_error());
			if(!$objExec) {
				echo "failed";
			}
			else{
				echo "ok";
			}
		}
}else{
	$sql = "UPDATE  story set story_name = '$Storyname', story_description = '$description',category_id = '$selectCategory'  where story_id = '$story_id' ";
	$objExec = mysql_query($sql) or die (mysql_error());
	if(!$objExec) {
		echo "failed";
	}
	else{
		echo "ok";
	}
}
		
		
	
	
?>