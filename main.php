<?php
session_start();
$_GET['page'];
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- สริปต์ปุ่มสีๆ --->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body class="bgHome container">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1948365968761538',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
	
	FB.getLoginStatus(function(response) {
     // statusChangeCallback(response);
		if(response.status === 'connected'){
			//document.getElementById('status').innerHTML ='We are connected';
			//document.getElementById('login').style
		}
		 else if(response.status === 'not_authorized'){
			//document.getElementById('status').innerHTML ='We are not login';
		}
		else{
			//document.getElementById('status').innerHTML ='you are not logged into faceboook ';
		}
    });
	
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   function login(){
		FB.login(function(response){
			if(response.status === 'connected'){
				document.getElementById('status').innerHTML ='We are connected';
				window.location.href='index2.php'; /// เปิดไปหน้าใหม่
				//return false;
			}
			 else if(response.status === 'not_authorized'){
				document.getElementById('status').innerHTML ='We are not login';
			}
			else{
				document.getElementById('status').innerHTML ='you are not logged into faceboook ';
			}
		});
   }
   function info(){
		FB.api(	'/me',
				'GET',
				{fileds:'first_name,last_name_name_id'},
				function(response){
					document.getElementById('status').innerHTML=response.name;
				}
				);
   }
$(document).ready(function(){
	/*$(".show_mystory").show();
	$(".create_mystory").hide();
	$("#btCerate").click(function(){
		//var show = document.getElementById("show");
		//show.innerHTML = "btMystory";
		//alert("btCerate2 Click");
		$(".show_mystory").hide();
		$(".create_mystory").show();
	});*/
	/*
	$('.box li').click(function() {
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
    });
	
	  
	$('ul li').click(function() {
		//$('ul.list-group li.active').removeClass('active');
		//$(this).closest('li').addClass('active');
		
		//$(this).siblings('li').removeClass('active');
        $(this).addClass('active');
	});
	
	$('.list-group').on('click', 'li', function() {
		$('.list-group li.active').removeClass('active');
		$(this).addClass('active');
	});*/
});
	
	
</script>


<div class="container-fluid ">
  <div class="row ">
    <div class="col-sm-3 pull-right" style=" color:white;">
		ส่วนหัว  <?php echo $_SESSION["user_email"].$_SESSION["user_id"].$_SESSION["role_id"];  ?>
		ออกจากระบบ 
	</div>
  </div>
  
  <div class="row">
    <div class="nameLogo"></div>
	<div class="col-xs-12 col-lg-offset-3 col-lg-6">
		<div class="w100 logoHome login marginT10" style="position:retative"></div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
			<div class="bgW_login contentStory marginB10">
				<div style="padding-top:60px; width :100%;margin-left:auto; margin-right:auto;">
					<section class="area">
						 <div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs list-group">
									<li class="homePage"><a href="main.php?page=home">HOME</a></li>
									<li class="categoryPage"><a href="main.php?page=category">CATEGORY</a></li>
									<li class="storyPage"><a href="main.php?page=mystory">MY STORY </a></li>
									<?php if($_SESSION["role_id"] == 0){echo '<li class="adminPage"><a href="main.php?page=admin">ADMIN </a></li>';} ?>
								</ul>
							</div>
							<center>
								<div id="myTabContent1" class="tab-content mystory-create-m" style=" width :90%"  >
									<p id="showdata">แสดงข้อมูล</p>
									
									
									<?php 
										if($_GET['page'] == 'home'){
											include("home.php");
										}else if($_GET['page'] == 'category'){
											include("category.php");
										}else if($_GET['page'] == 'mystory'){
											include("mystory.php");
										}else if($_GET['page'] == 'admin'){
											include("admin.php");
										}else if($_GET['page'] == 'admin_addNews'){
											include("admin_addNews.php");
										}else if($_GET['page'] == 'admin_manageNews'){
											include("admin_manageNews.php");
										}else if($_GET['page'] == 'admin_manageCategory'){
											include("admin_manageCategory.php");
										}else if($_GET['page'] == 'admin_addCategory'){
											include("admin_addCategory.php");
										}
										
										
									?>
								</div>
							</center>
						</div>
					</section>
				</div>
			</div>	
		</div>
	</div>
  </div>
</div>
</body>
</html>