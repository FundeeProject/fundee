<?php
session_start();
include "include/config.php";
include "include/function.php";
$op = $_GET['op'];

//echo "Hi";
if($op === 'signin'){
	signIn();
}else if($op === 'test'){
   test();
}else if($op === 'regis'){
   regis();
}else if($op === 'logFace'){
   logFace();
}
function regis(){ //echo "dd";
	$username = trim($_POST['username']);
	$email = trim($_POST['email']);
	$password = trim($_POST['pwd']);
	$cke = selects("user","where email='$email' or username='$username'");
	//echo "email :".$email."username :".$username."password ".$password;
	//echo $email."-".count($cke);
	if(count($cke)==0){
		$row = insert("username,password,email,user_point,role_id","'$username','$password','$email','0','1'","user");
	  echo "ok";
	}
	else{
		echo "ชื่อผู้ใช้ หรือ อีเมลล์นี้ถูกใช้แล้ว";
	}
}
function logFace(){
	$user_name = trim($_POST['user_name']);
	$user_email = trim($_POST['user_email']);
	/*$_SESSION['logon'] = 1;
	$_SESSION["user_id"] = '0';
	$_SESSION["user_email"] = $user_email;
	$_SESSION["user_name"] = $user_name;
	$_SESSION["role_id"] = '1';
	echo "ok";*/
//	$password = trim($_POST['pwd']);
	//echo "Hello".$username."  ypurpass: ".$password ;
//	$chk = (isset($_POST['remember']) ? $_POST['remember'] : '');
	//เช็ค user และ password จาก ฟอร์ม
	if (!empty($user_email)){
		$sql = sprintf("select * from user where email='%s'",
		mysql_real_escape_string($user_email));
		$query = mysql_query($sql) or die (mysql_error());
		$num_rows=mysql_num_rows($query);
		$login=mysql_fetch_assoc($query); 
	//	echo $num_rows; //เอามาเช็คว่ามีข้อมูลรึป่าว
		if($num_rows === 0){ // ถ้ายังไม่มีข้อมูล ให้เพิ่มข้อมูลลงไป
			$row = insert("username,password,email,user_point,role_id","'$user_name','00000000','$user_email','0','1'","user");
			if($row){
				//echo "<br><p class='alert alert-danger'>ยังไม่มีข้อมูล สมัครสมาชิคเรียบร้อยแล้ว</p>";
				$_SESSION['logon'] = 1;
				$_SESSION["user_id"] = '0';
				$_SESSION["user_email"] = $user_email;
				$_SESSION["user_name"] = $user_name;
				$_SESSION["role_id"] = '1';
				echo $_SESSION["role_id"];
			}
			exit();
		}else if ($num_rows != 0){ //ถ้ามีแล้วให้ล็อคอิน
			$_SESSION['logon'] = 1;
			$_SESSION["user_id"] = $login['user_id'];
			$_SESSION["user_email"] = $user_email;
			$_SESSION["user_name"] = $user_name;
			$_SESSION["role_id"] = $login['role_id'];
			/*if($chk == 'on') { // ถ้าติ๊กถูก Login ตลอดไป ให้ทำการสร้าง cookie
				//setcookie("username_log",$row['user_id'],time()+3600*24*356);
			}*/
			echo $_SESSION["role_id"];
			exit();
		}else{
			echo "ผิดพลาด! ไม่สามารถเข้าใช้งานระบบได้";
			exit();
		}
	}
}
function test(){
	$username = trim($_POST['email']);
	$password = trim($_POST['pwd']);
	//echo "Hello".$username."  ypurpass: ".$password ;
	$chk = (isset($_POST['remember']) ? $_POST['remember'] : '');
	//เช็ค user และ password จาก ฟอร์ม
	if ((!empty($username)) and (!empty($password)) or $password == '') {
		$sql = sprintf("select * from user where email='%s' and password='%s'",
		mysql_real_escape_string($username),
		mysql_real_escape_string($password));
		$query = mysql_query($sql) or die (mysql_error());
		$num_rows=mysql_num_rows($query);
		$login=mysql_fetch_assoc($query); 
		//echo $num_rows;
		if($num_rows === 0){
			echo "ผิดพลาด! ไม่มี Username นี้ในระบบ หรือคุณถูกระงับการใช้งาน.";
			exit();
		}else if ($num_rows != 0){
			$uid = $username;
			$row = select("user","where email='$uid'");
			$_SESSION['logon'] = 1;
			$_SESSION["user_id"] = $row['user_id'];
			$_SESSION["user_email"] = $row['email'];
			$_SESSION["user_name"] = $row['username'];
			$_SESSION["role_id"] = $row['role_id'];
			//echo "Hello".$username."  ypurpass: ".$password ;
			if($chk == 'on') { // ถ้าติ๊กถูก Login ตลอดไป ให้ทำการสร้าง cookie
				//setcookie("username_log",$row['user_id'],time()+3600*24*356);
			}
			echo $_SESSION["role_id"];
			exit();
		}else{
			echo "ผิดพลาด! ไม่สามารถเข้าใช้งานระบบได้.";
			exit();
		}
	}
}
function signIn(){
	$username = trim($_POST['email']);
	$password = trim($_POST['password']);
	$chk = (isset($_POST['remember']) ? $_POST['remember'] : '');
	//เช็ค user และ password จาก ฟอร์ม
	if ((!empty($username)) and (!empty($password)) or $password == '') {
		$sql = sprintf("select * from user where email='%s' and password='%s'",
		mysql_real_escape_string($username),
		mysql_real_escape_string($password));
		$query = mysql_query($sql) or die (mysql_error());
		$num_rows=mysql_num_rows($query);
		$login=mysql_fetch_assoc($query);
		if($num_rows === 0){
			echo "ผิดพลาด! ไม่มี Username นี้ในระบบ หรือคุณถูกระงับการใช้งาน.";
			exit();
		}else if ($num_rows != 0){
			$uid = $username;
			$row = select("user","where email='$uid'");
			$_SESSION['logon'] = 1;
			$_SESSION["user_id"] = $row['user_id'];
			$_SESSION["user_name"] = $row['username'];
			//$_SESSION["lastname"] = $row['lastname']; 
			//$_SESSION["dept_id"] = $row['dept_id']; 
			$_SESSION["role_id"] = $row['role_id'];
			if($chk == 'on') { // ถ้าติ๊กถูก Login ตลอดไป ให้ทำการสร้าง cookie
				//setcookie("username_log",$username,time()+3600*24*356);
			}
			
			echo "<script> $(function(){setTimeout(function() {window.location.href='index2.php';}, 2000);});</script>";
			echo "<br><p class='alert alert-success'>กำลังเข้าสู่ระบบ กรุณารอสักครู่ ...</p>";
			exit();
		}else{
			echo "<br><p class='alert alert-danger'>ผิดพลาด! ไม่สามารถเข้าใช้งานระบบได้.</p>";
			exit();
		}
	}
}
?>