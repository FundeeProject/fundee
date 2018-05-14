<?php
/*
session_start();
include "include/config.php";
include "include/function.php";*/
?>

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
					<div class="divRegis contentStory marginB10 border-bottom"><p>&nbsp</p>
						<div class="boxRegis">
							<div style="position: relative;top:-10px;">
								<p class="text-center text-blue"><b>REGISTER</b></p>
							</div>
							<form  method="post" name="fregis" id="fregis">
								<div class="blockRegis marginAuto">
									</br>
									<input type="text" class="form-control" id="username" placeholder="username" name="username">
									</br>
									<input type="text" class="form-control" id="email" placeholder="email" name="email">
									</br>
									<input type="password" class="form-control" id="pwd" placeholder="password" name="pwd">
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

<!--
<body class="bgHome container">
	<div class="navbarH">
		
		 
		   <div class="nameLogo" style="width: 130px; height: 53px;"></div>
		   <div class="w100 logoRegis login marginT10" style="position:retative; top:-10px;"></div>

			<div class="row ">
				<div class="col-xs-12 col-lg-offset-3 col-lg-6">
					<div class="contentStory marginB10 border-bottom" style="    background-color: #FFF;
    width: 90%;
    height: auto;
    margin-top: -60px;
    margin-left: auto!important;
    margin-right: auto!important;
    border-radius: 10px;">
						<section class="area">
							 <div class="row">
								<div class="col-md-12" style="padding:0px;">
									<div class="row adminPage">
										<div class="marginAuto divBtn min-h">
											<div class="row marginAuto"  style="width:95%;">
												
												<div style="position: relative;top: 60px;"><p class="text-center text-blue">REGISTER</p></div>
												
												<div class="blockRegis marginAuto" style="top: 80px;">
													</br>
													<input type="text" class="form-control" id="username" placeholder="username" name="username">
													</br>
													<input type="text" class="form-control" id="email" placeholder="email" name="email">
													</br>
													<input type="password" class="form-control" id="pwd" placeholder="password" name="pwd">
												</div>
												 <div class="form-group marginT20 marginAuto" style="width:195px;">        
													<div class="col-sm-10 marginAuto" style="width:195px;">
													    <button type="button" class="btn btn-back" style="width: 80px;" id="back">Back</button>
														<button type="button" class="btn btn-info" style="width: 80px;" id="regis">Register</button>
													</div>
													<p class="marginB10"></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							 </div>
						</section>
					</div>
				</div>
			</div>
	</div>
	-->
	 <script type="text/javascript">
	$(document).ready(function(){
		
		   
		
			$("#regis").click(function(){
				var email = $('#email').val();
				var username = $('#username').val();
				var pwd = $('#pwd').val();
				
			
				if(validateEmail(email) == true && username != "" && pwd != ""){
					//alert("pass");
					$.post("action.php?op=regis",$("form").serialize(), function(data){
						//alert("-"+data+"-");
						if(data=='ok'){
							alert("สมัครสมาชิคเรียบร้อยแล้ว");
							<?php  
								//$row = insert("username,password,email,user_point,role_id","'$username','$password','$email','0','1'","user");
							?>
							window.location.href='login.php';
							//return true;
						}
					});
				}
				else {
					var texAlert = "";
					if(validateEmail(email) == false){
						texAlert += "\n- email incorrect" ;
					}
					if(username == ""){
						texAlert += "\n- fill username" ;
					}
					if(pwd == ""){
						texAlert += "\n- fill your password" ;
					}
					alert(texAlert);
				}
				
                /*$.post("action.php?op=regis",$("form").serialize(), function(data){
                    //alert("-"+data+"-");
                    if(data=='ok'){
						alert("สมัครสมาชิคเรียบร้อยแล้ว");
                        <?php  
                            //$row = insert("username,password,email,user_point,role_id","'$username','$password','$email','0','1'","user");
                        ?>
                        window.location.href='index.php';
                        //return true;
                    }
                });*/
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


 <!--
<html>
<head><meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
</head>
<body class="bgHome">
    <div class="w100 logoHome login marginT10" style="position:retative"></div>
		<div class="bgW_login">
			<div style="padding-top:60px; width :70%;margin-left:auto; margin-right:auto;">
                 <h4 class="textCenter">Register</h4>
                 <form class="form-horizontal" method="post" name="fregis" id="fregis">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="username">User Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">          
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-10">
                          
						    <button type="button" class="btn btn-success" style="width: 80px;" id="regis">Submit</button>
                            <button type="button" class="btn btn-secondary" style="width: 80px;" id="back">Back</button>
                        </div>
                        <p class="marginB10"></p>
                    </div>
                 </form>
            </div>
        </div>
    </div>
 
    <script type="text/javascript">
	$(document).ready(function(){
		
		   var email = $('#email').val();
		   var username = $('#username').val();
		   var pwd = $('#pwd').val();
		
			$("#regis").click(function(){
			
			if(validateEmail(email) == true && username != "" && pwd != ""){
				//alert("pass");
				$.post("action.php?op=regis",$("form").serialize(), function(data){
                    //alert("-"+data+"-");
                    if(data=='ok'){
						alert("สมัครสมาชิคเรียบร้อยแล้ว");
                        <?php  
                            //$row = insert("username,password,email,user_point,role_id","'$username','$password','$email','0','1'","user");
                        ?>
                        window.location.href='index.php';
                        //return true;
                    }
                });
			}
			else {
				var texAlert = "";
				if(validateEmail(email) == false){
					texAlert += "\n- email incorrect" ;
				}
				if(username == ""){
					texAlert += "\n- fill username" ;
				}
				if(pwd == ""){
					texAlert += "\n- fill your password" ;
				}
				alert(texAlert);
			}
				
                /*$.post("action.php?op=regis",$("form").serialize(), function(data){
                    //alert("-"+data+"-");
                    if(data=='ok'){
						alert("สมัครสมาชิคเรียบร้อยแล้ว");
                        <?php  
                            //$row = insert("username,password,email,user_point,role_id","'$username','$password','$email','0','1'","user");
                        ?>
                        window.location.href='index.php';
                        //return true;
                    }
                });*/
            });

            $("#back").click(function(){
                 window.location.href='index.php';

            });
		
	});
	
	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
    </script>


</body>
</html>-->