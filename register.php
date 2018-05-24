<?php
/*
session_start();
include "include/config.php";
include "include/function.php";*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bgHome">
		<div class="navbarH">
			 <div class="nameLogo" style="width: 130px; height: 53px;"></div>
			 <div class="w100 logoRegis login marginT10" style="position:retative; top:-10px;"></div>
			 <div class="row ">
				<div class="col-xs-12 col-lg-offset-3 col-lg-6">
					<div class="divRegis contentStory marginB10 border-bottom" style="height: 420px;"><p>&nbsp</p>
						<div class="boxRegis" style="height: 330px;">
							<div style="position: relative;top:-10px;">
								<p class="text-center text-blue"><b>REGISTER</b></p>
							</div>
							<form  method="post" name="fregis" id="fregis">
								<div class="blockRegis marginAuto" >
									</br>
									<input type="text" class="form-control" id="username" placeholder="username" name="username">
									</br>
									<input type="text" class="form-control" id="email" placeholder="Ex. ex@gmail.com" name="email">
									</br>
									<input type="password" class="form-control" id="pwd" placeholder="password" name="pwd"><br>
									<!--<input type="date" class="form-control" id="bday" name = "bday"  >-->
									<input required="" type="text" class="form-control" placeholder="select birthday" id="bday" name="bday" onfocus="(this.type='date')"/>
									
									</br>
								</div>
								
								 <div class="form-group marginT20 marginAuto" style="width:195px;">        
									<div class="col-sm-10 marginAuto" style="width:195px;">
										<button type="button" class="btn btn-back" style="width: 80px;" id="back">Back</button>
										<button type="button" class="btn btn-info" style="width: 80px;" id="regis">Register</button>
									</div>
									<p class="marginB10"></p>
								</div>
							</form>
						</div>
					</div>
				</div>
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
	$(document).ready(function(){
		//---------------------------------------------------------------//date
		   var dd_mm_yyyy;
			
			$("#bday").change( function(){
				changedDate = $(this).val(); //in yyyy-mm-dd format obtained from datepicker
				var date = new Date(changedDate);
				dd_mm_yyyy = twoDigitDate(date)+"-"+twoDigitMonth(date)+"-"+date.getFullYear(); // in dd-mm-yyyy format
				
				
			});
		//---------------------------------------------------------------//end date
			$("#regis").click(function(){
				var email = $('#email').val();
				var username = $('#username').val();
				var pwd = $('#pwd').val();
				var bday = $('#bday').val();
			
			
				if(validateEmail(email) == true && username != "" && pwd != "" && bday != ""){
					//alert("pass");
					$.post("action.php?op=regis",$("form").serialize(), function(data){
						//alert("-"+data+"-");
						if(data=='ok'){
							<?php  
								//$row = insert("username,password,email,user_point,role_id","'$username','$password','$email','0','1'","user");
							?>
							window.location.href='login.php';
							//return true;
						}else{
							$("#exampleModal").modal()// เปิดใช้ popup
							$(".modal-body").html(data)	 //ใส่ข้อความที่ต้องการ alert	
							//alert("555")
						}
					});
				}
				else {
					var texAlert = "";
					if(validateEmail(email) == false){
						texAlert += "<p>email incorrect</p>" ;
					}
					if(username == ""){
						texAlert += "<p>fill username</p>" ;
					}
					if(pwd == ""){
						texAlert += "<p>fill your password</p>" ;
					}
					if(bday == ""){
						texAlert += "<p>fill your brithday</p>" ;
					}
					//alert(texAlert);
					$("#exampleModal").modal()// เปิดใช้ popup
					$(".modal-body").html(texAlert);
				}
                
            });

            $("#back").click(function(){
                 window.location.href='login.php';

            });
		
	});
	
	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
    </script>
</body>


 