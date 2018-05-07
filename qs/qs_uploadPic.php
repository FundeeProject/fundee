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
$story_id = 0;
	if($_SESSION["role_id"]== 0 ){ ///admin
		$status_id = 2 ;
	}
	else if($_SESSION["role_id"]== 1 ){
		$status_id = 0 ;
	}
		$sql="INSERT INTO story (story_name, story_description, create_date, category_id,status_id ,user_id ) VALUES ( '$Storyname' , '$description' , '$create_date' ,'$selectCategory' , $status_id ,$user_id )";
		$objExec = mysql_query($sql) or die (mysql_error());
		// ค้นหา story_id
		$sql="SELECT * FROM  story WHERE  story_name = '$Storyname'";
		$objExec = mysql_query($sql) or die (mysql_error());
		while($objResult = mysql_fetch_array($objExec) )
		{   
			$story_id = $objResult['story_id'];
			array_push($arr,$objResult);
		}
		///อัพโหลดรูปหน้าปก
		$ext = pathinfo(basename($_FILES['pic_upload']['name']),PATHINFO_EXTENSION);
		$new_img_name = $story_id.'_00.'.$ext;
		$img_path = "../imgStory/";
		$upload_path = $img_path.$new_img_name;
		$success = move_uploaded_file($_FILES['pic_upload']['tmp_name'],$upload_path);
		if( $success == FALSE){
			//echo "ไม่สามารถอัพโหลดรูปได้ " ;
			//echo $upload_path ;
			echo "notsuccess" ;
		}else{ ///ถ้าอัพได้ ให้เพิ่มชื่อรูป
			$sql="UPDATE story  SET story_pic = '$new_img_name' WHERE story_id = '$story_id'";
			$objExec = mysql_query($sql) or die (mysql_error());
			////เพิ่ม page เปล่า 10 หน้า
			for($i = 1; $i <= 10; $i++){
				$page_id = $story_id.$i;
				$sql="INSERT INTO page (page_id, picture, voice, text, page_number,story_id  ) VALUES ( $page_id ,'NULL' , 'NULL' , 'NULL' ,'$i' , '$story_id' )";
				$objExec = mysql_query($sql) or die (mysql_error());
			}
			echo $story_id ;
		}
		
	
	
?>