<?php
session_start();
session_destroy();
include "include/config.php";
include "include/function.php";

?>
<html>
	<head>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/ytLoad.jquery.js"></script>-->
		
			<link rel="apple-touch-icon" sizes="180x180" href="icon/logoHome.png">
			<meta name="apple-mobile-web-app-capable" content="yes">
			<meta name="apple-mobile-web-app-status-bar-style" content="black">
			<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- สริปต์ปุ่มสีๆ -->
	<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
	<!-- Add icon library -->
	<!--<link rel="stylesheet" href="css/fontawesome-all.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="bgHome">
		<div class="nameLogo"></div>
		<div class="w100 logoHome login" style="position:retative"></div>
		<div class="bgW_login" style="border-radius: 10px;">
			<div class="divContent">
				 <!--
				 <div class="col-sm-12 textCenter">
				 	<button class="btn btn-primary col-sm-12 wp100" onclick="login()" id="login">Connect with Facebook</button>
				 </div>
				 -->
				 <div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary col-sm-12 wp100" style="background-color: #3b5998;" onclick="login()" id="login">Connect with Facebook</button>
					</div>
				</div>
				<div class="text-center text-orenge" id = "status"> </div>
				<p class="text-center marginT10">- or -</p>
				<form class="form-horizontal" method="post" name="flogin" id="flogin">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
						</div>
					</div>
						<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Password:</label>
						<div class="col-sm-10">          
							<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
						</div>
					</div>
					<!--<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label><input type="checkbox" name="remember" id="remember" value="on"> Remember me</label>
							</div>
						</div>
					</div>-->
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" class="btn btn-success wp100" style="background-color: #99c432;border-color: #99c432;" id="singin">Sign In</button>
						</div>
						<div class="col-sm-offset-2 col-sm-10 text-center marginT10 marginB10">
							<a href="register.php" style="color: #999;">Have an account? Log in ></a>
						</div>
					</div>
				</div>
  			</form>
		</div>
	
		<!-- popup -->
		<div class="modal fade exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		  <div class="modal-dialog" role="document" style="top: 40%;">
			<div class="modal-content" style="min-height: 150px;">
			  <div class="modal-body text-blue" style="text-align:center;">
			  </div>
			  <div class="modal-footer marginAuto" style="width: 90px;padding-left: 0px;" >
				<button type="button" class="btn btn-back noBtn marginT20" id="noModalBtn" style="width:90px;" data-dismiss="modal">Close</button>
				
			  </div>
			</div>
		  </div>
		</div>
	
	
		<script type="text/javascript">
			function login(){
				FB.login(function(response){
					if(response.status === 'connected'){
						//document.getElementById('status').innerHTML ='We are connected';
						var fbuid = response.authResponse.userID; // ไอดีเฟสบุ้ค
						if (response.authResponse) { //เช็คว่ามีการอนุญาติหรือไม่
							FB.api('/me', { locale: 'en_US', fields: 'name, email' }, function(response) {
								console.log(JSON.stringify(response));
								var name = response.name; // ชื่อและนามสกุล
								var email = response.email; // อีเมล
								//alert("api"+response.name+email+"-");
								$.post("action.php?op=logFace",{user_email: email,user_name:name }, function(data){	
									if(data=='1'){
										window.location.href="main.php?page=home";
										return true;
									}
									else if(data=='0'){
										window.location.href="main.php?page=admin";
										return true;
									}else{ alert("-"+data+"-"); }
								});
							 });
						}else{
							
						}
					}
					else if(response.status === 'not_authorized'){
						document.getElementById('status').innerHTML ='We are not login';
					}
					else{
						document.getElementById('status').innerHTML ='you are not logged into faceboook ';
					}
				},{'scope':'email'}); ////บรรทัดสุดท้ายนี้ใส่มาเพื่อให้เรียกใช้อีเมลล์ได้
			}
		
			window.fbAsyncInit = function() {
				FB.init({
				  appId      : '1948365968761538',
				  xfbml      : true,
				  version    : 'v2.12'
				});
				FB.AppEvents.logPageView();
			};

		   (function(d, s, id){
				 var js, fjs = d.getElementsByTagName(s)[0];
				 if (d.getElementById(id)) {return;}
				 js = d.createElement(s); js.id = id;
				 js.src = "https://connect.facebook.net/en_US/sdk.js";
				 fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			
			
			
            $("#singin").click(function(){
				var email = $("#email").val();
				var pass = $("#pwd").val();
				
				if (email != "" &&  pass != ""){
				
				/*if (email == "admin@gmail.com" && pass == "1234"){
					//window.location.href="admin.php";
					window.location.href="main.php?page=admin";
					
				}else{
					window.location.href="main.php?page=mystory";
				}*/
				
					$.post("action.php?op=test",$("form").serialize(), function(data){
						if(data=='1'){ //user
							window.location.href="main.php?page=home";
							return true;
						}
						else if(data=='0'){ //admin
							window.location.href="main.php?page=admin";
							return true;
						}
						else{
							$("#exampleModal").modal()// เปิดใช้ popup
							$(".modal-body").html(data)	 //ใส่ข้อความที่ต้องการ alert	
							//alert("-"+data+"-"); 
						}
					})
				}else{
					$("#exampleModal").modal()
					$(".modal-body").html("Please enter data");
				}

            });
		</script>
		
	</body>
</html>