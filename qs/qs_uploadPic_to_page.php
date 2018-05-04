<?php
session_start();
?>
<?php 
include "../include/config.php";

$story_id = $_POST['story_id'];
$pageNumber = $_POST['pageNumber'];
$description_page = $_POST['description_page'];

$page_id = $story_id.$pageNumber;
$user_id = $_SESSION["user_id"];
$arr = array();

		
		
		///อัพโหลดรูปหน้าปก
		$ext = pathinfo(basename($_FILES['pic_upload_page']['name']),PATHINFO_EXTENSION);
		$new_img_name = $story_id.'_'.$pageNumber.'.'.$ext;
		$img_path = "../imgStory/";
		$upload_path = $img_path.$new_img_name;
		$success = move_uploaded_file($_FILES['pic_upload_page']['tmp_name'],$upload_path);
		if( $success == FALSE){
			//echo "ไม่สามารถอัพโหลดรูปได้ " ;
			echo "notsuccess" ;
		}else{ ///ถ้าอัพได้ ให้เพิ่มชื่อรูป
			$sql="UPDATE page  SET picture = '$new_img_name',text = '$description_page'  WHERE story_id = '$story_id' AND page_number = '$pageNumber'";
			$objExec = mysql_query($sql) or die (mysql_error());
			
				///อัพโหลดเสียง
			$ext_s = pathinfo(basename($_FILES['audio_upload']['name']),PATHINFO_EXTENSION);
			$new_img_name_s = 's'.$story_id.'_'.$pageNumber.'.'.$ext_s;
			$img_path_s = "../audio/";
			$upload_path_s = $img_path_s.$new_img_name_s;
			$success_s = move_uploaded_file($_FILES['audio_upload']['tmp_name'],$upload_path_s);
			if( $success_s == FALSE){
				//echo "ไม่สามารถอัพโหลดรูปได้ " ;
				echo "notsuccess" ;
			}else{ ///ถ้าอัพได้ ให้เพิ่มชื่อรูป
				$sql="UPDATE page  SET voice = '$new_img_name_s'  WHERE story_id = '$story_id' AND page_number = '$pageNumber'";
				$objExec = mysql_query($sql) or die (mysql_error());
				echo  "ok" ;
			}
		}
		
	//	echo $story_id ;
	//
	
		
		//echo $story_id ;
	
?>